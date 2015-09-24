module.exports = function(app) {

    var index = require('./controller/index');
    // var users = require('./routes/users');

    app.all('/', require('./controller/index'));

    app.all('/:controller', function(req, res, next, value) {
        // res.render('index', {
        //     title: controller
        // });
        // res.send(controller).end();
        // response.json(null);
        res.json(value);
        res.end();
    });
    // app.use('/users', users);
    //
    // app.use('/', function(req, res, next) {
    //     require('./controller/index')(app);
    // })

    // app.all('/:controller', function(req, res, next) {
    //     if (controller == '') controller = 'index';

    //     controller = require('./controller/' + controller);

    //     app.use(controller);

    // });

};
