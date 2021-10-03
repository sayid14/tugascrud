<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('M_Magang');
	}

	public function index()
	{
		$queryAllMagang = $this->M_Magang->getDataMagang();
		$DATA = array('queryAllMagang' => $queryAllMagang);
		$this->load->view('home', $DATA);
	}

	public function halaman_tambah() 
	{
		$this->load->view('halaman_tambah_data');
	}

	public function halaman_edit($nim)
	{
		$queryMagangDetail = $this->M_Magang->getDataMagangDetail($nim);
		$DATA = array('queryMagangDetail' => $queryMagangDetail);
		$this->load->view('halaman_edit_data', $DATA);
	}

	public function fungsiTambah()
	{
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$tanggallahir = $this->input->post('tanggallahir');
		$jurusan = $this->input->post('jurusan');

		$ArrInsert = array(
			'nim' => $nim,
			'nama' => $nama,
			'jabatan' => $jabatan,
			'tanggallahir' => $tanggallahir,
			'jurusan' => $jurusan
		);

		$this->M_Magang->insertDataMagang($ArrInsert);
		redirect(base_url(''));

	}

	public function fungsiEdit()
	{
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$tanggallahir = $this->input->post('tanggallahir');
		$jurusan = $this->input->post('jurusan');

		$ArrUpdate = array(
			'nama' => $nama,
			'jabatan' => $jabatan,
			'tanggallahir' => $tanggallahir,
			'jurusan' => $jurusan
		);

		$this->M_Magang->updateDataMagang($nim, $ArrUpdate);
		redirect(base_url(''));

	}

	public function fungsiDelete($nim)
	{
		$this->M_Magang->deleteDataMagang($nim);
		redirect(base_url(''));
	}
}
