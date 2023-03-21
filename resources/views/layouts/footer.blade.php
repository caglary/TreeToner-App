<script src={{ asset('js/bootstrap.bundle.min.js') }}></script>

<!-- jQuery -->
<script src={{ asset('js/jquery.min.js') }}></script>


<!-- DataTables  & Plugins -->
<script src={{ asset('js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('js/dataTables.bootstrap4.min.js') }}></script>
<script src={{ asset('js/dataTables.responsive.min.js') }}></script>
<script src={{ asset('js/responsive.bootstrap4.min.js') }}></script>
<script src={{ asset('js/dataTables.buttons.min.js') }}></script>
<script src={{ asset('js/buttons.bootstrap4.min.js') }}></script>
<script src={{ asset('js/jszip.min.js') }}></script>
<script src={{ asset('js/pdfmake.min.js') }}></script>
<script src={{ asset('js/vfs_fonts.js') }}></script>
<script src={{ asset('js/buttons.html5.min.js') }}></script>
<script src={{ asset('js/buttons.print.min.js') }}></script>
<script src={{ asset('js/buttons.colVis.min.js') }}></script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            "paging": true,
            "retrieve": true,
            "searching": true,
            "ordering": false,
            "info": true,


            //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]


        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>

<script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script>
<script type="importmap">
{
  "imports": {
    "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js",
    "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.esm.min.js"
  }
}
</script>
  <!-- Our project just needs Font Awesome Solid + Brands -->
  <script defer src="{{asset('/js/brands.js')}}"></script>
  <script defer src="{{asset("/js/solid.js")}}"></script>
  <script defer src="{{asset("/js/fontawesome.js")}}"></script>
</body>

</html>
