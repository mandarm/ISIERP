
<?php 

if (session_status() == PHP_SESSION_NONE) {
      session_start();
   }
 $x=$_SESSION['user_role'];  
   
if ($x=='PI-Exam') {
 require_once("./includes/header_pi_exam.php");
}


if ($x=='Academic-Incharge') {
 require_once("./includes/header_academic_incharge.php");
}
if ($x=='DB-Admin') {
 require_once("./includes/header_admin.php");
}

?>

<!--..............................CheckAll Java script  start..............................--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
        <script src="./js/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){

          // Check/Uncheck ALl
          $('#checkAll').change(function(){
            if($(this).is(':checked')){
              $('input[name="update[]"]').prop('checked',true);
            }else{
              $('input[name="update[]"]').each(function(){
                 $(this).prop('checked',false);
              });
            }
          });

          // Checkbox click
          $('input[name="update[]"]').click(function(){
            var total_checkboxes = $('input[name="update[]"]').length;
            var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

            if(total_checkboxes_checked == total_checkboxes){
               $('#checkAll').prop('checked',true);
            }else{
               $('#checkAll').prop('checked',false);
            }
          });
        });


        function isNumberKey(evt)
            {
               var charCode = (evt.which) ? evt.which : event.keyCode
               if (charCode > 31 && (charCode < 48 || charCode > 57))
                  return false;

               return true;
            }
    </script>

   <!--..............................CheckAll Java script  end..............................-->


<?php
	if (isset($_POST['upload_sublects_offered'])) {
		
?>
	<div id="wrapper" align="center">
		<font color="red" size="9">Upload offered subject details (Regular)</font></br>
		<a href="./sample_files/OFFERED_SUBJECT_SAMPLE_FORMAT.csv" download>Click here</a> for sample format<br><a href="./sample_files/Ins.pdf" target="_blank">Click here</a> for Instruction to fill the CSV file</br></br></br>
 		<form method="post" action="./import_file_acad.php" enctype="multipart/form-data">
 			<table border="1">
 				<tr>
  						<td>Course Name</td>
  						<td>
  							<select id='sel_course_name' name='sel_course_name'>
  							<?php 
                                  ## Fetch courses
                                  
                                  /*$sql = "SELECT DISTINCT course FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['course']!='NA') {
                                       echo "<option value='".$var['course']."'>".$var['course']."</option>";
                                   }
                                                     
                                 }*/


                                 if ($_SESSION['email']=='phdcoordinator@iiitkalyani.ac.in') {
                                   echo "<option value='Doctor of Philosophy'>Doctor of Philosophy</option>";
                                 }elseif ($_SESSION['email']=='cep@iiitkalyani.ac.in') {
                                    echo "<option value='Master of Technology'>Master of Technology</option>";
                                     echo "<option value='Executive Master of Technology'>Executive Master of Technology</option>";

                                  }else{
                                   echo "<option value='Bachelor of Technology'>Bachelor of Technology</option>";
                                 }

                ?>
                    
                  </select>

  						</td>
  				</tr>

				<tr>
  						<td>Academic Year</td>
  						<td>
  							<select id='sel_academic_year' name='sel_academic_year'>
  							<?php 
                                  
                                  ## Fetch current session
                                  $sql = "SELECT DISTINCT current_session FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['current_session']!='NA') {
                                       echo "<option value='".$var['current_session']."'>".$var['current_session']."</option>";
                                   }
                                                     
                                 }

                                 
                ?>
                              </select>

  						</td>
  				</tr>

  				<tr>
  						<td>Department</td>
  						<td>
  							<select id='sel_department' name='sel_department'>
  							<?php 
                  /*
                                  ## Fetch department
                                  $sql = "SELECT DISTINCT department FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['department']!='NA' and $var['department']!='Administration') {
                                       echo "<option value='".$var['department']."'>".$var['department']."</option>";
                                   }
                                                     
                                 }*/

                                  if ($_SESSION['email']=='phdcoordinator@iiitkalyani.ac.in') {
                                   echo "<option value='Computer Science & Engineering'>Computer Science & Engineering</option>";
                                   echo "<option value='Electronics & Communication Engineering'>Electronics & Communication Engineering</option>";
                                   echo "<option value='Mathematics'>Mathematics</option>";
                                   echo "<option value='Physics'>Physics</option>";
                                 }elseif ($_SESSION['email']=='cep@iiitkalyani.ac.in') {
                                    echo "<option value='Computer Science & Engineering'>Computer Science & Engineering</option>";
                                     

                                  }else{
                                   echo "<option value='Computer Science & Engineering'>Computer Science & Engineering</option>";
                                   echo "<option value='Electronics & Communication Engineering'>Electronics & Communication Engineering</option>";
                                 }


                ?>
                              </select>

  						</td>
  				</tr>

  				<tr>
  						<td>Stream</td>
  						<td>
  							<select id='sel_stream' name='sel_stream'>
  							<?php 
                                  /*## Fetch stream
                                  $sql = "SELECT DISTINCT stream FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['stream']!='NA') {
                                       echo "<option value='".$var['stream']."'>".$var['stream']."</option>";
                                   }
                                                     
                                 }*/

                                  if ($_SESSION['email']=='phdcoordinator@iiitkalyani.ac.in') {
                                   echo "<option value='Computer Science & Engineering'>Computer Science & Engineering</option>";
                                   echo "<option value='Electronics & Communication Engineering'>Electronics & Communication Engineering</option>";
                                   echo "<option value='Mathematics'>Mathematics</option>";
                                   echo "<option value='Physics'>Physics</option>";
                                 }elseif ($_SESSION['email']=='cep@iiitkalyani.ac.in') {
                                    echo "<option value='AI & Data Science'>AI & Data Science</option>";
                                    echo "<option value='Advanced Communication Systems and Signal Processing'>Advanced Communication Systems and Signal Processing</option>";
                                     

                                  }else{
                                   echo "<option value='Computer Science & Engineering'>Computer Science & Engineering</option>";
                                   echo "<option value='Electronics & Communication Engineering'>Electronics & Communication Engineering</option>";
                                 }
                ?>
                              </select>

  						</td>
  				</tr>

  				<tr>
  						<td>Semester</td>
  						<td>
  							<select id='sel_semester' name='sel_semester'>
                    <?php 
                                  ## Fetch semester
                                  $sql = "SELECT DISTINCT semester_number FROM AUTO_POPULATION where semester_number!='NA' union SELECT DISTINCT phd_sem from AUTO_POPULATION where phd_sem!='NA'";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  //if ($var['stream']!='NA') {
                                       echo "<option value='".$var['semester_number']."'>".$var['semester_number']."</option>";
                                   //}
                                                     
                                 }
                ?>
                         
                            </select>
              </br><font color="blue">Choose Autumn ####-#### or Spring ####-#### for PhD;</br>Choose # for BTech/MTech;</font>
  						</td>
  				</tr>



 				<tr align="center">
  						<td>Choose your CSV file</td>
  						<td align="center"><input type="file" name="file" value="Choose CSV file" accept=".xls,.xlsx" required="true" /></td>
  						
  				</tr>

  				 <tr>
  						
  						<td colspan="2" align="center" ><input style="background-color:blue;color: white;" type="submit" name="upload_course_data" value="Upload"/></td>
  				</tr>
  			</table>
 		</form>

    
	</div>
<?php

} 


?>
<!--......................................backlog course uploading.................................-->
<?php
  if (isset($_POST['upload_backlog_sublects_offered'])) {
    
?>
  <div id="wrapper" align="center">
    <font color="red" size="9">Upload offered subject details (Re-registered)</font></br>
    <a href="./sample_files/OFFERED_SUBJECT_SAMPLE_FORMAT.csv" download>Click here</a> for sample format<br><a href="./sample_files/Ins.pdf" target="_blank">Click here</a> for Instruction to fill the CSV file</br></br>
    <form method="post" action="./import_file_acad.php" enctype="multipart/form-data">
      <table border="1">
        <tr>
              <td>Course Name</td>
              <td>
                <select id='sel_course_name' name='sel_course_name'>
                <?php 
                                  ## Fetch courses
                                  $sql = "SELECT DISTINCT course FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['course']!='NA' and $var['course']!='Doctor of Philosophy') {
                                       echo "<option value='".$var['course']."'>".$var['course']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

        <tr>
              <td>Academic Year</td>
              <td>
                <select id='sel_academic_year' name='sel_academic_year'>
                <?php 
                                  ## Fetch current session
                                  $sql = "SELECT DISTINCT current_session FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['current_session']!='NA') {
                                       echo "<option value='".$var['current_session']."'>".$var['current_session']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

          <tr>
              <td>Department</td>
              <td>
                <select id='sel_department' name='sel_department'>
                <?php 
                                  ## Fetch department
                                  $sql = "SELECT DISTINCT department FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['department']!='NA' and $var['department']!='Administration') {
                                       echo "<option value='".$var['department']."'>".$var['department']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

          <tr>
              <td>Stream</td>
              <td>
                <select id='sel_stream' name='sel_stream'>
                <?php 
                                  ## Fetch stream
                                  $sql = "SELECT DISTINCT stream FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['stream']!='NA') {
                                       echo "<option value='".$var['stream']."'>".$var['stream']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

          <tr>
              <td>Semester</td>
              <td>
                <select id='sel_semester' name='sel_semester'>
                    <?php 
                                  ## Fetch semester
                                  $sql = "SELECT DISTINCT semester_number FROM AUTO_POPULATION where semester_number!='NA'";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  //if ($var['stream']!='NA') {
                                       echo "<option value='".$var['semester_number']."'>".$var['semester_number']."</option>";
                                   //}
                                                     
                                 }
                ?>
                         
                            </select>

              </td>
          </tr>



        <tr align="center">
              <td>Choose your CSV file</td>
              <td align="center"><input  type="file" name="file" value="Choose CSV file" accept=".xls,.xlsx" required="true" /></td>
              
          </tr>

           <tr>
              
              <td colspan="2" align="center"><input style="background-color:blue;color: white;" type="submit" name="upload_backlog_course_data" value="Upload"/></td>
          </tr>
        </table>
    </form>

    
  </div>
<?php

} 


?>





<?php

//Change password code

if (isset($_POST['change-password-btn'])) {
      $email = $_SESSION['email'];
      $current_password=trim($_POST['current-password']);
      $new_password=trim($_POST['new-password']);
      $password_hash = password_hash($new_password, PASSWORD_BCRYPT,);

      $confirm_password=trim($_POST['confirm-password']);

      $sql_email_chk = "SELECT * FROM USERS where email='$email'";
                                            
      $stmt_email_chk = $pdo->prepare($sql_email_chk);
      $stmt_email_chk->execute();
      $user = $stmt_email_chk->fetch(PDO::FETCH_ASSOC);
      $user_password_hash = $user['password'];

      if ($new_password != $confirm_password) {
                echo "<center><font color=\"red\">New Password and confirm password does not match</br></font></center>";
                $_POST['change-password']='change-password';


      }elseif (password_verify($current_password, $user_password_hash)){

          $sql_password_update = "UPDATE USERS SET password='$password_hash' where email='$email'";
          $stmt_password_update = $pdo->prepare($sql_password_update);
          $stmt_password_update->execute();
          session_destroy();
          ?>
            <center><font color="red" size="5"> Password updated successfully</font></center>
          <?php 
          //header("Refresh:0;url=./index.php");
          ob_end_flush();



      }else{
          echo "<center><font color=\"red\">Wrong Current password</font></center>";
           $_POST['change-password']='change-password';

      }
}


//Change password form generation

if (isset($_POST['change-password'])) {
  
?>
  <center><font color="green"><strong>Change Password</strong></font></center>
  <center><font color="blue">After password changed, you will be logged out. You need to login again using new password.</font></center>

<form action="./academic_incharge_dashboard.php" method="POST">
<table align="center" border="1">
    
<tr style="color:purple"><td>Current Password</td>
  <td>
        <input name="current-password" id="inputCurrentPassword" type="password" placeholder="Enter current password" required="true" style="width: 300px;" minlength="3" maxlength="12" />
    </td>
</tr>

<tr style="color:purple"><td>New Password</td>
  <td>
        <input name="new-password" id="inputNewPassword" type="password" placeholder="Enter new password" required="true" style="width: 300px;" minlength="6" maxlength="12" />
    </td>
</tr>
                                              

 <tr style="color:purple"><td>Confirm New Password</td>
  <td>
      <input name="confirm-password" id="inputConfirmPassword" type="password" placeholder="Confirm new password" required="true" style="width: 300px;" minlength="6" maxlength="12"/>
    </td>
</tr>

<tr align="center">
  <td colspan=2  align="center"><button type="submit" name="change-password-btn" style="background-color:yellow;margin:auto;display:block;text-align:center;" >Change Password</button></td>
</tr>

</table>

</form>


<?php
}

?>



<!--...........................Search subject..........................-->


<?php
  if (isset($_POST['search_sublects_offered'])) {
    # code...
?>
  <div id="wrapper" align="center">
    <font color="red" size="9">Search Regular subjects offered</font></br>
    </br>
    <form method="post" action="./search_subject_acad.php" enctype="multipart/form-data">
      <table border="1">
        <tr>
              <td>Course Name</td>
              <td>
                <select id='sel_course_name' name='sel_course_name'>
                <?php 
                                  ## Fetch courses
                                  $sql = "SELECT DISTINCT course FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['course']!='NA') {
                                       echo "<option value='".$var['course']."'>".$var['course']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

        <tr>
              <td>Academic Year</td>
              <td>
                <select id='sel_academic_year' name='sel_academic_year'>
                <?php 
                                  ## Fetch current session
                                  $sql = "SELECT DISTINCT current_session FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['current_session']!='NA') {
                                       echo "<option value='".$var['current_session']."'>".$var['current_session']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

          <tr>
              <td>Department</td>
              <td>
                <select id='sel_department' name='sel_department'>
                <?php 
                                  ## Fetch department
                                  $sql = "SELECT DISTINCT department FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['department']!='NA' and $var['department']!='Administration') {
                                       echo "<option value='".$var['department']."'>".$var['department']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

          <tr>
              <td>Stream</td>
              <td>
                <select id='sel_stream' name='sel_stream'>
                <?php 
                                  ## Fetch stream
                                  $sql = "SELECT DISTINCT stream FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['stream']!='NA') {
                                       echo "<option value='".$var['stream']."'>".$var['stream']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

          <tr>
              <td>Semester</td>
              <td>
                <select id='sel_semester' name='sel_semester'>
                    <?php 
                                  ## Fetch semester
                                  $sql = "SELECT DISTINCT semester_number FROM AUTO_POPULATION where semester_number!='NA' union SELECT DISTINCT phd_sem from AUTO_POPULATION where phd_sem!='NA'";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  //if ($var['stream']!='NA') {
                                       echo "<option value='".$var['semester_number']."'>".$var['semester_number']."</option>";
                                   //}
                                                     
                                 }
                ?>
                         
                            </select>

              </td>
          </tr>


              
              <td colspan="2" align="center"><input style="background-color:blue;color: white;" type="submit" name="search_course_data" value="Search offered courses"/></td>
          </tr>
        </table>
    </form>

    
  </div>
<?php

} 

?>


<!--...........................Search backlog subject..........................-->


<?php
  if (isset($_POST['search_backlog_sublects_offered'])) {
    # code...
?>
  <div id="wrapper" align="center">
    <font color="red" size="9">Search Re-registered subjects offered</font></br>
    </br>
    <form method="post" action="./search_subject_acad.php" enctype="multipart/form-data">
      <table border="1">
        <tr>
              <td>Course Name</td>
              <td>
                <select id='sel_course_name' name='sel_course_name'>
                <?php 
                                  ## Fetch courses
                                  $sql = "SELECT DISTINCT course FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['course']!='NA') {
                                       echo "<option value='".$var['course']."'>".$var['course']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

        <tr>
              <td>Academic Year</td>
              <td>
                <select id='sel_academic_year' name='sel_academic_year'>
                <?php 
                                  ## Fetch current session
                                  $sql = "SELECT DISTINCT current_session FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['current_session']!='NA') {
                                       echo "<option value='".$var['current_session']."'>".$var['current_session']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

          <tr>
              <td>Department</td>
              <td>
                <select id='sel_department' name='sel_department'>
                <?php 
                                  ## Fetch department
                                  $sql = "SELECT DISTINCT department FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['department']!='NA' and $var['department']!='Administration') {
                                       echo "<option value='".$var['department']."'>".$var['department']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

          <tr>
              <td>Stream</td>
              <td>
                <select id='sel_stream' name='sel_stream'>
                <?php 
                                  ## Fetch stream
                                  $sql = "SELECT DISTINCT stream FROM AUTO_POPULATION";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  if ($var['stream']!='NA') {
                                       echo "<option value='".$var['stream']."'>".$var['stream']."</option>";
                                   }
                                                     
                                 }
                ?>
                              </select>

              </td>
          </tr>

          <tr>
              <td>Semester</td>
              <td>
                <select id='sel_semester' name='sel_semester'>
                    <?php 
                                  ## Fetch semester
                                  $sql = "SELECT DISTINCT semester_number FROM AUTO_POPULATION where semester_number!='NA'";
                                  $stmt = $pdo->prepare($sql);
                                  $stmt->execute();
                                                
                                  while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  //if ($var['stream']!='NA') {
                                       echo "<option value='".$var['semester_number']."'>".$var['semester_number']."</option>";
                                   //}
                                                     
                                 }
                ?>
                         
                            </select>

              </td>
          </tr>


              
              <td colspan="2" align="center"><input style="background-color:blue;color: white;" type="submit" name="search_backlog_course_data" value="Search offered backlog courses"/></td>
          </tr>
        </table>
    </form>

    
  </div>
<?php

} 

?>

<?php 
//Choose subject details to update project faculty 
      if(isset($_POST['update-project-faculty'])) {

?>
<form action="./academic_incharge_dashboard.php" method="POST">
  <table align="center" border="2">
    <tr>
      <td>Academic Year</td>
      <td><?=$current_session; ?></td>
    </tr>
    <tr>
          <td>Course</td>
          <td>
            
              <select id='sel_course' name='sel_course'>
                      
                      <?php 
                      ## Fetch course
                      $sql = "SELECT DISTINCT course FROM AUTO_POPULATION WHERE course!='NA'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($course = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$course['course']."'>".$course['course']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>
        <tr>
          <td>Department</td>
          <td>
            
              <select id='sel_department' name='sel_department'>
                      
                      <?php 
                      ## Fetch department
                      $sql = "SELECT DISTINCT department FROM  AUTO_POPULATION WHERE department!='NA' and department!='Administration'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($dept = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$dept['department']."'>".$dept['department']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>


        <tr>
          <td>Stream</td>
          <td>
            
              <select id='sel_stream' name='sel_stream'>
                      
                      <?php 
                      ## Fetch stream
                      $sql = "SELECT DISTINCT stream FROM  AUTO_POPULATION WHERE stream!='NA'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($stream = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$stream['stream']."'>".$stream['stream']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>
        <tr>
          <td>Semester</td>
          <td>
            
              <select id='sel_semester' name='sel_semester'>
                      
                      <?php 
                      ## Fetch semester
                      $sql = "SELECT DISTINCT semester FROM  OFFERED_SUBJECT WHERE academic_year='$current_session' and faculty_email='all_faculty@iiitkalyani.ac.in'";

                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($stream = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$stream['semester']."'>".$stream['semester']."</option>";
                      }
                      ?>
                </select>
                
          </td>
        </tr>
        <tr>
          <td>Subjet Code</td>
          <td>
            
              <select id='sel_sub_code' name='sel_sub_code'>
                      
                      <?php 
                      ## Fetch subjct code
                      
                      $sql = "SELECT DISTINCT subject_code FROM  OFFERED_SUBJECT WHERE academic_year='$current_session' and faculty_email='all_faculty@iiitkalyani.ac.in'";
                      echo $sql;
                      $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                  
                    
                  while($sub_code = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$sub_code['subject_code']."'>".$sub_code['subject_code']."</option>";

                      }
                      ?>
                </select>

          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="submit-selection" value="Search" style="background-color:blue; color: white;" />
          </td>
        </tr>

  </table>
</form>

<?php        
      }
?>



<?php 
//Updating project faculty
    if(isset($_POST['submit-selection'])){

    $department=trim($_POST['sel_department']);
    $course=trim($_POST['sel_course']);
    $stream=trim($_POST['sel_stream']);
    $semester=trim($_POST['sel_semester']);
    $subject_code=trim($_POST['sel_sub_code']);
    

    echo "<center><strong>Academic Session: " .$current_session. " Course: " .$course. " Department: " .$department. " Stream: " .$stream . " Semester: ".$semester."</strong></center>";
    echo "<center><strong>Project faculty of Students for subject ".$subject_code ."</strong></center>";
    

    $sql = "SELECT * FROM GRADES where course='$course' and department='$department' and stream='$stream' and academic_session='$current_session' and semester='$semester' and subject_code='$subject_code' order by reg_no";
    
                                       
        $stmt_rec = $pdo->prepare($sql);
        $stmt_rec->execute();
        $record_count = $stmt_rec->rowCount();
        
        if ($record_count==0) {
          echo "<center><strong><font size='5' color='red'>Sorry No Student Enrolled for this subject</font></strong></center>";
          require_once("./includes/footer.php");
          die;

        }

        ?>
        
        <form method='POST' action='./academic_incharge_dashboard.php'>
          <input type="hidden" name="department" value="<?= $department ?>">
          <input type="hidden" name="course" value="<?= $course ?>">
          <input type="hidden" name="stream" value="<?= $stream ?>">
          <input type="hidden" name="semester" value="<?= $semester ?>">
          <input type="hidden" name="subject_code" value="<?= $subject_code ?>">
          

        <table border='1' style='border-collapse: collapse;' align=center>
        <tr style='background: orange;'><th><input type='checkbox' id='checkAll'/> Check</th><th>Student Name</th><th>Roll No</th><th>Registration No</th><th>Current Faculty</th><th>New Faculty</th></tr>
        <?php
        while($user = $stmt_rec->fetch(PDO::FETCH_ASSOC)){
          $id=$user['ID'];
          $student_name=$user['student_name'];
          $roll_no=$user['roll_no'];
          $reg_no=$user['reg_no'];
          $current_faculty_email=$user['faculty_email'];
          $current_faculty_name=$user['faculty_name'];
          
          $roll_no_txtbox = "roll_no_" . $id;
          $reg_no_txtbox = "reg_no_" . $id;
          $student_name_txtbox = "student_name_" . $id;
          $current_faculty_email_txtbox = "current_faculty_email_" . $id;
          $current_faculty_name_txtbox = "current_faculty_name_" . $id;
          
          ?>
          <tr>
            <?php
            if ($user['freezed']=='YES') {
               echo "<td><input type='checkbox' disabled/></td>";
             }else{

            ?>
            <td><input type='checkbox' name='update[]' value='<?= $id ?>'/></td>
          <?php } ?>
            <td><?= $student_name ?><input type='hidden' name='<?= $student_name_txtbox ?>' value='<?= $student_name ?>' /></td>
            <td><?= $roll_no ?><input type='hidden' name='<?= $roll_no_txtbox ?>' value='<?= $roll_no ?>' minlength='9' maxlength='9'/></td>
            <td><?= $reg_no ?><input type='hidden' name='<?= $reg_no_txtbox ?>' value='<?= $reg_no ?>'/></td>
            <td><?= $current_faculty_name ?><input type='hidden' name='<?=$current_faculty_name_txtbox ?>' value='<?= $current_faculty_name ?>'/><input type='hidden' name='<?=$current_faculty_email_txtbox ?>' value='<?= $current_faculty_email ?>'/></td>
            
            <td>
              <select id='new_faculty_email_<?=$id?>' name='new_faculty_email_<?=$id?>'>
                      
                      <?php 
                      ## Fetch course
                      
                      //$sql = "SELECT DISTINCT faculty_email FROM  OFFERED_SUBJECT WHERE academic_year='$current_session' and faculty_email!='all_faculty@iiitkalyani.ac.in' and faculty_email!='guest_faculty@iiitkalyani.ac.in' ";
                      $sql = "SELECT DISTINCT email FROM  users WHERE email!='all_faculty@iiitkalyani.ac.in' and email!='guest_faculty@iiitkalyani.ac.in' and user_type='Faculty' ";
                      //echo $sql;
                      $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    
                  
                    
                  while($faculty = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $fe=$faculty['email'];
                    $sql1 = "SELECT * FROM  USERS WHERE email='$fe' ";
                      //echo $sql1;
                      $stmt1 = $pdo->prepare($sql1);
                      $stmt1->execute();
                      $faculty_name = $stmt1->fetch(PDO::FETCH_ASSOC);
                      
                         echo "<option value='".$faculty['email']."'>".$faculty_name['full_name']."</option>";

                      }
                      ?>
                </select>

            </td>
          </tr>

       <?php } ?>
          <tr>
            <td colspan=6 align="center"><input type='submit' name='update_faculty_btn' value='Update Faculty'/></td>
          </tr>
        </table>
        </form>

        
  <?php
  
  }

  ?>


<?php
if(isset($_POST['update_faculty_btn']))
  {   

    $department=trim($_POST['department']);
    $course=trim($_POST['course']);
    $stream=trim($_POST['stream']);
    $semester=trim($_POST['semester']);
    $subject_code=trim($_POST['subject_code']);
  

        if(isset($_POST['update'])){

        echo "<center><strong>Academic Session: " .$current_session. " Course: " .$course. " Department: " .$department. " Stream: " .$stream . " Semester: ".$semester."</strong></center>";
    echo "<center><strong>Subject: ".$subject_code ."</strong></center>";

          ?>
          <form action="academic_incharge_dashboard.php" method="POST">
          <input type="hidden" name="department" value="<?= $department ?>">
          <input type="hidden" name="course" value="<?= $course ?>">
          <input type="hidden" name="stream" value="<?= $stream ?>">
          <input type="hidden" name="semester" value="<?= $semester ?>">
          <input type="hidden" name="subject_code" value="<?= $subject_code ?>">
          

            <table border="1" align="center">
              <tr bgcolor="orange">
                <th>Student Name</th><th>Roll No</th><th>Registration No</th><th>Previous Faculty</th><th>New Faculty</th>
              </tr>       
          <?php
          $c=0; $i=0;
          foreach($_POST['update'] as $userid){
                    
            $student_name = $_POST["student_name_" . $userid];

            $roll_no=$_POST["roll_no_" . $userid];
            $reg_no=$_POST["reg_no_" . $userid];
            $current_faculty_email = $_POST["current_faculty_email_" . $userid];
            $current_faculty_name = $_POST["current_faculty_name_" . $userid];
            $new_faculty_email = $_POST["new_faculty_email_" . $userid];
     
            if ($c%2==0) {
            echo "<tr bgcolor='lightgreen'>";
            $c++;
          }
          else{
            echo "<tr>";
            $c++;
          }
            ?>
              <td><?=$student_name ?><input type="hidden" name="student_name_<?=$i;?>" value="<?=$student_name ?>" ></td>
              <td><?=$roll_no ?><input type="hidden" name="roll_no_<?=$i;?>" value="<?=$roll_no ?>" ></td>
              <td><?=$reg_no ?><input type="hidden" name="reg_no_<?=$i;?>" value="<?=$reg_no ?>" ></td>
              <td><?=$current_faculty_name ?><input type="hidden" name="current_faculty_name_<?=$i;?>" value="<?=$current_faculty_name ?>" ><input type="hidden" name="current_faculty_email_<?=$i;?>" value="<?=$current_faculty_email ?>" ></td>
              <td>
                <?php
                $sql1 = "SELECT * FROM  USERS WHERE email='$new_faculty_email' ";
                $stmt1 = $pdo->prepare($sql1);
                $stmt1->execute();
                $faculty = $stmt1->fetch(PDO::FETCH_ASSOC);
                $new_faculty_name=$faculty['full_name'];
                echo $new_faculty_name;
                ?>
                <input type="hidden" name="new_faculty_name_<?=$i;?>" value="<?=$new_faculty_name ?>" >
                <input type="hidden" name="new_faculty_email_<?=$i;?>" value="<?=$new_faculty_email ?>" >
              </td>
            </tr>

          <?php 
          $i++;
          }
          

          ?>
          <tr>
            <td colspan="5" align="center">
              <input type="submit" name="confirm-faculty" value="Confirm Faculty">
              <input type="hidden" name="no_of_record" value="<?=$i; ?>">
            </td>
          </tr>
          </table>
        </form>
         <?php  
          
        }
        else{

           echo "<center><strong>Academic Session: " .$current_session. " Course: " .$course. " Department: " .$department. " Stream: " .$stream . " Semester: ".$semester."</strong></center>";
          echo "<center><strong>Subject Code ".$subject_code ."</strong></center>";

            echo "<center><strong><font size='5' color='red'>Sorry No Student Selected</font></strong></center>";

        }

  } 

?>

<?php
if (isset($_POST['confirm-faculty'])) {
    $no_of_record=trim($_POST['no_of_record']);
    $department=trim($_POST['department']);
    $course=trim($_POST['course']);
    $stream=trim($_POST['stream']);
    $semester=trim($_POST['semester']);
    $subject_code=trim($_POST['subject_code']);
    

  for ($i=0; $i < $no_of_record; $i++) { 
      $student_name_var="student_name_".$i;
      $student_name=$_POST[$student_name_var];
      $roll_no_var="roll_no_".$i;
      $roll_no=$_POST[$roll_no_var ];
      $reg_no_var="reg_no_".$i;
      $reg_no=$_POST[$reg_no_var ];
      $faculty_name_var="new_faculty_name_".$i;
      $faculty_name_val=$_POST[$faculty_name_var ];
      $faculty_email_var="new_faculty_email_".$i;
      $faculty_email_val=$_POST[$faculty_email_var ];
      $current_faculty_email_var="current_faculty_email_".$i;
      $current_faculty_email_val=$_POST[$current_faculty_email_var ];


      
      $sql="UPDATE GRADES SET faculty_email='$faculty_email_val', faculty_name='$faculty_name_val' where course='$course' and department='$department' and stream='$stream' and academic_session='$current_session' and semester='$semester' and subject_code='$subject_code' and roll_no='$roll_no' and reg_no='$reg_no' and faculty_email='$current_faculty_email_val'";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();

    }

    echo "<center><strong><font size='5' color='red'>Project Faculty Updated. Here is the current status.</font></strong></center>";

    $sql = "SELECT * FROM GRADES where course='$course' and department='$department' and stream='$stream' and academic_session='$current_session' and semester='$semester' and subject_code='$subject_code' order by reg_no";
    
                                       
        $stmt_rec = $pdo->prepare($sql);
        $stmt_rec->execute();
?>
        <table border='1' style='border-collapse: collapse;' align=center>
        <tr style='background: orange;'><th>Student Name</th><th>Roll No</th><th>Registration No</th><th>Current Faculty</th></tr>
        <?php
        while($user = $stmt_rec->fetch(PDO::FETCH_ASSOC)){
          
          $student_name=$user['student_name'];
          $roll_no=$user['roll_no'];
          $reg_no=$user['reg_no'];
          $current_faculty_email=$user['faculty_email'];
          $current_faculty_name=$user['faculty_name'];
                  
          ?>
          <tr>
                    
            <td><?= $student_name ?></td>
            <td><?= $roll_no ?></td>
            <td><?= $reg_no ?></td>
            <td><?= $current_faculty_name ?></td>
            
          </tr>

       <?php } ?>
        </table>
<?php
  }
?>

<?php
if (isset($_POST['assign_faculty_advisor'])) {
   ?>
   <center>Assign/Delete Faculty Advisor</center>
   <form method="POST" action="./academic_incharge_dashboard.php">
     <table align="center" border="1">
      <tr>
          <td>Course</td>
          <td>
            
              <select id='course' name='course'>
                      
                      <?php 
                      ## Fetch course
                      $sql = "SELECT DISTINCT course FROM AUTO_POPULATION WHERE course!='NA'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($course = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$course['course']."'>".$course['course']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>
        <tr>
          <td>Department</td>
          <td>
            
              <select id='department' name='department'>
                      
                      <?php 
                      ## Fetch department
                      $sql = "SELECT DISTINCT department FROM  AUTO_POPULATION WHERE department!='NA' and department!='Administration'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($dept = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$dept['department']."'>".$dept['department']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>


        <tr>
          <td>Stream</td>
          <td>
            
              <select id='stream' name='stream'>
                      
                      <?php 
                      ## Fetch stream
                      $sql = "SELECT DISTINCT stream FROM  AUTO_POPULATION WHERE stream!='NA'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($stream = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$stream['stream']."'>".$stream['stream']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>
        
       <tr>
         <td>Academic Year</td>
         <td>
          <!--<input type="text" maxlength="9" minlength="9" placeholder="Enter Academic Year eg. 2019-2020" size="40" name="academic_year" required>-->
          <select name="academic_year">
            <option value="2021-2022">2021-2022</option>
            <option value="2022-2023">2022-2023</option>
            <option value="2023-2024">2023-2024</option>
          </select>

         </td>
       </tr>
       <tr>
          <td>Semester </br><font color="red">1 to 8 for B.Tech./M.Tech. and</br>Autumn/Spring ####-#### for Ph.D.</font></td>
         <td>
          <select name="semester">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="Spring 2021-2022">Spring 2021-2022</option>
            <option value="Autumn 2022-2023">Autumn 2022-2023</option>
            <option value="Spring 2022-2023">Spring 2022-2023</option>
            <option value="Autumn 2023-2024">Autumn 2023-2024</option>
            <option value="Spring 2023-2024">Spring 2023-2024</option>
            <option value="Autumn 2024-2025">Autumn 2024-2025</option>
            <option value="Spring 2024-2025">Spring 2024-2025</option>
            

          </select>
         </td>
       </tr>
       <tr>
         <td>Faculty</td>
         <td><!--<input type="email" aria-describedby="emailHelp" placeholder="Enter email of faculty" size="30" name="faculty_email">-->
         <select name="faculty_email">
        <option value="amitranjanazad@iiitkalyani.ac.in" >Dr. Amit Ranjan Azad</option>
        <option value="anirban@iiitkalyani.ac.in" >Dr. Anirban Lakshman</option>
        <option value="bhaskar@iiitkalyani.ac.in" >Dr. Bhaskar Biswas</option>
        <option value="dalia@iiitkalyani.ac.in" >Dr. Dalia Nandi (Das)</option>
        <option value="debasish@iiitkalyani.ac.in" >Dr. Debasish Bera</option>
        <option value="imon@iiitkalyani.ac.in" >Dr. Imon Mukherjee</option>
        <option value="oishila@iiitkalyani.ac.in" >Dr. Oishila Bandyopadhyay</option>
        <option value="pratik@iiitkalyani.ac.in" >Dr. Pratik Chakraborty</option>
        <option value="rinky@iiitkalyani.ac.in" >Dr. Rinky Sha</option>
        <option value="sanjayc@iiitkalyani.ac.in" >Dr. Sanjay Chatterji</option>
        <option value="sanjoy@iiitkalyani.ac.in" >Dr. Sanjoy Pratihar</option>
        <option value="hafi786@iiitkalyani.ac.in" >Dr. SK Hafizul Islam</option>
        <option value="uma@iiitkalyani.ac.in" >Dr. Uma Das</option>
        <option value="phdcoordinator@iiitkalyani.ac.in" >PhD Coordinator</option>
        
    </select>
    </td>

       </tr>
       <tr>
         <td>Reg# From</td>
         <td><input type="text" name="reg_from" maxlength="6" minlength="3" onkeypress="return isNumberKey(event)" required ></td>
       </tr>
       <tr>
         <td>Reg# To</td>
         <td><input type="text" name="reg_to" maxlength="6" minlength="3" onkeypress="return isNumberKey(event)" required ></td>
       </tr>
       <tr>
         <td colspan="2" align="center">
          <input type="submit" name="faculty_advisor_assign_delete" value="Assign">
          <input type="submit" name="faculty_advisor_assign_delete" value="Delete">
         </td>
       </tr>
     </table>
   </form>
<?php
 } 
?>

<?php 
  if (isset($_POST['faculty_advisor_assign_delete'])) {
    $course=$_POST['course'];
    $department=$_POST['department'];
    $stream=$_POST['stream'];
    $reg_from=$_POST['reg_from'];
    $reg_to=$_POST['reg_to'];
    $ay=$_POST['academic_year'];
    $semester=$_POST['semester'];
    $faculty_email=$_POST['faculty_email'];
    $assign_or_delete=$_POST['faculty_advisor_assign_delete'];
    $faculty_name="";
    

    if ($reg_to<$reg_from) {
        echo "<center><strong>Reg# From must be less than Reg# To. Retry with proper value.</strong></center>";
        require_once("./includes/footer.php");
        die;
      }


      $sql="";
    if ($assign_or_delete=='Assign') {
      $sql="SELECT * FROM USERS WHERE email='$faculty_email' and email_verified='YES' and user_status='Activated' and user_type='Faculty'";
    }

     if ($assign_or_delete=='Delete') {
      $sql="SELECT * FROM FACULTY_ADVISOR WHERE faculty_email='$faculty_email' and course='$course' and department='$department' and stream='$stream' and semester='$semester' ";
      
    }
    
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    
    if ($stmt->rowCount()==0) {
      if ($assign_or_delete=='Assign') {
        echo "<center><strong>Sorry! No active faculty with email ".$faculty_email." found. Can not assign as Faculty Advisor.</strong></center>";
      }
      if ($assign_or_delete=='Delete') {
        echo "<center><strong>Sorry! faculty advisor with email ".$faculty_email." is not enlisted for any semester of the Course: ".$course.", Deparement: ".$department.", Sem: ".$semester." and Academic year: ".$ay.".</strong></center>";
      }
     
     require_once("./includes/footer.php");
     die;
    }else{
      $var = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($assign_or_delete=='Assign') {
      $faculty_name=$var['full_name'];
      }
      if ($assign_or_delete=='Delete') {
      $faculty_name=$var['faculty_name'];
      }
    }
?>
  <center>Confirm Assign/Delete Faculty Advisor</center>
   <form method="POST" action="./academic_incharge_dashboard.php">
     <table align="center" border="1">
      <tr>
         <td>Course</td>
         <td><?=$course ?><input type="hidden" name="course" value="<?=$course ?>" ></td>
       </tr>
       <tr>
         <td>Department</td>
         <td><?=$department ?><input type="hidden" name="department" value="<?=$department ?>" ></td>
       </tr>
       <tr>
         <td>Stream</td>
         <td><?=$stream ?><input type="hidden" name="stream" value="<?=$stream ?>" ></td>
       </tr>
       <tr>
         <td>Academic Year</td>
         <td><?=$ay?><input type="hidden" name="academic_year" value="<?=$ay?>" ></td>
       </tr>
       <tr>
         <td>Semester</td>
         <td>
          <?=$semester ?><input type="hidden" name="semester" value="<?=$semester ?>" >
         </td>
       </tr>
       <tr>
         <td>Faculty Email</td>
         <td><?=$faculty_email ?><input type="hidden" name="faculty_email" value="<?=$faculty_email?>" ></td>
       </tr>
       <tr>
         <td>Faculty Name</td>
         <td><?=$faculty_name ?><input type="hidden" name="faculty_name" value="<?=$faculty_name?>" ></td>
       </tr>
       <tr>
         <td>Reg# From</td>
         <td><?=$reg_from ?><input type="hidden" name="reg_from" value="<?=$reg_from ?>"></td>
       </tr>
       <tr>
         <td>Reg# To</td>
         <td><?=$reg_to ?><input type="hidden" name="reg_to" value="<?=$reg_to ?>"></td>
       </tr>
       <tr>
         <td colspan="2" align="center">
          <?php 
          if ($assign_or_delete=='Assign') {
            echo '<input type="submit" name="confirm_faculty_advisor_assign" value="Confirm Assign">';
          }
          if ($assign_or_delete=='Delete') {
            echo '<input type="submit" name="confirm_faculty_advisor_delete" value="Confirm Delete">';
          }

          ?>
         </td>
       </tr>
     </table>
   </form>

<?php
  }
?>

<?php 
  if (isset($_POST['confirm_faculty_advisor_assign'])) {
    $ay=$_POST['academic_year'];
    $course=$_POST['course'];
    $department=$_POST['department'];
    $stream=$_POST['stream'];
    $semester=$_POST['semester'];
    $faculty_email=$_POST['faculty_email'];
    $faculty_name=$_POST['faculty_name'];
    $reg_from=$_POST['reg_from'];
    $reg_to=$_POST['reg_to'];

    $sql="INSERT INTO FACULTY_ADVISOR  (course, department, stream, faculty_email, faculty_name,academic_year, semester,reg_from,reg_to) VALUES ('$course','$department','$stream','$faculty_email','$faculty_name','$ay','$semester','$reg_from','$reg_to')";
    //echo $sql;
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    echo "<center><strong>Faculty Advisor assigned</strong></center>";

  }

  if (isset($_POST['confirm_faculty_advisor_delete'])) {
    
    $ay=$_POST['academic_year'];
    $course=$_POST['course'];
    $department=$_POST['department'];
    $stream=$_POST['stream'];
    $semester=$_POST['semester'];
    $faculty_email=$_POST['faculty_email'];
    $faculty_name=$_POST['faculty_name'];

    /*
    $sql="SELECT * FROM FACULTY_ADVISOR WHERE faculty_email='$faculty_email' and academic_year='$ay' and semester='$semester'";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    
    if ($stmt->rowCount()==0) {
      echo "<center><strong>Sorry!! ".$faculty_name." Not found in Faculty Advisor list of academic year: ".$ay.", Semester: ".$semester."</strong></center>";
    }else{
    */
    $sql="DELETE FROM FACULTY_ADVISOR WHERE faculty_email='$faculty_email' and academic_year='$ay' and semester='$semester' and course='$course' and department='$department' and stream='$stream'";
    
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    echo "<center><strong>Faculty Advisor: ".$faculty_name." Deleted from Course: ".$course.", Deparement: ".$department.", Stream: ".$stream." Academic year: ".$ay." and Semester: ".$semester."</strong></center>";
   // }

  }
?>

<?php
if (isset($_POST['view_faculty_advisor'])) {
   ?>
   <center>View Faculty Advisor</center>
   <form method="POST" action="./academic_incharge_dashboard.php">
     <table align="center" border="1">
      <tr>
          <td>Course</td>
          <td>
            
              <select id='course' name='course'>
                      
                      <?php 
                      ## Fetch course
                      $sql = "SELECT DISTINCT course FROM AUTO_POPULATION WHERE course!='NA'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($course = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$course['course']."'>".$course['course']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>
        <tr>
          <td>Department</td>
          <td>
            
              <select id='department' name='department'>
                      
                      <?php 
                      ## Fetch department
                      $sql = "SELECT DISTINCT department FROM  AUTO_POPULATION WHERE department!='NA' and department!='Administration'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($dept = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$dept['department']."'>".$dept['department']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>


        <tr>
          <td>Stream</td>
          <td>
            
              <select id='stream' name='stream'>
                      
                      <?php 
                      ## Fetch stream
                      $sql = "SELECT DISTINCT stream FROM  AUTO_POPULATION WHERE stream!='NA'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($stream = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$stream['stream']."'>".$stream['stream']."</option>";
                      }
                      ?>


                </select>

          </td>
        </tr>



       <tr>
         <td>Academic Year</td>
         <td><input type="text" maxlength="9" minlength="9" placeholder="Enter Academic Year eg. 2019-2020" size="40" name="academic_year" required></td>
       </tr>
       <tr>
         <td>Semester</td>
         <td>
          <select name="semester">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="Spring 2021-2022">Spring 2021-2022</option>
                      <option value="Autumn 2022-2023">Autumn 2022-2023</option>
                      <option value="Spring 2022-2023">Spring 2022-2023</option>
                      <option value="Autumn 2023-2024">Autumn 2023-2024</option>
                      <option value="Spring 2023-2024">Spring 2023-2024</option>
                      <option value="Autumn 2024-2025">Autumn 2024-2025</option>
                      <option value="Spring 2024-2025">Spring 2024-2025</option>
          </select>
         </td>
       </tr>

       <tr>
         <td colspan="2" align="center">
          <input type="submit" name="faculty_advisor_view" value="View">
          
         </td>
       </tr>
     </table>
   </form>
<?php
 } 
?>

<?php
if (isset($_POST['faculty_advisor_view'])) {
  $academic_year=$_POST['academic_year'];
   $course=$_POST['course'];
    $department=$_POST['department'];
    $stream=$_POST['stream'];
  $semester=$_POST['semester'];
  $sql="SELECT * FROM FACULTY_ADVISOR WHERE academic_year='$academic_year' and stream='$stream' and course='$course' and department='$department' and semester='$semester'";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount()==0) {
      echo "<center><strong>Sorry!! no Faculty Advisor found for Course: ".$course.", Deparement: ".$department.", Stream: ".$stream.", Academic year: ".$academic_year.", Semester: ".$semester."</strong></center>";
      require_once("./includes/footer.php");
      die;
    }
   ?>
   <center>List of Faculty Advisors of Course:<?=$course?>, Department: <?=$department?>,  Stream: <?=$stream ?> Academic Year: <?=$academic_year ?>, Semester: <?=$semester?></center>
   
     <table align="center" border="1">
       <tr bgcolor="orange">
         <td>Faculty Email</td> <td>Faculty Name</td> <td>Reg From</td><td>Reg To</td><td>Status</td>
       </tr>
<?php 
    
    while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
      echo "<tr><td>".$var['faculty_email']."</td><td>".$var['faculty_name']."</td><td>".$var['reg_from']."</td><td>".$var['reg_to']."</td><td>".$var['status']."</td></tr>";

    }
?>
     </table>
   
<?php
 } 
?>


<!--Exam time update Regular-->

<?php 
  if (isset($_POST['update-exam-time-regular'])) {
    ?>
    <center>Examnation Schedule (Regular Papers)</center>
    <form method="POST" action="./academic_incharge_dashboard.php">
     <table align="center" border="1">
      <tr>
          <td>Course</td>
          <td>
            
              <select id='course' name='course'>
                      
                      <?php 
                      ## Fetch course
                      $sql = "SELECT DISTINCT course FROM AUTO_POPULATION WHERE course!='NA'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($course = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$course['course']."'>".$course['course']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>
        <tr>
          <td>Department</td>
          <td>
            
              <select id='department' name='department'>
                      
                      <?php 
                      ## Fetch department
                      $sql = "SELECT DISTINCT department FROM  AUTO_POPULATION WHERE department!='NA' and department!='Administration'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($dept = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$dept['department']."'>".$dept['department']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>


        <tr>
          <td>Stream</td>
          <td>
            
              <select id='stream' name='stream'>
                      
                      <?php 
                      ## Fetch stream
                      $sql = "SELECT DISTINCT stream FROM  AUTO_POPULATION WHERE stream!='NA'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($stream = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$stream['stream']."'>".$stream['stream']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>



       <tr>
         <td>Academic Year</td>
         <td>
            
              <select id='academic_year' name='academic_year'>
                      
                      <?php 
                      ## Fetch stream
                      $sql = "SELECT DISTINCT current_session FROM  AUTO_POPULATION WHERE current_session!='NA'";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                    
                  while($ay = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$ay['current_session']."'>".$ay['current_session']."</option>";
                      }
                      ?>
                </select>

          </td>
         
       </tr>
       <tr>
         <td>Semester</td>
         <td>
          <select id='semester' name='semester'>
                      
                      <?php 
                      ## Fetch semester
                      $sql = "SELECT DISTINCT semester_number FROM  AUTO_POPULATION WHERE semester_number!=0";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                    
                  while($sn = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$sn['semester_number']."'>".$sn['semester_number']."</option>";
                      }
                      ?>
                </select>
         </td>
       </tr>

       <tr>
         <td colspan="2" align="center">
          <input type="submit" name="update_exam_time_reg" value="Search">
          
         </td>
       </tr>
     </table>
   </form>
  <?php 
  }


  if (isset($_POST['update_exam_time_reg'])) {
    $course=$_POST['course'];
    $department=$_POST['department'];
    $stream=$_POST['stream'];
    $academic_year=$_POST['academic_year'];
    $semester=$_POST['semester'];


    $sql= "SELECT * FROM OFFERED_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' order by ID";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount()==0) {
      ?>
      <center><strong><font color="red" size="4">Sorry!! no subjects (Regular) offered for <br></font></strong></center>
      <center><strong>Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </strong></center>

      

      <?php 
      require_once("./includes/footer.php");
      die;
    }

    //Check whether schedule is already set or not
    $sql= "SELECT * FROM OFFERED_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' and date_of_exam!=''";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount()>0) {
      ?>
      <center><strong><font color="red" size="4">Schedule already set for regular papers <br></font></strong></center>
      <center><strong>Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </br>Current Schedule</strong></center>

      <table border="1" align="center" width="70%">
        <tr>
          <td>Subject Code</td>
          <td>Subject Name</td>
          <td>Exam Date</td>
          <td>Start Time</td>
          <td>Duration</td>
        </tr>
      <?php 
        $sql="SELECT * FROM OFFERED_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester'";
          $stmt=$pdo->prepare($sql);
          $stmt->execute();

          while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
              <td><?=$var['subject_code'] ?></td>
              <td><?=$var['subject_name'] ?></td>
              <td><?=$var['date_of_exam'] ?></td>
              <td><?=$var['time_of_exam'] ?></td>
              <td><?=$var['duration_of_exam'] ?></td>
            </tr>
            <?php 
          }

      ?>
      </table>
      <?php 
      require_once("./includes/footer.php");
      die;
    }




    ?>
    <center><strong>Schedule Exam Time (Regular Papers)</br>
      Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </strong></center>
      <form method="POST" action="academic_incharge_dashboard.php">
        <input type="hidden" name="department" value="<?= $department ?>">
        <input type="hidden" name="course" value="<?= $course ?>">
        <input type="hidden" name="stream" value="<?= $stream ?>">
        <input type="hidden" name="semester" value="<?= $semester ?>">
        <input type="hidden" name="academic_year" value="<?= $academic_year ?>">
       

      <table border="1" align="center" width="70%">
        <tr>
          <td>Subject Code</td>
          <td>Subject Name</td>
          <td>Exam Date</br>mm/dd/yyyy</td>
          <td>Start Time</td>
          <td>Duration</td>
        </tr>
         <!--Datepicker-->
              <link rel="stylesheet" href="./css/jquery-ui.css">
              <link rel="stylesheet" href="./css/style.css">
              <script src="./js/jquery-1.12.4.js"></script>
              <script src="./js/jquery-ui.js"></script>
              <script type="text/javascript">
                        $(function() {
                         $('input').filter('.datepicker').datepicker({
                          changeMonth: true,
                          changeYear: true,
                          showOn: 'button',
                          buttonImage: './includes/images/clock.png',
                          buttonImageOnly: true
                         });
                        });
              </script>


          <!--Timepicker-->
       <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
       <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
          
          <script type="text/javascript">
            $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 15,
            minTime: '09',
            maxTime: '6:00pm',
            defaultTime: '10',
            startTime: '10:00',
            dynamic: true,
            dropdown: false,
            scrollbar: true
        });
          </script>
          


    <?php 
    $i=1;
        $sql= "SELECT * FROM OFFERED_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' order by ID";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        while($var = $stmt->fetch(PDO::FETCH_ASSOC)){

          $subject_code=$var['subject_code'];
          $subject_name=$var['subject_name'];

          ?>
          <tr>
            <td>
              <?=$subject_code ?><input type="hidden" name="subject_code_<?=$i?>" value="<?=$subject_code ?>">
            </td>
            <td>
              <?=$subject_name ?><input type="hidden" name="subject_name_<?=$i?>" value="<?=$subject_name ?>">
            </td>
            <td>
              <input type="text" size="10px" class="datepicker" id="datepicker_<?=$i?>" name="exam_date_<?=$i?>" required="true" minlength='10' maxlength='10'>
            </td>
            <td>
              <select name="exam_time_<?=$i?>">
                <option value="09:00 AM">09:00 AM</option>
                <option value="09:30 AM">09:30 AM</option>
                <option value="10:00 AM">10:00 AM</option>
                <option value="10:30 AM">10:30 AM</option>
                <option value="11:00 AM">11:00 AM</option>
                <option value="02:00 PM">02:00 PM</option>
              </select>
            </td>
            <td>
              <select name="exam_duration_<?=$i?>">
                <option value="1 Hour 00 Minute">1 Hour 00 Minute</option>
                <option value="1 Hour 30 Minutes">1 Hour 30 Minutes</option>
                <option value="2 Hours 00 Minute">2 Hours 00 Minute</option>
                <option value="3 Hours 00 Minute">3 Hours 00 Minute</option>
              </select>
            </td>
          </tr>
          <?php 
          $i++;
        }
    ?>
        <tr>
                <td colspan="5" align="center">
                  <input type="submit" name="schedule_exam_regular" value="Schedule">
                  <input type="hidden" name="no_of_record" value="<?=$i?>">
                </td>
        </tr>
      </table>
      </form>
    <?php 
  }

?>

<?php 
    if (isset($_POST['schedule_exam_regular'])) {
      $course=$_POST['course'];
      $department=$_POST['department'];
      $stream=$_POST['stream'];
      $semester=$_POST['semester'];
      $academic_year=$_POST['academic_year'];
      $no_of_record=$_POST['no_of_record'];

      ?>
      <center><strong>Confirm Examination Schedule Regular Papers</br>
      Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </strong></center>
      <form method="POST" action="academic_incharge_dashboard.php">
        <input type="hidden" name="department" value="<?= $department ?>">
        <input type="hidden" name="course" value="<?= $course ?>">
        <input type="hidden" name="stream" value="<?= $stream ?>">
        <input type="hidden" name="semester" value="<?= $semester ?>">
        <input type="hidden" name="academic_year" value="<?= $academic_year ?>">
       

      <table border="1" align="center" width="70%">
        <tr>
          <td>Subject Code</td>
          <td>Subject Name</td>
          <td>Exam Date</td>
          <td>Start Time</td>
          <td>Duration</td>
        </tr>
        <?php 
        $i=1;
        for ($i=1; $i <$no_of_record ; $i++) { 
          $subject_code=$_POST['subject_code_'.$i];
          $subject_name=$_POST['subject_name_'.$i];
          $exam_date=$_POST['exam_date_'.$i];

          $tv=explode('/', $exam_date);
          $exam_date=$tv[1]."-".$tv[0]."-".$tv[2];

          $exam_time=$_POST['exam_time_'.$i];
          $exam_duration=$_POST['exam_duration_'.$i];
          ?>
          <tr>
            <td>
              <?=$subject_code ?><input type="hidden" name="subject_code_<?=$i?>" value="<?=$subject_code ?>">
            </td>
          
            <td>
              <?=$subject_name ?><input type="hidden" name="subject_name_<?=$i?>" value="<?=$subject_name ?>">
            </td>
          
            <td>
              <?=$exam_date ?><input type="hidden" name="exam_date_<?=$i?>" value="<?=$exam_date ?>">
            </td>
          
            <td>
              <?=$exam_time ?><input type="hidden" name="exam_time_<?=$i?>" value="<?=$exam_time ?>">
            </td>
          
            <td>
              <?=$exam_duration ?><input type="hidden" name="exam_duration_<?=$i?>" value="<?=$exam_duration ?>">
            </td>
          </tr>
          <?php 
        }

        ?>
        <tr>
                <td colspan="5" align="center">
                  <input type="submit" name="confirm_schedule_exam_regular" value="Confirm Schedule">
                  <input type="hidden" name="no_of_record" value="<?=$i?>">
                </td>
        </tr>
      </table>
      </form>

      <?php 
    }
?>


<?php 
    if (isset($_POST['confirm_schedule_exam_regular'])) {
      $course=$_POST['course'];
      $department=$_POST['department'];
      $stream=$_POST['stream'];
      $semester=$_POST['semester'];
      $academic_year=$_POST['academic_year'];
      $no_of_record=$_POST['no_of_record'];

      for ($i=1; $i <$no_of_record ; $i++) { 
          $subject_code=$_POST['subject_code_'.$i];
          $subject_name=$_POST['subject_name_'.$i];
          $exam_date=$_POST['exam_date_'.$i];
          $exam_time=$_POST['exam_time_'.$i];
          $exam_duration=$_POST['exam_duration_'.$i];

          $sql="UPDATE OFFERED_SUBJECT SET date_of_exam='$exam_date', time_of_exam='$exam_time', duration_of_exam='$exam_duration' WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' and subject_code='$subject_code' ";
          $stmt=$pdo->prepare($sql);
          $stmt->execute();
      }
      ?>
        <center><strong><font color="red" size="4">Exam Time updated succesfull (Regular Papers). </br>Current Exam Schedule</font></strong></center>
        <center><strong></br>
      Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </strong></center>
        <table border="1" align="center" width="70%">
        <tr>
          <td>Subject Code</td>
          <td>Subject Name</td>
          <td>Exam Date</td>
          <td>Start Time</td>
          <td>Duration</td>
        </tr>
      <?php 
        $sql="SELECT * FROM OFFERED_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester'";
          $stmt=$pdo->prepare($sql);
          $stmt->execute();

          while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
              <td><?=$var['subject_code'] ?></td>
              <td><?=$var['subject_name'] ?></td>
              <td><?=$var['date_of_exam'] ?></td>
              <td><?=$var['time_of_exam'] ?></td>
              <td><?=$var['duration_of_exam'] ?></td>
            </tr>
            <?php 
          }

      ?>
      </table>
      <?php 
    }
?>

<!--............................................................................................-->

<!--Exam time update Backlog-->

<?php 
  if (isset($_POST['update-exam-time-backlog'])) {
    ?>
    <center>Examnation Schedule (Re-registered Papers)</center>
    <form method="POST" action="./academic_incharge_dashboard.php">
     <table align="center" border="1">
      <tr>
          <td>Course</td>
          <td>
            
              <select id='course' name='course'>
                      
                      <?php 
                      ## Fetch course
                      $sql = "SELECT DISTINCT course FROM AUTO_POPULATION WHERE course!='NA'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($course = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$course['course']."'>".$course['course']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>
        <tr>
          <td>Department</td>
          <td>
            
              <select id='department' name='department'>
                      
                      <?php 
                      ## Fetch department
                      $sql = "SELECT DISTINCT department FROM  AUTO_POPULATION WHERE department!='NA' and department!='Administration'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($dept = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$dept['department']."'>".$dept['department']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>


        <tr>
          <td>Stream</td>
          <td>
            
              <select id='stream' name='stream'>
                      
                      <?php 
                      ## Fetch stream
                      $sql = "SELECT DISTINCT stream FROM  AUTO_POPULATION WHERE stream!='NA'";
                      $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                    
                  while($stream = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$stream['stream']."'>".$stream['stream']."</option>";
                      }
                      ?>
                </select>

          </td>
        </tr>



       <tr>
         <td>Academic Year</td>
         <td>
            
              <select id='academic_year' name='academic_year'>
                      
                      <?php 
                      ## Fetch stream
                      $sql = "SELECT DISTINCT current_session FROM  AUTO_POPULATION WHERE current_session!='NA'";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                    
                  while($ay = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$ay['current_session']."'>".$ay['current_session']."</option>";
                      }
                      ?>
                </select>

          </td>
         
       </tr>
       <tr>
         <td>Semester</td>
         <td>
          <select id='semester' name='semester'>
                      
                      <?php 
                      ## Fetch semester
                      $sql = "SELECT DISTINCT semester_number FROM  AUTO_POPULATION WHERE semester_number!=0";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute();
                    
                  while($sn = $stmt->fetch(PDO::FETCH_ASSOC)){
                      
                         echo "<option value='".$sn['semester_number']."'>".$sn['semester_number']."</option>";
                      }
                      ?>
                </select>
         </td>
       </tr>

       <tr>
         <td colspan="2" align="center">
          <input type="submit" name="update_exam_time_bak" value="Search">
          
         </td>
       </tr>
     </table>
   </form>
  <?php 
  }


  if (isset($_POST['update_exam_time_bak'])) {
    $course=$_POST['course'];
    $department=$_POST['department'];
    $stream=$_POST['stream'];
    $academic_year=$_POST['academic_year'];
    $semester=$_POST['semester'];


    $sql= "SELECT * FROM OFFERED_BACKLOG_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' order by ID";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount()==0) {
      ?>
      <center><strong><font color="red" size="4">Sorry!! no subjects (Re-registered) offered for <br></font></strong></center>
      <center><strong>Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </strong></center>

      

      <?php 
      require_once("./includes/footer.php");
      die;
    }


    //Check whether schedule is already set or not
    $sql= "SELECT * FROM OFFERED_BACKLOG_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' and date_of_exam!=''";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount()>0) {
      ?>
      <center><strong><font color="red" size="4">Schedule already set for Re-registered Papers<br></font></strong></center>
      <center><strong>Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </br>Current Schedule</strong></center>

      <table border="1" align="center" width="70%">
        <tr>
          <td>Subject Code</td>
          <td>Subject Name</td>
          <td>Exam Date</td>
          <td>Start Time</td>
          <td>Duration</td>
        </tr>
      <?php 
        $sql="SELECT * FROM OFFERED_BACKLOG_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester'";
          $stmt=$pdo->prepare($sql);
          $stmt->execute();

          while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
              <td><?=$var['subject_code'] ?></td>
              <td><?=$var['subject_name'] ?></td>
              <td><?=$var['date_of_exam'] ?></td>
              <td><?=$var['time_of_exam'] ?></td>
              <td><?=$var['duration_of_exam'] ?></td>
            </tr>
            <?php 
          }

      ?>
      </table>
      <?php 
      require_once("./includes/footer.php");
      die;
    }

    ?>
    <center><strong>Schedule Exam Time (Re-registered Papers)</br>
      Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </strong></center>
      <form method="POST" action="academic_incharge_dashboard.php">
        <input type="hidden" name="department" value="<?= $department ?>">
        <input type="hidden" name="course" value="<?= $course ?>">
        <input type="hidden" name="stream" value="<?= $stream ?>">
        <input type="hidden" name="semester" value="<?= $semester ?>">
        <input type="hidden" name="academic_year" value="<?= $academic_year ?>">
       

      <table border="1" align="center" width="70%">
        <tr>
          <td>Subject Code</td>
          <td>Subject Name</td>
          <td>Exam Date</br>mm/dd/yyyy</td>
          <td>Start Time</td>
          <td>Duration</td>
        </tr>
         <!--Datepicker-->
              <link rel="stylesheet" href="./css/jquery-ui.css">
              <link rel="stylesheet" href="./css/style.css">
              <script src="./js/jquery-1.12.4.js"></script>
              <script src="./js/jquery-ui.js"></script>
              <script type="text/javascript">
                        $(function() {
                         $('input').filter('.datepicker').datepicker({
                          changeMonth: true,
                          changeYear: true,
                          showOn: 'button',
                          buttonImage: './includes/images/clock.png',
                          buttonImageOnly: true
                         });
                        });
              </script>


          <!--Timepicker-->
       <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
       <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
          
          <script type="text/javascript">
            $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 15,
            minTime: '09',
            maxTime: '6:00pm',
            defaultTime: '10',
            startTime: '10:00',
            dynamic: true,
            dropdown: false,
            scrollbar: true
        });
          </script>
          


    <?php 
    $i=1;
          $sql= "SELECT * FROM OFFERED_BACKLOG_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' order by ID";
          $stmt=$pdo->prepare($sql);
          $stmt->execute();
        while($var = $stmt->fetch(PDO::FETCH_ASSOC)){

          $subject_code=$var['subject_code'];
          $subject_name=$var['subject_name'];

          ?>
          <tr>
            <td>
              <?=$subject_code ?><input type="hidden" name="subject_code_<?=$i?>" value="<?=$subject_code ?>">
            </td>
            <td>
              <?=$subject_name ?><input type="hidden" name="subject_name_<?=$i?>" value="<?=$subject_name ?>">
            </td>
            <td>
              <input type="text" size="10px" class="datepicker" id="datepicker_<?=$i?>" name="exam_date_<?=$i?>" required="true" minlength='10' maxlength='10'>
            </td>
            <td>
              <select name="exam_time_<?=$i?>">
                <option value="09:00 AM">09:00 AM</option>
                <option value="09:30 AM">09:30 AM</option>
                <option value="10:00 AM">10:00 AM</option>
                <option value="10:30 AM">10:30 AM</option>
                <option value="11:00 AM">11:00 AM</option>
                <option value="02:00 PM">02:00 PM</option>
              </select>
            </td>
            <td>
              <select name="exam_duration_<?=$i?>">
                <option value="1 Hour 00 Minute">1 Hour 00 Minute</option>
                <option value="1 Hour 30 Minutes">1 Hour 30 Minutes</option>
                <option value="2 Hours 00 Minute">2 Hours 00 Minute</option>
                <option value="3 Hours 00 Minute">3 Hours 00 Minute</option>
              </select>
            </td>
          </tr>
          <?php 
          $i++;
        }
    ?>
        <tr>
                <td colspan="5" align="center">
                  <input type="submit" name="schedule_exam_backlog" value="Schedule">
                  <input type="hidden" name="no_of_record" value="<?=$i?>">
                </td>
        </tr>
      </table>
      </form>
    <?php 
  }

?>

<?php 
    if (isset($_POST['schedule_exam_backlog'])) {
      $course=$_POST['course'];
      $department=$_POST['department'];
      $stream=$_POST['stream'];
      $semester=$_POST['semester'];
      $academic_year=$_POST['academic_year'];
      $no_of_record=$_POST['no_of_record'];

      ?>
      <center><strong>Confirm Examination Schedule (Re-registered)</br>
      Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </strong></center>
      <form method="POST" action="academic_incharge_dashboard.php">
        <input type="hidden" name="department" value="<?= $department ?>">
        <input type="hidden" name="course" value="<?= $course ?>">
        <input type="hidden" name="stream" value="<?= $stream ?>">
        <input type="hidden" name="semester" value="<?= $semester ?>">
        <input type="hidden" name="academic_year" value="<?= $academic_year ?>">
       

      <table border="1" align="center" width="70%">
        <tr>
          <td>Subject Code</td>
          <td>Subject Name</td>
          <td>Exam Date</td>
          <td>Start Time</td>
          <td>Duration</td>
        </tr>
        <?php 
        $i=1;
        for ($i=1; $i <$no_of_record ; $i++) { 
          $subject_code=$_POST['subject_code_'.$i];
          $subject_name=$_POST['subject_name_'.$i];
          $exam_date=$_POST['exam_date_'.$i];

          $tv=explode('/', $exam_date);
          $exam_date=$tv[1]."-".$tv[0]."-".$tv[2];

          $exam_time=$_POST['exam_time_'.$i];
          $exam_duration=$_POST['exam_duration_'.$i];
          ?>
          <tr>
            <td>
              <?=$subject_code ?><input type="hidden" name="subject_code_<?=$i?>" value="<?=$subject_code ?>">
            </td>
          
            <td>
              <?=$subject_name ?><input type="hidden" name="subject_name_<?=$i?>" value="<?=$subject_name ?>">
            </td>
          
            <td>
              <?=$exam_date ?><input type="hidden" name="exam_date_<?=$i?>" value="<?=$exam_date ?>">
            </td>
          
            <td>
              <?=$exam_time ?><input type="hidden" name="exam_time_<?=$i?>" value="<?=$exam_time ?>">
            </td>
          
            <td>
              <?=$exam_duration ?><input type="hidden" name="exam_duration_<?=$i?>" value="<?=$exam_duration ?>">
            </td>
          </tr>
          <?php 
        }

        ?>
        <tr>
                <td colspan="5" align="center">
                  <input type="submit" name="confirm_schedule_exam_backlog" value="Confirm Schedule">
                  <input type="hidden" name="no_of_record" value="<?=$i?>">
                </td>
        </tr>
      </table>
      </form>

      <?php 
    }
?>


<?php 
    if (isset($_POST['confirm_schedule_exam_backlog'])) {
      $course=$_POST['course'];
      $department=$_POST['department'];
      $stream=$_POST['stream'];
      $semester=$_POST['semester'];
      $academic_year=$_POST['academic_year'];
      $no_of_record=$_POST['no_of_record'];

      for ($i=1; $i <$no_of_record ; $i++) { 
          $subject_code=$_POST['subject_code_'.$i];
          $subject_name=$_POST['subject_name_'.$i];
          $exam_date=$_POST['exam_date_'.$i];
          $exam_time=$_POST['exam_time_'.$i];
          $exam_duration=$_POST['exam_duration_'.$i];

          $sql="UPDATE OFFERED_BACKLOG_SUBJECT SET date_of_exam='$exam_date', time_of_exam='$exam_time', duration_of_exam='$exam_duration' WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' and subject_code='$subject_code' ";
          $stmt=$pdo->prepare($sql);
          $stmt->execute();
      }
      ?>
        <center><strong><font color="red" size="4">Exam Time updated succesfull (Re-registered). </br>Current Exam Schedule (Re-registered)</font></strong></center>
        <center><strong></br>
      Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </strong></center>
        <table border="1" align="center" width="70%">
        <tr>
          <td>Subject Code</td>
          <td>Subject Name</td>
          <td>Exam Date</td>
          <td>Start Time</td>
          <td>Duration</td>
        </tr>
      <?php 
        $sql="SELECT * FROM OFFERED_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester'";
          $stmt=$pdo->prepare($sql);
          $stmt->execute();

          while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
              <td><?=$var['subject_code'] ?></td>
              <td><?=$var['subject_name'] ?></td>
              <td><?=$var['date_of_exam'] ?></td>
              <td><?=$var['time_of_exam'] ?></td>
              <td><?=$var['duration_of_exam'] ?></td>
            </tr>
            <?php 
          }

      ?>
      </table>
      <?php 
    }
?>


<?php require_once("./includes/footer.php"); ?>
