<?php

/***************************
* --- LOAD HISTORY PAGE ----
***************************/

function historyPage() {
  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
  if(isset($_POST['deleteFromFav'])):
    Media::deleteMediaFromHistory($_POST['mediaId'] , $_SESSION['user_id']);
  endif;
  $medias = Media::getUserHistory($user_id);
  require('view/historyView.php');
}