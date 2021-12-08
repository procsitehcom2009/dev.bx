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

for ($i=0;$i<10;$i++)
{
	$forge = $forges[rand(0,1)];
    $armyA[] = array(\Army\Helper::getForge($forge)->createWarrior(),\Army\Helper::getWeapon(\Army\Helper::getWeaponSoilder($forge))->createWeapon());
	$forge = $forges[rand(0,1)];
    $armyB[] = array(\Army\Helper::getForge($forge)->createWarrior(),\Army\Helper::getWeapon(\Army\Helper::getWeaponSoilder($forge))->createWeapon());
}

print_r($armyA);
print_r($armyB);

/*$calculatePower = function ($sum, $warrior)
{
    $sum += $warrior->power();
    return $sum;
};

$armyPowerA = array_reduce($armyA,$calculatePower);
$armyPowerB = array_reduce($armyB,$calculatePower);

echo $armyPowerA, PHP_EOL;
echo $armyPowerB;*/