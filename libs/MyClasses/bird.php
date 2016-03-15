<?php

namespace MyClasses;

interface Bird {

    function setKind($type); //string
    function getKind();

    function getLocation();
    function setLocation(Location $location);
    function flyTo(Location $location);

    function setMelody($melody); //string

    function singMelody(); // вывод зависит от kind

    function killBird();
    function cloneBird($count); // int
}