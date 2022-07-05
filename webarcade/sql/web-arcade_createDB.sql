SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `web-arcade`
CREATE DATABASE IF NOT EXISTS `web-arcade` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web-arcade`;

-- Table structure for table `users`
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `users`
INSERT INTO `users` (`id`, `user_name`, `display_name`, `password`, `email`) VALUES
(2, 'dev', 'KingGamer64', '81dc9bdb52d04dc20036dbd8313ed055', 'fakemail@mail.com');

-- Indexes for table `users`
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `users`
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;



COMMIT;
