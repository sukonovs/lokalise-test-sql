<?php

namespace App\Query;

use App\Entity\Park;
use Doctrine\DBAL\Connection;

class UserQuery
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function findUsersWithActiveOrWaitingParkInFrance()
    {
        $query = '
            SELECT user.phone_number as phoneNumber,
                   user.email,
                   user_country.name as countryName,
                   user_country.capital as countryCapital
            FROM user
                     JOIN park on user.id = user_id
                     JOIN country park_country on park.country_id = park_country.id
                     JOIN country user_country on user.country_id = user_country.id
            WHERE park_country.code = :code
              AND park.status IN (:statuses)
            GROUP BY user.id
        ';

        $params = [
            'statuses' => [
                Park::STATUS__ACTIVE,
                Park::STATUS__WAITING,
            ],
            'code' => 'FR'
        ];

        $types = [
            'statuses' => Connection::PARAM_INT_ARRAY,
            'code' => \PDO::PARAM_INT,

        ];

        $statement = $this->connection->executeQuery($query, $params, $types);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
