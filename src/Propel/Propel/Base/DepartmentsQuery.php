<?php

namespace Propel\Propel\Base;

use \Exception;
use \PDO;
use Propel\Propel\Departments as ChildDepartments;
use Propel\Propel\DepartmentsQuery as ChildDepartmentsQuery;
use Propel\Propel\Map\DepartmentsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'departments' table.
 *
 *
 *
 * @method     ChildDepartmentsQuery orderByDepartmentId($order = Criteria::ASC) Order by the department_id column
 * @method     ChildDepartmentsQuery orderByDepartmentCode($order = Criteria::ASC) Order by the department_code column
 * @method     ChildDepartmentsQuery orderByDepartmentName($order = Criteria::ASC) Order by the department_name column
 *
 * @method     ChildDepartmentsQuery groupByDepartmentId() Group by the department_id column
 * @method     ChildDepartmentsQuery groupByDepartmentCode() Group by the department_code column
 * @method     ChildDepartmentsQuery groupByDepartmentName() Group by the department_name column
 *
 * @method     ChildDepartmentsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDepartmentsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDepartmentsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDepartmentsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDepartmentsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDepartmentsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDepartmentsQuery leftJoinDepartmentSummary($relationAlias = null) Adds a LEFT JOIN clause to the query using the DepartmentSummary relation
 * @method     ChildDepartmentsQuery rightJoinDepartmentSummary($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DepartmentSummary relation
 * @method     ChildDepartmentsQuery innerJoinDepartmentSummary($relationAlias = null) Adds a INNER JOIN clause to the query using the DepartmentSummary relation
 *
 * @method     ChildDepartmentsQuery joinWithDepartmentSummary($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DepartmentSummary relation
 *
 * @method     ChildDepartmentsQuery leftJoinWithDepartmentSummary() Adds a LEFT JOIN clause and with to the query using the DepartmentSummary relation
 * @method     ChildDepartmentsQuery rightJoinWithDepartmentSummary() Adds a RIGHT JOIN clause and with to the query using the DepartmentSummary relation
 * @method     ChildDepartmentsQuery innerJoinWithDepartmentSummary() Adds a INNER JOIN clause and with to the query using the DepartmentSummary relation
 *
 * @method     ChildDepartmentsQuery leftJoinGeocodes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Geocodes relation
 * @method     ChildDepartmentsQuery rightJoinGeocodes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Geocodes relation
 * @method     ChildDepartmentsQuery innerJoinGeocodes($relationAlias = null) Adds a INNER JOIN clause to the query using the Geocodes relation
 *
 * @method     ChildDepartmentsQuery joinWithGeocodes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Geocodes relation
 *
 * @method     ChildDepartmentsQuery leftJoinWithGeocodes() Adds a LEFT JOIN clause and with to the query using the Geocodes relation
 * @method     ChildDepartmentsQuery rightJoinWithGeocodes() Adds a RIGHT JOIN clause and with to the query using the Geocodes relation
 * @method     ChildDepartmentsQuery innerJoinWithGeocodes() Adds a INNER JOIN clause and with to the query using the Geocodes relation
 *
 * @method     \Propel\Propel\DepartmentSummaryQuery|\Propel\Propel\GeocodesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDepartments findOne(ConnectionInterface $con = null) Return the first ChildDepartments matching the query
 * @method     ChildDepartments findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDepartments matching the query, or a new ChildDepartments object populated from the query conditions when no match is found
 *
 * @method     ChildDepartments findOneByDepartmentId(int $department_id) Return the first ChildDepartments filtered by the department_id column
 * @method     ChildDepartments findOneByDepartmentCode(string $department_code) Return the first ChildDepartments filtered by the department_code column
 * @method     ChildDepartments findOneByDepartmentName(string $department_name) Return the first ChildDepartments filtered by the department_name column *

 * @method     ChildDepartments requirePk($key, ConnectionInterface $con = null) Return the ChildDepartments by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartments requireOne(ConnectionInterface $con = null) Return the first ChildDepartments matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDepartments requireOneByDepartmentId(int $department_id) Return the first ChildDepartments filtered by the department_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartments requireOneByDepartmentCode(string $department_code) Return the first ChildDepartments filtered by the department_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartments requireOneByDepartmentName(string $department_name) Return the first ChildDepartments filtered by the department_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDepartments[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDepartments objects based on current ModelCriteria
 * @method     ChildDepartments[]|ObjectCollection findByDepartmentId(int $department_id) Return ChildDepartments objects filtered by the department_id column
 * @method     ChildDepartments[]|ObjectCollection findByDepartmentCode(string $department_code) Return ChildDepartments objects filtered by the department_code column
 * @method     ChildDepartments[]|ObjectCollection findByDepartmentName(string $department_name) Return ChildDepartments objects filtered by the department_name column
 * @method     ChildDepartments[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DepartmentsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Propel\Base\DepartmentsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\Propel\\Departments', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDepartmentsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDepartmentsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDepartmentsQuery) {
            return $criteria;
        }
        $query = new ChildDepartmentsQuery();
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
     * @return ChildDepartments|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DepartmentsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DepartmentsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDepartments A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT department_id, department_code, department_name FROM departments WHERE department_id = :p0';
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
            /** @var ChildDepartments $obj */
            $obj = new ChildDepartments();
            $obj->hydrate($row);
            DepartmentsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDepartments|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDepartmentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDepartmentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDepartmentsQuery The current query, for fluid interface
     */
    public function filterByDepartmentId($departmentId = null, $comparison = null)
    {
        if (is_array($departmentId)) {
            $useMinMax = false;
            if (isset($departmentId['min'])) {
                $this->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_ID, $departmentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departmentId['max'])) {
                $this->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_ID, $departmentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_ID, $departmentId, $comparison);
    }

    /**
     * Filter the query on the department_code column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentCode('fooValue');   // WHERE department_code = 'fooValue'
     * $query->filterByDepartmentCode('%fooValue%', Criteria::LIKE); // WHERE department_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $departmentCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentsQuery The current query, for fluid interface
     */
    public function filterByDepartmentCode($departmentCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departmentCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_CODE, $departmentCode, $comparison);
    }

    /**
     * Filter the query on the department_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentName('fooValue');   // WHERE department_name = 'fooValue'
     * $query->filterByDepartmentName('%fooValue%', Criteria::LIKE); // WHERE department_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $departmentName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentsQuery The current query, for fluid interface
     */
    public function filterByDepartmentName($departmentName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departmentName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_NAME, $departmentName, $comparison);
    }

    /**
     * Filter the query by a related \Propel\Propel\DepartmentSummary object
     *
     * @param \Propel\Propel\DepartmentSummary|ObjectCollection $departmentSummary The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDepartmentsQuery The current query, for fluid interface
     */
    public function filterByDepartmentSummary($departmentSummary, $comparison = null)
    {
        if ($departmentSummary instanceof \Propel\Propel\DepartmentSummary) {
            return $this
                ->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_CODE, $departmentSummary->getDepartmentCode(), $comparison);
        } elseif ($departmentSummary instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_CODE, $departmentSummary->toKeyValue('PrimaryKey', 'DepartmentCode'), $comparison);
        } else {
            throw new PropelException('filterByDepartmentSummary() only accepts arguments of type \Propel\Propel\DepartmentSummary or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DepartmentSummary relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDepartmentsQuery The current query, for fluid interface
     */
    public function joinDepartmentSummary($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DepartmentSummary');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DepartmentSummary');
        }

        return $this;
    }

    /**
     * Use the DepartmentSummary relation DepartmentSummary object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\Propel\DepartmentSummaryQuery A secondary query class using the current class as primary query
     */
    public function useDepartmentSummaryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDepartmentSummary($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DepartmentSummary', '\Propel\Propel\DepartmentSummaryQuery');
    }

    /**
     * Filter the query by a related \Propel\Propel\Geocodes object
     *
     * @param \Propel\Propel\Geocodes|ObjectCollection $geocodes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDepartmentsQuery The current query, for fluid interface
     */
    public function filterByGeocodes($geocodes, $comparison = null)
    {
        if ($geocodes instanceof \Propel\Propel\Geocodes) {
            return $this
                ->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_ID, $geocodes->getDepartmentId(), $comparison);
        } elseif ($geocodes instanceof ObjectCollection) {
            return $this
                ->useGeocodesQuery()
                ->filterByPrimaryKeys($geocodes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGeocodes() only accepts arguments of type \Propel\Propel\Geocodes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Geocodes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDepartmentsQuery The current query, for fluid interface
     */
    public function joinGeocodes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Geocodes');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Geocodes');
        }

        return $this;
    }

    /**
     * Use the Geocodes relation Geocodes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\Propel\GeocodesQuery A secondary query class using the current class as primary query
     */
    public function useGeocodesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGeocodes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Geocodes', '\Propel\Propel\GeocodesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDepartments $departments Object to remove from the list of results
     *
     * @return $this|ChildDepartmentsQuery The current query, for fluid interface
     */
    public function prune($departments = null)
    {
        if ($departments) {
            $this->addUsingAlias(DepartmentsTableMap::COL_DEPARTMENT_ID, $departments->getDepartmentId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the departments table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DepartmentsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DepartmentsTableMap::clearInstancePool();
            DepartmentsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DepartmentsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DepartmentsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DepartmentsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DepartmentsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DepartmentsQuery
