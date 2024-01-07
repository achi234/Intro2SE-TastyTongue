-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2024 lúc 08:58 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `main`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_invoice` (IN `res_id` INT(11), IN `paymed_id` INT(10))   BEGIN
    DECLARE total_inv int(15);
    
    -- Tính tổng tiền là tổng các đơn hàng của reservation_id
    SELECT COALESCE(SUM(total_price), 0) INTO total_inv
    FROM orders
    WHERE reservation_id = res_id;
    
    -- Thêm hóa đơn mới vào bảng invoices
    INSERT INTO invoices (reservation_id, payment_id, total)
    VALUES (reservation_id, paymed_id, total_inv);
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_order` (IN `res_id` INT(11), IN `product_id` INT(10), IN `qty` INT(10))   BEGIN
    DECLARE u_price INT(10);
    DECLARE t_price INT(10);
    
    -- Tìm giá sản phẩm (unit_price)
    SELECT prod_price INTO u_price
    FROM products WHERE prod_id = product_id;
    
    -- Tính toán trường total_price
    SET t_price = u_price * qty;
    
    -- Thêm đơn hàng mới vào bảng orders
    INSERT INTO orders (reservation_id, prod_id, quantity, unit_price, total_price)
    VALUES (res_id, product_id, qty, u_price, t_price);
    
    -- Cập nhật lại invoices
    UPDATE invoices
    SET total = (
        SELECT COALESCE(SUM(total_price), 0)
        FROM orders
        WHERE reservation_id = res_id
    )
    WHERE reservation_id = res_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_invoice` (IN `res_id` INT(11), IN `paymed_id` INT(10))   BEGIN
    DECLARE total_inv int(15);
    
    -- Tính tổng tiền là tổng các đơn hàng của reservation_id
    SELECT COALESCE(SUM(total_price), 0) INTO total_inv
    FROM orders
    WHERE reservation_id = res_id;
    
    -- Thêm hóa đơn mới vào bảng invoices
    update invoices 
    set payment_id = paymed_id
    WHERE reservation_id = res_id;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_order` (IN `res_id` INT(11), IN `product_id` INT(10), IN `qty` INT(10))   BEGIN
    DECLARE u_price INT(10);
    DECLARE t_price INT(10);
    
    -- Tìm giá sản phẩm (unit_price)
    SELECT prod_price INTO u_price
    FROM products WHERE prod_id = product_id;
    
    -- Tính toán trường total_price
    SET t_price = u_price * qty;
    
    -- Thêm đơn hàng mới vào bảng orders
    UPDATE orders
	SET total_price = t_price, unit_price = u_price, quantity = qty
	WHERE reservation_id = res_id AND prod_id = product_id;
    
    -- Cập nhật lại invoices
    UPDATE invoices
    SET total = (
        SELECT COALESCE(SUM(total_price), 0)
        FROM orders
        WHERE reservation_id = res_id
    )
    WHERE reservation_id = res_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Burger'),
(2, 'Sandwich'),
(3, 'Pizza'),
(4, 'Drink'),
(5, 'Pasta'),
(6, 'Chicken'),
(7, 'Salad'),
(8, 'Snack'),
(9, 'Rice'),
(10, 'Dessert');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(10) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `payment_id` int(10) NOT NULL,
  `total` int(15) DEFAULT 0,
  `status_invoice` tinyint(2) DEFAULT 1,
  `datetime_invoice` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `reservation_id`, `payment_id`, `total`, `status_invoice`, `datetime_invoice`) VALUES
(19, 4, 2, 0, 1, '2024-01-07 16:29:47'),
(20, 5, 2, 0, 1, '2024-01-07 16:29:47'),
(21, 6, 2, 0, 1, '2024-01-07 16:29:47'),
(22, 7, 1, 0, 1, '2024-01-07 16:29:47'),
(23, 9, 2, 163, 1, '2024-01-07 16:29:47'),
(24, 10, 1, 116, 1, '2024-01-07 16:29:47'),
(25, 11, 1, 122, 1, '2024-01-07 16:29:47'),
(26, 12, 2, 73, 1, '2024-01-07 16:29:47'),
(27, 13, 2, 111, 1, '2024-01-07 16:29:47'),
(28, 14, 1, 127, 1, '2024-01-07 16:29:47'),
(29, 25, 1, 85, 1, '2024-01-07 16:29:47'),
(30, 26, 1, 80, 1, '2024-01-07 16:29:47'),
(31, 27, 2, 49, 1, '2024-01-07 16:29:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `reservation_id` int(11) NOT NULL,
  `prod_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) DEFAULT 0,
  `unit_price` int(10) DEFAULT 0,
  `total_price` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`reservation_id`, `prod_id`, `quantity`, `unit_price`, `total_price`) VALUES
(8, 1, 2, 7, 14),
(8, 2, 4, 15, 60),
(8, 4, 1, 8, 8),
(8, 6, 4, 9, 36),
(8, 7, 3, 11, 33),
(8, 8, 4, 10, 40),
(9, 8, 2, 10, 20),
(9, 10, 1, 4, 4),
(9, 11, 2, 6, 12),
(9, 12, 7, 12, 84),
(9, 13, 3, 11, 33),
(9, 14, 2, 5, 10),
(10, 2, 1, 15, 15),
(10, 3, 1, 8, 8),
(10, 4, 2, 8, 16),
(10, 6, 2, 9, 18),
(10, 7, 5, 11, 55),
(10, 10, 1, 4, 4),
(11, 1, 2, 7, 14),
(11, 2, 5, 15, 75),
(11, 4, 1, 8, 8),
(11, 5, 1, 3, 3),
(11, 10, 1, 4, 4),
(11, 11, 3, 6, 18),
(12, 1, 1, 7, 7),
(12, 2, 2, 15, 30),
(12, 10, 1, 4, 4),
(12, 12, 1, 12, 12),
(12, 14, 4, 5, 20),
(13, 1, 3, 7, 21),
(13, 2, 3, 15, 45),
(13, 10, 3, 4, 12),
(13, 11, 3, 6, 18),
(13, 14, 3, 5, 15),
(14, 6, 2, 9, 18),
(14, 7, 4, 11, 44),
(14, 8, 1, 10, 10),
(14, 9, 3, 9, 27),
(14, 10, 1, 4, 4),
(14, 12, 2, 12, 24),
(25, 4, 1, 8, 8),
(25, 7, 4, 11, 44),
(25, 8, 2, 10, 20),
(25, 9, 1, 9, 9),
(25, 10, 1, 4, 4),
(26, 1, 2, 7, 14),
(26, 2, 3, 15, 45),
(26, 5, 1, 3, 3),
(26, 6, 2, 9, 18),
(27, 5, 1, 3, 3),
(27, 6, 1, 9, 9),
(27, 7, 1, 11, 11),
(27, 11, 1, 6, 6),
(27, 12, 1, 12, 12),
(27, 15, 1, 8, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_id` int(10) NOT NULL,
  `payment_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `payment_name`) VALUES
(1, 'Cash'),
(2, 'Paypal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `prod_id` int(10) UNSIGNED NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_cat` int(10) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status` tinyint(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_img`, `prod_cat`, `prod_desc`, `prod_price`, `created_at`, `status`) VALUES
(0, '4Cheese Pizza', '4Cheese_Pizza.jpg', 3, 'Four Cheese Pizza is a popular dish of the Italian cuisine. This pizza recipe is prepared using Parmesan, fontina, mozzarella and feta cheese along with roma tomatoes and basil leaves. The crispy crust and the cheesy toppings of this dish with tangy stir fried tomatoes caters to your taste buds and ends your pangs of hunger.', 19, '2024-01-07 19:49:19.703703', 1),
(1, 'Philly Cheesesteak', 'cheesestk.jpg', 1, 'A cheesesteak is a sandwich made from thinly sliced pieces of beefsteak and melted cheese in a long hoagie roll. A popular regional fast food, it has its roots in the U.S. city of Philadelphia, Pennsylvania.', 7, '2023-12-29 01:29:10.531090', 1),
(2, 'Spaghetti Bolognese', 'spaghetti_bolognese.jpg', 5, 'Spaghetti bolognese consists of spaghetti (long strings of pasta) with an Italian (meat sauce) made with minced beef, bacon and tomatoes, served with Parmesan cheese. Spaghetti bolognese is one of the most popular pasta dishes eaten outside of Italy.', 15, '2024-01-07 19:56:25.579883', 1),
(3, 'Reuben Sandwich', 'reubensandwich.jpg', 2, 'The Reuben sandwich is a North American grilled sandwich composed of corned beef, Swiss cheese, sauerkraut, and Thousand Island dressing or Russian dressing, grilled between slices of rye bread. It is associated with kosher-style delicatessens, but is not kosher because it combines meat and cheese.', 8, '2024-01-07 19:56:33.731110', 1),
(4, 'Submarine Sandwich', 'submarine_sndwh.jpg', 2, 'A submarine sandwich, commonly known as a sub, hoagie, hero, Italian, grinder, wedge, or a spuckie, is a type of American cold or hot sandwich made from a cylindrical bread roll split lengthwise and filled with meats, cheeses, vegetables, and condiments. It has many different names.', 8, '2024-01-07 19:56:40.487416', 1),
(5, 'Cheeseburger', 'cheeseburgers.jpg', 1, 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty. The cheese is usually added to the cooking hamburger patty shortly before serving, which allows the cheese to melt. Cheeseburgers can include variations in structure, ingredients and composition.', 3, '2024-01-07 19:56:54.763042', 1),
(6, 'Jambalaya', 'Jambalaya.jpg', 4, 'Jambalaya is an American Creole and Cajun rice dish of French, African, and Spanish influence, consisting mainly of meat and vegetables mixed with rice.', 9, '2023-12-29 01:29:10.531090', 1),
(7, 'Buffalo Wings', 'buffalo_wings.jpg', 5, 'A Buffalo wing in American cuisine is an unbreaded chicken wing section that is generally deep-fried and then coated or dipped in a sauce consisting of a vinegar-based cayenne pepper hot sauce and melted butter prior to serving.', 11, '2023-12-29 01:29:10.531090', 1),
(8, 'Enchiladas', 'enchiladas.jpg', 3, 'An enchilada is a corn tortilla rolled around a filling and covered with a savory sauce. Originally from Mexican cuisine, enchiladas can be filled with various ingredients, including meats, cheese, beans, potatoes, vegetables, or combinations', 10, '2023-12-29 01:29:10.531090', 1),
(9, 'Cincinnati Chili', 'cincinnatichili.jpg', 1, 'Cincinnati chili is a Mediterranean-spiced meat sauce used as a topping for spaghetti or hot dogs; both dishes were developed by immigrant restaurateurs in the 1920s. In 2013, Smithsonian named one local chili parlor one of the \"20 Most Iconic Food Destinations in America\".', 9, '2023-12-29 01:29:10.531090', 1),
(10, 'Caramel Macchiato', '', 4, 'Steamed milk, espresso and caramel; what could be more enticing? This blissful flavor is a favorite of coffee lovers due to its deliciously bold taste of creamy caramel and strong coffee flavor. These', 4, '2023-12-29 01:29:10.531090', 1),
(11, 'Cheese Curd', 'cheesecurd.jpg', 3, 'Cheese curds are moist pieces of curdled milk, eaten either alone or as a snack, or used in prepared dishes. These are chiefly found in Quebec, in the dish poutine, throughout Canada, and in the northeastern, midwestern, mountain, and Pacific Northwestern United States, especially in Wisconsin and Minnesota.', 6, '2023-12-29 01:29:10.531090', 1),
(12, 'Margherita Pizza', 'margherita-pizza0.jpg', 5, 'Pizza margherita, as the Italians call it, is a simple pizza hailing from Naples. When done right, margherita pizza features a bubbly crust, crushed San Marzano tomato sauce, fresh mozzarella and basil, a drizzle of olive oil, and a sprinkle of salt.', 12, '2023-12-29 01:29:10.531090', 1),
(13, 'Irish Coffee', 'irishcoffee.jpg', 1, 'Irish coffee is a caffeinated alcoholic drink consisting of Irish whiskey, hot coffee, and sugar, stirred, and topped with cream The coffee is drunk through the cream', 11, '2023-12-29 01:29:10.531090', 1),
(14, 'Chicken Nugget', 'chicnuggets.jpeg', 2, 'A chicken nugget is a food product consisting of a small piece of deboned chicken meat that is breaded or battered, then deep-fried or baked. Invented in the 1950s, chicken nuggets have become a very popular fast food restaurant item, as well as widely sold frozen for home use', 5, '2023-12-29 01:29:10.531090', 1),
(15, 'Pulled Pork', 'pulledprk.jpeg', 5, 'Pulled pork is an American barbecue dish, more specifically a dish of the Southern U.S., based on shredded barbecued pork shoulder. It is typically slow-smoked over wood; indoor variations use a slow cooker. The meat is then shredded manually and mixed with a sauce', 8, '2023-12-29 01:29:10.531090', 1),
(16, 'Strawberry Rhubarb Pie', 'rhuharbpie.jpg', 4, 'Rhubarb pie is a pie with a rhubarb filling. Popular in the UK, where rhubarb has been cultivated since the 1600s, and the leaf stalks eaten since the 1700s. Besides diced rhubarb, it almost always contains a large amount of sugar to balance the intense tartness of the plant', 7, '2023-12-29 01:29:10.531090', 1),
(17, 'Americano', '', 1, 'Many espresso-based drinks use milk, but not the cafÃ© Americano â€“ or simply \'Americano\'. The drink also uses espresso but is infused with hot water instead of milk. The result is a coffee beverage ', 3, '2023-12-29 01:29:10.531090', 1),
(18, 'Country Fried Steak', 'country_fried_stk.jpg', 4, 'Chicken-fried steak, also known as country-fried steak or CFS, is an American breaded cutlet dish consisting of a piece of beefsteak coated with seasoned flour and either deep-fried or pan-fried. It is sometimes associated with the Southern cuisine of the United States.', 10, '2023-12-29 01:29:10.531090', 1),
(19, 'Crab Cake', 'crabcakes.jpg', 6, 'A crab cake is a variety of fishcake that is popular in the United States. It is composed of crab meat and various other ingredients, such as bread crumbs, mayonnaise, mustard, eggs, and seasonings. The cake is then sautÃ©ed, baked, grilled, deep fried, or broiled.', 16, '2023-12-29 01:29:10.531090', 1),
(20, 'Carbonara', 'carbonaraimgre.jpg', 4, 'Carbonara is an Italian pasta dish from Rome made with eggs, hard cheese, cured pork, and black pepper. The dish arrived at its modern form, with its current name, in the middle of the 20th century. The cheese is usually Pecorino Romano, Parmigiano-Reggiano, or a combination of the two.', 16, '2023-12-29 01:29:10.531090', 1),
(21, 'Pepperoni Pizza', 'peperopizza.jpg', 2, 'Pepperoni is an American variety of spicy salami made from cured pork and beef seasoned with paprika or other chili pepper. Prior to cooking, pepperoni is characteristically soft, slightly smoky, and bright red. Thinly sliced pepperoni is one of the most popular pizza toppings in American pizzerias.', 7, '2023-12-29 01:29:10.531090', 1),
(22, 'Frappuccino', 'frappuccino.jpg', 4, 'Frappuccino is a line of blended iced coffee drinks sold by Starbucks. It consists of coffee or crÃ¨me base, blended with ice and ingredients such as flavored syrups and usually topped with whipped cream and or spices.', 3, '2024-01-07 19:57:14.135815', 1),
(23, 'Corn Dogs', 'corndog.jpg', 1, 'A corn dog is a sausage on a stick that has been coated in a thick layer of cornmeal batter and deep fried. It originated in the United States and is commonly found in American cuisine', 4, '2023-12-29 01:29:10.531090', 1),
(24, 'Hot Dog', 'hotdog0.jpg', 5, 'A hot dog is a food consisting of a grilled or steamed sausage served in the slit of a partially sliced bun. The term hot dog can also refer to the sausage itself. The sausage used is a wiener or a frankfurter. The names of these sausages also commonly refer to their assembled dish.', 4, '2023-12-29 01:29:10.531090', 1),
(25, 'Whipped Milk Shake', 'milkshake.jpeg', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 8, '2024-01-07 19:57:02.415607', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservation_list`
--

CREATE TABLE `reservation_list` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `table_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `party_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reservation_list`
--

INSERT INTO `reservation_list` (`reservation_id`, `user_id`, `table_id`, `datetime`, `status`, `date_created`, `party_size`) VALUES
(1, 18, 6, '2024-01-07 18:07:22', 1, '2023-09-29 07:27:23', 3),
(2, 17, 6, '2023-10-01 03:22:19', 0, '2023-09-29 07:27:23', 3),
(3, 1, 6, '2023-10-01 03:22:19', 0, '2023-09-29 07:27:23', 3),
(4, 32, 6, '2023-10-01 03:22:19', 0, '2023-09-29 07:27:23', 3),
(5, 18, 7, '2023-12-30 04:22:19', 0, '2023-12-10 04:27:23', 2),
(6, 22, 8, '0000-00-00 00:00:00', 0, '2023-02-22 13:10:23', 4),
(7, 20, 9, '2024-01-07 18:07:48', 1, '2023-12-10 09:14:23', 2),
(8, 32, 10, '2023-12-15 06:12:19', 0, '2023-12-13 04:27:23', 2),
(9, 19, 11, '2023-11-23 02:15:19', 0, '2023-11-19 06:14:23', 2),
(10, 14, 12, '2023-03-30 09:45:19', 0, '2023-03-15 13:14:23', 2),
(11, 34, 7, '2023-04-11 00:23:19', 0, '2023-04-05 04:14:23', 2),
(12, 17, 8, '2023-02-10 09:27:24', 0, '2023-02-09 06:15:27', 4),
(13, 22, 14, '2023-04-05 13:29:27', 0, '2023-04-01 13:15:30', 5),
(14, 14, 15, '2023-05-07 02:40:31', 0, '2023-05-02 09:15:31', 2),
(25, 34, 16, '2023-06-04 07:30:35', 0, '2023-06-01 05:56:46', 2),
(26, 18, 17, '2023-08-08 08:47:37', 0, '2023-08-01 06:07:38', 1),
(27, 22, 12, '2023-10-04 02:47:41', 0, '2023-10-01 08:05:54', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_list`
--

CREATE TABLE `table_list` (
  `table_id` int(11) NOT NULL,
  `tbl_no` int(11) NOT NULL,
  `table_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `table_list`
--

INSERT INTO `table_list` (`table_id`, `tbl_no`, `table_name`, `description`, `status`, `date_created`, `size`) VALUES
(6, 1, 'T101', 'Table for 8 people', 1, '2023-12-21 07:40:05', 8),
(7, 2, 'T102', 'Table for 8 people', 0, '2023-12-21 07:40:05', 8),
(8, 3, 'T103', 'Table for 8 people', 1, '2023-12-21 07:40:05', 8),
(9, 4, 'T104', 'Table for 2 people', 1, '2023-12-21 07:40:05', 2),
(10, 5, 'T105', 'Table for 3 people', 1, '2023-12-21 07:40:05', 3),
(11, 6, 'T106', 'Table for 2 people', 1, '2023-12-21 07:40:05', 2),
(12, 7, 'T107', 'Table for 4 people', 1, '2023-12-21 07:40:05', 4),
(13, 8, 'T108', 'Table for 4 people', 1, '2023-12-21 07:40:05', 4),
(14, 9, 'T109', 'Table for 4 people', 1, '2023-12-21 07:40:05', 4),
(15, 10, 'T1010', 'Table for 4 people', 1, '2023-12-21 07:40:05', 4),
(16, 11, 'T1011', 'Table for 2 people', 1, '2023-12-21 07:40:05', 2),
(17, 12, 'T1012', 'Table for 2 people', 1, '2023-12-21 07:40:05', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `phone`, `role`, `verify_token`, `verify_status`) VALUES
(1, 'Song Cat', 'admin123@gmail.com', '$2y$10$E6PpQm2UUUNB6M5XZ7vhzOxuLmdsPiGIZz58Zyq95x3lsidBSq8im', '0901281211', 'Admin', '', 1),
(14, 'Song Cat', 'songcatlengo.learning@gmail.com', '$2y$10$E6PpQm2UUUNB6M5XZ7vhzOxuLmdsPiGIZz58Zyq95x3lsidBSq8im', '0903875333', 'Customer', 'e95bbe0c2844af3f1cf08f3209c0a3f9', 1),
(17, 'Thu Nhi', 'staff12345@gmail.com', '$2y$10$3T5PEE.YXKIhPjiRtSv1U.E0DNjJi0Aks5QvAfa.hbA9qgWL/YxL2', '0921821274', 'Staff', '', 1),
(18, 'Thanh Tung', 'staffSC@gmail.com', '$2y$10$1iypvtIR786lQ404yZtRq.8Yv8zEFLSToPv1aWlMetKAh5sODu6v6', '0912123761', 'Staff', '', 1),
(19, 'Gia An', 'staffNhi@gmail.com', '$2y$10$JwdAlaEeq3Ei94GW8O1W4eEKYEMIG44DfGu5cfgIbhXyHVIFsEz9.', '0903228329', 'Staff', '', 1),
(20, 'Anh Chi', 'staff15@gmail.com', '$2y$10$JwdAlaEeq3Ei94GW8O1W4eEKYEMIG44DfGu5cfgIbhXyHVIFsEz9.', '0903333333', 'Staff', '', 1),
(22, 'Yen Nhi', 'staff17@gmail.com', '$2y$10$1iypvtIR786lQ404yZtRq.8Yv8zEFLSToPv1aWlMetKAh5sODu6v6', '0903333333', 'Staff', '', 1),
(32, 'Tai Nguyen', 'npt5767@gmail.com', '$2y$10$2gx95HW57EjfqbxtQbqylO5JLsNmxSCyINJiGK6mm5d/hq1LfSrzC', '+84377457651', 'Customer', '9c7e1dac7e4fad7860f078cf5a4ca803', 1),
(33, 'Lê Ngô Song Cát', 'lnscat21@clc.fitus.edu.vn', '$2y$10$Q7kzHnsypC3etPqEL4yFueJCD/KWLW4dUomwMso6/3hcdW/634xGy', '0901218455', 'Customer', '3bd5189218956b0dd84c8bdb2c211e38', 1),
(34, 'Song Cat', 'catle5672@gmail.com', '$2y$10$6v0qrgH6I.0iqt5Mk8TD8eNd76C3b6yYDmFAD1qU.gRZu0F8p5To.', '0901212111', 'Customer', '25590d920c50fbe33c5ea575b8015e2d', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `fk_reservation_invoices` (`reservation_id`),
  ADD KEY `fk_payment_invoices` (`payment_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`reservation_id`,`prod_id`),
  ADD KEY `fk_product_order` (`prod_id`);

--
-- Chỉ mục cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Chỉ mục cho bảng `reservation_list`
--
ALTER TABLE `reservation_list`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `fk_reservation_table` (`table_id`),
  ADD KEY `fk_reservation_user` (`user_id`);

--
-- Chỉ mục cho bảng `table_list`
--
ALTER TABLE `table_list`
  ADD PRIMARY KEY (`table_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `reservation_list`
--
ALTER TABLE `reservation_list`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_payment_invoices` FOREIGN KEY (`payment_id`) REFERENCES `payment_method` (`payment_id`),
  ADD CONSTRAINT `fk_reservation_invoices` FOREIGN KEY (`reservation_id`) REFERENCES `reservation_list` (`reservation_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_product_order` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`),
  ADD CONSTRAINT `fk_reservation_orders` FOREIGN KEY (`reservation_id`) REFERENCES `reservation_list` (`reservation_id`);

--
-- Các ràng buộc cho bảng `reservation_list`
--
ALTER TABLE `reservation_list`
  ADD CONSTRAINT `fk_reservation_table` FOREIGN KEY (`table_id`) REFERENCES `table_list` (`table_id`),
  ADD CONSTRAINT `fk_reservation_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
