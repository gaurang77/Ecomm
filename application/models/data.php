<?php 
class Data extends CI_Model { 
    public function get(){
        $query = $this->db->get('products');
        return $query->result();
    }
    
    public function item($id){
        $query = $this->db->get_where('products',array('id'=>$id));
       return $query->result();
    } 

    public function checkAdmin($n,$p){
        $arr = [
            'name'=>$n,
            'password'=>$p
        ];
        $sql = $this->db->get_where('admin',$arr);
        if($sql->result()){
            $_SESSION['admin'] = $n;
            redirect('admin');
        }else{
           redirect('login/error');
        }
    }

    public function getAdminProducts(){
        $var = $_SESSION['admin'];
        $sql = $this->db->get_where('products',['owner'=>$var]);
        return $sql->result();
    }

    public function addProduct($arr){
        // echo "<pre>";
        // print_r($arr);
        $this->db->insert('products',$arr);
        if($this->db->affected_rows() > 0){
            redirect('admin');
        }else{
            echo 'Error in adding data';
        }
    }
}