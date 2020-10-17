<?php

namespace School\Service\Student\Report;

use School\Model\Student;

class StudentReportService
{
    public function execute(Student $student)
    {
        $strategy = new StudentReportStrategy($student->getBoard());

        // Since we're in the middle of buffer, we can just echo the results.
        // Method ob_get_clean() will later return content as response.
        echo $strategy->getReport($student);
    }
}
