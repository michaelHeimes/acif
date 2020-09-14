/*
Scripts to run BEFORE Foundation
*/
jQuery(document).ready(function($) {	
	
// 	Add smoothScroll to links with hashes
	$('li a[href*="#"]').attr('data-smooth-scroll','').attr('data-animation-easing','swing').attr('data-offset','-24');
	
// 	Init Foundation
	$(document).foundation();
		
});



/*
These functions make sure WordPress
and Foundation play nice together.
*/

jQuery(document).ready(function() {
	
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
}); 


/*
Custom Functions
*/
jQuery(document).ready(function($) {

// 	Shares Dropdown Filter
    $('.share-select-dropdown div').click(function() {

        var shareclass = $(this).data("shareclass");
        performanceShareClass = shareclass;

        var quarterly = "https://resourcerealestate.alpsinc.com/funddistribution-quarterly/" + shareclass;
        var daily = "https://resourcerealestate.alpsinc.com/funddistribution-daily/" + shareclass;
        var nav = "https://resourcerealestate.alpsinc.com/nav-daily/" + shareclass;
            
        // var topten = "http://marketing.alpsinc.com/cssecure.alpsinc.com/resourcerealestate/holdings-daily/" + shareclass;
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
	    console.log("loaded");
        $(".share-select-dropdown").slideToggle();
    });
    
    $(document).on('click', '.share-select-dropdown .option', function() {
        $(".share-select-dropdown").hide();
        $('.select-box span').text($(this).text());
    });
    
    
//  Disclaimer Reveal
	$(document).on('click', '.disclaimer a', function(e){
		e.preventDefault();
		console.log("loaded");
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
		active: false
	});




});