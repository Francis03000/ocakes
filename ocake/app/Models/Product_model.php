<?php

namespace App\Models;
use CodeIgniter\Model;
class Product_model extends Model{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_code','image', 'cat_id', 'occasion', 'product_name', 'flavor', 'price', 'stock', 'status','availability', 'is_customized', 'userid', 'message'];

  # ------ FETCH ALL PRODUCT ----#        ***USED
  public function fetchProduct() {
    return $this->where('is_customized', 0)
                //->where('id', $id)
                ->get()->getResult();
  }
//***USED
  public function getProduct() {
    $session= session();
    if($session->type == "admin"){
      return $this->where('is_customized', 0)
                  ->get()->getResult();
    }if($session->type == "user"){
      return $this->where('is_customized', 0)
                  ->where('status', "Available")
                  ->get()->getResult();
    }
  }
  public function getProductData() {
    return $this->db->table('product as po')
                    ->select('*')
                    ->join('category as cat','cat.category_id=po.cat_id')
                    ->where('po.status', "Available")
                    ->get()->getResult();
}

  //------------- CATEGORY RETRIEVE ---------------//  November 28,2022
  public function getBDay($occasion) {
    $session= session();
    if($session->type == "admin"){
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }if($session->type == "user"){
      return $this->select('*')->where('occasion', $occasion)
                  ->where('status', "Available")
                  ->get()->getResult();
    }
  }

  public function getChristening($occasion) {
    $session= session();
    if($session->type == "admin"){
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }if($session->type == "user"){
      return $this->select('*')->where('occasion', $occasion)
                  ->where('status', "Available")
                  ->get()->getResult();
    }
  }

  public function getWedding($occasion) {
    $session= session();
    if($session->type == "admin"){
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }if($session->type == "user"){
      return $this->select('*')->where('occasion', $occasion)
                  ->where('status', "Available")
                  ->get()->getResult();
    }
  }

  public function getGrad($occasion) {
    $session= session();
    if($session->type == "admin"){
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }if($session->type == "user"){
      return $this->select('*')->where('occasion', $occasion)
                  ->where('status', "Available")
                  ->get()->getResult();
    }
  }

  public function getValentine($occasion) {
    $session= session();
    if($session->type == "admin"){
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }if($session->type == "user"){
      return $this->select('*')->where('occasion', $occasion)
                  ->where('status', "Available")
                  ->get()->getResult();
    }
  }

  public function getHalloween($occasion) {
    $session= session();
    if($session->type == "admin"){
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }if($session->type == "user"){
      return $this->select('*')->where('occasion', $occasion)
                  ->where('status', "Available")
                  ->get()->getResult();
    }
  }

  public function getChristmas($occasion) {
    $session= session();
    if($session->type == "admin"){
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }if($session->type == "user"){
      return $this->select('*')->where('occasion', $occasion)
                  ->where('status', "Available")
                  ->get()->getResult();
    }
  }

  public function getNewYear($occasion) {
    $session= session();
    if($session->type == "admin"){
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }if($session->type == "user"){
      return $this->select('*')->where('occasion', $occasion)
                  ->where('status', "Available")
                  ->get()->getResult();
    }
  }

  public function getCustomized($occasion, $id) {
    return $this->db->table('product as po')
                    ->select('*')
                    ->join('users as u','u.id=po.userid')
                    ->where('po.occasion', $occasion)
                    ->where('po.userid', $id)
                    ->get()->getResult();
}

  //---------------- DELETE PRODUCT ---------------//  November 28,2022     ***USED
  public function prod_delete($id){
    // return $this->delete(['id' => $id]);
    $result = $this->db->table('product')
            ->where('id', $id)
            ->delete();

        if ($result) {
            return true;
        }
  }
    
  //--------------- UPDATE PRODUCT ---------------//  November 29,2022      ***USED
  public function prod_update($data,$id){
    $result = $this->db->table('product')
        ->where('id', $id)
        ->set ($data)
        ->update();

    if ($result) {
        return true;
    }
}

  //---------- INSERT CUSTOMIZED DESIGN ----------//  November 29,2022
  public function insertDesign($product_code,$user_id, $img, $message, $flavor, $price) {
    $data = [
      'product_code' => $product_code,
      'image' => $img,
      'occasion' => 'Customized',
      'message' => $message,
      'flavor' => $flavor,
      'price' => $price,
      'is_customized' => 1,
      'userid' => $user_id,
		];

      $result = $this->insert($data);
      $insert_id = $this->getInsertID();
      if ($result)
			return $insert_id;
  }

  //--------------- COUNT PRODUCTS ---------------//   January 14,2023
	public function count_products(){
		return $this->db->table('product')
					          ->select('Count(id) as count')
                    ->where('userid', "0")
                    ->get()->getResult();
	}

  //------------ FETCH PRODUCT DETAILS -----------//   January 15, 2023
  public function getDetails($prod_id){
    return $this->select('*')->where('id', $prod_id)
                ->get()->getResult();
  }

  public function getNewAddedProduct(){
    return $this->limit(5)
                ->orderBy('created_at', 'desc')
                ->get()->getResult();
  }

    
}