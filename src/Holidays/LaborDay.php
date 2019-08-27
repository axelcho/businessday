<?php
namespace BusinessDay\Holidays;

class LaborDay implements HolidayInterface
{
    public function getDefinition()
    {
        return "First Monday of September";
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
