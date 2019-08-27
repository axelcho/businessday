<?php
namespace BusinessDay\Holidays;

class NewYearsDay implements HolidayInterface
{
    public function getDefinition()
    {
        return "January 1";
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
