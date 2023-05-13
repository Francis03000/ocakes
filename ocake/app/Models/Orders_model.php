<?php 
namespace App\Models;

use CodeIgniter\Model;

class Orders_model extends Model
{
    protected $table = 'product_order';
    // protected $primaryKey ='pid';
    protected $allowedFields = ['occasion', 'flavor', 'price', 'quantity','stat', 'product_id'];
   
   //--------------- FETCH ORDER ---------------//          December 10,2022
    public function fetchProduct()
    {
        return $this->db->table('product_order as po')
        ->select('*')
        ->join('product as p','p.id=po.product_id')
        
        ->get()->getResult();
    }
   
    //--------------- UPDATE ORDER ---------------//        December 11,2022
    public function order_update($data,$id){
        $this->set($data)->where('order_id', $id)->update();
    }

    function count_data()
    {
        return $this->db->table('product_order')
            ->selectCount('order_id')
            ->get()->getResult();
    }
    
    //--------------- DELETE ORDER ---------------//          December 11,2022
    public function cart_delete($id)
    {
        $result = $this->db->table('product_order')
            ->where('order_id', $id)
            ->delete();

        if ($result) {
            return true;
        }
    }
    
}
?>