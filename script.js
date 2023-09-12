console.log('script.js connected!');

document.addEventListener("DOMContentLoaded", function () {
    var toggleButtons = document.querySelectorAll(".toggle-form");
  
    toggleButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var targetForm = button.getAttribute("data-form");
            var signInForm = document.getElementById("signin-form");
            var signUpForm = document.getElementById("signup-form");
  
            if (targetForm === "signin") {
                signInForm.style.display = "block";
                signUpForm.style.display = "none";
            } else if (targetForm === "signup") {
                signUpForm.style.display = "block";
                signInForm.style.display = "none";
            }
        });
    });
  
    var signUpForm = document.getElementById("signup-form");
    var signInForm = document.getElementById("signin-form");
    var messageContainer = document.querySelector(".message");
  
    signUpForm.addEventListener("submit", function (event) {
        event.preventDefault();
  
        var formData = new FormData(signUpForm);
  
        fetch("register.php", {
            method: "POST",
            body: formData,
        })
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            if (data.status == "success") {
                signInForm.style.display = "block";
                signUpForm.style.display = "none";
                messageContainer.innerHTML = '<div class="alert alert-success">' + data.message + "</div>";
                signUpForm.reset();
            } else {
                messageContainer.innerHTML = '<div class="alert alert-danger">' + data.message + "</div>";
            }
        })
        .catch(function () {
            messageContainer.innerHTML = '<div class="alert alert-danger">An error occurred.</div>';
        });
    });
  
    signInForm.addEventListener("submit", function (event) {
        event.preventDefault();
  
        var formData = new FormData(signInForm);
  
        fetch("login.php", {
            method: "POST",
            body: formData,
        })
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            var messageContainer = document.querySelector(".message");
            if (data.status === 'user') {
              var rollnum = document.getElementById("rollno").value;
              sessionStorage.setItem('rollno', rollnum); // Change 'email' to 'rollno'
              messageContainer.innerHTML = '<div class="alert alert-success">' + data.message + "</div>";
              window.location.href = 'user/';
          } else {
              messageContainer.innerHTML = '<div class="alert alert-danger">' + data.message + "</div>";
          }          
        })
        .catch(function (error) {
            messageContainer.innerHTML = '<div class="alert alert-danger">' + error + "</div>";
        });
    });
});
