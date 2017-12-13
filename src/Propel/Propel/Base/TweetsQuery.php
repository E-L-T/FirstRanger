<?php

namespace Propel\Propel\Base;

use \Exception;
use \PDO;
use Propel\Propel\Tweets as ChildTweets;
use Propel\Propel\TweetsQuery as ChildTweetsQuery;
use Propel\Propel\Map\TweetsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tweets' table.
 *
 *
 *
 * @method     ChildTweetsQuery orderByTweetId($order = Criteria::ASC) Order by the tweet_id column
 * @method     ChildTweetsQuery orderByApiTweetId($order = Criteria::ASC) Order by the api_tweet_id column
 * @method     ChildTweetsQuery orderByTweetText($order = Criteria::ASC) Order by the tweet_text column
 * @method     ChildTweetsQuery orderByTweetPublicationHour($order = Criteria::ASC) Order by the tweet_publication_hour column
 * @method     ChildTweetsQuery orderByGeocodeId($order = Criteria::ASC) Order by the geocode_id column
 * @method     ChildTweetsQuery orderByRetweetsQuantity($order = Criteria::ASC) Order by the retweets_quantity column
 * @method     ChildTweetsQuery orderByFavoritesQuantity($order = Criteria::ASC) Order by the favorites_quantity column
 * @method     ChildTweetsQuery orderByTwitterAccount($order = Criteria::ASC) Order by the twitter_account column
 * @method     ChildTweetsQuery orderByCoordinates($order = Criteria::ASC) Order by the coordinates column
 * @method     ChildTweetsQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     ChildTweetsQuery orderByQualityTweet($order = Criteria::ASC) Order by the quality_tweet column
 *
 * @method     ChildTweetsQuery groupByTweetId() Group by the tweet_id column
 * @method     ChildTweetsQuery groupByApiTweetId() Group by the api_tweet_id column
 * @method     ChildTweetsQuery groupByTweetText() Group by the tweet_text column
 * @method     ChildTweetsQuery groupByTweetPublicationHour() Group by the tweet_publication_hour column
 * @method     ChildTweetsQuery groupByGeocodeId() Group by the geocode_id column
 * @method     ChildTweetsQuery groupByRetweetsQuantity() Group by the retweets_quantity column
 * @method     ChildTweetsQuery groupByFavoritesQuantity() Group by the favorites_quantity column
 * @method     ChildTweetsQuery groupByTwitterAccount() Group by the twitter_account column
 * @method     ChildTweetsQuery groupByCoordinates() Group by the coordinates column
 * @method     ChildTweetsQuery groupByLocation() Group by the location column
 * @method     ChildTweetsQuery groupByQualityTweet() Group by the quality_tweet column
 *
 * @method     ChildTweetsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTweetsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTweetsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTweetsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTweetsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTweetsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTweets findOne(ConnectionInterface $con = null) Return the first ChildTweets matching the query
 * @method     ChildTweets findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTweets matching the query, or a new ChildTweets object populated from the query conditions when no match is found
 *
 * @method     ChildTweets findOneByTweetId(string $tweet_id) Return the first ChildTweets filtered by the tweet_id column
 * @method     ChildTweets findOneByApiTweetId(string $api_tweet_id) Return the first ChildTweets filtered by the api_tweet_id column
 * @method     ChildTweets findOneByTweetText(string $tweet_text) Return the first ChildTweets filtered by the tweet_text column
 * @method     ChildTweets findOneByTweetPublicationHour(string $tweet_publication_hour) Return the first ChildTweets filtered by the tweet_publication_hour column
 * @method     ChildTweets findOneByGeocodeId(int $geocode_id) Return the first ChildTweets filtered by the geocode_id column
 * @method     ChildTweets findOneByRetweetsQuantity(int $retweets_quantity) Return the first ChildTweets filtered by the retweets_quantity column
 * @method     ChildTweets findOneByFavoritesQuantity(int $favorites_quantity) Return the first ChildTweets filtered by the favorites_quantity column
 * @method     ChildTweets findOneByTwitterAccount(string $twitter_account) Return the first ChildTweets filtered by the twitter_account column
 * @method     ChildTweets findOneByCoordinates(string $coordinates) Return the first ChildTweets filtered by the coordinates column
 * @method     ChildTweets findOneByLocation(string $location) Return the first ChildTweets filtered by the location column
 * @method     ChildTweets findOneByQualityTweet(int $quality_tweet) Return the first ChildTweets filtered by the quality_tweet column *

 * @method     ChildTweets requirePk($key, ConnectionInterface $con = null) Return the ChildTweets by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOne(ConnectionInterface $con = null) Return the first ChildTweets matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTweets requireOneByTweetId(string $tweet_id) Return the first ChildTweets filtered by the tweet_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOneByApiTweetId(string $api_tweet_id) Return the first ChildTweets filtered by the api_tweet_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOneByTweetText(string $tweet_text) Return the first ChildTweets filtered by the tweet_text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOneByTweetPublicationHour(string $tweet_publication_hour) Return the first ChildTweets filtered by the tweet_publication_hour column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOneByGeocodeId(int $geocode_id) Return the first ChildTweets filtered by the geocode_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOneByRetweetsQuantity(int $retweets_quantity) Return the first ChildTweets filtered by the retweets_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOneByFavoritesQuantity(int $favorites_quantity) Return the first ChildTweets filtered by the favorites_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOneByTwitterAccount(string $twitter_account) Return the first ChildTweets filtered by the twitter_account column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOneByCoordinates(string $coordinates) Return the first ChildTweets filtered by the coordinates column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOneByLocation(string $location) Return the first ChildTweets filtered by the location column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTweets requireOneByQualityTweet(int $quality_tweet) Return the first ChildTweets filtered by the quality_tweet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTweets[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTweets objects based on current ModelCriteria
 * @method     ChildTweets[]|ObjectCollection findByTweetId(string $tweet_id) Return ChildTweets objects filtered by the tweet_id column
 * @method     ChildTweets[]|ObjectCollection findByApiTweetId(string $api_tweet_id) Return ChildTweets objects filtered by the api_tweet_id column
 * @method     ChildTweets[]|ObjectCollection findByTweetText(string $tweet_text) Return ChildTweets objects filtered by the tweet_text column
 * @method     ChildTweets[]|ObjectCollection findByTweetPublicationHour(string $tweet_publication_hour) Return ChildTweets objects filtered by the tweet_publication_hour column
 * @method     ChildTweets[]|ObjectCollection findByGeocodeId(int $geocode_id) Return ChildTweets objects filtered by the geocode_id column
 * @method     ChildTweets[]|ObjectCollection findByRetweetsQuantity(int $retweets_quantity) Return ChildTweets objects filtered by the retweets_quantity column
 * @method     ChildTweets[]|ObjectCollection findByFavoritesQuantity(int $favorites_quantity) Return ChildTweets objects filtered by the favorites_quantity column
 * @method     ChildTweets[]|ObjectCollection findByTwitterAccount(string $twitter_account) Return ChildTweets objects filtered by the twitter_account column
 * @method     ChildTweets[]|ObjectCollection findByCoordinates(string $coordinates) Return ChildTweets objects filtered by the coordinates column
 * @method     ChildTweets[]|ObjectCollection findByLocation(string $location) Return ChildTweets objects filtered by the location column
 * @method     ChildTweets[]|ObjectCollection findByQualityTweet(int $quality_tweet) Return ChildTweets objects filtered by the quality_tweet column
 * @method     ChildTweets[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TweetsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Propel\Base\TweetsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\Propel\\Tweets', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTweetsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTweetsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTweetsQuery) {
            return $criteria;
        }
        $query = new ChildTweetsQuery();
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
     * @return ChildTweets|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TweetsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TweetsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTweets A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tweet_id, api_tweet_id, tweet_text, tweet_publication_hour, geocode_id, retweets_quantity, favorites_quantity, twitter_account, coordinates, location, quality_tweet FROM tweets WHERE tweet_id = :p0';
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
            /** @var ChildTweets $obj */
            $obj = new ChildTweets();
            $obj->hydrate($row);
            TweetsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTweets|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TweetsTableMap::COL_TWEET_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TweetsTableMap::COL_TWEET_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tweet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTweetId(1234); // WHERE tweet_id = 1234
     * $query->filterByTweetId(array(12, 34)); // WHERE tweet_id IN (12, 34)
     * $query->filterByTweetId(array('min' => 12)); // WHERE tweet_id > 12
     * </code>
     *
     * @param     mixed $tweetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByTweetId($tweetId = null, $comparison = null)
    {
        if (is_array($tweetId)) {
            $useMinMax = false;
            if (isset($tweetId['min'])) {
                $this->addUsingAlias(TweetsTableMap::COL_TWEET_ID, $tweetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tweetId['max'])) {
                $this->addUsingAlias(TweetsTableMap::COL_TWEET_ID, $tweetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_TWEET_ID, $tweetId, $comparison);
    }

    /**
     * Filter the query on the api_tweet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByApiTweetId(1234); // WHERE api_tweet_id = 1234
     * $query->filterByApiTweetId(array(12, 34)); // WHERE api_tweet_id IN (12, 34)
     * $query->filterByApiTweetId(array('min' => 12)); // WHERE api_tweet_id > 12
     * </code>
     *
     * @param     mixed $apiTweetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByApiTweetId($apiTweetId = null, $comparison = null)
    {
        if (is_array($apiTweetId)) {
            $useMinMax = false;
            if (isset($apiTweetId['min'])) {
                $this->addUsingAlias(TweetsTableMap::COL_API_TWEET_ID, $apiTweetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($apiTweetId['max'])) {
                $this->addUsingAlias(TweetsTableMap::COL_API_TWEET_ID, $apiTweetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_API_TWEET_ID, $apiTweetId, $comparison);
    }

    /**
     * Filter the query on the tweet_text column
     *
     * Example usage:
     * <code>
     * $query->filterByTweetText('fooValue');   // WHERE tweet_text = 'fooValue'
     * $query->filterByTweetText('%fooValue%', Criteria::LIKE); // WHERE tweet_text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tweetText The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByTweetText($tweetText = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tweetText)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_TWEET_TEXT, $tweetText, $comparison);
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
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByTweetPublicationHour($tweetPublicationHour = null, $comparison = null)
    {
        if (is_array($tweetPublicationHour)) {
            $useMinMax = false;
            if (isset($tweetPublicationHour['min'])) {
                $this->addUsingAlias(TweetsTableMap::COL_TWEET_PUBLICATION_HOUR, $tweetPublicationHour['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tweetPublicationHour['max'])) {
                $this->addUsingAlias(TweetsTableMap::COL_TWEET_PUBLICATION_HOUR, $tweetPublicationHour['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_TWEET_PUBLICATION_HOUR, $tweetPublicationHour, $comparison);
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
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByGeocodeId($geocodeId = null, $comparison = null)
    {
        if (is_array($geocodeId)) {
            $useMinMax = false;
            if (isset($geocodeId['min'])) {
                $this->addUsingAlias(TweetsTableMap::COL_GEOCODE_ID, $geocodeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geocodeId['max'])) {
                $this->addUsingAlias(TweetsTableMap::COL_GEOCODE_ID, $geocodeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_GEOCODE_ID, $geocodeId, $comparison);
    }

    /**
     * Filter the query on the retweets_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByRetweetsQuantity(1234); // WHERE retweets_quantity = 1234
     * $query->filterByRetweetsQuantity(array(12, 34)); // WHERE retweets_quantity IN (12, 34)
     * $query->filterByRetweetsQuantity(array('min' => 12)); // WHERE retweets_quantity > 12
     * </code>
     *
     * @param     mixed $retweetsQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByRetweetsQuantity($retweetsQuantity = null, $comparison = null)
    {
        if (is_array($retweetsQuantity)) {
            $useMinMax = false;
            if (isset($retweetsQuantity['min'])) {
                $this->addUsingAlias(TweetsTableMap::COL_RETWEETS_QUANTITY, $retweetsQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($retweetsQuantity['max'])) {
                $this->addUsingAlias(TweetsTableMap::COL_RETWEETS_QUANTITY, $retweetsQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_RETWEETS_QUANTITY, $retweetsQuantity, $comparison);
    }

    /**
     * Filter the query on the favorites_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByFavoritesQuantity(1234); // WHERE favorites_quantity = 1234
     * $query->filterByFavoritesQuantity(array(12, 34)); // WHERE favorites_quantity IN (12, 34)
     * $query->filterByFavoritesQuantity(array('min' => 12)); // WHERE favorites_quantity > 12
     * </code>
     *
     * @param     mixed $favoritesQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByFavoritesQuantity($favoritesQuantity = null, $comparison = null)
    {
        if (is_array($favoritesQuantity)) {
            $useMinMax = false;
            if (isset($favoritesQuantity['min'])) {
                $this->addUsingAlias(TweetsTableMap::COL_FAVORITES_QUANTITY, $favoritesQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($favoritesQuantity['max'])) {
                $this->addUsingAlias(TweetsTableMap::COL_FAVORITES_QUANTITY, $favoritesQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_FAVORITES_QUANTITY, $favoritesQuantity, $comparison);
    }

    /**
     * Filter the query on the twitter_account column
     *
     * Example usage:
     * <code>
     * $query->filterByTwitterAccount('fooValue');   // WHERE twitter_account = 'fooValue'
     * $query->filterByTwitterAccount('%fooValue%', Criteria::LIKE); // WHERE twitter_account LIKE '%fooValue%'
     * </code>
     *
     * @param     string $twitterAccount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByTwitterAccount($twitterAccount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($twitterAccount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_TWITTER_ACCOUNT, $twitterAccount, $comparison);
    }

    /**
     * Filter the query on the coordinates column
     *
     * Example usage:
     * <code>
     * $query->filterByCoordinates('fooValue');   // WHERE coordinates = 'fooValue'
     * $query->filterByCoordinates('%fooValue%', Criteria::LIKE); // WHERE coordinates LIKE '%fooValue%'
     * </code>
     *
     * @param     string $coordinates The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByCoordinates($coordinates = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($coordinates)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_COORDINATES, $coordinates, $comparison);
    }

    /**
     * Filter the query on the location column
     *
     * Example usage:
     * <code>
     * $query->filterByLocation('fooValue');   // WHERE location = 'fooValue'
     * $query->filterByLocation('%fooValue%', Criteria::LIKE); // WHERE location LIKE '%fooValue%'
     * </code>
     *
     * @param     string $location The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByLocation($location = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($location)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_LOCATION, $location, $comparison);
    }

    /**
     * Filter the query on the quality_tweet column
     *
     * @param     mixed $qualityTweet The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function filterByQualityTweet($qualityTweet = null, $comparison = null)
    {
        $valueSet = TweetsTableMap::getValueSet(TweetsTableMap::COL_QUALITY_TWEET);
        if (is_scalar($qualityTweet)) {
            if (!in_array($qualityTweet, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $qualityTweet));
            }
            $qualityTweet = array_search($qualityTweet, $valueSet);
        } elseif (is_array($qualityTweet)) {
            $convertedValues = array();
            foreach ($qualityTweet as $value) {
                if (!in_array($value, $valueSet)) {
                    throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $value));
                }
                $convertedValues []= array_search($value, $valueSet);
            }
            $qualityTweet = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TweetsTableMap::COL_QUALITY_TWEET, $qualityTweet, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTweets $tweets Object to remove from the list of results
     *
     * @return $this|ChildTweetsQuery The current query, for fluid interface
     */
    public function prune($tweets = null)
    {
        if ($tweets) {
            $this->addUsingAlias(TweetsTableMap::COL_TWEET_ID, $tweets->getTweetId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tweets table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TweetsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TweetsTableMap::clearInstancePool();
            TweetsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TweetsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TweetsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TweetsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TweetsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TweetsQuery
