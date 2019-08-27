<?php
namespace BusinessDay\Holidays;

class IndependenceDay implements HolidayInterface
{
    public function getDefinition()
    {
        return "July 4";
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
