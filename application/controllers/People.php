<?php

class People extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('People_model');
        $this->load->helper(array('url'));
        $this->load->library('form_validation');
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

    public function add()
    {
        $data['title'] = 'Add Data People';

        // form rules config
        $this->form_validation->set_rules('name', 'name people', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'alpha_numeric');

        if ($this->form_validation->run() == FALSE) :
            // display view
            $this->load->view('templates/header', $data);
            $this->load->view('people/add', $data);
            $this->load->view('templates/footer');
        else :
            $this->People_model->addDataPeople();
            $this->session->set_flashdata('flash', 'added');
            redirect('people');
        endif;
    }

    public function detail($id)
    {
        $data['title'] = 'Detail data';

        $data['people'] = $this->People_model->getPeopleById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('people/detail', $data);
        $this->load->view('templates/footer');
    }
}
