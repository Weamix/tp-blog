<?php

class Category
{
    private $id;
    private $title;

    public function getID(): int
    {
        return $this->id;
    }

    public function setID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getCat(): string
    {
        return $this->title;
    }

    public function setCat(string $title): self
    {
        $this->title = $title;
        return $this;
    }

}
