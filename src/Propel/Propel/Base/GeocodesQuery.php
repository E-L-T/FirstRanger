<?php

namespace Propel\Propel\Base;

use \Exception;
use \PDO;
use Propel\Propel\Geocodes as ChildGeocodes;
use Propel\Propel\GeocodesQuery as ChildGeocodesQuery;
use Propel\Propel\Map\GeocodesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'geocodes' table.
 *
 *
 *
 * @method     ChildGeocodesQuery orderByGeocodeId($order = Criteria::ASC) Order by the geocode_id column
 * @method     ChildGeocodesQuery orderByGeocodeName($order = Criteria::ASC) Order by the geocode_name column
 * @method     ChildGeocodesQuery orderByDepartmentId($order = Criteria::ASC) Order by the department_id column
 * @method     ChildGeocodesQuery orderByGeocode($order = Criteria::ASC) Order by the geocode column
 *
 * @method     ChildGeocodesQuery groupByGeocodeId() Group by the geocode_id column
 * @method     ChildGeocodesQuery groupByGeocodeName() Group by the geocode_name column
 * @method     ChildGeocodesQuery groupByDepartmentId() Group by the department_id column
 * @method     ChildGeocodesQuery groupByGeocode() Group by the geocode column
 *
 * @method     ChildGeocodesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGeocodesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGeocodesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGeocodesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGeocodesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGeocodesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGeocodes findOne(ConnectionInterface $con = null) Return the first ChildGeocodes matching the query
 * @method     ChildGeocodes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGeocodes matching the query, or a new ChildGeocodes object populated from the query conditions when no match is found
 *
 * @method     ChildGeocodes findOneByGeocodeId(int $geocode_id) Return the first ChildGeocodes filtered by the geocode_id column
 * @method     ChildGeocodes findOneByGeocodeName(string $geocode_name) Return the first ChildGeocodes filtered by the geocode_name column
 * @method     ChildGeocodes findOneByDepartmentId(int $department_id) Return the first ChildGeocodes filtered by the department_id column
 * @method     ChildGeocodes findOneByGeocode(string $geocode) Return the first ChildGeocodes filtered by the geocode column *

 * @method     ChildGeocodes requirePk($key, ConnectionInterface $con = null) Return the ChildGeocodes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeocodes requireOne(ConnectionInterface $con = null) Return the first ChildGeocodes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGeocodes requireOneByGeocodeId(int $geocode_id) Return the first ChildGeocodes filtered by the geocode_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeocodes requireOneByGeocodeName(string $geocode_name) Return the first ChildGeocodes filtered by the geocode_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeocodes requireOneByDepartmentId(int $department_id) Return the first ChildGeocodes filtered by the department_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeocodes requireOneByGeocode(string $geocode) Return the first ChildGeocodes filtered by the geocode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGeocodes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGeocodes objects based on current ModelCriteria
 * @method     ChildGeocodes[]|ObjectCollection findByGeocodeId(int $geocode_id) Return ChildGeocodes objects filtered by the geocode_id column
 * @method     ChildGeocodes[]|ObjectCollection findByGeocodeName(string $geocode_name) Return ChildGeocodes objects filtered by the geocode_name column
 * @method     ChildGeocodes[]|ObjectCollection findByDepartmentId(int $department_id) Return ChildGeocodes objects filtered by the department_id column
 * @method     ChildGeocodes[]|ObjectCollection findByGeocode(string $geocode) Return ChildGeocodes objects filtered by the geocode column
 * @method     ChildGeocodes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GeocodesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Propel\Base\GeocodesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\Propel\\Geocodes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGeocodesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGeocodesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGeocodesQuery) {
            return $criteria;
        }
        $query = new ChildGeocodesQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildGeocodes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GeocodesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GeocodesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGeocodes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT geocode_id, geocode_name, department_id, geocode FROM geocodes WHERE geocode_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildGeocodes $obj */
            $obj = new ChildGeocodes();
            $obj->hydrate($row);
            GeocodesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildGeocodes|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildGeocodesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GeocodesTableMap::COL_GEOCODE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGeocodesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GeocodesTableMap::COL_GEOCODE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the geocode_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGeocodeId(1234); // WHERE geocode_id = 1234
     * $query->filterByGeocodeId(array(12, 34)); // WHERE geocode_id IN (12, 34)
     * $query->filterByGeocodeId(array('min' => 12)); // WHERE geocode_id > 12
     * </code>
     *
     * @param     mixed $geocodeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeocodesQuery The current query, for fluid interface
     */
    public function filterByGeocodeId($geocodeId = null, $comparison = null)
    {
        if (is_array($geocodeId)) {
            $useMinMax = false;
            if (isset($geocodeId['min'])) {
                $this->addUsingAlias(GeocodesTableMap::COL_GEOCODE_ID, $geocodeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geocodeId['max'])) {
                $this->addUsingAlias(GeocodesTableMap::COL_GEOCODE_ID, $geocodeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeocodesTableMap::COL_GEOCODE_ID, $geocodeId, $comparison);
    }

    /**
     * Filter the query on the geocode_name column
     *
     * Example usage:
     * <code>
     * $query->filterByGeocodeName('fooValue');   // WHERE geocode_name = 'fooValue'
     * $query->filterByGeocodeName('%fooValue%', Criteria::LIKE); // WHERE geocode_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $geocodeName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeocodesQuery The current query, for fluid interface
     */
    public function filterByGeocodeName($geocodeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($geocodeName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeocodesTableMap::COL_GEOCODE_NAME, $geocodeName, $comparison);
    }

    /**
     * Filter the query on the department_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentId(1234); // WHERE department_id = 1234
     * $query->filterByDepartmentId(array(12, 34)); // WHERE department_id IN (12, 34)
     * $query->filterByDepartmentId(array('min' => 12)); // WHERE department_id > 12
     * </code>
     *
     * @param     mixed $departmentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeocodesQuery The current query, for fluid interface
     */
    public function filterByDepartmentId($departmentId = null, $comparison = null)
    {
        if (is_array($departmentId)) {
            $useMinMax = false;
            if (isset($departmentId['min'])) {
                $this->addUsingAlias(GeocodesTableMap::COL_DEPARTMENT_ID, $departmentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departmentId['max'])) {
                $this->addUsingAlias(GeocodesTableMap::COL_DEPARTMENT_ID, $departmentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeocodesTableMap::COL_DEPARTMENT_ID, $departmentId, $comparison);
    }

    /**
     * Filter the query on the geocode column
     *
     * Example usage:
     * <code>
     * $query->filterByGeocode('fooValue');   // WHERE geocode = 'fooValue'
     * $query->filterByGeocode('%fooValue%', Criteria::LIKE); // WHERE geocode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $geocode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeocodesQuery The current query, for fluid interface
     */
    public function filterByGeocode($geocode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($geocode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeocodesTableMap::COL_GEOCODE, $geocode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGeocodes $geocodes Object to remove from the list of results
     *
     * @return $this|ChildGeocodesQuery The current query, for fluid interface
     */
    public function prune($geocodes = null)
    {
        if ($geocodes) {
            $this->addUsingAlias(GeocodesTableMap::COL_GEOCODE_ID, $geocodes->getGeocodeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the geocodes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GeocodesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GeocodesTableMap::clearInstancePool();
            GeocodesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GeocodesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GeocodesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GeocodesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GeocodesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GeocodesQuery
