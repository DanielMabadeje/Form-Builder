-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2021 at 01:17 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_option`
--

CREATE TABLE `answer_option` (
  `id` int(30) NOT NULL,
  `form_id` varchar(300) NOT NULL,
  `question_id` varchar(300) NOT NULL,
  `answer_id` varchar(300) NOT NULL,
  `option_id` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `form_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `form_name` varchar(30) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `responses` int(30) NOT NULL DEFAULT '0',
  `paginated` varchar(10) NOT NULL DEFAULT 'false',
  `paginated_after` varchar(30) DEFAULT NULL,
  `allowing_responses` varchar(5) NOT NULL DEFAULT 'no',
  `form_type` varchar(1000) DEFAULT '[]',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`form_id`, `user_id`, `form_name`, `description`, `responses`, `paginated`, `paginated_after`, `allowing_responses`, `form_type`, `created_at`, `updated_at`) VALUES
('5fcfece717a24', '1', 'RSVP For Form Builder', 'This is the form to RSVP for GDG Uyo&#39;s DevFestPlease fill in all the information needed...', 0, 'false', NULL, '1', 'rsvp', '2020-12-08 21:15:19', '2021-01-12 20:41:56'),
('5ff616bf2c99a', '1', 'New Form', 'Description of your form', 0, 'false', NULL, 'no', 'blank', '2021-01-06 19:59:59', '2021-01-06 19:59:59'),
('5ff6753e0130a', '17', 'New Form', 'Your Description', 0, 'false', NULL, 'no', 'blank', '2021-01-07 02:43:10', '2021-01-07 03:29:22'),
('5ff6820185b29', '1', 'New Form', 'Your Description', 0, 'false', NULL, 'no', 'blank', '2021-01-07 03:37:37', '2021-01-07 03:37:37'),
('5ff684eb9aa92', '1', 'New Formk', 'Your Description', 0, 'false', NULL, 'no', 'blank', '2021-01-07 03:50:03', '2021-01-07 04:16:37'),
('5ffe0b70d3daf', '1', 'New Form', 'Your Description', 0, 'false', NULL, 'no', 'blank', '2021-01-12 20:49:52', '2021-01-12 20:49:52'),
('6004d6b06e317', '1', 'NEW RSVP', 'Your Description', 0, 'false', NULL, 'no', 'blank', '2021-01-18 00:30:40', '2021-01-18 00:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `form_answers`
--

CREATE TABLE `form_answers` (
  `id` int(30) NOT NULL,
  `answer_id` varchar(100) NOT NULL,
  `form_id` varchar(50) NOT NULL,
  `question_id` varchar(30) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_answers`
--

INSERT INTO `form_answers` (`id`, `answer_id`, `form_id`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(207, '2020-12-16sH2QOZF6', '5fcfece717a24', '142', 'mabadejedaniel1@gmail.com', '2020-12-16 01:10:11', '2020-12-16 01:10:11'),
(208, '2020-12-16sH2QOZF6', '5fcfece717a24', '143', 'Daniel', '2020-12-16 01:10:12', '2020-12-16 01:10:12'),
(209, '2020-12-16sH2QOZF6', '5fcfece717a24', '144', 'Mabadeje', '2020-12-16 01:10:12', '2020-12-16 01:10:12'),
(210, '2020-12-16sH2QOZF6', '5fcfece717a24', '145', 'dgbdb', '2020-12-16 01:10:12', '2020-12-16 01:10:12'),
(211, '2020-12-16sH2QOZF6', '5fcfece717a24', '146', 'white', '2020-12-16 01:10:12', '2020-12-16 01:10:12'),
(212, '2020-12-16sH2QOZF6', '5fcfece717a24', '147', 'dfgd', '2020-12-16 01:10:12', '2020-12-16 01:10:12'),
(213, '2020-12-16sH2QOZF6', '5fcfece717a24', '148', 'tedtdg', '2020-12-16 01:10:12', '2020-12-16 01:10:12'),
(214, '2020-12-16sCnEhDrL', '5fcfece717a24', '142', 'mabadejedaniel1@gmail.com', '2020-12-16 01:13:30', '2020-12-16 01:13:30'),
(215, '2020-12-16sCnEhDrL', '5fcfece717a24', '143', 'Daniel', '2020-12-16 01:13:30', '2020-12-16 01:13:30'),
(216, '2020-12-16sCnEhDrL', '5fcfece717a24', '144', 'Mabadeje', '2020-12-16 01:13:30', '2020-12-16 01:13:30'),
(217, '2020-12-16sCnEhDrL', '5fcfece717a24', '145', 'fdg', '2020-12-16 01:13:30', '2020-12-16 01:13:30'),
(218, '2020-12-16sCnEhDrL', '5fcfece717a24', '146', 'tdeh', '2020-12-16 01:13:30', '2020-12-16 01:13:30'),
(219, '2020-12-16sCnEhDrL', '5fcfece717a24', '147', 'ght', '2020-12-16 01:13:30', '2020-12-16 01:13:30'),
(220, '2020-12-16sCnEhDrL', '5fcfece717a24', '148', 'yrtyhrt', '2020-12-16 01:13:30', '2020-12-16 01:13:30'),
(221, '2020-12-18zXuiRs95', '5fcfece717a24', '142', 'mabadejedaniel1@gmail.com', '2020-12-18 00:15:30', '2020-12-18 00:15:30'),
(222, '2020-12-18zXuiRs95', '5fcfece717a24', '143', 'Daniel', '2020-12-18 00:15:31', '2020-12-18 00:15:31'),
(223, '2020-12-18zXuiRs95', '5fcfece717a24', '144', 'Mabadeje', '2020-12-18 00:15:31', '2020-12-18 00:15:31'),
(224, '2020-12-18zXuiRs95', '5fcfece717a24', '145', 'hhkk', '2020-12-18 00:15:31', '2020-12-18 00:15:31'),
(225, '2020-12-18zXuiRs95', '5fcfece717a24', '146', 'hkj', '2020-12-18 00:15:31', '2020-12-18 00:15:31'),
(226, '2020-12-18zXuiRs95', '5fcfece717a24', '147', 'hv', '2020-12-18 00:15:31', '2020-12-18 00:15:31'),
(227, '2020-12-18zXuiRs95', '5fcfece717a24', '148', 'kf', '2020-12-18 00:15:31', '2020-12-18 00:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `form_questions`
--

CREATE TABLE `form_questions` (
  `question_id` int(30) NOT NULL,
  `form_id` varchar(100) NOT NULL,
  `label` varchar(30) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `placeholder` varchar(70) DEFAULT NULL,
  `id` varchar(69) NOT NULL,
  `page` int(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_questions`
--

INSERT INTO `form_questions` (`question_id`, `form_id`, `label`, `type`, `name`, `placeholder`, `id`, `page`, `created_at`, `updated_at`) VALUES
(142, '5fcfece717a24', 'Email', 'email', 'email', 'Email', 'email', NULL, '2020-12-08 21:15:19', '2020-12-08 21:15:19'),
(143, '5fcfece717a24', 'FirstName', '', 'firstname', 'FirstName..', 'firstname', NULL, '2020-12-08 21:15:19', '2020-12-20 03:56:35'),
(144, '5fcfece717a24', 'LastName', '', 'lastname', 'LastName..', 'lastname', NULL, '2020-12-08 21:15:19', '2020-12-14 13:59:25'),
(145, '5fcfece717a24', 'What do you want right now?', '', 'shortanswer', 'Your ShortAnswers...', 'shortanswer', NULL, '2020-12-08 21:15:26', '2020-12-14 13:59:03'),
(146, '5fcfece717a24', 'What is your favourite color?', '', 'shortanswer1', 'Your ShortAnswer...', 'shortanswer', NULL, '2020-12-08 21:16:30', '2020-12-14 15:32:54'),
(147, '5fcfece717a24', 'Favourite Food', '', 'shortanswer2', 'Your ShortAnswer...', 'shortanswer', NULL, '2020-12-08 21:17:46', '2020-12-14 15:33:36'),
(148, '5fcfece717a24', 'Tell Us About You', 'textarea', 'longanswer', 'Your This is new....', 'longanswer', NULL, '2020-12-14 14:45:53', '2020-12-14 14:50:38'),
(149, '5fcfece717a24', 'When were you born?', 'date', 'date', 'Your This is new....', 'date', NULL, '2020-12-19 04:39:29', '2020-12-20 03:57:17'),
(164, '5fcfece717a24', 'What is your range?.', 'dropdown', 'Dropdown4', 'This is new....', 'Dropdown4', NULL, '2020-12-20 06:42:49', '2020-12-22 17:23:16'),
(167, '5ff616bf2c99a', 'Email', 'email', 'email', 'Email', 'email', NULL, '2021-01-06 19:59:59', '2021-01-06 19:59:59'),
(168, '5ff6753e0130a', 'Email', 'email', 'email', 'Email', 'email', NULL, '2021-01-07 02:43:10', '2021-01-07 02:43:10'),
(169, '5ff6753e0130a', 'Email', 'email', 'email2', 'Email...', 'email2', NULL, '2021-01-07 02:45:09', '2021-01-07 02:45:09'),
(170, '5ff6820185b29', 'Email', 'email', 'email', 'Email', 'email', NULL, '2021-01-07 03:37:37', '2021-01-07 03:37:37'),
(171, '5ff684eb9aa92', 'Email', 'email', 'email', 'Email', 'email', NULL, '2021-01-07 03:50:03', '2021-01-07 03:50:03'),
(172, '5ff684eb9aa92', 'ShortAnswer', '', 'shortanswer', 'Your ShortAnswer...', 'shortanswer', NULL, '2021-01-07 03:50:16', '2021-01-07 03:50:16'),
(173, '5ff684eb9aa92', 'This is new.', 'checkbox', 'Dropdown2', 'This is new....', 'Dropdown2', NULL, '2021-01-07 03:50:27', '2021-01-07 03:50:27'),
(174, '5ffe0b70d3daf', 'Email', 'email', 'email', 'Email', 'email', NULL, '2021-01-12 20:49:53', '2021-01-12 20:49:53'),
(175, '6004d6b06e317', 'Email', 'email', 'email', 'Email', 'email', NULL, '2021-01-18 00:30:40', '2021-01-18 00:30:40'),
(180, '5fcfece717a24', 'This is new', 'checkbox', 'multichoice1', 'Your This is new...', 'multichoice1', NULL, '2021-02-02 06:35:35', '2021-02-02 06:35:35'),
(181, '5fcfece717a24', 'This is new', 'checkbox', 'multichoice2', 'This is new...', 'multichoice2', NULL, '2021-02-02 06:37:35', '2021-02-02 06:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `questions_options`
--

CREATE TABLE `questions_options` (
  `id` int(30) NOT NULL,
  `form_id` varchar(225) NOT NULL,
  `question_id` int(30) NOT NULL,
  `form_type` varchar(50) NOT NULL,
  `form_option` varchar(70) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_options`
--

INSERT INTO `questions_options` (`id`, `form_id`, `question_id`, `form_type`, `form_option`, `created_at`, `updated_at`) VALUES
(1, '5fcfece717a24', 164, 'dropdown', '--SELECT--', '2020-12-20 06:42:49', '2020-12-20 06:42:49'),
(2, '5fcfece717a24', 164, 'dropdown', 'First List in Dropdown', '2020-12-20 06:42:50', '2020-12-20 06:42:50'),
(6, '5fcfece717a24', 166, 'multichoice', 'First Value', '2020-12-22 02:03:07', '2020-12-22 02:03:07'),
(7, '5fcfece717a24', 167, 'multichoice', 'Second Value', '2020-12-22 17:40:04', '2020-12-22 17:40:04'),
(8, '5fcfece717a24', 167, 'multichoice', 'First Value', '2020-12-22 17:40:04', '2020-12-22 17:40:04'),
(9, '5ff684eb9aa92', 173, 'checkbox', 'First Value', '2021-01-07 03:50:27', '2021-01-07 03:50:27'),
(10, '5ff684eb9aa92', 173, 'checkbox', 'Second Value', '2021-01-07 03:50:27', '2021-01-07 03:50:27'),
(11, '5fcfece717a24', 164, 'dropdown', 'New Option', '2021-01-07 04:13:22', '2021-01-07 04:13:22'),
(14, '5fcfece717a24', 166, 'checkbox', 'New Option', '2021-01-08 09:52:35', '2021-01-08 09:52:35'),
(15, '5fcfece717a24', 166, 'checkbox', 'New Option', '2021-01-08 09:52:36', '2021-01-08 09:52:36'),
(16, '5fcfece717a24', 174, 'checkbox', 'First Value', '2021-01-08 10:22:33', '2021-01-08 10:22:33'),
(17, '5fcfece717a24', 174, 'checkbox', 'Second Value', '2021-01-08 10:22:33', '2021-01-08 10:22:33'),
(18, '5fcfece717a24', 176, 'checkbox', 'First Value', '2021-01-20 05:20:13', '2021-01-20 06:09:38'),
(19, '5fcfece717a24', 176, 'checkbox', 'Second Value', '2021-01-20 05:20:13', '2021-01-20 05:20:13'),
(20, '5fcfece717a24', 177, 'checkbox', 'First Value', '2021-01-21 05:31:28', '2021-01-21 05:31:28'),
(21, '5fcfece717a24', 177, 'checkbox', 'Second Value', '2021-01-21 05:31:28', '2021-01-21 05:31:28'),
(22, '5fcfece717a24', 178, 'checkbox', 'First Value', '2021-01-29 05:11:34', '2021-01-29 05:11:34'),
(23, '5fcfece717a24', 178, 'checkbox', 'Second Value', '2021-01-29 05:11:34', '2021-01-29 05:11:34'),
(24, '5fcfece717a24', 179, 'checkbox', 'First Value', '2021-01-29 06:03:30', '2021-01-29 06:03:30'),
(25, '5fcfece717a24', 179, 'checkbox', 'Second Value', '2021-01-29 06:03:30', '2021-01-29 06:03:30'),
(26, '5fcfece717a24', 180, 'checkbox', 'First Value', '2021-01-29 06:03:58', '2021-01-29 06:03:58'),
(27, '5fcfece717a24', 180, 'checkbox', 'Second Value', '2021-01-29 06:03:58', '2021-01-29 06:03:58'),
(28, '5fcfece717a24', 181, 'checkbox', 'First Valued', '2021-01-29 06:05:02', '2021-01-31 06:23:28'),
(29, '5fcfece717a24', 181, 'checkbox', 'Second Value', '2021-01-29 06:05:02', '2021-01-29 06:05:02'),
(30, '5fcfece717a24', 176, 'checkbox', 'First Value', '2021-02-02 06:06:08', '2021-02-02 06:06:08'),
(31, '5fcfece717a24', 176, 'checkbox', 'Second Value', '2021-02-02 06:06:08', '2021-02-02 06:06:08'),
(32, '5fcfece717a24', 177, 'checkbox', 'First Value', '2021-02-02 06:07:59', '2021-02-02 06:07:59'),
(33, '5fcfece717a24', 177, 'checkbox', 'Second Value', '2021-02-02 06:07:59', '2021-02-02 06:07:59'),
(34, '5fcfece717a24', 179, 'checkbox', 'First Value', '2021-02-02 06:23:01', '2021-02-02 06:23:01'),
(35, '5fcfece717a24', 179, 'checkbox', 'Second Value', '2021-02-02 06:23:01', '2021-02-02 06:23:01'),
(36, '5fcfece717a24', 180, 'checkbox', 'First Value', '2021-02-02 06:35:35', '2021-02-02 06:35:35'),
(37, '5fcfece717a24', 180, 'checkbox', 'Second Value', '2021-02-02 06:35:35', '2021-02-02 06:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(16) NOT NULL,
  `wallet` int(30) NOT NULL,
  `membership_plan` varchar(30) NOT NULL DEFAULT 'free',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`, `wallet`, `membership_plan`, `created_at`) VALUES
(1, 'Daniel Mabadeje', 'mabadejedaniel1@gmail.com', '$2y$10$r7HzPLf0nK5.bZIYWpw4cuQzdndSHoNFI18OPGbp3m.kNBQBwVXD.', 'admin', 0, 'free', '2020-04-12 16:48:36'),
(2, 'mabz', 'mabz@gmail.com', '$2y$10$r7HzPLf0nK5.bZIYWpw4cuQzdndSHoNFI18OPGbp3m.kNBQBwVXD.', 'user', 0, 'free', '2020-04-22 21:44:32'),
(3, 'Nexton logistics', 'mabadejedaniel124@gmail.com', '$2y$10$S/XkLRCMG8B9BBG/IQtV7e0qLGqyf5rng4txS504yjbnbJjEHsp/6', 'vendor', 0, 'free', '2020-04-23 03:59:13'),
(8, 'Daniel Mabadeje', 'mabz@gmail.comjj', '$2y$10$iv9nqvzEkig7SXQRuFW/QuATIa9zvJzxVMz5D3TtZd.kPNQnt/Rvy', 'courier', 0, 'free', '2020-05-16 03:15:03'),
(12, 'Nexton logistics', 'mabz@gmail.comjjf', '$2y$10$2w6MnjsGbIqOZo9dAvnhs.NIZ8nU5a/RwJ/eBxuX00AQiYMbwu2ZO', 'courier', 0, 'free', '2020-05-19 02:32:14'),
(13, 'Daniel Mabadeje', 'mabz@gmail.comjjfb', '$2y$10$/wiz856lBW1O.5X8pEWeJ.kEfc2U5kcM4v/XKxi/7mFnmDvKler42', 'courier', 0, 'free', '2020-05-19 02:33:51'),
(14, 'Nexton logistics', 'mabadejedaniel12@gmail.com', '$2y$10$G4/f5kGygUS3Gx2Tf2RWuuUeaaoBheWgOm5fM7MzeMmpaGQOvNRtK', 'courier', 0, 'free', '2020-05-19 06:21:53'),
(15, 'Daniel Adefiyinfoluwa Mabadeje', 'mabz445@gmail.com', '$2y$10$s0vX9zLXT7K1D4tq/oWTP.3VdyiwsdDBs4o5pHE.H6LHYnrcw9L7y', 'user', 0, 'free', '2020-10-05 07:40:54'),
(16, 'Daniel Adefiyinfoluwa Mabadeje', 'mabz55@gmail.com', '$2y$10$90/6jnB7wmBHYXcBcU.U2OSL9WnRy9jMsd9CEyAWXHJUknqo.ajKG', 'user', 0, 'free', '2020-10-05 07:43:42'),
(17, 'Daniel Mabadeje', 'mabadejedaniel1hf@gmail.com', '$2y$10$MX5tYHN2UiN.0IoIhNbP4uzgCEZM60z8PpAxIE3JyhbVPC3pJ6pby', 'user', 0, 'free', '2021-01-06 19:27:14'),
(18, 'Daniel Mabadeje', 'mabadejedaniel1gbfx@gmail.com', '$2y$10$BMTHqmOgK2PY4onvrl0MZ./Zmcqwqqko6m.hxYUkb4807ROPcwzWy', 'user', 0, 'free', '2021-01-06 19:47:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_option`
--
ALTER TABLE `answer_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `form_answers`
--
ALTER TABLE `form_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_questions`
--
ALTER TABLE `form_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `questions_options`
--
ALTER TABLE `questions_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_answers`
--
ALTER TABLE `form_answers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `form_questions`
--
ALTER TABLE `form_questions`
  MODIFY `question_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `questions_options`
--
ALTER TABLE `questions_options`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
