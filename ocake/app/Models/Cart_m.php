<?php
namespace App\Models;
use CodeIgniter\Model;
class Cart_m extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    // protected $foreignKey = 'id';

    protected $allowedFields = ['occasion', 'flavor', 'price', 'quantity', 'total_price', 'product_id', 'user_id', 'is_check', 'order_code', 'rated'];

    //--------------- FETCH CART ---------------//        Edited on December 31,2022
    # get data in cart model #
    public function getCartData($id) {
        return $this->db->table('cart as c')
                        ->select('*')
                        ->join('product as p','p.id=c.product_id')
                        ->where('c.user_id', $id)
                        ->where('order_code', "","OR",'is_check', "1")
                        ->get()->getResult();
    }

    //--------------- FETCH CART ---------------//          December 31,2022
    public function fetchCart($id) {
        return $this->db->table('cart as c')
                        ->select('*')
                        ->join('product as p','p.id=c.product_id')
                        ->where('c.user_id', $id)
                        ->where('rated', "no")
                        ->get()->getResult();
    }

    //--------------- UPDATE CART ---------------//        December 30,2022
    public function cart_update($code, $id,$cart_id){
        // return "hi";
        $update = $this->set('order_code', $code)
                        ->where('cart_id', $cart_id)
                        ->where('user_id', $id)
                        ->where('order_code', "")
                        ->where('is_check', "1")
                        ->update();
        if($update)
            return true;
        else
            return false;
    }

    public function no_rate($rated, $id,$cart_id){
        // return "hi";
        $update = $this->db->table('cart as c')->set('rated', $rated)
                        ->where('user_id', $id)
                        ->where('cart_id', $cart_id)
                        ->where('rated', "")
                        ->update();
        if($update)
            return true;
        else
            return false;
    }

    public function rated($rated, $id,$cart_id){
        // return "hi";
        $update = $this->db->table('cart as c')->set('rated', $rated)
                        ->where('user_id', $id)
                        ->where('cart_id', $cart_id)
                        ->where('rated', "no")
                        ->update();
        if($update)
            return true;
        else
            return false;
    }

    //--------------- UPDATE CART ---------------//        December 30,2022
    public function cart_up( $id, $qty, $total){
        // return "hi";
        $update = $this->set('quantity', $qty)
                        ->set('total_price', $total)
                        ->where('user_id', $id)
                        ->update();
        if($update)
            return true;
        else
            return false;
    }
    

    //------------- COUNT CART DATA -------------//        January 05,2023
    public function count_data($id){
        return $this->db->table('cart')
                    ->select('Count(cart_id) as count')
                    ->where('user_id', $id)
                    ->where('order_code', "")
                    ->where('is_check', "1")
                    ->get()->getResult();
    }

    public function count_datas($id){
        return $this->db->table('cart')
                    ->select('Count(cart_id) as count')
                    ->where('user_id', $id)
                    ->where('order_code', "","OR",'is_check', "0")
                    ->get()->getResult();
    }

    
    public function cart_delete($id){
        $result = $this->db->table('cart')
                          ->where('cart_id',$id)
                          ->delete();
  
                          if($result){
                              return true;
                          }         
    }


}?>