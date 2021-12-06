$( document ).ajaxStart(function() {
	document.getElementById("loading-wrapper").style.display = "block";
});
$( document ).ajaxStop(function() {
	document.getElementById("loading-wrapper").style.display = "none";
});


$( document ).ready(function() {
	document.getElementById("loading-wrapper").style.display = "none";
})


// DATERANGEPICKER
// INCLUDE JQUERY & JQUERY UI 1.12.1
$( function() {
	$( "#datepicker" ).datepicker();
} );

// DATERANGE PICKER CONTROL
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('.reportrange span').html(start.format('YYYY-MM-DD h:mm') + ' - ' + end.format('YYYY-MM-DD h:mm'));
		$(".reportrange #start_date").val(start.format('YYYY-MM-DD h:mm'))
		$(".reportrange #end_date").val(end.format('YYYY-MM-DD h:mm'))
    }

    $('.reportrange').daterangepicker({
        startDate: start,
        endDate: end,
		timePicker: true,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
// END DATE RANGEPICKER



// NOTIFICATION ACTION
'use strict';

var Notify = (function() {

	// Variables

	var $notifyBtn = $('[data-toggle="notify2"]');

	// Events

	if ($notifyBtn.length) {
		$notifyBtn.on('click', function(e) {
			e.preventDefault();

			var placement = $(this).attr('data-placement');
			var align = $(this).attr('data-align');
			var icon = $(this).attr('data-icon');
			var type = $(this).attr('data-type');
			var animIn = $(this).attr('data-animation-in');
			var animOut = $(this).attr('data-animation-out');
			var message = $(this).attr('data-message');
			notify(message, type, placement, align, icon, animIn, animOut);
		})
	}

})();

// Methods
function notify(message, type = 'success', placement = 'top', align = 'right', title = 'Notifikasi',  icon = 'ni ni-bell-55', animIn = '', animOut = '') {
	$.notify({
		icon: icon,
		title: title,
		message: message,
		url: ''
	}, {
		element: 'body',
		type: type,
		allow_dismiss: true,
		placement: {
			from: placement,
			align: align
		},
		offset: {
			x: 15, // Keep this as default
			y: 15 // Unless there'll be alignment issues as this value is targeted in CSS
		},
		spacing: 10,
		z_index: 1080,
		delay: 2500,
		timer: 5,
		url_target: '_blank',
		mouse_over: false,
		animate: {
			// enter: animIn,
			// exit: animOut
			enter: animIn,
			exit: animOut
		},
		template: '<div data-notify="container" class="alert alert-dismissible alert-{0} alert-notify" role="alert">' +
			'<span class="alert-icon" data-notify="icon"></span> ' +
			'<div class="alert-text"</div> ' +
			'<span class="alert-title" data-notify="title">{1}</span> ' +
			'<span data-notify="message">{2}</span>' +
			'</div>' +
			
			'<button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
			'</div>'
	});
}

function convertDate(date){
	var monthNames = [
		"Jan", "Feb", "Mar",
		"Apr", "May", "Jun", "Jul",
		"August", "Sept", "Oct",
		"Nov", "Dec"
	];
	var d = new Date(date);
	var day = d.getDate();
	var monthIndex = d.getMonth();
	var year = d.getFullYear();
	
	return day + ' ' + monthNames[monthIndex] + ' ' + year;
}


// PROGRESS FORM 
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})
