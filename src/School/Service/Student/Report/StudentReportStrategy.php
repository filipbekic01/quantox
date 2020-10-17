<?php

namespace School\Service\Student\Report;

use School\Enum\StudentBoardEnum;

class StudentReportStrategy
{
    private $strategy = null;

    public function __construct($strategy)
    {
        switch ($strategy) {
            case StudentBoardEnum::CSM:
                $this->strategy = new StudentReportCSMStrategy();
                break;
            case StudentBoardEnum::CSMB:
                $this->strategy = new StudentReportCSMBStrategy();
                break;
        }
    }

    public function getReport($student): string
    {
        return $this->strategy->getReport($student);
    }
}
