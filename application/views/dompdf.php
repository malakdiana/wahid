<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        <title>Laporan Absensi</title>
         <!-- Custom fonts for this template-->
        <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
         <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
         -->
    </head>
    <style>
        table, th, td {
  border: 1px solid black;
  color: black
}
    </style>
    <body>
       
<p style="color: black" align="center"><b>Kartu Rekapitulasi Siswa SMA Taman Harapan 1</b></p>
  <br>
                <p align="center"><img height="100px" src="assets/img/logotamhar.png" alt=".." class="center">
                </p> 
        <div class="table-responsive">
            <table class="table table-bordered" style="border: 1px solid black"  width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Hari</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Absensi</th>
                    </tr>
                </thead>
                <tbody>
           
                        <?php $no = 1; 
                        ?>
                        <?php foreach ($rekapitulasi as $row) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nis']; ?></td>
                                <td><?php echo $row['nama_siswa']; ?></td>
                                <td><?php echo $row['hari']; ?></td>
                                <td><?php echo $row['nama_matapelajaran']; ?></td>
                                <td><?php echo $row['nama_kelas']; ?></td>
                                <td><?php echo $row['keterangan']; ?></td>
                                
                            </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </body>
</html>