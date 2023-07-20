
<?php require_once("./includes/header.php"); ?>

<div>
    <center><h1>IIIT Kalyani Exam Portal<h1></center>

</div>

<!-- Java script to enable/disable Ronn no text box-->
<script type="text/javascript">  
  
  //Enabling/Disabling Salutation, roll no and registration number
   function EnableDisableTextBox() {
            if (document.getElementById("userType").value == "Student") {
            document.getElementById("inputRoll").disabled = false ;
            document.getElementById("inputRoll").required = true ;
            document.getElementById("inputRegno").disabled = false ;
            document.getElementById("inputRegno").required = true ;

            document.getElementById("inputCourse").disabled = false ;
            document.getElementById("inputCourse").required = true ;
            document.getElementById("inputStream").disabled = false ;
            document.getElementById("inputStream").required = true ;
            document.getElementById("inputRegistrationYear").disabled = false ;
            document.getElementById("inputRegistrationYear").required = true ;

            document.getElementById("inputSalutation").required = false ;
            document.getElementById("inputSalutation").disabled = true ;
            }
            else {
            //document.getElementById("inputRoll").disabled = true;
            //document.getElementById("inputRoll").required = false ;
            document.getElementById("inputRoll").disabled = false ;
            document.getElementById("inputRoll").required = true ;
            document.getElementById("inputRegno").disabled = true;
            document.getElementById("inputRegno").required = false ;
            document.getElementById("inputCourse").disabled = true;
            document.getElementById("inputCourse").required = false ;
            document.getElementById("inputStream").disabled = true;
            document.getElementById("inputStream").required = false ;
            document.getElementById("inputRegistrationYear").disabled = true;
            document.getElementById("inputRegistrationYear").required = false ;
            document.getElementById("inputSalutation").required = true ;
            document.getElementById("inputSalutation").disabled = false ;
            }
    }

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

                            $user_type = trim($_POST['user-type']);
                            if ($user_type=='Student') {
                                $salutation = '';
                            }else{
                                $salutation = trim($_POST['salutation']);
                            }
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
                            
                            $course=trim($_POST['course']);

                            $roll = strtoupper(trim($_POST['roll']));


                            $reg_no = trim($_POST['reg-no']);

                            $registration_year=trim($_POST['registration-year']);

                            $department = trim($_POST['department']);

                            $stream = trim($_POST['stream']);

                            $user_type = trim($_POST['user-type']);


                            $password = trim($_POST['password']);

                            $password_hash = password_hash($password, PASSWORD_BCRYPT);
                            
                            $confirm_password = trim($_POST['confirm-password']);


                            //Check roll number exists or not
                            $sql_roll_chk = "SELECT * FROM USERS where roll_no='$roll'";
                            $stmt_roll_chk = $pdo->prepare($sql_roll_chk);
                            $stmt_roll_chk->execute();
                            $roll_count = $stmt_roll_chk->rowCount();



                            //Check registration number exists or not
                            $sql_regno_chk = "SELECT * FROM USERS where reg_no='$reg_no'";
                            $stmt_regno_chk = $pdo->prepare($sql_regno_chk);
                            $stmt_regno_chk->execute();
                            $regno_count = $stmt_regno_chk->rowCount();


                            //Check email exists or not
                            $sql_email_chk = "SELECT * FROM USERS where email='$email'";
                            $stmt_email_chk = $pdo->prepare($sql_email_chk);
                            $stmt_email_chk->execute();
                            $email_count = $stmt_email_chk->rowCount();


                            if (!preg_match("/^[a-z0-9_]+@iiitkalyani\.ac\.in$/", $email, $match)){ 
                        
                                echo "<center><strong><font color=\"red\">Email only from domain `iiitkalyani.ac.in` is allowed</font></strong></center>";
                                //echo "<center></br><a href=\"./signup.php\">Click Here</a> to try again</center>";
                                //die;
                            }elseif($password != $confirm_password) {
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
                                        $sql = "INSERT INTO USERS (email, course, stream, roll_no, reg_no, registration_year ,full_name, department, user_type, user_status, password,email_verified) VALUES ('$email', '$course','$stream', '$roll', '$reg_no', '$registration_year', '$full_name', '$department', '$user_type', 'Inactivated', '$password_hash','YES')";

                                        
                                    }else{
                                        //$sql = "INSERT INTO USERS (email, full_name, department, user_type, user_status, password) VALUES ('$email', '$full_name', '$department', '$user_type', 'Inactivated', '$password_hash')";
                                        $sql = "INSERT INTO USERS (email, roll_no, reg_no, full_name, department, user_type, user_status, password,email_verified) VALUES ('$email', '$roll', '$roll', '$full_name', '$department', '$user_type', 'Inactivated', '$password_hash','YES')";

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
                                        


                                            <tr style="color:purple"><td>User Type</td><td>
                                                <select name="user-type"  id="userType" required="true" onchange="EnableDisableTextBox()" />
                                                <?php 
                                                  ## Fetch user type
                                                  $sql = "SELECT DISTINCT user_role FROM AUTO_POPULATION where (user_role!='NA' and user_role!='DB-Admin')";
                                                  $stmt = $pdo->prepare($sql);
                                                  $stmt->execute();
                                                
                                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                    //if ($var['user_role']!='NA') {
                                                        echo "<option value='".$var['user_role']."'>".$var['user_role']."</option>";
                                                    //}
                                                     
                                                  }
                                                  ?>

                                                </select>

                                            </td></tr>


                                            <tr style="color:purple"><td>Salutation</td><td>
                                                <select name="salutation"  id="inputSalutation" type="text" required="true" />
                                                <option value=" ">None</option> 
                                                <option value="Prof.">Prof.</option>
                                                <option value="Dr.">Dr.</option>  
                                                <option value="Mr.">Mr.</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Mrs.">Mrs.</option>
                                                  

                                            </select>



                                                    </td></tr>

                                            <tr style="color:purple"><td>First Name</td><td>
                                                        <input name="first-name" id="inputFirstName" type="text" placeholder="Enter first name" required="true" style="width: 300px;"/></td></tr>

                                            <tr style="color:purple"><td>Middle Name</td><td>
                                                        <input name="middle-name" id="inputMiddleName" type="text" placeholder="Enter middle name" style="width: 300px;"/></td></tr>

                                            <tr style="color:purple"><td>Last Name</td><td>
                                                        <input name="last-name" id="inputLastName" type="text" placeholder="Enter last name" style="width: 300px;"/></td></tr>
                                            
                                             <tr style="color:purple"><td>Email</td><td>
                                                <input name="email-address" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter institute email address" required="true" style="width: 300px;"/></td></tr>


                                             <tr style="color:purple"><td>Course</td><td>
                                                <select name="course"  id="inputCourse" type="text" disabled="true" required="false" />
                                                
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

                                            <tr style="color:purple"><td>Roll No/Employee ID</td><td>
                                              <!--  <input name="roll" id="inputRoll" type="text"  placeholder="Enter your roll number" disabled="true" required="false" style="width: 300px;" minlength="5" maxlength="20" /> -->
                                              <input name="roll" id="inputRoll" type="text"  placeholder="Enter your roll number/emp id" required="false" style="width: 300px;" minlength="5" maxlength="20" />
                                            </br>example for PhD ECE student: PhD/ECE/20005</br>example for PhD CSE student: PhD/CSE/20005</br>example for BTech CSE student: CSE/20005</br>example for BTech ECE student: ECE/20005, Employee ID: 172033</td></tr>

                                            <tr style="color:purple"><td>Registration No</td><td>
                                                <input name="reg-no" id="inputRegno" type="text"  placeholder="Enter your 6 digit registration number" disabled="true" required="false"  style="width: 300px;" onkeypress="return isNumberKey(event)" maxlength="6"/></br>example: 000546</td></tr>

                                             <tr style="color:purple"><td>Registration Year</td><td>
                                                <select name="registration-year"  id="inputRegistrationYear" type="text" disabled="true"  required="false" />
                                                
                                                  <?php 
                                                  ## Fetch registration year
                                                  $sql = "SELECT DISTINCT academic_session FROM AUTO_POPULATION where academic_session!='NA'";
                                                  $stmt = $pdo->prepare($sql);
                                                  $stmt->execute();
                                                
                                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                    //if ($var['academic_session']!='NA') {
                                                     echo "<option value='".$var['academic_session']."'>".$var['academic_session']."</option>";
                                                    //}
                                                  }
                                                  ?>                                               

                                            </select></td></tr>


                                            <tr style="color:purple"><td>Department</td><td>
                                                <select name="department" id="inputDepartment" type="text"  required="true" />

                                                  <?php 
                                                  ## Fetch department
                                                  $sql = "SELECT DISTINCT department FROM AUTO_POPULATION where department!='NA'";
                                                  $stmt = $pdo->prepare($sql);
                                                  $stmt->execute();
                                                
                                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                    //if ($var['department']!='NA') {
                                                     echo "<option value='".$var['department']."'>".$var['department']."</option>";
                                                    //}
                                                  }
                                                  ?>

                                            </select>
                                            </td></tr>

                                        <tr style="color:purple"><td>Stream</td><td>
                                                <select name="stream"  id="inputStream" type="text" disabled="true" required="false" />
                                                
                                                  <?php 
                                                  ## Fetch stream
                                                  $sql = "SELECT DISTINCT stream FROM AUTO_POPULATION where stream!='NA'";
                                                  $stmt = $pdo->prepare($sql);
                                                  $stmt->execute();
                                                
                                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){

                                                    //if ($var['course']!="NA") {
                                                        echo "<option value='".$var['stream']."'>".$var['stream']."</option>";
                                                    //}
                                                  
                                                     
                                                  }
                                                  ?>                                               

                                            </select></td></tr>
                                           

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