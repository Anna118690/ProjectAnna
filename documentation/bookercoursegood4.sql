-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 02:43 PM
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
-- Database: `bookercoursegood4`
--

--
-- Dumping data for table `approach`
--

INSERT INTO `approach` (`id`, `approach`, `description`) VALUES
(3, 'Child', 'Apparoach Child'),
(4, 'Adult', 'Approach Adult');

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_comment_id`, `course_id`, `description`, `date`) VALUES
(1, 2, 1, 'Very good course, I recommend it !', '2020-04-26 20:53:20'),
(3, 4, 1, 'I like this course', '2020-04-27 21:32:49'),
(4, 2, 1, 'aaaaa', '2020-05-04 16:02:24'),
(5, 5, 4, 'Not boring lessons, teacher pays a lot of attention to you', '2020-05-10 12:46:17');

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `language_id`, `level_id`, `approach_id`, `user_id`, `namecourse`, `short_desc`, `description`, `price_actual_hour`, `price_actual_hour_sans_tva`, `course_photo`) VALUES
(1, 1, 1, 4, 6, 'Elementary English', 'Elementary English', 'Description long Elementary English', '16.00', '13.00', 'd6194c1f3823b344148282d6f1148a58.jpeg'),
(2, 2, 1, 4, 7, 'Dutch Beginner', 'Description short Dutch Beginner', 'Description long Dutch Beginner', '17.00', '12.00', '95c6698ab854d09caead051beecfc597.png'),
(3, 3, 1, 3, 8, 'French Beginner', 'Description short French Beginner', 'Description long French Beginner', '18.00', '12.00', 'e9ec05b97064a205a211fb5ebc9ca9a9.png'),
(4, 1, 5, 4, 6, 'English Speaking Improvement', 'Description short English Speaking Improvement', 'Description long English Speaking Improvement', '18.00', '15.00', '9cecf9518a3ff91cb6caaee53c581802.jpeg'),
(5, 2, 4, 3, 7, 'Dutch Improve Speaking', 'Description short Dutch Improve Speaking', 'Description long Dutch Improve Speaking', '18.00', '12.00', 'e6403577a1a70c330e7dc08e11cee722.jpeg'),
(6, 3, 3, 3, 8, 'French Improve Speaking', 'Description short French Improve Speaking', 'Description long French Improve Speaking', '19.00', '15.00', '55ed02ffbbe777a7889b29f5d849ac08.jpeg'),
(7, 1, 2, 3, 6, 'Elementary english for beginners', 'Description short Elementary english for beginners', 'Description long Elementary english for beginners', '20.00', '15.00', '733d8ade49c0b6532069504c230b6d4f.jpeg'),
(8, 3, 8, 4, 8, 'French Improve Writing', 'Description short French Improve Writing', 'Description long French Improve Writing', '19.00', '13.00', '29efd0a82e4e215c5686085c45507d9d.jpeg'),
(9, 1, 6, 4, 6, 'English Conversations', 'English Conversations', 'English Conversations - practice speaking', '20.00', '15.00', '0d8f43786d693f9499e378e323da897d.jpeg');

--
-- Dumping data for table `data_file`
--

INSERT INTO `data_file` (`id`, `course_id`, `name`, `description`, `link`) VALUES
(1, 3, 'Grammatica', 'Grammar exercices', 'daee6d229aace4a0b2dbe3d84c8dfdae.docx'),
(2, 3, 'Exercices grammar', 'Grammar exercices', '84bb242e9ccfabc57edaed9321432f67.docx'),
(3, 2, 'Exercices grammar', 'Grammar exercices', 'f44093aa763515f7a5e9837df1ac75dc.docx'),
(4, 2, 'Oefeningen deel 1', 'Oefeningen deel 1 dutch beginner', 'df959e92376e3515955241ae0ffc4c7c.docx'),
(5, 5, 'Oefeningen spreken 1', 'Oefeningen spreken 1 deel a', '472371526efd6c4ea611b219bc2d8ea2.docx');

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
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200426155708', '2020-04-26 15:57:17'),
('20200426184631', '2020-04-26 18:46:43'),
('20200508092344', '2020-05-08 09:23:55'),
('20200508092838', '2020-05-08 09:28:49'),
('20200508152126', '2020-05-08 15:21:49'),
('20200510081832', '2020-05-10 08:18:42');

--
-- Dumping data for table `ordercourse`
--

INSERT INTO `ordercourse` (`id`, `student_id`, `reservation_id`, `createdat`, `total`, `status`) VALUES
(1, 1, 1, '2020-05-08 18:57:38', NULL, NULL),
(2, 1, 3, '2020-05-08 19:32:09', NULL, NULL),
(3, 1, 3, '2020-05-08 19:32:40', NULL, NULL),
(4, 1, 9, '2020-05-08 19:40:39', NULL, NULL),
(5, 1, 8, '2020-05-08 19:44:15', NULL, NULL),
(6, 1, 8, '2020-05-08 19:46:55', NULL, NULL),
(7, 1, 8, '2020-05-08 19:48:57', NULL, NULL),
(8, 1, 9, '2020-05-08 19:49:07', NULL, NULL),
(9, 1, 9, '2020-05-08 19:49:16', NULL, NULL),
(10, 1, 5, '2020-05-08 19:50:09', NULL, NULL),
(11, 1, 5, '2020-05-08 19:50:46', NULL, NULL),
(12, 1, 5, '2020-05-08 19:51:17', NULL, NULL),
(13, 1, 5, '2020-05-08 19:53:00', NULL, NULL),
(14, 1, 7, '2020-05-08 20:10:16', NULL, NULL),
(15, 1, 7, '2020-05-08 20:10:53', NULL, NULL),
(16, 1, 5, '2020-05-08 20:32:02', NULL, NULL),
(17, 3, 9, '2020-05-09 13:31:13', NULL, NULL),
(18, 3, 9, '2020-05-09 13:31:40', NULL, NULL),
(19, 3, 7, '2020-05-09 13:32:40', NULL, NULL),
(20, 3, 5, '2020-05-09 13:37:27', NULL, NULL),
(21, 3, 5, '2020-05-09 13:37:54', NULL, NULL),
(22, 3, 5, '2020-05-09 13:38:47', NULL, NULL),
(23, 3, 5, '2020-05-09 13:41:12', NULL, NULL),
(24, 3, 5, '2020-05-09 13:41:41', NULL, NULL),
(25, 3, 5, '2020-05-09 13:42:25', NULL, NULL),
(26, 3, 5, '2020-05-09 13:43:05', NULL, NULL),
(27, 3, 5, '2020-05-09 13:43:26', NULL, NULL),
(28, 3, 5, '2020-05-09 13:44:14', NULL, NULL),
(29, 3, 5, '2020-05-09 13:45:29', NULL, NULL),
(30, 3, 10, '2020-05-09 13:47:38', NULL, NULL),
(31, 3, 9, '2020-05-09 14:09:14', NULL, NULL),
(32, 1, 7, '2020-05-09 14:45:01', NULL, NULL),
(33, 3, 6, '2020-05-09 19:07:05', '17.00', NULL),
(34, 3, 4, '2020-05-10 09:20:39', '16.00', NULL),
(35, 1, 1, '2020-05-10 12:16:44', '16.00', NULL),
(36, 5, 4, '2020-05-10 12:24:30', '16.00', NULL);

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `course_id`, `date`, `time`) VALUES
(1, 1, '2020-06-09', '16:00:00'),
(2, 1, '2020-06-10', '17:00:00'),
(3, 1, '2020-06-01', '15:00:00'),
(4, 1, '2020-06-09', '19:00:00'),
(5, 2, '2020-06-17', '17:00:00'),
(6, 2, '2020-07-15', '16:00:00'),
(7, 2, '2020-06-15', '15:00:00'),
(8, 3, '2020-06-13', '18:00:00'),
(9, 3, '2020-06-08', '17:00:00'),
(10, 3, '2020-06-21', '19:00:00'),
(11, 4, '2020-07-23', '15:00:00'),
(12, 4, '2020-08-16', '18:00:00'),
(13, 4, '2020-07-05', '19:00:00'),
(14, 5, '2020-08-10', '18:00:00'),
(15, 5, '2020-08-13', '17:00:00'),
(16, 8, '2020-07-28', '15:00:00'),
(17, 8, '2020-08-11', '19:00:00'),
(18, 8, '2020-08-06', '17:00:00'),
(19, 6, '2020-06-30', '16:00:00'),
(20, 2, '2020-08-10', '18:00:00'),
(21, 5, '2020-07-19', '18:00:00'),
(22, 9, '2020-08-04', '15:00:00');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `telephone`, `photo`, `skype`) VALUES
(1, 'anna5@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$eVlZVk05N0VJNE4vaUFZag$+qJAlGFpnS0OsGk98yePGNce7/HZwsxMYmfe8OJ+7Us', 'Anna', 'Laskowska', '789456123', '7144a46332ac4925abe164310352bc1f.jpeg', 'anna1457'),
(2, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$SFJScC5vWlpabDdqbFhPZQ$FU7FzxzG8u2/AJ0j12dN0aHGiZgi4fP5uCZIq3GJ/Ho', 'admin', 'admin', '789845666', '6f8fbdfaa69933177a0e2a0622293893.jpeg', 'admin5789'),
(3, 'czech@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$WVQxcW9DLzdmZkkxUjN1WQ$ews3Xlx7eCmGcKgszqS2QNKiHu8FpFHSeyOZvJgzRXA', 'Maria', 'Czech', '1234567999', 'a91691e234f7f0c7563118099dd04854.jpeg', 'czech@gmail.com'),
(4, 'anna9@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$UG1GeUVCSHQybXA0MEpieg$Zco1hdrhpj8DaMJGPoiEFBL2lfVRmOF3LbX5UCIkY/A', 'Anna', 'Laskowska', 'anna14568888', '0632338a8665df6c7b8db35d65e4f9aa.jpeg', '7894566'),
(5, 'antoni@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$NG12amR4OEhrVTI0SWl0Tw$3KJasiGYqbNOvN8K70l4P6F6iDiyVe9UCHcz/z/2Mdk', 'Antoni', 'Wieckowski', '+32 669 778', '6cc6c44230e1889fd125966876464c9e.jpeg', 'antoni15'),
(6, 'janet@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$TG5FU0k3NTB2anNGa05lbQ$2v3eMpP09KZOjgrv25kIYrKnAOlb+D7leXXHntiDcaY', 'Janette', 'Brell', '+36557788', '00760566293f8e5415f6f79b00ecacc0.jpeg', 'janet'),
(7, 'peterteacher@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$SDNOSHBXNGFUcVZMdG9XNw$e7fRf4shrJzXcd7/pJRXnvhz0bU6ofauJlgo2UhUEkk', 'Peter', 'Van Dyke', '+ 36 555 777', '2781f8db54eca5f7373292e95a43f839.jpeg', 'peter15'),
(8, 'franc@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$TE1ESU5pZWpabG9HOGVDeA$ZkjpOYTBLuSatVZYi2F5trdR/QPPIzBRkLHdAonpCgk', 'Franc', 'Dupont', '+666 99788', '64693152005e3ff15bd0ef3b314e6f7e.jpeg', 'franc@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
