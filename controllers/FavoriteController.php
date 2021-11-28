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
        header('Content-Type: application/json; charset=utf-8');
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

        $userFavoriteItemModel = new UserFavoriteItemModel();
        $isExists = $userFavoriteItemModel->getByCondition(['userId' => $userId, 'productId' => $productId]);
        $data = [
            'success' => false
        ];
        if (count($isExists) > 0) {
            $userFavoriteItemModel->delete($isExists[0]['id']);
            $data = [
                'success' => false
            ];
        } else {
            $userFavoriteItemModel->insert([
                'userId' => $userId,
                'productId' => $productId,
            ]);
            $data = [
                'success' => true
            ];
        }
        echo json_encode($data);
        flush();
    }
}
