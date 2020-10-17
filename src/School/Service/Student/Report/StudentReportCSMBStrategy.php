<?php

namespace School\Service\Student\Report;

use School\Model\Student;

class StudentReportCSMBStrategy implements StudentReportStrategyInterface
{
    public function getReport(Student $student): string
    {
        global $container;

        $this->setHeaderContentType();

        $pass = $this->pass($student->getGrades());

        return $container->get('xml_serializer')->serialize([
            'pass' => $pass,
            'student' => $student
        ], 'xml');
    }

    public function setHeaderContentType(): void
    {
        header('Content-Type: application/xml');
    }

    public function pass(array $grades): bool
    {
        // To be honest, i did not understand how this algo works.
        // I wrote my best guess but it's not complete, i have 
        // a lot of questions here. There are some edge cases that
        // might fail.

        $highest = 1;

        if (count($grades) > 2) {
            foreach ($grades as $grade) {
                if ($grade > $highest) {
                    $highest = $highest;
                }
            }

            if ($highest < 8) {
                return false;
            }
        } else {
            return false;
        }

        return true;
    }
}
