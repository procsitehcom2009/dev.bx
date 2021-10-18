<?php

function printMessage(string $message): void
{
	echo $message . "\n";
}

function validateAge(string $age): int
{
	if (is_numeric($age))
	{
		return $validatedAge = (int)$age;
	}
	else
	{
		return $validatedAge = -1;
	}
}