<?php require_once("./includes/header_student.php"); ?>



<?php 
if (isset($_POST['sem_details'])) {

		$sem=$_POST['sem_details'];
		$sql = "SELECT * from registration_timetable where course='$course' and batch='$batch' and semester='$sem'";              
  		$stmt= $pdo->prepare($sql);
		$stmt->execute();
        $tc = $stmt->rowCount();

        $dt = $stmt->fetch(PDO::FETCH_ASSOC);
        $reg_sdate=$dt['from_date_time'];
        $reg_edate=$dt['to_date_time'];
        $today=date("d-m-Y H:i:s");



        if ($tc==0) {
        	?>
        		<center><font color="red" size="4">Sorry!! Registration Slot not announced yet.</font></center>
        	<?php
        	goto Display1;
        	//require_once("./includes/footer.php");
        	//die;
        }

        

        if (strtotime($today)<strtotime($reg_sdate)) {
        	?>
        		<center><font color="red" size="4">Registration not started yet. Visit after <?=$reg_sdate ?>.</font></center>
        	<?php
        	goto Display1;
        	//require_once("./includes/footer.php");
        	//die;
        }

        if (strtotime($today)>strtotime($reg_edate)) {
        	?>
        		<center><font color="red" size="4">Registration window closed.</font></center>
        	<?php
        	goto Display;
        	//require_once("./includes/footer.php");
        	//die;
        }

        Display:
//Registered Subjects

        $sql="";

        if ($sem==$semester) {
           $sql = "SELECT * from grades where roll_no='$roll_no' and semester='$sem'"; 
        }else{
            $sql = "SELECT * from grades where roll_no='$roll_no' and semester='$sem' and registration_verification_status='APPROVED'"; 
        }

                     
  		$stmt= $pdo->prepare($sql);
		$stmt->execute();
        $tc = $stmt->rowCount();


        ?>
            <center><font color="red" size="5">Deadline for registration of semester <?=$sem ?> :: <?=$reg_edate ?></font></center><br>
        <?php
        if ($tc==0) {
        	?>
        		<center><font color="blue" size="4">You have not registered yet for semester <?=$sem ?>.</font></center><br>
        	<?php
        }else{


                if ($sem==$semester) {
                    ?>
                        <center><font color="blue" size="4">You have chosen following subjects for semester <?=$sem ?>.</font></center><br>
                    <?php
                }else{
                    ?>
                        <center><font color="blue" size="4">You have been offered following subjects for semester <?=$sem ?>.</font></center><br>
                    <?php
                    
                }

        ?>




        
        <table align="center" border="1">
        	<tr style="background-color: orange">
        		<td>Subject Name</td>
        		<td>Category</td>
        		<td>Pool</td>
        		<td>Faculty</td>
        		<td>Credit/Non Credit</td>
        		
        		<td>Marks</td>
                <?php 
                    if ($semester==$sem) {
                        ?>
                            <td>Mentor's Verification Status</td>
                        <?php
                    }
                ?>
        		
        	</tr>
        


        <?php
        $i=0;
        while ( $r = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
        	
        	<td><?=$r['subject_name'] ?></td>
        	<td><?=$r['subject_type'] ?></td>
        	<td align="center"><?=$r['pool'] ?></td>
        	<td><?=$r['faculty_name'] ?></td>
        	<td align="center"><?=$r['credit_course'] ?></td>
        	
        	<td align="center"><?=$r['marks'] ?></td>

             <?php 
                    if ($semester==$sem) {
                        ?>
                            <td align="center"><?=ucwords(strtolower($r['registration_verification_status'])) ?></td>
                        <?php
                    }
                ?>
        	
        </tr>
        	<?php
        	$i=$i+1;
        }

        ?>
        </table>
	<?php
	Display1:
	//require_once("./includes/footer.php");
        	//die;
        }


?>
	<br><center>
		<form action="registration.php" method="POST">
			<input type="hidden" name="reg_sem" value="<?=$sem ?>">

			<?php 
				if (strtotime($today)>=strtotime($reg_sdate) and strtotime($today)<=strtotime($reg_edate)) {
					# code...
				

				if ($tc==0) {
			?>
			<input type="submit" name="sem_btn" style="background-color: yellow" value="Click here to register for Semester <?=$sem ?>">

			<?php 
				}else{
			?>
				<input type="submit" name="sem_btn" style="background-color: yellow" value="Click here to update chosen subjects for Semester <?=$sem ?>" >
			<?php 
				}
				}
			?>

		</form>
	</center>


<?php

	
}
?>





<?php 
if (isset($_POST['sem_details']) and $_POST['sem_details']==1) {
	


}
?>








<!--======================================================********************************************************==================================================================-->

<?php 
if (isset($_POST['sem_details']) and $_POST['sem_details']==2) {
	

}
?>






<!--======================================================********************************************************==================================================================-->

<?php 
if (isset($_POST['sem_details']) and $_POST['sem_details']==3) {
		
	
}
?>







<!--======================================================********************************************************==================================================================-->

<?php 
if (isset($_POST['sem_details']) and $_POST['sem_details']==4) {
	


	
}
?>







<!--======================================================********************************************************==================================================================-->

<?php 
if (isset($_POST['sem_details']) and $_POST['sem_details']==5) {
	


	
}
?>







<!--======================================================********************************************************==================================================================-->

<?php 
if (isset($_POST['sem_details']) and $_POST['sem_details']==6) {
	


	
}
?>






<!--======================================================********************************************************==================================================================-->

<?php 
if (isset($_POST['sem_details']) and $_POST['sem_details']==7) {
	


	
}
?>








<!--======================================================********************************************************==================================================================-->

<?php 
if (isset($_POST['sem_details']) and $_POST['sem_details']==8) {
	


	
}
?>


















<?php require_once("./includes/footer.php"); ?>