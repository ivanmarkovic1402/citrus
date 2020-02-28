<?php


class Comment extends dbHandler
{
    public function getCommentsForProduct($product_id)
    {
        $query = "SELECT c.*   FROM comments c JOIN products p ON c.product_id = p.id WHERE product_id = :product_id AND approved = :approved";
        $params = [
            ':product_id' => $product_id,
            'approved'    => 1  
        ];
        $comments = $this->do_my_query($query, $params);
        return $comments;
    }

    public function postComment($product_id, $name, $email, $comment)
    {
        $query = "INSERT INTO comments (product_id, name, email, text) VALUES(:product_id, :name, :email, :text)";
        $params = [
            ':product_id' => $product_id,
            ':name'       => $name,
            ':email'      => $email,
            ':text'       => $comment    
        ];

        try{
            $this->do_my_query($query, $params);
        }catch(PDOException $e){
            $e->getMessage();
        }
        
    }

    public function getAllComments(){
        $query="SELECT * FROM comments";
        $comments = $this->do_my_query($query);
        return $comments;
    }

    public function approveComment($comment_id){
        $query = "UPDATE comments SET approved=:approved WHERE id=:id";
        $params = [
            ':id'       => $comment_id,
            ':approved' => 1,
        ];

        try{
            $this->do_my_query($query, $params);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function deleteComment($comment_id){
        $query = "DELETE FROM comments WHERE id=:id";
        $params = [
            ':id'       => $comment_id,
        ];

        try{
            $this->do_my_query($query, $params);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    
}



?>