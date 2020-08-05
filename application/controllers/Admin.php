<?php 
class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['admin'])){
            redirect('product');
        }else{
            $this->load->model('data');
        }
    }

    public function index(){
        $data['title'] = 'ECCOM';
        $itemss['items'] = $this->data->getAdminProducts();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/adminView',$itemss);
        $this->load->view('templates/footer');
    }

    public function addProducts(){
        $data['title'] = $_SESSION['admin'];
        $this->load->view('templates/header',$data);
        $this->load->view('templates/addProduct');
        $this->load->view('templates/footer');
    }
    public function authProduct(){
        $this->load->library('form_validation');
        $this->form_validation->
        set_rules('productName','Product Name','required');
        $this->form_validation->
        set_rules('productPrice','Product Price','required');
        $this->form_validation->
        set_rules('productType','Product type','required');

        if($this->form_validation->run()){
            $config['upload_path'] = 'store/pro_images/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $this->input->post('productName');
            $this->load->library("upload",$config);

            if ( ! $this->upload->do_upload('productImage')){    
                $error['imageError'] = $this->upload->display_errors();
                $data['title'] = $_SESSION['admin'];
                $this->load->view('templates/header',$data);
                $this->load->view('templates/addProduct',$error);
                $this->load->view('templates/footer');               
            }
            else{
                $data = $this->upload->data();
                $arr = [
                    'name'=>$this->input->post('productName'),
                    'price'=>$this->input->post('productPrice'),
                    'type'=>$this->input->post('productType'),
                    'image_path'=>"store/pro_images/".$data['file_name'],
                    'owner'=>$_SESSION['admin']
                ];
                
                $this->data->addProduct($arr);
            }
        }else{
            // echo validation_errors();
            $this->addProducts();
        }
    }

}