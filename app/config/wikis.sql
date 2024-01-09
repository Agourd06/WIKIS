-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 jan. 2024 à 11:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




-- --------------------------------------------------------



CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_fullname` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `author_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------



CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------



CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------



CREATE TABLE `wiki` (
  `wiki_id` int(11) NOT NULL,
  `wiki_image` varchar(255) NOT NULL,
  `wiki_title` varchar(255) NOT NULL,
  `wiki_content` longtext NOT NULL,
  `wiki_summarize` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `wiki_statut` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


CREATE TABLE `wikitags` (
  `wikiTags_id` int(11) NOT NULL,
  `wiki_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);


ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);


ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);


ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);


ALTER TABLE `wiki`
  ADD PRIMARY KEY (`wiki_id`),
  ADD KEY `cat_fk` (`category_id`),
  ADD KEY `aut_fk` (`author_id`);


ALTER TABLE `wikitags`
  ADD PRIMARY KEY (`wikiTags_id`),
  ADD KEY `wiki_fnk` (`wiki_id`),
  ADD KEY `tags_fnk` (`tag_id`);


ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `wiki`
  MODIFY `wiki_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `wikitags`
  MODIFY `wikiTags_id` int(11) NOT NULL AUTO_INCREMENT;



ALTER TABLE `wiki`
  ADD CONSTRAINT `aut_fk` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `wikitags`
  ADD CONSTRAINT `tags_fnk` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_fnk` FOREIGN KEY (`wiki_id`) REFERENCES `wiki` (`wiki_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

