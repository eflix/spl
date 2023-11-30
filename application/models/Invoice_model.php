<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {

	public function getAllData(){
		return $query = $this->db->get_where('fin_invoice',['fin_inv_dt >= ' => date('Y-m-d'), 'fin_inv_dt <= ' => date('Y-m-d')])->result_array();
	}

	public function getInvoiceByParams($start_date,$end_date,$locn,$pelanggan){

		$paramLocn = "";
		$paramPelanggan = "";

		if ($locn != '' || $locn = null) {
			$paramLocn = " and fin_inv_locn = '$locn'";
		}

		$query = "select fin_inv_no,fin_inv_dt,fin_inv_type,
				  case when c.cust_id is null then a.fin_inv_cust_id else c.cust_nama end cust_name,
				  fin_inv_city,fin_inv_total_amt,fin_inv_paid_amt,fin_inv_notes,b.ld_nama from fin_invoice a
				  left outer join loundry b on (a.fin_inv_locn = b.ld_id)
				  left outer join customer c on (a.fin_inv_cust_id = c.cust_id)
					where fin_inv_dt >= '$start_date' and fin_inv_dt <= '$end_date' $paramLocn ";

		return $this->db->query($query)->result_array();

	}

	public function addInvoice(){

		if ($this->input->post('type') == 'TUNAI') {
			$bayar= $this->input->post('jml');
		} else if ($this->input->post('type') == 'HUTANG') {
			$bayar = '0';
		}


		$data = [
			'fin_inv_dt' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
			'fin_inv_locn' => $this->input->post('locn', true),
			'fin_inv_cust_id' => $this->input->post('nama', true),
			'fin_inv_city' => $this->input->post('alamat', true),
			'fin_inv_status' => 'OPEN',
			'fin_inv_type' => $this->input->post('type',true),
			'fin_inv_total_amt' => $this->input->post('jml',true),
			'fin_inv_paid_amt' => $bayar,
			'fin_inv_notes' => $this->input->post('notes',true)
			// 'created_by' => $this->input->post('staff',true)
		];

		$this->db->insert('fin_invoice',$data);
	}

	public function getDataHutang(){
		$query = 'select * from fin_invoice inner join customer on (fin_inv_cust_id = cust_id) where fin_inv_type = "hutang" order by fin_inv_dt asc';

		return $this->db->query($query)->result_array();
	}

	public function getDataHutangbyParam($start_date,$end_date,$locn){
		$paramLocn = "";
		$paramPelanggan = "";

		if ($locn != '' || $locn = null) {
			$paramLocn = " and fin_inv_locn = '$locn'";
		}

		$query = "select * from fin_invoice inner join customer on (fin_inv_cust_id = cust_id) 
		where fin_inv_type = 'hutang' and fin_inv_dt >= '$start_date' and fin_inv_dt <= '$end_date' $paramLocn";

		return $this->db->query($query)->result_array();
	}

	public function getLocn(){
		$this->db->select('distinct fin_inv_locn',false)->from('fin_invoice')->where('fin_inv_locn <>','');
		return $query = $this->db->get()->result_array();
	}

	public function getAllHasilGosok(){
		return $this->db->get('hasil_gosok')->result_array();
	}

	public function addHasilGosok(){
		$data = [
			'hg_tgl' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
			'hg_ld_id' => $this->input->post('laundry', true),
			'hg_tg_id' => $this->input->post('nama', true),
			'hg_hasil' => $this->input->post('hasil',true)
		];

		$this->db->insert('hasil_gosok',$data);
	}

	public function getAllHasilGosokbyParam($start_date,$end_date,$locn){
		$paramLocn = "";
		$paramPelanggan = "";

		if ($locn != '' || $locn = null) {
			$paramLocn = " and hg_ld_id = '$locn'";
		}

		$query = "select a.hg_id,a.hg_tgl,a.hg_hasil,b.ld_nama,c.tg_nama from hasil_gosok a
		left outer join loundry b on (a.hg_ld_id = b.ld_id)
		left outer join tukang_gosok c on (a.hg_tg_id = c.tg_id)
		where a.hg_tgl >= '$start_date' and a.hg_tgl <= '$end_date' $paramLocn";

		return $this->db->query($query)->result_array();
	}

}