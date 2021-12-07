<?php

spl_autoload_register(function ($class)
{
    include __DIR__.'/'.str_replace("\\","/",$class).'.php';
});

$armyA = [];
$armyB = [];

for ($i=0;$i<100;$i++)
{
    $armyA[]=rand(0,1 >0 ? new \Army\Archer(): new \Army\Horseman());
    $armyB[]=rand(0,1 > 0? new \Army\Archer(): new \Army\Horseman());
}

$calculatePower = function ($sum, $warrior)
{
    $sum += $warrior->power();
    return $sum;
}

$armyPowerA = array_reduce($armyA);
$armyPowerB = array_reduce($armyB);

echo $armyPowerA, PHP_EOL;
echo $armyPowerB;