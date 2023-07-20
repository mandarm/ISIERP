
<?php require_once("./includes/header.php"); 
require_once("./includes/db.php"); 
date_default_timezone_set('Asia/Kolkata');

if (session_status() == PHP_SESSION_NONE) {
      session_start();
   }
$email=$_SESSION['email'];
$name=$_SESSION['user_name'];
$user_role=$_SESSION['user_role'];
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

//Update mobile no

	if (isset($_POST['submit_mob_no'])) {
		$table='';
		if ($user_role=="Admin") {
			$table="users";
		}elseif($user_role=="Faculty") {
			$table="staff";
		}else{
			$table="student";

		}


		$mobno=trim($_POST['mobno']);

		$sql="UPDATE $table SET mob_no='$mobno' where email='$email'";
		
		$stmt = $pdo->prepare($sql);

		if ($stmt->execute()) {
			echo "<font color='red' size='5'><center>Mobile No update successful. Redirecting to Dashboard in 5 seconds.</center></font>";
			$_SESSION['update_mob_no']='Mobile No Updated';
			if ($user_role=="DB-Admin") {
				header("Refresh:5;url=./admin_dashboard.php");
			}elseif ($user_role=="Faculty") {
				header("Refresh:5;url=./faculty_dashboard.php");
			}elseif ($user_role=="Student") {
				header("Refresh:2;url=./student_dashboard.php");
			}else{

				header("Refresh:0;url=./index.php");
			}
		}
        


	}


    


//Update signature

	if (isset($_POST['submit_signature'])) {
		$target_dir="signature/";
		$date_time   = date("Y-m-d H:i:s"); 
		$date_time=str_replace(':','',$date_time);
		$date_time=str_replace('-','',$date_time);
		$date_time=str_replace(' ','',$date_time);
		$base_name=$_SESSION['uid'].$date_time.".jpg";
		$target_file = $target_dir . $base_name;

		$uploadOk = 1;
		$file_extension =basename($_FILES["file"]["name"]);
		$fileType = strtolower(pathinfo($file_extension,PATHINFO_EXTENSION));


    // Check if file already exists
    if (file_exists($target_file)) {
      echo "<center><strong><font color='purple'>Sorry, file already exists.</font></strong></center>";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 10485761) {
      echo "<center><strong><font color='purple'>Sorry, your file is larger than 10 MB.</font></strong></center>";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if( strtolower($fileType)  != "jpg") {
      echo "<center><strong><font color='purple'>Sorry, only .jpg files are allowed. Uploaded file is of type <?=strtolower($fileType) ?></font></strong></center>";
      $uploadOk = 0;
    }
  /*
    $image_info =@getimagesize($_FILES["file"]["tmp_name"]);
    echo $_FILES["file"]["tmp_name"];
    echo $_FILES["file"]["name"];
    $image_width = $image_info[0];
	$image_height = $image_info[1];
	
	if( $image_width<140 or $image_width>280) {
      echo "<center><strong><font color='purple'>Image Width must be between 140px and 280px. Current width: <?=$image_width ?><br></font></strong></center>";
      $uploadOk = 0;
    }
    if( $image_height<60 or $image_height>120) {
      echo "<center><strong><font color='purple'>Image Height must be between 60px and 100px. Current height: <?=$image_height ?></font></strong></center>";
      $uploadOk = 0;
    }
*/

	

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<center><strong><font color='brown'>UPLOAD FAILED.</font></strong></center>";
// if everything is ok, try to upload file
} else {
		  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

        $sql_m="UPDATE signature set status='REPLACED' where email='$email' and status='ACTIVE'";
        $sth_m = $pdo->prepare($sql_m);
        $sth_m->execute();

		    $sql="INSERT INTO SIGNATURE (ID,email,name,signature_file) VALUES (0,'$email','$name','$base_name') ";       
		    $sth = $pdo->prepare($sql);



		    if ($sth->execute()) {
			echo "<font color='red' size='5'><center>Signature Upload successful. Redirecting to Dashboard in 5 seconds.</center></font>";
			$_SESSION['update_mob_no']='Mobile No Updated';
			if ($user_role=="DB-Admin") {
				header("Refresh:5;url=./admin_dashboard.php");
			}elseif ($user_role=="Faculty") {
				header("Refresh:5;url=./faculty_dashboard.php");
			}elseif ($user_role=="Admin-Staff") {
				header("Refresh:5;url=./admin_staff_dashboard.php");
			}elseif ($user_role=="PI-Exam") {
				header("Refresh:5;url=./pi_exam_dashboard.php");
			}elseif ($user_role=="Student") {
				header("Refresh:2;url=./student_dashboard.php");
			}elseif ($user_role=="Technical-Assistant") {
               header("Refresh:0;url=./technical_assistant_dashboard.php");
            }elseif ($user_role=="Director") {
               header("Refresh:0;url=./director_dashboard.php");
            }elseif ($user_role=="Academic-Incharge") {
                header("Refresh:5;url=./academic_incharge_dashboard.php");
                }
            else{

				header("Refresh:0;url=./index.php");
			}
		}
		

		   

		   
		  } else {
		    echo "<center><strong><font color='red'> Sorry, there was an error uploading your file.</font></strong></center>";
		  }
	}






	}


//Update signature and mobile no

	if (isset($_POST['submit_signature_and_mob'])) {

		$mobno=trim($_POST['mobno']);

		
		$target_dir="signature/";
		$date_time   = date("Y-m-d H:i:s"); 
		$date_time=str_replace(':','',$date_time);
		$date_time=str_replace('-','',$date_time);
		$date_time=str_replace(' ','',$date_time);
		$base_name=$_SESSION['uid'].$date_time.".jpg";
		$target_file = $target_dir . $base_name;

		$uploadOk = 1;
		$file_extension =basename($_FILES["file"]["name"]);
		$fileType = strtolower(pathinfo($file_extension,PATHINFO_EXTENSION));


    // Check if file already exists
    if (file_exists($target_file)) {
      echo "<center><strong><font color='purple'>Sorry, file already exists.</font></strong></center>";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 10485761) {
      echo "<center><strong><font color='purple'>Sorry, your file is larger than 10 MB.</font></strong></center>";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if( strtolower($fileType)  != "jpg") {
      echo "<center><strong><font color='purple'>Sorry, only .jpg files are allowed. Uploaded file is of type <?=strtolower($fileType) ?></font></strong></center>";
      $uploadOk = 0;
    }
  /*
    $image_info =@getimagesize($_FILES["file"]["tmp_name"]);
    echo $_FILES["file"]["tmp_name"];
    echo $_FILES["file"]["name"];
    $image_width = $image_info[0];
	$image_height = $image_info[1];
	
	if( $image_width<140 or $image_width>280) {
      echo "<center><strong><font color='purple'>Image Width must be between 140px and 280px. Current width: <?=$image_width ?><br></font></strong></center>";
      $uploadOk = 0;
    }
    if( $image_height<60 or $image_height>120) {
      echo "<center><strong><font color='purple'>Image Height must be between 60px and 100px. Current height: <?=$image_height ?></font></strong></center>";
      $uploadOk = 0;
    }
*/

	

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<center><strong><font color='brown'>UPLOAD FAILED.</font></strong></center>";
// if everything is ok, try to upload file
} else {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

        $sql_m="UPDATE signature set status='REPLACED' where email='$email' and status='ACTIVE'";
        $sth_m = $pdo->prepare($sql_m);
        $sth_m->execute();

		    $sql="INSERT INTO SIGNATURE (ID,email,name,signature_file) VALUES (0,'$email','$name','$base_name') ";       
		    $sth = $pdo->prepare($sql);

		    $sql_mob="UPDATE USERS SET mob_no='$mobno' where email='$email'";
			$stmt = $pdo->prepare($sql_mob);


		    if ($sth->execute() and $stmt->execute()) {
			echo "<font color='red' size='5'><center>Signature Upload & mobile no update successful. Redirecting to Dashboard in 5 seconds.</center></font>";
			$_SESSION['update_mob_no']='Mobile No Updated';
			if ($user_role=="DB-Admin") {
				header("Refresh:5;url=./admin_dashboard.php");
			}elseif ($user_role=="Faculty") {
				header("Refresh:5;url=./faculty_dashboard.php");
			}elseif ($user_role=="Admin-Staff") {
				header("Refresh:5;url=./admin_staff_dashboard.php");
			}elseif ($user_role=="PI-Exam") {
				header("Refresh:5;url=./pi_exam_dashboard.php");
			}elseif ($user_role=="Student") {
				header("Refresh:2;url=./student_dashboard.php");
			}elseif ($user_role=="Technical-Assistant") {
               header("Refresh:0;url=./technical_assistant_dashboard.php");
            }elseif ($user_role=="Director") {
               header("Refresh:0;url=./director_dashboard.php");
            }elseif ($user_role=="Academic-Incharge") {
                header("Refresh:5;url=./academic_incharge_dashboard.php");
                }
            else{

				header("Refresh:0;url=./index.php");
			}
		}
		

		   

		   
		  } else {
		    echo "<center><strong><font color='red'> Sorry, there was an error uploading your file.</font></strong></center>";
		  }
	}






	}

















if ($_SESSION['update_signature']=='Update Signature' and $_SESSION['update_mob_no']=='Update Mobile No') {
		?>
		<center><font color="red" size="5">Mandetory Signature Upload & Mobile No update</font></br><font color="blue" size="4">Login will be allowed after uploading signature</font><br><font color="purple" size="4">You can use https://imageresizer.com/ to resize image</font></center></br></br>
		<form action="./updates.php" method="POST" enctype="multipart/form-data">
			<table align="center" border="1">
				<tr>
					<td>Name:</td>
					<td><?= $name;?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?= $email;?></td>
				</tr>
				<tr>
					<td>Mobile No (10 digits only):</td>
					<td><input type="text" name="mobno" required="yes" minlength="10" maxlength="10" onkeypress="return isNumberKey(event)"></td>
				</tr>
				<tr>
					<td>Signature file [Only .jpg format]<br>
						File Size Width: 140px to 280px<br>
					    Height: 60px to 120px</td>
					<td>
					
						<input type="hidden" name="email" value="$email">
						<input type="hidden" name="name" value="$name">
						 <input type="file" name="file" required="yes">
					
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit_signature_and_mob" value="Update"></td>
				</tr>
			</table>
		</form>

		<?php 

	}elseif ($_SESSION['update_signature']=='Update Signature') {
		?>
		<center><font color="red" size="5">Mandetory Signature Upload</font></br><font color="blue" size="4">Login will be allowed after uploading signature</font><br><font color="purple" size="4">You can use https://imageresizer.com/ to resize image</font></center></br></br>
		<form action="./updates.php" method="POST" enctype="multipart/form-data">
			<table align="center" border="1">
				<tr>
					<td>Name:</td>
					<td><?= $name;?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?= $email;?></td>
				</tr>
				<tr>
					<td>Signature file [Only .jpg format]<br>
						File Size Width: 140px to 280px<br>
					    Height: 60px to 120px</td>
					<td>
					
						<input type="hidden" name="email" value="$email">
						<input type="hidden" name="name" value="$name">
						 <input type="file" name="file" required="yes">
					
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit_signature" value="Upload Signature"></td>
				</tr>
			</table>
		</form>

		<?php 


	}elseif ($_SESSION['update_mob_no']=='Update Mobile No') {
		?>
		<center><font color="red" size="5">Mandetory Mobile Number Update</font></br><font color="blue" size="4">Login will be allowed after updating mobile number</font></center></br></br>
		<form action="updates.php" method="POST" action="">
			<table align="center" border="1">
				<tr>
					<td>Name:</td>
					<td><?= $name;?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?= $email;?></td>
				</tr>
				<tr>
					<td>Mobile No (10 digits only):</td>
					<td><input type="text" name="mobno" required="yes" minlength="10" maxlength="10" onkeypress="return isNumberKey(event)"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit_mob_no" value="Update Mobile No"></td>
				</tr>
			</table>
		</form>

		<?php 
	}




?>





	 


<?php require_once("./includes/footer.php"); ?>