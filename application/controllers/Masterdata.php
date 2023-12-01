<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('MasterData_model','master');
	}

	public function index(){
		$data['title'] = 'Laundry';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['laundry'] = $this->master->getAllLaundry();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('master_data/index', $data);
		$this->load->view('templates/footer');
		} else {
			$this->master->addLaundry();
			redirect('masterdata');
		}
		

	}

	public function hapusLaundry($id){
		$this->db->where('ld_id',$id);
		$this->db->delete('loundry');
		redirect('masterdata');
	}

	public function customer(){
		$data['title'] = 'Customer';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['customer'] = $this->master->getAllCustomer();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('master_data/customer', $data);
		$this->load->view('templates/footer');
		} else {
			$this->master->addCustomer();
			redirect('masterdata/customer');
		}
	}

	public function hapusCustomer($id){
		$this->db->where('cust_id',$id);
		$this->db->delete('customer');
		redirect('masterdata/customer');
	}

	public function tukangGosok(){
		$data['title'] = 'Tukang Gosok';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['tukangGosok'] = $this->master->getAllTukangGosok();

		$data['laundry'] = $this->master->getAllLaundry();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('master_data/tukangGosok', $data);
		$this->load->view('templates/footer');
		} else {
			$this->master->addTukangGosok();
			redirect('masterdata/tukangGosok');
		}
	}

	public function hapusTG($id){
		$this->db->where('tg_id',$id);
		$this->db->delete('tukang_gosok');
		redirect('masterdata/tukangGosok');
	}

	public function employee(){
		$data['title'] = 'Karyawan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['employee'] = $this->master->getAllEmployee();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('master_data/employee', $data);
		$this->load->view('templates/footer');
		} else {
			$this->master->addEmployee();
			redirect('masterdata/employee');
		}
	}


	public function items(){
		$data['title'] = 'Barang';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['items'] = $this->master->getAllItems();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('master_data/barang', $data);
		$this->load->view('templates/footer');
		} else {
			$this->master->addItems();
			redirect('masterdata/items');
		}
	}

	public function hapusItem($id){
		$this->db->where('item_id',$id);
		$this->db->delete('items');
		redirect('masterdata/items');
	}

}