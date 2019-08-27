<?php
namespace BusinessDay\Holidays;

class ColumbusDay implements HolidayInterface
{
    public function getDefinition()
    {
        return "Second Monday of October";
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
