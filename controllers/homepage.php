<?php
require_once('../model/post.php');

use Application\Model\Post\PostRepository;

function homepage()
{
   $PostRepository = new PostRepository();
   $PostRepository->connection = new DatabaseConnection();
   $Posts = $PostRepository->getPosts();
   require_once('../templates/homepage.php');
}
