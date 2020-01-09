<?php

namespace App\Tests\Entity;

use App\Entity\Park;
use PHPUnit\Framework\TestCase;

class ParkTest extends TestCase
{
    /**
     * @expectedException \RangeException
     */
    public function testDoesNotAcceptInvalidStatus()
    {
        $invalidStatus = 5;

        $user = new Park();
        $user->setStatus($invalidStatus);
    }
}
