console.log('Welcome to Twitter API SMS');

var twit = require('twit');

var T = new twit({
  consumer_key:         'OZxyOLmIY6aK5BmGoPWZFvlS9',
  consumer_secret:      '0QDmyOESVRaRgKGCyJ5Rs6e9Q9BUhCgesnykW9nKjizU9zobpx',
  access_token:         '1362590131-aQRfGHo3Bh9YHQqlENFTLqc7h7P7omZhmYEjJIa',
  access_token_secret:  'l9EWG4NfecPY9Dfbd14zjh9V94oCf2zO2gZqtmY8hF74z',
  timeout_ms:           60*1000,  // optional HTTP request timeout to apply to all requests.
  // strictSSL:            true,     // optional - requires SSL certificates to be valid.
})

var param = {
	q: 'prdxn',
	count: 2
}

T.get('search/tweets',param, goData);

function goData(err, data, response){
	var tweets = data.statuses;
	for(var i = 0; i < tweets.length; i++){
		console.log(tweets[i].text);
	}
}