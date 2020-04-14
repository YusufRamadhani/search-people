<?php

class People_model extends CI_Model
{
    public function getPeople($number, $offset, $keyword = null)
    {
        if ($keyword) :
            $this->db->like('name', $keyword);
            $this->db->or_like('email', $keyword);
        endif;
        return $this->db->get('people', $number, $offset)->result_array();
    }
}
