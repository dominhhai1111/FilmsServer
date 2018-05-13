<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/5/2018
 * Time: 7:02 PM
 */
class Favorites extends CI_Controller
{
    public function getFavoritesByUserID($user_id)
    {
        $this->load->database();
        $sql = "Select f.id as id, f.name as name, f.time as time, f.url as url from films as f, favorites as fa where f.id = fa.film_id AND fa.user_id = $user_id";
        $query = $this->db->query($sql);
        $films = $query->result();
        $films_jsonencode = json_encode($films);

        echo $films_jsonencode;
    }
}