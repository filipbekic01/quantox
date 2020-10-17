<?php

namespace School\Model;

use JsonSerializable;

class Student implements JsonSerializable
{
    private int $id;
    private string $fullName;
    private string $board;
    private array $grades;

    public function __construct(
        int $id,
        string $fullName,
        string $board,
        array $grades
    ) {
        $this->setId($id);
        $this->setFullName($fullName);
        $this->setBoard($board);
        $this->setGrades($grades);
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setFullName(string $fullName)
    {
        $this->fullName = $fullName;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setBoard(string $board)
    {
        $this->board = $board;
    }

    public function getBoard(): string
    {
        return $this->board;
    }

    public function setGrades(array $grades)
    {
        $this->grades = $grades;
    }

    public function getGrades(): array
    {
        return $this->grades;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}
