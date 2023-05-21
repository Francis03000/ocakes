<?php

namespace App\Controllers;
use App\Models\Product_model;
use App\Models\Cart_m;
use App\Models\Personal_m;
use App\Models\Biller_model;
use App\Models\Address_model;
use App\Models\Checkout_model;
use App\Models\AddOns_model;
use App\Models\Flavor_model;
use App\Models\Feedback_model;

use App\library\Email; //Initialize email library.

class User extends BaseController
{

    protected $session;
    public function __construct(){
		 $this->session = \Config\Services::session();
	}

    public function generate(){
        return view('generate');
    }
    //------------ SIGNIN SIGNUP PAGE -----------//              November 26, 2022
    public function signin(){
        $model = new Address_model();
        $data['address'] = $model->fetchAddress();
        return view('user/auth/signlog', $data);
    }

    //-------------- SAVE USER DATA -------------//              November 26, 2022
    public function save(){
        $val = $this->validate([   
            'firstname' => 'required',
            'lastname' => 'required',
            'mcp' => 'required',
            'brgy' => 'required',
            'birthdate' => 'required',   
            'gender' => 'required',   
            'mobile' => 'required|numeric|max_length[11]',    
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|alpha_numeric_punct',
            'confirm_password' => 'required|matches[password]',     
        ]);

       $model = new Personal_m();
        $model = new Address_model();
        $data['address'] = $model->fetchAddress();

       if (!$val) {
           $data['validation']  = $this->validator;
        //    echo "haha";
        $data['msg']='Please fill out the register form correctly.';
        return view('user/auth/signlog',$data);
       }else{

            $personal_m = new personal_m();
            $_POST ['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
            $personal_m->insert([
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'mcp' => $this->request->getVar('mcp'),
                'brgy' => $this->request->getVar('brgy'),
                'birthdate' => $this->request->getVar('birthdate'),
                'gender' => $this->request->getVar('gender'),
                'mobile' => $this->request->getVar('mobile'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'confirm_password' => password_hash($this->request->getVar('confirm_password'), PASSWORD_BCRYPT),
                // 'verification_code' => $verification_code,
                // 'verification_validity_date' => $validity,
            ]);
            // $msg = 'Your verification code is ' .$verification_code .' .';
            // $this->send_mail($this->request->getVar('email'), $msg);
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function send_mail($email, $msg) {
        $to = $email; // recipient
		$subject = 'OTP'; //subject
		$email = \Config\Services::email();
        $emailAccount = 'ocake@gmail.com'; //set your email here.
        $codename = 'Ocake'; // email account alias;

        $email->setFrom($emailAccount, $codename);
		$email->setTo($to);
		$email->setSubject($subject);
		$email->setMessage($msg);
		if ($email->send()) {
			echo "email  successfully sent";
		} else {
			echo "email  unsuccessfully sent";
		}
    }

    //---------------- USER LOGIN ---------------//              November 26, 2022
    public function login(){
        $data = $this->exists($_POST['email'], $_POST['password']);
        if($data != NULL) {
            $session=session();
            $user_session = [
                'user_id'    => $data['id'],
                'userF_name' => $data['firstname'],
                'userL_name' => $data['lastname'],
                'user_email' => $data['email'],
                'profile'    => $data['profile'],
                'logged_in'  => true,
                'type'       => "user",
            ]; 
            $session->set($user_session);
            /*
            $session->user_id;            // way to get the declared session
            */

            $personal_m = new Personal_m();
            $res = $personal_m->checkEmailVerification($data['id']);

            if($res->is_verified == 0){
                $verification_code = mt_rand(000000, 999999);
                $date = Date('Y-m-d h:i:s a');
                $validity = date('Y-m-d h:i:s a', strtotime($date. ' +5 minutes'));
                $msg = 'Your verification code is ' .$verification_code .' .';
                $this->send_mail($this->request->getVar('email'), $msg);
                $res = $personal_m->refreshVerificationCode($data['id'], $verification_code, $validity);
                return redirect('verify_email');
            }
            return $this->response->redirect(site_url('home'));
        }else{
            $data['msg']='invalid';
            return view('user/auth/signlog', $data);    
        }
    }

    //---------- CHECK LOGIN CREDENTIALS --------//              November 26, 2022
    private function exists($email, $password){
        $personal_m = new Personal_m();
        $personal = $personal_m->where('email', $email)->first();
            if ($personal !=NULL){
                if (password_verify($password, $personal['password'])) {
                    return $personal;
                }
            }
    }

    //--------------- USER LOGOUT ---------------//              November 26, 2022
    public function logout(){
        $session=session();
        $session->destroy();
        return $this->response->redirect(site_url('signin'));
    }

    //------------- FORGOT PASSWORD -------------//              November 26, 2022
    public function userforgotpassword() {
        $data['session'] = $this->session;
        return view('user/auth/userforgotpassword', $data);
    }

    public function sendResetCode() {
        $user = new Personal_m();
        $exist = $user->getUserByEmail($this->request->getVar('email'));

        if($exist){
            $res = $this->refreshVerificationCode($this->request->getVar('email'));
            $msg = 'Your reset code is ' .$res .' .';
            $session=session();
            $this->send_mail($this->request->getVar('email'), $msg);
            $session->set(['temp_email'=> $this->request->getVar('email')]);
            return redirect('otp');
        }

        $data['msg']='Email does not exist.';
        $this->session->setFlashdata('msg', $data['msg']);
        return redirect('userforgotpassword');
    }

    public function otp() {
        if($this->session->temp_email != null){
            $data['session'] = $this->session;
            return view('user/auth/otp', $data);
        }
        return redirect('home');
    }

    public function verifyResetCode(){
        // $id = $_SESSION['user_id'];

        $personal_m = new Personal_m();
        $res = $personal_m->getUserByEmail($this->request->getVar('email'));

        // date_default_timezone_set('Asia/Manila');
        
        $dateNow = new \DateTime();
        $timeout = new \DateTime($res->verification_validity_date);
        if($timeout > $dateNow){
            // echo 'valid';
            if($res->verification_code == $this->request->getVar('verification_code')){
            
                $session=session();
                $session->set(['temp_id' => $res->id]);
                return redirect('resetPassword');
               
            }
            $data['msg']='Verification code did not match.';
            $this->session->setFlashdata('msg', $data['msg']);
            return redirect('otp');
        }else{
            $result = $this->refreshVerificationCode();
            if($result){
                $msg = 'Your verification code is ' .$result .' .';
                $this->send_mail($res->email, $msg);
                $data['msg']='Verification code expired. New code was sent to your email.';
                $this->session->setFlashdata('msg', $data['msg']);
            }else{
                $data['msg']='Something went wrong. Pleas try again.';
            }
            
            return redirect('otp');
        }
    }

    public function resetPassword(){
        if($this->session->temp_email != null){
            $data['session'] = $this->session;
            return view('user/auth/resetPass', $data);
        }
        return redirect('home');
    }

    public function updatePass() {
        if($this->request->getVar('password') == $this->request->getVar('confirm_password')){
            $personal_m = new Personal_m();
            $res = $personal_m->resetPassword($this->request->getVar('id'), $this->request->getVar('password'));
            $this->session->destroy();
            return redirect('passwordResetSuccessful');
        }
        $data['msg']='Password not match.';
        $this->session->setFlashdata('msg', $data['msg']);
        return redirect('resetPassword');

    }

    public function passwordResetSuccessful(){
        return view('user/auth/resetPassSuccess');
    }


    //--------------- LANDING PAGE --------------//              November 26, 2022
    public function landingpage(){
        $model_product = new Product_model();
        $data['productData'] = $model_product->fetchProduct();
        return view('user/landing_page', $data);
    }

    //---------------- HOME PAGE ----------------//              November 26, 2022
    public function home(){
        
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];

        $personal_m = new Personal_m();
        $res = $personal_m->checkEmailVerification($id);

        if($res->is_verified == 0){
            return redirect('verify_email');
        }

        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
       
        return view('user/include/header', $data)
            . view('user/index')
            . view('user/include/footer', $data);
        }else{
            return $this->response->redirect(site_url('/landing_page'));
            // return redirect()->to(base_url('landing_page')); 
        }
    }

    public function verify_email(){ // verify email page
         //Load session library 
        $data['session'] = $this->session;
        return view('user/auth/verification', $data);
    }

    public function verify(){ //verify email process
        $id = $_SESSION['user_id'];

        $personal_m = new Personal_m();
        $res = $personal_m->checkEmailVerification($id);

        // date_default_timezone_set('Asia/Manila');
        
        $dateNow = new \DateTime();
        $timeout = new \DateTime($res->verification_validity_date);
        if($timeout > $dateNow){
            // echo 'valid';
            if($res->verification_code == $this->request->getVar('verification_code')){
               $msg= $personal_m->updateVerificationStatus($id);
               if($msg){
                // $data['msg']='invalid';
                return redirect('home');
               }
                $data['msg']='Something went wrong. Pleas try again.';
                $this->session->setFlashdata('msg', $data['msg']);
               return redirect('verify_email');
            }
            $data['msg']='Verification code did not match.';
            $this->session->setFlashdata('msg', $data['msg']);
            return redirect('verify_email');
        }else{
            $result = $this->refreshVerificationCode();
            if($result){
                $msg = 'Your verification code is ' .$result .' .';
                $this->send_mail($res->email, $msg);
                $data['msg']='Verification code expired. New code was sent to your email.';
                $this->session->setFlashdata('msg', $data['msg']);
            }else{
                $data['msg']='Something went wrong. Pleas try again.';
            }
            
            return redirect('verify_email');
        }
    }

    public function refreshVerificationCode($email = ''){
        $id="";
        if($email == ''){
            $id = $_SESSION['user_id'];
        }else{
            $user = new Personal_m();
            $exist = $user->getUserByEmail($email);
            $id = $exist->id;
        }
        
        $verification_code = mt_rand(000000, 999999);
        $date = Date('Y-m-d h:i:s a');
        $validity = Date('Y-m-d h:i:s a', strtotime($date. ' +5 minutes'));
        $personal_m = new Personal_m();
        $res = $personal_m->refreshVerificationCode($id, $verification_code, $validity);
        
        if($res)
        return $verification_code;
    }

    //------------- INSERT CART DATA ------------//              November 27, 2022
    public function add_cart(){     
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
            helper(['form', 'url']);
            $val = $this->validate([
                            
            ]);
        
            $model = new Cart_m();
            $qty ='1';
            // var_dump($_SESSION['user_id']);
            $model->insert([
                'user_id' => $_SESSION['user_id'],
                'occasion' => $this->request->getVar('occasion'),
                'flavor' => $this->request->getVar('flavor'),
                'total_price' => $this->request->getVar('price'), 
                'price' => $this->request->getVar('price'),
                'quantity' => $qty,
                'product_id' => $this->request->getVar('pid'),
            ]);         
            return redirect('cart');
        }else{
            return $this->response->redirect(site_url('signin'));
        }                        
            
    }
            
    //------------- DELETE CART DATA ------------//              November 27, 2022
    public function CartData_delete($id){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
            $session = session();
            $model = new Cart_m();
            $model->cart_delete($id);

            $session->setFlashdata('msg', 'Deleted Successfully!');
            return redirect('cart');
        }else{
            return $this->response->redirect(site_url('signin'));
        } 
    }

    //------------- FETCH ABOUT DATA ------------//              November 28, 2022
    public function about(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct($id);
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/about')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //------------- FETCH CONTACT PAGE ----------//              November 28, 2022
    public function contact(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
        
        return view('user/include/header', $data)
            . view('user/contact')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }
    
    //------------- FETCH POPULAR CAKE ----------//              November 28, 2022
    public function popular(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_cart = new Cart_m();
        $model = new Product_model();
        $occasion = "Birthday";
        // $data['cartData']= $model->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        $data['cartData'] = $model_cart->getCartData($id);

        $total = $model_cart->getCartData($id);
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        echo view('user/include/header', $data)
            . view('user/popular')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //------------- FETCH BIRTHDAY CAKE ---------//              November 29, 2022
    public function getBDay(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Birthday";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/birthday')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //---------- FETCH CHRISTENING CAKE ---------//              November 29, 2022
    public function getChristening(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Christening";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/birthday')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //------------ FETCH CHRISTMAS CAKE ---------//              November 29, 2022
    public function getChristmas(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Christmas";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/birthday')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //----------- FETCH GRADUATION CAKE ---------//              November 29, 2022
    public function getGrad(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Graduation";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/birthday')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //------------ FETCH HALLOWEEN CAKE ---------//              November 29, 2022
    public function getHalloween(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Halloween";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/birthday')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //------------- FETCH NEWYEAR CAKE ----------//              November 29, 2022
    public function getNewYear(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "New Year";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/birthday')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //------------ FETCH VALENTINE CAKE ---------//              November 29, 2022
    public function getValentine(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Valentine";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/birthday')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //------------- FETCH WEDDING CAKE ----------//              November 29, 2022
    public function getWedding(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Wedding";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/birthday')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }
   
    //-------------- FETCH CART DATA ------------//              December 13,2022 
    public function cart(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
       
        $total = $model->getCartData($id);
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
        
        return view('user/include/header', $data)
            . view('user/cart')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }
    //------- FETCH ORDER DETAILS DATA ----------//              December 20,2022 --> January 03,2023
    public function orderdetails(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $model_order = new Checkout_model();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
        $total = $model->getCartData($id);
        
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        $model_order = new Checkout_model();
        $order_code = $this->request->getPost('details');
        $data['order']= $model_order->fetchCheckoutData($id,$order_code);
        $data['status']= $model_order->getCheckout($id, $order_code);
        $data['stat']= $model_order->get($id, $order_code);

        $refund = $model_order->get($id, $order_code);
        $totalrefund = 0;
        foreach ($refund as $price) {
            $totalrefund = $price->downpayment / 2;
        }
        $data['Refund'] = $totalrefund;
        
        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
       

        return view('user/include/header', $data)
            . view('user/order_details')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //---------- UPDATE RECEIVED ORDER ----------//              December 21,2022 --> January 03,2023
    public function order_received($id){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){     
        $user_id = $_SESSION['user_id']; 
        $val = $this->validate([
            'received_status' => 'required',         
            ]);
        
        $model = new Checkout_model();
        $cart_model = new Cart_m();
        
        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('orders', $data);
        }else{
            $completed = "Completed";
            $prod_id = $this->request->getVar('cart_id');
            $rate="no";
                  
        $update_cart = $cart_model->no_rate($rate,$user_id, $prod_id);
        $model->checkout_update($completed,$id);
        
        return redirect()->to(base_url('completedorder'));   
        //var_dump($completed,$update_cart);
        }  
        } else{
            return $this->response->redirect(site_url('signin'));
        }  
    }

    public function add_rate(){     
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
            $id = $_SESSION['user_id']; 
            helper(['form', 'url']);
            $val = $this->validate([
                            
            ]);
        
            $feedback_model = new Feedback_model();
            $qty ='1';
            // var_dump($_SESSION['user_id']);
            $datum=$feedback_model->insert([
                'feedback' => $this->request->getVar('feedback'),
                'rate' => $this->request->getVar('rate'),
                'user_id' => $this->request->getVar('user_id'),
                'prod_id' => $this->request->getVar('prod_id'),
            ]);   
            
            $rate="yes";
            $cart_model = new Cart_m();
            $cart_id = $this->request->getVar('cart_id'); 
            $update_cart = $cart_model->rated($rate,$id, $cart_id); 
            //var_dump($update_cart, $datum);
            return redirect('to_rate');  
        }else{
            return $this->response->redirect(site_url('signin'));
        }                        
            
    }
    
    //------------ UPDATE CANCEL ORDER ----------//              December 21,2022 --> January 03,2023
    public function cancel_order($id){
        $val = $this->validate([
        'cancel_status' => 'required',
        'reason' => 'required',
        'refund' => 'required',         
        ]);
    
        $model = new Checkout_model();
    
        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('orders', $data);
        }else{
            $cancel=$data = array(
                'stat' => $this->request->getVar('cancel_status'),
                'reason' => $this->request->getVar('reason'),
                'refund' => $this->request->getVar('refund'),
             );              
        $model->checkout_update($data,$id);
        //var_dump($cancel);
        return redirect()->to(base_url('cancelledorder'));   
        }  
    }

    //------------ CHECKOUT PRODUCT -------------//              December 27,2022
    public function checkout(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Cart_m();
        $user_model = new Personal_m();
        $add_model = new Address_model();
        // $count_data['count_data']= $model->count_data();
        $data['cartData'] = $model->getCartData($id);
        $data['userData'] = $user_model->fetchPersonal($id);
        $data['address'] = $add_model->fetchAddress();
        $subtotal = $model->getCartData($id);
        $totalprice = 0;
        foreach ($subtotal as $price) {
            $totalprice = $totalprice + $price->price;
            $downpayment = $totalprice / 2;
            $balance = $downpayment;
        }
        $data['Total'] = $totalprice;
        $data['Downpayment'] = $downpayment;
        $data['Balance'] = $balance;

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

       // $name = $_GET['cart_product'];

        //foreach($name as $data){
           // echo $data."<br />";
           //$model = new Cart_m();
       //    $this->$model->fetchCart($data);
       // };

        return view('user/include/header', $data)
            . view('user/checkout', $data)
            . view('user/include/footer');

        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //---------------- PLACE ORDER --------------//              December 28,2022 --> January 02, 2023
    public function placeorder(){ 
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){     
            $id = $_SESSION['user_id'];                 
            helper(['form', 'url']);
        
            $val = $this->validate([ 
                'total_prices'     => 'required',
                'downpayment'     => 'required',
                'balance'         => 'required',
                'items'           => 'required',
                // 'reference'       => 'required',
            ]);
            
            #generate random code
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
            $random = $today .$rand;

           #update cart data    
           $cart_model = new Cart_m();       
            $update_cart = $cart_model->cart_update($random,$id);

            if($update_cart == true){
                #insert biller data 
                $biller_model = new Biller_model();
                $data = array(       
                        'firstname'       => $this->request->getVar('firstname'),
                        'lastname'        => $this->request->getVar('lastname'),
                        'email'           => $this->request->getVar('email'),
                        'mobile'          => $this->request->getVar('mobile'),
                        'municipality'    => $this->request->getVar('municipality'),
                        'barangay'        => $this->request->getVar('barangay'),
                        'street'          => $this->request->getVar('street'),
                        'delivery_method' => $this->request->getVar('delivery_method'),
                        'date'            => $this->request->getVar('date'),
                        'time'            => $this->request->getVar('time'),
                        'payment_method'  => $this->request->getVar('payment_method'),
                        'user_id'         => $id,       
                    ); 
                    $insert_biller = $biller_model->save_biller($data);

                    $checkout_model = new Checkout_model();
                    if (!$val) {
                        $data['validation']  = $this->validator;
                        echo "wala";
                        //echo view('checkout', $data);
                    }else{
                        $imageFile = $this->request->getFile('image');
                        $imageFile->move('tools/uploads/');

                        $isDPs = $this->request->getVar('isDP');
            
                        $datum=array(
                            'user_id'         => $id, 
                            'biller_id'       => $insert_biller,
                            'total_price'     => $this->request->getVar('total_prices'),
                            'downpayment'     => $this->request->getVar('downpayment'),
                            'shipping_fee'     => $this->request->getVar('shipping_fee'),
                            'balance'         => $this->request->getVar('balance'),
                            'items'           => $this->request->getVar('items'),
                            'payment'       => $this->request->getVar('payment'),
                            'order_code'      => $random,
                            'image' =>  $imageFile->getClientName(), /*this will get the name of file input */
                        );             
                        $insert_checkout= $checkout_model->save_checkout($datum);
                        return redirect('orders'); 
                    } 
            } 
        } else{
            return $this->response->redirect(site_url('signin'));
        }    
    }

    //---------- FETCH USER ORDERS DATA ---------//              January 04,2023
    public function userOrders(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
        $total = $model->getCartData($id);
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        $model_order = new Checkout_model();
        $data['status']= $model_order->getData($id);
        // $order_code = $this->request->getVar('details');
        // $data['status']= $model_order->getOrders($id, $order_code);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
        
        return view('user/include/header', $data)
            . view('user/user_orders')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //---------- FETCH PRODUCTLIST DATA ---------//              January 05,2023
    public function productlist(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/productlist')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //-------------- FETCH FAQ DATA -------------//              January 05,2023
    public function faq(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/faq')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //---------- FETCH PRODUCTGRID DATA ---------//              January 05,2023
    public function productgrid(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/productgrid')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }
    
    //------- FETCH PRODUCTDETAILS DATA ---------//              January 05,2023
    public function productdetails(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model_feedback = new Feedback_model();
        $model = new Cart_m();
        
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        $prod_id = $this->request->getVar('prod_id');
        $data['product'] = $model_product->getDetails($prod_id);
        $data['feedback'] = $model_feedback->fetchFeedback($prod_id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
            return view('user/include/header', $data)
                 . view('user/productdetails')
                 . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    
    }

    //-------- FETCH CUSTOMIZATION DATA ---------//              January 06,2022
    public function customization(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $model_addons = new AddOns_model();
        $model_flavor = new Flavor_model();
        $occasion = "customization";
        $data['cartData'] = $model_cart->getCartData($id);
        $datum['custom_addons']= $model_addons->fetchAddOns();
        $datum['custom_flavor']= $model_flavor->fetchFlavor();
        $datum['user_id'] = $id;
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/customization', $datum)
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
      
    }

    //-------- SAVE CUSTOMIZATION DATA ----------//              January 06,2023
    public function saveFinalDesign(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
            $id = $_SESSION['user_id'];
            $designModel = new Product_model();
            $data = $designModel->insertDesign(
                $this->request->getVar('user_id'),
                $this->request->getVar('canvas'),
                $this->request->getVar('message'),
                $this->request->getVar('flavor'),
                $this->request->getVar('price'),
            );
            $msg = array();
            if($data != null){
                $msg = ['response' => 1, 'prod_id' => $data];
            }else{
                $msg = ['response' => 0];
            }

            echo json_encode($msg);
        }
    }

    //------- FETCH CUSTOMIZED CAKE DATA --------//              January 06,2023
    public function getCustomDesign(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Customized";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getCustomized($occasion,$id); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }

        return view('user/include/header', $data)
            . view('user/customized_cake')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //------ FETCH USER CCOMPLETED ORDERS -------//              January 22,2023
    public function toRateOrder(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $model_order = new Checkout_model();
        $data['product']= $model_product->getProduct();
        $data['details']= $model_order->getDetails();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
        $data['fetchCart'] = $model->fetchCart($id);
        $total = $model->getCartData($id);
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        // $model_order = new Checkout_model();
        // $data['status']= $model_order->getDelivered($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
        
        return view('user/include/header', $data)
            . view('user/to_rate')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }
     //------ FETCH USER CCOMPLETED ORDERS -------//              January 22,2023
     public function toReceivedOrder(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $model_order = new Checkout_model();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
        $data['details']= $model_order->getDetails();
        $total = $model->getCartData($id);
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        $model_order = new Checkout_model();
        $data['status']= $model_order->getToReceived($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
        
        return view('user/include/header', $data)
            . view('user/to_received')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //------ FETCH USER CCOMPLETED ORDERS -------//              January 22,2023
    public function completedOrder(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $model_order = new Checkout_model();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
        $data['details']= $model_order->getDetails();
        $total = $model->getCartData($id);
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        $model_order = new Checkout_model();
        $data['status']= $model_order->getCompleted($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
        
        return view('user/include/header', $data)
            . view('user/completed_order')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //------ FETCH USER CANCELLED ORDERS --------//              January 22,2023
    public function cancelledOrder(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $model_order = new Checkout_model();
        $order_code = $this->request->getVar('details');
        $data['details']= $model_order->getDetails();
        $data['order']= $model_order->fetchCheckoutData($id,$order_code);
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
        $total = $model->getCartData($id);
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        $model_order = new Checkout_model();
        $data['status']= $model_order->getCancelled($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
        
        return view('user/include/header', $data)
            . view('user/cancelled_order')
            . view('user/include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //----=---- FETCH PROFILE DATA ----=---------//              February 02,2023
    public function user_profile(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
        $user_model = new Personal_m();
        $data['userData'] = $user_model->fetchPersonal($id);
        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        #count order items#
        $model_order = new Checkout_model();
        $order = $model_order->count_orders($id);
        foreach($order as $o){
            $data['order_count']= $o->count;
        }
        
        return view('user/include/header', $data)
            . view('user/user_profile')
            . view('user/include/footer', $data);
        }else{
            return $this->response->redirect(site_url('/signin'));
        }
    }

    //---------- UPDATE PROFILE DATA ------=-----//              February 05,2023
    public function profile_update($id){
        /*this will validate inputs */
        $val = $this->validate([   
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',   
            'gender' => 'required',   
            'mobile' => 'required',         
        ]);

       $model = new Personal_m();

       if (!$val) {
           $data['validation']  = $this->validator;
           echo view('profile', $data);
       }else{

           /*this will read the file from input */
           $imageFile = $this->request->getFile('profile');

           if($imageFile == ""){
               $data = array(
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'birthdate' => $this->request->getVar('birthdate'),
                    'gender' => $this->request->getVar('gender'),
                    'mobile' => $this->request->getVar('mobile'),
               );
           }else{
               /*this will upload file to folder */
               $imageFile->move('tools/uploads/');

               /*this will insert data to db */
               $data = array(
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'birthdate' => $this->request->getVar('birthdate'),
                    'gender' => $this->request->getVar('gender'),
                    'mobile' => $this->request->getVar('mobile'),
                    'profile' =>  $imageFile->getClientName(), /*this will get the name of file input */
               );             
           }
           $model->profile_update($data,$id);
           return redirect()->to(base_url('profile'));   
       }
      
    }

    //update quantity of order 	FEB 09								
    public function update_order(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
            $session = session();
        if($_POST['updateItem'] ==1){
            $id=$_POST['update_id'];
            $qty=$_POST['qty'];
            $total=$_POST['total'];
            $model = new Cart_m();
            $update = $model->cart_up($id,$qty, $total);
        }
        }else{
            return $this->response->redirect(site_url('signin'));
        } 
    }

}