<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		public function gethari()
	{
		$this->db->select('id_hari')->from('hari');
		$hari = $this->db->get();
		return $hari;
	}
		public function getjam()
		{
			$this->db->select('id_jam')->from('jam');
			$jam = $this->db->get();
			return $jam;
		}

		public function getidkaryawan()
		{
			$this->db->select('id_karyawan')->from('karyawan');
      $karyawan = $this->db->get();
			return $karyawan;
		}
		public function gethari_by_nama($nama_hari){
		$this->db->select('id_hari');
		$this->db->from('hari');
		$this->db->where('nama_hari',$nama_hari);
		$query = $this->db->get()->result();

		foreach ($query as $q) {
			$id_hari = $q->id_hari;
		}

		return $id_hari;
	}
		public function getkaryawan_by_nama($nama){
		$this->db->select('id_karyawan');
		$this->db->from('karyawan');
		$this->db->where('nama',$nama);
		$query = $this->db->get()->result();

		foreach ($query as $q) {
			$id_karyawan = $q->id_karyawan;
		}
		return $id_karyawan;
	}

	public function tambahDataKaryawan($datapegawai)
	{
		$this->db->insert('jadwal_pegawai', $datapegawai);
		return $this->db->insert_id();

	}
	public function tambahDatafitness($datafitness)
	{
		$this->db->insert('fitness', $datafitness);
		return $this->db->insert_id();

	}

	
public function tambahDataindividu($dataindividu)
	{
		$this->db->insert('data_individu', $dataindividu);
		return $this->db->insert_id();

	}
	public function hapusDataindividu()
	{
		$this->db->truncate('data_individu');

	}
}
