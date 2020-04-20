
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
