<!DOCTYPE HTML>  
<html>
<head>
    <style> 
        .error{
            color: red;
        } 
    </style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = $comment = $groupno = $courses ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])){
        $nameErr = "*Name is required";
    }
    else{
         $name = test_input($_POST["name"]);
         if(!preg_match("/[^a-zA-Z]/", $_POST['name'] )){
            $nameErr = "Please enter a valid name, only letters allowed";
         }

    }

    if(empty($_POST["email"])){
        $emailErr = "* Email is Required ";
    }
    else{
         $email = test_input($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr= "Please Enter a correct email address";
        }
         
    }

        if(empty($_POST["gender"])){
        $genderErr = "* Gender is Required";
    }
    else{
         $gender = test_input($_POST["gender"]);
         
    }

  $courses = test_input($_POST["courses"]);  
  $groupno = test_input($_POST["groupno"]);
  $comment = test_input($_POST["comment"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<h1>Task 1</h1>

<p> <span class="error"> *Required Input Field</span> </p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  Name *: <input type="text" name="name" required>
  <br><br>
  
  Email *: <input type="text" name="email" required>
  <br><br>
  
  Group no: <input type="text" name="groupno">
  <br><br>

  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>

  Gender *:
  <input type="radio" name="gender" value="female" required>Female
  <input type="radio" name="gender" value="male" required>Male
  <br><br>

  Select Courses: <select name="courses[]" size="4" multiple tabindex="1">
  <option value="PHP"> PHP </option>
  <option value="Javascript"> JAvascript </option>
  <option value="MySQL"> MySQL </option>
  <option value="HTML"> HTML </option>
  <option value="CSS"> CSS </option>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo 'Name'.$name;
echo "<br>";
echo 'Email'.$email;
echo "<br>";
echo 'Group no:'.$groupno;
echo "<br>";
echo 'Comment:'.$comment;
echo "<br>";
echo "Gender".$gender;
echo "<br>";
echo "Courses".$courses;
?>

</body>
</html>
