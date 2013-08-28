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

function load_permission_config($config_file)
{
    $repositories = array();

    $config = json_decode(file_get_contents($config_file), true);
    foreach ($config as $item) {
        $repositories[$item["id"]] = $item;
    }

    return $repositories;
}