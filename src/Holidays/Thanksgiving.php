<?php
namespace BusinessDay\Holidays;

class Thanksgiving implements HolidayInterface
{
    public function getDefinition()
    {
        return "Fourth Thursday of November";
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
