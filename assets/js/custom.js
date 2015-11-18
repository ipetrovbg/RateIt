$(document).ready(function () {

    $("#username").keyup(function () {
        var username = $(this).val();
        setTimeout(function () {
            $.ajax({
                url: "http://print-decor.eu/rateit/index.php/Users/has_username", //your server side script
                data: {username: username}, //our data
                type: 'POST',
                success: function (data) {
                    if (data === "1") {
                        $("#username").css("border-color", "green");
                    } else {
                        $("#username").css("border-color", "red");
                        $("#username").text(data);
                    }
                    // console.log(data);
                },
                error: function (msg) {
                    $(this).append('<li style="color:red">' + msg + '</li>');
                }
            });
        }, 1000);
    });
    $("#username").blur(function () {
        var username = $(this).val();
        $.ajax({
            url: "http://print-decor.eu/rateit/index.php/Users/has_username", //your server side script
            data: {username: username}, //our data
            type: 'POST',
            success: function (data) {
                if (data === "1") {
                    $("#username").css("border-color", "green");
                } else {
                    $("#username").css("border-color", "red");
                    $("#username").text(data);
                }
                // console.log(data);
            },
            error: function (msg) {
                $(this).append('<li style="color:red">' + msg + '</li>');
            }
        });
    });

    // email regex validation function
    function validateEmail(email) {
        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        return re.test(email);
    }

    // start checking registration
    $(".register-but").on('click', '#submit', function (e) {
        e.preventDefault();
//        $("#full_name").css('border','none');
//        $("#email").css('border','none');
//        $("#reg_username").css('border','none');
//        $("#reg_password").css('border','none');
//        $("#reg_conf_password").css('border','none');

        var full_name = $("#full_name").val();
        var email = $("#email").val();
        var username = $("#reg_username").val();
        var password = $("#reg_password").val();
        var conf_password = $("#reg_conf_password").val();



        if (full_name.length > 0) {
            $("#full_name").css("border-color", "green");
        } else {
            $("#full_name").css("border-color", "red");
        }
        if (username.length > 0) {
            $("#reg_username").css("border-color", "green");
        } else {
            $("#reg_username").css("border-color", "red");
        }
        if (validateEmail(email) === true) {
            $("#email").css("border-color", "green");
        } else {
            $("#email").css("border-color", "red");
        }
        if (password.length > 0) {
            $("#reg_password").css("border-color", "green");
        } else {
            $("#reg_password").css("border-color", "red");
        }
        if (conf_password === password && conf_password.length > 0) {
            $("#reg_conf_password").css("border-color", "green");
        } else {
            $("#reg_conf_password").css("border-color", "red");
        }

//        $.ajax({
//            url: "http://localhost/rateit/register/have_registered", //server side script checkout
//            data: {username: username, email: email}, //our data
//            type: 'POST',
//            success: function (data) {
//                if (data === 0) {
//                    $("#reg_username").css("border-color", "green");
//                    $("#email").css("border-color", "green");
//                } else {
//                    //$("#response_reg").text(data);
//                    $("#reg_username").css("border-color", "red");
//                    $("#email").css("border-color", "red");
//                    $("#response_reg").text("The username or email are busy!");
//                }
//                // console.log(data);
//            },
//            error: function (msg) {
//                $(this).append('<li style="color:red">' + msg + '</li>');
//            }
//        });

        if (full_name.length > 0) {
            if (validateEmail(email) === true) {
                if (password.length > 0) {
                    if (conf_password === password && conf_password.length > 0) {
                $.ajax({
                    url: "http://print-decor.eu/rateit/Users/verifyregister", //server side script checkout
                    data: {
                        username: username,
                        password: password,
                        email: email,
                        full_name: full_name
                    }, //our data
                    type: 'POST',
                    success: function (data) {
                        console.log(data);
                        if (data == 0) {
                            $("#reg_username").css("border-color", "green");
                            $("#email").css("border-color", "green");
                            $('#response_reg').html('<h3 style="color: green;">You have just successfully register!</h3>');
                            setTimeout(function () {
                                window.location.href = "http://print-decor.eu/rateit/Users/login";
                            }, 1500);

                        } else {
                            $("#reg_username").css("border-color", "red");
                            $("#email").css("border-color", "red");
                            $("#response_reg").html('<h3 style="color: red;">The username or email are busy!</h3>');
                        }
                        // console.log(data);
                    },
                    error: function (msg) {
                        $(this).append('<li style="color:red">' + msg + '</li>');
                    }
                });
                    }


            }
        }
        }

    });

});