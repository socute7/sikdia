<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('anggota_model');
	$this->load->model('mobil_model');
	$this->load->model('peminjaman_model');
  }
	
	public function index()
	{
		$data['title'] = 'Peminjaman';
		$data['pinjam'] = $this->peminjaman_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('peminjaman/index');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Peminjaman';

    	$data['data'] = $this->peminjaman_model->detail_join($id)->result();
    	$data['listmobil'] = $this->mobil_model->detail_join_pmobil($id)->result();

		$this->load->view('templates/header', $data);
		$this->load->view('peminjaman/detail');
		$this->load->view('templates/footer');
	}

	public function getPeminjaman()
	{
    	$data = $this->peminjaman_model->dataJoin()->result();
    	echo json_encode($data);
	}

	public function filterPeminjaman($tglawal, $tglakhir)
	{
      	$data = $this->peminjaman_model->lapdata($tglawal, $tglakhir)->result();
    	echo json_encode($data);
	}

	public function getAnggota()
	{
		$id = $this->input->post('id');
    	$where = array('id_anggota' => $id );
    	$data = $this->anggota_model->detail_data($where, 'anggota')->result();
    	echo json_encode($data);
	}

	public function getmobil()
	{
		$id = $this->input->post('id');
    	$where = $id;
    	$data = $this->mobil_model->detail_join($where)->result();
    	echo json_encode($data);
	}

	public function tambah()
	{
		$data['title'] = 'Peminjaman';
		$data['kode'] = $this->peminjaman_model->buat_kode(); 
		// add 3 days to date
		$data['tglsekarang'] = Date('y-m-d');
		$data['tglplus3'] =Date('y-m-d', strtotime('+3 days'));

		//data untuk select
		$data['anggota'] = $this->anggota_model->data()->result();
		$data['mobil'] = $this->mobil_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('peminjaman/form_tambah');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$idpinjam = $_POST['idpinjam']; 
		$idanggota = $_POST['anggota']; 
		$idmobil = $_POST['idmobil']; 
		$qty = $_POST['qty']; 
		$tglpinjam = $_POST['tglpinjam']; 
		$tglkembali = $_POST['tglkembali'];
		$ket = $_POST['ket'];
		$usr = $this->session->userdata('username');

		$data = array();
		
		$index = 0; // Set index array awal dengan 0
		foreach($idmobil as $mobil){ 
		  array_push($data, array(
			'id_mobil'=>$mobil,
			'qty'=>$qty[$index], 
			'id_pinjam'=>$idpinjam,
		  ));
		  $index++;
		}

		$data2=array(
			'id_pinjam'=>$idpinjam,
			'tgl_pinjam'=> $tglpinjam,
			'id_anggota'=>$idanggota,
			'tempo'=>$tglkembali,
			'ket'=>$ket,
			'status'=>'Pinjam',
			'usr_input' => $usr
		);

		$this->peminjaman_model->tambah_data($data2, 'peminjaman');
		$this->peminjaman_model->save_batch($data, 'p_mobil');

		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('peminjaman');

	}

	public function proses_hapus($id)
	{
		$where = array('id_pinjam' => $id );
		$this->peminjaman_model->hapus_data($where, 'peminjaman');
		$this->peminjaman_model->hapus_data($where, 'p_mobil');
		$this->peminjaman_model->hapus_data($where, 'pengembalian');
		
		$this->session->set_flashdata('Pesan','
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
		redirect('peminjaman');
	}

	

}