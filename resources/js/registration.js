try {
    window.$ = window.jQuery = require('jquery');
    console.log($);
    function retrieveTerritory(element, selected = null, parent = null) {
        let url = '/territory';
        if(parent != null) {
            url += '/' + parent + '/children';
        }
        $.get(url, function (options) {
            element.empty();

            element.append('<option value="">Виберіть</option>');
            options.forEach(function (option) {
                console.log(option.id);
                if (selected == option.id) {
                    console.log("selected");
                    element.append('<option value="' + option.id +'" data-type="' + option.type +'" selected>' + option.name+ '</option>');
                } else {
                    element.append('<option value="' + option.id +'" data-type="' + option.type +'">' + option.name+ '</option>');
                }

            });
        });
    }
    function retrieveTerritorySelects() {
        let territory_id = $("#territory_id").val();
        let parent =   $.getJSON('/territory/' + territory_id + '/parent', function (parent) {
            console.log(parent);
            if(parent.length === 0) {
                retrieveTerritory($("#territory1"), territory_id);
                console.log(territory_id);
                return;
            }
            let parentOfParent = $.getJSON('/territory/' + parent + '/parent', function (parentOfParent) {
                if(parentOfParent.length === 0) {
                    retrieveTerritory($("#territory1"), parent);
                    retrieveTerritory($("#territory2"), territory_id, parent);
                    console.log(2);
                    return;
                }

                retrieveTerritory($("#territory1"), parentOfParent);
                retrieveTerritory($("#territory2"), parent, parentOfParent);
                retrieveTerritory($("#territory3"), territory_id, parent);
                console.log(3);
            });


        });

    }
    $(document).ready(function(){
        if (!!$("#territory_id").val()) {
            console.log(123);
            retrieveTerritorySelects();
        } else {
            retrieveTerritory($('#territory1'), $('#territory1').data('selected'));
        }
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
