<?php

namespace Application\Model\Post;

require_once('database.php');
class Post
{
   public string $id;
   public string $title;
   public string $content;
   public string $frenchCreationDate;
}
class PostRepository
{
   public \DatabaseConnection $connection;

   function getPosts()
   {
      $reqStatement = $this->connection->getConnection()->prepare("SELECT id,title,content,DATE_FORMAT(date,'%d/%m/%Y à %Hh%mmin%ss') 
      as french_creation_date FROM Posts ORDER BY date DESC LIMIT 0,5");
      $reqStatement->execute();
      $rowPost = $reqStatement->fetchAll();
      $Posts = [];
      foreach ($rowPost as $postss) {
         $post = new Post();
         $post->id = $postss['id'];
         $post->title = $postss['title'];
         $post->content = $postss['content'];
         $post->frenchCreationDate = $postss['french_creation_date'];
         $Posts[] = $post;
      }

      return $Posts;
   }

   function getPost(string $id)
   {
      $reqStatement = $this->connection->getConnection()->prepare("SELECT id,title,content,DATE_FORMAT(date,'%d/%m/%Y à %Hh%mmin%ss') 
      as french_creation_date FROM Posts WHERE id = :id ");
      $reqStatement->execute([
         'id' => $id,
      ]);
      $rowPost = $reqStatement->fetch();
      $post = new Post();
      $post->id = $rowPost['id'];
      $post->title = $rowPost['title'];
      $post->content = $rowPost['content'];
      $post->frenchCreationDate = $rowPost['french_creation_date'];
      return $post;
   }
}
