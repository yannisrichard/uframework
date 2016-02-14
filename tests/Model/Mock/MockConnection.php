<?php

class MockConnection extends \Model\Database\Connection
{
    public function __construct()
    {
    }

    public function executeQuery($query, array $parameters = [])
    {
        $stmt = $this->prepare($query);
        foreach ($parameters as $name => $value) {
            $stmt->bindValue($name, $value);
        }

        return $stmt;
    }
}
