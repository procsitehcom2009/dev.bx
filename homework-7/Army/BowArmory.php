<?php

namespace Army;

class BowArmory extends Armory
{
	public function createWeapon():Weapon
	{
		return new Bow();
	}
}