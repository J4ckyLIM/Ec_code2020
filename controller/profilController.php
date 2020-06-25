<?php

require_once( 'model/user.php' );

/***************************
* ---- LOAD PROFIL PAGE ----
***************************/

function profilPage() {
  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
  if($user_id){
    $user = User::getUserById($user_id);
    if(isset($_POST['Valider'])) {
      updateProfil($user);
      // Update current user data
      $user = User::getUserById($user_id);
    }
    require('view/profilView.php');
  }
  else {
    require('view/homeView.php');
  }
}


function updateProfil($user) {
  if(isset($_POST['email']) && !empty($_POST['email'])):
    if(isset($_POST['actual_password']) && !empty($_POST['actual_password']) 
    && isset($_POST['new_password']) && !empty($_POST['new_password']) 
    && isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])):
      $pass = hash('sha256',$_POST['actual_password']);
      if($pass == $user['password'] && $_POST['new_password'] == $_POST['confirm_password']):
        User::updateUserInfo($user['id'], $_POST['email'], $_POST['new_password']);
        $success_msg = "Mise à jour des informations avec succès";
        require('view/profilView.php');
      else:
        $error_msg = "Problème de mot de passe";
      endif;
    endif;
    User::updateUserInfo($user['id'], $_POST['email'], $user['password']);
  else:
    if(isset($_POST['actual_password']) && !empty($_POST['actual_password']) 
    && isset($_POST['new_password']) && !empty($_POST['new_password']) 
    && isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])):
      $pass = hash('sha256',$_POST['actual_password']);
      if($pass == $user['password'] && $_POST['new_password'] == $_POST['confirm_password']):
        User::updateUserInfo($user['id'], $user['email'], $_POST['new_password']);
        $user = User::getUserById($user['id']);
        $success_msg = "Mise à jour des informations avec succès";
      else:
        $error_msg = "Problème de mot de passe";
      endif;
    endif;
  endif;
}