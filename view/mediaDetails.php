<?php ob_start(); ?>

<div class="row">
    <div class="col-md-4">
        <h3><?= $media['title'] ?></h3>
    </div>
    <div class="col d-flex justify-content-end">
        <div class="row mr-2">
            <form method="post">
                <input type="submit" value="Ajouter au favoris" name="addToFav" id="addToFavBtn" class="btn btn-dark mr-2">
                <a href="/Ec_code2020" class="btn btn-dark">X</a>
            </form>
        </div>
        
    </div>
</div>

<div class="col mt-4">
    <div class="row mt-4">
        <div class="col mt-2">
            <span id="media_genre" class="row"><?= $media['type_name']?>: <?= $media['genre_name']?></span>
            <p class="row" id="media_duration"><?= $media['duration']?></p>
            <p class="row">Date de réalisation: <?= $media['release_date']?></p>
        </div>
        <span><?= $media['summary']?></span>
        <p></p>
    </div>
    <div class="row video mt-4 video_detail">
        <iframe width="100%" src="http://www.youtube.com/embed/<?= $media['trailer_url']; ?>?autoplay=1" 
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>
    </div>
    
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
