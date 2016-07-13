<?php
function redirect_user($page = '../index.php') {
  
  //Start defining the URL...
  //URL is http: plus the host name plus the current directory:
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
  
  //Remove any trailing slashes:
  $url = rtrim($url, '/\\');
  
  // Add the page:
  $url .= '/' . $page;
  
  // Redirect the user:
  header("Location: $url");
  exit(); // Quit the script.
}

/* This function validates the form data (the email address and password).
 * If both are present, the database is queried.
 * The function requires a database connection.
 * The function returns an array of information, including:
 * - a TRUE/FALSE variable indicating success
 * - an array of either errors or the database result
 */
function check_login($cnxn, $user = '', $pass = '') {
  
  $errors = array(); // Initialize error array.
  
  // Validate the email address:
  if(empty($user)) {
    $errors[] = 'You forgot to enter your username.';
  }
  else {
    $e = mysqli_real_escape_string($cnxn, trim($user));
    //$errors[] = $e;
  }
  
  // Validate the password:
  if(empty($pass)) {
    $errors[] = 'You forgot to enter your password.';
  }
  else {
    $p = mysqli_real_escape_string($cnxn, trim($pass));
    //$errors[] = $p;
  }
  
  if(empty($errors)) { // If everything's OK.
    
    // Retrieve the user and first_name for that user/password combination:
    $q = "SELECT username FROM users WHERE username='$e' AND password='$p'";
    $r = @mysqli_query($cnxn, $q); // Run the query.
    //$errors[] = $r;
    // Check the result:
    if(mysqli_num_rows($r) == 1) {
      
      // Fetch the record:
      $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
      
      // Return true and the record:
      return array(true, $row);
      
    }
    else { // Not a match!
      $errors[] = 'The username and password entered do not match those on file.';
    }
    
  } // End of empty($errors) IF.
  
  // Return false and the errors:
  return array(false, $errors);
}

// End of check_login() function.
?>