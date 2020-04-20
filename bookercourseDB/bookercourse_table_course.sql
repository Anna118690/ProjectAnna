
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
