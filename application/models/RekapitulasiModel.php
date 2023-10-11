<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekapitulasiModel extends CI_Model
{

  public function save_rekapitulasi($data)
  {
    // Simpan data siswa ke database
    $this->db->insert('rekapitulasi', $data);
  }

  public function get_rekapitulasi()
  {
    $query = $this->db->select('nis, nama_siswa, tgl_rekap, keterangan')
      ->get('rekapitulasi');
    return $query->result_array();
  }
  public function hapus_rekapitulasi($nis)
  {
    // Hapus data rekapitulasi dari tabel siswa berdasarkan nis
    $this->db->where('nis', $nis);
    $this->db->delete('rekapitulasi');
  }
  
  public function update_rekapitulasi($nis, $data){
    $this->db->where('nis', $nis);
    $this->db->update('rekapitulasi', $data);
}

  // Tambahkan metode lainnya sesuai kebutuhan
}
