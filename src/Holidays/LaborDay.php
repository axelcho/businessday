<?php
namespace BusinessDay\Holidays;

class LaborDay implements HolidayInterface
{
    public function getDefinition($year)
    {
        return "First Monday of September ". $year;
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
