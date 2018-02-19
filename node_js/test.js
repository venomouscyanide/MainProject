var request = require('request');

request.post('https://textbelt.com/text', {
  form: {
    phone: '5555555555',
    message: 'Hello world',
    key: 'fb998febb13aaaa08590c8a920dcdffd6af6c349ha8gjrLen519rO0bRKAfVuobF',
  },
}, function(err, httpResponse, body) {
  if (err) {
    console.error('Error:', err);
    return;
  }
  console.log(JSON.parse(body));
})
