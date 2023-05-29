<?php 
namespace App\Models;

use CodeIgniter\Model;

class Checkout_model extends Model
{
    protected $table = 'checkout';
    // $primaryKey ='checkout_id';
    protected $allowedFields = [ 'user_id', 'biller_id', 'total_price','downpayment','shipping_fee', 'balance','refund', 'items', 'order_code', 'stat','reason', 'image','payment', 'created_at'];

    //-------------------- INSERT CHECKOUT DATA ----------------------//        January 02, 2023
    public function save_checkout($data){
        //this will save data in biller_details table       
        $insert = $this->insert($data);
    }
    //--------------- FETCH CHECKOUT DETAILS FOR ADMIN ---------------//        January 03, 2023
    # get data in checkout model #
    public function getCheckoutData() {
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->get()->getResult();
    }

    //--------------- FETCH CHECKOUT DETAILS FOR ADMIN ---------------//        January 03, 2023
    # for view order details #
    public function getDetails() {
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('users as u','u.id=co.user_id')
                        ->join('cart as c','c.order_code=co.order_code')
                        ->join('product as p','c.product_id=p.id')
                        ->get()->getResult();
    }
    

    //-------- FETCH ORDER DETAILS DATA FOR USER ORDERDETAILS --------//        January 03, 2023
    public function fetchCheckoutData($id, $order_code) {
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->join('cart as c','c.order_code=co.order_code')
                        ->join('product as p','c.product_id=p.id')
                        ->where('co.order_code', $order_code)
                        ->where('co.user_id', $id)
                        ->get()->getResult();
    }

    //--------- FETCH CHECKOUT DETAILS FOR USER ORDERDETAILS ---------//        January 03, 2023
    public function getCheckout($id, $order_code) {
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->where('co.order_code', $order_code)
                        ->where('co.user_id', $id)
                        ->groupBy('co.created_at')
                        ->get()->getResult();
    }

    //---------- FETCH CHECKOUT DETAILS FOR USER ORDERDETAILS --------//        January 03, 2023
    public function get($id, $order_code) {
        return $this->db->table('checkout')
                        ->select('*')
                        ->where('order_code', $order_code)
                        ->where('user_id', $id)
                        ->get()->getResult();
    }

    //------------------- FETCH TO DELIVER ORDERS --------------------//          January 03, 2023
    public function getData($id) {
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->where('co.user_id', $id)
                        ->where ('stat !=', "Shipped")
                        ->where ('stat !=', "Delivered")
                        ->where ('stat !=', "Completed")
                        ->where('stat !=', "Cancelled")
                        ->groupBy('co.created_at')
                        ->get()->getResult();
    }

    //------------------ FETCH TO RECEIVED ORDERS -------------------//          January 03, 2023
    public function getToReceived($id){
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->where('co.user_id', $id)
                        ->where ('stat !=', "Pending")
                        ->where('stat !=', "Confirmed")
                        ->where ('stat !=', "Processing")
                        ->where ('stat !=', "Completed")
                        ->where('stat !=', "Cancelled")
                        ->groupBy('co.created_at')
                        ->get()->getResult();
    }

    //------------------- FETCH COMPLETED ORDERS --------------------//          January 03, 2023
    public function getCompleted($id){
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->where('co.user_id', $id)
                        ->where('stat',"Completed")
                        ->groupBy('co.created_at')
                        ->get()->getResult();
    }

    //------------------- FETCH CANCELLED ORDERS --------------------//          January 03, 2023
    public function getCancelled($id){
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->where('co.user_id', $id)
                        ->where('stat',"Cancelled")
                        ->groupBy('co.created_at')
                        ->get()->getResult();
    }
   
    //--------------------- UPDATE CHECKOUT DATA --------------------//       January 03, 2023   ***USED
     public function checkout_update($data,$id){
        $result = $this->db->table('checkout')
            ->where('checkout_id', $id)
            ->set ($data)
            ->update();

        if ($result) {
            return true;
        }
    }   
   

    //--------------------- DELETE CHECKOUT DATA --------------------//       January 03, 2023
    public function checkout_delete($id){
        $result = $this->db->table('checkout')
            ->where('checkout_id', $id)
            ->delete();

        if ($result) {
            return true;
        }
    }

    //-------------------- COUNT PENDING ORDERS ---------------------//       January 14,2023
	public function count_pending(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Pending")
					->get()->getResult();
	}

    //------------------ COUNT CONFIRMED ORDERS ---------------------//       January 14,2023
	public function count_confirmed(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Confirmed")
					->get()->getResult();
	}

    //--------------------- COUNT SHIPPED ORDERS --------------------//       January 14,2023
	public function count_shipped(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Shipped")
					->get()->getResult();
	}

    //-------------------- COUNT PENDING ORDERS ---------------------//       January 14,2023
	public function count_delivered(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Delivered")
					->get()->getResult();
	}

    //------------------- COUNT CANCELLED ORDERS --------------------//       January 14,2023
	public function count_cancelled(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Cancelled")
					->get()->getResult();
	}

    //------------------- COUNT COMPLETED ORDERS --------------------//      January 14,2023
	public function count_completed(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Completed")
					->get()->getResult();
	}

    //----------------------- COUNT EARNINGS ------------------------//      January 14,2023
	public function count_earnings(){
		return $this->db->table('checkout')
					->select('Sum(total_price) as sum')
                    ->where('stat',"Completed")
					->get()->getResult();
	}

    //----------------------- COUNT EARNINGS ------------------------//      January 21,2023
	public function count_orders($id){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('user_id', $id)
                    ->where ('stat !=', "Completed")
                    ->where('stat !=', "Cancelled")
					->get()->getResult();
	}

    public function monthly_earnings(){
        return $this->db->table('checkout')
					->select('Sum(total_price) as total')
                    ->where('MONTH(created_at)',date('m'))
                    ->where('stat',"Completed")
					->get()->getResult();
    }

    public function yearly_earnings(){
        return $this->db->table('checkout')
					->select('Sum(total_price) as total')
                    ->where('YEAR(created_at)',date('Y'))
                    ->where('stat',"Completed")
					->get()->getResult();
    }

    public function weekly_earnings(){
        $start = date('Y-m-d',strtotime('last sunday'));
        $end = date('Y-m-d',strtotime('next sunday'));
        return $this->db->table('checkout')
					->select('Sum(total_price) as total')
                    ->where('created_at >=', $start)
                    ->where('created_at <=', $end)
                    ->where('stat',"Completed")
					->get()->getResult();
    }

    public function total_earnings(){
        return $this->db->table('checkout')
					->select('Sum(total_price) as total')
                    ->where('stat',"Completed")
					->get()->getResult();
    }

    public function grossingProduct(){
        return $this->db->table('checkout')
                    ->join('cart as c', 'c.order_code = checkout.order_code', 'left')
                    ->join('product', 'product.id = c.product_id', 'left')
                    ->select('*,count(product_id) as total')
                    ->where('stat',"Completed")
                    ->groupBy('product_id')
                    ->orderBy('total', 'desc')
                    ->limit(5)
					->get()->getResult();
    }

    public function trendingProduct(){
        return $this->db->table('checkout')
                    ->join('cart as c', 'c.order_code = checkout.order_code', 'left')
                    ->join('product', 'product.id = c.product_id', 'left')
                    ->select('*,count(product_id) as total')
                    ->where('stat',"Completed")
                    ->groupBy('product_id')
                    ->orderBy('total', 'desc')
                    ->limit(12)
					->get()->getResult();
    }

    public function mostBarangay(){
        $res = $this->db->table('checkout')
                    ->join('biller_details as bd', 'bd.biller_id = checkout.biller_id', 'left')
                    ->select('barangay,count(barangay)as total')
                    ->groupBy('barangay')
                    ->where('stat',"Completed")
                    // ->orderBy('total', 'desc')
                    ->limit(10)
					->get()->getResult();
        $data = array();
        foreach($res as $row){
            $data['brgy'][] = $row->barangay; 
            $data['count'][] = $row->total; 
        }
        return $data;
    }

    public function monthlySold(){
        $res = $this->db->table('checkout')
                    ->select('MONTH(created_at) as month, YEAR(created_at) as year, count(checkout_id) as total')
                    ->where('stat', 'Completed')
                    ->groupBy('MONTH(created_at)')
					->get()->getResult();

         $data = array();
         $months = [
            'January',
            'February', 
            'March',
            'April',
            'May', 
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
         ];
        foreach($res as $row){
            $data['month'][] = $months[$row->month - 1]; 
            $data['year'][] = $row->year; 
            $data['total'][] = $row->total; 
        }
        return $data;
    }

    public function weeklySold(){
        $res = $this->db->table('checkout')
                    // ->query('
                    //     SELECT WEEK(created_at, 3) - 
                    //     WEEK(created_at - INTERVAL DAY(created_at)-1 DAY, 3) + 1
                    //     AS week_number from checkout
                    // ');
                    ->select('checkout_id , MONTHNAME(created_at) as month, YEAR(created_at) as year,WEEK(created_at, 3) - WEEK(created_at - INTERVAL DAY(created_at)-1 DAY, 3) + 1 as week_number, count(checkout_id) as total')
                    ->where('stat', 'Completed')
                    ->where('MONTH(created_at)', date('m'))
                    ->groupBy('week_number')
					->get()->getResult();
        $data = array();
        foreach($res as $row){
            $data['week'][] = $row->week_number; 
            $data['month'][] = $row->month; 
            $data['year'][] = $row->year; 
            $data['total'][] = $row->total; 
        }
        return $data;
    }

    public function yearlySold(){
        $res = $this->db->table('checkout')
                    ->select('checkout_id , YEAR(created_at) as year, count(checkout_id) as total')
                    ->where('stat', 'Completed')
                    ->groupBy('year')
					->get()->getResult();
        $data = array();
        foreach($res as $row){
            $data['year'][] = $row->year; 
            $data['total'][] = $row->total; 
        }
        return $data;
    }

    // public function date($user_id){
    //     $res = $this->db->table('biller_details')
    //             ->raw('SELECT date, Count(biller_id) FROM `biller_details` WHERE user_id = 20 GROUP by date having count('biller') = 5;')
    //     return $res;
    // }

}
?>