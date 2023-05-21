<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product_model;
use App\Models\Cart_m;

class CartController extends BaseController
{
    public function index(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
            $id = $_SESSION['user_id'];
            $cartModel = new Cart_m();
            $data = $cartModel->join('product as prod','prod.id=product_id')->where('user_id = '.$id)->get()->getResult();
            return $this->response->setJSON($data);
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }
}
