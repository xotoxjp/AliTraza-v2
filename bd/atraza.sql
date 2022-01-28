-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2022 a las 15:34:10
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atraza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE `analisis` (
  `id_analisis` int(5) NOT NULL,
  `id_presupuesto` int(5) NOT NULL,
  `id_tipo_analisis` int(5) NOT NULL,
  `muestra` int(5) NOT NULL,
  `valor` decimal(10,4) NOT NULL,
  `rechazo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `analisis`
--

INSERT INTO `analisis` (`id_analisis`, `id_presupuesto`, `id_tipo_analisis`, `muestra`, `valor`, `rechazo`) VALUES
(1, 5, 2, 3, '2.0000', 'Debajo del Limite'),
(2, 5, 1, 3, '0.0000', 'RECHAZADO'),
(3, 5, 2, 2, '0.0000', ''),
(4, 5, 1, 2, '0.0000', ''),
(5, 5, 2, 1, '0.0000', ''),
(6, 5, 1, 1, '0.0000', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `id_presupuesto` int(5) NOT NULL,
  `num_presupuesto` int(5) NOT NULL,
  `productor` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(4) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `presupuestos`
--

INSERT INTO `presupuestos` (`id_presupuesto`, `num_presupuesto`, `productor`, `fecha`, `cantidad`, `estado`) VALUES
(3, 1221, 'Franck Viviana Mabel', '2021-12-22', 12, 0),
(4, 2311, 'Minig AS', '2021-12-17', 10, 1),
(5, 2712, 'Vinardi Angelica', '2021-12-08', 3, 2),
(6, 654, 'Vinardi Angelica', '2021-02-09', 21, 1),
(7, 5432, 'Frigo Sergio Oscar', '2021-05-11', 11, 1),
(8, 532, 'Tisocco Alejandro', '2021-12-08', 11, 1),
(9, 434, 'Sanni Marcelo', '2021-10-06', 34, 1),
(10, 123, 'Tisocco Alejandro', '2021-12-07', 2, 1),
(11, 1231, 'Frigo Sergio Oscar', '2021-12-01', 12, 1),
(12, 123, 'Vinardi Angelica', '2021-10-13', 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productores`
--

CREATE TABLE `productores` (
  `prod_id` int(11) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `cond_iva` varchar(3) NOT NULL,
  `nro_cuit` varchar(13) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `cel` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contacto` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productores`
--

INSERT INTO `productores` (`prod_id`, `razon_social`, `direccion`, `localidad`, `provincia`, `pais`, `cond_iva`, `nro_cuit`, `tel`, `cel`, `email`, `contacto`) VALUES
(1, 'Miel del Valle', 'Ruta 35 km 456', 'Las Parejas', 'Chaco', 'Argentina', 'EXE', '99-99999999-9', '02343993234', '549201231232', 'mieldelvalle@mail.com', 'Pedro Mosquera '),
(2, 'Zoratti Nestor Hugo', 'Moreno 608', 'Tres Isletas', 'Chaco', 'Argentina', 'MTO', '23-16375545-9', '', '', 'zoratti@mail.com', 'Zoratti Hugo'),
(3, 'Frigo Sergio Oscar', 'Alejo Peiret 385', 'Chajarí', 'Entre Rios', 'Argentina', 'MTO', '20-25481306-1', 'No', 'No', 'No', 'Frigo Sergio'),
(4, 'Sanni Marcelo', 'Brasil 1985', 'Chajarí', 'Entre Rios', 'Argentina', 'MTO', '20-21667462-7', 'No', 'No', 'No', 'Sanni Marcelo'),
(5, 'Pessarini Eloy Alcides', 'Chaco 1135', 'Chajarí', 'Entre Rios', 'Argentina', 'MTO', '20-13673613-3', '03456-422762', '', 'eloy.alcides@hotmail.com', 'Mayer Walter'),
(6, 'Tisocco Alejandro', 'Champagnat 3089', 'Chajarí', 'Entre Rios', 'Argentina', 'MTO', '23-31118128-9', 'No', 'No', 'No', 'Tisocco Alejandro'),
(7, 'Franck Viviana Mabel', 'Barrio 78 viviendas casa 33', 'Macia', 'Entre Rios', 'Argentina', 'MTO', '27-21783009-0', '03445-15645875', 'No', 'No', 'Franck Viviana'),
(8, 'Vinardi Angelica', 'Ramirez s/N°', 'Macia', 'Entre Rios', 'Argentina', 'MTO', '27-13343105-0', 'No', 'No', 'No', 'Vinardi Angelica '),
(9, 'Frank AS', 'Chaco 107 PC 2 Y 5 P Industria', 'JJ Castelli', 'Chaco', 'Argentina', 'RI', '30-70907720-8', 'No', 'No', 'No', 'Asociación JJ Castelli'),
(10, 'Minig AS', 'Chaco 107 PC 2 y 5 Pque Indust', 'JJ Castelli', 'Chaco', 'Argentina', 'RI', '30-70907720-8', 'No', 'No', 'No', 'MinigAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_analisis`
--

CREATE TABLE `tipo_analisis` (
  `id_tipo_analisis` int(5) NOT NULL,
  `nomenclador` varchar(30) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `limite_inferior` decimal(10,4) NOT NULL,
  `limite_superior` decimal(10,4) NOT NULL,
  `unidad` varchar(10) NOT NULL,
  `rechazo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_analisis`
--

INSERT INTO `tipo_analisis` (`id_tipo_analisis`, `nomenclador`, `detalle`, `limite_inferior`, `limite_superior`, `unidad`, `rechazo`) VALUES
(1, 'HMF', 'Hidroximetilfurfural', '10.0000', '40.0000', 'mg/kg', 'Si'),
(2, 'Humedad', 'Contenido de Humedad', '12.0000', '20.0000', '%', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `tipo`) VALUES
(1, 'admin', 'password', 'admin'),
(2, 'demo', 'casa', 'compras'),
(3, 'Marcela', 'laboratorio', 'laboratorio'),
(4, 'Pedro', 'logistica', 'logistica'),
(5, 'Camilo', 'ventas', 'ventas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`id_presupuesto`);

--
-- Indices de la tabla `productores`
--
ALTER TABLE `productores`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `tipo_analisis`
--
ALTER TABLE `tipo_analisis`
  ADD PRIMARY KEY (`id_tipo_analisis`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_analisis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  MODIFY `id_presupuesto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productores`
--
ALTER TABLE `productores`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_analisis`
--
ALTER TABLE `tipo_analisis`
  MODIFY `id_tipo_analisis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
