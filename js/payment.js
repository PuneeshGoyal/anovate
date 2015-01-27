/************************THIS FUNCTION IS USED WHEN USER IS LOGGED IN AND HAVE MULTIPLE CARD STARTS***************/

function show_methods()
{
    if ($('#show_m').css('display') == 'none') {
        $("#show_method_txt").html('Show all cards');
        $("#default_payment").hide();
        $("#show_m").show();
        $("#show_m").attr('rel', 'block');
    }
    else {
        $("#show_method_txt").html('CHANGE PAYMENT METHOD');
        $("#default_payment").show();
        $("#show_m").hide();
        $("#show_m").attr('rel', 'none');
    }
}

//show hide card options
function show_block(val)
{
    if (val == 'card') {
        $('#card_info').show();
    }
    else
    {
        $('#card_info').hide();
    }
}

/************************THIS FUNCTION IS USED WHEN USER IS LOGGED IN AND HAVE MULTIPLE CARD ENDS***************/


function get_payment(element)
{
    var e = $(element);//element 
    var formid = e.parents("form").attr("id");

    var float_regex = /^\d{0,10}(\.\d{1,2})?$/;  ////match ints and floats/decimals
    var cause_id = $('#cause_id').val().trim();
    var default_card = $('input[name=cards]:checked').val();
    var show_m = $("#show_m").attr('rel').trim();
    var method = $('#method').val().trim();
    var amount = $('#amount').val().trim();
    var num = /^[0-9\ ]+$/;
    var support_as = $("#support_as").is(":checked") ? 1 : 0;
    $("#support_as").val(support_as);

    if (amount == "") {
        var error = "Please enter amount";
        $('#error_msgs').html(error).show().css({'color': 'red'});
        return false;
    }
    else if (!float_regex.test(amount) || amount == "0") {
        var error = "Please enter valid amount";
        $('#error_msgs').html(error).show().css({'color': 'red'});
        return false;
    }
    else if (show_m == 'none')
    {
        if (!$('input[name=cards]:checked').val())
        {
            var error = "Please select atleast one credit card ";
            $('#error_msgs').html(error).show().css({'color': 'red'});
            return false;
        }
        else {

            $.ajax({
                type: 'POST',
                url: BASEURL + 'donation/pay_card/',
                data: {'support_as': support_as, 'cause_id': cause_id, 'amount': amount, 'card_id': default_card},
                beforeSend: function() {
                    $('#error_msgs').html('<font  style="color:red">Processing.....Please wait couple of minutes.</font>');
                    $('#' + formid).find('input, textarea, select, button, checkbox, radio').not(':hidden,:disabled').prop('disabled', true);
                },
                success: function(rep) {
                    $('#' + formid).find('input, textarea, select, button, checkbox, radio').not(':hidden,:disabled').prop('disabled', false);
                    var result = eval("(" + rep + ")");
                    if (result['status'] == 'error')
                    {
                        $('#' + formid).find('input, textarea, select, button, checkbox, radio').prop('disabled', false);
                        $('#error_msgs').html(result['msg']).show().css({'color': 'red'});
                    }
                    else
                    {
                        setTimeout(function() {
                            window.location = BASEURL + 'cause/thankyou/' + cause_id + '/' + result['data'];
                        }, 3000);
                        $('#error_msgs').html(result['msg']).show().css({'color': 'green'});
                    }
                }
            });

        }
    }
    else if (show_m == 'block')
    {
        if (method == '') {
            var error = "Please select payment type";
            $('#error_msgs').html(error).show().css({'color': 'red'});
            return false;
        }
        else if (method == 'paypal')
        {
            if (amount == "")
            {
                var error = "Please enter amount";
                $('#error_msgs').html(error).show().css({'color': 'red'});
                return false;
            }
            else if (!float_regex.test(amount) || amount == "0") {
                var error = "Please enter valid amount";
                $('#error_msgs').html(error).show().css({'color': 'red'});
                return false;
            }
            else {
                document.getElementById("pay_form").submit();
            }
        }
        else
        {
            var card = $('input[name=card]:checked').val();
            var cnumber = $('#cnumber').val().trim();
            var cvc = $('#cvc').val().trim();
            var exp_month = $('#exp_month').val().trim();
            var exp_year = $('#exp_year').val().trim();
            var support_as = $("#support_as").is(":checked") ? 1 : 0;
            $("#support_as").val(support_as);

            if (amount == "")
            {
                var error = "Please enter amount";
                $('#error_msgs').html(error).show().css({'color': 'red'});
                return false;
            }
            else if (!float_regex.test(amount) || amount == "0") {
                var error = "Please enter valid amount";
                $('#error_msgs').html(error).show().css({'color': 'red'});
                return false;
            }
            else if (!$('input[name=card]:checked').val())
            {

                var error = "Please select credit card";
                $('#error_msgs').html(error).show().css({'color': 'red'});
                return false;
            }
            else if (cnumber == "")
            {
                var error = "Please enter credit card number";
                $('#error_msgs').html(error).show().css({'color': 'red'});
                return false;
            }
            else if (cvc == "")
            {
                var error = "Please enter cvv number";
                $('#error_msgs').html(error).show().css({'color': 'red'});
                return false;
            }
            else if (exp_month == "")
            {
                var error = "Please select expiration month.";
                $('#error_msgs').html(error).show().css({'color': 'red'});
                return false;
            }
            else if (exp_year == "")
            {
                var error = "Please select  expiration year.";
                $('#error_msgs').html(error).show().css({'color': 'red'});
                return false;
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: BASEURL + 'donation/paypal_checkout/',
                    data: {'support_as': support_as, 'cause_id': cause_id, 'amount': amount, 'card': card, 'cnumber': cnumber, 'cvc': cvc, 'exp_month': exp_month, 'exp_year': exp_year},
                    beforeSend: function() {
                        $('#error_msgs').html('<font  style="color:red">Processing.....Please wait couple of minutes.</font>');
                        $('#' + formid).find('input, textarea, select, button, checkbox, radio').not(':hidden,:disabled').prop('disabled', true);
                    },
                    success: function(rep) {
                        $('#' + formid).find('input, textarea, select, button, checkbox, radio').not(':hidden,:disabled').prop('disabled', false);

                        var result = eval("(" + rep + ")");
                        if (result['status'] == 'error')
                        {
                            $('#' + formid).find('input, textarea, select, button, checkbox, radio').prop('disabled', false);
                            $('#error_msgs').html(result['msg']).show().css({'color': 'red'});
                        }
                        else
                        {
                            setTimeout(function() {
                                window.location = BASEURL + 'cause/thankyou/' + cause_id + '/' + result['data'];
                            }, 3000);
                            $('#error_msgs').html(result['msg']).show().css({'color': 'green'});
                        }
                    }
                });
            }

        }
    }
}


//clear previous data inside modal box 
$('body').on('hidden.bs.modal', '.modal', function() {
    $(this).removeData('bs.modal');
});

/**************************************CALL IFRAME INSIDE MOCAL BOX STARTS*******************************************/
$('a.modalButton').on('click', function(e) {
    var src = $(this).attr('data-src');
    var height = $(this).attr('data-height') || 330;
    var width = $(this).attr('data-width') || 560;
    $("#myModalxx iframe").attr({'src': src, 'height': height, 'width': width});
});
/**************************************CALL IFRAME INSIDE MOCAL BOX ENDS*******************************************/



$("#donate_bttn").click(function(e) {
    jQuery('html,body').animate({scrollTop: 1000}, 0);
});

function petition_validation(element) {
    var e = $(element);//element 
    var formid = e.parents("form").attr("id");
    var full_name_regex = /^[a-zA-Z\s.]{3,25}$/i;//only letters, period(.),space get accepted	
    var cause_id = $("#cause_id").val();
    var name = $("#name").val();
    var userid = $("#userid").val();
    var user_type = $("#user_type").val();
    var location = $("#location").val();
    var email = $("#email").val();
    var message = $("#content").val();
    var email_regex = /^[a-zA-Z0-9.'+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var anonymous_status = $("#anonymous_status").is(":checked") ? 1 : 0;
    var uri = $("#uri").val();
    var response;
    var message;

    if (name == "") {
        response = 'error';
        message = "Please enter name";
        $("#name").focus();
    }

    else if (location == "") {
        response = 'error';
        message = "Please enter location";
        $("#location").focus();
    }
    else if (email == "") {
        response = 'error';
        message = "Please enter email subscribe";
        $("#email").focus();
    }
    else if (!email_regex.test($("#email").val())) {
        response = "error";
        message = "Please Enter correct email";
        $('#email').focus();
    }
    else if (message == "") {
        response = 'error';
        message = "Please enter your own message";
        $("#content").focus();
    }
    else {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'cause/petition_submission/',
            data: {'name': name, 'userid': userid, 'location': location, 'email': email, 'message': message, 'anonymous_status': anonymous_status, 'cause_id': cause_id, 'user_type': user_type},
            beforeSend: function() {
                $('#' + formid).find('input, textarea, select, button, checkbox, radio').not(':hidden,:disabled').prop('disabled', true);
            },
            success: function(rep) {
                $('#' + formid).find('input, textarea, select, button, checkbox, radio').not(':hidden,:disabled').prop('disabled', false);

                obj = JSON.parse(rep);
                if (obj["response"] == 'error')
                {
                    $('#error_petition').html(obj["message"]).show().css({'color': 'red'});
                }
                else
                {
                    $('#error_petition').html(obj["message"]).css({'color': 'green'}).show(5000, function() {
                        window.location.href = BASEURL + "cause/cause_detail/" + uri;
                    });
                }
            },
            error: function(rep)
            {
                $('#' + formid).find('input, textarea, select, button, checkbox, radio').prop('disabled', false);
                if (rep.readyState == 4) {
                    $('#error_petition').html(rep.statusText).css({'color': 'red'});
                }
            }
        });
        //return false;
    }
    if (message != '' && message != null)
    {
        if (response == 'error')
        {
            $('#error_petition').html(message).show().css({'color': 'red'});
            return false;
        }
    }
}


function volunteer_validation(element) {
    var e = $(element);//element 
    var formid = e.parents("form").attr("id");
    var full_name_regex = /^[a-zA-Z\s.]{3,25}$/i;//only letters, period(.),space get accepted	
    var cause_id = $("#ucause_id").val();
    var name = $("#uname").val();
    var userid = $("#uuserid").val();
    var user_type = $("#uuser_type").val();
    var location = $("#ulocation").val();
    var email = $("#uemail").val();
    var age = $("#age").val();
    var gender = $("input[name=gender]:checked").val();
    var phone_number = $("#phone_number").val();
    var email_regex = /^[a-zA-Z0-9.'+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // var anonymous_status = $("#uanonymous_status").is(":checked") ? 1:0;
    var uri = $("#uri").val();
    var response, message;

    if (name == "") {
        response = 'error';
        message = "Please enter name";
        $("#uname").focus();
    }
    else if (location == "") {
        response = 'error';
        message = "Please enter location";
        $("#ulocation").focus();
    }
    else if (email == "") {
        response = 'error';
        message = "Please enter email subscribe";
        $("#uemail").focus();
    }
    else if (!email_regex.test($("#uemail").val())) {
        response = "error";
        message = "Please Enter correct email";
        $('#uemail').focus();
    }
    else if (phone_number == "") {
        response = 'error';
        message = "Please enter your phone number";
        $("#phone_number").focus();
    }
    else if (age == "") {
        response = 'error';
        message = "Please enter your age";
        $("#age").focus();
    }
    else if (!$("input[name=gender]:checked").val()) {
        response = 'error';
        message = "Please select your gender";
        $("#gender").focus();
    }
    else {
        //'anonymous_status' : anonymous_status,
        $.ajax({
            type: 'POST',
            url: BASEURL + 'cause/volunteer_submission/',
            data: {'name': name, 'userid': userid, 'location': location, 'email': email, 'phone_number': phone_number, 'gender': gender, 'age': age, 'cause_id': cause_id, 'user_type': user_type, 'uri': uri},
            beforeSend: function() {
                $('#' + formid).find('input, textarea, select, button, checkbox, radio').not(':hidden').prop('disabled', true);
            },
            success: function(rep) {
                $('#' + formid).find('input, textarea, select, button, checkbox, radio').not(':hidden').prop('disabled', false);
                object = JSON.parse(rep);

                if (object["response"] == 'error')
                {
                    $('#error_volunteer').html(object["message"]).removeClass('alert-success').addClass('error-danger alert-danger').show();
                }
                else
                {
                    debugger;
                    $('#error_volunteer').html(object["message"]).removeClass('alert-danger').addClass('error-success alert-success').show("fast", function() {
                        window.location.href = BASEURL + "cause/cause_detail/" + uri;
                    });
                }
            },
            error: function(rep)
            {
                $('#' + formid).find('input, textarea, select, button, checkbox, radio').prop('disabled', false);
                if (rep.readyState == 4) {
                    $('#error_volunteer').html(rep.statusText).removeClass('alert-success').addClass('error-danger alert-danger').show();
                }
            }
        });
        //return false;
    }
    if (message != '' && message != null)
    {
        if (response == 'error')
        {
            $('#' + formid).find('input, textarea, select, button, checkbox, radio').prop('disabled', false);
            $('#error_volunteer').html(message).removeClass('alert-success').addClass('error-danger alert-danger').show();
            return false;
        }
    }
}

