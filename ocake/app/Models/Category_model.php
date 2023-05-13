<?php
namespace App\Models;
use CodeIgniter\Model;
class Category_model extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'category_id';
    protected $allowedFields = ['cat_image', 'category_name', 'status'];

    //----------------- FETCH CATEGORY ----------------//    December 18,2022        ***USED
    public function fetchCategory() {
        $session= session();
        if($session->type == "admin"){
            return $this->select('*')
                        ->get()->getResult();
        }elseif($session->type == "user"){
            return $this->select('*')
                        ->where('status',"Available")
                        ->get()->getResult();
        }
    }

    //---------------- DELETE CATEGORY ---------------//     November 28,2022     ***USED
    public function cat_delete($id){
        // return $this->delete(['id' => $id]);
        $result = $this->db->table('category')
                ->where('category_id', $id)
                ->delete();

            if ($result) {
                return true;
            }
    }
    
    //--------------- UPDATE CATEGORY ----------------//     November 29,2022
    public function cat_update($data,$id){
        $result = $this->db->table('category')
            ->where('category_id', $id)
            ->set ($data)
            ->update();

        if ($result) {
            return true;
        }
    }   

    //--------- COUNT ADDONS ----------//   January 14,2023
	public function count_addons(){
		return $this->db->table('add_ons')
					->select('Count(add_ons_id) as count')
                    ->get()->getResult();
	}




    //--------------SEARCH PRODUCTT IN POS-----------//
    public function search($category, $keyword) {
        $this->db->like($category, $keyword);
        return $this->db->get('category')->result(); // replace with your table name
      }
}?>