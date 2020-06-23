<?php ob_start(); ?>

<div class="row">
    <div class="col-md-4">
        <h3><?= $media['title'] ?></h3>
    </div>
    <div class="col d-flex justify-content-end">
        <div>
            <a href="/Ec_code2020" class="btn btn-dark">X</a>
        </div>
        
    </div>
</div>

<div class="col mt-4">
    <div class="row mt-4">
        <div class="col mt-2">
            <span id="media_genre" class="row"><?= $media['genre_id']?> <?= $media['type']?></span>
            <p class="row" id="media_duration"><?= $media['duration']?></p>
            <p class="row">Date de réalisation: <?= $media['release_date']?></p>
        </div>
        <span><?= $media['summary']?></span>
        <p></p>
    </div>
    <div class="row video mt-4">
        <iframe allowfullscreen="true" frameborder="0" width="100%" 
            src="<?= $media['trailer_url']; ?>" ></iframe>
    </div>
    
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
