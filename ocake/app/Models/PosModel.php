<?php

namespace App\Models;

use CodeIgniter\Model;

class PosModel extends Model
{
    protected $table = 'pos';
    protected $primaryKey = 'pos_id';
    protected $allowedFields = ['inv_num','customer_id', 'totalAmount', 'payable', 'change', 'remarks', 'status','pre_order_address','isPickup','time_pickup_or_deliver','date_pickup_or_deliver'];
}
