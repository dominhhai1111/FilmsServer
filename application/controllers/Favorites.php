<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/5/2018
 * Time: 7:02 PM
 */
class Favorites extends CI_Controller
{
    public function getFavoritesByUserID($userId)
    {
        $this->load->database();
        $sql = "Select f.id as id, f.name as name, f.time as time, f.url as url, f.detail as detail from films as f, favorites as fa where f.id = fa.film_id AND fa.user_id = $userId";
        $query = $this->db->query($sql);
        $films = $query->result();
        $films_jsonencode = json_encode($films);

        echo $films_jsonencode;
    }

    public function addFilmToFavorite($userId, $filmId)
    {
        $isAdd = 0;
        $this->load->database();
        $sql1 = "Select fa.id from favorites as fa where fa.user_id = $userId AND fa.film_id = $filmId";
        $query1 = $this->db->query($sql1);
        if(!$query1->result()) {
            $sql2 = "Insert into favorites (user_id, film_id) values ($userId, $filmId)";
            $this->db->query($sql2);
            if($this->db->affected_rows()) {
                $isAdd = true;
            }
        }
        echo $isAdd;
    }
}