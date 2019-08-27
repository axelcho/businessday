<?php
namespace BusinessDay\Holidays;

class PresidentsDay implements HolidayInterface
{
    public function getDefinition()
    {
        return "Third Monday of February";
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
