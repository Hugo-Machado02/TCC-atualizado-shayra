-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Set-2022 às 18:06
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hospital`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administração_recep`
--

CREATE TABLE `administração_recep` (
  `cpf_adm` varchar(14) NOT NULL,
  `cpf_recepcao` varchar(14) NOT NULL,
  `crm_med` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administriçao_med`
--

CREATE TABLE `administriçao_med` (
  `cpf_adm` varchar(14) NOT NULL,
  `crm_med` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_paciente`
--

CREATE TABLE `cad_paciente` (
  `cpf_recepcao` varchar(14) NOT NULL,
  `cpf_paciente` varchar(14) NOT NULL,
  `dt_cad` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `cpf_paciente` varchar(14) NOT NULL,
  `crm_med` varchar(15) NOT NULL,
  `id_leitos` int(11) DEFAULT NULL,
  `cpf_recepcao` varchar(14) NOT NULL,
  `hr_inicio` time NOT NULL,
  `hr_fim` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escala`
--

CREATE TABLE `escala` (
  `id` int(11) NOT NULL,
  `hr_inicio` time NOT NULL,
  `hr_fim` time NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escala_med`
--

CREATE TABLE `escala_med` (
  `id_escala` int(11) NOT NULL,
  `crm_med` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpf` varchar(14) NOT NULL,
  `id_hospital` int(11) NOT NULL,
  `nome_funcao` enum('medico','recepcao','gestor') NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitos`
--

CREATE TABLE `leitos` (
  `id_leitos` int(11) NOT NULL,
  `cpf_paciente` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `usuario_id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `crm` varchar(15) NOT NULL,
  `escala_med` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `dt_nasc` date NOT NULL,
  `salario` float NOT NULL,
  `especialidade` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dt_nasc` date NOT NULL,
  `situacao` varchar(20) NOT NULL,
  `plano_saude` varchar(30) NOT NULL,
  `parente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recepcao`
--

CREATE TABLE `recepcao` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `horaFuncionamento` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administração_recep`
--
ALTER TABLE `administração_recep`
  ADD PRIMARY KEY (`cpf_adm`,`cpf_recepcao`,`crm_med`),
  ADD KEY `crm_med` (`crm_med`),
  ADD KEY `cpf_recepcao` (`cpf_recepcao`);

--
-- Índices para tabela `administriçao_med`
--
ALTER TABLE `administriçao_med`
  ADD PRIMARY KEY (`cpf_adm`,`crm_med`),
  ADD KEY `crm_med` (`crm_med`);

--
-- Índices para tabela `cad_paciente`
--
ALTER TABLE `cad_paciente`
  ADD PRIMARY KEY (`cpf_recepcao`,`cpf_paciente`),
  ADD KEY `cpf_paciente` (`cpf_paciente`);

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `cpf_recepcao` (`cpf_recepcao`),
  ADD KEY `cpf_paciente` (`cpf_paciente`),
  ADD KEY `crm_med` (`crm_med`),
  ADD KEY `id_leitos` (`id_leitos`);

--
-- Índices para tabela `escala`
--
ALTER TABLE `escala`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `escala_med`
--
ALTER TABLE `escala_med`
  ADD PRIMARY KEY (`id_escala`,`crm_med`),
  ADD KEY `crm_med` (`crm_med`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `id_hospital` (`id_hospital`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `leitos`
--
ALTER TABLE `leitos`
  ADD PRIMARY KEY (`id_leitos`),
  ADD KEY `cpf_paciente` (`cpf_paciente`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`crm`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `escala_med` (`escala_med`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `recepcao`
--
ALTER TABLE `recepcao`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `escala`
--
ALTER TABLE `escala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `administração_recep`
--
ALTER TABLE `administração_recep`
  ADD CONSTRAINT `administração_recep_ibfk_1` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`),
  ADD CONSTRAINT `administração_recep_ibfk_2` FOREIGN KEY (`cpf_recepcao`) REFERENCES `recepcao` (`cpf`);

--
-- Limitadores para a tabela `administriçao_med`
--
ALTER TABLE `administriçao_med`
  ADD CONSTRAINT `administriçao_med_ibfk_1` FOREIGN KEY (`cpf_adm`) REFERENCES `funcionario` (`cpf`),
  ADD CONSTRAINT `administriçao_med_ibfk_2` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`);

--
-- Limitadores para a tabela `cad_paciente`
--
ALTER TABLE `cad_paciente`
  ADD CONSTRAINT `cad_paciente_ibfk_1` FOREIGN KEY (`cpf_recepcao`) REFERENCES `recepcao` (`cpf`),
  ADD CONSTRAINT `cad_paciente_ibfk_2` FOREIGN KEY (`cpf_paciente`) REFERENCES `paciente` (`cpf`);

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`cpf_recepcao`) REFERENCES `recepcao` (`cpf`),
  ADD CONSTRAINT `consulta_ibfk_10` FOREIGN KEY (`id_leitos`) REFERENCES `leitos` (`id_leitos`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`cpf_paciente`) REFERENCES `paciente` (`cpf`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`),
  ADD CONSTRAINT `consulta_ibfk_4` FOREIGN KEY (`cpf_recepcao`) REFERENCES `recepcao` (`cpf`),
  ADD CONSTRAINT `consulta_ibfk_5` FOREIGN KEY (`cpf_paciente`) REFERENCES `paciente` (`cpf`),
  ADD CONSTRAINT `consulta_ibfk_6` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`),
  ADD CONSTRAINT `consulta_ibfk_7` FOREIGN KEY (`cpf_recepcao`) REFERENCES `recepcao` (`cpf`),
  ADD CONSTRAINT `consulta_ibfk_8` FOREIGN KEY (`cpf_paciente`) REFERENCES `paciente` (`cpf`),
  ADD CONSTRAINT `consulta_ibfk_9` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`);

--
-- Limitadores para a tabela `escala_med`
--
ALTER TABLE `escala_med`
  ADD CONSTRAINT `escala_med_ibfk_1` FOREIGN KEY (`id_escala`) REFERENCES `escala` (`id`),
  ADD CONSTRAINT `escala_med_ibfk_2` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`),
  ADD CONSTRAINT `escala_med_ibfk_3` FOREIGN KEY (`id_escala`) REFERENCES `escala` (`id`),
  ADD CONSTRAINT `escala_med_ibfk_4` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`),
  ADD CONSTRAINT `escala_med_ibfk_5` FOREIGN KEY (`id_escala`) REFERENCES `escala` (`id`),
  ADD CONSTRAINT `escala_med_ibfk_6` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id`),
  ADD CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `login` (`usuario_id`);

--
-- Limitadores para a tabela `leitos`
--
ALTER TABLE `leitos`
  ADD CONSTRAINT `leitos_ibfk_1` FOREIGN KEY (`cpf_paciente`) REFERENCES `paciente` (`cpf`);

--
-- Limitadores para a tabela `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`escala_med`) REFERENCES `escala` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;