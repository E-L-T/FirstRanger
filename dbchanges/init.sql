-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 08 Décembre 2017 à 17:04
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

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
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `heure_publication_commentaire` datetime NOT NULL,
  `nombre_likes` int(11) NOT NULL,
  `date_commentaire` date NOT NULL,
  `heure_commentaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id_departement` int(11) NOT NULL,
  `code_departement` int(2) NOT NULL,
  `nom_departements` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `geocode`
--

CREATE TABLE `geocode` (
  `id_geocode` int(11) NOT NULL,
  `nom_geocode` varchar(20) NOT NULL,
  `id_departement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `resume_departement`
--

CREATE TABLE `resume_departement` (
  `id_resume_departement` int(11) NOT NULL,
  `heure_publication_carte` datetime NOT NULL,
  `code_departement` int(2) NOT NULL,
  `quantite_tweets_positifs_departement` int(11) NOT NULL,
  `quantite_tweets_negatifs_departement` int(11) NOT NULL,
  `quantite_tweets_neutres_departement` int(11) NOT NULL,
  `id_tweet_populaire_positif` int(11) NOT NULL,
  `id_tweet_populaire_negatif` int(11) NOT NULL,
  `nombre_partages_twitter_departement` int(11) NOT NULL,
  `nombre_partages_facebook_departement` int(11) NOT NULL,
  `quantite_tweets_positifs_region` int(11) NOT NULL,
  `quantite_tweets_negatifs_region` int(11) NOT NULL,
  `quantite_tweets_neutres_region` int(11) NOT NULL,
  `nombre_partages_twitter_region` int(11) NOT NULL,
  `nombre_partages_facebook_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `total_tweets`
--

CREATE TABLE `total_tweets` (
  `id_tweet` int(11) NOT NULL,
  `id_tweet_api` int(11) NOT NULL,
  `contenu_tweet` text NOT NULL,
  `heure_publication` datetime NOT NULL,
  `url_tweet` text NOT NULL,
  `id_geocode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tweets_populaires`
--

CREATE TABLE `tweets_populaires` (
  `id_tweet_populaire` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `url_tweet` text NOT NULL,
  `geocode` text NOT NULL,
  `nombre_vote` int(11) NOT NULL,
  `nombre_retweet` int(11) NOT NULL,
  `heure_publication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `compte_twitter` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id_departement`),
  ADD KEY `code_departement` (`code_departement`);

--
-- Index pour la table `geocode`
--
ALTER TABLE `geocode`
  ADD PRIMARY KEY (`id_geocode`),
  ADD KEY `id_departement` (`id_departement`);

--
-- Index pour la table `resume_departement`
--
ALTER TABLE `resume_departement`
  ADD PRIMARY KEY (`id_resume_departement`),
  ADD KEY `code_departement` (`code_departement`);

--
-- Index pour la table `total_tweets`
--
ALTER TABLE `total_tweets`
  ADD PRIMARY KEY (`id_tweet`),
  ADD KEY `id_geocode` (`id_geocode`);

--
-- Index pour la table `tweets_populaires`
--
ALTER TABLE `tweets_populaires`
  ADD PRIMARY KEY (`id_tweet_populaire`),
  ADD KEY `id_tweet` (`id_tweet`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `geocode`
--
ALTER TABLE `geocode`
  MODIFY `id_geocode` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `resume_departement`
--
ALTER TABLE `resume_departement`
  MODIFY `id_resume_departement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `total_tweets`
--
ALTER TABLE `total_tweets`
  MODIFY `id_tweet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tweets_populaires`
--
ALTER TABLE `tweets_populaires`
  MODIFY `id_tweet_populaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `geocode`
--
ALTER TABLE `geocode`
  ADD CONSTRAINT `geocode_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id_departement`);

--
-- Contraintes pour la table `resume_departement`
--
ALTER TABLE `resume_departement`
  ADD CONSTRAINT `resume_departement_ibfk_1` FOREIGN KEY (`code_departement`) REFERENCES `departements` (`code_departement`);

--
-- Contraintes pour la table `total_tweets`
--
ALTER TABLE `total_tweets`
  ADD CONSTRAINT `total_tweets_ibfk_1` FOREIGN KEY (`id_geocode`) REFERENCES `geocode` (`id_geocode`);

--
-- Contraintes pour la table `tweets_populaires`
--
ALTER TABLE `tweets_populaires`
  ADD CONSTRAINT `tweets_populaires_ibfk_1` FOREIGN KEY (`id_tweet`) REFERENCES `total_tweets` (`id_tweet`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
