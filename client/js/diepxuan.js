$(document).ready(function () {
	loadCategories = function () {

		var categories = ["nệm", "chăn", "chiếu"];
		$.each(categories, function (index, value) {
			$(".header").append("<div id=\"cate" + index + "\" class=\"cate\">" + value + "</div>");
		});
	};

	loadProducts = function () {
		var products = ["1", "2", "3", "4", "5", "6", "7"];
		$.each(products, function (index, value) {
			$(".content").append("<div id=\"prod" + index + "\" class=\"prod\"></div>");
			$("#prod" + index).append("<div class=\"image\"></div>");
			$("#prod" + index + " .image").append("<img src=\"/images/logo/full-logo.png\" alt=\"DiepXuan.vn\">");
			$("#prod" + index).append("<div class=\"title\">" + value + "</div>");
			$("#prod" + index).append("<div class=\"desc\"></div>");
		});
	};

	loadPage = function () {
		$(document.body).append("<div class=\"header\"></div>");
		$(document.body).append("<div class=\"content\"></div>");

		$(".header").append("<img src=\"/images/logo/logo.png\" alt=\"DiepXuan.vn\" width=\"200\">");

		loadCategories();
		loadProducts();
	}();
});