<?php
namespace BusinessDay\Holidays;

class VeteransDay implements HolidayInterface
{
    public function getDefinition()
    {
        return "November 11";
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
