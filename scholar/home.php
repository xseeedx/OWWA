<?php
require_once("../include/initialize.php");


	$id =  $_SESSION['USERID'];
	$student = new Student();
	$singlestudent = $student->single_student_userid($id); 
	$accountID = $singlestudent->scholar_id;


?>
		<?php 
	

		// $mydb->setQuery("SELECT * from FROM scholar_info WHERE user_id = $id;");
		// $account = $mydb->loadSingleResult();
		// $accountID = $account->scholar_id;
		// echo "Account ID: " . $accountID . "<br>";


		$mydb->setQuery("SELECT scholar_id, ABS((COUNT(*) - COUNT(NULLIF(firstname, '')) - COUNT(NULLIF(middlename, '')) - COUNT(NULLIF(lastname, '')) - COUNT(NULLIF(suffix, '')) 
		- COUNT(NULLIF(age, '')) - COUNT(NULLIF(gender, '')) - COUNT(NULLIF(address, '')) - COUNT(NULLIF(presentaddress, '')) - COUNT(NULLIF(birthdate, '')) - COUNT(NULLIF(email, ''))
		- COUNT(NULLIF(phone_num, '')) - COUNT(NULLIF(telephone_number, '')) - COUNT(NULLIF(religion, '')) - COUNT(NULLIF(citizenship, '')) - COUNT(NULLIF(OFW_firstname, '')) 
		- COUNT(NULLIF(OFW_middlename, '')) - COUNT(NULLIF(OFW_lastname, '')) - COUNT(NULLIF(OFW_suffix, '')) 
		- COUNT(NULLIF(OFW_relationship, '')) - COUNT(NULLIF(category, '')) - COUNT(NULLIF(school, '')) - COUNT(NULLIF(school_address, '')) - COUNT(NULLIF(program, '')) 
		- COUNT(NULLIF(number_siblings, '')) - COUNT(NULLIF(fatherstatus, '')) - COUNT(NULLIF(father_fname, '')) - COUNT(NULLIF(father_mname, '')) - COUNT(NULLIF(father_lname, '')) 
		- COUNT(NULLIF(father_suffix, '')) - COUNT(NULLIF(father_occupation, '')) - COUNT(NULLIF(father_contactnum, '')) - COUNT(NULLIF(Father_Educ, '')) - COUNT(NULLIF(father_email, '')) 
		- COUNT(NULLIF(motherstatus, '')) - COUNT(NULLIF(mother_fname, '')) - COUNT(NULLIF(mother_mname, '')) - COUNT(NULLIF(mother_lname, '')) - COUNT(NULLIF(mother_suffix, '')) 
		- COUNT(NULLIF(mother_occupation, '')) - COUNT(NULLIF(mother_contactnum, '')) - COUNT(NULLIF(mother_email, '')) - COUNT(NULLIF(mother_Educ, '')) - COUNT(NULLIF(Course, '')) 
		- COUNT(NULLIF(year_level, '')) - COUNT(NULLIF(primary_school, '')) - COUNT(NULLIF(primary_year_from, '')) - COUNT(NULLIF(primary_year_to, '')) - COUNT(NULLIF(primary_award, '')) 
		- COUNT(NULLIF(secondary_school, '')) - COUNT(NULLIF(secondary_year_from, '')) - COUNT(NULLIF(secondary_year_to, '')) - COUNT(NULLIF(secondary_award, '')) - COUNT(NULLIF(tertiary_school, '')) 
		- COUNT(NULLIF(tertiary_year_from, '')) - COUNT(NULLIF(tertiary_year_to, '')) - COUNT(NULLIF(tertiary_award, '')) - COUNT(NULLIF(remarks, '')) - COUNT(NULLIF(graduate, '')) 
		- COUNT(NULLIF(graduated_at, ''))) / 59 * 100) AS PercentageFilled
		FROM scholar_info
		WHERE scholar_id = $accountID;
		");
		
		$result = $mydb->loadSingleResult();
		
		if ($result) {
			echo "Scholar Personal Information". "<br>";
			echo  $result->PercentageFilled . "% Complete";
		} else {
			echo "No record found.";
		}
		
			?>

<canvas id="chartCanvas" width="200" height="200"></canvas>
<script>
	var canvas = document.getElementById("chartCanvas");
var ctx = canvas.getContext("2d");

var percentageFilled = <?php echo $result->PercentageFilled; ?>;
var currentAngle = 0;
var startAngle = -Math.PI / 2;
var angleIncrement = 0.05; // Adjust the value to increase/decrease animation speed

function drawChart() {
  // Clear the canvas
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Draw the background circle
  ctx.beginPath();
  ctx.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2 - 10, 0, 2 * Math.PI);
  ctx.lineWidth = 10;
  ctx.strokeStyle = "#f2f2f2";
  ctx.stroke();

  // Draw the filled arc
  ctx.beginPath();
  ctx.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2 - 10, startAngle, currentAngle);
  ctx.lineWidth = 10;
  ctx.strokeStyle = "#007bff";
  ctx.stroke();

  // Draw the text
  ctx.fillStyle = "#333";
  ctx.font = "bold 24px Arial";
  ctx.textAlign = "center";
  ctx.textBaseline = "middle";
  ctx.fillText(percentageFilled.toFixed(2) + "%", canvas.width / 2, canvas.height / 2);

  // Animate the chart
  if (currentAngle < (2 * Math.PI * percentageFilled) / 100 + startAngle) {
    currentAngle += angleIncrement;
    requestAnimationFrame(drawChart);
  }
}

// Start the animation
drawChart();


</script>