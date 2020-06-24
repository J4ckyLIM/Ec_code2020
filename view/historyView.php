<?php ob_start(); ?>

<h3 class="ml-4">Mon historique</h3>
<div class="media-list" data="<?php $medias ?>">
    <?php foreach( $medias as $media ): ?>
    <div class="row ml-4 mt-4">
        <!--<div class="col">
            <iframe allowfullscreen="" frameborder="0"
                src="http://www.youtube.com/embed/<?= $media['trailer_url']; ?>" >
            </iframe>
        </div>-->
        <iframe allowfullscreen="" frameborder="0"
                src="http://www.youtube.com/embed/<?= $media['trailer_url']; ?>" >
            </iframe>
        <div class="col">
            <h4><?= $media['title']; ?></h4>
            <span><?= $media['summary']; ?></span>
        </div>
        <div class="col d-flex d-flex align-items-center justify-content-center">
            <form method="post">
                <input type="hidden" value="<?= $media['id'] ?>" name="mediaId">
                <input type="submit" value="Supprimer de l'historique" name="deleteFromFav" id="addToFavBtn" class="btn btn-dark mr-2">
            </form>
        </div>
    </div>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
