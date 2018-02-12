<?php
include('functions.php');

$playlists = fetch_playlists();
cache_playlists($playlists);
?>