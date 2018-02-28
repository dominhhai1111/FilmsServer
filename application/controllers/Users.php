<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/27/2018
 * Time: 4:32 PM
 */

class Users extends CI_Controller
{
    public function __contructor()
    {
        parent::__contructor();
        $this->load->model("User_model");
    }

    public function index()
    {
        $this->load->database();
        $sql = "Select * from users";
        $query = $this->db->query($sql);
        $users = $query->result();
        $users_jsonencode = json_encode($users);
        echo $users_jsonencode;
    }

    public function getAllUsers()
    {
        $this->load->database();
        $sql = "Select * from users";
        $query = $this->db->query($sql);
        $users = $query->result();
        $users_jsonencode = json_encode($users);
        echo $users_jsonencode;
    }

    public function checkUserAccount($email, $password)
    {


        // set result
        $result['user_id'] = 0;
        $result['isCorrect'] = false;
        $result['message'] = "Tài khoản không tồn tại";

        foreach($users as $user){
            if($email == $user->email){
                if($password == $user->password){
                    $result['user_id'] = $user->id;
                    $result['isCorrect'] = true;
                    $result['message'] = "Đăng nhập thành công";
                    break;
                }else{
                    $result['message'] = "Mật khẩu đăng nhập sai";
                }
            }
        }

        // json-encode result
        $result_jsonencode = json_encode($result);
        return $result_jsonencode;
    }

    public function registerUserAccount()
    {

    }
}