<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Collect\Collect;

class CollectTest extends TestCase
{
    // Тесты для метода pop()
    public function testPopRemovesLastElement()
    {
        $collect = new Collect([10, 20, 30]);
        $result = $collect->pop();
        
        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals([10, 20], $collect->toArray());
    }

    public function testPopOnEmptyCollection()
    {
        $collect = new Collect([]);
        $result = $collect->pop();
        
        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals([], $collect->toArray());
    }

    // Тесты для метода splice()
    public function testSpliceRemovesElements()
    {
        $collect = new Collect([10, 20, 30, 40]);
        $result = $collect->splice(1, 2);
        
        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals([10], $collect->toArray());
    }

    // Тесты для метода keys()
    public function testKeysReturnsArrayKeys()
    {
        $collect = new Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $result = $collect->keys();
        
        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals(['a', 'b', 'c'], $result->toArray());
    }

    public function testKeysWithNumericIndices()
    {
        $collect = new Collect([10, 20, 30]);
        $result = $collect->keys();
        
        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals([0, 1, 2], $result->toArray());
    }

    // Тесты для метода first()
    public function testFirstReturnsFirstElement()
    {
        $collect = new Collect([100, 200, 300]);
        $result = $collect->first();
        
        $this->assertEquals(100, $result);
    }

    public function testFirstOnEmptyCollection()
    {
        $collect = new Collect([]);
        $result = $collect->first();
        
        $this->assertNull($result);
    }
}