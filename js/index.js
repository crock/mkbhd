var anchorme = require("anchorme").default;


document.addEventListener('DOMContentLoaded', function() {
   var tweets = document.getElementsByClassName('tweet-text');

   Array.from(tweets).forEach(function (tweet) {
      tweet.innerHTML = anchorme(tweet.innerText);
   });
});




