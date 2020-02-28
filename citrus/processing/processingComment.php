<?php

    require_once('../inc.php');

    $comment = new Comment();
    if(isset($_POST['product_id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment_text'])){
        $comment->postComment($_POST['product_id'],$_POST['name'], $_POST['email'], $_POST['comment_text']);
        header("Location: ../index.php");
    }

    if(isset($_POST['comment_id']) && (isset($_POST['action']) && $_POST['action'] == 'approve')){
        $comment->approveComment($_POST['comment_id']);
        header("Location: ../index.php");
    }

    if(isset($_POST['comment_id']) && (isset($_POST['action']) && $_POST['action'] == 'delete' )){
        $comment->deleteComment($_POST['comment_id']);
        header("Location: ../index.php");
    }

?>