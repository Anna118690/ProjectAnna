
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
