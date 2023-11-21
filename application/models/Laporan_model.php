<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
	public function rptHutang(){
		// echo 'Laporan';
		$query = 'select * from fin_invoice where fin_inv_type = "hutang" ';
		if ($this->input->post('laundry1')){
			$query = $query . ' and fin_inv_locn = '. $this->input->post('laundry1');
		}

		if ($this->input->post('startDt1') && $this->input->post('endDt1')) {
			$query = $query . ' and fin_inv_dt >= "'. date('Y-m-d', strtotime($this->input->post('startDt1')))
			. '" and fin_inv_dt <= "' . date('Y-m-d', strtotime($this->input->post('endDt1'))) . '"';
			echo date('Y-m-d', strtotime($this->input->post('endDt1')));
		}
		
		return $this->db->query($query)->result_array();
	}

	public function rptHasilbyLaundry(){
		$query = 'select ld_nama,sum(fin_inv_paid_amt) as total from fin_invoice inner join loundry on (fin_inv_locn = ld_id) where fin_inv_dt >= "' .date('Y-m-d', strtotime($this->input->post('startDt2'))). '" and fin_inv_dt <= "' .  date('Y-m-d', strtotime($this->input->post('endDt2'))) . '" 
			group by ld_nama';

		return $this->db->query($query)->result_array();
	}

	public function rptHasilbyTgl(){
		$query = 'select fin_inv_dt,sum(fin_inv_paid_amt) as total from fin_invoice inner join loundry on (fin_inv_locn = ld_id) where fin_inv_dt >= "' .date('Y-m-d', strtotime($this->input->post('startDt2'))). '" and fin_inv_dt <= "' .  date('Y-m-d', strtotime($this->input->post('endDt2'))) . '" 
			group by fin_inv_dt';

		return $this->db->query($query)->result_array();
	}

	public function rptHasilGosok(){
		$query = 'select * from hasil_gosok
				 inner join loundry on (hg_ld_id = ld_id)
				 inner join tukang_gosok on (hg_tg_id = tg_id) 
				 where hg_tgl >= "' .date('Y-m-d', strtotime($this->input->post('startDt3'))). '" and hg_tgl <= "' .  date('Y-m-d', strtotime($this->input->post('endDt3'))) . '"';
				 return $this->db->query($query)->result_array();
	}

}