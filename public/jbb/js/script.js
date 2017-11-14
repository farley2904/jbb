function include(scriptUrl) {
    document.write('<script src="' + scriptUrl + '"></script>');//async
}

function lazyInit(element, func) {
    var $win = jQuery(window),
        wh = $win.height();
    $win.on('load scroll', function() {
        var st = $(this).scrollTop();
        if (!element.hasClass('lazy-loaded')) {
            var et = element.offset().top,
                eb = element.offset().top + element.outerHeight();
            if (st + wh > et - 100 && st < eb + 100) {
                func.call();
                element.addClass('lazy-loaded');
            }
        }
    });
}

function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
};;
(function($) {
    $(document).ready(function() {
        $("#copyright-year").text((new Date).getFullYear());
    });
})(jQuery);;
(function($) {
    if (isIE() && isIE() < 11) {
        $('html').addClass('lt-ie11');
        $(document).ready(function() {
            PointerEventsPolyfill.initialize({});
        });
    }
    if (isIE() && isIE() < 10) {
        $('html').addClass('lt-ie10');
    }
})(jQuery);;
(function($) {
    var o = $('html');
    if (o.hasClass('desktop') && o.hasClass("wow-animation") && $(".wow").length) {
        $(document).ready(function() {
            new WOW().init();
        });
    }
})(jQuery);;
(function($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
        $(document).ready(function() {
            $().UItoTop({
                easingType: 'easeOutQuart',
                containerClass: 'ui-to-top fa fa-angle-up'
            });
        });
    }
})(jQuery);;
(function($) {
    var o = $('.responsive-tabs');
    if (o.length > 0) {
        $(document).ready(function() {
            o.each(function() {
                var $this = $(this);
                $this.easyResponsiveTabs({
                    type: $this.attr("data-type") === "accordion" ? "accordion" : "default"
                });
            })
        });
    }
})(jQuery);;


(function($) {
    var o = $('.rd-mailform');
    if (o.length > 0) {
        $(document).ready(function() {
            var o = $('.rd-mailform');
            if (o.length) {
                o.rdMailForm({
                    validator: {
                        'constraints': {
                            '@LettersOnly': {
                                message: 'Please use only letters.'
                            },
                            '@NumbersOnly': {
                                message: 'Please use only numbers.'
                            },
                            '@NotEmpty': {
                                message: 'This field should not be empty.'
                            },
                            '@Email': {
                                message: 'Enter valid e-mail address.'
                            },
                            '@Phone': {
                                message: 'Enter valid phone number.'
                            },
                            '@Date': {
                                message: 'Use MM/DD/YYYY format.'
                            },
                            '@SelectRequired': {
                                message: 'Please choose an option.'
                            }
                        }
                    }
                }, {
                    'MF001': 'Sent',
                    'MF001': 'Recipients are not set.',
                    'MF002': 'Form will not work locally.',
                    'MF003': 'Please define email field in your form.',
                    'MF004': 'Please define the type of your form.',
                    'MF254': 'Something went wrong with PHPMailer.',
                    'MF255': 'There was an error submitting the form.'
                });
            }
        });
    }
})(jQuery);;


(function($) {
    var o = $('#google-map');
    if (o.length) {
        include('//maps.google.com/maps/api/js?key=AIzaSyBDBBpF5aaZY4xf67ZLrGHo2yEYu6m9xlo');
        $(document).ready(function() {
            var head = document.getElementsByTagName('head')[0],
                insertBefore = head.insertBefore;
            head.insertBefore = function(newElement, referenceElement) {
                if (newElement.href && newElement.href.indexOf('//fonts.googleapis.com/css?family=Roboto') != -1 || newElement.innerHTML.indexOf('gm-style') != -1) {
                    return;
                }
                insertBefore.call(head, newElement, referenceElement);
            };
            lazyInit(o, function() {
                o.googleMap({
                    styles: [{
                        "featureType": "landscape",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": 65
                        }, {
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "poi",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": 51
                        }, {
                            "visibility": "simplified"
                        }]
                    }, {
                        "featureType": "road.highway",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "visibility": "simplified"
                        }]
                    }, {
                        "featureType": "road.arterial",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": 30
                        }, {
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "road.local",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": 40
                        }, {
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "transit",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "visibility": "simplified"
                        }]
                    }, {
                        "featureType": "administrative.province",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "water",
                        "elementType": "labels",
                        "stylers": [{
                            "visibility": "on"
                        }, {
                            "lightness": -25
                        }, {
                            "saturation": -100
                        }]
                    }, {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                            "hue": "#ffff00"
                        }, {
                            "lightness": -25
                        }, {
                            "saturation": -97
                        }]
                    }]
                });
            });
        });
    }
})(jQuery);;
(function($) {
    var o = $('.rd-navbar');
    if (o.length > 0) {
        $(document).ready(function() {
            o.RDNavbar({
                stuckWidth: 768,
                stuckMorph: true,
                stuckLayout: "rd-navbar-static",
                responsive: {
                    0: {
                        layout: 'rd-navbar-fixed',
                        focusOnHover: false
                    },
                    768: {
                        layout: 'rd-navbar-fullwidth'
                    },
                    1200: {
                        layout: o.attr("data-rd-navbar-lg").split(" ")[0],
                    }
                },
                onepage: {
                    enable: false,
                    offset: 0,
                    speed: 400
                }
            });
        });
    }
})(jQuery);;
(function($) {
    var o = $('.rd-parallax');
    if (o.length) {
        $(document).ready(function() {
            o.each(function() {
                $(this).RDParallax({
                    direction: ($('html').hasClass("smoothscroll") || $('html').hasClass("smoothscroll-all")) && !isIE() ? "normal" : "inverse"
                });
            });
        });
    }
})(jQuery);;
(function($) {
    var o = $('.rd-navbar-search');
    if (o.length) {
        $(document).ready(function() {
            o.RDSearch({});
        });
    }
})(jQuery);;
(function($) {
    var o = $('[data-lightbox]').not('[data-lightbox="gallery"] [data-lightbox]'),
        g = $('[data-lightbox^="gallery"]');
    if (o.length > 0 || g.length > 0) {
        $(document).ready(function() {
            if (o.length) {
                o.each(function() {
                    var $this = $(this);
                    $this.magnificPopup({
                        type: $this.attr("data-lightbox")
                    });
                })
            }
            if (g.length) {
                g.each(function() {
                    var $gallery = $(this);
                    $gallery.find('[data-lightbox]').each(function() {
                        var $item = $(this);
                        $item.addClass("mfp-" + $item.attr("data-lightbox"));
                    }).end().magnificPopup({
                        delegate: '[data-lightbox]',
                        type: "image",
                        gallery: {
                            enabled: true
                        }
                    });
                })
            }
        });
    }
})(jQuery);;
(function($) {
    var widths = [1200, 992, 768];

    function getCorrectDimensions(values, screenSize) {
        var size = undefined;
        for (var i = 0; i < values.length; i++) {
            if (values[ i] >= screenSize) {
                size = values[ i];
            }
        }
        if (!size) {
            size = values[0];
        }
        return size;
    }
    var o = $('[data-srcset]');
    if (o.length > 0) {
        $(document).ready(function() {
            if (o.length) {
                o.each(function() {
                    function testWidths() {
                        var img = $(this);
                        srcW = getCorrectDimensions(widths, $(window).width() * window.devicePixelRatio);
                        var src = "images/" + srcW + "x200/800"
                        img.each(function() {
                            equal(img.attr('src'), src, "Width fits (" + $(window).width() + ")");
                        });
                    }
                })
            }
        });
    }
})(jQuery);