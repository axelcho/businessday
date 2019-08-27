<?php
namespace BusinessDay\Holidays;

class MemorialDay implements HolidayInterface
{
    public function getDefinition()
    {
        return "Last Monday of May";
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
