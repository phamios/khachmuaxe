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

class Customermodel extends CI_Model {
    var $table = "tblCustomerInfo";
    private $_batchImport;
    private $countlead;
    private $memberid;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function setBatchImport($memberid_import,$countlead_import,$batchImport) {
        $this->_batchImport = $batchImport;
        $this->countlead = $countlead_import;
        $this->memberid = $memberid_import;
    }


    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch($this->table, $data);
        $this->updateBalance($this->memberid,null,$this->countlead);
        $this->updateExcelLead($this->memberid,$this->countlead-1);
    }

    public function getDetailCustomer($id=null) {
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    public function updateCustomer($cusid=null,$fullname=null,$phonenumber=null,$location=null,$demand=null,$color=null,$installment=null,$amount=null,$buytime=null){
        $datacustomer = array(
            'fullname'=>$fullname,
            'phonenumber'=>$phonenumber,
            'location'=>$location,
            'demand'=>$demand,
            'color'=>$color,
            'installment'=>$installment,
            'amount'=>$amount,
            'buytime'=>$buytime,
        );
        $this->db->where('id',$cusid);
        $this->db->update($this->table,$datacustomer);
        return $cusid;
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

    /**============UPDATE BALANCE ===================== **/
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

    public function updateHistoryTransaction($userid=null,$amount=null,$lead=null){
        $data = array(
            'amount'=>$amount,
            'createdate'=>date('d-m-Y h:i:sa'),
            'addLead'=>$lead,
            'customerID'=>$userid,
        );
        $this->db->insert("tblHistorypayment",$data);
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        return $id;
    }

    public function listTransaction($userid=null){
        $this->db->order_by('id', "desc");
        if($userid <> null){
            $this->db->where('customerID',$userid);
        }
        $query = $this->db->get("tblHistorypayment");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }



    public function getBalanceSummary($userid = null){
      $this->db->where('userid',$userid);
      $query = $this->db->get("tblMember");
      if($query->num_rows() > 0 ){
          foreach($query->result() as $result){
              return $result->balancesummary;
          }
      } else {
          return 0;
      }
    }

    public function getBalance($userid = null){
      $this->db->where('userid',$userid);
      $query = $this->db->get("tblMember");
      if($query->num_rows() > 0 ){
          foreach($query->result() as $result){
              return $result->balance;
          }
      } else {
          return 0;
      }
    }
    /** =============SEARCH CONTENT============= **/
    public function searchCustomer($content=null,$userid=null){
        if($userid <> null){
            $query = $this->db->query("select * from ".$this->table. " where memberid = '".$userid."' phonenumber like '%".$content."%' or fullname like '%".$content."%' or demand like '%".$content."%'");
        } else {
                $query = $this->db->query("select * from ".$this->table. " where phonenumber like '%".$content."%' or fullname like '%".$content."%' or demand like '%".$content."%'");
        }

        if($query->num_rows() > 0){
            return $query->result();
        } else {
            return null;
        }
    }



    /**============UPDATE LEAD ===================== **/
    public function updateExcelLead($userid=null,$count=null){
        $currentLead = $this->getCurrentLead($userid);
        $this->db->where('userid',$userid);
        $data = array('lead'=>$currentLead - $count);
        $this->db->update("tblMember",$data);
    }


    public function updateLead($userid=null,$count=null,$status = null){
        $currentLead = $this->getCurrentLead($userid);
        $totalleadnow = $this->getTotalLead($userid);
        $this->db->where('userid',$userid);
        if($status == 1){
            $data = array('lead'=>$currentLead + $count,
                           'leadsummary'=>$totalleadnow + $count);
        } else {
            $data = array('lead'=>$currentLead - $count,
                           'leadsummary'=>$totalleadnow + $count);
        }

        $this->db->update("tblMember",$data);
    }

    public function getTotalLead($userid=null){
        $this->db->where('userid',$userid);
        $query = $this->db->get("tblMember");
        if($query->num_rows() > 0 ){
            foreach($query->result() as $result){
                return $result->leadsummary;
            }
        } else {
            return 0;
        }
    }

    public function getCurrentLead($userid=null){
        $this->db->where('userid',$userid);
        $query = $this->db->get("tblMember");
        if($query->num_rows() > 0 ){
            foreach($query->result() as $result){
                return $result->lead;
            }
        } else {
            return 0;
        }
    }

    public function getLeadPrice(){
          $this->db->order_by('id', "desc");
          $query = $this->db->get("tblConfig");
          if ($query->num_rows() > 0) {
              foreach($query->result() as $result){
                return $result->leadprice;
              }
          } else {
              return 0;
          }
     }



     public function delete($id = null) {
         $this->db->delete($this->table, array('id' => $id));
     }




}
