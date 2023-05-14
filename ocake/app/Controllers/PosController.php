<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product_model;
use App\Models\InvoiceCartModel;
use App\Models\PosModel;
use App\Models\Category_model;

class PosController extends BaseController
{

    public function getAllProducts(){
        $productsModel = new Product_model();
        $data = $productsModel->findAll();
        return $this->response->setJSON($data);
    }

    public function updateProductStock(){
        $id = $this->request->getPost('product_id');
        $productsModel = new Product_model();
        $data = [
            'stock' => $this->request->getPost('stock'),
        ];
        $productsModel->update($id,$data);
        return $this->response->setJSON($data);
    }

    public function selectProduct(){
        $productsModel = new Product_model();
        $data = $productsModel->select("*")->where('id = '.$this->request->getPost('p_id'))->get()->getResult();
        return $this->response->setJSON($data);
    }

    public function getAllInvoice(){
        $invoicecartModel = new InvoiceCartModel();
        $data = $invoicecartModel->join('product as prod','prod.id=product_id')->where('invoice_number = '.$this->request->getVar('invoice_numbers'))->get()->getResult();
        return $this->response->setJSON($data);
    }

    public function invoiceProductAvailability(){
        $invoicecartModel = new InvoiceCartModel();
        $data = $invoicecartModel->select("*")->where('invoice_number = '.$this->request->getPost('invoicenumber').' AND '.'product_id='.$this->request->getPost('prod_id'))->get()->getResult();
        return $this->response->setJSON($data);
    }

    public function addToInvoice()
    {
        $invoicecartModel = new InvoiceCartModel();
        $data = [
            'invoice_number' => $this->request->getPost('invoice_number'),
            'product_id' => $this->request->getPost('product_id'),
            'quantity' => $this->request->getPost('quantity'),
            'totalAmount' => $this->request->getPost('totalAmount'),
        ];
        $invoicecartModel->save($data);
        return $this->response->setJSON($data);
    }

    public function updateToInvoice()
    {
        $id = $this->request->getPost('id');
        $invoicecartModel = new InvoiceCartModel();
        $data = [
            'invoice_number' => $this->request->getPost('invoice_number'),
            'product_id' => $this->request->getPost('product_id'),
            'quantity' => $this->request->getPost('quantity'),
            'totalAmount' => $this->request->getPost('totalAmount'),
        ];
        $invoicecartModel->update($id,$data);
        return $this->response->setJSON($data);
    }

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

    public function storeTransaction() {
        $posModel = new PosModel();
        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'totalAmount' => $this->request->getPost('totalAmount'),
            'payable' => $this->request->getPost('payable'),
            'change' => $this->request->getPost('change'),
            'remarks' => $this->request->getPost('remarks'),
            'status' => 1,
        ];
        $posModel->insert($data);
        return $this->response->setJSON($data);
    }
}
