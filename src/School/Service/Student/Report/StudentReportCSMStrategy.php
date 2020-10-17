<?php

namespace School\Service\Student\Report;

use School\Model\Student;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class StudentReportCSMStrategy implements StudentReportStrategyInterface
{
    public function getReport(Student $student): string
    {
        $jsonEncoder = new JsonEncoder();

        return $jsonEncoder->encode($student, 'json');
    }
}
