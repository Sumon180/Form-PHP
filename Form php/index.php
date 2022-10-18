<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form php</title>
</head>
<body>
    
    <?php 
    
        $fullname= $email= $gender= $comment= $number= $age= " ";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullname = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            $gender = test_input($_POST["gender"]);
            $comment = test_input($_POST["comment"]);
            $number = test_input($_POST["number"]);
            $age = test_input($_POST["age"]);
            
        }
        function test_input($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
    ?>

    <h1>Form Validation</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <table>
        <tr>
            <td>Full Name:</td>
            <td> <input type="text" name="name" > </td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td> <input type="text" name="email" > </td>
        </tr>
        <tr>
            <td>Number(optional):</td>
            <td> <input type="text" name="number" > </td>
        </tr>
        <tr>
            <td>Age:</td>
            <td> <input type="text" name="age" > </td>
        </tr>
        <tr>
            <td>Comment:</td>
            <td> <textarea name="comment" id="" cols="21" rows="10"></textarea> </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td> <input type="radio" name="gender" value="female">Female </td>            
        </tr>
        <tr>
            <td></td>            
            <td> <input type="radio" name="gender" value="male" >Male </td>
        </tr>
        <tr>
            <td></td>            
            <td> <input type="submit" name="click here" value="Click here" ></td>
        </tr>
    </table>
    
    </form>
    <?php 
        echo "<h2> Your Input: </h2>";
        echo $fullname;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $gender;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $number;
        echo "<br>";
        echo $age;

    
    ?>








</body>
</html>