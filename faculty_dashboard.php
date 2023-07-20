
<?php require_once("./includes/header_faculty.php");?>





	

<?php 
$sql="SELECT * from active_crs_sem where status='Active'";               
$stmt=$pdo->prepare($sql);
$stmt->execute();

if ($stmt->rowCount()>0) {

	while ($var = $stmt->fetch(PDO::FETCH_ASSOC)) {

		$crs=$var['course'];
		$bt=$var['batch'];
		$sem=$var['semester'];

		$sql1="SELECT DISTINCT course,batch,semester,subject_name from grades where course='$crs' and batch='$bt' and semester='$sem' and faculty_email='$email' and registration_verification_status='APPROVED'";    
		

		          
		$stmt1=$pdo->prepare($sql1);
		$stmt1->execute();

		if ($stmt1->rowCount()>0) {

			?>
				<center><font color="brown" size="5">You have enroled students from following subjects</font></center>
					<table align="center" border="1">
						<tr style="background-color: yellow">
							<td>Course</td><td>Batch</td><td>Semester</td><td>Subject Name</td><td>Action</td>
						</tr>

			<?php

			while ($var1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {

				$crs1=$var1['course'];
				$bt1=$var1['batch'];
				$sem1=$var1['semester'];
				$subject_name=$var1['subject_name'];

				?>
				<tr>
					<td><?=$crs1 ?></td>
					<td><?=$bt1 ?></td>
					<td><?=$sem1 ?></td>
					<td><?=$subject_name ?></td>
					<td>
						<form action="./print_pdf_st_list.php" method="POST">
							<input type="hidden" name="crs" value="<?=$crs1 ?>">
							<input type="hidden" name="bt" value="<?=$bt1 ?>">
							<input type="hidden" name="sem" value="<?=$sem1 ?>">
							<input type="hidden" name="faculty_email" value="<?=$email ?>">
							<input type="hidden" name="faculty_name" value="<?=$faculty_name ?>">
							<input type="hidden" name="subject_name" value="<?=$subject_name ?>">
						<input type="submit" name="chk_stud_list" value="View Student List">
						</form>
					</td>
				</tr>
				
				<?php
				
			}

		
	}
	

}

}
?>

</table>

<?php require_once("./includes/footer.php"); ?>
