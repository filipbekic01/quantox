<?php

namespace School\Factory;

use School\Model\Student;

class StudentFactory
{
    public static function create(
        int $id,
        string $fullName,
        string $board,
        array $grades
    ) {
        return new Student($id, $fullName, $board, $grades);
    }
}
