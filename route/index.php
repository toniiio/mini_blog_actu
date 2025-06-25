<?php

require_once('../controllers/homepage.php');
require_once('../controllers/post.php');
require_once('../controllers/add_comment.php');
require_once('../controllers/get_comment.php');
require_once('../controllers/update_comment.php');

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                post($identifier);
            } else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');

                die;
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                addComment($identifier, $_POST);
            } else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        } else if ($_GET['action'] === 'getComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $idComment = $_GET['id'];
                getComment($idComment);
            } else {
                throw new Exception('Erreur: impossible d`\acceder ce commentaire');
            }
        } else if ($_GET['action'] === 'updateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $idComment = $_GET['id'];
                updateComment($idComment, $_POST);
            } else {
                throw new Exception('Erreur: impossible de modifier ce commentaire');
            }
        } else {
            throw new Exception("Erreur 404 : la page que vous recherchez n'existe pas.");
        }
    } else {
        homepage();
    }
} catch (Exception $e) {
    echo 'Erreur :' . $e->getMessage();
    // $Message = $e->getMessage();

}
