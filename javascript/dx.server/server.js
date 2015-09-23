module.exports = function(app, callBack) {
	app.log('Server Started!');

	app.use(require('cors')());
	// app.use(express.static(__dirname));
	// app.use(bodyParser.urlencoded({
	// 	extended: true
	// }));

	// app.enable('trust proxy');
	// app.set('etag', function(body, encoding) {
	// 	return generateHash(body, encoding); // consider the function is defined
	// })
	//
	app.all('/favicon.ico', function(request, response) {
		response.set({
			'Location': 'http://cdn.diepxuan.vn/images/favicons/favicon.ico'
		});
		response.end();
	});
	callBack();
};

// module.exports = {
// 	start: function() {

// 		app.listen(8888);
// 		this.ini(app);
// 		app.log('Server Started!');
// 	},
// 	ini: function(app) {
// 		var cors = require('cors');

// 		app.use(cors());
// 		// app.use(express.static(__dirname));
// 		// app.use(bodyParser.urlencoded({
// 		// 	extended: true
// 		// }));

// 		// app.enable('trust proxy');
// 		// app.set('etag', function(body, encoding) {
// 		// 	return generateHash(body, encoding); // consider the function is defined
// 		// })
// 		//
// 		app.all('/favicon.ico', function(request, response) {
// 			response.set({
// 				'Location': 'http://cdn.diepxuan.vn/images/favicons/favicon.ico'
// 			});
// 			response.end();
// 		});
// 	}
// };
