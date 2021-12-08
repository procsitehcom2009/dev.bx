<?php

namespace Army;

class PikeForge extends Armory
{
	public function createWeapon():Weapon
	{
		return new Pike();
	}
}