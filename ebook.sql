-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 04:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pasword` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pasword`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin'),
(2, 'affan', 'affan@gmail.com', 'affan');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `AnnouncementID` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `AnnouncementDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`AnnouncementID`, `Type`, `Content`, `AnnouncementDate`) VALUES
(17, 'The Armour of Light', 'new book coming soon', '2023-09-22'),
(18, 'The Armour of Light', 'new book coming soon', '2023-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `AuthorID` int(50) NOT NULL,
  `AuthorName` varchar(255) DEFAULT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`AuthorID`, `AuthorName`, `Website`, `Email`, `ImageURL`) VALUES
(21, 'William Shakespeare', 'www.Willim.com', 'William@gmail.com', 'face25.jpg'),
(22, ' George Orwell', ' www.GeorgeOrwell.com', 'GeorgeOrwell@gmail.com', 'image/author_images/face22.jpg'),
(24, 'J.K. Rowling', 'www.J.K. Rowling.com', 'JKRowling@gmail.com', 'image/author_images/face21.jpg'),
(25, 'Virginia Woolf', 'www.Virginia Woolf.com', 'VirginiaWoolf@gmail.com', 'image/author_images/face23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `AuthorID` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `LastRevisionDate` date DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookID`, `Title`, `AuthorID`, `Description`, `Price`, `LastRevisionDate`, `ImageURL`, `CategoryID`) VALUES
(33, 'ALL About love', 21, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 44.00, '2023-09-13', 'All About Love.jpg', 3),
(34, 'BIRTH OF END ', 22, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 19.99, '2023-09-14', 'cost of living.jpg', 10),
(35, 'CAN\'T HURT ME', 25, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 49.00, '2023-09-22', 'can\'t hurt me.jpg', 3),
(36, 'COST OF LIVING', 24, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 10.00, '2023-09-02', 'cost of living.jpg', 4),
(37, 'COUNTERTEIT', 22, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 40.00, '2023-07-31', 'counterfeit.jpg', 9),
(38, 'COVER SOLO', 25, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 49.00, '2023-09-14', 'cover_solo_2021_mare.jpg', 10),
(39, 'E LOCKHART', 25, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 188.00, '2023-09-07', 'E-Lockhart.jpg', 10),
(40, 'FRANCHISE', 21, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 35.00, '2023-08-01', 'Franchise.jpg', 3),
(41, 'GROUP', 24, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 65.00, '2023-09-22', 'Group.jpg', 3),
(43, 'HAPPY MARRIAGE', 24, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 65.00, '2023-09-08', 'Happy Marriage.jpg', 9),
(44, 'HOW TO DO', 25, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 65.00, '2023-09-30', 'how to do the work.jpg', 4),
(45, 'I\'M GLAD MY MOM', 22, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 65.00, '2023-09-23', 'I\'m Glad My Mom Died.jpg', 9),
(48, 'GULF', 24, 'In the heart of a mysterious forest, a lone traveler embarks on an enigmatic adventure that will forever change their destiny. \"The Enigmatic Adventure\" takes you on a thrilling journey through a world of secrets, ancient legends, and untold magic.', 78.00, '2023-09-28', 'gulf.jpg', 9),
(54, 'sans laiser', 21, '\"The Enigmatic Adventure\" is a mesmerizing tale of courage, curiosity, and the enduring quest for knowledge. Join the adventure, and prepare to be captivated by a world where the line between reality and fantasy blurs, and where the true magic lies in the pursuit of the unknown.', 65.00, '2023-09-23', 'Sans laiser.jpg', 10),
(55, 'SOMBRES CREATURE', 22, '\"The Enigmatic Adventure\" is a mesmerizing tale of courage, curiosity, and the enduring quest for knowledge. Join the adventure, and prepare to be captivated by a world where the line between reality and fantasy blurs, and where the true magic lies in the pursuit of the unknown.', 65.00, '2023-09-09', 'sombres creatures.jpg', 3),
(56, 'THE LAST THING', 21, '\"The Enigmatic Adventure\" is a mesmerizing tale of courage, curiosity, and the enduring quest for knowledge. Join the adventure, and prepare to be captivated by a world where the line between reality and fantasy blurs, and where the true magic lies in the pursuit of the unknown.', 65.00, '2023-08-09', 'The last thing.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(3, 'Comedy'),
(4, 'Story'),
(9, 'Novel'),
(10, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `DealerID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `ContactInfo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_Id` int(11) NOT NULL,
  `Item_Order_Id` int(11) NOT NULL,
  `Item_Book_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_Id`, `Item_Order_Id`, `Item_Book_Id`, `Quantity`) VALUES
(4, 27, 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `BookID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `PaymentStatus` varchar(50) DEFAULT NULL,
  `order_user_id` int(11) DEFAULT NULL,
  `Order_Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `BookID`, `OrderDate`, `Status`, `PaymentStatus`, `order_user_id`, `Order_Price`) VALUES
(1, 1, '2023-04-01', 'Confirmed', 'Received', NULL, NULL),
(2, 2, '2023-04-02', 'Pending', 'Pending', NULL, NULL),
(3, 3, '2023-04-03', 'Delivered', 'Received', NULL, NULL),
(4, 2, '0002-03-12', 'Pending', NULL, NULL, NULL),
(5, 2, '0002-03-12', '', '', NULL, NULL),
(6, 2, '6645-05-14', 'Pending', 'Received', NULL, NULL),
(7, 2, '6645-05-14', 'Pending', 'Received', NULL, NULL),
(27, NULL, '2023-09-26', NULL, NULL, 0, 78),
(28, NULL, '2023-09-26', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pasword` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pasword`) VALUES
(1, 'abc', 'abc@gmail.com', 'aptech');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `WinnerID` int(11) NOT NULL,
  `win_user_id` int(11) DEFAULT NULL,
  `Prize` varchar(255) DEFAULT NULL,
  `WINNER_IMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`AnnouncementID`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `AuthorID` (`AuthorID`),
  ADD KEY `FK_Category` (`CategoryID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`DealerID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_Id`),
  ADD KEY `Foreign Key` (`Item_Order_Id`),
  ADD KEY `Item_Book_Id` (`Item_Book_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `BookID` (`BookID`),
  ADD KEY `order_user_id` (`order_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`WinnerID`),
  ADD KEY `CustomerID` (`win_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `AnnouncementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `AuthorID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Item_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `WinnerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`AuthorID`) REFERENCES `authors` (`AuthorID`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`Item_Order_Id`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`Item_Book_Id`) REFERENCES `books` (`BookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
