
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2016 at 06:00 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a8034263_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` VALUES('root', 'root123');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `ID_korisnika` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ime` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `prezime` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kontakt` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID_korisnika`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` VALUES(1, 'jazo', 'jazo@gmail.com', 'sifra', 'Jazo', 'Jazavi', '095969195');
INSERT INTO `korisnik` VALUES(2, 'zoja', 'zoja@delux.com', 'zoja', 'Zojan', 'Zojanovic', '09156412169');
INSERT INTO `korisnik` VALUES(3, 'mare', 'mare@gmail.com', 'sifra', 'marijana', 'marijana', '091555111');
INSERT INTO `korisnik` VALUES(4, 'Doctor', 'bilosta@gmail.com', 'juliancop', 'Doctor', 'X', '098098709');
INSERT INTO `korisnik` VALUES(5, 'tkalchi', 'xmracex@net.hr', 'jebotepas', 'Thomas', 'Nicholson', '091696969');
INSERT INTO `korisnik` VALUES(6, 'najbolje_auto', 'tublizu@hotmail.com', 'onelove', 'Sinan', 'Sakic', '099420420');
INSERT INTO `korisnik` VALUES(7, 'menzzz', 'gtafreaks@gmail.com', 'onelove420', 'Saban', 'Saulic', '0951234567');
INSERT INTO `korisnik` VALUES(8, 'Å¡masung', 'smasungestica@gmail.com', 'onelove', 'Jovan', 'JoviÄ‡', '0914567845');
INSERT INTO `korisnik` VALUES(10, 'disisamai', 'disisamai@geto.ri', '123456', 'Jazo', 'JAzinski', '213213');

-- --------------------------------------------------------

--
-- Table structure for table `oglas`
--

CREATE TABLE `oglas` (
  `ID_oglasa` int(8) NOT NULL AUTO_INCREMENT,
  `proizvodac` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `tip_motora` varchar(20) NOT NULL,
  `gorivo` varchar(12) NOT NULL,
  `kilometraza` int(11) NOT NULL,
  `godiste` int(8) NOT NULL,
  `snaga_ks` int(8) NOT NULL,
  `radni_obujam` int(8) NOT NULL,
  `vlasnik` varchar(15) NOT NULL,
  `registracija` varchar(15) NOT NULL,
  `cijena` int(10) NOT NULL,
  `naslov` varchar(50) NOT NULL,
  `opis` varchar(1000) NOT NULL,
  `ID_korisnika` int(8) NOT NULL,
  PRIMARY KEY (`ID_oglasa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `oglas`
--

INSERT INTO `oglas` VALUES(2, 'VW', 'Passat', 'TDI', 'Dizel', 50000, 2014, 250, 3000, 'Prvi', '03/30/2016', 25000, 'VW Passat 3.0 TDI', 'Dobar auto s malo kilometara...\r\nNapravljen generalni servis... \r\nNove gume... \r\nPremium oprema...\r\nABS\r\nESP', 1);
INSERT INTO `oglas` VALUES(3, 'Mercedes', 'E 220 BlueTec', '2.2L ', 'Benzin', 25000, 2015, 177, 2200, 'Prvi', '08/10/2016', 85000, 'Mercedes E 220 BlueTec', 'Engine\r\n	\r\n	\r\nTotal displacement (cc)\r\n	\r\n2,143\r\n	\r\n2,987\r\nArrangement / cylinders / valves\r\n	\r\nin-line / 4 / 16\r\n	\r\nV / 6 / 24\r\nFuel delivery\r\n	\r\nCommon-rail diesel with turbocharger\r\n	\r\nCommon-rail diesel with turbocharger\r\nPower: hp (kW) at rpm [1]\r\n	\r\n177 (130) / 3,200 - 3,800\r\n	\r\n258 (190) / 3,400\r\nTorque: Nm at rpm [1]\r\n	\r\n400 / 1,400 - 2,800\r\n	\r\n620 / 1,600 - 2,400\r\nCompression ratio\r\n	\r\n16.2\r\n	\r\n15.5\r\nTransmission\r\n	\r\n	\r\n7G-TRONIC PLUS 7-speed automatic\r\n	\r\nStandard\r\n	\r\nNot available\r\n9G-TRONIC PLUS 9-speed automatic\r\n	\r\nNot available\r\n	\r\nStandard\r\nAMG MCT 7-speed automatic\r\n	\r\nNot available\r\n	\r\nNot available\r\nTyre sizes\r\n	\r\n	\r\nFront\r\n	\r\n225 / 50\r\n	\r\n245 / 40\r\nRear\r\n	\r\n225 / 50\r\n	\r\n265 / 35\r\nPerformance\r\n	\r\n	\r\nAcceleration 0-62 mph (s)\r\n	\r\n8.4\r\n	\r\n6.4\r\nTop speed (mph)\r\n	\r\n141\r\n	\r\n155 (electronically limited) ', 1);
INSERT INTO `oglas` VALUES(4, 'Peugeot', '308', '2.0 BlueHDi', 'Dizel', 150000, 2012, 150, 2000, 'Drugi', '10/01/2015', 9000, 'Peugeot 308 2.0 BlueHDi', 'Prodajem Peugeot 308 1,6 HDi metalik sive vapor boje (sivodrap boja) registriran do 4.2014.\r\nDodatni podaci:\r\n\r\n    Oblik karoserije: hatchback\r\n    Broj vrata: 5\r\n    Boja: smeÄ‘a\r\n    Metalik\r\n    Vrsta pogona: prednji\r\n', 3);
INSERT INTO `oglas` VALUES(16, 'BMW', 'M6', '5.0', 'Benzin', 143000, 2007, 485, 4999, 'Prvi', '01/28/2016', 32000, 'BMW M6 SERIJA 6', '\r\n   Oblik karoserije: coupe\r\n    Broj vrata: 2\r\n    Boja: bordo crvena\r\n    Vrsta pogona: zadnji\r\n', 7);
INSERT INTO `oglas` VALUES(17, 'BMW', 'Z3', '1.9', 'Benzin', 183000, 1996, 136, 1895, 'Drugi', '01/06/2016', 5500, 'BMW Z3 1,9', 'Prodajem ili mijenjam oÄuvan i servisiran BMW Z3. 1996 godina. Reg do 29.11.2015.g. Prodajem ga radi poveÄ‡anja obitelji. Auto je uredno servisiran, uz auto se dobivaju alu felge brock 17 cola s novim ljetnim gumam kupljenim prije 1 mj. Felge su friÅ¡ko ispolirane. U auto nema nikakvih ulaganja. Kupljen je radi guÅ¡ta znaÄi minimalno je voÅ¾en te su originalni kilometri. Auto prodajem ili mijenjam za karavana dizela ili manjeg dizela (VW, Audi,). Cijena u zamjeni je 6500 EUR.', 7);
INSERT INTO `oglas` VALUES(7, 'Yugo', 'Turbo', 'TDI', 'Hibrid', 2, 2014, 10000, 96396, 'Prvi', '04/01/2016', 250000, 'YugiÄ‡ Turbo', 'OÄuvan, prvi vlasnik... brutala auto za svakog jaza.', 4);
INSERT INTO `oglas` VALUES(13, 'Yugo', '45', '0.8', 'Benzin', 80000, 1990, 43, 800, 'Drugi', '11/10/2015', 500, 'Yugo 45 :*ODLIÄŒAN*ISPRAVAN*ZDRAV*3500kn zamjenaaa', 'Prodajem:\r\nZastava yugo 45 Koral\r\n1989 godiÅ¡te\r\nremus auspuh\r\nU ODLIÄŒNOM STANJU za svoje godine\r\nAuto izvana ljepo izgleda\r\nZa vozit dobar\r\nNa autu sve ispravno\r\nPod kao novi bez trunkice hrÄ‘e\r\nUnutraÅ¡njost izvrsna uredna(niÅ¡ta pokidano,rastureno..)\r\nAuto u gepeku ima muziku\r\nAuto je sreÄ‘en i nema ulaganja\r\nÄeliÄne felge sa kao novim zimskim gumama\r\nAuto odrÅ¾avan i dobar za svoje godine\r\nOstalo se sve vidi na slikama\r\nPapiri i prepis uredni\r\nUREDNO ODJAVLJEN\r\nMoguÄe zamjene za motor ,,skuplji auto ..itd...\r\nCijena:3500kuna\r\nMob:099-203-5440 zvati ujutro do 11 sati ili navecer poslje 8 sati a izmeÄ‘u samo SMS', 6);
INSERT INTO `oglas` VALUES(14, 'Fiat', '127', '0.9', 'Benzin', 74000, 1986, 45, 900, 'TreÄ‡i i viÅ¡e', '08/09/2015', 1000, 'Fiat 127 l', 'U dobrom stanju', 6);
INSERT INTO `oglas` VALUES(15, 'Nissan', 'GT-R', 'zver', 'Benzin', 39000, 2009, 650, 3800, 'Drugi', '09/13/2016', 70000, 'Nissan GT-R***650ks***AKRAPOVIC**', 'Auto je u odlicnom stanju!!\r\nKompletan servis napravljen u 7 mjesecu!\r\nZa cijenu nazvati!\r\nMoguca zamjena!', 6);
INSERT INTO `oglas` VALUES(18, 'Ford', 'Focus', '2.5 ST', 'Benzin', 85000, 2007, 200, 2522, 'Prvi', '03/01/2016', 11900, 'Ford Focus 2,5 ST...TURBO.....STANJE...NOVO..NOVO.', 'AUTO DOSLOVCE KAO NOV\r\nJEDINSTVENI U RH.....100%\r\nNA AUTU SVE ORIGINAL TO JEST 1. STANJE...ORIGINALNO\r\nSTANJE 1/1.......100%\r\nSERVISNA KNJIGA\r\nU AUTO NEMA KUNE ULAGANJA\r\nÄŒAKOVEC\r\nCIJENA : 11900 â‚¬\r\nbez zamjene\r\nÄŒAKOVEC\r\ne-mail: drazen.vrbanec31@gmail.com\r\nTEL.095/9077-062', 7);
INSERT INTO `oglas` VALUES(19, 'Nissan', '200SX', '2.4', 'Benzin', 126000, 1990, 145, 2400, 'TreÄ‡i i viÅ¡e', '06/02/2016', 6000, 'Nissan 200SX 240SX', 'Prodajem Nissan s13 240sx, auto je raden iz nule (polakiran, limarija i zasticeno podvozje)\r\n\r\nMotor je ka24e atmo i glava je radena na novo sa novim injektorima 370cc (najpoznatija prerada na turbo u americi, trpi ko ca18det sa serijskim dijelovima)\r\nKomplet original instalacija je izvadena iz auta i stavljena nova sa fireproof zicama plus MS2 extra v3.0 ecu\r\nOvjes je novi, stavljeni su bilstein b6 amortizeri sa HR oprugama, stavljeni su prednji i zadnji strut bar\r\nStavljene vece celjusti sa 200sx, nove plocice\r\nAuspuh raden kod lastovcica od grane do kraja fi70 plus lonca Jap style izlazni fi114,3\r\nUz auto idu dva kompleta felgi, njegove original i Japan Racing JR12 prednje 8jota et33 zadnje 9jota et 25, na felgama su nove continental cs 5\r\nUz auto ide i momo skoljka sa sparco pojasevima.\r\nAuto ima sper diff\r\nZadnji farovi su original kouki, imam i jos americki prednji branik, prednji zadnji most, celjusti, 2 diffa za varit i garazu punu sitnica.', 7);
INSERT INTO `oglas` VALUES(20, 'Mitsubishi', 'Lancer X', '1.9', 'Benzin', 50000, 2009, 140, 1896, 'Drugi', '04/12/2016', 12900, 'Mitsubishi Lancer EVO 10 look', 'Vozilo izvanredno bez kune ulaganja vrijedi pogledati vrlo atraktivnog izgleda...', 7);
INSERT INTO `oglas` VALUES(21, 'Mercedes', 'C-klasa', '220 CDI', 'Dizel', 112000, 2008, 150, 2148, 'Prvi', '06/22/2016', 20000, 'Mercedes C-klasa 220 CDI AMG automatik', '1. VLASNIK\r\nKUPLJEN U EUROLINE-U, SVI SERVISI U OVLAÅ TENOM\r\nREGISTRIRAN DO 20.06.2016.\r\nAMG PAKET, NAVIGACIJA, DVD, BIXENON,\r\nDVOZONSKA KLIMA, PANORAMA,\r\nPREDNJI I STRAÅ½NJI PARKING SENZORI...\r\nPUNO ORIGINALNIH C63 DIJELOVA,\r\nORIGINAL 18" FELGE OD C63,\r\nSVE Å TO JE NAKNADNO UGRAÄENO JE ORIGINAL\r\nMOÅ½E PROVJERA BILO GDJE\r\nU SUSTAVU PDV-a, NEMA POREZA NA PRIJENOS\r\n\r\n098 529 685', 7);
INSERT INTO `oglas` VALUES(22, 'Alfa Romeo', 'Brera', '2.4 JTD', 'Dizel', 158000, 2006, 198, 2400, 'Prvi', '02/10/2016', 10900, 'Alfa Romeo Brera 2,4 JTD', 'gotovina, kredit, obroÄna otplata, zamjena, staro za novo \r\n\r\n    aluminijski naplatci\r\n    Å¡portsko podvozje\r\n    3. stop svjetlo\r\n    svjetla za maglu\r\n    putno raÄunalo\r\n    zatamnjena stakla\r\n    upravljaÄ presvuÄen koÅ¾om\r\n    krovni prozor\r\n', 8);
INSERT INTO `oglas` VALUES(23, 'VW', 'Scirocco', 'TSI', 'Benzin', 140000, 2009, 158, 1400, 'Drugi', '05/03/2016', 12000, 'VW Scirocco 1,4 TSI', 'Trenutno su na auto alu felge 18"\r\nocuvan\r\nmoguca provjera u svakom ovlastenom servisu\r\ndrugi vlasnik\r\nservisiran svakih 10000 km\r\nkupljen u HR\r\nrazlog prodaje odlazak u inozemstvo\r\nInformacije na-0989116553\r\nMail-dobranicmatija1@gmail.com', 8);
INSERT INTO `oglas` VALUES(24, 'Bentley', 'Continental GT', '6.0L W12', 'Benzin', 100000, 2005, 565, 5998, 'Prvi', '04/06/2016', 63900, 'Bentley Continental GT 6.0L W12, jedinstven, Full ', 'Bentley Continental GT 6.0L W12, jedinstven u Hrvatskoj, raÄ‘en po narudÅ¾bi, novi plaÄ‡en 327.000,00 eu, pogon 4x4, vozilo ima svu nadoplativu opremu, dvobojna unutraÅ¡njost, masaÅ¾a sjedala, dva seta kotaÄa: 21" felge sa ljetnim gumama i 19" sa zimskim gumama, upravo napravljen veliki servis, besprijekorno stanje, nisu potrebna nikakva ulaganja, moguÄ‡a provjera bilo gdje po Å¾elji, dolaze u obzir u zamjenu jeftiniji i skuplji auti, ne zanimaju me nekretnine, zemljiÅ¡ta te brodovi, glasi na ime...', 8);
INSERT INTO `oglas` VALUES(25, 'Aston Martin', 'DB5', 'novi ', 'Benzin', 10000, 1970, 200, 900, 'Prvi', '02/29/2020', 1000000, 'AÅ¡ton Martino od Jamesa', 'Ovoj auto ko stvoren za tebe, jer ti si taj. Ti si pravi JAZO. \r\nTo je jedan novi oldtimer po promotivnoj cijeni. Nemores a da ne kupis.\r\nCa dati recen?\r\nBrutala auto. Zemi valje dva.\r\n\r\nP.S. Ako stisnes onaj botun va sredine ti poleti.', 4);
INSERT INTO `oglas` VALUES(26, 'Daewoo', 'Matiz', 'v6', 'Dizel', 1000, 2009, 1000, 1000, 'Prvi', '01/01/2016', 15000, 'Matiz prodajem brzo', 'sldjnaljkhgsd', 2);
INSERT INTO `oglas` VALUES(27, 'Fiat', 'Multipla', 'TDI', 'Dizel', 2024, 2000, 200, 999, 'TreÄ‡i i viÅ¡e', '04/01/2016', 5500, 'Najruzniji auto na svijetu', 'i dalje brutalan auto za svakog jaza... ako nazoves sad, dobijes jedan GRATIS', 4);

-- --------------------------------------------------------

--
-- Table structure for table `oglas_slike`
--

CREATE TABLE `oglas_slike` (
  `ID_slike` int(11) NOT NULL AUTO_INCREMENT,
  `slika` varchar(100) NOT NULL,
  `ID_oglasa` int(11) NOT NULL,
  PRIMARY KEY (`ID_slike`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `oglas_slike`
--

INSERT INTO `oglas_slike` VALUES(88, 'uploads/87.jpg', 18);
INSERT INTO `oglas_slike` VALUES(87, 'uploads/86.jpg', 18);
INSERT INTO `oglas_slike` VALUES(86, 'uploads/85.jpg', 18);
INSERT INTO `oglas_slike` VALUES(85, 'uploads/84.jpg', 17);
INSERT INTO `oglas_slike` VALUES(5, 'uploads/4.png', 2);
INSERT INTO `oglas_slike` VALUES(6, 'uploads/5.jpg', 2);
INSERT INTO `oglas_slike` VALUES(7, 'uploads/6.jpg', 2);
INSERT INTO `oglas_slike` VALUES(8, 'uploads/7.jpg', 2);
INSERT INTO `oglas_slike` VALUES(9, 'uploads/8.jpg', 2);
INSERT INTO `oglas_slike` VALUES(10, 'uploads/9.jpg', 2);
INSERT INTO `oglas_slike` VALUES(11, 'uploads/10.jpg', 3);
INSERT INTO `oglas_slike` VALUES(12, 'uploads/11.jpg', 3);
INSERT INTO `oglas_slike` VALUES(13, 'uploads/12.jpg', 3);
INSERT INTO `oglas_slike` VALUES(14, 'uploads/13.jpg', 3);
INSERT INTO `oglas_slike` VALUES(15, 'uploads/14.jpg', 3);
INSERT INTO `oglas_slike` VALUES(16, 'uploads/15.jpg', 4);
INSERT INTO `oglas_slike` VALUES(17, 'uploads/16.jpg', 4);
INSERT INTO `oglas_slike` VALUES(18, 'uploads/17.jpg', 4);
INSERT INTO `oglas_slike` VALUES(19, 'uploads/18.jpg', 4);
INSERT INTO `oglas_slike` VALUES(20, 'uploads/19.jpg', 4);
INSERT INTO `oglas_slike` VALUES(21, 'uploads/20.jpg', 5);
INSERT INTO `oglas_slike` VALUES(22, 'uploads/21.jpg', 5);
INSERT INTO `oglas_slike` VALUES(23, 'uploads/22.png', 5);
INSERT INTO `oglas_slike` VALUES(24, 'uploads/23.jpg', 5);
INSERT INTO `oglas_slike` VALUES(25, 'uploads/24.jpg', 5);
INSERT INTO `oglas_slike` VALUES(26, 'uploads/25.jpg', 5);
INSERT INTO `oglas_slike` VALUES(27, 'uploads/26.jpg', 5);
INSERT INTO `oglas_slike` VALUES(28, 'uploads/27.jpg', 5);
INSERT INTO `oglas_slike` VALUES(69, 'uploads/47.jpg', 13);
INSERT INTO `oglas_slike` VALUES(68, 'uploads/46.jpg', 13);
INSERT INTO `oglas_slike` VALUES(67, 'uploads/45.jpg', 13);
INSERT INTO `oglas_slike` VALUES(66, 'uploads/44.jpg', 13);
INSERT INTO `oglas_slike` VALUES(84, 'uploads/83.jpg', 17);
INSERT INTO `oglas_slike` VALUES(83, 'uploads/82.jpg', 17);
INSERT INTO `oglas_slike` VALUES(82, 'uploads/81.jpg', 16);
INSERT INTO `oglas_slike` VALUES(81, 'uploads/80.jpg', 16);
INSERT INTO `oglas_slike` VALUES(80, 'uploads/79.jpg', 16);
INSERT INTO `oglas_slike` VALUES(79, 'uploads/78.jpg', 16);
INSERT INTO `oglas_slike` VALUES(39, 'uploads/38.jpg', 7);
INSERT INTO `oglas_slike` VALUES(40, 'uploads/39.jpg', 7);
INSERT INTO `oglas_slike` VALUES(41, 'uploads/40.jpg', 7);
INSERT INTO `oglas_slike` VALUES(42, 'uploads/41.jpg', 7);
INSERT INTO `oglas_slike` VALUES(43, 'uploads/42.jpg', 7);
INSERT INTO `oglas_slike` VALUES(65, 'uploads/43.jpg', 13);
INSERT INTO `oglas_slike` VALUES(73, 'uploads/72.jpg', 15);
INSERT INTO `oglas_slike` VALUES(72, 'uploads/71.jpg', 14);
INSERT INTO `oglas_slike` VALUES(71, 'uploads/70.jpg', 14);
INSERT INTO `oglas_slike` VALUES(70, 'uploads/48.jpg', 13);
INSERT INTO `oglas_slike` VALUES(74, 'uploads/73.jpg', 15);
INSERT INTO `oglas_slike` VALUES(75, 'uploads/74.jpg', 15);
INSERT INTO `oglas_slike` VALUES(76, 'uploads/75.jpg', 15);
INSERT INTO `oglas_slike` VALUES(77, 'uploads/76.jpg', 15);
INSERT INTO `oglas_slike` VALUES(78, 'uploads/77.jpg', 15);
INSERT INTO `oglas_slike` VALUES(89, 'uploads/88.jpg', 18);
INSERT INTO `oglas_slike` VALUES(90, 'uploads/89.jpg', 18);
INSERT INTO `oglas_slike` VALUES(91, 'uploads/90.jpg', 18);
INSERT INTO `oglas_slike` VALUES(92, 'uploads/91.jpg', 19);
INSERT INTO `oglas_slike` VALUES(93, 'uploads/92.jpg', 19);
INSERT INTO `oglas_slike` VALUES(94, 'uploads/93.jpg', 19);
INSERT INTO `oglas_slike` VALUES(95, 'uploads/94.jpg', 20);
INSERT INTO `oglas_slike` VALUES(96, 'uploads/95.jpg', 20);
INSERT INTO `oglas_slike` VALUES(97, 'uploads/96.jpg', 20);
INSERT INTO `oglas_slike` VALUES(98, 'uploads/97.jpg', 21);
INSERT INTO `oglas_slike` VALUES(99, 'uploads/98.jpg', 21);
INSERT INTO `oglas_slike` VALUES(100, 'uploads/99.jpg', 21);
INSERT INTO `oglas_slike` VALUES(101, 'uploads/100.jpg', 21);
INSERT INTO `oglas_slike` VALUES(102, 'uploads/101.jpg', 21);
INSERT INTO `oglas_slike` VALUES(103, 'uploads/102.jpg', 21);
INSERT INTO `oglas_slike` VALUES(104, 'uploads/103.jpg', 22);
INSERT INTO `oglas_slike` VALUES(105, 'uploads/104.jpg', 22);
INSERT INTO `oglas_slike` VALUES(106, 'uploads/105.jpg', 22);
INSERT INTO `oglas_slike` VALUES(107, 'uploads/106.jpg', 22);
INSERT INTO `oglas_slike` VALUES(108, 'uploads/107.jpg', 22);
INSERT INTO `oglas_slike` VALUES(109, 'uploads/108.jpg', 23);
INSERT INTO `oglas_slike` VALUES(110, 'uploads/109.jpg', 23);
INSERT INTO `oglas_slike` VALUES(111, 'uploads/110.jpg', 23);
INSERT INTO `oglas_slike` VALUES(112, 'uploads/111.jpg', 23);
INSERT INTO `oglas_slike` VALUES(113, 'uploads/112.jpg', 23);
INSERT INTO `oglas_slike` VALUES(114, 'uploads/113.jpg', 24);
INSERT INTO `oglas_slike` VALUES(115, 'uploads/114.jpg', 24);
INSERT INTO `oglas_slike` VALUES(116, 'uploads/115.jpg', 24);
INSERT INTO `oglas_slike` VALUES(117, 'uploads/116.jpg', 24);
INSERT INTO `oglas_slike` VALUES(118, 'uploads/117.jpg', 24);
INSERT INTO `oglas_slike` VALUES(119, 'uploads/118.jpg', 25);
INSERT INTO `oglas_slike` VALUES(120, 'uploads/119.jpg', 25);
INSERT INTO `oglas_slike` VALUES(121, 'uploads/120.jpg', 25);
INSERT INTO `oglas_slike` VALUES(122, 'uploads/121.jpg', 26);
INSERT INTO `oglas_slike` VALUES(123, 'uploads/122.jpg', 27);
INSERT INTO `oglas_slike` VALUES(124, 'uploads/123.jpg', 27);
