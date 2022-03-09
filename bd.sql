-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-01-2022 a las 12:51:59
-- Versión del servidor: 5.7.36-0ubuntu0.18.04.1
-- Versión de PHP: 7.0.33-55+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portafolio-2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `leido` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `asunto`, `descripcion`, `leido`, `created_at`) VALUES
(1, 'dsadsadsad', 'salamanca3c09@gmail.com', '|wewq', 'wedsdfsfds', 1, '2021-12-17 16:28:16'),
(2, 'dsadsa', 'promotorasimjaca@gmail.com', 'dsadsadsa', 'dsadsadsa', 1, '2021-12-17 17:31:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_perfil`
--

CREATE TABLE `foto_perfil` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url_foto` varchar(255) NOT NULL,
  `selected` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nivel` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_personal`
--

CREATE TABLE `informacion_personal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url_web` varchar(255) NOT NULL,
  `universitario` varchar(100) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `fecha_nacimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_inicio_profesion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_inicio_experiencia` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginas_trabajos`
--

CREATE TABLE `paginas_trabajos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paginas_trabajos`
--

INSERT INTO `paginas_trabajos` (`id`, `user_id`, `nombre`, `url`, `created_at`) VALUES
(4, 1, 'Sdsadsadsadsadsa', 'https://www.youtube.com', '2021-12-21 19:51:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `link_proyecto` varchar(255) NOT NULL,
  `poster_img` varchar(255) NOT NULL,
  `url_clean` varchar(100) NOT NULL,
  `pequeña_descripcion` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_inicio_proyecto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_fin_proyecto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `user_id`, `categoria_id`, `nombre`, `link_proyecto`, `poster_img`, `url_clean`, `pequeña_descripcion`, `descripcion`, `fecha_inicio_proyecto`, `fecha_fin_proyecto`, `created_at`) VALUES
(2, 1, NULL, 'dsadsa', 'https://music.youtube.com', 'uploads/proyectos/dsadsa61bb63dad1c5a-700.jpg', 'dsadsa', 'dsadsa ds ad sad sa dsa d sad sa ds d d sd sd s ds ds d sd sd s ds ds d ds dss dd s dddddddddddddd', '<p>dsadsa</p>', '2021-12-17 04:00:00', '2021-10-15 04:00:00', '2021-12-16 16:05:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE `redes_sociales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `icono` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `crated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumen`
--

CREATE TABLE `resumen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resumen` text NOT NULL,
  `activo` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resumen`
--

INSERT INTO `resumen` (`id`, `user_id`, `resumen`, `activo`, `created_at`) VALUES
(1, 1, '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus, quia. Nisi, cupiditate ab. Inventore laboriosam id mollitia dolore, quibusdam fugit ad laborum dolores minima optio illo adipisci pariatur eum aliquid ipsum atque debitis quas, consectetur asperiores autem dignissimos perferendis temporibus? Ad, dolore fuga. Sapiente iste dolores eos, aliquid excepturi commodi numquam soluta beatae corporis dolore mollitia reprehenderit perspiciatis animi repellat.<br></p>', 1, '2021-11-30 19:59:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumenes_laborales`
--

CREATE TABLE `resumenes_laborales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_fin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resumenes_laborales`
--

INSERT INTO `resumenes_laborales` (`id`, `user_id`, `categoria_id`, `nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`, `created_at`) VALUES
(5, 1, NULL, 'sadadsa', 'dsadsa sd s ds s d ssd s s s s s s s s sdddddddddddddddddddddddddddsddddddddddddddddddddddddddddddddddddds', '2021-12-18 01:24:16', '2021-11-05 04:00:00', '2021-12-18 01:01:10'),
(6, 1, NULL, 'Sistema Dorado', '<?php echo \"pelooo\"?> lodsadasd s s s s s ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2021-10-06 04:00:00', '2021-11-05 04:00:00', '2021-12-22 17:53:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url_trabajo` varchar(255) NOT NULL,
  `descripcion` text,
  `enviado` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `nombre`, `email`, `url_trabajo`, `descripcion`, `enviado`, `created_at`) VALUES
(2, 'dsad', 'dsdpromotorasimjaca@gmail.com', 'https://github.com/bcit-ci/CodeIgniter/issues/3478', 'dsadsa', 0, '2021-12-11 16:49:02'),
(3, 'Sistema Dorado', 'wqewqeqpromotorasimjaca@gmail.com', 'https://github.com', 'sdas', 0, '2021-12-17 19:53:02'),
(4, 'Sistema Dorado', 'Loresdsd198429@gmail.s', 'https://github.com/bcit-ci/CodeIgniter/issues/3478', 'sadsadsadsa', 0, '2021-12-21 22:30:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rol`) VALUES
(1, 'samuel20', '04242805116', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foto_perfil`
--
ALTER TABLE `foto_perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informacion_personal`
--
ALTER TABLE `informacion_personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paginas_trabajos`
--
ALTER TABLE `paginas_trabajos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resumen`
--
ALTER TABLE `resumen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resumenes_laborales`
--
ALTER TABLE `resumenes_laborales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `foto_perfil`
--
ALTER TABLE `foto_perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `informacion_personal`
--
ALTER TABLE `informacion_personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paginas_trabajos`
--
ALTER TABLE `paginas_trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `resumen`
--
ALTER TABLE `resumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `resumenes_laborales`
--
ALTER TABLE `resumenes_laborales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
