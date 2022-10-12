<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    {{-- bootsrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    {{-- my style --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>

    <link href="/img/favicon.png" rel="icon">
    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/sticky-footer.css">


    <title>Kepulungan | {{ $title }}</title>
  </head>
  <body>

    @include('partials.navbar')

      <div class="container mt-4">
          @yield('container')
      </div>



      <footer class="main-footer ">
        <div class="card text-white bg-dark mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-header">Desa Kepulungan</div>
                        <div class="card-body">
                         <p class="card-text">Kepulungan - Gempol (jl. surabaya malang), Pasuruan, Jawa Timur 67155, Indonesia</p>
                         <p>Email : </p>

                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="card-header">Peta Lokasi</div>
                        <div class="card-body">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1977.2960823938365!2d112.68527795792427!3d-7.619276698626528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d913e9220199%3A0x1aa97cac93214939!2sKantor%20Desa%20Kepulungan!5e0!3m2!1sid!2sid!4v1632538871442!5m2!1sid!2sid" style="border:0; width: 100%; height: 200px;"></iframe>
                        </div>
                        </div>
                    <div class="col-lg-4">
                        <div class="card-header">Sosial Media</div>
                        <div class="card-body">

                            <a href=""><i class="btn btn-light btn-sm icofont-twitter icofont-2x mr-2"></i></a>
                            <a href=""><i class="btn btn-light btn-sm icofont-facebook icofont-2x mr-2"></i></a>
                            <a href=""><i class="btn btn-light btn-sm icofont-instagram icofont-2x mr-2"></i></a>
                            <a href=""><i class="btn btn-light btn-sm icofont-linkedin icofont-2x"></i></a>
                          </div>
                    </div>
                </div>
            </div>
            <p class="card-text text-center">Copyright &copy; Magang Teknik Informatika UAD 2021</p>
          </div>
      </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
    {{-- datatables --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    <!-- Vendor JS Files -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>
  <script src="/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="/vendor/counterup/counterup.min.js"></script>
  <script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/venobox/venobox.min.js"></script>
  <script src="/vendor/aos/aos.js"></script>

  <!-- assets Main JS File -->
  <script src="/js/main.js"></script>
  </body>
</html>
