<?php
    session_start();



    include ('inc.php');
    include ('parts/header.php');
    include ('parts/navbar.php');

    $database = new dbHandler();
    $comment  = new Comment();

    $query = "SELECT * FROM products LIMIT 9";
    $products = $database->do_my_query($query);


?>

<div class="container-fluid">
    <div class="row">
        <div class="offset-md-5 col-md-4">
            <h1>CITRUS</h1>
        </div>    
    </div>
    <div class="row">
        <div class="col-sm-12 cover-img">
            <img src="img/img1.jpg" style="display: block;  margin-left: 0px; width: 100%;">
        </div>
    </div>
<hr>
</div>
<div class="container">
<div class="text-center">
    <h3>Products</h3>
</div>
<hr>
    <div class="row">

      <?php 
        foreach($products as $product){ 
      ?>
        
          <div class="col-sm-6 col-md-4">
            <div class="image">
             <img src="img/<?php echo $product->img; ?>" alt="..." class="img-responsive">
              <div class="text-center">
                <h3><?php echo $product->title; ?></h3>
                <hr>
                <p class="description"><?php echo $product->description; ?></p>

                <div class="coment">
                    <hr>
                    <h6><strong>Comments</strong></h6>
                    <hr>
                        <?php
                            $productComment = $comment->getCommentsForProduct($product->id);
                            if(!empty($productComment)){
                                foreach($productComment as $one){
                                   echo "<div class='description'>".$one->text."</div>";
                                   echo "<br>";
                                   echo "<div class='small float-right'>Posted by ".$one->name."</div><br>";
                                   echo "<hr>";
                                }
                            }else{
                                echo "<p>No comments for this product</p>";
                            }
                        ?>

                </div>
              </div>
              <button class="btn btn-primary" id="postCommentBtn" data-id = '<?php echo $product->id; ?>'>New comment</button>    
              <br>          
              <div class="form-group postComment<?php echo $product->id; ?>">
                <form action="processing/processingComment.php" method="POST">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Your name">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your email">
                    <textarea type="text" name="comment_text" id="comment_text" class="form-control" placeholder="Your comment" id="w3mission" rows="4" cols="50"></textarea>      
                    <input type="hidden" value="<?php echo $product->id; ?>" name="product_id">
                    <input type="submit" name="btnSubmit" id="btnSubmit" data-id = '<?php echo $product->id; ?>' value="Post comment" class="btn btn-success">      

                </form>
                </div>  
            </div>
        </div>
      <?php } ?>      
    </div>
</div>



















<?php
    include ('parts/footer.php');
?>