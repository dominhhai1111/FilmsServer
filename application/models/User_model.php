<?php 
class User_model extends CI_Model
{
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
}