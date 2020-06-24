<?php

/***************************
* ----- LOAD FAVS PAGE -----
***************************/

function favoritePage() {
  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
  $medias = Media::getUserFavoriteMedia($user_id);
  require('view/favoriteMediaListView.php');
}