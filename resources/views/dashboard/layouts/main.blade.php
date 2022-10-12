<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Kepulungan</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/8c5bab53c5.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    {{-- datatables --}}
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
  </head>
  <body>

@include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">
@include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-2">
        @yield('container')
    </main>
  </div>
</div>

<script type="text/javascript" src="/vendor/jquery/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

<script src="/js/dashboard.js"></script>

{{-- datatables --}}
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js">
</script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('penduduk.index') !!}',
            columns: [

                { data: 'id',
                  render: function(data,type,row,meta){
                      return meta.row + meta.settings._iDisplayStart + 1;
                  } },
                { data: 'nik', name: 'nik' },
                { data: 'nama', name: 'nama' },
                { data: 'nokk', name: 'nokk' },
                { data: 'namaAyah', name: 'namaayah' },
                { data: 'namaIbu', name: 'namaibu' },
                { data: 'email', name: 'email' },
                { data: 'alamat_sekarang', name: 'alamat_sekarang' },
                { data: 'dusun', name: 'dusun' },
                { data: 'statuskeluarga', name: 'statuskeluarga' },
                { data: 'pendidikan', name:  'pendidikan' },
                { data: 'pekerjaan', name: 'pekerjaan' },
                { data: 'tgl_lapor', name: 'tgl_lapor' },
                { data: 'action', name: 'action' },


            ]
        });
    });
</script>
  </body>
</html>
