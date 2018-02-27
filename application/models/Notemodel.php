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

class Notemodel extends CI_Model {
    var $table = "tblNote";
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listNote($userid=null) {
        $this->db->order_by('id', "desc");
        $this->db->where('userid',$userid);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    public function addNote($userid=null,$content = null,$userpost=null){
        $data = array(
            'userid'=>$userid,
            'content'=>$content,
            'useridpost'=>$userpost,
            'createdate'=>date('d-m-Y h:i:sa')
            );
        $this->db->insert($this->table,$data);
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        return $id;
    }

    public function delete($noteid = null) {
          $this->db->delete($this->table, array('id' => $noteid));

      }

}
