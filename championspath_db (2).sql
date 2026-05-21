-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 07:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `championspath_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_tournament`
--

CREATE TABLE `tbl_book_tournament` (
  `booking_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `status` enum('pending','completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_book_tournament`
--

INSERT INTO `tbl_book_tournament` (`booking_id`, `t_id`, `p_id`, `status`) VALUES
(3, 7, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clg_courses`
--

CREATE TABLE `tbl_clg_courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clg_courses`
--

INSERT INTO `tbl_clg_courses` (`course_id`, `course_name`) VALUES
(2, 'BSCIT'),
(3, 'BA'),
(4, 'MA'),
(5, 'MPHIL'),
(6, 'PHD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coach_details`
--

CREATE TABLE `tbl_coach_details` (
  `co_id` int(11) NOT NULL,
  `co_code` varchar(30) NOT NULL,
  `co_name` varchar(60) NOT NULL,
  `co_gender` enum('Male','Female','','') NOT NULL,
  `co_address` varchar(120) NOT NULL,
  `co_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_coach_details`
--

INSERT INTO `tbl_coach_details` (`co_id`, `co_code`, `co_name`, `co_gender`, `co_address`, `co_contact`) VALUES
(6, 'coach-20240904182536', 'manvi arora', 'Female', 'surat', 2147483647),
(8, 'coach-20240904064628', 'muskan parekh', 'Female', 'adajan', 2147483647),
(9, 'coach-20240920105046', 'akshat kahar', 'Male', 'rander', 2147483647),
(10, 'coach-20240920105110', 'nishit desai', 'Male', 'bhatha', 2147483647),
(11, 'coach-20240924081034', 'tets test', 'Female', 'surat', 2147483647),
(12, 'coach-20240924081059', 'manisha patel', 'Female', 'ahmedabad', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collage_details`
--

CREATE TABLE `tbl_collage_details` (
  `cl_id` int(11) NOT NULL,
  `cl_code` varchar(30) NOT NULL,
  `cl_name` varchar(70) NOT NULL,
  `cl_address` varchar(90) NOT NULL,
  `cl_grade` enum('A','B','C','D') NOT NULL,
  `st_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_collage_details`
--

INSERT INTO `tbl_collage_details` (`cl_id`, `cl_code`, `cl_name`, `cl_address`, `cl_grade`, `st_id`, `course_id`) VALUES
(14, 'collage-20240903092538', 'ABCDCLG', 'goaa', 'B', 6, 2),
(15, 'collage-20240903092602', 'RAMKRISHNA INS', 'surat', 'A', 3, 2),
(16, 'collage-20240903092630', 'BHARTIVIDHYAPITH', 'pune', 'A', 4, 6),
(17, 'collage-20240903092754', 'SCETE', 'athwa', 'C', 3, 2),
(18, 'collage-20240920105134', 'SPBCLG', 'piplod', 'A', 3, 2),
(19, 'collage-20240920105200', 'KPCOMMERCE', 'athwa', 'D', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_game_type`
--

CREATE TABLE `tbl_game_type` (
  `gm_id` int(11) NOT NULL,
  `game_type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_game_type`
--

INSERT INTO `tbl_game_type` (`gm_id`, `game_type`) VALUES
(1, 'REGULAR '),
(2, 'PERMETER'),
(3, 'MAT'),
(4, 'PER QUATER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_players_details`
--

CREATE TABLE `tbl_players_details` (
  `p_id` int(11) NOT NULL,
  `p_code` varchar(40) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_birthdate` date NOT NULL,
  `p_age` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `p_address` varchar(70) NOT NULL,
  `p_gender` enum('Male','Female','','') NOT NULL,
  `p_contact` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `p_email` varchar(50) NOT NULL,
  `p_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_players_details`
--

INSERT INTO `tbl_players_details` (`p_id`, `p_code`, `p_name`, `p_birthdate`, `p_age`, `course_id`, `p_address`, `p_gender`, `p_contact`, `s_id`, `cl_id`, `p_email`, `p_pass`) VALUES
(2, 'player-20240904064821', 'JAYY', '2024-09-18', 20, 6, 'abcdd', 'Male', 2147483647, 1, 15, 'jay@gmail.com', 'jay1234567'),
(3, 'player-20240904064858', 'ADIII', '2024-04-21', 21, 2, 'surat', 'Female', 2147483647, 1, 17, 'adiitii@gmail.com', 'CPm5M5OC'),
(4, 'player-20240920103843', 'KUNAL ', '2024-09-03', 24, 4, 'adajan', 'Male', 2147483647, 1, 17, 'kunal12@gmail.com', '0AKHdgsZ'),
(5, 'player-20240920103926', 'PREET', '2024-09-06', 21, 2, 'vesu', 'Male', 2147483647, 4, 15, 'preet@gmail.com', 'uWkfzhAE'),
(6, 'player-20240920104010', 'ANIKET', '2024-02-27', 20, 5, 'piplod', 'Male', 2147483647, 5, 16, 'aniket45@gmail.com', 'uIuYM31J'),
(7, 'player-20240920110807', 'SAKASH', '2024-09-02', 20, 6, 'surat', 'Male', 2147483647, 4, 15, 'sakshc@gmail.com', 'ttPyKOra'),
(13, 'player-20240923062820', 'DSHFH', '2024-09-10', 44, 3, 'test', 'Male', 2147483647, 1, 14, 'vgvgy@shgd.cnis', 'nxJXOAzj');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rank`
--

CREATE TABLE `tbl_rank` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rank`
--

INSERT INTO `tbl_rank` (`r_id`, `r_name`) VALUES
(1, 'FIRST'),
(2, 'SECOND'),
(3, 'THIRD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sports_categories`
--

CREATE TABLE `tbl_sports_categories` (
  `sc_id` int(11) NOT NULL,
  `sc_name` varchar(60) NOT NULL,
  `is_active` enum('on','off','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sports_categories`
--

INSERT INTO `tbl_sports_categories` (`sc_id`, `sc_name`, `is_active`) VALUES
(1, 'SINGLE', 'on'),
(2, 'DOUBLE', 'on'),
(3, 'TEAM', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sports_details`
--

CREATE TABLE `tbl_sports_details` (
  `s_id` int(11) NOT NULL,
  `s_code` varchar(50) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `gm_id` int(11) NOT NULL,
  `no_of_players` enum('1','2','7','9','11') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sports_details`
--

INSERT INTO `tbl_sports_details` (`s_id`, `s_code`, `s_name`, `sc_id`, `sp_id`, `gm_id`, `no_of_players`) VALUES
(1, 'sport-20240903113137', 'KARATE', 1, 1, 1, '1'),
(2, 'sport-20240903100431', 'CRICKET', 3, 2, 1, '11'),
(3, 'sport-20240904064735', 'KABADDI', 3, 1, 3, '7'),
(4, 'sport-20240904064757', 'TABLETENNIS', 2, 1, 4, '2'),
(5, 'sport-20240920104117', 'BAD MINTON', 2, 1, 4, '2'),
(6, 'sport-20240920104143', 'FOOTBALL', 3, 2, 1, '9'),
(7, 'sport-20240920104212', 'SOCCER', 3, 2, 1, '9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sports_type`
--

CREATE TABLE `tbl_sports_type` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sports_type`
--

INSERT INTO `tbl_sports_type` (`sp_id`, `sp_name`) VALUES
(1, 'INDOOR STADIUM'),
(2, 'OUTDOOR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state_details`
--

CREATE TABLE `tbl_state_details` (
  `st_id` int(11) NOT NULL,
  `state_name` varchar(60) NOT NULL,
  `is_active` enum('on','off','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_state_details`
--

INSERT INTO `tbl_state_details` (`st_id`, `state_name`, `is_active`) VALUES
(3, 'GUJARAT', 'on'),
(4, 'MAHARASHTRA', 'on'),
(5, 'AMRITSAR', 'on'),
(6, 'GOA', 'on'),
(7, 'AASAM', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tournament_details`
--

CREATE TABLE `tbl_tournament_details` (
  `t_id` int(11) NOT NULL,
  `t_code` varchar(50) NOT NULL,
  `t_name` varchar(70) NOT NULL,
  `tt_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `venue` varchar(200) NOT NULL,
  `t_date` date NOT NULL,
  `t_starttime` time NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tournament_details`
--

INSERT INTO `tbl_tournament_details` (`t_id`, `t_code`, `t_name`, `tt_id`, `s_id`, `co_id`, `venue`, `t_date`, `t_starttime`, `r_id`) VALUES
(7, 'Tournament-20240922154548', 'all open gujarat karate championship', 3, 1, 6, 'mat', '2024-10-07', '15:30:00', 1),
(8, 'Tournament-20240920105951', 'FIFA  cup 2024', 4, 6, 10, 'ground', '2024-08-30', '19:30:00', 1),
(9, 'Tournament-20240920110150', 'ATP tour', 5, 4, 10, 'ground', '2024-09-22', '08:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tournament_result`
--

CREATE TABLE `tbl_tournament_result` (
  `tou_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tournament_result`
--

INSERT INTO `tbl_tournament_result` (`tou_id`, `t_id`, `cl_id`, `r_id`) VALUES
(12, 7, 15, 1),
(13, 7, 17, 2),
(14, 7, 16, 3),
(15, 8, 15, 1),
(16, 8, 16, 2),
(17, 8, 17, 3),
(18, 9, 15, 1),
(19, 9, 18, 2),
(20, 9, 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tournament_type`
--

CREATE TABLE `tbl_tournament_type` (
  `tt_id` int(11) NOT NULL,
  `tt_code` varchar(40) NOT NULL,
  `tt_type` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tournament_type`
--

INSERT INTO `tbl_tournament_type` (`tt_id`, `tt_code`, `tt_type`) VALUES
(1, 'Tournament-20240830111559', 'SINGLE LEAGUE'),
(2, 'Tournament-20240904064955', 'PREMEIR LEAGUE'),
(3, 'Tournament-20240920104633', 'KNOCKOUT'),
(4, 'Tournament-20240920105314', 'FIFA WORLD CUP'),
(5, 'Tournament-20240920105914', 'BIG BASH LEAGUE');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `u_id` int(11) NOT NULL,
  `u_type` varchar(50) NOT NULL,
  `u_name` varchar(70) NOT NULL,
  `u_email` varchar(90) NOT NULL,
  `u_pass` varchar(120) NOT NULL,
  `u_contact` int(11) NOT NULL,
  `u_gender` enum('Male','Female','','') NOT NULL,
  `is_active` enum('yes','no','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`u_id`, `u_type`, `u_name`, `u_email`, `u_pass`, `u_contact`, `u_gender`, `is_active`) VALUES
(1, 'Admin', 'abcd', 'abcd@gmail.com', 'abcd1234', 1234567890, 'Female', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_book_tournament`
--
ALTER TABLE `tbl_book_tournament`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `tbl_clg_courses`
--
ALTER TABLE `tbl_clg_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_coach_details`
--
ALTER TABLE `tbl_coach_details`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `tbl_collage_details`
--
ALTER TABLE `tbl_collage_details`
  ADD PRIMARY KEY (`cl_id`),
  ADD KEY `std_id` (`st_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tbl_game_type`
--
ALTER TABLE `tbl_game_type`
  ADD PRIMARY KEY (`gm_id`);

--
-- Indexes for table `tbl_players_details`
--
ALTER TABLE `tbl_players_details`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `cl_id` (`cl_id`);

--
-- Indexes for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_sports_categories`
--
ALTER TABLE `tbl_sports_categories`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `tbl_sports_details`
--
ALTER TABLE `tbl_sports_details`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `sc_id` (`sc_id`),
  ADD KEY `sp_id` (`sp_id`),
  ADD KEY `gm_id` (`gm_id`);

--
-- Indexes for table `tbl_sports_type`
--
ALTER TABLE `tbl_sports_type`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `tbl_state_details`
--
ALTER TABLE `tbl_state_details`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_tournament_details`
--
ALTER TABLE `tbl_tournament_details`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `tt_id` (`tt_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `co_id` (`co_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `tbl_tournament_result`
--
ALTER TABLE `tbl_tournament_result`
  ADD PRIMARY KEY (`tou_id`),
  ADD KEY `cl_id` (`cl_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `tbl_tournament_type`
--
ALTER TABLE `tbl_tournament_type`
  ADD PRIMARY KEY (`tt_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_book_tournament`
--
ALTER TABLE `tbl_book_tournament`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_clg_courses`
--
ALTER TABLE `tbl_clg_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_coach_details`
--
ALTER TABLE `tbl_coach_details`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_collage_details`
--
ALTER TABLE `tbl_collage_details`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_game_type`
--
ALTER TABLE `tbl_game_type`
  MODIFY `gm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_players_details`
--
ALTER TABLE `tbl_players_details`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sports_categories`
--
ALTER TABLE `tbl_sports_categories`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sports_details`
--
ALTER TABLE `tbl_sports_details`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_sports_type`
--
ALTER TABLE `tbl_sports_type`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_state_details`
--
ALTER TABLE `tbl_state_details`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_tournament_details`
--
ALTER TABLE `tbl_tournament_details`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_tournament_result`
--
ALTER TABLE `tbl_tournament_result`
  MODIFY `tou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_tournament_type`
--
ALTER TABLE `tbl_tournament_type`
  MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_book_tournament`
--
ALTER TABLE `tbl_book_tournament`
  ADD CONSTRAINT `tbl_book_tournament_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `tbl_tournament_details` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_book_tournament_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `tbl_players_details` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_collage_details`
--
ALTER TABLE `tbl_collage_details`
  ADD CONSTRAINT `tbl_collage_details_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `tbl_state_details` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_collage_details_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `tbl_clg_courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_players_details`
--
ALTER TABLE `tbl_players_details`
  ADD CONSTRAINT `tbl_players_details_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_clg_courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_players_details_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `tbl_sports_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_players_details_ibfk_3` FOREIGN KEY (`cl_id`) REFERENCES `tbl_collage_details` (`cl_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sports_details`
--
ALTER TABLE `tbl_sports_details`
  ADD CONSTRAINT `tbl_sports_details_ibfk_1` FOREIGN KEY (`sc_id`) REFERENCES `tbl_sports_categories` (`sc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sports_details_ibfk_2` FOREIGN KEY (`sp_id`) REFERENCES `tbl_sports_type` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sports_details_ibfk_3` FOREIGN KEY (`gm_id`) REFERENCES `tbl_game_type` (`gm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tournament_details`
--
ALTER TABLE `tbl_tournament_details`
  ADD CONSTRAINT `tbl_tournament_details_ibfk_1` FOREIGN KEY (`tt_id`) REFERENCES `tbl_tournament_type` (`tt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tournament_details_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `tbl_sports_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tournament_details_ibfk_3` FOREIGN KEY (`co_id`) REFERENCES `tbl_coach_details` (`co_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tournament_details_ibfk_4` FOREIGN KEY (`r_id`) REFERENCES `tbl_rank` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tournament_result`
--
ALTER TABLE `tbl_tournament_result`
  ADD CONSTRAINT `tbl_tournament_result_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `tbl_collage_details` (`cl_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tournament_result_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tbl_tournament_details` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tournament_result_ibfk_3` FOREIGN KEY (`r_id`) REFERENCES `tbl_rank` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
