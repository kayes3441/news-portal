<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#catgory_image').attr('src', e.target.result).width(300).height(90);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('change', '.change_status', function () {
        var id = $(this).attr("id");
        if ($(this).prop("checked") == true) {
            var status = 1;
        } else if ($(this).prop("checked") == false) {
            var status = 0;
        }
        $.get("{{route('admin.category.status-update')}}",{id:id,status:status},(response)=>{
        }).then((response)=>{
            if(response.success == 1){
                toastr.success("Status Updated Successfully");
                setTimeout(function (){
                        location.reload()
                },1000);
            }
        })

    })
</script>




