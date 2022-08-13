jQuery(document).on("click", "#sb_login_submit", function() {

    let actionButton = jQuery("#sb_login_submit");
    let formEl = jQuery("form#student_login_form");
    let statusDiv = jQuery('#student_login_status');

    console.log(formEl[0]);

    statusDiv.html('');

    formEl.find(".form-control").each(function() {
        jQuery(this).removeClass("input-error");
    });
    formEl.find(".input-status-msg").each(function() {
        jQuery(this).html("");
    });

    var isValid = true;
    var firstError = "";
    var count = 0;

    formEl.find(".reqField").each(function() {
        if (jQuery(this).val().trim() == "") {
            jQuery(this).addClass("is-invalid");

            isValid = false;
            if (count == 0) {
                firstError = jQuery(this);
            }
        } else {
            jQuery(this).removeClass("is-invalid");
        }

        count++;
    });

    if (isValid == true) {

        var FrmData = new FormData(formEl[0]);
        FrmData.append('action', 'getStudentLoginAjax');

        jQuery.ajax({
            url: sbajax.ajaxurl,
            type: 'POST',
            data: FrmData,
            processData: false,
            contentType: false,
            beforeSend: function(xhr) {
                actionButton.html("Processing..");
                actionButton.prop('disabled', true);
            },
            complete: function(xhr, status) {
                if ((xhr.status != 200)) {
                    console.log('Error: ' + xhr.responseJSON.message);
                }
            },
            success: function(rData) {
                console.log(rData);

                let rObj = JSON.parse(rData);
                if (rObj.status == "success") {
                    formEl[0].reset();

                    statusDiv.html('<div class="msg msg-success msg-full mb-2">Redirecting, please wait..</div>');
                    window.location.href = rObj.login_url;

                } else {
                    actionButton.html("Sign In");
                    actionButton.prop('disabled', false);

                    statusDiv.html('<div class="msg msg-danger msg-full mb-2">' + rObj.message + '</div>');

                    if ("errors" in rObj) {
                        jQuery.each(rObj.errors, function(i, msg) {
                            jQuery('#' + i).addClass('input-error');
                            jQuery('#' + i + '_msg').html('<span class="is-error">' + msg + '</span>');
                        });
                    }
                }
            }
        });

    } else {
        statusDiv.html("<div class='msg msg-danger msg-full mb-2'>Fill all the required fields</div>");
    }
});