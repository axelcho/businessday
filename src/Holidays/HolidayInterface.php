<?php
namespace BusinessDay\Holidays;

interface HolidayInterface
{
    public function getDefinition();
    public function isAdjustable();
    public function checkNextyear();
}
