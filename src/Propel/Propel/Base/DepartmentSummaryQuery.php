<?php

namespace Propel\Propel\Base;

use \Exception;
use \PDO;
use Propel\Propel\DepartmentSummary as ChildDepartmentSummary;
use Propel\Propel\DepartmentSummaryQuery as ChildDepartmentSummaryQuery;
use Propel\Propel\Map\DepartmentSummaryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'department_summary' table.
 *
 *
 *
 * @method     ChildDepartmentSummaryQuery orderByDepartmentSummaryId($order = Criteria::ASC) Order by the department_summary_id column
 * @method     ChildDepartmentSummaryQuery orderByMapPublicationHour($order = Criteria::ASC) Order by the map_publication_hour column
 * @method     ChildDepartmentSummaryQuery orderByDepartmentCode($order = Criteria::ASC) Order by the department_code column
 * @method     ChildDepartmentSummaryQuery orderByDepartmentPositiveTweetsQuantity($order = Criteria::ASC) Order by the department_positive_tweets_quantity column
 * @method     ChildDepartmentSummaryQuery orderByDepartmentNegativeTweetsQuantity($order = Criteria::ASC) Order by the department_negative_tweets_quantity column
 * @method     ChildDepartmentSummaryQuery orderByDepartmentNeutralTweetsQuantity($order = Criteria::ASC) Order by the department_neutral_tweets_quantity column
 * @method     ChildDepartmentSummaryQuery orderByPositivePopularTweetId($order = Criteria::ASC) Order by the positive_popular_tweet_id column
 * @method     ChildDepartmentSummaryQuery orderByNegativePopularTweetId($order = Criteria::ASC) Order by the negative_popular_tweet_id column
 * @method     ChildDepartmentSummaryQuery orderByDepartmentTwitterSharesQuantity($order = Criteria::ASC) Order by the department_twitter_shares_quantity column
 * @method     ChildDepartmentSummaryQuery orderByDepartmentFacebookSharesQuantity($order = Criteria::ASC) Order by the department_facebook_shares_quantity column
 * @method     ChildDepartmentSummaryQuery orderByPositiveTwitterAccount($order = Criteria::ASC) Order by the positive_twitter_account column
 * @method     ChildDepartmentSummaryQuery orderByNegativeTwitterAccount($order = Criteria::ASC) Order by the negative_twitter_account column
 *
 * @method     ChildDepartmentSummaryQuery groupByDepartmentSummaryId() Group by the department_summary_id column
 * @method     ChildDepartmentSummaryQuery groupByMapPublicationHour() Group by the map_publication_hour column
 * @method     ChildDepartmentSummaryQuery groupByDepartmentCode() Group by the department_code column
 * @method     ChildDepartmentSummaryQuery groupByDepartmentPositiveTweetsQuantity() Group by the department_positive_tweets_quantity column
 * @method     ChildDepartmentSummaryQuery groupByDepartmentNegativeTweetsQuantity() Group by the department_negative_tweets_quantity column
 * @method     ChildDepartmentSummaryQuery groupByDepartmentNeutralTweetsQuantity() Group by the department_neutral_tweets_quantity column
 * @method     ChildDepartmentSummaryQuery groupByPositivePopularTweetId() Group by the positive_popular_tweet_id column
 * @method     ChildDepartmentSummaryQuery groupByNegativePopularTweetId() Group by the negative_popular_tweet_id column
 * @method     ChildDepartmentSummaryQuery groupByDepartmentTwitterSharesQuantity() Group by the department_twitter_shares_quantity column
 * @method     ChildDepartmentSummaryQuery groupByDepartmentFacebookSharesQuantity() Group by the department_facebook_shares_quantity column
 * @method     ChildDepartmentSummaryQuery groupByPositiveTwitterAccount() Group by the positive_twitter_account column
 * @method     ChildDepartmentSummaryQuery groupByNegativeTwitterAccount() Group by the negative_twitter_account column
 *
 * @method     ChildDepartmentSummaryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDepartmentSummaryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDepartmentSummaryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDepartmentSummaryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDepartmentSummaryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDepartmentSummaryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDepartmentSummary findOne(ConnectionInterface $con = null) Return the first ChildDepartmentSummary matching the query
 * @method     ChildDepartmentSummary findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDepartmentSummary matching the query, or a new ChildDepartmentSummary object populated from the query conditions when no match is found
 *
 * @method     ChildDepartmentSummary findOneByDepartmentSummaryId(int $department_summary_id) Return the first ChildDepartmentSummary filtered by the department_summary_id column
 * @method     ChildDepartmentSummary findOneByMapPublicationHour(string $map_publication_hour) Return the first ChildDepartmentSummary filtered by the map_publication_hour column
 * @method     ChildDepartmentSummary findOneByDepartmentCode(string $department_code) Return the first ChildDepartmentSummary filtered by the department_code column
 * @method     ChildDepartmentSummary findOneByDepartmentPositiveTweetsQuantity(int $department_positive_tweets_quantity) Return the first ChildDepartmentSummary filtered by the department_positive_tweets_quantity column
 * @method     ChildDepartmentSummary findOneByDepartmentNegativeTweetsQuantity(int $department_negative_tweets_quantity) Return the first ChildDepartmentSummary filtered by the department_negative_tweets_quantity column
 * @method     ChildDepartmentSummary findOneByDepartmentNeutralTweetsQuantity(int $department_neutral_tweets_quantity) Return the first ChildDepartmentSummary filtered by the department_neutral_tweets_quantity column
 * @method     ChildDepartmentSummary findOneByPositivePopularTweetId(string $positive_popular_tweet_id) Return the first ChildDepartmentSummary filtered by the positive_popular_tweet_id column
 * @method     ChildDepartmentSummary findOneByNegativePopularTweetId(string $negative_popular_tweet_id) Return the first ChildDepartmentSummary filtered by the negative_popular_tweet_id column
 * @method     ChildDepartmentSummary findOneByDepartmentTwitterSharesQuantity(int $department_twitter_shares_quantity) Return the first ChildDepartmentSummary filtered by the department_twitter_shares_quantity column
 * @method     ChildDepartmentSummary findOneByDepartmentFacebookSharesQuantity(int $department_facebook_shares_quantity) Return the first ChildDepartmentSummary filtered by the department_facebook_shares_quantity column
 * @method     ChildDepartmentSummary findOneByPositiveTwitterAccount(string $positive_twitter_account) Return the first ChildDepartmentSummary filtered by the positive_twitter_account column
 * @method     ChildDepartmentSummary findOneByNegativeTwitterAccount(string $negative_twitter_account) Return the first ChildDepartmentSummary filtered by the negative_twitter_account column *

 * @method     ChildDepartmentSummary requirePk($key, ConnectionInterface $con = null) Return the ChildDepartmentSummary by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOne(ConnectionInterface $con = null) Return the first ChildDepartmentSummary matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDepartmentSummary requireOneByDepartmentSummaryId(int $department_summary_id) Return the first ChildDepartmentSummary filtered by the department_summary_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByMapPublicationHour(string $map_publication_hour) Return the first ChildDepartmentSummary filtered by the map_publication_hour column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByDepartmentCode(string $department_code) Return the first ChildDepartmentSummary filtered by the department_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByDepartmentPositiveTweetsQuantity(int $department_positive_tweets_quantity) Return the first ChildDepartmentSummary filtered by the department_positive_tweets_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByDepartmentNegativeTweetsQuantity(int $department_negative_tweets_quantity) Return the first ChildDepartmentSummary filtered by the department_negative_tweets_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByDepartmentNeutralTweetsQuantity(int $department_neutral_tweets_quantity) Return the first ChildDepartmentSummary filtered by the department_neutral_tweets_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByPositivePopularTweetId(string $positive_popular_tweet_id) Return the first ChildDepartmentSummary filtered by the positive_popular_tweet_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByNegativePopularTweetId(string $negative_popular_tweet_id) Return the first ChildDepartmentSummary filtered by the negative_popular_tweet_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByDepartmentTwitterSharesQuantity(int $department_twitter_shares_quantity) Return the first ChildDepartmentSummary filtered by the department_twitter_shares_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByDepartmentFacebookSharesQuantity(int $department_facebook_shares_quantity) Return the first ChildDepartmentSummary filtered by the department_facebook_shares_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByPositiveTwitterAccount(string $positive_twitter_account) Return the first ChildDepartmentSummary filtered by the positive_twitter_account column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDepartmentSummary requireOneByNegativeTwitterAccount(string $negative_twitter_account) Return the first ChildDepartmentSummary filtered by the negative_twitter_account column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDepartmentSummary[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDepartmentSummary objects based on current ModelCriteria
 * @method     ChildDepartmentSummary[]|ObjectCollection findByDepartmentSummaryId(int $department_summary_id) Return ChildDepartmentSummary objects filtered by the department_summary_id column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByMapPublicationHour(string $map_publication_hour) Return ChildDepartmentSummary objects filtered by the map_publication_hour column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByDepartmentCode(string $department_code) Return ChildDepartmentSummary objects filtered by the department_code column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByDepartmentPositiveTweetsQuantity(int $department_positive_tweets_quantity) Return ChildDepartmentSummary objects filtered by the department_positive_tweets_quantity column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByDepartmentNegativeTweetsQuantity(int $department_negative_tweets_quantity) Return ChildDepartmentSummary objects filtered by the department_negative_tweets_quantity column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByDepartmentNeutralTweetsQuantity(int $department_neutral_tweets_quantity) Return ChildDepartmentSummary objects filtered by the department_neutral_tweets_quantity column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByPositivePopularTweetId(string $positive_popular_tweet_id) Return ChildDepartmentSummary objects filtered by the positive_popular_tweet_id column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByNegativePopularTweetId(string $negative_popular_tweet_id) Return ChildDepartmentSummary objects filtered by the negative_popular_tweet_id column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByDepartmentTwitterSharesQuantity(int $department_twitter_shares_quantity) Return ChildDepartmentSummary objects filtered by the department_twitter_shares_quantity column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByDepartmentFacebookSharesQuantity(int $department_facebook_shares_quantity) Return ChildDepartmentSummary objects filtered by the department_facebook_shares_quantity column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByPositiveTwitterAccount(string $positive_twitter_account) Return ChildDepartmentSummary objects filtered by the positive_twitter_account column
 * @method     ChildDepartmentSummary[]|ObjectCollection findByNegativeTwitterAccount(string $negative_twitter_account) Return ChildDepartmentSummary objects filtered by the negative_twitter_account column
 * @method     ChildDepartmentSummary[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DepartmentSummaryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Propel\Base\DepartmentSummaryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\Propel\\DepartmentSummary', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDepartmentSummaryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDepartmentSummaryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDepartmentSummaryQuery) {
            return $criteria;
        }
        $query = new ChildDepartmentSummaryQuery();
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
     * @return ChildDepartmentSummary|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DepartmentSummaryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DepartmentSummaryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDepartmentSummary A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT department_summary_id, map_publication_hour, department_code, department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity, positive_popular_tweet_id, negative_popular_tweet_id, department_twitter_shares_quantity, department_facebook_shares_quantity, positive_twitter_account, negative_twitter_account FROM department_summary WHERE department_summary_id = :p0';
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
            /** @var ChildDepartmentSummary $obj */
            $obj = new ChildDepartmentSummary();
            $obj->hydrate($row);
            DepartmentSummaryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDepartmentSummary|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the department_summary_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentSummaryId(1234); // WHERE department_summary_id = 1234
     * $query->filterByDepartmentSummaryId(array(12, 34)); // WHERE department_summary_id IN (12, 34)
     * $query->filterByDepartmentSummaryId(array('min' => 12)); // WHERE department_summary_id > 12
     * </code>
     *
     * @param     mixed $departmentSummaryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByDepartmentSummaryId($departmentSummaryId = null, $comparison = null)
    {
        if (is_array($departmentSummaryId)) {
            $useMinMax = false;
            if (isset($departmentSummaryId['min'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID, $departmentSummaryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departmentSummaryId['max'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID, $departmentSummaryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID, $departmentSummaryId, $comparison);
    }

    /**
     * Filter the query on the map_publication_hour column
     *
     * Example usage:
     * <code>
     * $query->filterByMapPublicationHour('2011-03-14'); // WHERE map_publication_hour = '2011-03-14'
     * $query->filterByMapPublicationHour('now'); // WHERE map_publication_hour = '2011-03-14'
     * $query->filterByMapPublicationHour(array('max' => 'yesterday')); // WHERE map_publication_hour > '2011-03-13'
     * </code>
     *
     * @param     mixed $mapPublicationHour The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByMapPublicationHour($mapPublicationHour = null, $comparison = null)
    {
        if (is_array($mapPublicationHour)) {
            $useMinMax = false;
            if (isset($mapPublicationHour['min'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_MAP_PUBLICATION_HOUR, $mapPublicationHour['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mapPublicationHour['max'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_MAP_PUBLICATION_HOUR, $mapPublicationHour['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_MAP_PUBLICATION_HOUR, $mapPublicationHour, $comparison);
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
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByDepartmentCode($departmentCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departmentCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_CODE, $departmentCode, $comparison);
    }

    /**
     * Filter the query on the department_positive_tweets_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentPositiveTweetsQuantity(1234); // WHERE department_positive_tweets_quantity = 1234
     * $query->filterByDepartmentPositiveTweetsQuantity(array(12, 34)); // WHERE department_positive_tweets_quantity IN (12, 34)
     * $query->filterByDepartmentPositiveTweetsQuantity(array('min' => 12)); // WHERE department_positive_tweets_quantity > 12
     * </code>
     *
     * @param     mixed $departmentPositiveTweetsQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByDepartmentPositiveTweetsQuantity($departmentPositiveTweetsQuantity = null, $comparison = null)
    {
        if (is_array($departmentPositiveTweetsQuantity)) {
            $useMinMax = false;
            if (isset($departmentPositiveTweetsQuantity['min'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY, $departmentPositiveTweetsQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departmentPositiveTweetsQuantity['max'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY, $departmentPositiveTweetsQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY, $departmentPositiveTweetsQuantity, $comparison);
    }

    /**
     * Filter the query on the department_negative_tweets_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentNegativeTweetsQuantity(1234); // WHERE department_negative_tweets_quantity = 1234
     * $query->filterByDepartmentNegativeTweetsQuantity(array(12, 34)); // WHERE department_negative_tweets_quantity IN (12, 34)
     * $query->filterByDepartmentNegativeTweetsQuantity(array('min' => 12)); // WHERE department_negative_tweets_quantity > 12
     * </code>
     *
     * @param     mixed $departmentNegativeTweetsQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByDepartmentNegativeTweetsQuantity($departmentNegativeTweetsQuantity = null, $comparison = null)
    {
        if (is_array($departmentNegativeTweetsQuantity)) {
            $useMinMax = false;
            if (isset($departmentNegativeTweetsQuantity['min'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY, $departmentNegativeTweetsQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departmentNegativeTweetsQuantity['max'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY, $departmentNegativeTweetsQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY, $departmentNegativeTweetsQuantity, $comparison);
    }

    /**
     * Filter the query on the department_neutral_tweets_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentNeutralTweetsQuantity(1234); // WHERE department_neutral_tweets_quantity = 1234
     * $query->filterByDepartmentNeutralTweetsQuantity(array(12, 34)); // WHERE department_neutral_tweets_quantity IN (12, 34)
     * $query->filterByDepartmentNeutralTweetsQuantity(array('min' => 12)); // WHERE department_neutral_tweets_quantity > 12
     * </code>
     *
     * @param     mixed $departmentNeutralTweetsQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByDepartmentNeutralTweetsQuantity($departmentNeutralTweetsQuantity = null, $comparison = null)
    {
        if (is_array($departmentNeutralTweetsQuantity)) {
            $useMinMax = false;
            if (isset($departmentNeutralTweetsQuantity['min'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY, $departmentNeutralTweetsQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departmentNeutralTweetsQuantity['max'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY, $departmentNeutralTweetsQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY, $departmentNeutralTweetsQuantity, $comparison);
    }

    /**
     * Filter the query on the positive_popular_tweet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPositivePopularTweetId(1234); // WHERE positive_popular_tweet_id = 1234
     * $query->filterByPositivePopularTweetId(array(12, 34)); // WHERE positive_popular_tweet_id IN (12, 34)
     * $query->filterByPositivePopularTweetId(array('min' => 12)); // WHERE positive_popular_tweet_id > 12
     * </code>
     *
     * @param     mixed $positivePopularTweetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByPositivePopularTweetId($positivePopularTweetId = null, $comparison = null)
    {
        if (is_array($positivePopularTweetId)) {
            $useMinMax = false;
            if (isset($positivePopularTweetId['min'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_POSITIVE_POPULAR_TWEET_ID, $positivePopularTweetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($positivePopularTweetId['max'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_POSITIVE_POPULAR_TWEET_ID, $positivePopularTweetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_POSITIVE_POPULAR_TWEET_ID, $positivePopularTweetId, $comparison);
    }

    /**
     * Filter the query on the negative_popular_tweet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNegativePopularTweetId(1234); // WHERE negative_popular_tweet_id = 1234
     * $query->filterByNegativePopularTweetId(array(12, 34)); // WHERE negative_popular_tweet_id IN (12, 34)
     * $query->filterByNegativePopularTweetId(array('min' => 12)); // WHERE negative_popular_tweet_id > 12
     * </code>
     *
     * @param     mixed $negativePopularTweetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByNegativePopularTweetId($negativePopularTweetId = null, $comparison = null)
    {
        if (is_array($negativePopularTweetId)) {
            $useMinMax = false;
            if (isset($negativePopularTweetId['min'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_NEGATIVE_POPULAR_TWEET_ID, $negativePopularTweetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($negativePopularTweetId['max'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_NEGATIVE_POPULAR_TWEET_ID, $negativePopularTweetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_NEGATIVE_POPULAR_TWEET_ID, $negativePopularTweetId, $comparison);
    }

    /**
     * Filter the query on the department_twitter_shares_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentTwitterSharesQuantity(1234); // WHERE department_twitter_shares_quantity = 1234
     * $query->filterByDepartmentTwitterSharesQuantity(array(12, 34)); // WHERE department_twitter_shares_quantity IN (12, 34)
     * $query->filterByDepartmentTwitterSharesQuantity(array('min' => 12)); // WHERE department_twitter_shares_quantity > 12
     * </code>
     *
     * @param     mixed $departmentTwitterSharesQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByDepartmentTwitterSharesQuantity($departmentTwitterSharesQuantity = null, $comparison = null)
    {
        if (is_array($departmentTwitterSharesQuantity)) {
            $useMinMax = false;
            if (isset($departmentTwitterSharesQuantity['min'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_TWITTER_SHARES_QUANTITY, $departmentTwitterSharesQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departmentTwitterSharesQuantity['max'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_TWITTER_SHARES_QUANTITY, $departmentTwitterSharesQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_TWITTER_SHARES_QUANTITY, $departmentTwitterSharesQuantity, $comparison);
    }

    /**
     * Filter the query on the department_facebook_shares_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentFacebookSharesQuantity(1234); // WHERE department_facebook_shares_quantity = 1234
     * $query->filterByDepartmentFacebookSharesQuantity(array(12, 34)); // WHERE department_facebook_shares_quantity IN (12, 34)
     * $query->filterByDepartmentFacebookSharesQuantity(array('min' => 12)); // WHERE department_facebook_shares_quantity > 12
     * </code>
     *
     * @param     mixed $departmentFacebookSharesQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByDepartmentFacebookSharesQuantity($departmentFacebookSharesQuantity = null, $comparison = null)
    {
        if (is_array($departmentFacebookSharesQuantity)) {
            $useMinMax = false;
            if (isset($departmentFacebookSharesQuantity['min'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY, $departmentFacebookSharesQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departmentFacebookSharesQuantity['max'])) {
                $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY, $departmentFacebookSharesQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY, $departmentFacebookSharesQuantity, $comparison);
    }

    /**
     * Filter the query on the positive_twitter_account column
     *
     * Example usage:
     * <code>
     * $query->filterByPositiveTwitterAccount('fooValue');   // WHERE positive_twitter_account = 'fooValue'
     * $query->filterByPositiveTwitterAccount('%fooValue%', Criteria::LIKE); // WHERE positive_twitter_account LIKE '%fooValue%'
     * </code>
     *
     * @param     string $positiveTwitterAccount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByPositiveTwitterAccount($positiveTwitterAccount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($positiveTwitterAccount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_POSITIVE_TWITTER_ACCOUNT, $positiveTwitterAccount, $comparison);
    }

    /**
     * Filter the query on the negative_twitter_account column
     *
     * Example usage:
     * <code>
     * $query->filterByNegativeTwitterAccount('fooValue');   // WHERE negative_twitter_account = 'fooValue'
     * $query->filterByNegativeTwitterAccount('%fooValue%', Criteria::LIKE); // WHERE negative_twitter_account LIKE '%fooValue%'
     * </code>
     *
     * @param     string $negativeTwitterAccount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function filterByNegativeTwitterAccount($negativeTwitterAccount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($negativeTwitterAccount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentSummaryTableMap::COL_NEGATIVE_TWITTER_ACCOUNT, $negativeTwitterAccount, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDepartmentSummary $departmentSummary Object to remove from the list of results
     *
     * @return $this|ChildDepartmentSummaryQuery The current query, for fluid interface
     */
    public function prune($departmentSummary = null)
    {
        if ($departmentSummary) {
            $this->addUsingAlias(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID, $departmentSummary->getDepartmentSummaryId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the department_summary table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DepartmentSummaryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DepartmentSummaryTableMap::clearInstancePool();
            DepartmentSummaryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DepartmentSummaryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DepartmentSummaryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DepartmentSummaryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DepartmentSummaryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DepartmentSummaryQuery
