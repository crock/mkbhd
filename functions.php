<?php

require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;
use Madcoda\Youtube\Youtube;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// Database Constants
define('DB_HOST', getenv('DB_HOST'));
define('DB_PORT', getenv('DB_PORT'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));

// Twitter API Constants
define('CONSUMER_KEY', getenv('CONSUMER_KEY'));
define('CONSUMER_SECRET', getenv('CONSUMER_SECRET'));
define('OAUTH_CALLBACK', getenv('OAUTH_CALLBACK'));
define('ACCESS_TOKEN', getenv('ACCESS_TOKEN'));
define('ACCESS_TOKEN_SECRET', getenv('ACCESS_TOKEN_SECRET'));

// YouTube API Key
define('YOUTUBE_API_KEY', getenv('YOUTUBE_API_KEY'));


function fetch_tweets_from_api() {
   $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
   $results = $connection->get("search/tweets", ["q" => "@mkbhd", "lang" => "en", "result_type" => "mixed", "count" => 15]);
   
   return $results;
}

function cache_tweets($response) {
   $fx = fopen('tweets.json', 'w');
   fwrite($fx, json_encode($response));
}

function read_tweet_cache() {
   $fx = fopen('tweets.json', 'r');
   $content = fread($fx, filesize('tweets.json'));

   return json_decode($content);
}

function fetch_playlists() {
   $youtube = new Youtube(array("key" => YOUTUBE_API_KEY));
   
   return $youtube->getPlaylistsByChannelId('UCBJycsmduvYEL83R_U4JriQ');
}

function cache_playlists($response) {
   $fx = fopen('playlists.json', 'w');
   fwrite($fx, json_encode($response));
}

function read_playlist_cache() {
   $fx = fopen('playlists.json', 'r');
   $content = fread($fx, filesize('playlists.json'));

   return json_decode($content);
}