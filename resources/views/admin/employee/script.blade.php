<script>
    function passowrd(){
        let length_password = document.getElementById('password').value.length;
        if(length_password<8){
            $('.passoword').addClass('text-danger')
            $('.passoword').empty().html('Password Must 7 + Character');
        }
        else{
            $('.passoword').addClass('d-none');
        }
    }
    function passowrd_match(){
        let password = document.getElementById('password').value;
        let confirm_password = document.getElementById('confirm_password').value;
        if(confirm_password.length == null){
            $('.match_passoword').addClass('d-none')
        }else{
            $('.match_passoword').removeClass('d-none')
        }
        if(password == confirm_password){
            $('.match_passoword').addClass('text-success')
            $('.match_passoword').removeClass('text-danger')
            $('.match_passoword').empty().html('Password Match');
        }else{
            $('.match_passoword').removeClass('text-success')
            $('.match_passoword').addClass('text-danger')
            $('.match_passoword').empty().html('Password Not Match');
        }
    }
</script>
