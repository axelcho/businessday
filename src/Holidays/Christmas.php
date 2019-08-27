<?php
namespace BusinessDay\Holidays;

class Christmas implements HolidayInterface
{
    public function getDefinition()
    {
        return "December 25";
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
