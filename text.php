<?php

session_start();

include 'conn.php';

$rollno = $_SESSION['user_rollno'];
 
echo 'User Roll No : '.$rollno; 
echo '<br>';


function checkDone($conn,$rollno){

  $apptituteQuery = "SELECT `finished` FROM `apptitute` WHERE `rollno` = '$rollno' ";
  $result = mysqli_query($conn, $apptituteQuery);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['apptitute'] = $row['finished'];

  }else {
    $_SESSION['apptitute'] = 'not done';
  }

  
  $quizQuery = "SELECT `finished` FROM `quiz` WHERE `rollno` = '$rollno' ";
  $result = mysqli_query($conn, $quizQuery);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['quiz'] = $row['finished'];

  }else {
    $_SESSION['quiz'] = 'not done';
  }

  
  $reasoningQuery = "SELECT `finished` FROM `reasoning` WHERE `rollno` = '$rollno' ";
  $result = mysqli_query($conn, $reasoningQuery);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['reasoning'] = $row['finished'];

  }else {
    $_SESSION['reasoning'] = 'not done';
  }


}

echo 'Apptitute : '.$_SESSION['quiz'];
echo '<br>';
echo 'Quiz : '.$_SESSION['quiz'];
echo '<br>';
echo 'Reasoning : '.$_SESSION['reasoning'];

mysqli_close($conn);

?>