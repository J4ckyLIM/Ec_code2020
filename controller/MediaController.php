<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {
  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $medias = Media::filterMedias($search);
  if(isset( $_GET['media'])){
    if(isset( $_POST['addToFav'])):
      try{
        Media::addMediaToFavorite($_GET['media'], $_SESSION['user_id']);
      }
      catch(Exception $e) {
        alert("Ce médias est déjà dans vos favoris");
        showMedia($_GET['media']);
      }
    else:
      showMedia($_GET['media']);
    endif;
  }
  else {
    require('view/mediaListView.php');
  }
}

function showMedia($id) {
  $media = Media::getMediaById($id);
  require("view/mediaDetails.php");
}


function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

function alert( $data ){
  echo '<script>';
  echo 'alert('. json_encode( $data ) .')';
  echo '</script>';
}