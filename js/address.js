window.load = $(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: 'address-ajax.php',
        data: 'getcountry',

        success: function (html) {
            $('#country').html(html);

        }
    });

});

function loadaddress(){
    var countryID = "160";
    if (countryID) {
        $.ajax({
            type: 'POST',
            url: 'address-ajax.php',
            data: 'country_id=' + countryID,
            success: function (html) {
                $('#state').html(html);
                $('#city').html('<option value="">Select state first</option>');
            }
        });
    } else {
        $('#state').html('<option value="">Select country first</option>');
        $('#city').html('<option value="">Select state first</option>');
    }
}

$(document).ready(function () {
    $('#category').on('change', function () {//change function on country to display all state 
        var categoryID = $(this).val();
        if (categoryID) {
            $.ajax({
                type: 'POST',
                url: 'passer.php',
                data: 'categoryID=' + categoryID,
                success: function (html) {
                    $('#sub_category').html(html);
                    // $('#sub_category').html('<option value="">Select state first</option>'); 
                }
            });
        } else {
            $('#sub_category').html('<option value="">Select a category first</option>');
        }
    });

    $('#country').on('change', function () {//change function on country to display all state 
        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: 'POST',
                url: 'address-ajax.php',
                data: 'country_id=' + countryID,
                success: function (html) {
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>');
                }
            });
        } else {
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>');
        }
    });

    $('#state').on('change', function () {//change state to display all city
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: 'POST',
                url: 'address-ajax.php',
                data: 'state_id=' + stateID,
                success: function (html) {
                    $('#city').html(html);
                }
            });
        } else {
            $('#city').html('<option value="">Select state first</option>');
        }
    });



});