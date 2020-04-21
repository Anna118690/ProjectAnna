-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 10:16 PM
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

--
-- Dumping data for table `approach`
--

INSERT INTO `approach` (`id`, `type`, `description`) VALUES
(3, 'Adult', 'desc'),
(4, 'Child', 'desc');

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `description`, `date`, `user_comment_id`, `course_id`) VALUES
(8, 'I am making progress quickly I am happy that I found such a good course, I recommend it!', '2020-04-01 20:42:44', 18, 12),
(9, 'I am making progress quickly I am happy that I found such a good course, I recommend it!', '2020-04-20 20:42:44', 12, 7),
(10, 'I am making progress quickly I am happy that I found such a good course, I recommend it!', '2020-04-05 20:48:01', 17, 6),
(11, 'I am making progress quickly I am happy that I found such a good course, I recommend it!', '2020-04-13 20:48:01', 16, 12),
(12, 'Very good course, I like very much the teacher with a lot of patience ', '2020-04-21 15:57:06', 16, 5),
(13, 'Very good course, I like very much the teacher with a lot of patience ', '2020-04-21 15:58:05', 16, 5),
(14, 'Very good course, I like very much the teacher with a lot of patience ', '2020-04-21 15:59:02', 16, 5),
(15, 'Very good course, I like very much the teacher with a lot of patience ', '2020-04-21 15:59:46', 16, 5),
(16, 'I liked this course', '2020-04-21 21:30:54', 11, 5);

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `namecourse`, `short_desc`, `description`, `price_actual_hour`, `price_actual_hour_sans_tva`, `approach_id`, `language_id`, `level_id`, `user_id`, `course_photo`) VALUES
(5, 'Elementary English', 'Elementary english for beginners', 'You will learn the base and elamentar grammar and vocabulary', '15.00', '12.00', 3, 4, 11, 12, 'b0e5c0074c8ff999bf52b40b1178866c.jpeg'),
(6, 'Dutch Beginner', 'Dutch beginner from  scratch', 'You will learn basic Dutch grammar and basic vocabulary', '15.00', '12.00', 3, 5, 11, 12, 'dc09f4b0127c7b77ee3d84ec032e1dee.png'),
(7, 'French Beginner', 'French from scratch', 'You learn basic French grammar and basic vocabulary, all the necessary training materials are provided by the teacher', '15.00', '12.00', 3, 6, 11, 19, 'cd882e3357d2945ee56f66daa916d379.png'),
(8, 'Nederlands naar A2', 'You know the basics but you still need practice', 'You will learn advanced Dutch grammar and vocabulary, all necessary training materials will be provided by the teacher', '16.00', '13.00', 3, 5, 12, 19, 'df107261dea981784ed8a2acf83c803f.jpeg'),
(9, 'French A2', 'You know the basics but you still need practice', 'You will learn advanced French grammar and vocabulary, all necessary training materials will be provided by the teacher', '16.00', '13.00', 3, 6, 12, 12, 'b7ab0ee482238c11346039c230c02d1a.jpeg'),
(10, 'Dutch naar B1', 'Dutch Level: A2 – B1 CEFR.', 'This pre-intermediate course covers the four skills listening, reading, writing and speaking and we will look at Dutch grammar and Dutch vocabulary.', '18.00', '15.00', 3, 5, 13, 19, '21bb064760e7afea1aefab26ab8c1639.jpeg'),
(11, 'Ducht naar B1 deel 2', 'Dutch B1.2 deel 2 (15 hours)', 'This pre-intermediate course covers the four skills listening, reading, writing and speaking and we will look at Dutch grammar and Dutch vocabulary.', '18.00', '15.00', 3, 5, 14, 19, 'fcae841e250b8754b4ddb9731fcb4af7.jpeg'),
(12, 'English Intermediate', 'Online English lessons and exercises for Intermediate students', 'Online English lessons and exercises for Intermediate students, exercises provided by teacher', '18.00', '15.00', 3, 4, 15, 19, '8246f3d7e280e66b23f9dfc98b13d3e2.jpeg'),
(13, 'English Speaking Improvement', 'Conversational course', 'Most English learners know grammar and have good reading and writing skills but can\'t speak fluently. We can help improve English Speaking !', '16.00', '12.00', 3, 4, 14, 19, '73b689c5a0f751c42f49f30fb39e8caf.jpeg'),
(14, 'Dutch Improve Speaking', 'Improve Speaking', 'Most Dutch learners know grammar and have good reading and writing skills but can\'t speak fluently. We can help improve English Speaking', '18.00', '16.00', 3, 5, 15, 19, 'b94d6ccedba75408445a983e54a57cb1.jpeg'),
(15, 'French Improve Speaking', 'Improve your communication skills', 'Most French learners know grammar and have good reading and writing skills but can\'t speak fluently. We can help improve English Speaking', '18.00', '15.00', 3, 6, 15, 12, '8c5fb9496ceb5ae17ca0d8c2b1bc73d6.jpeg'),
(16, 'French Improve Writing', 'French Improve Writing', 'French Improve Writing', '15.00', '13.00', 3, 6, 13, 12, '20d3e669150a565ba770e75b10df1319.jpeg');

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language`, `description`) VALUES
(4, 'English', 'English desc'),
(5, 'Dutch ', 'Dutch desc'),
(6, 'French', 'French desc');

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
('20200417190828', '2020-04-17 19:08:53'),
('20200420184126', '2020-04-20 18:42:04');

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
(12, 'kielich@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$QjB1cDZ3aTNudzdVbDYzag$WLVarQ0LKrrjNEZJpPOHGsZlxOwOmLzaIdJ/fpOHtxM', '[\"ROLE_ADMIN\"]', 'Malgoska', 'Kielich', '+6978985', NULL, 'kielich4488'),
(14, 'bakowska@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$bUxkQy8wUkJBM0ZGVVNLbg$D2pbXV2W5NwtrrUNNadCdZkyJ6NZX8bDhhyOIS1bXss', '[]', 'Anna', 'Bakowska', '789456', '793dcd00935ae9c3142fee7dd022edd5.jpeg', 'boakowska'),
(15, 'm@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dGRtTTNSRUo2SWZ1NFpKbQ$9ti2S0c0Zmr3bUvSkXY2RiDHyyy8xaAweMi1eXj6T1M', '[]', 'mariola', 'kiepska', '7894555', 'C:\\xampp\\tmp\\phpA427.tmp', 'm145'),
(16, 'aaa@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$eWxZNmpDaWdKNXFZUnIvSA$tvSrRVxxKIcfvKIE9Q6amdgJnVUbzxYpVgp/T1SZT+0', '[]', 'anna', 'haha', '7894566', 'b26301def934e1f6af660a0706a41cbc.jpeg', 'haha'),
(17, 'lionel@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$RFdnZXd5ZjZscFhKR2VvdA$SqLFWOQdhZqHcVK3fG2at98d8lGQwIGqxZl7OBzgdv0', '[]', 'Lionel', 'Du', '789456', '4732fe0a169dcda223ab3adfdcbcce62.jpeg', 'lione8'),
(18, 'iza@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$QTNZank1MjQ0NlZDWHE4Ng$V1vaBGX1q6+nSaKpbp0SW1dJibyZRsMmLcvuSo+c2r4', '[]', 'Iza', 'bobo', '78', 'ec3b07d4f4f92d2071502d9bd4d198f8.jpeg', 'iza899'),
(19, 'annaadmin@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$MzJ1dmdwaC5iTnlWNTR6Zw$Z6BOS5Pe2PdQ3sHMoqC7Mo5R1o8Xc9wTJhrJtAmOSKg', '[\"ROLE_ADMIN\"]', 'AnnaAdmin', 'Las', '4589', 'cef8a6cbaf9ce812a393385c07d2d656.jpeg', 'anna123'),
(20, 'ola@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$TGVLbUZ4SXpCY25CR29rOA$fWVTIM09UDPirMthgKkkeMTV92i7+fY3xUclLp0S7bQ', '[]', 'Ola', 'Mack', '789456', 'dfbfff7d04451b09df60f1fff08d7044.jpeg', 'ola15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
