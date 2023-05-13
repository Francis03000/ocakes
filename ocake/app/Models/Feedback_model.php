<?php
namespace App\Models;
use CodeIgniter\Model;
class Feedback_model extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'feedback_id';
    protected $allowedFields = ['feedback', 'rate', 'user_id', 'prod_id'];

    //----------------- FETCH CATEGORY ----------------//    December 18,2022        ***USED
    public function fetchFeedback($prod_id) {
        return $this->db->table('feedback as f')
        ->select('*')
        ->join('product as p','p.id=f.prod_id')
        ->join('users as u','u.id=f.user_id')
        // ->where('f.user_id', $id)
        ->where('f.prod_id', $prod_id)
        ->get()->getResult();
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

}?>