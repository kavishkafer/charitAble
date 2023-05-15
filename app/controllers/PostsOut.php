<?php
class PostsOut extends Controller
{
    public function __construct()
    {

        $this->postoutModel = $this->model('PostOut');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        // Get posts
        $posts = $this->postoutModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('postsout/index', $data);
    }



    public function show($id){
        $post = $this->postoutModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('postsout/show', $data);


    }


    public function incPostsLikes($id){
        $likes = $this->postModel->incLikes($id);

        $user_id = $_SESSION['user_id'];

        if ($this->postModel->isPostInteractionExist($id, $user_id)){
            $res = $this->postModel->setPostInteraction($id, $user_id, 'liked');
        }
        else{
            $res = $this->postModel->addPostInteraction($id, $user_id, 'liked');
        }
        if ($likes != false && $res != false){
            echo $likes->likes;
        }
    }

    public function decPostsLikes($id){
        $likes = $this->postModel->decLikes($id);
        $user_id = $_SESSION['user_id'];
        $res = $this->postModel->setPostInteraction($id, $user_id, 'like removed');
        if ($likes != false && $res != false){
            echo $likes->likes;
        }
    }

    public function incPostsDislikes($id){
        $dislikes = $this->postModel->incDislikes($id);

        $user_id = $_SESSION['user_id'];

        if ($this->postModel->isPostInteractionExist($id, $user_id)){
            $res = $this->postModel->setPostInteraction($id, $user_id, 'disliked');
        }
        else{
            $res = $this->postModel->addPostInteraction($id, $user_id, 'disliked');
        }
        if ($dislikes != false && $res != false){
            echo $dislikes->dislikes;
        }
    }

    public function decPostsDislikes($id){
        $dislikes = $this->postModel->decDislikes($id);
        $user_id = $_SESSION['user_id'];
        $res = $this->postModel->setPostInteraction($id, $user_id, 'dislike removed');
        if ($dislikes != false && $res != false){
            echo $dislikes->dislikes;
        }
    }







}
