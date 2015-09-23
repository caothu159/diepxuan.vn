var app = {
	server: function(arg) {
		return "http://admin.diepxuan.vn/" + arg;
	},
	start: function() {
		menu();
	}
};
var menu = function() {
	$('body').append('<div class="cats"></div>');
	$('.cats').append('<a href="/"><img src="http://cdn.diepxuan.vn/images/logo/logo.png" alt="DiepXuan.vn" width="200" height="50"></a>');
	$.ajax({
		method: "GET",
		url: app.server('tables'),
		data: {}
	}).done(function(tables) {
		// console.log(tables);
		$.each(tables, function(key, table) {
			var name = table.TABLE_NAME;
			$('.cats').append('<a id="' + name + '">' + name + '</a>');
		});
		$('.cats a[id]').click(function() {
			$('.cats a[id]').removeClass('selected');
			$(this).addClass('selected');
			table($(this).attr('id'));
		}).first().click();
	});
};
var table = function(id) {
	$('body table').remove();
	$.ajax({
		method: "GET",
		url: app.server(id),
		data: {}
	}).done(function(rows) {
		if (!rows || rows.length <= 0) return;
		$('body table').remove();
		$('body').append('<table border="1"></table>');
		$('body table').append('<tr><th></th></tr>');
		$.each(rows[0], function(key, field) {
			$('body table tr').append('<th>' + key + '</th>');
		});
		$(rows).each(function(index, row) {
			$('body table').append('<tr><td></td></tr>');
			$.each(row, function(key, field) {
				$('body table tr').last().append('<td>' + field + '</td>');
			});
		});
	});
};

$(function() {
	app.start();
});
