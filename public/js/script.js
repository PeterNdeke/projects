$(window).on("load", function() {
    "use strict";

    //  ============= POST PROJECT POPUP FUNCTION =========

    $(".post_project").on("click", function() {
        $(".post-popup.pst-pj").addClass("active");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".post-project > a").on("click", function() {
        $(".post-popup.pst-pj").removeClass("active");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    // google map - start

    // --------------------------------------------------

    function isMobile() {
        return "ontouchstart" in document.documentElement;
    }

    function init_gmap() {
        if (typeof google == "undefined") return;

        var options = {
            zoom: 14,

            center: [40.725062, -74.0012177],

            styles: [
                { elementType: "geometry", stylers: [{ color: "#e0dad2" }] },

                {
                    elementType: "labels.text.stroke",
                    stylers: [{ color: "#ffffff" }]
                },

                {
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#3f362b" }]
                },

                {
                    featureType: "administrative.locality",

                    elementType: "labels.text.fill",

                    stylers: [{ color: "#383026" }]
                },

                {
                    featureType: "poi",

                    elementType: "labels.text.fill",

                    stylers: [{ color: "#645644" }]
                },

                {
                    featureType: "poi.park",

                    elementType: "geometry",

                    stylers: [{ color: "#bbafa1" }]
                },

                {
                    featureType: "poi.park",

                    elementType: "labels.text.fill",

                    stylers: [{ color: "#645644" }]
                },

                {
                    featureType: "road",

                    elementType: "geometry",

                    stylers: [{ color: "#d6cdc2" }]
                },

                {
                    featureType: "road",

                    elementType: "geometry.stroke",

                    stylers: [{ color: "#d6cdc2" }]
                },

                {
                    featureType: "road",

                    elementType: "labels.text.fill",

                    stylers: [{ color: "#645644" }]
                },

                {
                    featureType: "road.highway",

                    elementType: "geometry",

                    stylers: [{ color: "#ffffff" }]
                },

                {
                    featureType: "road.highway",

                    elementType: "geometry.stroke",

                    stylers: [{ color: "#ffffff" }]
                },

                {
                    featureType: "road.highway",

                    elementType: "labels.text.fill",

                    stylers: [{ color: "#3f362b" }]
                },

                {
                    featureType: "transit",

                    elementType: "geometry",

                    stylers: [{ color: "#eaeaea" }]
                },

                {
                    featureType: "transit.station",

                    elementType: "labels.text.fill",

                    stylers: [{ color: "#d00000" }]
                },

                {
                    featureType: "water",

                    elementType: "geometry",

                    stylers: [{ color: "#a3ccff" }]
                },

                {
                    featureType: "water",

                    elementType: "labels.text.fill",

                    stylers: [{ color: "#515c6d" }]
                },

                {
                    featureType: "water",

                    elementType: "labels.text.stroke",

                    stylers: [{ color: "#17263c" }]
                }
            ],

            mapTypeControl: true,

            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },

            navigationControl: true,

            scrollwheel: false,

            streetViewControl: true
        };

        if (isMobile()) {
            options.draggable = false;
        }

        $("#google-map").gmap3({
            map: {
                options: options
            },

            marker: {
                latLng: [40.725062, -74.0012177],

                options: { icon: "images/map-mark.png" }
            }
        });
    }

    init_gmap();

    // google map - end

    // --------------------------------------------------

    //  ============= POST JOB POPUP FUNCTION =========

    $("#create_group").on("click", function() {
        $(".post-popup.group_post").addClass("active");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".post-project > a").on("click", function() {
        $(".post-popup.group_post").removeClass("active");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    $(".imgAdd").click(function() {
        $(this)
            .closest(".row")
            .find(".imgAdd")
            .before(
                '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
            );
    });
    $(document).on("click", "i.del", function() {
        $(this)
            .parent()
            .remove();
    });
    $(function() {
        $(document).on("change", ".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) {
                // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() {
                    // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile
                        .closest(".imgUp")
                        .find(".imagePreview")
                        .css("background-image", "url(" + this.result + ")");
                };
            }
        });
    });

    //  ============= SIGNIN CONTROL FUNCTION =========

    $(".sign-control li").on("click", function() {
        var tab_id = $(this).attr("data-tab");
        $(".sign-control li").removeClass("current");
        $(".sign_in_sec").removeClass("current");
        $(this).addClass("current animated fadeIn");
        $("#" + tab_id).addClass("current animated fadeIn");
        return false;
    });

    //  ============= SIGNIN TAB FUNCTIONALITY =========

    $(".signup-tab ul li").on("click", function() {
        var tab_id = $(this).attr("data-tab");
        $(".signup-tab ul li").removeClass("current");
        $(".dff-tab").removeClass("current");
        $(this).addClass("current animated fadeIn");
        $("#" + tab_id).addClass("current animated fadeIn");
        return false;
    });

    //  ============= SIGNIN SWITCH TAB FUNCTIONALITY =========

    $(".tab-feed ul li").on("click", function() {
        var tab_id = $(this).attr("data-tab");
        $(".tab-feed ul li").removeClass("active");
        $(".product-feed-tab").removeClass("current");
        $(this).addClass("active animated fadeIn");
        $("#" + tab_id).addClass("current animated fadeIn");
        return false;
    });

    //  ============= COVER GAP FUNCTION =========

    var gap = $(".container").offset().left;
    $(".cover-sec > a, .chatbox-lists").css({
        right: gap
    });

    //  ============= OVERVIEW EDIT FUNCTION =========

    $(".overview-open").on("click", function() {
        $("#overview-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function() {
        $("#overview-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EXPERIENCE EDIT FUNCTION =========

    $(".exp-bx-open").on("click", function() {
        $("#experience-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function() {
        $("#experience-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EDUCATION EDIT FUNCTION =========

    $(".ed-box-open").on("click", function() {
        $("#education-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function() {
        $("#education-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= LOCATION EDIT FUNCTION =========

    $(".lct-box-open").on("click", function() {
        $("#location-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function() {
        $("#location-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= SKILLS EDIT FUNCTION =========

    $(".skills-open").on("click", function() {
        $("#skills-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function() {
        $("#skills-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= ESTABLISH EDIT FUNCTION =========

    $(".esp-bx-open").on("click", function() {
        $("#establish-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function() {
        $("#establish-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= CREATE PORTFOLIO FUNCTION =========

    $(".gallery_pt > a").on("click", function() {
        $("#create-portfolio").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function() {
        $("#create-portfolio").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EMPLOYEE EDIT FUNCTION =========

    $(".emp-open").on("click", function() {
        $("#total-employes").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function() {
        $("#total-employes").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  =============== Ask a Question Popup ============

    $(".ask-question").on("click", function() {
        $("#question-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function() {
        $("#question-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============== ChatBox ==============

    $(".chat-mg").on("click", function() {
        $(this)
            .next(".conversation-box")
            .toggleClass("active");
        return false;
    });
    $(".close-chat").on("click", function() {
        $(".conversation-box").removeClass("active");
        return false;
    });

    //  ================== Edit Options Function =================

    $(".ed-opts-open").on("click", function() {
        $(this)
            .next(".ed-options")
            .toggleClass("active");
        return false;
    });

    // ============== Menu Script =============

    $(".menu-btn > a").on("click", function() {
        $("nav").toggleClass("active");
        return false;
    });

    //  ============ Notifications Open =============

    $(".not-box-open").on("click", function() {
        $(this)
            .next(".notification-box")
            .toggleClass("active");
    });

    // ============= User Account Setting Open ===========

    $(".user-info").on("click", function() {
        $(this)
            .next(".user-account-settingss")
            .toggleClass("active");
    });

    //  ============= FORUM LINKS MOBILE MENU FUNCTION =========

    $(".forum-links-btn > a").on("click", function() {
        $(".forum-links").toggleClass("active");
        return false;
    });
    $("html").on("click", function() {
        $(".forum-links").removeClass("active");
    });
    $(".forum-links-btn > a, .forum-links").on("click", function() {
        e.stopPropagation();
    });

    // init Infinte Scroll
    $(".posts-section").infiniteScroll({
        path: ".pagination__next",
        append: ".posty",
        status: ".scroller-status",
        hideNav: ".pagination"
    });

    // Configure/customize these variables.
    var showChar = 100; // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";

    $(".more").each(function() {
        var content = $(this).html();

        if (content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html =
                c +
                '<span class="moreellipses">' +
                ellipsestext +
                '&nbsp;</span><span class="morecontent"><span>' +
                h +
                '</span>&nbsp;&nbsp;<a href="" class="morelink">' +
                moretext +
                "</a></span>";

            $(this).html(html);
        }
    });

    $(".morelink").click(function() {
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this)
            .parent()
            .prev()
            .toggle();
        $(this)
            .prev()
            .toggle();
        return false;
    });

    //  ============= PORTFOLIO SLIDER FUNCTION =========

    $(".profiles-slider").slick({
        slidesToShow: 3,
        slck: true,
        slidesToScroll: 1,
        prevArrow: '<span class="slick-previous"></span>',
        nextArrow: '<span class="slick-nexti"></span>',
        autoplay: true,
        dots: false,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    //  ============= GROUP SLIDER FUNCTION =========

    $(".groups-slider").slick({
        slidesToShow: 5,
        slck: true,
        slidesToScroll: 1,
        prevArrow: '<span class="slick-previous"></span>',
        nextArrow: '<span class="slick-nexti"></span>',
        autoplay: true,
        dots: false,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});
