<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaModel extends CI_Model
{

  public function saveSiswa($data)
  {
    // Simpan data siswa ke database
    $this->db->insert('siswa', $data);
  }

  public function get_siswa()
  {
    $query = $this->db->select('nis, nama_siswa, id_kelas, tgl_lhr_siswa, jk_siswa, agama_siswa, alamat_siswa')
      ->get('siswa');
    return $query->result_array();
  }

  public function get_total_siswa()
  {
    $query = $this->db->select('kelas.id_kelas, nama_kelas, count(siswa.id_kelas) as jumlah')
      ->from('kelas')
      ->join('siswa','siswa.id_kelas = kelas.id_kelas','left')
      ->group_by('nama_kelas ,kelas.id_kelas')
      ->get();
    return $query->result_array();
  }


  public function hapus_siswa($nis)
  {
    // Hapus data siswa dari tabel siswa berdasarkan nis
    $this->db->where('nis', $nis);
    $this->db->delete('siswa');
  }
  
  public function update_siswa($nis, $data){
    $this->db->where('nis', $nis);
    $this->db->update('siswa', $data);
}
public function get_detail_siswa()
  {
    $query = $this->db->select('s.nis, s.nama_siswa, s.id_kelas, s.tgl_lhr_siswa, s.jk_siswa, s.agama_siswa, s.alamat_siswa,k.nama_kelas')
    ->from('siswa s')
    ->join('kelas k','k.id_kelas = s.id_kelas')  
    ->get();
    return $query->result_array();
  }

  // Tambahkan metode lainnya sesuai kebutuhan
}
