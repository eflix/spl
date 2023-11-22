<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->library('pdf');
		$this->load->model('Laporan_model','laporan');
		$this->load->model('MasterData_model','master');
	}

	public function index(){
		$data['title'] = 'Laporan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		
		$data['laundry'] = $this->master->getAllLaundry();

		if ($this->input->post('cb1')){
			$data['hutang'] = $this->laporan->rptHutang();

			$this->load->view('laporan/rptHutang', $data);
		} else if ($this->input->post('cb2') && $this->input->post('startDt2') && $this->input->post('endDt2') && $this->input->post('cbBy2')){
			if ($this->input->post('cbBy2') == 'laundry'){
				$data['data'] = $this->laporan->rptHasilbyLaundry();
				$this->load->view('laporan/rptHasilbyLaundry', $data);
			} else if ($this->input->post('cbBy2') == 'tanggal'){
				$data['data'] = $this->laporan->rptHasilbyTgl();
				$this->load->view('laporan/rptHasilbyTgl', $data);
			}
			

		} else if ($this->input->post('cb3') && $this->input->post('startDt3') && $this->input->post('endDt3')){
			$data['data'] = $this->laporan->rptHasilGosok();

			$this->load->view('laporan/rptHasilGosok', $data);
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
		

	}

}