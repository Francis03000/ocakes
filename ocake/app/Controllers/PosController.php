<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product_model;
use App\Models\PosModel;
use App\Models\Category_model;

class PosController extends BaseController
{
    public function index()
    {
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){

            $model = new Product_model();
            $id = $this->request->getVar('cat');
            $data['pro']= $model->getProduct();
            $data['prod']= $model->getProductData();
            $data['product']= $model->getProduct();

            $category_model = new Category_model();
            $data['category']= $category_model->fetchCategory();
            return view('admin/pos', $data);
        }else{
            return redirect()->to(base_url('/admin'));
        }
    }

    public function store() {
        $posModel = new PosModel();
        $data = [
            'product_id' => $this->request->getVar('product_id'),
            'customer_id' => $this->request->getVar('customer_id'),
            'totalAmount' => $this->request->getVar('totalAmount'),
            'payable' => $this->request->getVar('payable'),
            'change' => $this->request->getVar('change'),
            'remarks' => $this->request->getVar('remarks'),
        ];
        $posModel->insert($data);
        return $this->response->setJSON($data);
    }
}
