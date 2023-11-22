<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Invoice_model','invoice');
		$this->load->model('MasterData_model','master');
	}

	public function index($startDt='',$endDt=''){
		$data['title'] = 'Penghasilan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['startDt'] = date('Y-m-d');
		$data['endDt'] =  date('d/m/Y');

		$data['invoice'] = $this->invoice->getAllData();
		$data['locn'] = $this->invoice->getLocn();
		$data['laundry'] = $this->master->getAllLaundry();
		$data['customer'] = $this->master->getAllCustomer();
		// var_dump($data['locn']);

		if ($this->input->post('startDt')) {
			// echo "by param";
			$data['invoice'] = $this->invoice->getInvoiceByParams();
		}

		
		// var_dump($data['invoice']);
		// echo $data['startDt'];

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('invoice/index', $data);
		$this->load->view('templates/footer');
		} else {
			// echo "insert";
			$this->invoice->addInvoice();
			redirect('invoice');
		}
		
	}

	public function hutang(){
		$data['title'] = 'Hutang';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['invoice'] = $this->invoice->getDataHutang(); 
		$data['laundry'] = $this->master->getAllLaundry();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('invoice/hutang', $data);
		$this->load->view('templates/footer');
	}

	public function bayarHutang(){
		// echo $this->input->post('bayar');
		// echo $this->input->post('invNo');
		// echo $invNo;

		$this->db->query('update fin_invoice set fin_inv_type = "LUNAS", fin_inv_paid_amt = fin_inv_paid_amt + ' . $this->input->post('bayar',true) . ' where fin_inv_no = '. $this->input->post('invNo',true));
		redirect('hutang');

		// $data[
		// 	'fin_inv_paid_amt' => ('fin_inv_paid_amt' + $this->input->post('bayar',true))
		// ];

		// $this->db->where('fin_inv_no',$invNo);
		// $this->db->update('fin_inv_no',$data);


		// $this->db->update('fin_invoice','fin_inv_paid_amt' => 'fin_inv_paid_amt' +)
	}

	public function hasilGosok(){
		$data['title'] = 'Hasil Gosok';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['laundry'] = $this->master->getAllLaundry();
		$data['customer'] = $this->master->getAllCustomer();

		$data['hasilGosok'] = $this->invoice->getAllHasilGosok();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('invoice/hasilGosok', $data);
		$this->load->view('templates/footer');
		} else {
			$this->invoice->addHasilGosok();
			redirect('invoice/hasilGosok');
		}
	}

}