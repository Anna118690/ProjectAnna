-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 09:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookercoursegood`
--

--
-- Dumping data for table `approach`
--

INSERT INTO `approach` (`id`, `approach`, `description`) VALUES
(3, 'Child', 'Apparoach Child'),
(4, 'Adult', 'Approach Adult');

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `language_id`, `level_id`, `approach_id`, `user_id`, `namecourse`, `short_desc`, `description`, `price_actual_hour`, `price_actual_hour_sans_tva`, `course_photo`) VALUES
(1, 1, 1, 4, 2, 'Elementary English', 'Elementary English', 'Description long Elementary English', '16.00', '13.00', 'd6194c1f3823b344148282d6f1148a58.jpeg'),
(2, 2, 1, 4, 2, 'Dutch Beginner', 'Description short Dutch Beginner', 'Description long Dutch Beginner', '17.00', '12.00', '95c6698ab854d09caead051beecfc597.png'),
(3, 3, 1, 3, 2, 'French Beginner', 'Description short French Beginner', 'Description long French Beginner', '18.00', '12.00', 'e9ec05b97064a205a211fb5ebc9ca9a9.png'),
(4, 1, 5, 4, 2, 'English Speaking Improvement', 'Description short English Speaking Improvement', 'Description long English Speaking Improvement', '18.00', '15.00', '9cecf9518a3ff91cb6caaee53c581802.jpeg'),
(5, 2, 4, 3, 2, 'Dutch Improve Speaking', 'Description short Dutch Improve Speaking', 'Description long Dutch Improve Speaking', '18.00', '12.00', 'e6403577a1a70c330e7dc08e11cee722.jpeg'),
(6, 3, 3, 3, 2, 'French Improve Speaking', 'Description short French Improve Speaking', 'Description long French Improve Speaking', '19.00', '15.00', '55ed02ffbbe777a7889b29f5d849ac08.jpeg'),
(7, 1, 2, 3, 2, 'Elementary english for beginners', 'Description short Elementary english for beginners', 'Description long Elementary english for beginners', '20.00', '15.00', '733d8ade49c0b6532069504c230b6d4f.jpeg'),
(8, 3, 8, 4, 2, 'French Improve Writing', 'Description short French Improve Writing', 'Description long French Improve Writing', '19.00', '13.00', '29efd0a82e4e215c5686085c45507d9d.jpeg');

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language`, `description`) VALUES
(1, 'English', 'desc english'),
(2, 'Dutch', 'desc dutch'),
(3, 'French', 'Desc french');

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `description`) VALUES
(1, 'Elementary A1', 'beginner'),
(2, 'Elementary A2', 'Beginner'),
(3, 'Pre-Intermediate B1.1', 'preintermediate'),
(4, 'Pre-Intermediate B1.2', 'pre'),
(5, 'Intermediate B1.3', 'inter'),
(6, 'Intermediate B1.4', 'pre'),
(7, 'Advanced C1', 'adv'),
(8, 'Upper-Intermediate B2.2', NULL);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `telephone`, `photo`, `skype`) VALUES
(1, 'anna5@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$eVlZVk05N0VJNE4vaUFZag$+qJAlGFpnS0OsGk98yePGNce7/HZwsxMYmfe8OJ+7Us', 'Anna', 'Laskowska', '789456123', '7144a46332ac4925abe164310352bc1f.jpeg', 'anna1457'),
(2, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$TTRpOEVudmtFYVMub1JqZA$m0wSyfeXnLl+9pPf3ZTuc3g7n4ZCK0ou1+ltRD9/7x4', 'admin', 'admin', '789845666', '339d1306c63d91fc2239e8c5d577abe1.jpeg', 'admin5'),
(3, 'czech@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$RHgwZTl5L3lacENVUXExQQ$PJuRTh6CUBLoKTRqzRzaMSY7BfWHABDaAAE+GnTdtCU', 'Maria', 'Czech', '1234567', 'a88843fd0fc84449124bd188f87438db.jpeg', 'czech@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
