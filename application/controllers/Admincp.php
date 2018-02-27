<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincp extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper(array('form', 'url'));
			$this->load->library('upload');
	}


	public function index()
	{
		  if ($this->session->userdata('admin_id') == null) {
				redirect("admincp/authen");
			} else {
				if($this->session->userdata('admin_type') == 3){
					redirect('admincp/customers');
				}
				$this->load->model('configmodel');
				$data['TotalMember'] = $this->configmodel->getTotalMember();
				$data['totalresource'] = $this->configmodel->getTotalResource();
				$data['totalMoneyDeposit'] = $this->configmodel->getTotalMoney();
				$data['totalLead'] = $this->configmodel->getTotalLead();
				$data['totalDeposit'] = $this->configmodel->getTotalDeposit();
				$data['totalLeadRemand'] = $this->configmodel->getTotalLeadRemand();
				$this->load->view('admin/default',$data);
			}
	}

	public function customers($userid=null){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 3){
				$this->load->model("customermodel");
				$this->load->model('usermodel');
				$this->load->model('customermodel');
				$data['listusers'] = $this->usermodel->getUsers(3);
				if(isset($_REQUEST['buttonSearch'])){
					 $typesearch = $this->input->post('searchtype');
					 $txtsearch = $this->input->post('txtSearch');
					 if($this->session->userdata('admin_type') == 3) {
						 	$userid =$this->session->userdata('admin_id');
					 } else {
						 $userid = null;
					 }
					 $data['listcustomers'] = $this->customermodel->searchCustomer($txtsearch,$userid=null);
				} else {
					if($this->session->userdata('admin_type')  == 3){
						$data['listcustomers'] = $this->customermodel->listCustomers($this->session->userdata('admin_id') );
					} else if($userid <> null && $this->session->userdata('admin_type') == 1){
						$data['listcustomers'] = $this->customermodel->listCustomers($userid);
					}else{
						$data['listcustomers'] = $this->customermodel->listCustomers(0);
					}
				}
				$this->load->view('admin/default',$data);
			} else {
				redirect('admincp/index');
			}
		}
	}

	public function listuser(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('usermodel');
			$data['listusers'] = $this->usermodel->getUsers(3);
			if(isset($_REQUEST['buttonSearch'])){
					$typesearch = $this->input->post('searchtype');
					$txtsearch = $this->input->post('txtSearch');
					$data['listusers'] = $this->usermodel->searchUser($txtsearch);
			} else {
				$data['listusers'] = $this->usermodel->getUsers(3);
			}
			$this->load->view('admin/default',$data);
		}
	}

	public function addUser($error=null){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('configmodel');
			$this->load->model('usermodel');
			if(isset($_REQUEST['bttSubmit'])){
				 $leadprice = $this->configmodel->getLeadPrice();
				 $usertype = $this->input->post("usertype",true);
				 $this->load->model('usermodel');
				 $username =$this->input->post('username');
				 $userpass = $this->input->post('userpass');
				 $fullname = $this->input->post('fullname');
				 $memberphone = $this->input->post("memberphone");
				 $memberemail = $this->input->post("memberemail");
				 $showroom = $this->input->post('showroom');
				 $memberaddress = $this->input->post('memberaddress');
				 $balance =$this->input->post('balance');
				 if($usertype == 2){
					  $fullname = $username;
						$memberphone = null;
						$memberemail = null;
						$showroom = null;
						$memberaddress = null;
						$balance = 0;
						$lead = 0;
				 } else{
					 $lead = $balance/$leadprice;
				 }
				 $resultid  = $this->usermodel->insertUser($usertype,$username,$userpass,
			         $fullname,$memberphone,$memberemail,$showroom,
							 $memberaddress,$lead,$balance);

				 if($resultid <> 0){
					 redirect('admincp/listuser');
				 }else{
					 redirect('admincp/addUser');
				 }
			}
			if($error <> null ){
					$data['content_output'] = "Cập nhật không thành công, kiểm tra lại dữ liệu" ;
					$data['result_output'] = " Lỗi !";
			} else {
				$data['content_output'] = null ;
				$data['result_output'] = null;
			}

			$this->load->view('admin/default',$data);
		}
	}

	public function listusermoderator(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('usermodel');
			$data['listusers'] = $this->usermodel->getUsers(1);
			$this->load->view('admin/default',$data);
		}
	}

	public function importExcel(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('usermodel');
			$this->load->model('customermodel');
			$data['listusers'] = $this->usermodel->getUsers(3);
			if(isset($_REQUEST['bttSubmit'])){
				$path = "./uploads/";
					$this->load->library('excel');
					$config['upload_path'] = $path;
					 $config['allowed_types'] = 'xlsx|xls|jpg|png';
					 $config['remove_spaces'] = TRUE;
					 $this->upload->initialize($config);
					 $this->load->library('upload', $config);
					 if (!$this->upload->do_upload('fileupload')) {
               $error = array('error' => $this->upload->display_errors());
           } else {
               $data = array('upload_data' => $this->upload->data());
           }

           if (!empty($data['upload_data']['file_name'])) {
               $import_xls_file = $data['upload_data']['file_name'];
           } else {
               $import_xls_file = 0;
           }
					 $inputFileName = $path . $import_xls_file;
					 try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
 					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

					$arrayCount = count($allDataInSheet);
					// die("Count: ".$arrayCount);
					$flag = 0;
          $createArray = array('Phonenumber',
					'Fullname', 'Location', 'Demand','Color' ,'Installment','Amount','BuytTime','UploadDate');
					$makeArray = array(
						'Phonenumber' => 'Phonenumber',
						 'Fullname' => 'Fullname',
						 'Location' => 'Location',
						 'Demand' => 'Demand',
						 'Color'=>'Color',
					  'Installment' => 'Installment',
						'Amount'=>'Amount',
						'BuytTime'=>'BuytTime',
						'UploadDate'=>'UploadDate'
						);
						$SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;

                    } else {

                    }
                }
            }

						$data = array_diff_key($makeArray, $SheetDataKey);

						if (empty($data)) {
                $flag = 1;
            }
						if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) {
                    $addresses = array();
										$userid = $this->input->post('userid',true);
                    $phonenumber = $SheetDataKey['Phonenumber'];
                    $fullname = $SheetDataKey['Fullname'];
                    $location = $SheetDataKey['Location'];
                    $demand = $SheetDataKey['Demand'];
                    $color = $SheetDataKey['Color'];
										$installment = $SheetDataKey['Installment'];
										$amount = $SheetDataKey['Amount'];
										$buytime = $SheetDataKey['BuytTime'];
										$uploadate = $SheetDataKey['UploadDate'];

                    $phonenumber = filter_var(trim($allDataInSheet[$i][$phonenumber]), FILTER_SANITIZE_STRING);
                    $fullname = filter_var(trim($allDataInSheet[$i][$fullname]), FILTER_SANITIZE_STRING);
                    $location = filter_var(trim($allDataInSheet[$i][$location]), FILTER_SANITIZE_EMAIL);
                    $demand = filter_var(trim($allDataInSheet[$i][$demand]), FILTER_SANITIZE_STRING);
										$amount = filter_var(trim($allDataInSheet[$i][$amount]), FILTER_SANITIZE_STRING);
										$color = filter_var(trim($allDataInSheet[$i][$color]), FILTER_SANITIZE_STRING);
                    $installment = filter_var(trim($allDataInSheet[$i][$installment]), FILTER_SANITIZE_STRING);
                    $buytime = filter_var(trim($allDataInSheet[$i][$buytime]), FILTER_SANITIZE_EMAIL);
                    $uploadate = filter_var(trim($allDataInSheet[$i][$uploadate]), FILTER_SANITIZE_STRING);

                    $fetchData[] = array(
											'phonenumber' => $phonenumber,
										  'fullname' => $fullname,
											'location' => $location,
											'demand' => $demand,
											'amount'=>$amount,
										  'color' => $color,
											'installment'=>$installment,
											'buytime'=>$buytime,
											'uploadate'=>$uploadate,
											'memberid'=>$userid
										);

                }

                $data['employeeInfo'] = $fetchData;
								$this->load->model('customermodel');
                $this->customermodel->setBatchImport($userid,$arrayCount,$fetchData);
                $this->customermodel->importData();
								redirect('admincp/customers/'.$userid);

            } else {
                echo "Please import correct file";
            }


			}
			$this->load->view('admin/default',$data);
		}
	}

	public function leadconfig(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('configmodel');
			$data['loadconfig'] = $this->configmodel->listConfig();
			if(isset($_REQUEST['bttSubmit'])){
					$homename = $this->input->post('homename');
					$leadprice = $this->input->post('leadprice');
					$googleanalytic = $this->input->post('googleanalytic');
			}
			$this->load->view('admin/default',$data);
		}
	}


	public function addnote(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			if(isset($_REQUEST['submitNote'])){
					$userid = $this->input->post('userid');
					$contentnote = $this->input->post('contentnote');
					$userpost = $this->session->userdata('admin_id');
					$this->load->model('notemodel');
					$result = $this->notemodel->addNote($userid,$contentnote,$userpost);
					if($result <> 0){
						redirect("admincp/listuser");
					}
			}
		}
	}

	public function listnote($userid = null){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('notemodel');
			$this->load->model('usermodel');
			$data['listusers'] = $this->usermodel->getUsers(3);
			$data['listusersMod'] = $this->usermodel->getUsers(1);
			$data['listnote'] = $this->notemodel->listNote($userid);
			$this->load->view('admin/default',$data);
		}
	}

	public function delnote($noteid = null,$userid= null){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('notemodel');
			$this->notemodel->delete($noteid);
			redirect('admincp/listnote/'.$userid);
		}
	}

	public function updatebalance(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			if(isset($_REQUEST['submitDeposit'])){
					$userid = $this->input->post('userid');
					$depositamount = $this->input->post('depositamount');
					$leadcount=  $this->input->post('leadcount');
					$this->load->model('customermodel');
					$result = $this->customermodel->updateBalance($userid,$depositamount);
					$this->customermodel->updateLead($userid,$leadcount,1);
				  $this->customermodel->updateHistoryTransaction($userid,$depositamount,$leadcount);
					redirect("admincp/listuser");
			}
		}
	}

	public function paymenthistory(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('customermodel');
			$data['listpayments'] = $this->customermodel->listTransaction($this->session->userdata('admin_id'));
			$this->load->view('admin/default',$data);
		}
	}

	public function transaction(){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('customermodel');
			$data['listpayments'] = $this->customermodel->listTransaction();
			$this->load->view('admin/default',$data);
		}
	}

	/**====================   INFO & UPDATE USER ================= **/

	public function info($userid = null,$error = null){
		if ($this->session->userdata('admin_id') == null) {
			 redirect('admincp/authen');
		} else{
			$this->load->model('usermodel');
			if($userid <> null){
				$data['userinfo'] =$this->usermodel->getuserinfo($userid);
			} else{
				$data['userinfo'] = $this->usermodel->getuserinfo($this->session->userdata('admin_id'));
			}

			if($error <> null ){
					$data['content_output'] = "Cập nhật không thành công, kiểm tra lại dữ liệu" ;
					$data['result_output'] = " Lỗi !";
			} else {
				$data['content_output'] = null ;
				$data['result_output'] = null;
			}
			$this->load->view('admin/default',$data);
		}
	}

	public function edituserinfo($userid=null){
		if ($this->session->userdata('admin_id') == null) {
			 redirect('admincp/authen');
		} else{
			$this->load->model('usermodel');
			$data['userinfo'] =$this->usermodel->getuserinfo($userid);
			 if (isset($_REQUEST['bttSubmit'])) {
					$this->load->model('usermodel');
					$username =$this->input->post('username');
					$userpass = $this->input->post('userpass');
					$fullname = $this->input->post('fullname');
					$memberphone = $this->input->post("memberphone");
					$memberemail = $this->input->post("memberemail");
					$showroom = $this->input->post('showroom');
					$memberaddress = $this->input->post('memberaddress');
					$return = $this->usermodel->updateMember($userid,$fullname,$memberphone,$memberemail,$showroom,$memberaddress);
					$resultid  = $this->usermodel->updateUser($userid ,$username,$userpass);
					if($resultid <> 0 || $return <> 0){
						redirect('admincp/listuser');
					}else{
						redirect('admincp/edituserinfo/'.$userid);
					}
			 }
			 if (isset($_REQUEST['bttReset'])) {
				 redirect('admincp/listuser');
			 }
			$this->load->view('admin/default',$data);
		}
	}

	public function removeuser($userid = null){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('usermodel');
			$this->usermodel->delete($userid);
			 redirect("admincp/listuser");
		}
	}

	public function editcustomer($cusid = null){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('customermodel');
			$data['detailCustomers'] =$this->customermodel->getDetailCustomer($cusid);
			if (isset($_REQUEST['bttSubmit'])) {
				 $fullname =$this->input->post('fullname');
				 $phonenumber = $this->input->post('phonenumber');
				 $location = $this->input->post('location');
				 $demand = $this->input->post("demand");
				 $color = $this->input->post("color");
				 $installment = $this->input->post('installment');
				 $amount = $this->input->post('amount');
				 $buytime = $this->input->post('buytime');

				 $return = $this->customermodel->updateCustomer($cusid,$fullname,$phonenumber,$location,$demand,$color,$installment,$amount,$buytime);

				 if($return <> 0){
					 redirect('admincp/customers');
				 }else{
					 redirect('admincp/editcustomer/'.$cusid);
				 }
			}
			if (isset($_REQUEST['bttReset'])) {
				redirect('admincp/listuser');
			}
			 $this->load->view('admin/default',$data);
		}
	}

	public function removeCustomer($cusid = null){
		if ($this->session->userdata('admin_id') == null) {
			redirect("admincp/authen");
		} else {
			$this->load->model('customermodel');
			$this->customermodel->delete($cusid);
			 redirect("admincp/customers");
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
