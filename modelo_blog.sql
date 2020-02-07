-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-02-2020 a las 00:12:15
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modelo_blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre_cat` varchar(110) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_cat`, `user_id`) VALUES
(1, 'Filosofía', 13),
(2, 'Matemática', 13),
(3, 'Química', 13),
(4, 'Física', 13),
(5, 'Cat prueba', 19),
(6, 'Estadística', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(13, 13, 2, 'Probando todas las entradas \r\n', 'Probando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalbla', '2020-01-31'),
(14, 13, 2, 'Probando todas las entradas', 'Probando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalblaProbando todas las entradas \r\nblalblalbla', '2020-01-30'),
(18, 13, 3, 'Probando todas las entradasv', 'Probando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalbla', '2020-01-23'),
(20, 13, 1, 'PROBANDO', 'Probando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalblaProbando todas las entradas blalblalbla', '2020-01-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`) VALUES
(12, 'Ciro', 'villasanti', 'villasanticiro@gmail.com', '$2y$04$NwWE4SpDoMb0.2ZRImhw/ucx2GACRFsKaUdszaTawqeVrSq7bFn5C'),
(13, 'hola', 'ciro', 'hola@hola.com', '$2y$04$48iR1fLphsPJ/PjvYnS1Euw1FxOwzRdYQiGJZL9JGeaAF7nvu8vZe'),
(14, 'sdads', 'dasdsad', 'sdasdsa@gmail.com', '$2y$04$tKPpblRLz4duXA71C3J8au4Zxkn79huYyBxOBSi8DQAehjx8a7WhO'),
(15, 'Roman', 'Martinez', 'martinezjuan@gmail.com', '$2y$04$SWvmFzAg79gZjib6.TS3R.lzicft7EqD.GAqgmZdI2Zpyv.Svln0G'),
(16, 'Ciro', 'Villasanti', 'cirovillasanti@gmail.com', '$2y$04$uCe2GUlXXYJ3Mas6Asox3.V/AT9AOznv9GruqqlmPio2iPqaFI5U.'),
(17, 'Prueba', 'Prueba', 'prueba@prueba.com', '$2y$04$L3roDC4LPuXexWFbITijSuWYBBQwb6TcOuvcLv/MkHCYqSzB1lUS6'),
(18, 'Gabriela', 'Alvarez', 'gabi@alvarez.com', '$2y$04$QLr7LqC9c3TQl4KYK1ULWOyHDa10aGRiCGTxEX6UTEaBlKQpCuyXW'),
(19, 'Pruebita', 'Prueba', 'prueba@jeje.com', '$2y$04$VbIhzrCyCiEFcE95ACNnUufhUzsmbvVVoih5DtyoGgOpKXkQfknwm'),
(20, 'martina', 'crugnale', 'marta@jeje.com', '$2y$04$1bDjeSqr0Im7jmNZcbJuRe2pod3RtCtkqNcLOswSxjXxyWQrklEm6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`,`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
