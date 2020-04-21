
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
(12, 'kielich@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$QjB1cDZ3aTNudzdVbDYzag$WLVarQ0LKrrjNEZJpPOHGsZlxOwOmLzaIdJ/fpOHtxM', '[\"ROLE_ADMIN\"]', 'Malgoska', 'Kielich', '+6978985', NULL, 'kielich4488'),
(13, 'bak@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UmgxL0RnL29lRy9IU0E2RA$uEdXlUtC5aJ46xkOPwMBI7xRS2YqYSrlEyIJJEn5wto', '[]', 'Andrzej', 'Bak', '789456123', NULL, 'bak12'),
(14, 'bakowska@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$bUxkQy8wUkJBM0ZGVVNLbg$D2pbXV2W5NwtrrUNNadCdZkyJ6NZX8bDhhyOIS1bXss', '[]', 'Anna', 'Bakowska', '789456', '793dcd00935ae9c3142fee7dd022edd5.jpeg', 'boakowska'),
(15, 'm@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dGRtTTNSRUo2SWZ1NFpKbQ$9ti2S0c0Zmr3bUvSkXY2RiDHyyy8xaAweMi1eXj6T1M', '[]', 'mariola', 'kiepska', '7894555', 'C:\\xampp\\tmp\\phpA427.tmp', 'm145'),
(16, 'aaa@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$eWxZNmpDaWdKNXFZUnIvSA$tvSrRVxxKIcfvKIE9Q6amdgJnVUbzxYpVgp/T1SZT+0', '[]', 'anna', 'haha', '7894566', 'b26301def934e1f6af660a0706a41cbc.jpeg', 'haha'),
(17, 'lionel@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$RFdnZXd5ZjZscFhKR2VvdA$SqLFWOQdhZqHcVK3fG2at98d8lGQwIGqxZl7OBzgdv0', '[]', 'Lionel', 'Du', '789456', '4732fe0a169dcda223ab3adfdcbcce62.jpeg', 'lione8'),
(18, 'iza@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$QTNZank1MjQ0NlZDWHE4Ng$V1vaBGX1q6+nSaKpbp0SW1dJibyZRsMmLcvuSo+c2r4', '[]', 'Iza', 'bobo', '78', 'ec3b07d4f4f92d2071502d9bd4d198f8.jpeg', 'iza899'),
(19, 'annaadmin@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$MzJ1dmdwaC5iTnlWNTR6Zw$Z6BOS5Pe2PdQ3sHMoqC7Mo5R1o8Xc9wTJhrJtAmOSKg', '[\"ROLE_ADMIN\"]', 'AnnaAdmin', 'Las', '4589', 'cef8a6cbaf9ce812a393385c07d2d656.jpeg', 'anna123'),
(20, 'ola@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$TGVLbUZ4SXpCY25CR29rOA$fWVTIM09UDPirMthgKkkeMTV92i7+fY3xUclLp0S7bQ', '[]', 'Ola', 'Mack', '789456', 'dfbfff7d04451b09df60f1fff08d7044.jpeg', 'ola15');
