<?php

function printMessage(string $message): void
{
	echo $message . "\n";
}

function validateAge(string $age): int
{
	if (is_numeric($age))
	{
		return $validateAge = (int)$age;
		return $validateAge;
	}
	else
	{
		return $validateAge = (int)-1;
	}
}