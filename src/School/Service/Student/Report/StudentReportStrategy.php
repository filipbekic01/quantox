<?php

namespace School\Service\Student\Report;

class StudentReportStrategy
{
    private $strategy = null;

    public function __construct($strategy)
    {
        switch ($strategy) {
            case "csm":
                $this->strategy = new StudentReportCSMStrategy();
                break;
            case "csmb":
                $this->strategy = new StudentReportCSMBStrategy();
                break;
        }
    }

    public function getReport($student): string
    {
        return $this->strategy->getReport($student);
    }
}
