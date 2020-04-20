
-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `topic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `user_comment_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `topic`, `description`, `date`, `user_comment_id`, `course_id`) VALUES
(8, 'English course', 'I am making progress quickly I am happy that I found such a good course, I recommend it!', '2020-04-01 20:42:44', 18, 12),
(9, 'French course tres bien', 'I am making progress quickly I am happy that I found such a good course, I recommend it!', '2020-04-20 20:42:44', 12, 7),
(10, 'Dutch', 'I am making progress quickly I am happy that I found such a good course, I recommend it!', '2020-04-05 20:48:01', 17, 6),
(11, 'English great', 'I am making progress quickly I am happy that I found such a good course, I recommend it!', '2020-04-13 20:48:01', 16, 12);
