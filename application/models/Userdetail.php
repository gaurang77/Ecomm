<?php
class Userdetail extends CI_Model {
    public function getUserData(){
        return[
            ['name'=>'Lionel Messi','number'=>'10'],
            ['name'=>'Andreas Iniesta','number'=>'6']
        ];
    }
}