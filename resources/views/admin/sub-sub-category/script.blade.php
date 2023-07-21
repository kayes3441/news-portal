
<script>
    function getSubCategory(id){
        //alert(id)
        $.get("{{ url('admin/sub-sub-category/get-sub-category') }}",{id:id},(response)=>{
            $('#sub_category_id').empty().html(response.content);
        })
    }
</script>
