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

class Configmodel extends CI_Model {
    var $table = "tblConfig";
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

  public function listConfig() {
      $this->db->order_by('id', "desc");
      $query = $this->db->get($this->table);
      if ($query->num_rows() > 0) {
          return $query->result();
      } else {
          return 0;
      }
  }

  public function getLeadPrice(){
      $this->db->order_by('id', "desc");
      $query = $this->db->get($this->table);
      if ($query->num_rows() > 0) {
          foreach($query->result() as $result){
            return $result->leadprice;
          }
      } else {
          return 0;
      }
  }

public function getTotalMember(){
  $query = $this->db->query('Select tblMember.*,tblUser.username, tblUser.userpass, tblUser.usertype from tblMember
  LEFT Join tblUser ON tblMember.userid = tblUser.id WHERE tblUser.usertype in (3)');
  return $query->num_rows();
}

public function getTotalResource(){
  $query = $this->db->query("select * from tblCustomerInfo");
  return $query->num_rows();
}

public function getTotalMoney(){
  $query = $this->db->query("select sum(balancesummary) as total from tblMember");
  if ($query->num_rows() > 0) {
      foreach($query->result() as $result){
        return $result->total;
      }
  } else {
      return 0;
  }
}

public function getTotalLead(){
  $query = $this->db->query("select count(id) as total from tblCustomerInfo where memberid IS NOT  NULL");
  if ($query->num_rows() > 0) {
      foreach($query->result() as $result){
        return $result->total;
      }
  } else {
      return 0;
  }
}

public function getTotalLeadRemand(){
  $query = $this->db->query("select count(id) as total from tblCustomerInfo where memberid IS   NULL");
  if ($query->num_rows() > 0) {
      foreach($query->result() as $result){
        return $result->total;
      }
  } else {
      return 0;
  }
}

public function getTotalDeposit(){
  $query = $this->db->query("select count(id) as total from tblMember where balancesummary IS NOT  NULL");
  if ($query->num_rows() > 0) {
      foreach($query->result() as $result){
        return $result->total;
      }
  } else {
      return 0;
  }
}


}

?>
