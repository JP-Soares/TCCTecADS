-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/11/2023 às 12:33
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helpolder`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `id_cuidador` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_saida` time NOT NULL,
  `turno` varchar(1) NOT NULL,
  `dia_semana` varchar(3) NOT NULL,
  `preco_turno` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `id_cuidador`, `hora_inicio`, `hora_saida`, `turno`, `dia_semana`, `preco_turno`) VALUES
(59, 1, '06:00:00', '12:00:00', 'm', 'dom', '200'),
(60, 1, '13:00:00', '17:00:00', 't', 'seg', '200'),
(61, 1, '18:00:00', '23:00:00', 'n', 'ter', '300'),
(62, 1, '13:00:00', '17:00:00', 't', 'qua', '80');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `id_cuidador` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `qtde_estrela` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `id_cuidador` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `id_idoso` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `statusConsulta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_cuidador`, `id_responsavel`, `id_idoso`, `id_agenda`, `statusConsulta`) VALUES
(4, 1, 1, 3, 61, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cuidador`
--

CREATE TABLE `cuidador` (
  `id_cuidador` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `foto` blob DEFAULT NULL,
  `registroProfissional` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `dtNasc` date NOT NULL,
  `descricao` text DEFAULT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cuidador`
--

INSERT INTO `cuidador` (`id_cuidador`, `nome`, `cpf`, `foto`, `registroProfissional`, `sexo`, `dtNasc`, `descricao`, `telefone`, `email`, `senha`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `complemento`) VALUES
(1, 'Ana', '123.456.789-11', 0x35383032323463353431306536376437356233326261306362666564633165622e6a7067, '753', 'Feminino', '2000-06-07', 'Sou uma ótima cuidadora de idosa', '(12)3456-7898', 'ana@ana.com', '12345678', 'AC', 'Cidade', 'Bairro', 'Rua', '89', 'Apt 234 Bloco 2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `idoso`
--

CREATE TABLE `idoso` (
  `id_idoso` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `dtNasc` date NOT NULL,
  `descricao` text DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `enfermidades` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `idoso`
--

INSERT INTO `idoso` (`id_idoso`, `id_responsavel`, `nome`, `cpf`, `sexo`, `dtNasc`, `descricao`, `telefone`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `enfermidades`) VALUES
(2, 1, 'Ariosvaldo', '888.888.888-88', 'Masculino', '1954-10-15', 'Sou um idoso que gosta de xadrez.\r\nUso andador', '(89)8988-0958', 'AC', 'Cidade do Norte', 'Bairro do Norte', 'Rua do Norte', '1231', '', 'enfermidade2, enfermidade3'),
(3, 1, 'Maria Aparecida', '963.852.741-11', 'Feminino', '1958-01-23', 'Sou uma idosa que adora flores e caminhar no parque', '(98)9898-9898', 'AM', 'Manaus', 'Bairro do Limoeiro', 'Rua dos Limões', '89', '', 'enfermidade1, enfermidade2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `id_responsavel` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `foto` blob DEFAULT NULL,
  `sexo` varchar(10) NOT NULL,
  `dtNasc` date NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `responsavel`
--

INSERT INTO `responsavel` (`id_responsavel`, `nome`, `cpf`, `foto`, `sexo`, `dtNasc`, `telefone`, `email`, `senha`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `complemento`) VALUES
(1, 'Ivone', '878.945.950-89', NULL, 'Feminino', '2000-11-02', '(31)2313-1312', 'ivone@ivone.com', '12345678', 'RN', 'Cidade do Norte', 'Bairro do Norte', 'Rua do Norte', '365', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_cuidador` (`id_cuidador`);

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `id_cuidador` (`id_cuidador`),
  ADD KEY `id_responsavel` (`id_responsavel`);

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_cuidador` (`id_cuidador`),
  ADD KEY `id_responsavel` (`id_responsavel`),
  ADD KEY `id_idoso` (`id_idoso`),
  ADD KEY `id_agenda` (`id_agenda`);

--
-- Índices de tabela `cuidador`
--
ALTER TABLE `cuidador`
  ADD PRIMARY KEY (`id_cuidador`);

--
-- Índices de tabela `idoso`
--
ALTER TABLE `idoso`
  ADD PRIMARY KEY (`id_idoso`),
  ADD KEY `id_responsavel` (`id_responsavel`);

--
-- Índices de tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`id_responsavel`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cuidador`
--
ALTER TABLE `cuidador`
  MODIFY `id_cuidador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `idoso`
--
ALTER TABLE `idoso`
  MODIFY `id_idoso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `id_responsavel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_cuidador`) REFERENCES `cuidador` (`id_cuidador`);

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`id_cuidador`) REFERENCES `cuidador` (`id_cuidador`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`id_responsavel`) REFERENCES `responsavel` (`id_responsavel`);

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_cuidador`) REFERENCES `cuidador` (`id_cuidador`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_responsavel`) REFERENCES `responsavel` (`id_responsavel`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`id_idoso`) REFERENCES `idoso` (`id_idoso`),
  ADD CONSTRAINT `consulta_ibfk_4` FOREIGN KEY (`id_agenda`) REFERENCES `agenda` (`id_agenda`);

--
-- Restrições para tabelas `idoso`
--
ALTER TABLE `idoso`
  ADD CONSTRAINT `idoso_ibfk_1` FOREIGN KEY (`id_responsavel`) REFERENCES `responsavel` (`id_responsavel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
