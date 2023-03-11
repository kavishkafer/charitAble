<?php
  class Posts extends Controller {
    public function __construct(){
      /*if(!isLoggedIn()){
        redirect('users/login');
      }*/

      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }

    public function index(){
      // Get posts
      $posts = $this->postModel->getPosts();

      $data = [
        'posts' => $posts
      ];

      $this->view('posts/index', $data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
              //sanitize POST array
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
              
              $data = [
                  'image' => $_FILES['image'],
                  'image_name' => time().'_'.$_FILES['image']['name'],
                  'title' => trim($_POST['title']),
                  'body' => trim($_POST['body']),
                  'user_id' => $_SESSION['user_id'],
                  'image_err' => '',
                  'title_err' => '',
                  'body_err' => ''
      
      
                ];
      
                //validate post data
      
              if($data['image']['size'] > 0){
                  if(uploadImage($data['image']['tmp_name'], $data['image_name'], '/img/postsImgs/')){
                      //done
                  }
                  else {
                      $data['image_err'] = 'unsuccessful image uploading';
      
                  }
          }
          else {
              $data['image_name'] = null;
          }
      
                  /*----------------------------*/
                  if(empty($data['title'])){
                  $data['title_err'] = 'Please enter title';
                }
      
                if(empty($data['body'])){
                  $data['body_err'] = 'Please enter post body';
                }
      
                //make sure no error
                  if(empty($data['title_err']) && empty($data['body_err']) && empty($data['image_err'])) {
                          //validated
                          if($this->postModel->addPost($data)) {
                              flash('post_message', 'Post Added');
                              redirect('posts');
                          } else {
                              die('something went wrong');
                          }
                  } else {
                      // load view with errors
                      $this->view('posts/add', $data);
                  }
      
      } else {
          $data = [
              'image'=> '',
              'image_name' => '',
              'title' => '',
              'body' => '',
              'image_err' => '',
              'title_err' => '',
              'body_err' => ''
      
      
            ];
      
            $this->view('posts/add', $data);
              }
          }
      
          public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    //sanitize POST array
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    
                    $data = [
                        'id' => $id,
                        'title' => trim($_POST['title']),
                        'body' => trim($_POST['body']),
                        'user_id' => $_SESSION['user_id'],
                        'image' => $_FILES['image'],
                        'image_name' => time().'_'.$_FILES['image']['name'],
                        'title_err' => '',
                        'body_err' => '',
                        'image_err' => ''
                      ];
      
      
                      //validate post data
                $post = $this->postModel->getPostById($id);
                $oldImage = PUBROOT.'/img/postsImgs/'.$post->image;
      
      
                //post updated
                //user havent changed the existing image
                if($_POST['intentially_removed'] == 'removed') {
                    deleteImage($oldImage);
                      $data['image_name'] = '';
                }
                else {
                    if ($_FILES['image']['name'] == '') {
                        $data['image_name'] = $post->image;
                    } else {
                        updateImage($oldImage, $data['image']['tmp_name'], $data['image_name'], '/img/postsImgs/');
                    }
                }
      
      
                //photo remove intentionally
      
      
                      if(empty($data['title'])){
                        $data['title_err'] = 'Please enter title';
                      }
            
                      if(empty($data['body'])){
                        $data['body_err'] = 'Please enter post body';
                      }
            
                      //make sure no error
                        if(empty($data['title_err']) && empty($data['body_err'])){
                                //validated
                                if($this->postModel->updatePost($data)){
                                    flash('post_message', 'Post updated');
                                    redirect('posts');
                                } else {
                                    die('something went wrong');
                                }
                        } else {
                            // load view with errors
                            $this->view('posts/edit', $data);
                        }
            
            } else {
      
              //get existing post from model
                $post = $this->postModel->getPostById($id);
              //check for owner remove the comment once the login is finalized)
              if($post->user_id != $_SESSION['user_id']){
                  redirect('posts');
              } 
                $data = [
                  'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body,
                    'image' => '',
                      'image_name' => '',
                      'title_err' => '',
                      'body_err' => '',
                      'image_err' => ''
                  ];
            
                  $this->view('posts/edit', $data);
                    }
                }
      
          public function show($id){
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);
      
            $data = [
              'post' => $post,
              'user' => $user
            ];
      
              $this->view('posts/show', $data);
          }
      
          public function delete($id){
              if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
                 //get existing post from model
                 $post = $this->postModel->getPostById($id);
                 //check for owner remove the comment once the login is finalized)
                 if($post->user_id != $_SESSION['user_id']){
                     redirect('posts');
                 }
      
                      $post = $this->postModel->getPostById($id);
                      $oldImage = PUBROOT.'/img/postsImgs/'.$post->image;
                      deleteImage($oldImage);
      
                  if($this->postModel->deletePost($id)){
                    flash('post_message', 'post removed');
                    redirect('posts');
                  } else {
                    die('something went wrong');
                  }
              } else {
                redirect('posts');
              }
          }
        }
      
      