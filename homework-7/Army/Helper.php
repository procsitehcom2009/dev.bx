<?php

namespace Army;

class Helper
{
    public static function getForge(string $type)
    {
        switch ($type)
        {
            case 'archer':
                return new ArcherForge();
            case 'horseman':
                return new HorsemanForge();
        }
    }

	public static function getWeapon(string $type)
	{
		switch ($type)
		{
			case 'bow':
				return new BowArmory();
			case 'pike':
				return new PikeArmory();
		}
	}

	public static function getWeaponSoilder(string $typeSoilder):string
	{
		switch ($typeSoilder)
		{
			case 'archer':
				return 'bow';
			case 'horseman':
				return 'pike';
		}
	}
}