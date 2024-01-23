<?php
class mobil_model extends ci_model{


    function data()
    {
        $this->db->order_by('id_mobil','DESC');
        return $query = $this->db->get('mobil');
    }

    public function ambilFoto($where)
    {
      $this->db->order_by('id_mobil','DESC');
      $this->db->limit(1);
      $query = $this->db->get_where('mobil', $where);   
      
      $data = $query->row();
      $foto= $data->foto;
      
      return $foto;
    }

    // public function ambil_stok($where)
    // {
    //     $this->db->order_by('id_mobil', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get_where('mobil', $where);
    //     $data = $query->row();
    //     $stok = $data->jmlmobil; // Sesuaikan dengan nama kolom pada tabel
    //     return $stok;
    // }

    public function dataJoin()
    {
      $this->db->select('*');
      $this->db->from('mobil as b');
      $this->db->join('kategori as k', 'k.id_kategori = b.id_kategori');

      $this->db->order_by('b.id_mobil','DESC');
      return $query = $this->db->get();
    }

    public function detail_join($where)
    {
      $this->db->select('*');
      $this->db->from('mobil as b');
      $this->db->where('b.id_mobil',$where);
      $this->db->join('kategori as k', 'k.id_kategori = b.id_kategori');

      
      return $this->db->get();
    }

    public function detail_join_pmobil($where)
    {
      $this->db->select('*');
      $this->db->from('p_mobil as pb');
      $this->db->join('mobil as b', 'b.id_mobil = pb.id_mobil');

      $this->db->where('pb.id_pinjam',$where);
      return $this->db->get();
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
    // Get the column names from the mobil table
    $column_names = $this->db->list_fields($table);

    // Filter the $data array to only include existing columns
    $filtered_data = array_intersect_key($data, array_flip($column_names));

    $this->db->where($where);
    $this->db->update($table, $filtered_data);
}




  //   public function buat_kode()   {
	// 	  $this->db->select('RIGHT(mobil.id_mobil,4) as kode', FALSE);
	// 	  $this->db->order_by('id_mobil','DESC');
	// 	  $this->db->limit(1);
	// 	  $query = $this->db->get('mobil');      //cek dulu apakah ada sudah ada kode di tabel.
	// 	  if($query->num_rows() <> 0){
	// 	   //jika kode ternyata sudah ada.
	// 	   $data = $query->row();
	// 	   $kode = intval($data->kode) + 1;
	// 	  }
	// 	  else {
	// 	   //jika kode belum ada
	// 	   $kode = 1;
	// 	  }
	// 	  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
	// 	  $kodejadi = "B".$kodemax;    // hasilnya ODJ-0001 dst.
	// 	  return $kodejadi;
	// }



}
