
<?php require_once("./includes/db.php"); 
date_default_timezone_set('Asia/Kolkata');
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>ISI Kolkata : Student Information Portal</title>
        <link href="./css/styles.css" rel="stylesheet" />
        <link rel="icon" type="./includes/images/x-icon" href="./includes/images/favicon.png" />
         <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    </head>
<style>


body {background-color: white; text-decoration-color: black}
h1   {color: brown;}
p   {color: black;}
div   {color: black;}

table {
  border-collapse: collapse;
}


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

 <body>
<?php 

if (session_status() == PHP_SESSION_NONE) {
      session_start();
   }

    if(empty($_SESSION['login']) or $_SESSION['user_role']!="DB-Admin"){
      header("Refresh:0;url=./index.php");
    }elseif(time()-$_SESSION['login_time_stamp'] >600) 
    {
        session_unset();
        session_destroy();
        header("Refresh:0;url=./index.php");
    }else{

        $_SESSION['login_time_stamp']=time();

    }

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


<div style="display:flex; flex-direction: row; background: lime;">

  <label class="left_label" >Welcome  <?php echo "<strong>" . $_SESSION['user_name'] . "</strong><font color=\"black\"> (logged in as <strong>" . $_SESSION['user_role'] . "</font></strong>)"; ?></label>

 


</div>

   
<div style="background-color:yellow;" class="flex-container">

  <div class="dropdown">
<form action="./admin_dashboard.php" method="POST"> 
    <button  type="submit" class="menubutton1" name="home" value="home">Home</button>
  </form>
</div>

		<div class="dropdown">
		  <button class="dropbtn1">User Activation</button>
		  <div class="dropdown-content">
		    <form action='./admin_dashboard.php' method='POST'>
            <button type='submit' name='activate_pi' value='activate-pi' class="hoverbutton1">Activate PI</button>
        </form>
		    

        <form action="./admin_dashboard.php" method="POST">
            <button type="submit" name="activate_admin_staff" value="activate-admin-staff" class="hoverbutton2">Activate Admin Staff</button>
        </form>
		    
        <form action="./admin_dashboard.php" method="POST">
            <button type="submit" name="activate_dbadmin" value="activate-dbadmin" class="hoverbutton1">Activate DB-Admin</button>
        </form>

      <form action="./admin_dashboard.php" method="POST">
            <button type="submit" name="activate_faculty" value="activate-faculty" class="hoverbutton2">Activate Faculty</button>
        </form>

        <form action="./admin_dashboard.php" method="POST">
            <button type="submit" name="activate_academic_incharge" value="activate_academic_incharge" class="hoverbutton1">Activate Academic Incharge</button>
        </form>

		  </div>
		</div>

    <div class="dropdown">
      <button class="dropbtn2">Registration & Grade Card</button>
      <div class="dropdown-content">
         <form action='./project_faculty_copy.php' method='POST'>
            <button type='submit' name='copy-project-faculty' value='copy-project-faculty' class="hoverbutton1">Copy Project Faculty</button>
        </form>

        <form action='./academic_incharge_dashboard.php' method='POST'>
            <button type='submit' name='update-project-faculty' value='update-project-faculty' class="hoverbutton2">Update Project Faculty</button>
        </form>
        <form action='./semester_registration_details_admin.php' method='POST'>
            <button type='submit' name='print-reg-card' value='print-reg-card' class="hoverbutton1">Registration Card</button>
        </form>

        <form action='./semester_registration_details_admin.php' method='POST'>
            <button type='submit' name='check-registration-status' value='check-registration-status' class="hoverbutton2">Registration Status</button>
        </form>

        <form action='./semester_registration_details_admin.php' method='POST'>
            <button type='submit' name='print-reg-card-mtech-cep-opt-out' value='print-reg-card-mtech-cep-opt-out' class="hoverbutton1">Registration Card (Mtech CEP - opt out cases)</button>
        </form>

        <form action='./semester_registration_details_selective_admin.php' method='POST'>
            <button type='submit' name='print-reg-card-selective' value='print-reg-card-selective' class="hoverbutton2">Registration Card (for selective student)</button>
        </form>

        <?php 

          if(strpos($_SERVER['REMOTE_ADDR'], "172.16.6.") === 0)
            {

        ?>

        <form action='./phdcw.php' method='POST'>
            <button type='submit' name='print-coursework-certificate' value='print-coursework-certificate' class="hoverbutton1">Coursework Certificate</button>
        </form>

        

        <form action='./provisional_grade_card.php' method='POST'>
            <button type='submit' name='provisional-grade-card' value='provisional_grade_card' class="hoverbutton2">Provisional Grade Card</button>
        </form>
        

         <form action='./grade_print_admin.php' method='POST'>
            <button type='submit' name='print-grade-details' value='print-grade-details' class="hoverbutton1">Print Grade Details</button>
        </form>
        <?php 

            }

        ?>

        <form action='./reg_admit_card_admin_staff.php' method='POST'>
            <button type='submit' name='student-admit-card' value='student-admit-card' class="hoverbutton2">Admit Card</button>
        </form>

        <form action='./reg_admit_card_admin_staff_selective.php' method='POST'>
            <button type='submit' name='student-admit-card' value='student-admit-card' class="hoverbutton1">Admit Card (Selective)</button>
        </form>

        <form action='./create_view.php' method='POST'>
            <button type='submit' name='create-view' value='create-view' class="hoverbutton2">Create Result View (DB)</button>
        </form>
        
      </div>
    </div>

     <div class="dropdown">
      <button class="dropbtn1">Updates & Search</button>
      <div class="dropdown-content">
        <form action='./updates.php' method='POST'>
            <button type='submit' name='comp-viva-update' value='comp-viva-update' class="hoverbutton1">Faculty Name & Email (Comp. Viva.)</button>
        </form>

        <form action='./student_list.php' method='POST'>
            <button type='submit' name='faculty-subject' value='faculty-subject' class="hoverbutton2">Search Student list by Faculty-Subject</button>
        </form>

        
         <form action='./add_subject.php' method='POST'>
            <button type='submit' name='add-subject' value='add-subject' class="hoverbutton1">Add Subject (B.Tech./M.Tech.)</button>
        </form>

        <form action='./reject_subject.php' method='POST'>
            <button type='submit' name='reject-subject' value='reject-subject' class="hoverbutton2">Reject Subject (B.Tech./M.Tech.)</button>
        </form>
        
        <form action='./registration_date.php' method='POST'>
            <button type='submit' name='registration-date' value='registration-date' class="hoverbutton1">Modify Registration Date</button>
        </form>


      </div>
    </div>


    <div class="dropdown">
      <button class="dropbtn2">Users Password Management</button>
      <div class="dropdown-content">

        <form action='./totp.php' method='POST'>
            <button type='submit' name='totp-check' value='totp-check' class="hoverbutton1">All Existing TOTP</button>
        </form>

        <form action='./reset_password_from_admin.php' method='POST'>
            <button type='submit' name='totp-check' value='totp-check' class="hoverbutton2">Reset Password</button>
        </form>
        
      </div>

    </div>

   <div class="dropdown">
      <button class="dropbtn1">User Settings</button>
      <div class="dropdown-content">
        <form action='./admin_dashboard.php' method='POST'>
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





