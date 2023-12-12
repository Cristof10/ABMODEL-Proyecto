-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 11:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diccionario`
--

-- --------------------------------------------------------

--
-- Table structure for table `morfema`
--

CREATE TABLE `morfema` (
  `morfemaID` int(10) NOT NULL,
  `morfemaSanskrit` varchar(200) NOT NULL,
  `morfemaSpanish` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `morfema`
--

INSERT INTO `morfema` (`morfemaID`, `morfemaSanskrit`, `morfemaSpanish`) VALUES
(1, 'Asana', 'postura'),
(2, 'Adho', 'abajo'),
(3, 'Ardha', 'mitad'),
(4, 'Urdhva', 'arriba'),
(5, 'Mukha', 'rostro'),
(6, 'Svana', 'perro'),
(7, 'Virabhadra', 'guerrero'),
(8, 'Vriksha', 'árbol'),
(9, 'Bala', 'niño'),
(10, 'Bhujanga', 'cobra'),
(11, 'Paschi', 'oeste'),
(12, 'Setu', 'puente'),
(13, 'Shava', 'cadáver'),
(14, 'Trikona', 'triángulo'),
(15, 'Matsya', 'pez'),
(16, 'Mala', 'guirnalda'),
(17, 'Eka', 'uno'),
(18, 'Pada', 'pie'),
(19, 'Raja', 'real'),
(20, 'Kapota', 'paloma'),
(21, 'Hasta', 'mano'),
(22, 'Parivrtta', 'invertido'),
(23, 'Janu', 'rodilla'),
(24, 'Sirsa', 'cabeza');

-- --------------------------------------------------------

--
-- Table structure for table `postura`
--

CREATE TABLE `postura` (
  `terminoID` int(10) NOT NULL,
  `terminoEnglish` varchar(500) DEFAULT NULL,
  `terminoSanskrit` varchar(500) DEFAULT NULL,
  `terminoSpanish` varchar(500) DEFAULT NULL,
  `imagenURL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `postura`
--

INSERT INTO `postura` (`terminoID`, `terminoEnglish`, `terminoSanskrit`, `terminoSpanish`, `imagenURL`) VALUES
(1, 'Mountain Pose', 'Tadasana\r\n', 'Postura de la Montaña', '1.Tadasana.png'),
(2, 'Downward-Facing Dog', 'Adho Mukha Svanasana', 'Perro mirando hacia abajo', '2.Adho-Mukha-Svanasana.png'),
(3, 'Warrior I', 'Virabhadrasana I', 'Guerrero I', '3.Virabhadrasana-I.png'),
(4, 'Warrior II', 'Virabhadrasana II', ' Guerrero II', '4.Virabhadrasana-II.png'),
(5, 'Tree Pose', 'Vrikshasana', 'Postura del Árbol', '5.Vrikshasana.png'),
(6, 'Child\'s Pose', 'Balasana', 'Postura del Niño', '6.Balasana.png'),
(7, 'Half Cobra Pose', 'Ardha Bhujangasana', 'Postura de la Cobra a la mitad', '7.Ardha-Bhujangasana.png'),
(8, 'Seated Forward Bend', 'Paschimottanasana', 'Flexión hacia adelante sentado', '8.Paschimottanasana.png'),
(9, 'Bridge Pose', 'Setu Bandhasana', 'Postura del Puente', '9.Setu-Bandhasana.png'),
(10, 'Corpse Pose', 'Shavasana', 'Postura del Cadáver', '10.Shavasana.png'),
(11, 'Triangle Pose', 'Trikonasana', 'Postura del Triángulo', '11.Trikonasana.png'),
(12, 'Plank Pose', 'Kumbhakasana', 'Postura de la Plancha', '12.Kumbhakasana.png'),
(13, 'Upward-Facing Dog', 'Urdhva Mukha Svanasana', 'Perro mirando hacia arriba', '13.Urdhva-Mukha-Svanasana.png'),
(14, 'Fish Pose', 'Matsyasana', 'Postura del Pez', '14.Matsyasana.png'),
(15, 'Chair Pose', 'Utkatasana', 'Postura de la Silla', '15.Utkatasana.png'),
(16, 'Garland Pose', 'Malasana', 'Postura de la Guirnalda', '16.Malasana.png'),
(17, 'Pigeon Pose', 'Eka Pada Rajakapotasana', 'Postura de la Paloma', '17.Eka-Pada-Rajakapotasana.png'),
(18, 'Upward Salute', 'Urdhva Hastasana', 'Saludo hacia arriba', '18.Urdhva-Hastasana.png'),
(19, 'Revolved Triangle Pose', 'Parivrtta Trikonasana', 'Postura del Triángulo Invertido', '19.Parivrtta-Trikonasana.png'),
(20, 'Revolved Head To Knee Pose', 'Parivrtta Janu Sirsasana', 'Postura de la Cabeza a la Rodilla Invertida', '20.Parivrtta-Janu-Sirsasana.png');

-- --------------------------------------------------------

--
-- Table structure for table `relacion_postura_morfema`
--

CREATE TABLE `relacion_postura_morfema` (
  `relacionID` int(11) NOT NULL,
  `terminoID` int(11) DEFAULT NULL,
  `morfemaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `relacion_postura_morfema`
--

INSERT INTO `relacion_postura_morfema` (`relacionID`, `terminoID`, `morfemaID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 2, 5),
(5, 2, 6),
(6, 3, 1),
(7, 3, 7),
(8, 4, 1),
(9, 4, 7),
(10, 5, 1),
(11, 5, 8),
(12, 6, 1),
(13, 6, 9),
(14, 7, 1),
(15, 7, 10),
(16, 8, 1),
(17, 8, 11),
(18, 9, 1),
(19, 9, 12),
(20, 10, 1),
(21, 10, 13),
(22, 11, 1),
(23, 11, 14),
(24, 12, 1),
(25, 12, 17),
(26, 13, 1),
(27, 13, 6),
(28, 14, 1),
(29, 14, 15),
(30, 15, 1),
(31, 15, 17),
(32, 16, 1),
(33, 16, 16),
(34, 17, 1),
(35, 17, 20),
(36, 18, 1),
(37, 18, 22),
(38, 19, 1),
(39, 19, 23),
(40, 20, 1),
(41, 20, 24),
(42, 13, 4),
(43, 13, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `morfema`
--
ALTER TABLE `morfema`
  ADD PRIMARY KEY (`morfemaID`);

--
-- Indexes for table `postura`
--
ALTER TABLE `postura`
  ADD PRIMARY KEY (`terminoID`);

--
-- Indexes for table `relacion_postura_morfema`
--
ALTER TABLE `relacion_postura_morfema`
  ADD PRIMARY KEY (`relacionID`),
  ADD KEY `terminoID` (`terminoID`),
  ADD KEY `morfemaID` (`morfemaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `morfema`
--
ALTER TABLE `morfema`
  MODIFY `morfemaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `postura`
--
ALTER TABLE `postura`
  MODIFY `terminoID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `relacion_postura_morfema`
--
ALTER TABLE `relacion_postura_morfema`
  MODIFY `relacionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relacion_postura_morfema`
--
ALTER TABLE `relacion_postura_morfema`
  ADD CONSTRAINT `relacion_postura_morfema_ibfk_1` FOREIGN KEY (`terminoID`) REFERENCES `postura` (`terminoID`),
  ADD CONSTRAINT `relacion_postura_morfema_ibfk_2` FOREIGN KEY (`morfemaID`) REFERENCES `morfema` (`morfemaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
