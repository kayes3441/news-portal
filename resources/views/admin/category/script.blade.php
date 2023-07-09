<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#blah').attr('src', e.target.result).width(160).height(160);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function change_status(){
    }
</script>




