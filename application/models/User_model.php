<?php 
class User_model extends CI_Model
{
    public $email;
    public $password;

    public function __construct()
    {
        $this->load->database();
    }

    public function getAllUsers()
    {
        $sql = "Select * from users";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function createNewUser()
    {
        $this->email = $this->input->post("email");
        $this->password = $this->input->post("password");
        $this->db->insert('users', $this);
    }
}