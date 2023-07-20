
<?php require_once("./includes/header_admin_staff.php"); ?>

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
		</script>

	 <!--..............................CheckAll Java script  end..............................-->






<!--
<div>
    <center><h1>IIIT Kalyani Exam Portal</h1></center>

</div>

<center><strong>WELCOME TO ADMIN-STAFF PAGE</strong></center> 
</div>-->

<?php 
//Late Fee Related









?>




<?php 
	$loggedin_user_email = $_SESSION['email'];
	$current_session=$_SESSION['current_session'];

	
	if(isset($_POST['activate_student_selection'])){
?>
		<center><strong>Search Students to Activate/Reject</strong></center>
		<form method='POST' action='./admin_staff_dashboard.php'>
			<table border='1' style='border-collapse: collapse;' align=center>
				<tr>
					<td>Registration Year</td>
					<td>
						
							<select id='sel_registration_year' name='sel_registration_year'>
						          
						          <?php 
						          ## Fetch registration year
						          $sql = "SELECT DISTINCT registration_year FROM USERS where user_type='Student'";
						          $stmt = $pdo->prepare($sql);
								  $stmt->execute();
        						
								  while($reg_year = $stmt->fetch(PDO::FETCH_ASSOC)){
						          
						             echo "<option value='".$reg_year['registration_year']."'>".$reg_year['registration_year']."</option>";
						          }
						          ?>
						    </select>

					</td>
				</tr>
				<tr>
					<td>Course</td>
					<td>
						
							<select id='sel_course' name='sel_course'>
						          
						          <?php 
						          ## Fetch course
						          $sql = "SELECT DISTINCT course FROM USERS where user_type='Student'";
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
						          $sql = "SELECT DISTINCT department FROM USERS where user_type='Student'";
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
						          ## Fetch course
						          $sql = "SELECT DISTINCT stream FROM USERS where user_type='Student'";
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
					<td colspan="2" align="center"><input type='submit' name='activate_student' value='Search'/></td>
					
				</tr>

			</table>
		</form>

<?php
	}elseif(isset($_POST['activate_student'])){

		$department=$_POST['sel_department'];
		$reg_year=$_POST['sel_registration_year'];
		$course=$_POST['sel_course'];
		$stream=$_POST['sel_stream'];

				$sql = "SELECT * FROM USERS where user_type='Student' and department='$department' and registration_year='$reg_year' and course='$course' and stream='$stream' and user_status='Inactivated' ";
	
                                       
  		$stmt = $pdo->prepare($sql);
			$stmt->execute();
      $record_count = $stmt->rowCount();

      if ($record_count==0) {
      	echo "<center><strong>Sorry!! no pending student to activate</strong></center>";
      	 require_once("./includes/footer.php"); 
      	 die;
      }

		echo "<center><strong>List of not activated Students</strong></center>";
		echo "<center><strong>Registration Year: " .$reg_year. " Department: " .$department. " Course: " .$course. " Stream: " .$stream . "</strong></center>";


        
        ?>
        
        <form method='POST' action='./admin_staff_dashboard.php'>
        <table border='1' style='border-collapse: collapse;' align=center>
        <tr style='background: orange;'><th><input type='checkbox' id='checkAll'/> Check</th><th>Email</th><th>Student Name</th><th>Roll No</th><th>Registration No</th><th>Status</th></tr>
        <?php
        while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        	$id=$user['ID'];
        	$emailid=$user['email'];
        	$full_name=$user['full_name'];
        	$roll_no=$user['roll_no'];
        	$reg_no=$user['reg_no'];
        	$current_user_status=$user['user_status'];
        	//$txtboxName="updated_user_status_" . $id;
        	$roll_no_txtbox = "roll_no_" . $id;
        	$reg_no_txtbox = "reg_no_" . $id;
        	$full_name_txtbox = "full_name_" . $id;
        	
        	?>
        	<tr>
        		<td><input type='checkbox' name='update[]' value='<?= $id ?>'/></td>
        		<td><?= $emailid ?> </td>
        		<td><input type='text' name='<?= $full_name_txtbox ?>' value='<?= $full_name ?>' /></td>
        		<td><input type='text' name='<?= $roll_no_txtbox ?>' value='<?= $roll_no ?>' minlength='9' maxlength='9'/></td>
        		<td><input type='text' name='<?= $reg_no_txtbox ?>' value='<?= $reg_no ?>' minlength='6' maxlength='6'/></td>
        		<!--<td><input type='text' name='<?= $txtboxName ?>' value='<?= $current_user_status ?>' disabled='true'/></td>-->
        		<td><?= $current_user_status ?></td>
        	</tr>

       <?php } ?>
	        <tr>
	        	<td colspan=6 align=centere><input type='submit' name='activate_student_btn' value='Activate Selected Users'/>&nbsp &nbsp &nbsp <input type='submit' name='reject_student_btn' value='Reject Selected Users'/></td>
	        </tr>
        </table>
        </form>

        
	<?php
	
	}elseif(isset($_POST['activate_student_btn']) or isset($_POST['reject_student_btn']))
	{		
				
				//print_r($_POST); 
			  if(isset($_POST['update'])){
			    foreach($_POST['update'] as $userid){
			      
			      //$x="updated_user_status_" . $userid;
			      
			      $full_name = $_POST["full_name_" . $userid];
			      $roll_no=$_POST["roll_no_" . $userid];
			      $reg_no=$_POST["reg_no_" . $userid];

			      //echo $full_name;echo $roll_no; echo $reg_no;

			      if (isset($_POST['reject_student_btn'])) {
			      	$status='Rejected';
			      }else
			      {$status='Activated';
			  	  }

			  	  //Check if updated roll number exists
			  	  $sql_roll_cnt = "SELECT * FROM USERS where user_type='Student' and roll_no='$roll_no' and ID!='$userid'";
                  $stmt_roll_cnt = $pdo->prepare($sql_roll_cnt);
				  $stmt_roll_cnt->execute();
				  $roll_count = $stmt_roll_cnt->rowCount();


			  	  //Check if updated registration number exists
			  	  $sql_reg_cnt = "SELECT * FROM USERS where user_type='Student' and reg_no='$reg_no' and ID!='$userid'";
                  $stmt_reg_cnt = $pdo->prepare($sql_reg_cnt);
				  $stmt_reg_cnt->execute();
				  $reg_count = $stmt_reg_cnt->rowCount();

				  if ($roll_count!=0) {
				  	echo "<center><font color=\"red\"><strong>Updated roll no '" .$roll_no . "' already exists in record. This record not updated.</strong></font></center>";
				  }
				  if ($reg_count!=0) {
				  	echo "<center><font color=\"red\"><strong>Updated Registration no '" .$reg_no . "' already exists in record. This record not updated</strong></font></center>";
				  }
				  if ($roll_count==0 and $reg_count==0)
				  {


				   	  $sql = "UPDATE USERS SET user_status='$status', activated_by='$loggedin_user_email', activated_on=current_timestamp(), full_name='$full_name', roll_no='$roll_no', reg_no='$reg_no' where ID='$userid'";
				   	  $stmt = $pdo->prepare($sql);
				   	  //echo $sql;
				   	  $stmt->execute();

				   	  if (isset($_POST['reject_student_btn'])) {
				   	  echo "<center><font color=\"brown\">'" .$full_name. "' Roll no: '" .$roll_no. "' Reg no: '" .$reg_no. "' ::REJECTED</font></center>";}

				   	  else{
				   	  		echo "<center><font color=\"green\">'" .$full_name. "' Roll no: '" .$roll_no. "' Reg no: '" .$reg_no. "' activated and record updated (if any)</font></center>";

				   	  }
			   	}else{
			   		//echo "Error in record update";

			   	}

			   	  


			    }

			    
			  }

	} 




	?>


	
<!--........................................Change Password...................................-->
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
          //header("Location=./session_logout.php");
          //header("url: ../session_logout.php");



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

<form action="./admin_staff_dashboard.php" method="POST">
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
  <td colspan=2 ><button type="submit" name="change-password-btn" style="background-color:yellow;margin:auto;display:block;text-align:center;" >Change Password</button></td>
</tr>

</table>

</form>


<?php
}

?>


<?php
//Fee receipt verification form
	if (isset($_POST['fee-receipt-verify'])) {
?>
		<center><strong>Search Students Fee Receipt</strong></center>
		<form method='POST' action='./fee_receipt_verify.php'>
			<table border='1' style='border-collapse: collapse;' align=center>
				<tr>
					<td>Academic Year</td>
					<td>
						
							<select id='sel_academic_year' name='sel_academic_year'>
						       						          
						             
						            <option value='2022-2023'>2022-2023</option>
						            <option value='2021-2022'>2021-2022</option>
						         
						    </select>

					</td>
				</tr>
				<tr>
					<td>Course</td>
					<td>
						
							<select id='sel_course' name='sel_course'>
						          
						          <?php 
						          ## Fetch course
						          $sql = "SELECT DISTINCT course FROM AUTO_POPULATION where course!='NA'";
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
						          $sql = "SELECT DISTINCT department FROM AUTO_POPULATION where department!='NA' and department!='Administration'";
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
						          ## Fetch course
						          $sql = "SELECT DISTINCT stream FROM AUTO_POPULATION where stream!='NA'";
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
						          
						             <option value='1'>1</option>
						             <option value='2'>2</option>
						             <option value='3'>3</option>
						             <option value='4'>4</option>
						             <option value='5'>5</option>
						             <option value='6'>6</option>
						             <option value='7'>7</option>
						             <option value='8'>8</option>
						         
						             <option value='Autumn 2021-2022'>Autumn 2021-2022</option>
						             <option value='Spring 2021-2022'>Spring 2021-2022</option>
						             <option value='Autumn 2022-2023'>Autumn 2022-2023</option>
						             <option value='Spring 2022-2023'>Spring 2022-2023</option>

						             <option value='9'>9</option>
						             <option value='10'>10</option>
						             <option value='11'>11</option>
						             <option value='12'>12</option>
						    </select>

					</td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input style="color:white;background-color:blue;" type='submit' name='fee-receipt-verify-btn' value='Search'/></td>
					
				</tr>

			</table>
		</form>
<?php		
	}
?>



<?php
//Fee receipt provisionally allow form
	if (isset($_POST['fee-receipt-provisionally-allow'])) {
?>
		<center><strong>Provisionally allow student</strong></center>
		<form method='POST' action='./fee_receipt_verify.php'>
			<table border='1' style='border-collapse: collapse;' align=center>
				<tr>
					<td>Academic Year</td>
					<td>
						
							<select id='sel_academic_year' name='sel_academic_year'>
						       						          
						             <option value='<?=$current_session?>'><?=$current_session; ?></option>
						            <!-- <option value=''></option> -->
						         
						    </select>

					</td>
				</tr>
				<tr>
					<td>Course</td>
					<td>
						
							<select id='sel_course' name='sel_course'>
						          
						          <?php 
						          ## Fetch course
						          $sql = "SELECT DISTINCT course FROM AUTO_POPULATION where course!='NA'";
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
						          $sql = "SELECT DISTINCT department FROM AUTO_POPULATION where department!='NA' and department!='Administration'";
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
						          ## Fetch course
						          $sql = "SELECT DISTINCT stream FROM AUTO_POPULATION where stream!='NA'";
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
						          ## Fetch course
						          $sql = "SELECT DISTINCT semester_number FROM AUTO_POPULATION where semester_number!='0'";
						          $stmt = $pdo->prepare($sql);
								  $stmt->execute();
        						
								  while($sem = $stmt->fetch(PDO::FETCH_ASSOC)){
						          
						             echo "<option value='".$sem['semester_number']."'>".$sem['semester_number']."</option>";
						          }
						          ?>
						    </select>

					</td>
				</tr>

				<tr>
					<td>Registration No</td>
					<td>
						
						<input type="text" name="reg_no" placeholder="Enter 6 digit reg no" minlength="6" maxlength="6">
					</td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input style="color:white;background-color:blue;" type='submit' name='fee-receipt-provisionally-allow-btn' value='Allow'/></td>
					
				</tr>

			</table>
		</form>
<?php		
	}
?>





<!--Exam time update Regular-->

<?php 
  if (isset($_POST['update-exam-time-regular'])) {
    ?>
    <center>Examination Schedule (Regular Papers)</center>
    <form method="POST" action="./admin_staff_dashboard.php">
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
         <td>Exam Type</td>
         <td>
          <select id='exam_type' name='exam_type'>
                      
                                      
                         <option value='mid_sem'>Mid Semester</option>
                         <option value='end_sem'>End Semester</option>
 
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
    $exam_type=$_POST['exam_type'];


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
      <center><strong><font color="red" size="4">Schedule already set for some/all Regular Papers. Ask ERP team to reset it before changing the schedule.<br></font></strong></center>
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
      <form method="POST" action="admin_staff_dashboard.php">
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

    	$sql='';
    	if ($exam_type=='end_sem') {
    		$sql= "SELECT distinct subject_code,subject_name FROM OFFERED_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester'  and subject_category!='SESSIONAL'order by ID";
        $stmt=$pdo->prepare($sql);
    	}else{
    		$sql= "SELECT distinct subject_code,subject_name FROM OFFERED_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' and subject_category!='SESSIONAL' order by ID";
        
    	}
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
              	<option value="">Not Set</option>
                <option value="09:00 AM">09:00 AM</option>
                <option value="09:30 AM">09:30 AM</option>
                <option value="10:00 AM">10:00 AM</option>
                <option value="10:30 AM">10:30 AM</option>
                <option value="11:00 AM">11:00 AM</option>
                <option value="02:00 PM">02:00 PM</option>
                <option value="03:00 PM">03:00 PM</option>
              </select>
            </td>
            <td>
              <select name="exam_duration_<?=$i?>">
              	<option value="">Not Set</option>
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
      <center><strong>Confirm Examination Schedule (Regular Papers)</br>
      Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </strong></center>
      <form method="POST" action="admin_staff_dashboard.php">
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
        <center><strong><font color="red" size="4">Exam Time updated succesfull (Regular Papers) </br>Current Exam Schedule</font></strong></center>
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
    <center>Examination Schedule (Re-registered Papers)</center>
    <form method="POST" action="./admin_staff_dashboard.php">
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
         <td>Exam Type</td>
         <td>
          <select id='exam_type' name='exam_type'>
                      
                                      
                         <option value='mid_sem'>Mid Semester</option>
                         <option value='end_sem'>End Semester</option>
 
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
    $exam_type=$_POST['exam_type'];

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
      <center><strong><font color="red" size="4">Schedule already set for some or all subject of  <br>Any  update will overrite previous data</font></strong></center>
      <center><strong>Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </br>Ask ERP Team to reset it first before updating new schedule</br>Current Schedule</strong></center>

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
      //require_once("./includes/footer.php");
      //die;
    }

    ?>
    <center><strong>Schedule Exam Time (Re-registered)</br>
      Course: <?=$course ?>, Deparement: <?=$department ?>, Stream: <?=$stream ?>, AY: <?=$academic_year ?>, Semester: <?=$semester ?> </strong></center>
      <form method="POST" action="admin_staff_dashboard.php">
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
    	$sql='';

          if ($exam_type=='end_sem') {
          	$sql= "SELECT DISTINCT subject_code,subject_name FROM OFFERED_BACKLOG_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' and subject_category!='SESSIONAL'  order by ID";
          }else{
          	$sql= "SELECT DISTINCT subject_code,subject_name FROM OFFERED_BACKLOG_SUBJECT WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester' and subject_category!='SESSIONAL' order by ID";
          }
           //echo $sql;
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



                <option value="03:00 PM">03:00 PM</option>
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
      <form method="POST" action="admin_staff_dashboard.php">
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
        <center><strong><font color="red" size="4">Exam Time updated succesfull (Re-registered). </br>Current Exam Schedule</font></strong></center>
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





<!-- Upload and search subjects offered -->


<?php
	if (isset($_POST['upload_sublects_offered'])) {
		
?>
	<div id="wrapper" align="center">
		<font color="red" size="9">Upload offered course details (Regular)</font></br>
		<a href="./sample_files/OFFERED_SUBJECT_SAMPLE_FORMAT.csv" download>Click here</a> for sample format</br></br>
 		<form method="post" action="./import_file_admin_staff.php" enctype="multipart/form-data">
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
              </br><font color="blue">Choose Autumn #### or Spring #### for PhD;</br>Choose # for BTech/MTech;</font>
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
    <font color="red" size="9">Upload offered course details (Re-registered)</font></br>
    <a href="./sample_files/OFFERED_SUBJECT_SAMPLE_FORMAT.csv" download>Click here</a> for sample format</br></br>
    <form method="post" action="./import_file_admin_staff.php" enctype="multipart/form-data">
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
//Fee receipt verification form
	if (isset($_POST['fee-receipt-check-sem'])) {
?>
		<center><strong>Search Students Fee Receipt - Semester Wise</strong></center>
		<form method='POST' action='./fee_receipt_check_new.php'>
			<table border='1' style='border-collapse: collapse;' align=center>
				<tr>
					<td>Academic Year</td>
					<td>
						
							<select id='sel_academic_year' name='sel_academic_year'>
						       						          
						             <option value='2022-2023'>2022-2023</option>
						             <option value='2021-2022'>2021-2022</option>
						              
						         
						    </select>

					</td>
				</tr>
				<tr>
					<td>Course</td>
					<td>
						
							<select id='sel_course' name='sel_course'>
						          
						          <?php 
						          ## Fetch course
						          $sql = "SELECT DISTINCT course FROM AUTO_POPULATION where course!='NA'";
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
						          $sql = "SELECT DISTINCT department FROM AUTO_POPULATION where department!='NA' and department!='Administration'";
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
						          ## Fetch course
						          $sql = "SELECT DISTINCT stream FROM AUTO_POPULATION where stream!='NA'";
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
						        
						          
						             <option value='1'>1</option>
						             <option value='2'>2</option>
						             <option value='3'>3</option>
						             <option value='4'>4</option>
						             <option value='5'>5</option>
						             <option value='6'>6</option>
						             <option value='7'>7</option>
						             <option value='8'>8</option>
						         
						             <option value='Autumn 2021-2022'>Autumn 2021-2022</option>
						             <option value='Spring 2021-2022'>Spring 2021-2022</option>
						             <option value='Autumn 2022-2023'>Autumn 2022-2023</option>
						             <option value='Spring 2022-2023'>Spring 2022-2023</option>

						             <option value='9'>9</option>
						             <option value='10'>10</option>
						             <option value='11'>11</option>
						             <option value='12'>12</option>
						  
						    </select>

					</td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input style="color:white;background-color:blue;" type='submit' name='fee-receipt-check-sem-btn' value='Search'/></td>
					
				</tr>

			</table>
		</form>
<?php		
	}
?>

<?php
//Fee receipt verification form
	if (isset($_POST['fee-receipt-check-indv-stud'])) {
?>
		<center><strong>Search Students Fee Payment Record - Individual Student</strong></center>
		<form method='POST' action='./fee_receipt_check_new.php'>
			<table border='1' style='border-collapse: collapse;' align=center>
				

				<tr>
					<td>Reg No (3/4 digits)</td>
					<td>
						
							<input type="text" maxlength="4" name="reg_no">

					</td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input style="color:white;background-color:blue;" type='submit' name='fee-receipt-check-indv-stud-btn' value='Search'/></td>
					
				</tr>

			</table>
		</form>
<?php		
	}
?>




<?php require_once("./includes/footer.php"); ?>
