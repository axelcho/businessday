<?php
namespace BusinessDay;
use BusinessDay\Holidays\HolidayInterface;

use DateTime;
use Exception;

class BusinessDay
{
    /**
     * @var DateTime
     */
    private $dateTime;

    /**
     * @var array
     */
    private $holidays = [
        "NewYearsDay", "MartinLutherKingsDay", "PresidentsDay", "MemorialDay", "IndependenceDay", "LaborDay",
        "VeteransDay", "Thanksgiving", "Christmas"
    ];

    /**
     * @var HolidayInterface[]
     */
    private $holidayClasses;

    /**
     * @var string
     */
    private $year;


    /**
     * BusinessDay constructor.
     * @param null $date
     * @param array $holidays
     * @throws Exception
     */
    public function __construct($date = null, array $holidays = [])
    {
        $this->setDate($date);
        if ($holidays) {
            $this->holidays = $holidays;
        }

        foreach ($this->holidays as $holiday) {
            $this->addHoliday($holiday);
        }

        if ($this->dateTime) {
            $this->year = $this->dateTime->format("Y");
        }
    }

    /**
     * @param DateTime $dateTime
     * @param string $format
     * @return string
     */
    public function format(DateTime $dateTime, $format = 'm/d/Y')
    {
        return $dateTime->format($format);
    }

    /**
     * @param string $date
     * @return BusinessDay
     * @throws Exception
     */
    public function setDate($date)
    {
        try {
            $this->dateTime = new DateTime($date);
        } catch (Exception $e) {
        }
        return $this;
    }

    /**
     * @return bool
     */
    public function isWeekend()
    {
        if ($this->dateTime) {
            return (intval($this->dateTime->format('N')) > 5);
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isHoliday()
    {
        if ($this->dateTime) {
            foreach ($this->holidayClasses as $holidayClass) {
                if ($this->checkHoliday($holidayClass)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isBusinessDay()
    {
        if (!$this->dateTime || $this->isWeekend() || $this->isHoliday()) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getCurrentBusinessDay()
    {
        if (!$this->dateTime) {
            throw new Exception("Cannot check business day");
        }

        if (!$this->isBusinessDay()) {
            $this->dateTime->modify("+1 day");
            return $this->getCurrentBusinessDay();
        }

        return $this->format($this->dateTime);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getNextBusinessDay()
    {
        if (!$this->dateTime) {
            throw new Exception("Cannot check business day");
        }

        $this->dateTime->modify("+1 day");

        try {
            return $this->getCurrentBusinessDay();
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $holiday
     * @return $this
     */
    public function addHoliday($holiday, $namespace = "BusinessDay\\Holidays\\")
    {
        $holidayClass = $namespace . $holiday;

        if (class_exists($holidayClass)) {
            $this->holidayClasses[$holiday] = new $holidayClass();
        }

        return $this;
    }

    /**
     * @param $holiday
     * @return $this
     */
    public function removeHoliday($holiday)
    {
        if (array_key_exists($holiday, $this->holidayClasses)) {
            unset ($this->holidayClasses[$holiday]);
        }
        return $this;
    }

    /**
     * @param HolidayInterface $holiday
     * @return bool
     */
    private function checkHoliday(HolidayInterface $holiday)
    {
        try {
            $check = new DateTime($holiday->getDefinition($this->year));
        } catch (Exception $e) {
            return false;
        }

        if ($holiday->isAdjustable()) {
            if ($this->isSaturday($check)) {
                $check = $check->modify("-1 day");
            }

            if ($this->isSunday($check)) {
                $check = $check->modify("+1 day");
            }

            //for new years day, check prev and next just in case
            if ($holiday->checkNextyear()) {
                $prev = $check->modify("-1 year");
                $next = $check->modify("+1 year");

                if ($this->isSunday($prev)) {
                    $prev = $prev->modify("+1 day");
                }

                if ($this->isSaturday($next)) {
                    $next = $next->modify("-1 day");
                }

                if (strcmp($this->dateTime->format('m/d/Y'), $prev->format('m/d/Y')) === 0) {
                    return true;
                }

                if (strcmp($this->dateTime->format('m/d/Y'), $next->format('m/d/Y')) === 0) {
                    return true;
                }
            }
        }

        return (strcmp($this->dateTime->format('m/d/Y'), $check->format('m/d/Y')) === 0);
    }


    /**
     * @return bool
     */
    private function isSaturday(DateTime $dateTime)
    {
        return(intval($dateTime->format('N')) === 6);
    }

    /**
     * @return bool
     */
    private function isSunday(DateTime $dateTime)
    {
        return(intval($this->dateTime->format('N')) === 7);
    }
}
