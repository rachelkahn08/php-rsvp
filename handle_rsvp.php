<?php 
	
$requiredInputs = array('firstNameInput', 'lastNameInput', 'emailInput', 'phoneNumberInput', 'drinkInput', 'commentsInput');
$allSubmitted = 0;	
$incompleteField = false;

foreach($requiredInputs as $inputField) {
	if (!empty($_POST[$inputField])) {
		$allSubmitted++;
	} else {
		$incompleteField = true;
		echo "Invalid input at ".$inputField.". Please enter your information.";
	}
}

if ($allSubmitted = count($requiredInputs) && $incompleteField != true) {
	echo "Thank you for your RSVP!";
	$postData = implode(" , ", $_POST)."\n";	
	$fileName = "guests.csv";
	$writeData = fopen($fileName, "a+");
	fwrite($writeData, $postData);
	fclose($writeData);
	$shareThis = $_POST["firstNameInput"]." ".$_POST["lastNameInput"]." RSVP'ed to your event! (And Rachel Kahn wrote this php script!)";
	mail("rkahn08@gmail.com", "You got an RSVP!", $shareThis);
}

	
?>
