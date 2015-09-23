module.exports = function(app, db) {
	app.log();
	app.get('/tables', function(request, response) {
		var start = +new Date();
		response.json(db.table);
		app.log("execution in " + (new Date() - start) + " milliseconds");
	});

	app.get('/:table', function(request, response) {
		var start = +new Date();
		db.find(request.params.table, function(data) {
			response.json(data);
			app.log("execution in " + (new Date() - start) + " milliseconds");
		});
	});

	app.get('/:table/:id', function(request, response) {
		db.query('SELECT * FROM ' + request.params.table, function(err, rows, fields) {
			if (err) throw err;
			response.json(rows);
		});
	});
	app.post('/:table', function(request, response) {

	});

	app.put('/:table/:id', function(request, response) {

	});

	app.delete('/:table/:id', function(request, response) {

	});

	app.all('/', function(request, response) {
		var options = {
			root: __dirname + '/',
			headers: {
				'content-type': 'text/html',
				'x-timestamp': Date.now(),
				'x-sent': true
			}
		};
		response.sendFile('index.html', options, function(err) {
			if (err) {
				console.log(err);
				response.status(err.status).end();
			}
		});
	});

	app.all('*', function(request, response) {
		response.sendStatus(404).end();
	});
};
