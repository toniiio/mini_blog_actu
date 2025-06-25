<?php

function updateComment(string $idComment, array $input)
{
    $comment = null;
    if (!empty($input['comment'])) {
        $comment = $input['comment'];
    } else {
        throw new Exception('Les données du formulaire sont invalides.');
    }
    $CommentRepository = new CommentRepository();
    $CommentRepository->connexion = new DatabaseConnection();
    $comments = $CommentRepository->updateComment($idComment, $comment);
    if (!$comments) {
        throw new Exception('Impossible de modifier le commentaire');
    } else {
        header('Location: index.php?');
    }
}
