// https://nodejs.org/en/docs/guides/nodejs-docker-webapp/
// https://medium.com/google-cloud/deploying-an-angular-app-using-google-cloud-run-7a4d59048edd

'use strict';

const express = require('express');

// Constants
const PORT = 8080;
const HOST = '0.0.0.0';

// App
const app = express();
app.use(express.static('dist/jeopardy'));
app.get('/', function (req, res, next) {
	res.redirect('/');
});

app.listen(PORT);
console.log(`Running on http://${HOST}:${PORT}`);
