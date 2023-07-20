
<?php require_once("./includes/header.php"); ?>

<div>
    <center><h1>IIIT Kalyani Exam Portal<h1></center>

</div>

<!-- Java script to enable/disable Ronn no text box-->
<script type="text/javascript">  
  
  //Validating registration number to accept number only

  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
       
</script> 

                <main>
<!--.................................Signup handelling start...............................................................-->
                    <?php

                        if(isset($_POST['submit'])) 
                        {

                           
                            $first_name = trim($_POST['first-name']);
                            $middle_name = trim($_POST['middle-name']);
                            $last_name = trim($_POST['last-name']);
                            if($middle_name != NULL){
                            $full_name = $salutation . " " . $first_name . " " . $middle_name . " " . $last_name;
                            }else {

                            $full_name = $salutation . " " . $first_name . " " . $last_name;
                            }

                            $full_name = strtoupper(trim($full_name));

                            $email =strtolower(trim($_POST['email-address'])) ;

                            $mobno =trim($_POST['mobno']) ;
                            
                            $course=trim($_POST['course']);

                            $roll = strtoupper(trim($_POST['roll']));


                            

                            $registration_year=trim($_POST['registration-year']);

                           
                            $user_type = "Student";


                            $password = trim($_POST['password']);

                            $password_hash = password_hash($password, PASSWORD_BCRYPT);
                            
                            $confirm_password = trim($_POST['confirm-password']);


                            //Check roll number exists or not
                            $sql_roll_chk = "SELECT * FROM STUDENT where roll_no='$roll'";
                            $stmt_roll_chk = $pdo->prepare($sql_roll_chk);
                            $stmt_roll_chk->execute();
                            $roll_count = $stmt_roll_chk->rowCount();



                            //Check registration number exists or not
                            $sql_regno_chk = "SELECT * FROM STUDENT where reg_no='$reg_no'";
                            $stmt_regno_chk = $pdo->prepare($sql_regno_chk);
                            $stmt_regno_chk->execute();
                            $regno_count = $stmt_regno_chk->rowCount();


                            //Check email exists or not
                            $sql_email_chk = "SELECT * FROM STUDENT where email='$email'";
                            $stmt_email_chk = $pdo->prepare($sql_email_chk);
                            $stmt_email_chk->execute();
                            $email_count = $stmt_email_chk->rowCount();


                            if($password != $confirm_password) {
                                echo "<center><font color=\"red\">Password and confirm password does not match</br></font></center>";
                                //$error = "Password doesn't match";
                            }elseif ($email_count != 0){
                                echo "<center><font color=\"red\">Email \"" . $email . "\" already exist.</font><center>";
                                //die;
                            }elseif ($user_type=="Student" and $roll_count != 0){
                                echo "<center><font color=\"red\">Srudent with roll number '" . $roll . "' already exist.</font><center>";
                                //die;
                            }elseif ($user_type=="Student" and $regno_count != 0){
                                echo "<center><font color=\"red\">Student with registration number '" . $reg_no . "' already exist.</font><center>";
                            //die;
                            }else{
                                    if ($user_type=="Student") {
                                        $sql = "INSERT INTO USERS (email, course, stream, roll_no,  registration_year ,full_name, department, user_type, user_status, password,email_verified) VALUES ('$email', '$course','$stream', '$roll', '$reg_no', '$registration_year', '$full_name', '$department', '$user_type', 'Inactivated', '$password_hash','YES')";

                                        
                                    }else{
                                        //$sql = "INSERT INTO USERS (email, full_name, department, user_type, user_status, password) VALUES ('$email', '$full_name', '$department', '$user_type', 'Inactivated', '$password_hash')";
                                        $sql = "INSERT INTO USERS (email, roll_no,  full_name, department, user_type, user_status, password,email_verified) VALUES ('$email', '$roll', '$roll', '$full_name', '$department', '$user_type', 'Inactivated', '$password_hash','YES')";

                                    }

                                                            
                                    $stmt = $pdo->prepare($sql);
                                    if ($stmt->execute())
                                        {
                                            echo "<center><h1>CONGRATULATIONS " . strtoupper($full_name) . " YOU HAVE BEEN SUCCESSFULLY REGISTERED</h1></br>Go to Home page to Login</center>";
                                            /*
                                            $randomid = mt_rand(100000,999999); 
                                            $sql_totp_gen="INSERT INTO TOTP (email,totp) VALUES ('$email','$randomid')";
                                            $stmt_totp_gen = $pdo->prepare($sql_totp_gen);
                                            $stmt_totp_gen->execute();
                                            */         
                                        }else{
                                                  echo "<center>Error in query execution</center>";
                                                }
                                        
                                  }

                        }
                    ?>
<!--.................................Signup handelling end...............................................................-->

                             <form action="signup.php" method="POST">

                                            <?php 
                                                if(isset($error)) {
                                                    echo "<p class='alert alert-danger'>{$error}</p>";
                                                }
                                            ?>

                                    <table align="center" border="2">
                                        


                                            <tr style="color:purple"><td>User Type</td>  <td>Student</td></tr>
                                            <input type="hidden" name="user-type"  value="Student">
                                            <input type="hidden" name="salutation" value="None">

                                            <tr style="color:purple"><td>First Name</td><td>
                                                        <input name="first-name" id="inputFirstName" type="text" placeholder="Enter first name" required="true" style="width: 300px;"/></td></tr>

                                            <tr style="color:purple"><td>Middle Name</td><td>
                                                        <input name="middle-name" id="inputMiddleName" type="text" placeholder="Enter middle name" style="width: 300px;"/></td></tr>

                                            <tr style="color:purple"><td>Last Name</td><td>
                                                        <input name="last-name" id="inputLastName" type="text" placeholder="Enter last name" style="width: 300px;"/></td></tr>
                                            
                                             <tr style="color:purple"><td>Email</td><td>
                                                <input name="email-address" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter institute email address" required="true" style="width: 300px;"/></td></tr>

                                                <tr style="color:purple"><td>Mobile No</td><td>
                                                <input name="mobno"  placeholder="Enter 10 digit mobile no" required="true" style="width: 300px;" pattern="[1-9]\d{9}" minlength="10" maxlength="10" onkeypress="return isNumberKey(event)"/></td></tr>

                                             <tr style="color:purple"><td>Course</td><td>
                                                <select name="course"  type="text" />
                                                
                                                  <?php 
                                                  ## Fetch cources
                                                  $sql = "SELECT DISTINCT course FROM AUTO_POPULATION where course!='NA'";
                                                  $stmt = $pdo->prepare($sql);
                                                  $stmt->execute();
                                                
                                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){

                                                    //if ($var['course']!="NA") {
                                                        echo "<option value='".$var['course']."'>".$var['course']."</option>";
                                                    //}
                                                  
                                                     
                                                  }
                                                  ?>                                               

                                            </select></td></tr>

                                            <tr style="color:purple"><td>Roll No</td><td>
                                              
                                              <input name="roll" id="inputRoll" type="text"  placeholder="Enter your roll number" required="true" style="width: 300px;" minlength="5" maxlength="20" />
                                              </td></tr>

                                            

                                             <tr style="color:purple"><td>Registration Year</td><td>

                                                <input type="text" name="registration-year" placeholder="YYYY" minlength="9" maxlength="9" pattern="\d{4}">
                                                </td></tr>

                                          

                                            <tr style="color:purple"><td>Password</td><td>
                                                        <input name="password" id="inputPassword" type="password" placeholder="Enter password" required="true" style="width: 300px;" minlength="6" maxlength="12" /></td></tr>
                                              

                                            <tr style="color:purple"><td>Confirm Password</td><td>
                                                        <input name="confirm-password" id="inputConfirmPassword" type="password" placeholder="Confirm password" required="true" style="width: 300px;" minlength="6" maxlength="12"/></td></tr>
                                                

                                            <tr style="color:purple"><td colspan=2 align="center">
                                                <button name="submit" style="background-color:yellow;margin:auto;display:block;text-align:center;" type="submit">Create Account</button></td></tr>
                                            
                                        </form>
                                   
                </main>

            </table>

            <center>Already have an account? <a href="./index.php">Click Here</a> to Login</center>
<?php require_once("./includes/footer.php"); ?>