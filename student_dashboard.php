
<?php require_once("./includes/header_student.php"); 

//registration end date for regular subjects
$registration_start_date_r= new dateTime("09-01-2023");
$registration_end_date_r= new dateTime("03-03-2026");
$todays_date= new dateTime (date("d-m-Y"));
if (isset($_SESSION['semester_number'])) {
      $semester=$_SESSION['semester_number'];
    }else {

      $semester=$_SESSION['current_sem'];
    }
?>

<?php 
//Late Fee Related









?>

<!--........................................Change Password...................................-->
<?php
//Change password code<script>
 

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
          //header("Refresh:0;url=./session_logout.php");



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

<form action="student_dashboard.php" method="POST">
<table align="center" border="1">
    
<tr style="color:purple"><td>Current Password</td>
  <td>
        <input name="current-password" id="inputCurrentPassword" type="password" placeholder="Enter current password" required="true" style="width: 300px;" minlength="3" maxlength="12" />
    </td>
</tr>

<tr style="color:purple"><td>New Password</br> (max 12, min 6 characters)</td>
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
<!--....................Change Password End......................................................-->



<?php 
      if (isset($_POST['verify'])) {
        if ($_POST['verify']='Click Here If Correct') {
          $sql = "UPDATE GRADES set student_verified='YES', verified_value='Correct', student_verified_on=CURRENT_TIMESTAMP where roll_no='$roll_no' ";
                                       
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $record_count = $stmt->rowCount();
        }

        ?>
          <center><font color="green" size="5">Thank You for confirming subject studied summary</font></center><br><br>
        <?php
      }
?>



<!------------------------------------- Subjects studied summary -------------------------------->


<?php 

      $sql = "SELECT * FROM min_subject where course='$course' and stream='$stream' and prev_degree='$prev_degree' ";
                                       
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $record_count = $stmt->rowCount();
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      $compulsory_cnt=$rec['compulsory_cnt'];
      $formative_cnt=$rec['formative_cnt'];
      $poola_min=$rec['poola_min'];
      $poolb_min=$rec['poolb_min'];
      $elective_cnt=$rec['elective_cnt'];


     /* $sql = "SELECT * FROM tbl_name where course='$course' and stream='$stream'";
                                       
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $record_count = $stmt->rowCount();
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      $table=$rec['table_name'];*/

      


?>

      <table align="center" border="1">
        <tr align="center" style="background-color: #ccffee">
          <td colspan="5" align="center">Subjects Studied Till Date and Studying in Current Semester</td>
        </tr>
        <tr align="center" style="background-color: #ffffe6">
          <td rowspan="2">Category</td><td rowspan="2">Compulsory</td><td colspan="2">Formative</td><td rowspan="2" >Elective</td>
        </tr>
        <tr align="center" style="background-color: #ffcce6">
          <td>Pool A</td><td>Pool B</td>
        </tr>

        <tr align="center" style="background-color: #ffe0cc">
          <td rowspan="2">No. of Subject(s) to be <br>taken from this category/pool</td>
          <td rowspan="2"><?=$compulsory_cnt ?></td>
          <td colspan="2">Total Formative: <?=$formative_cnt ?></td>
          
          <td rowspan="2"><?=$elective_cnt ?></td>
        </tr>
        <tr align="center" style="background-color: #ffe0cc">
          
          
          <td>Pool-A Min: <?=$poola_min ?></td>
          <td>Pool-B Min: <?=$poolb_min ?></td>
         
        </tr>


        <tr>
          <td></td>
          <td>
            <?php 
                $sql = "SELECT * FROM grades where roll_no='$roll_no' and course='$course' and stream='$stream' and subject_type='Compulsory'  and registration_verification_status='APPROVED' order by semester";
                             
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $compulsory_studied = $stmt->rowCount();

                while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $subject_name=$rec['subject_name'];
                  $marks=$rec['marks'];

                  echo $subject_name;
                  echo "(".$rec['credit_course'].")";
                  echo "[Marks: ".$marks."]<br>";

                  
                }
                

            ?>
          </td>

           <td>
            <?php 
                $sql = "SELECT * FROM grades where roll_no='$roll_no' and course='$course' and stream='$stream' and subject_type='Formative' and pool='A'  and registration_verification_status='APPROVED' order by semester";
                               
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $poola_studied = $stmt->rowCount();

                while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $subject_name=$rec['subject_name'];
                  $marks=$rec['marks'];
                  echo $subject_name;
                  echo "(".$rec['credit_course'].")";
                  echo "[Marks: ".$marks."]<br>";
                }
                

            ?>
          </td>

          <td>
            <?php 
                $sql = "SELECT * FROM grades where roll_no='$roll_no' and course='$course' and stream='$stream' and subject_type='Formative' and pool='B'  and registration_verification_status='APPROVED' order by semester";
                                
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $poolb_studied = $stmt->rowCount();

                while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $subject_name=$rec['subject_name'];
                  $marks=$rec['marks'];
                  echo $subject_name;
                  echo "(".$rec['credit_course'].")";
                  echo "[Marks: ".$marks."]<br>";
                }
                

            ?>
          </td>

          <td>
            <?php 
                $sql = "SELECT * FROM grades where roll_no='$roll_no' and course='$course' and stream='$stream' and subject_type='Elective' and registration_verification_status='APPROVED' order by semester";
                              
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $elective_studied = $stmt->rowCount();

                while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $subject_name=$rec['subject_name'];
                  $marks=$rec['marks'];
                  echo $subject_name;
                  echo "(".$rec['credit_course'].")";
                  echo "[Marks: ".$marks."]<br>";
                }
                

            ?>
          </td>
        </tr>

        <tr>
          <td rowspan="2"></td>
          <td rowspan="2">
            <?php 
                if ($compulsory_studied>=$compulsory_cnt) {
                  ?>
                    <font color="green" size="4" > <strong>Great!!</strong></font>
                  <?php
                }else{
                  ?>
                    <font color="red" size="4"> <strong>Compulsory Remaining: <?=$compulsory_cnt - $compulsory_studied ?></strong></font>
                  <?php

                }

            ?>
          </td>

          <td>
            <?php 
                if ($poola_studied>=$poola_min) {
                  ?>
                    <font color="green" size="4"> <strong>Great!!</strong></font>
                  <?php
                }else{
                  ?>
                    <font color="red" size="4"> <strong>Pool-A Remaining: <?=$poola_min - $poola_studied ?></strong></font>
                  <?php

                }

            ?>
          </td>

        <td>
            <?php 
                if ($poolb_studied>=$poolb_min) {
                  ?>
                    <font color="green" size="4"> <strong>Great!!</strong></font>
                  <?php
                }else{
                  ?>
                    <font color="red" size="4"> <strong>Pool-B Remaining: <?=$poolb_min - $poolb_studied ?></strong></font>
                  <?php

                }

            ?>
          </td>


          <td rowspan="2">
            <?php 
                if ($elective_studied>=$elective_cnt) {
                  ?>
                    <font color="green" size="4"> <strong>Great!!</strong></font>
                  <?php
                }else{
                  ?>
                    <font color="red" size="4"> <strong>Elective Remaining: <?=$elective_cnt - $elective_studied ?></strong></font>
                  <?php

                }

            ?>
          </td>

        </tr>


        <tr>
          <td colspan="2">
                  <?php 
                if ($formative_studied>=($poola_min + $poolb_min)) {
                  ?>
                    <font color="green" size="4"> <strong>Great!!</strong></font>
                  <?php
                }else{
                  ?>
                    <font color="red" size="4"> <strong>Total Formative Remaining: <?=$formative_cnt - $poola_studied - $poolb_studied ?></strong></font>
                  <?php

                }

            ?>

          </td>
        </tr>
         
      </table>

      <?php 

      $sql = "SELECT * FROM grades where roll_no='$roll_no' and student_verified='NO'";
                              
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $rc = $stmt->rowCount();
              if ($rc>0) {
                # code...
              
                

      ?>
      <br><br>
      <center>
        <font color="blue" size="5">Please verify whether the summary displayed above is correct or not</font><br>
        <font color="brown" size="5">If above summary is not correct then, send an email to `biswajit@isical.ac.in` mentioning the mismatch</font>
        <form action="" method="POST">
          <input type="submit" name="verify" value="Click Here If Correct" style="background-color: lime">
        <!--  <input type="submit" name="verify" value="Not Correct" style="background-color: brown"> -->
          
        </form>
      </center>


<?php 
}
?>


























































































 <!--...................Semester Registration (Regular).................................................... --> 

<?php



if (isset($_POST['semester-registration-regular'])) {

$sql="SELECT password from users where email='$email'";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$var = $stmt->fetch(PDO::FETCH_ASSOC);
/*if ($var['password']=='$2y$10$5BI972XBALyS6ESyQCV8cuQPYfvt89Mk2FXcXu0SnvIiq1Qt.2bAy') {
  echo "<center><strong><font color='red' size='6'>Change your default password first from 'User Settings' -> 'Change Password'</font></strong></center>";
  require_once("./includes/footer.php");
      die;

}*/

  $sql="SELECT * from GRADES where course='$course' and department='$department' and stream='$stream' and academic_session='$academic_year' and semester='$semester' and student_email='$email' and roll_no='$roll_no' and reg_no='$reg_no'";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
  $rc=$stmt->rowCount();
  if ($rc!=0) {
      echo "<center><strong><font color='red' size='6'>You are already registered for current semester</font></strong></center>";
      echo "<center><strong><font color='black' size='4'>Registered for following subjects. </br>CSE students who are placed in Section-B, Faculty name will be as per routine, not as per this form.</br></font></strong></center>";

    $sql="SELECT * from GRADES where course='$course' and department='$department' and stream='$stream' and academic_session='$academic_year' and semester='$semester' and student_email='$email' and roll_no='$roll_no' and reg_no='$reg_no' order by ID";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();

    ?>
      <table align="center" border="2" width="800px">
          <tr bgcolor="lime">
            <td>Subject Code</td>
            <td>Subject Name</td>
            <td>Credit</td>
            <td>Core/</br>Elective/</br>Sessional</td>
            <td>Faculty</td>
            <td>Registration</br>verification</br>status</td>
          </tr>
          <?php
          while ($var = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
              <tr>
                  <td><?=$var['subject_code'] ?> </td>
                  <td><?=$var['subject_name'] ?></td>
                  <td><?=$var['credit'] ?></td>
                  <td><?=$var['subject_type'] ?></td>
                  <td><?=$var['faculty_name'] ?></td>
                  <td><?=$var['registration_verification_status'] ?></td>
              </tr>

            <?php
          }

          $sql="SELECT * from deleted_registration_regular where course='$course' and department='$department' and stream='$stream' and academic_session='$academic_year' and semester='$semester' and student_email='$email' and roll_no='$roll_no' and reg_no='$reg_no' order by ID";
          $stmt=$pdo->prepare($sql);
          $stmt->execute();

          while ($var = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
              <tr>
                  <td><?=$var['subject_code'] ?> </td>
                  <td><?=$var['subject_name'] ?></td>
                  <td><?=$var['credit'] ?></td>
                  <td><?=$var['subject_type'] ?></td>
                  <td><?=$var['faculty_name'] ?></td>
                  <td><?=$var['registration_verification_status'] ?></td>
              </tr>

            <?php
          }

          ?>
      </table>>
    <?php
      require_once("./includes/footer.php");
      die;
  }

  
 
//Check whether any subjects offered or not OR registration date has not come

  $sql="SELECT * from OFFERED_SUBJECT where course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year' and semester='$semester'";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
  $rc=$stmt->rowCount();
 if ($rc==0 or ($todays_date<$registration_start_date_r) ) {
      echo "<center><strong><font color='red' size='5'>Sorry!! Semester Registration for Regular Subjects Not started yet.</font></strong></center>";
      require_once("./includes/footer.php");
      die;


    }

//Check whether end date over or not
 if ($rc==0 and $todays_date>$registration_end_date_r) {
    echo "<center><strong><font color='red' size='5'>Sorry!! Semester Registration (Regular) Ended</br>You have missed your registration.</font></strong></center>";
    require_once("./includes/footer.php");
      die;
  }

  if ( $todays_date>$registration_end_date_r) {
    echo "<center><strong><font color='red' size='5'>Sorry!! Semester Registration (Regular) Ended</br>You have missed your registration.</font></strong></center>";
    require_once("./includes/footer.php");
      die;
  }
  
//echo "<center><strong><font color='red' size='6'>Semester Registration form</br>CSE students who are placed in Section-B, Faculty name will be as per routine, not as per this form.</br></font></strong></center>";
  
echo "<center><strong><font color='black' size='4'>Core & Sessional Subjects are auto selected. Elective subjects (if any) need to choose from dropdown list.</font></strong></center>";
$i=1;  $k=0; $j=1; 
?>
<form action="./semester_registration_handeler.php" method="POST">
  <table border="2mm" align="center">
    <tr bgcolor="yellow">
      <td>Subject Code</td>
      <td>Subject Name</td>
      <td>Credit</td>
      <td>Faculty</td>
    </tr>

<?php
    ## Fetch compulsory theory sublect details

    $sql = "SELECT * FROM OFFERED_SUBJECT where course='$course' and department='$department' and stream='$stream' and semester='$semester' and academic_year='$academic_year' and subject_type='COMPULSORY' and subject_category='THEORY' ORDER BY ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $noct=$stmt->rowCount();
 ?>   
    <tr>
      <td colspan="4">Core Subjects</td>
    </tr>    
<?php                                       
    while($var = $stmt->fetch(PDO::FETCH_ASSOC)){

?>
    <tr>
      <td><?=$var['subject_code'] ?><input type="hidden" name="compulsory_theory_<?=$i; ?>_code" value="<?=$var['subject_code'] ?>" ></td>
      <td><?=$var['subject_name'] ?><input type="hidden" name="compulsory_theory_<?=$i; ?>_name" value="<?=$var['subject_name'] ?>" ></td>
      <td><?=$var['credit'] ?><input type="hidden" name="compulsory_theory_<?=$i; ?>_credit" value="<?=$var['credit'] ?>" ></td>
      <td><?=$var['faculty_name'] ?><input type="hidden" name="compulsory_theory_<?=$i; ?>_faculty_name" value="<?=$var['faculty_name'] ?>" >
        <input type="hidden" name="compulsory_theory_<?=$i; ?>_faculty_email" value="<?=$var['faculty_email'] ?>" ></td>
    </tr>                                          
<?php 
$i++;                                                
}

  // Fetching elective subjects

  $sql_et= $sql = "SELECT DISTINCT elective_thread FROM OFFERED_SUBJECT where course='$course' and department='$department' and stream='$stream' and semester='$semester' and academic_year='$academic_year' and subject_type='ELECTIVE' and subject_category='THEORY' ORDER BY ID" ;
     $stmt_et = $pdo->prepare($sql_et);
     $stmt_et->execute();
     $noe=$stmt_et->rowCount();
     $elective_array=array();

?>   
    <tr>
      <td colspan="4">Elective Subjects</td>
    </tr>    
<?php 
    while($var_et = $stmt_et->fetch(PDO::FETCH_ASSOC)){
           $elective_thread=$var_et['elective_thread'];
            array_push($elective_array,$elective_thread);
            ?>
            <tr>
              <td>
                <select name="<?=$elective_thread?>_code" id="<?=$elective_thread?>_code" required >
                    <option hidden>Choose Elective Subject</option>

           <?php
            $sql = "SELECT * FROM OFFERED_SUBJECT where course='$course' and department='$department' and stream='$stream' and semester='$semester' and academic_year='$academic_year' and subject_type='ELECTIVE' and subject_category='THEORY' and elective_thread='$elective_thread' ORDER BY ID";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
                                     
              while ($var = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
               <option value='<?=$var['subject_code']; ?>'><?=$var['subject_code']; ?></option>
            <?php
            }
             
            ?>
            
            </select>
            </td>
            <td><input type='button' name='<?=$elective_thread?>_name' id='<?=$elective_thread?>_name' value='' readonly />
              <input type='hidden' name='<?=$elective_thread?>_name_tbox' id='<?=$elective_thread?>_name_tbox' value='' readonly/>
            </td>
            <td><input type='button' name='<?=$elective_thread?>_credit' id='<?=$elective_thread?>_credit' value='' readonly />
              <input type='hidden' name='<?=$elective_thread?>_credit_tbox' id='<?=$elective_thread?>_credit_tbox' value='' readonly/></td>
            <td><input type='button' name='<?=$elective_thread?>_faculty' id='<?=$elective_thread?>_faculty' value='' readonly/>
              <input type='hidden' name='<?=$elective_thread?>_faculty_tbox' id='<?=$elective_thread?>_faculty_tbox' value='' readonly/>
              <input type='hidden' name='<?=$elective_thread?>_faculty_email_tbox' id='<?=$elective_thread?>_faculty_email_tbox' value='' readonly/></td>
              
 
            </tr>
       <?php   
          $k++;  
          } 


//Fetch sessional subject details
          $sql = "SELECT * FROM OFFERED_SUBJECT where course='$course' and department='$department' and stream='$stream' and semester='$semester' and academic_year='$academic_year' and subject_type='COMPULSORY' and subject_category='SESSIONAL' ORDER BY ID";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $nos=$stmt->rowCount(); 
?>   
    <tr>
      <td colspan="4">Sessional Subjects</td>
    </tr>    
<?php                                               
          while($var = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                <td><?=$var['subject_code'] ?><input type="hidden" name="sessional_<?=$j; ?>_code" value="<?=$var['subject_code'] ?>" ></td>
                <td><?=$var['subject_name'] ?><input type="hidden" name="sessional_<?=$j; ?>_name" value="<?=$var['subject_name'] ?>" ></td>
                <td><?=$var['credit'] ?><input type="hidden" name="sessional_<?=$j; ?>_credit" value="<?=$var['credit'] ?>" ></td>
                <td><?=$var['faculty_name'] ?><input type="hidden" name="sessional_<?=$j; ?>_faculty_name" value="<?=$var['faculty_name'] ?>" >
                  <input type="hidden" name="sessional_<?=$j; ?>_faculty_email" value="<?=$var['faculty_email'] ?>" ></td>
              </tr>    
<?php
$j++;
  }

 ?>
            <tr>
                <td colspan="4" align="center" style="color: blue"><input type="submit" name="semester-registration-btn-regular" value="Register" align="center"></td>
                <input type="hidden" name="i" value="<?=$i; ?>">
                <input type="hidden" name="j" value="<?=$j; ?>">
                <input type="hidden" name="k" value="<?=$k; ?>">
                  <?php

                  foreach($elective_array as $value)
                  {
                      echo '<input type="hidden" name="elective_thread_info[]" value="'. $value. '">';
                  }

                  ?>
            </tr> 
  </table>
</form>


<?php
}


?>


<?php

if (isset($_POST['semester-fee-receipt-upload'])) {
    $sql="SELECT * FROM FEE_RECEIPT WHERE roll_no='$roll_no' and reg_no='$reg_no' and academic_year='$academic_year' and semester='$semester' and (verification_status='PENDING' or verification_status='APPROVED')";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $rowcnt=$sth->rowCount();
    $sql="SELECT * FROM FEE_RECEIPT WHERE roll_no='$roll_no' and reg_no='$reg_no' and academic_year='$academic_year' and semester='$semester'";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    ?>
    
    <?php
        if($rowcnt>=1){
    ?>

    <center><strong><font color="red">You have already uploaded fee receipt for </br> Academic Year: <?=$academic_year ?>, Semester: <?=$semester ?>. No more uploads allowed.</font></strong></center>
      <table align="center" border="2">
        <tr bgcolor="yellow">
          <td>Uploaded On</td><td>File Link</td><td>Verification Status</td>
        </tr>
    <?php     

        while($var=$sth->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><td>". $var['uploaded_on'] . "</td><td>";
        $filepath=$target_dir . $var['file_name'];
        echo "<a href='$filepath' target='_blank'>See Uploaded File</a></td><td>" . $var['verification_status'] . "</td></tr>";

        }
        echo "</table>";

    }else {

?>
    <center><strong>Upload fee receipt for Academic Year: <?=$academic_year ?>, Semester: <?=$semester ?>.  Only PDF files of MAX size 2 MB is allowed.</strong></center>
    <table border="1" align="center">
      
        <form action="./fee_receipt_upload.php" method="POST" enctype="multipart/form-data">
        
        <tr>
          <td width="170px">Receipt/Transaction No:  </td>
          <td><input type="text" size="30px" name="trns_no" placeholder="Write Receipt/Transaction No" required></td> </tr>
        <tr>
        <tr>
          <td width="170px">Receipt/Transaction Date:  </td>
          <td><input type="text" size="30px" id="datepicker" name="trns_date" required></td> 
        </tr>
        
        <tr>
          <td width="170px">Transaction Amount:  </td>
          <td><input type="text" size="30px" name="trns_amt" placeholder="Transaction Amount" onkeypress="return isNumberKey(this, event);" required></td> </tr>
        <tr>
        <tr>
          <td width="170px">Bank Name:  </td>
          <td><input type="text" size="30px" name="bank_name" placeholder="Bank Name" required></td> </tr>
        <tr>
        <tr>
          <td width="170px">Branch Name:  </td>
          <td><input type="text" size="30px" name="branch_name" placeholder="Branch Name" required></td> </tr>
        <tr>
        <tr>
          <td width="170px">Choose File:  </td>
          <td><input type="file" name="file"></td> </tr>
        <tr>

        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="fee-receipt-upload" style="background: orange" value="Submit">
          </td>
        </tr>

        </form>
       
    </table>

<?php


    }
}

?>

<?php

if (isset($_POST['semester-registration-regular'])) {
?>

<center><font color="brown" size="5"><br><br>Go through the course handout before selecting an Elevtive</font></center>
<table align="center" border="1">
  <tr>
    <td>Subject Code</td><td>Subject Name</td><td>Course Handout</td>
  </tr>
<?php 
    $s="SELECT * FROM course_handout WHERE course='$course' and department='$department' and stream='$stream' and academic_year='$academic_year'  and semester='$semester' and status='ACTIVE' ";
    $st = $pdo->prepare($s);
    $st->execute();
    while ($var=$st->fetch(PDO::FETCH_ASSOC)) {
      $handout_file="./course_handout/".$var['handout_file'];
      ?>
      <tr>
        <td><?=$var['subject_code'] ?></td>
        <td><?=$var['subject_name'] ?></td>
        <td><a href="<?=$handout_file ?>" target="_blank">Click here to see handout</a></td>
      </tr>
      <?php
    }
?>
</table>

<?php 
}
?>





<?php require_once("./includes/footer.php"); ?>
