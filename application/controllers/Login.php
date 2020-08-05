<?php 
class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('data');
    }

    public function index(){
        $data['title']='Admin Login';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/login');
        $this->load->view('templates/footer');
    }

    public function auth(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('pw','Password','required');

        if($this->form_validation->run()){
            $name = $this->input->post('name');
            $pass = $this->input->post('pw');
            $this->data->checkAdmin($name,$pass);
        }else{
            //echo validation_errors();
            $this->index();
        }
    }

    public function error(){
        $err['error'] = 'Admin Name or Pasword is INVALID !!!!';
        $data['title']='Admin Login';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/login',$err);
        $this->load->view('templates/footer');
    }
}