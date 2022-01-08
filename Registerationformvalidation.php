<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>JavaScript Form validation</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var name = document.contactForm.name.value;
    var email = document.contactForm.email.value;
    var mobile = document.contactForm.mobile.value;
    var country = document.contactForm.country.value;
    var gender = document.contactForm.gender.value;
    var mydate = document.contactForm.mydate.value;
    var mytime = document.contactForm.mytime.value;
         
		  
	// Defining error variables with a default value
    var nameErr = emailErr = mobileErr = countryErr = genderErr = dateErr = timeErr = true;
    
    // Validate name
    if(name == "") {
        printError("nameErr", "Please enter your name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid name");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
    }
    
    // Validate email address
    if(email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
    
    // Validate mobile number
    if(mobile == "") {
        printError("mobileErr", "Please enter your mobile number");
    } else {
        var regex = /^[6-9]\d{9}$/;
        if(regex.test(mobile) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("mobileErr", "");
            mobileErr = false;
        }
    }
    
    // Validate country
    if(country == "Select") {
        printError("countryErr", "Please select your country");
    } else {
        printError("countryErr", "");
        countryErr = false;
    }
    
    // Validate gender
    if(gender == "") {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }
	
	
	 // Validate Date
    if(mydate == "") {
        printError("dateErr", "Please select date");
    } else {
        printError("dateErr", "");
        dateErr = false;
    }
	
	
		 // Validate Time
    if(mytime == "") {
        printError("timeErr", "Please select time");
    } else {
        printError("timeErr", "");
        timeErr = false;
    }

    
    // Prevent the form from being submitted if there are any errors
    if((nameErr || emailErr || mobileErr || countryErr || genderErr || dateErr || timeErr) == true) {
       return false;
    } else {
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
                          "Full Name: " + name + "\n" +
                          "Email Address: " + email + "\n" +
                          "Mobile Number: " + mobile + "\n" +
                          "Country: " + country + "\n" +
                          "Gender: " + gender + "\n" +
						  "Date: " + mydate + "\n" +
						  "Time: " + mytime + "\n" ;


        }
        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    
};
</script>
</head>
<body>
<center>    
<form name="contactForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
    <h2>Application Form</h2>
    <div class="row">
        <label>Full Name</label>
        <input type="text" name="name">
        <div class="error" id="nameErr"></div>
    </div>
    <div class="row">
        <label>Email Address</label>
        <input type="text" name="email">
        <div class="error" id="emailErr"></div>
    </div>
    <div class="row">
        <label>Mobile Number</label>
        <input type="text" name="mobile" maxlength="10">
        <div class="error" id="mobileErr"></div>
    </div>
	<div class="row">
        <label>Date</label>
        <input type="date" name="mydate">
        <div class="error" id="dateErr"></div>
    </div>
	<div class="row">
        <label>Time</label>
        <input type="time" name="mytime">
        <div class="error" id="timeErr"></div>
    </div>
    <div class="row">
        <label>Country</label>
        <select name="country">
            <option>Select</option>
            <option>Australia</option>
            <option>India</option>
            <option>United States</option>
            <option>United Kingdom</option>
        </select>
        <div class="error" id="countryErr"></div>
    </div>
    <div class="row">
        <label>Gender</label>
        <div class="form-inline">
            <label><input type="radio" name="gender" value="Male">Male</label>
            <label><input type="radio" name="gender" value="Female">Female</label>
             <label><input type="radio" name="gender" value="Other">Other</label>
        </div>
        <div class="error" id="genderErr"></div>
    </div>
    <div class="row">
        <input type="submit" name="submit" value="Submit">
    </div>
</form>
</center>
</body>
</html>
<?php
error_reporting(0);
?>
<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "my_db";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
else
if(isset($_POST['submit']))
{	 
	 $fullname = $_POST['name'];
	 $emailaddress = $_POST['email'];
	 $mobilenumber = $_POST['mobile'];
	  $mydate = date('Y-m-d',strtotime($_POST['mydate']));
	 $mytime = $_POST['mytime'];
	 $mycountry = $_POST['country'];
	 $mygender = $_POST['gender'];
  	 $sql = "insert into person (name,emailid,mobilenumber,mydate,mytime,country,gender)
	 VALUES ('$fullname','$emailaddress','$mobilenumber','$mydate','$mytime','$mycountry','$mygender')";
	 if (mysqli_query($conn, $sql)) {
			
	 } 
     

     else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
    }


?>