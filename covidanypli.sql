-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 24 juil. 2021 à 19:12
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covidanypli`
--

-- --------------------------------------------------------

--
-- Structure de la table `covids`
--

CREATE TABLE `covids` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ville` int(10) UNSIGNED NOT NULL,
  `nb_cas` int(11) NOT NULL,
  `nb_ret` int(11) NOT NULL,
  `nb_mort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2021_07_23_054747_create_pays_table', 1),
(28, '2021_07_23_054805_create_villes_table', 1),
(29, '2021_07_23_054820_create_covids_table', 1),
(30, '2021_07_23_054837_create_vaccins_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `continent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_pop` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `continent`, `nb_pop`, `created_at`, `updated_at`) VALUES
(25, 'Tunisie', 'Afrique', 12000000, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vaccins`
--

CREATE TABLE `vaccins` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pays` int(10) UNSIGNED NOT NULL,
  `nb_vac` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pays` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_pop` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `id_pays`, `nom`, `nb_pop`, `created_at`, `updated_at`) VALUES
(2, 25, 'Gabès', 378065, NULL, NULL),
(3, 25, 'Tunis', 1073644, NULL, NULL),
(4, 25, 'Sfax', 970886, NULL, NULL),
(5, 25, 'Nabeul', 803083, NULL, NULL),
(6, 25, 'Sousse', 688992, NULL, NULL),
(7, 25, 'Ben Arous', 648721, NULL, NULL),
(8, 25, 'Ariana', 599815, NULL, NULL),
(9, 25, 'Kébili', 158964, NULL, NULL),
(10, 25, 'Bizerte	', 575012, NULL, NULL),
(11, 25, 'Kairouan', 574964, NULL, NULL),
(12, 25, 'Monastir', 560002, NULL, NULL),
(13, 25, 'Médenine', 484604, NULL, NULL),
(14, 25, 'Kasserine', 443062, NULL, NULL),
(15, 25, 'Sidi Bouzid	', 434324, NULL, NULL),
(16, 25, 'Mahdia', 413842, NULL, NULL),
(17, 25, 'Jendouba', 403501, NULL, NULL),
(18, 25, 'Manouba', 387582, NULL, NULL),
(19, 25, 'Gabès', 378065, NULL, NULL),
(20, 25, 'Gafsa', 341624, NULL, NULL),
(21, 25, 'Béja', 305775, NULL, NULL),
(22, 25, 'Kef', 244538, NULL, NULL),
(23, 25, 'Siliana', 224298, NULL, NULL),
(24, 25, 'Zaghouan', 179436, NULL, NULL),
(25, 25, 'Tataouine', 149867, NULL, NULL),
(26, 25, 'Tozeur', 109771, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `covids`
--
ALTER TABLE `covids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `covids_id_ville_foreign` (`id_ville`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `vaccins`
--
ALTER TABLE `vaccins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccins_id_pays_foreign` (`id_pays`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villes_id_pays_foreign` (`id_pays`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `covids`
--
ALTER TABLE `covids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vaccins`
--
ALTER TABLE `vaccins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `covids`
--
ALTER TABLE `covids`
  ADD CONSTRAINT `covids_id_ville_foreign` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vaccins`
--
ALTER TABLE `vaccins`
  ADD CONSTRAINT `vaccins_id_pays_foreign` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_id_pays_foreign` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
