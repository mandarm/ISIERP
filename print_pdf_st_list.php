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

	if (isset($_POST['chk_stud_list'])) {
		$bt=$_POST['bt'];
		$crs=$_POST['crs'];
		$sem=$_POST['sem'];
		$faculty_name=$_POST['faculty_name'];
		$faculty_email=$_POST['faculty_email'];
		$subject_name=$_POST['subject_name'];

		/*$sql = "SELECT DISTINCT subject_name,faculty_name FROM grades where course='$crs' and batch='$bt' and semester='$sem' and faculty_email='$faculty_email' order by subject_name";                           
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
		$pdf = new FPDF();

		while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {

			$faculty_name=$rec['faculty_name'];
			$subject_name=$rec['subject_name'];*/

		//-------------------Header Start--------------------------------------------------
		$pdf = new FPDF();
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
		$pdf->Cell(30,7,"Credit/NC",1,0,'C');
		$pdf->Cell(65,7,"Email",1,1,'C');

		//-------------------Header End--------------------------------------------------

		$sql1 = "SELECT * FROM grades where course='$crs' and batch='$bt' and semester='$sem' and subject_name='$subject_name' and faculty_email='$faculty_email' order by subject_name";   
		//echo $sql1;                        
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
			$pdf->Cell(30,7,"Credit/NC",1,0,'C');
			$pdf->Cell(65,7,"Email",1,1,'C');

		//-------------------Reprint Header end--------------------------------------------------
        	}





        	$stud_roll_no=$irec['roll_no'];
        	$stud_name=$irec['student_name'];
        	$stud_email=$irec['student_email'];
        	$credit_course=$irec['credit_course'];


        	$pdf->Cell(10,7,$i,1,0,'C');
			$pdf->Cell(30,7,$stud_roll_no,1,0,'C');
			$pdf->Cell(55,7,$stud_name,1,0,'C');
			$pdf->Cell(30,7,$credit_course,1,0,'C');
			$pdf->Cell(65,7,$stud_email,1,1,'C');


        	$i=$i+1;
        }


		//}


		$pdf->Output();

	}

?>