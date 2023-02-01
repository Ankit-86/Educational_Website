<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php 
	//For first question, pscore will not be there.
	if(!isset($_SESSION['pscore'])){
		$_SESSION['pscore'] = 0;
	}
 if($_POST){
	//We need total question in process file too
 	$query = "SELECT * FROM phyquestions";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
	
	//We need to capture the question number from where form was submitted
 	$number = $_POST['number'];
	
	//Here we are storing the selected option by user
 	$selected_choice = $_POST['choice'];
	
	//What will be the next question number
 	$next = $number+1;
	
	//Determine the correct choice for current question
 	$query = "SELECT * FROM phyoptions WHERE question_number = $number AND is_correct = 1";
 	 $result = mysqli_query($connection,$query);
 	 $row = mysqli_fetch_assoc($result);

 	 $correct_choice = $row['id'];
	
	//Increase the pscore if selected cohice is correct
 	 if($selected_choice == $correct_choice){
 	 	$_SESSION['pscore']++;
 	 }
		//Redirect to next question or final score page. 
 	 if($number == $total_questions){
 	 	header("LOCATION: phyfinal.php");
 	 }else{
 	 	header("LOCATION: phy_question.php?n=". $next);
 	 }

 }
?>