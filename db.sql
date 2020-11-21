-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: 62.149.150.157
-- Generato il: Nov 21, 2020 alle 12:11
-- Versione del server: 5.5.62-38.14-log
-- Versione PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Sql557066_4`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `appuntamenti`
--

CREATE TABLE IF NOT EXISTS `appuntamenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sdata` varchar(255) NOT NULL,
  `edata` varchar(255) NOT NULL,
  `testo` text NOT NULL,
  `visita` varchar(255) NOT NULL,
  `colore` varchar(255) NOT NULL,
  `id_calendario` varchar(255) NOT NULL,
  `cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dump dei dati per la tabella `appuntamenti`
--

INSERT INTO `appuntamenti` (`id`, `sdata`, `edata`, `testo`, `visita`, `colore`, `id_calendario`, `cliente`) VALUES
(6, '2019-10-09 08:30', '2019-10-09 17:00', 'Corso ST-Micro Electronics (Project)', '', '', '1565178234940', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE IF NOT EXISTS `clienti` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cod_user` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `indirizzo` varchar(100) NOT NULL,
  `cap` varchar(30) NOT NULL,
  `citta` varchar(250) NOT NULL,
  `cartella` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `cellulare` varchar(50) NOT NULL,
  `cod_fiscale` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `ragione_sociale` varchar(150) NOT NULL,
  `nazione` varchar(150) NOT NULL,
  `piva` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `mail2` varchar(150) NOT NULL,
  `mail3` varchar(150) NOT NULL,
  `skype` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`id`, `cod_user`, `nome`, `cognome`, `indirizzo`, `cap`, `citta`, `cartella`, `note`, `telefono`, `cellulare`, `cod_fiscale`, `mail`, `ragione_sociale`, `nazione`, `piva`, `fax`, `mail2`, `mail3`, `skype`) VALUES
(40, '51', 'Alfio', 'Grasso', 'via IV Novembre, 300C ', '95019 ', ' Zafferana Etnea (Catania)', '51-Alfio-Grasso', '', '', '', '', 'info@algraeditore.it', 'Algra Editore', 'Italia', '05098400871 ', '', 'algraeditore@gmail.com', '', ''),
(42, '1', '', '', 'Viale C. Colombo, 13', '95037 ', 'S. G. La Punta (CT) ', '41_1_Media_Service_srl', '', '', '', '', 'info@mediaserviceitaly.it', 'Media Service srl', '', '11178991003 ', '', '', '', ''),
(43, '1', '', '', 'Via Principe di Piemonte n°6 ', '95029 ', 'Viagrande', '43_1_Freesound_Studies', '', '095 7894668', '', '90038920873', 'info@freesoundstudies.it', 'Freesound Studies', '', '', '095 7894668', '', '', ''),
(44, '1', '', '', '', '', '', '44_1_La_Casa_di_Toti', '', '', '', '', 'info@lacasaditoti.org', 'La Casa di Toti', '', '', '', '', '', ''),
(45, '1', '', '', 'Via Messina,451/Q', '95126 ', 'Catania', '45_1_Loremparc', '', '', '', '05199740878 ', 'info@loremparc.com ', 'Loremparc srl', '', '05199740878 ', '', '', '', ''),
(46, '1', '', '', '', '', '', '46_1_Sicengineering', '', '', '', '', '', 'Sic Engineering', '', '', '', '', '', ''),
(47, '1', 'Cesare', 'Gionta', '', '', '', '47_1_CS_Police', '', '', '', '', '', 'CS Police Srl', '', '', '', '', '', ''),
(48, '1', 'Floriana', 'Spanu', 'Via Pauloti 74', '95020', 'Aci Bonaccorsi ', '48_1_E-digitale', 'Sql1152057_2 occupato per San Marco', '', '3402410071', 'SPNFRN79L57C351J', 'spanuf@intraspa.it', 'E-digitale', 'Italia', '', '', 'info@e-digitale.it', '', ''),
(49, '1', 'Antonio', 'Reina', 'Via Mario Rapisardi,46', '95029', 'Viagrande', '49_1_Etna3340', 'https://www.etna3340.com/admin/\nuser: admin\npass: A-7NpN4W3ZbM1AP\n\nhttps://www.etna3340.com/_management/\nuser: etna3340\npass: A-7NpN4W3ZbM1AP\n\nhttps://www.1and1.fr/login?__lf=Static\nIdentifiant: 296022113\npass: 7?eItpuAq*@p1&\n\nDB Wordpress:\npass: Intraspa2018.', '', '+39 3334591618', 'RNENTN65M17C351K', 'info@etna3340.com', 'Etna3340', 'Italia', 'IT05275850872', '', 'antonio@etna3340.com', '', ''),
(50, '51', 'Carmelo', 'Torrisi ', 'C.da Montecenere, sn', '95032', 'Piano Tavola - Belpasso', '50_51_ST_Elettrodomestici_Srl', 'Codice AuthINFO : Zj7d5MTk2c \n', '0957131727', '', '', 'info@st-elettrodomestici.it', 'ST Elettrodomestici Srl', 'Italia', '04718060876', '', 'st.elettrodomestici@tiscali.it', 'amministrazione@st-elettrodomestici.it', ''),
(52, '51', '', '', '', '', '', '51_51_Dentalth', '', '', '', '', '', 'Dentalth', '', '', '', '', '', ''),
(53, '51', '', '', '', '', '', '53_51_lavitadelpilotadilinea', '', '', '', '', '', 'lavitadelpilotadilinea', '', '', '', '', '', ''),
(54, '51', 'Mauro', 'Sammarco', 'Via Grazia Deledda 19', '95100', 'Catania', '54_51_Studio_Sammarco', '', '', '', '', 'studiodott.sammarco@gmail.com', 'Studio Sammarco', 'Italia', '', '', '', '', ''),
(55, '', '', '', '', '', '', '55__CT_Frigo', '', '', '', '', '', 'CT Frigo', '', '', '', '', '', ''),
(56, '51', '', '', '', '', '', '56_51_Dott.Raffaele_Benanti', '', '', '', '', '', 'Dott.Raffaele Benanti', '', '', '', '', '', ''),
(57, '', 'Asia ', 'Ridolfo', 'Via Carnazza 43', '95030', 'Tremestieri Etneo', '57_51_MEA_Group_Srl', '', '', '', '', 'info@meagroupsrl.com', 'MEA Group Srl', 'Italia', '', '', '', '', ''),
(58, '51', 'Marco', 'Rinaldo', 'Via Macello n.86', '95037', 'San Giovanni la Punta', '58_51_Kline_Srl', '', '', '', '', 'info@poliambulatoriokline.it', 'Poliambulatorio medico-chirurgico Kline Srl', 'Italia', '', '', 'klinesrl@pec.it', '', ''),
(59, '1', '', '', '', '', '', '59_1_4347495157', '', '', '', 'MTTGTN44B04C351Q', '', '4347495157', '', '', '', '', '', ''),
(60, '51', 'Michele ', 'Rinaldo', 'Via Macello n.86', '95037', 'San Giovanni La Punta', '60_51_studio_di_Cardiologia_del_Dott.Michele_Rinal', 'Codice fattura elettronica KRRH6B9\nCodice di Autorizzazione dominio: i8R4SdEk9a', '0957412713', '', '', 'rinaldo.michele@alice.it', 'studio di Cardiologia del Dott.Michele Rinaldo Srl', 'Italia', '03980310878', '', 'studiorinaldosrl@arubapec.it', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `dati_fattura`
--

CREATE TABLE IF NOT EXISTS `dati_fattura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_fattura` int(11) NOT NULL,
  `libro` varchar(200) NOT NULL,
  `v1` varchar(50) NOT NULL,
  `v2` varchar(50) NOT NULL,
  `v3` varchar(50) NOT NULL,
  `risultato` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dump dei dati per la tabella `dati_fattura`
--

INSERT INTO `dati_fattura` (`id`, `cod_fattura`, `libro`, `v1`, `v2`, `v3`, `risultato`) VALUES
(23, 41, 'Maria Grazia Distefano - Via Vita - 978-88-9341-121-9', '66', '2', '3', '128.04'),
(24, 41, 'Maria Grazia Distefano - Via Vita - 978-88-9341-121-9', '4', '2', '2', '7.84'),
(25, 43, 'Maria Grazia Distefano - Via Vita - 978-88-9341-121-9', '11', '1', '', '11.00'),
(26, 41, 'Maria Grazia Distefano - Via Vita <br> 978-88-9341-121-9', '3', '1', '', '3.00'),
(27, 44, 'Maria Grazia Distefano - Via Vita <br> 978-88-9341-121-9', '1', '1', '', '1.00'),
(28, 45, 'Maria Grazia Distefano - Via Vita <br> 978-88-9341-121-9', '7', '1', '5', '6.65'),
(30, 48, 'SIto', '500', '', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `db`
--

CREATE TABLE IF NOT EXISTS `db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utente` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `cod_cliente` varchar(150) NOT NULL,
  `host` varchar(150) NOT NULL,
  `data_creazione` varchar(150) NOT NULL,
  `data_scadenza` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dump dei dati per la tabella `db`
--

INSERT INTO `db` (`id`, `utente`, `pass`, `cod_cliente`, `host`, `data_creazione`, `data_scadenza`) VALUES
(1, 'Sql1123396', '1135qu46b6', '42', '89.46.111.48', '', ''),
(2, 'Sql1152057', 'e1sc3g06d3', '48', '89.46.111.53', '', ''),
(3, 'dbo669725522', '7?eItpuAq*@p1&', '49', '', '', ''),
(4, '', '', '47', '', '', ''),
(5, 'Sql1076383', 'h23f4760q7 ', '53', '', '', ''),
(6, 'dottsamm_db', 'sammarcodb1', '54', 'localhost', ' 07/03/2019', '07/03/2019'),
(7, 'Sql1126660', 'v0p5643a82', '57', '89.46.111.49', '9 ago 2018', '9 ago 2019'),
(8, 'Sql1314332', '97u5372g8p', '60', '89.46.111.87', '04/04/2019', '04/04/2019'),
(9, 'Sql967737', 'x10s6z335y', '40', '', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi`
--

CREATE TABLE IF NOT EXISTS `eventi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(50) NOT NULL,
  `data2` varchar(50) NOT NULL,
  `ora` varchar(50) NOT NULL,
  `ora2` varchar(50) NOT NULL,
  `testo` text NOT NULL,
  `cod_user` int(11) NOT NULL,
  `color` varchar(150) NOT NULL,
  `cliente` varchar(150) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dump dei dati per la tabella `eventi`
--

INSERT INTO `eventi` (`id`, `data`, `data2`, `ora`, `ora2`, `testo`, `cod_user`, `color`, `cliente`) VALUES
(7, '10/04/2017', '15/04/2017', '', '', 'prova 4', 1, '1', ''),
(12, '30/04/2017', '30/04/2017', '', '', 'prova6', 1, '1', ''),
(11, '16/04/2017', '16/04/2017', '10:11', '13:10', 'prova5', 1, '2', '27'),
(13, '10/04/2017', '10/04/2017', '', '', 'prova -2', 1, '2', ''),
(14, '09/09/2017', '09/09/2017', '', '', 'test', 50, '12', ''),
(15, '22/09/2017', '22/09/2017', '', '', 'test', 1, '15', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `fattura`
--

CREATE TABLE IF NOT EXISTS `fattura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_user` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `data` varchar(50) NOT NULL,
  `num_fattura` varchar(150) NOT NULL,
  `spedizione` varchar(255) NOT NULL,
  `costo_spedizione` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dump dei dati per la tabella `fattura`
--

INSERT INTO `fattura` (`id`, `cod_user`, `cod_cliente`, `data`, `num_fattura`, `spedizione`, `costo_spedizione`) VALUES
(41, 1, 39, '22/09/2017', '133/2017', '', ''),
(44, 1, 39, '121', '2424', '', ''),
(42, 1, 39, '15/10/2017', '11', '', '5'),
(43, 1, 39, '13', '213', '', ''),
(45, 1, 39, '124', '1313', '', '5'),
(46, 1, 40, '20/03/2018', '3', '', ''),
(48, 1, 40, '2018-03-30', '1', '', ''),
(49, 51, 40, '12/05/2018', '', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `filemanager`
--

CREATE TABLE IF NOT EXISTS `filemanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(200) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dump dei dati per la tabella `filemanager`
--

INSERT INTO `filemanager` (`id`, `path`, `flag`) VALUES
(3, '../media/123-Luca-Bianchi/1/CLIFOR.accdb', 0),
(2, '../media/123-Luca-Bianchi/1/0_b7899_f8fe4680_XL.jpg', 1),
(4, '../media/123-Luca-Bianchi/1/back_enabled.png', 1),
(5, '../media/123-Luca-Bianchi/1/Civile1000x445.jpg', 0),
(6, '../media//1/Leon - Galia Alubarna.docx', 0),
(7, '../media/-Anna-Mereu//Rubrica Telefonica.pdf', 0),
(8, '../media/-Anna-Mereu//Senza titolo-1.jpg', 0),
(9, '../media/-Anna-Mereu//konachan-com-42676-animal_ears-brown_hair-clouds-horo-long_hair-nude-red_eyes-sky-spice_and_wolf-tail-wolfgirl.jpg', 0),
(10, '../media/-Anna-Mereu//konachan-com-42676-animal_ears-brown_hair-clouds-horo-long_hair-nude-red_eyes-sky-spice_and_wolf-tail-wolfgirl.jpg', 0),
(11, '../media/-Anna-Mereu//fattura.pdf', 0),
(12, '../media/-Tywien-Feanor//fattura.pdf', 0),
(13, '../media/-Tywien-Feanor//fattura.pdf', 0),
(14, '../media/-Tywien-Feanor//fattura.pdf', 0),
(15, '../media/-Tywien-Feanor//files.php', 0),
(16, '../media/1--Media Service//REPORT-INTERVENTI.docx', 0),
(17, '../media/41_1_Media_Service_srl/180118-mediaservice.pdf', 0),
(18, '../media/41_1_Media_Service_srl/Contratto-Assistenza-Tecnica.pdf', 0),
(19, '../media/documenti/REPORT-INTERVENTI.docx', 0),
(20, '../media/54_51_Studio_Sammarco/dottsammarco-it.docx', 0),
(21, '../media/54_51_Studio_Sammarco/Invoice-8199.pdf', 0),
(22, '../media/54_51_Studio_Sammarco/Sammarco.png', 0),
(23, '../media/documenti/1.txt', 0),
(24, '../media/51_51_Dentalth/Dentalth-20181004T040859Z-001.zip', 0),
(25, '../media/47_1_CS_Police/configuration.php', 0),
(26, '../media/47_1_CS_Police/cs.png', 0),
(27, '../media/47_1_CS_Police/cs.pdf', 0),
(28, '../media/47_1_CS_Police/cspolice.png', 0),
(29, '../media/56_51_Dott.Raffaele_Benanti/Benanti.zip', 0),
(30, '../media/49_1_Etna3340/ContrattoAssistenzaManutenzioneWeb.docx', 0),
(31, '../media/49_1_Etna3340/codice.txt', 0),
(32, '../media/49_1_Etna3340/Etna3340.txt', 0),
(33, '../media/49_1_Etna3340/4 - Ottimizzazioni 4 ETNA3340.pdf', 0),
(34, '../media/49_1_Etna3340/ip-France.png', 0),
(35, '../media/49_1_Etna3340/Images compressées Etna3340.rar', 0),
(36, '../media/53_51_lavitadelpilotadilinea/LaVitaDelPilotaDiLinea.zip', 0),
(37, '../media/41_1_Media_Service_srl/logo.doc', 0),
(38, '../media/41_1_Media_Service_srl/ELENCO-INTERVENTI.docx', 0),
(39, '../media/41_1_Media_Service_srl/MediaServiceItaly_Prev.2.docx', 0),
(40, '../media/41_1_Media_Service_srl/inserimento sito.odt', 0),
(41, '../media/41_1_Media_Service_srl/MediaServiceSrl.xlsx', 0),
(42, '../media/41_1_Media_Service_srl/Kaspersky-Seriale.pdf', 0),
(43, '../media/41_1_Media_Service_srl/MService.xlsx', 0),
(44, '../media/41_1_Media_Service_srl/INDICE.docx', 0),
(45, '../media/41_1_Media_Service_srl/REPORT-INTERVENTI.docx', 0),
(46, '../media/41_1_Media_Service_srl/MediaService.zip', 0),
(47, '../media/55__CT_Frigo/1.txt', 0),
(48, '../media/55__CT_Frigo/1.txt', 0),
(49, '../media//1.txt', 0),
(50, '../media/57_51_MEA_Group_Srl/1.txt', 0),
(51, '../media/55__CT_Frigo/1.txt', 0),
(52, '../media/60_51_studio_di_Cardiologia_del_Dott.Michele_Rinal/496497582-studiorinaldomichele.it_Hosting Basic Linux.pdf', 0),
(53, '../media/60_51_studio_di_Cardiologia_del_Dott.Michele_Rinal/Rinaldo-Codice_autorizzazione_dominio.pdf', 0),
(54, '../media/60_51_studio_di_Cardiologia_del_Dott.Michele_Rinal/Rinaldo-Conferma_Backup_MySql Sql1314332.pdf', 0),
(55, '../media/60_51_studio_di_Cardiologia_del_Dott.Michele_Rinal/Rinaldo-MySql_ Sql1314332.pdf', 0),
(56, '../media/60_51_studio_di_Cardiologia_del_Dott.Michele_Rinal/496497582-studiorinaldomichele.it_Hosting Basic Linux.pdf', 0),
(57, '../media/60_51_studio_di_Cardiologia_del_Dott.Michele_Rinal/496497582-studiorinaldomichele.it_Hosting Basic Linux.pdf', 0),
(58, '../media/60_51_studio_di_Cardiologia_del_Dott.Michele_Rinal/CV-FSpanu.pdf', 0),
(59, '../media/60_51_studio_di_Cardiologia_del_Dott.Michele_Rinal/CV_FSpanu.pdf', 0),
(60, '../media/60_51_studio_di_Cardiologia_del_Dott.Michele_Rinal/CV_FSpanu.docx', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `gruppi`
--

CREATE TABLE IF NOT EXISTS `gruppi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `prezzo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `gruppi`
--

INSERT INTO `gruppi` (`id`, `nome`, `prezzo`) VALUES
(1, 'Nessuno', 0),
(3, 'Tirocinante', 50),
(4, 'Avvocato', 100);

-- --------------------------------------------------------

--
-- Struttura della tabella `hosting`
--

CREATE TABLE IF NOT EXISTS `hosting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` varchar(150) NOT NULL,
  `utente` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `ftp` varchar(150) NOT NULL,
  `data_creazione` varchar(150) NOT NULL,
  `data_scadenza` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dump dei dati per la tabella `hosting`
--

INSERT INTO `hosting` (`id`, `cod_cliente`, `utente`, `pass`, `ftp`, `data_creazione`, `data_scadenza`) VALUES
(3, '43', '1338788@aruba.it', '08771903es', '', '', ''),
(2, '42', '8363651@aruba.it', 'Zyy3MVdi6u', 'ftp.mediaserviceitaly.it', '', '28/07/2018'),
(4, '45', ' loremparc.com_ftp', '4Dwo-21R', 'ftp.loremparc.com', '', ''),
(5, '46', 'sicengineering.eu_ftp', 'O940.De31j', '   ftp.sicengineering.eu', '', ''),
(6, '49', '296022113', '7?eItpuAq*@p1&', '', '', ''),
(7, '50', '2207417@aruba.it', 'aevobbdo', 'ftp.st-elettrodomestrici', '', ''),
(8, '47', '2755421@aruba.it', 'management18', 'ftp.cspolice.it', '', ''),
(9, '48', '2350239@aruba.it', '', 'ftp.e-digitale.it', '', ''),
(10, '52', '6140457@aruba.it', 'Carmelo52', 'ftp.dentalth.it', '', ''),
(11, '53', '', '', 'ftp.lavitadelpilotadilinea.eu', '', ''),
(12, '40', '4551179@aruba.it', 'alfio11072013', 'ftp.algraeditore.it', '', ''),
(13, '54', 'dottsamm', 'y6Xd04Edh5', 'ftp.dottsammarco.it', '07/03/2018', '07/03/2019'),
(14, '57', '8368112@aruba.it', 'giurid67', 'ftp.meagroupsrl.com', '', ''),
(15, '60', '2337308@aruba.it', 'cardio86', 'ftp.studiorinaldomichele.it', '04/04/2019', '04/04/2020');

-- --------------------------------------------------------

--
-- Struttura della tabella `joomla`
--

CREATE TABLE IF NOT EXISTS `joomla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` varchar(150) NOT NULL,
  `sito` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dump dei dati per la tabella `joomla`
--

INSERT INTO `joomla` (`id`, `cod_cliente`, `sito`, `login`, `pass`) VALUES
(1, '42', 'mediaserviceitaly.it', 'media', 'media2017'),
(2, '44', 'www.lacasaditoti.org', 'totino', 'totfel'),
(3, '45', 'www.loremparc.com', '', ''),
(4, '46', 'www.sicengineering.eu', 'sicengineer', 'O940.De31j'),
(5, '47', 'www.cspolice.it', 'cs', 'cs2017'),
(6, '40', 'http://www.algraeditore.it/', 'admin', '!al20gra13!'),
(7, '50', 'www.st-elettrodomestici.it\\administrator', 'st', 'st2018'),
(8, '52', 'www.dentalth.it', '', ''),
(9, '53', 'http://www.lavitadelpilotadilinea.eu/', 'vita', 'vita2017'),
(10, '54', 'www.dottsammarco.it', 'dottsamm', 'sammarco'),
(11, '57', 'http://www.meagroupsrl.com/', 'mea', 'mea2018'),
(12, '60', 'www.studiorinaldomichele.it', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `magazzino`
--

CREATE TABLE IF NOT EXISTS `magazzino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(150) NOT NULL,
  `autore` varchar(150) NOT NULL,
  `anno_pubbl` varchar(150) NOT NULL,
  `isbn` varchar(150) NOT NULL,
  `prezzo` varchar(150) NOT NULL,
  `pos_log` varchar(150) NOT NULL COMMENT 'Posizione logistica',
  `tot_stamp` varchar(150) NOT NULL COMMENT 'Totale copie stampate ',
  `data` varchar(150) NOT NULL,
  `om_autore` int(11) NOT NULL COMMENT 'N° copie omaggio autore',
  `buy_autore` int(11) NOT NULL COMMENT 'N° copie acquistate dallautore',
  `cp_pres` int(11) NOT NULL COMMENT 'Copia presentazione ',
  `data_cp_pres` varchar(150) NOT NULL COMMENT 'dataCopia presentazione ',
  `distributore` varchar(150) NOT NULL,
  `conti` varchar(150) NOT NULL COMMENT 'Conti deposito anagrafica fornitore',
  `cp_omaggio` int(11) NOT NULL COMMENT 'Copie omaggio',
  `desc_cp_omaggio` text NOT NULL COMMENT 'descrizione a chi viene dato',
  `dep_legale` text NOT NULL COMMENT 'deposito legale sono sempre 4 quindi spuntare e sottrae 4 copie ai libri ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `magazzino`
--

INSERT INTO `magazzino` (`id`, `titolo`, `autore`, `anno_pubbl`, `isbn`, `prezzo`, `pos_log`, `tot_stamp`, `data`, `om_autore`, `buy_autore`, `cp_pres`, `data_cp_pres`, `distributore`, `conti`, `cp_omaggio`, `desc_cp_omaggio`, `dep_legale`) VALUES
(5, 'Via Vita', 'Maria Grazia Distefano', '', '978-88-9341-121-9', '10,00', '', '', '', 0, 0, 0, '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_appuntamento`
--

CREATE TABLE IF NOT EXISTS `tipo_appuntamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_user` int(11) NOT NULL,
  `color` varchar(150) NOT NULL DEFAULT '#f56954',
  `titolo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dump dei dati per la tabella `tipo_appuntamento`
--

INSERT INTO `tipo_appuntamento` (`id`, `cod_user`, `color`, `titolo`) VALUES
(15, 1, '#ff0080', 'Appuntamento'),
(2, 1, '#3c8dbc', 'Personale'),
(12, 50, '#f56954', 'Appuntamento'),
(13, 50, '#3c8dbc', 'Personale'),
(16, 51, '#f56954', 'Appuntamento'),
(17, 51, '#3c8dbc', 'Personale'),
(18, 52, '#f56954', 'Appuntamento'),
(19, 52, '#3c8dbc', 'Personale'),
(20, 53, '#f56954', 'Appuntamento'),
(21, 53, '#3c8dbc', 'Personale');

-- --------------------------------------------------------

--
-- Struttura della tabella `tvox`
--

CREATE TABLE IF NOT EXISTS `tvox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(255) NOT NULL,
  `tot_open` int(11) NOT NULL,
  `tot_open_today` int(11) NOT NULL,
  `tot_close_today` int(11) NOT NULL,
  `media_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dump dei dati per la tabella `tvox`
--

INSERT INTO `tvox` (`id`, `data`, `tot_open`, `tot_open_today`, `tot_close_today`, `media_time`) VALUES
(1, '2020-11-02', 304, 2, 48, 88251),
(2, '2020-11-01', 302, 0, 3, 1578),
(3, '2020-11-03', 315, 11, 49, 273628),
(4, '2020-11-04', 327, 12, 61, 104550),
(5, '2020-11-05', 335, 8, 41, 44248),
(6, '2020-11-06', 340, 5, 51, 76614),
(7, '2020-11-07', 345, 0, 19, 16973),
(8, '2020-11-08', 345, 1, 5, 5957),
(9, '2020-11-09', 346, 11, 32, 186149),
(10, '2020-11-10', 357, 6, 24, 84554),
(11, '2020-11-11', 363, 10, 24, 40790),
(12, '2020-11-12', 373, 10, 20, 55249),
(13, '2020-11-13', 381, 5, 22, 64045),
(14, '2020-11-14', 385, 1, 0, 0),
(15, '2020-11-15', 386, 0, 9, 15075),
(16, '2020-11-16', 386, 10, 29, 65326),
(17, '2020-11-17', 396, 18, 139, 90714),
(18, '2020-11-18', 414, 18, 85, 21094),
(19, '2020-11-19', 435, 10, 118, 11412),
(20, '2020-11-20', 446, 12, 31, 26218),
(21, '2020-01-01', 0, 0, 0, 0),
(22, '2020-01-02', 0, 0, 43, 0),
(23, '2020-02-01', 16, 0, 18, 0),
(24, '2020-02-02', 16, 0, 1, 0),
(25, '2020-02-03', 16, 0, 29, 0),
(26, '2020-02-04', 16, 0, 40, 0),
(27, '2020-02-06', 17, 1, 27, 0),
(28, '2020-02-05', 16, 0, 40, 0),
(29, '2020-02-07', 0, 0, 0, 0),
(32, '2020-01-03', 0, 0, 28, 0),
(33, '2020-01-18', 11, 0, 0, 0),
(34, '2020-03-01', 22, 0, 3, 0),
(35, '2020-03-02', 22, 0, 25, 0),
(36, '2020-03-03', 22, 11, 24, 0),
(37, '2020-03-04', 23, 0, 0, 0),
(38, '2020-01-06', 0, 0, 0, 0),
(39, '2020-01-07', 0, 0, 23, 0),
(40, '2020-01-16', 6, 0, 0, 0),
(41, '2020-01-17', 7, 0, 0, 0),
(42, '2020-01-15', 6, 0, 0, 0),
(43, '2020-01-08', 0, 1, 26, 0),
(44, '2020-01-14', 6, 0, 0, 0),
(45, '2020-01-13', 4, 0, 0, 0),
(46, '2020-01-12', 4, 0, 0, 0),
(47, '2020-01-11', 4, 0, 16, 0),
(48, '2020-01-10', 4, 0, 14, 0),
(49, '2020-01-09', 1, 3, 12, 0),
(50, '2020-01-04', 0, 0, 6, 0),
(51, '2020-01-05', 0, 0, 0, 0),
(52, '2020-03-05', 24, 0, 0, 0),
(53, '2020-03-06', 24, 0, 0, 0),
(54, '2020-03-07', 24, 0, 0, 0),
(55, '2020-03-08', 24, 0, 0, 0),
(56, '2020-03-10', 27, 0, 0, 0),
(57, '2020-03-09', 25, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utente` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `stato` int(11) NOT NULL DEFAULT '0',
  `timestamp` varchar(20) NOT NULL,
  `admin` int(11) NOT NULL,
  `domanda_segreta` int(11) NOT NULL,
  `risposta` varchar(150) NOT NULL,
  `referente` varchar(150) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `api` varchar(150) NOT NULL,
  `google` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `utente`, `password`, `mail`, `stato`, `timestamp`, `admin`, `domanda_segreta`, `risposta`, `referente`, `nome`, `cognome`, `api`, `google`) VALUES
(1, 'admin', '0152e738d8cbeb0abef0091d7b6f4753', 'a.mereu@intraspa.it', 1, '2020-11-20 10:47:23', 1, 2, '344234', ' ', '', '', '  AIzaSyAUr1b2hGIKh3QZ-t54tMCzppae9MXZYa8', '7n8a9on71kcbdv8jbdkfi689n4@group.calendar.google.com'),
(51, 'fspanu', '75a936d9d069aa5fbba50313ddb7ec3e', '   spanuf@gmail.com', 0, '2020-08-04 17:22:37', 0, 0, '', 'Floriana Spanu', 'Floriana', 'Spanu', '   AIzaSyA0Z-zGb244qPzrJESI4urdA-Dt2TzYQjw', '    jlh00bh4e9g6ml0eu3csinj59c@group.calendar.google.com'),
(52, 'amereu', 'bacc7644c169f94a606d52bc6972dba4', 'daenith@gmail.com', 0, '', 0, 0, '', 'Anna Mereu', 'Anna', 'Mereu', '', ''),
(53, 'fmaugeri', '0581938f0767a65b373cea80e905c25f', 'fmaugeri@intraspa.it', 1, '2020-08-06 08:49:13', 0, 0, '', 'Francesco Maugeri', 'Francesco', 'Maugeri', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
