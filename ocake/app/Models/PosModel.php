<?php

namespace App\Models;

use CodeIgniter\Model;

class PosModel extends Model
{
    protected $table = 'pos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'totalAmount', 'payable', 'change', 'remarks', 'status'];
}
