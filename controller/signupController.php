<?php

require_once( 'model/user.php' );
require_once( 'loginController.php' );

/****************************
* ----- LOAD SIGNUP PAGE -----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( !$user->id ):
    require('view/auth/signupView.php');
  else:
    require('view/homeView.php');
  endif;

}

/***************************
* ----- SIGNUP FUNCTION -----
***************************/

// Check if the user has click on the validate button 
if(isset($_POST['Valider']) && $_POST['Valider'] == 'Valider'){
  signupUser();
}

/**
 * This function register the user in our database
 */
function signupUser() {
  // Check if the user sent something
  $valid = true;
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_confirm'];

  if(empty($email)){
    $valid = false;
    $error_msg = "Veuillez saisir un email";
  }
  if(empty($password)){
    $valid = false;
    $error_msg = "Veuillez saisir un mot de passe";
  }
  if(empty($password_confirm)){
    $valid = false;
    $error_msg = "Veuillez confirmer le mot de passe";
  }
  if($password != $password_confirm) {
    $valid = false;
    $error_msg = "Les mots de passe ne concordent pas";
  }
  if($valid) {
    $hash = hash('sha256', $password);
    $user = new User();
    $user->setEmail($email);
    $user->setPassword($hash);
    $user->createUser();
    // Once the user is created redirect him to login page
    loginPage();
  }
  else {
    $error_msg = "Le formulaire n'est pas rempli";
  }
}