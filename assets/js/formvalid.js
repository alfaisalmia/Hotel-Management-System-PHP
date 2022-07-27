function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email.toLowerCase());
}
$(document).ready(function (e) {
    $("#fname_error_message").hide();
    $("#email_error_message").hide();
    $("#password_error_message").hide();
    $("#retype_password_error_message").hide();
    $("#address_error_message").hide();
    $("#contact_error_message").hide();
    $("#dob_error_message").hide();
    $("#gender_error_message").hide();
    $("#password_error_message").hide();
     $("#nid_error_message").hide();
    var error_fname = false;
    var error_email = false;
    var form_password = false;
    var error_repassword = false;
    var error_address = false;
    var error_contact = false;
    var error_dob = false;
    var error_gender = false;
    var error_gender = false;
    var error_passport = false;
    var error_nid = false;

    $("#form_fname").focusout(function () {
        check_fname();
    });
    $("#form_email").focusout(function () {
        check_email();
    });
    $("#form_password").focusout(function () {
        check_password();
    });
    $("#form_retype_password").focusout(function () {
        check_retype_password();
    });
    $("#form_address").focusout(function () {
        check_address();
    });
    $("#form_contact").focusout(function () {
        check_contact();
    });
    $("#form_dob").focusout(function () {
        check_dob();
    });
    $("#form_gender").focusout(function () {
        check_gender();
    });
    $("#form_passport").focusout(function () {
        check_passport();
    });
     $("#form_nid").focusout(function () {
        check_nid();
    });
    function check_fname() {
       
        var fname = $("#form_fname").val();
        if (fname.length >5 && fname !== '') {
            $("#fname_error_message").hide();
            $("#form_fname").css("border", "1px solid #34F458");
        } else {
            $("#fname_error_message").html("Enter Your Valid Name");
            $("#fname_error_message").show();
            $("#form_fname").css("border", "1px solid #F90A0A");
            error_fname = true;
        }
    }
    function check_email() {
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $("#form_email").val();
        if (pattern.test(email) && email !== '') {
            $("#email_error_message").hide();
            $("#form_email").css("border", "1px solid #34F458");
        } else {
            $("#email_error_message").html("Invalid Email");
            $("#email_error_message").show();
            $("#form_email").css("border", "1px solid #F90A0A");
            error_email = true;
        }
    }

    function check_password() {
        var password_length = $("#form_password").val().length;
        if (password_length < 8) {
            $("#password_error_message").html("Atleast 8 Characters");
            $("#password_error_message").show();
            $("#form_password").css("border", "1px solid #F90A0A");
            error_password = true;
        } else {
            $("#password_error_message").hide();
            $("#form_password").css("border", "1px solid #34F458");
        }
    }
    function check_retype_password() {
        var password = $("#form_password").val();
        var retype_password = $("#form_retype_password").val();

        if (password !== retype_password || retype_password == "") {
            $("#retype_password_error_message").html("Passwords Did not Matched");
            $("#retype_password_error_message").show();
            $("#form_retype_password").css("border", "1px solid #F90A0A");
            error_retype_password = true;
        } else {
            $("#retype_password_error_message").hide();
            $("#form_retype_password").css("border", "1px solid #34F458");
        }
    }

    function check_address() {
        var pattern =  /^[w-.+]+[a-zA-Z0-9a-zA-Z0-9]{2,4}$/;
        var address = $("#form_address").val();
        if (pattern.test(address) && address !== '') {
            $("#address_error_message").hide();
            $("#form_address").css("border", "1px solid #34F458");
        } else {
            $("#address_error_message").html("Enter Your Valid Address");
            $("#address_error_message").show();
            $("#form_address").css("border", "1px solid #F90A0A");
            error_address = true;
        }
    }
    function check_contact() {
        var contact = $("#form_contact").val().length;
        if (contact < 10 || contact === '') {
            $("#contact_error_message").html("Contact No must more than 10 digit");
            $("#contact_error_message").show();
            $("#form_contact").css("border", "1px solid #F90A0A");
            error_address = true;
        } else {
            $("#contact_error_message").hide();
            $("#form_contact").css("border", "1px solid #34F458");
        }
    }
    function check_dob() {
        var dob = $("#form_dob").val();
        var date_regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
        if (!(date_regex.test(dob)) || dob === "") {
            $("#dob_error_message").html("Enter Your Correct Date of Birth");
            $("#dob_error_message").show();
            $("#form_dob").css("border", "1px solid #F90A0A");
            error_dob = true;
        } else {
            $("#dob_error_message").hide();
            $("#form_dob").css("border", "1px solid #34F458");

        }
    }
    function check_gender() {
        if ($('input[name="gender"]:checked').val() > 0) {
            $("#gender_error_message").hide();
            $("#form_gender").css("border", "1px solid #34F458");
        } else {
            $("#gender_error_message").html("Enter Your Gender");
            $("#gender_error_message").show();
            $("#form_gender").css("border", "1px solid #F90A0A");
            error_gender = true;
        }
    }
    function check_passport() {
        var passport = $("#form_passport").val().length;
        if (passport < 8 || passport === '') {
            $("#passport_error_message").html("Enter a valid Passport");
            $("#passport_error_message").show();
            $("#form_passport").css("border", "1px solid #F90A0A");
            error_passport = true;
        } else {
            $("#passport_error_message").hide();
            $("#form_passport").css("border", "1px solid #34F458");
        }
    }
    function check_nid() {
        var nid = $("#form_nid").val().length;
        if (nid < 13 || nid === '') {
            $("#nid_error_message").html("NID should be 13 digit");
            $("#nid_error_message").show();
            $("#form_nid").css("border", "1px solid #F90A0A");
            error_passport = true;
        } else {
            $("#nid_error_message").hide();
            $("#form_nid").css("border", "1px solid #34F458");
        }
    }
});
