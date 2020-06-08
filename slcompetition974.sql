-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 08 Juin 2020 à 15:54
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `slcompetition974`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_histo`
--

CREATE TABLE `admin_histo` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `codepostal` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `date_histo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `utilisateur_histo` varchar(255) NOT NULL,
  `evenement_histo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin_histo`
--

INSERT INTO `admin_histo` (`Id`, `Nom`, `Prenom`, `email`, `login`, `motdepasse`, `codepostal`, `Pays`, `date_histo`, `utilisateur_histo`, `evenement_histo`) VALUES
(2, 'Guichard', 'Pascal ', 'wilsonbnc974@gmail.com', 'feli1', '202cb962ac59075b964b07152d234b70', '97421', 'Japon', '2020-06-08 09:07:17', 'root@localhost', 'DELETE'),
(3, 'Mahon', 'Thomas', 'tom@mail.com', 'tom01', '202cb962ac59075b964b07152d234b70', '97450', 'France', '2020-05-22 13:53:16', 'root@localhost', 'DELETE'),
(4, 'Adras', 'Romai', 'rom1@mail.com', 'rom1', '123', '97420', 'France', '2020-05-22 13:22:18', 'root@localhost', 'DELETE'),
(5, 'Wilson', 'Garnier', 'wilsonbnc974@gmail.com', 'wil1', '202cb962ac59075b964b07152d234b70', '97450', 'Japon', '2020-05-22 13:51:04', 'root@localhost', 'DELETE'),
(6, 'Wilson', 'Garnier', 'wilsonbnc974@gmail.com', 'Garnier', '202cb962ac59075b964b07152d234b70', '97450', 'Japon', '2020-05-22 13:54:19', 'root@localhost', 'DELETE'),
(7, 'Wilson', 'Garnier', 'wilsonbnc974@gmail.com', 'Garnier', '25ddc0f8c9d3e22e03d3076f98d83cb2', '97450', 'Japon', '2020-05-22 13:55:40', 'root@localhost', 'DELETE'),
(8, 'Mahon', 'Thomas', 'tomfab974@gmail.com', 'tom1', '202cb962ac59075b964b07152d234b70', '97450', 'France', '2020-06-07 10:15:01', 'root@localhost', 'DELETE'),
(9, 'Wilson', 'Garnier', 'wilsonbnc974@gmail.com', 'feli1', '202cb962ac59075b964b07152d234b70', '97450', 'Reunion', '2020-06-08 10:34:30', 'root@localhost', 'DELETE');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `codepostal` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`Id`, `Nom`, `Prenom`, `email`, `login`, `motdepasse`, `codepostal`, `Pays`) VALUES
(3, 'Gravier', 'Erickson', 'erickson31@mail.com', 'erickson974', '202cb962ac59075b964b07152d234b70', '97450', 'France'),
(4, 'Adras', 'Romain', 'romainadras66@gmail.com', 'rom1', '202cb962ac59075b964b07152d234b70', '97421', 'France'),
(5, 'Kemma', 'Kévin', 'kev10@mail.com', 'kev1', '202cb962ac59075b964b07152d234b70', '97421', 'France'),
(6, 'Kemma', 'Kévin', 'kev10@mail.com', 'kev1', '202cb962ac59075b964b07152d234b70', '97421', 'France'),
(7, 'Wilson', 'Garnier', 'wilsonbnc974@gmail.com', 'feli1', '202cb962ac59075b964b07152d234b70', '97450', 'Reunion'),
(8, 'Wilson', 'Garnier', 'wilsonbnc974@gmail.com', 'feli1', '202cb962ac59075b964b07152d234b70', '97450', 'Reunion');

--
-- Déclencheurs `client`
--
DELIMITER $$
CREATE TRIGGER `after_delete_user` AFTER DELETE ON `client` FOR EACH ROW BEGIN
    INSERT INTO admin_histo (
        Id, 
         Nom, 
        Prenom, 
        email, 
        login, 
        motdepasse, 
        codepostal, 
        Pays, 
       

        date_histo, 
        utilisateur_histo, 
        evenement_histo)
    VALUES (
        OLD.Id,
        OLD.Nom,
        OLD.Prenom,
        OLD.email,
        OLD.login,
        OLD.motdepasse,
        OLD.codepostal,
        OLD.Pays,
       

        NOW(),
        CURRENT_USER(),
        'DELETE');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_client` AFTER UPDATE ON `client` FOR EACH ROW BEGIN
    INSERT INTO historique (
        Id, 
        Nom, 
        Prenom, 
        email, 
        login, 
        motdepasse, 
        codepostal, 
        Pays, 
       
        date_histo, 
        utilisateur_histo, 
        evenement_histo)
    VALUES (
        OLD.Id,
        OLD.Nom,
        OLD.Prenom,
        OLD.email,
        OLD.login,
        OLD.motdepasse,
        OLD.codepostal,
        OLD.Pays,
       
        NOW(),
        CURRENT_USER(),
        'UPDATE');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `Id` int(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `codepostal` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `date_histo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `utilisateur_histo` varchar(255) NOT NULL,
  `evenement_histo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`Id`, `Nom`, `Prenom`, `email`, `login`, `motdepasse`, `codepostal`, `Pays`, `date_histo`, `utilisateur_histo`, `evenement_histo`) VALUES
(0, 'Udy', 'Pascal ', 'wilsonbnc974@gmail.com', 'feli1', '202cb962ac59075b964b07152d234b70', '97421', 'Japon', '2020-05-22 13:13:55', 'root@localhost', 'UPDATE'),
(2, 'Udyr', 'Pascal ', 'wilsonbnc974@gmail.com', 'feli1', '202cb962ac59075b964b07152d234b70', '97421', 'Japon', '2020-05-22 13:15:43', 'root@localhost', 'UPDATE'),
(2, 'Kaisa', 'Pascal ', 'wilsonbnc974@gmail.com', 'feli1', '202cb962ac59075b964b07152d234b70', '97421', 'Japon', '2020-05-22 13:16:37', 'root@localhost', 'UPDATE');

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

CREATE TABLE `pieces` (
  `Id_piece` int(11) NOT NULL,
  `Nom_piece` varchar(255) NOT NULL,
  `Description_piece` text NOT NULL,
  `Image_pieces` varchar(255) NOT NULL,
  `Prix_piece` float NOT NULL,
  `Quantite_piece` int(10) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `idprod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pieces`
--

INSERT INTO `pieces` (`Id_piece`, `Nom_piece`, `Description_piece`, `Image_pieces`, `Prix_piece`, `Quantite_piece`, `categorie`, `idprod`) VALUES
(1, 'Combiné Seat Cupra', 'Kit combiné fileté Bilstein B14 pour SEAT Ibiza (6L) Cupra R, moteur 1.9 TDI 160cv de Mars 2004 à Février 2008.', '<img src="image/Produit/cupra.jpg" width="50%" >\n', 995.9, 3, 'combine', 'combineseat'),
(3, 'Combiné Golf mk4 R32', 'Kit combiné fileté Bilstein B16 PSS9 pour VOLKSWAGEN Golf 4 R32 3.2 4 Motion \r\n', '<img src="./image/Produit/combinégolf4r32.jpg" width="50%" >\n', 1010.82, 1, 'combine', 'combiner32'),
(5, 'Ligne Golf 7 R', 'ECHAPPEMENT VALVETRONIC\r\nInclus :\r\n- X-Pipe\r\n- Kit Telecommande des Valves.\r\n', '<img src="./image/Produit/lignegolf.jpg" width="70%" >\n', 3090, 7, 'ligne', 'lignegolf7r'),
(8, 'Échangeur 208 1.6 THP  ', '\r\nIntercooler / échangeur FORGE pour PEUGEOT 208 GTI 1.6 THP 200cv 208cv ', '<img src="./image/Produit/echangeur208gti.jpg" width="50%" >\n', 846.9, 6, 'echangeur', 'echangeur208'),
(11, 'Echangeur Subaru STI', '\r\nIntercooler MISHIMOTO en remplacement de l\'origine.', '<img src="./image/Produit/echangeursubaru.jpg" width="50%" >\n', 684.7, 4, 'echangeur', 'echangeursuburasti'),
(12, 'Turbo Garrett GT3076R', 'Turbo Garrett GT3076R sur roulements\r\nWastegate externe\r\n\r\n', '<img src="./image/Produit/turbovf22.jpg" width="70%" >', 1200, 3, 'turbo', 'turbogt3076r'),
(13, 'TURBO TD04', 'Turbo des Subaru WRX STi USDM 06-07\r\n\r\nFull Boost vers 3000-3500 tr/min\r\n', '<img src="./image/Produit/turbovf.jpg" width="70%" >', 1495, 2, 'turbo', 'turbotd04'),
(14, 'Ligne Audi RS3', 'DEMI-LIGNE / CAT-BACK Ligne d\'échappement MILLTEK SPORT.', '<img src="./image/Produit/ligneaudirs3.jpg" width="70%" >', 2180, 2, 'ligne', 'ligners3'),
(15, 'Ligne GOLF 7 GTI', '- Modèle: Golf MK7 GTi (Et Modeles GTi Performance Pack)- Année: 2013\r\n', '<img src="./image/Produit/lignegolf.jpg" width="70%" >', 1206, 1, 'ligne', 'lignegolf7gti'),
(16, 'Turbo GARETT 1.9 TDI', 'Ce turbo est compatible avec les motorisations 1.9 TDI 100 CV et 1.9 TDI 110 CV', '<img src="./image/Produit/turbogarettdi.jpg" width="50%" >', 360, 6, 'turbo', 'turbogarett1.9tdi'),
(17, 'Turbo Garett D\'Origine S3', 'Ce  turbo est compatible avec les motorisations 1.8 TFSI 170 CV, 1.8 TSI ', '<img src="./image/Produit/turbogarettaudis3.jpg" width="50%" >', 990, 1, 'turbo', 'turbogaretts3');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_membre`
--

CREATE TABLE `tbl_membre` (
  `id_mbr` int(8) NOT NULL,
  `pseudo_mbr` varchar(255) NOT NULL,
  `nom_mbr` varchar(255) NOT NULL,
  `afficher_mbr` varchar(255) NOT NULL,
  `mdp_mbr` varchar(255) NOT NULL,
  `email_mbr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_membre`
--

INSERT INTO `tbl_membre` (`id_mbr`, `pseudo_mbr`, `nom_mbr`, `afficher_mbr`, `mdp_mbr`, `email_mbr`) VALUES
(2, 'bts', 'Admin@SL-COMPETITION', 'Administrateur', '017fe3a523712ceba7cde169653316e9', 'btssio@lpp.re');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin_histo`
--
ALTER TABLE `admin_histo`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`date_histo`);

--
-- Index pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`Id_piece`),
  ADD UNIQUE KEY `idprod` (`idprod`);

--
-- Index pour la table `tbl_membre`
--
ALTER TABLE `tbl_membre`
  ADD PRIMARY KEY (`id_mbr`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin_histo`
--
ALTER TABLE `admin_histo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `pieces`
--
ALTER TABLE `pieces`
  MODIFY `Id_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `tbl_membre`
--
ALTER TABLE `tbl_membre`
  MODIFY `id_mbr` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
