<?php

class admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->database();
        $this->load->model('admin_model');
        $this->load->library('pagination');
    }

    public function add_employee() {

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Repeat Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('add-employees');
            $this->load->view('footer');
        } else {
            $data = array(
                'location' => $this->input->post('location'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'role' => $this->input->post('role'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'sector' => $this->input->post('sector'),
            );
            if ($this->admin_model->insertUser($data)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! New Employee has been added.</div>');
                redirect('admin/add_employee');
            }
            $this->load->view('add-employees', $data);
        }
    }

    public function add_project() {
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[25]');
   
        $this->form_validation->set_rules('skillsRequired', 'Skills Required', 'min_length[1]|max_length[55]');

        $this->form_validation->set_error_delimiters('<span>', '</span>');

        if ($this->form_validation->run() == FALSE) {
            /*$data['skills'] = $this->admin_model->getSkills();*/
            $this->load->view('header');
            $this->load->view('add-projects');
            $this->load->view('footer');
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'endDate' => $this->input->post('endDate'),
                'startDate' => $this->input->post('startDate'),
                'skillsRequired' => $this->input->post('skillsRequired'),
                'description' => $this->input->post('description'),
                'projectType' => $this->input->post('projectType'),
                'projLocation' => $this->input->post('projLocation'),
            );

            if ($this->admin_model->insertProjects($data)) {
                $this->session->set_flashdata('msg-p', '<div class="alert alert-success" role="alert">Success! New Project has been added.</div>');
                redirect('admin/add_project');
            }
            $this->load->view('add-projects', $data);
        }
    }

    public function view_employees() {
        $this->page();
    }

    function page() {
        $config = array();
        $config['base_url'] = base_url() . 'admin/page';
        $total_row = $this->admin_model->record_count();
        $config['total_rows'] = $total_row;
        $config['per_page'] = 8;
        $config['uri_segment'] = 3;
        /* $config['use_page_numbers'] = TRUE; */
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $data['results'] = $this->admin_model->fetch_users($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;', $str_links);

// View data according to array.
        $this->load->view('view-employees', $data);
    }
    
    public function delete() {
        $data['results'] = $this->model->show_users();
        $this->load->view('view-employees', $data);
    }

    function delete_row($username) {
        $this->db->where('username', $username);
        $this->db->delete('users');
        redirect('admin/view_employees');
    }

    public function view_projects() {
        $this->ppage();
    }
    
        function ppage() {
        $config = array();
        $config['base_url'] = base_url() . 'admin/ppage';
        $total_row = $this->admin_model->count_project();
        $config['total_rows'] = $total_row;
        $config['per_page'] = 8;
        $config['uri_segment'] = 3;
        /* $config['use_page_numbers'] = TRUE; */
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $data['results'] = $this->admin_model->fetch_projects($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;', $str_links);

// View data according to array.
        $this->load->view('view-projects', $data);
    }


}

?>