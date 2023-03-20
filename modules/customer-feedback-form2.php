<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form</title>
  <style>
    /* CSS for the form */
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      font-weight: bold;
    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    /* CSS for mobile devices */
    @media screen and (max-width: 600px) {
      input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
      }

      input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <h2>Feedback Form</h2>
  <div class="container">
    <form action="submit.php" method="POST">
      <label for="name">Name (optional):</label>
      <input type="text" id="name" name="name" placeholder="Your name..">
      <label for="feedback">Feedback:</label>
      <textarea id="feedback" name="feedback" placeholder="Write something.." style="height:200px"></textarea>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
