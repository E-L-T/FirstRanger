<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1513683298.
 * Generated on 2017-12-19 12:34:58 by eric
 */
class PropelMigration_1513683298
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `department_summary`

  CHANGE `twitter_account` `positive_twitter_account` TEXT NOT NULL,

  ADD `negative_twitter_account` TEXT NOT NULL AFTER `positive_twitter_account`;

ALTER TABLE `tweets`

  CHANGE `positive_twitter_account` `twitter_account` TEXT NOT NULL,

  DROP `negative_twitter_account`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `department_summary`

  CHANGE `positive_twitter_account` `twitter_account` TEXT NOT NULL,

  DROP `negative_twitter_account`;

ALTER TABLE `tweets`

  CHANGE `twitter_account` `positive_twitter_account` TEXT NOT NULL,

  ADD `negative_twitter_account` INTEGER NOT NULL AFTER `quality_tweet`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}