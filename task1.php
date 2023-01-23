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
$name = $email = $gender = $comment = $groupno = "";

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

  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $groupno;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>