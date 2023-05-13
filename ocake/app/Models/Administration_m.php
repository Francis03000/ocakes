<?php
namespace App\Models;
use CodeIgniter\Model;
class Administration_m extends Model{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['profile_pic', 'firstname', 'lastname', 'email', 'password', 'verification_code', 'verification_validity_date'];

    public function checkEmailVerification($id){
        $res = $this->where('id', $id)
                        ->get()->getResult();
        if($res)
            return $res[0];
    }

    // public function updateVerificationStatus($id) {
    //     $res = $this->db->table('admin')
    //                 ->where('id', $id)
    //                 ->update([
    //                     'is_verified' => 1,
    //                 ]);
    //     if($res)
    //         return true;
    // }

    public function refreshVerificationCode($id, $code, $timeout){
        $data = [
            'verification_code' => $code,
            'verification_validity_date' => $timeout
        ];

        $res = $this->db->table('admin')
                    ->where('id', $id)
                    ->update($data);
        if($res)
            return true;
    }

    public function getUserByEmail($email){
        $res = $this->where('email', $email)
                        ->get()->getResult();
        if($res)
            return $res[0];
    }

    public function resetPassword($id, $password){
        $data = [
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ];

        $res = $this->db->table('admin')
                    ->where('id', $id)
                    ->update($data);
        if($res)
            return true;

    }
}