<?php

require_once dirname(__FILE__) . '/SimplePermission.php';

function test_find_repository_from_uri()
{
    $url_to_repository_map = array(
        '/rTS4bd40556f764006ad46d454e9ba1610c8c7b3d2e' => 'TS',
        '/diffusion/TS/history/' => 'TS',
        '/diffusion/LA/' => 'LA',
        '/diffusion/LAA/' => 'LAA',
        '/rLAb93e48c42d2614187eb930ee2a096b8cf17e6728' => 'LA',
        '/rLAA1bcac2e64f36e38f17f54e81c3ca00d1bc56f0a9' => 'LAA',
        '/w/' => null
    );

    foreach ($url_to_repository_map as $uri => $repo) {
        echo 'uri = ' . $uri;

        $found_repo = find_repository_from_uri($uri);
        if (!is_null($found_repo)) {
            echo " ($found_repo)";
        }

        if ($repo == $found_repo) {
            echo ' matched';
        }

        echo "\n";
    }
}

function test_load_permission_config()
{
    $config_file = dirname(dirname(dirname(__FILE__))) . '/conf/local/simple-permission.json';

    if (file_exists($config_file)) {
        $repositories = load_permission_config($config_file);
        var_dump($repositories);
    }
}

test_find_repository_from_uri();
test_load_permission_config();
