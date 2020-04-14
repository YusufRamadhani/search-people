<?php

class People extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('People_model');
        $this->load->helper(array('url'));
    }

    public function index()
    {
        $data['title'] = 'List people';

        //pagination library
        $this->load->library('pagination');

        //store keyword to session
        if ($this->input->post('submit')) :
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        else :
            $data['keyword'] = $this->session->userdata('keyword');
        endif;

        //pagination config
        $this->db->like('name', $data['keyword']);
        $this->db->from('people'); // query before = select name like keyword from people
        $config['total_rows'] = $this->db->count_all_results(); //count all query before
        $config['per_page'] = 8;

        //pagination initialize
        $this->pagination->initialize($config);

        //start and offset row data to select
        $data['start'] = $this->uri->segment(3);
        $data['people'] = $this->People_model->getPeople($config['per_page'], $data['start'], $data['keyword']);

        // display view
        $this->load->view('templates/header', $data);
        $this->load->view('people/index', $data);
        $this->load->view('templates/footer');
    }
}
