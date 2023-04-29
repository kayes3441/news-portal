<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>



<script>
    $('#summernote').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    $(document).ready( function () {
        //alert('ok');
        $('#datatable').DataTable();
    } );

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function getSubCategory(id){
      //  alert(id)
        $.ajax({
            method:"GET",
            url:"{{url('admin/post/get-sub-category')}}",
            data:{id:id},
            datatype:"JSON",
            success:function (response) {
                //console.log(response)
                $('#subCategoryId').empty().html(response.content);
                $('#tag_id').empty().html(response.tag);
            }
        })
    }


    function getSubSubCategory(id){
        $.ajax({
            method:"GET",
            url:"{{url('admin/post/get-sub-sub-category')}}",
            data:{id:id},
            datatype:"JSON",
            success:function (response) {
                //console.log(response)
                $('#sub_sub_category').empty().html(response.content);
            }
        })
    }
    @if(Session::has('message'))
        toastr.options =
        {
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
    toastr.success("{{ Session::get('message')}}");
    @endif
</script>
