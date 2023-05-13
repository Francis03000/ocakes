<?php
namespace App\Models;
use CodeIgniter\Model;
class Cake_model extends Model
{
    protected $table = 'finished_design';
    //protected $primaryKey = 'add_ons_id';
    // protected $foreignKey = 'id';

    protected $allowedFields = ['design_id', 'user_id', 'code', 'description','message', 'flavor', 'price', 'status'];

    //---------- INSERT CUSTOMIZED CAKE ----------//  JANUARY 4,2023
    public function insertDesign($user_id, $canvas, $description, $message, $flavor, $price, $status) {
        $data = [
			'user_id' => $user_id,
            'code' => $canvas,
            'description' => $description,
            'message' => $message,
            'flavor' => $flavor,
            'price' => $price,
            'status' => $status
		];

		$result = $this->insert($data);
		if ($result)
			return true;
    }

    //---------- INSERT CUSTOMIZED CAKE ----------//  JANUARY 6,2023
    public function fetchCake() {
        return $this->get()->getResult();
    }

}?>