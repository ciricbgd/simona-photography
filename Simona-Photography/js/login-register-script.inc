//Register / Login 
$('#login-register').click(function () {
    $(this).addClass("remove");
    $('#login-window').removeClass("remove");
});
$('#cancelForm').click(function () {
    $('#login-register').removeClass("remove");
    $('#login-window').addClass("remove");
});
$('#login').click(function () {
    $(this).removeClass("unselected").addClass("selected");
    $('#register').removeClass("selected").addClass("unselected");
    $('#register-forms').addClass("remove");
    $('#loginorregister').attr('value', 'login');
    $('#btnSubmit').html('Login');
});
$('#register').click(function () {
    $('#btnSubmit').prop("disabled", true);
    $(this).removeClass("unselected").addClass("selected");
    $('#login').removeClass("selected").addClass("unselected");
    $('#register-forms').removeClass("remove");
    $('#loginorregister').attr('value', 'register');
    $('#btnSubmit').html('Register');
});
$.fn.warning = function() {
                    $(this).css({
                        'border-color': '#ff8080',
                        'outline': '0',
                        'box-shadow': '0 0 0 0.2rem rgba(255, 0, 0, 0.25)'
                    });
                };
                $.fn.clearwarning = function() {
                    $(this).css({
                        'border-color': '#30e54e',
                        'outline': '0',
                        'box-shadow': '0 0 0 0.2rem rgba(0, 255, 49, 0.25)'
                    });
                };

                var error = [];
                error[0] = 1;
                error[1] = 1;
                error[2] = 1;
                error[4] = 1;
                error[5] = 1;

                $('#tbFirstname').keyup(function() {
                    var regEx = /^[A-Z][a-z]{2,20}$/;
                    if (!$(this).val().match(regEx)) {
                        $(this).warning();
                        error[0] = 1;
                    } else {
                        $(this).clearwarning();
                        error[0] = 0;
                    }
                });
                $('#tbLastname').keyup(function() {
                    var regEx = /^[A-Z][a-z]{2,20}(\s[A-Z][a-z]{2,20}){0,4}$/;
                    if (!$(this).val().match(regEx)) {
                        $(this).warning();
                        error[1] = 1;
                    } else {
                        $(this).clearwarning();
                        error[1] = 0;
                    }
                });
                $('#tbEmail').keyup(function() {
                    var regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if (!$(this).val().match(regEx)) {
                        $(this).warning();
                        error[2] = 1;
                    } else {
                        $(this).clearwarning();
                        error[2] = 0;
                    }
                });
                $('#tbPhone').keyup(function() {
                    var regEx = /^[0-9]{7,10}$/;
                    if (!$(this).val() == "") {
                        if (!$(this).val().match(regEx)) {
                            $(this).warning();
                            error[3] = 1;
                        } else {
                            $(this).clearwarning();
                            error[3] = 0;
                        }
                    } else {
                        error[3] = 0;
                    }
                });
                $('#tbUsername').keyup(function() {
                    var regEx = /^[a-z0-9_]{3,20}$/;
                    if (!$(this).val().match(regEx)) {
                        $(this).warning();
                        error[4] = 1;
                    } else {
                        $(this).clearwarning();
                        error[4] = 0;
                    }
                });
                $('#tbPassword').keyup(function() {
                    var regEx = /^[a-zA-z0-9_]{3,20}$/;
                    if (!$(this).val().match(regEx)) {
                        $(this).warning();
                        error[5] = 1;
                    } else {
                        $(this).clearwarning();
                        error[5] = 0;
                    }
                });
                $('form').keyup(function() {
                    if ($('#register').hasClass('selected')) {
                        var error_result = 0;
                        for (i = 0; i < error.length; i++) {
                            error_result += error[i];
                        }
                        if (error_result == 0) {
                            $('#btnSubmit').prop("disabled", false);
                        } else {
                            $('#btnSubmit').prop("disabled", true);
                        }

                    }
                });

<?php
                if(isset($password_report) || isset($user_report)){
                    echo "$('#login-window').removeClass('remove');
                            $('#login-register').addClass('remove');";
                }
                if(isset($_SESSION['username'])){
                    echo "  $('#login').css('display', 'none');
                            $('#register').css('float', 'left');
                            $('#register').removeClass('unselected').addClass('selected');
                            $('#login').removeClass('selected').addClass('unselected');
                            $('#loginorregister').attr('value', 'register');
                            $('#btnSubmit').html('Register');
                            $('#register-forms').removeClass('remove');";   
                }
                ?>
