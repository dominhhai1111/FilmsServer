<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Films extends CI_Controller {
    
    public function index()
    {
        return;
    }

    public function getAllFilms()
    {
        $this->load->database();
        $sql = "Select * from films;";
        $query = $this->db->query($sql);
        $films = $query->result();
        $films_jsonencode = json_encode($films);
        $films_jsondecode = json_decode($films_jsonencode);

        echo $films_jsonencode;
    }
}
