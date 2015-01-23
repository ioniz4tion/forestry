$(document).ready(function() {

	var $width = $(window).width(),
		$height = $(window).height(),
        $nav = $('nav'),
		$showLeft = $('#showLeft'),
		$arrow = $('.lines:before, .lines:after'),
		showLeftBool = false,
        $headerImg = $('header img'),
        $headerText = $('header p');

	var showLeftSlide = function() {

        var showLeftHeight = $showLeft.height() + 10;

		if (showLeftBool == false) {

			$showLeft.css({
				'bottom' : $height - showLeftHeight + 'px'
			});

			/*$arrow.css({
				'-ms-transform'     : 'rotate(180deg)',
				'-moz-transform'    : 'rotate(180deg)',
				'-webkit-transform' : 'rotate(180deg)',
				'-o-transform'      : 'rotate(180deg)'
			});*/

			showLeftBool = true;

		} else {

			$showLeft.css({
				'bottom' : '0'
			});

			/*$arrow.css({
				'-ms-transform'     : 'rotate(0deg)',
				'-moz-transform'    : 'rotate(0deg)',
				'-webkit-transform' : 'rotate(0deg)',
				'-o-transform'      : 'rotate(0deg)'
			});*/

			showLeftBool = false;

		};


	};

    var setNavHeight = function() {

        var navHeight = $height - 35;

        $nav.css({
            'height' : navHeight + 'px'
        });
    };

    var headerScale = function() {

        var imgWidth,
            fontSize;
        $width = $(window).width();

        if ($width < 1356) {
            imgWidth = $width * 0.12;
            fontSize = $width * 0.06;

            $headerImg.css({
                'width' : imgWidth + 'px'
            });

            $headerText.css({
                'font-size' : fontSize + 'px'
            });

            console.log(imgWidth, fontSize);
        };

    };

    $showLeft.click(function() {
        showLeftSlide();
    });

    $(window).resize(function() {
        //setNavHeight();
        headerScale();
    });

    //setNavHeight();
    headerScale();

    var hashTagActive = "";
    $(".scroll").click(function (event) {
        
        if ($(window).width() >= 844) {
            var offsetTop = 30;
        } else {
            var offsetTop = 20;
        };

        if (hashTagActive != this.hash) { //this will prevent if the user click several times the same link to freeze the scroll.
            event.preventDefault();
            //calculate destination place
            var dest = 0;
            if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
                dest = $(document).height() - $(window).height() - offsetTop;
            } else {
                dest = $(this.hash).offset().top - offsetTop;
            }
            //go to destination
            $('html,body').animate({
                scrollTop: dest
            }, 500, 'swing');
            hashTagActive = this.hash;
        }
    });

});