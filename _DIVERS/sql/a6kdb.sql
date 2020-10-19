SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `a6k_booking`;
CREATE TABLE IF NOT EXISTS `a6k_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `cancel_status` tinyint(1) DEFAULT '0',
  `validation_status` tinyint(1) DEFAULT '0',
  `id_clients` int(11) DEFAULT NULL,
  `id_rooms` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_clients` (`id_clients`),
  KEY `id_rooms` (`id_rooms`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `a6k_booking` (`id`, `start`, `end`, `price`, `cancel_status`, `validation_status`, `id_clients`, `id_rooms`) VALUES
(1, '2020-10-01 11:30:00', '2020-10-01 12:30:00', 2500, 0, 1, 1, 1),
(2, '2020-10-05 09:00:00', '2020-10-05 12:30:00', 2500, 0, 0, 2, 4),
(3, '2020-10-14 09:00:00', '2020-10-14 17:00:00', 30000, 0, 1, 3, 3),
(4, '2021-01-01 09:00:00', '2021-01-01 21:00:00', 50000, 1, 1, 4, 2);

DROP TABLE IF EXISTS `a6k_clients`;
CREATE TABLE IF NOT EXISTS `a6k_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `tva` varchar(25) DEFAULT NULL,
  `company_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `a6k_clients` (`id`, `lastname`, `firstname`, `email`, `adress`, `phone`, `tva`, `company_type`) VALUES
(1, 'Dupont', 'Charles', 'charles.dupont@monmail.com', 'Rue de la gare 42 1234 Chezmoi', '012/345.678', 'BE 1234 567 890', 'ASBL'),
(2, 'Duchamps', 'Valerie', 'valerie.duchamps@monmail.com', 'Rue de la ferme 96 9876 Labrousse', '012/987.654', 'BE 9876 543 210', 'Mouvement de jeunesse'),
(3, 'Lorem', 'Ipsum', 'lorem.ipsum@ave.ces', 'Rue de cesaers 19 1596 Asbleton', '067/951.357', 'BE 9513 579 641', 'SPRL'),
(4, 'Minautor', 'Averus', 'averus.minautor@labirynthe.pan', 'Avenue des peupliers 4 9317 ParLaBas', '071/87 96 21', NULL, 'Particulier');

DROP TABLE IF EXISTS `a6k_invoices`;
CREATE TABLE IF NOT EXISTS `a6k_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_emit` datetime DEFAULT NULL,
  `paid_status` tinyint(1) DEFAULT '0',
  `id_booking` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_booking` (`id_booking`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `a6k_invoices` (`id`, `date_emit`, `paid_status`, `id_booking`) VALUES
(1, '2020-11-01 11:45:53', 0, 1),
(2, '2020-11-01 11:45:53', 0, 2),
(3, '2020-11-01 11:46:41', 0, 3);

DROP TABLE IF EXISTS `a6k_materials`;
CREATE TABLE IF NOT EXISTS `a6k_materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL,
  `id_material_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_material_type` (`id_material_type`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `a6k_materials` (`id`, `name`, `description`, `price`, `quantity`, `id_material_type`) VALUES
(1, 'Projecteur', 'Projecteur 4k avec 2 port hdmi et 1 VGA + telecommande', 2000, 2, 1),
(2, 'Chaise', 'Chaise avec 4 pieds fixe et accoudoirs', 100, 200, 2),
(3, 'Table', 'Table 6 personnes Blanche', 300, 17, 2),
(4, 'Table', 'Table 8 personnes Grise', 500, 12, 2);

DROP TABLE IF EXISTS `a6k_materials_basis`;
CREATE TABLE IF NOT EXISTS `a6k_materials_basis` (
  `quantity` smallint(5) UNSIGNED NOT NULL,
  `id_rooms` int(11) DEFAULT NULL,
  `id_materials` int(11) DEFAULT NULL,
  KEY `id_rooms` (`id_rooms`),
  KEY `id_materials` (`id_materials`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `a6k_materials_basis` (`quantity`, `id_rooms`, `id_materials`) VALUES
(7, 1, 3),
(42, 1, 2),
(1, 1, 1),
(1, 1, 4);

DROP TABLE IF EXISTS `a6k_materials_options`;
CREATE TABLE IF NOT EXISTS `a6k_materials_options` (
  `quantity` smallint(5) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `id_materials` int(11) DEFAULT NULL,
  `id_booking` int(11) DEFAULT NULL,
  KEY `id_materials` (`id_materials`),
  KEY `id_booking` (`id_booking`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `a6k_materials_options` (`quantity`, `price`, `id_materials`, `id_booking`) VALUES
(1, 100, 2, 1);

DROP TABLE IF EXISTS `a6k_material_type`;
CREATE TABLE IF NOT EXISTS `a6k_material_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `a6k_material_type` (`id`, `description`, `type`) VALUES
(1, '', 'Electronique'),
(2, NULL, 'Mobilier'),
(3, NULL, 'Fourniture'),
(4, NULL, 'Alimentaire');

DROP TABLE IF EXISTS `a6k_pictures_materials`;
CREATE TABLE IF NOT EXISTS `a6k_pictures_materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `id_materials` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_materials` (`id_materials`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `a6k_pictures_materials` (`id`, `url`, `id_materials`) VALUES
(1, 'https://picsum.photos/200', 1),
(2, 'https://picsum.photos/200', 2),
(3, 'https://picsum.photos/200', 3),
(4, 'https://picsum.photos/200', 4),
(5, 'https://picsum.photos/200', 4),
(6, 'https://picsum.photos/200', 4);

DROP TABLE IF EXISTS `a6k_pictures_rooms`;
CREATE TABLE IF NOT EXISTS `a6k_pictures_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `id_rooms` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rooms` (`id_rooms`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `a6k_pictures_rooms` (`id`, `url`, `id_rooms`) VALUES
(1, 'https://picsum.photos/200', 1),
(2, 'https://picsum.photos/250', 1),
(3, 'https://picsum.photos/200', 2),
(4, 'https://picsum.photos/200', 4);

DROP TABLE IF EXISTS `a6k_rooms`;
CREATE TABLE IF NOT EXISTS `a6k_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `seats_number` smallint(5) UNSIGNED NOT NULL,
  `area` decimal(5,2) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `a6k_rooms` (`id`, `name`, `price`, `seats_number`, `area`) VALUES
(1, 'Socrate', 2500, 42, '35.00'),
(2, 'Aristote', 3200, 60, '42.00'),
(3, 'Einstein', 4200, 100, '72.00'),
(4, 'Galilée', 1000, 12, '25.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
