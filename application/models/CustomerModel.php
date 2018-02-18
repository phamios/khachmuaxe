<?php
/**
 * Created by PhpStorm.
 * User: Javelin
 * Date: 8/2/2016
 * Time: 1:42 PM
 */
date_default_timezone_set('Asia/Bangkok');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CustomerModel extends CI_Model {
    var $table = "tblCustomerInfo";
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
    ** List all user from db
    **/
    public function listCustomers($memberid=null) {
        $this->db->order_by('id', "desc");
        if($memberid <> 0){
                $this->db->where('memberid',$memberid);
        }
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }



    public function insertUser($usertype=null,$username=null,$userpass=null,$useremail=null,$userphone=null,$usericon=null,$usergender=null){
        if($this->checkExitUser($username) == 1){
            $data = array(
                'username'=>$username,
                'userpass'=>$userpass,
                'useremail'=>$useremail,
                'userphone'=>$userphone,
                'usericon'=>$usericon,
                'usertype'=>$usertype,
                'usergender'=>$usergender,
            );
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();
            $this->db->trans_complete();
            return $id;
        }else{
            return 0;
        }
    }


    public function checkExitUser($username=null){
        $this->db->where('username',$username);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0){
            return 0;
        }else{
            return 1;
        }
    }



}
