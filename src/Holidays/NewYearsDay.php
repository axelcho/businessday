<?php
namespace BusinessDay\Holidays;

class NewYearsDay implements HolidayInterface
{
    public function getDefinition($year)
    {
        return "January 1 ".$year;
    }

    public function isAdjustable()
    {
        return true;
    }

    public function checkNextyear()
    {
        return true;
    }
}
