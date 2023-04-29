
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready( function () {
        //alert('ok');
        $('#datatable').DataTable();
    } );
</script>

<script>
    $('#addForm form').submit(function (e){
        // alert('ok')
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            method  : $(this).attr('method'),
            url     : $(this).attr('action'),

            data    :formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function (response) {
                console.log(response)
                if (response.success == true) {
                    $('#addForm form')[0].reset()
                    Command: toastr["success"]("Ok", "Successfully Create")
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    setTimeout(function() {
                        window.location.href = "{{url('/admin/banner/index')}}";
                    }, 1000);
                }
                // else {
                //     Command: toastr["error"]("Fail",'Please Enter Email And Password')
                //     toastr.options = {
                //         "closeButton": false,
                //         "debug": false,
                //         "newestOnTop": false,
                //         "progressBar": false,
                //         "positionClass": "toast-bottom-right",
                //         "preventDuplicates": false,
                //         "onclick": null,
                //         "showDuration": "300",
                //         "hideDuration": "1000",
                //         "timeOut": "5000",
                //         "extendedTimeOut": "1000",
                //         "showEasing": "swing",
                //         "hideEasing": "linear",
                //         "showMethod": "fadeIn",
                //         "hideMethod": "fadeOut"
                //     }
                // }
            }
        })
    })
</script>
