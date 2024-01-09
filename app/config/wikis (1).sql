-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 jan. 2024 à 07:18
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_role` enum('author','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wiki`
--

CREATE TABLE `wiki` (
  `wiki_id` int(11) NOT NULL,
  `wiki_image` varchar(255) NOT NULL,
  `wiki_title` varchar(255) NOT NULL,
  `wiki_content` longtext NOT NULL,
  `wiki_summarize` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wiki_statut` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wikitags`
--

CREATE TABLE `wikitags` (
  `wikiTags_id` int(11) NOT NULL,
  `wiki_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`wiki_id`),
  ADD KEY `usr_fnk` (`user_id`),
  ADD KEY `cat_fnk` (`category_id`);

--
-- Index pour la table `wikitags`
--
ALTER TABLE `wikitags`
  ADD PRIMARY KEY (`wikiTags_id`),
  ADD KEY `wiki_fnk` (`wiki_id`),
  ADD KEY `tags_fnk` (`tag_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wiki`
--
ALTER TABLE `wiki`
  MODIFY `wiki_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wikitags`
--
ALTER TABLE `wikitags`
  MODIFY `wikiTags_id` int(11) NOT NULL AUTO_INCREMENT;




ALTER TABLE `wiki`
  ADD CONSTRAINT `cat_fnk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usr_fnk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `wikitags`
  ADD CONSTRAINT `tags_fnk` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_fnk` FOREIGN KEY (`wiki_id`) REFERENCES `wiki` (`wiki_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
