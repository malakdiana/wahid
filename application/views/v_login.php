 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <meta name="description" content="" />
     <meta name="author" content="" />
     <title>Page Title - SB Admin</title>
     <link href="<?php echo base_url('assets/dist/css/styles.css') ?>" rel="stylesheet" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
 </head>
 <style>
     body {
         background-image: url("assets/img/SMATamhar.png");
         background-repeat: no-repeat;
         background-size: cover;
     }
 </style>

 <body>
     <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">

         <body class="bg-primary">
             <div id="layoutAuthentication">
                 <div id="layoutAuthentication_content">
                     <main>
                         <div class="container mt-5">
                             <div class="row mt-5 justify-content-center">

                                 <div class="col-lg-5" style="margin-top: 9rem;">
                                     <div class="card shadow border-0 rounded mt-4">
                                         <div class="card-header"><b>
                                                 <h3 class="text-center font-weight-light my-4">ABSENSI</h3>
                                                 <h6 class="text-center font-weight-light my-4">SMA TAMAN HARAPAN 1 KOTA BEKASI</h6>
                                             </b></div>
                                         <div class="card-body">
                                             <form>
                                                 <div class="form-group">
                                                     <label> Username </label> <i class="fas fa-user"></i>
                                                     <input type="username" class="form-control" placeholder="username" name="user_name">
                                                     <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                 </div>
                                                 <div class="form-group">
                                                     <label> Password </label> <i class="fas fa-eye-slash"></i>
                                                     <input type="password" class="form-control" placeholder="password" name="password">
                                                     <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                 </div>
                                                 <tr>
                                                     <td></td>
                                                     <td><input type="submit" value="Login"></td>
                                                 </tr>
                                                 </table>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </main>
                 </div>
             </div>
         </body>
     </form>

 </html>