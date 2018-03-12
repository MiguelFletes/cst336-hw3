<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Account</title>
         <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body style = "background: url(images/stadium2.jpeg) no-repeat; background-size: 111%;">
        
        <?php
            // define variables and set to empty values
            $fName = $lName = $email = $age = $gender = $password = "";
            
            
            $valid = true; 
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                global $valid;
                if (empty($_POST["fName"])) {
                    $fNameErr = "First Name is required";
                    $valid = false; 
                } 
                else {
                    $fName = test_input($_POST["fName"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$fName)) {
                        $fNameErr = "Only letters and white space allowed"; 
                        $valid = false; 
                    }
                }
                if (empty($_POST["lName"])) {
                    $lNameErr = "Last Name is required";
                    $valid = false; 
                } 
                else {
                    $lName = test_input($_POST["lName"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$lName)) {
                        $lNameErr = "Only letters and white space allowed"; 
                        $valid = false; 
                    }
                }
                
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                    $valid = false; 
                } 
                else {
                    $email = test_input($_POST["email"]);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format"; 
                        $valid = false; 
                    }
                }
                if (empty($_POST["password"])) {
                    $passwordErr = "password is required";
                    $valid = false; 
                } 
                else {
                    $password = test_input($_POST["password"]);
                }
                // if (empty($_POST["cPassword"])) {
                //     $emailErr = "password comfirmation is required";
                // } 
                // else {
                //     $email = test_input($_POST["cPassword"]);
                // }
                 if (empty($_POST["age"])) {
                    $ageErr = "Age is required";
                    $valid = false; 
                } 
                else {
                    $age = test_input($_POST["age"]);
                }
                if (empty($_POST["gender"])) {
                    $genderErr = "Sex is required";
                    $valid = false; 
                } 
                else {
                    $gender = test_input($_POST["gender"]);
                }
                
                //$notifications = array();
                //$isChecked = false;
                if(isset($_POST['notifications']) && in_array('mobile', $_POST['notifications']))
                {
                    //$isChecked = true;
                    //$notifications += array(1 => "Mobile");
                    $mobile = "Mobile";
                    setcookie("mobile", $mobile, time() + 3600, '/', 'https://internetprogramming-miguelfletes.c9users.io/assignments/HW3/accountCreated.php');
                }
                //$isChecked = false;
                if(isset($_POST['notifications']) && in_array('email', $_POST['notifications']))
                {
                    //$isChecked = true;
                    //$notifications += array(2 => "Email");
                    $email1 = "Email";
                    setcookie("email1", $email1, time() + 3600, '/', 'https://internetprogramming-miguelfletes.c9users.io/assignments/HW3/accountCreated.php');
                }
                //$isChecked = false;
                if(isset($_POST['notifications']) && in_array('mail', $_POST['notifications']))
                {
                    //$isChecked = true;
                    //$notifications += array(3 => "Mail");
                    $mail = "Mail";
                    setcookie("mail", $mail, time() + 3600, '/', 'https://internetprogramming-miguelfletes.c9users.io/assignments/HW3/accountCreated.php');
                }
                if($_POST['submit'] && $_POST['submit'] != 0)
                {
                   $team = $_POST['team'];
                   setcookie("team", $team, time() + 3600, '/', 'https://internetprogramming-miguelfletes.c9users.io/assignments/HW3/accountCreated.php');
                }
                
                if($valid){
                    setcookie("firstName", $fName, time() + 3600, '/', 'https://internetprogramming-miguelfletes.c9users.io/assignments/HW3/accountCreated.php');
                    setcookie("lastName", $lName, time() + 3600, '/', 'https://internetprogramming-miguelfletes.c9users.io/assignments/HW3/accountCreated.php');
                    setcookie("email", $email, time() + 3600, '/', 'https://internetprogramming-miguelfletes.c9users.io/assignments/HW3/accountCreated.php');
                    setcookie("age", $age, time() + 3600, '/', 'https://internetprogramming-miguelfletes.c9users.io/assignments/HW3/accountCreated.php');
                    setcookie("gender", $gender, time() + 3600, '/', 'https://internetprogramming-miguelfletes.c9users.io/assignments/HW3/accountCreated.php');
                    
                    
                    header('Location: https://internetprogramming-miguelfletes.c9users.io/assignments/HW3/accountCreated.php');
                    exit();
                }
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
            //if valid then redirect
            
        ?>
        
         <div class="outer">
            <header><h1><b>Create an Account</b></h1></header>
            
             <form action="accountCreated.php"   method="POST"> <!-- action="</?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"-->
                <!--<p><span class="error choice">* required field.</span></p>-->
                <div class="choice">
                    <!--<label>Name</label>-->
                    
                    <div style="font-size:20px">First Name: <input type="text" name="fName" value= "" required/>
                        <!--<span class="error">* </?php echo $fNameErr;?></span>-->
                    </div>
                    
                    
                </div>
                 <div class="choice">
                    <!--<label>Name</label>-->
                    <div style="font-size:20px">Last Name: <input type="text" name="lName" value= "" required/><!--</?php echo $lName;?>-->
                        <!--<span class="error">* </?php echo $lNameErr;?></span>-->
                    </div><br>
                    
                </div>
                <div class="choice">
                    <!--<label>Age</label>-->
                    <div style="font-size:20px">Enter Your Age:<input type="number" name="age" value = "" required/><!--</?php echo $age;?>-->
                        <!--<span class="error">* </?php echo $ageErr;?></span>-->
                    </div><br>
                    
                </div>
                <div class="choice">
                    <!--<label>Age</label>-->
                    <div style="font-size:20px">Enter Your Email:<input type="email" name="email" value = "" required/><!--</?php echo $email;?>-->
                        <!--<span class="error">* </?php echo $emailErr;?></span>-->
                    </div><br>
                    
                </div>
                <div class="choice">
                    <!--<label>Age</label>-->
                    <div style="font-size:20px">Password:<input type="password" name="password" value = "" required/><!--</?php echo $password;?>-->
                        <!--<span class="error">* </?php echo $passwordErr;?></span>-->
                    </div>
                    
                    
                </div>
                <!--<div class="choice">-->
                    <!--<label>Age</label>-->
                <!--    <div style="font-size:20px">Confirm Password:<input type="password" name="cPassword" />-->
                        <!--<span class="error">* <?php// echo $cPasswordErr;?></span>-->
                <!--    </div><br>-->
                    
                <!--</div>-->
                <div style="font-size:20px" class="choice">
                    
                    <b>Sex</b><br>
                    <input type="radio" name="gender" 
                    <?php if (isset($gender) && $gender=="female") echo "checked";?> 
                    value="female">Female
                    
                    
                    <input type="radio" name="gender" 
                    <?php if (isset($gender) && $gender=="male") echo "checked";?> 
                    value="male">Male
                    
                    <!--<span class="error">* </?php echo $genderErr;?></span>-->
                </div><br>
                
                
                <div class="choice">
                    <label style="font-size:20px">Favorite Team: </label>
                    <select name="team" >
                        <option value="">Select...</option>
                        <option value="AFC Bournemouth">AFC Bournemouth</option>
                        <option value="Arsenal">Arsenal</option>
                        <option value="Brighton & Hove Albion">Brighton & Hove Albion</option>
                        <option value="Burnley">Burnley</option>
                        <option value="Chelsea">Chelsea</option>
                        <option value="Crystal Palace">Crystal Palace</option>
                        <option value="Everton">Everton</option>
                        <option value="Huddersfield Town">Huddersfield Town</option>
                        <option value="Leicester City">Leicester City</option>
                        <option value="Liverpool">Liverpool</option>
                        <option value="Manchester City">Manchester City</option>
                        <option value="Manchester United">Manchester United</option>
                        <option value="Newcastle United">Newcastle United</option>
                        <option value="Southampton">Southampton</option>
                        <option value="Stoke City">Stoke City</option>
                        <option value="Swansea City">Swansea City</option>
                        <option value="Tottenham Hotspur">Tottenham Hotspur</option>
                        <option value="Watford">Watford</option>
                        <option value="West Bromwich Albion">West Bromwich Albion</option>
                        <option value="West Ham United">West Ham United</option>
                    </select>
                </div>
                <div style="font-size:20px" class="choice">
                    <br><b>Notifications</b><br>
                    <input type="checkbox" name="notifications[]" value="mobile">Mobile</input><br>
                    <input type="checkbox" name="notifications[]" value="email">Email</input><br>
                    <input type="checkbox" name="notifications[]" value="mail">Mail</input><br>
                </div>
                
                <div class= "center" style="margin-bottom:20px">
                    <footer><input type="submit" value="Create Profile" /> <input type="reset" value="Reset"></footer>
                    <!--<button type="button"><a href="#" class="button">Buy Now</a>-->
                </div>
            </form>
            
        </div>
    </body>
</html>