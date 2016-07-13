<?php
# Login.php
// This page processes the login form submission.
// Upon successful login, the user is redirected.
// Two included files are necessary.
// Send NOTHING to the Web browser prior to the setcookie() lines!

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// For processing the login:
	require ('login/loginfunction.php');
	
	// Need the database connection:
	require ('../db.php');
		
	// Check the login:
	list ($check, $data) = check_login($cnxn, $_POST['user'], $_POST['pass']);
	
	if ($check) { // OK!
		
		// Set the cookies:
		setcookie ('user', $data['user']);
		//setcookie ('first_name', $data['first_name']);
		//set sesssions
        $_SESSION['username'] = $_POST['user'];
		// Redirect:
		redirect_user('index.php');
			
	} else { // Unsuccessful!

		// Assign $data to $errors for error reporting
		// in the login_page.inc.php file.
		$errors = $data;

	}
		
	mysqli_close($cnxn); // Close the database connection.

} // End of the main submit conditional.

// Create the page:
include ('login/login.php');
?>