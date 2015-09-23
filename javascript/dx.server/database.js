module.exports = function(app, callBack) {
	var mysql = require("mysql");
	var db = {
		connection: mysql.createConnection({
			host: "diepxuan.vn",
			user: "root",
			password: "877611",
			database: 'diepxuan_vn'
		})
	};
	db.connection.connect(function(err) {
		if (err) {
			app.log('Error connecting to Db');
			return;
		}
		app.log('Connection established');
		db.connection.query('SELECT DISTINCT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE TABLE_SCHEMA=\'' + db.connection.config.database + '\'', function(err, rows, fields) {
			if (err) throw err;
			db.table = rows;
			// rows.forEach(function(element, index, array) {
			// 	db.table[index] = element.TABLE_NAME;
			// });
			db.find = function(tableName, findCallBack) {
				db.connection.query('SELECT * FROM ' + tableName, function(err, rows, fields) {
					if (err) throw err;
					findCallBack(rows);
				});
			};
			callBack(app, db);
		});
	});
	// db.prototype.__noSuchMethod__ = function(name, args) {
	// 	console.log("method %s does not exist", name);
	// };
	// db.tables=function(){};
	// db.getTable = function() {
	// 	connection.query('SELECT DISTINCT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE TABLE_SCHEMA=\'' + connection.config.database + '\'', function(err, rows, fields) {
	// 		if (err) throw err;
	// 		// response.json(rows);
	// 		return rows;
	// 	});
	// };
	// db.getColumns = function(tableName) {
	// 	connection.query('SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`=\'' + connection.config.database + '\'AND `TABLE_NAME`=\'' + tableName + '\'', function(err, rows, fields) {
	// 		if (err) throw err;
	// 		response.json(rows);
	// 	});
	// };
	// return db;
};
