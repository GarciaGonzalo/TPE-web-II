-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2020 a las 18:20:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `friends_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `chapter_number` int(11) NOT NULL,
  `director` varchar(50) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `emision_date` date NOT NULL,
  `id_season` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chapter`
--

INSERT INTO `chapter` (`id`, `title`, `chapter_number`, `director`, `writer`, `description`, `emision_date`, `id_season`) VALUES
(1, 'The One with All the Poker', 18, 'James Burrows', 'Jeff Astrof & Mike Sikowitz', 'The guys teach poker (Five-card draw) to the girls, who lose spectacularly. They ask Monica\'s aunt, Iris, a professional poker player, for help in the game, which makes them improve, albeit slightly, their poker skills. The girls keep playing with the guys in the hope of winning one game over them.\r\n\r\nTired of serving coffee at Central Perk and being called \"excuse me\" by people, Rachel sends out resumes for job opportunities. She gets an interview at Saks, Fifth Avenue, about a vacancy as a buyer\'s assistant.\r\n\r\nRoss picks up an old subject with Chandler and Joey - his love for Rachel. Ross tries to deny his feelings for Rachel, but the guys are skeptical about this. Determined to prove them wrong, he goes unusually hard on Rachel during the poker games. The two keep on bickering during a poker game, where things start to go well for Rachel when she wins a hand on Ross. In the middle of a dealt hand, she receives a call from Saks informing her that she hasn\'t been picked for the job.\r\n\r\nInstead of abandoning the game, she decides to take it out on Ross, raising the bets over the limit and making everyone fold. Ross decides to fold too, but she reminds him of his comments about not being a nice guy during poker, so he sits out the rest of the hand. The bets keep rising through the roof, and Rachel wins with a full house. Even though Ross accepts the defeat, realizing that it made Rachel happy during a difficult moment, some watchers may think that he had a better hand, and lost to make Rachel happy. Unluckily for him, Joey and Chandler now definitely confirm that he\'s in love with Rachel.', '1995-03-02', 1),
(2, 'The One Where No One\'s Ready', 2, 'Gail Mancuso', 'Ira Ungerleider', 'Ross arrives at Monica\'s apartment to discover Joey, Chandler and Rachel are not yet dressed for a function that evening. Joey sits on the chair Chandler was recently sitting in causing an argument between them, resulting in hummus staining Phoebe\'s dress. Meanwhile, Ross yells at Rachel causing her to say she will not go to the function. Chandler hides Joey\'s underwear, so Joey puts on all Chandler\'s clothes he can find. Ross is willing to go to extreme lengths to prove to Rachel that he is sorry.\r\n\r\nMeanwhile, Monica is thrown into doubt after her ex-boyfriend Richard leaves a message on her answering machine. Her friends tell her repeatedly that it\'s an old message, but she obsesses over it. Monica leaves what she believes is a breezy message, which clearly isn\'t when she plays it for the group. However, it\'s followed by a message from another woman. Monica freaks out again, but then she thinks it could be Michelle, Richard\'s daughter. She calls Michelle to confirm, but Michelle calls back and things get a little awkward. At the end of the episode, Monica leaves a new message for Richard blaming her previous actions on her period only to accidentally set it as his outgoing message. Monica panics and thinks the solution is getting the phone company to change his number. Phoebe says \"I think he\'ll be doing that himself after this\".', '1996-09-26', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `chapter_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `season`
--

INSERT INTO `season` (`id`, `season`, `chapter_count`) VALUES
(1, 1, 24),
(2, 3, 25),
(3, 2, 24),
(4, 4, 24),
(5, 5, 24),
(6, 6, 25),
(7, 7, 24),
(8, 8, 24),
(9, 9, 24),
(10, 10, 18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INDEX` (`id_season`);

--
-- Indices de la tabla `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`id_season`) REFERENCES `season` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
