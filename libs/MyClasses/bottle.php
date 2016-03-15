<?php

namespace MyClasses;

/*
 * класс бутылка
 * создание бутылки из материала material, цветом color, объёмом volume
 */
class Bottle {
    private $on;
    private $material;
    private $color;
    private $volume;

    public function __construct($on = false, $material = 'glass', $volume = 1000, $color = 'green') {
        $this->on = $on;
        $this->material = $material;
        $this->volume = $volume;
        $this->color = $color;
    }

    /**
     * функция открыть - закрыть
     */
    public function openClose($on = true) {
        $this->on = $on;
    }

    /**
     * Возвращает открыта ли бутылка или нет
     */
    public function isOn() {
        return $this->on;
    }

    /**
     * Возвращает объём.
     */
    public function getVolume() {
        return $this->volume;
    }

    /**
     * Возвращает материал бутылки
     */
    public function getMaterial() {
        return $this->material;
    }

    /**
     * Возвращает цвет бутылки
     */
    public function getColor() {
        return $this->color;
    }

    public function __toString() {
        return "The bottle is made of ".$this->getColor()." ".$this->getMaterial().". It volume of ".$this->getVolume()." ml.";
    }

    function __destruct() {
        echo "The ".$this->getColor()." ".$this->getMaterial()." bottle of processed recyclables";
    }
};