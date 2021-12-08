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
	$forge = $forges[rand(0,1)];
    $armyA[] = array(\Army\Helper::getForge($forge)->createWarrior(),\Army\Helper::getWeapon(\Army\Helper::getWeaponSoilder($forge))->createWeapon());
	$forge = $forges[rand(0,1)];
    $armyB[] = array(\Army\Helper::getForge($forge)->createWarrior(),\Army\Helper::getWeapon(\Army\Helper::getWeaponSoilder($forge))->createWeapon());
}

print_r($armyA);
print_r($armyB);