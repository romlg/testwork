<?php

namespace MyClasses;

/*
 * класс бутылка с жидкостью
 * вид жидкости kind, дата изготовления productionDate, количество дней годности daysLife,
 * фирма изготовитель firm, объём жидкости liquidVolume
 */
class Liquid extends Bottle {
    private $productionDate;
    private $daysLife;
    private $firm;
    private $kind;
    private $liquidVolume;

    public function __construct($kind, $productionDate, $daysLife, $firm, $liquidVolume = 900, array $bottle) {
        if ($bottle) {
            $on = isset($bottle[0]) ? $bottle[0] : '';
            $material = isset($bottle[1]) ? $bottle[1] : '';
            $volume = isset($bottle[2]) ? $bottle[2] : '';
            $color = isset($bottle[3]) ? $bottle[3] : '';
            parent::__construct($on, $material, $volume, $color);
        } else parent::__construct();

        $this->kind = $kind;
        $this->productionDate = $productionDate;
        $this->daysLife = $daysLife;
        $this->firm = $firm;
        $this->liquidVolume = $liquidVolume;
    }

    /*
     * возвращает вид жидкости
     */
    public function getKind() {
        return $this->kind;
    }

    /*
     * возвращает дату изготовления
     */
    public function getProductionDate() {
        return $this->productionDate;
    }

    /*
     * возвращает количество дней годности
     */
    public function getDaysLife() {
        return $this->daysLife;
    }

    /*
     * возвращает фирму изготовителя
     */
    public function getFirm() {
        return $this->firm;
    }

    /**
     * Возвращает текущий объём жидкости.
     */
    public function getLiquidVolume() {
        return $this->liquidVolume;
    }

    /**
     * Изменение объёма текущей жидкости.
     * @param boolean $add направление изменения
     */
    public function changeVolume($add, $quantity) {
        if (!$this->isOn()) $this->openClose(true);
        $volume = $this->getVolume();

        if ($add && $volume > $this->liquidVolume) {
            $this->liquidVolume = ($this->liquidVolume + $quantity) < $volume ? $this->liquidVolume + $quantity : $volume;
        } else if (!$add && $this->liquidVolume > 0) {
            $this->liquidVolume = ($this->liquidVolume - $quantity) > 0 ? $this->liquidVolume - $quantity : 0;
        }

        $this->openClose(false);
    }

    /*
     * возвращает дату истечения срока годности
     */
    public function getExpirationDate() {
        if ($this->getDaysLife() > 0) {
            $date = strtotime($this->getProductionDate());
            return date("d.m.Y", mktime(0, 0, 0, date("m", $date)  , date("d", $date)+$this->getDaysLife(), date("Y", $date)));
        } else {
            return 'not limited';
        }
    }

    public function __toString() {
        return "The bottle is made of ".$this->getColor()." ".$this->getMaterial().". It volume of ".$this->getVolume().
        " ml. and it's filled with ".$this->getKind()." on ".$this->getLiquidVolume()." ml. ".
        "The firm-manufacturer ".$this->getFirm().", production date is ".$this->getProductionDate().", expiration date ".$this->getExpirationDate();
    }

};