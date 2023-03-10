
 <script src={{asset('js/bootstrap.bundle.min.js')}}>
</script>

<!-- jQuery -->
<script src={{asset('js/jquery.min.js')}}></script>


<!-- DataTables  & Plugins -->
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap4.min.js"></script>
<script src="/js/dataTables.responsive.min.js"></script>
<script src="/js/responsive.bootstrap4.min.js"></script>
<script src="/js/dataTables.buttons.min.js"></script>
<script src="/js/buttons.bootstrap4.min.js"></script>
{{-- <script src="/js/jszip.min.js"></script>
<script src="/js/pdfmake.min.js"></script>
<script src="/js/vfs_fonts.js"></script>
<script src="/js/buttons.html5.min.js"></script>
<script src="/js/buttons.print.min.js"></script>
<script src="/js/buttons.colVis.min.js"></script> --}}

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
        
        
         //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
</body>

</html>
