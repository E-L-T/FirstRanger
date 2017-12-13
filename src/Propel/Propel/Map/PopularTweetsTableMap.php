<?php

namespace Propel\Propel\Map;

use Propel\Propel\PopularTweets;
use Propel\Propel\PopularTweetsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'popular_tweets' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PopularTweetsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Propel.Map.PopularTweetsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'popular_tweets';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\Propel\\PopularTweets';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.Propel.PopularTweets';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the popular_tweet_id field
     */
    const COL_POPULAR_TWEET_ID = 'popular_tweets.popular_tweet_id';

    /**
     * the column name for the tweet_id field
     */
    const COL_TWEET_ID = 'popular_tweets.tweet_id';

    /**
     * the column name for the geocode_id field
     */
    const COL_GEOCODE_ID = 'popular_tweets.geocode_id';

    /**
     * the column name for the votes_quantity field
     */
    const COL_VOTES_QUANTITY = 'popular_tweets.votes_quantity';

    /**
     * the column name for the retweets_quantity field
     */
    const COL_RETWEETS_QUANTITY = 'popular_tweets.retweets_quantity';

    /**
     * the column name for the tweet_publication_hour field
     */
    const COL_TWEET_PUBLICATION_HOUR = 'popular_tweets.tweet_publication_hour';

    /**
     * the column name for the favorites_quantity field
     */
    const COL_FAVORITES_QUANTITY = 'popular_tweets.favorites_quantity';

    /**
     * the column name for the coordinates field
     */
    const COL_COORDINATES = 'popular_tweets.coordinates';

    /**
     * the column name for the location field
     */
    const COL_LOCATION = 'popular_tweets.location';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('PopularTweetId', 'TweetId', 'GeocodeId', 'VotesQuantity', 'RetweetsQuantity', 'TweetPublicationHour', 'FavoritesQuantity', 'Coordinates', 'Location', ),
        self::TYPE_CAMELNAME     => array('popularTweetId', 'tweetId', 'geocodeId', 'votesQuantity', 'retweetsQuantity', 'tweetPublicationHour', 'favoritesQuantity', 'coordinates', 'location', ),
        self::TYPE_COLNAME       => array(PopularTweetsTableMap::COL_POPULAR_TWEET_ID, PopularTweetsTableMap::COL_TWEET_ID, PopularTweetsTableMap::COL_GEOCODE_ID, PopularTweetsTableMap::COL_VOTES_QUANTITY, PopularTweetsTableMap::COL_RETWEETS_QUANTITY, PopularTweetsTableMap::COL_TWEET_PUBLICATION_HOUR, PopularTweetsTableMap::COL_FAVORITES_QUANTITY, PopularTweetsTableMap::COL_COORDINATES, PopularTweetsTableMap::COL_LOCATION, ),
        self::TYPE_FIELDNAME     => array('popular_tweet_id', 'tweet_id', 'geocode_id', 'votes_quantity', 'retweets_quantity', 'tweet_publication_hour', 'favorites_quantity', 'coordinates', 'location', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PopularTweetId' => 0, 'TweetId' => 1, 'GeocodeId' => 2, 'VotesQuantity' => 3, 'RetweetsQuantity' => 4, 'TweetPublicationHour' => 5, 'FavoritesQuantity' => 6, 'Coordinates' => 7, 'Location' => 8, ),
        self::TYPE_CAMELNAME     => array('popularTweetId' => 0, 'tweetId' => 1, 'geocodeId' => 2, 'votesQuantity' => 3, 'retweetsQuantity' => 4, 'tweetPublicationHour' => 5, 'favoritesQuantity' => 6, 'coordinates' => 7, 'location' => 8, ),
        self::TYPE_COLNAME       => array(PopularTweetsTableMap::COL_POPULAR_TWEET_ID => 0, PopularTweetsTableMap::COL_TWEET_ID => 1, PopularTweetsTableMap::COL_GEOCODE_ID => 2, PopularTweetsTableMap::COL_VOTES_QUANTITY => 3, PopularTweetsTableMap::COL_RETWEETS_QUANTITY => 4, PopularTweetsTableMap::COL_TWEET_PUBLICATION_HOUR => 5, PopularTweetsTableMap::COL_FAVORITES_QUANTITY => 6, PopularTweetsTableMap::COL_COORDINATES => 7, PopularTweetsTableMap::COL_LOCATION => 8, ),
        self::TYPE_FIELDNAME     => array('popular_tweet_id' => 0, 'tweet_id' => 1, 'geocode_id' => 2, 'votes_quantity' => 3, 'retweets_quantity' => 4, 'tweet_publication_hour' => 5, 'favorites_quantity' => 6, 'coordinates' => 7, 'location' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('popular_tweets');
        $this->setPhpName('PopularTweets');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\Propel\\PopularTweets');
        $this->setPackage('Propel.Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('popular_tweet_id', 'PopularTweetId', 'BIGINT', true, 18, null);
        $this->addColumn('tweet_id', 'TweetId', 'BIGINT', true, 18, null);
        $this->addColumn('geocode_id', 'GeocodeId', 'INTEGER', true, null, null);
        $this->addColumn('votes_quantity', 'VotesQuantity', 'INTEGER', true, null, null);
        $this->addColumn('retweets_quantity', 'RetweetsQuantity', 'INTEGER', false, null, null);
        $this->addColumn('tweet_publication_hour', 'TweetPublicationHour', 'TIMESTAMP', true, null, null);
        $this->addColumn('favorites_quantity', 'FavoritesQuantity', 'INTEGER', false, null, null);
        $this->addColumn('coordinates', 'Coordinates', 'LONGVARCHAR', true, null, null);
        $this->addColumn('location', 'Location', 'LONGVARCHAR', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PopularTweetId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PopularTweetId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PopularTweetId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PopularTweetId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PopularTweetId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PopularTweetId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('PopularTweetId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? PopularTweetsTableMap::CLASS_DEFAULT : PopularTweetsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (PopularTweets object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PopularTweetsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PopularTweetsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PopularTweetsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PopularTweetsTableMap::OM_CLASS;
            /** @var PopularTweets $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PopularTweetsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = PopularTweetsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PopularTweetsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PopularTweets $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PopularTweetsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PopularTweetsTableMap::COL_POPULAR_TWEET_ID);
            $criteria->addSelectColumn(PopularTweetsTableMap::COL_TWEET_ID);
            $criteria->addSelectColumn(PopularTweetsTableMap::COL_GEOCODE_ID);
            $criteria->addSelectColumn(PopularTweetsTableMap::COL_VOTES_QUANTITY);
            $criteria->addSelectColumn(PopularTweetsTableMap::COL_RETWEETS_QUANTITY);
            $criteria->addSelectColumn(PopularTweetsTableMap::COL_TWEET_PUBLICATION_HOUR);
            $criteria->addSelectColumn(PopularTweetsTableMap::COL_FAVORITES_QUANTITY);
            $criteria->addSelectColumn(PopularTweetsTableMap::COL_COORDINATES);
            $criteria->addSelectColumn(PopularTweetsTableMap::COL_LOCATION);
        } else {
            $criteria->addSelectColumn($alias . '.popular_tweet_id');
            $criteria->addSelectColumn($alias . '.tweet_id');
            $criteria->addSelectColumn($alias . '.geocode_id');
            $criteria->addSelectColumn($alias . '.votes_quantity');
            $criteria->addSelectColumn($alias . '.retweets_quantity');
            $criteria->addSelectColumn($alias . '.tweet_publication_hour');
            $criteria->addSelectColumn($alias . '.favorites_quantity');
            $criteria->addSelectColumn($alias . '.coordinates');
            $criteria->addSelectColumn($alias . '.location');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(PopularTweetsTableMap::DATABASE_NAME)->getTable(PopularTweetsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PopularTweetsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PopularTweetsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PopularTweetsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a PopularTweets or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PopularTweets object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PopularTweetsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\Propel\PopularTweets) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PopularTweetsTableMap::DATABASE_NAME);
            $criteria->add(PopularTweetsTableMap::COL_POPULAR_TWEET_ID, (array) $values, Criteria::IN);
        }

        $query = PopularTweetsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PopularTweetsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PopularTweetsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the popular_tweets table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PopularTweetsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PopularTweets or Criteria object.
     *
     * @param mixed               $criteria Criteria or PopularTweets object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PopularTweetsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PopularTweets object
        }

        if ($criteria->containsKey(PopularTweetsTableMap::COL_POPULAR_TWEET_ID) && $criteria->keyContainsValue(PopularTweetsTableMap::COL_POPULAR_TWEET_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PopularTweetsTableMap::COL_POPULAR_TWEET_ID.')');
        }


        // Set the correct dbName
        $query = PopularTweetsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PopularTweetsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PopularTweetsTableMap::buildTableMap();
