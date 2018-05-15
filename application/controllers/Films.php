<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Films extends CI_Controller {
    
    public function index()
    {
        return;
    }

    public function getAllCats()
    {
        $this->load->database();
        $sql = "Select * from categories";
        $query = $this->db->query($sql);
        $cats = $query->result();
        $cats_jsonencode = json_encode($cats);

        echo $cats_jsonencode;
    }

    public function getAllFilms()
    {
        $this->load->database();
        $sql = "Select * from films;";
        $query = $this->db->query($sql);
        $films = $query->result();
        $films_jsonencode = json_encode($films);

        echo $films_jsonencode;
    }

    public function getFilmsByCategory($cat_id)
    {
        $this->load->database();
        $sql = "Select f.id as id, f.name as name, f.time as time, f.url as url, f.detail as detail from films as f, categories as c, links as l where f.id = l.film_id AND c.id = l.cat_id AND c.id = $cat_id";
        $query = $this->db->query($sql);
        $films = $query->result();
        $films_jsonencode = json_encode($films);

        echo $films_jsonencode;
    }
}
