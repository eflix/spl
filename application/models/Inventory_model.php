<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model {

	public function getAllData(){
		$query = "
			select * from inventory
			inner join loundry on (inv_tran_locn = ld_id)
			inner join items on (inv_tran_item_name = item_id) 
		";

		return $this->db->query($query)->result_array();
		// return $this->db->get('inventory')->result_array();
	}

	public function mngInventory($locn,$startDt,$endDt){
		return $this->db->query("
		select item_nama inv_tran_item_name, inv_tran_item_uom,sum(sa) as sa, sum(qty_in) as qty_in, sum(qty_out) as qty_out from (
			SELECT inv_tran_locn,inv_tran_item_name, inv_tran_item_uom, SUM(
			CASE WHEN inv_tran_in_out = 'in'
			THEN inv_tran_item_qty
			ELSE inv_tran_item_qty * -1
			END ) AS sa, 0 AS qty_in, 0 AS qty_out
			FROM inventory
			WHERE inv_tran_dt < '$startDt' and inv_tran_locn = $locn
			GROUP BY inv_tran_locn,inv_tran_item_name, inv_tran_item_uom
			UNION ALL
			SELECT inv_tran_locn,inv_tran_item_name, inv_tran_item_uom, 0,
			CASE WHEN inv_tran_in_out = 'in'
			THEN inv_tran_item_qty
			ELSE 0
			END ,
			CASE WHEN inv_tran_in_out = 'out'
			THEN inv_tran_item_qty
			ELSE 0
			END FROM inventory
			WHERE inv_tran_dt >= '$startDt'
			AND inv_tran_dt <= '$endDt' and inv_tran_locn = $locn
			) as mngInv
			inner join loundry on (inv_tran_locn = ld_id)
			inner join items on (inv_tran_item_name = item_id)
			group by inv_tran_item_name, inv_tran_item_uom
			")->result_array();
	}

	public function addStock(){
		if ($this->input->post('type') == 'PEMBELIAN'){
			$inOut = 'IN';
		} else if ($this->input->post('type') == 'PEMAKAIAN'){
			$inOut = 'OUT';
		}
		$data = [
			'inv_tran_locn' => $this->input->post('locn'),
			'inv_tran_dt' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
			'inv_tran_in_out' => $inOut,
			'inv_tran_type' => $this->input->post('type'),
			'inv_tran_item_name' => $this->input->post('namaBrg'),
			'inv_tran_item_qty' => $this->input->post('qty'),
			'inv_tran_item_uom' => $this->input->post('uom'),
			'inv_tran_item_price' => $this->input->post('harga'),
			'inv_tran_notes' => $this->input->post('notes')
		];

		$this->db->insert('inventory',$data);
	}

}