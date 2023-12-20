<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function getPenghasilan(){
		$query = "
			SELECT SUM(fin_inv_paid_amt) 'total' FROM fin_invoice
			WHERE fin_inv_type <> 'HUTANG' AND fin_inv_dt = CURRENT_DATE()
		";

		return $this->db->query($query)->row();
	}

	public function getHutang(){
		$query = "
			SELECT SUM(fin_inv_total_amt) 'total' FROM fin_invoice
			WHERE fin_inv_type = 'HUTANG' AND fin_inv_dt = CURRENT_DATE()
		";

		return $this->db->query($query)->row();
	}

	public function getHasilGosok(){
		$query = "
			SELECT SUM(hg_hasil) 'total' FROM hasil_gosok
			WHERE  hg_tgl = CURRENT_DATE()
		";

		return $this->db->query($query)->row();
	}

}