<?php

namespace School\Service\Student\Report;

use School\Model\Student;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class StudentReportCSMBStrategy implements StudentReportStrategyInterface
{
    public function getReport(Student $student): string
    {
        $this->setHeaderContentType();

        $pass = $this->pass($student->getGrades());

        $serializer = new Serializer([new ObjectNormalizer()], [new XmlEncoder()]);
        return $serializer->serialize([
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
