module.exports = function(msg) {
	if (!msg) msg = 'code run to here';
	var months = [
		"Jan", "Feb", "Mar",
		"Apr", "May", "Jun", "Jul",
		"Aug", "Sep", "Oct",
		"Nov", "Dec"
	];

	function pad(num, size) {
		var s = "000000000" + num;
		return s.substr(s.length - size);
	}
	var d = new Date();
	var month = months[d.getMonth()];
	var day = d.getDate();
	var hours = pad(d.getHours(), 2);
	var min = pad(d.getMinutes(), 2);
	var sec = pad(d.getSeconds(), 2);
	var logTime = day + ' ' + month + ' ' + hours + ':' + min + ':' + sec;

	console.log(logTime + ' - ' + msg);
};
