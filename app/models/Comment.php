<?php
class Comment{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addComment($data){
        $this->db->query('INSERT INTO comments (post_id, user_id, content) VALUES(:post_id, :user_id, :content)');
      // Bind values
      $this->db->bind(':post_id', $data['post_id']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':content', $data['content']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    }


