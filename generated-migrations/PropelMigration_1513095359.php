<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1513095359.
 * Generated on 2017-12-12 17:15:59 by eric
 */
class PropelMigration_1513095359
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

DROP INDEX `department_summary_u_b36fc1` ON `department_summary`;

CREATE UNIQUE INDEX `department_summary_u_b36fc1` ON `department_summary` (`department_code`(5));

ALTER TABLE `geocodes` ADD CONSTRAINT `geocodes_ibfk_1`
    FOREIGN KEY (`department_id`)
    REFERENCES `departments` (`department_id`);

DROP INDEX `id_geocode_2` ON `tweets`;

DROP INDEX `id_geocode_3` ON `tweets`;

DROP INDEX `id_geocode` ON `tweets`;

ALTER TABLE `tweets`

  CHANGE `geocode_id` `id_geocode` INTEGER;

CREATE INDEX `id_geocode` ON `tweets` (`id_geocode`);

ALTER TABLE `tweets` ADD CONSTRAINT `tweets_ibfk_1`
    FOREIGN KEY (`id_geocode`)
    REFERENCES `geocodes` (`geocode_id`);

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

DROP INDEX `department_summary_u_b36fc1` ON `department_summary`;

CREATE UNIQUE INDEX `department_summary_u_b36fc1` ON `department_summary` (`department_code`);

ALTER TABLE `geocodes` DROP FOREIGN KEY `geocodes_ibfk_1`;

ALTER TABLE `tweets` DROP FOREIGN KEY `tweets_ibfk_1`;

DROP INDEX `id_geocode` ON `tweets`;

ALTER TABLE `tweets`

  CHANGE `id_geocode` `geocode_id` INTEGER;

CREATE INDEX `id_geocode` ON `tweets` (`geocode_id`);

CREATE INDEX `id_geocode_2` ON `tweets` (`geocode_id`);

CREATE INDEX `id_geocode_3` ON `tweets` (`geocode_id`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}