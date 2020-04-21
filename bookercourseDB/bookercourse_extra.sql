
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
  ADD KEY `IDX_9474526C5F0EBBFF` (`user_comment_id`),
  ADD KEY `IDX_9474526C591CC992` (`course_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C591CC992` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
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
