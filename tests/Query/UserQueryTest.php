<?php

namespace App\Tests\Query;

use App\Entity\Country;
use App\Entity\Park;
use App\Entity\User;
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

        $this->truncateEntities(
            [
                Park::class,
                User::class,
                Country::class,
            ]
        );
    }

    public function testEmptyQuery()
    {
        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(0, $result);
    }

    public function testParkStatusWaiting()
    {
        $user = $this->createTestUser();
        $country = $this->createTestCountry('FR', 'France', 'Paris');
        $park = $this->createTestPark(Park::STATUS__CREATED, $user, $country);

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(0, $result);

        $park->setStatus(Park::STATUS__WAITING);
        $this->em->flush();

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(1, $result);
    }

    public function testParkStatusActive()
    {
        $user = $this->createTestUser();
        $country = $this->createTestCountry('FR', 'France', 'Paris');
        $park = $this->createTestPark(Park::STATUS__CREATED, $user, $country);

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(0, $result);

        $park->setStatus(Park::STATUS__ACTIVE);
        $this->em->flush();

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(1, $result);
    }

    public function testCountryCodeFR()
    {
        $user = $this->createTestUser();
        $country = $this->createTestCountry('LV', 'Latvia', 'Riga');
        $country1 = $this->createTestCountry('FR', 'France', 'Paris');
        $this->createTestPark(Park::STATUS__ACTIVE, $user, $country);

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(0, $result);

        $this->createTestPark(Park::STATUS__ACTIVE, $user, $country1);
        $this->em->flush();

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(1, $result);
    }

    public function testCorrectSelectValues()
    {
        $user = $this->createTestUser();
        $country = $this->createTestCountry('FR', 'France', 'Paris');
         $this->createTestPark(Park::STATUS__ACTIVE, $user, $country);

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();

        $this->assertCount(1, $result);

        $firstResult = $result[0];

        $this->assertArrayHasKey('phoneNumber', $firstResult);
        $this->assertArrayHasKey('email', $firstResult);
        $this->assertArrayHasKey('countryName', $firstResult);
        $this->assertArrayHasKey('countryCapital', $firstResult);

        $this->assertEquals(122122, $firstResult['phoneNumber']);
        $this->assertEquals('testEmail', $firstResult['email']);

        // Checking if selects user's country data not park's
        $this->assertEquals('Russia', $firstResult['countryName']);
        $this->assertEquals('Moscow', $firstResult['countryCapital']);
    }

    public function testCorrectAmountOfResultsOnMultipleParks()
    {
        $user = $this->createTestUser();
        $country = $this->createTestCountry('FR', 'France', 'Paris');
        $this->createTestPark(Park::STATUS__ACTIVE, $user, $country);

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();
        $this->assertCount(1, $result);

        $this->createTestPark(Park::STATUS__ACTIVE, $user, $country);

        $result = $this->query->findUsersWithActiveOrWaitingParkInFrance();
        $this->assertCount(1, $result);
    }

    /**
     * @param int     $status
     * @param User    $user
     * @param Country $country
     *
     * @return Park
     */
    private function createTestPark(int $status, User $user, Country $country): Park
    {
        $park = new Park();
        $park->setUser($user);
        $park->setProxyId(1);
        $park->setCountry($country);
        $park->setSchedule(new \DateTime());
        $park->setPlannedOutgoingCalls(1);
        $park->setPlannedIncomingCalls(2);
        $park->setPin(1232);
        $park->setRegisteredNumber('registeredNumber');
        $park->setStatus($status);
        $park->setScheduledAt(new \DateTime());
        $park->setRegisteredAt(new \DateTime());
        $park->setAlreadyAbroad(true);
        $park->setCreatedAt(new \DateTime());

        $this->em->persist($park);
        $this->em->flush();

        return $park;
    }

    private function createTestUser(): User
    {
        $user = new User();
        $user->setCountry($this->createTestCountry('RU', 'Russia', 'Moscow'));
        $user->setPhoneNumber(122122);
        $user->setToken('token');
        $user->setSecret('secret');
        $user->setPin('pin');
        $user->setRegisteredAt(new \DateTime());
        $user->setAuthenticatedAt(new \DateTime());
        $user->setMya2billingCode('code');
        $user->setEmail('testEmail');
        $user->setNewPhoneNumber(2112111);
        $user->setCarrierId(1);
        $user->setNotifiedAt(new \DateTime());
        $user->setBalanceNotifications(1);
        $user->setPrevPin('prevPin');
        $user->setLastParkRequestAt(new \DateTime());
        $user->setSelectedDidId('selectedDidId');
        $user->setPromotionExpiresAt(new \DateTime());
        $user->setPromotionStatus(2);
        $user->setAdmin(false);
        $user->setR2r(false);
        $user->setF2g(false);
        $user->setUseSip(true);

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }


    /**
     * @param string $code
     * @param string $name
     * @param string $capital
     *
     * @return Country
     */
    private function createTestCountry(string $code, string $name, string $capital): Country
    {
        $country = new Country();
        $country->setAreaId(1);
        $country->setName($name);
        $country->setCode($code);
        $country->setRate(1.00);
        $country->setRegistrable(1);
        $country->setSupported(1);
        $country->setPrefix('prefix');
        $country->setExchangeRate(1.00);
        $country->setCurrency('currency');
        $country->setCurrencySymbol('$');
        $country->setCapital($capital);
        $country->setLinked(true);
        $country->setHappyDestination(true);
        $country->setR2r(true);

        $this->em->persist($country);
        $this->em->flush();

        return $country;
    }

    /**
     * @param array $entities
     *
     * @see https://symfonycasts.com/screencast/phpunit/control-database#clearing-the-database-before-tests
     */
    private function truncateEntities(array $entities)
    {
        $connection = $this->em->getConnection();
        $databasePlatform = $connection->getDatabasePlatform();
        if ($databasePlatform->supportsForeignKeyConstraints()) {
            $connection->query('SET FOREIGN_KEY_CHECKS=0');
        }
        foreach ($entities as $entity) {
            $query = $databasePlatform->getTruncateTableSQL(
                $this->em->getClassMetadata($entity)->getTableName()
            );
            $connection->executeUpdate($query);
        }
        if ($databasePlatform->supportsForeignKeyConstraints()) {
            $connection->query('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
