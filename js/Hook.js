
$(function () {

    window.loadheight = $('#wrapper').height();

    window.hidden = $("#wrapper").animate("marginTop", "-" + loadheight + "px");

    window.visible = $("#wrapper").animate("marginTop", "0px");

    $("#wrapper").css("marginTop", "-" + loadheight + "px")

});

$(function wrapper() {

    var loadheight = $('#wrapper').height();

    $(window).scroll(function (event) {

        var st = $(window).scrollTop();

        if (st <= 0) {

            $("#wrapper").animate({

                "marginTop": "0px"

            }, 200);

            $("#wrapper").delay(500).slideUp(200, function () {

                window.location.reload()

            })

        }

        if ($.browser.webkit) {

            if (st == 0) {

                $('body').css('overflow', 'hidden')

            }

        }

    })

});