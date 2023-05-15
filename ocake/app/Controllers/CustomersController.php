<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomersModel;

class CustomersController extends BaseController
{

    public function getAllData(){
        $customersModel = new CustomersModel();
        $data = $customersModel->findAll();
        return $this->response->setJSON($data);
    }

    public function store()
    {
        $customersModel = new CustomersModel();
        $data = [
            'customer_fname' => $this->request->getPost('customer_fname'),
            'customer_mname' => $this->request->getPost('customer_mname'),
            'customer_lname' => $this->request->getPost('customer_lname'),
            'customer_address' => $this->request->getPost('customer_address'),
            'customer_contact' => $this->request->getPost('customer_contact'),
            'customer_email' => $this->request->getPost('customer_email'),
            'customer_country' => $this->request->getPost('customer_country'),
        ];
        $customersModel->save($data);
        return $this->response->setJSON($data);
    }

    public function update()
    {
        $customersModel = new CustomersModel();
        $data = [
            'customer_fname' => $this->request->getPost('customer_fname'),
            'customer_mname' => $this->request->getPost('customer_fname'),
            'customer_lname' => $this->request->getPost('customer_fname'),
            'customer_address' => $this->request->getPost('customer_fname'),
            'customer_contact' => $this->request->getPost('customer_fname'),
            'customer_email' => $this->request->getPost('customer_fname'),
            'customer_country' => $this->request->getPost('customer_fname'),
        ];
        $customersModel->update($data);
        return $this->response->setJSON($data);
    }
}
