<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_fname', 'customer_mname', 'customer_lname', 'customer_address', 'customer_contact','customer_email','customer_country'];
    protected $cast = ['fullName'];

    public function getFullname(){
        return $this->customer_fname . " " .$this->customer_mname . " " .$this->customer_lname; 
    }

	public function count_customers(){
		return $this->db->table('customers')
					->select('Count(id) as count')
					->get()->getResult();
	}
}
