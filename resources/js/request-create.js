try {
    window.$ = window.jQuery = require('jquery');
    $(document).ready(function(){
        function retrieveSpheres(selected = null) {
            $.get('/violation/spheres/', function (options) {
                $('#sphere').empty();

                $('#sphere').append('<option value=""> Виберіть сферу порушення</option>');
                options.forEach(function (option) {
                    if (selected === option.id) {
                        $('#sphere').append('<option value="' + option.id +'" selected>' + option.description+ '</option>');
                    } else {
                        $('#sphere').append('<option value="' + option.id +'">' + option.description+ '</option>');
                    }

                });
            });
        }
        function retrieveTypes(sphereId, selected = null) {
            $.get('/violation/sphere/' +  sphereId + '/types', function (options) {
                $('#type').empty();
                $('#checkboxes').empty();

                $('#type').append('<option value=""> Виберіть вид порушення</option>');
                options.forEach(function (option) {
                    if (selected === option.id) {
                        $('#type').append('<option value="' + option.id +'" selected>' + option.description+ '</option>');
                    } else {
                        $('#type').append('<option value="' + option.id +'">' + option.description+ '</option>');
                    }

                });
            });
        }
        function retrieveCheckboxes(type, selected = null) {
            $.get('/violation/type/' +  type + '/checkboxes', function (data) {
                $('#checkboxes').empty();
                console.log(data);
                if(selected[0].isNaN()) {
                    data.forEach(function (checkbox) {
                        if (selected.includes(checkbox.id)) {
                            $('#checkboxes').append('<label><input type="checkbox" name="checkboxes[]" value="' + checkbox.id +'" checked>' + checkbox.description+ '<br>');
                        } else {
                            $('#checkboxes').append('<label><input type="checkbox" name="checkboxes[]" value="' + checkbox.id +'">' + checkbox.description+ '<br>');
                        }

                    });
                } else {
                    data.forEach(function (checkbox) {

                        $('#checkboxes').append('<label><input type="checkbox" name="checkboxes[]" value="' + checkbox.id +'">' + checkbox.description+ '<br>');
                    });
                }

            });
        }
        retrieveSpheres($('#sphere').data('sphereId'));
        if($('#sphere').data('sphereId') != null) {
            retrieveTypes($('#sphere').data('sphereId'), $('#type').data('typeId'));
        }
        if($('#type').data('typeId') != null) {
            if($('#checkboxes').length > 0) {
                retrieveCheckboxes($('#type').data('typeId'), $('#checkboxes').data('checkboxes').split(',').map(function(item) {
                    return parseInt(item, 10);
                }));
            }
        }

       $('#sphere').on('change',function () {
           $('#type').data('typeId', null);
           $('#sphere').data('sphereId', $('#sphere').val());
           retrieveTypes($('#sphere').val());
       });
        $('#type').on('change',function () {
            if ($('#checkboxes').length > 0) {
                $('#type').data('typeId', $('#type').val());
                retrieveCheckboxes($('#type').data('typeId'), $('#checkboxes').data('checkboxes').split(',').map(function (item) {
                    return parseInt(item, 10);
                }));
            }
        });
        function retrieveRegions(selected = null) {
            $.get('/regions/', function (data) {
                $('#region').empty();
                $('#district').empty();
                $('#settlement').empty();
                $('#region').append('<option value="">Виберіть область</option>');
                data.forEach(function (region) {
                    if(region.id == selected) {
                        $('#region').append('<option selected value="' + region.id +'">' + region.name+ '</option>');
                    } else {
                        $('#region').append('<option value="' + region.id +'">' + region.name+ '</option>');
                    }

                });
            });
        }

        function retrieveDistricts(region, selected = null) {
            $.get('/region/' +  region + '/districts', function (data) {
                $('#district').empty();
                $('#settlement').empty();
                $('#district').append('<option value="">Виберіть регіон</option>');
                data.forEach(function (district) {
                    if (selected == district.id) {
                        $('#district').append('<option selected value="' + district.id +'">' + district.name+ '</option>');
                    } else {
                        $('#district').append('<option value="' + district.id +'">' + district.name+ '</option>');
                    }

                });
            });
        }

        function retrieveSettlements(district, selected = null) {
            $.get('/district/' +  district + '/settlements', function (data) {
                $('#settlement').empty();
                $('#settlement').append('<option value="">Виберіть населений пункт</option>');
                data.forEach(function (settlement) {
                    if (selected == settlement.id) {
                        $('#settlement').append('<option selected value="' + settlement.id +'">' + settlement.name+ '</option>');
                    } else {
                        $('#settlement').append('<option value="' + settlement.id +'">' + settlement.name+ '</option>');
                    }

                });
            });
        }
        retrieveRegions($('#region').data('regionId'));
        retrieveDistricts($('#region').data('regionId'), $('#district').data('districtId'));
        retrieveSettlements($('#district').data('districtId'), $('#settlement').data('settlementId'));
        $('#region').on('change',function () {
            $('#region').data('regionId', $('#region').val());
            retrieveDistricts($('#region').val(), $('#district').data('districtId'));
        });
        $('#district').on('change',function () {
            $('#district').data('settlementId', $('#district').val());
            retrieveSettlements($('#district').val(), $('#settlement').data('settlementId'));
        });

       console.log('Success!');
    });

} catch (e) {}
