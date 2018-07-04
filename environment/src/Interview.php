<?php

namespace RaceRoster;

/**
 * Class Interview
 * @package RaceRoster
 */
class Interview
{
    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var array
     */
    protected $details;

    /**
     * @param array $details
     * @param \DateTime $date
     *
     * @throws InterviewException
     */
    public function __construct(array $details, \DateTime $date)
    {
        $missingFields = array_diff(array('name', 'nickname', 'age', 'yearsOfExperience'), array_keys($details));
        if (count($missingFields) > 0) {
            throw new InterviewException(
                'Missing field(s) in interview details parameter: ' . implode(',', array_values($missingFields))
            );
        }

        $this->details = $details;
        $this->date    = $date;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return isset($this->details['name']) ? $this->details['name'] : '';
    }

    /**
     * @return float
     */
    public function getYearsOfExperience()
    {
        return isset($this->details['yearsOfExperience']) ? $this->details['yearsOfExperience'] : 0.00;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return isset($this->details['age']) ? $this->details['age'] : 0;
    }

    /**
     * @todo Complete this comment
     */
    public function getDate()
    {
        return $this->date;
    }
}