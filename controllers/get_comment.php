<?php
require_once('../model/database.php');
require_once('../model/comment.php');

function getComment(string $idComment)
{
    $CommentRepository = new CommentRepository();
    $CommentRepository->connexion = new DatabaseConnection();
    $comment = $CommentRepository->getComment($idComment);
    require_once('../templates/comment.php');
}
