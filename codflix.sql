-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 06, 2020 at 08:35 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codflix`
--

CREATE DATABASE codflix;
USE codflix;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction'),
(4, 'Aventure');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Film'),
(2, 'Série');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type_id` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `duration` int(11) NOT NULL,
  `season` int(11) NULL,
  `trailer_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `genre_id`,`title`,`type_id`,`status`,`release_date`,`summary`,`duration`, `season`, `trailer_url`) VALUES
(1, 1, 'Le roi lion', 1, 'publié', '2019-08-07',"Le jour se lève sur la savane africaine. Les animaux de toutes sorte engagent un périple vers un piton rocheux. C'est le jour de la présentation aux animaux de Simba, fils du roi lion Mufasa et de la reine lionne Sarabi. Mufasa rend ensuite visite à son frère Scar, qui n'est pas venu à la cérémonie. Ce dernier est jaloux de son frère et convoite son trône. Avec les hyènes, il va échafauder un plan pour le débarrasser de son frère et de Simba, pour s'en emparer.", 126, 0, 'tvvQitXftGk'),
(2, 2, 'Saw', 1, 'publié', '2019-06-11', "Un lieutenant de police locale et son nouveau partenaire enquêtent sur une série de meurtres plus macabres les uns que les autres. Le mode opératoire rappelle étrangement celui d'un tueur en série ayant sévit autrefois dans la ville. Mais pris au piège sans le savoir, il va se retrouver en plein cœur d'un stratagème tordu et terrifiant dont seul le tueur tire les ficelles.", 185, 0, 'lWmTi-VD6Ss'),
(3, 1, 'Sonic', 1, 'publié', '2020-02-12', "L'histoire du hérisson bleu le plus rapide du monde qui arrive sur Terre, sa nouvelle maison. Sonic et son nouveau meilleur ami Tom font équipe pour sauver la planète du diabolique Dr. Robotnik, bien déterminé à régner sur le monde entier.", 99, 0 ,'NCZTYdAP6w0'),
(4, 3, 'Alita: Battle Angel', 1,'publié', '2020-02-13',"Lorsqu’Alita se réveille sans aucun souvenir de qui elle est, dans un futur qu’elle ne reconnaît pas, elle est accueillie par Ido, un médecin qui comprend que derrière ce corps de cyborg abandonné, se cache une jeune femme au passé extraordinaire. Ce n’est que lorsque les forces dangereuses et corrompues qui gèrent la ville d’Iron City se lancent à sa poursuite qu’Alita découvre la clé de son passé - elle a des capacités de combat uniques, que ceux qui détiennent le pouvoir veulent absolument maîtriser. Si elle réussit à leur échapper, elle pourrait sauver ses amis, sa famille, et le monde qu’elle a appris à aimer.",122, 0, '75QXYNz5Q8o');
(5, 3, 'The 100', 2, 'publié', '2014-03-19', "Quatre-vingt-dix-sept ans après un holocauste nucléaire qui a décimé la population de la Terre, les seuls Terriens survivants sont ceux qui se trouvaient à ce moment-là dans une des douze stations spatiales en orbite. Depuis, ces douze stations spatiales ont été reliées entre elles et réorganisées afin de garder leurs habitants en vie. Cet assemblage de stations a été baptisé l'Arche. Celle-ci compte maintenant plus de 2 400 habitants. Trois générations se sont ensuite succédé dans l'espace mais les ressources s'épuisent et l'air respirable commence inexorablement à manquer. Des mesures draconiennes ont donc été prises : la peine de mort chez les majeurs et le maximum d'un enfant par couple sont à l'ordre du jour. De plus, les dirigeants de l'Arche font des choix impitoyables pour assurer leur futur, notamment exiler secrètement un groupe de 100 prisonniers mineurs à la surface de la Terre pour savoir si elle est redevenue habitable. Pour la première fois depuis près d'un siècle, des humains retournent sur la planète Terre.", 40, 1, 'ia1Fbg96vL0'),
(6, 3, 'The 100', 2, 'publié', '2015-03-11', "Les habitants de l'Arche ont réussi à atteindre la Terre sains et saufs, utilisant les fusées de l'Arche comme propulseurs. Le chancelier Jaha a cependant été contraint de rester dans l'espace, afin d'actionner le lancement des fusées qui n'a pu se faire automatiquement. Sur Terre, les survivants des 100 ont fini par vaincre les Natifs en utilisant l'allumage de la navette.Les 100 qui ont survécu ont ainsi été transporté au Mont Weather. Celui-ci est habité par des survivants de l'holocauste d'il y a 97 ans, pour qui il est impossible de sortir à l'air libre irradié. S'ils intègrent les survivants, ce n'est cependant pas innocemment, comme le découvre Clarke, qui comprend rapidement le problème que pose le Mont Weather, et son rôle dans des événements précédents.Les rapports avec les Natifs se complexifient, car ils ont eux aussi une revanche à prendre sur le Mont Weather, qui devient rapidement un ennemi commun pour les Natifs et les habitants de l'Arche, entre qui une alliance s'avère nécessaire.", 42, 2, 'NepXdwVRVtY'),
(7, 3, 'The 100', 2, 'publié', '2016-03-26', "Cela fait trois mois que Clarke s'est exilée après avoir irradié le Mont Weather pour sauver ses amis. Une sorte de paix a été établie entre le Peuple du Ciel, désormais appelé Skaikru, et les Natifs, mais elle est mise à l'épreuve par un clan natif, la Nation des Glaces, et surtout par le chef d'une station dernièrement découverte sur Terre, qui voue une haine aux Natifs à cause des actes de la Nation des Glaces. Clarke se cache chez une Native mais beaucoup de personnes la recherchent, l'appelant maintenant la « Commandante de la Mort ». Pendant ce temps-là, sur l'île, Murphy, qui a été emprisonné dans le phare, est libéré et découvre Jaha dans la villa, qui semble très étrange et s'est allié avec l'intelligence artificielle appelée A.L.I.E..", 42, 3, '6rePyTDdJmw'),

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_favorite_media`
--

CREATE table `user_favorite_media` (
    `user_id` INT(11) NOT NULL, 
    `media_id` INT(11) NOT NULL, 
    FOREIGN KEY (`user_id`) REFERENCES `user(id)` ON DELETE CASCADE,
    FOREIGN KEY (`media_id`) REFERENCES `media(id)` ON DELETE CASCADE);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE;


--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `media_type_id_b1257088_fk_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
