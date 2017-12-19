<?php

namespace Propel\Propel\Base;

use \Exception;
use \PDO;
use Propel\Propel\PopularTweets as ChildPopularTweets;
use Propel\Propel\PopularTweetsQuery as ChildPopularTweetsQuery;
use Propel\Propel\Map\PopularTweetsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'popular_tweets' table.
 *
 *
 *
 * @method     ChildPopularTweetsQuery orderByPopularTweetId($order = Criteria::ASC) Order by the popular_tweet_id column
 * @method     ChildPopularTweetsQuery orderByTweetPublicationHour($order = Criteria::ASC) Order by the tweet_publication_hour column
 * @method     ChildPopularTweetsQuery orderByIframe($order = Criteria::ASC) Order by the iframe column
 * @method     ChildPopularTweetsQuery orderByDepartmentCode($order = Criteria::ASC) Order by the department_code column
 * @method     ChildPopularTweetsQuery orderByIframeQuality($order = Criteria::ASC) Order by the iframe_quality column
 *
 * @method     ChildPopularTweetsQuery groupByPopularTweetId() Group by the popular_tweet_id column
 * @method     ChildPopularTweetsQuery groupByTweetPublicationHour() Group by the tweet_publication_hour column
 * @method     ChildPopularTweetsQuery groupByIframe() Group by the iframe column
 * @method     ChildPopularTweetsQuery groupByDepartmentCode() Group by the department_code column
 * @method     ChildPopularTweetsQuery groupByIframeQuality() Group by the iframe_quality column
 *
 * @method     ChildPopularTweetsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPopularTweetsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPopularTweetsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPopularTweetsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPopularTweetsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPopularTweetsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPopularTweets findOne(ConnectionInterface $con = null) Return the first ChildPopularTweets matching the query
 * @method     ChildPopularTweets findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPopularTweets matching the query, or a new ChildPopularTweets object populated from the query conditions when no match is found
 *
 * @method     ChildPopularTweets findOneByPopularTweetId(string $popular_tweet_id) Return the first ChildPopularTweets filtered by the popular_tweet_id column
 * @method     ChildPopularTweets findOneByTweetPublicationHour(string $tweet_publication_hour) Return the first ChildPopularTweets filtered by the tweet_publication_hour column
 * @method     ChildPopularTweets findOneByIframe(string $iframe) Return the first ChildPopularTweets filtered by the iframe column
 * @method     ChildPopularTweets findOneByDepartmentCode(int $department_code) Return the first ChildPopularTweets filtered by the department_code column
 * @method     ChildPopularTweets findOneByIframeQuality(string $iframe_quality) Return the first ChildPopularTweets filtered by the iframe_quality column *

 * @method     ChildPopularTweets requirePk($key, ConnectionInterface $con = null) Return the ChildPopularTweets by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPopularTweets requireOne(ConnectionInterface $con = null) Return the first ChildPopularTweets matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPopularTweets requireOneByPopularTweetId(string $popular_tweet_id) Return the first ChildPopularTweets filtered by the popular_tweet_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPopularTweets requireOneByTweetPublicationHour(string $tweet_publication_hour) Return the first ChildPopularTweets filtered by the tweet_publication_hour column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPopularTweets requireOneByIframe(string $iframe) Return the first ChildPopularTweets filtered by the iframe column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPopularTweets requireOneByDepartmentCode(int $department_code) Return the first ChildPopularTweets filtered by the department_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPopularTweets requireOneByIframeQuality(string $iframe_quality) Return the first ChildPopularTweets filtered by the iframe_quality column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPopularTweets[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPopularTweets objects based on current ModelCriteria
 * @method     ChildPopularTweets[]|ObjectCollection findByPopularTweetId(string $popular_tweet_id) Return ChildPopularTweets objects filtered by the popular_tweet_id column
 * @method     ChildPopularTweets[]|ObjectCollection findByTweetPublicationHour(string $tweet_publication_hour) Return ChildPopularTweets objects filtered by the tweet_publication_hour column
 * @method     ChildPopularTweets[]|ObjectCollection findByIframe(string $iframe) Return ChildPopularTweets objects filtered by the iframe column
 * @method     ChildPopularTweets[]|ObjectCollection findByDepartmentCode(int $department_code) Return ChildPopularTweets objects filtered by the department_code column
 * @method     ChildPopularTweets[]|ObjectCollection findByIframeQuality(string $iframe_quality) Return ChildPopularTweets objects filtered by the iframe_quality column
 * @method     ChildPopularTweets[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PopularTweetsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Propel\Base\PopularTweetsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\Propel\\PopularTweets', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPopularTweetsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPopularTweetsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPopularTweetsQuery) {
            return $criteria;
        }
        $query = new ChildPopularTweetsQuery();
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
     * @return ChildPopularTweets|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PopularTweetsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PopularTweetsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPopularTweets A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT popular_tweet_id, tweet_publication_hour, iframe, department_code, iframe_quality FROM popular_tweets WHERE popular_tweet_id = :p0';
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
            /** @var ChildPopularTweets $obj */
            $obj = new ChildPopularTweets();
            $obj->hydrate($row);
            PopularTweetsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPopularTweets|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPopularTweetsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PopularTweetsTableMap::COL_POPULAR_TWEET_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPopularTweetsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PopularTweetsTableMap::COL_POPULAR_TWEET_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the popular_tweet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPopularTweetId(1234); // WHERE popular_tweet_id = 1234
     * $query->filterByPopularTweetId(array(12, 34)); // WHERE popular_tweet_id IN (12, 34)
     * $query->filterByPopularTweetId(array('min' => 12)); // WHERE popular_tweet_id > 12
     * </code>
     *
     * @param     mixed $popularTweetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPopularTweetsQuery The current query, for fluid interface
     */
    public function filterByPopularTweetId($popularTweetId = null, $comparison = null)
    {
        if (is_array($popularTweetId)) {
            $useMinMax = false;
            if (isset($popularTweetId['min'])) {
                $this->addUsingAlias(PopularTweetsTableMap::COL_POPULAR_TWEET_ID, $popularTweetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($popularTweetId['max'])) {
                $this->addUsingAlias(PopularTweetsTableMap::COL_POPULAR_TWEET_ID, $popularTweetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PopularTweetsTableMap::COL_POPULAR_TWEET_ID, $popularTweetId, $comparison);
    }

    /**
     * Filter the query on the tweet_publication_hour column
     *
     * Example usage:
     * <code>
     * $query->filterByTweetPublicationHour('2011-03-14'); // WHERE tweet_publication_hour = '2011-03-14'
     * $query->filterByTweetPublicationHour('now'); // WHERE tweet_publication_hour = '2011-03-14'
     * $query->filterByTweetPublicationHour(array('max' => 'yesterday')); // WHERE tweet_publication_hour > '2011-03-13'
     * </code>
     *
     * @param     mixed $tweetPublicationHour The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPopularTweetsQuery The current query, for fluid interface
     */
    public function filterByTweetPublicationHour($tweetPublicationHour = null, $comparison = null)
    {
        if (is_array($tweetPublicationHour)) {
            $useMinMax = false;
            if (isset($tweetPublicationHour['min'])) {
                $this->addUsingAlias(PopularTweetsTableMap::COL_TWEET_PUBLICATION_HOUR, $tweetPublicationHour['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tweetPublicationHour['max'])) {
                $this->addUsingAlias(PopularTweetsTableMap::COL_TWEET_PUBLICATION_HOUR, $tweetPublicationHour['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PopularTweetsTableMap::COL_TWEET_PUBLICATION_HOUR, $tweetPublicationHour, $comparison);
    }

    /**
     * Filter the query on the iframe column
     *
     * Example usage:
     * <code>
     * $query->filterByIframe('fooValue');   // WHERE iframe = 'fooValue'
     * $query->filterByIframe('%fooValue%', Criteria::LIKE); // WHERE iframe LIKE '%fooValue%'
     * </code>
     *
     * @param     string $iframe The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPopularTweetsQuery The current query, for fluid interface
     */
    public function filterByIframe($iframe = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iframe)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PopularTweetsTableMap::COL_IFRAME, $iframe, $comparison);
    }

    /**
     * Filter the query on the department_code column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentCode(1234); // WHERE department_code = 1234
     * $query->filterByDepartmentCode(array(12, 34)); // WHERE department_code IN (12, 34)
     * $query->filterByDepartmentCode(array('min' => 12)); // WHERE department_code > 12
     * </code>
     *
     * @param     mixed $departmentCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPopularTweetsQuery The current query, for fluid interface
     */
    public function filterByDepartmentCode($departmentCode = null, $comparison = null)
    {
        if (is_array($departmentCode)) {
            $useMinMax = false;
            if (isset($departmentCode['min'])) {
                $this->addUsingAlias(PopularTweetsTableMap::COL_DEPARTMENT_CODE, $departmentCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departmentCode['max'])) {
                $this->addUsingAlias(PopularTweetsTableMap::COL_DEPARTMENT_CODE, $departmentCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PopularTweetsTableMap::COL_DEPARTMENT_CODE, $departmentCode, $comparison);
    }

    /**
     * Filter the query on the iframe_quality column
     *
     * Example usage:
     * <code>
     * $query->filterByIframeQuality('fooValue');   // WHERE iframe_quality = 'fooValue'
     * $query->filterByIframeQuality('%fooValue%', Criteria::LIKE); // WHERE iframe_quality LIKE '%fooValue%'
     * </code>
     *
     * @param     string $iframeQuality The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPopularTweetsQuery The current query, for fluid interface
     */
    public function filterByIframeQuality($iframeQuality = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iframeQuality)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PopularTweetsTableMap::COL_IFRAME_QUALITY, $iframeQuality, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPopularTweets $popularTweets Object to remove from the list of results
     *
     * @return $this|ChildPopularTweetsQuery The current query, for fluid interface
     */
    public function prune($popularTweets = null)
    {
        if ($popularTweets) {
            $this->addUsingAlias(PopularTweetsTableMap::COL_POPULAR_TWEET_ID, $popularTweets->getPopularTweetId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the popular_tweets table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PopularTweetsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PopularTweetsTableMap::clearInstancePool();
            PopularTweetsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PopularTweetsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PopularTweetsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PopularTweetsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PopularTweetsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PopularTweetsQuery
