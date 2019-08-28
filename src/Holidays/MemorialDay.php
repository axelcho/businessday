<?php
namespace BusinessDay\Holidays;

class MemorialDay implements HolidayInterface
{
    public function getDefinition($year)
    {
        return "Last Monday of May ".$year;
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
