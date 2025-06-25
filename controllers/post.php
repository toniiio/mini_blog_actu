<?php
require_once('../model/database.php');
require_once('../model/post.php');
require_once('../model/comment.php');

use Application\Model\Post\PostRepository;

function post(string $identifier)
{
   $PostRepository = new PostRepository();
   $PostRepository->connection = new DatabaseConnection();
   $CommentRepository = new CommentRepository();
   $CommentRepository->connexion = new DatabaseConnection();
   $Post =  $PostRepository->getPost($identifier);
   $comments = $CommentRepository->getComments($identifier);
   require_once('../templates/post.php');
}
