
<?php
if (isset($_POST['name'])) {
	// code...

	$connect=mysqli_connect("localhost","root","","event_form");
	if(!$connect){
		die("coonection failed due to ".mysqli_connect_error());
	}
	// else echo"Successfully submitted";
	$name=$_POST['name'];
	$phone_number=$_POST['phone_number'];
	$department=$_POST['department'];
	$email=$_POST['email'];
	$event=$_POST['event'];
	$text=$_POST['text'];
	$sql ="INSERT INTO `event_form`.`student_details` ( `name`, `phone_number`, `department`, `email`, `event`, `date`, `other`) VALUES ('$name', '$phone_number', '$department', '$email', '$event', current_timestamp(),'$text')";
	// echo $sql;
	if($connect->query($sql) == true){
		$insert=true;
	}
	else{
		echo "ERROR : $sql <br> $connect->error";
	}
	$connect->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVENT FORM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="build.jpeg" class="bg">
    <div class="container">
        <h1>Welcome to event submission form</h1>
        <p>Enter your details and about the event you wish to participate</p>
        <?php
        if($insert == true){
        echo "<p >Thanks for submitting your form. We are looking forward to meet you at the event</p>";
        }
    	?>
        <form action="style.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="phone_number" id="phone_number" placeholder="Enter your Phone number">
            <input type="text" name="department" id="department" placeholder="Enter your Department">
            <input type="text" name="email" id="email" placeholder="Enter your E-mail address">
            <select name="event" id="event" style="border-radius: 14px; width: 80%; opacity: 76%;">
                <option>Select an event</option>
                <option>Crack the code</option>
                <option>Mock Interview</option>
                <option>Reverse Shark tank</option>
                <option>Programmers date</option>
                <option>Maze Runner</option>
            </select>
            <!-- <input type="text" name="event" id="event" placeholder="Enter the participated event"> -->
            <textarea name="text" id="text" cols="5" rows="5" placeholder="enter any details here"></textarea>
            <button class="button" style="align-self: center;">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    <!-- if(isset($_POST['name'])) -->

    
</body>
</html>
