<?php

require_once dirname(dirname(__FILE__)) . '/externals/simple-permission/SimplePermission.php';

$ph_user = $_COOKIE['phusr'];
$request_uri = $_SERVER['REQUEST_URI'];

$cur_repo = find_repository_from_uri($request_uri);

if (!is_null($cur_repo)) {
    $config_file = dirname(dirname(__FILE__)) . '/conf/local/simple-permission.json';
    if (file_exists($config_file)) {
        $repositories = load_permission_config($config_file);
        if (array_key_exists($cur_repo, $repositories)) {
            $repo_config = $repositories[$cur_repo];
            if (!in_array($ph_user, $repo_config['members'])) {
                header('HTTP/1.0 401 Unauthorized');
                exit;
            }
        }
    }
}
