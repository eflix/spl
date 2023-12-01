<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData_model extends CI_Model {
	public function getAllLaundry(){
		return $this->db->get('loundry')->result_array();
	}

	public function addLaundry(){
		$data = [
			'ld_nama' => $this->input->post('nama', true),
			'ld_no_telp' => $this->input->post('noTelp', true),
			'ld_alamat' => $this->input->post('alamat', true)
		];

		$this->db->insert('loundry',$data);
	}

	public function getAllCustomer(){
		return $this->db->get('customer')->result_array();
	}

	public function addCustomer(){
		$data = [
			'cust_nama' => $this->input->post('nama', true),
			'cust_no_telp' => $this->input->post('noTelp', true),
			'cust_alamat' => $this->input->post('alamat', true)
		];

		$this->db->insert('customer',$data);
	}

	public function getAllTukangGosok(){
		$query = "select * from tukang_gosok
				inner join loundry on (tg_ld_id = ld_id)";

		return $this->db->query($query)->result_array();

		// return $this->db->get('tukang_gosok')->result_array();
	}

	public function addTukangGosok(){
		$data = [
			'tg_ld_id' => $this->input->post('laundry', true),
			'tg_nama' => $this->input->post('nama', true),
			'tg_no_telp' => $this->input->post('noTelp', true),
			'tg_harga_per_kg' => $this->input->post('hrgPerKg', true),
			'tg_alamat' => $this->input->post('alamat', true)
		];

		$this->db->insert('tukang_gosok',$data);
	}

	public function getAllEmployee(){
		return $this->db->get('employee')->result_array();
	}

	public function addEmployee(){
		$data = [
			'emp_nama' => $this->input->post('nama', true),
			'emp_no_telp' => $this->input->post('noTelp', true),
			'emp_alamat' => $this->input->post('alamat', true)
		];

		$this->db->insert('employee',$data);
	}

	public function getAllItems(){
		return $this->db->get('items')->result_array();
	}

	public function addItems(){
		$data = [
			'item_nama' => $this->input->post('nama', true),
			'item_harga' => $this->input->post('harga', true)
		];

		$this->db->insert('items',$data);
	}
}