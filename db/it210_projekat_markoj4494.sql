-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 12:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it210_projekat_markoj4494`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `naziv` text NOT NULL,
  `lokacija` text NOT NULL,
  `slikaEvent` text NOT NULL,
  `idIzvodjac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `naziv`, `lokacija`, `slikaEvent`, `idIzvodjac`) VALUES
(1, 'La Terrace', 'Srbija', 'https://scontent.fbeg4-1.fna.fbcdn.net/v/t1.15752-9/192646516_330992068609906_9198216447923820366_n.jpg?_nc_cat=100&ccb=1-3&_nc_sid=ae9488&_nc_eui2=AeGuu3v171is4Rh0YTBGoenJSbRfKDnEvO1JtF8oOcS87alimWmxw2ThzqUHNJPft-3ZkLUQl-W9Y-wliUk631rT&_nc_ohc=Cu4q4v1372gAX-iXuCt&_nc_ht=scontent.fbeg4-1.fna&oh=13109569189aee1c2e87edc8be0c0791&oe=60D87EEE', 1),
(2, 'Culture Club Revelin', 'Dubrovnik, Hrvatska', 'https://www.clubrevelin.com/wp-content/uploads/2019/06/Cercle-Predstavlja-Hot-Since-82-terasa-kluba-Revelin-Dubrovnik.jpg', 2),
(3, 'Théâtre Antique d Orange', 'Francuska', 'https://www.numero.com/sites/default/files/images/article/homepage/full/push-cover-cercle-numero-magazine.jpg', 12),
(4, 'Château de Chambord', 'Francuska', 'https://cdn1.chambord.org/en/wp-content/uploads/sites/3/2017/02/No%C3%ABl-%C3%A0-Chambord-c-L%C3%A9onard-de-Serres-1-1180x550.jpg', 7),
(5, 'The Rooftop', 'SAD', 'https://images.squarespace-cdn.com/content/v1/5c4511380dbda3abea27229a/1560483658898-H5HIR1Y49H0A6D7IE69L/ke17ZwdGBToddI8pDm48kBio41UFetLnzMqcf1yfmpwUqsxRUqqbr1mOJYKfIPR7LoDQ9mXPOjoJoqy81S2I8N_N4V1vUb5AoIIIbLZhVYxCRW4BPu10St3TBAUQYVKc7x_zNqp5J490PxptV_fTG_r4el8sSimhbcvHUYSQBNkagrvb5vfDf3MUlVxkzaFL/B-15+Main+15+Patio.png?format=2500w', 4),
(6, 'CÉ LA VI', 'Singapur', 'https://a.cdn-hotels.com/gdcs/production85/d1222/f6b7291e-0976-4530-8f4c-9f4318f55645.jpg', 8),
(7, 'Matine', 'Srbija', 'https://scontent.fbeg4-1.fna.fbcdn.net/v/t1.6435-9/120392653_10159263182590809_65057662332597689_n.jpg?_nc_cat=107&ccb=1-3&_nc_sid=0debeb&_nc_eui2=AeHxggFQT_fQFDtfNHnIYhw1obkGqVMJjgKhuQapUwmOAru5h4O5A0vMayyLMs6OMQphtFg_0kfQWsivizrQC7uR&_nc_ohc=IFS5L1aHzVEAX_ly1IU&_nc_ht=scontent.fbeg4-1.fna&oh=6bf2e471e33e0c3069144b20ca8f4c23&oe=60DAA7D7', 10),
(8, 'Open Air', 'Srbija', 'https://scontent.fbeg4-1.fna.fbcdn.net/v/t1.6435-9/67669991_1585284478273891_2613484807887257600_n.jpg?_nc_cat=110&ccb=1-3&_nc_sid=cdbe9c&_nc_eui2=AeE7yZhBZ4DP9kYXU1xkjjM38jKjt2vrNyvyMqO3a-s3KzFuaKaKJQ168qYqAE9sqjNTYF_op13dL6yWzjIC_xNT&_nc_ohc=KGoRxpz0oqQAX__4XhY&_nc_ht=scontent.fbeg4-1.fna&oh=2306067a91587b6da299d27e137ae5b2&oe=60DA6992', 11),
(9, 'Open Air #2', 'Srbija', 'https://scontent.fbeg4-1.fna.fbcdn.net/v/t1.6435-9/69779695_2314718365524900_1428222221016367104_n.jpg?_nc_cat=101&ccb=1-3&_nc_sid=cdbe9c&_nc_eui2=AeGHIeESZek9LrGNfTdlr2sNPYseqHysb089ix6ofKxvTzZt0Yh98JSkNUGrZVdCZDRop6-_sh-d07_Vowqmkg-Q&_nc_ohc=acJ2swKA6YUAX8uZGad&_nc_ht=scontent.fbeg4-1.fna&oh=24b2458944c343fad1e460c16f87245e&oe=60DB499C', 6);

-- --------------------------------------------------------

--
-- Table structure for table `izvodjac`
--

CREATE TABLE `izvodjac` (
  `id` int(11) NOT NULL,
  `ime` text NOT NULL,
  `prezime` text NOT NULL,
  `scensko_ime` text NOT NULL,
  `zemlja` text NOT NULL,
  `slika` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izvodjac`
--

INSERT INTO `izvodjac` (`id`, `ime`, `prezime`, `scensko_ime`, `zemlja`, `slika`) VALUES
(1, 'Marko', 'Josifović', 'romanizat', 'Srbija', 'https://scontent.fbeg4-1.fna.fbcdn.net/v/t1.6435-9/84107171_3312053568811911_3416778262154575872_n.jpg?_nc_cat=102&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeEF1wtglMIBlVgE0yOCfd8zdbvXMuKfoGt1u9cy4p-ga7zNmcd_eQg-TJdFz9W9t8CmGCsZnq1B3HG20b3BTE3n&_nc_ohc=eUksykYVMOYAX_90FdG&_nc_ht=scontent.fbeg4-1.fna&oh=180003055a3b70a408e81ee13c8bccde&oe=60D953F2'),
(2, 'Daley', 'Padley', 'Hot Since 82', 'Velika Britanija', 'https://themusicessentials.com/wp-content/uploads/2020/06/hot-since-82-eye-of-the-storm.jpeg'),
(3, 'Jacques Bermon', 'Webster', 'Travis Scott', 'SAD', 'https://media.gq.com/photos/5f3aa9738f9d96b932abcdc3/4:3/w_1999,h_1499,c_limit/travis-scott-gq-cover-september-2020-a.jpg'),
(4, 'Thomas', 'Bangalter', 'Thomas Bangalter', 'Francuska', 'https://upload.wikimedia.org/wikipedia/commons/f/fe/ThomasBangalter028_%28Cropped%29.jpg'),
(5, 'Christophe', 'Le Friant', 'Bob Sinclar', 'Francuska', 'https://i1.sndcdn.com/avatars-000441520314-55qc0d-t500x500.jpg'),
(6, 'Алексе́й', 'Константи́нович Узеню́к', 'Элджей', 'Rusija', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/%D0%AD%D0%BB%D0%B4%D0%B6%D0%B5%D0%B9_%28cropped%29.jpg/1200px-%D0%AD%D0%BB%D0%B4%D0%B6%D0%B5%D0%B9_%28cropped%29.jpg'),
(7, 'Deborah', 'De Luca', 'Deborah De Luca', 'Italija', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Sterne_und_Bass-Feb_2017-Deborah_de_Luca-Flyingpixel-8542.jpg/1200px-Sterne_und_Bass-Feb_2017-Deborah_de_Luca-Flyingpixel-8542.jpg'),
(8, 'Thomas', 'Pentz', 'Diplo', 'SAD', 'https://img.discogs.com/hL0W8QJyDWG5FE7hAKV34MR6RQk=/600x600/smart/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/A-899117-1518692836-2134.jpeg.jpg'),
(9, 'Aubrey', 'Graham', 'Drake', 'Kanada', 'https://www.usmagazine.com/wp-content/uploads/2021/01/Drake-Is-Delaying-His-Certified-Lover-Boy-Album-After-Undergoing-Surgery-Promo.jpg?quality=86&strip=all'),
(10, 'Walter', 'Grigahcine', 'DJ Snake', 'Francuska', 'https://www.totalisimo.com/wp-content/uploads/2018/09/dj-snake-portada.jpg'),
(11, 'José', 'Balvín', 'J Balvin', 'Kolumbija', 'https://i.guim.co.uk/img/media/f0de494db52ec764dbc22d56c439ef3f906622b0/0_0_3712_2226/master/3712.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=1904d08d94cf75fcc01d0c4ba680bb5f'),
(12, 'Mladen', 'Solomun', 'Solomun', 'BiH', 'https://mixing.dj/wp-content/uploads/2017/11/solomun.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `ime` text NOT NULL,
  `prezime` text NOT NULL,
  `naslov` text NOT NULL,
  `poruka` text NOT NULL,
  `telefon` text NOT NULL,
  `kome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id`, `ime`, `prezime`, `naslov`, `poruka`, `telefon`, `kome`) VALUES
(1, 'Marko', 'Josifović', 'Pozdrav', 'Veoma sam zadovoljan funkcionalšću stranice!', '+3816500615', 'Predsednik'),
(2, 'Nikola', 'Nikolić', 'Pozdrav', 'Jako mi se sviđa sajt!', '+38123456789', 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `ime` text NOT NULL,
  `prezime` text NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `username`, `password`, `ime`, `prezime`, `admin`) VALUES
(1, 'romanizat', '21232f297a57a5a743894a0e4a801fc3', 'Marko', 'Josifović', 1),
(2, 'perica', '084414d6a7b8487a0e663e27b2b773ba', 'Petar', 'Petrović', 0),
(4, 'dzoni', '9ea03e44749bde2eb90a6b0f13498112', 'Nikola', 'Nikolić', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locationsuggest`
--

CREATE TABLE `locationsuggest` (
  `idL` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `mesto` text NOT NULL,
  `zasto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locationsuggest`
--

INSERT INTO `locationsuggest` (`idL`, `idKorisnik`, `mesto`, `zasto`) VALUES
(1, 1, 'Tvrđava u Nišu, Srbija', 'Predivan prostor za letnji matine na otvorenom'),
(2, 1, 'Avala Toranj, Srbija', 'Visina, svež vazduh'),
(4, 2, 'Bubanj, Niš, Srbija', 'Za novi Open Air, otvoreno, široko, prostrano, u prirodi, udaljen od grada'),
(6, 4, 'Podzemni bunker', 'Bilo kakav podzemni bunker sa dobrom ventilacijom je odlično mesto za novu žurku');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `idR` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`idR`, `idEvent`, `idKorisnik`, `kolicina`) VALUES
(1, 1, 1, 13),
(2, 8, 1, 2),
(3, 9, 1, 7),
(6, 7, 2, 3),
(7, 4, 2, 4),
(8, 5, 4, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idIzvodjac` (`idIzvodjac`);

--
-- Indexes for table `izvodjac`
--
ALTER TABLE `izvodjac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locationsuggest`
--
ALTER TABLE `locationsuggest`
  ADD PRIMARY KEY (`idL`),
  ADD KEY `idKorisnik` (`idKorisnik`);

--
-- Indexes for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD PRIMARY KEY (`idR`),
  ADD UNIQUE KEY `idEvent_2` (`idEvent`,`idKorisnik`),
  ADD KEY `idKorisnik` (`idKorisnik`),
  ADD KEY `idEvent` (`idEvent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `izvodjac`
--
ALTER TABLE `izvodjac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `locationsuggest`
--
ALTER TABLE `locationsuggest`
  MODIFY `idL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rezervacije`
--
ALTER TABLE `rezervacije`
  MODIFY `idR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`idIzvodjac`) REFERENCES `izvodjac` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locationsuggest`
--
ALTER TABLE `locationsuggest`
  ADD CONSTRAINT `locationsuggest_ibfk_1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
