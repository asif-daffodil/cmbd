<?php

    function validData($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

if(isset($_POST["submit1"])){
    $name = validData($_POST["name"]);
    $email = validData($_POST["email"]);
    $gender = validData($_POST["gender"] ?? null);
    $mobile = validData($_POST["mobile"]);
    $dob = validData($_POST["dob"]);
    $user_message = validData($_POST["user_message"]);


    if(empty($name)){
        $message = "Name is required";
    }elseif(!preg_match("/^[A-Za-z. ]*$/", $name)){
        $message = "Special chareter is not allowed";
    }else{
        $correctName = $name;
    }


    if(empty($email)){
        $emessage = "Email is required";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emessage = "valide email is required";
    }else{
        $correctEmail = $email;
    }

    if(empty($gender)){
        $gemessage = "Please select your gender";
    }


    if(empty($mobile)){
        $M_message = "Mobile no is required";
    }elseif(!preg_match("/^01[0-9]{9}$/", $mobile)){
        $M_message = "Please input a valid number";
    }else{
        $correctMobile=$mobile;
    }

    if(empty($dob)){
        $dob_message = "Date of birth is required"; 
    }else{
        $correctDob= $dob;
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation Part-1</title>
</head>
<body>

<div>
    <form action="" method="post">
        <div>
            <label for="name">Name </label> <br>
            <input type="text" name="name" placeholder="Write your name" value="<?= $name ?? null ?>">
            <div style="color: red;">
                <?= $message ?? null ?>
            </div>
        </div>
        <!-- for email  -->
        <div>
            <label for="email">Email </label> <br>
            <input type="text" name="email" placeholder="Write your email" value="<?= $email ?? null ?>"> 

            <div style="color: red;">
                <?= $emessage ?? null ?>
            </div>
        </div>
        
        <!-- for mobile number  -->
        <div>
            <label for="mobile">Mobile No.</label> 
            <br>
            <input type="text" name="mobile" placeholder="Write your mobile no." value="<?= $mobile ?? null ?>">

            <div style="color: red;">
                <?= $M_message ?? null ?>
            </div>
        </div>

        <!-- for date of birth  -->
        <div>
            <label for="dob">Date of birth</label>
            <br>
            <input type="date" name="dob" value="<?= $dob ?? null ?>">

            <div style="color: red;">
                <?= $dob_message ?? null ?>
            </div>
        </div>

        <!-- for gerder  -->
        <div>
            <p>Select your gender</p>
            <input type="radio" id="male" value="Male" name="gender"  >
            <label for="male">Male</label>
            
            <input type="radio" id="female" value="Female" name="gender" >
            <label for="female">Female</label>

            <div style="color: red;">
                <?= $gemessage ?? null ?>
            </div>
        </div>
        

        <!-- for user message or textarea  -->
        <h4>Please write your comments here</h4>
        <textarea name="user_message"  cols="25" rows="5" placeholder="write here!"></textarea>
        

        <br>
        <br>
        <div>
            <input type="submit" value="Submit" name="submit1">
        </div>
    </form>
</div>

<br>
<br>


<!-- below codes are for showing user inputs  -->
<?php
    
    if(!empty($_POST["name"])){
        echo "<h2>Your given inputs are as below:</h2>";
        echo "Your name is : ". $name ?? null;
    }

    echo "<br>";   

    if(!empty($_POST["email"])){
        echo "Your email is : ". $email ?? null;
    }

    echo "<br>"; 

    if(!empty($_POST["gender"])){
        echo "Your gender is : ". $gender ?? null;
    }

    echo "<br>"; 

    if(!empty($_POST["mobile"])){
        echo "Your mobile is : ". $mobile ?? null;
    }

    echo "<br>"; 

    if(!empty($_POST["dob"])){
        echo "Your date of birth is : ". $dob ?? null;
    }

    echo "<br>";

    if(!empty($_POST["user_message"])){
        echo "<span style='color : blue; font-weight: 700'>Your message is as below :</span> <br>". $user_message ?? null;
    }
         
?>
   
</body>
</html>
