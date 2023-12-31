<?php

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('KelasModel');
		$this->load->model('SiswaModel');
		$this->load->model('GuruModel');
		$this->load->model('PelajaranModel');
		$this->load->model('JadwalModel');
		$this->load->model('AbsensiModel');
		$this->load->model('RekapitulasiModel');
		$this->load->model('M_login');

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}

		// if ($this->session->userdata('role') != 2) {
		// 	if($this->uri->segment(2) != '' && $this->uri->segment(2) != 'data_rekapitulasi')
		// 	{
		// 	echo "<script>alert('Your are not authorized');
		// 	window.location.href='" . base_url() . "admin/';
		// 	</script>";
		// 	}
		// }
	}

	function cetak(){
		$data['rekapitulasi'] = $this->AbsensiModel->get_absensi();
		$this->load->library('mypdf');
		$this->mypdf->generate('dompdf', $data);
	}

	function cetak2(){
		$data['rekapitulasi'] = $this->AbsensiModel->get_absensi();
		echo var_dump($data);
		//$this->load->view('dompdf',$data);
	}

	function index()
	{
		$data['siswa'] = $this->SiswaModel->get_siswa();
		$data['kelas'] = $this->KelasModel->get_kelas();
		$data['totalsiswa'] = $this->SiswaModel->get_total_siswa();
		$data['siswa'] = $this->M_login->siswa();
		$data['guru'] = $this->M_login->guru();
		$data['absensi'] = $this->M_login->absensi();
		$data['rekapitulasi'] = $this->M_login->rekapitulasi();



		$this->load->view("head");
		$this->load->view("sidebar");
		$this->load->view("content", $data);

		$this->load->view("footer");
	}

	function datasiswa()
	{
		
		$data['siswa'] = $this->SiswaModel->get_siswa();
		$data['kelas'] = $this->KelasModel->get_kelas();

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("datasiswa", $data);
		// $this->load->view('modaledit', $data);
		$this->load->view('modal_input_siswa', $data);


		$this->load->view("footer");
	}


	public function hapus_siswa($nis)
	{
		// Pastikan $nis tidak kosong
		if (!$nis) {
			redirect('datasiswa'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->SiswaModel->hapus_siswa($nis);


		echo "<script>alert('Data siswa berhasil dihapus.');</script>";
		echo "<script>window.location.href = '" . site_url('admin/datasiswa') . "';</script>";

	}


	function data_kelas()
	{

		$data['kelas'] = $this->KelasModel->get_kelas();

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("datakelas", $data);

		$this->load->view('modal_input_kelas', $data);


		$this->load->view("footer");
	}


	public function hapus_kelas($id_kelas)
	{
		// Pastikan $nis tidak kosong
		if (!$id_kelas) {
			redirect('admin'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->KelasModel->hapus_kelas($id_kelas);


		echo "<script>alert('Data kelas berhasil dihapus.');</script>";
		echo "<script>window.location.href = '" . site_url('admin/data_kelas') . "';</script>";
		// Redirect kembali ke halaman admin atau halaman lain yang diinginkan
		// redirect('admin/data_kelas');
	}


	public function save_kelas()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_kelas', 'ID Kelas', 'required|is_unique[kelas.id_kelas]');
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan halaman tambah kelas dengan error
			echo "<script>alert('ID Kelas Sudah Ada Silahkan Cari ID Kelas lain.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_kelas') . "';</script>";
		} else {
			// Jika validasi berhasil, simpan data kelas ke database
			$data = array(
				'id_kelas' => $this->input->post('id_kelas'),
				'nama_kelas' => $this->input->post('nama_kelas'),
			);

			$this->load->model('KelasModel');
			$this->KelasModel->save_kelas($data);

			// Set pesan alert
			echo "<script>alert('Data kelas berhasil disimpan.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_kelas') . "';</script>";
		}
	}




	public function update_kelas()
	{
		// Validasi input

		$id_kelas = $this->input->post('id_kelas');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'id_kelas' => $this->input->post('id_kelas'),
			'nama_kelas' => $this->input->post('nama_kelas'),


		);


		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('KelasModel');
		$this->KelasModel->update_kelas($id_kelas, $data);

		echo "<script>alert('Data kelas berhasil diupdate.');</script>";
		echo "<script>window.location.href = '" . site_url('admin/data_kelas') . "';</script>";
		// Redirect ke halaman sukses atau halaman lain yang diinginkan
		// redirect('admin/data_kelas');
	}


	function data_guru()
	{
		$data['guru'] = $this->GuruModel->get_guru();
		$data['kelas'] = $this->KelasModel->get_kelas();

		$this->load->model('GuruModel');

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("dataguru", $data);

		$this->load->view('modal_input_guru', $data);


		$this->load->view("footer");
	}

	public function hapus_guru($nip)
	{
		// Pastikan $nip tidak kosong
		if (!$nip) {
			redirect('admin'); // Arahkan kembali ke halaman admin jika nip kosong
		}

		// Hapus data guru dari database
		$this->GuruModel->hapus_guru($nip);

		// Redirect kembali ke halaman admin atau halaman lain yang diinginkan
		redirect('admin/data_guru');
	}

	public function save_guru()
	{

		// Jika validasi berhasil, simpan data kelas ke database
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama_guru' => $this->input->post('nama_guru'),
			'id_kelas' => $this->input->post('id_kelas'),
			'tgl_lhr_guru' => $this->input->post('tgl_lhr_guru'),
			'jk_guru' => $this->input->post('jk_guru'),
			'agama_guru' => $this->input->post('agama_guru'),
			'alamat_guru' => $this->input->post('alamat_guru'),
		);

		$this->load->model('GuruModel');
		$this->GuruModel->save_Guru($data);

		// Set pesan alert
		echo "<script>alert('Data Guru berhasil disimpan.');</script>";
		echo "<script>window.location.href = '" . site_url('admin/data_guru') . "';</script>";
	}
	public function update_guru()
	{
		// Validasi input

		$nip = $this->input->post('nip');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama_guru' => $this->input->post('nama_guru'),
			'id_kelas' => $this->input->post('id_kelas'),
			'tgl_lhr_guru' => $this->input->post('tgl_lhr_guru'),
			'jk_guru' => $this->input->post('jk_guru'),
			'agama_guru' => $this->input->post('agama_guru'),
			'alamat_guru' => $this->input->post('alamat_guru'),
		);


		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('GuruModel');
		$this->GuruModel->update_guru($nip, $data);


		// Redirect ke halaman sukses atau halaman lain yang diinginkan
		redirect('admin/data_guru');
	}


	function data_pelajaran()
	{

		$data['mata_pelajaran'] = $this->PelajaranModel->get_pelajaran();

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("datapelajaran", $data);

		$this->load->view('modal_input_pelajaran', $data);


		$this->load->view("footer");
	}

	public function hapus_pelajaran($id_matapelajaran)
	{
		// Pastikan $nis tidak kosong
		if (!$id_matapelajaran) {
			redirect('admin'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->PelajaranModel->hapus_pelajaran($id_matapelajaran);

		// Redirect kembali ke halaman admin atau halaman lain yang diinginkan
		redirect('admin/data_pelajaran');
	}

	public function save_pelajaran()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_matapelajaran', 'id_matapelajaran',);
		$this->form_validation->set_rules('nama_matapelajaran', 'nama_matapelajaran', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan halaman tambah kelas dengan error
			echo "<script>alert('ID Pelajaran Sudah Ada Silahkan Cari ID Pelajaran Lainnya.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_pelajaran') . "';</script>";
		} else {
			// Jika validasi berhasil, simpan data kelas ke database
			$data = array(
				'id_matapelajaran' => $this->input->post('id_matapelajaran'),
				'nama_matapelajaran' => $this->input->post('nama_matapelajaran'),
			);

			$this->load->model('PelajaranModel');
			$this->PelajaranModel->save_pelajaran($data);

			// Set pesan alert
			echo "<script>alert('Data Mata Pelajaran berhasil disimpan.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_pelajaran') . "';</script>";
		}
	}

	public function update_pelajaran()
	{
		// Validasi input

		$id_matapelajaran = $this->input->post('id_matapelajaran');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'id_matapelajaran' => $this->input->post('id_matapelajaran'),
			'nama_matapelajaran' => $this->input->post('nama_matapelajaran')


		);


		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('PelajaranModel');
		$this->PelajaranModel->update_pelajaran($id_matapelajaran, $data);
		$this->PelajaranModel->update_pelajaran($nama_matapelajaran, $data);


		// Redirect ke halaman sukses atau halaman lain yang diinginkan
		redirect('admin/data_pelajaran');
	}

	function data_jadwal()
	{
		$data['jadwal'] = $this->JadwalModel->get_jadwal();
		$data['mata_pelajaran'] = $this->PelajaranModel->get_pelajaran();

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("datajadwal", $data);
		// $this->load->view('modaledit', $data);
		$this->load->view('modal_input_jadwal', $data);


		$this->load->view("footer");
	}

	public function hapus_jadwal($id_jadwal)
	{
		// Pastikan $nis tidak kosong
		if (!$id_jadwal) {
			redirect('admin/data_jadwal'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->JadwalModel->hapus_jadwal($id_jadwal);

		// Redirect kembali ke halaman admin atau halaman lain yang diinginkan
		redirect('admin/data_jadwal');
	}

	public function save_jadwal()
	{

		// Jika validasi berhasil, simpan data kelas ke database
		$data = array(
			'id_jadwal' => $this->input->post('id_jadwal'),
			'hari' => $this->input->post('hari'),
			'id_matapelajaran' => $this->input->post('id_matapelajaran'),
			'open' => $this->input->post('open'),
		);

		$this->load->model('JadwalModel');
		$this->JadwalModel->save_jadwal($data);

		// Set pesan alert
		echo "<script>alert('Jadwal berhasil disimpan.');</script>";
		echo "<script>window.location.href = '" . site_url('admin/data_jadwal') . "';</script>";
	}

	public function update_jadwal()
	{
		// Validasi input

		$id_jadwal = $this->input->post('id_jadwal');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'id_jadwal' => $this->input->post('id_jadwal'),
			'hari' => $this->input->post('hari'),
			'id_matapelajaran' => $this->input->post('id_matapelajaran'),
			'open' => $this->input->post('open')


		);


		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('JadwalModel');
		$this->JadwalModel->update_jadwal($id_jadwal, $data);
		$this->JadwalModel->update_jadwal($hari, $data);
		$this->JadwalModel->update_jadwal($id_matapelajaran, $data);
		$this->JadwalModel->update_jadwal($open, $data);


		// Redirect ke halaman sukses atau halaman lain yang diinginkan
		redirect('admin/data_jadwal');
	}

	function data_absensi()
	{

		$data['absensi'] = $this->AbsensiModel->get_absensi();
		$data['kelas'] = $this->KelasModel->get_kelas();
		$data['jadwal'] = $this->JadwalModel->get_jadwal();
		$data['siswa'] = $this->SiswaModel->get_siswa();
		$data['guru'] = $this->GuruModel->get_guru();

		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("dataabsensi", $data);

		$this->load->view('modal_input_absensi', $data);


		$this->load->view("footer");
	}

	public function hapus_absensi($id_absensi)
	{
		// Pastikan $nis tidak kosong
		if (!$id_absensi) {
			redirect('admin'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->AbsensiModel->hapus_absensi($id_absensi);

		// Redirect kembali ke halaman admin atau halaman lain yang diinginkan
		redirect('admin/data_absensi');
	}

	public function save_absensi()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_absensi', 'ID id_absensi', 'required|is_unique[absensi.id_absensi]');
		$this->form_validation->set_rules('nis', 'nis', 'required');
		$this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'required');
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('nip', 'nip', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan halaman tambah kelas dengan error
			echo "<script>alert('ID Absensi Sudah Ada Silahkan Cari ID Absensi lain.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_absensi') . "';</script>";
		} else {
			// Jika validasi berhasil, simpan data kelas ke database
			$data = array(
				'id_absensi' => $this->input->post('id_absensi'),
				'nis' => $this->input->post('nis'),
				'id_jadwal' => $this->input->post('id_jadwal'),
				'id_kelas' => $this->input->post('id_kelas'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => $this->input->post('tanggal'),
				'nip' => $this->input->post('nip'),
			);

			$this->load->model('AbsensiModel');
			$this->AbsensiModel->save_absensi($data);

			// Set pesan alert
			echo "<script>alert('Data Absensi berhasil disimpan.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_absensi') . "';</script>";
		}
	}

	public function update_absensi()
	{
		// Validasi input

		$id_absensi = $this->input->post('id_absensi');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'id_absensi' => $this->input->post('id_absensi'),
			'nis' => $this->input->post('nis'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			'id_kelas' => $this->input->post('id_kelas'),
			'keterangan' => $this->input->post('keterangan'),
			'tanggal' => $this->input->post('tanggal'),
			'nip' => $this->input->post('nip'),


		);


		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('AbsensiModel');
		$this->AbsensiModel->update_absensi($id_absensi, $data);
		$this->AbsensiModel->update_absensi($nis, $data);
		$this->AbsensiModel->update_absensi($id_jadwal, $data);
		$this->AbsensiModel->update_absensi($id_kelas, $data);
		$this->AbsensiModel->update_absensi($keterangan, $data);
		$this->AbsensiModel->update_absensi($tanggal, $data);
		$this->AbsensiModel->update_absensi($nip, $data);



		// Redirect ke halaman sukses atau halaman lain yang diinginkan
		redirect('admin/data_absensi');
	}

	function data_rekapitulasi()
	{
		if($this->session->userdata('role') == 1)
		{
			$data['authorized'] = true;
		}else{
			$data['authorized'] = false;
		}
		$data['siswa'] = $this->SiswaModel->get_detail_siswa();

		$data['rekapitulasi'] = $this->AbsensiModel->get_absensi();


		$this->load->view("head");
		$this->load->view("sidebar");

		$this->load->view("datarekapitulasi", $data);

		$this->load->view('modal_input_rekapitulasi', $data);


		$this->load->view("footer");
	}

	public function hapus_rekapitulasi($nis)
	{
		// Pastikan $nis tidak kosong
		if (!$nis) {
			redirect('admin'); // Arahkan kembali ke halaman admin jika nis kosong
		}

		// Hapus data siswa dari database
		$this->RekapitulasiModel->hapus_rekapitulasi($nis);

		// Redirect kembali ke halaman admin atau halaman lain yang diinginkan
		redirect('admin/data_rekapitulasi');
	}

	public function save_rekapitulasi()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nis', 'nis', 'required|is_unique[rekapitulasi.nis]');
		$this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required');
		$this->form_validation->set_rules('tgl_rekap', 'tgl_rekap', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');



		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan halaman tambah kelas dengan error
			echo "<script>alert('Nis Siswa Sudah Ada Silahkan Cari Nis Siswa lain.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_rekapitulasi') . "';</script>";
		} else {
			// Jika validasi berhasil, simpan data kelas ke database
			$data_nis = explode('-',$this->input->post('nis'));

			$data = array(
				'nis' => $data_nis[0],
				'nama_siswa' => $this->input->post('nama_siswa'),
				'tgl_rekap' => $this->input->post('tgl_rekap'),
				'keterangan' => $this->input->post('keterangan'),


			);

			$this->load->model('RekapitulasiModel');
			$this->RekapitulasiModel->save_rekapitulasi($data);

			// Set pesan alert
			echo "<script>alert('Data Rekapitulasi berhasil disimpan.');</script>";
			echo "<script>window.location.href = '" . site_url('admin/data_rekapitulasi') . "';</script>";
		}
	}

	public function update_rekapitulasi()
	{
		// Validasi input

		$nis = $this->input->post('nis');
		// Jika validasi berhasil, simpan data siswa ke database
		$data = array(
			'nis' => $this->input->post('nis'),
			'nama_siswa' => $this->input->post('nama_siswa'),
			'tgl_rekap' => $this->input->post('tgl_rekap'),
			'keterangan' => $this->input->post('keterangan'),



		);


		// Simpan data siswa ke dalam database melalui model siswa
		$this->load->model('RekapitulasiModel');
		$this->RekapitulasiModel->update_rekapitulasi($nis, $data);
		$this->RekapitulasiModel->update_rekapitulasi($nama_siswa, $data);
		$this->RekapitulasiModel->update_rekapitulasi($tgl_rekap, $data);
		$this->RekapitulasiModel->update_rekapitulasi($keterangan, $data);



		// Redirect ke halaman sukses atau halaman lain yang diinginkan
		redirect('admin/data_rekapitulasi');
	}

	public function rekapitulasi__construct()
	{
		parent::__construct();
		// Load library dan helper yang diperlukan
		$this->load->library('pdf');
		$this->load->helper('url');
	}
}
