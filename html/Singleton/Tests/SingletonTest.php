<?php declare(strict_types=1);

namespace DesignPattern\Singleton\Tests;

use DesignPattern\Singleton\Singleton;
use PHPUnit\Framework\TestCase;
use Exception;

class SingletonTest extends TestCase
{
    public function testUniqueness()
    {
        $firstCall = Singleton::getInstance();
        $secondCall = Singleton::getInstance();

        $this->assertInstanceOf(Singleton::class, $firstCall);
        $this->assertSame($firstCall, $secondCall);
    }

    public function testInstanceName()
    {
        $firstCall = Singleton::getInstance();

        $this->assertSame(get_class($firstCall), 'DesignPattern\Singleton\Singleton');
    }

    public function testUnseriarize()
    {
        $firstCall = Singleton::getInstance();

        // インスタンスをデータベースやファイルに保存したい場合、プロパティをそれぞれ保存して行くと、データが膨大になるため、
        // シリアライズ化することで、クラス内部の情報を文字列に変換して保存することが可能となる。
        // シリアライズ化した情報を再度生成したい場合は、アンシリアライズすることで再構築できる。
        $serialized = serialize($firstCall);

        try {
            $secondCall = unserialize($serialized);
        } catch (Exception $e) {
            $this->assertSame($e->getMessage(), 'This Instance is Not unserialize against DesignPattern\Singleton\Singleton');
        }
    }
}
