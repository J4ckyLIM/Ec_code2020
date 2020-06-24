<?php

/***************************
* ----- LOAD FAVS PAGE -----
***************************/

function favoritePage() {
  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $medias = Media::getUserFavoriteMedia($user_id);
  console_log($medias);
  require('view/mediaListView.php');
}