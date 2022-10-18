
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{ color: #ff0000;}
    </style>
</head>

<body>

<?php  
    $nameErr= $emailErr= $genderErr= $websiteErr= " ";
    $name= $email= $gender= $comment= $website= " ";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Please enter a valid name";
        }else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-']*$/",$name)) {
                $nameErr = "Only letters and white spaces allowed";
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "Valid Email Address";
        }else{
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "the email address is incorrect";
            }
        }
        if (empty($_POST["website"])) {
            $website = " ";
        }else {
            $website = test_input($_POST["website"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "Enter a valid Website URL";
            }
        }
        if (empty($_POST["comment"])) {
            $comment = " ";
        }else {
            $comment = test_input($_POST["comment"]);
            
        }
        if (empty($_POST["gender"])) {
            $genderErr = "Please select a gender ";
        }else {
            $gender = test_input($_POST["gender"]);
            
        }
    }
    
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<table>
        <tr>
            <td>Full Name:</td>
            <td> <input type="text" name="name" ><span class="error">* <?php echo $nameErr ?></span> </td>
           
        </tr>
        <tr>
            <td>E-mail:</td>
            <td> <input type="text" name="email" > <span class="error">* <?php echo $emailErr ?></span></td>
            
        </tr>
        <tr>
            <td>Website:</td>
            <td> <input type="text" name="website" ><span class="error">* <?php echo $websiteErr ?></span> </td>
            
        </tr>
        <tr>
            <td>Comment:</td>
            <td> <textarea name="comment" id="" cols="21" rows="10"></textarea> </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td> <input type="radio" name="gender" value="male" >Male </td>                     
                   
        </tr>
        <tr>
            <td></td>            
            <td> <input type="radio" name="gender" value="female">Female</td>          
                   
        </tr>
        <tr>
            <td></td>            
            <td> <span class="error">* <?php echo $genderErr ?></span> </td>                   
        </tr>
        
        <tr>
            <td></td>            
            <td> <input type="submit" name="submit" value="Submit" ></td>
        </tr>
    </table>
</form>
<?php 

echo "<h2> Your Input: </h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $gender;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $website;
        
?>
    
</body>
</html>



