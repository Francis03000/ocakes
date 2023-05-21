<?php
namespace App\Controllers;
use App\Models\Administration_m;
use App\Models\Cart_m;
use App\Models\Personal_m;
use App\Models\Checkout_model;
use App\Models\Product_model;
use App\Models\AddOns_model;
use App\Models\Flavor_model;
use App\Models\Category_model;

class Admin extends BaseController
{   
    protected $session;
    public function __construct(){
        $this->session = \Config\Services::session();
    }

    //*********s************************* NEW TEMPLATE **********************************************//
    //----------------- SIGNIN PAGE ----------------//           November 25,2022
    public function signin(){
        return view('admin/login');
    }
    
    //------------- DEFAULT ADMIN DATA -------------//           November 25,2022
    public function restore_default_admin(){
        $administration_m = new Administration_m();
        $default_email = "admin@gmail.com";
        $default_pass = "admin123"; 
        $default_Fname = "admin";
        $default_Lname = "admin";
        $_POST['email'] = $default_email;
        $_POST['firstname'] = $default_Fname;
        $_POST['lastname'] = $default_Lname;
        $_POST['password'] = password_hash($default_pass, PASSWORD_BCRYPT);
        $administration_m->insert($_POST);
        return $this->response->redirect(site_url('admin-signin'));
    }

    //---------------- ADMIN LOGIN -----------------//           November 25,2022
    public function login(){
        $data = $this->exists($_POST['email'], $_POST['password']);
        if( $data != null) {
            $session=session();
            $admin_session = [
                'admin_id'    => $data->id,
                'adminF_name' => $data->firstname,
                'adminL_name' => $data->lastname,
                'admin_email' => $data->email,
                'profile' => $data->profile_pic,
                'logged_in'  => true,
                'type'       => "admin",
            ]; 
            $this->session->set($admin_session);
            // var_dump($data);
            /*
            $session->admin_id;            // way to get the declared session
            */
            $this->session->set('email', $_POST['email']);
            return $this->response->redirect(site_url('admin/dashboard'));
        }else
        {
            $data['msg']='invalid';
            return view('admin/login', $data);
            
        }
    }
    
    //---------- CHECK LOGIN CREDENTIALS -----------//           November 25,2022
    private function exists($email, $password){
        $administration_m = new Administration_m();
        $administration = $administration_m->where('email', $email)->get()->getResult();
        
        if ($administration !=NULL) {
            if (password_verify($password, $administration[0]->password)) {
                return $administration[0];
            }
        }
    }

    //---------------- FORGOTPASSWORD --------------//           November 25,2022
    public function forgotpassword(){
        $data['session'] = $this->session;
        return view('admin/forgotpassword', $data);
    }

    //----------------- RESET CODE -----------------//
    public function sendAdminResetCode() {
        $user = new Administration_m();
        $exist = $user->getUserByEmail($this->request->getVar('email'));

        if($exist){
            $res = $this->refreshVerificationCode($this->request->getVar('email'));
            $msg = 'Your reset code is ' .$res .' .';
            $session=session();
            $this->send_mail($this->request->getVar('email'), $msg);
            $session->set(['temp_email'=> $this->request->getVar('email')]);
            return redirect('admin/otp');
        }

        $data['msg']='Email does not exist.';
        $this->session->setFlashdata('msg', $data['msg']);
        return redirect('forgotpassword');
    }

    //--------------------- OTP --------------------//
    public function otp() {
        if($this->session->temp_email != null){
            $data['session'] = $this->session;
            return view('admin/auth/otp', $data);
        }
        return redirect('forgotpassword');
    }

    //----------------- VERIFY CODE ----------------//
    public function verifyResetCode(){
        // $id = $_SESSION['user_id'];

        $personal_m = new Administration_m();
        $res = $personal_m->getUserByEmail($this->request->getVar('email'));

        // date_default_timezone_set('Asia/Manila');
        
        $dateNow = new \DateTime();
        $timeout = new \DateTime($res->verification_validity_date);
        if($timeout > $dateNow){
            // echo 'valid';
            if($res->verification_code == $this->request->getVar('verification_code')){
            
                $session=session();
                $session->set(['temp_id' => $res->id]);
                return redirect('admin/resetPassword');
               
            }
            $data['msg']='Verification code did not match.';
            $this->session->setFlashdata('msg', $data['msg']);
            return redirect('admin/otp');
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
            
            return redirect('admin/otp');
        }
    }

    //---------------- REFRESH CODE ----------------//
    public function refreshVerificationCode($email = ''){
        $id="";
        if($email == ''){
            $id = $_SESSION['admin_id'];
        }else{
            $user = new Administration_m();
            $exist = $user->getUserByEmail($email);
            $id = $exist->id;
        }
        
        $verification_code = mt_rand(000000, 999999);
        $date = Date('Y-m-d h:i:s a');
        $validity = Date('Y-m-d h:i:s a', strtotime($date. ' +5 minutes'));
        $personal_m = new Administration_m();
        $res = $personal_m->refreshVerificationCode($id, $verification_code, $validity);
        // return $id;
        if($res)
        return $verification_code;
    }

    //------------------ SEND MAIL -----------------//
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

    //----------------- RESET PASS -----------------//
    public function resetPassword(){
        if($this->session->temp_email != null){
            $data['session'] = $this->session;
            return view('admin/auth/resetPass', $data);
        }
        return redirect('admin');
    }

    //----------------- UPDATE PASS ----------------//
    public function updatePass() {
        if($this->request->getVar('password') == $this->request->getVar('confirm_password')){
            $personal_m = new Administration_m();
            $res = $personal_m->resetPassword($this->request->getVar('id'), $this->request->getVar('password'));
            $this->session->destroy();
            return redirect('admin/passwordResetSuccessful');
        }
        $data['msg']='Password not match.';
        $this->session->setFlashdata('msg', $data['msg']);
        return redirect('admin/resetPassword');

    }

    //-------------- RESET SUCCESSFUL --------------//
    public function passwordResetSuccessful(){
        // echo 'success';
        return view('admin/auth/resetPassSuccess');
    }

    //---------------- ADMIN LOGOUT ----------------//           November 25,2022
    public function logout(){
        $session=session();
        $session->destroy();
        return redirect()->to(base_url('/admin'));
    }

    //-------------- ADMIN DASHBOARD ---------------//            November 29,2022
    public function dashboard1(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
             #count users#
             $model = new Personal_m();
             $users = $model->count_users();
             foreach($users as $u){
                 $data['users_count']= $u->count;
             }
 
              #count earnings#
              $checkout_model = new Checkout_model();
              $earnings = $checkout_model->count_earnings();
              foreach($earnings as $e){
                  $data['earnings_count']= $e->sum;
              }
 
             #count products#
             $product_model = new Product_model();
             $products = $product_model->count_products();
             foreach($products as $pd){
                 $data['product_count']= $pd->count;
             }
 
             #count addons#
             $addons_model = new AddOns_model();
             $addons = $addons_model->count_addons();
             foreach($addons as $a){
                 $data['addons_count']= $a->count;
             }
 
             #count pending orders#
             $checkout_model = new Checkout_model();
             $pending = $checkout_model->count_pending();
             foreach($pending as $p){
                 $data['pending_count']= $p->count;
             }
 
             #count shipped orders#
             $checkout_model = new Checkout_model();
             $shipped = $checkout_model->count_shipped();
             foreach($shipped as $s){
                 $data['shipped_count']= $s->count;
             }
             #count cancelled orders#
             $checkout_model = new Checkout_model();
             $cancelled = $checkout_model->count_cancelled();
             foreach($cancelled as $cc){
                 $data['cancelled_count']= $cc->count;
             }
 
             #count completed orders#
             $checkout_model = new Checkout_model();
             $completed = $checkout_model->count_completed();
             foreach($completed as $c){
                 $data['completed_count']= $c->count;
             }
             $checkout_model = new Checkout_model();
             $data['monthly'] = $checkout_model->monthly_earnings();
             $data['yearly'] = $checkout_model->yearly_earnings();
             $data['weekly'] = $checkout_model->weekly_earnings();
             $data['total'] = $checkout_model->total_earnings();
             
             $product_model = new Product_model();
             $data['newProduct'] = $product_model->getNewAddedProduct();
             $data['grossing'] = $checkout_model->grossingProduct();
             $data['topBarangay'] = $checkout_model->mostBarangay();
                // var_dump($data['topBarangay']['count']);
            // var_dump($session->admin_id);
           
            return view('admin/dashboard', $data);
        }else
            return redirect()->to(base_url('/admin'));
    }

    //-------------- ADD PRODUCT DATA --------------//            November 29,2022
    public function addproduct(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            helper(['form', 'url']);
    
        /*this will validate inputs */
        $val = $this->validate([
            'product_code' => 'required',
            'occasion' => 'required',
            'product_name' => 'required',
            'flavor' => 'required',
            'price' => 'required',
            'status' => 'required',
            'stock' => 'required',
            'availability' => 'required',
        ]);
        $model = new Product_model();
    
        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('admin/productlist', $data);
        }else{
    
            /*this will read the file from input */
            $imageFile = $this->request->getFile('image');
    
            if($imageFile == ""){
                $model->insert([
                    'product_code' => $this->request->getVar('product_code'),
                    'occasion' => $this->request->getVar('occasion'),
                    'product_name' => $this->request->getVar('product_name'),
                    'cat_id' => $this->request->getVar('cat_id'),
                    'flavor' => $this->request->getVar('flavor'),
                    'status' => $this->request->getVar('status'),
                    'price' => $this->request->getVar('price'),
                    'availability' => $this->request->getVar('availability'),
                    'stock' => $this->request->getVar('stock'),
                ]);
            }else{
                /*this will upload file to folder */
                $imageFile->move('tools/uploads/');

                /*this will insert data to db */
                $insert=$model->insert([
                    'product_code' => $this->request->getVar('product_code'),
                    'occasion' => $this->request->getVar('occasion'),
                    'product_name' => $this->request->getVar('product_name'),
                    'cat_id' => $this->request->getVar('cat_id'),
                    'flavor' => $this->request->getVar('flavor'),
                    'status' => $this->request->getVar('status'),
                    'price' => $this->request->getVar('price'),
                    'availability' => $this->request->getVar('availability'),
                    'stock' => $this->request->getVar('stock'),
                    'image' =>  $imageFile->getClientName(), /*this will get the name of file input */
                ]);             
            }           
            return redirect()->to(base_url('/admin/productlist')); 
            // var_dump($insert);
        }
           
        }else
        return redirect()->to(base_url('/admin'));
    }

    //------------ FETCH PRODUCT LIST -------------//            November 29,2022
    public function productlist(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            $model = new Product_model();
            $category_model = new Category_model();
            $flavor_model = new Flavor_model();
            $data['flavor']= $flavor_model->fetchFlavor();
            $data['category']= $category_model->fetchCategory();
            $data['product']= $model->getProduct();
            return view('admin/productlist', $data);
        }else
        return redirect()->to(base_url('/admin'));
    }

    //------------ DELETE PRODUCT DATA ------------//            November 28,2022
    public function delete_product($id){
        $session = \Config\Services::session();
        $model = new Product_model();
        $model->prod_delete($id);

        $session->setFlashdata('msg', 'Deleted Successfully!');
        return redirect('admin/productlist');
    }

    //------------ UPDATE PRODUCT DATA ------------//            November 29,2022
    public function update_product($id){
        /*this will validate inputs */
        $val = $this->validate([
                'product_code' => 'required',
                'cat_id' => 'required',
                'occasion' => 'required',
                'product_name' => 'required',
                'flavor' => 'required',
                'price' => 'required',
                'status' => 'required',
                'stock' => 'required',
                'availability' => 'required',             
        ]);

        $model = new Product_model();

        if (!$val) {
            $data['validation']  = $this->validator;
            return redirect()->to(base_url('/admin/productlist')); 
        }else{

            /*this will read the file from input */
            $imageFile = $this->request->getFile('image');

            if($imageFile == ""){
                $data = array(
                    'product_code' => $this->request->getVar('product_code'),
                    'occasion' => $this->request->getVar('occasion'),
                    'cat_id' => $this->request->getVar('categ_id'),
                    'product_name' => $this->request->getVar('product_name'),
                    'flavor' => $this->request->getVar('flavor'),
                    'status' => $this->request->getVar('status'),
                    'price' => $this->request->getVar('price'),
                    'availability' => $this->request->getVar('availability'),
                    'stock' => $this->request->getVar('stock'),
                );
            }else{
                /*this will upload file to folder */
                $imageFile->move('tools/uploads/');

                /*this will insert data to db */
                $data = array(
                    'product_code' => $this->request->getVar('product_code'),
                    'occasion' => $this->request->getVar('occasion'),
                    'cat_id' => $this->request->getVar('categ_id'),
                    'product_name' => $this->request->getVar('product_name'),
                    'flavor' => $this->request->getVar('flavor'),
                    'status' => $this->request->getVar('status'),
                    'price' => $this->request->getVar('price'),
                    'availability' => $this->request->getVar('availability'),
                    'stock' => $this->request->getVar('stock'),
                    'image' =>  $imageFile->getClientName(),/*this will get the name of file input */
                );             
            }
            $insert=$model->prod_update($data,$id);
            // var_dump($data);
                return redirect()->to(base_url('/admin/productlist')); 
        }
    }

    //------------- ADD CATEGORY DATA -------------//            November 29,2022
    public function addcategory(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            helper(['form', 'url']);

            /*this will validate inputs */
            $val = $this->validate([
                'category_name' => 'required',
                'status' => 'required',
            ]);
    
            $model = new Category_model();
    
            if (!$val) {
                $data['validation']  = $this->validator;
                echo view('admin/categorylist', $data);
            }else{
    
                $imageFile = $this->request->getFile('cat_image');

                if($imageFile == ""){
                    $model->insert([
                        'category_name' => $this->request->getVar('category_name'),
                        'status' => $this->request->getVar('status'),
                    ]);
                }else{
                    /*this will upload file to folder */
                    $imageFile->move('tools/uploads/');
    
                    /*this will insert data to db */
                    $model->insert([
                        'category_name' => $this->request->getVar('category_name'),
                        'status' => $this->request->getVar('status'),
                        'cat_image' =>  $imageFile->getClientName(), /*this will get the name of file input */
                    ]);             
                }  
                
                return redirect()->to(base_url('/admin/categorylist'));
                }
        }else
        return redirect()->to(base_url('/admin'));
    }

    //------------ FETCH CATEGORY LIST ------------//            November 29,2022
    public function categorylist(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            $model = new Category_model();
            $data['category']= $model->fetchCategory();
            return view('admin/categorylist', $data);
        }else
        return redirect()->to(base_url('/admin'));
    }

    //------------ DELETE CATEGORY DATA -----------//            November 28,2022
    public function delete_category($id){
        $session = \Config\Services::session();
        $model = new Category_model();
        $model->cat_delete($id);

        $session->setFlashdata('msg', 'Deleted Successfully!');
        return redirect('admin/categorylist');
    }

    //----------- UPDATE CATEGORY DATA ------------//            November 29,2022
    public function update_category($id){
        /*this will validate inputs */
            $val = $this->validate([
                    'category_name' => 'required',
                    'status' => 'required',
            ]);

        $model = new Category_model();

        if (!$val) {
            $data['validation']  = $this->validator;
            return redirect()->to(base_url('/admin/categorylist')); 
        }else{

            /*this will read the file from input */
            $imageFile = $this->request->getFile('image');

            if($imageFile == ""){
                $data = array(
                    'category_name' => $this->request->getVar('category_name'),
                    'status' => $this->request->getVar('status'),
                );
            }else{
                /*this will upload file to folder */
                $imageFile->move('tools/uploads/');

                /*this will insert data to db */
                $data = array(
                    'category_name' => $this->request->getVar('category_name'),
                    'status' => $this->request->getVar('status'),
                    'image' =>  $imageFile->getClientName(),/*this will get the name of file input */
                );             
            }
            $model->cat_update($data,$id);
            return redirect()->to(base_url('/admin/categorylist')); 
        }
    }

    //-------------- ADD FLAVOR DATA --------------//            November 29,2022
    public function addflavor(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            helper(['form', 'url']);

            /*this will validate inputs */
            $val = $this->validate([
                'flavor' => 'required',
                'flavor_status' => 'required',
            ]);
    
            $model = new Flavor_model();
    
            if (!$val) {
                $data['validation']  = $this->validator;
                echo view('admin/flavorlist', $data);
            }else{
    
                $imageFile = $this->request->getFile('flavor_image');

                if($imageFile == ""){
                    $model->insert([
                        'flavor' => $this->request->getVar('flavor'),
                        'flavor_status' => $this->request->getVar('flavor_status'),
                    ]);
                }else{
                    /*this will upload file to folder */
                    $imageFile->move('tools/uploads/');
    
                    /*this will insert data to db */
                    $model->insert([
                        'flavor' => $this->request->getVar('flavor'),
                        'flavor_status' => $this->request->getVar('flavor_status'),
                        'flavor_image' =>  $imageFile->getClientName(), /*this will get the name of file input */
                    ]);             
                }  
                return redirect()->to(base_url('/admin/flavorlist'));
            }
        }else
            return redirect()->to(base_url('/admin'));
    }

    //------------- FETCH FLAVOR LIST -------------//            November 29,2022
    public function flavorlist(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            $model = new Flavor_model();
            $data['flavor']= $model->fetchFlavor();
            return view('admin/flavorlist', $data);
        }else
        return redirect()->to(base_url('/admin'));
    }

    //------------- DELETE FLAVOR DATA ------------//            November 28,2022
    public function delete_flavor($id){
        $session = \Config\Services::session();
        $model = new Flavor_model();
        $model->flavor_delete($id);

        $session->setFlashdata('msg', 'Deleted Successfully!');
        return redirect('admin/flavorlist');
    }

    //------------- UPDATE FLAVOR DATA ------------//            November 29,2022
    public function update_flavor($id){
        /*this will validate inputs */
        $val = $this->validate([
                'flavor' => 'required',
                'flavor_status' => 'required',
        ]);

        $model = new Flavor_model();

        if (!$val) {
            $data['validation']  = $this->validator;
            return redirect()->to(base_url('/admin/flavorlist')); 
        }else{

            /*this will read the file from input */
            $imageFile = $this->request->getFile('flavor_image');

            if($imageFile == ""){
                $data = array(
                    'flavor' => $this->request->getVar('flavor'),
                    'flavor_status' => $this->request->getVar('flavor_status'),
                );
            }else{
                /*this will upload file to folder */
                $imageFile->move('tools/uploads/');

                /*this will insert data to db */
                $data = array(
                    'flavor' => $this->request->getVar('flavor'),
                    'flavor_status' => $this->request->getVar('flavor_status'),
                    'flavor_image' =>  $imageFile->getClientName(),/*this will get the name of file input */
                );             
            }
            $model->flavor_update($data,$id);
            return redirect()->to(base_url('/admin/flavorlist')); 
        }
    }

    //------------- FETCH ADDONS LIST -------------//            November 29,2022
    public function addonslist(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            $model = new AddOns_model();
            $data['addons']= $model->fetchAddOns();
            return view('admin/addonslist', $data);
        }else
        return redirect()->to(base_url('/admin'));
    }

    //------------- INSERT ADDONS DATA ------------//            December 18,2022
    public function add_add_ons(){                              
        helper(['form', 'url']);

        /*this will validate inputs */
        $val = $this->validate([
            'quantity' => 'required',
            'description' => 'required',
            'price' => 'required',
            'addons_status' => 'required',
            'add_cat' => 'required',
        ]);

        $model = new AddOns_model();

        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('admin/addonslist', $data);
        }else{

            /*this will read the file from input */
            $imageFile = $this->request->getFile('image');

            if($imageFile == ""){
                $model->insert([
                    'quantity' => $this->request->getVar('quantity'),
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'addons_status' => $this->request->getVar('addons_status'),
                    'add_cat' => $this->request->getVar('add_cat'),
                ]);
            }else{
                /*this will upload file to folder */
                $imageFile->move('tools/uploads/');

                /*this will insert data to db */
                $model->insert([
                    'quantity' => $this->request->getVar('quantity'),
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'addons_status' => $this->request->getVar('addons_status'),
                    'add_cat' => $this->request->getVar('add_cat'),
                    'image' =>  $imageFile->getClientName(), /*this will get the name of file input */
                ]);             
            }           
            return redirect()->to(base_url('admin/addonslist')); 
        }
    }

    //------------- UPDATE ADDONS DATA ------------//            December 18,2022
    public function update_addons($id){
        /*this will validate inputs */
        $val = $this->validate([
            'quantity' => 'required',
            'description' => 'required',
            'price' => 'required',
            'addons_status' => 'required', 
            'add_cat' => 'required',          
        ]);

       $model = new AddOns_model();

       if (!$val) {
           $data['validation']  = $this->validator;
           echo view('admin/addonslist', $data);
       }else{

           /*this will read the file from input */
           $imageFile = $this->request->getFile('image');

           if($imageFile == ""){
               $data = array(
                    'quantity' => $this->request->getVar('quantity'),
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'addons_status' => $this->request->getVar('addons_status'),
                    'add_cat' => $this->request->getVar('add_cat'),
               );
           }else{
               /*this will upload file to folder */
               $imageFile->move('tools/uploads/');

               /*this will insert data to db */
               $data = array(
                    'quantity' => $this->request->getVar('quantity'),
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'addons_status' => $this->request->getVar('addons_status'),
                    'add_cat' => $this->request->getVar('add_cat'),
                    'image' =>  $imageFile->getClientName(), /*this will get the name of file input */
               );             
           }
           $model->addons_update($data,$id);
           return redirect()->to(base_url('admin/addonslist'));   
       }
      
    }

    //------------- DELETE ADDONS DATA ------------//            December 18,2022
    public function delete_addons($id){
        $session = \Config\Services::session();
        $model = new AddOns_model();
        $model->addons_delete($id);

        $session->setFlashdata('msg', 'Deleted Successfully!');
        return redirect('admin/addonslist');
    }
    
    //---------------- FETCH POS----- -------------//
    public function pos(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){

            $model = new Product_model();
            $id = $this->request->getVar('cat');
            $data['pro']= $model->getProduct();
            $data['prod']= $model->getProductData();
            // $Bday = "Birthday";
            // $Wedding = "Wedding";
            // $Graduation = "Graduation";
            // $Christening = "Christening";
            // $Valentine = "Valentine";
            // $Halloween = "Halloween";
            // $Christmas = "Christmas";
            // $NewYear = "New Year";
            // $data['bday']= $model->getBDay($Bday);
            // $data['wedding']= $model->getWedding($Wedding); 
            // $data['graduation']= $model->getWedding($Graduation); 
            // $data['christening']= $model->getWedding($Christening); 
            // $data['valentine']= $model->getWedding($Valentine); 
            // $data['halloween']= $model->getWedding($Halloween); 
            // $data['xmas']= $model->getWedding($Christmas); 
            // $data['newyear']= $model->getWedding($NewYear); 
            $data['product']= $model->getProduct();

            $category_model = new Category_model();
            $data['category']= $category_model->fetchCategory();
            return view('admin/pos', $data);
        }else{
            return redirect()->to(base_url('/admin'));
        }
    }
    
    //-------------- FETCH SALESLIST --------------//
    public function saleslist(){
        $session= session();
        if($session->logged_in == true && $session->type == "admin"){
            $id = $_SESSION['admin_id'];
            $model = new Checkout_model();
            $model_cart = new Cart_m();
            $data['sales']= $model->getCheckoutData();
            $data['details']= $model->getDetails();
            $data['order']= $model->getCheckoutData();
            
             #count cart items#
            // $cart = $model_cart->count_data($id);
            // foreach($cart as $c){
            //     $data['cart_count']= $c->count;
            // }
            return view('admin/saleslist',$data);
        }  
        else{
            return redirect()->to(base_url('/admin'));
        }  
    }

    //------------- UPDATE ORDER DATA -------------//            December 11,2022 --> January 03,2023
    public function update_sales($id){
        /*this will validate inputs */
        $val = $this->validate([
       'stat' => 'required',         
        ]);

       $model = new Checkout_model();

       if (!$val) {
           $data['validation']  = $this->validator;
           echo view('admin/saleslist', $data);
       }else{
            $data = array(
                'stat' => $this->request->getVar('stat'),
            );              
        $model->checkout_update($data,$id);
        return redirect()->to(base_url('admin/saleslist/'));   
       }  
    }
   
   //------------ FETCH VISUALIZATION -------------// 
    public function visualization(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            $model = new Product_model();
            $data['product']= $model->getProduct();
            $checkout_model = new Checkout_model();
            $data['topBarangay'] = $checkout_model->mostBarangay();
            $data['newProduct'] = $model->getNewAddedProduct();
            $data['grossing'] = $checkout_model->grossingProduct();
            $data['monthlySold'] = $checkout_model->monthlySold();
            $data['weeklySold'] = $checkout_model->weeklySold();
            $data['yearlySold'] = $checkout_model->yearlySold();
            // var_dump($data['yearlySold']);
            return view('admin/visualization2', $data);
        }else
        return redirect()->to(base_url('/admin'));
    }


    //**********************************************************************************//
    public function chartjs(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            $model = new Product_model();
            $data['product']= $model->getProduct();
            return view('admin/chartjs', $data);
        }else
        return redirect()->to(base_url('/admin'));
    }
    public function morris(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            $model = new Product_model();
            $data['product']= $model->getProduct();
            return view('admin/chart-morris', $data);
        }else
        return redirect()->to(base_url('/admin'));
    }
    public function peity(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            $model = new Product_model();
            $data['product']= $model->getProduct();
            return view('admin/chart-peity', $data);
        }else
        return redirect()->to(base_url('/admin'));
    }
    public function flot(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            $model = new Product_model();
            $data['product']= $model->getProduct();
            return view('admin/chart-flot', $data);
        }else
        return redirect()->to(base_url('/admin'));
    }
    //-------------SEAARCH PRODUCT IN POS -----------//
    // public function search() {
    //     $category = $this->input->post('category');
    //     $keyword = $this->input->post('keyword');
    //     $data['results'] = $this->Category_model->search($category, $keyword); // replace with your model and method name
    //     $this->load->view('search_results', $data); // create a view file for the search results
    // }

    
}