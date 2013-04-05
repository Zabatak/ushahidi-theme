$(document).ready(function() {
    $('.dropdown-toggle').dropdown();

    $('#l').addClass('span2');

    $('.submit-incident a').addClass('btn btn-success');
    $('.submit-incident a').prepend('<i class="icon-pencil icon-white"> </i> ');

    $('.submit-incident').addClass('submit-incident2').removeClass('submit-incident');



    // show/hide report filters and layers boxes on home page map
    $("a.toggle").toggle(
            function() {
                $($(this).attr("href")).show();
                $(this).addClass("active-toggle");
            },
            function() {
                $($(this).attr("href")).hide();
                $(this).removeClass("active-toggle");
            }
    );
    $('.mtooltip').tooltip();

    $('#bigmap').click(function() {
        $('#map').addClass('tallmap', 1000);
        $(this).addClass('active');
        $('#smallmap').removeClass('active');
    });

    $('#smallmap').click(function() {
        $('#map').removeClass('tallmap');
        $(this).addClass('active');
        $('#bigmap').removeClass('active');
    });


    //hide "home" link
    $('.navbar .nav a[href$=main]').hide();
    $('.page_text img').addClass('img-polaroid');
    $('.more').addClass('btn btn-small btn-info');






    function hideSwitchForm() {
        $('select#form_id').closest('div.row').hide();
    }

    function hideCategories() {
        $('#categories').closest('div.report_row').hide();

    }



    //todo: move to plugin

    var HashString = function() {
        // This function is anonymous, is executed immediately and 
        // the return value is assigned to QueryString!
        var query_string = {};
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            // If first entry with this name
            if (typeof query_string[pair[0]] === "undefined") {
                query_string[pair[0]] = pair[1];
                // If second entry with this name
            } else if (typeof query_string[pair[0]] === "string") {
                var arr = [query_string[pair[0]], pair[1]];
                query_string[pair[0]] = arr;
                // If third or later entry with this name
            } else {
                query_string[pair[0]].push(pair[1]);
            }
        }
        console.log(query_string);
        return query_string;
    }();

    function formSwitchByURL() {
        var formId = HashString.form_id;
        console.log('form_id ' + formId);
        if (formId > 0) {
            $("select#form_id").val(formId);
            formSwitch(formId, '', false);
            hideSwitchForm();
        }
    }

    function categorySelectByURL() {
        var cat_id = HashString.cat_id;
        console.log('cat_id ' + cat_id);
        if (cat_id > 0) {
            if ($("input[name='incident_category[]'][type='checkbox'][value=" + cat_id + "]")
                    .prop('checked', true)
                    .prop('checked')) {
                hideCategories();
            }
        }

    }



    formSwitchByURL();
    categorySelectByURL();

});
