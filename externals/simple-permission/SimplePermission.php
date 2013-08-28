<?php
function find_repository_from_uri($uri)
{
    if (preg_match('/^\/diffusion\/([A-Z]+)\//', $uri, $matches)) {
        return $matches[1];
    } elseif (preg_match('/^\/r([A-Z]+)[a-f0-9]+$/', $uri, $matches)) {
        return $matches[1];
    } else {
        return null;
    }
}