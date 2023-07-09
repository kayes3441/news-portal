<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready( function () {
        //alert('ok');
        $('#datatable').DataTable();
    } );
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function getSubCategory(id){
        //alert(id)
        $.ajax({
            method:"GET",
            url:"{{url('admin/sub_sub-category/get-sub-category')}}",
            data:{id:id},
            datatype:"JSON",
            success:function (response) {
                console.log(response);
                $('#sub_category_id').empty().html(response.content);
            }
       })
    }


</script>
