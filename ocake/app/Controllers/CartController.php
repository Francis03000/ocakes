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
            $data = $cartModel->join('product as prod','prod.id=product_id')->where('user_id = '.$id.' AND '.'order_code = ""')->get()->getResult();
            return $this->response->setJSON($data);
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function checkoutindex(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
            $id = $_SESSION['user_id'];
            $cartModel = new Cart_m();
            $data = $cartModel->join('product as prod','prod.id=product_id')->where('user_id = '.$id.' AND '.'is_check='.'1'.' AND '.'order_code = ""')->get()->getResult();
            return $this->response->setJSON($data);
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function cartUpdate()
    {
        $cart_id = $this->request->getPost('cart_id');
        $cartModel = new Cart_m();
        $data = [
            'quantity' => $this->request->getPost('quantity'),
            'total_price' => $this->request->getPost('total_price'),
        ];
        $cartModel->update($cart_id,$data);
        return $this->response->setJSON($data);
    }

    public function cartUpdateCheckout()
    {
        $cart_id = $this->request->getPost('cart_id');
        $cartModel = new Cart_m();
        $data = [
            'is_check' => $this->request->getPost('is_check'),
        ];
        $cartModel->update($cart_id,$data);
        return $this->response->setJSON($data);
    }

    public function cartUpdateCheckout1()
    {
        // $cart_id = $this->request->getPost('cart_id');
        $cartModel = new Cart_m();
        $data = [
            'is_check' => $this->request->getPost('is_check'),
        ];
        $cartModel->where("cart_id >","0")->set($data)->update();
        return $this->response->setJSON($cartModel);
    }

    public function deleteData(){
        $cart_id=$this->request->getPost('cart_id');
        $cartModel = new Cart_m();
        $data = $cartModel->find($cart_id);
        $cartModel->delete($cart_id);
        return $this->response->setJSON($data);
    }


}
