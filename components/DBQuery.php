<?php

namespace components;

class DBQuery implements DBQueryInterface
{
    protected $instancePDO, $dbConnection, $startTime, $endTime;

    /**
     * Create new instance DBQuery.
     *
     * @param DBConnectionInterface $DBConnection
     */
    public function __construct(DBConnectionInterface $DBConnection)
    {
        $this->instancePDO = $DBConnection->getPdoInstance();
        $this->dbConnection = $DBConnection;
    }

    /**
     * Returns the DBConnection instance.
     *
     * @return DBConnectionInterface
     */
    public function getDBConnection()
    {
        if ($this->dbConnection != null) {
            return $this->dbConnection;
        }
    }

    /**
     * Change DBConnection.
     *
     * @param DBConnectionInterface $DBConnection
     *
     * @return void
     */
    public function setDBConnection(DBConnectionInterface $DBConnection)
    {
        if ($this->dbConnection != null) {
            $this->instancePDO = $DBConnection->getPdoInstance();
            $this->dbConnection = $DBConnection;
        }
    }

    /**
     * Executes the SQL statement and returns query result.
     *
     * @param string $query sql query
     * @param array $params input parameters (name=>value) for the SQL execution
     *
     * @return mixed if successful, returns a PDOStatement on error false
     */
    public function query($query, $params = null)
    {
        try {
            $this->startTime = microtime(true);
            $prep = $this->instancePDO->prepare($query);
            $prep->execute($params);
            $this->endTime = microtime(true);
            return $prep;
        } catch (\PDOException $e) {
            return false;
        }
    }

    /**
     * Executes the SQL statement and returns all rows of a result set as an associative array
     *
     * @param string $query sql query
     * @param array $params input parameters (name=>value) for the SQL execution
     *
     * @return array
     */
    public function queryAll($query, array $params = null)
    {
        $prep = $this->query($query, $params);
        if (!$prep) {
            return false;
        } else {
            return $prep->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    /**
     * Executes the SQL statement returns the first row of the query result
     *
     * @param string $query sql query
     * @param array $params input parameters (name=>value) for the SQL execution
     *
     * @return array
     */
    public function queryRow($query, array $params = null)
    {
        $prep = $this->query($query, $params);
        if (!$prep) {
            return false;
        } else {
            return $prep->fetch(\PDO::FETCH_ASSOC);
        }
    }

    /**
     * Executes the SQL statement and returns the first column of the query result.
     *
     * @param string $query sql query
     * @param array $params input parameters (name=>value) for the SQL execution
     *
     * @return array
     */
    public function queryColumn($query, array $params = null)
    {
        $prep = $this->query($query, $params);
        if (!$prep) {
            return false;
        } else {
            return $prep->fetchColumn(\PDO::FETCH_COLUMN);
        }
    }

    /**
     * Executes the SQL statement and returns the first field of the first row of the result.
     *
     * @param string $query sql query
     * @param array $params input parameters (name=>value) for the SQL execution
     *
     * @return mixed  column value
     */
    public function queryScalar($query, array $params = null)
    {
        $prep = $this->query($query, $params);
        if (!$prep) {
            return false;
        } else {
            return $prep->fetch(\PDO::FETCH_COLUMN);
        }
    }

    /**
     * Executes the SQL statement.
     * This method is meant only for executing non-query SQL statement.
     * No result set will be returned.
     *
     * @param string $query sql query
     * @param array $params input parameters (name=>value) for the SQL execution
     *
     * @return integer number of rows affected by the execution.
     */
    public function execute($query, array $params = null)
    {
        $prep = $this->query($query, $params);
        if (!$prep) {
            return false;
        } else {
            return $prep->rowCount();
        }
    }

    /**
     * Returns the last query execution time in seconds
     *
     * @return float query time in seconds
     */
    public function getLastQueryTime()
    {
        return $this->endTime - $this->startTime;
    }
}