
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
        <strong>Copyright &copy; </strong> All rights reserved.
    </footer>

    <!-- jQuery 2.1.4 -->
    <script src="<?= $url ?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= $url ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= $url ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= $url ?>/assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= $url ?>/assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= $url ?>/assets/dist/js/demo.js"></script>
    <script src="<?= $url ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= $url ?>/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- page script -->
        <script>
      $(function () {
        $("#example1").DataTable();
        $("#example2").DataTable();
        $("#example3").DataTable();
        $("#example4").DataTable();
        $("#example5").DataTable();
        $("#example6").DataTable();
        $('#example10').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
