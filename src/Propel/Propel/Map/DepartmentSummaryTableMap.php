<?php

namespace Propel\Propel\Map;

use Propel\Propel\DepartmentSummary;
use Propel\Propel\DepartmentSummaryQuery;
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
 * This class defines the structure of the 'department_summary' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DepartmentSummaryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Propel.Map.DepartmentSummaryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'department_summary';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\Propel\\DepartmentSummary';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.Propel.DepartmentSummary';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the department_summary_id field
     */
    const COL_DEPARTMENT_SUMMARY_ID = 'department_summary.department_summary_id';

    /**
     * the column name for the map_publication_hour field
     */
    const COL_MAP_PUBLICATION_HOUR = 'department_summary.map_publication_hour';

    /**
     * the column name for the department_code field
     */
    const COL_DEPARTMENT_CODE = 'department_summary.department_code';

    /**
     * the column name for the department_positive_tweets_quantity field
     */
    const COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY = 'department_summary.department_positive_tweets_quantity';

    /**
     * the column name for the department_negative_tweets_quantity field
     */
    const COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY = 'department_summary.department_negative_tweets_quantity';

    /**
     * the column name for the department_neutral_tweets_quantity field
     */
    const COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY = 'department_summary.department_neutral_tweets_quantity';

    /**
     * the column name for the positive_popular_tweet_id field
     */
    const COL_POSITIVE_POPULAR_TWEET_ID = 'department_summary.positive_popular_tweet_id';

    /**
     * the column name for the negative_popular_tweet_id field
     */
    const COL_NEGATIVE_POPULAR_TWEET_ID = 'department_summary.negative_popular_tweet_id';

    /**
     * the column name for the department_twitter_shares_quantity field
     */
    const COL_DEPARTMENT_TWITTER_SHARES_QUANTITY = 'department_summary.department_twitter_shares_quantity';

    /**
     * the column name for the department_facebook_shares_quantity field
     */
    const COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY = 'department_summary.department_facebook_shares_quantity';

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
        self::TYPE_PHPNAME       => array('DepartmentSummaryId', 'MapPublicationHour', 'DepartmentCode', 'DepartmentPositiveTweetsQuantity', 'DepartmentNegativeTweetsQuantity', 'DepartmentNeutralTweetsQuantity', 'PositivePopularTweetId', 'NegativePopularTweetId', 'DepartmentTwitterSharesQuantity', 'DepartmentFacebookSharesQuantity', ),
        self::TYPE_CAMELNAME     => array('departmentSummaryId', 'mapPublicationHour', 'departmentCode', 'departmentPositiveTweetsQuantity', 'departmentNegativeTweetsQuantity', 'departmentNeutralTweetsQuantity', 'positivePopularTweetId', 'negativePopularTweetId', 'departmentTwitterSharesQuantity', 'departmentFacebookSharesQuantity', ),
        self::TYPE_COLNAME       => array(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID, DepartmentSummaryTableMap::COL_MAP_PUBLICATION_HOUR, DepartmentSummaryTableMap::COL_DEPARTMENT_CODE, DepartmentSummaryTableMap::COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY, DepartmentSummaryTableMap::COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY, DepartmentSummaryTableMap::COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY, DepartmentSummaryTableMap::COL_POSITIVE_POPULAR_TWEET_ID, DepartmentSummaryTableMap::COL_NEGATIVE_POPULAR_TWEET_ID, DepartmentSummaryTableMap::COL_DEPARTMENT_TWITTER_SHARES_QUANTITY, DepartmentSummaryTableMap::COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY, ),
        self::TYPE_FIELDNAME     => array('department_summary_id', 'map_publication_hour', 'department_code', 'department_positive_tweets_quantity', 'department_negative_tweets_quantity', 'department_neutral_tweets_quantity', 'positive_popular_tweet_id', 'negative_popular_tweet_id', 'department_twitter_shares_quantity', 'department_facebook_shares_quantity', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('DepartmentSummaryId' => 0, 'MapPublicationHour' => 1, 'DepartmentCode' => 2, 'DepartmentPositiveTweetsQuantity' => 3, 'DepartmentNegativeTweetsQuantity' => 4, 'DepartmentNeutralTweetsQuantity' => 5, 'PositivePopularTweetId' => 6, 'NegativePopularTweetId' => 7, 'DepartmentTwitterSharesQuantity' => 8, 'DepartmentFacebookSharesQuantity' => 9, ),
        self::TYPE_CAMELNAME     => array('departmentSummaryId' => 0, 'mapPublicationHour' => 1, 'departmentCode' => 2, 'departmentPositiveTweetsQuantity' => 3, 'departmentNegativeTweetsQuantity' => 4, 'departmentNeutralTweetsQuantity' => 5, 'positivePopularTweetId' => 6, 'negativePopularTweetId' => 7, 'departmentTwitterSharesQuantity' => 8, 'departmentFacebookSharesQuantity' => 9, ),
        self::TYPE_COLNAME       => array(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID => 0, DepartmentSummaryTableMap::COL_MAP_PUBLICATION_HOUR => 1, DepartmentSummaryTableMap::COL_DEPARTMENT_CODE => 2, DepartmentSummaryTableMap::COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY => 3, DepartmentSummaryTableMap::COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY => 4, DepartmentSummaryTableMap::COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY => 5, DepartmentSummaryTableMap::COL_POSITIVE_POPULAR_TWEET_ID => 6, DepartmentSummaryTableMap::COL_NEGATIVE_POPULAR_TWEET_ID => 7, DepartmentSummaryTableMap::COL_DEPARTMENT_TWITTER_SHARES_QUANTITY => 8, DepartmentSummaryTableMap::COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY => 9, ),
        self::TYPE_FIELDNAME     => array('department_summary_id' => 0, 'map_publication_hour' => 1, 'department_code' => 2, 'department_positive_tweets_quantity' => 3, 'department_negative_tweets_quantity' => 4, 'department_neutral_tweets_quantity' => 5, 'positive_popular_tweet_id' => 6, 'negative_popular_tweet_id' => 7, 'department_twitter_shares_quantity' => 8, 'department_facebook_shares_quantity' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('department_summary');
        $this->setPhpName('DepartmentSummary');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\Propel\\DepartmentSummary');
        $this->setPackage('Propel.Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('department_summary_id', 'DepartmentSummaryId', 'INTEGER', true, null, null);
        $this->addColumn('map_publication_hour', 'MapPublicationHour', 'TIMESTAMP', true, null, null);
        $this->addColumn('department_code', 'DepartmentCode', 'VARCHAR', true, 5, null);
        $this->addColumn('department_positive_tweets_quantity', 'DepartmentPositiveTweetsQuantity', 'INTEGER', true, null, null);
        $this->addColumn('department_negative_tweets_quantity', 'DepartmentNegativeTweetsQuantity', 'INTEGER', true, null, null);
        $this->addColumn('department_neutral_tweets_quantity', 'DepartmentNeutralTweetsQuantity', 'INTEGER', true, null, null);
        $this->addColumn('positive_popular_tweet_id', 'PositivePopularTweetId', 'INTEGER', true, null, null);
        $this->addColumn('negative_popular_tweet_id', 'NegativePopularTweetId', 'INTEGER', true, null, null);
        $this->addColumn('department_twitter_shares_quantity', 'DepartmentTwitterSharesQuantity', 'INTEGER', false, null, null);
        $this->addColumn('department_facebook_shares_quantity', 'DepartmentFacebookSharesQuantity', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Departments', '\\Propel\\Propel\\Departments', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':department_code',
    1 => ':department_code',
  ),
), null, null, 'Departmentss', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DepartmentSummaryId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DepartmentSummaryId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DepartmentSummaryId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DepartmentSummaryId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DepartmentSummaryId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DepartmentSummaryId', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('DepartmentSummaryId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? DepartmentSummaryTableMap::CLASS_DEFAULT : DepartmentSummaryTableMap::OM_CLASS;
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
     * @return array           (DepartmentSummary object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DepartmentSummaryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DepartmentSummaryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DepartmentSummaryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DepartmentSummaryTableMap::OM_CLASS;
            /** @var DepartmentSummary $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DepartmentSummaryTableMap::addInstanceToPool($obj, $key);
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
            $key = DepartmentSummaryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DepartmentSummaryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var DepartmentSummary $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DepartmentSummaryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID);
            $criteria->addSelectColumn(DepartmentSummaryTableMap::COL_MAP_PUBLICATION_HOUR);
            $criteria->addSelectColumn(DepartmentSummaryTableMap::COL_DEPARTMENT_CODE);
            $criteria->addSelectColumn(DepartmentSummaryTableMap::COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY);
            $criteria->addSelectColumn(DepartmentSummaryTableMap::COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY);
            $criteria->addSelectColumn(DepartmentSummaryTableMap::COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY);
            $criteria->addSelectColumn(DepartmentSummaryTableMap::COL_POSITIVE_POPULAR_TWEET_ID);
            $criteria->addSelectColumn(DepartmentSummaryTableMap::COL_NEGATIVE_POPULAR_TWEET_ID);
            $criteria->addSelectColumn(DepartmentSummaryTableMap::COL_DEPARTMENT_TWITTER_SHARES_QUANTITY);
            $criteria->addSelectColumn(DepartmentSummaryTableMap::COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY);
        } else {
            $criteria->addSelectColumn($alias . '.department_summary_id');
            $criteria->addSelectColumn($alias . '.map_publication_hour');
            $criteria->addSelectColumn($alias . '.department_code');
            $criteria->addSelectColumn($alias . '.department_positive_tweets_quantity');
            $criteria->addSelectColumn($alias . '.department_negative_tweets_quantity');
            $criteria->addSelectColumn($alias . '.department_neutral_tweets_quantity');
            $criteria->addSelectColumn($alias . '.positive_popular_tweet_id');
            $criteria->addSelectColumn($alias . '.negative_popular_tweet_id');
            $criteria->addSelectColumn($alias . '.department_twitter_shares_quantity');
            $criteria->addSelectColumn($alias . '.department_facebook_shares_quantity');
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
        return Propel::getServiceContainer()->getDatabaseMap(DepartmentSummaryTableMap::DATABASE_NAME)->getTable(DepartmentSummaryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DepartmentSummaryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DepartmentSummaryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DepartmentSummaryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a DepartmentSummary or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or DepartmentSummary object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DepartmentSummaryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\Propel\DepartmentSummary) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DepartmentSummaryTableMap::DATABASE_NAME);
            $criteria->add(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID, (array) $values, Criteria::IN);
        }

        $query = DepartmentSummaryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DepartmentSummaryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DepartmentSummaryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the department_summary table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DepartmentSummaryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a DepartmentSummary or Criteria object.
     *
     * @param mixed               $criteria Criteria or DepartmentSummary object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DepartmentSummaryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from DepartmentSummary object
        }

        if ($criteria->containsKey(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID) && $criteria->keyContainsValue(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID.')');
        }


        // Set the correct dbName
        $query = DepartmentSummaryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DepartmentSummaryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DepartmentSummaryTableMap::buildTableMap();
