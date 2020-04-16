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

    public  function addDataPeople()
    {
        $data = array(
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "address" => $this->input->post('address')
        );

        $this->db->insert('people', $data);
    }

    public function getPeopleById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('people')->row_array();
    }

    public function editPeople($id)
    {
        $data = array(
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "address" => $this->input->post('address')
        );

        $this->db->where('id', $id);
        $this->db->update('people', $data);
    }

    public function deletePeople($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('people');
    }
}
