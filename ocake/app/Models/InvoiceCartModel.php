<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceCartModel extends Model
{
    protected $table = 'invoice_cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['invoice_number', 'product_id', 'quantity', 'totalAmount'];
}
