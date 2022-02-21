<!DOCTYPE html>
<html>
<head>
<style>
.error{ color: red; }
</style>
</head>

<body>

<?php

$nameErr = $emailErr = $genderErr = $websiteErr = '';
$name = $email = $gender = $comment = $website = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (empty($_POST['name'])) {
        $nameErr = 'Please enter a name.';
      } else {
        $name = test_input($_POST['name']);
        // ^ - start of line, $ - end of line, * - zero or more of xxx
        if (!preg_match('/^[ a-zA-Z ]*$/', $name)){
            $nameErr = 'Only letters are allowed.';
        }
      }
    
      if (empty($_POST['email'])) {
        $emailErr = 'Please enter an email address.';
      } else {
        $email = test_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = 'Please enter a valid email address.';
        }
      }
    
      if (empty($_POST['website'])) {
        $website = '';
      } else {
        $website = test_input($_POST['website']);
      }
    
      if (empty($_POST['comment'])) {
        $comment = '';
      } else {
        $comment = test_input($_POST['comment']);
      }
    
      if (empty($_POST['gender'])) {
        $genderErr = 'Please select a gender.';
      } else {
        $gender = test_input($_POST['gender']);
      }    
}

function test_input($data) { 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

?>

<h2> Form validation </h2>

<p>
    <span class = 'error'>* Required Field </span>
</p>

<form method = 'post' action = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'>
    Name : <input type = 'text' name = 'name'> 
    <span class = 'error'>* <?php echo $nameErr; ?> </span>
    <br> <br>
    Phone number : <input type = 'text' name = 'number'> <br> <br>
    Email : <input type = 'text' name = 'email'> 
    <span class = 'error'>* <?php echo $emailErr; ?> </span>
    <br> <br>
    Website : <input type = 'text' name = 'website'> 
    <span class = 'error'>* <?php echo $websiteErr; ?> </span>
    <br> <br>
    Gender:
    <input type = 'radio' name = 'gender' value = 'female'>Female
    <input type = 'radio' name = 'gender' value = 'male'>Male
    <input type = 'radio' name = 'gender' value = 'other'>Other
    <span class = 'error'>* <?php echo $genderErr; ?> </span>
    <br> <br>
    Age : <input type = 'text' name = 'age'> <br> <br>
    Comment : <textarea name = 'comment' rows = '5' cols = '40'></textarea> <br> <br>
    <input type = 'submit'>
</form>

<?php
    echo '<h2> Your input: </h2>';
    echo $name;
    echo '<br>';
    echo $email;
    echo '<br>';
    echo $gender;
    echo '<br>';
    echo $website;
    echo '<br>';
    echo $comment;

?>

</body>
</html>