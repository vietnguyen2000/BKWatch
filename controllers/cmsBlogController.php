<?php

namespace Controllers;

use Models\BlogModel;
use Models\BlogCommentModel;
use Models\BlogImageModel;
use Models\UserModel;

use Views\ErrorView;
use Views\UserView;
use Views\cmsBlogView;
use Views\cmsAddBlogView;

class cmsBlogController extends BaseController
{
  var $ItemPerPage;
  var $blogModel;
  public function __construct()
  {
      $this->blogModel = new BlogModel();
      $this->ItemPerPage = 10;
      $this->data = [];
  }
  public function index($url)
  {
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] != 1 ) {
      $this->redirect('/');
      return;
    };
    $data = $this->blogModel->getAll();
    $view = new cmsBlogView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsBlog', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'data' => $data]);
  }
  public function update($url, $id)
    {
      if (!isset($_SESSION['user']) ) {
        $this->redirect('/login');
        return;
      };
      if ($_SESSION['user']['role'] != 1 ) {
        $this->redirect('/');
        return;
      };
        $view = new cmsAddBlogView();
        $data = $this->blogModel->getBlogById($id);
        $comment = $this->blogModel->getCmtsByBlogId($id);
        $userId = $_SESSION['user']['id'];
        $userImg = $_SESSION['user']['avatarURL'];
        $username = $_SESSION['user']['username'];
        $imageList = $this->blogModel->getImageHelpById($id);
        $view->render([
            'url' => $url,
            'nav' => 'cmsBlog',
            'comment' => $comment,
            'data' => $data,
            'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'add'=>false,
            'imageList'=> $imageList, 'id' => $id
        ]);
    }
  public function add($url)
  {
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] != 1 ) {
      $this->redirect('/');
      return;
    };
    $view = new cmsAddBlogView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsBlog', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'comment' => array(), 'data' => [], 'add'=>true]);
  }
  public function deleteCmt($url)
  {
    $id = $_POST['ID'];
    $blogCmt = new BlogCommentModel();
    $row =  $blogCmt->delete($id);
    return;
  }

  public function updateBlog($url, $id) {
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] != 1 ) {
      $this->redirect('/');
      return;
    };
    $blogTitle = $_POST['blogTitle'];
    $content = $_POST['content'];
    $isHot = $_POST['isHot'];
    $userId = $_SESSION['user']['id'];
    $id = $this->blogModel->updateById( $id, [
      "title" => $blogTitle,
      "isHot" => ($isHot) ? 1 : 0,
      "content" => $content,
      "userId" => $userId
    ]);
    if (isset($_POST['listNewImages'])) {
      $listNewImages = $_POST['listNewImages'];
    } else {
      $listNewImages = [];
    }
    
    if (isset($_POST['listRemovedImages'])) {
      $listRemovedImages = $_POST['listRemovedImages'];
    } else {
      $listRemovedImages = [];
    }
    

    $blogImageModel = new BlogImageModel();

    foreach($listNewImages as $image) {
      $blogImageModel->insert(['blogId' => $id, 'imageURL' => $image]);
    }

    $blogImageModel->deleteListIds($listRemovedImages);
      return;

  }

  public function addBlog(){
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] != 1 ) {
      $this->redirect('/');
      return;
    };
    $blogTitle = $_POST['blogTitle'];
    $content = $_POST['content'];
    $isHot = $_POST['isHot'];
    $userId = $_SESSION['user']['id'];
    $id = $this->blogModel->insert([
      "title" => $blogTitle,
      "isHot" => ($isHot) ? 1 : 0,
      "content" => $content,
      "userId" => $userId,
      'countLike' => 0,
      'countView' => 0
    ]);
    if (isset($_POST['listNewImages'])) {
      $listNewImages = $_POST['listNewImages'];
    } else {
      $listNewImages = [];
    }
    
    if (isset($_POST['listRemovedImages'])) {
      $listRemovedImages = $_POST['listRemovedImages'];
    } else {
      $listRemovedImages = [];
    }
    

    $blogImageModel = new BlogImageModel();

    foreach($listNewImages as $image) {
      $blogImageModel->insert(['blogId' => $id, 'imageURL' => $image]);
    }

    $blogImageModel->deleteListIds($listRemovedImages);
      return;
  }
}