-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2019 at 10:15 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkbuducnost`
--

-- --------------------------------------------------------

--
-- Table structure for table `aba`
--

CREATE TABLE `aba` (
  `id` int(11) NOT NULL,
  `klub_id` int(11) NOT NULL,
  `broj_utakmica` int(11) NOT NULL DEFAULT '0',
  `dobijene` int(11) NOT NULL DEFAULT '0',
  `izgubljene` int(11) NOT NULL DEFAULT '0',
  `krajnja_razlika` int(11) NOT NULL DEFAULT '0',
  `bodovi` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aba`
--

INSERT INTO `aba` (`id`, `klub_id`, `broj_utakmica`, `dobijene`, `izgubljene`, `krajnja_razlika`, `bodovi`) VALUES
(1, 10, 17, 12, 5, 103, 29),
(3, 15, 17, 16, 1, 253, 33),
(4, 14, 17, 12, 5, 119, 29),
(5, 16, 17, 11, 6, 76, 28);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$12$8GWuVS/BdPYoRZb6EPp33eSKfKZOIGaDVNj3Dof5XBveSor1FIcMu');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `fotografija` text NOT NULL,
  `sezona_id` int(11) NOT NULL,
  `aktivan` enum('aktivan','neaktivan') NOT NULL DEFAULT 'neaktivan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `naziv`, `kategorija_id`, `datum`, `fotografija`, `sezona_id`, `aktivan`) VALUES
(8, 'KK BuduÄ‡nost VOLI vs KK Cedevite', 1, '2019-01-23', '1548965127clanak-06-01-2019-5c3254729ec55.jpg', 29, 'aktivan'),
(10, 'Otvaranje fan shopa', 12, '2019-01-15', '1548968501test.jpg', 29, 'aktivan'),
(11, 'Karte', 13, '2019-01-29', '1548974530Karte0010.jpg', 29, 'aktivan'),
(14, 'KK BuduÄ‡nost VOLI - KK Real Madrid', 7, '2017-12-03', '1548982476clanak-06-12-2018-5c098fdeaa80a.jpg', 27, 'aktivan'),
(15, 'KK BuduÄ‡nost VOLI - KK Gran Canaria', 7, '2018-02-03', '1548982518FB_IMG_1526926013296.jpg', 28, 'aktivan'),
(16, 'KK Zadar', 1, '2017-07-09', '1548982547glibson.jpg', 28, 'aktivan'),
(17, 'KK BuduÄ‡nost - KK C.Zvezda', 1, '2018-12-19', '1548982597clanak-14-01-2019-5c3ce04b965cb.jpg', 29, 'aktivan'),
(18, 'KK BuduÄ‡nost VOLI - KK Barcelona', 4, '2019-01-23', '1549025959glibson.jpg', 29, 'aktivan'),
(19, 'KK BuduÄ‡nost VOLI - KK Partizan', 1, '2017-09-09', '1549025997clanak-06-01-2019-5c3254729ec55.jpg', 28, 'aktivan');

-- --------------------------------------------------------

--
-- Table structure for table `baneri`
--

CREATE TABLE `baneri` (
  `id` int(11) NOT NULL,
  `fotografija` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `aktivno` enum('aktivan','neaktivan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baneri`
--

INSERT INTO `baneri` (`id`, `fotografija`, `link`, `aktivno`) VALUES
(3, '1548687194bannerbuducnost.jpg', 'https://www.kkbuducnost.me/', 'aktivan'),
(4, '1548687560el1.jpg', 'https://www.euroleague.net/', 'aktivan'),
(5, '1548687589abaa.png', 'https://www.aba-liga.com/', 'aktivan'),
(6, '1548687618picture-c7221178e217a6062f3d20f1c676d9109b - Copy.jpg', 'https://www.euroleague.net/one-team', 'aktivan'),
(7, '1548687646baner4.png', 'https://volivasvoli.com/', 'aktivan'),
(8, '1548687668erste.png', 'https://www.erstebank.me/sr_ME/stanovnistvo', 'aktivan'),
(9, '1548687692unnamed.png', 'https://www.euroleaguestore.net/', 'aktivan'),
(10, '1548687720banner336x280.jpg', 'https://www.bmw-voli.me/sr/index.html', 'aktivan');

-- --------------------------------------------------------

--
-- Table structure for table `cg`
--

CREATE TABLE `cg` (
  `id` int(11) NOT NULL,
  `klub_id` int(11) NOT NULL,
  `broj_utakmica` int(11) NOT NULL DEFAULT '0',
  `dobijene` int(11) NOT NULL DEFAULT '0',
  `izgubljene` int(11) NOT NULL DEFAULT '0',
  `krajnja_razlika` int(11) NOT NULL DEFAULT '0',
  `bodovi` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eurocup`
--

CREATE TABLE `eurocup` (
  `id` int(11) NOT NULL,
  `klub_id` int(11) NOT NULL,
  `broj_utakmica` int(11) NOT NULL DEFAULT '0',
  `dobijene` int(11) NOT NULL DEFAULT '0',
  `izgubljene` int(11) NOT NULL DEFAULT '0',
  `krajnja_razlika` varchar(45) NOT NULL DEFAULT '0',
  `bodovi` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `euroleague`
--

CREATE TABLE `euroleague` (
  `id` int(11) NOT NULL,
  `klub_id` int(11) NOT NULL,
  `broj_utakmica` int(11) NOT NULL DEFAULT '0',
  `dobijene` int(11) NOT NULL DEFAULT '0',
  `izgubljene` int(11) NOT NULL DEFAULT '0',
  `krajnja_razlika` int(11) NOT NULL DEFAULT '0',
  `bodovi` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `euroleague`
--

INSERT INTO `euroleague` (`id`, `klub_id`, `broj_utakmica`, `dobijene`, `izgubljene`, `krajnja_razlika`, `bodovi`) VALUES
(1, 20, 20, 18, 2, 187, 38),
(2, 12, 20, 15, 5, 102, 35),
(3, 19, 20, 12, 8, 55, 32);

-- --------------------------------------------------------

--
-- Table structure for table `fotografije`
--

CREATE TABLE `fotografije` (
  `id` int(11) NOT NULL,
  `naziv` text NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotografije`
--

INSERT INTO `fotografije` (`id`, `naziv`, `album_id`) VALUES
(1, '1548966318FB_IMG_1526926013296.jpg', 8),
(2, '1548966328clanak-25-01-2019-5c4b70fa5365b.jpg', 8),
(3, '1548966341glibson.jpg', 8),
(4, '1548966351KKB00004.jpg', 8),
(7, '1548968516FS 002.jpg', 10),
(8, '1548974545Karte0010.jpg', 11),
(9, '1548974555Karte0011.jpg', 11),
(10, '1548974564Karte0012.jpg', 11),
(11, '1548982745clanak-18-01-2019-5c42354ab3f22.jpg', 14),
(12, '1548982767clanak-14-01-2019-5c3ce04b965cb.jpg', 17),
(15, '1549026143clanak-06-12-2018-5c098fdeaa80a.jpg', 18),
(16, '1549026168BuducnostVoliDarussafaka.png', 15),
(17, '1549026180clanak-25-01-2019-5c4b70fa5365b.jpg', 16),
(18, '1549026186clanak-24-12-2018-5c21311830d88.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `juniori`
--

CREATE TABLE `juniori` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `fotografija` text NOT NULL,
  `broj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `juniori`
--

INSERT INTO `juniori` (`id`, `ime`, `prezime`, `fotografija`, `broj`) VALUES
(1, 'Kosta', 'MiÄ‡anoviÄ‡', '1548371680kosta_micanovic.jpg', 6),
(4, 'FeÄ‘a', 'PajoviÄ‡', '1548373685fedja_pajovic.jpg', 10),
(5, 'Marko', 'VujiÄiÄ', '1548373713marko_vujicic.jpg', 15),
(6, 'Viktor', 'VujisiÄ‡', '1548373756viktor_vujisic.jpg', 13),
(7, 'Matija', 'KaradÅ¾iÄ‡', '1548373786matija_karadic.jpg', 7),
(8, 'Igor', 'Drobnjak', '1548373817igor_drobnjak.jpg', 4),
(9, 'Luka', 'Å½ivanoviÄ‡', '1548373848luka_zivanovic.jpg', 9),
(10, 'Amar', 'MehiÄ‡', '1548373873amar_mehic.jpg', 13),
(11, 'Aleksandar', 'KartaloviÄ‡', '1548373903aleksandar_kartalovic.jpg', 20),
(12, 'ÄorÄ‘ije', 'MarinoviÄ‡', '1548373933djordje_marinovic.jpg', 5),
(13, 'Matija', 'RadunoviÄ‡', '1548373963matija_radunovic.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `kadeti`
--

CREATE TABLE `kadeti` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `fotografija` text,
  `broj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kadeti`
--

INSERT INTO `kadeti` (`id`, `ime`, `prezime`, `fotografija`, `broj`) VALUES
(1, 'BalÅ¡a', 'FoliÄ‡', '1548372504balsa_folic.jpg', 20),
(3, 'DuÅ¡an', 'ÄuretiÄ‡', '1548374152dusan_djuretic.jpg', 4),
(4, 'Lazar', 'RadetiÄ‡', '1548374176lazar_radetic.jpg', 8),
(5, 'Vuk', 'RadoviÄ‡', '1548374203vuk_radovic.jpg', 11),
(6, 'MiloÅ¡', 'StjepoviÄ‡', '1548374233milos_stjepovic.jpg', 7),
(7, 'Aleksa', 'LekiÄ‡', '1548374258aleksa_lekic.jpg', 14),
(8, 'Bodin', 'Å aranoviÄ‡', '1548374290bodin_saranovic.jpg', 10),
(9, 'Danilo', 'IvanoviÄ‡', '1548374317danilo_ivanovic.jpg', 5),
(10, 'Maksim', 'VujoviÄ‡', '1548374343maksim_vujovic.jpg', 13),
(11, 'Veljko', 'Rakonjac', '1548374374veljko_rakonjac.jpg', 6),
(12, 'Mikola', 'RatkniÄ‡', '1548374401nikola_ratknic.jpg', 9),
(13, 'Stefan', 'JoksimoviÄ‡', '1548374427stefan_joksimovic.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `kalendar`
--

CREATE TABLE `kalendar` (
  `id` int(11) NOT NULL,
  `domacin` varchar(255) NOT NULL,
  `gost` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  `vrijeme` time NOT NULL,
  `liga_id` int(11) NOT NULL,
  `domacin_logo` varchar(500) NOT NULL,
  `gost_logo` varchar(500) NOT NULL,
  `dvorana` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kalendar`
--

INSERT INTO `kalendar` (`id`, `domacin`, `gost`, `datum`, `vrijeme`, `liga_id`, `domacin_logo`, `gost_logo`, `dvorana`) VALUES
(8, 'KK BuduÄ‡nost VOLI', 'KK Partizan', '2019-02-10', '18:00:00', 1, '1548623774buducnostpng.png', '1549027732partizan.png', 'SC MoraÄa'),
(10, 'KK CSKA', 'KK BuduÄ‡nost VOLI', '2019-02-07', '20:00:00', 2, '1549026498cska.png', '1548623774buducnostpng.png', 'Megasport arena'),
(12, 'BC Panathinaikos', 'KK BuduÄ‡nost VOLI', '2019-02-10', '13:00:00', 2, '1549028007panathaniakois.png', '1548623774buducnostpng.png', 'Dvorana mira i prijateljstva'),
(13, 'KK Cedevita', 'KK BuduÄ‡nost VOLI', '2019-02-12', '13:00:00', 1, '1549026590cedevita.png', '1548623774buducnostpng.png', 'SC Zagreb');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `naziv`) VALUES
(1, 'aba'),
(4, 'euroleague'),
(6, 'prva liga'),
(7, 'eurocup'),
(11, 'kup'),
(12, 'ostalo'),
(13, 'klub');

-- --------------------------------------------------------

--
-- Table structure for table `liga_tim`
--

CREATE TABLE `liga_tim` (
  `liga_id` int(11) NOT NULL,
  `tim_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liga_tim`
--

INSERT INTO `liga_tim` (`liga_id`, `tim_id`) VALUES
(1, 10),
(2, 10),
(3, 10),
(4, 10),
(2, 12),
(1, 13),
(3, 13),
(1, 14),
(3, 14),
(1, 16),
(3, 16),
(1, 15),
(3, 15),
(2, 18),
(2, 19),
(2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `lige`
--

CREATE TABLE `lige` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `status` enum('aktivan','neaktivan') NOT NULL DEFAULT 'neaktivan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lige`
--

INSERT INTO `lige` (`id`, `naziv`, `status`) VALUES
(1, 'aba', 'aktivan'),
(2, 'euroleague', 'aktivan'),
(3, 'eurocup', 'neaktivan'),
(4, 'prva liga', 'neaktivan');

-- --------------------------------------------------------

--
-- Table structure for table `mediji`
--

CREATE TABLE `mediji` (
  `id` int(11) NOT NULL,
  `naslov` varchar(45) NOT NULL,
  `izjava` text NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mediji`
--

INSERT INTO `mediji` (`id`, `naslov`, `izjava`, `datum`) VALUES
(4, 'NAJAVA UTAKMICE PROTIV EKIPE KK CSKA', '1548980709Izjave uoÄi meÄa CSKA Moscow â€“ KK BuduÄ‡nost VOLI.pdf', '2019-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `menadzment`
--

CREATE TABLE `menadzment` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `pozicija` varchar(45) NOT NULL,
  `fotografija` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menadzment`
--

INSERT INTO `menadzment` (`id`, `ime`, `prezime`, `pozicija`, `fotografija`) VALUES
(1, 'Marko', 'ÄŒegerec', 'Zamjenik izvrÅ¡nog direktora', '1548427630marko_cegerec.png'),
(3, 'Gavrilo', 'PajoviÄ‡', 'Sportski direktor', '1548428411gavrilo_pajovic.png'),
(4, 'Slavko', 'RaduloviÄ‡', 'IzvrÅ¡ni direktor', '1548428445slavko_radulovic.png');

-- --------------------------------------------------------

--
-- Table structure for table `mladje_selekcije`
--

CREATE TABLE `mladje_selekcije` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `pozicija` varchar(45) NOT NULL,
  `fotografija` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mladje_selekcije`
--

INSERT INTO `mladje_selekcije` (`id`, `ime`, `prezime`, `pozicija`, `fotografija`) VALUES
(2, 'Goran', 'RakoÄeviÄ‡', 'Trener za individualni rad', '1548432240goran_rakocevic.jpg'),
(3, 'Petar', 'MijoviÄ‡', 'Trener juniora', '1548432275petar_mijovic.jpg'),
(4, 'MiloÅ¡', 'RadoviÄ‡', 'PomoÄ‡ni trener juniora', '1548432310milos_radovic.jpg'),
(5, 'MiloÅ¡', 'KovaÄ', 'Trener kadeta', '1548432344MilosÌŒ-KovacÌŒ.jpg'),
(6, 'ÄorÄ‘ije', 'ObradoviÄ‡', 'PomoÄ‡ni trener kadeta', '1548432381djordje_obradovic.jpg'),
(7, 'Milan', 'AnÄ‘eliÄ‡', 'PomoÄ‡ni trener kadeta', '1548432417milan_andjelic.jpg'),
(8, 'Marko', 'SekuliÄ‡', 'PomoÄ‡ni trener pionira', '1548432457marko_sekulic.jpg'),
(9, 'Nenad', 'MiloÅ¡eviÄ‡', 'Trener mladih pionira', '1548432492nenad_milosevic.png'),
(10, 'Dile', 'JovanoviÄ‡', 'Å kola koÅ¡arke', '1548432514Dile-JovanovicÌ.jpg'),
(11, 'PeÄ‘a', 'ÄuriÄkoviÄ‡', 'Kondicioni trener', '1548432549pedja_djurickovic.jpg'),
(12, 'Ivan', 'TodoroviÄ‡', 'Trener Å¡kole koÅ¡arke', '1548432584ivan_todorovic.png');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tekst` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_emails`
--

CREATE TABLE `newsfeed_emails` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed_emails`
--

INSERT INTO `newsfeed_emails` (`id`, `email`) VALUES
(4, 'jelovacmladen@gmail.com'),
(5, 'test@gmail.com'),
(6, 'tester@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `osoblje`
--

CREATE TABLE `osoblje` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `pozicija` varchar(45) NOT NULL,
  `fotografija` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `osoblje`
--

INSERT INTO `osoblje` (`id`, `ime`, `prezime`, `pozicija`, `fotografija`) VALUES
(1, 'PeriÅ¡a', 'ÄŒagoroviÄ‡', 'Fizioterapeut', '1548431175perisa_cagorovic.JPG'),
(3, 'Dr Bojan', 'MIlaÄiÄ‡', 'Ljekar ekipe', '1548432676_Dr.-Bojan-MilacÌŒicÌ.jpg'),
(4, 'SaÅ¡a', 'BuriÄ‡', 'Fizioterapeut', '1548432699sasa_buric.JPG'),
(5, 'DragiÅ¡a Bato', 'KrstajiÄ‡', 'Ekonomista', '1548432731dragisa_krstajic.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `pioniri`
--

CREATE TABLE `pioniri` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `fotografija` text,
  `broj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pioniri`
--

INSERT INTO `pioniri` (`id`, `ime`, `prezime`, `fotografija`, `broj`) VALUES
(1, 'Bogdan', 'BakoÄ', '1548373065bogdan_bakoc.jpg', 7),
(3, 'Milorad', 'BrajoviÄ‡', '1548373133milorad_brajovic.jpg', 6),
(4, 'Matija', 'ÄaletiÄ‡', '1548373164matija_djaletic.jpg', 14),
(5, 'Lazar', 'MirotiÄ‡', '1548373197lazar_mirotic.jpg', 12),
(6, 'Lazar', 'RakÄeviÄ‡', '1548373231lazar_rakcevic.jpg', 4),
(7, 'Ivan', 'RakoÄeviÄ‡', '1548373326ivan_rakocevic.jpg', 9),
(8, 'Vladimir', 'Sudar', '1548373357vladimir_sudar.jpg', 10),
(9, 'Luka', 'VlahoviÄ‡', '1548373384luka_vlahovic.jpg', 11),
(10, 'Andrija', 'VukoviÄ‡', '1548373446andrija_vukovic.jpg', 13),
(11, 'Luka', 'BojanoviÄ‡', '1548373474luka_bojanovic.jpg', 5),
(12, 'Marko', 'RadunoviÄ‡', '1548373500marko_radunovic.jpg', 8),
(13, 'Nikola', 'JaniÄ‡', '1548373532nikola_janic.jpg', 15),
(14, 'Aleksa', 'MugoÅ¡a', '1548373561aleksa_mugosa.jpg', 20),
(15, 'Milan', 'MIlunoviÄ‡', '1548373589milan_milunovic.jpg', 22);

-- --------------------------------------------------------

--
-- Table structure for table `prvi_tim`
--

CREATE TABLE `prvi_tim` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `nacionalnost` varchar(45) NOT NULL,
  `visina` int(11) DEFAULT NULL,
  `fotografija` text NOT NULL,
  `karijera` text NOT NULL,
  `pozicija` varchar(45) NOT NULL,
  `broj` int(11) NOT NULL,
  `datum_rodjenja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prvi_tim`
--

INSERT INTO `prvi_tim` (`id`, `ime`, `prezime`, `nacionalnost`, `visina`, `fotografija`, `karijera`, `pozicija`, `broj`, `datum_rodjenja`) VALUES
(1, 'Aleksa', 'IliÄ‡', 'MNE', 204, '1548365377aleksa_ilic.JPG', '', 'Krilo', 13, '1996-08-17'),
(11, 'Petar', 'PopoviÄ‡', 'MNE', 193, '1548365796petar_popovic.JPG', '', 'Bek', 30, '1996-09-13'),
(12, 'Sead', 'Å ehoviÄ‡', 'MNE', 201, '1548365881sead_sehovic.JPG', '', 'Bek', 8, '1989-08-22'),
(13, 'Suad', 'Å ehoviÄ‡', 'MNE', 198, '1548365937suad_sehovic.JPG', '', 'Bek', 4, '1987-02-19'),
(14, 'Nemanja', 'GordiÄ‡', 'SRB', 193, '1548366021nemanja_gordic.JPG', '', 'Krilo', 10, '1988-09-25'),
(15, 'Nikola ', 'IvanoviÄ‡', 'MNE', 191, '1548366093nikola_ivanovic.JPG', '', 'Plejmejker', 2, '1994-02-19'),
(16, 'Danilo', 'NikoliÄ‡', 'MNE', 210, '1548366153danilo_nikolic.JPG', '', 'Krilo', 34, '1993-04-08'),
(17, 'Filip', 'BaroviÄ‡', 'MNE', 209, '1548366225filip_barovic.JPG', '', 'Centar', 6, '1990-07-29'),
(18, 'MiliÄ‡', 'Starovlah', 'MNE', 200, '1548366280milic_starovlah.JPG', '', 'Bek', 9, '1990-01-28'),
(19, 'Earl', 'Clark', 'SAD', 208, '1548366374earl_clark.jpg', '', 'Krilni centar', 5, '1988-01-17'),
(20, 'Edwin', 'Jackson', 'FRA', 190, '1548366430edwin_jackson.jpg', '', 'Bek Å¡uter', 1, '1990-09-18'),
(21, 'Coty', 'Clarke', 'SAD', 201, '1548366492coty_clarke.JPG', '', 'Krilo', 7, '1992-07-04'),
(22, 'Goga', 'Bitadze', 'GEO', 211, '1548366562goga_bitadze.png', '', 'Centar', 11, '1999-07-02'),
(23, 'James', 'Bell', 'SAD', 196, '1548366622james_bell.png', '', 'Nisko krilo', 31, '1992-01-07'),
(24, 'Norris', 'Cole', 'SAD', 188, '1548366676norris_cole.png', '', 'Bek', 3, '1988-10-13'),
(25, 'Fedor', 'Å½ugiÄ‡', 'MNE', 196, '1548366739fedor_zugic.JPG', '', 'Plejmejker', 44, '2003-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `rezultati`
--

CREATE TABLE `rezultati` (
  `id` int(11) NOT NULL,
  `domacin` varchar(255) NOT NULL,
  `gost` varchar(255) NOT NULL,
  `domacin_kosevi` int(11) NOT NULL,
  `gost_kosevi` int(11) NOT NULL,
  `datum` date NOT NULL,
  `vrijeme` time NOT NULL,
  `liga_id` int(11) NOT NULL,
  `domacin_logo` varchar(45) NOT NULL,
  `gost_logo` varchar(45) NOT NULL,
  `dvorana` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezultati`
--

INSERT INTO `rezultati` (`id`, `domacin`, `gost`, `domacin_kosevi`, `gost_kosevi`, `datum`, `vrijeme`, `liga_id`, `domacin_logo`, `gost_logo`, `dvorana`) VALUES
(12, 'KK BuduÄ‡nost VOLI', 'Fenerbahce Ulker', 80, 90, '2019-01-23', '20:00:00', 2, '1548623774buducnostpng.png', '1549028048fenerbache.png', 'SC MoraÄa'),
(13, 'KK Cedevita', 'KK BuduÄ‡nost VOLI', 70, 75, '2019-01-15', '20:00:00', 1, '1549026590cedevita.png', '1548623774buducnostpng.png', 'SC Zagreb'),
(15, 'KK BuduÄ‡nost VOLI', 'KK Partizan', 0, 100, '2018-11-20', '19:00:00', 1, '1548623774buducnostpng.png', '1549027732partizan.png', 'SC MoraÄa'),
(16, 'KK BuduÄ‡nost VOLI', 'KK Cedevita', 33, 29, '2019-02-09', '18:01:00', 1, '1548623774buducnostpng.png', '1549026590cedevita.png', 'SC MoraÄa');

-- --------------------------------------------------------

--
-- Table structure for table `sezona_kategorija`
--

CREATE TABLE `sezona_kategorija` (
  `sezona_id` int(11) NOT NULL,
  `kategorija_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sezona_kategorija`
--

INSERT INTO `sezona_kategorija` (`sezona_id`, `kategorija_id`) VALUES
(27, 1),
(27, 6),
(27, 7),
(27, 11),
(28, 1),
(28, 6),
(28, 7),
(28, 11),
(29, 1),
(29, 4),
(29, 6),
(29, 11),
(30, 1),
(30, 4),
(30, 6),
(30, 11),
(30, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sezone`
--

CREATE TABLE `sezone` (
  `id` int(11) NOT NULL,
  `broj` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sezone`
--

INSERT INTO `sezone` (`id`, `broj`) VALUES
(27, '2016/2017'),
(28, '2017/2018'),
(29, '2018/2019'),
(30, 'ostalo');

-- --------------------------------------------------------

--
-- Table structure for table `sponzori`
--

CREATE TABLE `sponzori` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `fotografija` text NOT NULL,
  `ranking` int(11) NOT NULL DEFAULT '1',
  `aktivan` enum('aktivan','neaktivan') NOT NULL DEFAULT 'neaktivan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponzori`
--

INSERT INTO `sponzori` (`id`, `link`, `fotografija`, `ranking`, `aktivan`) VALUES
(1, 'https://www.volivasvoli.com/', '1548690758voli.png', 5, 'aktivan'),
(4, 'http://www.teamedica.co.me/me/', '15486922431Tea_Medica_novi-logo.png', 3, 'aktivan'),
(5, 'http://monteput.me/', '1548692270monteput.png', 3, 'aktivan'),
(6, 'https://www.telekom.me/', '1548692299tcom.png', 3, 'aktivan'),
(7, 'https://www.nlb.me/me/stanovnistvo/pocetna', '1548692347nlbbanka.png', 0, 'aktivan'),
(8, 'https://www.nlb.me/me/stanovnistvo/pocetna', '1548692363nlbbanka.png', 3, 'aktivan'),
(9, 'https://www.erstebank.me/sr_ME/stanovnistvo', '1548692393erste (1).png', 3, 'aktivan'),
(10, 'http://nallgrupa.com/', '15486924291NALL-GRUPA-LOGO.png', 3, 'aktivan'),
(11, 'http://aromamarketi.me/', '15486924561aroma.png', 3, 'aktivan'),
(12, 'http://podgorica.me/', '1548692481300px-Podgorica_Coat_of_Arms.png', 3, 'aktivan'),
(13, 'https://www.portomontenegro.com/en/', '15486925121porto.png', 3, 'aktivan'),
(14, 'http://www.stadion.co.me/index.php/en/', '1548692538stadion.png', 3, 'aktivan'),
(15, 'http://www.lo.co.me/', '1548692560Untitlded-2.png', 3, 'aktivan'),
(16, 'http://www.plantaze.com/me/', '1548692600Logo_Plantaze-01.png', 3, 'aktivan'),
(17, 'https://jmv.co.me/web/en/', '1548692644jovovic.png', 3, 'aktivan'),
(18, 'http://www.stark.rs/', '1548692667Stark.png', 1, 'aktivan'),
(19, 'http://www.telemont.me/', '1548692711Telemont_Logo1.png', 1, 'aktivan'),
(20, 'http://www.micromedia.co.me/', '1548692744micromedia.png', 1, 'aktivan'),
(21, 'http://www.bar-kod.com/BC/site_cg/public/index.php/index/kategorija?id_kategorija=1', '1548692773bar-kod.png', 1, 'aktivan'),
(22, 'https://www.neltlsp.com/rs/crna-gora/', '1548692800Montenomaks-LOGO.png', 1, 'aktivan'),
(23, 'http://pewmc.com/', '1548692874Regionalni-vodovod.png', 1, 'aktivan'),
(24, 'http://www.normalcompany.me/', '1548692897normalko.png', 1, 'aktivan'),
(25, 'https://niksickopivo.com/me/agegateway', '154869292116-9-niksicko.jpg', 1, 'aktivan'),
(26, 'https://www.kkbuducnost.me/', '1548692992Logo-PENTA.png', 1, 'aktivan'),
(27, 'http://www.lowcarbonmne.me/', '1548693016Logo-MNE-SmanjiSvojKarbonskiOotisak-40x40mm.png', 1, 'aktivan');

-- --------------------------------------------------------

--
-- Table structure for table `strucni_stab`
--

CREATE TABLE `strucni_stab` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `pozicija` varchar(45) NOT NULL,
  `fotografija` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strucni_stab`
--

INSERT INTO `strucni_stab` (`id`, `ime`, `prezime`, `pozicija`, `fotografija`) VALUES
(1, 'Jasmin', 'RepeÅ¡a', 'Å ef struÄnog Å¡taba', '1548981796jasmin_repesa.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tagovi`
--

CREATE TABLE `tagovi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagovi`
--

INSERT INTO `tagovi` (`id`, `naziv`) VALUES
(2, 'KK FMP'),
(3, 'KK Igokea'),
(5, 'KK BuduÄ‡nost'),
(6, 'KK Partizan'),
(8, 'KK Krka'),
(9, 'KK Cibona'),
(10, 'KK Cedevita'),
(12, 'KK Mornar'),
(13, 'KK Real Madrid'),
(14, 'KK Fenerbahce'),
(34, 'KK CSKA'),
(35, 'KK Olimpiakos'),
(36, 'KK Barcelona'),
(39, 'KK Zadar'),
(54, 'euroleague'),
(56, 'Kup Crne Gore'),
(57, 'aba'),
(58, 'eurocup'),
(59, 'KK LovÄ‡en');

-- --------------------------------------------------------

--
-- Table structure for table `tag_vijest`
--

CREATE TABLE `tag_vijest` (
  `tag_id` int(11) NOT NULL,
  `vijest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_vijest`
--

INSERT INTO `tag_vijest` (`tag_id`, `vijest_id`) VALUES
(59, 34),
(5, 33),
(5, 32),
(58, 31),
(10, 30),
(58, 30),
(58, 29),
(5, 28),
(58, 28),
(5, 27),
(36, 27),
(54, 27),
(5, 26),
(54, 26),
(5, 25),
(13, 25),
(54, 25),
(2, 24),
(5, 24),
(57, 24),
(3, 23),
(5, 23),
(57, 23),
(5, 22),
(8, 22),
(5, 21),
(10, 21),
(5, 20),
(10, 20),
(5, 18),
(56, 18),
(13, 16),
(54, 16);

-- --------------------------------------------------------

--
-- Table structure for table `timovi`
--

CREATE TABLE `timovi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `logo` text NOT NULL,
  `dvorana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timovi`
--

INSERT INTO `timovi` (`id`, `naziv`, `logo`, `dvorana`) VALUES
(10, 'KK BuduÄ‡nost VOLI', '1548623774buducnostpng.png', 'SC MoraÄa'),
(12, 'KK CSKA', '1549026498cska.png', 'Megasport arena'),
(13, 'KK Union Olimpija', '1549026543olimpija.png', 'SC Tivoli'),
(14, 'KK Cedevita', '1549026590cedevita.png', 'SC Zagreb'),
(15, 'KK Crvena Zvezda FMP', '1549027670zvezda.png', 'SC Å½eleznik'),
(16, 'KK Partizan', '1549027732partizan.png', 'Aleksandar NikoliÄ‡'),
(18, 'FC Barcelona Lassa', '1549027956barcelona.png', 'Barcelona arena'),
(19, 'BC Panathinaikos', '1549028007panathaniakois.png', 'Dvorana mira i prijateljstva'),
(20, 'Fenerbahce Ulker', '1549028048fenerbache.png', 'Abdi Pekci arena');

-- --------------------------------------------------------

--
-- Table structure for table `trofeji`
--

CREATE TABLE `trofeji` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `broj` text NOT NULL,
  `sezone` text NOT NULL,
  `trofej` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trofeji`
--

INSERT INTO `trofeji` (`id`, `naziv`, `broj`, `sezone`, `trofej`) VALUES
(2, 'ABA liga', '1548679210trofej1.png', '17/18', '1548679210trofejaba.png'),
(7, 'Prvenstvo Crne Gore', '1548679672trofej11.png', '06/07, 07/08, 08/09, 09/10, 10/11, 11/12, 12/13, 13/14, 14/15, 15/16, 16/17', '1548679672trofejprva.png'),
(8, 'Kup Crne Gore', '1548679734trofej11.png', '06/07, 07/08, 08/09, 09/10, 10/11, 11/12, 13/14, 14/15, 15/16, 16/17, 17/18', '1548679734trofejkup.png'),
(9, 'Prvenstvo SRJ', '1548679766trofej3.png', '98/99, 99/00, 00/01', '1548679766trofejsrjprvenstvo.png'),
(10, 'Kup SRJ', '1548679871trofej3.png', '96/97, 98/99, 00/01', '1548679871kupsrj.png');

-- --------------------------------------------------------

--
-- Table structure for table `upravni_odbor`
--

CREATE TABLE `upravni_odbor` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `pozicija` varchar(45) NOT NULL,
  `fotografija` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upravni_odbor`
--

INSERT INTO `upravni_odbor` (`id`, `ime`, `prezime`, `pozicija`, `fotografija`) VALUES
(1, 'Dragan', 'Bokan', 'Vlasnik i generalni direktor kompanije VOLI', '1548981507dragan_bokan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `naslov` varchar(45) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `link`, `naslov`, `datum`) VALUES
(2, 'src=\"https://www.youtube.com/embed/H_j_TA9m658\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'dcdc', '2019-02-12'),
(3, 'src=\"https://www.youtube.com/embed/H_j_TA9m658\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'de', '2019-02-13'),
(4, '\"560\" \"315\" src=\"https://www.youtube.com/embed/02ux1dKNPXo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'Joe ropgan', '2019-02-13'),
(5, '\"560\" \"315\" src=\"https://www.youtube.com/embed/02ux1dKNPXo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'Joe Rogan', '2019-02-10'),
(7, '\"560\" \"315\" src=\"https://www.youtube.com/embed/MsjhqyCvfW4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen', 'sdede', '2019-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(45) NOT NULL,
  `tekst` text NOT NULL,
  `datum` date NOT NULL,
  `fotografija` text NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `aktivno` enum('aktivan','neaktivan') NOT NULL DEFAULT 'neaktivan',
  `naslov_en` varchar(45) NOT NULL,
  `tekst_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `tekst`, `datum`, `fotografija`, `kategorija_id`, `aktivno`, `naslov_en`, `tekst_en`) VALUES
(16, 'MORAÄŒA PROGUTALA Å AMPIONA EVROPE!', '<p><i>FantastiÄnom igrom koÅ¡arkaÅ¡i BuduÄ‡nost VOLI sruÅ¡ili su prvaka Evrope Real Madrid!</i></p><p>U atmosferi koja odavno nije viÄ‘ena koÅ¡arkaÅ¡i BuduÄ‡nost VOLI napravili su veliki podvig i pobijedili aktuelnog prvaka Evrope Real Madrid rezultatom 73-60! NaÅ¡a ekipa je sjajno otvorila meÄ i na krilima Colea i Jacksona povela 7-0. NoÅ¡eni sjajnom podrÅ¡kom sa tribina Plavi su nastavili u dobrom ritmu, odbrana je bila na visokom nivou i protivniku je dozvoljeno samo 15 poena u prvom kvartalu. OdliÄna kontrola ritma i mali broj izgubljenih lopti usmjerili su utakmicu u pravcu koji viÅ¡e odgovara naÅ¡oj ekipi. Protivniku nijesu dozvoljeni laki poeni, odbrana je bila veoma agresivna i na poluvrijeme se otiÅ¡lo sa prednoÅ¡Ä‡u naÅ¡e ekipe od 36-28.&nbsp;</p><p>TreÄ‡a Äetvrtina je otvorena na najbolji moguÄ‡i naÄin, Cole i Clark su pogodili po jednu trojku i prvi put Plavi dolaze do dvocifrene prednosti. U tim momentima posebno se u defanzivi istakao Earl Clark nakon Äijih je reakcija ekipa postizala lagane poene. Odbrana Plavih nije posustajala, tjerala je protivnika na veliki broj izgubljenih lopti, na kraju gotovo nevjerovatnih 18! U posljednjoj Äetvrtini vidjeli smo mnogo atraktivnih poteza naÅ¡e ekipe i veÄ‡ pomenutu granitnu odbranu, rotacije su bile pravovremene bez gotovo ijedne greÅ¡ke. Na kraju ubjedljivih 73-60 i samo 7 izgubljenih lopti dovoljno govori o partiji Å¡ampiona ABA lige. Plave su do velikog trijumfa vodili Cole sa 14, Bitadze 13 poena dok je Earl Clark uz 10 poena imao nemjerljiv defanzivni doprinos. Kod Å¡ampiona Evrope jediniigraÄ sa dvocifrenim uÄinkom bio je Llull sa 10 poena.</p><p>U ponedjeljak 20. januara naÅ¡u ekipu oÄekuje derbi ABA lige protiv ekipe Cedevite.</p>', '2019-01-18', '1548619049clanak-18-01-2019-5c42354ab3f22.jpg', 4, 'aktivan', 'MORAÄŒA DROWNS EUROLEAGUE CHAMPION!', '<p>The fantastic game of basketball The future of VOLI crashed the champions of Europe Real Madrid!&nbsp;<br><br>In an atmosphere that has not been seen before, the Future of VOLI have made a big feat and have won the Real Madrid Real Madrid 73-60! Our team greatly opened the match and led 7-0 on the wings of Cole and Jackson. Carried with great support from the tribune Plava continued in good rhythm, the defense was high and the opponent was allowed only 15 points in the first quarter. Excellent control of the rhythm and a small number of lost balls directed the game in a direction that suits our team. The opponent was not allowed light points, the defense was very aggressive and in the half time went with the advantage of our team from 36-28.&nbsp;<br><br>The third quarter was opened in the best possible way, Cole and Clark scored a triple, and for the first time, Plavi came up to a two-point advantage. At the moment, Earl Clark was particularly prominent in the defensive, after which the team scored a lightweight point. The Blacks\\\\\\\' defense did not let go, it drove the opponent to a large number of lost balls, at the end of almost unbelievable 18! In the last quarter we saw many attractive moves of our team and already mentioned granite defense, the rotations were timely without almost any mistake. At the end of a convincing 73-60 and only 7 lost balls enough talk about the ABA league champions league. The Blues were led by Cole with 14, Bitadze 13 points while Earl Clark with 10 points had an unbelievable defensive contribution. With a European champion, the single-player with a double-digit performance was Llull with 10 points.&nbsp;<br><br>On Monday, January 20th, our team is expecting a derby of the ABA League against the Cedevite team.</p>'),
(18, '30.01. KK BUDUÄ†NOST VOLI DOÄŒEKUJE KK IBAR R', '<p><i>U srijedu u 19:00h plavi igraju u Äetvrtfinalu Kupa Crne Gore.</i></p><p>Nakon utakmice protiv Petrol Olimpije plavi svoju sledeÄ‡u utakmicu igraju na domaÄ‡em terenu protiv KK Ibar RoÅ¾aje.</p><p>Za ovu utakmicu je ulaz slobodan, dok sezonske karte zadrÅ¾avaju svoju numeraciju</p>', '2019-01-26', '1548712327buducnostpng.png', 11, 'aktivan', '30.01. KK BUDUÄ†NOST LOVES EVENTS KK IBAR ROÅ', '<p>On Wednesday at 19:00 the blue play in the quarterfinals of the Cup of Montenegro.&nbsp;<br><br>After the game against Petrol Olimpija Plavi will play their next match on home court against KK Ibar Rozaje.&nbsp;<br><br>For this game, the entry is free, while season tickets retain their numbering</p>'),
(20, 'SRCE Å AMPIONA!', '<p><i>Plavi su u veoma neizvijesnoj zavrÅ¡nici savladali Cedevitu rezultatom 80-78.</i></p><p>U triler zavrÅ¡nici i fenomenalnoj atmosferi Spottskog centra MoraÄa koÅ¡arkaÅ¡i BuduÄ‡nost VOLI savladali su u derbiju 16. kola ABA lige ekipu Cedevite rezultatom 80-78 i na taj naÄin se izjednaÄili po broju pobjeda. NaÅ¡a ekipa je mnoho bolje otvorila meÄ i na krilima Noris Colea stekla prvu osjetniju prednost. Gosti su se ulaskom Pullena stabilizovali i doveli utakmicu u ravnoteÅ¾u, kada mu se i Cobbs prikljuÄio gosti su preuzeli voÄ‘stvo i dobili prvu Äetvrtinu rezultatom 22-21. Bekovski tandem gostiju je nastavio sa dobrom igrom i naÅ¡a ekipa nije uspijevala da povrati prednost. U meÄu bez pretjeranog ritma i sa velikim brojem prekrÅ¡aja bolje se snaÅ¡la ekipa iz Zagreba i na poluvrijeme otiÅ¡la sa prednoÅ¡Ä‡u od 2 poena.</p><p>Nastavak je poÄeo sjajno, Cole je pogodio pod faulom i Äinilo se da je momentum na strani naÅ¡e ekipe. Ipak gosti su nastavili sjajnonda igraju, teÄno u napadu i kombinovanom odbranom pravili mnogo problema aktuelnom Å¡ampionu. NaÅ¡i momci su pokuÅ¡avali individualnim rjeÅ¡enjima da se nametnu u napadu ali bez mnogo uspijeha. U posljednjem kvartalu trener RepeÅ¡a je zaigrao sa dva plejmejkera ali ni to nije dalo previÅ¡e rezultata. Kada su gosti poveli rezultatom 76-68 Plavi su pokazali zaÅ¡to su Å¡ampioni ABA lige i da imaju veliko srce. Serijom 12-0 koju su napadaÄki predvodili Cole i Clarke povratili su prednost. U odbrani su dominirali Bitadze i Clark i praktiÄno zakljuÄali reket. Posebno treba istaÄ‡i trojku Cole za 80-76 nakon koje je MoraÄa \\\\\\\"eksplodirala\\\\\\\". NoÅ¡eni fenomenalnom publikom Plavi su odbranili posljednji napad i donijeli navijaÄima neopisivno slavlje. Prvi meÄ‘u jednakima u naÅ¡oj ekipi bili su Clark sa 17 i Jackson sa 14 poena. Treba istaÄ‡i i fenomenalnu rolu Clarke u zavtÅ¡nici, krilo Plavih je susret zavrÅ¡ilo sa 10 poena. PoraÅ¾enu ekipu je predvodio bekovski tandem Pullen- Cobbs sa 25 odnosno 18 poena.</p><p>Naredni meÄ naÅ¡a ekipa igra taloÄ‘e u MoraÄi, kada u okviru 20.kola Evrolige doÄekuje ekipu Herbalife Gran Canaria. MeÄ je na programu u petak 25. januara.</p>', '2019-01-21', '1548712491clanak-25-01-2019-5c4b70fa5365b.jpg', 1, 'aktivan', 'A HEART OF THE CHAMPION', '<p>In a very uncertain finale, Blue won the Cedevita 80-78.&nbsp;<br><br>In the thriller finals and the phenomenal atmosphere of the Spots Center Moraca, the basketball players of the VOLI FUDA won the derby of the 16th round of the ABA League team Cedevita by the score of 80-78 and thus equaled the number of victories. Our team opened the sword better, and on the wings of Norris Cole gained the first sensation. With Pullen entering, the guests stabilized and brought the game into balance, when Cobbs joined him, the guests took the lead and scored the first quarter with a score of 22-21. Beck\\\'s tandem of guests continued with a good game and our team was not able to regain advantage. In the match without excessive rhythm and with a large number of violations, the team from Zagreb scored better and half-time went with the advantage of 2 points.&nbsp;<br><br>The continuation started great, Cole hit the foul and it seemed that the momentum was on the side of our team. However, the hosts continued to play a bright game, in the attack and combined defense, they made many problems to the current champion. Our guys tried to get individual solutions to attack in the attack, but without much success. In the last quarter, Coach Repes played with two playmakers, but this did not give too much result. When the hosts scored a score of 76-68 Blue showed why they are ABA league champions and have a big heart. The 12-0 series led by Cole and Clarke took the lead. The defense was dominated by Bitadze and Clark and practically locked the racket. It is especially worth mentioning the Troika Cole for 80-76 after which Moraca \\\\ \\\"exploded \\\\\\\". Carried to the phenomenal crowd Plavi defended the last attack and brought the fans an indescribable celebration. The first among the equals in our team were Clark with 17 and Jackson with 14 points. It should also be noted that Clarke\\\'s phenomenal role in the flank, the wing of the Blues ended with 10 points. The defeated team was led by the Bundesliga tandem Pullen-Cobbs with 25 and 18 points.&nbsp;<br><br>The next match, our team plays a pitch in Moraca, when in the 20th round of Euroleague they are waiting for the team Herbalife Gran Canaria. The match is on the program on Friday, January 25th.</p>'),
(21, 'Najava utakmive protiv KK Cedevita', '<p><i>21.01.2019. plavi doÄekuju ekipu KK Cedevita u SC \\\\\\\\\\\\\\\"MoraÄa\\\\\\\\\\\\\\\"</i></p><p>Nakon velike pobjede u SC \\\\\\\\\\\\\\\"MoraÄa\\\\\\\\\\\\\\\" protiv Å¡ampiona evrolige, sljedeÄ‡a utakmica za naÅ¡e momke Ä‡e se odigrati&nbsp;u ponedjeljak u 18:00h uoÄi 16. kola ABA lige. Ova utakmica je od velike vaÅ¾nosti za naÅ¡u ekipu, jer od nje zavisi drugo mjesto na tabeli. Drugo mjesto na tabeli daje prednost domaÄ‡eg terena tokom plej ofa. DoÄ‘i i podrÅ¾i svoj klub!</p><p>Karte Ä‡e se prodavati u nedjelju od 12:00h do 19:00h i u ponedjeljak od 12:00h do poÄetka utakmice.</p>', '2019-01-19', '1548712549clanak-21-01-2019-5c45824b657f2.png', 1, 'aktivan', 'Announcement of the match against KK Cedevita', '<p>01/21/2019. blue are welcoming the team of KK Cedevita in SC \\\\\\\\\\\\ \\\"MoraÄa \\\\\\\\\\\\\\\"&nbsp;<br><br>After a big win in SC \\\\ \\\"MoraÄa \\\\\\\\\\\\\\\" against the Euroleague champion, the next match for our boys will be played on Monday at 18:00 on the eve of the 16th round of the ABA League. This match is very important for our team, because it is the second place on the table. The second place in the table gives priority to the home court during the play. Come and support your club!&nbsp;<br><br>The tickets will be sold on Sundays from 12:00 to 19:00 and on Monday from 12:00 until the start of the match.</p>'),
(22, 'BLIJEDO IZDANJE U NOVOM MESTU', '<p><i>Plavi poraÅ¾eni u 12.kolu ABA lige od ekipe Krke.</i></p><p>KoÅ¡arkaÅ¡i BuduÄ‡nost VOLI doÅ¾ivjeli su drugi uzastopni poraz u 12.kolu ABA lige, na debiju Bitadze-a i Bell-a, od ekipe Krke iz Novog Mesta. Tok utakmice u mnogome je odredila prva Äetvrtina u kojoj je naÅ¡a ekipa postigla samo 5 poena. Plavi nijesu imali rjeÅ¡enja za agresivnu odbranu domaÄ‡ina koji je dobrom igrom u prvom kvartalu stekao neophodno samopouzdanje. U sliÄnom ritmu se nastavilo i u drugoj Äetvrtini, doduÅ¡e vidjeli smo neÅ¡to bolje napadaÄko izdanje koÅ¡arkaÅ¡a BuduÄ‡nost VOLI ali se na poluvrijeme otiÅ¡lo sa 15 poena zaostatka. Nakon pauze djelovalo je da su se naÅ¡i momci trgli i predvoÄ‘eni veÄeras sjajnim PopoviÄ‡em, uspjeli su da smanje zaostatak domaÄ‡ina. U posljednjoj dionici nastavila je da se topi prednost domaÄ‡ina ali kada je trebalo napraviti odluÄujuÄ‡i korak naÅ¡i momci su promaÅ¡ivali slobodna bacanja. ÄŒini se da je pobjednika odluÄila prva Äetvrtina nakon koje su koÅ¡arkaÅ¡i BuduÄ‡nost VOLI jurili zaostatak do kraja susreta. Jedina svijetla taÄka u redovima naÅ¡e ekipe bio je PopoviÄ‡ sa 16 poena, domaÄ‡ina je do pobjede vodio Lapornik strijelac 12 poena.&nbsp;</p><p>NaÅ¡e momke novo iskuÅ¡enje oÄekuje 28.decembra kada u okviru takmiÄenja u Evroligi gostuju ekipi Bayer Munich.</p>', '2018-12-24', '1548712661clanak-24-12-2018-5c21311830d88.jpg', 1, 'aktivan', 'BLOCKED EDITION IN A NEW PLACE', '<p>Blue defeated in the 12th round of the ABA league from the Krka team.&nbsp;<br><br>Basketball The future of VOLI experienced another consecutive defeat in the 12th round of the ABA League, on the debut of Bitadze and Bell, from the Krka team from Novi Grad. The course of the game has largely determined the first quarter in which our team scored only 5 points. Blue did not have solutions for the aggressive defense of the host who, with a good game in the first quarter, gained the necessary confidence. In a similar rhythm continued in the second quarter, though we have seen a slightly better offensive edition of the basketball player FUTURE VOLI but in the afternoon it left with 15 points behind. After the break, our boys were struck and led by great Popovic tonight, they managed to reduce the backlog of hosts. In the last section, she continued to melt the advantage of the host, but when it was necessary to make a decisive step, our boys missed free throws. It seems that the winner has decided the first quarter after which the basketball players of BuduÄ‡nost VOLI run back to the end of the match. The only bright spot in the ranks of our team was Popovic with 16 points, the host was led by Lapornik 12 points.&nbsp;<br><br>Our guys are waiting for the new temptation on 28 December when they will play Bayer Munich in the Euroleague competition.</p>'),
(23, 'FURIOZNO DRUGO POLUVRIJEME!', '<p><i>KoÅ¡arkaÅ¡i BuduÄ‡nost VOLI savladali su u 14. kolu ABA lige ekipu Igokee rezultatom 96-70.</i></p><p>Sjajnim izdanjem, prije svega u drugom poluvremenu, koÅ¡arkaÅ¡i BuduÄ‡nost VOLI savladali su Igokeu u 14. kolu ABA lige i na taj naÄin upisali devetu pobjedu. Plavi su meÄ zapoÄeli u neÅ¡to sporijem ritmu Å¡to je protivnik znao da iskoristi i u prvom kvartalu uglavnom bude u prednosti.Cole i PopoviÄ‡ su svojim ulaskom donijeli prijeko potrebnu energiju i prednost gostiju je bila sve manja i manja. Ipak, na poluvrijeme se otiÅ¡lo sa prednoÅ¡Ä‡u Igokee 46-43.</p><p>U drugom poluvremenu kao da je druga ekipa izaÅ¡la na teren, Plavi su zaigrali mnogo agresivnije u odbrani, veÄ‡ pomenutim Cole i PopoviÄ‡u su se prikljuÄili i ostali igraÄi i za 3 minuta naÅ¡a ekipa je bila u prednosti. U tom periodu sjajan je bio Bitadze koji je sa nekoliko zakucavanja i poena pod faulom podigao publiku na noge. Treba istaÄ‡i i rolu koju je imao Earl Clark, prije svega defanzivnu a uz to je i pogodio nekoliko Å¡uteva na drugoj strani. Do kraja susreta prednost je samo rasla a publika je uÅ¾ivala u atraktivnim potezima naÅ¡ih momaka. Na kraju ubjedljivih 96-70 na debiju Jasmina RepeÅ¡e pred domaÄ‡om publikom.&nbsp;</p><p>U naÅ¡oj ekipi poeni su bili sjajno rasporeÄ‘eni, PopoviÄ‡ je bio najefikasniji sa 14 poena a istakli su se Suad&nbsp; Å ehoviÄ‡ sa 13, Bitadze i NikoliÄ‡ sa po 12 dok je Cole uz 11 poena imao i 6 asistencija. Kod gostiju bolji od ostalih bili su ZubÄiÄ‡ i AnÄ‘yÅ¡iÄ‡ sa po 17 poena.</p><p>Naredni meÄ koÅ¡arkaÅ¡i BuduÄ‡nost VOLI igraju u okviru 17. kola Evrolige kada Ä‡e gostovati ekipi Maccabi FOX Tel Aviv u srijedu 9. januara.</p>', '2019-01-06', '1548712754clanak-06-01-2019-5c3254729ec55.jpg', 1, 'aktivan', 'FURIOUS SECOND HALF!', '<p>Basketball players BuduÄ‡nost VOLI won the 14th round of the ABA league for the team Igokee with 96-70.&nbsp;<br><br>With a great edition, primarily in the second half, basketball players Buducnost VOLI won the Igokea in the 14th round of the ABA League and in that way recorded the ninth victory. The blue sword started in a somewhat slower rhythm, which the opponent knew to use and in the first quarter it was mostly in advantage. Cole and Popovic brought in the most needed energy and the advantage of the guests was getting smaller and smaller. However, the half-time went with the advantage of Igokea 46-43.&nbsp;<br><br>In the second half as if the other team went out on the field, Plavi played much more aggressively in the defense, but the other players joined Cole and Popovic, and in 3 minutes our team was in advantage. During that period, Bitadze was great, who raised the crowd to his feet with a few dives and points under the foul. It should also be noted that the role played by Earl Clark, above all, was defensive, and he also hit several shots on the other side. By the end of the meeting, the advantage was only growing and the audience enjoyed the attractive moves of our guys. At the end of the convincing 96-70 on the debut of Jasmin Repesha before the domestic audience.&nbsp;<br><br>In our team, the points were splendidly arranged, Popovic was the most effective with 14 points, and Suad Shehovic with 13, Bitadze and Nikolic scored with 12, while Cole with 11 points had 6 assists. Among the guests better than others were Zubcic and Anjusic with 17 points.&nbsp;<br><br>Next Match Basketball The Future of VOLI play within the 17th round of Euroleague when they will be visiting Maccabi FOX Tel Aviv on Wednesday, January 9th.</p>'),
(24, 'RUTINSKA POBJEDA', '<p><i>Plavi su bez veÄ‡ih problema savladali ekipu FMP u 15. kolu ABA lige.</i></p><p>Sjajnom igrom od samog starta Plavi su bez veÄ‡ih problema savladali ekipu FMP rezultatom 87-70. NaÅ¡a ekipa je kontrolu igre uspostavila dobrom unutraÅ¡njom igrom u kojoj je prednjaÄio BaroviÄ‡, sa 6 vezanih poena ukljuÄujuÄ‡i i sjajno zakucavanje odliÄno se uveo u utakmicu i najavio svoje sjajno izdanje. OdliÄnom odbranom i kontrolom skoka Plavi su poveÄ‡avali prednost. U drugoj dionici naÅ¡a ekipa je sjajnom timskom igrom i 28 postignutih poena stekla 16 poena prednosti i mirno privela poluvrijeme kraju.</p><p>U treÄ‡oj dionici ekipa BuduÄ‡nost VOLI nije bila u napadaÄkom ritmu iz prvog poluvremenu i uz malo opuÅ¡tanje protivnik je uspio da smanji zaostatak. Ipak, pojaÄanom agresivnoÅ¡Ä‡u u odbrani stvari su doÅ¡le na svoje mjesto. U posljednjem kvartalu nezaustavljivi su bili Earl Clark i Coty Clarke Å¡to je bilo dovoljno za miran kraj meÄa. Treba napomenuti sjajnu timsku igru naÅ¡e ekipe, o Äemu svjedoÄi 25 asistencija, u tom segmentu prednjaÄili su GordiÄ‡ i Cole sa po 7, odnosno Jackson sa 6 uspjeÅ¡nih dodavanja. Kada su poeni u pitanju, najefikasniji su bili Clark sa 17, BaroviÄ‡ sa 16, odnosno Clarke sa 15 poena. Kod domaÄ‡ina istakao se ApiÄ‡ sa 26 poena.</p><p>U petak 18. januara u MoraÄi nas oÄekuje spektakl, kada u okviru 19. kola Evrolige naÅ¡a ekipa doÄekuje aktuelnog prvaka Evrope - Real Madrid.</p>', '2019-01-14', '1548712826clanak-14-01-2019-5c3ce04b965cb.jpg', 1, 'aktivan', 'EASY WIN', '<p>The Blues won the FMP team in the 15th round of the ABA League without major problems.&nbsp;<br><br>With a great game from the very start, the Blues managed to beat the FMP team with 87-70 without major problems. Our team set up control of the game with a good internal game in which Barovic was leading, with 6 points, including a great dashing, and he introduced himself into the game and announced his great edition. With the excellent defense and control of the Blue jump, they increased the advantage. In the second part, our team scored 16 points advantageously with a great team game and 28 points scored and quietly ripped the half-timer to the end.&nbsp;<br><br>In the third section, BuduÄ‡nost VOLI was not in the first half of the attack rhythm and with a little relaxation the opponent managed to reduce backlog. Nevertheless, the increased aggressiveness in defense of things came to their place. In the last quarter, Earl Clark and Coty Clarke were unstoppable, which was enough for the quiet end of the match. We should mention the team\\\'s great team team, as evidenced by 25 assists, with Gordic and Cole with 7, and Jackson with 6 successful passes. When the points were in question, the most effective were Clark with 17, Barovic with 16, and Clarke with 15 points. ApiÄ‡ with 26 points showed off with the host.&nbsp;<br><br>On Friday, January 18 in MoraÄa we expect a spectacle, when within the 19th round of Euroleague our team is welcoming the current champion of Europe - Real Madrid.</p>'),
(25, 'RASPRODATE KARTE ZA UTAKMICU PROTIV REAL MADR', '<p><i><strong>Za svega 2 sata i 40 minuta rasprodate su sve karte za utakmicu protiv Real Madrida uoÄi 19. kola EvroLige!</strong></i></p><p>Utakmica Ä‡e se odigrati&nbsp;u petak u 19:00h u SC \\\\\\\"MoraÄa\\\\\\\". Za vas Å¡to nijeste stigli da kupite kartu, utakmicu moÅ¾ete pratiti na Nova M kanalu.&nbsp;</p><p>AJMO PLAVI!</p>', '2019-01-16', '1548713123clanak-16-01-2019-5c3f3cb05850c.png', 4, 'aktivan', 'TICKETS SOLD FOR THE GAME AGAINST REAL MADRID', '<p>In only 2 hours and 40 minutes, all cards for the game against Real Madrid are sold before the 19th round of EuroLige!&nbsp;<br><br>The match will be played on Friday at 19:00 in SC \\\\ \\\"MoraÄa \\\\\\\". For you, you are not able to buy a ticket, you can follow the match on the Nova M channel.&nbsp;<br><br>LET\\\'S GO &nbsp;BLUE!</p>'),
(26, 'NORIS COLE DONIO POBJEDU!', '<p><i>KoÅ¡arkaÅ¡i BuduÄ‡nost VOLI zabiljeÅ¾ili su 4. pobjedu u Evroligi pobjedom nad Darussafaka Tefken Istanbul u neizvijesnoj zavrÅ¡nici.</i></p><p>JoÅ¡ jedna pobjeda u MoraÄi! Plavi su u veoma neizvijesnoj zavrÅ¡nici savladali ekipu Darussafaka Tefken Istanbul rezultatom 75-74. Od samog starta viÄ‘ena je velika borba, u prvoj Äetvrtini naÅ¡i momci su prednost odrÅ¾avali sjajnom odbranom. U napadu je sjajno funkcionisala pick and roll igra Cole-BaroviÄ‡ iz koje je naÅ¡a ekipa kreirala mnogo otvorenih Å¡uteva. Da su naÅ¡i igraÄi bili malo precizniji imali bi veÄ‡u prednost od dva poena na kraju prvog kvartala. Rani izlazak iz bonusa uslovio je znatno loÅ¡iju i manje agresivnu odbranu, pa je uz 28 primljenih poena u drugoj dionici naÅ¡ tim na odmor otiÅ¡ao sa 6 poena zaostatka.&nbsp;</p><p>KoÅ¡arkaÅ¡i BuduÄ‡nost VOLI su u nastavak uÅ¡li sa mnogo viÅ¡e energije i na krilima Colea uspjeli da stignu protivnika. Bitadze je pogodio pod faulom i donio prednost naÅ¡oj ekipi. Kada je sredinom posljednje Äetvrtine serijom Jacksona prednost porasla na 6 poena Äinilo se da Ä‡e Plavi rutinski privesti meÄ kraju. Ipak, protivnik se nije predavao i na 15 sekundi do kraja susreta prilazi na samo poen zaostatka. Tada Cole faulira Ozmiraka koji hladnokrvno pogaÄ‘a oba slobodna bacanja i donosi prednost svojoj ekipi. Upravo je Noris Cole preuzeo odgovornost i dugom dvojkom donio pobjedu naÅ¡oj ekipi. Nastalo je veliko slavlje u dvorani i MoraÄa je u tim momentima \\\\\\\"prokljuÄala\\\\\\\". ÄŒovjek odluke, Cole, postigao je 17 poena a sjajan je bio i Jackson sa 18 poena. U poraÅ¾enoj ekipi strijelce je predvodio Douglas sa 14 pogodaka.</p><p>Naredni meÄ Plavi ponovo igraju na svom terenu. U petak 18. januara u MoraÄu dolazi aktuelni prvak Evrope - Real Madrid. PoÄetak utakmice zakazan je za 19 Äasova.</p>', '2019-01-11', '1548713284clanak-06-01-2019-5c3254729ec55.jpg', 4, 'aktivan', 'NORIS COLE BROUGHT WIN!', '<p>Basketball The future of VOLI recorded the 4th victory in Euroleague with victory over Darussafak Tefken Istanbul in the finishing finals.&nbsp;<br><br>Another victory in Moraca! In the very inexorable finals, the Blue have won the Darussafaka Tefken Istanbul team with a score of 75-74. From the very start, a great fight was seen, in the first quarter, our guys held a great defense. In the attack, the pick and roll game Cole-Barovic was great, from which our team created many open pitches. If our players were a bit more accurate, they would have a bigger advantage of two points at the end of the first quarter. Early exit from the bonus made a much worse and less aggressive defense, so with 28 points received in the second, our team went on with 6 points backlog.&nbsp;<br><br>Basketball The future of VOLI continued with much more energy and on the wings of Cole managed to reach the opponent. Bitadze scored under a foul and gave priority to our team. When in the middle of the last quarter of the Jackson series, the preponderance rose to 6 points, it seemed that Plavi would routinely bring the sword to the end. However, the opponent did not give a lecture and only approached the point behind the 15 seconds until the end of the match. Then Cole fouls the Ozmirak who coldly blows both free throws and takes advantage of his team. Norris Cole has just assumed responsibility and with a long two, he brought victory to our team. There was a great celebration in the hall and MoraÄa was \\\"swinging\\\" at those moments. The decision-maker, Cole, scored 17 points and Jackson was 18 points high. In the defeated team, the shooter was led by Douglas with 14 goals.&nbsp;<br><br>Next Blues play again on their field. On Friday, January 18th in Moraca, the current European champion - Real Madrid comes. The start of the game is scheduled for 19 hours.</p>'),
(27, 'HEROJSKA POBJEDA!', '<p><i>KoÅ¡arkaÅ¡i BuduÄ‡nost VOLI su u sjajnoj zavrÅ¡nici savladali KK Barcelona u 11.kolu Evrolige.</i></p><p>Nova pobjeda! NaÅ¡i momci su prevaziÅ¡li sve prepreke i ostvarili treÄ‡u pobjedu u Evroligi. Prije svega oslabljeni neigranjem IvanoviÄ‡a pa i brzim ulaskom u probleme sa faulovima Nemanje GordiÄ‡a naÅ¡a ekipa se suoÄila sa problemima u organizaciji igre. Ipak Plavi nisu posustajali, serijom poena Danila NikoliÄ‡a su odrÅ¾avali prikljuÄak i otiÅ¡li na odmor sa minimalnim zaostatkom. NoÅ¡eni sjajnom podrÅ¡kom sa tribina naÅ¡i igraÄi su nastavili sa dobrom igrom i u drugom poluvremenu. MeÄ je karakterisala velika nervoza i mnogo promaÅ¡aja na obje strane. Kao pravi lider ekipe Nemanja GordiÄ‡ je preuzeo stvari u svoje ruke i sa vezanih osam poena ispostaviÄ‡e se donio nedostiÅ¾nu prednost naÅ¡oj ekipi. Upravo je GordiÄ‡ bio uz Klarka najefikasniji sa 11 poena dok je u poraÅ¾enoj ekipi bolji od ostalih bio Hanga sa 12 pogodaka.<br>&nbsp;</p><p>ÄŒetvrtu pobjedu a prvu u gostima Plavi Ä‡e traÅ¾iti na gostovasnju KK Herbalife Gran Canaria 14.decembra u okviru 12.kola Evrolige.</p><p><strong>Aleksandar DÅ¾ikiÄ‡, trener BuduÄ‡nost Volija:</strong></p><p>Moram biti zadovoljan, pobijedili smo Barselonu. TakoÄ‘e sam i umoran, teÅ¡ko da sam sada svjestan Å¡ta smo uradili. Hvala igraÄima i navijaÄima koji su ispunili dvoranu do posljednjeg mjesta. Kao Å¡to vidite, moj tim nije mogao da raÄuna na sve igraÄe. SuoÄili smo se sa ranim faulovima GordiÄ‡a. Ali naÅ¡li smo naÄin da preÅ¾ivimo.</p><p><br>&nbsp;</p>', '2019-01-06', '1548713345clanak-06-12-2018-5c098fdeaa80a.jpg', 4, 'aktivan', 'HEROIC WIN!', '<p>Basketball The Future of VOLI won the KK Barcelona in the 11th round of Euroleague in a great finish.&nbsp;<br><br>New win! Our boys have overcome all obstacles and have achieved the third victory in Euroleague. First of all, weakened by Ivanic\\\'s lack of play, and with the rapid entry into problems with Nemanja Gordic\\\'s factions, our team faced problems in organizing the game. Nevertheless, Plavi did not give up, the series of points by Danilo Nikolic kept the connection and went on holiday with minimal backlog. Carried by great support from the stands, our players continued with a good game in the second half. The sword was characterized by great nervousness and many flaws on both sides. As a real leader of Nemanja GordiÄ‡ took the things into his own hands and with eight points, he will turn out to bring the unachievable advantage to our team. Gordic was with Clark the most effective with 11 points, while in the defeated team better than the rest was Hanga with 12 goals.&nbsp;<br><br>The fourth win and the first guest will be on Blue Guest of KC Herbalife Gran Canaria on Dec. 14 within the 12th round of Euroleague.&nbsp;<br><br>Aleksandar DÅ¾ikiÄ‡, coach BuduÄ‡nost Voli:&nbsp;<br><br>I have to be satisfied, we have won Barcelona. I\\\'m also tired, hardly aware of what we\\\'ve done now. Thanks to the players and the fans who filled the hall to the last place. As you can see, my team could not count on all players. We faced the early Gordic factions. But we found a way to survive.</p>'),
(28, 'U PETAK PROTIV DARUSSAFAKE', '<p><i>BuduÄ‡nost VOLI igra protiv Darussafake drugi Äetvrtfinalni meÄ Eurokupa.</i></p><p>U petak, 9. marta,&nbsp;od 19 Äasova, naÅ¡ tim doÄekuje ekipu Darussafake,&nbsp;u okviru drugog Äetvrtfinalnog meÄa Eurokupa.</p><p>&nbsp;</p><p>Za Äetvrtfinale smo spremili poklon za najvjernije navijaÄe. Na poluvremenu meÄa, naÅ¡i koÅ¡arkaÅ¡i Ä‡e izabrati najbolji selfi, napravljen tokom prve dvije Äetvrtine u SC MoraÄa.&nbsp;</p><p>Kako do poklona?</p><p>- Objavi selfi na Instagramu, slikan tokom prve dvije Äetvrtine u SC MoraÄa,&nbsp;</p><p>- Zaprati i taguj&nbsp;zvaniÄne Instagram naloge <a href=\\\"\\\\&quot;https://www.instagram.com/ctelekom/\\\\&quot;\\\">@ctelekom</a> i <a href=\\\"\\\\&quot;https://www.instagram.com/buducnostvoli/\\\\&quot;\\\">@buducnostvoli</a>,</p><p>- Postavi heÅ¡teg&nbsp;<a href=\\\"\\\\&quot;https://www.facebook.com/hashtag/1klub1mre%C5%BEa?source=feed_text&amp;story_id=1093586860784062\\\\&quot;\\\">#1Klub1MreÅ¾a</a>.</p><p>NavijaÄ sa najboljim selfijem, izabranim od stane naÅ¡ih koÅ¡arkaÅ¡a, Ä‡e na poluvremenu dobiti sluÅ¡alice â€œUrbeatsâ€ by Dr Dre, koje smo spremili u saradnji sa&nbsp;<strong>Crnogorskim Telekomom.</strong></p><p>&nbsp;</p><p><strong>Karte za meÄ Ä‡e se prodavati&nbsp;na biletarnici SC MoraÄa, u Äetvrtak od 10 do 17 Äasova, kao i na dan utakmice, od 10 Äasova do poÄetka meÄa. Cijena karte je&nbsp;5 eura.</strong></p><p>&nbsp;</p><p>PodrÅ¾imo naÅ¡ klub u Äetvrtfinalu!</p>', '2018-03-07', '1548713569BuducnostVoliDarussafaka.png', 7, 'aktivan', 'FRIDAY AGAINST DARUSSAFAKE', '<p>The future of VOLI plays against Darussafaka\\\'s second quarter-final match of Eurocup.&nbsp;<br><br>On Friday, March 9th, at 7 pm, our team is waiting for the Darussafaka team in the second quarter-final match of Eurocup.&nbsp;<br><br><br><br>For the quarter-finals, we prepared a gift for the most faithful fans. At the half-time of the match, our basketball players will select the best selfi, made during the first two quarters in SC MoraÄa.&nbsp;<br><br>How to get a gift?&nbsp;<br><br>- Publish selfi on Instagram, painted during the first two quarters in SC MoraÄa,&nbsp;<br><br>- Close and tag the official Instagram accounts @ctelekom and @buds,&nbsp;<br><br>- Set up # 1Club1Network.&nbsp;<br><br>The best eagles cheerleader, chosen from our basketball players, will receive Urbeats by Dr Dre at half-time, which we have prepared in cooperation with Crnogorski Telekom.&nbsp;<br><br><br><br>The tickets for the match will be sold at the SC MoraÄa ticket office, on Thursdays from 10 am to 5 pm, as well as on the day of the match, from 10 am to the beginning of the match. The price of the ticket is 5 euros.&nbsp;<br><br><br><br>We support our club in the quarterfinals!</p>'),
(29, 'KRAJ USPJEÅ NE EVROPSKE AVANTURE', '<p><i>U drugom meÄu Äetvrtfinala Evrokupa BuduÄ‡nost Voli - DaruÅ¡afaka 71:78</i></p><p>U atmosferi nalik onoj na argentinskim fudbalskim terenima BuduÄ‡nost&nbsp; Voli je porazom od DaruÅ¡afake zakljuÄila ovogodiÅ¡nju uspjeÅ¡nu evropsku avanturu. Gosti su kontrolisali deÅ¡avanja na parketu tokom svih 40 minuta, naÅ¡ tim pokuÅ¡ao, ali nije imao dovoljno snage da slavi i seriju vrati u Istanbul.</p><p>NaÅ¡ tim je dobro otvorio meÄ, raspoloÅ¾en je bio Kajl Gibson,ali su gosti imali spreman odgovor za sve. Skoti Vilbekin se brzo razigrao pa su gosti na kraju prve dionice imali +9 (10:19), da bi prije odlaska na odmor prednost bila joÅ¡ veÄ‡a 26:39.&nbsp;</p><p>Plavi su nakon izlaska iz svlaÄionice pokazali reakciju, ali je previÅ¡e promaÅ¡enih slobodnih bacanja uz Äinjenicu da nikako nijesu uspjevali da se spuste na -10 poena razlike, uticalo na to da se u posljednju dionicu uÄ‘e sa istim zaostatkom kao na poluvremenu.</p><p>Individualna klasa Vilbekina dovela je DaruÅ¡afaku na +18 na startu posljednje dionice i tu je veÄ‡ bilo jasno da se uspjeÅ¡na epizoda BuduÄ‡nosti zavrÅ¡ava. Iako su plavi imali joÅ¡ jedan trzaj u posljednjem minutu, ali...</p><p>Najefikasniji u redovima naÅ¡eg tima bili su Gibson sa 19 i IvanoviÄ‡ sa 16, dok se kod gostiju izdvojio sjajni Vilbekin sa 22 poena.</p><p>Kompletnu statistiku utakmice moÅ¾ete pogledati <a href=\\\"\\\\&quot;www.test.com\\\\&quot;\\\">ovdje</a></p>', '2019-01-01', '1548713653KKB00004.jpg', 7, 'aktivan', 'THE END OF SUCCESSFUL EUROPEAN ADVANTAGES', '<p>In the second match of the quarterfinals of Evrokupa BuduÄ‡nost Voli - DaruÅ¡afak 71:78&nbsp;<br><br>In an atmosphere similar to that of Argentinean soccer fields, the Future of Voli ended this year\\\'s successful European adventure with the defeat of Darussafaka. The guests controlled the events on the parquet for 40 minutes, our team tried, but did not have enough strength to celebrate and return the series to Istanbul.&nbsp;<br><br>Our team opened the match well, Kyle Gibson was in the mood, but the guests had a ready answer for everyone. Skoti Vilbekin was quick to play, so the guests at the end of the first stack had a +9 (10:19), so the advantage was 26:39 before the break.&nbsp;<br><br>After the exit from the locker room, the blue showed a reaction, but the missed free throws were too many, with the fact that they did not manage to drop to -10 points difference, influenced by the fact that they entered the last part with the same back-slip as at half-time.&nbsp;<br><br>The individual Vilbukina class brought Darushafak to +18 at the start of the last stack and it was already clear that a successful episode of the future ends. Although the blue had another twist in the last minute, but ...&nbsp;<br><br>The most efficient in the ranks of our team were Gibson with 19 and Ivanovic with 16, while the guests were distinguished by the great Vilbekin with 22 points.&nbsp;<br><br>Complete statistics of the game can be viewed here</p>'),
(30, 'JOÅ  JEDAN VELIKI TRIJUMF - OSVOJEN I ZAGREB', '<p><i>U drugom kolu Top 16 faze Cedevita - BuduÄ‡nost Voli 75:78</i></p><p>Nakon Crvene zvezde u ABA ligi, pao je joÅ¡ jedan veliki rival, sada na evropskom parketu - BuduÄ‡nost Voli je odigrala joÅ¡ jedan herojski meÄ i slavila u Zagrebu nakon trijumfa nad Cedevitom 78:75. U treÄ‡oj rundi Top 16 faze Evrokupa, plavi su zahvaljujuÄ‡i perfektnoj igri u treÄ‡oj dionici prije svega, upisali prvi trijumf&nbsp;u drugoj fazi.&nbsp;</p><p>Cedevita je od starta meÄa nametnula svoj ritam,&nbsp;otvorila meÄ sa 8:0 i tu prednost uz blage oscilacije odrÅ¾avala do poluvremena. A onda nakon odmora, kao da je na parket izaÅ¡ao drugi tim BuduÄ‡nosti. Odbrana je zategnuta, napad proradio i prednost domaÄ‡ina brzo je poÄela da se topi. Plavi su izgledali moÄ‡no, Cedevita nije mogla da zaustavi GordiÄ‡a, Gibsona i druÅ¾inu. I za deset minuta sa -9, tim Aleksandra DÅ¾ikiÄ‡a stigao je do +7.&nbsp;</p><p>Trebalo je meÄ‘utim samo zavrÅ¡iti posao i plavi su naravno uspjeli u tome -&nbsp;jaÄi nervi u uzbudljivoj zavrÅ¡nici presudila je skupocjenom zagrebaÄkom timu.&nbsp;</p><p>Najefikasniji u redovima naÅ¡eg tima bili su Nemanja GorDIÄ‡ sa 18, po 16 su postigli Kajl Gibson i Sead Å ehoviÄ‡. Kod domaÄ‡ina se istakao tandem Nikols-StiopanoviÄ‡ sa po 13 poena.&nbsp;</p><p>Kompletnu statistiku utakmice moÅ¾ete pogledati <a href=\\\"\\\\&quot;http://www.eurocupbasketball.com/eurocup/games/results/showgame?gamecode=133&amp;seasoncode=U2017\\\\&quot;\\\"><strong>OVDJE</strong></a>.&nbsp;</p><p>BuduÄ‡nost u 3. kolu, naredne srijede, doÄekuje ekipu italijanskog Trenta. Prije toga plavi imaju teÅ¡ko gostovanje Mega Bemaksu u subotu, u okviru 16. kola ABA lige.&nbsp;</p><p>Naprijed plavi!</p>', '2018-07-17', '1548713718cedevitabbudu.jpg', 7, 'aktivan', 'ARE ONE GREAT TRIUMPH - WONDERFUL AND ZAGREB', '<p>In the second round of the Top 16 stage Cedevita - Buducnost Voli 75:78&nbsp;<br><br>After the Red Star in the ABA league, another big rival fell, now on the European parquet - The future of Voli played another hero\\\'s sword and celebrated in Zagreb after a triumph over Cedevita 78:75. In the third round of the Top 16 Stage of the Eurocup, they were blue, thanks to the perfect game in the third stretch first of all, they entered the first triumph in the second stage.&nbsp;<br><br>Since the start of the match, Cedevita has imposed its rhythm, opened the match with 8: 0 and maintained this advantage with a slight oscillation until the half. And then after the break, as if the second team of the Future came out on the parquet floor. The defense was tightened, the attack was over, and the advantage of the host quickly began to melt. The blue looked powerful, Cedevita could not stop Gordic, Gibson and the family. And in ten minutes with -9, Aleksandar Dzikic\\\'s team reached +7.&nbsp;<br><br>However, they only had to finish the job and the blue of course had succeeded in this - a stronger nerve in an exciting finish was decided by the expensive Zagreb team.&nbsp;<br><br>The most efficient in the ranks of our team were Nemanja Gordic with 18, 16 by Kyle Gibson and Sead Sheehovic. Tandem Nikols-Stiopanovic showed 13 points for the host.&nbsp;<br><br>Complete statistics of the game can be found HERE.&nbsp;<br><br>The future in the 3rd round, next Wednesday, is welcomed by the Italian Trent team. Prior to this, the Blue have a hard time hosting Mega Bemax on Saturday, within the 16th round of the ABA League.&nbsp;<br><br>Go ahead!</p>'),
(31, 'PLAVI DOÄŒEKUJU TRENTO', '<p><i>Zajedno do Äetvrtfinala!</i></p><p>U srijedu, 17. januara,&nbsp;od&nbsp;19:30&nbsp;Äasova, KK BuduÄ‡nost VOLI igra protiv ekipe Dolomiti Energia Trento utakmicu 3. kola Top 16 faze Eurokupa.</p><p><br>Karte Ä‡e se prodavati na biletarnici SC MoraÄa, 15. i 16. janurara od 10 do 17 Äasova, kao i na dan utakmice od 10&nbsp;Äasova</p><p><br>Cijena karte je samo 2 eura.</p><p>DoÄ‘i i podrÅ¾i svoj klub u joÅ¡ jednom vaÅ¾nom meÄu! BuduÄ‡nost se VOLI!</p>', '2019-01-06', '1548713774KKB00004.jpg', 7, 'aktivan', 'BLUE DOES EVEN TRENTO', '<p>Together to the quarterfinals!&nbsp;<br><br>On Wednesday, January 17, at 7:30 pm, KK Buducnost VOLI plays against the Dolomiti Energia Trento team in the third round of the Top 16 stages of Eurocup.&nbsp;<br><br>The tickets will be sold at the SC MoraÄa ticket office, on the 15th and 16th of January from 10 am to 5 pm, as well as on the day of the match of 10 hours&nbsp;<br><br>The price of the ticket is only 2 euros.&nbsp;<br><br>Come and support your club in another important match! FUTURE LOVES!</p>'),
(32, 'SEZONA ZAVRÅ ENA PORAZOM, PLAVI PREDALI KRUNU', '<p><i>U Äetvrtom meÄu finalne serije Mornar - BuduÄ‡nost Voli 75:63 za 3:1 u pobjedama</i></p><p>BuduÄ‡nost je porazom stavila taÄku na sezonu u kojoj je osvojena ABA liga, plavi su porazom u Äetvrtom melu finalne serije plej-ofa Erste Superlige predali krunu crnogorskog prvaka Mornaru. U punoj dvorani Topolica u Baru, domaÄ‡in je slavio 75:63.</p><p>NaÅ¡ tim je dobro otvorio meÄ , imao +7 veÄ‡ na startu meÄa (12:5), ali je domaÄ‡in brzo odgovorio i na poluvrijeme otiÅ¡ao sa +10 (39:29).&nbsp;</p><p>Izabranici Aleksandra DÅ¾ikiÄ‡a pokazali su reakciju na startu treÄ‡e dionice, poenima Danila NikoliÄ‡a priÅ¡li rivalu na -3 (41:38), ali&nbsp;bilo je to sve. Mornar je zaigrao mnogo bolje, plavi nisu blistali, pa je prednost na Äetiri minuta prije kraja dostigla rekordnih +20 (75:55). Bilo je jasno da vremena za povratak viÅ¡e nema, iako su naÅ¡i momci sve pokuÅ¡ali...</p><p>Najefikasniji u redovima naÅ¡eg tima bili su IvanoviÄ‡ sa 16, Gibson je postigao 14 , dok se kod domaÄ‡ina istakao&nbsp;Strahinja MiÄ‡oviÄ‡ sa 18.&nbsp;</p>', '2019-01-14', '1548713985glibson.jpg', 6, 'aktivan', 'SEASON COMPLETED BY PEACE, BLUE SUFFERING DEF', '<p>In the fourth match of the final series Mornar - Buducnost Voli 75:63 for 3: 1 in victories&nbsp;<br><br>The future put the spot in the season in which the ABA league was won, and they defeated the crowning champion of the Montenegrin champion Mornar in the fourth round of the final series of the Erste Superliga play-off. In the full hall of Topolica in Bar, the host celebrated 75:63.&nbsp;<br><br>Our team opened the match well, had a +7 at the start of the match (12: 5), but the host responded quickly and left for the half with +10 (39:29).&nbsp;<br><br>The selectors of Aleksandar Dzikic showed a reaction at the start of the third stack, with Danilo Nikolic coming to the rivals at -3 (41:38), but that was all. The sailor played much better, the blue did not shine, so the advantage at four minutes before the end reached a record +20 (75:55). It was clear that there was no time to return again, even though our guys tried everything ...&nbsp;<br><br>Ivanovic was the most effective team in the team with 16, Gibson scored 14, while Strahinja MiÄ‡oviÄ‡ was 18.</p>'),
(33, 'PORAZ NA STARTU FINALNE SERIJE', '<p><i>U prvoj utakmici finalne serije plej-ofa BuduÄ‡nost Voli - Mornar 77:84</i></p><p>BuduÄ‡nost je poraÅ¾ena u prvom meÄu finalne serije plej-ofa za prvaka Crne Gore. Plavi su u uzbudljivom meÄu drugi put ove sezone na domaÄ‡em parketu poklekli nakon duela sa Mornarom.</p><p>Mornar je mnogo bolje otvorio meÄ, veÄ‡ krajem prve dionice imao +14 (27:13) zahvaljujuÄ‡i Strahinji MiÄ‡oviÄ‡u. Plavi su bili primorani da jure prednost rivala, ali je u prvom dijelu malo toga polazilo za rukom kapitenu Å ehoviÄ‡u i druÅ¾ini.&nbsp;</p><p>NaÅ¡ tim je u drugom dijelu na krilima raspoloÅ¾enog Nemanje GordiÄ‡a uhvatio prikljuÄak, bio blizu preokreta, ali su u trenucima kada se meÄ lomio Barani imali Dereka Nidama.&nbsp;</p><p>Najefikasniji u redovima naÅ¡eg tima bili su GordiÄ‡ sa 20 i BaroviÄ‡ sa 16 poena, dok je kod gostiju blistao Nidam sa 34 poena, MiÄ‡oviÄ‡ je dodao 22.</p><p>Naredni meÄ na programu je u subotu, takoÄ‘e u MoraÄi.</p>', '2019-01-07', '1548714025clanak-06-01-2019-5c3254729ec55.jpg', 6, 'aktivan', 'END OF THE FINAL SERIES', '<p>In the first game of the final series of the playoffs, Buducnost Voli - Mornar 77:84&nbsp;<br><br>The future was defeated in the first match of the final series of the playoffs for the champions of Montenegro. Blue in a thrilling match second time this season on home court floor kneel after a duo with Mornar.&nbsp;<br><br>The sailor opened the match much better, but at the end of the first leg he had a +14 (27:13) thanks to Strahinja Micovic. The blue were forced to drive ahead of the rivals, but in the first part little did it go hand in hand to captain Å ehoviÄ‡ and his family.&nbsp;<br><br>Our team in the second part on the wings of the friendly Nemanja Gordic caught the connection, was close to the turn, but in the moments when Barani broke Barani had Derek Nidam.&nbsp;<br><br>The most efficient in the ranks of our team were Gordic with 20 and BaroviÄ‡ with 16 points, while Nidam shone with 34 points, MiÄ‡oviÄ‡ added 22.&nbsp;<br><br>The next match on the program is on Saturday, also in Moraca.</p>'),
(34, 'Å AMPIONI PRESKOÄŒILI LOVÄ†EN', '<p><i>U drugom meÄu polufinalne serije LovÄ‡en - BuduÄ‡nost Voli 75:78</i></p><p>BuduÄ‡nost Voli je u novom finalu domaÄ‡eg&nbsp; Å¡ampionata - plavi su do borbi za novu titulu doÅ¡li nakon nove pobjede nad LovÄ‡enom. U drugom meÄu polufinalne serije naÅ¡ tim je slavio na Cetinju 78:75 za 2:0 u ukupnom skoru i plasman u finale.</p><p>Izabranici Aleksandra DÅ¾ikiÄ‡a su tokom cijelog meÄa imali problema sa motivisanim domaÄ‡inom, malo toga je plavima polazilo za rukom, ali je cilj ostvaren,a odlika velikih ekipa je da dobijaju i kada ne blistaju.</p><p>DomaÄ‡in je u uzbudljivom finiÅ¡u imao Å¡ut za produÅ¾etak,ali je pokuÅ¡aj KoraÄ‡a sa centra nakon promaÅ¡enog slobodnog Gibsona zavrÅ¡io na obruÄu.&nbsp;</p>', '2019-01-06', '1548714101FB_IMG_1526926013296.jpg', 6, 'aktivan', 'CHAMPION SKIPPED LOVCEN', '<p>In the second match of the semi-final series LovÄ‡en - BuduÄ‡nost Voli 75:78&nbsp;<br><br>The future of Voli is in the new final of the domestic championship - they are blue until the battle for a new title came after a new win over Lovcen. In the second match of the semi-final series, our team celebrated on Cetinje 78:75 for 2: 0 in the overall scoring and finals.&nbsp;<br><br>Aleksandra DÅ¾ikiÄ‡s electors had problems with the motivated host during the entire match, few of them went hand in hand, but the goal was achieved, and the big teams characteristic is to win and not glitter.&nbsp;<br><br>The host in the thrilling finish had a shot for an extension, but Koracs attempt at the center after the missed free Gibson ended in a rally.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aba`
--
ALTER TABLE `aba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aba_klub_idx` (`klub_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategorijafoto_idx` (`kategorija_id`),
  ADD KEY `fk_sezonafoto_idx` (`sezona_id`);

--
-- Indexes for table `baneri`
--
ALTER TABLE `baneri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cg`
--
ALTER TABLE `cg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cg_klub_idx` (`klub_id`);

--
-- Indexes for table `eurocup`
--
ALTER TABLE `eurocup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eurocup_klub_idx` (`klub_id`);

--
-- Indexes for table `euroleague`
--
ALTER TABLE `euroleague`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tim_idx` (`klub_id`);

--
-- Indexes for table `fotografije`
--
ALTER TABLE `fotografije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_album_idx` (`album_id`);

--
-- Indexes for table `juniori`
--
ALTER TABLE `juniori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kadeti`
--
ALTER TABLE `kadeti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kalendar`
--
ALTER TABLE `kalendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_liga_id_idx` (`liga_id`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liga_tim`
--
ALTER TABLE `liga_tim`
  ADD KEY `fk_liga_idx` (`liga_id`),
  ADD KEY `fk_tim_idx` (`tim_id`);

--
-- Indexes for table `lige`
--
ALTER TABLE `lige`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediji`
--
ALTER TABLE `mediji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menadzment`
--
ALTER TABLE `menadzment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mladje_selekcije`
--
ALTER TABLE `mladje_selekcije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeed_emails`
--
ALTER TABLE `newsfeed_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osoblje`
--
ALTER TABLE `osoblje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pioniri`
--
ALTER TABLE `pioniri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prvi_tim`
--
ALTER TABLE `prvi_tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ligaID_idx` (`liga_id`);

--
-- Indexes for table `sezona_kategorija`
--
ALTER TABLE `sezona_kategorija`
  ADD KEY `fk_sezonaId_idx` (`sezona_id`),
  ADD KEY `fk_kategorijaId_idx` (`kategorija_id`);

--
-- Indexes for table `sezone`
--
ALTER TABLE `sezone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponzori`
--
ALTER TABLE `sponzori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strucni_stab`
--
ALTER TABLE `strucni_stab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagovi`
--
ALTER TABLE `tagovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_vijest`
--
ALTER TABLE `tag_vijest`
  ADD KEY `fk_tag_idx` (`tag_id`),
  ADD KEY `fk_vijest_idx` (`vijest_id`);

--
-- Indexes for table `timovi`
--
ALTER TABLE `timovi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SECONDARY` (`naziv`);

--
-- Indexes for table `trofeji`
--
ALTER TABLE `trofeji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upravni_odbor`
--
ALTER TABLE `upravni_odbor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategorija_id_idx` (`kategorija_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aba`
--
ALTER TABLE `aba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `baneri`
--
ALTER TABLE `baneri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cg`
--
ALTER TABLE `cg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eurocup`
--
ALTER TABLE `eurocup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `euroleague`
--
ALTER TABLE `euroleague`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fotografije`
--
ALTER TABLE `fotografije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `juniori`
--
ALTER TABLE `juniori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kadeti`
--
ALTER TABLE `kadeti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kalendar`
--
ALTER TABLE `kalendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lige`
--
ALTER TABLE `lige`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mediji`
--
ALTER TABLE `mediji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menadzment`
--
ALTER TABLE `menadzment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mladje_selekcije`
--
ALTER TABLE `mladje_selekcije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsfeed_emails`
--
ALTER TABLE `newsfeed_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `osoblje`
--
ALTER TABLE `osoblje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pioniri`
--
ALTER TABLE `pioniri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prvi_tim`
--
ALTER TABLE `prvi_tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rezultati`
--
ALTER TABLE `rezultati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sezone`
--
ALTER TABLE `sezone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sponzori`
--
ALTER TABLE `sponzori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `strucni_stab`
--
ALTER TABLE `strucni_stab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tagovi`
--
ALTER TABLE `tagovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `timovi`
--
ALTER TABLE `timovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `trofeji`
--
ALTER TABLE `trofeji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `upravni_odbor`
--
ALTER TABLE `upravni_odbor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aba`
--
ALTER TABLE `aba`
  ADD CONSTRAINT `fk_aba_klub` FOREIGN KEY (`klub_id`) REFERENCES `timovi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_kategorijafoto` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sezonafoto` FOREIGN KEY (`sezona_id`) REFERENCES `sezone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cg`
--
ALTER TABLE `cg`
  ADD CONSTRAINT `fk_cg_klub` FOREIGN KEY (`klub_id`) REFERENCES `prvi_tim` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eurocup`
--
ALTER TABLE `eurocup`
  ADD CONSTRAINT `fk_eurocup_klub` FOREIGN KEY (`klub_id`) REFERENCES `timovi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `euroleague`
--
ALTER TABLE `euroleague`
  ADD CONSTRAINT `fk_klub` FOREIGN KEY (`klub_id`) REFERENCES `timovi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fotografije`
--
ALTER TABLE `fotografije`
  ADD CONSTRAINT `fk_album` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kalendar`
--
ALTER TABLE `kalendar`
  ADD CONSTRAINT `fk_liga_id` FOREIGN KEY (`liga_id`) REFERENCES `lige` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liga_tim`
--
ALTER TABLE `liga_tim`
  ADD CONSTRAINT `fk_liga` FOREIGN KEY (`liga_id`) REFERENCES `lige` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tim` FOREIGN KEY (`tim_id`) REFERENCES `timovi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD CONSTRAINT `fk_ligaID` FOREIGN KEY (`liga_id`) REFERENCES `lige` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sezona_kategorija`
--
ALTER TABLE `sezona_kategorija`
  ADD CONSTRAINT `fk_kategorijaId` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sezonaId` FOREIGN KEY (`sezona_id`) REFERENCES `sezone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_vijest`
--
ALTER TABLE `tag_vijest`
  ADD CONSTRAINT `fk_tag` FOREIGN KEY (`tag_id`) REFERENCES `tagovi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vijest` FOREIGN KEY (`vijest_id`) REFERENCES `vijesti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD CONSTRAINT `fk_kategorija_id` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
