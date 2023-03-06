<?php
class Comments extends Controller{
public function __construct() {
    $this->commentModel = $this-> model('Comment');
    $this->userModel = $this->model('User');

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
            flash('comment_msg','your comment added');
        }
        else {
            die('something went wrong');
        }
    }

    public function showComments($id){
    $comments = $this->commentModel->getComments($id);

    //render html thread
        foreach ($comments as $comment) {
           echo '<div class="comment-container">';

            echo '<div class="comment-left">';
                echo '<img src="'.URLROOT.'/img/comments/avatar.png" alt="">';
            echo '</div>';
            echo '<div class="comment-right">';
                echo '<div class="comment-right-header">';
                    echo '<div class="comment-user-name">'.$comment->user_id.'</div>';

                    echo '<div class="comment-posted-at">';
            echo convertTimeReadableFormat($comment->created_at);
                    echo '</div>';
                echo '</div>';
                echo '<div class="comment-right-body">';
               echo $comment->content;
   echo '</div>';
                echo '<div class="comment-right-footer">';

                echo '<div class="comments-delete-btn"><img src="'.URLROOT.'/img/comments/comments-delete-btn.png" alt="" onclick="deleteComment('.$comment->comment_id.')"></div>';

                   /* echo '<div class="comment-likes">';
                        echo '<img src="<?php echo URLROOT;?>/img/comments/like-btn.png" alt="">';
                       echo '<div class="comment-likes-count">0</div>';
                    echo '</div>'; */

            /*echo '<div class="comment-dislikes">';
                        echo '<img src="<?php echo URLROOT;?>/img/comments/dislike-btn.png" alt="">';
                        echo '<div class="comment-likes-count">0</div>';
                   echo '</div>'; */
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<br>';
        }
    }

    public function deleteComment($commentid){
        if($this->commentModel->deleteComment($commentid)){
            flash('comment_msg','your comment deleted');
        }
        else {
            die('something went wrong');
        }
    }




}