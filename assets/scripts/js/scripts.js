// 	Init Foundation
	jQuery(document).foundation();	

/*
These functions make sure WordPress
and Foundation play nice together.
*/
	
	// Remove empty P tags created by WP inside of Accordion and Orbit
	jQuery('.accordion p:empty, .orbit p:empty').remove();

	// Adds Flex Video to YouTube and Vimeo Embeds
	jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {
		if ( jQuery(this).innerWidth() / jQuery(this).innerHeight() > 1.5 ) {
		  jQuery(this).wrap("<div class='widescreen responsive-embed'/>");
		} else {
		  jQuery(this).wrap("<div class='responsive-embed'/>");
		}
	});

/*
Custom Functions
*/

jQuery(document).ready(function($) {	
	
// 	Add smoothScroll to links with hashes
// 	$('a[href*="#"]').attr('data-smooth-scroll','').attr('data-animation-easing','swing').attr('data-offset','-24');

// 	$('.banner a.view-more-link').attr('data-smooth-scroll','').attr('data-animation-easing','swing').attr('data-offset','-24');



// Smooth Scroll Anchor Links
	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  	.not('[href="#"]')
	  	.not('[href="#0"]')
	  	.click(function(event) {
	    // On-page links
	    if (
	      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	      && 
	      location.hostname == this.hostname
	    ) {
	      // Figure out element to scroll to
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      // Does a scroll target exist?
	      if (target.length) {
	        // Only prevent default if animation is actually gonna happen
	        event.preventDefault();
	        $('html, body').animate({
	          scrollTop: target.offset().top - 62
	        }, 800, function() {

	          var $target = $(target);

	        });
	      }
	    }
	});
		

// 	Remove active class from main nav anchor links
	var menu_items_links = $("#main-nav li a");
	menu_items_links.each(function () {
		if ($(this).is('[href*="#"]')) {
			$(this).parent().removeClass('active');
			$(this).click(function () {
				var current_index = $(this).parent().index(),
					parent_element = $(this).closest('ul');
				parent_element.find('li').not(':eq(' + current_index + ')').removeClass('active');
				$(this).parent().addClass('active');
			})
		}
	});



	
// 	Sticky NAV BG change
	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();
	
	    if (scroll >= 10) {
	        $(".sticky-nav").addClass("dark-bg");
	    } else {
	        $(".sticky-nav").removeClass("dark-bg");
	    }
	});


// 	Shares Dropdown Filter

	function filterInit() {

		var initialclass = $('.share-select-dropdown div:first-child()').data("shareclass");

        var quarterly = "https://resourcerealestate.alpsinc.com/funddistribution-quarterly/" + initialclass;
        var daily = "https://resourcerealestate.alpsinc.com/funddistribution-daily/" + initialclass;
        var nav = "https://resourcerealestate.alpsinc.com/nav-daily/" + initialclass;
        
        $('#daily-nav').attr("src", nav);
        $('#quarterly-fund').attr("src", quarterly);
        $('#daily-fund').attr("src", daily);
        
        var performance = "https://resourcerealestate.alpsinc.com/performance/" + initialclass;
        var nav = "https://resourcerealestate.alpsinc.com/historical-nav/" + initialclass;
        var dist = "https://resourcerealestate.alpsinc.com/dividend/" + initialclass;

        $('#performance-frame iframe').attr("src", performance);
        $('#historical-nav-frame iframe').attr("src", nav);
        $('#distribution-frame iframe').attr("src", dist);
	
	}
	filterInit();

    $('.share-select-dropdown div').click(function() {

        var shareclass = $(this).data("shareclass");
        performanceShareClass = shareclass;

        var quarterly = "https://resourcerealestate.alpsinc.com/funddistribution-quarterly/" + shareclass;
        var daily = "https://resourcerealestate.alpsinc.com/funddistribution-daily/" + shareclass;
        var nav = "https://resourcerealestate.alpsinc.com/nav-daily/" + shareclass;
            
        // var topten = "https://marketing.alpsinc.com/cssecure.alpsinc.com/resourcerealestate/holdings-daily/" + shareclass;
        $('#daily-nav').attr("src", nav);
        $('#quarterly-fund').attr("src", quarterly);
        $('#daily-fund').attr("src", daily);


        var performance = "https://resourcerealestate.alpsinc.com/performance/" + shareclass;
        var nav = "https://resourcerealestate.alpsinc.com/historical-nav/" + shareclass;
        var dist = "https://resourcerealestate.alpsinc.com/dividend/" + shareclass;

        $('#performance-frame iframe').attr("src", performance);
        $('#historical-nav-frame iframe').attr("src", nav);
        $('#distribution-frame iframe').attr("src", dist);


    })
    
    
    $(document).on('click', '.select-box', function() {
        $(".share-select-dropdown").slideToggle();
    });
    
    $(document).on('click', '.share-select-dropdown .option', function() {
        $(".share-select-dropdown").hide();
        $('.select-box span').text($(this).text());
    });
    
    
//  Disclaimer Reveal
	$(document).on('click', '.disclaimer a', function(e){
		e.preventDefault();
		$(this).fadeOut();
		$('.disclosure .inner').slideDown(400);
	});



// 	Historical Nav Date Picker
    var startDate = 'inception';
    var endDate = 'today'
    var performanceShareClass = 'RCIAX'

    if ($('.start-date').length > 0) {
        var dateFormat = "mm/dd/yy",

            from = $(".start-date input")
            .datepicker({
                defaultDate: "-1w",
                changeMonth: true,

                changeYear: true,
                numberOfMonths: 1,
                maxDate: "0",
                onClose: function() {
                    $('#mobile-form-popout').fadeIn();

                },
                beforeShow: function(input) {
                    $('#mobile-form-popout').fadeOut();
                    setTimeout(function() {


                        $(".end-date input").click(function() {
                            $('#ui-datepicker-div').show();

                        })
                        var headerPane = $(input)
                            .datepicker("widget")
                            .find(".ui-datepicker-header");
                        $("<button>", {
                            text: "Close",
                            click: function() {

                                $('#ui-datepicker-div').hide();

                            }
                        }).appendTo(headerPane);
                    }, 1);
                },
                onSelect: function(dateText) {

                    startDate = $.datepicker.formatDate('yymmdd', getDate(this))
                    to.datepicker("option", "minDate", getDate(this));
                        navDateUrl = "https://resourcerealestate.alpsinc.com/historical-nav/" + performanceShareClass + "/" + startDate + '-' + endDate;


                        navDateUrl = "https://resourcerealestate.alpsinc.com/historical-nav/" + performanceShareClass + "/" + startDate + '-' + endDate;


                    $('#historical-nav-frame iframe').attr("src", navDateUrl);
                    if (endDate == "today") {
                        $(".end-date input").val("Today");
                    }
                }
            })
            .on("change", function() {
                // to.datepicker("option", "minDate", getDate(this));
                // console.log(getDate(this))
            }),
            to = $(".end-date input").datepicker({
                defaultDate: "-1w",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1,
                maxDate: "0",
                onClose: function() {
                    $('#mobile-form-popout').fadeIn();

                },
                beforeShow: function(input) {
                    $('#mobile-form-popout').fadeOut();
                    setTimeout(function() {

                        $(".end-date input").click(function() {
                            $('#ui-datepicker-div').show();

                        })
                        var headerPane = $(input)
                            .datepicker("widget")
                            .find(".ui-datepicker-header");
                        $("<button>", {
                            text: "Close",
                            click: function() {

                                $('#ui-datepicker-div').hide();

                            }
                        }).appendTo(headerPane);
                    }, 1);
                },
                onSelect: function(dateText) {
                    from.datepicker("option", "maxDate", getDate(this));
                    // console.log($(".start-date input").val());
                    // if($(".start-date input").val() == ""){
                    //   startDate = "inception";
                    // }
                    endDate = $.datepicker.formatDate('yymmdd', getDate(this))
                    
                    navDateUrl = "https://resourcerealestate.alpsinc.com/historical-nav/" + performanceShareClass + "/" + startDate + '-' + endDate;

                    $('#historical-nav-frame iframe').attr("src", navDateUrl);
                    if (startDate == "inception") {
                        $(".start-date input").val("Inception");
                    }
                }
            })
            .on("change", function() {
                // from.datepicker( "option", "maxDate", getDate( this ) );
            });

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }

    }


// 	Funds Accordion
	$( ".accordion" ).accordion({
		collapsible: true, 
		active: false,
		heightStyle: "content"
	});




});