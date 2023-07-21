<script>
    function read_sub_imageURL(input) {
        alert('subcat')
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#sub_catgory_image').attr('src', e.target.result).width(160).height(160);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function change_status(){
    }
</script>
