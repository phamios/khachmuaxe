<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincp extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper(array('form', 'url'));
	}


	public function index()
	{
		  if ($this->session->userdata('admin_id') == null) {
				redirect("admincp/authen");
			} else {
				$this->load->view('admin/default');
			}
	}

	public function customers(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model("customermodel");
			$this->load->model('usermodel');
			$data['listusers'] = $this->usermodel->getUsers(0);
			$data['listcustomers'] = $this->customermodel->listCustomers(0);
			$this->load->view('admin/default',$data);
		}
	}

	public function listuser(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('usermodel');
			$data['listusers'] = $this->usermodel->getUsers(0);
			$this->load->view('admin/default',$data);
		}
	}

	public function addUser(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			if(isset($_REQUEST['bttSubmit'])){
				 $usertype = $this->input->post("usertype",true);
				 $this->load->model('usermodel'); 
				 if($usertype == 3){

				 } else {

				 }
			}
			$this->load->view('admin/default');
		}
	}

	public function logout(){
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		$this->session->unset_userdata('admin_type');
		$this->session->sess_destroy();
		redirect('admincp/authen');
	}

	public function authen(){
		if ($this->session->userdata('admin_id') == null) {
			  if (isset($_REQUEST['loginBtt'])) {
					$username = $this->input->post("usernamelogin");
					$password = $this->input->post("passwordlogin");
					$this->load->model('usermodel');
					$check = $this->usermodel->authentication($username,$password);
					if($check == 0 ){
						redirect("admincp/authen");
					}else {
						$usertype = $this->usermodel->getUserType($check);
						$session_user = array(
								'admin_id' =>$check,
								'admin_name' => $username,
								'admin_type' =>$usertype
						);
						$this->session->set_userdata($session_user);
						redirect("admincp/index");
					}
				}
				$this->load->view('admin/login');
		} else {
			redirect("admincp/index");
		}

	}

}
