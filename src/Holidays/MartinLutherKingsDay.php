<?php
namespace BusinessDay\Holidays;

class MartinLutherKingsDay implements HolidayInterface
{
    public function getDefinition()
    {
        return "Third Monday of January";
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
