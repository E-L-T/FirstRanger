<?php

namespace Propel\Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\Propel\Geocodes as ChildGeocodes;
use Propel\Propel\GeocodesQuery as ChildGeocodesQuery;
use Propel\Propel\TweetsQuery as ChildTweetsQuery;
use Propel\Propel\Map\TweetsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'tweets' table.
 *
 *
 *
 * @package    propel.generator.Propel.Propel.Base
 */
abstract class Tweets implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Propel\\Map\\TweetsTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the tweet_id field.
     *
     * @var        string
     */
    protected $tweet_id;

    /**
     * The value for the api_tweet_id field.
     *
     * @var        string
     */
    protected $api_tweet_id;

    /**
     * The value for the tweet_text field.
     *
     * @var        string
     */
    protected $tweet_text;

    /**
     * The value for the tweet_publication_hour field.
     *
     * @var        DateTime
     */
    protected $tweet_publication_hour;

    /**
     * The value for the geocode_id field.
     *
     * @var        int
     */
    protected $geocode_id;

    /**
     * The value for the retweets_quantity field.
     *
     * @var        int
     */
    protected $retweets_quantity;

    /**
     * The value for the favorites_quantity field.
     *
     * @var        int
     */
    protected $favorites_quantity;

    /**
     * The value for the twitter_account field.
     *
     * @var        string
     */
    protected $twitter_account;

    /**
     * The value for the coordinates field.
     *
     * @var        string
     */
    protected $coordinates;

    /**
     * The value for the location field.
     *
     * @var        string
     */
    protected $location;

    /**
     * The value for the quality_tweet field.
     *
     * @var        string
     */
    protected $quality_tweet;

    /**
     * @var        ChildGeocodes
     */
    protected $aGeocodes;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Propel\Propel\Base\Tweets object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Tweets</code> instance.  If
     * <code>obj</code> is an instance of <code>Tweets</code>, delegates to
     * <code>equals(Tweets)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Tweets The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [tweet_id] column value.
     *
     * @return string
     */
    public function getTweetId()
    {
        return $this->tweet_id;
    }

    /**
     * Get the [api_tweet_id] column value.
     *
     * @return string
     */
    public function getApiTweetId()
    {
        return $this->api_tweet_id;
    }

    /**
     * Get the [tweet_text] column value.
     *
     * @return string
     */
    public function getTweetText()
    {
        return $this->tweet_text;
    }

    /**
     * Get the [optionally formatted] temporal [tweet_publication_hour] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTweetPublicationHour($format = NULL)
    {
        if ($format === null) {
            return $this->tweet_publication_hour;
        } else {
            return $this->tweet_publication_hour instanceof \DateTimeInterface ? $this->tweet_publication_hour->format($format) : null;
        }
    }

    /**
     * Get the [geocode_id] column value.
     *
     * @return int
     */
    public function getGeocodeId()
    {
        return $this->geocode_id;
    }

    /**
     * Get the [retweets_quantity] column value.
     *
     * @return int
     */
    public function getRetweetsQuantity()
    {
        return $this->retweets_quantity;
    }

    /**
     * Get the [favorites_quantity] column value.
     *
     * @return int
     */
    public function getFavoritesQuantity()
    {
        return $this->favorites_quantity;
    }

    /**
     * Get the [twitter_account] column value.
     *
     * @return string
     */
    public function getTwitterAccount()
    {
        return $this->twitter_account;
    }

    /**
     * Get the [coordinates] column value.
     *
     * @return string
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Get the [location] column value.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the [quality_tweet] column value.
     *
     * @return string
     */
    public function getQualityTweet()
    {
        return $this->quality_tweet;
    }

    /**
     * Set the value of [tweet_id] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setTweetId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tweet_id !== $v) {
            $this->tweet_id = $v;
            $this->modifiedColumns[TweetsTableMap::COL_TWEET_ID] = true;
        }

        return $this;
    } // setTweetId()

    /**
     * Set the value of [api_tweet_id] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setApiTweetId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->api_tweet_id !== $v) {
            $this->api_tweet_id = $v;
            $this->modifiedColumns[TweetsTableMap::COL_API_TWEET_ID] = true;
        }

        return $this;
    } // setApiTweetId()

    /**
     * Set the value of [tweet_text] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setTweetText($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tweet_text !== $v) {
            $this->tweet_text = $v;
            $this->modifiedColumns[TweetsTableMap::COL_TWEET_TEXT] = true;
        }

        return $this;
    } // setTweetText()

    /**
     * Sets the value of [tweet_publication_hour] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setTweetPublicationHour($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tweet_publication_hour !== null || $dt !== null) {
            if ($this->tweet_publication_hour === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->tweet_publication_hour->format("Y-m-d H:i:s.u")) {
                $this->tweet_publication_hour = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TweetsTableMap::COL_TWEET_PUBLICATION_HOUR] = true;
            }
        } // if either are not null

        return $this;
    } // setTweetPublicationHour()

    /**
     * Set the value of [geocode_id] column.
     *
     * @param int $v new value
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setGeocodeId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->geocode_id !== $v) {
            $this->geocode_id = $v;
            $this->modifiedColumns[TweetsTableMap::COL_GEOCODE_ID] = true;
        }

        if ($this->aGeocodes !== null && $this->aGeocodes->getGeocodeId() !== $v) {
            $this->aGeocodes = null;
        }

        return $this;
    } // setGeocodeId()

    /**
     * Set the value of [retweets_quantity] column.
     *
     * @param int $v new value
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setRetweetsQuantity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->retweets_quantity !== $v) {
            $this->retweets_quantity = $v;
            $this->modifiedColumns[TweetsTableMap::COL_RETWEETS_QUANTITY] = true;
        }

        return $this;
    } // setRetweetsQuantity()

    /**
     * Set the value of [favorites_quantity] column.
     *
     * @param int $v new value
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setFavoritesQuantity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->favorites_quantity !== $v) {
            $this->favorites_quantity = $v;
            $this->modifiedColumns[TweetsTableMap::COL_FAVORITES_QUANTITY] = true;
        }

        return $this;
    } // setFavoritesQuantity()

    /**
     * Set the value of [twitter_account] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setTwitterAccount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->twitter_account !== $v) {
            $this->twitter_account = $v;
            $this->modifiedColumns[TweetsTableMap::COL_TWITTER_ACCOUNT] = true;
        }

        return $this;
    } // setTwitterAccount()

    /**
     * Set the value of [coordinates] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setCoordinates($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->coordinates !== $v) {
            $this->coordinates = $v;
            $this->modifiedColumns[TweetsTableMap::COL_COORDINATES] = true;
        }

        return $this;
    } // setCoordinates()

    /**
     * Set the value of [location] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setLocation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->location !== $v) {
            $this->location = $v;
            $this->modifiedColumns[TweetsTableMap::COL_LOCATION] = true;
        }

        return $this;
    } // setLocation()

    /**
     * Set the value of [quality_tweet] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     */
    public function setQualityTweet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quality_tweet !== $v) {
            $this->quality_tweet = $v;
            $this->modifiedColumns[TweetsTableMap::COL_QUALITY_TWEET] = true;
        }

        return $this;
    } // setQualityTweet()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TweetsTableMap::translateFieldName('TweetId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tweet_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TweetsTableMap::translateFieldName('ApiTweetId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->api_tweet_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TweetsTableMap::translateFieldName('TweetText', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tweet_text = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TweetsTableMap::translateFieldName('TweetPublicationHour', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->tweet_publication_hour = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TweetsTableMap::translateFieldName('GeocodeId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->geocode_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TweetsTableMap::translateFieldName('RetweetsQuantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->retweets_quantity = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TweetsTableMap::translateFieldName('FavoritesQuantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->favorites_quantity = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : TweetsTableMap::translateFieldName('TwitterAccount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->twitter_account = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : TweetsTableMap::translateFieldName('Coordinates', TableMap::TYPE_PHPNAME, $indexType)];
            $this->coordinates = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : TweetsTableMap::translateFieldName('Location', TableMap::TYPE_PHPNAME, $indexType)];
            $this->location = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : TweetsTableMap::translateFieldName('QualityTweet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quality_tweet = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 11; // 11 = TweetsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\Propel\\Tweets'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aGeocodes !== null && $this->geocode_id !== $this->aGeocodes->getGeocodeId()) {
            $this->aGeocodes = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TweetsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTweetsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aGeocodes = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Tweets::setDeleted()
     * @see Tweets::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TweetsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTweetsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TweetsTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                TweetsTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aGeocodes !== null) {
                if ($this->aGeocodes->isModified() || $this->aGeocodes->isNew()) {
                    $affectedRows += $this->aGeocodes->save($con);
                }
                $this->setGeocodes($this->aGeocodes);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[TweetsTableMap::COL_TWEET_ID] = true;
        if (null !== $this->tweet_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TweetsTableMap::COL_TWEET_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TweetsTableMap::COL_TWEET_ID)) {
            $modifiedColumns[':p' . $index++]  = 'tweet_id';
        }
        if ($this->isColumnModified(TweetsTableMap::COL_API_TWEET_ID)) {
            $modifiedColumns[':p' . $index++]  = 'api_tweet_id';
        }
        if ($this->isColumnModified(TweetsTableMap::COL_TWEET_TEXT)) {
            $modifiedColumns[':p' . $index++]  = 'tweet_text';
        }
        if ($this->isColumnModified(TweetsTableMap::COL_TWEET_PUBLICATION_HOUR)) {
            $modifiedColumns[':p' . $index++]  = 'tweet_publication_hour';
        }
        if ($this->isColumnModified(TweetsTableMap::COL_GEOCODE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'geocode_id';
        }
        if ($this->isColumnModified(TweetsTableMap::COL_RETWEETS_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'retweets_quantity';
        }
        if ($this->isColumnModified(TweetsTableMap::COL_FAVORITES_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'favorites_quantity';
        }
        if ($this->isColumnModified(TweetsTableMap::COL_TWITTER_ACCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'twitter_account';
        }
        if ($this->isColumnModified(TweetsTableMap::COL_COORDINATES)) {
            $modifiedColumns[':p' . $index++]  = 'coordinates';
        }
        if ($this->isColumnModified(TweetsTableMap::COL_LOCATION)) {
            $modifiedColumns[':p' . $index++]  = 'location';
        }
        if ($this->isColumnModified(TweetsTableMap::COL_QUALITY_TWEET)) {
            $modifiedColumns[':p' . $index++]  = 'quality_tweet';
        }

        $sql = sprintf(
            'INSERT INTO tweets (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'tweet_id':
                        $stmt->bindValue($identifier, $this->tweet_id, PDO::PARAM_INT);
                        break;
                    case 'api_tweet_id':
                        $stmt->bindValue($identifier, $this->api_tweet_id, PDO::PARAM_INT);
                        break;
                    case 'tweet_text':
                        $stmt->bindValue($identifier, $this->tweet_text, PDO::PARAM_STR);
                        break;
                    case 'tweet_publication_hour':
                        $stmt->bindValue($identifier, $this->tweet_publication_hour ? $this->tweet_publication_hour->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'geocode_id':
                        $stmt->bindValue($identifier, $this->geocode_id, PDO::PARAM_INT);
                        break;
                    case 'retweets_quantity':
                        $stmt->bindValue($identifier, $this->retweets_quantity, PDO::PARAM_INT);
                        break;
                    case 'favorites_quantity':
                        $stmt->bindValue($identifier, $this->favorites_quantity, PDO::PARAM_INT);
                        break;
                    case 'twitter_account':
                        $stmt->bindValue($identifier, $this->twitter_account, PDO::PARAM_STR);
                        break;
                    case 'coordinates':
                        $stmt->bindValue($identifier, $this->coordinates, PDO::PARAM_STR);
                        break;
                    case 'location':
                        $stmt->bindValue($identifier, $this->location, PDO::PARAM_STR);
                        break;
                    case 'quality_tweet':
                        $stmt->bindValue($identifier, $this->quality_tweet, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setTweetId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TweetsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getTweetId();
                break;
            case 1:
                return $this->getApiTweetId();
                break;
            case 2:
                return $this->getTweetText();
                break;
            case 3:
                return $this->getTweetPublicationHour();
                break;
            case 4:
                return $this->getGeocodeId();
                break;
            case 5:
                return $this->getRetweetsQuantity();
                break;
            case 6:
                return $this->getFavoritesQuantity();
                break;
            case 7:
                return $this->getTwitterAccount();
                break;
            case 8:
                return $this->getCoordinates();
                break;
            case 9:
                return $this->getLocation();
                break;
            case 10:
                return $this->getQualityTweet();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Tweets'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tweets'][$this->hashCode()] = true;
        $keys = TweetsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTweetId(),
            $keys[1] => $this->getApiTweetId(),
            $keys[2] => $this->getTweetText(),
            $keys[3] => $this->getTweetPublicationHour(),
            $keys[4] => $this->getGeocodeId(),
            $keys[5] => $this->getRetweetsQuantity(),
            $keys[6] => $this->getFavoritesQuantity(),
            $keys[7] => $this->getTwitterAccount(),
            $keys[8] => $this->getCoordinates(),
            $keys[9] => $this->getLocation(),
            $keys[10] => $this->getQualityTweet(),
        );
        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aGeocodes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'geocodes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'geocodes';
                        break;
                    default:
                        $key = 'Geocodes';
                }

                $result[$key] = $this->aGeocodes->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Propel\Propel\Tweets
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TweetsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\Propel\Tweets
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setTweetId($value);
                break;
            case 1:
                $this->setApiTweetId($value);
                break;
            case 2:
                $this->setTweetText($value);
                break;
            case 3:
                $this->setTweetPublicationHour($value);
                break;
            case 4:
                $this->setGeocodeId($value);
                break;
            case 5:
                $this->setRetweetsQuantity($value);
                break;
            case 6:
                $this->setFavoritesQuantity($value);
                break;
            case 7:
                $this->setTwitterAccount($value);
                break;
            case 8:
                $this->setCoordinates($value);
                break;
            case 9:
                $this->setLocation($value);
                break;
            case 10:
                $this->setQualityTweet($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = TweetsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setTweetId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setApiTweetId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTweetText($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTweetPublicationHour($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setGeocodeId($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setRetweetsQuantity($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFavoritesQuantity($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTwitterAccount($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCoordinates($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setLocation($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setQualityTweet($arr[$keys[10]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Propel\Propel\Tweets The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TweetsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TweetsTableMap::COL_TWEET_ID)) {
            $criteria->add(TweetsTableMap::COL_TWEET_ID, $this->tweet_id);
        }
        if ($this->isColumnModified(TweetsTableMap::COL_API_TWEET_ID)) {
            $criteria->add(TweetsTableMap::COL_API_TWEET_ID, $this->api_tweet_id);
        }
        if ($this->isColumnModified(TweetsTableMap::COL_TWEET_TEXT)) {
            $criteria->add(TweetsTableMap::COL_TWEET_TEXT, $this->tweet_text);
        }
        if ($this->isColumnModified(TweetsTableMap::COL_TWEET_PUBLICATION_HOUR)) {
            $criteria->add(TweetsTableMap::COL_TWEET_PUBLICATION_HOUR, $this->tweet_publication_hour);
        }
        if ($this->isColumnModified(TweetsTableMap::COL_GEOCODE_ID)) {
            $criteria->add(TweetsTableMap::COL_GEOCODE_ID, $this->geocode_id);
        }
        if ($this->isColumnModified(TweetsTableMap::COL_RETWEETS_QUANTITY)) {
            $criteria->add(TweetsTableMap::COL_RETWEETS_QUANTITY, $this->retweets_quantity);
        }
        if ($this->isColumnModified(TweetsTableMap::COL_FAVORITES_QUANTITY)) {
            $criteria->add(TweetsTableMap::COL_FAVORITES_QUANTITY, $this->favorites_quantity);
        }
        if ($this->isColumnModified(TweetsTableMap::COL_TWITTER_ACCOUNT)) {
            $criteria->add(TweetsTableMap::COL_TWITTER_ACCOUNT, $this->twitter_account);
        }
        if ($this->isColumnModified(TweetsTableMap::COL_COORDINATES)) {
            $criteria->add(TweetsTableMap::COL_COORDINATES, $this->coordinates);
        }
        if ($this->isColumnModified(TweetsTableMap::COL_LOCATION)) {
            $criteria->add(TweetsTableMap::COL_LOCATION, $this->location);
        }
        if ($this->isColumnModified(TweetsTableMap::COL_QUALITY_TWEET)) {
            $criteria->add(TweetsTableMap::COL_QUALITY_TWEET, $this->quality_tweet);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildTweetsQuery::create();
        $criteria->add(TweetsTableMap::COL_TWEET_ID, $this->tweet_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getTweetId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getTweetId();
    }

    /**
     * Generic method to set the primary key (tweet_id column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTweetId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getTweetId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\Propel\Tweets (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setApiTweetId($this->getApiTweetId());
        $copyObj->setTweetText($this->getTweetText());
        $copyObj->setTweetPublicationHour($this->getTweetPublicationHour());
        $copyObj->setGeocodeId($this->getGeocodeId());
        $copyObj->setRetweetsQuantity($this->getRetweetsQuantity());
        $copyObj->setFavoritesQuantity($this->getFavoritesQuantity());
        $copyObj->setTwitterAccount($this->getTwitterAccount());
        $copyObj->setCoordinates($this->getCoordinates());
        $copyObj->setLocation($this->getLocation());
        $copyObj->setQualityTweet($this->getQualityTweet());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTweetId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Propel\Propel\Tweets Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildGeocodes object.
     *
     * @param  ChildGeocodes $v
     * @return $this|\Propel\Propel\Tweets The current object (for fluent API support)
     * @throws PropelException
     */
    public function setGeocodes(ChildGeocodes $v = null)
    {
        if ($v === null) {
            $this->setGeocodeId(NULL);
        } else {
            $this->setGeocodeId($v->getGeocodeId());
        }

        $this->aGeocodes = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildGeocodes object, it will not be re-added.
        if ($v !== null) {
            $v->addTweets($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildGeocodes object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildGeocodes The associated ChildGeocodes object.
     * @throws PropelException
     */
    public function getGeocodes(ConnectionInterface $con = null)
    {
        if ($this->aGeocodes === null && ($this->geocode_id != 0)) {
            $this->aGeocodes = ChildGeocodesQuery::create()->findPk($this->geocode_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aGeocodes->addTweetss($this);
             */
        }

        return $this->aGeocodes;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aGeocodes) {
            $this->aGeocodes->removeTweets($this);
        }
        $this->tweet_id = null;
        $this->api_tweet_id = null;
        $this->tweet_text = null;
        $this->tweet_publication_hour = null;
        $this->geocode_id = null;
        $this->retweets_quantity = null;
        $this->favorites_quantity = null;
        $this->twitter_account = null;
        $this->coordinates = null;
        $this->location = null;
        $this->quality_tweet = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

        $this->aGeocodes = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TweetsTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
