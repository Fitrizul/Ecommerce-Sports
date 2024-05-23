-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 06:31 AM
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
-- Database: `itemsports`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `message`) VALUES
(1, 'Ahmad Fitri', 'fitri.zulkifli1110@gmail.com', 'hello there'),
(2, 'Ahmad Fitri Zulkifli', 'ahmad.fitri1110@gmail.com', 'Hello'),
(3, 'fitri', 'fitri.zulkifli1110@gmail.com', 'yesss');

-- --------------------------------------------------------

--
-- Table structure for table `ordersport`
--

CREATE TABLE `ordersport` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `order_quantity` varchar(255) NOT NULL,
  `order_totalPrice` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordersport`
--

INSERT INTO `ordersport` (`order_id`, `user_id`, `product_name`, `product_image`, `product_price`, `order_quantity`, `order_totalPrice`, `order_status`) VALUES
(1, 1, 'Adidas Short Black\nNike Shorts Black', 'images/Pants/AdidasShortsBlack.jpg\nimages/Pants/NikeShortsBlack.jpg', '45\n95', '1\n1', '146', 'Pending'),
(2, 1, 'Adidas Classic Backpack Pink', 'images/Bags/AdidasClassicBadgeBackpackPink.jpg', '109', '1', '115', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category`, `price`, `productDescription`, `colour`, `image`, `image2`) VALUES
(1, 'Adidas Jersey Black', 'Jerseys', 109, 'This adidas jersey brings essential football style to all Tiro lovers. With a slim, streamlined fit and bold 3-Stripes, it\'ll stand out at the training ground.', 'Black', 'images/Jerseys/AdidasTiroJerseyBlack.jpg', 'images/Jerseys/AdidasTiroJerseyBlack2.jpg'),
(2, 'Adidas Jersey Red', 'Jerseys', 69, 'Train like a professional. Relax like a champion. This football jersey shows off a clean, classic design with an adidas Badge of Sport on the chest.', 'Red', 'images/Jerseys/AdidasJerseyRed.jpg', 'images/Jerseys/AdidasJerseyRed2.jpg'),
(3, 'Nike Jersey Black', 'Jerseys', 71, 'The Nike Dri-FIT Superset Top feels smooth and nonrestrictive as you push, pull and lift with a design that shifts the shoulder seams out of the way.', 'Black', 'images/Jerseys/NikeJerseyBlack.jpg', 'images/Jerseys/NikeJerseyBlack2.jpg'),
(4, 'Nike Jersey Top Blue', 'Jerseys', 71, 'The Nike Top Blue delivers a breathable, lightweight design for comfort on the go. It also helps you stay dry and cool.', 'Black & Blue', 'images/Jerseys/NikeJerseyTopBlue.jpg', 'images/Jerseys/NikeJerseyTopBlue2.jpg'),
(5, 'Puma Jersey Black', 'Jerseys', 85, 'Whether on or off the pitch, you\'ll stay cool and comfortable in this clean-lined jersey featuring subtle mesh detailing. PUMA\'s moisture-wicking dryCELL technology will keep you feeling as cool and fresh as you look.', 'Black', 'images/Jerseys/PumaJerseyBlack.jpg', 'images/Jerseys/PumaJerseyBlack2.jpg'),
(6, 'Puma Jersey Blue', 'Jerseys', 65, 'Meet the demands of the game at every level in this next-generation jersey. Designed with dryCELL functionality for a moisture-wicking finish, this piece from the teamRISE collection also incorporates stylish elements for the driven young player.', 'Blue', 'images/Jerseys/PumaJerseyBlue.jpg', 'images/Jerseys/PumaJerseyBlue2.jpg'),
(7, 'Adidas Pants Bottom Black', 'Pants', 139, 'The classic Tiro tapered legs and ankle zips let you put your footwear on display. This product is made with Primegreen, a series of high-performance recycled materials.', 'Black', 'images/Pants/AdidasPantsBottomBlack.jpg', 'images/Pants/AdidasPantsBottomBlack2.jpg'),
(8, 'Adidas Short Black', 'Pants', 45, 'This product is made with Primegreen, a series of high-performance recycled materials. The clean design makes it easy to add team details and squad numbers.', 'Black', 'images/Pants/AdidasShortsBlack.jpg', 'images/Pants/AdidasShortsBlack2.jpg'),
(9, 'Nike Shorts Black', 'Pants', 95, 'The iconic Nike Challenger Shorts deliver woven comfort with an all-new articulated brief. Mesh details and secure storage give the versatility you want from an everyday short.', 'Black', 'images/Pants/NikeShortsBlack.jpg', 'images/Pants/NikeShortsBlack2.jpg'),
(10, 'Umbro Track Bottom Black', 'Pants', 79, 'UMBRO MEN TRACK BOTTOMS T-BOTTOM BLACK', 'Black', 'images/Pants/UmbroMenTrackBottomBlack.jpg', 'images/Pants/UmbroMenTrackBottomBlack2.jpg'),
(11, 'Puma Track Bottoms Navy', 'Pants', 99, 'Modern designs and high-performance materials unite in the teamRISE collection to meet the demands of your team, whatever level you play at. Look sharp and stay warm on the sidelines in these versatile woven pants with zipped legs.', 'Navy', 'images/Pants/PumaTrackBottomsNavy.jpg', 'images/Pants/PumaTrackBottomsNavy2.jpg'),
(12, 'Puma Rainbow Short Black', 'Pants', 89, 'Featuring a cozy, adjustable fit, multiple points of storage, rainbow embroidered accents and recycled materials.', 'Black', 'images/Pants/PumaRainbowShortBlack.jpg', 'images/Pants/PumaRainbowShortBlack2.jpg'),
(13, 'Adidas Adilette Slides Black', 'Slippers', 119, 'From the pool deck to the shower to the couch, these slides are made for the work-hard-rest-hard lifestyle. The slip-on construction gives you a snug fit that\'s easy to kick on and off as needed.', 'Black', 'images/Slippers/AdidasAdiletteblackk.jpg', 'images/Slippers/AdidasAdiletteblackk2.jpg'),
(14, 'Adidas Adilette Slides Red', 'Slippers', 119, 'From the pool deck to the shower to the couch, these slides are made for the work-hard-rest-hard lifestyle. The slip-on construction gives you a snug fit that\'s easy to kick on and off as needed. ', 'Red', 'images/Slippers/AdidasAdiletteRed.jpg', 'images/Slippers/AdidasAdiletteRed2.jpg'),
(15, 'NB Slides White', 'Slippers', 119, 'Slides that provide a comfortable fit with a comfortable soft footbed on the soles of the feet.', 'White', 'images/Slippers/NBSlideswhite.jpg', 'images/Slippers/NBSlideswhite2.jpg'),
(16, 'NB Slides Black', 'Slippers', 139, 'Our Adjustable Sandal will be your new go-to locker room companion. Our slide has plush top bed foam for cushioning that offers a great underfoot feel.', 'Black', 'images/Slippers/NBSlidesblackk.jpg', 'images/Slippers/NBSlidesblackk2.jpg'),
(17, 'Nike Slides Blue', 'Slippers', 129, 'From the beach to the bleachers, the Nike Victori One perfects a classic, must have design. Delivering lightweight comfort that’s easy to wear, it\'s updated with softer, more responsive foam. ', 'Blue', 'images/Slippers/NikeSlidesNavy.jpg', 'images/Slippers/NikeSlidesNavy2.jpg'),
(18, 'Nike Victori One White', 'Slippers', 129, 'From the beach to the bleachers, the Nike Victori One perfects a classic, must have design. Delivering lightweight comfort that’s easy to wear, it\'s updated with softer, more responsive foam.', 'White', 'images/Slippers/NikeVictoriOneWhite.jpg', 'images/Slippers/NikeVictoriOneWhite2.jpg'),
(19, 'Adidas Shoes Black', 'Shoes', 160, 'These adidas running shoes will keep you comfortable, however late your day runs. A great everyday shoe, they have a light and airy mesh upper to keep your feet cool and a Cloudfoam midsole for springiness.', 'Black', 'images/shoes/AdidasShoesBlack.jpg', 'images/shoes/AdidasShoesBlack2.jpg'),
(20, 'Adidas Shoes Maroon', 'Shoes', 229, 'The rubber outsole is designed to stay firm across all surfaces, from wet grass to slow clay. Switch up your plans without changing your shoes.', 'Maroon', 'images/shoes/AdidasShoesMaroon.jpg', 'images/shoes/AdidasShoesMaroon5.png'),
(21, 'Nike Shoes Black', 'Shoes', 249, 'When everyday runs are on the menu, the Nike Renew Ride 3 comes through with a smooth and soft ride. It\'s got a secure fit and cozy feel, geared for those looking looking to find their running potential. ', 'Black', 'images/shoes/NikeShoesBlack.jpg', 'images/shoes/NikeShoesBlack2.jpg'),
(22, 'Nike Shoes White', 'Shoes', 189, 'Take those first steps on your running journey in the Nike White Downshifter 12. Made from at least 20% recycled content by weight, it has a supportive fit and stable ride, with a lightweight feel that easily transitions from your workout to hangout. ', 'White', 'images/shoes/NikeShoesWhite.jpg', 'images/shoes/NikeShoesWhite2.jpg'),
(23, 'Puma Shoes Black', 'Shoes', 219, 'PUMA MEN FLYER RUNNER RUNNING BLACK', 'Black', 'images/shoes/PumaShoesBlack.jpg', 'images/shoes/PumaShoesBlack2.jpg'),
(24, 'Puma Shoes Blue', 'Shoes', 199, 'PUMA MEN INTERFLEX RUNNER RUNNING BLUE', 'Blue', 'images/shoes/PumaShoesBlue.jpg', 'images/shoes/PumaShoesBlue2.jpg'),
(25, 'Adidas Classic Backpack Black', 'Bags', 109, 'An adidas backpack that can store everything you need in style. You can carry plenty of luggage such as coffee cups, laptops, and running gear that can be used repeatedly.', 'Black', 'images/Bags/AdidasClassicBadgeBackpackBlack.jpg', 'images/Bags/AdidasClassicBadgeBackpackBlack2.png'),
(26, 'Adidas Classic Backpack Pink', 'Bags', 109, 'This adidas classic offers a stylish way to store all your stuff. From your reusable coffee cup to your laptop to your running gear. It\'s also got a side pocket for that all-important water bottle.', 'Pink', 'images/Bags/AdidasClassicBadgeBackpackPink.jpg', 'images/Bags/AdidasClassicBadgeBackpackPink2.jpg'),
(27, 'Nike Backpack Black', 'Bags', 125, 'Ready for a flight or a trip across town, school, work or the gym, the Nike Backpack has you covered. A large zippered compartment offers room for shoes, an extra set of clothes for the gym or your books and laptop for school.', 'Black', 'images/Bags/NikeHeritageBackpackBlack.jpg', 'images/Bags/NikeHeritageBackpackBlack2.jpg'),
(28, 'Nike Heritage Backpack Purple', 'Bags', 139, 'A classic from Nike, the Heritage Backpack has a large double zipper main compartment for storage, as well as a smaller front pocket for the things you don\'t want getting lost. ', 'Purple', 'images/Bags/NikeHeritageBackpackPurple.jpg', 'images/Bags/NikeHeritageBackpackPurple2.jpg'),
(29, 'Puma Backpack Black', 'Bags', 99, 'The classic design features a roomy main compartment that opens via a two-way zip and padded adjustable straps so you can go through your day in style and comfort.', 'Black', 'images/Bags/PumaBaseBackpackBlack.jpg', 'images/Bags/PumaBaseBackpackBlack2.jpg'),
(30, 'Puma Classic Backpack Black', 'Bags', 179, 'PUMA CLASSICS BACKPACK BLACK', 'Black', 'images/Bags/PumaPrimeClassicsBackpackBlack.jpg', 'images/Bags/PumaPrimeClassicsBackpackBlack2.jpg'),
(32, 'Adidas Starlancer Ball', 'Equipment', 59, 'This adidas Starlancer football is a dependable option for training sessions and kickabouts. Its TPU cover and machine-stitched construction dial up its durability.', 'Blue & White', 'images/Equipment/AdidasStarlancerBall.png', 'images/Equipment/AdidasStarlancerBall2.png'),
(33, 'Adidas UCL Club Ball', 'Equipment', 55, 'Inspired by the darkest depths of the universe, this adidas UCL Club Void Ball mimics the look of the UEFA Champions League\'s official football. Perfect for kickabouts, its hard-wearing, machine-stitched design keeps it bouncing back for more.', 'Blue & White', 'images/Equipment/AdidasUclClubBall.jpg', 'images/Equipment/AdidasUclClubBall2.jpg'),
(34, 'Nike Pitch White', 'Equipment', 71, 'Get ready to score with the Nike Pitch Football Ball. It has high-contrast graphics for high visibility during play and practice, while its durable design offers truer flight off the foot.', 'Green & White', 'images/Equipment/NikePitchWhite.jpg', 'images/Equipment/NikePitchWhite2.jpg'),
(35, 'Nike Premier Ball Yellow', 'Equipment', 89, 'Visibility meets durability with the Premier League Pitch Football Ball. It features high-contrast graphics for easing tracking during play and practice, while a sturdy and responsive construction offers truer flight off the foot.', 'Yellow', 'images/Equipment/NikePremierBallYellow.jpg', 'images/Equipment/NikePremierBallYellow2.jpg'),
(36, 'Puma Park Ball Green', 'Equipment', 59, 'PUMA PARK BALL GREEN', 'Green', 'images/Equipment/PumaParkBallGreen.jpg', 'images/Equipment/PumaParkBallGreen2.jpg'),
(37, 'Puma Park Ball Blue', 'Equipment', 59, 'PUMA, FOOTBALL, FOOTBALL SIZE-5, YELLOW, PUMA PARK FOOTBALL SIZE 5', 'Blue', 'images/Equipment/PumaParkFootballBlue.jpg', 'images/Equipment/PumaParkFootballBlue2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `emailCust` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `addInfo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `firstName`, `lastName`, `address`, `emailCust`, `phoneNumber`, `addInfo`) VALUES
(1, 'Fitri', 'Zulkifli', 'Bukit Rambai', 'ahmad.fitri1110@gmail.com', '0176193230', 'yes'),
(2, 'Fitri', 'Zulkifli', 'Bukit Rambai', 'ahmad.fitri1110@gmail.com', '0176193230', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'fitrizul20', 'ahmad.fitri1110@gmail.com', '1110'),
(2, 'hazwan2', 'hazwan01@gmail.com', '0101'),
(3, 'daud14', 'daud.14@gmail.com', '1414'),
(5, 'fitrii', 'ahmad.fitri1110@gmail.com', '1120');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `ordersport`
--
ALTER TABLE `ordersport`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordersport`
--
ALTER TABLE `ordersport`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
