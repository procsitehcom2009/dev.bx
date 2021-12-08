<?php

namespace Army;

class BowForge extends Armory
{
	public function createWeapon():Weapon
	{
		return new Bow();
	}
}