<?php declare(strict_types=1);

namespace DesignPattern\Singleton;

use Exception;
use RuntimeException;

/**
 * 豆知識として、__construct, __destruct, __clone以外のマジックメソッドは、PHP8.0以降はpublicにしないと警告が出る
 */
final class Singleton
{
    private static ?Singleton $instance = null;

    /**
     * newで外部からインスタンスを生成できないようにする
     * 代わりに、Singleton::getInstance()により生成
     */
    private function __construct()
    {
    }

    /**
     * 2つ目のインスタンスが作られるを防ぐために、インスタンスの複製を許可しないようにする
     * ＠throws RuntimeException
     */
    private function __clone()
    {
        throw new Exception('This Instance is Not Clone against' . get_class($this));
    }

    /**
     * 2つ目のインスタンスが作られるを防ぐために、アンシリアライズを禁止する
     */
    public function __wakeup()
    {
        throw new Exception('This Instance is Not unserialize against ' . get_class($this));
    }

    /**
     * 唯一のインスタンスを返すためのメソッド
     * @return Singleton
     */
    public static function getInstance(): Singleton
    {
        if (static::$instance === null) {
            // ParentクラスとChildクラスがあるとき、new self()とnew static()の違いは、インスタンスが呼ばれ手のクラスになるか、呼び手のクラスに束縛されるか
            // final Classで、このクラスは継承されないので、new static()で束縛して良い
            static::$instance = new static();
        }

        return static::$instance;
    }
}
