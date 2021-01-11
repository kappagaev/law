try {
    window.$ = window.jQuery = require('jquery');
    $(document).ready(function(){

       $('#sphere').on('change',function () {
            $.get('/violation/sphere/' +  $('#sphere').val() + '/types', function (data) {
                $('#type').empty();
                $('#checkboxes').empty();
                $('#type').append('<option value=""> Виберіть вид порушення</option>');
                data.forEach(function (option) {

                    $('#type').append('<option value="' + option.id +'">' + option.description+ '</option>');
                });
            });
       });
        $('#type').on('change',function () {
            $.get('/violation/type/' +  $('#type').val() + '/checkboxes', function (data) {
                $('#checkboxes').empty();

                data.forEach(function (checkbox) {

                    $('#checkboxes').append('<label><input type="checkbox" name="checkboxes[]" value="' + checkbox.id +'">' + checkbox.description+ '</option><br>');
                });
            });
        });

        $('#region').on('change',function () {
            $.get('/region/' +  $('#region').val() + '/districts', function (data) {
                $('#district').empty();
                $('#settlement').empty();
                $('#district').append('<option value="">Виберіть область</option>');
                data.forEach(function (district) {

                    $('#district').append('<option value="' + district.id +'">' + district.name+ '</option>');
                });
            });
        });
        $('#district').on('change',function () {
            $.get('/district/' +  $('#district').val() + '/settlements', function (data) {
                $('#settlement').empty();
                $('#settlement').append('<option value="">Виберіть населений пункт</option>');
                data.forEach(function (settlement) {

                    $('#settlement').append('<option value="' + settlement.id +'">' + settlement.name+ '</option>');
                });
            });
        });

       console.log('Success!');
    });

} catch (e) {}
