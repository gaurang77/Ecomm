<?php 

class Cart extends CI_Controller{
    public function __construct(){
       
        parent::__construct();
        $this->load->model('data');
        $this->load->library('cart');
        
    }

    public function addToCart(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $result = $this->data->item($id);
            $data = array(
                'id'=>$result[0]->id,
                'qty'=>1,
                'price'=>$result[0]->price,
                'name'=>$result[0]->name
            );
            $row = $this->cart->insert($data);
            //print_r($data);
            echo 'OK';
        }else{
            echo "not ok";
        }
    }

    public function viewcart(){
        if(!isset($_SESSION['admin'])){
            $data['title'] = 'ECCOM';
            $this->load->view('cart/header',$data);
            $this->load->view('cart/cartPage');
            $this->load->view('cart/footer');
        }else{
            redirect('admin');
        }    
    }

    public function itemNo(){
        $no = $this->cart->total_items();
        echo $no;
    }

    public function updateCart(){
        $data = $_POST;
        $this->cart->update($data);
        redirect('cart/viewcart');
    }

    public function finish(){
        $this->cart->destroy();
        redirect('http://localhost/Ecommerce/index.php/Cart/viewcart');
    }
}
