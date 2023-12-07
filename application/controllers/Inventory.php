<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Inventory_model','inventory');
		$this->load->model('MasterData_model','master');
	}

	public function index(){
		$data['title'] = 'Manage Inventory';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['laundry'] = $this->master->getAllLaundry();
		$data['startDt'] = date('Y-m-01');
		$data['endDt'] =  date('Y-m-t');
		$data['locn'] = 1;

		if ($this->input->post('startDt') && $this->input->post('endDt')) {
			$data['startDt'] = $this->input->post('startDt');
			$data['endDt'] =  $this->input->post('endDt');
		} 

		if ($this->input->post('locn')) {
			$data['locn'] = $this->input->post('locn');
		}

		$data['inventory'] = $this->inventory->mngInventory($data['locn'],$data['startDt'],$data['endDt']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventory/index', $data);
		$this->load->view('templates/footer');
	}

	public function editStock(){
		$data['title'] = 'Edit Stock';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['inventory'] = $this->inventory->getAllData();
		$data['laundry'] = $this->master->getAllLaundry();
		$data['items'] = $this->master->getAllItems();

		$this->form_validation->set_rules('namaBrg', 'Nama Barang', 'required');
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('inventory/editStock', $data);
		$this->load->view('templates/footer');
		} else {
			$this->inventory->addStock();
			redirect('inventory/editStock');
		}
	}

	public function hapusInventory($id){
		$this->db->delete('inventory',['inv_tran_no' => $id]);

		redirect('inventory/editStock');
	}

}