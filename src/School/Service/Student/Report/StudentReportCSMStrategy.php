<?php

namespace School\Service\Student\Report;

use School\Model\Student;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class StudentReportCSMStrategy implements StudentReportStrategyInterface
{
    public function getReport(Student $student): string
    {
        $jsonEncoder = new JsonEncoder();

        $pass = $this->pass($student->getGrades());

        return $jsonEncoder->encode([
            'pass' => $pass,
            'student' => $student
        ], 'json');
    }

    public function pass(array $grades): bool
    {
        $sum = 0;
        foreach ($grades as $grade) {
            $sum += $grade;
        }

        if ($sum / count($grades) >= 7) {
            return true;
        }

        return false;
    }
}
