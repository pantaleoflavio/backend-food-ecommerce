-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 09, 2024 alle 12:15
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshcherry`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `invoice` varchar(200) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `order_notes` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `product_list` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `bills`
--

INSERT INTO `bills` (`bill_id`, `invoice`, `fullname`, `company`, `city`, `country`, `adresse`, `zip`, `email`, `phone`, `order_notes`, `user_id`, `total`, `product_list`, `created_at`, `delivery`) VALUES
(17, NULL, 'John Doe', '', 'verona', 'venedig', 'via Vie 2', 0, 'john@doe.com', 0, 'juzkmrfzkltrf,luit,', 1, 558.72, '', '2023-11-14 19:23:34', 0),
(43, NULL, 'John Doe', '', 'verona', 'venedig', 'via Vie 2', 0, 'john@doe.com', 0, 'test 4', 1, 177.23, 'meat €101.11 x 1<br>Pig €56.12 x 1<br>', '2023-11-19 13:59:44', 0),
(44, NULL, 'John Doe', '', 'verona', 'v', 'via Vie 2', 0, 'john@doe.com', 0, 'test 5', 1, 171.20, 'Package €5.50 x 2<br>beetroot €20.10 x 2<br>apple €100.00 x 1<br>', '2023-11-19 14:02:20', 1),
(47, NULL, 'John Doe', '', 'verona', 'venedig', 'via Vie 2', 0, 'john@doe.com', 0, '', 1, 80.30, 'beetroot €20.10 x 3<br>', '2023-11-19 14:06:21', 0),
(48, 'Q74LISzpbG', 'John Doe', '', 'Chicago', 'India', 'street 10', 11234, 'john@doe.com', 123092938, 'Another test', 1, 372.31, 'apple €100.00 x 2<br>beetroot €20.10 x 2<br>fries €5.50 x 2<br>meat €101.11 x 1<br>', '2023-11-20 14:59:34', 0),
(49, 'H13YnED98y', 'mary', '', 'verona', 'venedig', 'via Vie 2', 0, 'mary@jane.com', 0, 'test', 3, 80.69, 'salmon €20.23 x 3<br>', '2023-11-26 13:28:21', 0),
(50, '0Ue4gylt8u', 'mary', '', 'Munich', 'Germania', 'via Vie 2', 11234, 'mary@jane.com', 0, 'test', 3, 80.69, 'salmon €20.23 x 3<br>', '2023-12-05 19:06:43', 0),
(51, 'NXbgaC2Gzx', 'John Doe', '', 'München', 'Germania', 'via Vie 2', 80000, 'john@doe.com', 1760000000, 'test for path', 1, 116.60, 'beetroot €24.15 x 4<br>', '2023-12-14 17:24:32', 1),
(52, '0m9lcW8dsE', 'John Doe', 'Freiberufler ', 'verona', 'Italy', 'via Vie 2', 0, 'john@doe.com', 2147483647, 'Test new functs', 1, 383.10, 'salmon €20.23 x 8<br>apple €100.15 x 1<br>meat €101.11 x 1<br>', '2024-01-08 17:05:34', 0),
(53, 'E4dTtXvqPy', 'mary', '', 'rom', 'spain', 'via venedig', 0, 'mary@jane.com', 0, 'test new functs', 3, 233.35, 'meat €101.11 x 1<br>Pig €56.12 x 2<br>', '2024-01-08 17:12:00', 0),
(54, 'TqPBI0QUGc', 'mary', '', 'rom', 'spain', 'via Vie 2', 0, 'mary@jane.com', 0, 'prova', 3, 121.15, 'salmon €20.23 x 5<br>', '2024-01-08 17:13:14', 1),
(55, 'LcQjSYsBZ0', 'Tizio Caio', '', 'Graz', 'Austria', 'str 1', 12311, 'tizio@caio.com', 1234455333, 'another test', 5, 320.45, 'apple €100.15 x 3<br>', '2024-01-09 11:12:27', 1),
(56, '2vaMySsTV1', 'John Doe', '', 'verona', 'spain', 'via Vie 2', 1111111, 'john@doe.com', 2147483647, '', 1, 50.00, 'Cute wormo €2.00 x 15<br>', '2024-01-09 11:13:46', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `pro_title` varchar(200) DEFAULT NULL,
  `pro_image` varchar(200) DEFAULT NULL,
  `pro_price` decimal(10,2) DEFAULT NULL,
  `pro_qty` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `category_image` varchar(200) DEFAULT NULL,
  `category_description` varchar(200) DEFAULT NULL,
  `category_icon` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`, `category_description`, `category_icon`, `created_at`) VALUES
(1, 'vegetables', 'vegetables.jpg', 'Freshly Harvested Veggies From Local Growers', 'bistro-carrot', '2023-11-07 17:42:47'),
(2, 'meats', 'meats.jpg', 'Protein Rich Ingridients From Local Farmers', 'bistro-roast-leg', '2023-11-07 17:42:47'),
(3, 'fruits', 'fruits.jpg', 'Variety of Fruits From Local Growers', 'bistro-apple', '2023-11-07 17:42:47'),
(4, 'Frozen Foods', 'frozen.jpg', 'Protein Rich Ingridients From Local Farmers', 'bistro-french-fries', '2023-11-07 17:42:47'),
(5, 'Packages', 'package.jpg', 'Protein Rich Ingridients From Local Farmers', 'bistro-appetizer', '2023-11-07 17:42:47'),
(6, 'Fishes', 'fish.jpg', 'Protein Rich Ingridients From Local Farmers', 'bistro-fish-1', '2023-11-07 18:18:13'),
(16, 'Worms', 'worm.jpg', 'A test for to check if icon works', 'bistro-drumstick', '2024-01-09 11:00:39');

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(200) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT 1,
  `exp_date` varchar(200) DEFAULT NULL,
  `category_id` int(3) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_image`, `product_price`, `product_quantity`, `exp_date`, `category_id`, `status`, `created_at`) VALUES
(1, 'apple', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'apple.jpg', 100.15, 4, '2023', 3, 1, '2023-11-07 19:10:37'),
(2, 'beetroot', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci', 'beetroot.jpg', 25.00, 4, '2025', 1, 1, '2023-11-07 19:10:37'),
(3, 'salmon', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia des', 'salmon.jpg', 20.23, 10, '2023', 6, 1, '2023-11-07 19:10:37'),
(4, 'meat', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia des', 'meats.jpg', 101.11, 1, '2023', 2, 1, '2023-11-07 19:10:37'),
(5, 'fries', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia des', 'frozen.jpg', 5.50, 1, '2023', 4, 1, '2023-11-07 19:10:37'),
(6, 'Package', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia des', 'frozen.jpg', 5.50, 1, '2023', 5, 1, '2023-11-07 19:10:37'),
(7, 'Pig', 'Better known as tenderloin, the pork loin comes from a section of the pig between its shoulders and its back legs. Like beef tenderloin, the lomo is the most tender section and the leanest one to boot', 'pig.jpg', 56.12, 6, '2023', 2, 1, '2023-11-08 19:47:12'),
(10, 'broccoli', 'a good green vegetable', 'broccoli.jpg', 2.00, 4, '2026', 1, 1, '2024-01-08 14:12:21'),
(12, 'Cute wormo', 'A delicious cute worm to eat raw', 'first.jpg', 2.00, 15, '2024', 16, 1, '2024-01-09 11:03:27');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(200) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `user_image` varchar(200) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_email`, `username`, `user_image`, `user_password`, `role`, `created_at`) VALUES
(1, 'John Doe', 'john@doe.com', 'johndoe', 'johndoe.jpg', '$2y$10$firdux1h4UKrPg04NlNfYOgxE4Lt9fDo2UVnWd7ywZUeWgUkm5qwG', 'admin', '2023-11-05 12:46:42'),
(3, 'Mary Jane', 'mary@jane.com', 'maryjane', 'maryjane.jpg', '$2y$10$LHfldy4T0erCILXa.6xQcenGEsCm1cRUXVT5JwqT/rldZx8FmonCm', 'customer', '2023-11-05 12:51:23'),
(5, 'Tizio Caio', 'tizio@caio.com', 'georgie', 'user.jpg', '$2y$10$aCqbmM7osKn1Alxa0nhS5.y/rJC/H2jDAwLr0meoQ.9efzhdkC1dS', 'customer', '2023-11-05 16:28:06'),
(6, 'User One', 'user@1.it', 'user1', 'user.png', '$2y$10$K8UG.3yeB4QeBi4gc/j16uUuJBDfGAk4CXMOkvr8MLIPF/ylrRt7q', 'customer', '2023-11-05 16:30:30'),
(7, 'User Two', 'user@2.it', 'user2', 'user.png', '$2y$10$jtIZoKnB7hqDNFMmdWplb.20TTq/uwmV45lcU8liD/57txQzJmp3a', 'customer', '2023-11-05 16:31:10'),
(8, 'Winnie Pooh', 'winnie@pooh.it', 'winnie', 'user.png', '$2y$10$XbV5Okb0hOICa28XQuWZi.SmrZr03XgG6XKv1DI//Mc2jFWdAQRx.', 'customer', '2023-11-05 16:36:34'),
(9, 'Mikey Mouse', 'mikey@mouse.it', 'mikey', 'user.png', '$2y$10$suEXV7j7V79xfjO0B/vTduQ58dLwPR7Jk3AtdrVt1vYR1izrma/g2', 'customer', '2023-11-05 16:38:11'),
(10, 'Mr Anderson', 'neo@matrix.com', 'neo', 'user.png', '$2y$10$VfmC4dwiqvERsv274B2PZecNK8XniC6FEacGfdXtaYYZidHuN.5MO', 'customer', '2023-11-05 16:41:21'),
(11, 'John Cena', 'john@cena.com', 'fu', 'user.png', '$2y$10$oH59Fsmj9JBwKw1yheRt2.GNXbfB2X8RxMdLcZhizU2LOkk7q0bga', 'customer', '2023-11-05 16:45:04'),
(12, 'Gianni Vernia', 'gianni@vernia.it', 'giannivernia', 'user.png', '$2y$10$mHykHhh8Wxjdj1Y5Ehd1.e9RxLA3mSpvS38KSjhevoxRz.Nh26U/6', 'customer', '2023-11-26 18:36:19'),
(14, 'Bruce Wayne', 'bat@man.com', 'batman', 'user.png', '$2y$10$uCtmW70kcYFe8XNMiJI/L.4MkRtpQpCHf4aUlXLL6O/3RBF0iaH/K', 'customer', '2023-11-27 16:35:10'),
(15, 'Peter Parker', 'spider@man.com', 'spideyboia', 'spider.jpg', '$2y$10$firdux1h4UKrPg04NlNfYOgxE4Lt9fDo2UVnWd7ywZUeWgUkm5qwG', 'customer', '2023-12-22 08:07:53');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indici per le tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT per la tabella `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
