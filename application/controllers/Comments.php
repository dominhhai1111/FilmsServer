<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/15/2018
 * Time: 10:21 AM
 */

class Comments extends CI_Controller
{
    public function getCommentsByFilmId($filmId)
    {
        $this->load->database();
        $sql = "Select u.email, c.content from films as f, users as u, comments as c where c.user_id = u.id AND c.film_id = f.id AND f.id = $filmId";
        $query = $this->db->query($sql);
        $comments = $query->result();
        $comments_jsonencode = json_encode($comments);

        echo $comments_jsonencode;
    }

    public function addCommentByUser($userId, $filmId, $content)
    {
        $isAdd = 1;
        $this->load->database();
        $sql = "Insert into comments (user_id, film_id, content) values ($userId, $filmId, $content)";
        $this->db->query($sql);
        if($this->db->affected_rows()) {
            $isAdd = 0;
        }
        echo $isAdd;
    }
}