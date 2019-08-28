<?php
namespace BusinessDay\Holidays;

class Christmas implements HolidayInterface
{
    public function getDefinition($year)
    {
        return "December 25 " . $year;
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
