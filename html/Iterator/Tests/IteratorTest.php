<?php declare(strict_types=1);

namespace DesignPattern\Iterator;

use DesignPattern\Iterator\Book;
use DesignPattern\Iterator\BooksIterator;
use PHPUnit\Framework\TestCase;

class IteratorTest extends TestCase
{
    public function testCanIterateOverBookList()
    {
        $bookList = new BooksIterator();
        $bookList->addBook(new Book('Learning PHP Design Patterns', 'William Sanders'));
        $bookList->addBook(new Book('Professional Php Design Patterns', 'Aaron Saray'));
        $bookList->addBook(new Book('Clean Code', 'Robert C. Martin'));

        $booksInfo = [];

        foreach ($bookList as $key => $book) {
            $booksInfo[] = $book->getAuthorAndTitle();
        }

        $this->assertSame(
            [
                'タイトル: Learning PHP Design Patterns, 著者名: William Sanders',
                'タイトル: Professional Php Design Patterns, 著者名: Aaron Saray',
                'タイトル: Clean Code, 著者名: Robert C. Martin',
            ],
            $booksInfo
        );
    }

    public function testCanIterateOverBookListAfterRemovingBook()
    {
        $book = new Book('Clean Code', 'Robert C. Martin');
        $book2 = new Book('Professional Php Design Patterns', 'Aaron Saray');

        $bookList = new BooksIterator();
        $bookList->addBook($book);
        $bookList->addBook($book2);
        $bookList->removeBook($book); 

        $books = [];
        foreach ($bookList as $key => $book) {
            $books[] = $book->getAuthorAndTitle();
        }

        $this->assertSame(
            ['タイトル: Professional Php Design Patterns, 著者名: Aaron Saray'],
            $books
        );

    }

    public function testCanAddBookToList()
    {
        $book = new Book('Clean Code', 'Robert C. Martin');
        $book2 = new Book('Professional Php Design Patterns', 'Aaron Saray');

        $bookList = new BooksIterator();
        $bookList->addBook($book);
        $bookList->addBook($book2);

        $this->assertCount(2, $bookList); 
        //$this->assertSame(2, $bookList->count()); でも良い
    }

    public function testCanRemoveBookFromList()
    {
        $book = new Book('Clean Code', 'Robert C. Martin');

        $bookList = new BooksIterator();
        $bookList->addBook($book);
        $bookList->removeBook($book);

        $this->assertCount(0, $bookList);
    }
}