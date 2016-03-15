<?php

namespace MyClasses;

use MyClasses\Position;
use MyClasses\Bird;

class Mybird implements Bird {

    private $alive;
    private $kind;
    private $location;
    private $melody;
    private $flySpeed = 10;

    public function __construct($type, Location $location) {
        $this->setKind($type);
        $this->setLocation($location);
        $this->alive = true;
    }

    public function isLive() {
        return $this->alive;
    }

    public function setKind($type) {
        $this->kind = (string)$type;
    }

    public function getKind() {
        return $this->kind;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation(Location $location) {
        $this->location = $location;
    }

    public function flyTo(Location $location) {
        if ($this->isLive()) {

            $position_from = $this->getLocation()->getPosition();
            $position_to = $location->getPosition();

            $difX = $position_to[0] - $position_from[0];
            $difY = $position_to[1] - $position_from[1];
            $difZ = $position_to[2] - $position_from[2];
            $distance = sqrt(pow($difX,2) + pow($difY,2) + pow($difZ,2));
            $time = $distance / $this->flySpeed;
            for($i = 0; $i < $time; $i++) {
                $lambda = $i / ($time - $i);

                $newPosition[0] = round(($position_from[0] + $lambda*$position_to[0])/(1+$lambda));
                $newPosition[1] = round(($position_from[1] + $lambda*$position_to[1])/(1+$lambda));
                $newPosition[2] = round(($position_from[2] + $lambda*$position_to[2])/(1+$lambda));

                $this->setLocation(new Position($newPosition[0], $newPosition[1], $newPosition[2]));
                $this->showMessage("Наша ".$this->getKind()." летит и имеет координаты ".$this->getLocation()." и поёт ".$this->getMelody());
            }
            $this->setLocation($location);
        } else {
            $this->showMessage("Чтобы осуществить перелёт птица должна быть живая");
        }
    }

    public function setMelody($melody) {
        $this->melody = (string)$melody;
    }

    public function getMelody() {
        return $this->melody;
    }

    public function singMelody() {
        if ($this->isLive()) {
            echo $this->getKind() . " " . $this->melody;
        } else {
            $this->showMessage("Чтобы услышать пение птицы она должна быть живой");
        }
    }

    public function killBird() {
        $this->alive = false;
    }

    public function cloneBird($count) {
        $count = (int)$count;
        if (!$count) {
            $this->showMessage("Количество клонов задано не верно");
            return false;
        }

        $birds = array();
        for($i = 0; $i < $count; $i++) {
            $birds[] = clone $this;
        }
        return $birds;
    }

    public function showMessage($msg) {
        echo $msg."<br />";
    }

    public function __toString() {
        return "Я птица. Вид: ".$this->getKind().", нахожусь в координатах ".$this->location." пою песенку ".$this->getMelody();
    }
}