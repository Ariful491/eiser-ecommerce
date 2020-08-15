<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/back-end')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('/back-end')}}/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/back-end')}}/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
   @include('admin.includes.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
           @include('admin.includes.topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
          @yield('body')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
       @include('admin.includes.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
@include('admin.includes.scrollbar')

<!-- Logout Modal-->
@include('admin.includes.modal')

<!-- Bootstrap core JavaScript-->
<script src="{{asset('/back-end')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('/back-end')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/back-end')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('/back-end')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{asset('/back-end')}}/vendor/chart.js/Chart.min.js"></script>
<script src="{{asset('/back-end')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="{{asset('/back-end')}}/{{asset('/back-end')}}/js/demo/chart-area-demo.js"></script>
<script src="{{asset('/back-end')}}/{{asset('/back-end')}}/js/demo/chart-pie-demo.js"></script>
<!-- Page level custom scripts -->
<script src="{{asset('/back-end')}}/js/demo/datatables-demo.js"></script>
<script src="{{asset('/back-end')}}/ckeditor/ckeditor.js"></script>
<script src="{{asset('/back-end')}}/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>
<script>
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img height="150px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });
</script>


{{--<script>--}}
{{--CKEDITOR.replace('editor1');--}}
{{--</script>--}}
</body>

</html>
