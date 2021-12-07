<?php

spl_autoload_register(function ($class)
{
    include __DIR__ . '/' . str_replace("\\", "/", $class) . '.php';
});

$armyA = [];
$armyB = [];

$forges = [
    'archer',
    'horseman',
];

for ($i=0;$i<100;$i++)
{
    $armyA[] = \Army\Helper::getForge($forges[rand(0,1)])->createWarrior();
    $armyB[] = \Army\Helper::getForge($forges[rand(0,1)])->createWarrior();
}

$calculatePower = function ($sum, $warrior)
{
    $sum += $warrior->power();
    return $sum;
};

$armyPowerA = array_reduce($armyA,$calculatePower);
$armyPowerB = array_reduce($armyB,$calculatePower);

echo $armyPowerA, PHP_EOL;
echo $armyPowerB;