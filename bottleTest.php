<?php

require_once('autoloader.php');

use MyClasses\Liquid;

$vineBottle = array(false, 'glass', 700, 'blue');
$vine = new Liquid('Vine', '24.05.1983', -1, 'Martini', 600, $vineBottle);

$milkBottle = array(true, 'paper', 1100, 'white');
$milk = new Liquid('Milk', '07.03.2016', 20, 'Prostokvashino', 0, $milkBottle);

$water = new Liquid('Mineral water', '07.02.2016', 120, 'Esentuki', 900, array());

echo $vine;
echo "<br />";

echo $milk;
echo "<br />";

echo $water;
echo "<br />";

// ������ �� ������� 200 ��. ����
$vine->changeVolume(false, 200);
echo $vine;
echo "<br />";

// �������� ������� ������� �� 900 ��.
$milk->changeVolume(true, 900);
echo $milk;
echo "<br />";
