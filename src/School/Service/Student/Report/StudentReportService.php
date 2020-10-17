<?php

namespace School\Service\Student\Report;

use School\Model\Student;

class StudentReportService
{
    public function execute(Student $student)
    {
        $strategy = new StudentReportStrategy($student->getBoard());

        echo $strategy->getReport($student);
    }
}
