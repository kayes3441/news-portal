<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#catgory_image').attr('src', e.target.result).width(160).height(160);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function change_status(id,status){
        let cat_id =id;
        let cat_status = null;
        if(status == 0){
            catgory_status == 1;
        }else{
            catgory_status = 0
        }

        var id = $(this).attr("id");
        $.get("{{route('admin.category.status-update')}}",{id:cat_id,status:catgory_status},(response)=>{
            }).then((response)=>{
                if(response.success == 1){
                    toastr.success("Status Updated Successfully");
                    setTimeout(function (){
                        // location.reload()
                    },1000);
                }
            })
        }
</script>




