<?php ob_start(); ?>

<h3>Mes favoris</h3>
<div class="media-list" data="<?php $medias ?>">
    <?php foreach( $medias as $media ): ?>
        <a class="item" href="index.php?media=<?= $media['id']; ?>">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0"
                        src="http://www.youtube.com/embed/<?= $media['trailer_url']; ?>" >
                    </iframe>
                </div>
            </div>
            <div class="title"><?= $media['title']; ?></div>
            <div class="genre"><?= $media['genre_name']; ?></div>
        </a>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
