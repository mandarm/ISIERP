<?php require_once("./includes/db.php"); 

require("./fpdf/fpdf.php");

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'INDIAN STATISTICAL INSTITUTE',1,1,'C');
    $this->Cell(30,10,'INDIAN STATISTICAL INSTITUTE',1,1,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


?>







<?php 


	if (isset($_POST['print_stud_list']) and $_POST['order_by']=='Subject') {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];
		$order_by=$_POST['order_by'];

		$sql = "SELECT DISTINCT subject_name,faculty_name FROM grades where course='$crs' and batch='$bt' and semester='$sem' order by subject_name";                           
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
		$pdf = new FPDF();

		while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {

			$faculty_name=$rec['faculty_name'];
			$subject_name=$rec['subject_name'];

		//-------------------Header Start--------------------------------------------------
		$pdf->AddPage();
		$pdf->SetFont("Arial","B",28);
		$pdf->Image('./includes/images/logo.png',10,8,20,25);
		$pdf->Cell(0,7,"      INDIAN STATISTICAL INSTITUTE",0,1,'C');
		$pdf->SetFont("Arial","",16);
		$pdf->Cell(0,9,"      203, B. T. Road, Kolkata - 700108",0,1,'C');

		$pdf->Cell(0,8,"",0,1,'C');
		$pdf->Cell(0,0,"",1,1,'C');
		$pdf->Cell(0,3,"",0,1,'C');

		$pdf->SetFont("Arial","B",16);
		$pdf->Cell(0,9,"STUDENT LIST",0,1,'C');

		$pdf->SetFont("Arial","",12);
		$pdf->Cell(0,5,"Course: ".$crs.",   Batch: ".$bt.",    Semester: ".$sem,0,1,'C');

		$pdf->SetFont("Arial","",12);
		$pdf->Cell(0,5,"Subject Name: ".$subject_name.",   Faculty Name: ".$faculty_name,0,1,'C');

		$pdf->Cell(0,5,"",0,1,'C');
		$pdf->Cell(0,0,"",1,1,'C');
		$pdf->Cell(0,3,"",0,1,'C');

		$pdf->Cell(10,7,"Sl.",1,0,'C');
		$pdf->Cell(30,7,"Roll No",1,0,'C');
		$pdf->Cell(55,7,"Name",1,0,'C');
		$pdf->Cell(20,7,"Stream",1,0,'C');
		$pdf->Cell(30,7,"Credit/NC",1,0,'C');
		$pdf->Cell(30,7,"Type",1,0,'C');
		$pdf->Cell(15,7,"Pool",1,1,'C');
		//$pdf->Cell(65,7,"Email",1,1,'C');

		//-------------------Header End--------------------------------------------------

		$sql1 = "SELECT * FROM grades where course='$crs' and batch='$bt' and semester='$sem' and subject_name='$subject_name' and registration_verification_status='APPROVED' order by roll_no";                           
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute();
        $i=1;
        while ($irec = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        	$j=$i-1;
        	if ($j % 30 == 0 and $i!=1) {
        		//-------------------Reprint Header after each 30 entry--------------------------------------------------
			$pdf->AddPage();
			$pdf->SetFont("Arial","B",28);
			$pdf->Image('./includes/images/logo.png',10,8,20,25);
			$pdf->Cell(0,7,"      INDIAN STATISTICAL INSTITUTE",0,1,'C');
			$pdf->SetFont("Arial","",16);
			$pdf->Cell(0,9,"      203, B. T. Road, Kolkata - 700108",0,1,'C');

			$pdf->Cell(0,8,"",0,1,'C');
			$pdf->Cell(0,0,"",1,1,'C');
			$pdf->Cell(0,3,"",0,1,'C');

			$pdf->SetFont("Arial","B",16);
			$pdf->Cell(0,9,"STUDENT LIST",0,1,'C');

			$pdf->SetFont("Arial","",12);
			$pdf->Cell(0,5,"Course: ".$crs.",   Batch: ".$bt.",    Semester: ".$sem,0,1,'C');

			$pdf->SetFont("Arial","",12);
			$pdf->Cell(0,5,"Subject Name: ".$subject_name.",   Faculty Name: ".$faculty_name,0,1,'C');

			$pdf->Cell(0,5,"",0,1,'C');
			$pdf->Cell(0,0,"",1,1,'C');
			$pdf->Cell(0,3,"",0,1,'C');

			$pdf->Cell(10,7,"Sl.",1,0,'C');
			$pdf->Cell(30,7,"Roll No",1,0,'C');
			$pdf->Cell(55,7,"Name",1,0,'C');
			$pdf->Cell(20,7,"Stream",1,0,'C');
			$pdf->Cell(30,7,"Credit/NC",1,0,'C');
			$pdf->Cell(30,7,"Type",1,0,'C');
			$pdf->Cell(15,7,"Pool",1,1,'C');
			//$pdf->Cell(65,7,"Email",1,1,'C');

		//-------------------Reprint Header end--------------------------------------------------
        	}





        	$stud_roll_no=$irec['roll_no'];
        	$stream=$irec['stream'];
        	$stud_name=$irec['student_name'];
        	$stud_email=$irec['student_email'];
        	$credit_course=$irec['credit_course'];


        	$pdf->Cell(10,7,$i,1,0,'C');
			$pdf->Cell(30,7,$stud_roll_no,1,0,'C');
			$pdf->Cell(55,7,$stud_name,1,0,'C');
			$pdf->Cell(20,7,$stream,1,0,'C');
			$pdf->Cell(30,7,$credit_course,1,0,'C');
			$pdf->Cell(30,7,$irec['subject_type'],1,0,'C');
			$pdf->Cell(15,7,$irec['pool'],1,1,'C');
			//$pdf->Cell(65,7,$stud_email,1,1,'C');


        	$i=$i+1;
        }


		}

		//**************************************Student Contact Details*****************************************************

			$pdf->AddPage();
			$pdf->SetFont("Arial","B",28);
			$pdf->Image('./includes/images/logo.png',10,8,20,25);
			$pdf->Cell(0,7,"      INDIAN STATISTICAL INSTITUTE",0,1,'C');
			$pdf->SetFont("Arial","",16);
			$pdf->Cell(0,9,"      203, B. T. Road, Kolkata - 700108",0,1,'C');

			$pdf->Cell(0,8,"",0,1,'C');
			$pdf->Cell(0,0,"",1,1,'C');
			$pdf->Cell(0,3,"",0,1,'C');

			$pdf->SetFont("Arial","B",16);
			$pdf->Cell(0,9,"STUDENT CONTACT DETAILS",0,1,'C');

			$pdf->SetFont("Arial","B",14);
			$pdf->Cell(0,9,"Course: ".$crs."          Batch: ".$bt ,0,1,'C');


			$pdf->SetFont("Arial","",10);
			
			$pdf->Cell(20,7,"Roll No",1,0,'C');
			$pdf->Cell(55,7,"Name",1,0,'C');
			$pdf->Cell(18,7,"Stream",1,0,'C');
			$pdf->Cell(28,7,"Mobile No",1,0,'C');
			
			$pdf->Cell(69,7,"Email",1,1,'C');
			

			$sql1 = "SELECT * FROM student where course='$crs' and batch='$bt' order by roll_no";                           
	        $stmt1 = $pdo->prepare($sql1);
	        $stmt1->execute();

	        while ($v = $stmt1->fetch(PDO::FETCH_ASSOC)) {
	        $pdf->SetFont("Arial","",10);
	        
			$pdf->Cell(20,7,$v['roll_no'],1,0,'C');
			$pdf->Cell(55,7,$v['full_name'],1,0,'C');
			$pdf->Cell(18,7,$v['stream'],1,0,'C');
			$pdf->Cell(28,7,$v['mob_no'],1,0,'C');
			
			$pdf->Cell(69,7,$v['email'],1,1,'C');
			//$pdf->SetFont("Arial","",12);
	        }



		//**************************************Student Contact Details*****************************************************



		$pdf->Output();

	}

?>























<?php 

	if (isset($_POST['print_stud_list']) and $_POST['order_by']=='Student') {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];
		$order_by=$_POST['order_by'];

		$sql = "SELECT DISTINCT roll_no,student_name,stream FROM grades where course='$crs' and batch='$bt' and semester='$sem' order by roll_no";                           
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
		$pdf = new FPDF();
		$nos=-1;
		while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$nos++;
			$student_name=$rec['student_name'];
			$student_roll=$rec['roll_no'];
			$stream=$rec['stream'];

		//-------------------Header Start--------------------------------------------------
		$pdf->AddPage();
		$pdf->SetFont("Arial","B",28);
		$pdf->Image('./includes/images/logo.png',10,8,20,25);
		$pdf->Cell(0,7,"      INDIAN STATISTICAL INSTITUTE",0,1,'C');
		$pdf->SetFont("Arial","",16);
		$pdf->Cell(0,9,"      203, B. T. Road, Kolkata - 700108",0,1,'C');

		$pdf->Cell(0,8,"",0,1,'C');
		$pdf->Cell(0,0,"",1,1,'C');
		$pdf->Cell(0,3,"",0,1,'C');

		$pdf->SetFont("Arial","B",16);
		$pdf->Cell(0,9,"STUDENT WISE SUBJECT LIST",0,1,'C');

		$pdf->SetFont("Arial","",12);
		$pdf->Cell(0,5,"Course: ".$crs."           Batch: ".$bt."            Semester: ".$sem,0,1,'C');

		$pdf->SetFont("Arial","",12);
		$pdf->Cell(0,5,"Student Name: ".$student_name."         Roll No.: ".$student_roll."           Stream: ".$stream,0,1,'C');

		$pdf->Cell(0,5,"",0,1,'C');
		$pdf->Cell(0,0,"",1,1,'C');
		$pdf->Cell(0,3,"",0,1,'C');

		$pdf->Cell(10,7,"Sl.",1,0,'C');
			$pdf->Cell(90,7,"Subject Name",1,0,'C');
			$pdf->Cell(50,7,"Subject Type",1,0,'C');
			$pdf->Cell(15,7,"Pool",1,0,'C');
			$pdf->Cell(25,7,"Credit/NC",1,1,'C');

		//-------------------Header End--------------------------------------------------

		$sql1 = "SELECT * FROM grades where course='$crs' and batch='$bt' and semester='$sem' and roll_no='$student_roll' and registration_verification_status='APPROVED' order by subject_type,pool,subject_name";                           
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute();
        $i=1;
        while ($irec = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        	
        	/*if ($nos % 3 == 0) {
        		//-------------------Reprint Header after each 30 entry--------------------------------------------------
			$pdf->AddPage();
			$pdf->SetFont("Arial","B",28);
			$pdf->Image('./includes/images/logo.png',10,8,20,25);
			$pdf->Cell(0,7,"      INDIAN STATISTICAL INSTITUTE",0,1,'C');
			$pdf->SetFont("Arial","",16);
			$pdf->Cell(0,9,"      203, B. T. Road, Kolkata - 700108",0,1,'C');

			$pdf->Cell(0,8,"",0,1,'C');
			$pdf->Cell(0,0,"",1,1,'C');
			$pdf->Cell(0,3,"",0,1,'C');

			$pdf->SetFont("Arial","B",16);
			$pdf->Cell(0,9,"STUDENT WISE SUBJECT LIST",0,1,'C');

			$pdf->SetFont("Arial","",12);
			$pdf->Cell(0,5,"Course: ".$crs.",   Batch: ".$bt.",    Semester: ".$sem,0,1,'C');

			$pdf->SetFont("Arial","",12);
			$pdf->Cell(0,5,"Student Name: ".$student_name.",   Roll No.: ".$student_roll."     Stream: ".$stream,0,1,'C');

			$pdf->Cell(0,5,"",0,1,'C');
			$pdf->Cell(0,0,"",1,1,'C');
			$pdf->Cell(0,3,"",0,1,'C');

			$pdf->Cell(10,7,"Sl.",1,0,'C');
			$pdf->Cell(90,7,"Subject Name",1,0,'C');
			$pdf->Cell(50,7,"Subject Type",1,0,'C');
			$pdf->Cell(15,7,"Pool",1,0,'C');
			$pdf->Cell(25,7,"Credit/NC",1,1,'C');

		//-------------------Reprint Header end--------------------------------------------------
        	}*/





        	$subject_name=$irec['subject_name'];
        	$subject_type=$irec['subject_type'];
        	$pool=$irec['pool'];
        	$credit_course=$irec['credit_course'];



        	$pdf->Cell(10,7,$i,1,0,'C');
			$pdf->Cell(90,7,$subject_name,1,0,'C');
			$pdf->Cell(50,7,$subject_type,1,0,'C');
			$pdf->Cell(15,7,$pool,1,0,'C');
			$pdf->Cell(25,7,$credit_course,1,1,'C');


        	$i=$i+1;
        }


		}

				//**************************************Student Contact Details*****************************************************

			$pdf->AddPage();
			$pdf->SetFont("Arial","B",28);
			$pdf->Image('./includes/images/logo.png',10,8,20,25);
			$pdf->Cell(0,7,"      INDIAN STATISTICAL INSTITUTE",0,1,'C');
			$pdf->SetFont("Arial","",16);
			$pdf->Cell(0,9,"      203, B. T. Road, Kolkata - 700108",0,1,'C');

			$pdf->Cell(0,8,"",0,1,'C');
			$pdf->Cell(0,0,"",1,1,'C');
			$pdf->Cell(0,3,"",0,1,'C');

			$pdf->SetFont("Arial","B",16);
			$pdf->Cell(0,9,"STUDENT CONTACT DETAILS",0,1,'C');

			$pdf->SetFont("Arial","B",14);
			$pdf->Cell(0,9,"Course: ".$crs."          Batch: ".$bt ,0,1,'C');


			$pdf->SetFont("Arial","",10);
			
			$pdf->Cell(20,7,"Roll No",1,0,'C');
			$pdf->Cell(55,7,"Name",1,0,'C');
			$pdf->Cell(18,7,"Stream",1,0,'C');
			$pdf->Cell(28,7,"Mobile No",1,0,'C');
			
			$pdf->Cell(69,7,"Email",1,1,'C');
			

			$sql1 = "SELECT * FROM student where course='$crs' and batch='$bt' order by roll_no";                           
	        $stmt1 = $pdo->prepare($sql1);
	        $stmt1->execute();

	        while ($v = $stmt1->fetch(PDO::FETCH_ASSOC)) {
	        $pdf->SetFont("Arial","",10);
	        
			$pdf->Cell(20,7,$v['roll_no'],1,0,'C');
			$pdf->Cell(55,7,$v['full_name'],1,0,'C');
			$pdf->Cell(18,7,$v['stream'],1,0,'C');
			$pdf->Cell(28,7,$v['mob_no'],1,0,'C');
			
			$pdf->Cell(69,7,$v['email'],1,1,'C');
			//$pdf->SetFont("Arial","",12);
	        }



		//**************************************Student Contact Details*****************************************************
		$pdf->Output();

	}

?>