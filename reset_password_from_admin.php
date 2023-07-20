
<?php require_once("./includes/header_admin.php"); ?>

<script type="text/javascript">
	
function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
       
</script> 


</script>


<!-- ...............................................................................................-->

<?php
						if(isset($_POST['reset-password'])) {

							if ($_POST['user_type']=="Admin") {
			                                $table="users";
			                            }elseif($_POST['user_type']=="Faculty") {
			                                $table="staff";
			                            }else{
			                                $table="student";

			                }

							$email = trim($_POST['email']);
							$new_password=trim($_POST['new-password']);
							$confirm_password=trim($_POST['confirm-password']);
                        	                        	
                        	//user existance check start
                        	$sql_email_chk = "SELECT * FROM $table where email='$email'";
                            $stmt_email_chk = $pdo->prepare($sql_email_chk);
							$stmt_email_chk->execute();
                        	$email_count = $stmt_email_chk->rowCount();

                        
							if ($email_count == 0) {
								echo "<center><font color=\"red\">User with email id: " . $email ." not registered. </font></center>";
							}elseif ($new_password != $confirm_password) {
								echo "<center><font color=\"red\">New Password and confirm password does not match</br></font></center>";


							}elseif ($new_password == $confirm_password) {

								//Generate password hash
								$password_hash = password_hash($new_password, PASSWORD_BCRYPT);

								$sql_password_update = "UPDATE $table SET password='$password_hash' where email='$email'";
                                $stmt_password_update = $pdo->prepare($sql_password_update);
								if($stmt_password_update->execute())
								{
									
								
								echo "<center><font color=\"red\">Password reset successful.</font></center>";
								
								}
							}


							
						}

?>

<center><font color="green"><strong>Reset Password</strong></font></center>

<form action="reset_password_from_admin.php" method="POST">
<table align="center" border="1">
<td align="right">User Type</td>
	<td>
		<input type="radio" id="user_type1" name="user_type" value="Student">
		<label for="user_type1"> Student</label>&emsp;
		<input type="radio" id="user_type2" name="user_type" value="Faculty">
		<label for="user_type2"> Faculty</label>&emsp;
		<input type="radio" id="user_type3" name="user_type" value="Admin">
		<label for="user_type3"> Admin</label><br>
	</td>    
<tr>
	<td>Enter your registered email id:</td>
	<td><input name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required="true" style="width: 300px;"/></td>
</tr>

<tr style="color:purple"><td>New Password</td>
	<td>
        <input name="new-password" id="inputNewPassword" type="password" placeholder="Enter new password" required="true" style="width: 300px;" minlength="6" maxlength="12" value="123456" />
    </td>
</tr>
                                              

 <tr style="color:purple"><td>Confirm Password</td>
 	<td>
    	<input name="confirm-password" id="inputConfirmPassword" type="text" placeholder="Confirm password" required="true" style="width: 300px;" minlength="6" maxlength="12" value="123456" />
    </td>
</tr>

<tr align="center">
	<td colspan=2 ><button type="submit" name="reset-password" style="background-color:yellow;margin:auto;display:block;text-align:center;" >Reset Password</button></td>
</tr>

</table>

</form>

<?php require_once("./includes/footer.php"); ?>
