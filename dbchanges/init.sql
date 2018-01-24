-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 11 Décembre 2017 à 15:55
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `firstranger`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment_publication_hour` datetime NOT NULL,
  `likes_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_code` varchar(5) NOT NULL,
  `department_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `department_summary`
--

CREATE TABLE `department_summary` (
  `department_summary_id` int(11) NOT NULL,
  `map_publication_hour` datetime NOT NULL,
  `department_code` varchar(5) NOT NULL,
  `department_positive_tweets_quantity` int(11) NOT NULL,
  `department_negative_tweets_quantity` int(11) NOT NULL,
  `department_neutral_tweets_quantity` int(11) NOT NULL,
  `positive_popular_tweet_id` int(11) NOT NULL,
  `negative_popular_tweet_id` int(11) NOT NULL,
  `department_twitter_shares_quantity` int(11) DEFAULT NULL,
  `department_facebook_shares_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `district_shares`
--

CREATE TABLE `district_shares` (
  `district_id` int(11) NOT NULL,
  `district_name` int(11) NOT NULL,
  `district_twitter_shares_quantity` int(11) DEFAULT NULL,
  `district_facebook_shares_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `geocodes`
--

CREATE TABLE `geocodes` (
  `geocode_id` int(11) NOT NULL,
  `geocode_name` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `geocode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `popular_tweets`
--

CREATE TABLE `popular_tweets` (
  `popular_tweet_id` bigint(18) NOT NULL,
  `tweet_id` bigint(18) NOT NULL,
  `url_tweet` text NOT NULL,
  `geocode_id` int(11) NOT NULL,
  `votes_quantity` int(11) NOT NULL,
  `retweets_quantity` int(11) DEFAULT NULL,
  `tweet_publication_hour` datetime NOT NULL,
  `favorites_quantity` int(11) DEFAULT NULL,
  `coordinates` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tweets`
--

CREATE TABLE `tweets` (
  `tweet_id` bigint(18) NOT NULL,
  `api_tweet_id` bigint(18) NOT NULL,
  `tweet_text` text NOT NULL,
  `tweet_publication_hour` datetime NOT NULL,
  `url_tweet` text NOT NULL,
  `geocode_id` int(11) DEFAULT NULL,
  `retweets_quantity` int(11) DEFAULT NULL,
  `favorites_quantity` int(11) DEFAULT NULL,
  `twitter_account` text NOT NULL,
  `coordinates` text,
  `location` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `twitter_account` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_utilisateur` (`id_user`);

--
-- Index pour la table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `code_departement` (`department_code`);

--
-- Index pour la table `department_summary`
--
ALTER TABLE `department_summary`
  ADD PRIMARY KEY (`department_summary_id`),
  ADD KEY `code_departement` (`department_code`);

--
-- Index pour la table `district_shares`
--
ALTER TABLE `district_shares`
  ADD PRIMARY KEY (`district_id`);

--
-- Index pour la table `geocodes`
--
ALTER TABLE `geocodes`
  ADD PRIMARY KEY (`geocode_id`),
  ADD KEY `id_departement` (`department_id`);

--
-- Index pour la table `popular_tweets`
--
ALTER TABLE `popular_tweets`
  ADD PRIMARY KEY (`popular_tweet_id`),
  ADD KEY `id_tweet` (`tweet_id`);

--
-- Index pour la table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`tweet_id`),
  ADD KEY `id_geocode` (`geocode_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `department_summary`
--
ALTER TABLE `department_summary`
  MODIFY `department_summary_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `district_shares`
--
ALTER TABLE `district_shares`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `geocodes`
--
ALTER TABLE `geocodes`
  MODIFY `geocode_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `popular_tweets`
--
ALTER TABLE `popular_tweets`
  MODIFY `popular_tweet_id` bigint(18) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `tweet_id` bigint(18) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`department_code`) REFERENCES `department_summary` (`department_code`);

--
-- Contraintes pour la table `geocodes`
--
ALTER TABLE `geocodes`
  ADD CONSTRAINT `geocodes_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Contraintes pour la table `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`geocode_id`) REFERENCES `geocodes` (`geocode_id`),
  ADD CONSTRAINT `tweets_ibfk_2` FOREIGN KEY (`tweet_id`) REFERENCES `popular_tweets` (`tweet_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
