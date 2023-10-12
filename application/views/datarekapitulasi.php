<div class="card">
    <div class=" card-header">
        <div class="">
            <h2 class=" card-title">Data Rekapitulasi</h2>
        </div>
        <!-- <button type="button" class="btn btn-primary" id="btntambah" data-toggle="modal" data-target="#modalTambahRekapitulasi"><i class="fas fa-plus"></i> Tambah Rekapitulasi</button> -->
        <a href="<?php echo site_url('admin/cetak'); ?>"><button type="button" class="btn btn-info mb-3" id="btnCetak" > <i class="fas fa-print fa-sm"></i> &nbsp; Cetak Rekapitulasi
        </button></a>

        <style>
            .larger-text {
                font-size: 20px;
                /* Ubah ukuran sesuai keinginan Anda */
            }
        </style>

        <center class="mb-3">
            <legend class="mt-3 larger-text" id="btnJudul"><strong>Kartu Rekapitulasi Siswa SMA Taman Harapan 1 </strong></legend>
        </center>

        <style>
  .transkrip {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 10vh; /* Menggunakan tinggi 100% dari viewport */
  }

  .transkrip img {
    height: 15x;
  }
</style>
        <body>
            <div class="transkrip justify-content-center">
                <img height="100px" src="<?php echo base_url() ?>assets/img/logotamhar.png" alt="..">
            <br>
            </div>
    </div>
    <div class=" card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Hari</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Absensi</th>
                        <th width="90px" class="text-center" id="aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($rekapitulasi) && !empty($rekapitulasi)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($rekapitulasi as $row) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nis']; ?></td>
                                <td><?php echo $row['nama_siswa']; ?></td>
                                <td><?php echo $row['hari']; ?></td>
                                <td><?php echo $row['nama_matapelajaran']; ?></td>
                                <td><?php echo $row['nama_kelas']; ?></td>
                                <td><?php echo $row['keterangan']; ?></td>
                                <td id="btnaksi">
                                    <!-- Kolom untuk aksi, misalnya tombol edit atau hapus -->
                                    <!-- Isi dengan aksi yang diinginkan -->
                                    <div class=" btn-group">
                                        <!-- Tombol Edit -->
                                        <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#editModal<?php echo $row['nis']; ?>"><i class="fas fa-info-circle"></i> Detail</button>
                                        <!-- Tombol Hapus -->
                                        <!-- <a href="<?php echo base_url('admin/hapus_rekapitulasi/' . $row['nis']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data Rekapitulasi Ini?');">
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button> -->
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>


                <!-- Modal Edit Data Guru -->
                <?php foreach ($rekapitulasi as $row) { ?>
                    <div class="modal fade" id="editModal<?php echo $row['nis']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Detail Data Rekapitulasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('admin/update_rekapitulasi'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="kelas">Nis:</label>
                                            <input readonly type="text" class="form-control" name="nis" id="nis" value="<?php echo $row['nis']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="kelas">Nama Siswa:</label>
                                            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" readonly value="<?php echo $row['nama_siswa']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal">Tanggal Absensi:</label>
                                            <input type="date" class="form-control" name="tgl_rekap" id="tgl_rekap" readonly value="<?php echo $row['tanggal']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal">Hari:</label>
                                            <input type="text" class="form-control" value="<?php echo $row['hari']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal">Mata Pelajaran:</label>
                                            <input type="text" class="form-control" value="<?php echo $row['nama_matapelajaran']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal">Kelas:</label>
                                            <input type="text" class="form-control" value="<?php echo $row['nama_kelas']; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="tanggal">Keterangan:</label>
                                            <input type="text" class="form-control" value="<?php echo $row['keterangan']; ?>" readonly>
                                        </div>

                                        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


            </table>
        </div>
    </div>
<?php endif; ?>
</div>
<style>
    /* Gaya tombol cetak pada layar */
    #btnCetak {
        display: block;
        background-color: #green;
        color: white;
        position: absolute;
        right: 40px;
        top: 60px;
    }

    /* Gaya tombol cetak saat dicetak */
    @media print {
        #btnCetak {
            display: none;
        }

        #btntambah {
            display: none;
        }

        #aksi {
            display: none;
        }

        #btnaksi {
            display: none;
        }

        #btnExport {
            display: none;
        }

        #tanggal {
            display: none;
        }

        #btnMin,
        #btnMax {
            display: none;
        }

        #txtMin,
        #txtMax {
            display: none;
        }

        .sidebar {
            display: none;
        }

    }

    /* .logo {
    width: 300px;
    height: 200px;
    background-image: url('assets/img/Allianz_Logobiru.png');
    background-size: cover;
    background-position: center; 
} */

    /* Menyusun tampilan cetak dengan rapi */
    .container-fluid {
        width: 95%;
        margin: 20px auto;
        font-size: 14px;
    }

    .responsive {
        overflow-x: auto;
    }

    /* 
        table {
            width: 100%;
        } */

    th,
    td {
        padding: 5px;
    }

    legend {
        font-size: 14px;
    }

    /* Menyembunyikan footer ketika dicetak */
    .footer {
        display: none;
    }
</style>

<script>
    // Fungsi tombol cetak
    function cetakTranskrip() {
        console.log('tes');
        window.print();

    }

    function namasiswa(){
        var text = $("#nis2").val();
        var myArray = text.split("-");
        let id = myArray[0];
        $('#nama_siswa2').val(id);
        $('#nama_kelas').val(myArray[1]);
    }

    function nis(){
        var id = $("#nama_siswa2").val();
        $('#nis2').val(id)
    }

</script>