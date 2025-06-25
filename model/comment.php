<?php

class Comment
{
    public string $id;
    public string $author;
    public string $frenchCreationDate;
    public string $comment;
}
class CommentRepository
{
    public DatabaseConnection $connexion;
    function getComments(string $identifier)
    {
        $reqStatement = $this->connexion->getConnection()->prepare(
            "SELECT id, author, comment,post_id, 
    DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = :post_id ORDER BY comment_date DESC"
        );
        $reqStatement->execute([
            'post_id' => $identifier,
        ]);

        $comments = [];
        $rowComments = $reqStatement->fetchAll();
        foreach ($rowComments as $rowComment) {
            $comment = new Comment();
            $comment->id = $rowComment['id'];
            $comment->author = $rowComment['author'];
            $comment->frenchCreationDate = $rowComment['french_creation_date'];
            $comment->comment = $rowComment['comment'];
            $comments[] = $comment;
        }

        return $comments;
    }
    function getComment(string $idComment)
    {
        $reqStatement = $this->connexion->getConnection()->prepare(
            "SELECT id,comment,post_id FROM comments where id=:idComment"
        );
        $reqStatement->execute(([
            'idComment' => $idComment,
        ]));
        $rowComment = $reqStatement->fetch();
        $comment = new Comment();
        $comment->id = $rowComment['id'];
        $comment->comment = $rowComment['comment'];
        return $comment;
    }

    function createComment(string $post, string $author, string $comment)
    {
        $reqStatement = $this->connexion->getConnection()->prepare("INSERT into comments(post_id,author,comment,comment_date) VALUES(
    :post_id,:author,:comment,:comment_date)");
        $affectedLines = $reqStatement->execute([
            'post_id' => $post,
            'author' => $author,
            'comment' => $comment,
            'comment_date' => date("Y-m-d"),
        ]);
        return ($affectedLines > 0);
    }
    function updateComment($idComment, $comment)
    {
        $reqStatement = $this->connexion->getConnection()->prepare("UPDATE comments set comment=:comment where id=:idComment");
        $affectedLines = $reqStatement->execute(([
            'comment' => $comment,
            'idComment' => $idComment,
        ]));
        return ($affectedLines > 0);
    }
}
