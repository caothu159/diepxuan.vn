var app = require('express')();
app.listen(8888);

app.log = require('./log');


// var firstfunction = function(myCallback) {
// 	var dbSuccessCallback = function(returedData) {
// 		// the asynchronous call has retured successfully with data

// 		myCallback(returnedData);
// 	};
// 	callDatabase("SELECT a FROM b", dbSuccessCallback);
// };
// firstfunction(secondfunction);

require('./server')(app, function() {
	require('./database')(app, require('./router'));
	// require('./router')(app, db);
});



// db();
// app.log(JSON.stringify(db));
// console.log(db);


// var router = require('./router');
// var database = require('./database');


// connection = database.createConnection({
// 	host: "diepxuan.vn",
// 	user: "root",
// 	password: "877611",
// 	database: 'diepxuan_vn'
// });



// ini.start(app, cors);
// router.start(app, connection);
// error.start(app);
