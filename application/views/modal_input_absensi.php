<div class="modal fade" id="modalTambahAbsensi" tabindex="-1" role="dialog" aria-labelledby="modalTambahSiswaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahSiswaLabel">Tambah Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/save_absensi'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama">ID Absensi:</label>
                        <input type="text" class="form-control" name="id_absensi" id="id_absensi" onkeypress="return event.charCode !== 32" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">NIS:</label>
                        <input type="text" class="form-control" name="nis" id="nis" required>
                    </div>
                    <div class="form-group">
                        <label for="jadwal">Nama Siswa:</label>
                        <select name="nis" class="form-control">
                            <option disabled selected value="">--Pilih Nama Siswa--</option>
                            <?php foreach ($siswa as $row) : ?>
                                <option value="<?= $row['nis']; ?>"><?= $row['nama_siswa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jadwal">Jadwal:</label>
                        <select name="id_jadwal" class="form-control">
                            <option disabled selected value="">--Pilih Jadwal--</option>
                            <?php foreach ($jadwal as $row) : ?>
                                <option value="<?= $row['id_jadwal']; ?>"><?= $row['hari']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select name="id_kelas" class="form-control">
                            <option disabled selected value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $row) : ?>
                                <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Keterangan:</label>
                        <select class="form-control" name="keterangan" id="keterangan">
                        <option disabled selected value="">--Pilih Keterangan--</option>
                            <option value="Masuk" >Masuk</option>
                            <option value="Sakit" >Sakit</option>
                            <option value="Ijin" >Ijin</option>
                            <option value="Alpa" >Alpa</option>
                            <option value="Mati" >Mati</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nip:</label>
                        <input type="text" class="form-control" name="nip" id="nip" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>