<?php
namespace BusinessDay\Holidays;

class PresidentsDay implements HolidayInterface
{
    public function getDefinition($year)
    {
        return "Third Monday of February ".$year;
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
