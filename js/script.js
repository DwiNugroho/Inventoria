var table;
$(document).ready(function () {
	$('.data').DataTable({
		"pagingType": "simple_numbers",
		"language": {
			"lengthMenu": "Show _MENU_",
			"zeroRecords": "Nothing found - sorry",
			"infoEmpty": "No records available",
			"infoFiltered": "(filtered from _MAX_ total records)",
		}
	});

	$(window).scroll(function () {
		if ($(document).scrollTop() >= 100) {
			$('.navbar-landing').css('background-color', 'white');
		} else {
			$('.navbar-landing').css('background-color', 'transparent');
		}
	});


	$("#btn-sidebar").on("click", function () {
		$("#sidebar").toggleClass("active");
		$(".hide").toggleClass("display-none");
	})

	$(".btn-shape").hover(function () {
		$(".shape1,.shape2,.shape3").css("width", "25px");
	}, function () {
		$(".shape1").css("width", "15px");
		$(".shape2").css("width", "25px");
		$(".shape3").css("width", "20px");

	});

	$(".chosen-select").chosen({
		no_results_text: "Oops, nothing found!",
		width: "100%",
	});

	$(".chosen-select").chosen().change(function () {
		var id = $('.chosen-select').val();
		if (id != '') {
			$.ajax({
				url: "../Barang/getJumlahBarang",
				method: "POST",
				data: {
					id: id
				},
				success: function (data) {
					$('.jumlah_barang').html(data);
				}
			})
		}
	});

	// Add smooth scrolling to all links
	$("a").on('click', function (event) {

		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
			// Prevent default anchor click behavior
			event.preventDefault();

			// Store hash
			var hash = this.hash;

			// Using jQuery's animate() method to add smooth page scroll
			// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 800, function () {

				// Add hash (#) to URL when done scrolling (default click behavior)
				window.location.hash = hash;
			});
		} // End if
	});

});
