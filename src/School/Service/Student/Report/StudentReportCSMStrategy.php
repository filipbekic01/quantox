<?php

namespace School\Service\Student\Report;

use School\Model\Student;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class StudentReportCSMStrategy implements StudentReportStrategyInterface
{
    public function getReport(Student $student): string
    {
        $this->setHeaderContentType();

        $pass = $this->pass($student->getGrades());

        $jsonEncoder = new JsonEncoder();
        return $jsonEncoder->encode([
            'pass' => $pass,
            'student' => $student
        ], 'json');
    }

    public function setHeaderContentType(): void
    {
        header('Content-Type: application/json');
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
