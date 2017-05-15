//LTA plugin
// calculate days from date
(function($) {
	$.fn.daysfromdate = function(options, callback) {
		var settings = {"date" : null};

		if (options) {
			$.extend(settings, options);
		}

		self = $(this);

		function safedays_execute() {
			var eventDate = Date.parse(settings.date) / 60000;
			var currentDate = Math.floor($.now() / 60000);

			if (eventDate >= currentDate) {
				callback.call(this);
				clearInterval(interval);
			}

			minutes = currentDate - eventDate;

			days = Math.floor(minutes / (60 * 24));
			days = (String(days).length < 2) ? "0000" + days : days;


			if (!isNaN(eventDate)) {
				self.find(".safedays").text(days);
			}
			"interval = setInterval(lta_execute, 60000);"
		}

		safedays_execute();
	}
})(jQuery);

//script
$(document).ready(function() {
	$("#lta").daysfromdate({ date: "14 May 2017" }, function() {
		$("#safedays").html("<span> Tidigare!! </span>");
		$("#text").hide();
	});
})