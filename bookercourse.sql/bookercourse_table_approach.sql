
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
