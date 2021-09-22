<?php declare(strict_types=1);

namespace DesignPattern\Adapter;

/**
 * メソッドの名前が不適切などの理由から、BookインターフェースがEBookインターフェースをマージできない場合
 * Bookインターフェースをはめこんだアダプタークラスをクライアントとして用意して、EBookの依存性を注入することで
 * BookインターフェースがEBookインターフェースへの互換性を保つことができるようになる
 */
class EBookAdapter implements Book
{
    public function __construct(protected EBook $eBook)
    {
    }

    /**
     * This class makes the proper translation from one interface to another.
     */
    public function open()
    {
        $this->eBook->unlock();
    }

    public function turnPage()
    {
        $this->eBook->pressNext();
    }

    /**
     * notice the adapted behavior here: EBook::getPage() will return two integers, but Book
     * supports only a current page getter, so we adapt the behavior here
     */
    public function getPage(): int
    {
        return $this->eBook->getPage()[0];
    }
}
