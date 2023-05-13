<?php
namespace App\Models;
use CodeIgniter\Model;
class Personal_m extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['profile','firstname', 'lastname','mcp', 'brgy', 'gender', 'mobile', 'birthdate', 'birthmonth', 'birthyear', 'age', 'email', 'password', 'confirm_password', 'verification_code','verification_validity_date', 'is_verified'];

    //---------- FETCH PERSONAL DATA ----------//  December 27,2022 -->Edited on December 31,2022
    public function fetchPersonal($id) {
        return $this->select('*')
					->where('id', $id)
                    ->get()->getResult();
    }

    //------------- COUNT USERS --------------//   January 14,2023
	public function count_users(){
		return $this->db->table('users')
					->select('Count(id) as count')
					->get()->getResult();
	}

    //---------- UPDATE PROFILE ----------//  February 05,2023
    public function profile_update($data,$id){
        $result = $this->db->table('users')
            ->where('id', $id)
            ->set ($data)
            ->update();

        if ($result) {
            return true;
        }
    }

    public function checkEmailVerification($id){
        $res = $this->where('id', $id)
                        ->get()->getResult();
        if($res)
            return $res[0];
    }

    public function updateVerificationStatus($id) {
        $res = $this->db->table('users')
                    ->where('id', $id)
                    ->update([
                        'is_verified' => 1,
                    ]);
        if($res)
            return true;
    }

    public function refreshVerificationCode($id, $code, $timeout){
        $data = [
            'verification_code' => $code,
            'verification_validity_date' => $timeout
        ];

        $res = $this->db->table('users')
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

        $res = $this->db->table('users')
                    ->where('id', $id)
                    ->update($data);
        if($res)
            return true;

    }


}