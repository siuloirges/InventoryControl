-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2021 a las 16:01:14
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `stock`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`) VALUES
(602, '2017-03-19 14:24:54', NULL, NULL, 'molestiae'),
(603, '2017-03-19 14:24:54', NULL, NULL, 'nobis'),
(604, '2017-03-19 14:24:54', NULL, NULL, 'id'),
(605, '2017-03-19 14:24:54', NULL, NULL, 'consectetur'),
(606, '2017-03-19 14:24:54', NULL, NULL, 'aspernatur'),
(607, '2017-03-19 14:24:54', NULL, NULL, 'atque'),
(608, '2017-03-19 14:24:54', NULL, NULL, 'ut'),
(609, '2017-03-19 14:24:54', NULL, NULL, 'dolorem'),
(610, '2017-03-19 14:24:55', NULL, NULL, 'quis'),
(611, '2017-03-19 14:24:55', NULL, NULL, 'praesentium'),
(612, '2017-03-19 14:24:55', NULL, NULL, 'eos'),
(613, '2017-03-19 14:24:55', NULL, NULL, 'quae'),
(614, '2017-03-19 14:24:55', NULL, NULL, 'non'),
(615, '2017-03-19 14:24:55', NULL, NULL, 'repellendus'),
(616, '2017-03-19 14:24:55', NULL, NULL, 'voluptatem'),
(617, '2017-03-19 14:24:55', NULL, NULL, 'odio'),
(618, '2017-03-19 14:24:55', NULL, NULL, 'rerum'),
(619, '2017-03-19 14:24:55', NULL, NULL, 'qui'),
(620, '2017-03-19 14:24:55', NULL, NULL, 'consequuntur'),
(621, '2017-03-19 14:24:55', NULL, NULL, 'alias'),
(622, '2017-03-19 14:24:55', NULL, NULL, 'temporibus'),
(623, '2017-03-19 14:24:55', NULL, NULL, 'qui'),
(624, '2017-03-19 14:24:55', NULL, NULL, 'non'),
(625, '2017-03-19 14:24:55', NULL, NULL, 'repellat'),
(626, '2017-03-19 14:24:55', NULL, NULL, 'itaque'),
(627, '2017-03-19 14:24:55', NULL, NULL, 'excepturi'),
(628, '2017-03-19 14:24:55', NULL, NULL, 'est'),
(629, '2017-03-19 14:24:55', NULL, NULL, 'enim'),
(630, '2017-03-19 14:24:55', NULL, NULL, 'officiis'),
(631, '2017-03-19 14:24:55', NULL, NULL, 'maiores'),
(632, '2017-03-19 14:24:55', NULL, NULL, 'rerum'),
(633, '2017-03-19 14:24:55', NULL, NULL, 'error'),
(634, '2017-03-19 14:24:55', NULL, NULL, 'doloribus'),
(635, '2017-03-19 14:24:55', NULL, NULL, 'velit'),
(636, '2017-03-19 14:24:55', NULL, NULL, 'atque'),
(637, '2017-03-19 14:24:55', NULL, NULL, 'perspiciatis'),
(638, '2017-03-19 14:24:55', NULL, NULL, 'omnis'),
(639, '2017-03-19 14:24:55', NULL, NULL, 'reprehenderit'),
(640, '2017-03-19 14:24:55', NULL, NULL, 'vero'),
(641, '2017-03-19 14:24:55', NULL, NULL, 'mollitia'),
(642, '2017-03-19 14:24:55', NULL, NULL, 'est'),
(643, '2017-03-19 14:24:55', NULL, NULL, 'labore'),
(644, '2017-03-19 14:24:55', NULL, NULL, 'libero'),
(645, '2017-03-19 14:24:55', NULL, NULL, 'non'),
(646, '2017-03-19 14:24:55', NULL, NULL, 'ratione'),
(647, '2017-03-19 14:24:55', NULL, NULL, 'cupiditate'),
(648, '2017-03-19 14:24:55', NULL, NULL, 'velit'),
(649, '2017-03-19 14:24:55', NULL, NULL, 'tenetur'),
(650, '2017-03-19 14:24:55', NULL, NULL, 'quia'),
(651, '2017-03-19 14:24:55', NULL, NULL, 'earum');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(602, '2017-03-19 14:24:55', NULL, 'exercitationem'),
(603, '2017-03-19 14:24:55', NULL, 'ut'),
(604, '2017-03-19 14:24:55', NULL, 'et'),
(605, '2017-03-19 14:24:55', NULL, 'itaque'),
(606, '2017-03-19 14:24:55', NULL, 'qui'),
(607, '2017-03-19 14:24:55', NULL, 'similique'),
(608, '2017-03-19 14:24:55', NULL, 'et'),
(609, '2017-03-19 14:24:55', NULL, 'illum'),
(610, '2017-03-19 14:24:55', NULL, 'quo'),
(611, '2017-03-19 14:24:55', NULL, 'velit'),
(612, '2017-03-19 14:24:55', NULL, 'praesentium'),
(613, '2017-03-19 14:24:55', NULL, 'qui'),
(614, '2017-03-19 14:24:55', NULL, 'ratione'),
(615, '2017-03-19 14:24:55', NULL, 'voluptas'),
(616, '2017-03-19 14:24:55', NULL, 'voluptas'),
(617, '2017-03-19 14:24:55', NULL, 'dolor'),
(618, '2017-03-19 14:24:55', NULL, 'laboriosam'),
(619, '2017-03-19 14:24:55', NULL, 'iure'),
(620, '2017-03-19 14:24:55', NULL, 'voluptatem'),
(621, '2017-03-19 14:24:55', NULL, 'dolor'),
(622, '2017-03-19 14:24:55', NULL, 'voluptatem'),
(623, '2017-03-19 14:24:55', NULL, 'esse'),
(624, '2017-03-19 14:24:55', NULL, 'tempora'),
(625, '2017-03-19 14:24:55', NULL, 'asperiores'),
(626, '2017-03-19 14:24:55', NULL, 'aperiam'),
(627, '2017-03-19 14:24:55', NULL, 'ducimus'),
(628, '2017-03-19 14:24:55', NULL, 'quibusdam'),
(629, '2017-03-19 14:24:55', NULL, 'eum'),
(630, '2017-03-19 14:24:55', NULL, 'tempore'),
(631, '2017-03-19 14:24:55', NULL, 'aspernatur'),
(632, '2017-03-19 14:24:55', NULL, 'voluptas'),
(633, '2017-03-19 14:24:55', NULL, 'incidunt'),
(634, '2017-03-19 14:24:55', NULL, 'error'),
(635, '2017-03-19 14:24:55', NULL, 'consectetur'),
(636, '2017-03-19 14:24:55', NULL, 'impedit'),
(637, '2017-03-19 14:24:55', NULL, 'illo'),
(638, '2017-03-19 14:24:55', NULL, 'nihil'),
(639, '2017-03-19 14:24:55', NULL, 'aut'),
(640, '2017-03-19 14:24:55', NULL, 'libero'),
(641, '2017-03-19 14:24:55', NULL, 'corrupti'),
(642, '2017-03-19 14:24:55', NULL, 'qui'),
(643, '2017-03-19 14:24:55', NULL, 'illum'),
(644, '2017-03-19 14:24:55', NULL, 'quasi'),
(645, '2017-03-19 14:24:55', NULL, 'quibusdam'),
(646, '2017-03-19 14:24:55', NULL, 'est'),
(647, '2017-03-19 14:24:55', NULL, 'dolore'),
(648, '2017-03-19 14:24:55', NULL, 'porro'),
(649, '2017-03-19 14:24:55', NULL, 'consequuntur'),
(650, '2017-03-19 14:24:55', NULL, 'sed'),
(651, '2017-03-19 14:24:55', NULL, 'quo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` longtext COLLATE utf8mb4_unicode_ci,
  `responses` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `screetkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `email_attachments` text COLLATE utf8mb4_unicode_ci,
  `is_sent` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-03-17 10:49:12', NULL),
(2, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-03-18 22:10:00', NULL),
(3, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-03-18 22:19:49', NULL),
(4, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-03-18 22:21:23', NULL),
(5, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-03-18 22:22:34', NULL),
(6, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-03-18 22:23:28', NULL),
(7, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-03-18 22:24:04', NULL),
(8, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-03-18 22:24:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `id_cms_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `created_at`, `updated_at`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`) VALUES
(1, '2021-07-17 20:23:55', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'https://stock.test/admin/login', 'admin@admin.com login with IP Address 127.0.0.1', '', 1),
(2, '2021-07-17 20:34:19', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/login', 'admin@admin.com login with IP Address 127.0.0.1', '', 1),
(3, '2021-07-17 20:35:05', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/edit-save/6', 'Update data Order at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1),
(4, '2021-07-17 20:35:20', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/edit-save/8', 'Update data Add New Order at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>parent_id</td><td>6</td><td></td></tr></tbody></table>', 1),
(5, '2021-07-17 20:39:04', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/edit-save/7', 'Update data History Order at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>parent_id</td><td>6</td><td></td></tr><tr><td>sorting</td><td>2</td><td></td></tr></tbody></table>', 1),
(6, '2021-07-17 20:41:23', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/delete/29', 'Delete data Order at Menu Management', '', 1),
(7, '2021-07-17 20:41:44', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/delete/3', 'Delete data Customers at Menu Management', '', 1),
(8, '2021-07-17 20:41:48', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/delete/31', 'Delete data Dashboard at Menu Management', '', 1),
(9, '2021-07-17 20:42:00', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/edit-save/1', 'Update data Categories at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>2</td><td></td></tr></tbody></table>', 1),
(10, '2021-07-17 20:42:09', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/edit-save/26', 'Update data Products at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1),
(11, '2021-07-17 20:42:15', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/edit-save/2', 'Update data Brands at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1),
(12, '2021-07-17 20:42:20', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/delete/22', 'Delete data Brands at Menu Management', '', 1),
(13, '2021-07-17 20:42:29', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/edit-save/24', 'Update data Customers at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1),
(14, '2021-07-17 20:42:43', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/edit-save/4', 'Update data Suppliers at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>5</td><td></td></tr></tbody></table>', 1),
(15, '2021-07-17 20:43:04', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/delete/27', 'Delete data Suppliers at Menu Management', '', 1),
(16, '2021-07-17 20:43:08', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/delete/5', 'Delete data Products at Menu Management', '', 1),
(17, '2021-07-17 20:43:11', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/delete/23', 'Delete data Categories at Menu Management', '', 1),
(18, '2021-07-17 20:52:36', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/users/delete-image', 'Delete the image of Super Admin at Users', '', 1),
(19, '2021-07-17 20:52:59', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/users/edit-save/1', 'Update data Super Admin at Users', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>photo</td><td></td><td>uploads/1/2021-07/destino.png</td></tr><tr><td>password</td><td>$2y$10$8uV2937QZYkR5JHI7F9hyeEkRFyrJXi3vcXeAbbGSPzgk8MHL9XHq</td><td></td></tr><tr><td>id_cms_privileges</td><td>1</td><td></td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>', 1),
(20, '2021-07-17 15:54:02', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/logout', 'admin@admin.com se desconectó', '', 1),
(21, '2021-07-17 15:54:17', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/login', 'Ingreso de admin@admin.com desde la Dirección IP 127.0.0.1', '', 1),
(22, '2021-07-17 15:58:50', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/statistic_builder/edit-save/1', 'Actualizar información Dashboard en Statistic Builder', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>slug</td><td>dashboard</td><td></td></tr></tbody></table>', 1),
(23, '2021-07-17 16:00:30', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'http://stock.test/admin/menu_management/edit-save/32', 'Actualizar información Dashboard en Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>sorting</td><td></td><td></td></tr></tbody></table>', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Categories', 'Route', 'AdminCategoriesControllerGetIndex', 'normal', 'fa fa-tags', 0, 1, 0, 1, 2, '2017-03-17 13:37:11', '2021-07-17 20:42:00'),
(2, 'Brands', 'Route', 'AdminBrandsControllerGetIndex', 'normal', 'fa fa-bars', 0, 1, 0, 1, 3, '2017-03-17 14:26:56', '2021-07-17 20:42:15'),
(4, 'Suppliers', 'Route', 'AdminSuppliersControllerGetIndex', 'normal', 'fa fa-users', 0, 1, 0, 1, 5, '2017-03-17 14:29:31', '2021-07-17 20:42:43'),
(6, 'Order', 'URL', '#', 'normal', 'fa fa-shopping-bag', 0, 1, 0, 1, 1, '2017-03-17 19:24:22', '2021-07-17 20:35:05'),
(7, 'History Order', 'Module', 'orders', 'normal', 'fa fa-shopping-bag', 6, 1, 0, 1, 2, '2017-03-17 19:24:49', '2021-07-17 20:39:04'),
(8, 'Add New Order', 'Route', 'AdminOrdersControllerGetAdd', 'normal', 'fa fa-users', 6, 1, 0, 1, 1, '2017-03-17 19:25:55', '2021-07-17 20:35:20'),
(24, 'Customers', 'Route', 'AdminCustomersControllerGetIndex', 'normal', 'fa fa-users', 0, 1, 0, 2, 3, '2017-03-17 20:15:39', '2021-07-17 20:42:29'),
(26, 'Products', 'Route', 'AdminProductsControllerGetIndex', 'normal', 'fa fa-cubes', 0, 1, 0, 2, 2, '2017-03-17 20:15:39', '2021-07-17 20:42:09'),
(32, 'Dashboard', 'Statistic', 'statistic_builder/show/dashboard', 'normal', 'fa fa-dashboard', 0, 1, 1, 1, NULL, '2017-03-17 20:35:09', '2021-07-17 16:00:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_menus_privileges`
--

CREATE TABLE `cms_menus_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(1, 6, 1),
(2, 8, 1),
(3, 7, 1),
(4, 1, 1),
(5, 26, 1),
(6, 2, 1),
(7, 24, 1),
(8, 4, 1),
(9, 32, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `created_at`, `updated_at`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `deleted_at`) VALUES
(1, '2017-03-17 10:49:12', NULL, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, NULL),
(2, '2017-03-17 10:49:12', NULL, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, NULL),
(3, '2017-03-17 10:49:12', NULL, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, NULL),
(4, '2017-03-17 10:49:12', NULL, 'Users', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, NULL),
(5, '2017-03-17 10:49:12', NULL, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, NULL),
(6, '2017-03-17 10:49:12', NULL, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, NULL),
(7, '2017-03-17 10:49:12', NULL, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, NULL),
(8, '2017-03-17 10:49:12', NULL, 'Email Template', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, NULL),
(9, '2017-03-17 10:49:12', NULL, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, NULL),
(10, '2017-03-17 10:49:12', NULL, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, NULL),
(11, '2017-03-17 10:49:12', NULL, 'Logs', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, NULL),
(12, '2017-03-17 13:37:11', NULL, 'Categories', 'fa fa-tags', 'categories', 'categories', 'AdminCategoriesController', 0, 0, NULL),
(13, '2017-03-17 14:26:56', NULL, 'Brands', 'fa fa-bars', 'brands', 'brands', 'AdminBrandsController', 0, 0, NULL),
(14, '2017-03-17 14:27:47', NULL, 'Customers', 'fa fa-users', 'customers', 'customers', 'AdminCustomersController', 0, 0, NULL),
(15, '2017-03-17 14:29:31', NULL, 'Suppliers', 'fa fa-users', 'suppliers', 'suppliers', 'AdminSuppliersController', 0, 0, NULL),
(16, '2017-03-17 14:32:21', NULL, 'Products', 'fa fa-cubes', 'products', 'products', 'AdminProductsController', 0, 0, NULL),
(17, '2017-03-17 18:55:38', NULL, 'Products Stock', 'fa fa-cube', 'products_stock', 'products_stock', 'AdminProductsStockController', 0, 0, NULL),
(18, '2017-03-17 19:17:02', NULL, 'History Order', 'fa fa-shopping-bag', 'orders', 'orders', 'AdminOrdersController', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `created_at`, `updated_at`, `name`, `is_superadmin`, `theme_color`) VALUES
(1, '2017-03-17 10:49:12', NULL, 'Super Administrator', 1, 'skin-red'),
(2, NULL, NULL, 'Admin', 0, 'skin-blue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `created_at`, `updated_at`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`) VALUES
(1, '2017-03-17 10:49:12', NULL, 1, 0, 0, 0, 0, 1, 1),
(2, '2017-03-17 10:49:12', NULL, 1, 1, 1, 1, 1, 1, 2),
(3, '2017-03-17 10:49:12', NULL, 0, 1, 1, 1, 1, 1, 3),
(4, '2017-03-17 10:49:12', NULL, 1, 1, 1, 1, 1, 1, 4),
(5, '2017-03-17 10:49:12', NULL, 1, 1, 1, 1, 1, 1, 5),
(6, '2017-03-17 10:49:12', NULL, 1, 1, 1, 1, 1, 1, 6),
(7, '2017-03-17 10:49:12', NULL, 1, 1, 1, 1, 1, 1, 7),
(8, '2017-03-17 10:49:12', NULL, 1, 1, 1, 1, 1, 1, 8),
(9, '2017-03-17 10:49:12', NULL, 1, 1, 1, 1, 1, 1, 9),
(10, '2017-03-17 10:49:12', NULL, 1, 1, 1, 1, 1, 1, 10),
(11, '2017-03-17 10:49:12', NULL, 1, 0, 1, 0, 1, 1, 11),
(12, NULL, NULL, 1, 1, 1, 1, 1, 1, 12),
(13, NULL, NULL, 1, 1, 1, 1, 1, 1, 13),
(14, NULL, NULL, 1, 1, 1, 1, 1, 1, 14),
(15, NULL, NULL, 1, 1, 1, 1, 1, 1, 15),
(16, NULL, NULL, 1, 1, 1, 1, 1, 1, 16),
(17, NULL, NULL, 1, 1, 1, 1, 1, 1, 17),
(18, NULL, NULL, 1, 1, 1, 1, 1, 1, 18),
(19, NULL, NULL, 1, 1, 1, 1, 1, 2, 13),
(20, NULL, NULL, 1, 1, 1, 1, 1, 2, 12),
(21, NULL, NULL, 1, 1, 1, 1, 1, 2, 14),
(22, NULL, NULL, 1, 1, 1, 1, 1, 2, 18),
(23, NULL, NULL, 1, 1, 1, 1, 1, 2, 16),
(24, NULL, NULL, 0, 1, 1, 1, 1, 2, 17),
(25, NULL, NULL, 1, 1, 1, 1, 1, 2, 15),
(26, NULL, NULL, 1, 1, 1, 1, 1, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `created_at`, `updated_at`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `group_setting`, `label`) VALUES
(1, '2017-03-17 10:49:12', NULL, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', 'Login Register Style', 'Login Background Color'),
(2, '2017-03-17 10:49:12', NULL, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', 'Login Register Style', 'Login Font Color'),
(3, '2017-03-17 10:49:12', NULL, 'login_background_image', NULL, 'upload_image', NULL, NULL, 'Login Register Style', 'Login Background Image'),
(4, '2017-03-17 10:49:12', NULL, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, 'Email Setting', 'Email Sender'),
(5, '2017-03-17 10:49:12', NULL, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, 'Email Setting', 'Mail Driver'),
(6, '2017-03-17 10:49:12', NULL, 'smtp_host', '', 'text', NULL, NULL, 'Email Setting', 'SMTP Host'),
(7, '2017-03-17 10:49:12', NULL, 'smtp_port', '25', 'text', NULL, 'default 25', 'Email Setting', 'SMTP Port'),
(8, '2017-03-17 10:49:12', NULL, 'smtp_username', '', 'text', NULL, NULL, 'Email Setting', 'SMTP Username'),
(9, '2017-03-17 10:49:12', NULL, 'smtp_password', '', 'text', NULL, NULL, 'Email Setting', 'SMTP Password'),
(10, '2017-03-17 10:49:12', NULL, 'appname', 'Simple Stock Manager', 'text', NULL, NULL, 'Application Setting', 'Application Name'),
(11, '2017-03-17 10:49:12', NULL, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', 'Application Setting', 'Default Paper Print Size'),
(12, '2017-03-17 10:49:12', NULL, 'logo', 'uploads/2017-03/d79a97481346c7c752a5a77bdf934e4f.png', 'upload_image', NULL, NULL, 'Application Setting', 'Logo'),
(13, '2017-03-17 10:49:12', NULL, 'favicon', 'uploads/2017-03/7a66a755270abda2d7e3454c4753b1b0.jpg', 'upload_image', NULL, NULL, 'Application Setting', 'Favicon'),
(14, '2017-03-17 10:49:12', NULL, 'api_debug_mode', 'true', 'select', 'true,false', NULL, 'Application Setting', 'API Debug Mode'),
(15, '2017-03-17 10:49:12', NULL, 'google_api_key', NULL, 'text', NULL, NULL, 'Application Setting', 'Google API Key'),
(16, '2017-03-17 10:49:12', NULL, 'google_fcm_key', NULL, 'text', NULL, NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_statistics`
--

INSERT INTO `cms_statistics` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'dashboard', '2017-03-17 20:23:45', '2021-07-17 15:58:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_statistic_components`
--

INSERT INTO `cms_statistic_components` (`id`, `id_cms_statistics`, `componentID`, `component_name`, `area_name`, `sorting`, `name`, `config`, `created_at`, `updated_at`) VALUES
(1, 1, '17620f3b0259d8bb0527a828a46ce27b', 'smallbox', 'area1', 0, NULL, '{\"name\":\"Total Order\",\"icon\":\"ion-bag\",\"color\":\"bg-green\",\"link\":\"#\",\"sql\":\"select count(id) from `orders` where deleted_at is null\"}', '2017-03-17 20:23:55', NULL),
(2, 1, 'dc9bf1879b58e69402c7c906ba4414b1', 'smallbox', 'area2', 0, NULL, '{\"name\":\"Total Order Amount\",\"icon\":\"ion-cash\",\"color\":\"bg-green\",\"link\":\"#\",\"sql\":\"select IFNULL(sum(grand_total),0) from `orders` where deleted_at is null\"}', '2017-03-17 20:25:54', NULL),
(3, 1, 'ef86ce0883e86bdec1f49ead38443305', 'smallbox', 'area3', 0, NULL, '{\"name\":\"Today Order Amount\",\"icon\":\"ion-cash\",\"color\":\"bg-red\",\"link\":\"#\",\"sql\":\"select IFNULL(SUM(grand_total),0) from `orders` where DATE(created_at) = CURDATE()\"}', '2017-03-17 20:27:39', NULL),
(4, 1, 'c5f1401d2c5f2528efacf5e2601481af', 'smallbox', 'area4', 0, NULL, '{\"name\":\"Today Total Order\",\"icon\":\"ion-bag\",\"color\":\"bg-red\",\"link\":\"#\",\"sql\":\"select count(id) from `orders` where DATE(created_at) = CURDATE()\"}', '2017-03-17 20:29:07', NULL),
(5, 1, '6b8643480ea7e4763a8a9279496808a1', 'chartline', 'area5', 0, NULL, '{\"name\":\"Order Chart This Year\",\"sql\":\"select date(created_at) as label, count(id) as value from `orders` where year(created_at) = YEAR(CURDATE()) group by label\",\"area_name\":\"Total Order\",\"goals\":null}', '2017-03-17 20:30:18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_users`
--

INSERT INTO `cms_users` (`id`, `created_at`, `updated_at`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `status`) VALUES
(1, '2017-03-17 10:49:12', '2021-07-17 20:52:59', 'Super Admin', 'uploads/1/2021-07/destino.png', 'admin@admin.com', '$2y$10$8uV2937QZYkR5JHI7F9hyeEkRFyrJXi3vcXeAbbGSPzgk8MHL9XHq', 1, 'Active'),
(2, '2017-03-17 20:18:45', '2017-03-19 14:14:57', 'Admin', 'uploads/2017-03/02dfa7416848053d4dcbee85e916d7ae.jpg', 'admin@admin1.com', '$2y$10$WWt5Dwd6zQQqSkzxAGusbuLEtQ6RLJtLEhfPuAYVemf6ZbAyXAgw2', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `address`, `phone`, `phone_other`) VALUES
(553, '2017-03-19 14:24:55', NULL, NULL, 'Charley Medhurst Sr.', '545 Kathryne Grove\nChristopstad, MT 40016', '+9658141062906', '+0686149966020'),
(554, '2017-03-19 14:24:55', NULL, NULL, 'Dr. Winona Ernser', '350 Lind Trail\nJakobburgh, NM 96603', '+0501668603737', '+3549173666220'),
(555, '2017-03-19 14:24:55', NULL, NULL, 'Estefania Carter PhD', '39370 Deanna Forge Suite 091\nEast Jordyn, MA 85459', '+3003740910833', '+2686800337702'),
(556, '2017-03-19 14:24:55', NULL, NULL, 'Coralie Ankunding', '87999 Lehner Park\nEast Torrancebury, MO 09187', '+4392577527112', '+8743723710287'),
(557, '2017-03-19 14:24:55', NULL, NULL, 'Dr. Randy Von II', '2672 Selmer View\nRonaldomouth, SD 37050', '+4471984448311', '+4454096926513'),
(558, '2017-03-19 14:24:55', NULL, NULL, 'Gertrude Bogisich', '181 Dare Crescent\nEast Reynoldchester, TX 12473', '+5263276179980', '+2592738996324'),
(559, '2017-03-19 14:24:55', NULL, NULL, 'Jaime Thompson MD', '219 Camron Key Apt. 754\nLake Jadynshire, IA 54636-5660', '+1443322568058', '+3191759384842'),
(560, '2017-03-19 14:24:55', NULL, NULL, 'Reynold Bahringer', '3433 Ziemann Freeway\nNew Deanborough, MD 53008', '+7588661242113', '+4044197913888'),
(561, '2017-03-19 14:24:55', NULL, NULL, 'Prof. Irving Parker PhD', '8219 Reilly Tunnel Apt. 940\nNorth Aimee, IN 45307-5439', '+0280442028296', '+9580098850348'),
(562, '2017-03-19 14:24:55', NULL, NULL, 'Lew Shanahan', '31584 Schneider Circle Apt. 849\nGulgowskiville, NY 31279-6953', '+5173046097180', '+1624022771276'),
(563, '2017-03-19 14:24:55', NULL, NULL, 'Alejandrin Blanda', '891 Kohler Parkway\nPort Malikashire, OH 18062-1474', '+1609302779849', '+4240012319861'),
(564, '2017-03-19 14:24:55', NULL, NULL, 'Jedidiah Pollich Sr.', '6732 Jude Crescent\nEast Laurie, PA 31949', '+0380787496319', '+6106254189493'),
(565, '2017-03-19 14:24:55', NULL, NULL, 'Dr. Juliet Lang', '9889 Eli Ford\nTaureantown, MA 98013', '+9678366212487', '+2408429432482'),
(566, '2017-03-19 14:24:55', NULL, NULL, 'Randi Durgan', '122 Ruthe Court\nNorth Clay, NY 90484-0402', '+8173056122290', '+9060363311361'),
(567, '2017-03-19 14:24:55', NULL, NULL, 'Kevin Kemmer', '5957 Conn Falls Apt. 445\nAddisonberg, NC 19056', '+5922938654131', '+3777588022235'),
(568, '2017-03-19 14:24:55', NULL, NULL, 'Helen Hayes', '1099 Homenick Roads\nSouth Demarcus, NM 95772-3368', '+3947070838962', '+2863487902404'),
(569, '2017-03-19 14:24:55', NULL, NULL, 'Ignatius Roberts', '69560 Flo Vista\nArvelland, NV 06164-4875', '+0406451709474', '+5629050202343'),
(570, '2017-03-19 14:24:55', NULL, NULL, 'Dr. Gaetano Lebsack', '2884 Abdullah Court\nWest Kristoffer, NH 92380', '+2205930371833', '+6145226847012'),
(571, '2017-03-19 14:24:55', NULL, NULL, 'Prof. Rodrick Langosh', '2510 Francesco Circle\nNathanview, ND 90785', '+1564768638339', '+8419819851295'),
(572, '2017-03-19 14:24:55', NULL, NULL, 'Edmond Daugherty', '19947 Sarai Junctions Suite 881\nLake Tierra, ME 00050-7481', '+1294813471294', '+1092282243796'),
(573, '2017-03-19 14:24:55', NULL, NULL, 'Anne Stracke', '21533 Tate Drives\nEast Eulahfurt, IN 90208-9047', '+9184893376677', '+2150809693382'),
(574, '2017-03-19 14:24:55', NULL, NULL, 'Zachary Leuschke', '2555 Keeling Mountains\nSouth Huldabury, TN 58012-3333', '+4694834544336', '+6088042335759'),
(575, '2017-03-19 14:24:55', NULL, NULL, 'Mr. Godfrey Langosh DVM', '78758 Yost Drive Suite 103\nPort Leann, TN 32776', '+8350804900667', '+8094316507263'),
(576, '2017-03-19 14:24:55', NULL, NULL, 'Devante Auer', '74215 Hane Roads Suite 545\nKirlinshire, CO 14935-3716', '+3961088286071', '+6751138204776'),
(577, '2017-03-19 14:24:55', NULL, NULL, 'Jan Funk I', '33470 Bartell Station\nElmirastad, OR 83608', '+6717283082814', '+0727502180317'),
(578, '2017-03-19 14:24:55', NULL, NULL, 'Leta VonRueden', '7496 Hodkiewicz Ville Apt. 561\nPort Elmo, DE 10850-1456', '+3249508440258', '+0665959101466'),
(579, '2017-03-19 14:24:55', NULL, NULL, 'Melyssa Dickens', '1275 Nicolas Terrace Suite 335\nGideonmouth, MD 53878', '+2860513297291', '+6653300161668'),
(580, '2017-03-19 14:24:55', NULL, NULL, 'Lilliana Fadel', '4221 Farrell Underpass\nNew Carlee, ND 25812', '+8713346370262', '+7514906730029'),
(581, '2017-03-19 14:24:55', NULL, NULL, 'Brenna Pfeffer', '839 Lemke Groves\nLake Violette, NY 60246-7622', '+6708018131933', '+1606826560614'),
(582, '2017-03-19 14:24:55', NULL, NULL, 'Macie Towne', '4403 Daugherty Drive\nSchneiderfurt, WY 88769-8070', '+7532634545160', '+3738617592838'),
(583, '2017-03-19 14:24:55', NULL, NULL, 'Delores Carter', '7173 Norma Crossing\nZelmaburgh, RI 51030-1076', '+6162396308209', '+4301968183297'),
(584, '2017-03-19 14:24:55', NULL, NULL, 'Chloe Reichel', '34032 Kessler Rapid Suite 392\nDibbertport, IN 53702-2199', '+1247453759894', '+4960180457657'),
(585, '2017-03-19 14:24:55', NULL, NULL, 'Hilton Reinger', '43954 Morar Summit\nWest Stephanie, IL 66508', '+7626894748191', '+6895165150000'),
(586, '2017-03-19 14:24:55', NULL, NULL, 'Neha Champlin', '787 Little Ways Suite 358\nWest Carolannehaven, NH 47704-5558', '+1294406452144', '+4989599172696'),
(587, '2017-03-19 14:24:55', NULL, NULL, 'Davin Hermiston', '34152 Murazik Tunnel\nEast Fletcherhaven, CA 53200-0217', '+1560734650331', '+4061376512897'),
(588, '2017-03-19 14:24:55', NULL, NULL, 'Joan Walter', '423 Caitlyn Plain\nLake Timothy, WV 29538', '+6112364763417', '+4727432636728'),
(589, '2017-03-19 14:24:55', NULL, NULL, 'Miss Dovie Erdman PhD', '247 Hegmann Harbors\nHeaneyshire, IN 73302', '+0202493442184', '+8286646243598'),
(590, '2017-03-19 14:24:55', NULL, NULL, 'Shayne Block MD', '2160 Murazik Fall Suite 939\nLandenmouth, NH 09950-9637', '+8715023743963', '+5773297591361'),
(591, '2017-03-19 14:24:55', NULL, NULL, 'Baby Hermiston IV', '172 Jana Terrace Suite 089\nWaelchiland, LA 25329', '+1957739341209', '+5436101476643'),
(592, '2017-03-19 14:24:55', NULL, NULL, 'Zoey Denesik I', '870 Simonis Wells\nPierceshire, MI 57486-0177', '+9095042706057', '+1304814700711'),
(593, '2017-03-19 14:24:55', NULL, NULL, 'Alysson Schaefer I', '9044 Waino Curve Suite 136\nKassulkemouth, RI 47969', '+4321851377720', '+9044781225366'),
(594, '2017-03-19 14:24:55', NULL, NULL, 'Dr. Breanne Smith', '70313 Arnaldo Unions\nBerthaberg, AK 20530-6700', '+8415309559408', '+3218501255159'),
(595, '2017-03-19 14:24:55', NULL, NULL, 'Barton Yost', '8526 Evalyn Cliffs\nThaliaview, PA 04002-5611', '+4613721538017', '+2629660136770'),
(596, '2017-03-19 14:24:55', NULL, NULL, 'Misty Farrell', '5405 Garland Vista\nHaleytown, AK 68794-3727', '+7641226820379', '+4667567303863'),
(597, '2017-03-19 14:24:55', NULL, NULL, 'Dallas Dickinson III', '9560 Ratke Locks Apt. 195\nShieldsland, NY 45773', '+1827655214611', '+3586226962389'),
(598, '2017-03-19 14:24:55', NULL, NULL, 'Fernando Schmeler', '17764 Bashirian Parkways Suite 691\nLake Germaineton, GA 47899-9227', '+2459947206399', '+5342468150212'),
(599, '2017-03-19 14:24:55', NULL, NULL, 'Oceane Romaguera', '239 Demarcus Vista\nSamirburgh, HI 31095-3659', '+1170960405788', '+8660932766537'),
(600, '2017-03-19 14:24:55', NULL, NULL, 'Leora Abbott', '1559 Maye Ridges\nWest Cleoraview, NH 92650-7348', '+4632883744580', '+3556894240032'),
(601, '2017-03-19 14:24:55', NULL, NULL, 'Linnie Gutkowski', '4350 Marcellus Streets\nEast Rosarioton, WY 19641-1989', '+2236422943325', '+4563061952116'),
(602, '2017-03-19 14:24:55', NULL, NULL, 'Hiram Quigley', '696 Vicenta Summit\nNew Bertrambury, NH 70880', '+3686677922617', '+7076315190347');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_08_07_145904_add_table_cms_apicustom', 1),
(2, '2016_08_07_150834_add_table_cms_dashboard', 1),
(3, '2016_08_07_151210_add_table_cms_logs', 1),
(4, '2016_08_07_152014_add_table_cms_privileges', 1),
(5, '2016_08_07_152214_add_table_cms_privileges_roles', 1),
(6, '2016_08_07_152320_add_table_cms_settings', 1),
(7, '2016_08_07_152421_add_table_cms_users', 1),
(8, '2016_08_07_154624_add_table_cms_moduls', 1),
(9, '2016_08_17_225409_add_status_cms_users', 1),
(10, '2016_08_20_125418_add_table_cms_notifications', 1),
(11, '2016_09_04_033706_add_table_cms_email_queues', 1),
(12, '2016_09_16_035347_add_group_setting', 1),
(13, '2016_09_16_045425_add_label_setting', 1),
(14, '2016_09_17_104728_create_nullable_cms_apicustom', 1),
(15, '2016_10_01_141740_add_method_type_apicustom', 1),
(16, '2016_10_01_141846_add_parameters_apicustom', 1),
(17, '2016_10_01_141934_add_responses_apicustom', 1),
(18, '2016_10_01_144826_add_table_apikey', 1),
(19, '2016_11_14_141657_create_cms_menus', 1),
(20, '2016_11_15_132350_create_cms_email_templates', 1),
(21, '2016_11_15_190410_create_cms_statistics', 1),
(22, '2016_11_17_102740_create_cms_statistic_components', 1),
(23, '2017_03_17_061205_create_categories', 1),
(24, '2017_03_17_070326_create_products', 1),
(25, '2017_03_17_070433_create_customers', 1),
(26, '2017_03_17_070509_create_suppliers', 1),
(27, '2017_03_17_072724_create_brands', 1),
(28, '2017_03_17_085044_create_orders', 1),
(29, '2017_03_17_085104_create_orders_detail', 1),
(30, '2017_03_17_103826_craete_products_stock', 1),
(31, '2017_03_17_134426_add_brands_id_to_products', 1),
(32, '2017_03_17_134848_add_sku_to_products', 1),
(33, '2017_03_17_145653_add_sku_to_orders_detail', 1),
(34, '2014_10_12_000000_create_users_table', 2),
(35, '2014_10_12_100000_create_password_resets_table', 2),
(36, '2016_08_07_151211_add_details_cms_logs', 2),
(37, '2016_08_07_154624_add_table_cms_menus_privileges', 2),
(38, '2017_06_06_164501_add_deleted_at_cms_moduls', 2),
(39, '2019_08_19_000000_create_failed_jobs_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `order_number` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double NOT NULL DEFAULT '0',
  `tax` double NOT NULL DEFAULT '0',
  `discount` double NOT NULL DEFAULT '0',
  `grand_total` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `deleted_at`, `customers_id`, `order_number`, `total`, `tax`, `discount`, `grand_total`) VALUES
(3006, '2017-01-24 09:39:20', NULL, NULL, 568, 'I8JST', 2474556, 247455.6, 49491.12, 2672520.48),
(3007, '2017-03-01 22:18:48', NULL, NULL, 585, 'JVBUH', 3526059, 352605.9, 70521.18, 3808143.7199999997),
(3008, '2017-01-10 21:49:47', NULL, NULL, 558, 'QE29K', 2404305, 240430.5, 48086.1, 2596649.4),
(3009, '2016-12-23 08:09:21', NULL, NULL, 573, 'RVWE4', 2563539, 256353.9, 51270.78, 2768622.12),
(3010, '2017-01-09 16:58:37', NULL, NULL, 585, 'WIFPD', 2870109, 287010.9, 57402.18, 3099717.7199999997),
(3011, '2016-12-30 19:54:55', NULL, NULL, 581, 'EWYNA', 3537014, 353701.4, 70740.28, 3819975.12),
(3012, '2017-03-05 03:07:43', NULL, NULL, 579, 'SKLA8', 2350405, 235040.5, 47008.1, 2538437.4),
(3013, '2017-03-18 06:39:13', NULL, NULL, 588, 'EHK1M', 3347267, 334726.7, 66945.34, 3615048.3600000003),
(3014, '2017-02-21 21:58:06', NULL, NULL, 575, 'F1GFO', 2787368, 278736.8, 55747.36, 3010357.44),
(3015, '2017-01-11 22:09:39', NULL, NULL, 574, 'ZOKMN', 4432550, 443255, 88651, 4787154),
(3016, '2017-03-04 08:38:24', NULL, NULL, 554, 'BLJF3', 2093448, 209344.8, 41868.96, 2260923.84),
(3017, '2017-02-10 00:33:47', NULL, NULL, 600, 'P6HXG', 2208321, 220832.1, 44166.42, 2384986.68),
(3018, '2017-03-02 10:16:34', NULL, NULL, 565, 'CNTM9', 4510209, 451020.9, 90204.18, 4871025.720000001),
(3019, '2017-01-08 09:40:53', NULL, NULL, 572, 'ECIQT', 4029206, 402920.6, 80584.12, 4351542.4799999995),
(3020, '2016-12-21 10:52:30', NULL, NULL, 588, 'PC4BO', 3121923, 312192.3, 62438.46, 3371676.84),
(3021, '2017-01-02 03:18:29', NULL, NULL, 555, 'Y3G8N', 4297663, 429766.3, 85953.26, 4641476.04),
(3022, '2017-02-21 15:53:20', NULL, NULL, 599, 'DZBOJ', 3635057, 363505.7, 72701.14, 3925861.56),
(3023, '2017-02-11 12:23:46', NULL, NULL, 587, 'CZW3L', 3082572, 308257.2, 61651.44, 3329177.7600000002),
(3024, '2016-12-23 21:53:20', NULL, NULL, 583, 'RMQD8', 3087506, 308750.6, 61750.12, 3334506.48),
(3025, '2017-01-29 10:05:38', NULL, NULL, 573, 'VZFO4', 3164729, 316472.9, 63294.58, 3417907.32),
(3026, '2017-01-25 15:43:15', NULL, NULL, 576, 'JMWHU', 1755039, 175503.9, 35100.78, 1895442.1199999999),
(3027, '2016-12-31 23:28:36', NULL, NULL, 565, '0OU3U', 3960059, 396005.9, 79201.18, 4276863.720000001),
(3028, '2017-03-08 16:11:14', NULL, NULL, 557, '89WUH', 1681131, 168113.1, 33622.62, 1815621.48),
(3029, '2017-01-17 01:14:31', NULL, NULL, 592, 'UGBPF', 3763099, 376309.9, 75261.98, 4064146.92),
(3030, '2017-01-05 06:51:05', NULL, NULL, 601, 'BTLTD', 2983281, 298328.1, 59665.62, 3221943.48),
(3031, '2017-01-24 15:41:57', NULL, NULL, 589, 'VWDWO', 2894242, 289424.2, 57884.84, 3125781.3600000003),
(3032, '2017-01-24 11:13:41', NULL, NULL, 596, 'SZ0YW', 3366024, 336602.4, 67320.48, 3635305.92),
(3033, '2017-02-07 18:28:17', NULL, NULL, 561, '3VBB3', 3063626, 306362.6, 61272.52, 3308716.08),
(3034, '2016-12-29 19:44:48', NULL, NULL, 559, '2BXMJ', 2739203, 273920.3, 54784.06, 2958339.2399999998),
(3035, '2017-01-14 06:45:30', NULL, NULL, 588, 'EHER4', 2172081, 217208.1, 43441.62, 2345847.48),
(3036, '2017-02-03 13:02:48', NULL, NULL, 600, 'R305V', 2039719, 203971.9, 40794.38, 2202896.52),
(3037, '2017-02-09 15:00:03', NULL, NULL, 581, 'XMX4W', 4216719, 421671.9, 84334.38, 4554056.5200000005),
(3038, '2017-03-06 15:00:28', NULL, NULL, 589, 'A8MJ0', 3268883, 326888.3, 65377.66, 3530393.6399999997),
(3039, '2016-12-21 07:42:43', NULL, NULL, 596, 'ZGDUD', 2353454, 235345.4, 47069.08, 2541730.32),
(3040, '2017-01-10 00:58:58', NULL, NULL, 573, 'M1TV8', 4209204, 420920.4, 84184.08, 4545940.32),
(3041, '2017-01-17 06:11:44', NULL, NULL, 564, 'W6DKF', 3244685, 324468.5, 64893.7, 3504259.8),
(3042, '2017-03-19 07:12:17', NULL, NULL, 563, 'POCVG', 3724880, 372488, 74497.6, 4022870.4),
(3043, '2017-01-12 18:20:28', NULL, NULL, 595, 'CZF8G', 2947100, 294710, 58942, 3182868),
(3044, '2016-12-22 16:01:54', NULL, NULL, 579, 'A1DYK', 3979956, 397995.6, 79599.12, 4298352.4799999995),
(3045, '2017-03-09 05:57:17', NULL, NULL, 579, 'TAI5H', 4378399, 437839.9, 87567.98, 4728670.92),
(3046, '2017-01-02 18:38:18', NULL, NULL, 581, '7E8Z8', 4281127, 428112.7, 85622.54, 4623617.16),
(3047, '2017-03-03 15:16:22', NULL, NULL, 554, 'L7DDK', 2033234, 203323.4, 40664.68, 2195892.7199999997),
(3048, '2017-03-16 01:49:59', NULL, NULL, 590, 'NC5L8', 3304955, 330495.5, 66099.1, 3569351.4),
(3049, '2017-01-02 12:09:36', NULL, NULL, 568, 'FOICP', 1618148, 161814.8, 32362.96, 1747599.84),
(3050, '2017-01-26 21:42:48', NULL, NULL, 557, 'HAEDA', 3533217, 353321.7, 70664.34, 3815874.3600000003),
(3051, '2017-03-15 02:45:25', NULL, NULL, 598, 'OZAJM', 1983348, 198334.8, 39666.96, 2142015.84),
(3052, '2017-03-09 15:08:20', NULL, NULL, 574, 'QUALV', 3459155, 345915.5, 69183.1, 3735887.4),
(3053, '2016-12-21 04:11:26', NULL, NULL, 570, 'SDIAT', 2589232, 258923.2, 51784.64, 2796370.56),
(3054, '2017-02-15 06:31:53', NULL, NULL, 558, 'XO21N', 2682147, 268214.7, 53642.94, 2896718.7600000002),
(3055, '2017-03-01 19:13:02', NULL, NULL, 589, 'AL4LJ', 3444656, 344465.6, 68893.12, 3720228.48),
(3056, '2017-02-07 06:02:55', NULL, NULL, 585, 'HKMMK', 2402325, 240232.5, 48046.5, 2594511),
(3057, '2017-02-06 12:47:11', NULL, NULL, 571, 'ZYN0D', 3107099, 310709.9, 62141.98, 3355666.92),
(3058, '2017-03-13 13:04:40', NULL, NULL, 592, 'P1KFL', 2841861, 284186.1, 56837.22, 3069209.88),
(3059, '2017-01-25 20:52:52', NULL, NULL, 591, 'A7QWB', 3880826, 388082.6, 77616.52, 4191292.0799999996),
(3060, '2017-02-12 19:31:14', NULL, NULL, 562, 'QYPDK', 3236588, 323658.8, 64731.76, 3495515.04),
(3061, '2017-02-28 20:29:40', NULL, NULL, 580, '0SZEF', 4999329, 499932.9, 99986.58, 5399275.32),
(3062, '2017-02-27 16:18:40', NULL, NULL, 560, 'UPKVF', 3313810, 331381, 66276.2, 3578914.8),
(3063, '2017-02-11 03:36:57', NULL, NULL, 570, 'SOGVN', 4363459, 436345.9, 87269.18, 4712535.720000001),
(3064, '2016-12-28 13:39:03', NULL, NULL, 602, 'JSCET', 3701900, 370190, 74038, 3998052),
(3065, '2017-03-17 02:23:27', NULL, NULL, 563, 'UDUNA', 3303418, 330341.8, 66068.36, 3567691.44),
(3066, '2017-02-09 06:39:54', NULL, NULL, 578, 'M4U4S', 3592980, 359298, 71859.6, 3880418.4),
(3067, '2016-12-23 06:10:16', NULL, NULL, 587, 'HYHZO', 2966925, 296692.5, 59338.5, 3204279),
(3068, '2017-03-15 05:11:35', NULL, NULL, 585, '2KPL9', 4545083, 454508.3, 90901.66, 4908689.64),
(3069, '2016-12-24 16:44:03', NULL, NULL, 585, 'TDUOG', 4252862, 425286.2, 85057.24, 4593090.96),
(3070, '2017-01-22 04:09:31', NULL, NULL, 599, 'Y47S1', 2396709, 239670.9, 47934.18, 2588445.7199999997),
(3071, '2017-01-21 05:27:28', NULL, NULL, 556, 'PYJQI', 2945076, 294507.6, 58901.52, 3180682.08),
(3072, '2017-02-18 08:31:03', NULL, NULL, 594, 'EKX4D', 2480334, 248033.4, 49606.68, 2678760.7199999997),
(3073, '2017-02-22 01:25:49', NULL, NULL, 582, 'ZWJAL', 3140643, 314064.3, 62812.86, 3391894.44),
(3074, '2016-12-27 10:07:30', NULL, NULL, 589, '9GL2C', 3848982, 384898.2, 76979.64, 4156900.56),
(3075, '2017-02-22 11:08:50', NULL, NULL, 557, '0DZB2', 1546027, 154602.7, 30920.54, 1669709.16),
(3076, '2017-01-23 17:36:18', NULL, NULL, 556, 'RE1G4', 3291945, 329194.5, 65838.9, 3555300.6),
(3077, '2017-03-09 12:25:11', NULL, NULL, 577, 'TYQFG', 1801284, 180128.4, 36025.68, 1945386.72),
(3078, '2017-02-09 01:31:34', NULL, NULL, 559, 'KRLBB', 3328026, 332802.6, 66560.52, 3594268.08),
(3079, '2017-02-06 21:26:45', NULL, NULL, 580, 'YPB6J', 3802109, 380210.9, 76042.18, 4106277.7199999997),
(3080, '2017-02-06 00:50:52', NULL, NULL, 589, 'HMFFY', 2462736, 246273.6, 49254.72, 2659754.88),
(3081, '2017-02-03 12:48:39', NULL, NULL, 561, 'OYUOQ', 3488455, 348845.5, 69769.1, 3767531.4),
(3082, '2017-01-06 04:51:37', NULL, NULL, 558, '0KI0W', 4819651, 481965.1, 96393.02, 5205223.08),
(3083, '2017-02-09 05:14:24', NULL, NULL, 580, 'FIHQU', 2617315, 261731.5, 52346.3, 2826700.2),
(3084, '2017-01-27 18:22:07', NULL, NULL, 554, 'NYWOW', 3057536, 305753.6, 61150.72, 3302138.88),
(3085, '2016-12-23 09:54:32', NULL, NULL, 580, 'JVP4D', 2607858, 260785.8, 52157.16, 2816486.6399999997),
(3086, '2017-03-11 00:16:24', NULL, NULL, 579, 'OMKNY', 2591486, 259148.6, 51829.72, 2798804.88),
(3087, '2017-03-10 08:14:12', NULL, NULL, 578, 'PFAUV', 2488899, 248889.9, 49777.98, 2688010.92),
(3088, '2017-03-09 00:30:55', NULL, NULL, 566, 'FGOPO', 3337571, 333757.1, 66751.42, 3604576.68),
(3089, '2017-03-05 06:40:59', NULL, NULL, 563, 'NTY46', 2531874, 253187.4, 50637.48, 2734423.92),
(3090, '2017-01-22 22:36:07', NULL, NULL, 573, 'LKXXK', 3018534, 301853.4, 60370.68, 3260016.7199999997),
(3091, '2017-03-18 13:50:50', NULL, NULL, 569, 'LRQE8', 3303275, 330327.5, 66065.5, 3567537),
(3092, '2017-01-01 08:45:11', NULL, NULL, 570, '7MPCD', 3987394, 398739.4, 79747.88, 4306385.5200000005),
(3093, '2017-03-18 11:13:03', NULL, NULL, 580, 'IPYSC', 2609244, 260924.4, 52184.88, 2817983.52),
(3094, '2017-02-04 23:13:25', NULL, NULL, 583, 'KIQ5C', 3234994, 323499.4, 64699.88, 3493793.52),
(3095, '2017-02-20 09:58:52', NULL, NULL, 562, 'TH1HK', 3048157, 304815.7, 60963.14, 3292009.56),
(3096, '2017-02-26 21:43:44', NULL, NULL, 568, 'GAS5N', 3817272, 381727.2, 76345.44, 4122653.7600000002),
(3097, '2017-03-07 21:03:01', NULL, NULL, 601, 'QMMX3', 2438072, 243807.2, 48761.44, 2633117.7600000002),
(3098, '2017-02-17 03:48:31', NULL, NULL, 564, 'LQSC4', 2928894, 292889.4, 58577.88, 3163205.52),
(3099, '2016-12-28 07:11:10', NULL, NULL, 560, '5NSRG', 2177133, 217713.3, 43542.66, 2351303.6399999997),
(3100, '2017-01-02 06:01:00', NULL, NULL, 585, '9WG9K', 2656314, 265631.4, 53126.28, 2868819.12),
(3101, '2016-12-28 15:08:00', NULL, NULL, 576, 'EQXBJ', 1694253, 169425.3, 33885.06, 1829793.24),
(3102, '2017-03-07 04:05:54', NULL, NULL, 581, 'TUP9C', 4015706, 401570.6, 80314.12, 4336962.4799999995),
(3103, '2016-12-28 03:47:50', NULL, NULL, 573, 'UFD0Z', 3866734, 386673.4, 77334.68, 4176072.72),
(3104, '2017-01-28 20:57:16', NULL, NULL, 555, 'SEQ9P', 3162263, 316226.3, 63245.26, 3415244.04),
(3105, '2017-02-23 16:58:48', NULL, NULL, 586, 'QZJDT', 3031438, 303143.8, 60628.76, 3273953.04),
(3106, '2017-01-08 18:39:00', NULL, NULL, 559, 'OZK9M', 2164008, 216400.8, 43280.16, 2337128.6399999997);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `orders_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `products_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_price` double NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `sub_total` double NOT NULL,
  `products_sku` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `created_at`, `updated_at`, `orders_id`, `products_id`, `products_name`, `products_price`, `quantity`, `sub_total`, `products_sku`) VALUES
(18021, '2017-01-24 09:39:20', NULL, 3006, 10, 'repellendus enim quam incidunt laudantium', 146512, 2, 293024, 'n9nnq5'),
(18022, '2017-01-24 09:39:20', NULL, 3006, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 1, 180714, 'hjpebZ'),
(18023, '2017-01-24 09:39:20', NULL, 3006, 40, 'repudiandae ea ut odit amet', 176932, 2, 353864, '1y2pvt'),
(18024, '2017-01-24 09:39:20', NULL, 3006, 12, 'in ipsum voluptas delectus vero', 114861, 2, 229722, 'v4VWZQ'),
(18025, '2017-01-24 09:39:20', NULL, 3006, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 3, 510696, '6Gd9hR'),
(18026, '2017-01-24 09:39:20', NULL, 3006, 22, 'mollitia molestias magni consequuntur ea', 226634, 4, 906536, 'yEHLdn'),
(18027, '2017-03-01 22:18:48', NULL, 3007, 21, 'ipsam praesentium aut commodi cumque', 190211, 5, 951055, 'amdEeb'),
(18028, '2017-03-01 22:18:48', NULL, 3007, 27, 'natus voluptas est eos error', 182208, 1, 182208, 'Xabi3Q'),
(18029, '2017-03-01 22:18:48', NULL, 3007, 1, 'et nihil enim qui nisi', 219735, 3, 659205, 'rWAZhB'),
(18030, '2017-03-01 22:18:48', NULL, 3007, 31, 'id quae consequatur excepturi in', 171335, 4, 685340, '1kfUHc'),
(18031, '2017-03-01 22:18:48', NULL, 3007, 4, 'perspiciatis voluptatem officia autem fugiat', 199170, 3, 597510, 'gZnLym'),
(18032, '2017-03-01 22:18:48', NULL, 3007, 50, 'ab rerum molestiae eum provident', 150247, 3, 450741, 'uHqoE7'),
(18033, '2017-01-10 21:49:47', NULL, 3008, 5, 'rem animi voluptas maiores sit', 224279, 1, 224279, 'PBGtnM'),
(18034, '2017-01-10 21:49:47', NULL, 3008, 39, 'rerum ad aut omnis et', 247121, 3, 741363, 'gjTVAj'),
(18035, '2017-01-10 21:49:47', NULL, 3008, 37, 'dolor ipsam assumenda omnis et', 125963, 3, 377889, 'KSa0qJ'),
(18036, '2017-01-10 21:49:47', NULL, 3008, 9, 'id soluta omnis ut voluptatem', 221416, 1, 221416, 'iupnkY'),
(18037, '2017-01-10 21:49:47', NULL, 3008, 12, 'in ipsum voluptas delectus vero', 114861, 3, 344583, 'v4VWZQ'),
(18038, '2017-01-10 21:49:47', NULL, 3008, 23, 'rem nostrum harum qui at', 164925, 3, 494775, 'WweeDD'),
(18039, '2016-12-23 08:09:21', NULL, 3009, 5, 'rem animi voluptas maiores sit', 224279, 1, 224279, 'PBGtnM'),
(18040, '2016-12-23 08:09:21', NULL, 3009, 23, 'rem nostrum harum qui at', 164925, 4, 659700, 'WweeDD'),
(18041, '2016-12-23 08:09:21', NULL, 3009, 3, 'suscipit et ipsa praesentium et', 119089, 1, 119089, 'igmoFK'),
(18042, '2016-12-23 08:09:21', NULL, 3009, 48, 'temporibus qui distinctio minus dolor', 227378, 3, 682134, 'iCESeT'),
(18043, '2016-12-23 08:09:21', NULL, 3009, 35, 'quas quae esse impedit nobis', 171307, 3, 513921, 'ir6mMb'),
(18044, '2016-12-23 08:09:21', NULL, 3009, 27, 'natus voluptas est eos error', 182208, 2, 364416, 'Xabi3Q'),
(18045, '2017-01-09 16:58:37', NULL, 3010, 37, 'dolor ipsam assumenda omnis et', 125963, 1, 125963, 'KSa0qJ'),
(18046, '2017-01-09 16:58:37', NULL, 3010, 24, 'et asperiores repellat officia aut', 237611, 1, 237611, 'aNNS9O'),
(18047, '2017-01-09 16:58:37', NULL, 3010, 40, 'repudiandae ea ut odit amet', 176932, 1, 176932, '1y2pvt'),
(18048, '2017-01-09 16:58:37', NULL, 3010, 46, 'aliquam exercitationem qui veritatis esse', 219483, 5, 1097415, 'iHpztb'),
(18049, '2017-01-09 16:58:37', NULL, 3010, 8, 'doloremque odit ea aperiam iusto', 116404, 5, 582020, 'yd4Hpv'),
(18050, '2017-01-09 16:58:37', NULL, 3010, 33, 'tempora officiis rem ut iste', 162542, 4, 650168, 'In23sv'),
(18051, '2016-12-30 19:54:55', NULL, 3011, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 4, 680928, '6Gd9hR'),
(18052, '2016-12-30 19:54:55', NULL, 3011, 31, 'id quae consequatur excepturi in', 171335, 5, 856675, '1kfUHc'),
(18053, '2016-12-30 19:54:55', NULL, 3011, 21, 'ipsam praesentium aut commodi cumque', 190211, 4, 760844, 'amdEeb'),
(18054, '2016-12-30 19:54:55', NULL, 3011, 8, 'doloremque odit ea aperiam iusto', 116404, 4, 465616, 'yd4Hpv'),
(18055, '2016-12-30 19:54:55', NULL, 3011, 49, 'aut odit deleniti culpa nihil', 161747, 4, 646988, 'qH0kg9'),
(18056, '2016-12-30 19:54:55', NULL, 3011, 37, 'dolor ipsam assumenda omnis et', 125963, 1, 125963, 'KSa0qJ'),
(18057, '2017-03-05 03:07:43', NULL, 3012, 17, 'magnam minus officiis fugiat quo', 132585, 1, 132585, 'juUFHD'),
(18058, '2017-03-05 03:07:43', NULL, 3012, 29, 'deleniti ullam iste esse sit', 148451, 2, 296902, 'bHk0tj'),
(18059, '2017-03-05 03:07:43', NULL, 3012, 39, 'rerum ad aut omnis et', 247121, 1, 247121, 'gjTVAj'),
(18060, '2017-03-05 03:07:43', NULL, 3012, 10, 'repellendus enim quam incidunt laudantium', 146512, 2, 293024, 'n9nnq5'),
(18061, '2017-03-05 03:07:43', NULL, 3012, 13, 'repudiandae illo consectetur sed accusantium', 185501, 5, 927505, 'DxZMK8'),
(18062, '2017-03-05 03:07:43', NULL, 3012, 22, 'mollitia molestias magni consequuntur ea', 226634, 2, 453268, 'yEHLdn'),
(18063, '2017-03-18 06:39:13', NULL, 3013, 4, 'perspiciatis voluptatem officia autem fugiat', 199170, 1, 199170, 'gZnLym'),
(18064, '2017-03-18 06:39:13', NULL, 3013, 18, 'maxime voluptas ut nam blanditiis', 215392, 5, 1076960, 'z8HjN7'),
(18065, '2017-03-18 06:39:13', NULL, 3013, 14, 'aperiam minus qui optio dolor', 221923, 2, 443846, 'LjdK1j'),
(18066, '2017-03-18 06:39:13', NULL, 3013, 39, 'rerum ad aut omnis et', 247121, 1, 247121, 'gjTVAj'),
(18067, '2017-03-18 06:39:13', NULL, 3013, 32, 'fugit dolor libero dolor doloribus', 142880, 5, 714400, 'l2K5LE'),
(18068, '2017-03-18 06:39:13', NULL, 3013, 45, 'facilis excepturi qui debitis rerum', 133154, 5, 665770, 'J3gIXY'),
(18069, '2017-02-21 21:58:06', NULL, 3014, 19, 'rerum quo expedita asperiores cupiditate', 158017, 2, 316034, 'aDnuIu'),
(18070, '2017-02-21 21:58:06', NULL, 3014, 32, 'fugit dolor libero dolor doloribus', 142880, 2, 285760, 'l2K5LE'),
(18071, '2017-02-21 21:58:06', NULL, 3014, 7, 'aut velit et rerum placeat', 103443, 3, 310329, '5xPVlu'),
(18072, '2017-02-21 21:58:06', NULL, 3014, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 5, 851160, '6Gd9hR'),
(18073, '2017-02-21 21:58:06', NULL, 3014, 3, 'suscipit et ipsa praesentium et', 119089, 5, 595445, 'igmoFK'),
(18074, '2017-02-21 21:58:06', NULL, 3014, 32, 'fugit dolor libero dolor doloribus', 142880, 3, 428640, 'l2K5LE'),
(18075, '2017-01-11 22:09:39', NULL, 3015, 18, 'maxime voluptas ut nam blanditiis', 215392, 5, 1076960, 'z8HjN7'),
(18076, '2017-01-11 22:09:39', NULL, 3015, 29, 'deleniti ullam iste esse sit', 148451, 5, 742255, 'bHk0tj'),
(18077, '2017-01-11 22:09:39', NULL, 3015, 42, 'voluptate deserunt explicabo fugit sequi', 225890, 4, 903560, 'UpyIVs'),
(18078, '2017-01-11 22:09:39', NULL, 3015, 14, 'aperiam minus qui optio dolor', 221923, 3, 665769, 'LjdK1j'),
(18079, '2017-01-11 22:09:39', NULL, 3015, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 2, 361428, 'hjpebZ'),
(18080, '2017-01-11 22:09:39', NULL, 3015, 44, 'odio aliquid ipsam velit asperiores', 227526, 3, 682578, 'WEVpaj'),
(18081, '2017-03-04 08:38:24', NULL, 3016, 18, 'maxime voluptas ut nam blanditiis', 215392, 3, 646176, 'z8HjN7'),
(18082, '2017-03-04 08:38:24', NULL, 3016, 18, 'maxime voluptas ut nam blanditiis', 215392, 2, 430784, 'z8HjN7'),
(18083, '2017-03-04 08:38:24', NULL, 3016, 17, 'magnam minus officiis fugiat quo', 132585, 1, 132585, 'juUFHD'),
(18084, '2017-03-04 08:38:24', NULL, 3016, 6, 'reiciendis id eos aut sapiente', 230615, 1, 230615, 'Dvxcb3'),
(18085, '2017-03-04 08:38:24', NULL, 3016, 3, 'suscipit et ipsa praesentium et', 119089, 4, 476356, 'igmoFK'),
(18086, '2017-03-04 08:38:24', NULL, 3016, 40, 'repudiandae ea ut odit amet', 176932, 1, 176932, '1y2pvt'),
(18087, '2017-02-10 00:33:47', NULL, 3017, 43, 'ea quaerat pariatur magnam repellat', 129615, 1, 129615, 'K6g9uC'),
(18088, '2017-02-10 00:33:47', NULL, 3017, 46, 'aliquam exercitationem qui veritatis esse', 219483, 2, 438966, 'iHpztb'),
(18089, '2017-02-10 00:33:47', NULL, 3017, 50, 'ab rerum molestiae eum provident', 150247, 3, 450741, 'uHqoE7'),
(18090, '2017-02-10 00:33:47', NULL, 3017, 11, 'reiciendis autem recusandae illo minima', 149691, 3, 449073, 'Y1ejWZ'),
(18091, '2017-02-10 00:33:47', NULL, 3017, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 2, 340464, '6Gd9hR'),
(18092, '2017-02-10 00:33:47', NULL, 3017, 45, 'facilis excepturi qui debitis rerum', 133154, 3, 399462, 'J3gIXY'),
(18093, '2017-03-02 10:16:34', NULL, 3018, 5, 'rem animi voluptas maiores sit', 224279, 5, 1121395, 'PBGtnM'),
(18094, '2017-03-02 10:16:34', NULL, 3018, 2, 'illum dignissimos provident aut aut', 132708, 1, 132708, 'xOo2ol'),
(18095, '2017-03-02 10:16:34', NULL, 3018, 42, 'voluptate deserunt explicabo fugit sequi', 225890, 5, 1129450, 'UpyIVs'),
(18096, '2017-03-02 10:16:34', NULL, 3018, 13, 'repudiandae illo consectetur sed accusantium', 185501, 3, 556503, 'DxZMK8'),
(18097, '2017-03-02 10:16:34', NULL, 3018, 1, 'et nihil enim qui nisi', 219735, 3, 659205, 'rWAZhB'),
(18098, '2017-03-02 10:16:34', NULL, 3018, 25, 'vitae a aperiam cupiditate consequatur', 227737, 4, 910948, 'Ol5iNk'),
(18099, '2017-01-08 09:40:53', NULL, 3019, 24, 'et asperiores repellat officia aut', 237611, 5, 1188055, 'aNNS9O'),
(18100, '2017-01-08 09:40:53', NULL, 3019, 44, 'odio aliquid ipsam velit asperiores', 227526, 4, 910104, 'WEVpaj'),
(18101, '2017-01-08 09:40:53', NULL, 3019, 50, 'ab rerum molestiae eum provident', 150247, 1, 150247, 'uHqoE7'),
(18102, '2017-01-08 09:40:53', NULL, 3019, 46, 'aliquam exercitationem qui veritatis esse', 219483, 2, 438966, 'iHpztb'),
(18103, '2017-01-08 09:40:53', NULL, 3019, 48, 'temporibus qui distinctio minus dolor', 227378, 3, 682134, 'iCESeT'),
(18104, '2017-01-08 09:40:53', NULL, 3019, 23, 'rem nostrum harum qui at', 164925, 4, 659700, 'WweeDD'),
(18105, '2016-12-21 10:52:30', NULL, 3020, 25, 'vitae a aperiam cupiditate consequatur', 227737, 4, 910948, 'Ol5iNk'),
(18106, '2016-12-21 10:52:30', NULL, 3020, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 3, 542142, 'hjpebZ'),
(18107, '2016-12-21 10:52:30', NULL, 3020, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 1, 170232, '6Gd9hR'),
(18108, '2016-12-21 10:52:30', NULL, 3020, 6, 'reiciendis id eos aut sapiente', 230615, 1, 230615, 'Dvxcb3'),
(18109, '2016-12-21 10:52:30', NULL, 3020, 27, 'natus voluptas est eos error', 182208, 2, 364416, 'Xabi3Q'),
(18110, '2016-12-21 10:52:30', NULL, 3020, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 5, 903570, 'hjpebZ'),
(18111, '2017-01-02 03:18:29', NULL, 3021, 2, 'illum dignissimos provident aut aut', 132708, 2, 265416, 'xOo2ol'),
(18112, '2017-01-02 03:18:29', NULL, 3021, 24, 'et asperiores repellat officia aut', 237611, 1, 237611, 'aNNS9O'),
(18113, '2017-01-02 03:18:29', NULL, 3021, 5, 'rem animi voluptas maiores sit', 224279, 5, 1121395, 'PBGtnM'),
(18114, '2017-01-02 03:18:29', NULL, 3021, 22, 'mollitia molestias magni consequuntur ea', 226634, 4, 906536, 'yEHLdn'),
(18115, '2017-01-02 03:18:29', NULL, 3021, 48, 'temporibus qui distinctio minus dolor', 227378, 5, 1136890, 'iCESeT'),
(18116, '2017-01-02 03:18:29', NULL, 3021, 37, 'dolor ipsam assumenda omnis et', 125963, 5, 629815, 'KSa0qJ'),
(18117, '2017-02-21 15:53:20', NULL, 3022, 35, 'quas quae esse impedit nobis', 171307, 4, 685228, 'ir6mMb'),
(18118, '2017-02-21 15:53:20', NULL, 3022, 44, 'odio aliquid ipsam velit asperiores', 227526, 4, 910104, 'WEVpaj'),
(18119, '2017-02-21 15:53:20', NULL, 3022, 36, 'exercitationem totam ipsum eum distinctio', 218276, 2, 436552, 'hS6jxk'),
(18120, '2017-02-21 15:53:20', NULL, 3022, 37, 'dolor ipsam assumenda omnis et', 125963, 5, 629815, 'KSa0qJ'),
(18121, '2017-02-21 15:53:20', NULL, 3022, 26, 'omnis optio ipsa quis rem', 154155, 4, 616620, 'ez1zBW'),
(18122, '2017-02-21 15:53:20', NULL, 3022, 20, 'non tempore tempore aspernatur at', 178369, 2, 356738, 'Y3AXUF'),
(18123, '2017-02-11 12:23:46', NULL, 3023, 22, 'mollitia molestias magni consequuntur ea', 226634, 5, 1133170, 'yEHLdn'),
(18124, '2017-02-11 12:23:46', NULL, 3023, 40, 'repudiandae ea ut odit amet', 176932, 3, 530796, '1y2pvt'),
(18125, '2017-02-11 12:23:46', NULL, 3023, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 1, 180714, 'hjpebZ'),
(18126, '2017-02-11 12:23:46', NULL, 3023, 36, 'exercitationem totam ipsum eum distinctio', 218276, 4, 873104, 'hS6jxk'),
(18127, '2017-02-11 12:23:46', NULL, 3023, 10, 'repellendus enim quam incidunt laudantium', 146512, 1, 146512, 'n9nnq5'),
(18128, '2017-02-11 12:23:46', NULL, 3023, 36, 'exercitationem totam ipsum eum distinctio', 218276, 1, 218276, 'hS6jxk'),
(18129, '2016-12-23 21:53:20', NULL, 3024, 9, 'id soluta omnis ut voluptatem', 221416, 3, 664248, 'iupnkY'),
(18130, '2016-12-23 21:53:20', NULL, 3024, 31, 'id quae consequatur excepturi in', 171335, 4, 685340, '1kfUHc'),
(18131, '2016-12-23 21:53:20', NULL, 3024, 19, 'rerum quo expedita asperiores cupiditate', 158017, 5, 790085, 'aDnuIu'),
(18132, '2016-12-23 21:53:20', NULL, 3024, 29, 'deleniti ullam iste esse sit', 148451, 1, 148451, 'bHk0tj'),
(18133, '2016-12-23 21:53:20', NULL, 3024, 48, 'temporibus qui distinctio minus dolor', 227378, 1, 227378, 'iCESeT'),
(18134, '2016-12-23 21:53:20', NULL, 3024, 16, 'rem voluptatem ea ut numquam', 143001, 4, 572004, '4VUNyz'),
(18135, '2017-01-29 10:05:38', NULL, 3025, 21, 'ipsam praesentium aut commodi cumque', 190211, 2, 380422, 'amdEeb'),
(18136, '2017-01-29 10:05:38', NULL, 3025, 48, 'temporibus qui distinctio minus dolor', 227378, 2, 454756, 'iCESeT'),
(18137, '2017-01-29 10:05:38', NULL, 3025, 48, 'temporibus qui distinctio minus dolor', 227378, 2, 454756, 'iCESeT'),
(18138, '2017-01-29 10:05:38', NULL, 3025, 42, 'voluptate deserunt explicabo fugit sequi', 225890, 4, 903560, 'UpyIVs'),
(18139, '2017-01-29 10:05:38', NULL, 3025, 17, 'magnam minus officiis fugiat quo', 132585, 5, 662925, 'juUFHD'),
(18140, '2017-01-29 10:05:38', NULL, 3025, 26, 'omnis optio ipsa quis rem', 154155, 2, 308310, 'ez1zBW'),
(18141, '2017-01-25 15:43:15', NULL, 3026, 8, 'doloremque odit ea aperiam iusto', 116404, 1, 116404, 'yd4Hpv'),
(18142, '2017-01-25 15:43:15', NULL, 3026, 15, 'tenetur et iusto ut aut', 179473, 5, 897365, 'WQMJTM'),
(18143, '2017-01-25 15:43:15', NULL, 3026, 22, 'mollitia molestias magni consequuntur ea', 226634, 1, 226634, 'yEHLdn'),
(18144, '2017-01-25 15:43:15', NULL, 3026, 45, 'facilis excepturi qui debitis rerum', 133154, 1, 133154, 'J3gIXY'),
(18145, '2017-01-25 15:43:15', NULL, 3026, 1, 'et nihil enim qui nisi', 219735, 1, 219735, 'rWAZhB'),
(18146, '2017-01-25 15:43:15', NULL, 3026, 49, 'aut odit deleniti culpa nihil', 161747, 1, 161747, 'qH0kg9'),
(18147, '2016-12-31 23:28:36', NULL, 3027, 24, 'et asperiores repellat officia aut', 237611, 4, 950444, 'aNNS9O'),
(18148, '2016-12-31 23:28:36', NULL, 3027, 19, 'rerum quo expedita asperiores cupiditate', 158017, 5, 790085, 'aDnuIu'),
(18149, '2016-12-31 23:28:36', NULL, 3027, 25, 'vitae a aperiam cupiditate consequatur', 227737, 3, 683211, 'Ol5iNk'),
(18150, '2016-12-31 23:28:36', NULL, 3027, 2, 'illum dignissimos provident aut aut', 132708, 2, 265416, 'xOo2ol'),
(18151, '2016-12-31 23:28:36', NULL, 3027, 32, 'fugit dolor libero dolor doloribus', 142880, 5, 714400, 'l2K5LE'),
(18152, '2016-12-31 23:28:36', NULL, 3027, 13, 'repudiandae illo consectetur sed accusantium', 185501, 3, 556503, 'DxZMK8'),
(18153, '2017-03-08 16:11:14', NULL, 3028, 14, 'aperiam minus qui optio dolor', 221923, 2, 443846, 'LjdK1j'),
(18154, '2017-03-08 16:11:14', NULL, 3028, 48, 'temporibus qui distinctio minus dolor', 227378, 1, 227378, 'iCESeT'),
(18155, '2017-03-08 16:11:14', NULL, 3028, 41, 'assumenda sint dolor autem magni', 108481, 1, 108481, 'SmJFV5'),
(18156, '2017-03-08 16:11:14', NULL, 3028, 10, 'repellendus enim quam incidunt laudantium', 146512, 3, 439536, 'n9nnq5'),
(18157, '2017-03-08 16:11:14', NULL, 3028, 24, 'et asperiores repellat officia aut', 237611, 1, 237611, 'aNNS9O'),
(18158, '2017-03-08 16:11:14', NULL, 3028, 5, 'rem animi voluptas maiores sit', 224279, 1, 224279, 'PBGtnM'),
(18159, '2017-01-17 01:14:31', NULL, 3029, 27, 'natus voluptas est eos error', 182208, 3, 546624, 'Xabi3Q'),
(18160, '2017-01-17 01:14:31', NULL, 3029, 46, 'aliquam exercitationem qui veritatis esse', 219483, 2, 438966, 'iHpztb'),
(18161, '2017-01-17 01:14:31', NULL, 3029, 21, 'ipsam praesentium aut commodi cumque', 190211, 4, 760844, 'amdEeb'),
(18162, '2017-01-17 01:14:31', NULL, 3029, 44, 'odio aliquid ipsam velit asperiores', 227526, 2, 455052, 'WEVpaj'),
(18163, '2017-01-17 01:14:31', NULL, 3029, 15, 'tenetur et iusto ut aut', 179473, 5, 897365, 'WQMJTM'),
(18164, '2017-01-17 01:14:31', NULL, 3029, 9, 'id soluta omnis ut voluptatem', 221416, 3, 664248, 'iupnkY'),
(18165, '2017-01-05 06:51:05', NULL, 3030, 47, 'molestias necessitatibus id soluta pariatur', 228603, 5, 1143015, 'QWFPMb'),
(18166, '2017-01-05 06:51:05', NULL, 3030, 23, 'rem nostrum harum qui at', 164925, 2, 329850, 'WweeDD'),
(18167, '2017-01-05 06:51:05', NULL, 3030, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 2, 340464, '6Gd9hR'),
(18168, '2017-01-05 06:51:05', NULL, 3030, 4, 'perspiciatis voluptatem officia autem fugiat', 199170, 1, 199170, 'gZnLym'),
(18169, '2017-01-05 06:51:05', NULL, 3030, 32, 'fugit dolor libero dolor doloribus', 142880, 3, 428640, 'l2K5LE'),
(18170, '2017-01-05 06:51:05', NULL, 3030, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 3, 542142, 'hjpebZ'),
(18171, '2017-01-24 15:41:57', NULL, 3031, 38, 'explicabo vel id eligendi aliquam', 182115, 4, 728460, 'wi7fmR'),
(18172, '2017-01-24 15:41:57', NULL, 3031, 30, 'quod quos recusandae nostrum quod', 161777, 4, 647108, 'gLGUR3'),
(18173, '2017-01-24 15:41:57', NULL, 3031, 17, 'magnam minus officiis fugiat quo', 132585, 5, 662925, 'juUFHD'),
(18174, '2017-01-24 15:41:57', NULL, 3031, 37, 'dolor ipsam assumenda omnis et', 125963, 4, 503852, 'KSa0qJ'),
(18175, '2017-01-24 15:41:57', NULL, 3031, 8, 'doloremque odit ea aperiam iusto', 116404, 2, 232808, 'yd4Hpv'),
(18176, '2017-01-24 15:41:57', NULL, 3031, 3, 'suscipit et ipsa praesentium et', 119089, 1, 119089, 'igmoFK'),
(18177, '2017-01-24 11:13:41', NULL, 3032, 49, 'aut odit deleniti culpa nihil', 161747, 1, 161747, 'qH0kg9'),
(18178, '2017-01-24 11:13:41', NULL, 3032, 13, 'repudiandae illo consectetur sed accusantium', 185501, 4, 742004, 'DxZMK8'),
(18179, '2017-01-24 11:13:41', NULL, 3032, 14, 'aperiam minus qui optio dolor', 221923, 1, 221923, 'LjdK1j'),
(18180, '2017-01-24 11:13:41', NULL, 3032, 42, 'voluptate deserunt explicabo fugit sequi', 225890, 4, 903560, 'UpyIVs'),
(18181, '2017-01-24 11:13:41', NULL, 3032, 24, 'et asperiores repellat officia aut', 237611, 2, 475222, 'aNNS9O'),
(18182, '2017-01-24 11:13:41', NULL, 3032, 18, 'maxime voluptas ut nam blanditiis', 215392, 4, 861568, 'z8HjN7'),
(18183, '2017-02-07 18:28:17', NULL, 3033, 2, 'illum dignissimos provident aut aut', 132708, 4, 530832, 'xOo2ol'),
(18184, '2017-02-07 18:28:17', NULL, 3033, 23, 'rem nostrum harum qui at', 164925, 5, 824625, 'WweeDD'),
(18185, '2017-02-07 18:28:17', NULL, 3033, 45, 'facilis excepturi qui debitis rerum', 133154, 4, 532616, 'J3gIXY'),
(18186, '2017-02-07 18:28:17', NULL, 3033, 46, 'aliquam exercitationem qui veritatis esse', 219483, 1, 219483, 'iHpztb'),
(18187, '2017-02-07 18:28:17', NULL, 3033, 3, 'suscipit et ipsa praesentium et', 119089, 2, 238178, 'igmoFK'),
(18188, '2017-02-07 18:28:17', NULL, 3033, 15, 'tenetur et iusto ut aut', 179473, 4, 717892, 'WQMJTM'),
(18189, '2016-12-29 19:44:48', NULL, 3034, 40, 'repudiandae ea ut odit amet', 176932, 4, 707728, '1y2pvt'),
(18190, '2016-12-29 19:44:48', NULL, 3034, 41, 'assumenda sint dolor autem magni', 108481, 2, 216962, 'SmJFV5'),
(18191, '2016-12-29 19:44:48', NULL, 3034, 36, 'exercitationem totam ipsum eum distinctio', 218276, 2, 436552, 'hS6jxk'),
(18192, '2016-12-29 19:44:48', NULL, 3034, 4, 'perspiciatis voluptatem officia autem fugiat', 199170, 2, 398340, 'gZnLym'),
(18193, '2016-12-29 19:44:48', NULL, 3034, 31, 'id quae consequatur excepturi in', 171335, 3, 514005, '1kfUHc'),
(18194, '2016-12-29 19:44:48', NULL, 3034, 8, 'doloremque odit ea aperiam iusto', 116404, 4, 465616, 'yd4Hpv'),
(18195, '2017-01-14 06:45:30', NULL, 3035, 45, 'facilis excepturi qui debitis rerum', 133154, 4, 532616, 'J3gIXY'),
(18196, '2017-01-14 06:45:30', NULL, 3035, 7, 'aut velit et rerum placeat', 103443, 2, 206886, '5xPVlu'),
(18197, '2017-01-14 06:45:30', NULL, 3035, 18, 'maxime voluptas ut nam blanditiis', 215392, 1, 215392, 'z8HjN7'),
(18198, '2017-01-14 06:45:30', NULL, 3035, 39, 'rerum ad aut omnis et', 247121, 3, 741363, 'gjTVAj'),
(18199, '2017-01-14 06:45:30', NULL, 3035, 45, 'facilis excepturi qui debitis rerum', 133154, 1, 133154, 'J3gIXY'),
(18200, '2017-01-14 06:45:30', NULL, 3035, 31, 'id quae consequatur excepturi in', 171335, 2, 342670, '1kfUHc'),
(18201, '2017-02-03 13:02:48', NULL, 3036, 17, 'magnam minus officiis fugiat quo', 132585, 3, 397755, 'juUFHD'),
(18202, '2017-02-03 13:02:48', NULL, 3036, 12, 'in ipsum voluptas delectus vero', 114861, 1, 114861, 'v4VWZQ'),
(18203, '2017-02-03 13:02:48', NULL, 3036, 32, 'fugit dolor libero dolor doloribus', 142880, 4, 571520, 'l2K5LE'),
(18204, '2017-02-03 13:02:48', NULL, 3036, 6, 'reiciendis id eos aut sapiente', 230615, 1, 230615, 'Dvxcb3'),
(18205, '2017-02-03 13:02:48', NULL, 3036, 16, 'rem voluptatem ea ut numquam', 143001, 2, 286002, '4VUNyz'),
(18206, '2017-02-03 13:02:48', NULL, 3036, 46, 'aliquam exercitationem qui veritatis esse', 219483, 2, 438966, 'iHpztb'),
(18207, '2017-02-09 15:00:03', NULL, 3037, 25, 'vitae a aperiam cupiditate consequatur', 227737, 5, 1138685, 'Ol5iNk'),
(18208, '2017-02-09 15:00:03', NULL, 3037, 50, 'ab rerum molestiae eum provident', 150247, 5, 751235, 'uHqoE7'),
(18209, '2017-02-09 15:00:03', NULL, 3037, 16, 'rem voluptatem ea ut numquam', 143001, 4, 572004, '4VUNyz'),
(18210, '2017-02-09 15:00:03', NULL, 3037, 1, 'et nihil enim qui nisi', 219735, 5, 1098675, 'rWAZhB'),
(18211, '2017-02-09 15:00:03', NULL, 3037, 20, 'non tempore tempore aspernatur at', 178369, 2, 356738, 'Y3AXUF'),
(18212, '2017-02-09 15:00:03', NULL, 3037, 11, 'reiciendis autem recusandae illo minima', 149691, 2, 299382, 'Y1ejWZ'),
(18213, '2017-03-06 15:00:28', NULL, 3038, 21, 'ipsam praesentium aut commodi cumque', 190211, 5, 951055, 'amdEeb'),
(18214, '2017-03-06 15:00:28', NULL, 3038, 3, 'suscipit et ipsa praesentium et', 119089, 1, 119089, 'igmoFK'),
(18215, '2017-03-06 15:00:28', NULL, 3038, 22, 'mollitia molestias magni consequuntur ea', 226634, 2, 453268, 'yEHLdn'),
(18216, '2017-03-06 15:00:28', NULL, 3038, 39, 'rerum ad aut omnis et', 247121, 2, 494242, 'gjTVAj'),
(18217, '2017-03-06 15:00:28', NULL, 3038, 40, 'repudiandae ea ut odit amet', 176932, 2, 353864, '1y2pvt'),
(18218, '2017-03-06 15:00:28', NULL, 3038, 15, 'tenetur et iusto ut aut', 179473, 5, 897365, 'WQMJTM'),
(18219, '2016-12-21 07:42:43', NULL, 3039, 33, 'tempora officiis rem ut iste', 162542, 3, 487626, 'In23sv'),
(18220, '2016-12-21 07:42:43', NULL, 3039, 6, 'reiciendis id eos aut sapiente', 230615, 2, 461230, 'Dvxcb3'),
(18221, '2016-12-21 07:42:43', NULL, 3039, 10, 'repellendus enim quam incidunt laudantium', 146512, 2, 293024, 'n9nnq5'),
(18222, '2016-12-21 07:42:43', NULL, 3039, 44, 'odio aliquid ipsam velit asperiores', 227526, 2, 455052, 'WEVpaj'),
(18223, '2016-12-21 07:42:43', NULL, 3039, 49, 'aut odit deleniti culpa nihil', 161747, 1, 161747, 'qH0kg9'),
(18224, '2016-12-21 07:42:43', NULL, 3039, 23, 'rem nostrum harum qui at', 164925, 3, 494775, 'WweeDD'),
(18225, '2017-01-10 00:58:58', NULL, 3040, 27, 'natus voluptas est eos error', 182208, 5, 911040, 'Xabi3Q'),
(18226, '2017-01-10 00:58:58', NULL, 3040, 24, 'et asperiores repellat officia aut', 237611, 3, 712833, 'aNNS9O'),
(18227, '2017-01-10 00:58:58', NULL, 3040, 44, 'odio aliquid ipsam velit asperiores', 227526, 1, 227526, 'WEVpaj'),
(18228, '2017-01-10 00:58:58', NULL, 3040, 24, 'et asperiores repellat officia aut', 237611, 5, 1188055, 'aNNS9O'),
(18229, '2017-01-10 00:58:58', NULL, 3040, 3, 'suscipit et ipsa praesentium et', 119089, 5, 595445, 'igmoFK'),
(18230, '2017-01-10 00:58:58', NULL, 3040, 12, 'in ipsum voluptas delectus vero', 114861, 5, 574305, 'v4VWZQ'),
(18231, '2017-01-17 06:11:44', NULL, 3041, 38, 'explicabo vel id eligendi aliquam', 182115, 1, 182115, 'wi7fmR'),
(18232, '2017-01-17 06:11:44', NULL, 3041, 17, 'magnam minus officiis fugiat quo', 132585, 2, 265170, 'juUFHD'),
(18233, '2017-01-17 06:11:44', NULL, 3041, 38, 'explicabo vel id eligendi aliquam', 182115, 3, 546345, 'wi7fmR'),
(18234, '2017-01-17 06:11:44', NULL, 3041, 24, 'et asperiores repellat officia aut', 237611, 5, 1188055, 'aNNS9O'),
(18235, '2017-01-17 06:11:44', NULL, 3041, 21, 'ipsam praesentium aut commodi cumque', 190211, 2, 380422, 'amdEeb'),
(18236, '2017-01-17 06:11:44', NULL, 3041, 44, 'odio aliquid ipsam velit asperiores', 227526, 3, 682578, 'WEVpaj'),
(18237, '2017-03-19 07:12:17', NULL, 3042, 31, 'id quae consequatur excepturi in', 171335, 3, 514005, '1kfUHc'),
(18238, '2017-03-19 07:12:17', NULL, 3042, 30, 'quod quos recusandae nostrum quod', 161777, 4, 647108, 'gLGUR3'),
(18239, '2017-03-19 07:12:17', NULL, 3042, 49, 'aut odit deleniti culpa nihil', 161747, 4, 646988, 'qH0kg9'),
(18240, '2017-03-19 07:12:17', NULL, 3042, 5, 'rem animi voluptas maiores sit', 224279, 5, 1121395, 'PBGtnM'),
(18241, '2017-03-19 07:12:17', NULL, 3042, 14, 'aperiam minus qui optio dolor', 221923, 3, 665769, 'LjdK1j'),
(18242, '2017-03-19 07:12:17', NULL, 3042, 43, 'ea quaerat pariatur magnam repellat', 129615, 1, 129615, 'K6g9uC'),
(18243, '2017-01-12 18:20:28', NULL, 3043, 31, 'id quae consequatur excepturi in', 171335, 2, 342670, '1kfUHc'),
(18244, '2017-01-12 18:20:28', NULL, 3043, 31, 'id quae consequatur excepturi in', 171335, 3, 514005, '1kfUHc'),
(18245, '2017-01-12 18:20:28', NULL, 3043, 12, 'in ipsum voluptas delectus vero', 114861, 2, 229722, 'v4VWZQ'),
(18246, '2017-01-12 18:20:28', NULL, 3043, 45, 'facilis excepturi qui debitis rerum', 133154, 5, 665770, 'J3gIXY'),
(18247, '2017-01-12 18:20:28', NULL, 3043, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 4, 680928, '6Gd9hR'),
(18248, '2017-01-12 18:20:28', NULL, 3043, 31, 'id quae consequatur excepturi in', 171335, 3, 514005, '1kfUHc'),
(18249, '2016-12-22 16:01:54', NULL, 3044, 25, 'vitae a aperiam cupiditate consequatur', 227737, 5, 1138685, 'Ol5iNk'),
(18250, '2016-12-22 16:01:54', NULL, 3044, 48, 'temporibus qui distinctio minus dolor', 227378, 1, 227378, 'iCESeT'),
(18251, '2016-12-22 16:01:54', NULL, 3044, 24, 'et asperiores repellat officia aut', 237611, 3, 712833, 'aNNS9O'),
(18252, '2016-12-22 16:01:54', NULL, 3044, 2, 'illum dignissimos provident aut aut', 132708, 5, 663540, 'xOo2ol'),
(18253, '2016-12-22 16:01:54', NULL, 3044, 27, 'natus voluptas est eos error', 182208, 2, 364416, 'Xabi3Q'),
(18254, '2016-12-22 16:01:54', NULL, 3044, 36, 'exercitationem totam ipsum eum distinctio', 218276, 4, 873104, 'hS6jxk'),
(18255, '2017-03-09 05:57:17', NULL, 3045, 3, 'suscipit et ipsa praesentium et', 119089, 4, 476356, 'igmoFK'),
(18256, '2017-03-09 05:57:17', NULL, 3045, 27, 'natus voluptas est eos error', 182208, 5, 911040, 'Xabi3Q'),
(18257, '2017-03-09 05:57:17', NULL, 3045, 2, 'illum dignissimos provident aut aut', 132708, 3, 398124, 'xOo2ol'),
(18258, '2017-03-09 05:57:17', NULL, 3045, 27, 'natus voluptas est eos error', 182208, 5, 911040, 'Xabi3Q'),
(18259, '2017-03-09 05:57:17', NULL, 3045, 49, 'aut odit deleniti culpa nihil', 161747, 5, 808735, 'qH0kg9'),
(18260, '2017-03-09 05:57:17', NULL, 3045, 36, 'exercitationem totam ipsum eum distinctio', 218276, 4, 873104, 'hS6jxk'),
(18261, '2017-01-02 18:38:18', NULL, 3046, 36, 'exercitationem totam ipsum eum distinctio', 218276, 2, 436552, 'hS6jxk'),
(18262, '2017-01-02 18:38:18', NULL, 3046, 39, 'rerum ad aut omnis et', 247121, 4, 988484, 'gjTVAj'),
(18263, '2017-01-02 18:38:18', NULL, 3046, 24, 'et asperiores repellat officia aut', 237611, 5, 1188055, 'aNNS9O'),
(18264, '2017-01-02 18:38:18', NULL, 3046, 12, 'in ipsum voluptas delectus vero', 114861, 3, 344583, 'v4VWZQ'),
(18265, '2017-01-02 18:38:18', NULL, 3046, 9, 'id soluta omnis ut voluptatem', 221416, 3, 664248, 'iupnkY'),
(18266, '2017-01-02 18:38:18', NULL, 3046, 1, 'et nihil enim qui nisi', 219735, 3, 659205, 'rWAZhB'),
(18267, '2017-03-03 15:16:22', NULL, 3047, 35, 'quas quae esse impedit nobis', 171307, 4, 685228, 'ir6mMb'),
(18268, '2017-03-03 15:16:22', NULL, 3047, 1, 'et nihil enim qui nisi', 219735, 1, 219735, 'rWAZhB'),
(18269, '2017-03-03 15:16:22', NULL, 3047, 18, 'maxime voluptas ut nam blanditiis', 215392, 1, 215392, 'z8HjN7'),
(18270, '2017-03-03 15:16:22', NULL, 3047, 20, 'non tempore tempore aspernatur at', 178369, 2, 356738, 'Y3AXUF'),
(18271, '2017-03-03 15:16:22', NULL, 3047, 2, 'illum dignissimos provident aut aut', 132708, 3, 398124, 'xOo2ol'),
(18272, '2017-03-03 15:16:22', NULL, 3047, 19, 'rerum quo expedita asperiores cupiditate', 158017, 1, 158017, 'aDnuIu'),
(18273, '2017-03-16 01:49:59', NULL, 3048, 33, 'tempora officiis rem ut iste', 162542, 5, 812710, 'In23sv'),
(18274, '2017-03-16 01:49:59', NULL, 3048, 16, 'rem voluptatem ea ut numquam', 143001, 5, 715005, '4VUNyz'),
(18275, '2017-03-16 01:49:59', NULL, 3048, 35, 'quas quae esse impedit nobis', 171307, 1, 171307, 'ir6mMb'),
(18276, '2017-03-16 01:49:59', NULL, 3048, 16, 'rem voluptatem ea ut numquam', 143001, 5, 715005, '4VUNyz'),
(18277, '2017-03-16 01:49:59', NULL, 3048, 38, 'explicabo vel id eligendi aliquam', 182115, 3, 546345, 'wi7fmR'),
(18278, '2017-03-16 01:49:59', NULL, 3048, 12, 'in ipsum voluptas delectus vero', 114861, 3, 344583, 'v4VWZQ'),
(18279, '2017-01-02 12:09:36', NULL, 3049, 47, 'molestias necessitatibus id soluta pariatur', 228603, 2, 457206, 'QWFPMb'),
(18280, '2017-01-02 12:09:36', NULL, 3049, 4, 'perspiciatis voluptatem officia autem fugiat', 199170, 2, 398340, 'gZnLym'),
(18281, '2017-01-02 12:09:36', NULL, 3049, 13, 'repudiandae illo consectetur sed accusantium', 185501, 1, 185501, 'DxZMK8'),
(18282, '2017-01-02 12:09:36', NULL, 3049, 9, 'id soluta omnis ut voluptatem', 221416, 1, 221416, 'iupnkY'),
(18283, '2017-01-02 12:09:36', NULL, 3049, 12, 'in ipsum voluptas delectus vero', 114861, 2, 229722, 'v4VWZQ'),
(18284, '2017-01-02 12:09:36', NULL, 3049, 37, 'dolor ipsam assumenda omnis et', 125963, 1, 125963, 'KSa0qJ'),
(18285, '2017-01-26 21:42:48', NULL, 3050, 16, 'rem voluptatem ea ut numquam', 143001, 5, 715005, '4VUNyz'),
(18286, '2017-01-26 21:42:48', NULL, 3050, 12, 'in ipsum voluptas delectus vero', 114861, 5, 574305, 'v4VWZQ'),
(18287, '2017-01-26 21:42:48', NULL, 3050, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 4, 722856, 'hjpebZ'),
(18288, '2017-01-26 21:42:48', NULL, 3050, 23, 'rem nostrum harum qui at', 164925, 3, 494775, 'WweeDD'),
(18289, '2017-01-26 21:42:48', NULL, 3050, 48, 'temporibus qui distinctio minus dolor', 227378, 2, 454756, 'iCESeT'),
(18290, '2017-01-26 21:42:48', NULL, 3050, 32, 'fugit dolor libero dolor doloribus', 142880, 4, 571520, 'l2K5LE'),
(18291, '2017-03-15 02:45:25', NULL, 3051, 11, 'reiciendis autem recusandae illo minima', 149691, 1, 149691, 'Y1ejWZ'),
(18292, '2017-03-15 02:45:25', NULL, 3051, 43, 'ea quaerat pariatur magnam repellat', 129615, 2, 259230, 'K6g9uC'),
(18293, '2017-03-15 02:45:25', NULL, 3051, 43, 'ea quaerat pariatur magnam repellat', 129615, 2, 259230, 'K6g9uC'),
(18294, '2017-03-15 02:45:25', NULL, 3051, 12, 'in ipsum voluptas delectus vero', 114861, 1, 114861, 'v4VWZQ'),
(18295, '2017-03-15 02:45:25', NULL, 3051, 30, 'quod quos recusandae nostrum quod', 161777, 3, 485331, 'gLGUR3'),
(18296, '2017-03-15 02:45:25', NULL, 3051, 16, 'rem voluptatem ea ut numquam', 143001, 5, 715005, '4VUNyz'),
(18297, '2017-03-09 15:08:20', NULL, 3052, 29, 'deleniti ullam iste esse sit', 148451, 1, 148451, 'bHk0tj'),
(18298, '2017-03-09 15:08:20', NULL, 3052, 23, 'rem nostrum harum qui at', 164925, 4, 659700, 'WweeDD'),
(18299, '2017-03-09 15:08:20', NULL, 3052, 11, 'reiciendis autem recusandae illo minima', 149691, 5, 748455, 'Y1ejWZ'),
(18300, '2017-03-09 15:08:20', NULL, 3052, 14, 'aperiam minus qui optio dolor', 221923, 5, 1109615, 'LjdK1j'),
(18301, '2017-03-09 15:08:20', NULL, 3052, 7, 'aut velit et rerum placeat', 103443, 2, 206886, '5xPVlu'),
(18302, '2017-03-09 15:08:20', NULL, 3052, 10, 'repellendus enim quam incidunt laudantium', 146512, 4, 586048, 'n9nnq5'),
(18303, '2016-12-21 04:11:26', NULL, 3053, 49, 'aut odit deleniti culpa nihil', 161747, 2, 323494, 'qH0kg9'),
(18304, '2016-12-21 04:11:26', NULL, 3053, 24, 'et asperiores repellat officia aut', 237611, 2, 475222, 'aNNS9O'),
(18305, '2016-12-21 04:11:26', NULL, 3053, 27, 'natus voluptas est eos error', 182208, 4, 728832, 'Xabi3Q'),
(18306, '2016-12-21 04:11:26', NULL, 3053, 7, 'aut velit et rerum placeat', 103443, 2, 206886, '5xPVlu'),
(18307, '2016-12-21 04:11:26', NULL, 3053, 3, 'suscipit et ipsa praesentium et', 119089, 2, 238178, 'igmoFK'),
(18308, '2016-12-21 04:11:26', NULL, 3053, 26, 'omnis optio ipsa quis rem', 154155, 4, 616620, 'ez1zBW'),
(18309, '2017-02-15 06:31:53', NULL, 3054, 46, 'aliquam exercitationem qui veritatis esse', 219483, 4, 877932, 'iHpztb'),
(18310, '2017-02-15 06:31:53', NULL, 3054, 45, 'facilis excepturi qui debitis rerum', 133154, 1, 133154, 'J3gIXY'),
(18311, '2017-02-15 06:31:53', NULL, 3054, 49, 'aut odit deleniti culpa nihil', 161747, 4, 646988, 'qH0kg9'),
(18312, '2017-02-15 06:31:53', NULL, 3054, 16, 'rem voluptatem ea ut numquam', 143001, 3, 429003, '4VUNyz'),
(18313, '2017-02-15 06:31:53', NULL, 3054, 5, 'rem animi voluptas maiores sit', 224279, 2, 448558, 'PBGtnM'),
(18314, '2017-02-15 06:31:53', NULL, 3054, 10, 'repellendus enim quam incidunt laudantium', 146512, 1, 146512, 'n9nnq5'),
(18315, '2017-03-01 19:13:02', NULL, 3055, 44, 'odio aliquid ipsam velit asperiores', 227526, 4, 910104, 'WEVpaj'),
(18316, '2017-03-01 19:13:02', NULL, 3055, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 1, 170232, '6Gd9hR'),
(18317, '2017-03-01 19:13:02', NULL, 3055, 49, 'aut odit deleniti culpa nihil', 161747, 4, 646988, 'qH0kg9'),
(18318, '2017-03-01 19:13:02', NULL, 3055, 6, 'reiciendis id eos aut sapiente', 230615, 1, 230615, 'Dvxcb3'),
(18319, '2017-03-01 19:13:02', NULL, 3055, 3, 'suscipit et ipsa praesentium et', 119089, 3, 357267, 'igmoFK'),
(18320, '2017-03-01 19:13:02', NULL, 3055, 42, 'voluptate deserunt explicabo fugit sequi', 225890, 5, 1129450, 'UpyIVs'),
(18321, '2017-02-07 06:02:55', NULL, 3056, 3, 'suscipit et ipsa praesentium et', 119089, 5, 595445, 'igmoFK'),
(18322, '2017-02-07 06:02:55', NULL, 3056, 39, 'rerum ad aut omnis et', 247121, 1, 247121, 'gjTVAj'),
(18323, '2017-02-07 06:02:55', NULL, 3056, 42, 'voluptate deserunt explicabo fugit sequi', 225890, 2, 451780, 'UpyIVs'),
(18324, '2017-02-07 06:02:55', NULL, 3056, 31, 'id quae consequatur excepturi in', 171335, 4, 685340, '1kfUHc'),
(18325, '2017-02-07 06:02:55', NULL, 3056, 43, 'ea quaerat pariatur magnam repellat', 129615, 1, 129615, 'K6g9uC'),
(18326, '2017-02-07 06:02:55', NULL, 3056, 10, 'repellendus enim quam incidunt laudantium', 146512, 2, 293024, 'n9nnq5'),
(18327, '2017-02-06 12:47:11', NULL, 3057, 17, 'magnam minus officiis fugiat quo', 132585, 3, 397755, 'juUFHD'),
(18328, '2017-02-06 12:47:11', NULL, 3057, 35, 'quas quae esse impedit nobis', 171307, 3, 513921, 'ir6mMb'),
(18329, '2017-02-06 12:47:11', NULL, 3057, 47, 'molestias necessitatibus id soluta pariatur', 228603, 4, 914412, 'QWFPMb'),
(18330, '2017-02-06 12:47:11', NULL, 3057, 41, 'assumenda sint dolor autem magni', 108481, 4, 433924, 'SmJFV5'),
(18331, '2017-02-06 12:47:11', NULL, 3057, 31, 'id quae consequatur excepturi in', 171335, 4, 685340, '1kfUHc'),
(18332, '2017-02-06 12:47:11', NULL, 3057, 49, 'aut odit deleniti culpa nihil', 161747, 1, 161747, 'qH0kg9'),
(18333, '2017-03-13 13:04:40', NULL, 3058, 36, 'exercitationem totam ipsum eum distinctio', 218276, 1, 218276, 'hS6jxk'),
(18334, '2017-03-13 13:04:40', NULL, 3058, 2, 'illum dignissimos provident aut aut', 132708, 2, 265416, 'xOo2ol'),
(18335, '2017-03-13 13:04:40', NULL, 3058, 31, 'id quae consequatur excepturi in', 171335, 5, 856675, '1kfUHc'),
(18336, '2017-03-13 13:04:40', NULL, 3058, 50, 'ab rerum molestiae eum provident', 150247, 4, 600988, 'uHqoE7'),
(18337, '2017-03-13 13:04:40', NULL, 3058, 13, 'repudiandae illo consectetur sed accusantium', 185501, 1, 185501, 'DxZMK8'),
(18338, '2017-03-13 13:04:40', NULL, 3058, 16, 'rem voluptatem ea ut numquam', 143001, 5, 715005, '4VUNyz'),
(18339, '2017-01-25 20:52:52', NULL, 3059, 31, 'id quae consequatur excepturi in', 171335, 3, 514005, '1kfUHc'),
(18340, '2017-01-25 20:52:52', NULL, 3059, 40, 'repudiandae ea ut odit amet', 176932, 5, 884660, '1y2pvt'),
(18341, '2017-01-25 20:52:52', NULL, 3059, 23, 'rem nostrum harum qui at', 164925, 1, 164925, 'WweeDD'),
(18342, '2017-01-25 20:52:52', NULL, 3059, 39, 'rerum ad aut omnis et', 247121, 3, 741363, 'gjTVAj'),
(18343, '2017-01-25 20:52:52', NULL, 3059, 14, 'aperiam minus qui optio dolor', 221923, 3, 665769, 'LjdK1j'),
(18344, '2017-01-25 20:52:52', NULL, 3059, 44, 'odio aliquid ipsam velit asperiores', 227526, 4, 910104, 'WEVpaj'),
(18345, '2017-02-12 19:31:14', NULL, 3060, 38, 'explicabo vel id eligendi aliquam', 182115, 1, 182115, 'wi7fmR'),
(18346, '2017-02-12 19:31:14', NULL, 3060, 39, 'rerum ad aut omnis et', 247121, 4, 988484, 'gjTVAj'),
(18347, '2017-02-12 19:31:14', NULL, 3060, 33, 'tempora officiis rem ut iste', 162542, 5, 812710, 'In23sv'),
(18348, '2017-02-12 19:31:14', NULL, 3060, 12, 'in ipsum voluptas delectus vero', 114861, 1, 114861, 'v4VWZQ'),
(18349, '2017-02-12 19:31:14', NULL, 3060, 48, 'temporibus qui distinctio minus dolor', 227378, 1, 227378, 'iCESeT'),
(18350, '2017-02-12 19:31:14', NULL, 3060, 27, 'natus voluptas est eos error', 182208, 5, 911040, 'Xabi3Q'),
(18351, '2017-02-28 20:29:40', NULL, 3061, 9, 'id soluta omnis ut voluptatem', 221416, 3, 664248, 'iupnkY'),
(18352, '2017-02-28 20:29:40', NULL, 3061, 25, 'vitae a aperiam cupiditate consequatur', 227737, 5, 1138685, 'Ol5iNk'),
(18353, '2017-02-28 20:29:40', NULL, 3061, 13, 'repudiandae illo consectetur sed accusantium', 185501, 5, 927505, 'DxZMK8'),
(18354, '2017-02-28 20:29:40', NULL, 3061, 42, 'voluptate deserunt explicabo fugit sequi', 225890, 2, 451780, 'UpyIVs'),
(18355, '2017-02-28 20:29:40', NULL, 3061, 22, 'mollitia molestias magni consequuntur ea', 226634, 4, 906536, 'yEHLdn'),
(18356, '2017-02-28 20:29:40', NULL, 3061, 38, 'explicabo vel id eligendi aliquam', 182115, 5, 910575, 'wi7fmR'),
(18357, '2017-02-27 16:18:40', NULL, 3062, 2, 'illum dignissimos provident aut aut', 132708, 3, 398124, 'xOo2ol'),
(18358, '2017-02-27 16:18:40', NULL, 3062, 39, 'rerum ad aut omnis et', 247121, 3, 741363, 'gjTVAj'),
(18359, '2017-02-27 16:18:40', NULL, 3062, 49, 'aut odit deleniti culpa nihil', 161747, 3, 485241, 'qH0kg9'),
(18360, '2017-02-27 16:18:40', NULL, 3062, 38, 'explicabo vel id eligendi aliquam', 182115, 5, 910575, 'wi7fmR'),
(18361, '2017-02-27 16:18:40', NULL, 3062, 12, 'in ipsum voluptas delectus vero', 114861, 3, 344583, 'v4VWZQ'),
(18362, '2017-02-27 16:18:40', NULL, 3062, 41, 'assumenda sint dolor autem magni', 108481, 4, 433924, 'SmJFV5'),
(18363, '2017-02-11 03:36:57', NULL, 3063, 3, 'suscipit et ipsa praesentium et', 119089, 4, 476356, 'igmoFK'),
(18364, '2017-02-11 03:36:57', NULL, 3063, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 3, 510696, '6Gd9hR'),
(18365, '2017-02-11 03:36:57', NULL, 3063, 46, 'aliquam exercitationem qui veritatis esse', 219483, 5, 1097415, 'iHpztb'),
(18366, '2017-02-11 03:36:57', NULL, 3063, 49, 'aut odit deleniti culpa nihil', 161747, 1, 161747, 'qH0kg9'),
(18367, '2017-02-11 03:36:57', NULL, 3063, 4, 'perspiciatis voluptatem officia autem fugiat', 199170, 5, 995850, 'gZnLym'),
(18368, '2017-02-11 03:36:57', NULL, 3063, 5, 'rem animi voluptas maiores sit', 224279, 5, 1121395, 'PBGtnM'),
(18369, '2016-12-28 13:39:03', NULL, 3064, 46, 'aliquam exercitationem qui veritatis esse', 219483, 4, 877932, 'iHpztb'),
(18370, '2016-12-28 13:39:03', NULL, 3064, 22, 'mollitia molestias magni consequuntur ea', 226634, 3, 679902, 'yEHLdn'),
(18371, '2016-12-28 13:39:03', NULL, 3064, 25, 'vitae a aperiam cupiditate consequatur', 227737, 2, 455474, 'Ol5iNk'),
(18372, '2016-12-28 13:39:03', NULL, 3064, 18, 'maxime voluptas ut nam blanditiis', 215392, 2, 430784, 'z8HjN7'),
(18373, '2016-12-28 13:39:03', NULL, 3064, 49, 'aut odit deleniti culpa nihil', 161747, 5, 808735, 'qH0kg9'),
(18374, '2016-12-28 13:39:03', NULL, 3064, 11, 'reiciendis autem recusandae illo minima', 149691, 3, 449073, 'Y1ejWZ'),
(18375, '2017-03-17 02:23:27', NULL, 3065, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 5, 903570, 'hjpebZ'),
(18376, '2017-03-17 02:23:27', NULL, 3065, 26, 'omnis optio ipsa quis rem', 154155, 5, 770775, 'ez1zBW'),
(18377, '2017-03-17 02:23:27', NULL, 3065, 35, 'quas quae esse impedit nobis', 171307, 1, 171307, 'ir6mMb'),
(18378, '2017-03-17 02:23:27', NULL, 3065, 33, 'tempora officiis rem ut iste', 162542, 4, 650168, 'In23sv'),
(18379, '2017-03-17 02:23:27', NULL, 3065, 29, 'deleniti ullam iste esse sit', 148451, 2, 296902, 'bHk0tj'),
(18380, '2017-03-17 02:23:27', NULL, 3065, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 3, 510696, '6Gd9hR'),
(18381, '2017-02-09 06:39:54', NULL, 3066, 30, 'quod quos recusandae nostrum quod', 161777, 4, 647108, 'gLGUR3'),
(18382, '2017-02-09 06:39:54', NULL, 3066, 31, 'id quae consequatur excepturi in', 171335, 4, 685340, '1kfUHc'),
(18383, '2017-02-09 06:39:54', NULL, 3066, 13, 'repudiandae illo consectetur sed accusantium', 185501, 4, 742004, 'DxZMK8'),
(18384, '2017-02-09 06:39:54', NULL, 3066, 1, 'et nihil enim qui nisi', 219735, 4, 878940, 'rWAZhB'),
(18385, '2017-02-09 06:39:54', NULL, 3066, 19, 'rerum quo expedita asperiores cupiditate', 158017, 2, 316034, 'aDnuIu'),
(18386, '2017-02-09 06:39:54', NULL, 3066, 30, 'quod quos recusandae nostrum quod', 161777, 2, 323554, 'gLGUR3'),
(18387, '2016-12-23 06:10:16', NULL, 3067, 41, 'assumenda sint dolor autem magni', 108481, 5, 542405, 'SmJFV5'),
(18388, '2016-12-23 06:10:16', NULL, 3067, 23, 'rem nostrum harum qui at', 164925, 2, 329850, 'WweeDD'),
(18389, '2016-12-23 06:10:16', NULL, 3067, 17, 'magnam minus officiis fugiat quo', 132585, 4, 530340, 'juUFHD'),
(18390, '2016-12-23 06:10:16', NULL, 3067, 39, 'rerum ad aut omnis et', 247121, 4, 988484, 'gjTVAj'),
(18391, '2016-12-23 06:10:16', NULL, 3067, 22, 'mollitia molestias magni consequuntur ea', 226634, 1, 226634, 'yEHLdn'),
(18392, '2016-12-23 06:10:16', NULL, 3067, 8, 'doloremque odit ea aperiam iusto', 116404, 3, 349212, 'yd4Hpv'),
(18393, '2017-03-15 05:11:35', NULL, 3068, 19, 'rerum quo expedita asperiores cupiditate', 158017, 5, 790085, 'aDnuIu'),
(18394, '2017-03-15 05:11:35', NULL, 3068, 49, 'aut odit deleniti culpa nihil', 161747, 4, 646988, 'qH0kg9'),
(18395, '2017-03-15 05:11:35', NULL, 3068, 9, 'id soluta omnis ut voluptatem', 221416, 4, 885664, 'iupnkY'),
(18396, '2017-03-15 05:11:35', NULL, 3068, 4, 'perspiciatis voluptatem officia autem fugiat', 199170, 4, 796680, 'gZnLym'),
(18397, '2017-03-15 05:11:35', NULL, 3068, 24, 'et asperiores repellat officia aut', 237611, 4, 950444, 'aNNS9O'),
(18398, '2017-03-15 05:11:35', NULL, 3068, 24, 'et asperiores repellat officia aut', 237611, 2, 475222, 'aNNS9O'),
(18399, '2016-12-24 16:44:03', NULL, 3069, 12, 'in ipsum voluptas delectus vero', 114861, 4, 459444, 'v4VWZQ'),
(18400, '2016-12-24 16:44:03', NULL, 3069, 19, 'rerum quo expedita asperiores cupiditate', 158017, 5, 790085, 'aDnuIu'),
(18401, '2016-12-24 16:44:03', NULL, 3069, 8, 'doloremque odit ea aperiam iusto', 116404, 4, 465616, 'yd4Hpv'),
(18402, '2016-12-24 16:44:03', NULL, 3069, 38, 'explicabo vel id eligendi aliquam', 182115, 3, 546345, 'wi7fmR'),
(18403, '2016-12-24 16:44:03', NULL, 3069, 18, 'maxime voluptas ut nam blanditiis', 215392, 5, 1076960, 'z8HjN7'),
(18404, '2016-12-24 16:44:03', NULL, 3069, 47, 'molestias necessitatibus id soluta pariatur', 228603, 4, 914412, 'QWFPMb'),
(18405, '2017-01-22 04:09:31', NULL, 3070, 20, 'non tempore tempore aspernatur at', 178369, 5, 891845, 'Y3AXUF'),
(18406, '2017-01-22 04:09:31', NULL, 3070, 3, 'suscipit et ipsa praesentium et', 119089, 2, 238178, 'igmoFK'),
(18407, '2017-01-22 04:09:31', NULL, 3070, 49, 'aut odit deleniti culpa nihil', 161747, 2, 323494, 'qH0kg9'),
(18408, '2017-01-22 04:09:31', NULL, 3070, 33, 'tempora officiis rem ut iste', 162542, 2, 325084, 'In23sv'),
(18409, '2017-01-22 04:09:31', NULL, 3070, 33, 'tempora officiis rem ut iste', 162542, 2, 325084, 'In23sv'),
(18410, '2017-01-22 04:09:31', NULL, 3070, 10, 'repellendus enim quam incidunt laudantium', 146512, 2, 293024, 'n9nnq5'),
(18411, '2017-01-21 05:27:28', NULL, 3071, 10, 'repellendus enim quam incidunt laudantium', 146512, 2, 293024, 'n9nnq5'),
(18412, '2017-01-21 05:27:28', NULL, 3071, 30, 'quod quos recusandae nostrum quod', 161777, 5, 808885, 'gLGUR3'),
(18413, '2017-01-21 05:27:28', NULL, 3071, 35, 'quas quae esse impedit nobis', 171307, 4, 685228, 'ir6mMb'),
(18414, '2017-01-21 05:27:28', NULL, 3071, 32, 'fugit dolor libero dolor doloribus', 142880, 5, 714400, 'l2K5LE'),
(18415, '2017-01-21 05:27:28', NULL, 3071, 17, 'magnam minus officiis fugiat quo', 132585, 2, 265170, 'juUFHD'),
(18416, '2017-01-21 05:27:28', NULL, 3071, 20, 'non tempore tempore aspernatur at', 178369, 1, 178369, 'Y3AXUF'),
(18417, '2017-02-18 08:31:03', NULL, 3072, 17, 'magnam minus officiis fugiat quo', 132585, 3, 397755, 'juUFHD'),
(18418, '2017-02-18 08:31:03', NULL, 3072, 10, 'repellendus enim quam incidunt laudantium', 146512, 2, 293024, 'n9nnq5'),
(18419, '2017-02-18 08:31:03', NULL, 3072, 5, 'rem animi voluptas maiores sit', 224279, 2, 448558, 'PBGtnM'),
(18420, '2017-02-18 08:31:03', NULL, 3072, 5, 'rem animi voluptas maiores sit', 224279, 3, 672837, 'PBGtnM'),
(18421, '2017-02-18 08:31:03', NULL, 3072, 26, 'omnis optio ipsa quis rem', 154155, 1, 154155, 'ez1zBW'),
(18422, '2017-02-18 08:31:03', NULL, 3072, 31, 'id quae consequatur excepturi in', 171335, 3, 514005, '1kfUHc'),
(18423, '2017-02-22 01:25:49', NULL, 3073, 26, 'omnis optio ipsa quis rem', 154155, 2, 308310, 'ez1zBW'),
(18424, '2017-02-22 01:25:49', NULL, 3073, 21, 'ipsam praesentium aut commodi cumque', 190211, 5, 951055, 'amdEeb'),
(18425, '2017-02-22 01:25:49', NULL, 3073, 17, 'magnam minus officiis fugiat quo', 132585, 3, 397755, 'juUFHD'),
(18426, '2017-02-22 01:25:49', NULL, 3073, 21, 'ipsam praesentium aut commodi cumque', 190211, 3, 570633, 'amdEeb'),
(18427, '2017-02-22 01:25:49', NULL, 3073, 14, 'aperiam minus qui optio dolor', 221923, 3, 665769, 'LjdK1j'),
(18428, '2017-02-22 01:25:49', NULL, 3073, 39, 'rerum ad aut omnis et', 247121, 1, 247121, 'gjTVAj'),
(18429, '2016-12-27 10:07:30', NULL, 3074, 13, 'repudiandae illo consectetur sed accusantium', 185501, 5, 927505, 'DxZMK8'),
(18430, '2016-12-27 10:07:30', NULL, 3074, 29, 'deleniti ullam iste esse sit', 148451, 3, 445353, 'bHk0tj'),
(18431, '2016-12-27 10:07:30', NULL, 3074, 24, 'et asperiores repellat officia aut', 237611, 5, 1188055, 'aNNS9O'),
(18432, '2016-12-27 10:07:30', NULL, 3074, 42, 'voluptate deserunt explicabo fugit sequi', 225890, 2, 451780, 'UpyIVs'),
(18433, '2016-12-27 10:07:30', NULL, 3074, 26, 'omnis optio ipsa quis rem', 154155, 1, 154155, 'ez1zBW'),
(18434, '2016-12-27 10:07:30', NULL, 3074, 48, 'temporibus qui distinctio minus dolor', 227378, 3, 682134, 'iCESeT'),
(18435, '2017-02-22 11:08:50', NULL, 3075, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 1, 180714, 'hjpebZ'),
(18436, '2017-02-22 11:08:50', NULL, 3075, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 2, 340464, '6Gd9hR'),
(18437, '2017-02-22 11:08:50', NULL, 3075, 43, 'ea quaerat pariatur magnam repellat', 129615, 2, 259230, 'K6g9uC'),
(18438, '2017-02-22 11:08:50', NULL, 3075, 35, 'quas quae esse impedit nobis', 171307, 1, 171307, 'ir6mMb'),
(18439, '2017-02-22 11:08:50', NULL, 3075, 26, 'omnis optio ipsa quis rem', 154155, 2, 308310, 'ez1zBW'),
(18440, '2017-02-22 11:08:50', NULL, 3075, 16, 'rem voluptatem ea ut numquam', 143001, 2, 286002, '4VUNyz'),
(18441, '2017-01-23 17:36:18', NULL, 3076, 38, 'explicabo vel id eligendi aliquam', 182115, 2, 364230, 'wi7fmR'),
(18442, '2017-01-23 17:36:18', NULL, 3076, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 4, 722856, 'hjpebZ'),
(18443, '2017-01-23 17:36:18', NULL, 3076, 43, 'ea quaerat pariatur magnam repellat', 129615, 4, 518460, 'K6g9uC'),
(18444, '2017-01-23 17:36:18', NULL, 3076, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 5, 851160, '6Gd9hR'),
(18445, '2017-01-23 17:36:18', NULL, 3076, 23, 'rem nostrum harum qui at', 164925, 3, 494775, 'WweeDD'),
(18446, '2017-01-23 17:36:18', NULL, 3076, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 2, 340464, '6Gd9hR'),
(18447, '2017-03-09 12:25:11', NULL, 3077, 8, 'doloremque odit ea aperiam iusto', 116404, 1, 116404, 'yd4Hpv'),
(18448, '2017-03-09 12:25:11', NULL, 3077, 15, 'tenetur et iusto ut aut', 179473, 1, 179473, 'WQMJTM'),
(18449, '2017-03-09 12:25:11', NULL, 3077, 8, 'doloremque odit ea aperiam iusto', 116404, 4, 465616, 'yd4Hpv'),
(18450, '2017-03-09 12:25:11', NULL, 3077, 40, 'repudiandae ea ut odit amet', 176932, 3, 530796, '1y2pvt'),
(18451, '2017-03-09 12:25:11', NULL, 3077, 49, 'aut odit deleniti culpa nihil', 161747, 2, 323494, 'qH0kg9'),
(18452, '2017-03-09 12:25:11', NULL, 3077, 13, 'repudiandae illo consectetur sed accusantium', 185501, 1, 185501, 'DxZMK8'),
(18453, '2017-02-09 01:31:34', NULL, 3078, 23, 'rem nostrum harum qui at', 164925, 4, 659700, 'WweeDD'),
(18454, '2017-02-09 01:31:34', NULL, 3078, 45, 'facilis excepturi qui debitis rerum', 133154, 1, 133154, 'J3gIXY'),
(18455, '2017-02-09 01:31:34', NULL, 3078, 33, 'tempora officiis rem ut iste', 162542, 5, 812710, 'In23sv'),
(18456, '2017-02-09 01:31:34', NULL, 3078, 17, 'magnam minus officiis fugiat quo', 132585, 2, 265170, 'juUFHD'),
(18457, '2017-02-09 01:31:34', NULL, 3078, 27, 'natus voluptas est eos error', 182208, 4, 728832, 'Xabi3Q'),
(18458, '2017-02-09 01:31:34', NULL, 3078, 38, 'explicabo vel id eligendi aliquam', 182115, 4, 728460, 'wi7fmR'),
(18459, '2017-02-06 21:26:45', NULL, 3079, 13, 'repudiandae illo consectetur sed accusantium', 185501, 2, 371002, 'DxZMK8'),
(18460, '2017-02-06 21:26:45', NULL, 3079, 50, 'ab rerum molestiae eum provident', 150247, 4, 600988, 'uHqoE7'),
(18461, '2017-02-06 21:26:45', NULL, 3079, 9, 'id soluta omnis ut voluptatem', 221416, 4, 885664, 'iupnkY'),
(18462, '2017-02-06 21:26:45', NULL, 3079, 33, 'tempora officiis rem ut iste', 162542, 2, 325084, 'In23sv'),
(18463, '2017-02-06 21:26:45', NULL, 3079, 3, 'suscipit et ipsa praesentium et', 119089, 4, 476356, 'igmoFK'),
(18464, '2017-02-06 21:26:45', NULL, 3079, 47, 'molestias necessitatibus id soluta pariatur', 228603, 5, 1143015, 'QWFPMb');
INSERT INTO `orders_detail` (`id`, `created_at`, `updated_at`, `orders_id`, `products_id`, `products_name`, `products_price`, `quantity`, `sub_total`, `products_sku`) VALUES
(18465, '2017-02-06 00:50:52', NULL, 3080, 1, 'et nihil enim qui nisi', 219735, 1, 219735, 'rWAZhB'),
(18466, '2017-02-06 00:50:52', NULL, 3080, 10, 'repellendus enim quam incidunt laudantium', 146512, 4, 586048, 'n9nnq5'),
(18467, '2017-02-06 00:50:52', NULL, 3080, 2, 'illum dignissimos provident aut aut', 132708, 5, 663540, 'xOo2ol'),
(18468, '2017-02-06 00:50:52', NULL, 3080, 29, 'deleniti ullam iste esse sit', 148451, 1, 148451, 'bHk0tj'),
(18469, '2017-02-06 00:50:52', NULL, 3080, 9, 'id soluta omnis ut voluptatem', 221416, 3, 664248, 'iupnkY'),
(18470, '2017-02-06 00:50:52', NULL, 3080, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 1, 180714, 'hjpebZ'),
(18471, '2017-02-03 12:48:39', NULL, 3081, 1, 'et nihil enim qui nisi', 219735, 4, 878940, 'rWAZhB'),
(18472, '2017-02-03 12:48:39', NULL, 3081, 9, 'id soluta omnis ut voluptatem', 221416, 4, 885664, 'iupnkY'),
(18473, '2017-02-03 12:48:39', NULL, 3081, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 4, 722856, 'hjpebZ'),
(18474, '2017-02-03 12:48:39', NULL, 3081, 16, 'rem voluptatem ea ut numquam', 143001, 1, 143001, '4VUNyz'),
(18475, '2017-02-03 12:48:39', NULL, 3081, 43, 'ea quaerat pariatur magnam repellat', 129615, 2, 259230, 'K6g9uC'),
(18476, '2017-02-03 12:48:39', NULL, 3081, 11, 'reiciendis autem recusandae illo minima', 149691, 4, 598764, 'Y1ejWZ'),
(18477, '2017-01-06 04:51:37', NULL, 3082, 24, 'et asperiores repellat officia aut', 237611, 4, 950444, 'aNNS9O'),
(18478, '2017-01-06 04:51:37', NULL, 3082, 18, 'maxime voluptas ut nam blanditiis', 215392, 2, 430784, 'z8HjN7'),
(18479, '2017-01-06 04:51:37', NULL, 3082, 1, 'et nihil enim qui nisi', 219735, 5, 1098675, 'rWAZhB'),
(18480, '2017-01-06 04:51:37', NULL, 3082, 7, 'aut velit et rerum placeat', 103443, 1, 103443, '5xPVlu'),
(18481, '2017-01-06 04:51:37', NULL, 3082, 1, 'et nihil enim qui nisi', 219735, 5, 1098675, 'rWAZhB'),
(18482, '2017-01-06 04:51:37', NULL, 3082, 44, 'odio aliquid ipsam velit asperiores', 227526, 5, 1137630, 'WEVpaj'),
(18483, '2017-02-09 05:14:24', NULL, 3083, 50, 'ab rerum molestiae eum provident', 150247, 1, 150247, 'uHqoE7'),
(18484, '2017-02-09 05:14:24', NULL, 3083, 14, 'aperiam minus qui optio dolor', 221923, 3, 665769, 'LjdK1j'),
(18485, '2017-02-09 05:14:24', NULL, 3083, 26, 'omnis optio ipsa quis rem', 154155, 2, 308310, 'ez1zBW'),
(18486, '2017-02-09 05:14:24', NULL, 3083, 8, 'doloremque odit ea aperiam iusto', 116404, 5, 582020, 'yd4Hpv'),
(18487, '2017-02-09 05:14:24', NULL, 3083, 8, 'doloremque odit ea aperiam iusto', 116404, 4, 465616, 'yd4Hpv'),
(18488, '2017-02-09 05:14:24', NULL, 3083, 29, 'deleniti ullam iste esse sit', 148451, 3, 445353, 'bHk0tj'),
(18489, '2017-01-27 18:22:07', NULL, 3084, 16, 'rem voluptatem ea ut numquam', 143001, 5, 715005, '4VUNyz'),
(18490, '2017-01-27 18:22:07', NULL, 3084, 9, 'id soluta omnis ut voluptatem', 221416, 3, 664248, 'iupnkY'),
(18491, '2017-01-27 18:22:07', NULL, 3084, 38, 'explicabo vel id eligendi aliquam', 182115, 1, 182115, 'wi7fmR'),
(18492, '2017-01-27 18:22:07', NULL, 3084, 14, 'aperiam minus qui optio dolor', 221923, 4, 887692, 'LjdK1j'),
(18493, '2017-01-27 18:22:07', NULL, 3084, 15, 'tenetur et iusto ut aut', 179473, 1, 179473, 'WQMJTM'),
(18494, '2017-01-27 18:22:07', NULL, 3084, 16, 'rem voluptatem ea ut numquam', 143001, 3, 429003, '4VUNyz'),
(18495, '2016-12-23 09:54:32', NULL, 3085, 9, 'id soluta omnis ut voluptatem', 221416, 3, 664248, 'iupnkY'),
(18496, '2016-12-23 09:54:32', NULL, 3085, 23, 'rem nostrum harum qui at', 164925, 2, 329850, 'WweeDD'),
(18497, '2016-12-23 09:54:32', NULL, 3085, 18, 'maxime voluptas ut nam blanditiis', 215392, 2, 430784, 'z8HjN7'),
(18498, '2016-12-23 09:54:32', NULL, 3085, 30, 'quod quos recusandae nostrum quod', 161777, 5, 808885, 'gLGUR3'),
(18499, '2016-12-23 09:54:32', NULL, 3085, 43, 'ea quaerat pariatur magnam repellat', 129615, 2, 259230, 'K6g9uC'),
(18500, '2016-12-23 09:54:32', NULL, 3085, 12, 'in ipsum voluptas delectus vero', 114861, 1, 114861, 'v4VWZQ'),
(18501, '2017-03-11 00:16:24', NULL, 3086, 17, 'magnam minus officiis fugiat quo', 132585, 1, 132585, 'juUFHD'),
(18502, '2017-03-11 00:16:24', NULL, 3086, 17, 'magnam minus officiis fugiat quo', 132585, 4, 530340, 'juUFHD'),
(18503, '2017-03-11 00:16:24', NULL, 3086, 45, 'facilis excepturi qui debitis rerum', 133154, 5, 665770, 'J3gIXY'),
(18504, '2017-03-11 00:16:24', NULL, 3086, 16, 'rem voluptatem ea ut numquam', 143001, 1, 143001, '4VUNyz'),
(18505, '2017-03-11 00:16:24', NULL, 3086, 21, 'ipsam praesentium aut commodi cumque', 190211, 4, 760844, 'amdEeb'),
(18506, '2017-03-11 00:16:24', NULL, 3086, 15, 'tenetur et iusto ut aut', 179473, 2, 358946, 'WQMJTM'),
(18507, '2017-03-10 08:14:12', NULL, 3087, 50, 'ab rerum molestiae eum provident', 150247, 1, 150247, 'uHqoE7'),
(18508, '2017-03-10 08:14:12', NULL, 3087, 27, 'natus voluptas est eos error', 182208, 2, 364416, 'Xabi3Q'),
(18509, '2017-03-10 08:14:12', NULL, 3087, 25, 'vitae a aperiam cupiditate consequatur', 227737, 2, 455474, 'Ol5iNk'),
(18510, '2017-03-10 08:14:12', NULL, 3087, 17, 'magnam minus officiis fugiat quo', 132585, 2, 265170, 'juUFHD'),
(18511, '2017-03-10 08:14:12', NULL, 3087, 36, 'exercitationem totam ipsum eum distinctio', 218276, 3, 654828, 'hS6jxk'),
(18512, '2017-03-10 08:14:12', NULL, 3087, 11, 'reiciendis autem recusandae illo minima', 149691, 4, 598764, 'Y1ejWZ'),
(18513, '2017-03-09 00:30:55', NULL, 3088, 14, 'aperiam minus qui optio dolor', 221923, 3, 665769, 'LjdK1j'),
(18514, '2017-03-09 00:30:55', NULL, 3088, 5, 'rem animi voluptas maiores sit', 224279, 2, 448558, 'PBGtnM'),
(18515, '2017-03-09 00:30:55', NULL, 3088, 21, 'ipsam praesentium aut commodi cumque', 190211, 3, 570633, 'amdEeb'),
(18516, '2017-03-09 00:30:55', NULL, 3088, 24, 'et asperiores repellat officia aut', 237611, 4, 950444, 'aNNS9O'),
(18517, '2017-03-09 00:30:55', NULL, 3088, 2, 'illum dignissimos provident aut aut', 132708, 4, 530832, 'xOo2ol'),
(18518, '2017-03-09 00:30:55', NULL, 3088, 31, 'id quae consequatur excepturi in', 171335, 1, 171335, '1kfUHc'),
(18519, '2017-03-05 06:40:59', NULL, 3089, 47, 'molestias necessitatibus id soluta pariatur', 228603, 1, 228603, 'QWFPMb'),
(18520, '2017-03-05 06:40:59', NULL, 3089, 13, 'repudiandae illo consectetur sed accusantium', 185501, 2, 371002, 'DxZMK8'),
(18521, '2017-03-05 06:40:59', NULL, 3089, 20, 'non tempore tempore aspernatur at', 178369, 4, 713476, 'Y3AXUF'),
(18522, '2017-03-05 06:40:59', NULL, 3089, 23, 'rem nostrum harum qui at', 164925, 1, 164925, 'WweeDD'),
(18523, '2017-03-05 06:40:59', NULL, 3089, 10, 'repellendus enim quam incidunt laudantium', 146512, 2, 293024, 'n9nnq5'),
(18524, '2017-03-05 06:40:59', NULL, 3089, 21, 'ipsam praesentium aut commodi cumque', 190211, 4, 760844, 'amdEeb'),
(18525, '2017-01-22 22:36:07', NULL, 3090, 50, 'ab rerum molestiae eum provident', 150247, 1, 150247, 'uHqoE7'),
(18526, '2017-01-22 22:36:07', NULL, 3090, 37, 'dolor ipsam assumenda omnis et', 125963, 3, 377889, 'KSa0qJ'),
(18527, '2017-01-22 22:36:07', NULL, 3090, 6, 'reiciendis id eos aut sapiente', 230615, 3, 691845, 'Dvxcb3'),
(18528, '2017-01-22 22:36:07', NULL, 3090, 24, 'et asperiores repellat officia aut', 237611, 4, 950444, 'aNNS9O'),
(18529, '2017-01-22 22:36:07', NULL, 3090, 50, 'ab rerum molestiae eum provident', 150247, 4, 600988, 'uHqoE7'),
(18530, '2017-01-22 22:36:07', NULL, 3090, 39, 'rerum ad aut omnis et', 247121, 1, 247121, 'gjTVAj'),
(18531, '2017-03-18 13:50:50', NULL, 3091, 22, 'mollitia molestias magni consequuntur ea', 226634, 4, 906536, 'yEHLdn'),
(18532, '2017-03-18 13:50:50', NULL, 3091, 43, 'ea quaerat pariatur magnam repellat', 129615, 2, 259230, 'K6g9uC'),
(18533, '2017-03-18 13:50:50', NULL, 3091, 35, 'quas quae esse impedit nobis', 171307, 1, 171307, 'ir6mMb'),
(18534, '2017-03-18 13:50:50', NULL, 3091, 45, 'facilis excepturi qui debitis rerum', 133154, 5, 665770, 'J3gIXY'),
(18535, '2017-03-18 13:50:50', NULL, 3091, 25, 'vitae a aperiam cupiditate consequatur', 227737, 5, 1138685, 'Ol5iNk'),
(18536, '2017-03-18 13:50:50', NULL, 3091, 49, 'aut odit deleniti culpa nihil', 161747, 1, 161747, 'qH0kg9'),
(18537, '2017-01-01 08:45:11', NULL, 3092, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 5, 851160, '6Gd9hR'),
(18538, '2017-01-01 08:45:11', NULL, 3092, 31, 'id quae consequatur excepturi in', 171335, 3, 514005, '1kfUHc'),
(18539, '2017-01-01 08:45:11', NULL, 3092, 21, 'ipsam praesentium aut commodi cumque', 190211, 5, 951055, 'amdEeb'),
(18540, '2017-01-01 08:45:11', NULL, 3092, 33, 'tempora officiis rem ut iste', 162542, 1, 162542, 'In23sv'),
(18541, '2017-01-01 08:45:11', NULL, 3092, 44, 'odio aliquid ipsam velit asperiores', 227526, 5, 1137630, 'WEVpaj'),
(18542, '2017-01-01 08:45:11', NULL, 3092, 13, 'repudiandae illo consectetur sed accusantium', 185501, 2, 371002, 'DxZMK8'),
(18543, '2017-03-18 11:13:03', NULL, 3093, 14, 'aperiam minus qui optio dolor', 221923, 3, 665769, 'LjdK1j'),
(18544, '2017-03-18 11:13:03', NULL, 3093, 33, 'tempora officiis rem ut iste', 162542, 1, 162542, 'In23sv'),
(18545, '2017-03-18 11:13:03', NULL, 3093, 1, 'et nihil enim qui nisi', 219735, 1, 219735, 'rWAZhB'),
(18546, '2017-03-18 11:13:03', NULL, 3093, 38, 'explicabo vel id eligendi aliquam', 182115, 5, 910575, 'wi7fmR'),
(18547, '2017-03-18 11:13:03', NULL, 3093, 41, 'assumenda sint dolor autem magni', 108481, 1, 108481, 'SmJFV5'),
(18548, '2017-03-18 11:13:03', NULL, 3093, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 3, 542142, 'hjpebZ'),
(18549, '2017-02-04 23:13:25', NULL, 3094, 43, 'ea quaerat pariatur magnam repellat', 129615, 3, 388845, 'K6g9uC'),
(18550, '2017-02-04 23:13:25', NULL, 3094, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 1, 170232, '6Gd9hR'),
(18551, '2017-02-04 23:13:25', NULL, 3094, 18, 'maxime voluptas ut nam blanditiis', 215392, 5, 1076960, 'z8HjN7'),
(18552, '2017-02-04 23:13:25', NULL, 3094, 7, 'aut velit et rerum placeat', 103443, 3, 310329, '5xPVlu'),
(18553, '2017-02-04 23:13:25', NULL, 3094, 27, 'natus voluptas est eos error', 182208, 3, 546624, 'Xabi3Q'),
(18554, '2017-02-04 23:13:25', NULL, 3094, 13, 'repudiandae illo consectetur sed accusantium', 185501, 4, 742004, 'DxZMK8'),
(18555, '2017-02-20 09:58:52', NULL, 3095, 30, 'quod quos recusandae nostrum quod', 161777, 3, 485331, 'gLGUR3'),
(18556, '2017-02-20 09:58:52', NULL, 3095, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 1, 170232, '6Gd9hR'),
(18557, '2017-02-20 09:58:52', NULL, 3095, 8, 'doloremque odit ea aperiam iusto', 116404, 2, 232808, 'yd4Hpv'),
(18558, '2017-02-20 09:58:52', NULL, 3095, 14, 'aperiam minus qui optio dolor', 221923, 4, 887692, 'LjdK1j'),
(18559, '2017-02-20 09:58:52', NULL, 3095, 36, 'exercitationem totam ipsum eum distinctio', 218276, 5, 1091380, 'hS6jxk'),
(18560, '2017-02-20 09:58:52', NULL, 3095, 34, 'quos voluptatibus itaque magni perspiciatis', 180714, 1, 180714, 'hjpebZ'),
(18561, '2017-02-26 21:43:44', NULL, 3096, 29, 'deleniti ullam iste esse sit', 148451, 3, 445353, 'bHk0tj'),
(18562, '2017-02-26 21:43:44', NULL, 3096, 46, 'aliquam exercitationem qui veritatis esse', 219483, 5, 1097415, 'iHpztb'),
(18563, '2017-02-26 21:43:44', NULL, 3096, 10, 'repellendus enim quam incidunt laudantium', 146512, 3, 439536, 'n9nnq5'),
(18564, '2017-02-26 21:43:44', NULL, 3096, 36, 'exercitationem totam ipsum eum distinctio', 218276, 3, 654828, 'hS6jxk'),
(18565, '2017-02-26 21:43:44', NULL, 3096, 17, 'magnam minus officiis fugiat quo', 132585, 5, 662925, 'juUFHD'),
(18566, '2017-02-26 21:43:44', NULL, 3096, 7, 'aut velit et rerum placeat', 103443, 5, 517215, '5xPVlu'),
(18567, '2017-03-07 21:03:01', NULL, 3097, 31, 'id quae consequatur excepturi in', 171335, 1, 171335, '1kfUHc'),
(18568, '2017-03-07 21:03:01', NULL, 3097, 13, 'repudiandae illo consectetur sed accusantium', 185501, 2, 371002, 'DxZMK8'),
(18569, '2017-03-07 21:03:01', NULL, 3097, 12, 'in ipsum voluptas delectus vero', 114861, 3, 344583, 'v4VWZQ'),
(18570, '2017-03-07 21:03:01', NULL, 3097, 46, 'aliquam exercitationem qui veritatis esse', 219483, 4, 877932, 'iHpztb'),
(18571, '2017-03-07 21:03:01', NULL, 3097, 32, 'fugit dolor libero dolor doloribus', 142880, 1, 142880, 'l2K5LE'),
(18572, '2017-03-07 21:03:01', NULL, 3097, 17, 'magnam minus officiis fugiat quo', 132585, 4, 530340, 'juUFHD'),
(18573, '2017-02-17 03:48:31', NULL, 3098, 13, 'repudiandae illo consectetur sed accusantium', 185501, 3, 556503, 'DxZMK8'),
(18574, '2017-02-17 03:48:31', NULL, 3098, 4, 'perspiciatis voluptatem officia autem fugiat', 199170, 1, 199170, 'gZnLym'),
(18575, '2017-02-17 03:48:31', NULL, 3098, 48, 'temporibus qui distinctio minus dolor', 227378, 1, 227378, 'iCESeT'),
(18576, '2017-02-17 03:48:31', NULL, 3098, 49, 'aut odit deleniti culpa nihil', 161747, 5, 808735, 'qH0kg9'),
(18577, '2017-02-17 03:48:31', NULL, 3098, 47, 'molestias necessitatibus id soluta pariatur', 228603, 2, 457206, 'QWFPMb'),
(18578, '2017-02-17 03:48:31', NULL, 3098, 22, 'mollitia molestias magni consequuntur ea', 226634, 3, 679902, 'yEHLdn'),
(18579, '2016-12-28 07:11:10', NULL, 3099, 49, 'aut odit deleniti culpa nihil', 161747, 1, 161747, 'qH0kg9'),
(18580, '2016-12-28 07:11:10', NULL, 3099, 8, 'doloremque odit ea aperiam iusto', 116404, 1, 116404, 'yd4Hpv'),
(18581, '2016-12-28 07:11:10', NULL, 3099, 33, 'tempora officiis rem ut iste', 162542, 4, 650168, 'In23sv'),
(18582, '2016-12-28 07:11:10', NULL, 3099, 11, 'reiciendis autem recusandae illo minima', 149691, 3, 449073, 'Y1ejWZ'),
(18583, '2016-12-28 07:11:10', NULL, 3099, 16, 'rem voluptatem ea ut numquam', 143001, 4, 572004, '4VUNyz'),
(18584, '2016-12-28 07:11:10', NULL, 3099, 25, 'vitae a aperiam cupiditate consequatur', 227737, 1, 227737, 'Ol5iNk'),
(18585, '2017-01-02 06:01:00', NULL, 3100, 7, 'aut velit et rerum placeat', 103443, 2, 206886, '5xPVlu'),
(18586, '2017-01-02 06:01:00', NULL, 3100, 13, 'repudiandae illo consectetur sed accusantium', 185501, 1, 185501, 'DxZMK8'),
(18587, '2017-01-02 06:01:00', NULL, 3100, 48, 'temporibus qui distinctio minus dolor', 227378, 4, 909512, 'iCESeT'),
(18588, '2017-01-02 06:01:00', NULL, 3100, 15, 'tenetur et iusto ut aut', 179473, 2, 358946, 'WQMJTM'),
(18589, '2017-01-02 06:01:00', NULL, 3100, 46, 'aliquam exercitationem qui veritatis esse', 219483, 2, 438966, 'iHpztb'),
(18590, '2017-01-02 06:01:00', NULL, 3100, 13, 'repudiandae illo consectetur sed accusantium', 185501, 3, 556503, 'DxZMK8'),
(18591, '2016-12-28 15:08:00', NULL, 3101, 31, 'id quae consequatur excepturi in', 171335, 1, 171335, '1kfUHc'),
(18592, '2016-12-28 15:08:00', NULL, 3101, 16, 'rem voluptatem ea ut numquam', 143001, 5, 715005, '4VUNyz'),
(18593, '2016-12-28 15:08:00', NULL, 3101, 42, 'voluptate deserunt explicabo fugit sequi', 225890, 1, 225890, 'UpyIVs'),
(18594, '2016-12-28 15:08:00', NULL, 3101, 3, 'suscipit et ipsa praesentium et', 119089, 1, 119089, 'igmoFK'),
(18595, '2016-12-28 15:08:00', NULL, 3101, 16, 'rem voluptatem ea ut numquam', 143001, 2, 286002, '4VUNyz'),
(18596, '2016-12-28 15:08:00', NULL, 3101, 40, 'repudiandae ea ut odit amet', 176932, 1, 176932, '1y2pvt'),
(18597, '2017-03-07 04:05:54', NULL, 3102, 30, 'quod quos recusandae nostrum quod', 161777, 3, 485331, 'gLGUR3'),
(18598, '2017-03-07 04:05:54', NULL, 3102, 9, 'id soluta omnis ut voluptatem', 221416, 3, 664248, 'iupnkY'),
(18599, '2017-03-07 04:05:54', NULL, 3102, 1, 'et nihil enim qui nisi', 219735, 5, 1098675, 'rWAZhB'),
(18600, '2017-03-07 04:05:54', NULL, 3102, 28, 'minima voluptatem nesciunt minima perferendis', 170232, 4, 680928, '6Gd9hR'),
(18601, '2017-03-07 04:05:54', NULL, 3102, 10, 'repellendus enim quam incidunt laudantium', 146512, 3, 439536, 'n9nnq5'),
(18602, '2017-03-07 04:05:54', NULL, 3102, 49, 'aut odit deleniti culpa nihil', 161747, 4, 646988, 'qH0kg9'),
(18603, '2016-12-28 03:47:50', NULL, 3103, 26, 'omnis optio ipsa quis rem', 154155, 5, 770775, 'ez1zBW'),
(18604, '2016-12-28 03:47:50', NULL, 3103, 35, 'quas quae esse impedit nobis', 171307, 2, 342614, 'ir6mMb'),
(18605, '2016-12-28 03:47:50', NULL, 3103, 25, 'vitae a aperiam cupiditate consequatur', 227737, 5, 1138685, 'Ol5iNk'),
(18606, '2016-12-28 03:47:50', NULL, 3103, 21, 'ipsam praesentium aut commodi cumque', 190211, 3, 570633, 'amdEeb'),
(18607, '2016-12-28 03:47:50', NULL, 3103, 47, 'molestias necessitatibus id soluta pariatur', 228603, 4, 914412, 'QWFPMb'),
(18608, '2016-12-28 03:47:50', NULL, 3103, 43, 'ea quaerat pariatur magnam repellat', 129615, 1, 129615, 'K6g9uC'),
(18609, '2017-01-28 20:57:16', NULL, 3104, 10, 'repellendus enim quam incidunt laudantium', 146512, 4, 586048, 'n9nnq5'),
(18610, '2017-01-28 20:57:16', NULL, 3104, 13, 'repudiandae illo consectetur sed accusantium', 185501, 5, 927505, 'DxZMK8'),
(18611, '2017-01-28 20:57:16', NULL, 3104, 33, 'tempora officiis rem ut iste', 162542, 4, 650168, 'In23sv'),
(18612, '2017-01-28 20:57:16', NULL, 3104, 41, 'assumenda sint dolor autem magni', 108481, 2, 216962, 'SmJFV5'),
(18613, '2017-01-28 20:57:16', NULL, 3104, 46, 'aliquam exercitationem qui veritatis esse', 219483, 2, 438966, 'iHpztb'),
(18614, '2017-01-28 20:57:16', NULL, 3104, 35, 'quas quae esse impedit nobis', 171307, 2, 342614, 'ir6mMb'),
(18615, '2017-02-23 16:58:48', NULL, 3105, 7, 'aut velit et rerum placeat', 103443, 2, 206886, '5xPVlu'),
(18616, '2017-02-23 16:58:48', NULL, 3105, 16, 'rem voluptatem ea ut numquam', 143001, 5, 715005, '4VUNyz'),
(18617, '2017-02-23 16:58:48', NULL, 3105, 43, 'ea quaerat pariatur magnam repellat', 129615, 2, 259230, 'K6g9uC'),
(18618, '2017-02-23 16:58:48', NULL, 3105, 25, 'vitae a aperiam cupiditate consequatur', 227737, 2, 455474, 'Ol5iNk'),
(18619, '2017-02-23 16:58:48', NULL, 3105, 30, 'quod quos recusandae nostrum quod', 161777, 3, 485331, 'gLGUR3'),
(18620, '2017-02-23 16:58:48', NULL, 3105, 48, 'temporibus qui distinctio minus dolor', 227378, 4, 909512, 'iCESeT'),
(18621, '2017-01-08 18:39:00', NULL, 3106, 19, 'rerum quo expedita asperiores cupiditate', 158017, 1, 158017, 'aDnuIu'),
(18622, '2017-01-08 18:39:00', NULL, 3106, 42, 'voluptate deserunt explicabo fugit sequi', 225890, 2, 451780, 'UpyIVs'),
(18623, '2017-01-08 18:39:00', NULL, 3106, 13, 'repudiandae illo consectetur sed accusantium', 185501, 1, 185501, 'DxZMK8'),
(18624, '2017-01-08 18:39:00', NULL, 3106, 12, 'in ipsum voluptas delectus vero', 114861, 3, 344583, 'v4VWZQ'),
(18625, '2017-01-08 18:39:00', NULL, 3106, 18, 'maxime voluptas ut nam blanditiis', 215392, 1, 215392, 'z8HjN7'),
(18626, '2017-01-08 18:39:00', NULL, 3106, 49, 'aut odit deleniti culpa nihil', 161747, 5, 808735, 'qH0kg9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `suppliers_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `weight` double NOT NULL DEFAULT '0',
  `buy_price` double NOT NULL,
  `sell_price` double NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `brands_id` int(11) DEFAULT NULL,
  `sku` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `deleted_at`, `categories_id`, `suppliers_id`, `name`, `description`, `weight`, `buy_price`, `sell_price`, `stock`, `brands_id`, `sku`) VALUES
(1, '2017-03-19 14:24:55', NULL, NULL, 632, 624, 'et nihil enim qui nisi', 'Odio fugit id et quibusdam corrupti consectetur qui. Vel voluptatem consequatur earum aspernatur incidunt quibusdam nihil. Animi qui sequi dolorem at molestiae. Nam quibusdam inventore et in labore.', 1918, 128960, 219735, 16, 647, 'rWAZhB'),
(2, '2017-03-19 14:24:55', NULL, NULL, 620, 638, 'illum dignissimos provident aut aut', 'Corrupti et laboriosam quas ut. Dolore eum repudiandae sunt. Soluta inventore voluptatem exercitationem. Vero consequatur consequatur officia libero facilis vero qui. Ut et necessitatibus dolorum fugiat aut.', 1406, 164795, 132708, 65, 641, 'xOo2ol'),
(3, '2017-03-19 14:24:55', NULL, NULL, 651, 624, 'suscipit et ipsa praesentium et', 'Consequuntur qui ut laudantium. Dolor non necessitatibus voluptatem animi repudiandae molestiae. Et assumenda deleniti aut omnis occaecati doloremque.', 1938, 247025, 119089, 8, 619, 'igmoFK'),
(4, '2017-03-19 14:24:55', NULL, NULL, 639, 623, 'perspiciatis voluptatem officia autem fugiat', 'Et eius officiis omnis eligendi voluptas autem. Voluptatem aperiam error illo ut corporis voluptas. Dolores similique soluta quaerat. Quas voluptatibus autem molestiae perferendis. Temporibus non aut quia temporibus consequatur rerum.', 627, 103334, 199170, 26, 648, 'gZnLym'),
(5, '2017-03-19 14:24:55', NULL, NULL, 622, 602, 'rem animi voluptas maiores sit', 'Et facere qui voluptatem. Dolores aliquam est esse voluptate debitis et. Veritatis quia officiis sit sapiente nobis voluptatem nihil. Quidem dicta quaerat eum dolores expedita asperiores.', 1207, 183511, 224279, 27, 607, 'PBGtnM'),
(6, '2017-03-19 14:24:55', NULL, NULL, 616, 641, 'reiciendis id eos aut sapiente', 'Iste mollitia nulla ullam aut autem quos. Quia nihil perspiciatis ipsum. Quaerat eligendi molestiae sed tempore unde.', 827, 236508, 230615, 98, 635, 'Dvxcb3'),
(7, '2017-03-19 14:24:55', NULL, NULL, 627, 630, 'aut velit et rerum placeat', 'Iusto quam quisquam sit ut. Quia voluptatem optio voluptatem sint et soluta aut. Dicta dolores sed est ad quo qui est officiis. Est optio voluptatum rerum dolores.', 858, 131624, 103443, 31, 631, '5xPVlu'),
(8, '2017-03-19 14:24:55', NULL, NULL, 625, 604, 'doloremque odit ea aperiam iusto', 'Corrupti quidem impedit consequatur cum placeat cumque. Quia nobis perferendis dolorem harum dolorum quo. Aut dolores eos voluptas voluptates nostrum architecto beatae.', 1256, 201609, 116404, 55, 651, 'yd4Hpv'),
(9, '2017-03-19 14:24:55', NULL, NULL, 644, 624, 'id soluta omnis ut voluptatem', 'Qui et sit cumque voluptatem eos omnis doloribus aut. Tempore accusantium consequatur blanditiis aut. Molestiae qui et accusantium quia qui cupiditate quo.', 1074, 132763, 221416, 68, 629, 'iupnkY'),
(10, '2017-03-19 14:24:55', NULL, NULL, 633, 607, 'repellendus enim quam incidunt laudantium', 'Quaerat voluptates laborum velit sunt sequi quisquam illo. Tenetur veniam enim repudiandae minima eveniet. Veritatis pariatur ab iusto earum corrupti cum repudiandae. Possimus nostrum quis sit sunt laboriosam ut. Est odit sunt ut eveniet maxime et et.', 680, 147532, 146512, 14, 611, 'n9nnq5'),
(11, '2017-03-19 14:24:55', NULL, NULL, 651, 604, 'reiciendis autem recusandae illo minima', 'Perspiciatis cumque ad vel rerum molestiae. Possimus repudiandae laborum sit expedita sit distinctio. Ex illo sit error impedit. Et soluta ut quia delectus.', 973, 136164, 149691, 34, 622, 'Y1ejWZ'),
(12, '2017-03-19 14:24:55', NULL, NULL, 650, 603, 'in ipsum voluptas delectus vero', 'Aliquam sit vero enim. Rerum vel et voluptatem. A aut deserunt qui.', 1898, 204110, 114861, 44, 619, 'v4VWZQ'),
(13, '2017-03-19 14:24:55', NULL, NULL, 644, 636, 'repudiandae illo consectetur sed accusantium', 'Impedit non officia quae et nihil voluptas. Sit et et iusto incidunt. Beatae voluptate dolore porro. Sed libero repellat et. Incidunt cum in officia qui quia ut aliquid.', 669, 108133, 185501, 90, 620, 'DxZMK8'),
(14, '2017-03-19 14:24:55', NULL, NULL, 642, 604, 'aperiam minus qui optio dolor', 'Nulla ipsa sed distinctio et. Nemo ipsa aut molestiae cum corporis. Quam corrupti ut dolorem aut et impedit neque. Iste qui ullam incidunt debitis voluptatem.', 1400, 197442, 221923, 78, 611, 'LjdK1j'),
(15, '2017-03-19 14:24:55', NULL, NULL, 630, 650, 'tenetur et iusto ut aut', 'Sit odit tempora aut et minus sunt natus. Omnis porro quis doloribus autem quia adipisci non et. Minus quod maiores eligendi reiciendis nulla voluptas.', 1682, 122138, 179473, 44, 603, 'WQMJTM'),
(16, '2017-03-19 14:24:55', NULL, NULL, 642, 643, 'rem voluptatem ea ut numquam', 'Aut voluptas repellendus ex omnis. Aut dolor libero dicta et. Nobis quos natus eligendi est laudantium consequuntur voluptatibus natus. Esse consequatur sit a veniam voluptatibus repudiandae distinctio consequatur.', 637, 127808, 143001, 93, 641, '4VUNyz'),
(17, '2017-03-19 14:24:55', NULL, NULL, 630, 607, 'magnam minus officiis fugiat quo', 'Ut vero sint eum autem. Porro et amet aut perspiciatis. Repellendus animi est recusandae veritatis sed explicabo eum. Omnis iure ipsa culpa.', 1935, 241172, 132585, 48, 615, 'juUFHD'),
(18, '2017-03-19 14:24:55', NULL, NULL, 631, 645, 'maxime voluptas ut nam blanditiis', 'Consequatur quia aut quia dolorem consequatur quis voluptatem. Sit laboriosam accusantium quisquam qui ab magni. Quasi aliquid dolores in.', 1355, 235022, 215392, 85, 643, 'z8HjN7'),
(19, '2017-03-19 14:24:55', NULL, NULL, 613, 628, 'rerum quo expedita asperiores cupiditate', 'Ratione officiis nam voluptas aut tenetur rerum optio. Minima excepturi nemo sunt earum alias quibusdam qui voluptatem. Reiciendis dolorem nihil non pariatur quaerat iure. Voluptas quam ab et doloribus odit necessitatibus.', 1621, 223286, 158017, 51, 641, 'aDnuIu'),
(20, '2017-03-19 14:24:56', NULL, NULL, 630, 612, 'non tempore tempore aspernatur at', 'Adipisci qui incidunt iste sunt eaque quibusdam unde. Corrupti illo et ut est esse molestiae. Neque modi qui sint voluptatem totam. Fugiat natus est ipsa.', 837, 145286, 178369, 96, 640, 'Y3AXUF'),
(21, '2017-03-19 14:24:56', NULL, NULL, 611, 629, 'ipsam praesentium aut commodi cumque', 'Tempore doloremque voluptates exercitationem placeat minus et quia quis. Est et nostrum labore voluptatem repudiandae. Soluta doloremque non ex facilis perferendis.', 1498, 118543, 190211, 78, 625, 'amdEeb'),
(22, '2017-03-19 14:24:56', NULL, NULL, 645, 622, 'mollitia molestias magni consequuntur ea', 'Molestias laboriosam sint aspernatur blanditiis omnis corporis vitae nobis. Modi cupiditate velit maxime doloremque laudantium.', 603, 156831, 226634, 37, 629, 'yEHLdn'),
(23, '2017-03-19 14:24:56', NULL, NULL, 622, 639, 'rem nostrum harum qui at', 'Ipsa est corrupti eos deleniti consequatur non earum. Et sequi voluptatibus est iste qui dolores sed. Itaque dolore eveniet explicabo voluptas facere. Error molestias consequatur facere accusantium animi repellendus dolor.', 1571, 241546, 164925, 75, 621, 'WweeDD'),
(24, '2017-03-19 14:24:56', NULL, NULL, 613, 603, 'et asperiores repellat officia aut', 'Nihil mollitia sunt aliquid vel. Cumque repellat non nulla pariatur sint consequatur. Aut et a magnam aliquam repellat sit ex.', 1799, 232990, 237611, 13, 606, 'aNNS9O'),
(25, '2017-03-19 14:24:56', NULL, NULL, 604, 632, 'vitae a aperiam cupiditate consequatur', 'Consequuntur iure eveniet velit asperiores et inventore. Omnis molestiae voluptas ab aut. Quos provident voluptas beatae animi ea.', 1402, 124983, 227737, 94, 626, 'Ol5iNk'),
(26, '2017-03-19 14:24:56', NULL, NULL, 623, 638, 'omnis optio ipsa quis rem', 'Iure nisi nisi nesciunt magni sit in. Minus autem nisi optio blanditiis. Amet quae sint quidem soluta ut dolore. Sit veritatis consequatur sint quia voluptatibus placeat at aliquid.', 619, 214742, 154155, 93, 609, 'ez1zBW'),
(27, '2017-03-19 14:24:56', NULL, NULL, 645, 626, 'natus voluptas est eos error', 'Quo tempore iste et consectetur ut atque. Consectetur tempore nihil placeat quam non maxime quisquam. Et autem deleniti veniam.', 1363, 157861, 182208, 8, 651, 'Xabi3Q'),
(28, '2017-03-19 14:24:56', NULL, NULL, 639, 647, 'minima voluptatem nesciunt minima perferendis', 'Alias et quibusdam accusantium impedit. Blanditiis quia non blanditiis molestias. Officia sed perspiciatis quo veniam explicabo rerum officia. Impedit repellat quod debitis quasi veritatis quidem suscipit. Illum ipsa dolor hic veniam officia.', 1805, 181238, 170232, 96, 631, '6Gd9hR'),
(29, '2017-03-19 14:24:56', NULL, NULL, 610, 628, 'deleniti ullam iste esse sit', 'Fugiat minima corrupti voluptatum qui labore repellendus. Ex voluptatibus illo consequatur omnis repudiandae. Consequatur quam autem animi ullam.', 1387, 127543, 148451, 31, 623, 'bHk0tj'),
(30, '2017-03-19 14:24:56', NULL, NULL, 613, 609, 'quod quos recusandae nostrum quod', 'Est pariatur sed earum. Fugit inventore ut totam sed pariatur. Doloremque corrupti maiores quas at sequi et. Quibusdam cum beatae et eum est esse.', 1102, 220774, 161777, 84, 610, 'gLGUR3'),
(31, '2017-03-19 14:24:56', NULL, NULL, 638, 627, 'id quae consequatur excepturi in', 'Sapiente quibusdam aperiam ipsam dolores dolores quia. Et et debitis et sint quisquam quam. Minus recusandae est ut ea illo. Facilis sapiente enim in voluptatem quasi.', 1385, 223917, 171335, 32, 627, '1kfUHc'),
(32, '2017-03-19 14:24:56', NULL, NULL, 648, 608, 'fugit dolor libero dolor doloribus', 'Suscipit harum qui pariatur excepturi. Ab molestias id exercitationem qui. Nam quibusdam et voluptas aut consequatur eos ut. In est est qui dignissimos consequatur.', 1004, 178117, 142880, 26, 631, 'l2K5LE'),
(33, '2017-03-19 14:24:56', NULL, NULL, 608, 632, 'tempora officiis rem ut iste', 'Quam qui eligendi necessitatibus facere aut doloribus id. Veniam autem in id est quo maiores. Quis alias accusamus omnis.', 1655, 143133, 162542, 97, 618, 'In23sv'),
(34, '2017-03-19 14:24:56', NULL, NULL, 624, 626, 'quos voluptatibus itaque magni perspiciatis', 'Pariatur iste nulla quas eligendi magnam. Dolores nulla aut reprehenderit qui. Aut mollitia sint illum reiciendis explicabo blanditiis repellat quisquam.', 1811, 176868, 180714, 30, 619, 'hjpebZ'),
(35, '2017-03-19 14:24:56', NULL, NULL, 619, 633, 'quas quae esse impedit nobis', 'A iste maxime molestiae ipsa quisquam velit. Non iure necessitatibus eaque nemo deleniti nihil voluptatem nisi. Tenetur rerum eos et ratione sit laboriosam.', 1754, 129945, 171307, 74, 639, 'ir6mMb'),
(36, '2017-03-19 14:24:56', NULL, NULL, 614, 609, 'exercitationem totam ipsum eum distinctio', 'Omnis voluptas vero voluptatum fugit maxime. Suscipit a voluptas rem rerum consequatur et qui iste. Quam ratione provident dolor laboriosam cumque illo doloremque natus. Blanditiis recusandae cupiditate et at rem non hic.', 1662, 169848, 218276, 54, 630, 'hS6jxk'),
(37, '2017-03-19 14:24:56', NULL, NULL, 613, 611, 'dolor ipsam assumenda omnis et', 'Sed in impedit voluptates. Iusto sequi delectus hic non. Sed minus ut ut quaerat. Velit perferendis facere odit vero.', 1645, 111320, 125963, 22, 617, 'KSa0qJ'),
(38, '2017-03-19 14:24:56', NULL, NULL, 611, 604, 'explicabo vel id eligendi aliquam', 'Pariatur est nihil vel repudiandae reiciendis modi. Dolore ut accusamus rerum harum rem aliquid quis. Qui maxime beatae sed libero facere quae id.', 1559, 179633, 182115, 11, 622, 'wi7fmR'),
(39, '2017-03-19 14:24:56', NULL, NULL, 632, 651, 'rerum ad aut omnis et', 'Quos nesciunt consequuntur qui est vel. Distinctio enim exercitationem enim sed. Qui incidunt accusamus corrupti non. Voluptatem dolorem ipsa autem consequatur tempore et ex.', 897, 100229, 247121, 65, 618, 'gjTVAj'),
(40, '2017-03-19 14:24:56', NULL, NULL, 604, 637, 'repudiandae ea ut odit amet', 'Vitae vero debitis qui quas. Rem nobis modi enim dignissimos at.', 1955, 236222, 176932, 56, 606, '1y2pvt'),
(41, '2017-03-19 14:24:56', NULL, NULL, 641, 640, 'assumenda sint dolor autem magni', 'Consequuntur possimus vero voluptatibus exercitationem est vero odit. Dolore quia consequatur omnis et. Minima sapiente consequuntur sapiente eos veritatis excepturi. Facilis explicabo ipsum similique quas aut sed odio.', 1290, 121647, 108481, 44, 605, 'SmJFV5'),
(42, '2017-03-19 14:24:56', NULL, NULL, 646, 622, 'voluptate deserunt explicabo fugit sequi', 'Ea ipsa atque magni qui eveniet alias. Iste ex aspernatur accusamus laboriosam consequatur. A tenetur expedita non id.', 1870, 177299, 225890, 59, 614, 'UpyIVs'),
(43, '2017-03-19 14:24:56', NULL, NULL, 638, 647, 'ea quaerat pariatur magnam repellat', 'Est quia illo repudiandae minima voluptate. Quis dolorem et ducimus earum doloremque dolor. Doloremque tempora id nulla corporis. Fugiat et et ut fuga.', 1849, 129587, 129615, 35, 651, 'K6g9uC'),
(44, '2017-03-19 14:24:56', NULL, NULL, 616, 606, 'odio aliquid ipsam velit asperiores', 'Distinctio saepe veniam et reiciendis consequatur reiciendis repudiandae tenetur. Praesentium odit libero at molestiae.', 1699, 203983, 227526, 73, 624, 'WEVpaj'),
(45, '2017-03-19 14:24:56', NULL, NULL, 645, 610, 'facilis excepturi qui debitis rerum', 'Ea ut labore maiores odio mollitia quia sint. Voluptatum ullam sunt non debitis. Laudantium aspernatur quos facilis excepturi ipsum eligendi commodi.', 1261, 135911, 133154, 95, 639, 'J3gIXY'),
(46, '2017-03-19 14:24:56', NULL, NULL, 622, 623, 'aliquam exercitationem qui veritatis esse', 'Repudiandae culpa eligendi eum. Sint eaque dolorem reprehenderit. Ea totam quae iusto a veritatis aut. Quam voluptas illum minima eum exercitationem quia laboriosam.', 618, 102252, 219483, 98, 615, 'iHpztb'),
(47, '2017-03-19 14:24:56', NULL, NULL, 602, 637, 'molestias necessitatibus id soluta pariatur', 'Eius eos a nam similique vero aperiam. Consectetur minus omnis quibusdam perferendis id. Et voluptates laudantium est error repellat dolore quia. Ipsam aut unde corporis similique sunt voluptas.', 648, 103699, 228603, 57, 637, 'QWFPMb'),
(48, '2017-03-19 14:24:56', NULL, NULL, 651, 613, 'temporibus qui distinctio minus dolor', 'Ratione optio odit voluptatem et temporibus. Nulla doloremque dolorem sunt quasi corporis excepturi quia. Aut harum iste ex sint illum cum.', 1215, 141844, 227378, 46, 608, 'iCESeT'),
(49, '2017-03-19 14:24:56', NULL, NULL, 602, 647, 'aut odit deleniti culpa nihil', 'Et perspiciatis et et qui nemo beatae. Aut ut voluptates fugiat repellat. Harum debitis harum qui debitis enim.', 880, 234015, 161747, 9, 602, 'qH0kg9'),
(50, '2017-03-19 14:24:56', NULL, NULL, 627, 648, 'ab rerum molestiae eum provident', 'Inventore possimus molestias magnam asperiores itaque animi. Nulla cumque laudantium velit. Aliquid eius perferendis quaerat exercitationem autem voluptas ad.', 678, 150611, 150247, 29, 618, 'uHqoE7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_stock`
--

CREATE TABLE `products_stock` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `cms_users_id` int(11) DEFAULT NULL,
  `stock_in` int(11) NOT NULL DEFAULT '0',
  `stock_out` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_stock`
--

INSERT INTO `products_stock` (`id`, `created_at`, `updated_at`, `products_id`, `cms_users_id`, `stock_in`, `stock_out`, `description`) VALUES
(357, '2017-03-19 14:24:55', NULL, 1, 1, 16, 0, 'new stock'),
(358, '2017-03-19 14:24:55', NULL, 2, 1, 65, 0, 'new stock'),
(359, '2017-03-19 14:24:55', NULL, 3, 1, 8, 0, 'new stock'),
(360, '2017-03-19 14:24:55', NULL, 4, 1, 26, 0, 'new stock'),
(361, '2017-03-19 14:24:55', NULL, 5, 1, 27, 0, 'new stock'),
(362, '2017-03-19 14:24:55', NULL, 6, 1, 98, 0, 'new stock'),
(363, '2017-03-19 14:24:55', NULL, 7, 1, 31, 0, 'new stock'),
(364, '2017-03-19 14:24:55', NULL, 8, 1, 55, 0, 'new stock'),
(365, '2017-03-19 14:24:55', NULL, 9, 1, 68, 0, 'new stock'),
(366, '2017-03-19 14:24:55', NULL, 10, 1, 14, 0, 'new stock'),
(367, '2017-03-19 14:24:55', NULL, 11, 1, 34, 0, 'new stock'),
(368, '2017-03-19 14:24:55', NULL, 12, 1, 44, 0, 'new stock'),
(369, '2017-03-19 14:24:55', NULL, 13, 1, 90, 0, 'new stock'),
(370, '2017-03-19 14:24:55', NULL, 14, 1, 78, 0, 'new stock'),
(371, '2017-03-19 14:24:55', NULL, 15, 1, 44, 0, 'new stock'),
(372, '2017-03-19 14:24:55', NULL, 16, 1, 93, 0, 'new stock'),
(373, '2017-03-19 14:24:55', NULL, 17, 1, 48, 0, 'new stock'),
(374, '2017-03-19 14:24:55', NULL, 18, 1, 85, 0, 'new stock'),
(375, '2017-03-19 14:24:55', NULL, 19, 1, 51, 0, 'new stock'),
(376, '2017-03-19 14:24:56', NULL, 20, 1, 96, 0, 'new stock'),
(377, '2017-03-19 14:24:56', NULL, 21, 1, 78, 0, 'new stock'),
(378, '2017-03-19 14:24:56', NULL, 22, 1, 37, 0, 'new stock'),
(379, '2017-03-19 14:24:56', NULL, 23, 1, 75, 0, 'new stock'),
(380, '2017-03-19 14:24:56', NULL, 24, 1, 13, 0, 'new stock'),
(381, '2017-03-19 14:24:56', NULL, 25, 1, 94, 0, 'new stock'),
(382, '2017-03-19 14:24:56', NULL, 26, 1, 93, 0, 'new stock'),
(383, '2017-03-19 14:24:56', NULL, 27, 1, 8, 0, 'new stock'),
(384, '2017-03-19 14:24:56', NULL, 28, 1, 96, 0, 'new stock'),
(385, '2017-03-19 14:24:56', NULL, 29, 1, 31, 0, 'new stock'),
(386, '2017-03-19 14:24:56', NULL, 30, 1, 84, 0, 'new stock'),
(387, '2017-03-19 14:24:56', NULL, 31, 1, 32, 0, 'new stock'),
(388, '2017-03-19 14:24:56', NULL, 32, 1, 26, 0, 'new stock'),
(389, '2017-03-19 14:24:56', NULL, 33, 1, 97, 0, 'new stock'),
(390, '2017-03-19 14:24:56', NULL, 34, 1, 30, 0, 'new stock'),
(391, '2017-03-19 14:24:56', NULL, 35, 1, 74, 0, 'new stock'),
(392, '2017-03-19 14:24:56', NULL, 36, 1, 54, 0, 'new stock'),
(393, '2017-03-19 14:24:56', NULL, 37, 1, 22, 0, 'new stock'),
(394, '2017-03-19 14:24:56', NULL, 38, 1, 11, 0, 'new stock'),
(395, '2017-03-19 14:24:56', NULL, 39, 1, 65, 0, 'new stock'),
(396, '2017-03-19 14:24:56', NULL, 40, 1, 56, 0, 'new stock'),
(397, '2017-03-19 14:24:56', NULL, 41, 1, 44, 0, 'new stock'),
(398, '2017-03-19 14:24:56', NULL, 42, 1, 59, 0, 'new stock'),
(399, '2017-03-19 14:24:56', NULL, 43, 1, 35, 0, 'new stock'),
(400, '2017-03-19 14:24:56', NULL, 44, 1, 73, 0, 'new stock'),
(401, '2017-03-19 14:24:56', NULL, 45, 1, 95, 0, 'new stock'),
(402, '2017-03-19 14:24:56', NULL, 46, 1, 98, 0, 'new stock'),
(403, '2017-03-19 14:24:56', NULL, 47, 1, 57, 0, 'new stock'),
(404, '2017-03-19 14:24:56', NULL, 48, 1, 46, 0, 'new stock'),
(405, '2017-03-19 14:24:56', NULL, 49, 1, 9, 0, 'new stock'),
(406, '2017-03-19 14:24:56', NULL, 50, 1, 29, 0, 'new stock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `suppliers`
--

INSERT INTO `suppliers` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `address`, `phone`, `phone_other`) VALUES
(602, '2017-03-19 14:24:55', NULL, NULL, 'Schroeder-Breitenberg', '62835 Schulist Crest Apt. 361\nHagenesstad, IA 61575', '+0407393481613', '+4434802060985'),
(603, '2017-03-19 14:24:55', NULL, NULL, 'Howell-Mertz', '377 Raynor Brooks Suite 211\nPort Patrickhaven, ND 11810', '+0132954072358', '+6613666658368'),
(604, '2017-03-19 14:24:55', NULL, NULL, 'Tillman PLC', '79752 Jeanette Circle Apt. 155\nDachton, MO 88406', '+9494024175361', '+6683608376393'),
(605, '2017-03-19 14:24:55', NULL, NULL, 'Fritsch, Rolfson and Monahan', '24475 Austyn Turnpike\nNew Rosaleechester, WY 34978', '+7543879402875', '+0070187135337'),
(606, '2017-03-19 14:24:55', NULL, NULL, 'Hilpert Group', '8405 Williamson Island Suite 334\nCollierbury, LA 38344', '+4241280084029', '+5608852079436'),
(607, '2017-03-19 14:24:55', NULL, NULL, 'Pollich, Braun and Bernier', '363 Trever Isle Suite 346\nEudoraborough, NV 06883-2512', '+7201056555634', '+3416285253312'),
(608, '2017-03-19 14:24:55', NULL, NULL, 'Kassulke, Rempel and Smith', '9502 Cordell Crest\nSouth Einar, OH 45143-3152', '+2783143025692', '+1348182264823'),
(609, '2017-03-19 14:24:55', NULL, NULL, 'Sanford-Smitham', '99756 Prohaska Ferry Suite 010\nKyraborough, NH 37841-7554', '+8057088037447', '+9795744207468'),
(610, '2017-03-19 14:24:55', NULL, NULL, 'Halvorson Ltd', '6178 Ewald Ford Apt. 738\nNew Barbarashire, RI 35933', '+6971120501210', '+5857839884659'),
(611, '2017-03-19 14:24:55', NULL, NULL, 'Haley Group', '2031 Donald Hill\nBrayanshire, MO 04034', '+4056241558097', '+7321915739965'),
(612, '2017-03-19 14:24:55', NULL, NULL, 'Larson LLC', '5145 Carlotta Track Suite 031\nAbdullahberg, GA 32791-2488', '+6186348237120', '+0689942383792'),
(613, '2017-03-19 14:24:55', NULL, NULL, 'Abshire Ltd', '986 McGlynn Shore Suite 895\nDooleymouth, CT 91108-2114', '+5300241939506', '+6294341830884'),
(614, '2017-03-19 14:24:55', NULL, NULL, 'Waters-Bergstrom', '39426 Aisha Ford Apt. 492\nSouth Davonteshire, NV 87148', '+6780458796223', '+4182231151721'),
(615, '2017-03-19 14:24:55', NULL, NULL, 'Hackett, Hamill and Hudson', '71382 Schulist Forge Suite 692\nWehnerberg, WI 50791-8111', '+0272274799115', '+6005720817407'),
(616, '2017-03-19 14:24:55', NULL, NULL, 'Zieme Ltd', '424 Kuvalis Shores\nNorth Theodore, MI 96230', '+1726216356875', '+6682453174532'),
(617, '2017-03-19 14:24:55', NULL, NULL, 'Hegmann-Eichmann', '38900 Bernie Branch\nMireillefurt, WV 47940-9793', '+2030097530961', '+7770060365962'),
(618, '2017-03-19 14:24:55', NULL, NULL, 'Little, Schowalter and Langworth', '9184 Stehr Walks\nGrantshire, MS 81076-6142', '+1660732177441', '+6205090283981'),
(619, '2017-03-19 14:24:55', NULL, NULL, 'Waters Ltd', '2467 O\'Reilly Manors Apt. 947\nPort Vergie, TX 03171', '+8163187075158', '+5892383632201'),
(620, '2017-03-19 14:24:55', NULL, NULL, 'Jast, Ernser and Reichert', '44864 Major Ridges\nWest Kelliemouth, RI 61878-2282', '+1293141725408', '+5648683549700'),
(621, '2017-03-19 14:24:55', NULL, NULL, 'Hills-Gleichner', '34126 Dylan Street\nLake Garlandmouth, MD 67491-6970', '+8800806187856', '+0530878943392'),
(622, '2017-03-19 14:24:55', NULL, NULL, 'Harber-Ruecker', '36125 Bernier Ports\nWest Favian, MT 85033', '+8761816766809', '+8616709838633'),
(623, '2017-03-19 14:24:55', NULL, NULL, 'West Inc', '8461 Yost Isle Suite 552\nRaulview, KY 77978', '+9197904612432', '+6879517709518'),
(624, '2017-03-19 14:24:55', NULL, NULL, 'Donnelly and Sons', '4772 McGlynn Row\nGibsonchester, MO 31344-0038', '+0736327297264', '+8854309610093'),
(625, '2017-03-19 14:24:55', NULL, NULL, 'Ernser-Daugherty', '4385 Lamont Run Suite 288\nLloydfort, WA 18908-7857', '+4945038399123', '+7662551825390'),
(626, '2017-03-19 14:24:55', NULL, NULL, 'Pollich, Kihn and Robel', '694 Borer Points\nTorptown, OR 00601', '+7796693778323', '+2281641402796'),
(627, '2017-03-19 14:24:55', NULL, NULL, 'Reichel, Cassin and Cole', '632 Domenick Points Apt. 061\nNorth Annamarieburgh, PA 24619-3250', '+3587122277142', '+2690027483275'),
(628, '2017-03-19 14:24:55', NULL, NULL, 'Hoppe, Goldner and Wehner', '693 Swift Avenue\nWest Brennonfort, CA 79313-7675', '+5636860770791', '+0063114034330'),
(629, '2017-03-19 14:24:55', NULL, NULL, 'Roberts and Sons', '163 Yundt Plain\nWest Greyson, MD 11271', '+3091255667002', '+9681146951627'),
(630, '2017-03-19 14:24:55', NULL, NULL, 'Bruen-Block', '5320 Orie Brooks Apt. 514\nSouth Dayanachester, DC 19860', '+3175191090373', '+3591865918485'),
(631, '2017-03-19 14:24:55', NULL, NULL, 'Williamson, Hansen and Quitzon', '796 Christina Camp\nSofiaburgh, AL 93623', '+2462756883641', '+8353244502323'),
(632, '2017-03-19 14:24:55', NULL, NULL, 'Braun, McLaughlin and Johnson', '889 Howell Dale Suite 954\nCarleyburgh, UT 18194', '+6464242236819', '+2993670579744'),
(633, '2017-03-19 14:24:55', NULL, NULL, 'McCullough-Blick', '27374 Terry Overpass\nRiceberg, TN 69508', '+6860817724624', '+3045036278138'),
(634, '2017-03-19 14:24:55', NULL, NULL, 'Williamson-DuBuque', '68912 Daphney Mission\nPredovicfort, NC 50288-0865', '+1718659701783', '+9713504842765'),
(635, '2017-03-19 14:24:55', NULL, NULL, 'Ondricka, Murray and Doyle', '9571 Maurine Islands Suite 994\nMarcosbury, KY 68464', '+0582666654051', '+5518654338367'),
(636, '2017-03-19 14:24:55', NULL, NULL, 'Stehr PLC', '209 Mavis Avenue Apt. 180\nNew Colemanberg, NJ 42456', '+5007505494722', '+8831729890368'),
(637, '2017-03-19 14:24:55', NULL, NULL, 'Kassulke and Sons', '51419 Hermiston Hollow Apt. 319\nPort Donald, DE 40451-5079', '+8191210288657', '+4697535614292'),
(638, '2017-03-19 14:24:55', NULL, NULL, 'Veum, Wiza and King', '32795 Lindgren Square Suite 624\nPfefferburgh, IN 51834', '+9131582405262', '+5333480275939'),
(639, '2017-03-19 14:24:55', NULL, NULL, 'Nienow, Homenick and Hermiston', '35497 Schimmel Stravenue Suite 702\nEast Oleland, AL 79869-6380', '+8120042114014', '+6611181320753'),
(640, '2017-03-19 14:24:55', NULL, NULL, 'Shields, Raynor and Abbott', '4983 Botsford Via Apt. 666\nEast Berylshire, NY 56883', '+2983561237342', '+8499763955431'),
(641, '2017-03-19 14:24:55', NULL, NULL, 'Tremblay-Mante', '3034 Kailey Junction\nLake Giovanifurt, SC 16543-7849', '+1070418023660', '+6739854637136'),
(642, '2017-03-19 14:24:55', NULL, NULL, 'Jast-Kulas', '835 Reynolds Island\nSouth Allieberg, CA 46480', '+2453347854710', '+7832839722480'),
(643, '2017-03-19 14:24:55', NULL, NULL, 'Hudson, Balistreri and Renner', '4370 Jan Manor Suite 054\nHamillville, HI 31829', '+0965973549275', '+8500580621045'),
(644, '2017-03-19 14:24:55', NULL, NULL, 'Turcotte-Lebsack', '868 Marks Fords Suite 825\nThomashaven, MO 73040-7071', '+0290353628297', '+8372648476801'),
(645, '2017-03-19 14:24:55', NULL, NULL, 'Pollich, Doyle and Nicolas', '610 Fahey Square\nLake Gaetanoside, IA 01797-3222', '+1666778144971', '+1526608298126'),
(646, '2017-03-19 14:24:55', NULL, NULL, 'Gleichner Inc', '305 Goldner Shoal\nLake Zellastad, IL 41636-9670', '+9355446127956', '+7843727679879'),
(647, '2017-03-19 14:24:55', NULL, NULL, 'Emmerich-Oberbrunner', '91681 Okuneva Isle Suite 367\nWest Braedenport, MI 17671', '+0270830350950', '+6732023950644'),
(648, '2017-03-19 14:24:55', NULL, NULL, 'Vandervort, Lubowitz and Braun', '4488 Wuckert Crescent Apt. 687\nBernierhaven, NE 85058-9071', '+5447905790767', '+9735136592616'),
(649, '2017-03-19 14:24:55', NULL, NULL, 'Rippin-Kunde', '675 Lesch Ports Suite 554\nLake Branthaven, PA 94188', '+1993157863312', '+0277672179269'),
(650, '2017-03-19 14:24:55', NULL, NULL, 'Jacobi and Sons', '11598 Zemlak Bypass\nSouth Trevorview, MS 39899', '+7570959063772', '+8444540026713'),
(651, '2017-03-19 14:24:55', NULL, NULL, 'Jacobs and Sons', '9659 Jamaal Glen\nDamonton, AL 24482-6811', '+7656266851303', '+0088484297009');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_stock`
--
ALTER TABLE `products_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_stock_products_id_foreign` (`products_id`);

--
-- Indices de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;

--
-- AUTO_INCREMENT de la tabla `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=603;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3107;

--
-- AUTO_INCREMENT de la tabla `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18627;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `products_stock`
--
ALTER TABLE `products_stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;

--
-- AUTO_INCREMENT de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products_stock`
--
ALTER TABLE `products_stock`
  ADD CONSTRAINT `products_stock_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
