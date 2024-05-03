

CREATE TABLE `categorie_mission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_cm` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `cible` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255)  NULL,
  `lastname` varchar(255) NOT NULL,
  `alias_cible` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255)  NOT NULL,
  `lastname` varchar(255)  NOT NULL,
  `birthdate` varchar(255)  NOT NULL,
  `alias_contact` varchar(255)  NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `contact_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180)  NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` longtext  NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;



INSERT INTO `contact_us` (`id`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'g@mail.com', 'bb', 'JNJNJ', '2024-01-10 09:53:25'),
(2, 'g@mail.com', 'bb', 'JNJNJ', '2024-01-10 09:53:29'),
(3, 'g@mail.com', 'bb', 'JNJNJ', '2024-01-10 09:55:44'),
(4, 'KNKNKN@GMAIL.COM', 'TGTGVGTV', 'UYGYHGHJV', '2024-01-10 09:58:17'),
(5, 'KNKNKN@GMAIL.COM', 'bb', 'k', '2024-01-12 08:31:21'),
(6, 'KNKNKN@GMAIL.COM', 'SXCXC', 'X', '2024-01-12 08:39:31'),
(7, 'KNKNKN@GMAIL.COM', 'dfdfd', 'dsqdf', '2024-01-12 08:43:04');



CREATE TABLE  `doctrine_migration_versions` (
  `version` varchar(191)  NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB;



INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231205095143', '2023-12-05 10:54:54', 643),
('DoctrineMigrations\\Version20231214052724', '2023-12-14 06:29:03', 434),
('DoctrineMigrations\\Version20231215080910', '2023-12-15 09:09:36', 1050),
('DoctrineMigrations\\Version20231217232747', '2023-12-18 00:28:08', 99),
('DoctrineMigrations\\Version20231217233853', '2023-12-18 00:39:15', 49),
('DoctrineMigrations\\Version20231218133239', '2023-12-18 14:33:01', 124),
('DoctrineMigrations\\Version20231218133419', '2023-12-18 14:34:35', 42),
('DoctrineMigrations\\Version20231225114516', '2023-12-25 12:45:41', 161),
('DoctrineMigrations\\Version20240109052218', '2024-01-09 05:23:50', 208);



CREATE TABLE`mission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255)  NOT NULL,
  `alias` varchar(255)  NOT NULL,
  `statut` varchar(255)  NOT NULL,
  `description` varchar(255)  NOT NULL,
  `contact` varchar(255)  NOT NULL,
  `cible` varchar(255)  NOT NULL,
  `planque` varchar(255)  NOT NULL,
  `date_debut` varchar(255) DEFAULT NULL,
  `date_fin` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ;



INSERT INTO `mission` (`id`, `nom`, `alias`, `statut`, `description`, `contact`, `cible`, `planque`, `date_debut`, `date_fin`) VALUES
(25, 'JAUJUuj', 'uju,j', 'hnhn', 'nhj,;nhj', 'nhjn,;jh', 'nj;jhn,', 'nhjkj,hn,', '123', 112),
(26, 'mélissa', 'dododl', 'cdd', 'KOKO', 'odkcdock', 'odkedokd', 'OOO', '2.3.2023', NULL),
(27, 'mélissa', 'dododl', 'cdd', 'KOKO', 'odkcdock', 'odkedokd', 'OOO', '2.3.2023', NULL),
(28, 'mélissa', '°OOKO', 'dodkodck', 'KOKO', 'KOK', 'okodkd', 'OOO', '2.3.2023', NULL),
(29, 'mélissa', '°OOKO', 'dodkodck', 'KOKO', 'KOK', 'okodkd', 'OOO', '2.3.2023', NULL),
(30, 'OKOK', '°OOKO', 'dodkodck', 'ddd', 'pkpkpkp', 'OO', 'sss', '2.3.2023', NULL),
(31, 'OKOK', '°OOKO', 'dodkodck', 'ddd', 'pkpkpkp', 'OO', 'sss', '2.3.2023', NULL),
(32, 'OKOK', '°OOKO', 'dodkodck', 'ddd', 'pkpkpkp', 'OO', 'sss', '2.3.2023', NULL),
(33, 'OKOK', '°OOKO', 'dodkodck', 'ddd', 'pkpkpkp', 'OO', 'sss', '2.3.2023', NULL),
(34, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(35, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(36, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(37, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(38, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(39, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(40, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(41, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(42, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(43, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(44, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(45, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(46, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(47, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(48, 'sdcs', 'ddcdc', 'dvdd', 'dvdvd', 'vdvdv', 'ddcdcd', 'dcdccdc', 'vdvdvdv', 22332323),
(49, 'OKOK', 'dpdkpdk', 'OKOK', 'odkdok', 'odkcdock', 'odkedokd', 'plpkpkp', 'pk', NULL),
(50, 'OKOK', 'dpdkpdk', 'OKOK', 'odkdok', 'odkcdock', 'odkedokd', 'plpkpkp', 'pk', NULL),
(51, 'mélissa', '°OOKO', 'cdd', 'KOKO', 'sxx', 'sss', 'plpkpkp', '2.3.2023', NULL),
(52, 'mélissa', '°OOKO', 'cdd', 'KOKO', 'sxx', 'sss', 'plpkpkp', '2.3.2023', NULL);

CREATE TABLE `name_planque` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE  `planque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_planque` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `specialite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_spe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `statut` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_stat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE`utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`)
) ENGINE=InnoDB;



INSERT INTO `utilisateur` (`id`, `email`, `roles`, `password`) VALUES
(1, 'candelier.melissa@gamil.com', '[]', '$2y$13$cgELycJ.uZvmauiAn58WZOiGJMS3us8wfhH0REKsaW9kkpg4z0KoO'),
(2, 'candelier.melissa@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$a8L5HxfuhH.4zWHaRO9.L.MYMH7jnWQgJZurtMf1Stzl0CBDay0M2'),
(3, 'ravenwolf700@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$osaxXOC0bIrtQh3BrpmE9.57RGR68YJEkRXahauDMcYxfaJLsXEOG'),
(5, 'H@gmail.com', '[]', '$2y$13$upSn6GT418JJcPIwn9VEMes.9S7KBpSZywYXND.JS9kWaHkqg/Yaq');

