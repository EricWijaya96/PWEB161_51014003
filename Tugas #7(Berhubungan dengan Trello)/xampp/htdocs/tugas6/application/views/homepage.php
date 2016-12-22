<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <img src="Gambar/Logo Sekolah/logo_stimik_kharisma.png" width=auto; height=auto; class="Logo">
              <a class="judulutama" class="navbar-brand" href="#">UKM GAMBAR</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="Stuktur Organisasi/stukturorganisasi.html"target="_blank">Stuktur Organisasi</a></li>
                <li><a href="#Visi-Misi" class="borderrounded">Visi,Misi</a></li>
                <li><a href="#Contact" class="borderrounded">Contact</a></li>
                <li class="dropdown">
                  <a href="#" class="borderrounded" class="dropdown-toggle"data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Other List <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="Form Pendaftaran/FormPendaftaran.html"target="_blank">Formulir Pendaftaran</a></li>
                    <li><a href="Form Saran dan Kritik/formsarankritik.html"target="_blank">Formulir Kritik/Saran Mahasiswa</a></li>
                    <li><a href="#Kegiatan UKM Gambar">Kegiatan UKM Gambar</a></li>
                    <li><a href="Gallery/gallery.html"target="_blank">Gallery</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="Formulir/Formulir.html"target="_blank">Daftar Formulir Pendaftaran</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <li  class="button3 class="dropdown">
                  <a href="#" class="dropdown-toggle"data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notification<span class="bubble" id="jumlah_konfirmasi">2</span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"target="_blank">Pencarian dan pemilihan Logo UKM (15/11/2016 - 28/11/2016)</a></li>
                    <li><a href="#"target="_blank">Membuat Project Awal.(Menggambar Doodle).(11/21/2016 - akhir semester)</a></li>
                    <li><a href="#"></a></li>
                    <li role="separator" class="divider"></li>
                    <li class="#">Sudah Lewat :</li>
                    <li><a href="#"target="_blank">Pemilihan Ketua UKM Gambar</a></li>
                  </ul>
                </li>
            <div id="myDIV" class="header">
            </nav>
      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="Gambar/Slide/Gambar_14.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1></h1>
               <p class="KataSlide">Ayo !!!!!!! Daftarkan diri segera.(Cukup Menekan Tombol Registrasinya saja.).</p>
              <p><a href="Form Pendaftaran/FormPendaftaran.html"target="_blank" class="btn btn-lg btn-primary" role="button">Registrasi</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="Gambar/Gallery/Gambar_24.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1></h1>
              <p class="KataSlide2">Gini nih,Contoh Gambar Doodle nya.</p>
              <p><a href="#Kegiatan UKM Gambar" class="btn btn-lg btn-primary" role="button">Activity</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
        <a name='Contact'></a>
          <img class="img-circle" src="Gambar/Contact/Gambar_4.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Guru Pembimbing</h2>
          <p class="Paragraf">
            Husni Anggriani, S.Kom., M.Cs 
          </p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="Gambar/Contact/Gambar_6.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Pembuat Website
          </h2>
          <p class="Paragraf">
            Andy Eric Wijaya.
                (S1 SI-KA).
          </p>
          <p class="center"><a class="button2" <a href="Contact/contact.html"target="_blank">View More Contact List</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="Gambar/Contact/Gambar_5.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Ketua</h2>
          <p class="Paragraf">
            Ilfa Diago.
              (S1-TI)
          </p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
        <a name='Visi-Misi'></a>
          <h2 class="judul2" class="featurette-heading">Visi Misi. <span class="text-muted">(UKM Gambar).</span></h2>
          <p class="lead">UKM Gambar : Memiliki Visi-Misi sebagai berikut:
          <ol class="list">
           <li>Visi : Mengumpulkan Minat dan Bakat.</li><br>
           <li>Misi : Tempat untuk mengasa kemampuan menggambar.</li><br>
           <li>Misi : Mengasa kreativitas dan menghasilkan hasil karya yang berkreativitas tinggi. </li><br>
           <ol>
          </p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="Gambar/Logo Sekolah/Gambar_7.gif" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
        <a name='Kegiatan UKM Gambar'></a>
          <h2 class="judul2" class="featurette-heading">Kegiatan UKM. <span class="text-muted">(UKM Gambar).</span></h2>
          <p class="lead">UKM Gambar : Memiliki Kegitan Sebagai Berikut:
           <ol class="list">
           <li>Pencarian dan pemilihan Logo UKM (15/11/2016 - 28/11/2016)</li><br>
           <li>Membuat Project Awal.(Menggambar Doodle).(11/21/2016 - akhir semester)</li><br>
           <li>Rapat Anggota(Tiap Senin : 03.00)</li><br>
           <ol>
          </p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" src="Gambar/Logo Sekolah/Gambar_7.gif" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a class="button" href="#">Back to top</a></p>
        <p>&copy; 2016 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style5.css">

  </body>
</html>
