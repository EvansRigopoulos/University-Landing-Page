-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 19 Μαρ 2021 στις 23:52:43
-- Έκδοση διακομιστή: 10.4.17-MariaDB
-- Έκδοση PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `rigopoulose_std108116`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(10) NOT NULL,
  `user_id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `ects` int(10) NOT NULL,
  `type` set('Υποχρεωτικό','Επιλογής','','') NOT NULL,
  `semester` set('1','2','3','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `user_id`, `title`, `description`, `ects`, `type`, `semester`) VALUES
(14, 95, 'Pascal', 'Είναι μία δομημένη γλώσσα με ιδιαίτερο χαρακτηριστικό τη δυνατότητα ορισμού από τον προγραμματιστή δικών του δομών δεδομένων', 5, 'Υποχρεωτικό', '1'),
(16, 16, 'C programming language', 'Η C είναι μια διαδικαστική γλώσσα προγραμματισμού γενικής χρήσης', 5, 'Υποχρεωτικό', '1'),
(17, 93, 'C++', 'Η C++ είναι μία γενικού σκοπού γλώσσα προγραμματισμού Η/Υ. Θεωρείται μέσου επιπέδου γλώσσα, καθώς περιλαμβάνει έναν συνδυασμό χαρακτηριστικών από γλώσσες υψηλού και χαμηλού επιπέδου', 5, 'Υποχρεωτικό', '1'),
(18, 92, 'Lisp', 'Lisp ονομάζεται μια οικογένεια γλωσσών προγραμματισμού υπολογιστών με μεγάλη ιστορία και χαρακτηριστική σύνταξη με πλήρεις παρενθέσεις', 5, 'Υποχρεωτικό', '2'),
(19, 92, 'Prolog', 'Η Prolog είναι μια γλώσσα λογικού προγραμματισμού γενικής χρήσης που κυρίως χρησιμοποιείται στον τομέα της τεχνητής νοημοσύνης', 5, 'Υποχρεωτικό', '2'),
(20, 93, 'ADA', 'Η Ada είναι αντικειμενοστραφής γλώσσα προγραμματισμού υψηλού επιπέδου', 5, 'Υποχρεωτικό', '2'),
(21, 92, 'Python', 'Η Python είναι διερμηνευόμενη, γενικού σκοπού και υψηλού επιπέδου, γλώσσα προγραμματισμού.', 5, 'Υποχρεωτικό', '3'),
(22, 93, 'Go', 'H Go είναι μια στατικά δακτυλογραφημένη, μεταγλωττισμένη γλώσσα προγραμματισμού που σχεδιάστηκε στο Google από τους Robert Griesemer, Rob Pike και Ken Thompson. ', 5, 'Υποχρεωτικό', '3'),
(23, 95, 'Java', 'Η Java είναι ένα σύνολο λογισμικού και προδιαγραφών υπολογιστών που αναπτύχθηκε από τον James Gosling στο Sun Microsystems', 5, 'Επιλογής', '3'),
(24, 16, 'Ruby', 'Η Ruby είναι μια δυναμική, ανακλαστική, αντικειμενοστραφής γλώσσα προγραμματισμού γενικής χρήσης, που συνδυάζει μια σύνταξη επηρεασμένη από την Perl με χαρακτηριστικά από τη Smalltalk.', 5, 'Επιλογής', '3');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `records`
--

CREATE TABLE `records` (
  `record_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `lesson_id` int(10) DEFAULT NULL,
  `status` set('Εγγεγραμμενος/η','Μη Εγγεγραμμενος/η') DEFAULT NULL,
  `grade` set('1','2','3','4','5','6','7','8','9','10') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `records`
--

INSERT INTO `records` (`record_id`, `user_id`, `lesson_id`, `status`, `grade`) VALUES
(1, 37, 17, 'Μη Εγγεγραμμενος/η', '7'),
(2, 37, 14, 'Μη Εγγεγραμμενος/η', '10'),
(3, 96, 16, 'Εγγεγραμμενος/η', NULL),
(4, 37, 16, 'Μη Εγγεγραμμενος/η', '9'),
(6, 37, 18, 'Εγγεγραμμενος/η', NULL),
(7, 37, 19, 'Εγγεγραμμενος/η', NULL),
(8, 37, 20, 'Εγγεγραμμενος/η', NULL),
(9, 37, 21, 'Μη Εγγεγραμμενος/η', NULL),
(10, 37, 22, 'Μη Εγγεγραμμενος/η', NULL),
(11, 37, 24, 'Μη Εγγεγραμμενος/η', NULL),
(12, 37, 23, 'Μη Εγγεγραμμενος/η', NULL),
(13, 96, 17, 'Μη Εγγεγραμμενος/η', '6'),
(14, 96, 18, 'Εγγεγραμμενος/η', ''),
(15, 96, 14, 'Μη Εγγεγραμμενος/η', '7'),
(16, 96, 19, 'Μη Εγγεγραμμενος/η', NULL),
(17, 96, 20, 'Μη Εγγεγραμμενος/η', NULL),
(18, 96, 21, 'Μη Εγγεγραμμενος/η', NULL),
(19, 96, 22, 'Μη Εγγεγραμμενος/η', NULL),
(20, 96, 23, 'Μη Εγγεγραμμενος/η', NULL),
(21, 96, 24, 'Μη Εγγεγραμμενος/η', NULL),
(22, 97, 14, 'Εγγεγραμμενος/η', NULL),
(23, 97, 16, 'Μη Εγγεγραμμενος/η', '5'),
(24, 97, 17, 'Εγγεγραμμενος/η', NULL),
(25, 97, 18, 'Μη Εγγεγραμμενος/η', NULL),
(26, 97, 19, 'Μη Εγγεγραμμενος/η', NULL),
(27, 97, 20, 'Μη Εγγεγραμμενος/η', NULL),
(28, 97, 21, 'Μη Εγγεγραμμενος/η', NULL),
(29, 97, 22, 'Μη Εγγεγραμμενος/η', NULL),
(30, 97, 23, '', NULL),
(31, 97, 24, 'Μη Εγγεγραμμενος/η', NULL),
(32, 98, 14, 'Μη Εγγεγραμμενος/η', '6'),
(33, 98, 16, 'Μη Εγγεγραμμενος/η', '7'),
(34, 98, 17, 'Μη Εγγεγραμμενος/η', '6'),
(35, 98, 18, 'Εγγεγραμμενος/η', NULL),
(36, 98, 19, 'Εγγεγραμμενος/η', NULL),
(37, 98, 20, 'Εγγεγραμμενος/η', NULL),
(38, 98, 21, 'Μη Εγγεγραμμενος/η', NULL),
(39, 98, 22, 'Μη Εγγεγραμμενος/η', NULL),
(40, 98, 23, 'Μη Εγγεγραμμενος/η', NULL),
(41, 98, 24, 'Μη Εγγεγραμμενος/η', NULL),
(42, 99, 14, 'Μη Εγγεγραμμενος/η', '6'),
(43, 99, 16, 'Μη Εγγεγραμμενος/η', '8'),
(44, 99, 17, 'Μη Εγγεγραμμενος/η', '6'),
(45, 99, 18, 'Μη Εγγεγραμμενος/η', '9'),
(46, 99, 19, 'Μη Εγγεγραμμενος/η', '6'),
(47, 99, 20, 'Μη Εγγεγραμμενος/η', '7'),
(48, 99, 21, 'Εγγεγραμμενος/η', NULL),
(49, 99, 22, 'Εγγεγραμμενος/η', NULL),
(50, 99, 23, 'Μη Εγγεγραμμενος/η', '7'),
(51, 99, 24, 'Μη Εγγεγραμμενος/η', NULL),
(52, 100, 14, 'Μη Εγγεγραμμενος/η', '7'),
(53, 100, 16, 'Μη Εγγεγραμμενος/η', '9'),
(54, 100, 17, 'Μη Εγγεγραμμενος/η', '8'),
(55, 100, 18, 'Μη Εγγεγραμμενος/η', '6'),
(56, 100, 19, 'Μη Εγγεγραμμενος/η', '6'),
(57, 100, 20, 'Μη Εγγεγραμμενος/η', '7'),
(58, 100, 21, 'Εγγεγραμμενος/η', NULL),
(59, 100, 22, 'Εγγεγραμμενος/η', NULL),
(60, 100, 23, 'Μη Εγγεγραμμενος/η', NULL),
(61, 100, 24, 'Μη Εγγεγραμμενος/η', '6');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `semester`
--

CREATE TABLE `semester` (
  `user_id` int(50) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `semester` set('1','2','3','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `semester`
--

INSERT INTO `semester` (`user_id`, `semester_id`, `semester`) VALUES
(37, 12, '2'),
(96, 14, '2'),
(97, 15, '1'),
(98, 16, '2'),
(99, 17, '3'),
(100, 18, '3');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `role` set('Administrator','Student','Professor') NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `register_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`user_id`, `name`, `lastname`, `Email`, `Password`, `role`, `mobile`, `address`, `birth_date`, `register_date`, `register_number`) VALUES
(1, 'Evangelos', 'Rigopoulos', 'admin@eap.gr', 'admin1234                         ', 'Administrator', '6977240090', 'Athens2', '1982-12-26', '2021-02-17', '1'),
(16, 'Andi', 'Gutmans', 'andigutmans@eap.gr', 'andi1234', 'Professor', NULL, NULL, NULL, '2021-02-22', 'usr20210222184335'),
(37, 'Ευάγγελος', 'Ρηγόπουλος', 'evansrigopoulos@eap.gr', 'rigopoulos1234              ', 'Student', '6977240090', 'Στίλπωνος 13', '1982-12-26', '2021-02-22', 'usr20210222194844'),
(92, 'Guido', 'van Rossum', 'rossum@eap.gr', 'rosum1234', 'Professor', NULL, NULL, NULL, '2021-02-22', 'usr20210222220035'),
(93, 'Ken', 'Tompson', 'kthompson@eap.gr', 'kthompson1234', 'Professor', NULL, NULL, NULL, '2021-02-22', 'usr20210222220240'),
(95, 'Linus', 'Torvalds', 'ltorvalds@eap.gr', 'ltorvalds1234', 'Professor', NULL, NULL, NULL, '2021-02-22', 'usr20210222220638'),
(96, 'Άγγελος', 'Αγγέλου', 'aggelou@eap.gr', 'aggelou1234', 'Student', NULL, NULL, NULL, '2021-02-26', '	usr20210222194955	'),
(97, 'Βασίλης ', 'Βασιλείου', 'vasileiou@eap.gr', 'vasileiou1234', 'Student', NULL, NULL, NULL, '2021-03-07', 'usr20210307212127'),
(98, 'Γιώργος ', 'Γεωργίου', 'georgiou@eap.gr', 'georgiou1234', 'Student', NULL, NULL, NULL, '2021-03-07', 'usr20210307212315'),
(99, 'Δημήτρης ', 'Δημητρίου', 'dimitriou@eap.gr', 'dimitriou1234', 'Student', NULL, NULL, NULL, '2021-03-07', 'usr20210307212352'),
(100, 'Ηλίας ', 'Ηλίου', 'iliou@eap.gr', 'iliou1234', 'Student', NULL, NULL, NULL, '2021-03-07', 'usr20210307212611'),
(101, 'Junio', 'Hamano', 'Hamano@eap.gr', 'Hamano1234', 'Administrator', NULL, NULL, NULL, '2021-03-09', 'usr20210309223202'),
(102, 'Elizabeth', 'Feinler', 'Feinler@eap.gr', 'Feinler1234', 'Administrator', NULL, NULL, NULL, '2021-03-09', 'usr20210309223252');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `user` (`user_id`);

--
-- Ευρετήρια για πίνακα `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Ευρετήρια για πίνακα `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`),
  ADD KEY `user` (`user_id`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT για πίνακα `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT για πίνακα `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT για πίνακα `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Περιορισμοί για πίνακα `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `records_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`);

--
-- Περιορισμοί για πίνακα `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
