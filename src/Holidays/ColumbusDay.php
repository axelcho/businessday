<?php
namespace BusinessDay\Holidays;

class ColumbusDay implements HolidayInterface
{
    public function getDefinition($year)
    {
        return "Second Monday of October ". $year;
    }

    public function isAdjustable()
    {
        return false;
    }

    public function checkNextyear()
    {
        return false;
    }
}
