<?php

namespace Controllers;

use Models\BlogModel;
use Models\ProductCommentModel;
use Models\ProductImageModel;
use Models\ProductModel;
use Models\UserModel;

use Views\ErrorView;
use Views\UserView;
use Views\cmsProductView;
use Views\cmsAddProductView;

class cmsProductController extends BaseController
{
  var $ItemPerPage;
  var $productModel;
  public function __construct()
  {
      $this->productModel = new ProductModel();
      $this->ItemPerPage = 10;
      $this->data = [];
  }
  public function index($url)
  {
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] > 0 ) {
      $this->redirect('/');
      return;
    };
    $data = $this->productModel->getAll();
    $view = new cmsProductView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsProduct', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'data' => $data]);
  }
  public function add($url)
  {
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] > 0 ) {
      $this->redirect('/');
      return;
    };
    $categoryList = $this->productModel->getAllCategory();
    $brandList = $this->productModel->getAllBrand();
    $imageList = array();
    $view = new cmsAddProductView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsAddProduct', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'add'=>true, 'data' =>'', 'categoryList' => $categoryList, 'brandList' => $brandList]);
  }
    public function update($url, $id)
    {
      if (!isset($_SESSION['user']) ) {
        $this->redirect('/login');
        return;
      };
      if ($_SESSION['user']['role'] > 0 ) {
        $this->redirect('/');
        return;
      };
      $categoryList = $this->productModel->getAllCategoryHelp();
      $brandList = $this->productModel->getAllBrandHelp();
      $imageList = $this->productModel->getImageHelpById($id);
      $view = new cmsAddProductView();
      $data = $this->productModel->getById($id);
      $userId = $_SESSION['user']['id'];
      $userImg = $_SESSION['user']['avatarURL'];
      $username = $_SESSION['user']['username'];
      $view->render(['url' => $url, 'nav' => 'cmsAddProduct', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'add'=>false, 'data' =>$data, 'categoryList' => $categoryList, 'brandList' => $brandList, 'imageList'=> $imageList]);
    }

    public function updateProduct($url, $id) {
      // if (!isset($_SESSION['user']) ) {
      //   $this->redirect('/login');
      //   return;
      // };
      // if ($_SESSION['user']['role'] > 0 ) {
      //   $this->redirect('/');
      //   return;
      // };
      
      $productTitle = $_POST['productTitle'];
      $productTag = $_POST['productTag'];
      $productContent = $_POST['productContent'];
      $productCategory = $_POST['productCategory'];
      $isHot = $_POST['isHot'];
      $isNew = $_POST['isNew'];
      $isBestSale = $_POST['isBestSale'];
      $quantity = $_POST['quantity'];
      $material = $_POST['material'];
      $glass = $_POST['glass'];
      $back = $_POST['back'];
      $productBrand = $_POST['productBrand'];
      $Currency = $_POST['Currency'];
      $productShape = $_POST['productShape'];
      $productDiameter = $_POST['productDiameter'];
      $productHeight = $_POST['productHeight'];
      $productLugWidth = $_POST['productLugWidth'];
      $productColor = $_POST['productColor'];
      $productPrice = $_POST['productPrice'];
      $code = $_POST['code'];
      $productDiscount = $_POST['productDiscount'];
      $productWarranty = $_POST['productWarranty'];
      $this->productModel->updateById($id, [
        "productBrandId" => $productBrand,
        "productCategoryId" => $productCategory,
        "productCode" => $code,
        "title" => $productTitle,
        "content" => $productContent,
        "price" => $productPrice,
        "discount" => $productDiscount,
        "warranty" => $productWarranty,
        "isHot" => ($isHot) ? 1 : 0,
        "isNew" => ($isNew) ? 1 : 0,
        "isBestSale" => ($isBestSale) ? 1 : 0,
        "quantity" => $quantity,
        "material" => $material,
        "glass" => $glass,
        "back" => $back,
        "shape" => $productShape,
        "diameter" => $productDiameter,
        "height" => $productHeight,
        "lugWidth" => $productLugWidth,
        "color" => $productColor
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

      $productImageModel = new ProductImageModel();
      foreach($listNewImages as $image) {
        $productImageModel->insert(['productId' => $id, 'imageURL' => $image]);
      }

      $productImageModel->deleteListIds($listRemovedImages);
        return;
    }
    public function addProduct(){
      if (!isset($_SESSION['user']) ) {
        $this->redirect('/login');
        return;
      };
      if ($_SESSION['user']['role'] > 0 ) {
        $this->redirect('/');
        return;
      };
      
      $productTitle = $_POST['productTitle'];
      $productTag = $_POST['productTag'];
      $productContent = $_POST['productContent'];
      $productCategory = $_POST['productCategory'];
      $isHot = $_POST['isHot'];
      $isNew = $_POST['isNew'];
      $isBestSale = $_POST['isBestSale'];
      $quantity = $_POST['quantity'];
      $material = $_POST['material'];
      $glass = $_POST['glass'];
      $back = $_POST['back'];
      $productBrand = $_POST['productBrand'];
      $Currency = $_POST['Currency'];
      $productShape = $_POST['productShape'];
      $productDiameter = $_POST['productDiameter'];
      $productHeight = $_POST['productHeight'];
      $productLugWidth = $_POST['productLugWidth'];
      $productColor = $_POST['productColor'];
      $productPrice = $_POST['productPrice'];
      $code = $_POST['code'];
      $productDiscount = $_POST['productDiscount'];
      $productWarranty = $_POST['productWarranty'];
      $id = $this->productModel->insert([
        "productBrandId" => $productBrand,
        "productCategoryId" => $productCategory,
        "productCode" => $code,
        "title" => $productTitle,
        "content" => $productContent,
        "price" => $productPrice,
        "discount" => $productDiscount,
        "warranty" => $productWarranty,
        "isHot" => ($isHot) ? 1 : 0,
        "isNew" => ($isNew) ? 1 : 0,
        "isBestSale" => ($isBestSale) ? 1 : 0,
        "quantity" => $quantity,
        "material" => $material,
        "glass" => $glass,
        "back" => $back,
        "shape" => $productShape,
        "diameter" => $productDiameter,
        "height" => $productHeight,
        "lugWidth" => $productLugWidth,
        "color" => $productColor
      ]);
        $this->redirect("/cmsProduct");

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
      

      $productImageModel = new ProductImageModel();

      foreach($listNewImages as $image) {
        $productImageModel->insert(['productId' => $id, 'imageURL' => $image]);
      }

      $productImageModel->deleteListIds($listRemovedImages);
        return;
    }
    public function delete($url){
      $id = $_POST['ID'];
      $this->productModel->delete($id);
    }
}