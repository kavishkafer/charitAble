<?php
class Comments extends Controller{
public function __construct() {
    $this->commentModel = $this-> model('Comment');
}


//create comment
    public function comment($id) {
        $userId = $_SESSION['user_id'];
        $postId = $id;
        $commentContent = $_POST['post-comment'];
        echo 'user: '.$userId.' post'.$postId.' comment'.$commentContent;
    
        $data = [
            'post_id' => $postId,
            'user_id' =>  $userId,
            'content' =>$commentContent,

        ];

        if($this->commentModel->addComment($data)){
            echo ('you comment added');
        }
        else {
            die('something went wrong');
        }
    }
}