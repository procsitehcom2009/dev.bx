<?php

namespace Army;

class PikeArmory extends Armory
{
	public function createWeapon():Weapon
	{
		return new Pike();
	}
}