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

	if (isset($_POST['st_reg_verify'])) {

		//Update Record start
		$mentor_name=$_SESSION['user_name'];

		if ($_POST['st_reg_verify']=='Confirm Selection') {

			
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];
		$student_name=$_POST['student_name'];
		$roll_no=$_POST['roll_no'];

		$no_of_record_approve=$_POST['no_of_record_approve'];
        $no_of_record_reject=$_POST['no_of_record_reject'];

        try{
        	$pdo->beginTransaction();

		 for ($i=1; $i <= $no_of_record_approve; $i++) { 
                $db_id=$_POST['db_id_'.$i];
                
               
                
                $sql="UPDATE GRADES SET registration_verification_status='APPROVED',reg_verified_on=CURRENT_TIMESTAMP,reg_verified_by='$mentor_name' WHERE ID='$db_id'";
               
                $stmt=$pdo->prepare($sql);
                $stmt->execute();
            }

            for ($i=1; $i <= $no_of_record_reject; $i++) { 
                $db_id=$_POST['r_db_id_'.$i];
                
            
                
                $sql="UPDATE GRADES SET registration_verification_status='NOT APPROVED',reg_verified_on=CURRENT_TIMESTAMP,reg_verified_by='$mentor_name' WHERE ID='$db_id'";
                $stmt=$pdo->prepare($sql);
                $stmt->execute();
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


		}









		//Update Record end

		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];

		?>
			<center><font color="black" size="5">Semester Registration Verification for Course: <?=$crs ?>, Batch: <?=$bt ?>, Semester: <?=$sem ?></font></center><br><br>
			<form method="POST" action="./verification.php">
				<input type="hidden" name="crs" value="<?=$crs ?>">
				<input type="hidden" name="bt" value="<?=$bt ?>">
				<input type="hidden" name="sem" value="<?=$sem ?>">
			
				<?php 
					$sql = "SELECT DISTINCT roll_no,student_name,stream from grades where course='$crs' and semester='$sem' and batch='$bt' and registration_verification_status='PENDING' order by roll_no";
			        $stmt = $pdo->prepare($sql);
			        $stmt->execute();


        if($stmt->rowCount()==0){

        	echo "<center><strong>No students registered/Verification completed for Course: ".$crs.", Batch: ".$bt.", Semester: ".$sem."</strong></center>";
        	require_once("./includes/footer.php");
        	die;
        }



				?>


        <center><strong>Following students have been registered for Course: <?=$crs ?>, Batch: <?=$bt ?>, Semester: <?=$sem ?>. </br><font color='red' size='4'>Verify Registration</font></strong></center>

			<table border="1" align="center">	
				<tr bgcolor="yellow">
     				<td>Student Name</td><td>Roll No</td><td>Action</td>
     			</tr>
				
					<?php 
		        $i=0;
		        while ($var = $stmt->fetch(PDO::FETCH_ASSOC)) {
		        $student_name=$var['student_name'];
		        $roll_no=$var['roll_no'];
            $stream=$var['stream'];
            $sqlpd = "SELECT prev_degree from student where roll_no='$roll_no'";
            $stmtpd = $pdo->prepare($sqlpd);
            $stmtpd->execute();
            $varpd = $stmtpd->fetch(PDO::FETCH_ASSOC);
            $prev_degree=$varpd['prev_degree'];

		        ?>
		        
		        <?php 
		        	if ($i%2!=0) {
		        		echo "<tr bgcolor=\"orange\">";
		        	}
		        	else
		        	{echo "<tr>";}
		        $i++;

		        ?>
		        <form action="" method="POST">
		          
		        	<input type="hidden" name="crs" value="<?= $crs ?>">
		        	<input type="hidden" name="bt" value="<?= $bt ?>">
		        	<input type="hidden" name="sem" value="<?= $sem ?>">
              <input type="hidden" name="stream" value="<?= $stream ?>">
              <input type="hidden" name="prev_degree" value="<?= $prev_degree ?>">
		        		<td><?=$student_name ?><input type="hidden" name="student_name" value="<?=$student_name ?>"></td>
		        		<td><?=$roll_no ?><input type="hidden" name="roll_no" value="<?=$roll_no ?>"></td>
		        		
		        		<td><input type="submit" name="stud-reg-verify" style="background-color: #9fff80" value="Verify Registration">
		                </td>
		             </form>
		        	</tr>
        	

        	<?php 

        }
?>



				
				
			</table>
			<br>
			</form
		<?php

	}

?>




<?php
	if (isset($_POST['stud-reg-verify'])) {

		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];
    $stream=$_POST['stream'];
		$student_name=$_POST['student_name'];
		$roll_no=$_POST['roll_no'];
      $prev_degree=$_POST['prev_degree'];



?>
<br> <form name="form1" action="" method="POST">
      
          <input type="hidden" name="crs" value="<?= $crs ?>">
		  <input type="hidden" name="bt" value="<?= $bt ?>">
		  <input type="hidden" name="sem" value="<?= $sem ?>">
      <input type="hidden" name="stream" value="<?= $stream ?>">
		  <input type="hidden" name="student_name" value="<?= $student_name ?>">
		  <input type="hidden" name="roll_no" value="<?= $roll_no ?>">
      <input type="hidden" name="prev_degree" value="<?= $prev_degree ?>">


        	<center><font color="blue" size="4"><strong>Subjects that will not be selected for approval will be auto rejected on clicking on `Approve Selected Subject` </strong></br></font></center>
            
            
            <center><font color="brown" size="4"><strong>Student Name: <font color="black" size="4"><?=$student_name ?></font> &emsp;Stream: <font color="black" size="4"><?=$stream ?></font> &emsp; Roll No: <font color="black" size="4"><?=$roll_no ?></font> &emsp; Batch: <font color="black" size="4"><?=$bt ?></font>&emsp; Previous Degree: <font color="black" size="4"><?=$prev_degree ?></font></strong></font></center>

<!--**************************************************Past Subjects******************************************************* -->
<?php 
    
      $sqlp = "SELECT * from grades where roll_no='$roll_no' and semester!='$sem' and registration_verification_status='APPROVED' order by semester,subject_type";               
      $stmtp= $pdo->prepare($sqlp);
      $stmtp->execute();
      

      ?>
      <br>
      <table align="center" border="1">
        <tr style="background-color: lime">
          <td colspan="6">Past Subjects</td>
        </tr>
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
<center><font color="brown" size="5">Subjects chosen for semester <?=$sem ?></font></center>
<!--**************************************************Past Subjects******************************************************* -->


<?php 
        $sql="SELECT * from grades where course='$crs' and batch='$bt' and semester='$sem' and roll_no='$roll_no' order by subject_type";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();


?>


  <table border="2mm" align="center">
    <tr bgcolor="orange">
      <td align="center">
         <input type='checkbox' id='checkAll'/> Check All</td>
   

      <td align="center">Subject Name</td>
      <td align="center">Category</td>
      <td align="center">Pool</td>
      <td align="center">Faculty</td>
      <td align="center">Credit/Non Credit</td>
    <!--  <td align="center">Supplymentary?</td>-->
    </tr>
   
<?php

$i=1;
    while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
      $id=$var['ID'];
      $subject_name=$var['subject_name'];
      $subject_type=$var['subject_type'];
      $pool=$var['pool'];
      $faculty_name=$var['faculty_name'];
      $credit_course=$var['credit_course'];
      $supply_tag=$var['supply_tag'];

      if ($i % 2 ==0) {
      ?>
      	<tr>
      <?php
      }else{
      	?>
      	<tr style="background-color: #ccccff">
      <?php

      }
      
 ?>
    
      <td align="center">
       
        <input type='checkbox' name='update[]' value='<?= $i ?>' data-weight="1234"/>
        
        <input type='hidden' name='db_id_<?= $i ?>' value='<?= $id ?>'/>
      </td>

      		<td><?=$var['subject_name'] ?><input type="hidden" name="subject_name_<?=$i; ?>" value="<?=$var['subject_name'] ?>" ></td>
        	<td><?=$var['subject_type'] ?><input type="hidden" name="subject_type_<?=$i; ?>" value="<?=$var['subject_type'] ?>" ></td>
        	<td align="center"><?=$var['pool'] ?><input type="hidden" name="pool_<?=$i; ?>" value="<?=$var['pool'] ?>" ></td>
        	<td><?=$var['faculty_name'] ?><input type="hidden" name="faculty_name_<?=$i; ?>" value="<?=$var['faculty_name'] ?>" ></td>
        	<td align="center"><?=$var['credit_course'] ?><input type="hidden" name="credit_course_<?=$i; ?>" value="<?=$var['credit_course'] ?>" ></td>
        	<!--<td align="center"><?=$var['supply_tag'] ?></td>--><input type="hidden" name="supply_tag_<?=$i; ?>" value="<?=$var['supply_tag'] ?>" >

    
    </tr>                                          
<?php 

$i++;   

}


 ?>
           
            <tr>
                <td colspan="8" align="center" style="color: blue" >
                	<input type="submit" name="stud-reg-approve" value="Approve Selected Subject" align="center" style="color:white; background: blue;">
                    <input type="submit"  name="st_reg_verify" value="Go Back" style="color:white;background: blue;">
                    <input type="hidden" name="no_of_record" value="<?=$i ?>" >
                	

                </td>
               
            </tr> 
  </table>
</form>

<?php 
}

?>







<?php 
	if (isset($_POST['stud-reg-approve'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];
    $stream=$_POST['stream'];
		$student_name=$_POST['student_name'];
		$roll_no=$_POST['roll_no'];
		$no_of_record=$_POST['no_of_record'];
    $prev_degree=$_POST['prev_degree'];

		$array="";
        $no_of_record=0;

		if(isset($_POST['update']))
        {   
            
            $array=$_POST['update'];
            $no_of_record=$_POST['no_of_record'];
         }

?>
	<center><font color="brown" size="4"><strong>Student Name: <font color="black" size="4"><?=$student_name ?></font> &emsp;Stream: <font color="black" size="4"><?=$stream ?></font> &emsp; Roll No: <font color="black" size="4"><?=$roll_no ?></font> &emsp; Batch: <font color="black" size="4"><?=$bt ?></font>&emsp; Previous Degree: <font color="black" size="4"><?=$prev_degree ?></font></strong></font></center>

<!--**************************************************Past Subjects******************************************************* -->
<?php 
    
      $sqlp = "SELECT * from grades where roll_no='$roll_no' and semester!='$sem' and registration_verification_status='APPROVED' order by semester,subject_type";               
      $stmtp= $pdo->prepare($sqlp);
      $stmtp->execute();
      

      ?>
      <br>
      <table align="center" border="1">
        <tr style="background-color: lime">
          <td colspan="6">Past Subjects</td>
        </tr>
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
<center><font color="brown" size="5">Subjects chosen for semester <?=$sem ?></font></center>
<!--**************************************************Past Subjects******************************************************* -->



	<table align="center" border="2">
        <tr><td colspan="8" bgcolor="lime" align="center"><font color="black" size="4"><strong>Following Subjects will be Approved</strong></br></font></td></tr>
        <form name="form1" action="" method="POST">
          
        	  <input type="hidden" name="crs" value="<?= $crs ?>">
			  <input type="hidden" name="bt" value="<?= $bt ?>">
			  <input type="hidden" name="sem" value="<?= $sem ?>">
			  <input type="hidden" name="student_name" value="<?= $student_name ?>">
			  <input type="hidden" name="roll_no" value="<?= $roll_no ?>">


             <tr bgcolor="orange">
              <td align="center">Subject Name</td>
		      <td align="center">Category</td>
		      <td align="center">Pool</td>
		      <td align="center">Faculty</td>
		      <td align="center">Credit/Non Credit</td>
		     <!-- <td align="center">Supplymentary?</td>-->
            </tr>
<?php 
            $c=1; $i=1;$tc=0;

            foreach($_POST['update'] as $userid){
                    
            
            $subject_name=$_POST["subject_name_" . $userid];
            
            $subject_type = $_POST["subject_type_" . $userid];
            $pool=$_POST["pool_" . $userid];
            $faculty_name = $_POST["faculty_name_" . $userid];
            $credit_course = $_POST["credit_course_" . $userid];
            $supply_tag=$_POST["supply_tag_" . $userid];
            
            $id=$_POST["db_id_" . $userid];

     
            if ($c%2==0) {
            echo "<tr bgcolor='lightgreen'>";
            $c++;
          }
          else{
            echo "<tr>";
            $c++;
          }
            ?>
              <input type='hidden' name='db_id_<?= $i ?>' value='<?= $id ?>'/>
              <td><?=$subject_name ?><input type="hidden" name="subject_name_<?=$i;?>" value="<?=$subject_name ?>" ></td>
              <td><?=$subject_type ?><input type="hidden" name="subject_type_<?=$i;?>" value="<?=$subject_type ?>" ></td>
              <td><?=$pool ?><input type="hidden" name="pool_<?=$i;?>" value="<?=$pool ?>" ></td>
              <td><?=$faculty_name ?><input type="hidden" name="faculty_name_<?=$i;?>" value="<?=$faculty_name ?>" ></td>
              <td><?=$credit_course ?><input type="hidden" name="credit_course_<?=$i;?>" value="<?=$credit_course ?>" ></td>
              <!--<td><?=$supply_tag ?></td>--><input type="hidden" name="supply_tag_<?=$i;?>" value="<?=$supply_tag ?>" >
            </tr>

          <?php 
         $i=$i+1;
           
          }
           
?>
           
            
<?php 
                $j=1;$k=1;$m=1;
                if ($no_of_record==$i) {

                ?>
                    <tr><td colspan="8" bgcolor="yellow" align="center"><font color="black" size="4"><strong>Following Subjects will not be Approved</strong></br></font></td></tr>
                    <tr><td colspan="8" align="center"><font color="blue" size="4"><strong>Nothing will be dis-approved</strong></br></font></td></tr>
                <?php 
                }else{
                  ?>
                    <tr><td colspan="8" bgcolor="yellow" align="center"><font color="black" size="4"><strong>Following Subjects will not be Approved</strong></br></font></td></tr>
                  <?php
                    
                    for($j=1;$j<$no_of_record;$j++){
                        if (!in_array($j, $array)) {
                                
                                $subject_name=$_POST["subject_name_" . $j];
            
					            $subject_type = $_POST["subject_type_" . $j];
					            $pool=$_POST["pool_" . $j];
					            $faculty_name = $_POST["faculty_name_" . $j];
					            $credit_course = $_POST["credit_course_" . $j];
					            $supply_tag=$_POST["supply_tag_" . $j];
					            
					            $id=$_POST["db_id_" . $j];

                         
                                    if ($k%2==0) {
                                    echo "<tr bgcolor='lightgreen'>";
                                    $k++;
                                  }
                                  else{
                                    echo "<tr>";
                                    $k++;
                                  }
                                    ?>
                                   <input type='hidden' name='r_db_id_<?= $m ?>' value='<?= $id ?>'/>
					              <td><?=$subject_name ?><input type="hidden" name="r_subject_name_<?=$m;?>" value="<?=$subject_name ?>" ></td>
					              <td><?=$subject_type ?><input type="hidden" name="r_subject_type_<?=$m;?>" value="<?=$subject_type ?>" ></td>
					              <td><?=$pool ?><input type="hidden" name="r_pool_<?=$m;?>" value="<?=$pool ?>" ></td>
					              <td><?=$faculty_name ?><input type="hidden" name="r_faculty_name_<?=$m;?>" value="<?=$faculty_name ?>" ></td>
					              <td><?=$credit_course ?><input type="hidden" name="r_credit_course_<?=$m;?>" value="<?=$credit_course ?>" ></td>
					              <!--<td><?=$supply_tag ?><input type="hidden" name="r_supply_tag_<?=$m;?>" value="<?=$supply_tag ?>" ></td>-->
                                </tr>

                              <?php 
                              $m++;
                          }
                          
                  }

            }


            
            ?>
                <tr>
                    <td align="center" colspan="6">
                        <input type="submit"  name="st_reg_verify" value="Confirm Selection" style="color:white;background: blue;">
                        &ensp;<input type="submit"  name="st_reg_verify" value="Cancel" style="color:white;background: blue;">
                        &ensp;<input type="submit"  name="stud-reg-verify" value="Go Back" style="color:white;background: blue;">
                        <input type="hidden" name="no_of_record_approve" value="<?=$i -1  ?>" >
                        <input type="hidden" name="no_of_record_reject" value="<?=$m -1 ?>" >
                    </td>
                </tr>

    </form>
    </table>


<?php

	}

?>














<?php require_once("./includes/footer.php"); ?>