<?php

namespace MyClasses;

abstract class Location{
    private $x;
    private $y;
    private $z;

    abstract public function setPosition($x, $y, $z);
    abstract public function getPosition();
}