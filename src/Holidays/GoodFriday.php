<?php
namespace BusinessDay\Holidays;

use DateTime;

/**
 * requires ext-calendar
 *
 * Class GoodFriday
 * @package BusinessDay\Holidays
 */
class GoodFriday implements HolidayInterface
{
    public function getDefinition($year)
    {
        if (extension_loaded("calendar")) {
            $easterTimestamp = easter_date($year);

            $easterDateTime = new DateTime();
            $easterDateTime->setTimestamp($easterTimestamp);

            //good friday is 2 days ahead of easter
            $fridayDateTime = $easterDateTime->modify("-2 days");
            return $fridayDateTime->format("F j Y");
        }

        //returning this string will throw an exception and force to skip the check
        return "Not implemented";
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
