SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tienda`;

CREATE TABLE `compras` (
  `Id` int(11) NOT NULL,
  `numeroventa` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `compras` (`Id`, `numeroventa`, `nombre`, `imagen`, `precio`, `cantidad`, `subtotal`) VALUES
(2, 1, 'baraja Española Fournier', 'baraja_fournier.jpg', '13.50', 1, '13.50'),
(10, 1, 'Mesa de cartas BDM PRO en madera', 'mesa_cartas2.jpg', '165.00', 1, '165.00'),
(8, 2, 'Maletin PRO 600 fichas', 'maletin_pro.jpg', '85.00', 1, '85.00');

CREATE TABLE `productos` (
  `id` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  `imagenes` text,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagenes`, `precio`) VALUES
(1, 'Baraja Francesa Bicicle', 'Naipes Franceses clasicos de gran calidad. Naipes de papel', 'baraja_Bicicle.jpg', '12.00'),
(2, 'Baraja Española Fournier','Naipes Españoles de la reconocida marca Fournier. Naipes de papel.','baraja_fournier.jpg','13.50'),
(3, 'Baraja Francesa basica','Naipes Franceses clasicos','Baraja_francesa.jpg','9.00'),
(4, 'Juego Domino', 'Set dde Domino en caja de madera y fichas talladas a mano.', 'domino.jpg', '24.00'),
(5, 'Juego de mesa Emoji', 'Juego de mesa emoji.', 'juego_emoji.jpg', '11.50'),
(6, 'Juego de mesa Gestos', 'Clasico juego de mesa de familia Gestos.', 'juego_gestos.jpg', '9.90'),
(7, 'Maletin de poker 300 fichas', 'Set de poker de 300 fichas, 2 barajas de cartas y dados de casino', 'maletin_basico.jpg', '39.90'),
(8, 'Maletin PRO 600 fichas', 'Maletin PRO de 600 fichsa de ceramica, 2 barajas francesas Bicile, y dados de casino', 'maletin_pro.jpg', '85.00'),
(9, 'Mesa de cartas de madera', 'Mesa de cartas basica para 6 jugadores', 'mesa_cartas.jpg', '99.90'),
(10, 'Mesa de cartas BDM PRO en madera', 'Mesa de cartas de competicion BDM hasta 6 jugadores , stay de fichas y acabado Premium.', 'mesa_cartas2.jpg', '165.00'),
(11, 'Monopoli clasico', 'Juego de monopoli clasico', 'monopoli_basico.jpg', '15.80'),
(12, 'Monopoli Fortnite', 'Juego Monopoli ambientado en el famoso juego de moda Fortnite', 'monopoli_fortnite.jpg', '19.90'),
(13, 'Pack de fichas PRO', 'Pack de fichas, se venden en pack de 15 unidades, de ceramica', 'pack_fichas.jpg', '30.00'),
(14, 'Pack de 25 juegos de mesa', 'Pack de 25 juegos de mesa clasicos de todos los tiempos.', 'pack_juegos_mesa.jpg', '99.00'),
(15, 'Tapete cartas', 'Tapete para juegos de cartas', 'tapete.jpg', '10.00');

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`Id`, `Nombre`, `Apellido`, `Usuario`, `Password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'Francisco', 'Sanchez', 'Frank', '12345');

ALTER TABLE `compras`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `compras`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `productos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;