<?php
namespace BusinessDay\Holidays;

class Thanksgiving implements HolidayInterface
{
    public function getDefinition($year)
    {
        return "Fourth Thursday of November ".$year;
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
