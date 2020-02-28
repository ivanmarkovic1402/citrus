<?php
    session_start();

    if($_SESSION['user'] != 'admin'){

        header("Location: index.php");
    }
    
    include ('inc.php');
    include ('parts/header.php');
    include ('parts/navbar.php');

    $comment = new Comment();
    $comments = $comment->getAllcomments();

// var_dump($comments);
?>

<div class="container">
    <table class="table table-striped">
        <thead>
            <td>Posted by</td><td>Email</td><td>Comment</td><td>Approve</td><td>Delete</td>
        </thead>
        <tbody>
            <?php
                foreach($comments as $comment){
                    if($comment->approved == 0){
                        echo "<tr><td>".$comment->name."</td><td>".$comment->email."</td><td>".$comment->text."</td><td><button class='btn btn-success' id='btnApprove".$comment->id."' data-comment=".$comment->id.">Approve this comment</button></td><td><button class='btn btn-danger' id='btnDelete".$comment->id."' data-comment=".$comment->id." >Delete this comment</button></td><tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>
<?php
    include ('parts/footer.php');
?>

