
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
