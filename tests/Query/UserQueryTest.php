<?php

namespace App\Tests\Query;

use App\Entity\Country;
use App\Entity\Park;
use App\Query\UserQuery;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserQueryTest extends WebTestCase
{
    /**
     * @var UserQuery
     */
    public $query;
    
    /**
     * @var EntityManagerInterface
     */
    private $em;

    protected function setUp()
    {
        self::bootKernel();

        $this->query = self::$container->get(UserQuery::class);
        $this->em = self::$container->get(EntityManagerInterface::class);
    }

    public function testEmptyQuery()
    {
        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(0, $result);
    }

    public function testParkStatusWaiting()
    {
        $this->markTestSkipped();

        $park = new Park();

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(0, $result);

        $park->setStatus(Park::STATUS__WAITING);
        $this->em->flush();

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(1, $result);
    }

    public function testParkStatusActive()
    {
        $this->markTestSkipped();

        $park = new Park();

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(0, $result);

        $park->setStatus(Park::STATUS__ACTIVE);
        $this->em->flush();

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(1, $result);
    }

    public function testCountryCodeFR()
    {
        $this->markTestSkipped();

        $park = new Park();

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(0, $result);
        
        $country = new Country();

        $park->setCountry($country);
        $this->em->flush();

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(1, $result);
    }

    public function testCorrectSelectValues()
    {
        $this->markTestSkipped();

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(1, $result);

        $firstResult = $result[0];

        $this->assertArrayHasKey('phoneNumber', $firstResult);
        $this->assertArrayHasKey('email', $firstResult);
        $this->assertArrayHasKey('countryName', $firstResult);
        $this->assertArrayHasKey('countryCapital', $firstResult);

        // Checking if selects user's country data not park's
        $this->assertEquals('Russia', $firstResult['countryName']);
        $this->assertEquals('Moscow', $firstResult['countryCapital']);
    }
}
