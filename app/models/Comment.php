<?php
class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addComment($data)
    {
        $this->db->query('INSERT INTO comments (post_id, user_id, content) VALUES(:post_id, :user_id, :content)');
        // Bind values
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':content', $data['content']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getComments($id)
    {
        $this->db->query('SELECT * FROM comments INNER JOIN registered_users ON comments.user_id = registered_users.User_Id WHERE post_id = :post_id ORDER BY comments.created_at DESC');
        $this->db->bind(':post_id', $id);
        return $this->db->resultSet();
    }


    public function deleteComment($commentId) {
        $this->db->query('DELETE FROM comments WHERE comment_id = :id');
        $this->db->bind(':id', $commentId);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}


