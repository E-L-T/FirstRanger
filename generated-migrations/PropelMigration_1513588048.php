<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1513588048.
 * Generated on 2017-12-18 10:07:28 by eric
 */
class PropelMigration_1513588048
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
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `geocodes`

  DROP `nom`;

CREATE UNIQUE INDEX `popular_tweets_u_e3b5bb` ON `popular_tweets` (`tweet_id`(18));

ALTER TABLE `tweets` ADD CONSTRAINT `tweets_ibfk_2`
    FOREIGN KEY (`tweet_id`)
    REFERENCES `popular_tweets` (`tweet_id`);

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
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `geocodes`

  ADD `nom` VARCHAR(100) NOT NULL AFTER `geocode`;

DROP INDEX `popular_tweets_u_e3b5bb` ON `popular_tweets`;

ALTER TABLE `tweets` DROP FOREIGN KEY `tweets_ibfk_2`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}