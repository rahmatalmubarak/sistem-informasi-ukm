<!DOCTYPE html>
<html lang="en">

@include('landing_page.templates.header')

<body>
    @include('landing_page.templates.navbar')
    <div class="container">
        @yield('content')
        
        @include('landing_page.templates.footer')
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script>
    </script>
    @include('vendor.sweetalert.alert')
    <script>
        $(document).ready(function() {
          $('#file').change(function() {
            console.log('asdasd');
            var filename = $('input[type=file]').val().split('\\').pop();
            console.log(filename,$('#file'));
              var lastIndex = filename.lastIndexOf("\\");   
              $('#nama_file').text(filename);
          });
      });
        var speed=300;
        var refresh=null;
        let txt = $('title').text();
        function action() {
        document.title=txt; 
        txt=txt.substring(1,txt.length)+txt.charAt(0)
        refresh=setTimeout("action()",speed);}
        $(document).ready(function() {
          if(txt.length > 25){
            action();
          }
        });
    </script>
</body>

</html>