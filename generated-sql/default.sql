
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- comments
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments`
(
    `id_comment` INTEGER NOT NULL AUTO_INCREMENT,
    `id_user` INTEGER NOT NULL,
    `comment_publication_hour` DATETIME NOT NULL,
    `likes_count` INTEGER,
    PRIMARY KEY (`id_comment`),
    INDEX `id_utilisateur` (`id_user`),
    CONSTRAINT `comments_ibfk_1`
        FOREIGN KEY (`id_user`)
        REFERENCES `users` (`user_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- department_summary
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `department_summary`;

CREATE TABLE `department_summary`
(
    `department_summary_id` INTEGER NOT NULL AUTO_INCREMENT,
    `map_publication_hour` DATETIME NOT NULL,
    `department_code` VARCHAR(5) NOT NULL,
    `department_positive_tweets_quantity` INTEGER NOT NULL,
    `department_negative_tweets_quantity` INTEGER NOT NULL,
    `department_neutral_tweets_quantity` INTEGER NOT NULL,
    `positive_popular_tweet_id` INTEGER NOT NULL,
    `negative_popular_tweet_id` INTEGER NOT NULL,
    `department_twitter_shares_quantity` INTEGER,
    `department_facebook_shares_quantity` INTEGER,
    PRIMARY KEY (`department_summary_id`),
    INDEX `code_departement` (`department_code`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- departments
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments`
(
    `department_id` INTEGER NOT NULL AUTO_INCREMENT,
    `department_code` VARCHAR(5) NOT NULL,
    `department_name` VARCHAR(70) NOT NULL,
    PRIMARY KEY (`department_id`),
    INDEX `code_departement` (`department_code`),
    CONSTRAINT `departments_ibfk_1`
        FOREIGN KEY (`department_code`)
        REFERENCES `department_summary` (`department_code`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- district_shares
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `district_shares`;

CREATE TABLE `district_shares`
(
    `district_id` INTEGER NOT NULL AUTO_INCREMENT,
    `district_name` INTEGER NOT NULL,
    `district_twitter_shares_quantity` INTEGER,
    `district_facebook_shares_quantity` INTEGER,
    PRIMARY KEY (`district_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- geocodes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `geocodes`;

CREATE TABLE `geocodes`
(
    `geocode_id` INTEGER NOT NULL AUTO_INCREMENT,
    `geocode_name` VARCHAR(20) NOT NULL,
    `department_id` INTEGER NOT NULL,
    PRIMARY KEY (`geocode_id`),
    INDEX `id_departement` (`department_id`),
    CONSTRAINT `geocodes_ibfk_1`
        FOREIGN KEY (`department_id`)
        REFERENCES `departments` (`department_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- popular_tweets
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `popular_tweets`;

CREATE TABLE `popular_tweets`
(
    `popular_tweet_id` BIGINT(18) NOT NULL AUTO_INCREMENT,
    `tweet_id` BIGINT(18) NOT NULL,
    `url_tweet` TEXT NOT NULL,
    `geocode_id` INTEGER NOT NULL,
    `votes_quantity` INTEGER NOT NULL,
    `retweets_quantity` INTEGER,
    `tweet_publication_hour` DATETIME NOT NULL,
    `favorites_quantity` INTEGER,
    `coordinates` TEXT NOT NULL,
    `location` TEXT NOT NULL,
    PRIMARY KEY (`popular_tweet_id`),
    INDEX `id_tweet` (`tweet_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tweets
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tweets`;

CREATE TABLE `tweets`
(
    `tweet_id` BIGINT(18) NOT NULL AUTO_INCREMENT,
    `api_tweet_id` BIGINT(18) NOT NULL,
    `tweet_text` TEXT NOT NULL,
    `tweet_publication_hour` DATETIME NOT NULL,
    `url_tweet` TEXT NOT NULL,
    `id_geocode` INTEGER,
    `retweets_quantity` INTEGER,
    `favorites_quantity` INTEGER,
    `twitter_account` TEXT NOT NULL,
    `coordinates` TEXT,
    `location` TEXT,
    PRIMARY KEY (`tweet_id`),
    INDEX `id_geocode` (`id_geocode`),
    CONSTRAINT `tweets_ibfk_1`
        FOREIGN KEY (`id_geocode`)
        REFERENCES `geocodes` (`geocode_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(50),
    `lastname` VARCHAR(60),
    `email` VARCHAR(100),
    `twitter_account` VARCHAR(100),
    `password` VARCHAR(255),
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
