<?php

namespace School\Service\Student\Report;

use School\Model\Student;

interface StudentReportStrategyInterface
{
    public function getReport(Student $student): string;
}
