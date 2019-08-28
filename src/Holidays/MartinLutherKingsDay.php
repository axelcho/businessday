<?php
namespace BusinessDay\Holidays;

class MartinLutherKingsDay implements HolidayInterface
{
    public function getDefinition($year)
    {
        return "Third Monday of January ".$year;
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
