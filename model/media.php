<?php

require_once( 'database.php' );

class Media {

  protected $id;
  protected $genre_id;
  protected $title;
  protected $type;
  protected $status;
  protected $release_date;
  protected $summary;
  protected $trailer_url;

  public function __construct( $media ) {

    $this->setId( isset( $media->id ) ? $media->id : null );
    $this->setGenreId( $media->genre_id );
    $this->setTitle( $media->title );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setGenreId( $genre_id ) {
    $this->genre_id = $genre_id;
  }

  public function setTitle( $title ) {
    $this->title = $title;
  }

  public function setType( $type ) {
    $this->type = $type;
  }

  public function setStatus( $status ) {
    $this->status = $status;
  }

  public function setReleaseDate( $release_date ) {
    $this->release_date = $release_date;
  }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getGenreId() {
    return $this->genre_id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getType() {
    return $this->type;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getReleaseDate() {
    return $this->release_date;
  }

  public function getSummary() {
    return $this->summary;
  }

  public function getTrailerUrl() {
    return $this->trailer_url;
  }

  /***************************
  * -------- GET LIST --------
  ***************************/

  public static function filterMedias( $title ) {

    // Open database connection
    $db   = init_db(); 
    $sql  = ""; // Will store our SQL query
    if(empty($title)){
      $sql = "SELECT * , genre.name as genre_name FROM media JOIN genre ON media.genre_id = genre.id";
    }
    else {
      $sql = 'SELECT *, genre.name as genre_name, type.name as type_name FROM media JOIN type ON media.type_id  = type.id JOIN genre ON media.genre_id = genre.id WHERE title LIKE "%'.$title.'%" ORDER BY release_date DESC';
    }
    $req  = $db->prepare($sql);
    $req->execute();
    // Close databse connection
    $db   = null;

    return $req->fetchAll();

  }

  public static function getMediaById( $id ) {
    $db   = init_db();

    $req  = $db->prepare("SELECT *,  genre.name as genre_name , type.name as type_name FROM media JOIN type ON media.type_id  = type.id JOIN genre ON media.genre_id = genre.id WHERE media.id = ?");
    $req->execute( array( $id ));
    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

  /**
   * Add a media to favorit list for a user
   * @param {Number} mediaId id of the media
   * @param {Number} userId id of the user
   */
  public function addMediaToFavorite($mediaId, $userId){
    $db   = init_db();

    // Check if relation already exist
    $req  = $db->prepare( "SELECT * FROM user_favorite_media WHERE user_id = $userId AND media_id = $mediaId" );
    $req->execute();

    if( $req->rowCount() > 0 ) throw new Exception( "Déjà ajouté aux favoris" );

    $req  = $db->prepare("INSERT INTO user_favorite_media ( user_id, media_id ) VALUES ( :user_id, :media_id)");
    $req->execute( array(
      'user_id' => $userId,
      'media_id' => $mediaId
    ));

    // Close databse connection
    $db   = null;
  }

  /**
   * Fetch all the media the user has in favorit list
   * @param {Number} userId id of the user
   */
  public function getUserFavoriteMedia( $userId ){
    $db   = init_db();

    $req  = $db->prepare("SELECT * from media JOIN user_favorite_media ON media.id = user_favorite_media.media_id WHERE user_favorite_media.user_id = $userId ");
    $req->execute();
    // Close databse connection
    $db   = null;

    return $req->fetchAll();
  }
}
