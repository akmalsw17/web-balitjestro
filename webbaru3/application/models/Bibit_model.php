<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bibit_model extends CI_Model {

	var $table = 'bibit';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function tampilBibit()
	{
		$databibit = $this->db->get($this->table);
		return $databibit;
	}

	public function tambahDataBibit($databibit)
	{
		$this->db->insert($this->table, $databibit);
		return $this->db->insert_id();
	}
	public function tambahDataFase($datafase)
	{
		$this->db->insert('fasebibit', $datafase);
		return $this->db->insert_id();
	}

	public function tampilFase($tanggal)
	{
		$datafase = $this->db->select('b.varietas, b.kode_blok, fb.fase1, fb.fase2, fb.fase3, fb.fase4, fb.fase5, fb.fase6 ')->from('fasebibit fb')->where('fase1', $tanggal)->or_where('fase2', $tanggal)->or_where('fase3', $tanggal)->or_where('fase4', $tanggal)->or_where('fase5', $tanggal)->or_where('fase6', $tanggal)->join('bibit b', 'b.kode_blok = fb.kode_blok')->get()->result();
		return $datafase;
	}
}