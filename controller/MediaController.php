<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

// In mediaListView id isn't used with id but with 0 --> $media['0'] since I got issue with duplicate id (cf console_log)
function mediaPage() {
  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $medias = Media::filterMedias($search);
  $films = Media::getAllMediaByType(1); // Since 1 = films And 2 = series
  $series = Media::getAllMediaByType(2);
  console_log($series);
  console_log($films);
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
      // Since user clicks on a media it automatically adds it to his history
      // Can't retrieve the watch duration for now so I use rand to fake data
      try {
        Media::addMediaToUserHistory($_SESSION['user_id'], $_GET['media'], date("Y-m-d"), null, rand(10, 120));
      }
      catch(Exception $e) {
        // Load media anyway
        showMedia($_GET['media']);
      }
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