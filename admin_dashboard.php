
<?php require_once("./includes/header_admin.php"); ?>


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


	
<?php 
	$loggedin_user_email = $_SESSION['email'];
	
	if(isset($_POST['activate_pi'])){


		echo "<center>List of not activated PI-Exams</center>";

		$sql = "SELECT * FROM USERS where user_type='PI-Exam' and user_status='Inactivated' ";
                                       
  		$stmt = $pdo->prepare($sql);
		$stmt->execute();
        $record_count = $stmt->rowCount();
        
        ?>
        
        <form method='POST' action='./admin_dashboard.php'>
        <table border='1' style='border-collapse: collapse;' align=center>
        <tr style='background: orange;'><th><input type='checkbox' id='checkAll'/> Check</th><th>Email</th><th>PI Name</th><th>Status</th></tr>
        <?php
        while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        	$id=$user['ID'];
        	$emailid=$user['email'];
        	$full_name=$user['full_name'];
        	$current_user_status=$user['user_status'];
        	$txtboxName="updated_user_status_" . $id;
        	
        	?>
        	<tr>
        		<td><input type='checkbox' name='update[]' value='<?= $id ?>'/></td>
        		<td><?= $emailid ?> </td>
        		<td><?= $full_name ?></td>
        		<!--<td><input type='text' name='<?= $txtboxName ?>' value='<?= $current_user_status ?>' disabled='true'/></td>-->
        		<td><?= $current_user_status ?></td>
        	</tr>

       <?php } ?>
	        <tr>
	        	<td colspan=4 align=centere><input type='submit' name='activate_piexam_btn' value='Activate Selected Users'/>&nbsp &nbsp &nbsp <input type='submit' name='reject_piexam_btn' value='Reject Selected Users'/></td>
	        </tr>
        </table>
        </form>

        
	<?php
	
	}elseif(isset($_POST['activate_admin_staff'])){

				echo "<center>List of not activated Administraation Staffs</center>";

		$sql = "SELECT * FROM USERS where user_type='Admin-Staff' and user_status='Inactivated' ";
                                       
  		$stmt = $pdo->prepare($sql);
		$stmt->execute();
        $record_count = $stmt->rowCount();
        
        ?>
        
        <form method='POST' action='./admin_dashboard.php'>
        <table border='1' style='border-collapse: collapse;' align=center>
        <tr style='background: orange;'><th><input type='checkbox' id='checkAll'/> Check</th><th>Email</th><th>Admin Staff Name</th><th>Status</th></tr>
        <?php
        while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        	$id=$user['ID'];
        	$emailid=$user['email'];
        	$full_name=$user['full_name'];
        	$current_user_status=$user['user_status'];
        	$txtboxName="updated_user_status_" . $id;
        	
        	?>
        	<tr>
        		<td><input type='checkbox' name='update[]' value='<?= $id ?>'/></td>
        		<td><?= $emailid ?> </td>
        		<td><?= $full_name ?></td>
        		<!--<td><input type='text' name='<?= $txtboxName ?>' value='<?= $current_user_status ?>' disabled='true'/></td>-->
        		<td><?= $current_user_status ?></td>
        	</tr>

       <?php } ?>
	        <tr>
	        	<td colspan=4 align=centere><input type='submit' name='activate_admin_staff_btn' value='Activate Selected Users'/>&nbsp &nbsp &nbsp <input type='submit' name='reject_admin_staff_btn' value='Reject Selected Users'/></td>
	        </tr>
        </table>
        </form>

        
	<?php

	}elseif(isset($_POST['activate_dbadmin'])){


		echo "<center>List of not activated DB-Admin</center>";

		$sql = "SELECT * FROM USERS where user_type='DB-Admin' and user_status='Inactivated' ";
                                       
  		$stmt = $pdo->prepare($sql);
		$stmt->execute();
        $record_count = $stmt->rowCount();
        
        ?>
        
        <form method='POST' action='./admin_dashboard.php'>
        <table border='1' style='border-collapse: collapse;' align=center>
        <tr style='background: orange;'><th><input type='checkbox' id='checkAll'/> Check</th><th>Email</th><th>DB-Admin Name</th><th>Status</th></tr>
        <?php
        while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        	$id=$user['ID'];
        	$emailid=$user['email'];
        	$full_name=$user['full_name'];
        	$current_user_status=$user['user_status'];
        	$txtboxName="updated_user_status_" . $id;
        	
        	?>
        	<tr>
        		<td><input type='checkbox' name='update[]' value='<?= $id ?>'/></td>
        		<td><?= $emailid ?> </td>
        		<td><?= $full_name ?></td>
        		<!--<td><input type='text' name='<?= $txtboxName ?>' value='<?= $current_user_status ?>' disabled='true'/></td>-->
        		<td><?= $current_user_status ?></td>
        	</tr>

       <?php } ?>
	        <tr>
	        	<td colspan=4 align=centere><input type='submit' name='activate_db_admin_btn' value='Activate Selected Users'/>&nbsp &nbsp &nbsp <input type='submit' name='reject_db_admin_btn' value='Reject Selected Users'/></td>
	        </tr>
        </table>
        </form>

        
	<?php

	}elseif (isset($_POST['activate_faculty'])) {
		echo "<center>List of not activated Faculty</center>";

		$sql = "SELECT * FROM USERS where user_type='Faculty' and user_status='Inactivated' ";
                                       
  		$stmt = $pdo->prepare($sql);
		$stmt->execute();
        $record_count = $stmt->rowCount();
        
        ?>
        
        <form method='POST' action='./admin_dashboard.php'>
        <table border='1' style='border-collapse: collapse;' align=center>
        <tr style='background: orange;'><th><input type='checkbox' id='checkAll'/> Check</th><th>Email</th><th>Faculty Name</th><th>Status</th></tr>
        <?php
        while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        	$id=$user['ID'];
        	$emailid=$user['email'];
        	$full_name=$user['full_name'];
        	$current_user_status=$user['user_status'];
        	$txtboxName="updated_user_status_" . $id;
        	
        	?>
        	<tr>
        		<td><input type='checkbox' name='update[]' value='<?= $id ?>'/></td>
        		<td><?= $emailid ?> </td>
        		<td><?= $full_name ?></td>
        		<!--<td><input type='text' name='<?= $txtboxName ?>' value='<?= $current_user_status ?>' disabled='true'/></td>-->
        		<td><?= $current_user_status ?></td>
        	</tr>

       <?php } ?>
	        <tr>
	        	<td colspan=4 align=centere><input type='submit' name='activate_faculty_btn' value='Activate Selected Users'/>&nbsp &nbsp &nbsp <input type='submit' name='reject_faculty_btn' value='Reject Selected Users'/></td>
	        </tr>
        </table>
        </form>

        
	<?php
	}	
	//Updating Faculty Status -DB code
	elseif(isset($_POST['activate_faculty_btn']) or isset($_POST['reject_faculty_btn']))
	{		
				
				//print_r($_POST); 
			  if(isset($_POST['update'])){
			    foreach($_POST['update'] as $userid){
			      
			      //$x="updated_user_status_" . $userid;
			      
			      //$status = $_POST[$x];
			      if (isset($_POST['reject_faculty_btn'])) {
			      	$status='Rejected';
			      }else
			      {$status='Activated';
			  	  }


			   	  $sql = "UPDATE USERS SET user_status='$status', activated_by='$loggedin_user_email', activated_on=current_timestamp() where ID='$userid'";
			   	  $stmt = $pdo->prepare($sql);
			   	  $stmt->execute();

			   	  echo "<center><font color=\"red\"><strong>Selected Faculty [id: $userid] Activation/Rejection Succesful</strong></font></center>";


			    }
			  }

	}elseif(isset($_POST['activate_piexam_btn']) or isset($_POST['reject_piexam_btn']))
	{		
				
			  //print_r($_POST); 
			  if(isset($_POST['update'])){
			    foreach($_POST['update'] as $userid){
			      
			      //$x="updated_user_status_" . $userid;
			      
			      //$status = $_POST[$x];
			      if (isset($_POST['reject_piexam_btn'])) {
			      	$status='Rejected';
			      }else
			      {$status='Activated';
			  	  }


			   	  $sql = "UPDATE USERS SET user_status='$status' , activated_by='$loggedin_user_email', activated_on=current_timestamp() where ID='$userid'";
			   	  $stmt = $pdo->prepare($sql);
			   	  $stmt->execute();

			   	  echo "<center><font color=\"red\"><strong>Selected PI-Exam Activation/Rejection Succesful</strong></font></center>";
			    }
			  }

	}elseif(isset($_POST['activate_admin_staff_btn']) or isset($_POST['reject_admin_staff_btn']))
	{		
				
			  //print_r($_POST); 
			  if(isset($_POST['update'])){
			    foreach($_POST['update'] as $userid){
			      
			      //$x="updated_user_status_" . $userid;
			      
			      //$status = $_POST[$x];
			      if (isset($_POST['reject_admin_staff_btn'])) {
			      	$status='Rejected';
			      }else
			      {$status='Activated';
			  	  }


			   	  $sql = "UPDATE USERS SET user_status='$status' , activated_by='$loggedin_user_email', activated_on=current_timestamp() where ID='$userid'";
			   	  $stmt = $pdo->prepare($sql);
			   	  $stmt->execute();

			   	  echo "<center><font color=\"red\"><strong>Selected Admin-Staff Activation/Rejection Succesful</strong></font></center>";

			    }
			  }

	}elseif(isset($_POST['activate_db_admin_btn']) or isset($_POST['reject_db_admin_btn']))
	{		
				
			  //print_r($_POST); 
			  if(isset($_POST['update'])){
			    foreach($_POST['update'] as $userid){
			      
			      //$x="updated_user_status_" . $userid;
			      
			      //$status = $_POST[$x];
			      if (isset($_POST['reject_db_admin_btn'])) {
			      	$status='Rejected';
			      }else
			      {$status='Activated';
			  	  }


			   	  $sql = "UPDATE USERS SET user_status='$status' , activated_by='$loggedin_user_email', activated_on=current_timestamp() where ID='$userid'";
			   	  echo $sql;
			   	  $stmt = $pdo->prepare($sql);
			   	  $stmt->execute();

			   	  echo "<center><font color=\"red\"><strong>Selected DB-Admin Activation/Rejection Succesful</strong></font></center>";

			    }
			  }

	}elseif (isset($_POST['activate_academic_incharge'])) {
		echo "<center>List of not activated Academic Incharge</center>";

		$sql = "SELECT * FROM USERS where user_type='Academic-Incharge' and user_status='Inactivated' ";
                                       
  		$stmt = $pdo->prepare($sql);
		$stmt->execute();
        $record_count = $stmt->rowCount();
        
        ?>
        
        <form method='POST' action='./admin_dashboard.php'>
        <table border='1' style='border-collapse: collapse;' align=center>
        <tr style='background: orange;'><th><input type='checkbox' id='checkAll'/> Check</th><th>Email</th><th>Academic Incharge Name</th><th>Status</th></tr>
        <?php
        while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        	$id=$user['ID'];
        	$emailid=$user['email'];
        	$full_name=$user['full_name'];
        	$current_user_status=$user['user_status'];
        	$txtboxName="updated_user_status_" . $id;
        	
        	?>
        	<tr>
        		<td><input type='checkbox' name='update[]' value='<?= $id ?>'/></td>
        		<td><?= $emailid ?> </td>
        		<td><?= $full_name ?></td>
        		<!--<td><input type='text' name='<?= $txtboxName ?>' value='<?= $current_user_status ?>' disabled='true'/></td>-->
        		<td><?= $current_user_status ?></td>
        	</tr>

       <?php } ?>
	        <tr>
	        	<td colspan=4 align=centere><input type='submit' name='activate_academic_incharge_btn' value='Activate Selected Users'/>&nbsp &nbsp &nbsp <input type='submit' name='reject_academic_incharge_btn' value='Reject Selected Users'/></td>
	        </tr>
        </table>
        </form>

        
	<?php
	}elseif(isset($_POST['activate_academic_incharge_btn']) or isset($_POST['reject_academic_incharge_btn']))
	{		
				
				//print_r($_POST); 
			  if(isset($_POST['update'])){
			    foreach($_POST['update'] as $userid){
			      
			      //$x="updated_user_status_" . $userid;
			      
			      //$status = $_POST[$x];
			      if (isset($_POST['reject_academic_incharge_btn'])) {
			      	$status='Rejected';
			      }else
			      {$status='Activated';
			  	  }


			   	  $sql = "UPDATE USERS SET user_status='$status', activated_by='$loggedin_user_email', activated_on=current_timestamp() where ID='$userid'";
			   	  $stmt = $pdo->prepare($sql);
			   	  $stmt->execute();

			   	  echo "<center><font color=\"red\"><strong>Selected Academic Incharge [id: $userid] Activation/Rejection Succesful</strong></font></center>";


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
          header("Refresh:0;url=./session_logout.php");



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

<form action="admin_dashboard.php" method="POST">
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




else{}



?>


</div>
















<?php require_once("./includes/footer.php"); ?>
