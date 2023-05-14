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
        $avail = "";
        if($this->request->getVar('availability')==="0"){
            $productsModel = new Product_model();
            $data = $productsModel->where('availability','Ready Made')->get()->getResult();
            return $this->response->setJSON($data);
        }else if($this->request->getVar('availability')==="1"){
            $productsModel = new Product_model();
            $data = $productsModel->where('availability','Pre Order')->get()->getResult();
            return $this->response->setJSON($data);
        }
    }


    public function updateProductStocks(){
        $id = $this->request->getPost('product_id');
        $productsModel = new Product_model();
        $data = [
            'stock' => $this->request->getPost('stock'),
        ];
        $productsModel->where('availability','Ready Made')->update($id,$data);
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

    public function invoiceBilling(){
        $invoicecartModel = new InvoiceCartModel();
        $data = $invoicecartModel->join('product as prod','prod.id=product_id')->where('invoice_number = '.$this->request->getPost('invoice_number'))->get()->getResult();
        return $this->response->setJSON($data);
    }

    public function invoiceBillingPos(){
        $posModel = new PosModel();
        $data = $posModel->join('customers as cus','cus.id=customer_id')->where('inv_num = '.$this->request->getPost('invoice_number'))->get()->getResult();
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
        if($this->request->getPost('isPreOrder')==="1"){
            $data = [
                'inv_num' => $this->request->getPost('inv_num'),
                'customer_id' => $this->request->getPost('customer_id'),
                'totalAmount' => $this->request->getPost('totalAmount'),
                'payable' => $this->request->getPost('payable'),
                'change' => $this->request->getPost('change'),
                'remarks' => $this->request->getPost('remarks'),
                'pre_order_address' => $this->request->getPost('pre_order_address'),
                'isPickup' => $this->request->getPost('isPickup'),
                'time_pickup_or_deliver' => $this->request->getPost('time_pickup_or_deliver'),
                'date_pickup_or_deliver' => $this->request->getPost('date_pickup_or_deliver'),
                'status' => 1,
            ];
            
            $posModel->insert($data);
            return $this->response->setJSON($data);
        }else if($this->request->getPost('isPreOrder')==="0"){
            $data = [
                'inv_num' => $this->request->getPost('inv_num'),
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
}
