
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