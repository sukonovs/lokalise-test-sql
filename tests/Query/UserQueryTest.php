<?php

namespace App\Tests\Query;

use App\Query\UserQuery;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserQueryTest extends WebTestCase
{
    public function testEmptyQuery()
    {
        $client = static::createClient();
        $container = $client->getContainer();

        $query = $container->get(UserQuery::class);
        $result = $query->findUsersWithActiveOrWaitingParkInFrance();
        
        $this->assertEmpty($result);
    }
}
