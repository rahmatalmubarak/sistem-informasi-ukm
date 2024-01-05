<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('img/siomah.png') }}" >
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

  <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">

  <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"></script>
</head>

<style>
  .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary
  .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #007bff;
    color: #fff;  
  }

  [class*=sidebar-dark-] {
    background-color: #C9ECFA;
  }

  [class*=sidebar-dark-] .sidebar a {
    color: #212122;
  }

  [class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link, [class*=sidebar-dark-]
  .nav-sidebar>.nav-item:hover>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus {
    background-color: rgb(0 0 0 / 10%);
    color: #212122;
  }

  .password-show {
        background-color: transparent;
        display: block;
        position: absolute;
        z-index: 999999;
        top: 31%;
        right: 4%;
  }

  .password-show-edit {
        background-color: transparent;
        display: block;
        position: absolute;
        z-index: 999999;
        top: 31%;
        right: 4%;
  }

  #remove-image:hover {
    color: #e23939;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  {{-- <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}
@include('dashboard.templates.navbar')

@include('dashboard.templates.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('header')</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  @yield('content')

  <footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="#">Haniva Gustina</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('') }}js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('js/pages/dashboard.js') }}"></script> --}}
<script type="text/javascript">
  $(document).ready(function () {
        $('body').on('click', '#show-user', function () {
            var id = $(this).data('item-id');
            var userUrlGet = '{{route('user.detail', ':queryId')}}';
            userUrlGet = userUrlGet.replace(':queryId', id);

            var userUrlUpdate = '{{route('user.update', ':queryId')}}';
            userUrlUpdate = userUrlUpdate.replace(':queryId', id);
          
            $.ajax({
                url: userUrlGet,
                type: 'GET',
                success: function(data) {
                  console.log(data.user.password);
                  $('#username').val(data.user.username);
                  $('#password2').val(data.user.password);
                  $('#email').val(data.user.email);
                  
                  var roles = $('#role_id_edit option[value="'+ data.user.role_id +'"]').prop('selected', true);
                  var role = $('#role_id_edit').find(':selected').val()
                  if(role == '1'){
                    $('#admin_ormawa_edit').hide();
                    $('.password-show-edit').css({'top' : '37%'});
                  }else{
                    $('#admin_ormawa_edit').show();
                    $('.password-show-edit').css({'top' : '31%'});
                  }

                  $('#ormawa_id_edit option[value="'+ data.user.ormawa_id +'"]').prop('selected', true);
                  // $('#ormawa_id').attr('data-status', data.user.ormawa_id);
                  // var ormawa_id = $("#ormawa_id").data("status");
                  // var ormawa = $('#ormawa_id option[value="'+ ormawa_id +'"]').prop('selected', true);
                  $('#edit-user').modal('show');

                  $('#editUser').attr('action',userUrlUpdate );
                }
            });
       });

       $('body').on('click', '#show-ormawa', function () {
            var id = $(this).data('item-id');
            var ormawaUrlGet = '{{route('ormawa.detail', ':queryId')}}';
            ormawaUrlGet = ormawaUrlGet.replace(':queryId', id);

            var ormawaUrlUpdate = '{{route('ormawa.update', ':queryId')}}';
            ormawaUrlUpdate = ormawaUrlUpdate.replace(':queryId', id);

            $.ajax({
                url: ormawaUrlGet,
                type: 'GET',
                success: function(data) {
                  let logo = $('#logo').attr('src');
                  if(!logo.includes(data.logo)){
                    logo = logo + data.logo;
                  }
                  $('#logo').prop('src', logo);
                  $('#nama').val(data.nama);
                  $('#deskripsi').val(data.deskripsi);
                  
                  // $('#admin').attr('data-status', data.user_id);
                  // var admin = $("#admin").data("status");
                  // var roles = $('#admin option[value="'+ admin +'"]').prop('selected', true);

                  $('#edit-ormawa').modal('show');

                  $('#editOrmawa').attr('action',ormawaUrlUpdate );
                }
            });
       });

       $('body').on('click', '#show-detail-ormawa', function () {
            var id = $(this).data('item-id');
            let url_foto = '{{Storage::url('public/img/data/')}}';
            var informasiOrmawaUrlGet = '{{route('informasi-ormawa.show', ':queryId')}}';
            informasiOrmawaUrlGet = informasiOrmawaUrlGet.replace(':queryId', id);

            var informasiOrmawaUrlUpdate = '{{route('informasi-ormawa.update', ':queryId')}}';
            informasiOrmawaUrlUpdate = informasiOrmawaUrlUpdate.replace(':queryId', id);

            $('#ormawa_id').val(id);

            $('#foto_pengurus').prop('src', url_foto);
            $('#dasar_hukum').val('');
            $('#visi').val('');
            $('#misi').val('');
            $('#proker').val('');
            $('#informasi').val('');
            
            $('#detail-ormawa').modal('show');

            $('#detailOrmawa').attr('action',informasiOrmawaUrlUpdate );
            $.ajax({
                url: informasiOrmawaUrlGet,
                type: 'GET',
                success: function(data) {
                  if(data.status == 200){
                    let foto_pengurus = $('#foto_pengurus').attr('src');
                    if(!foto_pengurus.includes(data.informasi.foto_pengurus)){
                      foto_pengurus = foto_pengurus + data.informasi.foto_pengurus;
                    }
                      $('#foto_pengurus').prop('src', foto_pengurus);
                      $('#dasar_hukum').val(data.informasi.dasar_hukum);
                      tinymce.get('visi').setContent(data.informasi.visi);
                      tinymce.get('misi').setContent(data.informasi.misi);
                      tinymce.get('proker').setContent(data.informasi.proker);
                      tinymce.get('informasi').setContent(data.informasi.informasi);
                  }

                }
            });
       });

       $('body').on('click', '#show-kegiatan', function () {
            var id = $(this).data('item-id');
            var kegiatanUrlGet = '{{route('kegiatan.detail', ':queryId')}}';
            kegiatanUrlGet = kegiatanUrlGet.replace(':queryId', id);
            console.log(kegiatanUrlGet);
            var kegiatanUrlUpdate = '{{route('kegiatan.update', ':queryId')}}';
            kegiatanUrlUpdate = kegiatanUrlUpdate.replace(':queryId', id);

            $.ajax({
                url: kegiatanUrlGet,
                type: 'GET',
                success: function(data) {
                  console.log(data);
                  $('#nama').val(data.nama);
                  $('#jenis').val(data.jenis);
                  $('#tgl_mulai').val(data.tgl_mulai);
                  $('#tgl_selesai').val(data.tgl_selesai);
                  $('#penanggung_jawab').val(data.penanggung_jawab);
                  $('#tempat').val(data.tempat);
                  
                  $('#jenis').attr('data-status', data.jenis);
                  var jenis = $("#jenis").data("status");
                  var roles = $('#jenis option[value="'+ jenis +'"]').prop('selected', true);

                  $('#edit-kegiatan').modal('show');

                  $('#editKegiatan').attr('action',kegiatanUrlUpdate );
                }
            });
       });

       $('body').on('click', '#show-laporan', function () {
            var id = $(this).data('item-id');
            var laporanUrlGet = '{{route('laporan.detail', ':queryId')}}';
            laporanUrlGet = laporanUrlGet.replace(':queryId', id);
            console.log(laporanUrlGet);

            $.ajax({
                url: laporanUrlGet,
                type: 'GET',
                success: function(data) {
                  console.log(data);
                  $('#judul').val(data.judul);
                  $('#edit-laporan').modal('show');
                }
            });
       });
       
       $('body').on('click', '#show-catatan', function () {
            var id = $(this).data('item-id');
            var statusLaporanUrlGet = '{{route('status_laporan.detail', ':queryId')}}';
            statusLaporanUrlGet = statusLaporanUrlGet.replace(':queryId', id);
            console.log(statusLaporanUrlGet);
            var statusLaporanUrlUpdate = '{{route('status_laporan.update-catatan', ':queryId')}}';
            statusLaporanUrlUpdate = statusLaporanUrlUpdate.replace(':queryId', id);

            $.ajax({
                url: statusLaporanUrlGet,
                type: 'GET',
                success: function(data) {
                  console.log(data.catatan);
                  $('#catatan').val(data.catatan);
                  $('#edit-catatan').modal('show');

                  $('#editCatatan').attr('action',statusLaporanUrlUpdate );
                }
            });
       });
       
       $('body').on('click', '#show-sk', function () {
            var id = $(this).data('item-id');
            var statusLaporanUrlGet = '{{route('status_laporan.detail', ':queryId')}}';
            statusLaporanUrlGet = statusLaporanUrlGet.replace(':queryId', id);
            console.log(statusLaporanUrlGet);
            var statusLaporanUrlUpdate = '{{route('status_laporan.update-sk', ':queryId')}}';
            statusLaporanUrlUpdate = statusLaporanUrlUpdate.replace(':queryId', id);

            $.ajax({
                url: statusLaporanUrlGet,
                type: 'GET',
                success: function(data) {
                  $('#edit-sk').modal('show');

                  $('#editSK').attr('action',statusLaporanUrlUpdate );
                }
            });
       });

       $('body').on('click', '#show-pesan', function () {
            var id = $(this).data('item-id');
            var pesanUrlGet = '{{route('pesan.detail', ':queryId')}}';
            pesanUrlGet = pesanUrlGet.replace(':queryId', id);
            console.log(pesanUrlGet);
            var pesanUrlUpdate = '{{route('pesan.read', ':queryId')}}';
            pesanUrlUpdate = pesanUrlUpdate.replace(':queryId', id);

            $.ajax({
                url: pesanUrlGet,
                type: 'GET',
                success: function(data) {
                  console.log(data);
                  $('#kritik').text(data.kritik);
                  $('#saran').text(data.saran);
                  $('#pesan').text(data.pesan);
                  $('#edit-pesan').modal('show');

                  $.ajax({
                      url: pesanUrlUpdate,
                      type: 'GET',
                      success: function(data) {
                        console.log(data);
                      }
                  });
                }
            });
       });  
        $('body').change(function(){
          var role = $('#role_id').find(':selected').val()
          if(role == '1'){
            $('#admin_ormawa').hide();
            $('.password-show').css({'top' : '37%'});
          }else{
            $('#admin_ormawa').show();
            $('.password-show').css({'top' : '31%'});
          }
        })

        $('body').change(function(){
          var role = $('#role_id_edit').find(':selected').val()
          if(role == '1'){
            $('#admin_ormawa_edit').hide();
            $('.password-show-edit').css({'top' : '37%'});
          }else{
            $('#admin_ormawa_edit').show();
            $('.password-show-edit').css({'top' : '31%'});
          }
        })
    });
    $('body').on('click', '#remove-image', function(){
      let slug = $(this).data('slug');
      let index = $(this).data('index');
      let postingan_id = $(this).data('postingan');
      let removeImageUrl = '{{route('postingan.remove-image')}}';

      $.ajax({
        url: removeImageUrl,
        type: 'POST',
        data: {
          '_token' : '{{ csrf_token() }}',
          'slug' : slug,
          'postingan_id' : postingan_id
        },
        success: function(data){
          if(data.status == 200){
            var gambar_postingan = $('div.ml-1.d-flex');
            $('div').find(`[data-index=${index}]`).remove()
            console.log(data.message);
          }
        }
      });
    })
</script>

<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>

<script type="text/javascript">
  tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount', 'image', 'a11ychecker', 'advcode', 'advlist', 'anchor', 'autolink', 'codesample', 'fullscreen', 'help',
                'image', 'editimage', 'tinydrive', 'lists', 'link', 'media', 'powerpaste', 'preview',
                'searchreplace', 'table', 'template', 'tinymcespellchecker', 'visualblocks', 'wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help | insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
</script>
<script>
  const togglePassword1 = document.querySelector("#togglePassword1");
        const togglePassword2 = document.querySelector("#togglePassword2");
        const password1 = document.querySelector("#password1");
        const password2 = document.querySelector("#password2");
      
      togglePassword1.addEventListener("click", function () {
          // toggle the type attribute
          const type = password1.getAttribute("type") === "password" ? "text" : "password";
          console.log(type);
        password1.setAttribute("type", type);
        // toggle the eye icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });

      togglePassword2.addEventListener("click", function () {
          // toggle the type attribute
          const type = password2.getAttribute("type") === "password" ? "text" : "password";
          console.log(type);
        password2.setAttribute("type", type);
        // toggle the eye icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js" ></script>
<script>
 function hapus(url) {
  let token = $("meta[name='csrf-token']").attr("content");
      swal.fire({
          title: "Apakah anda yakin ?",
          text: "Data yang sudah terhapus tidak dapat dikembalikan kembali.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: "Ya, hapus!",
          closeOnConfirm: false
      }).then((result) => {
        if (result.isConfirmed) {
              $.ajax({
                  url: url,
                  type: "DELETE",
                  cache: false,
                  data: {
                      "_token": token
                  },
                  success:function(response){ 
                    console.log(response);
                      window.location.reload();
                  }
              });
        }
          // location.href = route;
      })
   }

</script>
@include('vendor.sweetalert.alert')
</body>
</html>
