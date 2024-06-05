/*DROP DATABASE IF EXISTS tracker;*/
CREATE DATABASE IF NOT EXISTS tracker;
USE tracker;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 06:10 PM
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
-- Database: `tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `usuarios` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `correo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `id_Profesor` int(11) NULL,
  `tipo_Usuario` varchar(50) NOT NULL,
  FOREIGN KEY (id_Profesor) REFERENCES usuarios(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `usuarios` (`id`, `correo`, `password`, `nombre`, `apellidos`, `id_Profesor`, `tipo_Usuario`) VALUES
(1, 'admin@admin.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Admin', 'Admin', NULL, 'admin'),
(2, 'mvc@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Cristina', 'Martinez Perez', NULL, 'profesor'),
(3, 'fal@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Laura', 'Fernandez Alonso', NULL, 'profesor'),
(4, 'fpx@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Xabier', 'Ferreiro Ponte', NULL, 'profesor'),
(5, 'yvr@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Yago', 'Vila Rama', 2, 'alumno'),
(6, 'avi@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Alejandro', 'Vazquez de la Iglesia', 2, 'alumno'),
(7, 'mdr@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Mario', 'Delprato Ramon', 2, 'alumno'),
(8, 'sac@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Sergio', 'Amaro Caamano', 3, 'alumno'),
(9, 'yml@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Yolanda', 'Manteiga Lavandeira', 3, 'alumno'),
(10, 'yrd@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Yolanda', 'Ramos Delgado', 3, 'alumno'),
(11, 'ylb@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Yasmin', 'Lema Blanco', 4, 'alumno'),
(12, 'rcv@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Ruben', 'Cendon Villar', 4, 'alumno'),
(13, 'tmv@gmail.com', '$2y$10$82emA9Bd6l4KAd4YOUKxeuIbttQIN64ZB47gPjG.lhVbc/lIE.pKy', 'Tania', 'Maria Vazquez', 4, 'alumno');


-- --------------------------------------------------------

--
-- Table structure for table `casosdeuso`
--

CREATE TABLE `casosdeuso` (
  `cod_Caso` int(11) AUTO_INCREMENT PRIMARY KEY,
  `uso` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `id_Alumno` int(11) NOT NULL,
  FOREIGN KEY (id_Alumno) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `casosdeuso`
--

INSERT INTO `casosdeuso` (`cod_Caso`, `uso`, `descripcion`, `tiempo`, `id_Alumno`) VALUES
(9, 'Login/Logout', 'el usuario inicia sesión y cerrar sesión', 1, 5),
(10, 'Registro de Usuarios', 'solo el usuario con rol de profesor puede registrar usuarios', 2, 5),
(11, 'Gestión de Usuarios', 'existe un usuario profesor el cual puede crear, listar y eliminar usuarios', 4, 5),
(12, 'Datos usuario', 'el profesor puede cambiar sus datos personales de usuario, email y contraseña', 3, 5),
(13, 'Listar alumnos', 'el profesor puede visualizar todos sus alumnos', 2, 5),
(14, 'Acceder a perfil', 'el profesor accede al perfil del alumno para ver la información del proyecto', 2, 5),
(15, 'Descargar Proyecto', 'el profesor puede descargar los archivos del proyecto para testearlos en su equipo', 2, 5),
(16, 'Datos usuario', 'el profesor puede cambiar sus datos personales de usuario, email y contraseña', 3, 5),
(17, 'Crear proyecto', 'el alumno puede crear una instancia para su proyecto', 1, 5),
(18, 'Rellenar datos', 'el alumno puede rellenar todos los apartados de la instancia creada para el proyecto', 4, 5),
(19, 'Subir archivos', 'el alumno puede subir los archivos del proyecto a modo de almacenamiento en la nube', 3, 5),
(20, 'Modificar datos', 'el alumno puede modificar todos los datos del proyecto así como archivos', 5, 5),
(21, 'Eliminar Proyecto', 'el alumno puede eliminar su proyecto', 1, 5),
(22, 'Datos usuario', 'el profesor puede cambiar sus datos personales de usuario, email y contraseña', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `descripcion`
--

CREATE TABLE `descripcion` (
  `id_Alumno` int(11) NOT NULL PRIMARY KEY,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(10000) NOT NULL,
  FOREIGN KEY (id_Alumno) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `descripcion`
--

INSERT INTO `descripcion` (`id_Alumno`, `titulo`, `descripcion`) VALUES
(5, 'Tracker', 'La plataforma propuesta es un sistema en línea diseñado específicamente para la gestión de proyectos de fin de curso del Ciclo Superior en Desarrollo de Aplicaciones Web. Permite a los estudiantes y profesores colaborar de manera conjunta en la planificación, seguimiento y evaluación de los proyectos.');

-- --------------------------------------------------------

--
-- Table structure for table `er`
--

CREATE TABLE `er` (
  `id_Alumno` int(11) NOT NULL PRIMARY KEY,
  `imagen` varchar(25) NOT NULL,
  FOREIGN KEY (id_Alumno) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `er`
--

INSERT INTO `er` (`id_Alumno`, `imagen`) VALUES
(5, 'yvr@gmail.com.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `objetivos`
--

CREATE TABLE `objetivos` (
  `cod_Objetivo` int(11) AUTO_INCREMENT PRIMARY KEY,
  `descripcion` varchar(500) NOT NULL,
  `id_Alumno` int(11) NOT NULL,
  FOREIGN KEY (id_Alumno) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `objetivos`
--

INSERT INTO `objetivos` (`cod_Objetivo`, `descripcion`, `id_Alumno`) VALUES
(290, 'Facilitar la organización y seguimiento de proyectos de fin de curso del FP Superior de  Desarrollo Web', 5),
(291, 'Mejorar la comunicación y colaboración entre estudiantes, profesores y administradores', 5),
(292, 'Proporcionar un espacio centralizado para la documentación y almacenamiento de proyectos', 5),
(293, 'Optimizar el proceso de evaluación y retroalimentación de los proyectos', 5);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `recursosh`
--

CREATE TABLE `recursosh` (
  `cod_Recurso` int(11) AUTO_INCREMENT PRIMARY KEY,
  `descripcion` varchar(500) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_Alumno` int(11) NOT NULL,
  FOREIGN KEY (id_Alumno) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `recursosh`
--

INSERT INTO `recursosh` (`cod_Recurso`, `descripcion`, `precio`, `id_Alumno`) VALUES
(7, 'Equipo de desarrollo: Programadores web, diseñadores UX/UI', 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `recursosm`
--

CREATE TABLE `recursosm` (
  `cod_Recurso` int(11) AUTO_INCREMENT PRIMARY KEY,
  `descripcion` varchar(500) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_Alumno` int(11) NOT NULL,
  FOREIGN KEY (id_Alumno) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `recursosm`
--

INSERT INTO `recursosm` (`cod_Recurso`, `descripcion`, `precio`, `id_Alumno`) VALUES
(4, 'Internet: Contrato mensual Fibra 1Gb', 29, 5),
(5, 'Dominio: dominio para apuntar los DNS al servidor.', 20, 5),
(6, ' Servidor: alquiler de servidor en AWS (Amazon Web Service) para el almacenamiento de la web', 20, 5),
(7, 'Ordenador: portátil para poder trabajar desde el trabajo y en caso en el proyecto', 800, 5),
(8, 'Curso formativo AWS', 16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tecnologias`
--

CREATE TABLE `tecnologias` (
  `cod_Tecnologia` int(11) AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `id_Alumno` int(11) NOT NULL,
  FOREIGN KEY (id_Alumno) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `tecnologias`
--

INSERT INTO `tecnologias` (`cod_Tecnologia`, `nombre`, `descripcion`, `enlace`, `id_Alumno`) VALUES
(7, 'HTML5', 'Estructura de la página web', 'https://developer.mozilla.org/es/docs/Web/HTML', 5),
(8, 'CSS', 'Estilos para la página web', 'https://developer.mozilla.org/es/docs/Web/CSS', 5),
(9, 'SCSS', 'Estilos para la página web, más potente que CSS', 'https://sass-lang.com/', 5),
(10, 'JavaScript', 'Control de eventos e interacciones', 'https://developer.mozilla.org/es/docs/Web/JavaScript', 5),
(11, 'PHP', 'Conexión a la base de datos', 'https://www.php.net/manual/es/intro-whatis.php', 5),
(12, 'AJAX', 'Permite a las aplicaciones web validar información específica en formularios antes de que los usuarios los envíen.', 'https://www.arsys.es/blog/que-es-ajax-en-desarrollo-web-y-como-funciona', 5),
(13, 'MySQL', 'Base de datos donde se almacena toda la información', 'https://www.mysql.com/', 5),
(14, 'Apache', 'Servidor web donde se almacena la web con su base de datos', 'https://httpd.apache.org/', 5);

