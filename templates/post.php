<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="../style/style.css" rel="stylesheet" />
</head>

<body>
    <h1>Le super blog de l'actu !</h1>
    <p><a href="index.php">Retour</a></p>
    <div class="news">
        <h3>
            <?= htmlspecialchars($Post->title); ?>
            <em>le <?= htmlspecialchars($Post->frenchCreationDate); ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($Post->content)); ?>
        </p>
    </div>
    <h2>Commentaires</h2>
    <?php
    foreach ($comments as $comment) {
    ?>
        <p><strong><?= htmlspecialchars($comment->author) ?></strong>
            (<a href="index.php?action=getComment&id=<?= $comment->id ?>">Modifier</a>) </p>
        <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
    <?php
    }
    ?>
    <h2>Ajout d'un commentaire</h2>
    <form action="index.php?action=addComment&id=<?= $Post->id ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author">
        </div>
        <div>
            <label for="comment">Commentaires</label><br />
            <textarea id="comment" name="comment" rows="5" cols="40"></textarea>
        </div>
        <div>
            <input type="submit" />
    </form>
</body>

</html>