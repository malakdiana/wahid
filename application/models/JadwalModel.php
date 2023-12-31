<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalModel extends CI_Model
{

  public function save_jadwal($data)
  {
    // Simpan data siswa ke database
    $this->db->insert('jadwal', $data);
  }

  public function get_jadwal()
  {
    $query = $this->db->select('j.id_jadwal, j.hari, j.id_matapelajaran, j.open, m.nama_matapelajaran')
      ->from('jadwal j')
      ->join('mata_pelajaran m','j.id_matapelajaran = m.id_matapelajaran')
      ->get();
    return $query->result_array();
  }
  public function hapus_jadwal($id_jadwal)
  {
    // Hapus data siswa dari tabel siswa berdasarkan nis
    $this->db->where('id_jadwal', $id_jadwal);
    $this->db->delete('jadwal');
  }
  
  public function update_jadwal($id_jadwal, $data){
    $this->db->where('id_jadwal', $id_jadwal);
    $this->db->update('jadwal', $data);
}

  // Tambahkan metode lainnya sesuai kebutuhan
}
