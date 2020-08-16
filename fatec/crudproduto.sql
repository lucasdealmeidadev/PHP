-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Ago-2020 às 18:45
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crudproduto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` text DEFAULT NULL,
  `dataCadastro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `quantidade`, `descricao`, `dataCadastro`) VALUES
(2, 'TV LCD SAMSUNG', '99999999.99', 200, 'Produto sem descrição', '2020-05-26 23:30:04'),
(65, 'João da Silvâ', '120.00', 23, 'sdffsdfsd', '2020-06-28 18:30:16'),
(66, '33', '333.00', 333, '333', '2020-06-28 19:45:27'),
(67, '333', '333.00', 33, '333', '2020-06-28 19:45:27'),
(68, '333', '33.00', 333, '3', '2020-06-28 19:45:27'),
(69, '333', '33.00', 3, '33', '2020-06-28 19:45:27'),
(70, '3', '3.00', 3, '33', '2020-06-28 19:45:27'),
(71, '3', '3.00', 333, '33', '2020-06-28 19:45:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `login` varchar(128) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `permissao` varchar(50) NOT NULL,
  `img_perfil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`login`, `nome`, `senha`, `email`, `permissao`, `img_perfil`) VALUES
('admin', 'Admin', '$2y$10$hzaViWjdcHapQuRz0Tgq6u/bDLgIz7D4rskGDEbR2hiu9kYXgUyT2', 'admin@admin.com.br', 'Admin', '566ee0ae82bee174ca0300dahomer-simpson.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
