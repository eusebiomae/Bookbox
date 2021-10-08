function numberWithCommas(x, d) {
	if (x) {
		var parts = parseFloat(x).toFixed(d).split(".");
		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");

		return parts.join(",");
	}

	return x;
};


function showPreloader() {
	$('.preloader').removeClass('loaded')

	clearTimeout(showPreloader.timer)
	showPreloader.timer = setTimeout(function() {
		$('.preloader').addClass('loaded')
	}, 15000)
}
showPreloader.timer = null

function hidePreloader() {
	clearTimeout(showPreloader.timer)
	$('.preloader').addClass('loaded')
}
