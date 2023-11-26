<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Invoice_model','invoice');
		$this->load->model('MasterData_model','master');
	}

	public function index(){
		$data['title'] = 'Penghasilan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['startDt'] = date('Y-m-d');
		$data['endDt'] =  date('Y-m-d');

		// $data['invoice'] = $this->invoice->getAllData();
		$data['locn'] = $this->invoice->getLocn();
		$data['laundry'] = $this->master->getAllLaundry();
		$data['customer'] = $this->master->getAllCustomer();

		if ($this->input->post('startDt')) {
			$data['startDt'] = date_format(date_create($this->input->post('startDt')),'Y-m-d');
			$data['endDt'] = date_format(date_create($this->input->post('endDt')),'Y-m-d');
		}

		$data['locn'] = $this->input->post('sLocn');
		$data['pelanggan'] = $this->input->post('keyword');

		$data['invoice'] = $this->invoice->getInvoiceByParams($data['startDt'],$data['endDt'],$data['locn'],$data['pelanggan']);
		
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

		$data['startDt'] = date('Y-m-d');
		$data['endDt'] =  date('Y-m-d');

		if ($this->input->post('startDt')) {
			$data['startDt'] = date_format(date_create($this->input->post('startDt')),'Y-m-d');
			$data['endDt'] = date_format(date_create($this->input->post('endDt')),'Y-m-d');
		}

		if ($this->input->post('sLocn')) {
			$data['locn'] = $this->input->post('sLocn');
		} else {
			$data['locn'] = '';
		}

		if ($this->input->post('startDt') || $this->input->post('endDt') || $this->input->post('sLocn')) {
			$data['invoice'] = $this->invoice->getDataHutangbyParam($data['startDt'],$data['endDt'],$data['locn']); 
		} else {
			$data['invoice'] = $this->invoice->getDataHutang();
		}


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('invoice/hutang', $data);
		$this->load->view('templates/footer');
	}

	public function bayarHutang(){
		$invNo = $this->input->post('invNo');
		$bayar = (double)$this->input->post('bayar');

		$query = "select * from fin_invoice where fin_inv_no = $invNo";

		$invoice = $this->db->query($query)->row();

		$totPaid = ((double)$invoice->fin_inv_paid_amt+$bayar);

		$status = 'HUTANG';
		if ($totPaid >= (double)$invoice->fin_inv_total_amt) {
			$status = 'LUNAS';
		}

		$this->db->query("update fin_invoice set fin_inv_type = '$status', fin_inv_paid_amt = $totPaid where fin_inv_no = ". $invNo);

		redirect('invoice/hutang');
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