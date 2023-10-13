-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2023 pada 03.40
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_jadwal` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nis`, `id_jadwal`, `id_kelas`, `keterangan`, `tanggal`, `nip`) VALUES
('A1', '901111016', 'JUM106', 'KH12C', 'Masuk', '2023-10-12', '202203009'),
('ID114', '901111030', 'KAM105', 'KH12A', 'Sakit', '2023-08-19', '202203001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(10) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `tgl_lhr_guru` date NOT NULL,
  `jk_guru` varchar(10) NOT NULL,
  `agama_guru` varchar(20) NOT NULL,
  `alamat_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `id_kelas`, `tgl_lhr_guru`, `jk_guru`, `agama_guru`, `alamat_guru`) VALUES
('202203001', 'Mauly Scolastica ', 'KD10C', '1997-04-12', 'Perempuan', 'Islam', 'JL Kamboja No 1 Kel Cakung Jakarta'),
('202203002', 'Gini Indriyanti', 'KF11A', '1988-06-09', 'Perempuan', 'Islam', 'JL Sunan Kali Jaga Kel Jatiasih Bekasi'),
('202203003', 'Lilis Wijayanti', 'KF11C', '1999-06-09', 'Perempuan', 'Islam', 'JL Pejuang Jaya No 1 Kel Pejuang Bekasi'),
('202203006', 'Dini Andayani', 'KH12C', '1996-01-10', 'Perempuan', 'Islam', 'JL Pejuang Jaya No 6 Kel Pejuang Bekasi'),
('202203008', 'Herman', 'KD10C', '1999-01-07', 'Laki-Laki', 'Islam', 'JL Mahmud No 1 Kel Harapan Jaya Bekasi'),
('202203009', 'Aan Mustaan', 'KF11C', '1994-03-10', 'Laki-Laki', 'Islam', 'JL Surya Kelapa No 12 Kel Jakabaring Bekasi'),
('202203010', 'Aan Kuswandi', 'KG12A', '1996-10-12', 'Laki-Laki', 'Islam', 'JL Cipendawa No 12 Kel Jatimulya Bekasi'),
('202203011', 'Risda Ningsih', 'KG12C', '1974-10-09', 'Perempuan', 'Islam', 'JL Arjuna No 12 A Kel Jati Asih Bekasi'),
('202203012', 'Tarnoto', 'KF11A', '1994-02-17', 'Laki-Laki', 'Islam', 'JL Perkutut 1 No 12 Kel Harapan Jaya Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `id_matapelajaran` varchar(10) NOT NULL,
  `open` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `id_matapelajaran`, `open`) VALUES
('JUM106', 'Jumat', 'FIS107', 'Terbuka'),
('KAM105', 'Kamis', 'EKO111', 'Terbuka'),
('RAB112', 'Rabu', 'BIO104', 'Terbuka'),
('SAB107', 'Sabtu', 'MAT103', 'Terbuka'),
('SEL111', 'Selasa', 'BIN101', 'Terbuka'),
('SEN110', 'Senin', 'BIA102', 'Terbuka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
('KA10A', '10 IPA 1'),
('KA10B', '10 IPA 2'),
('KA10C', '10 IPA 3'),
('KD10A', '10 IPS 1'),
('KD10B', '10 IPS 2'),
('KD10C', '10 IPS 3'),
('KE11A', '11 IPA 1'),
('KE11B', '11 IPA 2'),
('KE11C', '11 IPA 3'),
('KF11A', '11 IPS 1'),
('KF11B', '11 IPS 2'),
('KF11C', '11 IPS 3'),
('KG12A', '12 IPA 1'),
('KG12B', '12 IPA 2'),
('KG12C', '12 IPA 3'),
('KH12A', '12 IPS 1'),
('KH12B', '12 IPS 2'),
('KH12C', '12 IPS 3'),
('KJ11B', '12 IPA 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_matapelajaran` varchar(10) NOT NULL,
  `nama_matapelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_matapelajaran`, `nama_matapelajaran`) VALUES
('BIA102', 'Bahasa Indonesia'),
('BIN101', 'Bahasa Inggris'),
('BIO104', 'Biologi'),
('BSA105', 'Bahasa Arab'),
('EKO111', 'Ekonomi'),
('FIS107', 'Fisika'),
('GEO108', 'Geografi'),
('IPA113', 'Ilmu Pengetahuan Alam'),
('KIM106', 'Kimia'),
('MAT103', 'Matematika'),
('PAI118', 'Pendidikan Agama Islam'),
('PJO119', 'Pendidikan Jasmani Olahraga dan Kesehatan'),
('SEH110', 'Sejarah'),
('SNB115', 'Seni Budaya'),
('SOS109', 'Sosiologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapitulasi`
--

CREATE TABLE `rekapitulasi` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `tgl_rekap` date NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `id_jadwal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `id_kelas` varchar(11) NOT NULL,
  `tgl_lhr_siswa` date NOT NULL,
  `jk_siswa` varchar(15) NOT NULL,
  `agama_siswa` varchar(11) NOT NULL,
  `alamat_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `id_kelas`, `tgl_lhr_siswa`, `jk_siswa`, `agama_siswa`, `alamat_siswa`) VALUES
('13001', 'aaaa', 'KA10A', '2023-08-01', 'Perempuan', 'Islam', 'jl cinta baru'),
('901111011', 'cinta', 'KA10B', '2023-08-05', 'Laki-Laki', 'Kristen', 'jl baru jadi'),
('901111014', 'wahid', 'KA10B', '2023-08-05', 'Laki-Laki', 'Hindu', 'jl kenari 1'),
('901111015', 'sayo', 'KD10C', '2023-08-18', 'Laki-Laki', 'Hindu', 'jl kenari baru 5'),
('901111016', 'rifky', 'KA10B', '2023-08-05', 'Perempuan', 'Hindu', 'jl Mustika Jaya'),
('901111030', 'Arjuno Ari', 'KA10A', '2023-08-16', 'Laki-Laki', 'Islam', 'Jl Budi Daya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_name` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `level` enum('1','2','3','') NOT NULL,
  `role` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_name`, `password`, `email_user`, `level`, `role`) VALUES
('guru', 'guru', 'siswa@gmail.com', '1', '2'),
('siswa', 'siswa123', 'siswa@gmail.com', '1', '3'),
('wahid', 'wahid123', 'wahidkhoirul576@gmail.com', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user` (`nip`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_matapelajaran` (`id_matapelajaran`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_matapelajaran`);

--
-- Indeks untuk tabel `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`),
  ADD UNIQUE KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_matapelajaran`) REFERENCES `mata_pelajaran` (`id_matapelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  ADD CONSTRAINT `rekapitulasi_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekapitulasi_ibfk_4` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
