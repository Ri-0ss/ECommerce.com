-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 06:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'ridham', 'ridham@gmail.com', 'My product is not delivered yet!!!', '2024-12-23 16:02:07'),
(2, 'Jennie', 'jennie@gmail.com', 'my sunglass are broken can you please exchange it ?', '2024-12-23 16:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `hire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `position`, `department`, `salary`, `hire_date`) VALUES
(1, 'Alice Smith', 'Software Engineer', 'IT', 60000.00, '2023-01-15'),
(2, 'Bob Johnson', 'Project Manager', 'Management', 80000.00, '2022-05-10'),
(3, 'Charlie Brown', 'Data Analyst', 'IT', 55000.00, '2023-03-20'),
(4, 'Diana Prince', 'UI/UX Designer', 'Design', 65000.00, '2023-04-01'),
(5, 'Edward Elric', 'DevOps Engineer', 'IT', 70000.00, '2023-06-25'),
(6, 'Fiona Gallagher', 'HR Manager', 'HR', 75000.00, '2023-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_name`, `quantity`, `price`, `supplier`) VALUES
(7, 'Floral Maxi Dress', 35, 2999.00, 'Fashion Hub'),
(8, 'Denim Jacket', 25, 1999.00, 'Trendy Styles'),
(9, 'Silk Scarf', 50, 899.00, 'Accessory World'),
(10, 'High Heels', 40, 2499.00, 'Footwear Co.'),
(11, 'Chic Handbag', 20, 3499.00, 'Luxury Bags'),
(12, 'Sporty Leggings', 60, 1499.00, 'Active Wear Co.'),
(13, 'Cotton T-Shirt', 45, 999.00, 'Everyday Essentials'),
(14, 'A-Line Skirt', 35, 1799.00, 'Stylish Skirts'),
(15, 'Woolen Sweater', 30, 2399.00, 'Winter Wear Co.'),
(16, 'Leather Boots', 15, 2999.00, 'Footwear Co.'),
(17, 'Printed Kaftan', 40, 1999.00, 'Resort Wear'),
(19, 'Printed Kaftan		', 45, 2000.00, 'Resort Wear');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `review_stars` int(11) DEFAULT NULL CHECK (`review_stars` >= 1 and `review_stars` <= 5),
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_path`, `review_stars`, `details`) VALUES
(1, 'Stylish Dress', 'Beautiful summer dress perfect for outings.', 3000.00, 'images/product1.jpg', 5, 'Details about Stylish Dress.'),
(2, 'Fashion Handbag', 'Trendy handbag for everyday use.', 4000.00, 'images/product2.jpg', 5, 'Details about Fashion Handbag.'),
(3, 'Chic Sunglasses', 'Fashionable sunglasses for sunny days.', 1500.00, 'images/product3.jpg', 4, 'Details about Chic Sunglasses.'),
(4, 'Elegant Scarf', 'Soft scarf to complement any outfit.', 2500.00, 'images/product4.jpg', 5, 'Details about Elegant Scarf.'),
(5, 'Stylish Sneakers', 'Comfortable sneakers for casual wear.', 6000.00, 'images/product5.jpg', 5, 'Details about Stylish Sneakers.'),
(6, 'Trendy Jewelry', 'Fashionable jewelry set for special occasions.', 5000.00, 'images/product6.jpg', 5, 'Details about Trendy Jewelry.'),
(7, 'Fashionable Backpack', 'Chic backpack for school or outings.', 3500.00, 'images/product7.jpg', 4, 'Details about Fashionable Backpack.'),
(8, 'Cute Flats', 'Adorable flats for everyday wear.', 2000.00, 'images/product8.jpg', 5, 'Details about Cute Flats.'),
(9, 'Stylish Watch', 'Fashionable watch to enhance your style.', 8000.00, 'images/product9.jpg', 5, 'Details about Stylish Watch.'),
(10, 'Makeup Kit', 'Complete makeup kit for all your beauty needs.', 5000.00, 'images/product10.jpg', 5, 'Details about Makeup Kit.'),
(11, 'Cosmetic Organizer', 'Practical organizer for your cosmetics.', 1500.00, 'images/product11.jpg', 4, 'Details about Cosmetic Organizer.'),
(13, 'Fashionable Dress		', 'Beautiful summer dress perfect for outings.', 3000.00, 'blog5.jpg', NULL, 'nice fashion hub');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_name`, `user_email`, `product_id`, `product_name`, `quantity`, `total_price`, `purchase_date`, `payment_method`) VALUES
(8, 'ridham ', 'ridham@gmail.com', 5, 'Stylish Sneakers', 2, 12000.00, '2024-12-23 14:48:21', 'credit/debit'),
(9, 'ridham ', 'ridham@gmail.com', 5, 'Stylish Sneakers', 1, 6000.00, '2024-12-23 15:06:35', 'cash on delivery'),
(10, 'ridham ', 'ridham@gmail.com', 3, 'Chic Sunglasses', 1, 1500.00, '2024-12-23 15:10:53', 'cash on delivery'),
(11, 'jennie', 'jennie@gmail.com', 4, 'Elegant Scarf', 2, 5000.00, '2024-12-23 15:28:10', 'credit/debit'),
(12, 'jennie', 'jennie@gmail.com', 4, 'Elegant Scarf', 2, 5000.00, '2024-12-23 15:28:25', 'upi'),
(13, 'ridham ', 'ridham@gmail.com', 6, 'Trendy Jewelry', 1, 5000.00, '2024-12-24 02:57:31', 'cash on delivery');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$MOIW1oIXceNwDsh2v9B2Y.PpC0JsId5uKhOr.4BjDmDry82nD9V4m', 'admin', '2024-12-23 14:49:46'),
(2, 'ridham', 'ridham@gmail.com', '$2y$10$if6i8NMcCbyC108O7C70MOaAaWbD/bdcPLPIeIVKH9XrTv/wCnV5.', 'user', '2024-12-23 14:51:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
