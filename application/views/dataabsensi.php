<div class="card">
    <div class=" card-header">
        <div class="">
            <h2 class=" card-title">Data Absensi</h2>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahAbsensi"><i class="fas fa-plus"></i> Tambah Absensi</button>

    </div>
    <div class=" card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Absensi</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Id Jadwal</th>
                        <th>ID Kelas</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Nip</th>
                        <th width="90px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($absensi) && !empty($absensi)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($absensi as $row) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['id_absensi']; ?></td>
                                <td><?php echo $row['nis']; ?></td>
                                <td><?php echo $row['nama_siswa']; ?></td>
                                <td><?php echo $row['id_jadwal']; ?></td>
                                <td><?php echo $row['id_kelas']; ?></td>
                                <td><?php echo $row['keterangan']; ?></td>
                                <td><?php echo $row['tanggal']; ?></td>
                                <td><?php echo $row['nip']; ?></td>
                                <td>
                                    <!-- Kolom untuk aksi, misalnya tombol edit atau hapus -->
                                    <!-- Isi dengan aksi yang diinginkan -->
                                    <div class=" btn-group">
                                        <!-- Tombol Edit -->
                                        <button type="button" class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#editModal<?php echo $row['id_absensi']; ?>"><i class="fas fa-edit"></i></button>
                                        <!-- Tombol Hapus -->
                                        <a href="<?php echo base_url('admin/hapus_absensi/' . $row['id_absensi']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data Absensi Ini?');">
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>


                <!-- Modal Edit Data Guru -->
                <?php foreach ($absensi as $row) { ?>
                    <div class="modal fade" id="editModal<?php echo $row['id_absensi']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Data Absensi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('admin/update_absensi'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama">ID Absensi:</label>
                                            <input readonly class="form-control" name="id_absensi" id="id_absensi" value="<?php echo $row['id_absensi']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Nis:</label>
                                            <input readonly type="text" class="form-control" name="nis" id="nis" value="<?php echo $row['nis']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Keterangan:</label>
                                            <select class="form-control" name="keterangan" id="keterangan">
                                            <option disabled selected value="">--Pilih Keterangan--</option>
                                                <option value="Masuk" <?php echo ($row == 'Masuk') ? 'selected' : ''; ?>>Masuk</option>
                                                <option value="Sakit" <?php echo ($row == 'Sakit') ? 'selected' : ''; ?>>Sakit</option>
                                                <option value="Ijin" <?php echo ($row == 'Ijin') ? 'selected' : ''; ?>>Ijin</option>
                                                <option value="Alpa" <?php echo ($row == 'Alpa') ? 'selected' : ''; ?>>Alpa</option>
                                                <option value="Mati" <?php echo ($row == 'Mati') ? 'selected' : ''; ?>>Mati</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Kelas:</label>
                                            <select name="id_kelas" class="form-control">
                                                <?php foreach ($kelas as $kelas_row) : ?>
                                                    <option value="<?php echo $kelas_row['id_kelas']; ?>" <?php echo ($row['id_kelas'] == $kelas_row['id_kelas']) ? 'selected' : ''; ?>><?php echo $kelas_row['nama_kelas']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal Absensi:</label>
                                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo $row['tanggal']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nip</label>
                                            <input readonly type="text" class="form-control" name="nip" id="nip" value="<?php echo $row['nip']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jadwal">Jadwal:</label>
                                            <select name="id_jadwal" class="form-control">
                                                <option disabled value="">-- Pilih Jadwal --</option>
                                                <?php foreach ($jadwal as $jadwal_row) : ?>
                                                    <option value="<?php echo $jadwal_row['id_jadwal']; ?>" <?php echo ($row['id_jadwal'] == $jadwal_row['id_jadwal']) ? 'selected' : ''; ?>><?php echo $jadwal_row['hari']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>



                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
<script>
    function namasiswa(){
      
        var id = $("#nis_add").val();
        $('#nama_siswa_add').val(id);
    }

    function nis_change(){
        var id = $("#nama_siswa_add").val();
        $('#nis_add').val(id)
    }

</script>