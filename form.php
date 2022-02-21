<!DOCTYPE html>
<html>
<head>
<body>

<?php
    //set variables to empty values 
    $fullname = $email = $gender = $comment = $number = $age = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fullname = test_input($_POST['name']);
        $number = test_input($_POST['number']);
        $email = test_input($_POST['email']);
        $gender = test_input($_POST['gender']);
        $age = test_input($_POST['age']);
        $comment = test_input($_POST['comment']);
        
    }

    function test_input($data) {
        //remove whitespace from string 
        $data = trim($data);
        //remove backslashes
        $data = stripslashes($data);
        //convert predefined characters to html 
        $data = htmlspecialchars($data);
        return $data;

    }

?>

<h2> Form </h2>

<form method = 'post' action = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'>
    Name : <input type = 'text' name = 'name'> <br> <br>
    Phone number : <input type = 'text' name = 'number'> <br> <br>
    Email : <input type = 'text' name = 'email'> <br> <br>
    Gender:
    <input type = 'radio' name = 'gender' value = 'female'>Female
    <input type = 'radio' name = 'gender' value = 'male'>Male
    <input type = 'radio' name = 'gender' value = 'other'>Other
    <br> <br>
    Age : <input type = 'text' name = 'age'> <br> <br>
    Comment : <textarea name = 'comment' rows = '5' cols = '40'></textarea> <br> <br>
    <input type = 'submit'>
</form>

<?php
    echo '<h2> Your input: </h2>';
    echo $fullname;
    echo '<br>';
    echo $number;
    echo '<br>';
    echo $email;
    echo '<br>';
    echo $gender;
    echo '<br>';
    echo $age;
    echo '<br>';
    echo $comment;

?>

</body>
</head>
</html>