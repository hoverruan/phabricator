<?php

require_once dirname(dirname(__FILE__)) . '/externals/simple-permission/SimplePermission.php';

$ph_user = $_COOKIE['phusr'];
$request_uri = $_SERVER['REQUEST_URI'];

$u_jiangke = 'jiangke';
$u_yongpei = 'yongpei';
$u_luocan = 'luocan';
$u_liwen3 = 'liwen3';
$u_jianwei7 = 'jianwei7';
$u_chexing = 'chexing';
$u_zhangxin4 = 'zhangxin4';
$u_zuxue = 'zuxue';
$u_chunfeng2 = 'chunfeng2';
$u_huanfeng = 'huanfeng';
$u_yuanqiang = 'yuanqiang';
$u_chunjian1 = 'chunjian1';
$u_xiaobo12 = 'xiaobo12';
$u_zhandong = 'zhandong';

$permissions = array(
    'TS' => array($u_yongpei, $u_chunjian1, $u_chunfeng2, $u_jiangke),
    'LA' => array($u_yuanqiang, $u_luocan, $u_yongpei, $u_xiaobo12, $u_jiangke),
    'LAA' => array($u_yuanqiang, $u_luocan, $u_xiaobo12, $u_yongpei, $u_jiangke),
    'SB' => array($u_yongpei, $u_chexing, $u_jianwei7, $u_zhandong, $u_jiangke),
    'HS' => array($u_huanfeng, $u_chunfeng2, $u_yongpei, $u_jiangke),
    'LS' => array($u_zuxue, $u_yongpei, $u_zhangxin4, $u_liwen3, $u_jiangke)
);

$repo = find_repository_from_uri($request_uri);
if (!is_null($repo)) {
    if (array_key_exists($repo, $permissions)) {
        $users = $permissions[$repo];
        if (!in_array($ph_user, $users)) {
            header('HTTP/1.0 401 Unauthorized');
            exit;
        }
    }
}
