<?php

namespace School\Repository;

use School\Enum\StudentBoardEnum;
use School\Factory\StudentFactory;
use School\Model\Student;

class StudentRepository
{
    private array $students = [];

    public function __construct()
    {
        $this->students[] = StudentFactory::create(1, "Filip Filipovic", StudentBoardEnum::$CSM, [9, 8, 9, 10]);
        $this->students[] = StudentFactory::create(2, "Pera Peric", StudentBoardEnum::$CSMB, [6, 6, 9, 5]);
        $this->students[] = StudentFactory::create(3, "Mitar Miric", StudentBoardEnum::$CSM, [10, 6, 7, 6]);
        $this->students[] = StudentFactory::create(4, "Zoran Zoric", StudentBoardEnum::$CSMB, [10, 9, 7, 8]);
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
