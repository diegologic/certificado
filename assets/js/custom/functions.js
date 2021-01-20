$(document).ready(function() {
    var basepath = "/PHP/Krypto/";
    var windowLoc = $(location).attr('pathname');


    $("#register").submit(function(e) {
        e.preventDefault();
        var password = $('input[name=password]').val();
        var confpass = $('input[name=confpass]').val();
        if (password === confpass) {
            var formData = {
                'email': $('input[name=email]').val(),
                'password': $('input[name=password]').val()
            };
            //  console.log(formData);
            $("#register").LoadingOverlay("show");
            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'includes/check.php', // the url where we want to POST
                data: formData, // our data object
                success: function(data) {
                    var value = $.parseJSON(data);
                    $("#register").LoadingOverlay("hide", true);
                    if (value.success) {
                        window.location = "./includes/loginCheck.php";
                    } else {
                        {
                            notify(value.message, 'error');
                        }
                    }
                }
            });
        } else {
            notify("Passwords Do not Match!", "error");
        }
    });



    $("#login").submit(function(e) {
        e.preventDefault();
        var loginData = {
            'email': $('input[name=s_email]').val(),
            'password': $('input[name=s_password]').val()
        };
        $.LoadingOverlay("show");
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'includes/login.php', // the url where we want to POST
            data: loginData, // our data object
            success: function(data) {
                var response = $.parseJSON(data);

                if (response.success) {
                    //  notify(response.message,'success');
                    document.getElementById("login").reset();
                    window.location = "./includes/loginCheck.php";
                } else {
                    {
                        $.LoadingOverlay("hide", true);
                        notify(response.message, 'error');
                    }
                }
            }
        });
    });

    $("#developer").submit(function(e) {
        e.preventDefault();
        var formData = {
            'email': $('input[name=email]').val(),
            'name' : $('input[name=name]').val(),
            'contact': $('input[name=contact]').val(),
            'summary' : $('#summary').val()
        };

            //  console.log(formData);
            $("#developer").LoadingOverlay("show");
            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'includes/devCheck.php', // the url where we want to POST
                data: formData, // our data object
                success: function(data) {
                    var value = $.parseJSON(data);
                    $("#register").LoadingOverlay("hide", true);
                    if (value.success) {
                        window.location = "./developer.php";
                    } else {
                        {
                            notify(value.message, 'error');
                        }
                    }
                }
            });
        });

    $("#getstarted").submit(function(e) {
        e.preventDefault();
        var loginData = {
            'name': $('input[name=name]').val(),
            'college': $('input[name=college]').val(),
            'branch': $('input[name=branch]').val(),
            'contact': $('input[name=contact]').val()

        };
        $.LoadingOverlay("show");
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'includes/getstarted.php', // the url where we want to POST
            data: loginData, // our data object
            success: function(data) {
                var response = $.parseJSON(data);

                if (response.success) {
                    //  notify(response.message,'success');
                    window.location = "./dashboard.php";
                } else {
                    {
                        $.LoadingOverlay("hide", true);
                        notify(response.message, 'error');
                    }
                }
            }
        });
    });

    if (windowLoc === basepath + 'dashboard.php') {
        $("#dashboard").LoadingOverlay("show");
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: './levels/response.php',
            }).done(function(data) {
                console.log(data);
                $("#page").load("./" + data, function(response, status, xhr) {
                    if (status === "error")
                        $("#page").load("./includes/404.php");
                });
                $(document).ready(function() {
                    $("#dashboard").LoadingOverlay("hide", true);
                });
            });
        });
    }


});

function notify(message, type) {
    var call = "icon fa-check";
    var error = "icon fa-calendar-times-o";
    var success = "icon fa-check-circle-o";
    if (type == "error") {
        call = error;
    } else {
        call = success;
    }
    // create the notification
    var notification = new NotificationFx({
        message: '<span class="' + call + '"></span><p>' + message + '</p>',
        layout: 'attached',
        effect: 'bouncyflip',
        type: type, // notice, warning or error
        onClose: function() {
            this.disabled = false;
        }
    });

    // show the notification
    notification.show();
    this.disabled = true;
};
