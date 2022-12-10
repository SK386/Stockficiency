-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2022 at 11:50 AM
-- Server version: 10.5.15-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Stockficiency`
--

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` mediumint(8) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `email`, `senha`) VALUES
(1, 'oi@gmail.com', '$2y$10$3J592FT9FigLlhUoT0.FjeEMoblgybbQOcH911K9gRWjZe0h96mj6'),
(2, 'dagvjr@gmail.com', '$2y$10$TErM99tBu.dQenBKllL8FuNqIyvptVnDTxmcCAww8FMtn97vRG4/6'),
(4, 'teste1@gmail.com', '$2y$10$mO.u1GyGTW7XMAaXOXcW2eh8SzLCRKoJGpqvMgY6wU1fcjkYlEFS.'),
(5, 'teste@gmail.com', '$2y$10$PRBjdMBnfKqN21JC5DG0aOC57GyYhDM7RSt85pBFPIjD9v4TabyMq');

-- --------------------------------------------------------

--
-- Table structure for table `encomendas`
--

CREATE TABLE `encomendas` (
  `id_encomenda` bigint(20) UNSIGNED NOT NULL,
  `origem` varchar(75) NOT NULL,
  `destino` varchar(75) NOT NULL,
  `horario_do_envio` datetime NOT NULL,
  `observacao` tinytext DEFAULT NULL,
  `empresa_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `encomendas`
--

INSERT INTO `encomendas` (`id_encomenda`, `origem`, `destino`, `horario_do_envio`, `observacao`, `empresa_id`) VALUES
(1, 'aqui', 'ali', '2022-11-03 08:44:00', 'vou enviar n...', 1),
(4, 'ewq', 'weeeeeeeeee', '2022-11-03 10:18:00', '', 1),
(6, 'eu', 'vc', '2022-11-20 13:42:00', '', 1),
(7, 'aqui', 'bem ali', '2022-12-02 22:51:00', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `encomendas_produtos`
--

CREATE TABLE `encomendas_produtos` (
  `encomenda_id` bigint(20) UNSIGNED NOT NULL,
  `produto_id` int(10) UNSIGNED NOT NULL,
  `quantidade` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `encomendas_produtos`
--

INSERT INTO `encomendas_produtos` (`encomenda_id`, `produto_id`, `quantidade`) VALUES
(1, 1, 3),
(1, 6, 4),
(1, 7, 3),
(1, 1, 3),
(4, 1, 33),
(6, 1, 2),
(6, 6, 1),
(7, 10, 350);

-- --------------------------------------------------------

--
-- Table structure for table `financas`
--

CREATE TABLE `financas` (
  `periodo` date NOT NULL,
  `ganhos` decimal(11,2) UNSIGNED NOT NULL,
  `despesas` decimal(11,2) UNSIGNED NOT NULL,
  `empresa_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financas`
--

INSERT INTO `financas` (`periodo`, `ganhos`, `despesas`, `empresa_id`) VALUES
('2022-11-18', '590.00', '179.00', 1),
('2022-11-10', '700.00', '358.00', 1),
('2022-11-30', '689.00', '100.00', 1),
('2022-11-07', '222.00', '11.00', 1),
('2022-11-02', '343.00', '5.00', 1),
('2022-11-22', '434.00', '546.00', 1),
('2022-12-14', '2432.00', '565.00', 1),
('2022-12-21', '2344.00', '546.00', 1),
('2022-12-27', '3564.00', '342.00', 1),
('2022-12-16', '3234.00', '432.00', 1),
('2022-12-03', '4234.00', '234.00', 1),
('2022-11-09', '2342.00', '234.00', 1),
('2022-11-08', '654.00', '543.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `qtd_estoque` mediumint(8) UNSIGNED NOT NULL,
  `preco` decimal(9,2) NOT NULL,
  `validade` date DEFAULT NULL,
  `garantia` date DEFAULT NULL,
  `empresa_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `qtd_estoque`, `preco`, `validade`, `garantia`, `empresa_id`) VALUES
(1, 'Mc. Chicken', 54, '455.00', '2022-11-07', '2022-11-28', 1),
(6, 'Mc. Fritas', 3, '45.00', NULL, NULL, 1),
(7, 'Mc. Lanche feliz', 4, '43.00', '2025-06-03', '2030-06-21', 1),
(10, 'sim', 1, '40.00', NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`id_encomenda`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Indexes for table `encomendas_produtos`
--
ALTER TABLE `encomendas_produtos`
  ADD KEY `encomenda_id` (`encomenda_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Indexes for table `financas`
--
ALTER TABLE `financas`
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `id_encomenda` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `encomendas`
--
ALTER TABLE `encomendas`
  ADD CONSTRAINT `encomendas_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id_empresa`);

--
-- Constraints for table `encomendas_produtos`
--
ALTER TABLE `encomendas_produtos`
  ADD CONSTRAINT `encomendas_produtos_ibfk_1` FOREIGN KEY (`encomenda_id`) REFERENCES `encomendas` (`id_encomenda`),
  ADD CONSTRAINT `encomendas_produtos_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id_produto`);

--
-- Constraints for table `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
