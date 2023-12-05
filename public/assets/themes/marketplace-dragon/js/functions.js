/**
 * init elements on page loading and ajax complete
 */
function initThemeElements() {
    $.ajaxSetup({
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        }
    });

    checkWidgetCategoriesExpanded();

    var a = $(".bg");
    a.each(function (a) {
        if ($(this).attr("data-bg")) $(this).css("background-image", "url(" + $(this).data("bg") + ")");
    });


    $('.btn-default').addClass('btn-secondary');

    $('.liquid').imgLiquid();


    $('.tooltip').tooltipster({
        animation: 'fade',
        delay: 200,
        theme: 'tooltipster-shadow'
    });


    if(window.grecaptcha){
        grecaptcha.reset();
    }


}


function initThemePublicLayoutElements() {
    $.ajaxSetup({
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        }
    });

    checkWidgetCategoriesExpanded();

    $('.btn-default').addClass('btn-secondary');
}

function checkWidgetCategoriesExpanded() {
    $(".widget.widget-categories").find('input:checked').closest('.parent-category').addClass('expanded');
}

function themeConfirmation(title, text, type, confirm_btn, cancel_btn, callback, dismiss_callback) {
    swal({
        title: title,
        text: text,
        type: type,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: confirm_btn,
        cancelButtonText: cancel_btn
    }).then(
        function () {
            if (typeof callback === "function") {
                // Call it, since we have confirmed it is callable​
                callback();
            }
        }, function (dismiss) {
            if (window.Ladda) {
                Ladda.stopAll();
            }
            if (typeof dismiss_callback === "function") {
                // Call it, since we have confirmed it is callable​

                dismiss_callback()
            }
        });
}

function themeNotify(data) {
    if (undefined === data.level && undefined === data.message) {

        if (undefined !== data.responseJSON) {
            data = data.responseJSON;
        }

        var level = 'error';
        var message = data.message;
        var errors = data.errors;
    } else {
        level = data.level;
        message = data.message;
    }
    var action_buttons = undefined;
    var buttons = [];
    if (undefined !== data.action_buttons) {
        action_buttons = data.action_buttons;
    }
    if (undefined !== action_buttons) {
        message += "<br>";
        console.log(action_buttons);
        $.each(action_buttons, function (key, val) {

            message += '<div class="d-inline-block">' + '<a class="button primary" href="' + val + '">' + key + '</a>' + '</div>';

        });
    }
    if (undefined !== errors) {
        message += "<br>";
        $.each(errors, function (key, val) {
            message += val + "<br>";
        });
    }
    if (undefined === level && undefined === message) {
        level = 'error';
        message = 'Something went wrong!!';
    }

    if (level === 'error') {
        level = 'Error';
    }

    if (level === 'success') {
        level = 'Success';
    }


    $('body').xmalert({
        x: 'right',
        y: 'bottom',
        xOffset: 20,
        yOffset: 20,
        alertSpacing: 50,
        lifetime: 6000,
        fadeDelay: 0.3,
        template: 'message' + level,
        title: message,
        buttonSrc: buttons
    });
}

function toggleWishListProduct(response) {

    let $wishlist_item = $('*[data-wishlist_product_hashed_id="' + response.hashed_id + '"]');

    if (response.action == "add") {
        $wishlist_item.addClass('active');
    } else {
        $wishlist_item.removeClass('active');
    }
}






