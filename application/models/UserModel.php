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

class UserModel extends CI_Model {
    var $table = "tblUser";
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
    ** List all user from db
    **/
    public function listAll() {
        $this->db->order_by('id', "asc");
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    public function getUsers($usertype = null){
        if($usertype <> 0 ){
            $query = $this->db->query("
                     Select tblMember.*,tblUser.username, tblUser.userpass from tblMember
                     LEFT Join tblUser ON tblMember.userid = tblUser.id WHERE tblUser.usertype = ".$usertype);
        } else {
            $query = $this->db->query("
                     Select tblMember.*,tblUser.username, tblUser.userpass from tblMember
                     LEFT Join tblUser ON tblMember.userid = tblUser.id
                  ");
        }
      if ($query->num_rows() > 0) {
          return $query->result();
      } else {
          return 0;
      }
    }



    /**
    ** Login into system, it will be check the authentication
    ** It will check status and user exits
    **/
    public function authentication($username= null,$userpass=null){
        $this->db->where(array(
            'username'=>$username,
            'userpass'=>$userpass,
        ));
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0){
            foreach($query->result() as $result){
                 if($this->checkActive($result->id) > 0){
                     return $result->id;
                 }else{
                     return 0;
                 }
            }
        } else {
            return 0;
        }
    }

    /**
    ** Check status
    ** 1: active
    ** 2: pending
    ** 0: unactive
    **/
    public function checkActive($userid = null){
        $this->db->where('id',$userid);
        $this->db->where('status',1);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0){
            return 1;
        } else {
            return 0;
        }
    }



    public function getUserType($userid = null){
        $this->db->where('id',$userid);
        $this->db->where('status',1);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0){
            foreach($query->result() as $result){
                return $result->usertype;
            }
        } else {
            return 0;
        }
    }

    /**
     * @param   $usertype
     * @param   $username
     * @param   $userpass
     * @param   $useremail
     * @param   $userphone
     * @param   $usericon
     * @param   $usergender
     * @return int
     */
    public function insertUser($usertype=null,$username=null,$userpass=null,
        $fullname=null,$memberphone=null,$memberemail=null,$showroom=null,$memberaddress=null,$lead = 0,$balance = 0)
    {
        if($this->checkExitUser($username) == 1){
            $datauser = array(
                'username'=>$username,
                'userpass'=>$userpass,
                'usertype'=>$usertype,
                'status'=>1,
                'createdate'=>date('d-m-Y h:i:sa')
            );
            $this->db->insert($this->table,$data);
            $userid = $this->db->insert_id();

            if($usertype == 3){

            }
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

    /**
     * @param  $username
     * @return int
     */
    public function checkExitUser($username=null){
        $this->db->where('username',$username);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0){
            return 0;
        }else{
            return 1;
        }
    }

    /**
     * @param   $userid
     * @param   $number
     * @param   $type = 1 : Add
     *          $type = 2 : Sub
     */
    public function updateBalance($userid=null,$number=null,$type=null){
        $currentBalance = $this->getCurrentBalance($userid);
        $this->db->where('id',$userid);
        if($type = 1){
            $data = array('userbalance'=>$currentBalance + $number);
        } else {
            $data = array('userbalance'=>$currentBalance - $number);
        }
        $this->db->update($this->table,$data);
    }

    /**
     * @param  $userid
     * @return int
     */
    public function getCurrentBalance($userid=null){
        $this->db->where('id',$userid);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0 ){
            foreach($query->result() as $result){
                return $result->userbalance;
            }
        } else {
            return 0;
        }
    }



}
