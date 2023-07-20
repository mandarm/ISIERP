
<?php require_once("./includes/db.php"); 
date_default_timezone_set('Asia/Kolkata');?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>ISI Kolkata :: ERP</title>
        <link href="./css/styles.css" rel="stylesheet" />
        <link rel="icon" type="./includes/images/x-icon" href="./includes/images/favicon.png" />
 
    </head>

<style>
body {background-color: white; text-decoration-color: black}
h1   {color: brown;}
p   {color: brown;}

table   {color: black;}




table.center {
    margin-left:auto; 
    margin-right:auto;
    text-decoration-color: black;
  }

  .container{
    width:100%;
}

.flex-rw {
  display: flex;
  flex-flow: row wrap;
}


/* Dropdown Button */
.dropbtn1 {
  background-color: lightcoral;
  color: white;
  /*padding: 16px;*/
  font-size: 16px;
  border: none;
}

.dropbtn2 {
  background-color: blue;
  color: white;
  /*padding: 16px;*/
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}


.topnav-right {
  float: right;
}

.left_label {

  color: brown;
  font-size: 20px;
}

.hoverbutton1 {
  background-color: BurlyWood;
  border: "2";
  color: blue;
  /*padding: 15px 32px;*/
  text-align: left;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 200px
}

.hoverbutton2 {
  background-color: orange; /* Green */
  border: "2";
  color: blue;
  /*padding: 15px 32px;*/
  text-align: left;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 200px
}

.menubutton1 {
  background-color: orange; /* Green */
  border: "2";
  color: blue;
  /*padding: 15px 32px;*/
  text-align: left;

  font-size: 16px;


  width: 100px;
 
}

.menubutton2 {
  background-color: lightcoral; /* Green */
  border: "2";
  color: blue;
  /*padding: 15px 32px;*/
  text-align: left;

  font-size: 16px;


  width: 100px;


}

</style>

<!-- ***************************************************************************************************** -->
<script src="./js/jquery.min.js"></script>
<script type="text/javascript">
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)

}

function display_ct() {
var x = new Date()
var m=x.getMonth() +1
var x1=x.getDate() + "-" + m + "-" + x.getFullYear(); 
x1 = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds();
document.getElementById('ct').innerHTML = x1;
display_c();
 }






</script>

 <body onload=display_ct();>




<?php session_start();

       if(empty($_SESSION['login']) or $_SESSION['user_role']!='Student'){

      header("Refresh:0;url=./index.php");
    }elseif(time()-$_SESSION['login_time_stamp'] >600) 
    {
        session_unset();
        session_destroy();
        header("Refresh:0;url=./index.php");
    }else{

        $_SESSION['login_time_stamp']=time();
        //$email=$_SESSION['email'];

    }
$display=0;
//echo "sem no=".$_SESSION['semester_number'];


?>

<div style="background: #ffd2ad">
  <table align="center" border="0" width="100%">
    <tr>
      <td width="25%" align="left"><img src="./includes/images/logo.png"></td>
      <td width="50%">
        <center><strong><font size="6" color="brown">INDIAN STATISTICAL INSTITUTE</font><br><font size="5" color="blue">STUDENT INFORMATION PORTAL</font><br><font size="4" color="brown">(In loving memory of Prof. Saurabh Ghosh)</font></strong></center>
      </td>
      <td width="25%" align="right"><img src="./includes/images/saurabh.jpeg"></td>
    </tr>
  </table>

</div>

<div style="display:flex; flex-direction: row; background: white;">
<center>  <label>Welcome  <?php echo "<font color=\"brown\"><strong>" . $_SESSION['user_name'] . "</strong></font><font color=\"black\"> (logged in as <strong>" . $_SESSION['user_role'] . "</font></strong>)"; ?></label></center>
</div>


<div style="background-color:#f7f5e1;" class="flex-container">

  <table align="center" width="100%">
    <tr><td align="left">

    <div class="dropdown">
  <form action="./student_dashboard.php" method="POST">
    
    <button  type="submit" class="menubutton1" name="home" value="home">Home</button>
   </form>
  </div>

   <div class="dropdown">
      <button class="dropbtn2">Registration</button>
      <div class="dropdown-content">

        <form action='./semester.php' method='POST'>
            <button type='submit' name='sem_details' value='1' class="hoverbutton1">Semester 1</button>
        </form>

        <form action='./semester.php' method='POST'>
            <button type='submit' name='sem_details' value='2' class="hoverbutton2">Semester 2</button>
        </form>

        <form action='./semester.php' method='POST'>
            <button type='submit' name='sem_details' value='3' class="hoverbutton1">Semester 3</button>
        </form>

        <form action='./semester.php' method='POST'>
            <button type='submit' name='sem_details' value='4' class="hoverbutton2">Semester 4</button>
        </form>

       <!-- <form action='./semester.php' method='POST'>
            <button type='submit' name='sem_details' value='5' class="hoverbutton1">Semester 5</button>
        </form>

        <form action='./semester.php' method='POST'>
            <button type='submit' name='sem_details' value='6' class="hoverbutton2">Semester 6</button>
        </form>-->



        

      </div>
  </div>
   <div class="dropdown">
      <button class="dropbtn1">Student's Manual</button>
      <div class="dropdown-content">
        <form action='./course_manual.php' method='POST'>
            <button type='submit' name='course-manual' value='Course Manual' class="hoverbutton1">Course Manual</button>
        </form>
        
      </div>

    </div>

   <div class="dropdown">
      <button class="dropbtn2">User Settings</button>
      <div class="dropdown-content">
        <form action='./student_dashboard.php' method='POST'>
            <button type='submit' name='change-password' value='change-password' class="hoverbutton1">Change Password</button>
        </form>
        
      </div>

    </div>

<div class="dropdown">
      <form action="./session_logout.php" method="POST">
       <button type="submit" class="menubutton2" name="logout_session" value="logged-out">Logout</button>
    </form>
  </div>
</td>
<td align="right">
  <div align="right">
  <label  class="right_label" > Current Time: <span id='ct' ></span></label>&emsp;
</div>
</td>

</tr></table>

</div>






<div>
<center><strong>Course:<font color="blue"><?= $_SESSION['course']?></font>, Stream: <font color="blue"><?= $_SESSION['stream']?></font>, Previous Degree: <font color="blue"><?= $_SESSION['prev_degree']?></font> </br>Batch: <font color="blue"><?= $_SESSION['batch']?></font>, Semester: <font color="blue"><?= $_SESSION['semester']?></font>, Roll Number: <font color="blue"><?= $_SESSION['roll_no']?></font></strong></center> 

</div>
<hr style="height:2px;border-width:0;color:red;background-color:red">



<?php

    $course=$_SESSION['course'];
    $batch=$_SESSION['batch'];
    $stream=$_SESSION['stream'];
    $semester=$_SESSION['semester'];
    $email=$_SESSION['email'];
    $roll_no=$_SESSION['roll_no'];
    $student_name=$_SESSION['user_name'];
    $prev_degree=$_SESSION['prev_degree'];
    

?>


<!--Decimal value-->
<script type="text/javascript">
    function isNumberKey(txt, evt) {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode == 46) {
        //Check if the text already contains the . character
        if (txt.value.indexOf('.') == -1) {
          return true;
        } else {
          return false;
        }
      } else {
        if (charCode > 31 &&
          (charCode < 48 || charCode > 57))
          return false;
      }
      return true;
    }
  </script>