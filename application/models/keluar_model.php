<?php
class keluar_model extends ci_model{


    public function data()
{
    $this->db->select('keluar.*, pengguna.nama AS nama_user, mobil.merk'); // Change alias to 'merk' instead of 'merk_mobil'
    $this->db->from('keluar');
    $this->db->join('pengguna', 'keluar.id_user = pengguna.id_user', 'left');
    $this->db->join('mobil', 'keluar.id_mobil = mobil.id_mobil', 'left');
    $this->db->order_by('keluar.id_keluar', 'DESC');
    
    $query = $this->db->get();
    
    // Check if there are rows in the result
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array(); // Return an empty array if there are no rows
    }
}



    public function ambilFoto($where)
    {
      $this->db->order_by('id_keluar','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('keluar', $where);   
      
      $data = $query->row();
      $foto= $data->foto;
      
      return $foto;
    }


    public function ambilId($table, $where)
   {
       return $this->db->get_where($table, $where);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }


    public function detail_data($where, $table)
    {
       return $this->db->get_where($table,$where);
    }

    public function tambah_data($data, $table)
    {
       $this->db->insert($table, $data);
    }

    public function ubah_data($where, $data, $table)
    {
       $this->db->where($where);
       $this->db->update($table, $data);

    }


    public function buat_kode()   {
		  $this->db->select('RIGHT(keluar.id_keluar,4) as kode', FALSE);
		  $this->db->order_by('id_keluar','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('keluar');      //cek dulu apakah ada sudah ada kode di tabel.
		  if($query->num_rows() <> 0){
		   //jika kode ternyata sudah ada.
		   $data = $query->row();
		   $kode = intval($data->kode) + 1;
		  }
		  else {
		   //jika kode belum ada
		   $kode = 1;
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KEL".$kodemax;    // hasilnya ODJ-0001 dst.
		  return $kodejadi;
	}

    public function getJumlahKeluar()
    {
        $this->db->from('keluar');
        return $this->db->count_all_results();
    }



}
