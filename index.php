<?php

include_once("sukukata.lib.php");

$lib = new SukuKataLib();

$q=isset($_GET['q'])?$_GET['q']:'suku kata';

echo('a is vowel ? '.$lib->isVowel('a'));
echo('<br>');
echo('Z is vowel ? '.$lib->isVowel('Z'));
echo('<br>');


echo 'count syllables "'.$q.'" : '.$lib->countSyllabels($q);

echo '<br><br>trying to slice...<br>';


print_r($lib->getSyllables($q));

?>