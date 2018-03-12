<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Account Created</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body style = "background: url(images/stadium2.jpeg) no-repeat; background-size: 111%;">
        
        <div class="outer">
            <header><h1><b>Account Profile</b></h1></header>
            
             <form action="index.php"   method="POST"> <!-- action="</?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"-->
                <!--<p><span class="error choice">* required field.</span></p>-->
                <div class="choice">
                    <!--<label>Name</label>-->
                    
                    <div style="font-size:20px">First Name: <input type="text" name="fName" value="<?php echo $_POST["fName"];?>" />
                        <!--<span class="error">* </?php echo $fNameErr;?></span>-->
                    </div>
                    
                    
                </div>
                 <div class="choice">
                    <!--<label>Name</label>-->
                    <div style="font-size:20px">Last Name: <input type="text" name="lName" value= "<?php echo $_POST["lName"];?>" /><!--</?php echo $lName;?>-->
                        <!--<span class="error">* </?php echo $lNameErr;?></span>-->
                    </div><br>
                    
                </div>
                <div class="choice">
                    <!--<label>Age</label>-->
                    <div style="font-size:20px">Enter Your Age:<input type="text" name="age" value = "<?php echo $_POST["age"];?>" /><!--</?php echo $age;?>-->
                        <!--<span class="error">* </?php echo $ageErr;?></span>-->
                    </div><br>
                    
                </div>
                <div class="choice">
                    <!--<label>Age</label>-->
                    <div style="font-size:20px">Enter Your Email:<input type="email" name="email" value = "<?php echo $_POST["email"];?>" /><!--</?php echo $email;?>-->
                        <!--<span class="error">* </?php echo $emailErr;?></span>-->
                    </div><br>
                    
                </div>
                <div class="choice">
                    <!--<label>Age</label>-->
                    <div style="font-size:20px">Password:<input type="password" name="password" value = "*********" /><!--</?php echo $password;?>-->
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
                    <p class="para">Sex:  
                        <b>
                            <?php 
                                if(empty($_POST["gender"]))
                                {
                                    echo "not specified";
                                }
                                else{
                                    echo $_POST["gender"]; 
                                }
                            
                            //   if(isset($_COOKIE["gender"])) {
                            //         echo $_COOKIE["gender"];
                            //     } 
                            ?>
                        </b> 
                    </p>
                </div>
                
                
                <div class="choice">
                    <p class="para">Favortite Team: 
                        <b>
                            <?php 
                            
                                if(empty($_POST["team"]))
                                {
                                    echo "not specified";
                                }
                                else{
                                    echo $_POST["team"]; 
                                }
                            //   if(isset($_COOKIE["team"])) {
                            //         echo $_COOKIE["team"];
                            //     } 
                            ?>
                        </b> 
                    </p> 
                </div>
                <div style="font-size:20px" class="choice">
                
                <p class="para">Notifications via:</p>
            
                    <?php
                        $notif = $_POST["notifications"];
                        
                        if(empty($notif))
                        {
                            echo "<p class='para2'> \tOpted out of Notifications</p><br>";
                        }
                        else{
                            foreach($notif as &$notifications)
                            {
                                if($notifications == "mobile")
                                {
                                    echo "<p class='para2'> \tMobile</p>";
                                }
                                if($notifications == "email")
                                {
                                    echo "<p class='para2'> \tEmail</p>";
                                }
                                if($notifications == "mail")
                                {
                                    echo "<p class='para2'> \tMail</p>";
                                }
                            }
                        }
                    ?>
                </div>
                
                <div class= "center" style="margin-bottom:20px">
                    <footer><input type="submit" value="Update Profile" />
                </div>
            </form>
            <p> Based on your account profile, we recommend: </p>
            <ul>
                <li><?php echo $_POST["team"];?> Benie</li>
                <li>
                    <?php 
                        if($_POST["age"] < 18){
                            echo $_POST["gender"] . " " . $_POST["team"] . "children jerseys";
                        }
                        else {
                            echo $_POST["gender"] . " " . $_POST["team"] . " adult jerseys";
                        }
                    ?>
                </li>
            </ul>
            
        </div>
        
    </body>
</html>