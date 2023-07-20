<?php require_once("./includes/header_faculty.php"); ?>


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
	if (isset($_POST['mentorship'])) {

		$sql = "SELECT * FROM mentorship where faculty_email='$email' and status='Active'";
                                  
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
		?>
		<center>
			<font size="5" color="brown">You are mentor for the following courses</font>

			<table align="center" border="1">
				<tr>
					<td width="20%">Course</td><td width="20%">Batch</td><td width="30%">Action</td>
				</tr>
				<?php 
					 while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
					 		$bt=$rec['batch'];
					 		$crs=$rec['course'];
					 	?>
					 	<form action="" method="POST">
					 	<tr>
					 		<td><?=$crs ?><input type="hidden" name="crs" value="<?=$crs ?>"></td>
					 		<td><?=$bt ?><input type="hidden" name="bt" value="<?=$bt ?>"></td>
					 		<td>

					 			<input type="submit" name="st_reg_verify" value="Verify Student's Registration" style="background-color: yellow"><br><br>
					 			
					 			<input type="submit" name="view_offered_subjects" value="View Offered Subjects" style="background-color: yellow"> <br><br>
					 			<input type="submit" name="update_offered_subjects" value="Update Offered Subjects" style="background-color: yellow"><br><br>
					 			</form>
					 			<form action="" method="POST" target="_blank">
					 				<input type="hidden" name="crs" value="<?=$crs ?>">
					 				<input type="hidden" name="bt" value="<?=$bt ?>">
					 			<input type="submit" name="print" value="Generate Student List [Approved]" style="background-color: yellow">
					 			</form>
					 			<br>

					 			<form action="" method="POST" target="_blank">
					 				<input type="hidden" name="crs" value="<?=$crs ?>">
					 				<input type="hidden" name="bt" value="<?=$bt ?>">
					 			<input type="submit" name="print-p" value="Registration Snapshot [Not Approved]" style="background-color: yellow">
					 			</form>
					 			<br>

					 			<form action="" method="POST">
					 				<input type="hidden" name="crs" value="<?=$crs ?>">
					 				<input type="hidden" name="bt" value="<?=$bt ?>">
					 			<input type="submit" name="student-summary" value="Student Summary" style="background-color: lime">
					 			</form>
					 		</td>
					 	</tr>
					 

					 	<?php
					 }

				?>

			</table>
	
		</center>
		<?php
	}

?>



<?php 

	if (isset($_POST['st_reg_verify'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];

		?>
			<center><font color="black" size="5">Semester Registration Verification for Course: <?=$crs ?>, Batch: <?=$bt ?></font></center><br><br>
			<form method="POST" action="./verification.php">
				<input type="hidden" name="crs" value="<?=$crs ?>">
				<input type="hidden" name="bt" value="<?=$bt ?>">
			<table border="1" align="center">
				<tr>
					<td>Choose Semester</td>
					<td>
						<select name="sem">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<!--<option value="5">5</option>
							<option value="6">6</option>-->
						</select>
					</td>
				</tr>

				
				<tr>
				<td colspan="2">
					<input type="submit" name="st_reg_verify" value="Submit">
				</td>
				</tr>
				
				
			</table>
			</form
		<?php

	}

?>


<?php 

	if (isset($_POST['print'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];

		?>
			<br><center><font color="black" size="5">Generate Student List for Course: <?=$crs ?>, Batch: <?=$bt ?></font></center><br><br>
			<form method="POST" action="./print_pdf.php">
				<input type="hidden" name="crs" value="<?=$crs ?>">
				<input type="hidden" name="bt" value="<?=$bt ?>">
			<table border="1" align="center">
				<tr>
					<td>Choose Semester</td>
					<td>
						<select name="sem">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<!--<option value="5">5</option>
							<option value="6">6</option>-->
						</select>
					</td>
				</tr>
				<tr>
					<td>Order By</td>
					<td>
						<select name="order_by">
							<option value="Subject">Subject</option>
							<option value="Student">Student</option>
							
							
						</select>
					</td>
				</tr>

				
				<tr>
				<td colspan="2">
					<input type="submit" name="print_stud_list" value="Submit">
				</td>
				</tr>
				
				
			</table>
			</form
		<?php

	}

?>


<?php 

	if (isset($_POST['print-p'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];

		?>
			<br><center><font color="black" size="5">Generate Registration Snapshot for Course: <?=$crs ?>, Batch: <?=$bt ?></font></center><br><br>
			<form method="POST" action="./print_pdf_na.php">
				<input type="hidden" name="crs" value="<?=$crs ?>">
				<input type="hidden" name="bt" value="<?=$bt ?>">
			<table border="1" align="center">
				<tr>
					<td>Choose Semester</td>
					<td>
						<select name="sem">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<!--<option value="5">5</option>
							<option value="6">6</option>-->
						</select>
					</td>
				</tr>
				<tr>
					<td>Order By</td>
					<td>
						<select name="order_by">
							<option value="Subject">Subject</option>
							<option value="Student">Student</option>
							
							
						</select>
					</td>
				</tr>

				
				<tr>
				<td colspan="2">
					<input type="submit" name="print_stud_list" value="Submit">
				</td>
				</tr>
				
				
			</table>
			</form
		<?php

	}

?>


<?php 

	if (isset($_POST['update_offered_subjects'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];

		?>
			<center><font color="black" size="5">Offered Subject Updation for Course: <?=$crs ?>, Batch: <?=$bt ?></font></center><br><br>
			<form method="POST" action="">
				<input type="hidden" name="crs" value="<?=$crs ?>">
				<input type="hidden" name="bt" value="<?=$bt ?>">
			<table border="1" align="center">
				<tr>
					<td>Choose Semester</td>
					<td>
						<select name="sem">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<!--<option value="5">5</option>
							<option value="6">6</option>-->
						</select>
					</td>
				</tr>

				<tr>
					<td>Choose Stream</td>
					<td>
						<select name="stream">
							<option value="CS">CS</option>
							<option value="Non-CS">Non-CS</option>
						</select>
					</td>
				</tr>
				<tr>
				<td colspan="2">
					<input type="submit" name="update_of_subjects" value="Submit">
				</td>
				</tr>
				
				
			</table>
			</form
		<?php

	}

?>

<?php 

	if (isset($_POST['view_offered_subjects'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];

		?>
			<center><font color="black" size="5">View Offered Subject for Course: <?=$crs ?>, Batch: <?=$bt ?></font></center><br><br>
			<form method="POST" action="">
				<input type="hidden" name="crs" value="<?=$crs ?>">
				<input type="hidden" name="bt" value="<?=$bt ?>">
			<table border="1" align="center">
				<tr>
					<td>Choose Semester</td>
					<td>
						<select name="sem">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<!--<option value="5">5</option>
							<option value="6">6</option>-->
						</select>
					</td>
				</tr>

				<tr>
					<td>Choose Stream</td>
					<td>
						<select name="stream">
							<option value="CS">CS</option>
							<option value="Non-CS">Non-CS</option>
						</select>
					</td>
				</tr>
				<tr>
				<td colspan="2">
					<input type="submit" name="view_of_subjects" value="Submit">
				</td>
				</tr>
				
				
			</table>
			</form
		<?php

	}

?>


<?php 

	if (isset($_POST['update_of_subjects'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];
		$stream=$_POST['stream'];

		?>

		<br>
			<center><font color="black" size="5">Offered Subject Updation for Course: <?=$crs ?>, Batch: <?=$bt ?><br>Stream: <?=$stream ?>, Semester: <?=$sem ?></font></center><br><br>

			
		<?php

	  $sql = "SELECT * FROM tbl_name where course='$crs' and stream='$stream'";
                                       
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $record_count = $stmt->rowCount();
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      $table=$rec['table_name'];

      $sql = "SELECT * FROM $table order by sub_type,pool";
                                       
      $stmt = $pdo->prepare($sql);
      $stmt->execute();

      ?>
      <form action="" method="POST">
      <input type="hidden" name="crs" value="<?=$crs ?>">
	  <input type="hidden" name="bt" value="<?=$bt ?>">
	  <input type="hidden" name="sem" value="<?=$sem ?>">
	  <input type="hidden" name="stream" value="<?=$stream ?>">
      	<table border="1" align="center">
      		<tr>
      			<td>Check</td>
      			<td>Subject Name</td>
      			<td>Category</td>
      			<td>Pool (A/B)</td>
      			<td>Faculty</td>
      		</tr>

      		<?php 
      		$i=0;
      			while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
      				$id=$rec['id'];
      				$subject_name=$rec['subject_name'];
      				$sub_type=$rec['sub_type'];
      				$pool=$rec['pool'];
      					if ($i %2 ==0) {
      						?>
      						<tr style="background-color: #ffdccc">
      						<?php
      					}else{
      						?>
      						<tr style="background-color: white">
      						<?php
      					}
      					$i=$i+1;

      				?>
      					
      						<td><input type='checkbox' name='update[]' value='<?= $id ?>'/></td>
      						<td><?=$subject_name ?><input type="hidden" name="subject_name_<?=$id ?>" value="<?=$subject_name ?>" ></td>
      						<td><?=$sub_type ?><input type="hidden" name="sub_type_<?=$id ?>" value="<?=$sub_type ?>"></td>
      						<td><?=$pool ?><input type="hidden" name="pool_<?=$id ?>" value="<?=$pool ?>"></td>
      						<td><select name="faculty_<?=$id ?>">
      							<?php 
      								  $sql1 = "SELECT * FROM staff where user_type='Faculty' and user_status='Activated' order by full_name";
                                      
								      $stmt1 = $pdo->prepare($sql1);
								      $stmt1->execute();
								      while ($r = $stmt1->fetch(PDO::FETCH_ASSOC)) {
								      	$fac_email=$r['email'];
								      	$fac_unit=$r['unit'];
								      	$fac_name=$r['full_name'];
								      	?>
								      		<option value="<?=$fac_email ?>:<?=$fac_name ?>:<?=$fac_unit ?>"><?=$fac_name ?>, <?=$fac_unit ?></option>

								      	<?php
								      }
      							?>
      						</select></td>
      					</tr>
      				<?php

      			}
      		?>
      		<tr>
      			<td align="center" colspan="5">
      				<input type="submit" name="ofs_submit" value="SUBMIT" style="background-color: yellow">
      			</td>
      		</tr>
      	</table>
      	</form>
      <?php


	}

?>


<?php 
	if (isset($_POST['ofs_submit'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];
		$stream=$_POST['stream'];
		?>
			<center><font color="black" size="5">Offered Subject Updation for Course: <?=$crs ?>, Batch: <?=$bt ?><br>Stream: <?=$stream ?>, Semester: <?=$sem ?></font></center><br><br>
			
		<?php

		if(isset($_POST['update'])){
			?>
			<center><font color="brown" size="4"><strong>Confirm Subjects offered in current Semester</strong></font></center>
			<form action="" method="POST">
		      <input type="hidden" name="crs" value="<?=$crs ?>"  >
			  <input type="hidden" name="bt" value="<?=$bt ?>">
			  <input type="hidden" name="sem" value="<?=$sem ?>">
			  <input type="hidden" name="stream" value="<?=$stream ?>">
      		<table border="1" align="center">
      		<tr>
      			<td>Subject Name</td>
      			<td>Category</td>
      			<td>Pool (A/B)</td>
      			<td>Faculty</td>
      		</tr>
			<?php
			$i=0;
			foreach($_POST['update'] as $id){
				$subject_name=$_POST['subject_name_'.$id];
				$sub_type=$_POST['sub_type_'.$id];
				$pool=$_POST['pool_'.$id];
				$faculty=$_POST['faculty_'.$id];
				$fac_email=explode(':', $faculty)[0];
				$fac_name=explode(':', $faculty)[1];
				$fac_unit=explode(':', $faculty)[2];

				?>
					<tr>
						<td><?=$subject_name ?><input type="hidden" name="subject_name_<?=$i ?>" value="<?=$subject_name ?>"></td>
      					<td><?=$sub_type ?><input type="hidden" name="sub_type_<?=$i ?>" value="<?=$sub_type ?>"></td>
      					<td><?=$pool ?><input type="hidden" name="pool_<?=$i ?>" value="<?=$pool ?>"></td>
      					<td><?=$fac_name ?>, <?=$fac_unit ?><input type="hidden" name="faculty_<?=$i ?>" value="<?=$fac_email ?>:<?=$fac_name ?>:<?=$fac_unit ?>"></td>
					</tr>
				<?php
				$i=$i+1;
			}

			?>
				<tr>
					<input type="hidden" name="nor" value="<?=$i ?>">
					<td colspan="4"><input type="submit" name="conf_sub_update" value="Confirm" style="background-color: yellow"></td>
				</tr>
			</table>
			<?php

		}else{

			 echo "<center><strong><font size='5' color='red'>Sorry No Student Selected</font></strong></center>";
		}
	}

?>


<?php 
		if (isset($_POST['conf_sub_update'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];
		$stream=$_POST['stream'];
		$nor=$_POST['nor'];

		try{
			$pdo->beginTransaction();



		for ($id=0; $id < $nor; $id++) { 

				$subject_name=$_POST['subject_name_'.$id];
				$sub_type=$_POST['sub_type_'.$id];
				$pool=$_POST['pool_'.$id];
				$faculty=$_POST['faculty_'.$id];
				$fac_email=explode(':', $faculty)[0];
				$fac_name=explode(':', $faculty)[1];
				$fac_unit=explode(':', $faculty)[2];
				$sql = "INSERT INTO offered_subject (id, batch, course, stream, semester, subject_code, subject_name, subject_type, pool, faculty_email, faculty_name, faculty_unit, co_faculties, updated_on) VALUES (0,'$bt','$crs','$stream','$sem','','$subject_name','$sub_type','$pool','$fac_email','$fac_name','$fac_unit','',CURRENT_TIMESTAMP)";
                                  
		      	$stmt = $pdo->prepare($sql);
		      
		      	$stmt->execute();
			
			  
		      
		  
		    
		}
		$pdo->commit();

		}catch (\Exception $e) {
			    if ($pdo->inTransaction()) {
			        $pdo->rollback();
			        ?>
			        	<center><font color="brown" size="4"><strong>One or more selected subject(s) already existis in database as offered subjects.<br>Update Denied. Please update subjects which are not updated as offered</strong></font></center>
			        <?php
			        require_once("./includes/footer.php");
			        die;
				}
				throw $e;
			}

		?>
			<center><font color="black" size="5">Offered Subject Updation for Course: <?=$crs ?>, Batch: <?=$bt ?><br>Stream: <?=$stream ?>, Semester: <?=$sem ?></font></center><br><br>

			<center><font color="brown" size="4"><strong>Subject Update Succesful</strong></font></center>

		<?php

		}


?>





<?php 

	if (isset($_POST['view_of_subjects'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];
		$stream=$_POST['stream'];

		?>

		<br>
			<center><font color="black" size="5">Offered Subject for Course: <?=$crs ?>, Batch: <?=$bt ?><br>Stream: <?=$stream ?>, Semester: <?=$sem ?></font></center><br><br>

			
		<?php

	  $sql = "SELECT * FROM offered_subject where batch='$bt' and course='$crs' and stream='$stream' and semester='$sem' order by subject_type";
                      
      $stmt = $pdo->prepare($sql);
      $stmt->execute();

      if ($stmt->rowCount()==0) {
      	?>
      		<center><font color="red" size="4">Sorry!! No subjects offered yet.</font></center>

      	<?php
      	require_once("./includes/footer.php");
      	die;
      }

      ?>
      <form action="" method="POST">
      <input type="hidden" name="crs" value="<?=$crs ?>">
	  <input type="hidden" name="bt" value="<?=$bt ?>">
	  <input type="hidden" name="sem" value="<?=$sem ?>">
	  <input type="hidden" name="stream" value="<?=$stream ?>">
      	<table border="1" align="center">
      		<tr>
      			
      			<td>Subject Name</td>
      			<td>Category</td>
      			<td>Pool (A/B)</td>
      			<td>Faculty</td>
      		</tr>

      		<?php 
      		$i=0;
      			while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
      				
      				$subject_name=$rec['subject_name'];
      				$sub_type=$rec['subject_type'];
      				$pool=$rec['pool'];
      				$fac_name=$rec['faculty_name'];
      				$fac_unit=$rec['faculty_unit'];
      					if ($i %2 ==0) {
      						?>
      						<tr style="background-color: #ffdccc">
      						<?php
      					}else{
      						?>
      						<tr style="background-color: white">
      						<?php
      					}
      					$i=$i+1;

      				?>
      					
      						
      						<td><?=$subject_name ?><input type="hidden" name="subject_name_<?=$id ?>" value="<?=$subject_name ?>" ></td>
      						<td><?=$sub_type ?><input type="hidden" name="sub_type_<?=$id ?>" value="<?=$sub_type ?>"></td>
      						<td><?=$pool ?><input type="hidden" name="pool_<?=$id ?>" value="<?=$pool ?>"></td>
      						<td><?=$fac_name ?>, <?=$fac_unit ?></td>
      						
      					</tr>
      				<?php

      			}
      		?>
      		<!--<tr>
      			<td align="center" colspan="5">
      				<input type="submit" name="ofs_submit" value="SUBMIT" style="background-color: yellow">
      			</td>
      		</tr>-->
      	</table>
      	</form>
      <?php


	}

?>





<?php 

if (isset($_POST['student-summary'])) {
	$bt=$_POST['bt'];
	$crs=$_POST['crs'];

	$sql = "SELECT * from student where course='$crs' and batch='$bt' order by roll_no";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

?>
		<center><font color="black" size="5">Student Summary for Course: <?=$crs ?>, Batch: <?=$bt ?></font></center><br><br>

		<table border="1" align="center">	
				<tr bgcolor="yellow">
     				<td>Student Name</td><td>Roll No</td><td>Action</td>
     			</tr>
				
					<?php 
		        $i=0;
		        while ($var = $stmt->fetch(PDO::FETCH_ASSOC)) {
		        $student_name=$var['full_name'];
		        $roll_no=$var['roll_no'];
		        $stream=$var['stream'];
		        $prev_degree=$var['prev_degree'];
	            
		        ?>
		        
		        <?php 
		        	if ($i%2!=0) {
		        		echo "<tr bgcolor=\"orange\">";
		        	}
		        	else
		        	{echo "<tr>";}
		        $i++;

		        ?>
		        <form action="" method="POST" target="_blank">
		          
		        	<input type="hidden" name="crs" value="<?= $crs ?>">
		        	<input type="hidden" name="bt" value="<?= $bt ?>">

		              <input type="hidden" name="stream" value="<?= $stream ?>">
		              <input type="hidden" name="prev_degree" value="<?= $prev_degree ?>">
		        	
		        		<td><?=$student_name ?><input type="hidden" name="student_name" value="<?=$student_name ?>"></td>
		        		<td><?=$roll_no ?><input type="hidden" name="roll_no" value="<?=$roll_no ?>"></td>
		        		
		        		<td><input type="submit" name="stud-summary" style="background-color: #9fff80" value="View Summary">
		                </td>
		             </form>
		        	</tr>
        	

        	<?php 

        	}
			?>



				
				
			</table>

<?php
}


?>




<?php 

	if (isset($_POST['stud-summary'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$roll_no=$_POST['roll_no'];
		$student_name=$_POST['student_name'];
		$stream=$_POST['stream'];
		$prev_degree=$_POST['prev_degree'];


		?>
		<br><br> <center><font color="brown" size="4"><strong>Student Name: <font color="black" size="4"><?=$student_name ?></font> &emsp;Stream: <font color="black" size="4"><?=$stream ?></font> &emsp; Roll No: <font color="black" size="4"><?=$roll_no ?></font> &emsp; Batch: <font color="black" size="4"><?=$bt ?></font>&emsp; Previous Degree: <font color="black" size="4"><?=$prev_degree ?></font></strong></font></center>

		 <!--**************************************************Past Subjects******************************************************* -->
<?php 
    
      $sqlp = "SELECT * from grades where roll_no='$roll_no'  and registration_verification_status='APPROVED' order by semester,subject_type";               
      $stmtp= $pdo->prepare($sqlp);
      $stmtp->execute();
      

      ?>
      <br>
      <table align="center" border="1">
        
          <tr style="background-color: orange">
            <td align="center">Semester</td>
            <td>Subject Name</td>
            <td>Category</td>
            <td>Pool</td>
            <td>Credit/Non Credit</td>
            <td>Marks</td>
                
          </tr>

      <?php
      $i=0;
        while ( $r = $stmtp->fetch(PDO::FETCH_ASSOC)) {
          if ($i % 2 ==0) {
            ?>
              <tr>
            <?php 
          }else{
            ?>
              <tr style="background-color: #ffe6e6">
            <?php 
          }
          ?>
          <td><?=$r['semester'] ?></td>
          
          <td><?=$r['subject_name'] ?></td>
          <td><?=$r['subject_type'] ?></td>
          <td align="center"><?=$r['pool'] ?></td>
       
          <td align="center"><?=$r['credit_course'] ?></td>
          
          <td align="center"><?=$r['marks'] ?></td>

             
        </tr>
          <?php
          $i=$i+1;
        }


?>
</table><br><br>

<!--**************************************************Past Subjects******************************************************* -->


		<?php 

	}


?>








<?php require_once("./includes/footer.php"); ?>