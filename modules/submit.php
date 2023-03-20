<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $feedback = $_POST["feedback"];

  if (!empty($feedback)){
    $to = "joseph.a@pil.co.tz";
    $to = "maulid.hamad@pil.co.tz";
    $subject = "Feedback Form Submission Form 20-march-2023";
    $message = "Name: " . $name . "\n\nFeedback: " . $feedback;
    
    mail($to, $subject, $message);
    echo "<script>alert('Thank you!');</script>";
    echo "<script>window.location.href = 'social.php';</script>";
    exit();

  } else {
    echo "<script> alert ('Please fill feedback')</script>";

  }
  
  
  
}
?>
