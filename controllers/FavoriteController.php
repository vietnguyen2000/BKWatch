<?php

namespace Controllers;

use Models\UserFavoriteItemModel;
use Views\FavoriteView;

class FavoriteController extends BaseController
{
    var $ItemPerPage;
    public function __construct()
    {
        $this->ItemPerPage = 15;
    }

    public function index($url)
    {
        if (!isset($_SESSION['user'])) {
        $this->redirect('/login');
        return;
        };

        $userId = $_SESSION['user']['id'];
        $favoriteItems = (new UserFavoriteItemModel())->getProductViewByUserId($userId);
        
        $page = 1;
        $sort = "";
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        $view = new FavoriteView();
        $view->render([
            'url' => $url, 
            'nav' => '/favorite',
            'products' => $favoriteItems,
            'page' => $page,
            'length' => 10,
            'sort' => $sort,         
        ]);
    }
 
    public function add($url) 
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
            return;
        };

        if (!isset($_POST['productId'])) {
            // Bad Request
            $this->redirect('/');
            return;
        }
        $userId = $_SESSION['user']['id'];
        $productId = $_POST['productId'];
        (new UserFavoriteItemModel())->insert([
            'userId' => $userId,
            'productId' => $productId,
        ]);
    }
}
