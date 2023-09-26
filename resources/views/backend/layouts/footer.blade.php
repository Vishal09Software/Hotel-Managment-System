


<!-- plugins:js -->
<script src="{{ url('backend/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ url('backend/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{ url('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{ url('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{ url('backend/js/dataTables.select.min.js')}}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ url('backend/js/off-canvas.js')}}"></script>
<script src="{{ url('backend/js/hoverable-collapse.js')}}"></script>
<script src="{{ url('backend/js/template.js')}}"></script>
<script src="{{ url('backend/js/settings.js')}}"></script>
<script src="{{ url('backend/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ url('backend/js/dashboard.js')}}"></script>
<script src="{{ url('backend/js/Chart.roundedBarCharts.js')}}"></script>
<!-- End custom js for this page-->

@yield('scripts')
</body>

</html>
