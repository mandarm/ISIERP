

<?php require_once("./includes/header_student.php"); ?>



<?php 

	if (isset($_POST['sem_btn'])) {
		
		
		$reg_sem=$_POST['reg_sem'];
		



		$sql = "SELECT * from offered_subject where batch='$batch' and course='$course' and stream='$stream' and semester='$reg_sem'";              
  		$stmt = $pdo->prepare($sql);
		$stmt->execute();
        $tc = $stmt->rowCount();

        if ($tc==0) {
        	?>
        		<center><font color="red" size="4">Sorry!! courses to be offered for <?=$stream ?> stream in semester <?=$reg_sem ?> is not updated yet.</font></center>
        	<?php
        	require_once("./includes/footer.php");
        	die;
        }

        ?>
<center><font color="red" size="4">Subjects offered for <?=$stream ?> stream in semester <?=$reg_sem ?> <br> Submit your choice</font></center><br>
<center><font color="blue" size="4">[Note: Once submitted, your previous choices (if any) will be reashed and fresh choices from this from will be recorded]</font></center>
<form action="" method="POST">
      <input type="hidden" name="crs" value="<?=$course ?>">
	  <input type="hidden" name="bt" value="<?=$batch ?>">
	  <input type="hidden" name="reg_sem" value="<?=$reg_sem ?>">
	  <input type="hidden" name="stream" value="<?=$stream ?>">
      	<table border="1" align="center">
      		<tr>
      			<td>Check</td>
      			<td>Subject Name</td>
      			<td>Category</td>
      			<td>Pool (A/B)</td>
      			<td>Faculty</td>
      			<td>Credit/Non Credit</td>
      			<!--<td>Supplymentary Subject</td>-->
      		</tr>

      		<?php 
      		$i=0;
      			while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
      				$id=$rec['ID'];
      				$subject_name=$rec['subject_name'];
      				$sub_type=$rec['subject_type'];
      				$pool=$rec['pool'];
      				$faculty_email=$rec['faculty_email'];
      				$faculty_name=$rec['faculty_name'];
      				$faculty_unit=$rec['faculty_unit'];


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
      						<td><?=$faculty_name ?>, <?=$faculty_unit ?><input type="hidden" name="faculty_<?=$id ?>" value="<?=$faculty_email ?>:<?=$faculty_name ?>:<?=$faculty_unit ?>"></td>
      						<td>
      							<input type="radio" id="cnc1" name="cnc_<?=$id ?>" value="Credit" checked>
								<label for="cnc1"> Credit</label>&emsp;
								<input type="radio" id="cnc2" name="cnc_<?=$id ?>" value="Non Credit" >
								<label for="cnc2"> Non Credit</label>
      						</td>
      						<!--<td>
      							<input type="radio" id="supply1" name="supply_<?=$id ?>" value="Yes">
								<label for="cnc1"> Yes</label>&emsp;
								<input type="radio" id="supply2" name="supply_<?=$id ?>" value="No"  checked>
								<label for="cnc2"> No</label>
      						</td>-->
      					</tr>
      				<?php

      			}
      		?>
      		<tr>
      			<td align="center" colspan="7">
      				<input type="submit" name="reg_submit" value="SUBMIT" style="background-color: yellow">
      			</td>
      		</tr>
      	</table>
      	</form>



        <?php
        }
?>



<?php 
	if (isset($_POST['reg_submit'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$reg_sem=$_POST['reg_sem'];
		$stream=$_POST['stream'];
		?>
			<center><font color="black" size="5">Chosen Subjects for Semester: <?=$reg_sem ?></font></center><br><br>
			
		<?php

		if(isset($_POST['update'])){
			?>
			<center><font color="brown" size="4"><strong>Confirm Subjects Chosen</strong></font></center>
			<form action="" method="POST">
		      <input type="hidden" name="crs" value="<?=$crs ?>"  >
			  <input type="hidden" name="bt" value="<?=$bt ?>">
			  <input type="hidden" name="reg_sem" value="<?=$reg_sem ?>">
			  <input type="hidden" name="stream" value="<?=$stream ?>">
      		<table border="1" align="center">
      		<tr>
      			<td>Subject Name</td>
      			<td>Category</td>
      			<td>Pool (A/B)</td>
      			<td>Faculty</td>
      			<td>Credit/Non Credit</td>
      			<!--<td>Supplymentary?</td>-->
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
				$cnc=$_POST['cnc_'.$id];
				//$supply=$_POST['supply_'.$id];

				if ($i %2 ==0) {
      						?>
      						<tr style="background-color: #ffdccc">
      						<?php
      					}else{
      						?>
      						<tr style="background-color: white">
      						<?php
      					}
      					


				?>
					
						<td><?=$subject_name ?><input type="hidden" name="subject_name_<?=$i ?>" value="<?=$subject_name ?>"></td>
      					<td><?=$sub_type ?><input type="hidden" name="sub_type_<?=$i ?>" value="<?=$sub_type ?>"></td>
      					<td><?=$pool ?><input type="hidden" name="pool_<?=$i ?>" value="<?=$pool ?>"></td>
      					<td><?=$fac_name ?>, <?=$fac_unit ?><input type="hidden" name="faculty_<?=$i ?>" value="<?=$fac_email ?>:<?=$fac_name ?>:<?=$fac_unit ?>"></td>
      					<td><?=$cnc ?><input type="hidden" name="cnc_<?=$i ?>" value="<?=$cnc ?>"></td>
      					<!--<td><?=$supply ?><input type="hidden" name="supply_<?=$i ?>" value="<?=$supply ?>"></td>-->
					</tr>
				<?php
				$i=$i+1;
			}

			?>
				<tr>
					<input type="hidden" name="nor" value="<?=$i ?>">
					<td colspan="6" align="center"><input type="submit" name="conf_reg" value="Confirm" style="background-color: yellow"></td>
				</tr>
			</table>
			<?php

		}else{

			 echo "<center><strong><font size='6' color='red'>Sorry No Subject Selected. Select atleast one subject.</font></strong></center>";
		}
	}

?>










<?php 
	if (isset($_POST['conf_reg'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['reg_sem'];
		$stream=$_POST['stream'];
		$nor=$_POST['nor'];

		try{
			$pdo->beginTransaction();
				$sql = "DELETE FROM GRADES where roll_no='$roll_no' and semester='$sem'";   
  				$stmt = $pdo->prepare($sql);
  				
  				$stmt->execute();
		
			for($id = 0; $id < $nor; $id = $id + 1){
				$subject_name=$_POST['subject_name_'.$id];
				$sub_type=$_POST['sub_type_'.$id];
				$pool=$_POST['pool_'.$id];
				$faculty=$_POST['faculty_'.$id];
				$fac_email=explode(':', $faculty)[0];
				$fac_name=explode(':', $faculty)[1];
				$fac_unit=explode(':', $faculty)[2];
				$cnc=$_POST['cnc_'.$id];
				//$supply=$_POST['supply_'.$id];
				$fac_nc=$fac_name.", ".$fac_unit;


				//$sql1 = "INSERT INTO GRADES (ID,course,stream,batch,semester,student_email,student_name,roll_no,subject_code,subject_name,credit_course,subject_type,pool,faculty_email,faculty_name, marks,supply_tag) VALUES (0,'$crs','$stream','$bt','$sem','$email','$student_name','$roll_no','','$subject_name','$cnc','$sub_type','$pool','$fac_email','$fac_nc',0,'$supply')"; 

				$sql1 = "INSERT INTO GRADES (ID,course,stream,batch,semester,student_email,student_name,roll_no,subject_code,subject_name,credit_course,subject_type,pool,faculty_email,faculty_name, marks) VALUES (0,'$crs','$stream','$bt','$sem','$email','$student_name','$roll_no','','$subject_name','$cnc','$sub_type','$pool','$fac_email','$fac_nc',0)"; 
  				$stmt1 = $pdo->prepare($sql1);
				$stmt1->execute();
				

		}
		$pdo->commit();
		}catch (\Exception $e) {
			    if ($pdo->inTransaction()) {
			        $pdo->rollback();
			        ?>
			        	<center><font color="red" size="4"><strong>Some ERROR occured. Please retry.</strong></font></center>
			        <?php

			        require_once("./includes/footer.php");
			        die;
			    }
			    throw $e;
			}
	?>
		<center><font color="green" size="4"><strong>Registration Succesful</strong></font></center><br>
		<center><font color="green" size="4"><strong>Go to "Registration"->"Semester Number" to check status</strong></font></center>
	<?php
}

?>

<?php require_once("./includes/footer.php"); ?>