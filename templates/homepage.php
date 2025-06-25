<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="../style/style.css" rel="stylesheet" />
    <link rel="icon" href="image/news.png" />
</head>

<body>
    <?php $title = "Le blog de L'Actu" ?>
    <?php ob_start(); ?>
    <h1>Le super blog de l'actu !</h1>
    <?php
    foreach ($Posts as $post) {
    ?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($post->title); ?>
            </h3>
            <p>
                <?= nl2br(htmlspecialchars($post->content));
                ?>
                <br />
                <em><a href="index.php?action=post&id=<?= urlencode($post->id) ?>">Commentaires</a></em>
            </p>
        </div>
    <?php
    } // The end of the posts loop.
    ?>
    <?php $content = ob_get_clean(); ?>
    <?php require('layout.php') ?>
</body>

</html>