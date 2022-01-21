-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-09-2021 a las 10:11:34
-- Versión del servidor: 10.3.31-MariaDB-log-cll-lve
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Estructura para la vista `sig_asesor_carga`
--

CREATE VIEW `sig_asesor_carga` AS SELECT
 `cms_users`.`id` AS `id`,
  `cms_users`.`name` AS `name`,
   ifnull(`por_contactar`.`por_contactar`,0) AS `por_contactar` FROM (`cms_users` left join (select count(0) AS `por_contactar`,
  `prospecto`.`user_id` AS `user_id` from `prospecto` where `prospecto`.`status` = 'Por Contactar' and `prospecto`.`is_client` = '0' group by `prospecto`.`user_id`) `por_contactar` on(`por_contactar`.`user_id` = `cms_users`.`id`)) WHERE `cms_users`.`id_cms_privileges` = 2  and `cms_users`.`available` = 1 ORDER BY ifnull(`por_contactar`.`por_contactar`,0) ASC ;



--
-- VIEW  `sig_asesor_carga`
-- Datos: Ninguna
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
