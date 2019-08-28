<?php
namespace BusinessDay\Holidays;

interface HolidayInterface
{
    public function getDefinition($year);
    public function isAdjustable();
    public function checkNextyear();
}
