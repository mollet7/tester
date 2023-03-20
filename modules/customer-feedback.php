<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer Feedback</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f7f7f7;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}
		.form-group {
			margin-bottom: 10px;
		}
		.form-label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		.form-input {
			display: block;
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 16px;
			line-height: 1.5;
			color: #333;
			background-color: #fff;
			transition: border-color 0.3s ease-in-out;
		}
		.form-input:focus {
			border-color: #007bff;
			outline: none;
		}
		.form-submit {
			display: block;
			width: 100%;
			padding: 10px;
			border: none;
			border-radius: 5px;
			background-color: #007bff;
			color: #fff;
			font-size: 16px;
			font-weight: bold;
			text-align: center;
			text-transform: uppercase;
			cursor: pointer;
			transition: background-color 0.3s ease-in-out;
		}
		.form-submit:hover {
			background-color: #0069d9;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Customer Feedback</h1>
		<form method="post" action="submit.php">
			<div class="form-group">
				<label class="form-label" for="name">Your Name (optional)</label>
				<input class="form-input" type="text" id="name" name="name" placeholder="Enter your name">
			</div>
			<div class="form-group">
				<label class="form-label" for="message">Your Feedback</label>
				<textarea class="form-input" id="message" name="message" placeholder="Enter your feedback" rows="5" required></textarea>
			</div>
			<button class="form-submit" type="submit">Submit</button>
		</form>
	</div>
</body>
</html>
