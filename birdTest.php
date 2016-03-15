<?php

require_once('autoloader.php');

$path = './lib/';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

use MyClasses\Position;
use MyClasses\Mybird;

// создадим курицу
$chicken = new Mybird('Курица', new Position(0,0,0));
// зададим курице мелодию
$chicken->setMelody('ко-ко-ко');

// послушаем как курица поёт
echo $chicken->singMelody();
echo "<br />";

// сделаем клона из курицы
$birdList = $chicken->cloneBird(1);
$duck = $birdList[0];

// сделаем из клона утку
$duck->setKind('Утка');
// зададим утке мелодию
$duck->setMelody('кря-кря-кря');
// послушаем как утка поёт
echo $duck->singMelody();
echo "<br />";

// посмотрим на утку
echo $duck;
echo "<br />";

// отправим утку в полёт
$duck->flyTo(new Position(145, 15, 26));
echo "<br />";

// посмотрим на утку
echo $duck;
echo "<br />";

// убъём курицу
$chicken->killBird();

// отправим курицу в полёт
$chicken->flyTo(new Position(145, 15, 26));
