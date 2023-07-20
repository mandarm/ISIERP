<?php ob_start(); session_start();?>
<?php require_once("./includes/header.php"); ?>






<!-- ....................................... Signin Handeller Start........................................................-->
<?php
						if(isset($_POST['submit'])) {


                            
							$email = strtolower(trim($_POST['email']));
                           	$password = trim($_POST['password']);
                        	$password_hash = password_hash($password, PASSWORD_BCRYPT,);
                        	
                            $table='';
                        	//user existance check start

			                            if ($_POST['user_type']=="Admin") {
			                                $table="users";
			                            }elseif($_POST['user_type']=="Faculty") {
			                                $table="staff";
			                            }else{
			                                $table="student";

			                            }
                        	
				            
                            $sql_email_chk = "SELECT * FROM $table where email='$email'";    
                                       
  							$stmt_email_chk = $pdo->prepare($sql_email_chk);
							$stmt_email_chk->execute();
                        	$email_count = $stmt_email_chk->rowCount();
									
                        	//echo $sql_email_chk;

                            if ($email_count == 0){
                                echo "<center><font color=\"red\">User does not exists.</font></center>";
                                //die;
                            }elseif ($email_count == 1){
                     			//user credential check - verify password - start
  								$user = $stmt_email_chk->fetch(PDO::FETCH_ASSOC);
                                $user_password_hash = $user['password'];
                                $user_role = $user['user_type'];
                                $user_name = $user['full_name'];
                               
                                $roll_no=$user['roll_no'];
                                $unit=$user['unit'];

                        		if (password_verify($password, $user_password_hash)){//login process starts

                        			if ($user['user_status']=="Inactivated") {
                        				echo "<center><font color=\"red\">Your account has not activated yet</font></center>";
                        				//die;
                        			}elseif ($user['user_status']=="Suspended") {
                        				echo "<center><font color=\"red\">Your account has been suspended</font></center>";
                        				//die;
                        			}elseif($user['email_verified']=="NO"){
                        				echo "<center><font color=\"red\">Your email is not verified yet. Verify email first.</font></center>";
                        				//die;
                        			}else{
										//echo "Login successful";
										$_SESSION['email']=$email;
										$_SESSION['roll_no']=$roll_no;
										$_SESSION['login']='success';
										$_SESSION['user_name']=$user_name;
										$_SESSION['login_time_stamp'] = time();
                                        $_SESSION['unit']=$unit;
										$_SESSION['user_role']=$user_role;
										
                                        if($user_role=="Student"){


            								$_SESSION['course']=$user['course'];
            								$_SESSION['batch']=$user['batch'];
            								$_SESSION['stream']=$user['stream'];
                                            $_SESSION['prev_degree']=$user['prev_degree'];
                                            $_SESSION['user_role']=$user_role;
                                            $batch=intval($user['batch']);


                                     
                                           $cy=intval(explode('-',date("Y-m"))[0]);
                                           $cm=intval(explode('-',date("Y-m"))[1]);
                                          

                                            
                                            if ($cy==$batch and $cm>=7 and $cm<=12) {
                                            	$_SESSION['semester']=1;
                                            }elseif ($cy==($batch +1) and $cm>=1 and $cm<=6) {
                                            	$_SESSION['semester']=2;
                                            }elseif ($cy==($batch +1) and $cm>=7 and $cm<=12) {
                                            	$_SESSION['semester']=3;
                                            }elseif ($cy==($batch +2) and $cm>=1 and $cm<=6) {
                                            	$_SESSION['semester']=4;
                                            }elseif ($cy==($batch +2) and $cm>=7 and $cm<=12) {
                                            	$_SESSION['semester']=5;
                                            }elseif ($cy==($batch +3) and $cm>=1 and $cm<=6) {
                                            	$_SESSION['semester']=6;
                                            }elseif ($cy==($batch +3) and $cm>=7 and $cm<=12) {
                                            	$_SESSION['semester']=7;
                                            }elseif ($cy==($batch +4) and $cm>=1 and $cm<=6) {
                                            	$_SESSION['semester']=8;
                                            }else{
                                            	$_SESSION['semester']=0;
                                            }

                                                                                 
                                        }

                                        //Mandetory page to update mobile no
                                        $sql="SELECT * FROM $table WHERE email='$email' and mob_no=0";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();


                                        if ($stmt->rowCount()==1) {
                                            $_SESSION['update_mob_no']='Update Mobile No';
                                            header("Refresh:0;url=./updates.php");
                                            die;
                                        }
                                        
                                                                            
                                        if ($user_role=="DB-Admin") {
                                        
											header("Refresh:0;url=./admin_dashboard.php");
										}elseif ($user_role=="Faculty") {
											header("Refresh:0;url=./faculty_dashboard.php");
										}elseif ($user_role=="Student") {
											header("Refresh:0;url=./student_dashboard.php");
										}else{

											header("Refresh:0;url=./index.php");
										}
										
										

									
									}
								} // user credential check - end

								else{ echo "<center><font color=\"red\">Wrong Credentials</font></center>";
								//die;
								} 
							}
							else {echo "<center><font color=\"red\">Multiple users registered with same email id</font></center>";//die;
								}

                                skip_student_login:
                                skip_faculty_login:
                                null_login:

					}  
					 ?>



<!-- ....................................... Signin Handeller End........................................................-->
<br><br>
<form action="index.php" method="POST">
<table align="center" border="1">
<tr>
	<td align="right">Login As</td>
	<td>
		<input type="radio" id="user_type1" name="user_type" value="Student">
		<label for="user_type1"> Student</label>&emsp;
		<input type="radio" id="user_type2" name="user_type" value="Faculty">
		<label for="user_type2"> Faculty</label>&emsp;
		<input type="radio" id="user_type3" name="user_type" value="Admin">
		<label for="user_type3"> Admin</label><br>
	</td>

<!--
	<td>
		<select name="user_type">
		<option value="Student">Student</option>
		<option value="Faculty">Faculty</option>
		<option value="Admin">Admin</option>
	</select>
</td>-->
</tr>
    
<tr>
    <td align="right">Email Id:</td>
    <td><input name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter institute email" required="true" /> </td> 
</tr>
<tr><td align="right">Password:</td><td><input name="password" id="inputPassword" type="password" placeholder="Enter password" required="true" maxlength="12" /></td></tr>

<tr align="center"><td colspan=2 ><button type="submit" name="submit" style="background-color:yellow;margin:auto;display:block;text-align:center;">Login</button></td><td></td></tr>


<tr><td colspan="3"><center>Do not have an account? <a href="./student_signup.php">Click Here</a> to Sign Up (for Student Only)</center></td></tr>
</table>

</form>

<?php require_once("./includes/footer.php"); ?>
