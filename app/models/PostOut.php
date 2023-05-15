<?php
class PostOut {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getPosts(){
        $this->db->query('SELECT *,
                         posts.id as postId,
                         registered_users.User_Id as userId,
                         posts.created_at as postCreated,
                        posts.image as postImage                
          
                        FROM posts
                        INNER JOIN registered_users
                        ON posts.user_id = registered_users.User_Id
                        ORDER BY posts.created_at DESC
                        ');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getPostById($id){
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;
    }


    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);


        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

//posts interaction part starts here


    public function incLikes($id) {
        $this->db->query('UPDATE posts SET likes = likes + 1 WHERE id = :post_id');
        $this->db->bind(':post_id', $id);

        if($this->db->execute()) {
            return $this->getLikes($id);
        }
        else {
            return false;
        }

    }
    public function decLikes($id) {
        $this->db->query('UPDATE posts SET likes = likes - 1 WHERE id = :post_id');
        $this->db->bind(':post_id', $id);

        if($this->db->execute()) {
            return $this->getLikes($id);
        }
        else {
            return false;
        }

    }


    public function getLikes($id) {
        $this->db->query('SELECT likes FROM posts WHERE id = :post_id');
        $this->db->bind(':post_id', $id);

        $row = $this->db->single();
        return $row;
    }



    public function incDislikes($id) {
        $this->db->query('UPDATE posts SET dislikes = dislikes + 1 WHERE id = :post_id');
        $this->db->bind(':post_id', $id);

        if($this->db->execute()) {
            return $this->getDislikes($id);
        }
        else {
            return false;
        }

    }
    public function decDislikes($id) {
        $this->db->query('UPDATE posts SET dislikes = dislikes - 1 WHERE id = :post_id');
        $this->db->bind(':post_id', $id);

        if($this->db->execute()) {
            return $this->getDislikes($id);
        }
        else {
            return false;
        }

    }


    public function getDislikes($id) {
        $this->db->query('SELECT dislikes FROM posts WHERE id = :post_id');
        $this->db->bind(':post_id', $id);

        $row = $this->db->single();
        return $row;
    }

//posts likes and dislikes interactions
    public function addPostInteraction($post_id, $user_id, $interaction)
    {
        $this->db->query('INSERT INTO postsInteractions(post_id, user_id, interaction) VALUES(:post_id, :user_id, :interaction)');
        $this->db->bind(':post_id', $post_id);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':interaction', $interaction);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function setPostInteraction($post_id, $user_id, $interaction)
    {
        $this->db->query('UPDATE postsInteractions SET interaction = :interaction WHERE post_id = :post_id AND user_id = :user_id');
        $this->db->bind(':interaction', $interaction);
        $this->db->bind(':post_id', $post_id);
        $this->db->bind(':user_id', $user_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostInteraction($post_id, $user_id)
    {
        $this->db->query('SELECT * FROM postsInteractions WHERE post_id = :post_id AND user_id = :user_id');
        $this->db->bind(':post_id', $post_id);
        $this->db->bind(':user_id', $user_id);

        $row = $this->db->single();
        return $row;

    }


    public function isPostInteractionExist($post_id, $user_id)
    {
        $this->db->query('SELECT * FROM postsInteractions WHERE post_id = :post_id AND user_id = :user_id');
        $this->db->bind(':post_id', $post_id);
        $this->db->bind(':user_id', $user_id);

        $results = $this->db->single();

        $results = $this->db->rowCount();

        if ($results > 0) {
            return true;
        } else {
            return false;
        }
    }
}
