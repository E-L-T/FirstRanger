<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1513159625.
 * Generated on 2017-12-13 11:07:05 by eric
 */
class PropelMigration_1513159625
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

DROP INDEX `id_utilisateur` ON `comments`;

ALTER TABLE `comments`

  DROP PRIMARY KEY,

  CHANGE `comment_id` `id_comment` INTEGER NOT NULL AUTO_INCREMENT,

  CHANGE `user_id` `id_user` INTEGER NOT NULL,

  ADD PRIMARY KEY (`id_comment`);

DROP INDEX `id_tweet` ON `popular_tweets`;

CREATE INDEX `tweet_id` ON `popular_tweets` (`tweet_id`);

ALTER TABLE `tweets`

  CHANGE `quality_tweet` `quality_tweet` enum(\'positive\',\'negative\',\'neutral\');

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

ALTER TABLE `comments`

  DROP PRIMARY KEY,

  CHANGE `id_comment` `comment_id` INTEGER NOT NULL AUTO_INCREMENT,

  CHANGE `id_user` `user_id` INTEGER NOT NULL,

  ADD PRIMARY KEY (`comment_id`);


DROP INDEX `id_tweet` ON `popular_tweets`;

CREATE INDEX `tweet_id` ON `popular_tweets` (`tweet_id`);

ALTER TABLE `tweets`

  CHANGE `quality_tweet` `quality_tweet` enum(\'positive\',\'negative\',\'neutral\');

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}