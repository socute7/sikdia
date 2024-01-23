<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('kategori_model');
	$this->load->model('mobil_model');
  }
	
	public function index()
	{
		$data['title'] = 'mobil';
		$data['mobil'] = $this->mobil_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('mobil/index');
		$this->load->view('templates/footer');
	}

	// public function getTotalStok()
    // {
    //     $idmobil = $this->input->post('id');

    //     $this->db->select_sum('pb.qty');
    //     $this->db->from('peminjaman as p');
    //     $this->db->join('p_mobil as pb', 'pb.id_pinjam = p.id_pinjam');
    //     $this->db->where('pb.id_mobil', $idmobil);
    //     $this->db->where('p.status', 'Pinjam');
    //     $query = $this->db->get();
    //     $p = $query->row();

    //     $data = $this->db->select('*')->from('mobil')->where('id_mobil', $idmobil)->get();
    //     $b = $data->row();

    //     $hasil = intval($b->jmlmobil) - intval($p->qty); // Sesuaikan dengan nama kolom pada tabel

    //     $total = array('total' => $hasil);
    //     echo json_encode($total);
    // }

	

	public function tambah()
	{
		$data['title'] = 'mobil';
		//data untuk select
		$data['kategori'] = $this->kategori_model->data()->result();

		//jml data
		$data['jmlKategori'] = $this->kategori_model->data()->num_rows();
		

		$this->load->view('templates/header', $data);
		$this->load->view('mobil/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'mobil';
		//menampilkan data berdasarkan id
		$where = array('id_mobil'=>$id);
		$data['data'] = $this->mobil_model->detail_data($where, 'mobil')->result();

		//data untuk select
		$data['kategori'] = $this->kategori_model->data()->result();

		//jml data
		$data['jmlKategori'] = $this->kategori_model->data()->num_rows();
		

		$this->load->view('templates/header', $data);
		$this->load->view('mobil/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail_data($id)
  {
    $data['title'] = 'mobil';

    $where = $id;
    $data['data'] = $this->mobil_model->detail_join($where)->result();

    $this->load->view('templates/header', $data);
    $this->load->view('mobil/detail');
    $this->load->view('templates/footer');
  }

	public function proses_hapus($id)
	{
		$where = array('id_mobil' => $id );
		$foto = $this->mobil_model->ambilFoto($where);
		if($foto){
			if($foto == 'book.png'){

			}else{
				unlink('./assets/upload/buku/'.$foto.'');
			}
			
			$this->mobil_model->hapus_data($where, 'mobil');
		}
		
		
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
		redirect('mobil');
	}

	public function proses_tambah()
	{
		
		$config['upload_path']   = './assets/upload/buku/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);
		
		$id = $this->input->post('id'); 
		$mobil = $this->input->post('mobil');
		$kategori = $this->input->post('kategori');
		$reg = $this->input->post('reg');
		$ukuran = $this->input->post('ukuran');
		$bahan = $this->input->post('bahan');
		$rangka = $this->input->post('rangka');
		$mesin = $this->input->post('mesin');
		$bpkb = $this->input->post('bpkb');
		$asal = $this->input->post('asal');
		$harga = $this->input->post('harga');
		$nopol = $this->input->post('nopol');
		$thn = $this->input->post('thn');
		$keterangan = $this->input->post('keterangan');
	
	
		if ($namaFile == '') {
		  	$ganti = 'book.png';
		}else{
			if (! $this->upload->do_upload('photo')) {
			  $error = $this->upload->display_errors();
			  /*
			  $this->session->set_flashdata('Pesan','<div class="alert alert-warning alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <h4><i class="icon fa fa-warning"></i> Oops</h4>
					  '.$error.'
					</div>');
				*/
		  	redirect('mobil/tambah');
			}
			else{
	
			  $data = array('photo' => $this->upload->data());
			  $nama_file= $data['photo']['file_name'];
			  $ganti = str_replace(" ", "_", $nama_file);
	
	
			}

		}

		$data=array(
			'id_mobil'=>$id,
			'id_kategori'=>$kategori,
			'reg'=>$reg,
			'merk'=>$mobil,
			'ukuran'=>$ukuran,
			'bahan'=>$bahan,
			'rangka'=>$rangka,
			'mesin'=>$mesin,
			'nopol'=>$nopol,
			'tahun' => $thn,
			'bpkb' => $bpkb,
			'asal' => $asal,
			'harga' => $harga,
			'keterangan' => $keterangan,
			'foto' => $ganti
				);
	  
		  $this->mobil_model->tambah_data($data, 'mobil');
		  $this->session->set_flashdata('Pesan','
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
		  redirect('mobil');

	}

	public function proses_ubah()
	{
		$config['upload_path']   = './assets/upload/buku/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);
		
		$id = $this->input->post('id'); 
		$mobil = $this->input->post('mobil');
		$kategori = $this->input->post('kategori');
		$reg = $this->input->post('reg');
		$ukuran = $this->input->post('ukuran');
		$bahan = $this->input->post('bahan');
		$rangka = $this->input->post('rangka');
		$mesin = $this->input->post('mesin');
		$bpkb = $this->input->post('bpkb');
		$asal = $this->input->post('asal');
		$harga = $this->input->post('harga');
		$nopol = $this->input->post('nopol');
		$thn = $this->input->post('thn');
		$keterangan = $this->input->post('keterangan');

		$flama = $this->input->post('fotoLama');
	
	
		if ($namaFile == '') {
		  	$ganti = $flama;
		}else{
			if (! $this->upload->do_upload('photo')) {
			  $error = $this->upload->display_errors();
			  /*
			  $this->session->set_flashdata('Pesan','<div class="alert alert-warning alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <h4><i class="icon fa fa-warning"></i> Oops</h4>
					  '.$error.'
					</div>');
				*/
		  	redirect('mobil/ubah/'.$kode);
			}
			else{
	
			  $data = array('photo' => $this->upload->data());
			  $nama_file= $data['photo']['file_name'];
			  $ganti = str_replace(" ", "_", $nama_file);
			  if($flama == 'book.png'){

			  }else{
				unlink('./assets/upload/buku/'.$flama.'');
			  }
	
			}

		}

		$data=array(
			'id_mobil'=>$id,
			'id_kategori'=>$kategori,
			'reg'=>$reg,
			'merk'=>$mobil,
			'ukuran'=>$ukuran,
			'bahan'=>$bahan,
			'rangka'=>$rangka,
			'mesin'=>$mesin,
			'nopol'=>$nopol,
			'tahun' => $thn,
			'bpkb' => $bpkb,
			'asal' => $asal,
			'harga' => $harga,
			'keterangan' => $keterangan,

			'foto' => $ganti
				);

		$where = array('id_mobil'=>$id);
	  
		  $this->mobil_model->ubah_data($where, $data, 'mobil');
		  $this->session->set_flashdata('Pesan','
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
		  redirect('mobil');
	}

}