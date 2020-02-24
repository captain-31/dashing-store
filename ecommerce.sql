-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 07:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `p_id`) VALUES
(35, 44, 34),
(36, 44, 17),
(39, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'Rahul Naik', 'rahulnaik@gmail.com', 'I need price details about Sony Camera.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `time_stamp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `u_id`, `p_id`, `time_stamp`) VALUES
(25, 41, 23, '21-07-2019 03:06 PM'),
(26, 41, 29, '21-07-2019 03:06 PM'),
(27, 43, 35, '21-07-2019 03:27 PM'),
(28, 43, 7, '21-07-2019 03:27 PM'),
(29, 41, 29, '21-07-2019 04:15 PM'),
(30, 41, 31, '21-07-2019 08:13 PM'),
(31, 41, 14, '21-07-2019 08:37 PM'),
(32, 41, 25, '21-07-2019 08:37 PM'),
(33, 44, 28, '21-07-2019 11:05 PM'),
(34, 44, 29, '21-07-2019 11:05 PM'),
(35, 45, 35, '21-07-2019 11:08 PM'),
(36, 45, 22, '21-07-2019 11:08 PM');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `name`, `description`, `image_path`, `price`, `category`) VALUES
(1, 'Fastrack Analog Watch', 'Flawless sense of style with this Fastrack Analog Watch.', 'product-images/watch1.jpeg', 1500, 'Accesories'),
(7, 'Casio G Shock Watch', 'Casio Sports watch for men\'s. Best quality and strong.', 'product-images/watch12.jpg', 3500, 'Accesories'),
(8, 'Women\'s Blue Watch', 'Beautifully designed women\'s blue watch by Blue', 'product-images/watch20.jpg', 799, 'Accesories'),
(9, 'Women\'s Eva Watch', 'Small watch for women\'s with diamond design', 'product-images/watch19.jpg', 1200, 'Accesories'),
(12, 'Men\'s Brown Watch', 'Brown watch with leather strap and best quality for men\'s', 'product-images/watch3.jpeg', 1200, 'Accesories'),
(13, 'Men\' Supra Watch', 'Supra watch with white dial and rubber strap and waterproof.', 'product-images/watch2.jpeg', 2300, 'Accesories'),
(14, 'Sony DSLR Camera', 'Sony 20.1 MP DSLR camera with accessories and 1yr warranty', 'product-images/camera1.jpg', 85000, 'Electronics'),
(15, 'Canon Rebel Camera', 'Canon EOS Rebel 24 MP digital camera with the quality Lens', 'product-images/camera7.jpg', 45000, 'Electronics'),
(16, 'Hitachi Digital Camera', 'A digital camera with all accessories and best hitachi lens', 'product-images/camera6.jpg', 15000, 'Electronics'),
(17, 'Canon G7x', 'Canon G7x camera with 10 MP and 1 year warranty', 'product-images/camera5.jpg', 7900, 'Electronics'),
(18, 'Canon EOS 13000', 'Superb quality camera with high range of lens', 'product-images/camera4.jpg', 75000, 'Electronics'),
(19, 'GoPro Sports Camera', 'GoPro waterproof camera with 32 MP and HD resolution', 'product-images/camera3.jpg', 34000, 'Electronics'),
(20, 'Nikkon Camera', 'Nikkon high definition camera with 1 year warranty', 'product-images/camera2.jpg', 23000, 'Electronics'),
(22, 'Go Pro Fusion', 'Water Proof camera with a quality lens and accesories', 'product-images/camera10.png', 20500, 'Electronics'),
(23, 'Canvas Backpack', 'Canvas Unisex backpack with multiple sections and waterproof', 'product-images/bag1.jpg', 899, 'Accesories'),
(24, 'Mini Backpack', 'Mini backpack with two sections and 1 year warranty', 'product-images/bag2.jpg', 799, 'Accesories'),
(25, 'Nike Backpack', 'Nike Backpack with multiple sections and 1 year warranty', 'product-images/bag6.jpg', 1500, 'Accesories'),
(26, 'Sports Sunglasses', 'Polarized sports sunglasses with fiber unbreakable glass  ', 'product-images/sun1.jpg', 350, 'Accesories'),
(27, 'Oklay Sunglasses', 'Brand new oklay polarised sunglasses with 1 year warranty', 'product-images/sun2.jpg', 2300, 'Accesories'),
(28, 'Rayban Aviator Sunglasses', 'Rayban aviator comes with black colored polarised glass', 'product-images/sun3.png', 5800, 'Accesories'),
(29, 'Adidas Sports Shoes', 'Adidas running shoes with high comfort and best quality', 'product-images/shoe1.jpeg', 1700, 'Footwear'),
(30, 'Lotto Sports Shoes', 'Lotto running shoes with best quality material used', 'product-images/shoe2.jpg', 899, 'Footwear'),
(31, 'Women\'s Sneakers', 'White women\'s sneakers with best comfort and design', 'product-images/shoe3.jpg', 599, 'Footwear'),
(32, 'Men\'s Formal Shoes', 'Men\'s Black colored patterned formal shoes with lace', 'product-images/shoe4.jpg', 999, 'Footwear'),
(33, 'Women\'s Shoes', 'Best quality and art designed women\'s shoes ', 'product-images/shoe5.jpg', 499, 'Footwear'),
(34, 'Marshmellow Tshirt', 'Men\'s Marshmellow t-shirt. Fine quality material', 'product-images/t1.jpg', 350, 'Fashion'),
(35, 'Adidas Men\'s T-shirt', 'Adidas polyester sports t-shirt for men\'s in white color', 'product-images/t2.jpg', 500, 'Fashion'),
(36, 'Men\'s Sports T-Shirt', 'Men\'s sports t-shirt in black and white design and pattern', 'product-images/t3.jpg', 250, 'Fashion'),
(37, 'Men\'s Printed T-Shirt', 'Men\'s printed t-shirt in black color pure cotton ', 'product-images/t4.jpg', 200, 'Fashion'),
(38, 'Men\'s Ironman T-shirt', 'Men\'s red-colored iron man t-shirt with ironman design', 'product-images/t5.jpg', 350, 'Fashion'),
(39, 'Men\'s Avengers T-shirt', 'Men\'s avenger\'s blue colored t-shirt with the best quality fabric', 'product-images/t6.jpg', 299, 'Fashion'),
(40, 'Pro Warch Men\'s', 'Superb quality watch with fine quality strap and design', 'product-images/watch1.jpg', 899, 'Accesories');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_id`, `first_name`, `last_name`, `phone`, `password`, `address`, `city`, `gender`) VALUES
(34, 'rahul@gmail.com', 'Rahul', 'Naik', '9800123243', '1298815fd9e0a06860203eefd188c354', 'Ajay Heights, Vishrambag, Sangli Miraj Road', 'Sangli', 'Male'),
(35, 'imran@gmail.com', 'Imram', 'Bargir', '8988235671', 'bdd77d8fb71087f7c3d093c2395fae7e', 'Shamrao Nagar', 'Sangli', 'Male'),
(37, 'nitin@gmail.com', 'Nitin', 'Patel', '8977645129', '4e7da7c0a4df339ec14a14917ecfc4b8', 'new market, near sfc mall\r\n', 'pune', 'Male'),
(38, 'yogesh@gmail.com', 'Yogesh', 'Babar', '9632587410', 'e4b0cc0b91c6c01890fa71c51fd36a08', 'Main road , near state bank', 'Miraj', 'Male'),
(40, 'law@gmail.com', 'Lawrance', 'Marri', '9089786756', '7911a5de7848abd48ef205bde9048e54', 'Samta Nagar Sangli', 'Pune', 'Male'),
(41, 'mark@gmail.com', 'Mark', 'Zuck', '9088324321', 'dd3d2147c9ae76695d5efbd3509cbbd7', 'USA', 'California', 'Male'),
(42, 'amit@gmail.com', 'Amit', 'Shah', '9088123453', 'ec1c4b3cf0a6d5dd1d3fa77750c068a0', 'Near chandni chowk, market area', 'Mumbai', 'Male'),
(43, 'sham@gmail.com', 'Sham', 'Patel', '8977612345', 'c879f54db61aebff5f20d1346d073133', 'Mahatma Gandhi Road, Near Super Market ', 'Mumbai', 'Male'),
(44, 'ram@gmail.com', 'Ram', 'Sharma', '8988712345', '1b7b4c38f626766bbdcfc895e2c514f6', 'Market Yard Area, Near City Hospital', 'Pune', 'Male'),
(45, 'vikram@gmail.com', 'Vikram', 'Bhat', '9099876123', 'eae3a51c5cb1e4d09e6302ab4fbb094a', 'Main Line Road, Near SFC mall', 'Nagpur', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
