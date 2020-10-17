<?php

namespace School\Repository;

use School\Model\Student;

class StudentRepository
{
    private array $students = [];

    public function __construct()
    {
        $this->students[] = new Student(1, "Filip Filipovic", "CSM", [9, 8, 9, 10]);
        $this->students[] = new Student(2, "Pera Peric", "CSM", [6, 6, 9, 5]);
        $this->students[] = new Student(3, "Mitar Miric", "CSMB", [10, 6, 7, 6]);
        $this->students[] = new Student(4, "Zoran Zoric", "CSMB", [10, 9, 7, 8]);
    }

    public function findById(int $id): ?Student
    {
        foreach ($this->students as $student) {
            if ($id == $student->getId()) {
                return $student;
            }
        }

        return null;
    }
}
