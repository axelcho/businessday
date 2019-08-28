<?php
namespace BusinessDay\Holidays;

class IndependenceDay implements HolidayInterface
{
    public function getDefinition($year)
    {
        return "July 4 ". $year;
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
