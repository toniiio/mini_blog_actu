<?php

function addComment(string $post, array $input)
{
    $author = null;
    $comment = null;
    if (!empty($input['author']) && !empty($input['comment'])) {
        $author = $input['author'];
        $comment = $input['comment'];
    } else {
        throw new Exception('Les données du formulaire sont invalides.');
    }
    $CommentRepository = new CommentRepository();
    $CommentRepository->connexion = new DatabaseConnection();
    $success = $CommentRepository->createComment($post, $author, $comment);
    if (!$success) {
        throw new Exception('Impossible d\'ajouter le commentaire');
    } else {
        header('Location: index.php?action=post&id=' . $post);
    }
}
