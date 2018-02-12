<?php
include('functions.php');

$tweets = fetch_tweets_from_api();
cache_tweets($tweets);
?>