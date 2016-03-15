<?php

namespace MyClasses;

class Position extends Location {
    private $x;
    private $y;
    private $z;

    public function __construct($x, $y, $z) {
        $this->setPosition($x, $y, $z);
    }

    public function setPosition($x, $y, $z) {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function getPosition() {
        return array($this->x, $this->y, $this->z);
    }

    public function __toString() {
        return "x:".$this->x." y:".$this->y." z:".$this->z;
    }
}