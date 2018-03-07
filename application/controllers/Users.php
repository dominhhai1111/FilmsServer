<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/27/2018
 * Time: 4:32 PM
 */

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
    }

    public function index()
    {
        $users = $this->user_model->getAllUsers();
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

    public function checkLogin($email, $password)
    {
        $users = $this->user_model->getAllUsers();
        // set result
        $result['user_id'] = 0;
        $result['isLogin'] = false;
        $result['message'] = "Tài khoản không tồn tại";

        foreach($users as $user){
            if($email == $user->email){
                if($password == $user->password){
                    $result['user_id'] = $user->id;
                    $result['isLogin'] = true;
                    $result['message'] = "Đăng nhập thành công";
                    break;
                }else{
                    $result['message'] = "Mật khẩu đăng nhập sai";
                }
            }
        }

        // json-encode result
        $result_jsonencode = json_encode($result);
        echo $result_jsonencode;
    }

    public function registerUserAccount()
    {
        $this->load->helper('form');
        $this->load->view("users/register_form");
    }

    public function checkRegisterUserAccount()
    {
        $this->load->helper('url');

        $users = $this->user_model->getAllUsers();
        $email_input = $this->input->post("email");

        $result['isRegisted'] = true;
        $result['message'] = "Đăng ký thành công";

        //check email exist
        foreach($users as $user){
            if($email_input == $user->email){
                $result['isRegisted'] = false;
                $result['message'] = "Địa chỉ mail đã tồn tại";
                echo json_encode($result);
            }
        }

        if($result['isRegisted']){
            //insert new account
            $this->user_model->createNewUser();

            echo json_encode($result);
        }
    }

}