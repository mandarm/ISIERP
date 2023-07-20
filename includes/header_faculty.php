
<?php require_once("./includes/db.php"); 
date_default_timezone_set('Asia/Kolkata');?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>ISI Kolkata</title>
        <link href="./css/styles.css" rel="stylesheet" />
        <link rel="icon" type="./includes/images/x-icon" href="./includes/images/favicon.png" />
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        
    </head>


<style>
body {background-color: white; text-decoration-color: black}
h1   {color: brown;}
p   {color: brown;}


table.center {
    margin-left:auto; 
    margin-right:auto;
    text-decoration-color: black;
  }

  .container{
    width:100%;
}

.form label{
    display: inline-block;
    text-align: center;
    float: center;
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




table, th {

  color: blue;
  border: "2" solid black;
  text-align: center;
}





/* Download table as excel script*/
        #stud_search_reg {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 60%;
        }
 
        #stud_search_reg td, #stud_search_reg th{
          border: 1px solid #ddd;
          padding: 8px;
          text-align: center;
        }
 
        #stud_search_reg tr:nth-child(even){background-color: #f2f2f2;}
        
 
        #stud_search_reg tr:hover {background-color: #ddd;}
        
 
        #stud_search_reg th {
            padding-top: 12px;
            padding-bottom: 12px;
            
            background-color: lightcyan;;
            color: black;
          }



      </style>



 <body>
<?php 

if (session_status() == PHP_SESSION_NONE) {
      session_start();
   }

    if(empty($_SESSION['login']) or $_SESSION['user_role']!='Faculty'){

      header("Refresh:0;url=./index.php");
    }elseif(time()-$_SESSION['login_time_stamp'] >7200) 
    {
        session_unset();
        session_destroy();
        header("Refresh:0;url=./index.php");
    }else{

        $_SESSION['login_time_stamp']=time();
        //$session_datetime=date("Y-m-d H:i:s", time());
        //$session_timeout=date('Y-m-d H:i:s',strtotime('+20 minutes +0 seconds',strtotime($session_datetime)));

    }
$faculty_name=$_SESSION['user_name'];
$email=$_SESSION['email'];



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

  <label class="left_label"><center>Welcome  <?php echo "<strong>" . $_SESSION['user_name'] . "</strong><font color=\"black\"> (logged in as <strong>" . $_SESSION['user_role'] . "</font></strong>)"; ?></center></label>
  

</div>
    


<div style="background-color:#f7f5e1;" class="flex-container">

  <div class="dropdown">
  <form action="./faculty_dashboard.php" method="POST">
    
    <button  type="submit" class="menubutton1" name="home" value="home">Dashboard</button>

  </form>

  
</div>

<div class="dropdown">
      <button class="dropbtn1">Course Handout</button>
      <div class="dropdown-content">
        <form action='./course_handout_upload.php' method='POST'>
            <button type='submit' name='course-handout-upload' value='course-handout-upload' class="hoverbutton1">Upload Course Handout</button>
        </form>

            

      </div>
  </div>


<?php 
      $sql = "SELECT * FROM mentorship where faculty_email='$email' and status='Active'";
                                  
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount()>0) {
         ?>
            <div class="dropdown">
                <button class="dropbtn1">Batch Mentor</button>
                <div class="dropdown-content">
                  <form action='./mentorship.php' method='POST'>
                      <button type='submit' name='mentorship' value='mentorship' class="hoverbutton1">Mentorship</button>
                  </form>
                </div>
            </div>
         <?php
        }
?>




  <div class="dropdown">
      <button class="dropbtn2">User Settings</button>
      <div class="dropdown-content">
        <form action='./faculty_dashboard.php' method='POST'>
            <button type='submit' name='change-password' value='change-password' class="hoverbutton1">Change Password</button>
        </form>       
      </div>

    </div>

<div class="dropdown">
      <form action="./session_logout.php" method="POST">
       <button type="submit" class="menubutton2" name="logout_session" value="logged-out">Logout</button>
    </form>
  </div>

</div>





