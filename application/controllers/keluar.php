<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('keluar_model');
	$this->load->model('mobil_model');
	$this->load->model('user_model');
  }
	
  public function index()
  {
	  $data['title'] = 'keluar';
	  $keluarData = $this->keluar_model->data();
  
	  // Check the type of $keluarData
	  if (is_array($keluarData)) {
		  $data['keluar'] = $keluarData;
	  } elseif (is_object($keluarData)) {
		  $data['keluar'] = $keluarData->result();
	  } else {
		  // Handle the case where $keluarData is neither an array nor an object
		  $data['keluar'] = array();
	  }
  
	  $this->load->view('templates/header', $data);
	  $this->load->view('keluar/index');
	  $this->load->view('templates/footer');
  }
  

	public function tambah()
	{
		$data['title'] = 'keluar';
		$data['mobil'] = $this->mobil_model->data()->result();
		$data['user'] = $this->user_model->data()->result();
		$data['jmlmobil'] = $this->mobil_model->data()->num_rows();
		$data['tglnow'] = date('m/d/Y');

		$this->load->view('templates/header', $data);
		$this->load->view('keluar/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'keluar';
		$where = array('id_keluar'=>$id);
		$data['data'] = $this->keluar_model->detail_data($where, 'keluar')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('keluar/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail_data($id)
  {
    $data['title'] = 'keluar';

	$where = array('id_keluar'=>$id);
	$data['data'] = $this->keluar_model->detail_data($where, 'keluar')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('keluar/detail');
    $this->load->view('templates/footer');
  }

  public function proses_hapus($id)
  {
	  $where = array('id_keluar' => $id);
	  $foto = $this->keluar_model->ambilFoto($where);
  
	  // Check if the record exists before attempting to delete
	  $existingRecord = $this->keluar_model->ambilId('keluar', $where)->row();
	  if (!$existingRecord) {
		  // Record not found
		  $this->session->set_flashdata('Pesan', '
			  <script>
			  $(document).ready(function() {
				  swal.fire({
					  title: "Data tidak ditemukan!",
					  icon: "error",
					  confirmButtonColor: "#d33",
				  });
			  });
			  </script>
		  ');
		  redirect('keluar');
		  return;
	  }
  
	  if ($foto) {
		  if ($foto != 'man.png') {
			  unlink('./assets/upload/keluar/' . $foto . '');
		  }
	  }
  
	  $this->keluar_model->hapus_data($where, 'keluar');
  
	  $this->session->set_flashdata('Pesan', '
		  <script>
		  $(document).ready(function() {
			  swal.fire({
				  title: "Berhasil dihapus!",
				  icon: "success",
				  confirmButtonColor: "#4e73df",
			  });
		  });
		  </script>
	  ');
	  redirect('keluar');
  }
  

  public function proses_tambah()
  {
	  $kode = $this->keluar_model->buat_kode();
	  $id_user = $this->input->post('id_user');
	  $id_mobil = $this->input->post('mobil');
	  $nopol = $this->input->post('nopol');
	  $tujuan = $this->input->post('tujuan');
	  $tanggal_keluar = $this->input->post('tanggal_keluar');
	  
	  $explode = explode("/", $tanggal_keluar);
    $tglkeluar = $explode[2].'-'.$explode[0].'-'.$explode[1];

    $idmobil = array('id_mobil'=>$mobil);

  
	  $data = array(
		  'id_keluar' => $kode,
		  'id_user' => $id_user,
		  'id_mobil' => $id_mobil,
		  'nopol' => $nopol,
		  'tujuan' => $tujuan,
		  'tanggal_keluar' => $tanggal_keluar,
	  );
  
	  $this->keluar_model->tambah_data($data, 'keluar');
	  $this->session->set_flashdata('Pesan', '
		  <script>
		  $(document).ready(function() {
			  swal.fire({
				  title: "Berhasil ditambah!",
				  icon: "success",
				  confirmButtonColor: "#4e73df",
			  });
		  });
		  </script>
	  ');
	  redirect('keluar');
  }
  

  public function proses_ubah()
  {
	  $kode = $this->keluar_model->buat_kode();
	  $id_user = $this->input->post('id_user');
	  $id_mobil = $this->input->post('mobil');
	  $nopol = $this->input->post('nopol');
	  $tujuan = $this->input->post('tujuan');
	  $tanggal_keluar = $this->input->post('tanggal_keluar');
	  $flama = $this->input->post('fotoLama');
  
	  $data = array(
		  'id_keluar' => $kode,
		  'id_user' => $id_user,
		  'id_mobil' => $id_mobil,
		  'nopol' => $nopol,
		  'tujuan' => $tujuan,
		  'tanggal_keluar' => $tanggal_keluar,
	  );
  
	  $where = array('id_keluar' => $kode);
  
	  $this->keluar_model->ubah_data($where, $data, 'keluar');
	  $this->session->set_flashdata('Pesan', '
		  <script>
		  $(document).ready(function() {
			  swal.fire({
				  title: "Berhasil diubah!",
				  icon: "success",
				  confirmButtonColor: "#4e73df",
			  });
		  });
		  </script>
	  ');
	  redirect('keluar');
  }
  
}
