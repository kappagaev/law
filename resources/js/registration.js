try {
    window.$ = window.jQuery = require('jquery');
    console.log($);


    $(document).ready(function(){
        function changeVisibility(state) {
            $("#university_role_id").prop('required',state);
            $("#kmamail").prop('required', state);
            if (state) {
                $("#isNaukmaFields").css('display', 'block');
            } else {
                $("#isNaukmaFields").css('display', 'none');
                $("#university_role_id").val("");
                $("#kmamail").val("");
            }
            console.log(state);
        }
        changeVisibility($('#is_naukma').is(':checked'));
        $("#is_naukma").change(function () {
            changeVisibility($('#is_naukma').is(':checked'));

        });
    });

} catch (e) {}
