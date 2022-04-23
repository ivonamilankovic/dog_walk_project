-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 12:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dog_walk`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(10) UNSIGNED NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `street`, `city`, `postal_code`) VALUES
(39, 'ulica vts', 'subotica', 24000),
(58, 'Ulica kesten 2', 'Novi sad', 400423),
(59, 'Prizrenska 98', 'Beograd', 111115),
(60, 'Zagrebacka 15', 'Subotica', 240015),
(61, 'Rajhla Ferenca 5', 'Subotica', 24001),
(62, 'Orlovska ulica 55', 'Novi sad', 400652);

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `breed_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`id`, `breed_name`) VALUES
(7, 'Affenpinscher - Majmunski Pinč'),
(8, 'Africanis - Afrički Pas'),
(9, 'Afghan Hound - Afganistanski Hrt'),
(10, 'Aidi - Atlas Mountain Dog - Atlaski Planinski Pas'),
(11, 'Ainu-Dog (Ainu Hund, Ainu Ken) - Japanski Špic'),
(12, 'Airedale-Terrier - Erdel Terijer'),
(13, 'Akbash'),
(14, 'Akita Inu'),
(15, 'Alapaha Blue Blood Bulldog'),
(16, 'Alangu Mastiff'),
(17, 'Alano Espanol - Španjolski Mastif'),
(18, 'Alaskan Malamute - Aljaški Malamut'),
(19, 'Alpine Dachsbracke - Alpski Brak Jazavčar'),
(20, 'American Akita - Američka Akita'),
(21, 'American Bulldog - Američki Bulldog'),
(22, 'American Foxhound - Američki Lisičar'),
(23, 'American Hairless Terrier - Američki Bezdlaki Terijer'),
(24, 'American Staghound - Američki Jelenski Hrt'),
(25, 'American Toy Terrier - Američki Patuljasti Terijer'),
(26, 'American Water Spaniel - Američki Vodeni Španijel'),
(27, 'American Cocker Spaniel - Američki Koker Španijel'),
(28, 'American Pit Bull Terrier - Američki Pitbull Terijer'),
(29, 'American Staffordshire Terrier - Američki Stafordski Terijer'),
(30, 'Anatolian Shepherd Dog - Anatolski Pastirski Pas'),
(31, 'Appenzeller Sennenhund -Appenzell Cattle Dog - Apencelski Pastirski Pas'),
(32, 'Ariege Pointing Dog - Ariješki Ptičar'),
(33, 'Australian Cattle Dog - Australski Govedarski Pas'),
(34, 'Australian Kelpie - Australski Čuvar Stada'),
(35, 'Australian Shepherd - Australski Ovčar'),
(36, 'Australian Silky Terrier - Australski Svilenkasti Terijer'),
(37, 'Australian Terrier - Australski Terijer'),
(38, 'Austrian Pinscher - Austrijski Pinč'),
(39, 'Auvergne Pointing Dog - Overnejski Ptičar'),
(40, 'Azawakh'),
(41, 'Barbet - French Water Dog - Francuski Vodeni Pas'),
(42, 'Basenji'),
(43, 'Basset Artesien Normand - Norman Artesian Basset'),
(44, 'Basset Bleu De Gascogne - Blue Gascony Basset - Basset Bleu'),
(45, 'Basset Fauve De Bretagne - Fawn Brittany Basset Dog'),
(46, 'Basset Hound'),
(47, 'Bayerischer Gebirgsschweisshund - Bavarian Mountain Scent Hound - Bavarski Planinski Krvosljednik'),
(48, 'Beagle - Bigl'),
(49, 'Beagle Harrier - Bigl Zečar'),
(50, 'Bearded Collie - Bradati Škotski Ovčar'),
(51, 'Bedlington Terrier - Bedlingtonski Terijer'),
(52, 'Berger Blanc Suisse - White Swiss Shepherd Dog - Švicarski ovčar'),
(53, 'Berger De Beauce - Boseški Ovčar'),
(54, 'Berger De Brie - Briard - Briješki Ovčar'),
(55, 'Berger Picard - Picardy Sheepdog'),
(56, 'Berner Sennenhund - Bernese Mountain Dog - Bernski Planinski Pas'),
(57, 'Bichon A Poil Frise - Bichon Frise - Kovrčavi Bišon'),
(58, 'Bichon Havanais - Havanese - Havanski Bišon'),
(59, 'Billy'),
(60, 'Black And Tan Coonhound'),
(61, 'Bolognese - Bolonjski Pas'),
(62, 'Border Collie - Border Koli'),
(63, 'Border Terrier - Granični Terijer'),
(64, 'Bosnian Broken-Haired Hound - Bosanski Oštrodlaki Gonič-Barak'),
(65, 'Boston Terrier - Bostonski Terijer'),
(66, 'Bouledogue Français - French Bulldog - Francuski Buldog'),
(67, 'Bouvier Des Ardennes - Ardenski Govedar'),
(68, 'Bouvier Des Flandres/Vlaamse Koehond - Flandrijski Stočarski Pas'),
(69, 'Bracco Italiano - Italian Pointing Dog - Talijanski Ptičar'),
(70, 'Brandlbracke (Vieräugl) - Austrian Black And Tan Hound - Austrijski Ravnodlaki Gonič'),
(71, 'Braque D’auvergne - Auvergne Pointer - Auvergne Pointer'),
(72, 'Braque De L’ariege - Ariege Pointing Dog - Ariješki Ptičar'),
(73, 'Braque Du Bourbonnais - Bourbonnais Pointing Dog - Burbonski Ptičar'),
(74, 'Braque Français - French Pointing Dog Type Gascogne - Gaskonjski Francuski Ptičar'),
(75, 'Braque Français - French Pointing Dog Type Pyrenees - Pirinejski Francuski Ptičar'),
(76, 'Braque Saint-Germain - St. Germain Pointing Dog'),
(77, 'Briquet Griffon Vendeen - Veliki Vendski Grifon'),
(78, 'Broholmer - Danska Doga'),
(79, 'Bull Terrier - Bull Terijer'),
(80, 'Bulldog - Buldog Pas'),
(81, 'Bullmastiff'),
(82, 'Ca De Bestiar - Majorca Shepherd Dog - Majorški Ovčar'),
(83, 'Cairn Terrier - Kernski Terijer'),
(84, 'Canaan Dog - Izraelski Ovčar'),
(85, 'Canadian Eskimo Dog'),
(86, 'Cane Corso Italiano - Italian Cane Corso - Cane Corso Pas'),
(87, 'Cane Da Pastore Bergamasco - Bergamasco Shepherd Dog - Bergamski Ovčar'),
(88, 'Cane Da Pastore Maremmano-Abruzzese - Maremma And The Abruzzes Sheepdog - Maremanski Pastirski Pas'),
(89, 'Caniche - Poodle - Pudl Pas'),
(90, 'Cão Da Serra Da Estrela - Estrela Mountain Dog - Estrelski Planinski Pas'),
(91, 'Cão Da Serra De Aires - Portuguese Sheepdog - Aireski Ovčar'),
(92, 'Cão De Agua Português - Portuguese Water Dog - Portugalski Vodeni Pas'),
(93, 'Cão De Castro Laboreiro - Castro Laboreiro Dog - Pastirski Pas Iz Loboreira'),
(94, 'Cão Fila De São Miguel - Saint Miguel Cattle Dog - Pas Svetog Miguela'),
(95, 'Cavalier King Charles Spaniel - Cavalier King Charles Španijel'),
(96, 'Ceskoslovenský Vlciak - Czechoslovakian Wolfdog - Čehoslovački Vučji Pas'),
(97, 'Ceský Fousek - Bohemian Wire-Haired Pointing Griffon - Češki Fousek'),
(98, 'Ceský Terier - Cesky Terrier - Češki Terijer'),
(99, 'Chart Polski - Polish Greyhound - Poljski Hrt'),
(100, 'Chesapeake Bay Retriever - Chesapeake Bay Retriever'),
(101, 'Chien D’artois - Artois Hound - Artuaški Gonič'),
(102, 'Chien De Berger Belge - Belgian Shepherd Dog - Belgijski Ovčar'),
(103, 'Chien De Berger Des Pyrenees A Face Rase - Pyrenean Sheepdog (Smooth Faced) - Pyrenean Shepherd'),
(104, 'Chien De Berger Des Pyrenees A Poil Long - Long-Haired Pyrenean Sheepdog'),
(105, 'Chien De Montagne Des Pyrenees - Pyrenean Mountain Dog ili Great Pyrenees - Pirinejski Planinski Pas'),
(106, 'Chien De Saint Hubert - Bloodhound - Krvosljednik'),
(107, 'Chihuahueño - Chihuahua - Čivava'),
(108, 'Chin - Japanese Chin - Japanski Španijel'),
(109, 'Chinese Crested Dog - Kineski Kukmasti Pas'),
(110, 'Chow Chow - Čau Čau'),
(111, 'Cimarrón Uruguayo - Urugvajski Kimaron'),
(112, 'Ciobanesc Românesc Carpatin - Carpathian Shepherd Dog'),
(113, 'Ciobanesc Românesc De Bucovina - Romanian Bucovina Shepherd'),
(114, 'Ciobanesc Românesc Mioritic - Romanian Mioritic Shepherd Dog'),
(115, 'Cirneco Dell’etna - Sicilijanski Hrt'),
(116, 'Clumber Spaniel - Clumber Španijel'),
(117, 'Collie Rough - Dugodlaki Škotski Ovčar'),
(118, 'Collie Smooth - Kratkodlaki Škotski Ovčar'),
(119, 'Coton De Tulear - Tulearski Pas'),
(120, 'Crnogorski Planinski Gonic - Montenegrin Mountain Hound - Crnogorski Planinski Gonič'),
(121, 'Curly Coated Retriever'),
(122, 'Dachshund - Jazavčar'),
(123, 'Dalmatian - Dalmatinski Pas'),
(124, 'Dandie Dinmont Terrier - Dendi Dinmont Terijer'),
(125, 'Dansk-Svensk Gårdshund - Danish–Swedish Farmdog - Danski/Švedski Farmerski Pas'),
(126, 'Deerhound - Škotski Jelenski Hrt'),
(127, 'Deutsch Drahthaar - German Wirehaired Pointing Dog - Njemački Oštrodlaki Ptičar'),
(128, 'Deutsch Kurzhaar - German Shorthaired Pointing Dog - Njemački Kratkodlaki Ptičar'),
(129, 'Deutsch Langhaar - Njemački Dugodlaki Ptičar'),
(130, 'Deutsch Stichelhaar - Njemački Igličasti Ptičar'),
(131, 'Deutsche Bracke - German Hound - Njemački Gonič'),
(132, 'Deutsche Dogge - Great Dane - Njemačka Doga'),
(133, 'Deutscher Boxer - Boxer - Njemački Bokser'),
(134, 'Deutscher Jagdterrier - German Hunting Terrier - Njemački Lovni Terijer'),
(135, 'Deutscher Pinscher - Njemački Pinč'),
(136, 'Deutscher Schäferhund - German Shepherd Dog - Njemački Ovčar'),
(137, 'Deutscher Spitz - German Spitz - Njemački Špic'),
(138, 'Deutscher Wachtelhund - German Spaniel - Njemački Prepeličar'),
(139, 'Dobermann - Doberman'),
(140, 'Dogo Argentino - Dogo Argentino/Argentinska Doga/Argentinski Mastiff'),
(141, 'Dogue De Bordeaux - Bordoška Doga'),
(142, 'Do-Khyi - Tibetan Mastiff - Tibetski Mastif'),
(143, 'Drentsche Patrijshond - Drentsche Partridge Dog'),
(144, 'Drever'),
(145, 'Drötzörü Magyar Vizsla - Hungarian Wire-Haired Pointer - Mađarska Vižla S Oštrim Dlakama'),
(146, 'Dunker - Norwegian Hound'),
(147, 'English Cocker Spaniel - Engleski Koker Španijel'),
(148, 'English Foxhound - Engleski Lisičar'),
(149, 'English Pointer - Engleski Pointer'),
(150, 'English Setter'),
(151, 'English Springer Spaniel - Engleski Springer Spaniel'),
(152, 'English Toy Terrier - Engleski Patuljasti Terijer'),
(153, 'Entlebucher Sennenhund - Entlebuch Cattle Dog - Entlebuški Planinski Pas'),
(154, 'Epagneul Bleu De Picardie - Blue Picardy Spaniel - Plavi Pikardijski Španijel'),
(155, 'Epagneul Breton - Brittany Spaniel'),
(156, 'Epagneul De Pont-Audemer - Pont-Audemer Spaniel'),
(157, 'Epagneul Français - French Spaniel - Francuski Španijel'),
(158, 'Epagneul Nain Continental - Continental Toy Spaniel - Patuljasti Kontinental Španiel'),
(159, 'Epagneul Picard - Picardy Spaniel - Pikardijski Španijel'),
(160, 'Erdélyi Kopó - Hungarian Hound - Transylvanian Scent Hound - Erdeljski Gonič'),
(161, 'Eurasier - Eurasian - Euroazijac'),
(162, 'Field Spaniel - Poljski Španijel'),
(163, 'Fila Brasileiro - Brazilski Mastif'),
(164, 'Flat Coated Retriever - Ravnodlaki Retriver'),
(165, 'Fox Terrier (Smooth) - Kratkodlaki Foksterijer'),
(166, 'Fox Terrier (Wire) - Oštrodlaki Foksterijer'),
(167, 'Français Blanc Et Noir - French White & Black Hound - Francuski Bijelo-Crni Gonič'),
(168, 'Français Blanc Et Orange - French White And Orange Hound - Francuski Bijelo-Narančasti Gonič'),
(169, 'Français Tricolore - French Tricolour Hound - Francuski Trobojni Gonič'),
(170, 'Galgo Español - Spanish Greyhound - Španjolski Hrt'),
(171, 'Gammel Dansk Hønsehund - Old Danish Pointing Dog - Stari Danski Ovčar'),
(172, 'Gascon Saintongeois - Gaskonjsko-Sentonžoaski Gonič'),
(173, 'Golden Retriever - Zlatni Retriver'),
(174, 'Gonczy Polski - Polish Hunting Dog'),
(175, 'Gordon Setter - Škotski Seter'),
(176, 'Gos D’atura Catalá - Catalan Sheepdog - Katalonski Ovčar'),
(177, 'Grand Anglo-Français Blanc Et Noir - Great Anglo-French White And Black Hound'),
(178, 'Grand Anglo-Français Blanc Et Orange - Great Anglo-French White & Orange Hound'),
(179, 'Grand Anglo-Français Tricolore - Great Anglo-French Tricolour Hound'),
(180, 'Grand Basset Griffon Vendeen - Veliki Vendski Grifon Baset'),
(181, 'Grand Bleu De Gascogne - Great Gascony Blue - Veliki Plavi Gaskonjski Gonič'),
(182, 'Grand Griffon Vendeen - Veliki Vendski Grifon'),
(183, 'Greyhound - Engleski Hrt'),
(184, 'Griffon A Poil Dur Korthals - Wire-Haired Pointing Griffon Korthals - Korthalsov Oštrodlaki Ptičar'),
(185, 'Griffon Belge - Belgijski Grifon'),
(186, 'Griffon Bleu De Gascogne - Blue Gascony Griffon - Plavi Oštrodlaki Gaskonjski Gonič'),
(187, 'Griffon Bruxellois - Briselski Grifon'),
(188, 'Griffon Fauve De Bretagne - Fawn Brittany Griffon - Riđi Bretonski Grifon'),
(189, 'Griffon Nivernais'),
(190, 'Grønlandshund - Greenland Dog - Grenlandski Pas'),
(191, 'Grosser Münsterländer Vorstehhund - Large Munsterlander - Veliki Minsterlander'),
(192, 'Grosser Schweizer Sennenhund - Great Swiss Mountain Dog - Veliki Švicarski Planinski Pas'),
(193, 'Haldenstøver - Halden Hound - Haldenski Gonič'),
(194, 'Hamiltonstövare - Hamiltonov Gonič'),
(195, 'Hannoverscher Schweisshund - Hanoverian Scent Hound - Hanoverski Krvosljednik'),
(196, 'Harrier - Harijer'),
(197, 'Hellinikos Ichnilatis - Hellenic Hound - Grčki Gonič'),
(198, 'Hokkaido - Hokaido'),
(199, 'Hollandse Herdershond - Dutch Shepherd Dog - Nizozemski Ovčar'),
(200, 'Hollandse Smoushond - Dutch Smoushond - Nizozemski Smoushond'),
(201, 'Hovawart'),
(202, 'Croatian Shepherd Dog - Hrvatski Ovčar'),
(203, 'Hygenhund - Hygen Hound - Hygenov Gonič'),
(204, 'Irish Glen Of Imaal Terrier - Imalski Terijer'),
(205, 'Irish Red And White Setter - Irski Crveno I Bijeli Setter'),
(206, 'Irish Red Setter - Crveni Irski Seter'),
(207, 'Irish Soft Coated Wheaten Terrier - Mekodlaki Pšenični Terijer'),
(208, 'Irish Terrier - Irski Terijer'),
(209, 'Irish Water Spaniel - Irski Vodeni Španijel'),
(210, 'Irish Wolfhound - Irski Vučji Hrt'),
(211, 'Istrian Wire-Haired Hound - Istarski Ostrodlaki Gonič'),
(212, 'Istrian Short-Haired Hound - Istarski Kratkodlaki Gonič'),
(213, 'Íslenskur Fjárhundur - Icelandic Sheepdog - Islandski Ovčar'),
(214, 'Jack Russell Terrier - Jack Russell Terijer'),
(215, 'Jämthund - Švedski Gonič'),
(216, 'Yugoslavian Shepherd Dog - Sharplanina - Jugoslovenski Ovčarski Pas-Šarplaninac'),
(217, 'Kai'),
(218, 'Kangal Çoban Köpegi - Kangal Shepherd Dog - Turski Pastirski Pas Kangal'),
(219, 'Karjalankarhukoira - Karelian Bear Dog - Karelijski Gonič Medvjeda'),
(220, 'Kavkazskaïa Ovtcharka - Caucasian Shepherd Dog - Kavkaski Ovcar'),
(221, 'Kerry Blue Terrier - Irski Plavi Terijer'),
(222, 'King Charles Spaniel - Cavalier King Charles Španijel'),
(223, 'Kishu'),
(224, 'Kleiner Münsterländer - Mali Musterlander'),
(225, 'Komondor'),
(226, 'Korea Jindo Dog - Korejski Jindo Pas'),
(227, 'Karst Shepherd Dog - Kraški Ovčar'),
(228, 'Kromfohrländer - Kromforlender'),
(229, 'Kuvasz - Mađarski Patuljasti Pas Kuvasz'),
(230, 'Labrador Retriever - Labrador Retriver'),
(231, 'Lagotto Romagnolo - Romagna Water Dog - Romanjanski Pas Za Vodu'),
(232, 'Lakeland Terrier - Lakeland Terijer'),
(233, 'Lancashire Heeler'),
(234, 'Landseer (Europäisch-Kontinentaler Typ) - Landseer (European Continental Type)'),
(235, 'Lapinporokoira - Lapponian Herder - Laponski Herder'),
(236, 'Leonberger'),
(237, 'Lhasa Apso'),
(238, 'Magyar Agar - Hungarian Greyhound - Mađarski Hrt'),
(239, 'Maltese - Maltezer'),
(240, 'Manchester Terrier - Mančester Terijer'),
(241, 'Mastiff'),
(242, 'Mastín Del Pirineo - Pyrenean Mastiff - Pirinejski Mastif'),
(243, 'Mastín Español - Spanish Mastiff - Španjolski Mastif'),
(244, 'Mastino Napoletano - Neapolitan Mastiff - Napuljski Mastif'),
(245, 'Miniature Bull Terrier - Minijaturni Bull Terijer'),
(246, 'Mudi'),
(247, 'Nederlandse Kooikerhondje - Mali Nizozemski Pas Kooikerhondje'),
(248, 'Nederlandse Schapendoes - Nizozemski Kovrčavi Ovčar'),
(249, 'Newfoundland'),
(250, 'Nihon Supittsu - Japanese Spitz - Japanski Špic'),
(251, 'Nihon Teria - Japanese Terrier - Japanski Terijer'),
(252, 'Norfolk Terrier - Norfolški Terijer'),
(253, 'Norrbottenspets - Norrbottenspitz - Sjevernošvedski Špic'),
(254, 'Norsk Buhund - Norwegian Buhund - Norveški Špic'),
(255, 'Norsk Elghund Grå - Norwegian Elkhound Grey - Sivi Norveški Elkhound'),
(256, 'Norsk Elghund Sort - Norwegian Elkhound Black - Crni Norveški Elkhound'),
(257, 'Norsk Lundehund - Norwegian Lundehund - Norveški Lovac Na Patke'),
(258, 'Norwich Terrier - Norvički Terijer'),
(259, 'Nova Scotia Duck Tolling Retriever - Nova Scotia Duck Tolling Retriver'),
(260, 'Ogar Polski - Polish Hound - Poljski Gonič'),
(261, 'Old English Sheepdog - Stari Engleski Ovčar'),
(262, 'Otterhound - Vidraš'),
(263, 'Österreichischer Pinscher - Austrian Pinscher - Austrijski Pinč'),
(264, 'Parson Russell Terrier - Parson Russell Terijer'),
(265, 'Pekingese - Pekinezer'),
(266, 'Perdigueiro Português - Portuguese Pointing Dog - Portugalski Ptičar'),
(267, 'Perdiguero De Burgos - Burgos Pointing Dog - Španjolski Pointer'),
(268, 'Perro De Agua Español - Spanish Water Dog - Španjolski Vodeni Pas'),
(269, 'Perro Dogo Mallorquín - Majorca Mastiff - Majorški Ovčar'),
(270, 'Perro Sin Pelo Del Perú - Peruvian Hairless Dog - Peruanski Bezdlaki Pas'),
(271, 'Petit Basset Griffon Vendeen - Mali Vendeski Baset Grifon'),
(272, 'Petit Bleu De Gascogne - Small Blue Gascony - Mali Plavi Gaskonjski Gonič'),
(273, 'Petit Brabançon - Mali Brabancon'),
(274, 'Petit Chien Lion - Little Lion Dog - Mali Lavlji Pas'),
(275, 'Pharaoh Hound - Faraonski Gonič'),
(276, 'Piccolo Levriero Italiano - Italian Sighthound - Mali Talijanski Hrt'),
(277, 'Podenco Canario - Canarian Warren Hound - Kanarski Podengo'),
(278, 'Podenco Ibicenco - Ibizan Podenco - Ibički Gonič'),
(279, 'Podengo Português - Portuguese Warren Hound-Portuguese Podengo - Portugalski Gonič'),
(280, 'Poitevin - Poitevin Gonič'),
(281, 'Polski Owczarek Nizinny - Polish Lowland Sheepdog - Poljski Nizinski Ovčar'),
(282, 'Polski Owczarek Podhalanski - Tatra Shepherd Dog - Tatranski Pastirski Pas'),
(283, 'Porcelaine'),
(284, 'Posavatz Hound - Posavski Gonič'),
(285, 'Presa Canario - Kanarski Pas'),
(286, 'Pudelpointer'),
(287, 'Pug - Mops'),
(288, 'Puli - Mađarski Puli'),
(289, 'Pumi'),
(290, 'Rafeiro Do Alentejo - Alentejski Pastirski Pas'),
(291, 'Rhodesian Ridgeback - Rodezijski Gonič'),
(292, 'Riesenschnauzer - Giant Schnauzer - Veliki Šnaucer'),
(293, 'Rottweiler - Rotvajler'),
(294, 'Rövidszörü Magyar Vizsla - Hungarian Short-Haired Pointer (Vizsla) - Mađarska Kratkodlaka Vižla'),
(295, 'Russkaya Psovaya Borzaya - Borzoi (Russian Hunting Sighthound) - Ruski Hrt'),
(296, 'Russkiy Tchiorny Terrier - Russian Black Terrier - Crni Ruski Terijer'),
(297, 'Russkiy Toy - Russian Toy - Ruski Patuljasti Pas'),
(298, 'Russko-Evropeïskaïa Laïka - Russian-European Laika - Rusko-Europski Laika'),
(299, 'Saarlooswolfhond - Saarloos Wolfhond - Saarlouov Vučji Pas'),
(300, 'Sabueso Español - Spanish Hound - Španjolski Gonič'),
(301, 'Saluki - Persijski Hrt'),
(302, 'Samoiedskaïa Sabaka - Samoyed - Samojed'),
(303, 'Schillerstövare - Schillerov Gonič'),
(304, 'Schipperke - Belgijski Špic'),
(305, 'Schnauzer - Šnaucer'),
(306, 'Schweizer Niederlaufhund - Small Swiss Hound - Mali Švicarski Gonič'),
(307, 'Schweizer Laufhund (Chien Courant Suisse) - Swiss Hound - Švicarski Gonič'),
(308, 'Scottish Terrier - Škotski Terijer'),
(309, 'Sealyham Terrier - Silihejmski Terijer'),
(310, 'Segugio Italiano A Pelo Forte - Italian Rough-Haired Segugio - Talijanski Oštrodlaki Gonič'),
(311, 'Segugio Italiano A Pelo Raso - Italian Short-Haired Segugio - Talijanski Kratkodlaki Gonič'),
(312, 'Segugio Maremmano'),
(313, 'Shar Pei'),
(314, 'Shetland Sheepdog - Sheltie'),
(315, 'Shiba - Šiba Inu'),
(316, 'Shih Tzu'),
(317, 'Shikoku - Šikoku'),
(318, 'Siberian Husky - Sibirski Haski'),
(319, 'Skye Terrier - Skye Terijer'),
(320, 'Sloughi - Arapski Hrt Sloughi'),
(321, 'Slovenský Cuvac - Slovakian Chuvach - Slovački Ovčarski Pas'),
(322, 'Slovenský Hrubosrstý Stavac (Ohar) - Wirehaired Slovakian Pointer - Slovački Oštrodlaki Ptičar'),
(323, 'Slovenský Kopov - Slovakian Hound - Slovački Gonič'),
(324, 'Smålandsstövare - Smalandski Gonič'),
(325, 'Spinone Italiano - Italian Spinone - Talijanski Oštrodlaki Ptičar'),
(326, 'Sredneasiatskaya Ovtcharka - Central Asia Shepherd Dog - Srednjeazijski Ovčar'),
(327, 'Serbian Hound - Srpski Gonič'),
(328, 'Serbian Tricolour Hound - Srpski Trobojni Gonič'),
(329, 'Bernhardshund (Bernhardiner) - St. Bernard - Bernardinac'),
(330, 'Stabijhoun - Nizozemski Prepeličar'),
(331, 'Staffordshire Bull Terrier - Stafordski Bul Terijer'),
(332, 'Steirische Rauhhaarbracke - Coarse-Haired Styrian Hound - Štajerski Oštrodlaki Gonič'),
(333, 'Suomenajokoira - Finnish Hound - Finski Gonič'),
(334, 'Suomenlapinkoira - Finnish Lapponian Dog - Finsko Laponski Pas'),
(335, 'Suomenpystykorva - Finnish Spitz - Finski Špic'),
(336, 'Sussex Spaniel - Sasikski Španijel'),
(337, 'Svensk Lapphund - Swedish Lapphund - Švedsko-Laponski Pas'),
(338, 'Taiwan Dog - Tajvanski Pas'),
(339, 'Terrier Brasileiro - Brazilian Terrier - Brazilski Terijer'),
(340, 'Thai Bangkaew Dog'),
(341, 'Thai Ridgeback Dog - Tajlandski Gonič'),
(342, 'Tibetan Spaniel - Tibetski Španijel'),
(343, 'Tibetan Terrier - Tibetski Terijer'),
(344, 'Tiroler Bracke - Tyrolean Hound - Tirolski Gonič'),
(345, 'Bosnian And Herzegovinian - Croatian Shepherd Dog - Tornjak'),
(346, 'Tosa - Japanski Pas Borac Tosa'),
(347, 'Västgötaspets - Swedish Vallhund - Švedski Pastirski Pas'),
(348, 'Volpino Italiano - Italian Volpino - Talijanski Špic'),
(349, 'Vostotchno-Sibirskaïa Laïka - East Siberian Laika - Istočno Sibirska Lajka'),
(350, 'Weimaraner - Vajmarski Ptičar'),
(351, 'Welsh Corgi (Cardigan) - Velški Korgi Cardigan'),
(352, 'Welsh Corgi (Pembroke) - Velški Korgi Pembroke'),
(353, 'Welsh Springer Spaniel - Velški Springer Španijel'),
(354, 'Welsh Terrier - Velški Terijer'),
(355, 'West Highland White Terrier - Zapadnoškotski Bijeli Terije'),
(356, 'Westfälische Dachsbracke - Westphalian Dachsbracke - Vestfalski Brak Jazavčar'),
(357, 'Wetterhoun - Frisian Water Dog - Nizozemski Španijel'),
(358, 'Whippet - Mali Engleski Hrt'),
(359, 'Xoloitzcuintle - Meksički Golokoži Pas'),
(360, 'Yorkshire Terrier - Jorkširski Terijer'),
(361, 'Yuzhnorusskaya Ovcharka - South Russian Shepherd Dog - Južnoruski Ovčar'),
(362, 'Zapadno-Sibirskaïa Laïka - West Siberian Laika - Zapadno-Sibirskaia Laika'),
(363, 'Zwergpinscher - Miniature Pinscher - Patuljasti Pincher'),
(364, 'Zwergschnauzer - Miniature Schnauzer - Patuljasti Šnaucer'),
(365, 'mixed'),
(366, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `dog`
--

CREATE TABLE `dog` (
  `id` int(10) UNSIGNED NOT NULL,
  `dog_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('m','f') COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` tinyint(4) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breed_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` enum('admin','customer','walker') COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forgot_password_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `verification_code` char(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `first_name`, `last_name`, `email`, `password`, `forgot_password_code`, `phone_number`, `address_id`, `picture`, `is_verified`, `verification_code`, `created_at`, `updated_at`) VALUES
(39, 'admin', 'ivi', 'ivona', 'ivonamilankovic@gmail.com', '$2y$10$n2fzpj/gEDHueyoSNKByYuDU0TFHZmmquGk5B0dtYR60vLSldP/MO', '812964', '2145369870', 39, NULL, 1, '745427', '2022-04-16 16:38:48', '2022-04-23 11:57:06'),
(58, 'walker', 'Masa', 'Macic', 'masa@testmail.com', '$2y$10$zLu5wdCLape9lXr0RtWWmutiACJs0m9NKrjnnVImLD4xetTmpHtry', NULL, '1235456248', 58, NULL, 1, '190375', '2022-04-23 12:24:23', '2022-04-23 12:24:54'),
(59, 'walker', 'Misko', 'Lukic', 'luki@testmail.com', '$2y$10$Ys40O7/0BGFWxU/fHFV5oeyXjXIQjCSShZwS1rsOL8Rzne0TZP/MO', NULL, '7485620158', 59, NULL, 1, '765480', '2022-04-23 12:26:02', '2022-04-23 12:26:28'),
(60, 'walker', 'Lenka', 'Petrovic', 'petrlenka@testmail.com', '$2y$10$i8a/G2lCZXo.UIO0Iz8KN.zBpbeN7KTpnR.IJZh2ea6U9ceR9We.a', NULL, '5621484518', 60, NULL, 1, '515233', '2022-04-23 12:28:18', '2022-04-23 12:28:35'),
(61, 'customer', 'Milorad', 'Vasic', 'mili@testmail.com', '$2y$10$q4oY0hwtVcWlefUQogW3fOgrp/ON5Gfaiw6aWf5yMLLb9CZfWbPZS', NULL, '4856214856', 61, NULL, 1, '331298', '2022-04-23 12:29:31', '2022-04-23 12:29:53'),
(62, 'customer', 'Vesna', 'Vesic', 'vv@testmail.com', '$2y$10$lX6EIvY8xfLsCno49GVi6uAd4sYo52.R42OFRKkhI5hnrMbq0uRcm', NULL, '7863245632', 62, NULL, 1, '594331', '2022-04-23 12:32:43', '2022-04-23 12:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `walk`
--

CREATE TABLE `walk` (
  `id` int(10) UNSIGNED NOT NULL,
  `walk_date` datetime NOT NULL,
  `start_location` int(10) UNSIGNED NOT NULL,
  `end_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','confirmed','declined','in progress','finished') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `walker_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `walker_details`
--

CREATE TABLE `walker_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `walker_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `walker_favourite_breeds`
--

CREATE TABLE `walker_favourite_breeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `breed_id` int(10) UNSIGNED NOT NULL,
  `walker_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `walk_dogs`
--

CREATE TABLE `walk_dogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `walk_id` int(10) UNSIGNED NOT NULL,
  `dog_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dog`
--
ALTER TABLE `dog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breed_id` (`breed_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `last_name` (`last_name`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `walk`
--
ALTER TABLE `walk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_start_location_adress_idx` (`start_location`),
  ADD KEY `fk_customer_user_idx` (`customer_id`),
  ADD KEY `fk_walker_user_idx` (`walker_id`);

--
-- Indexes for table `walker_details`
--
ALTER TABLE `walker_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_walker_details_walker_idx` (`walker_id`);

--
-- Indexes for table `walker_favourite_breeds`
--
ALTER TABLE `walker_favourite_breeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_walker_user_idx` (`walker_id`),
  ADD KEY `fk_walker_breeds_breed_idx` (`breed_id`);

--
-- Indexes for table `walk_dogs`
--
ALTER TABLE `walk_dogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_walk_dog_walk_idx` (`walk_id`),
  ADD KEY `dog_id` (`dog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `dog`
--
ALTER TABLE `dog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `walk`
--
ALTER TABLE `walk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `walker_details`
--
ALTER TABLE `walker_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `walker_favourite_breeds`
--
ALTER TABLE `walker_favourite_breeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `walk_dogs`
--
ALTER TABLE `walk_dogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dog`
--
ALTER TABLE `dog`
  ADD CONSTRAINT `dog_ibfk_1` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`id`),
  ADD CONSTRAINT `dog_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `walk`
--
ALTER TABLE `walk`
  ADD CONSTRAINT `fk_customer_user` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_start_location_adress` FOREIGN KEY (`start_location`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `fk_walker_user` FOREIGN KEY (`walker_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `walker_details`
--
ALTER TABLE `walker_details`
  ADD CONSTRAINT `fk_walker_details_walker` FOREIGN KEY (`walker_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `walker_favourite_breeds`
--
ALTER TABLE `walker_favourite_breeds`
  ADD CONSTRAINT `fk_walker_breeds_breed` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`id`),
  ADD CONSTRAINT `fk_walker_breeds_walker` FOREIGN KEY (`walker_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `walk_dogs`
--
ALTER TABLE `walk_dogs`
  ADD CONSTRAINT `fk_walk_dog_walk` FOREIGN KEY (`walk_id`) REFERENCES `walk` (`id`),
  ADD CONSTRAINT `walk_dogs_ibfk_1` FOREIGN KEY (`dog_id`) REFERENCES `dog` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
