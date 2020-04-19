-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 11:30 PM
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
-- Database: `bookercourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `approach`
--

CREATE TABLE `approach` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approach`
--

INSERT INTO `approach` (`id`, `type`, `description`) VALUES
(3, 'Adult', 'desc'),
(4, 'Child', 'desc');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `topic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `user_comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `namecourse` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_actual_hour` decimal(5,2) NOT NULL,
  `price_actual_hour_sans_tva` decimal(5,2) DEFAULT NULL,
  `approach_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `namecourse`, `short_desc`, `description`, `price_actual_hour`, `price_actual_hour_sans_tva`, `approach_id`, `language_id`, `level_id`, `user_id`, `course_photo`) VALUES
(5, 'Elementary English', 'Elementary english for beginners', 'You will learn the base and elamentar grammar and vocabulary', '15.00', '12.00', 3, 4, 11, NULL, 'b0e5c0074c8ff999bf52b40b1178866c.jpeg'),
(6, 'Dutch Beginner', 'Dutch beginner from  scratch', 'You will learn basic Dutch grammar and basic vocabulary', '15.00', '12.00', 3, 5, 11, NULL, 'dc09f4b0127c7b77ee3d84ec032e1dee.png'),
(7, 'French Beginner', 'French from scratch', 'You learn basic French grammar and basic vocabulary, all the necessary training materials are provided by the teacher', '15.00', '12.00', 3, 6, 11, NULL, 'cd882e3357d2945ee56f66daa916d379.png'),
(8, 'Nederlands naar A2', 'You know the basics but you still need practice', 'You will learn advanced Dutch grammar and vocabulary, all necessary training materials will be provided by the teacher', '16.00', '13.00', 3, 5, 12, NULL, 'df107261dea981784ed8a2acf83c803f.jpeg'),
(9, 'French A2', 'You know the basics but you still need practice', 'You will learn advanced French grammar and vocabulary, all necessary training materials will be provided by the teacher', '16.00', '13.00', 3, 6, 12, NULL, 'b7ab0ee482238c11346039c230c02d1a.jpeg'),
(10, 'Dutch naar B1', 'Dutch Level: A2 – B1 CEFR.', 'This pre-intermediate course covers the four skills listening, reading, writing and speaking and we will look at Dutch grammar and Dutch vocabulary.', '18.00', '15.00', 3, 5, 13, NULL, '21bb064760e7afea1aefab26ab8c1639.jpeg'),
(11, 'Ducht naar B1 deel 2', 'Dutch B1.2 deel 2 (15 hours)', 'This pre-intermediate course covers the four skills listening, reading, writing and speaking and we will look at Dutch grammar and Dutch vocabulary.', '18.00', '15.00', 3, 5, 14, NULL, 'fcae841e250b8754b4ddb9731fcb4af7.jpeg'),
(12, 'English Intermediate', 'Online English lessons and exercises for Intermediate students', 'Online English lessons and exercises for Intermediate students, exercises provided by teacher', '18.00', '15.00', 3, 4, 15, NULL, '8246f3d7e280e66b23f9dfc98b13d3e2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `data_file`
--

CREATE TABLE `data_file` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language`, `description`) VALUES
(4, 'English', 'English desc'),
(5, 'Dutch ', 'Dutch desc'),
(6, 'French', 'French desc');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_order`
--

CREATE TABLE `lesson_order` (
  `id` int(11) NOT NULL,
  `date_lesson_order` datetime NOT NULL,
  `price_total` decimal(6,2) NOT NULL,
  `price_total_sans_tva` decimal(6,2) DEFAULT NULL,
  `payment_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_order_line`
--

CREATE TABLE `lesson_order_line` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `duration_min` int(11) NOT NULL,
  `price_full_lesson` decimal(6,2) NOT NULL,
  `price_full_lesson_sans_tva` decimal(6,2) DEFAULT NULL,
  `lesson_order_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `description`) VALUES
(11, 'Elementary A1', 'Elementary A1 decription'),
(12, 'Elementary A2', 'Elementary A2 description'),
(13, 'Pre-Intermediate B1.1', 'Pre-Intermediate B1.1 description'),
(14, 'Pre-Intermediate B1.2', 'Pre-Intermediate B1.2 description'),
(15, 'Intermediate B1.3', 'Intermediate B1.3 descrption'),
(16, 'Intermediate B1.4', 'Intermediate B1.4 description'),
(17, 'Upper-Intermediate B2.1', 'Upper-Intermediate B2.1 desc'),
(18, 'Upper-Intermediate B2.2', 'Upper-Intermediate B2.2 desc'),
(19, 'Advanced C1', 'Advanced C1 desc'),
(20, 'Proficient C2', 'Proficient C2 desc');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200407212354', '2020-04-07 21:24:07'),
('20200407212855', '2020-04-07 21:29:04'),
('20200407213214', '2020-04-07 21:32:19'),
('20200407213621', '2020-04-07 21:37:05'),
('20200407214019', '2020-04-07 21:40:26'),
('20200407214617', '2020-04-07 21:46:25'),
('20200408081154', '2020-04-08 08:11:59'),
('20200408081540', '2020-04-08 08:15:46'),
('20200408081902', '2020-04-08 08:19:34'),
('20200408082745', '2020-04-08 08:27:53'),
('20200408084609', '2020-04-08 08:46:16'),
('20200408084912', '2020-04-08 08:49:20'),
('20200408103555', '2020-04-08 10:36:11'),
('20200408104638', '2020-04-08 10:46:45'),
('20200408105306', '2020-04-08 10:53:13'),
('20200408105611', '2020-04-08 10:56:16'),
('20200408110247', '2020-04-08 11:02:52'),
('20200408112505', '2020-04-08 11:25:12'),
('20200416120839', '2020-04-16 12:08:46'),
('20200416123444', '2020-04-16 12:35:04'),
('20200416124816', '2020-04-16 12:48:36'),
('20200417190828', '2020-04-17 19:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `roles`, `firstname`, `lastname`, `telephone`, `photo`, `skype`) VALUES
(5, 'user0@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NEZGZG84ckw0eDl1eWV6Nw$xHBRTVo28x2IvwJk9zoCkWTysKrlSiHG+ve9HDXK3cc', '[]', 'Anna0', 'Laskowska0', '3714488990', NULL, 'Anna12340'),
(6, 'user1@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$L0lqbkF6ZkpYd1cvaFNnbA$W8KGaSGTFqtaxStKQvHxFxXU7vYVvUzDjVMINxsNJ58', '[]', 'Anna1', 'Laskowska1', '3714488991', NULL, 'Anna12341'),
(7, 'user2@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dXVjZU9CRFh6UVFqUWxJeQ$7Um1OTiQgOzjc9pf8bI0JVU6+mdjUfxMYw2iUcQoGMg', '[]', 'Anna2', 'Laskowska2', '3714488992', NULL, 'Anna12342'),
(8, 'user3@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NzJQcGJjUFhkRzNEenptWA$TugzokSulyYr7jvwWrjPa4ax8fdNpCPVYbvqBg+MKQs', '[]', 'Anna3', 'Laskowska3', '3714488993', NULL, 'Anna12343'),
(9, 'user4@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$WkZ1akpKYy9vTTRCZGlNNw$VkWTJG1eNr9L12ROlzFDAiWUntUaQLcADMciloCQH1s', '[]', 'Anna4', 'Laskowska4', '3714488994', NULL, 'Anna12344'),
(10, 'annalas@gmail.com', '12345', '', 'Anna', 'Laskowska', '+364789', NULL, '12345'),
(11, 'anna@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$MjZ6YmI0c1dmWTVIY042Qw$JZsUbgOrbGAieJGx/S2zpsbut5G7U3Bz88XZ8Kg/XBU', '[]', 'Anna', 'Laskowska', '+3654987', NULL, '666555'),
(12, 'kielich@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$QjB1cDZ3aTNudzdVbDYzag$WLVarQ0LKrrjNEZJpPOHGsZlxOwOmLzaIdJ/fpOHtxM', '[]', 'Malgoska', 'Kielich', '+6978985', NULL, 'kielich4488'),
(13, 'bak@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UmgxL0RnL29lRy9IU0E2RA$uEdXlUtC5aJ46xkOPwMBI7xRS2YqYSrlEyIJJEn5wto', '[]', 'Andrzej', 'Bak', '789456123', NULL, 'bak12'),
(14, 'bakowska@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$bUxkQy8wUkJBM0ZGVVNLbg$D2pbXV2W5NwtrrUNNadCdZkyJ6NZX8bDhhyOIS1bXss', '[]', 'Anna', 'Bakowska', '789456', '793dcd00935ae9c3142fee7dd022edd5.jpeg', 'boakowska'),
(15, 'm@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dGRtTTNSRUo2SWZ1NFpKbQ$9ti2S0c0Zmr3bUvSkXY2RiDHyyy8xaAweMi1eXj6T1M', '[]', 'mariola', 'kiepska', '7894555', 'C:\\xampp\\tmp\\phpA427.tmp', 'm145'),
(16, 'aaa@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$eWxZNmpDaWdKNXFZUnIvSA$tvSrRVxxKIcfvKIE9Q6amdgJnVUbzxYpVgp/T1SZT+0', '[]', 'anna', 'haha', '7894566', 'b26301def934e1f6af660a0706a41cbc.jpeg', 'haha'),
(17, 'lionel@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$RFdnZXd5ZjZscFhKR2VvdA$SqLFWOQdhZqHcVK3fG2at98d8lGQwIGqxZl7OBzgdv0', '[]', 'Lionel', 'Du', '789456', '4732fe0a169dcda223ab3adfdcbcce62.jpeg', 'lione8'),
(18, 'iza@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$QTNZank1MjQ0NlZDWHE4Ng$V1vaBGX1q6+nSaKpbp0SW1dJibyZRsMmLcvuSo+c2r4', '[]', 'Iza', 'bobo', '78', 'ec3b07d4f4f92d2071502d9bd4d198f8.jpeg', 'iza899'),
(19, 'annaadmin@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$MzJ1dmdwaC5iTnlWNTR6Zw$Z6BOS5Pe2PdQ3sHMoqC7Mo5R1o8Xc9wTJhrJtAmOSKg', '[\"ROLE_ADMIN\"]', 'AnnaAdmin', 'Las', '4589', 'cef8a6cbaf9ce812a393385c07d2d656.jpeg', 'anna123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approach`
--
ALTER TABLE `approach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C5F0EBBFF` (`user_comment_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_169E6FB915140614` (`approach_id`),
  ADD KEY `IDX_169E6FB982F1BAF4` (`language_id`),
  ADD KEY `IDX_169E6FB95FB14BA7` (`level_id`),
  ADD KEY `IDX_169E6FB9A76ED395` (`user_id`);

--
-- Indexes for table `data_file`
--
ALTER TABLE `data_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_37D0FDF2591CC992` (`course_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_order`
--
ALTER TABLE `lesson_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BFCF471FA76ED395` (`user_id`);

--
-- Indexes for table `lesson_order_line`
--
ALTER TABLE `lesson_order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_91ECC730C5D82721` (`lesson_order_id`),
  ADD KEY `IDX_91ECC730591CC992` (`course_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approach`
--
ALTER TABLE `approach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_file`
--
ALTER TABLE `data_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lesson_order`
--
ALTER TABLE `lesson_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_order_line`
--
ALTER TABLE `lesson_order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C5F0EBBFF` FOREIGN KEY (`user_comment_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_169E6FB915140614` FOREIGN KEY (`approach_id`) REFERENCES `approach` (`id`),
  ADD CONSTRAINT `FK_169E6FB95FB14BA7` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`),
  ADD CONSTRAINT `FK_169E6FB982F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
  ADD CONSTRAINT `FK_169E6FB9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `data_file`
--
ALTER TABLE `data_file`
  ADD CONSTRAINT `FK_37D0FDF2591CC992` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `lesson_order`
--
ALTER TABLE `lesson_order`
  ADD CONSTRAINT `FK_BFCF471FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `lesson_order_line`
--
ALTER TABLE `lesson_order_line`
  ADD CONSTRAINT `FK_91ECC730591CC992` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `FK_91ECC730C5D82721` FOREIGN KEY (`lesson_order_id`) REFERENCES `lesson_order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
