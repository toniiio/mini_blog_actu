<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="../style/style.css" rel="stylesheet" />
</head>

<body>
    <h1>Le super blog de l'AVBN !</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>
    <h2>Modifier un commentaire</h2>
    <form action="index.php?action=updateComment&id=<?= $comment->id ?>" method="post">
        <div>
            <label for="comment">Commentaires</label><br />
            <textarea id="comment" name="comment" rows="5" cols="40"><?= $comment->comment ?></textarea>
        </div>
        <div>
            <input type="submit" />
    </form>
</body>

</html>