<?php

class Product extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('data');
    }
    
    public function index(){
        $data['title'] = 'ECCOM';
        $itemss['items'] = $this->getProducts();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/productPage',$itemss);
        $this->load->view('templates/footer');
    }

    public function getProducts(){
        $products = $this->data->get();
        return $products;
    }

    public function getProduct(){
       if(isset($_POST['id'])){
           $id = $_POST['id'];
           $result = $this->data->item($id);
           $json = json_encode($result);
           echo $json;
       }
    }

    public function showArr(){
        echo "<pre>";
        print_r($_POST);
    }
}
