<?php

require_once("vendor/autoload.php");

use SukuKataLib\SukuKataLib;

$q = isset($_GET['q']) ? $_GET['q'] : 'suku kata';

echo('a is Vokal ? '.SukuKataLib::isVokal('a'));
echo('<br>');
echo('Z is Vokal ? '.SukuKataLib::isVokal('Z'));
echo('<br>');

echo('<br>');
echo('<br>');


echo 'count syllables "'.$q.'" : '.SukuKataLib::countSukuKata($q);
echo('<br>');

echo 'huruf vokal "'.$q.'" : '.SukuKataLib::getVokal($q);
echo('<br>');

echo 'huruf konsonan "'.$q.'" : '.SukuKataLib::getKonsonan($q);
echo('<br>');

echo '<br><br>trying to slice...<br>';

print_r(SukuKataLib::getSukuKata($q));

?>