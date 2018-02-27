<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/27/2018
 * Time: 4:32 PM
 */

class User extends CI_Controller
{
    public function index()
    {
        $this->load->database();
        $sql = "Select * from users";
        $query = $this->db->query($sql);
        $users = $query->result();
        $users_jsonencode = json_encode($users);
        echo $users_jsonencode;
    }
}