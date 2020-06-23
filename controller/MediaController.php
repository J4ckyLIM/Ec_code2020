<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {
  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $medias = Media::filterMedias($search);
  require('view/mediaListView.php');
}

if(isset( $_GET['media'])){
  showMedia($_GET['media']);
}

function showMedia($id) {
  console_log($id);
  //require("view/mediaDetails.php");
}


function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}