console.log('user.js connected..!');

const testbtns = document.querySelectorAll('.list');
const testDisc = document.querySelectorAll('.testDisc');

testbtns.forEach(btn => {
    btn.addEventListener('click', function () {
        const category = btn.className.split(' ')[0];
        testDisc.forEach(disc => {
            const discClass = disc.className.split(' ')[1];
            disc.classList.remove('active');
            disc.classList.remove('done')
            if (discClass === `${category}Disc`) {
                disc.classList.add('active');
            }
        });

        testbtns.forEach(inbtn => {
            inbtn.classList.remove('active');
        });
        btn.classList.add('active');
    });
});

testDisc.forEach(disc => {
    disc.addEventListener("click", function () {
        disc.classList.add('done');
        testbtns.forEach(inbtn => {
            inbtn.classList.remove('active');
        });
    });
});