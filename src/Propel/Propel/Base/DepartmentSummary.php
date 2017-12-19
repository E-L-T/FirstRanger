<?php

namespace Propel\Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\Propel\DepartmentSummaryQuery as ChildDepartmentSummaryQuery;
use Propel\Propel\Map\DepartmentSummaryTableMap;
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
 * Base class that represents a row from the 'department_summary' table.
 *
 *
 *
 * @package    propel.generator.Propel.Propel.Base
 */
abstract class DepartmentSummary implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Propel\\Map\\DepartmentSummaryTableMap';


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
     * The value for the department_summary_id field.
     *
     * @var        int
     */
    protected $department_summary_id;

    /**
     * The value for the map_publication_hour field.
     *
     * @var        DateTime
     */
    protected $map_publication_hour;

    /**
     * The value for the department_code field.
     *
     * @var        string
     */
    protected $department_code;

    /**
     * The value for the department_positive_tweets_quantity field.
     *
     * @var        int
     */
    protected $department_positive_tweets_quantity;

    /**
     * The value for the department_negative_tweets_quantity field.
     *
     * @var        int
     */
    protected $department_negative_tweets_quantity;

    /**
     * The value for the department_neutral_tweets_quantity field.
     *
     * @var        int
     */
    protected $department_neutral_tweets_quantity;

    /**
     * The value for the positive_popular_tweet_id field.
     *
     * @var        string
     */
    protected $positive_popular_tweet_id;

    /**
     * The value for the negative_popular_tweet_id field.
     *
     * @var        string
     */
    protected $negative_popular_tweet_id;

    /**
     * The value for the department_twitter_shares_quantity field.
     *
     * @var        int
     */
    protected $department_twitter_shares_quantity;

    /**
     * The value for the department_facebook_shares_quantity field.
     *
     * @var        int
     */
    protected $department_facebook_shares_quantity;

    /**
     * The value for the positive_twitter_account field.
     *
     * @var        string
     */
    protected $positive_twitter_account;

    /**
     * The value for the negative_twitter_account field.
     *
     * @var        string
     */
    protected $negative_twitter_account;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Propel\Propel\Base\DepartmentSummary object.
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
     * Compares this with another <code>DepartmentSummary</code> instance.  If
     * <code>obj</code> is an instance of <code>DepartmentSummary</code>, delegates to
     * <code>equals(DepartmentSummary)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|DepartmentSummary The current object, for fluid interface
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
     * Get the [department_summary_id] column value.
     *
     * @return int
     */
    public function getDepartmentSummaryId()
    {
        return $this->department_summary_id;
    }

    /**
     * Get the [optionally formatted] temporal [map_publication_hour] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMapPublicationHour($format = NULL)
    {
        if ($format === null) {
            return $this->map_publication_hour;
        } else {
            return $this->map_publication_hour instanceof \DateTimeInterface ? $this->map_publication_hour->format($format) : null;
        }
    }

    /**
     * Get the [department_code] column value.
     *
     * @return string
     */
    public function getDepartmentCode()
    {
        return $this->department_code;
    }

    /**
     * Get the [department_positive_tweets_quantity] column value.
     *
     * @return int
     */
    public function getDepartmentPositiveTweetsQuantity()
    {
        return $this->department_positive_tweets_quantity;
    }

    /**
     * Get the [department_negative_tweets_quantity] column value.
     *
     * @return int
     */
    public function getDepartmentNegativeTweetsQuantity()
    {
        return $this->department_negative_tweets_quantity;
    }

    /**
     * Get the [department_neutral_tweets_quantity] column value.
     *
     * @return int
     */
    public function getDepartmentNeutralTweetsQuantity()
    {
        return $this->department_neutral_tweets_quantity;
    }

    /**
     * Get the [positive_popular_tweet_id] column value.
     *
     * @return string
     */
    public function getPositivePopularTweetId()
    {
        return $this->positive_popular_tweet_id;
    }

    /**
     * Get the [negative_popular_tweet_id] column value.
     *
     * @return string
     */
    public function getNegativePopularTweetId()
    {
        return $this->negative_popular_tweet_id;
    }

    /**
     * Get the [department_twitter_shares_quantity] column value.
     *
     * @return int
     */
    public function getDepartmentTwitterSharesQuantity()
    {
        return $this->department_twitter_shares_quantity;
    }

    /**
     * Get the [department_facebook_shares_quantity] column value.
     *
     * @return int
     */
    public function getDepartmentFacebookSharesQuantity()
    {
        return $this->department_facebook_shares_quantity;
    }

    /**
     * Get the [positive_twitter_account] column value.
     *
     * @return string
     */
    public function getPositiveTwitterAccount()
    {
        return $this->positive_twitter_account;
    }

    /**
     * Get the [negative_twitter_account] column value.
     *
     * @return string
     */
    public function getNegativeTwitterAccount()
    {
        return $this->negative_twitter_account;
    }

    /**
     * Set the value of [department_summary_id] column.
     *
     * @param int $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setDepartmentSummaryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->department_summary_id !== $v) {
            $this->department_summary_id = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID] = true;
        }

        return $this;
    } // setDepartmentSummaryId()

    /**
     * Sets the value of [map_publication_hour] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setMapPublicationHour($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->map_publication_hour !== null || $dt !== null) {
            if ($this->map_publication_hour === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->map_publication_hour->format("Y-m-d H:i:s.u")) {
                $this->map_publication_hour = $dt === null ? null : clone $dt;
                $this->modifiedColumns[DepartmentSummaryTableMap::COL_MAP_PUBLICATION_HOUR] = true;
            }
        } // if either are not null

        return $this;
    } // setMapPublicationHour()

    /**
     * Set the value of [department_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setDepartmentCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->department_code !== $v) {
            $this->department_code = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_DEPARTMENT_CODE] = true;
        }

        return $this;
    } // setDepartmentCode()

    /**
     * Set the value of [department_positive_tweets_quantity] column.
     *
     * @param int $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setDepartmentPositiveTweetsQuantity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->department_positive_tweets_quantity !== $v) {
            $this->department_positive_tweets_quantity = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY] = true;
        }

        return $this;
    } // setDepartmentPositiveTweetsQuantity()

    /**
     * Set the value of [department_negative_tweets_quantity] column.
     *
     * @param int $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setDepartmentNegativeTweetsQuantity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->department_negative_tweets_quantity !== $v) {
            $this->department_negative_tweets_quantity = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY] = true;
        }

        return $this;
    } // setDepartmentNegativeTweetsQuantity()

    /**
     * Set the value of [department_neutral_tweets_quantity] column.
     *
     * @param int $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setDepartmentNeutralTweetsQuantity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->department_neutral_tweets_quantity !== $v) {
            $this->department_neutral_tweets_quantity = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY] = true;
        }

        return $this;
    } // setDepartmentNeutralTweetsQuantity()

    /**
     * Set the value of [positive_popular_tweet_id] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setPositivePopularTweetId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->positive_popular_tweet_id !== $v) {
            $this->positive_popular_tweet_id = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_POSITIVE_POPULAR_TWEET_ID] = true;
        }

        return $this;
    } // setPositivePopularTweetId()

    /**
     * Set the value of [negative_popular_tweet_id] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setNegativePopularTweetId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->negative_popular_tweet_id !== $v) {
            $this->negative_popular_tweet_id = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_NEGATIVE_POPULAR_TWEET_ID] = true;
        }

        return $this;
    } // setNegativePopularTweetId()

    /**
     * Set the value of [department_twitter_shares_quantity] column.
     *
     * @param int $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setDepartmentTwitterSharesQuantity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->department_twitter_shares_quantity !== $v) {
            $this->department_twitter_shares_quantity = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_DEPARTMENT_TWITTER_SHARES_QUANTITY] = true;
        }

        return $this;
    } // setDepartmentTwitterSharesQuantity()

    /**
     * Set the value of [department_facebook_shares_quantity] column.
     *
     * @param int $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setDepartmentFacebookSharesQuantity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->department_facebook_shares_quantity !== $v) {
            $this->department_facebook_shares_quantity = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY] = true;
        }

        return $this;
    } // setDepartmentFacebookSharesQuantity()

    /**
     * Set the value of [positive_twitter_account] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setPositiveTwitterAccount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->positive_twitter_account !== $v) {
            $this->positive_twitter_account = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_POSITIVE_TWITTER_ACCOUNT] = true;
        }

        return $this;
    } // setPositiveTwitterAccount()

    /**
     * Set the value of [negative_twitter_account] column.
     *
     * @param string $v new value
     * @return $this|\Propel\Propel\DepartmentSummary The current object (for fluent API support)
     */
    public function setNegativeTwitterAccount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->negative_twitter_account !== $v) {
            $this->negative_twitter_account = $v;
            $this->modifiedColumns[DepartmentSummaryTableMap::COL_NEGATIVE_TWITTER_ACCOUNT] = true;
        }

        return $this;
    } // setNegativeTwitterAccount()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : DepartmentSummaryTableMap::translateFieldName('DepartmentSummaryId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->department_summary_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : DepartmentSummaryTableMap::translateFieldName('MapPublicationHour', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->map_publication_hour = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : DepartmentSummaryTableMap::translateFieldName('DepartmentCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->department_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : DepartmentSummaryTableMap::translateFieldName('DepartmentPositiveTweetsQuantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->department_positive_tweets_quantity = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : DepartmentSummaryTableMap::translateFieldName('DepartmentNegativeTweetsQuantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->department_negative_tweets_quantity = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : DepartmentSummaryTableMap::translateFieldName('DepartmentNeutralTweetsQuantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->department_neutral_tweets_quantity = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : DepartmentSummaryTableMap::translateFieldName('PositivePopularTweetId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->positive_popular_tweet_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : DepartmentSummaryTableMap::translateFieldName('NegativePopularTweetId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->negative_popular_tweet_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : DepartmentSummaryTableMap::translateFieldName('DepartmentTwitterSharesQuantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->department_twitter_shares_quantity = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : DepartmentSummaryTableMap::translateFieldName('DepartmentFacebookSharesQuantity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->department_facebook_shares_quantity = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : DepartmentSummaryTableMap::translateFieldName('PositiveTwitterAccount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->positive_twitter_account = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : DepartmentSummaryTableMap::translateFieldName('NegativeTwitterAccount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->negative_twitter_account = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = DepartmentSummaryTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\Propel\\DepartmentSummary'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(DepartmentSummaryTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildDepartmentSummaryQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see DepartmentSummary::setDeleted()
     * @see DepartmentSummary::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(DepartmentSummaryTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildDepartmentSummaryQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(DepartmentSummaryTableMap::DATABASE_NAME);
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
                DepartmentSummaryTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID] = true;
        if (null !== $this->department_summary_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'department_summary_id';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_MAP_PUBLICATION_HOUR)) {
            $modifiedColumns[':p' . $index++]  = 'map_publication_hour';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'department_code';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'department_positive_tweets_quantity';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'department_negative_tweets_quantity';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'department_neutral_tweets_quantity';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_POSITIVE_POPULAR_TWEET_ID)) {
            $modifiedColumns[':p' . $index++]  = 'positive_popular_tweet_id';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_NEGATIVE_POPULAR_TWEET_ID)) {
            $modifiedColumns[':p' . $index++]  = 'negative_popular_tweet_id';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_TWITTER_SHARES_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'department_twitter_shares_quantity';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = 'department_facebook_shares_quantity';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_POSITIVE_TWITTER_ACCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'positive_twitter_account';
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_NEGATIVE_TWITTER_ACCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'negative_twitter_account';
        }

        $sql = sprintf(
            'INSERT INTO department_summary (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'department_summary_id':
                        $stmt->bindValue($identifier, $this->department_summary_id, PDO::PARAM_INT);
                        break;
                    case 'map_publication_hour':
                        $stmt->bindValue($identifier, $this->map_publication_hour ? $this->map_publication_hour->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'department_code':
                        $stmt->bindValue($identifier, $this->department_code, PDO::PARAM_STR);
                        break;
                    case 'department_positive_tweets_quantity':
                        $stmt->bindValue($identifier, $this->department_positive_tweets_quantity, PDO::PARAM_INT);
                        break;
                    case 'department_negative_tweets_quantity':
                        $stmt->bindValue($identifier, $this->department_negative_tweets_quantity, PDO::PARAM_INT);
                        break;
                    case 'department_neutral_tweets_quantity':
                        $stmt->bindValue($identifier, $this->department_neutral_tweets_quantity, PDO::PARAM_INT);
                        break;
                    case 'positive_popular_tweet_id':
                        $stmt->bindValue($identifier, $this->positive_popular_tweet_id, PDO::PARAM_INT);
                        break;
                    case 'negative_popular_tweet_id':
                        $stmt->bindValue($identifier, $this->negative_popular_tweet_id, PDO::PARAM_INT);
                        break;
                    case 'department_twitter_shares_quantity':
                        $stmt->bindValue($identifier, $this->department_twitter_shares_quantity, PDO::PARAM_INT);
                        break;
                    case 'department_facebook_shares_quantity':
                        $stmt->bindValue($identifier, $this->department_facebook_shares_quantity, PDO::PARAM_INT);
                        break;
                    case 'positive_twitter_account':
                        $stmt->bindValue($identifier, $this->positive_twitter_account, PDO::PARAM_STR);
                        break;
                    case 'negative_twitter_account':
                        $stmt->bindValue($identifier, $this->negative_twitter_account, PDO::PARAM_STR);
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
        $this->setDepartmentSummaryId($pk);

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
        $pos = DepartmentSummaryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getDepartmentSummaryId();
                break;
            case 1:
                return $this->getMapPublicationHour();
                break;
            case 2:
                return $this->getDepartmentCode();
                break;
            case 3:
                return $this->getDepartmentPositiveTweetsQuantity();
                break;
            case 4:
                return $this->getDepartmentNegativeTweetsQuantity();
                break;
            case 5:
                return $this->getDepartmentNeutralTweetsQuantity();
                break;
            case 6:
                return $this->getPositivePopularTweetId();
                break;
            case 7:
                return $this->getNegativePopularTweetId();
                break;
            case 8:
                return $this->getDepartmentTwitterSharesQuantity();
                break;
            case 9:
                return $this->getDepartmentFacebookSharesQuantity();
                break;
            case 10:
                return $this->getPositiveTwitterAccount();
                break;
            case 11:
                return $this->getNegativeTwitterAccount();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['DepartmentSummary'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['DepartmentSummary'][$this->hashCode()] = true;
        $keys = DepartmentSummaryTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getDepartmentSummaryId(),
            $keys[1] => $this->getMapPublicationHour(),
            $keys[2] => $this->getDepartmentCode(),
            $keys[3] => $this->getDepartmentPositiveTweetsQuantity(),
            $keys[4] => $this->getDepartmentNegativeTweetsQuantity(),
            $keys[5] => $this->getDepartmentNeutralTweetsQuantity(),
            $keys[6] => $this->getPositivePopularTweetId(),
            $keys[7] => $this->getNegativePopularTweetId(),
            $keys[8] => $this->getDepartmentTwitterSharesQuantity(),
            $keys[9] => $this->getDepartmentFacebookSharesQuantity(),
            $keys[10] => $this->getPositiveTwitterAccount(),
            $keys[11] => $this->getNegativeTwitterAccount(),
        );
        if ($result[$keys[1]] instanceof \DateTimeInterface) {
            $result[$keys[1]] = $result[$keys[1]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
     * @return $this|\Propel\Propel\DepartmentSummary
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = DepartmentSummaryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\Propel\DepartmentSummary
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setDepartmentSummaryId($value);
                break;
            case 1:
                $this->setMapPublicationHour($value);
                break;
            case 2:
                $this->setDepartmentCode($value);
                break;
            case 3:
                $this->setDepartmentPositiveTweetsQuantity($value);
                break;
            case 4:
                $this->setDepartmentNegativeTweetsQuantity($value);
                break;
            case 5:
                $this->setDepartmentNeutralTweetsQuantity($value);
                break;
            case 6:
                $this->setPositivePopularTweetId($value);
                break;
            case 7:
                $this->setNegativePopularTweetId($value);
                break;
            case 8:
                $this->setDepartmentTwitterSharesQuantity($value);
                break;
            case 9:
                $this->setDepartmentFacebookSharesQuantity($value);
                break;
            case 10:
                $this->setPositiveTwitterAccount($value);
                break;
            case 11:
                $this->setNegativeTwitterAccount($value);
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
        $keys = DepartmentSummaryTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setDepartmentSummaryId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setMapPublicationHour($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDepartmentCode($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDepartmentPositiveTweetsQuantity($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDepartmentNegativeTweetsQuantity($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDepartmentNeutralTweetsQuantity($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPositivePopularTweetId($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setNegativePopularTweetId($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setDepartmentTwitterSharesQuantity($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDepartmentFacebookSharesQuantity($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPositiveTwitterAccount($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setNegativeTwitterAccount($arr[$keys[11]]);
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
     * @return $this|\Propel\Propel\DepartmentSummary The current object, for fluid interface
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
        $criteria = new Criteria(DepartmentSummaryTableMap::DATABASE_NAME);

        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID)) {
            $criteria->add(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID, $this->department_summary_id);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_MAP_PUBLICATION_HOUR)) {
            $criteria->add(DepartmentSummaryTableMap::COL_MAP_PUBLICATION_HOUR, $this->map_publication_hour);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_CODE)) {
            $criteria->add(DepartmentSummaryTableMap::COL_DEPARTMENT_CODE, $this->department_code);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY)) {
            $criteria->add(DepartmentSummaryTableMap::COL_DEPARTMENT_POSITIVE_TWEETS_QUANTITY, $this->department_positive_tweets_quantity);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY)) {
            $criteria->add(DepartmentSummaryTableMap::COL_DEPARTMENT_NEGATIVE_TWEETS_QUANTITY, $this->department_negative_tweets_quantity);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY)) {
            $criteria->add(DepartmentSummaryTableMap::COL_DEPARTMENT_NEUTRAL_TWEETS_QUANTITY, $this->department_neutral_tweets_quantity);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_POSITIVE_POPULAR_TWEET_ID)) {
            $criteria->add(DepartmentSummaryTableMap::COL_POSITIVE_POPULAR_TWEET_ID, $this->positive_popular_tweet_id);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_NEGATIVE_POPULAR_TWEET_ID)) {
            $criteria->add(DepartmentSummaryTableMap::COL_NEGATIVE_POPULAR_TWEET_ID, $this->negative_popular_tweet_id);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_TWITTER_SHARES_QUANTITY)) {
            $criteria->add(DepartmentSummaryTableMap::COL_DEPARTMENT_TWITTER_SHARES_QUANTITY, $this->department_twitter_shares_quantity);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY)) {
            $criteria->add(DepartmentSummaryTableMap::COL_DEPARTMENT_FACEBOOK_SHARES_QUANTITY, $this->department_facebook_shares_quantity);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_POSITIVE_TWITTER_ACCOUNT)) {
            $criteria->add(DepartmentSummaryTableMap::COL_POSITIVE_TWITTER_ACCOUNT, $this->positive_twitter_account);
        }
        if ($this->isColumnModified(DepartmentSummaryTableMap::COL_NEGATIVE_TWITTER_ACCOUNT)) {
            $criteria->add(DepartmentSummaryTableMap::COL_NEGATIVE_TWITTER_ACCOUNT, $this->negative_twitter_account);
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
        $criteria = ChildDepartmentSummaryQuery::create();
        $criteria->add(DepartmentSummaryTableMap::COL_DEPARTMENT_SUMMARY_ID, $this->department_summary_id);

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
        $validPk = null !== $this->getDepartmentSummaryId();

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
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getDepartmentSummaryId();
    }

    /**
     * Generic method to set the primary key (department_summary_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setDepartmentSummaryId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getDepartmentSummaryId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\Propel\DepartmentSummary (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMapPublicationHour($this->getMapPublicationHour());
        $copyObj->setDepartmentCode($this->getDepartmentCode());
        $copyObj->setDepartmentPositiveTweetsQuantity($this->getDepartmentPositiveTweetsQuantity());
        $copyObj->setDepartmentNegativeTweetsQuantity($this->getDepartmentNegativeTweetsQuantity());
        $copyObj->setDepartmentNeutralTweetsQuantity($this->getDepartmentNeutralTweetsQuantity());
        $copyObj->setPositivePopularTweetId($this->getPositivePopularTweetId());
        $copyObj->setNegativePopularTweetId($this->getNegativePopularTweetId());
        $copyObj->setDepartmentTwitterSharesQuantity($this->getDepartmentTwitterSharesQuantity());
        $copyObj->setDepartmentFacebookSharesQuantity($this->getDepartmentFacebookSharesQuantity());
        $copyObj->setPositiveTwitterAccount($this->getPositiveTwitterAccount());
        $copyObj->setNegativeTwitterAccount($this->getNegativeTwitterAccount());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setDepartmentSummaryId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\Propel\DepartmentSummary Clone of current object.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->department_summary_id = null;
        $this->map_publication_hour = null;
        $this->department_code = null;
        $this->department_positive_tweets_quantity = null;
        $this->department_negative_tweets_quantity = null;
        $this->department_neutral_tweets_quantity = null;
        $this->positive_popular_tweet_id = null;
        $this->negative_popular_tweet_id = null;
        $this->department_twitter_shares_quantity = null;
        $this->department_facebook_shares_quantity = null;
        $this->positive_twitter_account = null;
        $this->negative_twitter_account = null;
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

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DepartmentSummaryTableMap::DEFAULT_STRING_FORMAT);
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
