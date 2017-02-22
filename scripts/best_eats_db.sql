-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2016 at 04:23 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `best_eats_db`
# Create new database and new user
CREATE DATABASE best_eats_db;
ALTER DATABASE best_eats_db CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE USER 'best_eats_db'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON best_eats_db.* TO 'best_eats_db'@'localhost';
FLUSH PRIVILEGES;


-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `loc_id` int(5) NOT NULL,
  `store_Name` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `food_type` varchar(20) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `rating` int(1) NOT NULL,
  `user_id` int(5) NOT NULL,
  `user_review` varchar(250) NOT NULL,
  `img_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`loc_id`, `store_Name`, `address`, `phone_num`, `food_type`, `lat`, `lon`, `rating`, `user_id`, `user_review`, `img_url`) VALUES
(1, 'IQ Food', 'TD Centre, 100 Wellington St W, Toronto, ON M5K 1B1', '(647) 352-7792', 'Canadian', 43.6472746, -79.4530076, 4, 1, 'Great food! Always good food and great service.', 'http://www.blogto.com/listings/restaurants/upload/2012/11/20121113-iq-food-bay-int3.jpg'),
(2, 'Burrito Boyz', '224 Adelaide St W, Toronto, ON M5H 1W7', '(647) 439-4065', 'Mexican', 43.6824073, -79.4363148, 5, 2, 'Overall I would say the dishes are overpriced with regard to its portion and taste.', 'https://raisethehammer.org/static/images/burrito_boyz_facade_gore_park.jpg'),
(3, 'Burrito Boyz', '224 Adelaide St W, Toronto, ON M5H 1W7', '(647) 439-4065', 'Mexican ', 43.6949173, -79.4277381, 5, 1, 'The Best food ever!', 'https://static1.squarespace.com/static/578ce85a29687f705d94f1a2/57cb3aab579fb377697429d4/57cb745b8419c2fd019a948c/1474644116149/BurritoBoyz_Burrito_006.jpg'),
(4, 'Swatow Restaurant', '309 Spadina Ave, Toronto, ON M5T 1H1', '(416) 977-0601', 'Chinese', 43.6538146, -79.4681489, 3, 3, 'Really good!', 'https://media-cdn.tripadvisor.com/media/photo-s/03/35/01/2a/swatow-restaurant.jpg'),
(5, 'Canoe', '224 Adelaide St W, Toronto, ON M5H 1W7', '(647) 439-4065', 'Canadian', 43.6475963, -79.3831021, 2, 4, 'The Best food ever!', 'http://www.canoerestaurant.com/wp-content/uploads/sites/23/2015/12/canoe-restaurant-space-3-1000x500.jpg'),
(6, 'Swatow Restaurant', '309 Spadina Ave, Toronto, ON M5T 1H1', '(416) 977-0601', 'Chinese', 43.6538146, -79.4681489, 4, 1, 'Really bad!', 'https://media-cdn.tripadvisor.com/media/photo-s/03/35/01/2a/swatow-restaurant.jpg'),
(7, 'Swatow Restaurant', '309 Spadina Ave, Toronto, ON M5T 1H1', '(416) 977-0601', 'Chinese', 43.6538146, -79.4681489, 2, 5, 'Really good!', 'https://media-cdn.tripadvisor.com/media/photo-s/03/35/01/2a/swatow-restaurant.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `dp_pic_url` varchar(150) NOT NULL,
  `salt` varchar(150) NOT NULL,
  `passwordHash` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `dob`, `dp_pic_url`, `salt`, `passwordHash`) VALUES
(1, 'Biru', 'Uma', 'b@g.ca', '2016-12-01', 'http://cdn.oliverbonacininetwork.com/wp-content/uploads/sites/23/2015/12/canoe-restaurant-chef-de-cuisine%E2%80%93coulson-armstrong-500x750.jpg', '4b3403665fea6', 'b4ff2a0fc5883322a69d'),
(2, 'Sav', 'Add', 'g@g.ca', '2016-12-01', 'http://cdn.oliverbonacininetwork.com/wp-content/uploads/sites/23/2015/12/canoe-restaurant-chef-de-cuisine%E2%80%93coulson-armstrong-500x750.jpg', '4b3403665fea6', 'a0b25ded4a02f463a6cf'),
(3, 'Dev', 'Patel', 'dev@gmail.ca', '2016-12-12', 'http://admissions.berkeley.edu/sites/default/files/UCB_landingpage_images_600x300_212.jpg', '4b3403665fea6', '51df7d83b6fb2fae620b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
