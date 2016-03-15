<?php

require_once('autoloader.php');

$path = './lib/';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

use MyClasses\Position;
use MyClasses\Mybird;

// �������� ������
$chicken = new Mybird('������', new Position(0,0,0));
// ������� ������ �������
$chicken->setMelody('��-��-��');

// ��������� ��� ������ ���
echo $chicken->singMelody();
echo "<br />";

// ������� ����� �� ������
$birdList = $chicken->cloneBird(1);
$duck = $birdList[0];

// ������� �� ����� ����
$duck->setKind('����');
// ������� ���� �������
$duck->setMelody('���-���-���');
// ��������� ��� ���� ���
echo $duck->singMelody();
echo "<br />";

// ��������� �� ����
echo $duck;
echo "<br />";

// �������� ���� � ����
$duck->flyTo(new Position(145, 15, 26));
echo "<br />";

// ��������� �� ����
echo $duck;
echo "<br />";

// ����� ������
$chicken->killBird();

// �������� ������ � ����
$chicken->flyTo(new Position(145, 15, 26));
