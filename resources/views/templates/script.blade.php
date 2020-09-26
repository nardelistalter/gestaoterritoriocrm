@extends('template')

@section('script')

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

    <!-- Bootstrap core JavaScript-->
    {{-- --}}<script
        src={{ URL::to('vendor/jquery/jquery.min.js') }}></script>
    <script src={{ URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>

    <!-- Core plugin JavaScript-->
    <script src={{ URL::to('vendor/jquery-easing/jquery.easing.min.js') }}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ URL::to('js/sb-admin-2.min.js') }}></script>

    <!-- JS -->
    <script src={{ URL::to('js/javascript.js') }} type="text/javascript"></script>

    <!-- Page level plugins -->
    <script src={{ URL::to('vendor/chart.js/Chart.min.js') }}></script>

    <!-- Page level custom scripts -->
    {{--<script src={{ URL::to('js/demo/chart-area-demo.js') }}></script>
    <script src={{ URL::to('js/demo/chart-pie-demo.js') }}></script> --}}
    <script src={{ URL::to('js/demo/datatables-demo.js') }}></script>

    <!-- DataTables JS -->
    <script src={{ URL::to('js/addons/datatables2.min.js') }} type="text/javascript"></script>

    <!-- DataTables Select JS -->
    <script src={{ URL::to('js/addons/datatables-select2.min.js') }} type="text/javascript"></script>
    <script src={{ URL::to('vendor/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ URL::to('vendor/datatables/dataTables.bootstrap4.min.js') }}></script>

    <!-- MDBootstrap Datatables  -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

@endsection
