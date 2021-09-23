<?php declare(strict_types=1);

namespace DesignPattern\Iterator;

class Book
{
    public function __construct(private string $title, private string $author)
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getAuthorAndTitle(): string
    {
        return sprintf('タイトル: %s, 著者名: %s', $this->getTitle(), $this->getAuthor());
    }
}