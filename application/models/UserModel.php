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

class Usermodel extends CI_Model {
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
        if($usertype == 3 ){
            $query = $this->db->query("
                     Select tblMember.*,tblUser.username, tblUser.userpass,tblUser.usertype from tblMember
                     LEFT Join tblUser ON tblMember.userid = tblUser.id WHERE tblUser.usertype = ".$usertype);
        } else if($usertype == 1 ){
            $query = $this->db->query("
                     Select tblMember.*,tblUser.username, tblUser.userpass, tblUser.usertype from tblMember
                     LEFT Join tblUser ON tblMember.userid = tblUser.id WHERE tblUser.usertype in (1,2)
                  ");
        }else {
            $query = $this->db->query("
                     Select tblMember.*,tblUser.username, tblUser.userpass, tblUser.usertype from tblMember
                     LEFT Join tblUser ON tblMember.userid = tblUser.id WHERE tblUser.usertype in (2,3)
                  ");
        }
      if ($query->num_rows() > 0) {
          return $query->result();
      } else {
          return 0;
      }
    }

public function getuserinfo($userid = null){
    $query = $this->db->query("
             Select tblMember.*,tblUser.username, tblUser.userpass, tblUser.usertype from tblMember
             LEFT Join tblUser ON tblMember.userid = tblUser.id WHERE tblUser.id = ".$userid);
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return 0;
    }
}

public function searchUser($content=null,$userid=null){
      if($userid <> null){
          $query = $this->db->query("select * from tblMember where memberid = '".$userid."' phonenumber like '%".$content."%' or fullname like '%".$content."%' or demand like '%".$content."%'");
      } else {
          $query = $this->db->query("Select tblMember.*,tblUser.username, tblUser.userpass,tblUser.usertype from tblMember
                     LEFT Join tblUser ON tblMember.userid = tblUser.id WHERE tblMember.memberphone like '%".$content."%' or tblMember.fullname like '%".$content."%' or tblMember.memberemail like '%".$content."%' or tblMember.showroom like '%".$content."%'");
      }
      if($query->num_rows() > 0){
          return $query->result();
      } else {
          return null;
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
            $this->db->insert($this->table,$datauser);
            $userid = $this->db->insert_id();

            $datamember = array(
                'fullname'=>$fullname,
                'memberphone'=>$memberphone,
                'memberemail'=>$memberemail,
                'showroom'=>$showroom,
                'memberaddress'=>$memberaddress,
                'lead'=>$lead,
                'status'=>1,
                'balance'=>$balance,
                'userid'=>$userid,
                'createdate'=>date('d-m-Y h:i:sa')
            );
            $this->db->insert("tblMember",$datamember);
            $id = $this->db->insert_id();
            $this->db->trans_complete();

            return $id;

        }else{
            return 0;
        }
    }


    public function updateUser($userid =null,$username=null,$userpass=null)
    {
      $this->db->where('id',$userid);
      $datauser = array(
          'username'=>$username,
          'userpass'=>$userpass,
      );
      $this->db->update($this->table,$datauser);
      return $userid;
    }

    public function updateMember($userid =null,$fullname=null,$memberphone=null,
    $memberemail=null,$showroom=null,$memberaddress=null){
        $datamember = array(
            'fullname'=>$fullname,
            'memberphone'=>$memberphone,
            'memberemail'=>$memberemail,
            'showroom'=>$showroom,
            'memberaddress'=>$memberaddress,
        );
        $this->db->where('userid',$userid);
        $this->db->update("tblMember",$datamember);
        return $userid;
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
     public function updateBalance($userid=null,$amount=null,$count=null){
       $currentBalance =$this->getBalance($userid);
       $totalbalance = $this->getBalanceSummary($userid);
       $amountlead = $this->getLeadPrice() * $count;
       $this->db->where('userid',$userid);
       if($count <> null){
           $data = array('balance'=>$currentBalance - $amountlead);
       }else{
           $data = array(
               'balance'=>$currentBalance + $amount,
               'balancesummary'=>$totalbalance + $amount);
       }
       $this->db->update("tblMember",$data);
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



    public function delete($userid = null) {
          $this->db->delete($this->table, array('id' => $userid));
          $this->db->delete("tblMember", array('userid' => $userid));
          $this->db->delete("tblCustomerInfo", array('memberid' => $userid));
      }



}
