try {
    window.$ = window.jQuery = require('jquery');
    console.log($);
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
            if(selected[0] == NaN) {
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
    // function retrieveRegions(selected = null) {
    //     $.get('/regions/', function (data) {
    //         $('#region').empty();
    //         $('#district').empty();
    //         $('#settlement').empty();
    //         $('#region').append('<option value="">Виберіть область</option>');
    //         data.forEach(function (region) {
    //             if(region.id == selected) {
    //                 $('#region').append('<option selected value="' + region.id +'">' + region.name+ '</option>');
    //             } else {
    //                 $('#region').append('<option value="' + region.id +'">' + region.name+ '</option>');
    //             }
    //
    //         });
    //     });
    // }
    //
    // function retrieveDistricts(region, selected = null) {
    //     $.get('/region/' +  region + '/districts', function (data) {
    //         $('#district').empty();
    //         $('#settlement').empty();
    //         $('#district').append('<option value="">Виберіть регіон</option>');
    //         data.forEach(function (district) {
    //             if (selected == district.id) {
    //                 $('#district').append('<option selected value="' + district.id +'">' + district.name+ '</option>');
    //             } else {
    //                 $('#district').append('<option value="' + district.id +'">' + district.name+ '</option>');
    //             }
    //
    //         });
    //     });
    // }
    //
    // function retrieveSettlements(district, selected = null) {
    //     $.get('/district/' +  district + '/settlements', function (data) {
    //         $('#settlement').empty();
    //         $('#settlement').append('<option value="">Виберіть населений пункт</option>');
    //         data.forEach(function (settlement) {
    //             if (selected == settlement.id) {
    //                 $('#settlement').append('<option selected value="' + settlement.id +'">' + settlement.name+ '</option>');
    //             } else {
    //                 $('#settlement').append('<option value="' + settlement.id +'">' + settlement.name+ '</option>');
    //             }
    //
    //         });
    //     });
    // }
    function retrieveTerritory(element, selected = null, parent = null) {
        let url = '/territory';
        if(parent != null) {
            url += '/' + parent + '/children';
        }
        $.get(url, function (options) {
            element.empty();

            element.append('<option value="">Виберіть</option>');
            options.forEach(function (option) {
                if (selected === option.id) {
                    element.append('<option value="' + option.id +'" data-type="' + option.type +'" selected>' + option.name+ '</option>');
                } else {
                    element.append('<option value="' + option.id +'" data-type="' + option.type +'">' + option.name+ '</option>');
                }

            });
        });
    }
    $(document).ready(function(){

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
        retrieveTerritory($('#territory1'), $('#territory1').data('selected'));
        $('#territory1').on('change', function () {
            console.log($(this).find('option:selected').data('type'));
           if($(this).find('option:selected').data('type') == 'М') {
               $('#territory_id').val($('#territory1').val());
               $('#territory2').empty();
               $('#territory3').empty();
           } else {
               $('#territory2').empty();
               $('#territory3').empty();
               retrieveTerritory($('#territory2'), null, $('#territory1').val());
           }
        });
        console.log($('#territory2').data('selected'));
        if ($('#territory2').data('selected') !== null) {
            retrieveTerritory($('#territory2'), $('#territory2').data('selected'), $('#territory1').data('selected'));

        }
        $('#territory2').on('change', function () {
            $('#territory3').empty();
            if($(this).find('option:selected').data('type') !== '') {
                $('#territory_id').val($('#territory2').val());
            } else {

                retrieveTerritory($('#territory3'), null, $('#territory2').val());
            }
        });
        if ($('#territory3').data('selected')) {
            retrieveTerritory($('#territory3'), $('#territory3').data('selected'), $('#territory2').data('selected'));
        }
        $('#territory3').on('change', function () {

            $('#territory_id').val($('#territory3').val());

        });
       console.log('Success!');
    });

} catch (e) {}
