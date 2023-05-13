<?php
namespace App\Models;
use CodeIgniter\Model;
class Address_model extends Model{
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $allowedFields = ['barangay', 'fee'];

    //---------- FETCH ADDRESS ----------//  December 27,2022
    public function fetchAddress() {
        return $this->select('*')
                    ->get()->getResult();
    }
}