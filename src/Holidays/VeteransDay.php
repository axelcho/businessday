<?php
namespace BusinessDay\Holidays;

class VeteransDay implements HolidayInterface
{
    public function getDefinition($year)
    {
        return "November 11 ".$year;
    }

    public function isAdjustable()
    {
        return true;
    }

    public function checkNextyear()
    {
        return false;
    }
}
