-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Out-2023 às 22:44
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bemtequiz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Fauna'),
(2, 'Flora'),
(3, 'História'),
(4, 'Bioma');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `pergunta` text NOT NULL,
  `id_categorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta`, `id_categorias`) VALUES
(1, 'A floresta tropical amazônica, cobre boa parte do noroeste do Brasil e se estende até a Colômbia, o Peru e outros países da América do Sul.\r\n\r\nQual país abriga a maior parte da Floresta Amazônica?', 1),
(2, 'Verdadeiro ou falso: A Floresta Amazônica abriga aproximadamente 10% de todas as espécies conhecidas do planeta.', 1),
(15, 'Quantos biomas principais podem ser encontrados na Floresta Amazônica?', 4),
(16, 'Qual é o bioma terrestre mais extenso da América do Sul e contém parte significativa da Floresta Amazônica?', 4),
(17, 'Qual é o nome do bioma predominantemente presente na região norte da Floresta Amazônica?', 4),
(18, 'Qual é o nome do rio que atravessa a maior parte da Floresta Amazônica?', 4),
(19, 'Qual é o bioma ameaçado pela expansão da agricultura e do desmatamento na região da Floresta Amazônica?', 4),
(20, 'Qual é o maior felino da Floresta Amazônica?', 1),
(21, 'Quais aves são conhecidas por fazer ninhos em buracos de árvores na Floresta Amazônica?', 1),
(22, 'Qual réptil gigante é nativo da Floresta Amazônica e é conhecido por sua mandíbula poderosa?', 1),
(23, 'Qual macaco de grande porte é encontrado na Floresta Amazônica e é conhecido por seu rosto preto e pelos dourados?', 1),
(24, 'Qual réptil é conhecido por sua armadura de placas e é encontrado na Floresta Amazônica?', 1),
(25, 'Qual é a árvore mais alta da Floresta Amazônica?', 2),
(26, 'Qual planta é usada para fazer o guaraná, uma bebida energética?', 2),
(27, 'Qual é a planta que produz uma resina usada para fazer borracha?', 2),
(28, 'Qual é a árvore cuja casca é usada para fazer o quinino, um medicamento contra a malária?', 2),
(29, 'Qual é a árvore cujas sementes são usadas na produção de óleo de andiroba?', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `resposta` text NOT NULL,
  `pergunta_id` int(11) DEFAULT NULL,
  `correta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id`, `resposta`, `pergunta_id`, `correta`) VALUES
(1, 'Colômbia', 1, 0),
(2, 'Brasil', 1, 1),
(3, 'Peru', 1, 0),
(4, 'Bolívia', 1, 0),
(5, 'Verdadeiro', 2, 1),
(6, 'Falso', 2, 0),
(51, 'Dois', 15, 0),
(52, 'Três', 15, 0),
(53, 'Quatro', 15, 1),
(54, 'Cinco', 15, 0),
(55, 'Cerrado', 16, 0),
(56, 'Pampa', 16, 0),
(57, 'Mata Atlântica', 16, 0),
(58, 'Amazônia', 16, 1),
(59, 'Cerrado', 17, 0),
(60, 'Pampa', 17, 0),
(61, 'Mata Atlântica', 17, 0),
(62, 'Amazônia', 17, 1),
(63, 'Amazonas', 18, 1),
(64, 'Nilo', 18, 0),
(65, 'Yangtzé', 18, 0),
(66, 'Mississipi', 18, 0),
(67, 'Mata Atlântica', 19, 0),
(68, 'Cerrado', 19, 0),
(69, 'Pantanal', 19, 0),
(70, 'Cerrado', 19, 1),
(71, 'Jaguar', 20, 1),
(72, 'Onça-pintada', 20, 0),
(73, 'Puma', 20, 0),
(74, 'Leopardo', 20, 0),
(75, 'Tucanos', 21, 0),
(76, 'Araras', 21, 0),
(77, 'Pica-paus', 21, 1),
(78, 'Corujas', 21, 0),
(79, 'Jiboia', 22, 0),
(80, 'Jacaré', 22, 1),
(81, 'Tartaruga', 22, 0),
(82, 'Iguana', 22, 0),
(83, 'Mico-leão-dourado', 23, 0),
(84, 'Uacari', 23, 0),
(85, 'Macaco-prego', 23, 0),
(86, 'Macaco-aranha', 23, 1),
(87, 'Tartaruga', 24, 1),
(88, 'Jacaré', 24, 0),
(89, 'Cobra', 24, 0),
(90, 'Iguana', 24, 0),
(91, 'Sumaúma', 25, 1),
(92, 'Pau-brasil', 25, 0),
(93, 'Seringueira', 25, 0),
(94, 'Açaí', 25, 0),
(95, 'Guaranazeiro', 26, 1),
(96, 'Sumaúma', 26, 0),
(97, 'Cacau', 26, 0),
(98, 'Açaí', 26, 0),
(99, 'Seringueira', 27, 1),
(100, 'Açaí', 27, 0),
(101, 'Cacau', 27, 0),
(102, 'Sumaúma', 27, 0),
(103, 'Cinchona', 28, 1),
(104, 'Seringueira', 28, 0),
(105, 'Pau-brasil', 28, 0),
(106, 'Açaí', 28, 0),
(107, 'Andiroba', 29, 1),
(108, 'Pau-brasil', 29, 0),
(109, 'Seringueira', 29, 0),
(110, 'Cinamomo', 29, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'john13miranda@gmail.com', 'matakura', '$2y$10$Rari8977g445u3O.KjYd2emujTrEZTMOCrGB61FmYv.MU10BCjkna'),
(2, 'teste123@gmail.com', 'teste09', '$2y$10$FjmLvarI54FPvKpxg.NpHOvbzSfNwal7pAeGz8SOZTAD.j2d8zLtm'),
(3, 'kira135yagami@gmail.com', 'john', '$2y$10$qgct7lNvybk/9h/vd/pdyeZQshMZpgmXTUrZ4F6guXrk89nCoRvmS');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorias` (`id_categorias`);

--
-- Índices para tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pergunta_id` (`pergunta_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`id_categorias`) REFERENCES `categorias` (`id`);

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
