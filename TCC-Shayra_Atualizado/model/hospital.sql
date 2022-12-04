-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01/12/2022 às 01:25
-- Versão do servidor: 5.7.36
-- Versão do PHP: 7.4.26

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
-- Estrutura para tabela `administracao_recep`
--

DROP TABLE IF EXISTS `administracao_recep`;
CREATE TABLE IF NOT EXISTS `administracao_recep` (
  `cpf_adm` varchar(14) NOT NULL,
  `id_recepcao` int(11) NOT NULL,
  PRIMARY KEY (`cpf_adm`,`id_recepcao`),
  KEY `id_recepcao` (`id_recepcao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `administracao_recep`
--

INSERT INTO `administracao_recep` (`cpf_adm`, `id_recepcao`) VALUES
('333.333.333-33', 1),
('333.333.333-33', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `administricao_med`
--

DROP TABLE IF EXISTS `administricao_med`;
CREATE TABLE IF NOT EXISTS `administricao_med` (
  `cpf_adm` varchar(14) NOT NULL,
  `crm_med` varchar(15) NOT NULL,
  PRIMARY KEY (`cpf_adm`,`crm_med`),
  KEY `crm_med` (`crm_med`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `administricao_med`
--

INSERT INTO `administricao_med` (`cpf_adm`, `crm_med`) VALUES
('333.333.333-33', '12345-GO'),
('333.333.333-33', '25896-GO'),
('333.333.333-33', '56789-GO'),
('333.333.333-33', '65632-GO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_paciente`
--

DROP TABLE IF EXISTS `cad_paciente`;
CREATE TABLE IF NOT EXISTS `cad_paciente` (
  `id_recepcao` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `dt_cad` datetime NOT NULL,
  PRIMARY KEY (`id_recepcao`,`id_paciente`),
  KEY `id_paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cad_paciente`
--

INSERT INTO `cad_paciente` (`id_recepcao`, `id_paciente`, `dt_cad`) VALUES
(1, 1, '2022-10-28 00:00:00'),
(2, 2, '2022-11-27 17:21:39');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `crm_med` varchar(15) NOT NULL,
  `id_leitos` varchar(5) DEFAULT NULL,
  `id_recepcao` int(11) NOT NULL,
  `hr_inicio` datetime NOT NULL,
  `hr_fim` datetime DEFAULT NULL,
  PRIMARY KEY (`id_consulta`),
  KEY `id_recepcao` (`id_recepcao`),
  KEY `id_paciente` (`id_paciente`),
  KEY `crm_med` (`crm_med`),
  KEY `id_leitos` (`id_leitos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_paciente`, `crm_med`, `id_leitos`, `id_recepcao`, `hr_inicio`, `hr_fim`) VALUES
(1, 1, '12345-GO', 'Q1-L1', 1, '2022-11-27 17:21:39', NULL),
(2, 2, '56789-GO', 'Q1-L2', 2, '2022-11-27 17:21:39', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `escala`
--

DROP TABLE IF EXISTS `escala`;
CREATE TABLE IF NOT EXISTS `escala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hr_inicio` time NOT NULL,
  `hr_fim` time NOT NULL,
  `dia_semana` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `escala`
--

INSERT INTO `escala` (`id`, `hr_inicio`, `hr_fim`, `dia_semana`) VALUES
(1, '00:00:00', '12:00:00', 'Domingo'),
(2, '12:00:00', '00:00:00', 'Domingo'),
(3, '00:00:00', '12:00:00', 'Segunda-Feira'),
(4, '12:00:00', '00:00:00', 'Segunda-Feira'),
(5, '00:00:00', '12:00:00', 'Terça-Feira'),
(6, '12:00:00', '00:00:00', 'Terça-Feira'),
(7, '00:00:00', '12:00:00', 'Quarta-Feira'),
(8, '12:00:00', '00:00:00', 'Quarta-Feira'),
(9, '00:00:00', '12:00:00', 'Quinta-Feira'),
(10, '12:00:00', '00:00:00', 'Quinta-Feira'),
(11, '00:00:00', '12:00:00', 'Sexta-Feira'),
(12, '12:00:00', '00:00:00', 'Sexta-Feira'),
(13, '00:00:00', '12:00:00', 'Sábado'),
(14, '12:00:00', '00:00:00', 'Sábado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `escala_med`
--

DROP TABLE IF EXISTS `escala_med`;
CREATE TABLE IF NOT EXISTS `escala_med` (
  `id_escala` int(11) NOT NULL,
  `crm_med` varchar(15) NOT NULL,
  PRIMARY KEY (`id_escala`,`crm_med`),
  KEY `crm_med` (`crm_med`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `escala_med`
--

INSERT INTO `escala_med` (`id_escala`, `crm_med`) VALUES
(1, '12345-GO'),
(4, '12345-GO'),
(7, '12345-GO'),
(10, '12345-GO'),
(13, '12345-GO'),
(3, '25896-GO'),
(6, '25896-GO'),
(9, '25896-GO'),
(12, '25896-GO'),
(2, '56789-GO'),
(5, '56789-GO'),
(8, '56789-GO'),
(11, '56789-GO'),
(14, '56789-GO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nome_funcao` enum('Médico','Recepção','Gestor') NOT NULL,
  `dt_nasc` date NOT NULL,
  `salario` float NOT NULL,
  `id_hospital` int(11) NOT NULL,
  PRIMARY KEY (`cpf`),
  KEY `id_hospital` (`id_hospital`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`cpf`, `nome`, `nome_funcao`, `dt_nasc`, `salario`, `id_hospital`) VALUES
('222.222.222-22', 'Shayra Kelly', 'Médico', '1984-04-20', 15200, 1),
('232.323.232-32', 'Danielly Marinho', 'Médico', '1987-12-26', 2700, 1),
('333.333.333-33', 'Gessika Júlia', 'Gestor', '1987-05-30', 3920, 1),
('444.444.444-44', 'Igor Guerra', 'Médico', '1980-12-15', 101100, 1),
('555.555.555-55', 'Ana Luiza', 'Médico', '1982-01-19', 10000, 1),
('666.666.666-66', 'Luiz Guilherme', 'Recepção', '1960-03-12', 2560, 1),
('777.777.777-77', 'Hiago Carlos', 'Recepção', '1988-08-23', 2560, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `hospital`
--

INSERT INTO `hospital` (`id`, `nome`) VALUES
(1, 'Hospital - Goiás');

-- --------------------------------------------------------

--
-- Estrutura para tabela `leitos`
--

DROP TABLE IF EXISTS `leitos`;
CREATE TABLE IF NOT EXISTS `leitos` (
  `id_leitos` varchar(5) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_leitos`),
  KEY `id_paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `leitos`
--

INSERT INTO `leitos` (`id_leitos`, `id_paciente`) VALUES
('Q2-L1', NULL),
('Q2-L2', NULL),
('Q3-L1', NULL),
('Q3-L2', NULL),
('Q4-L1', NULL),
('Q4-L2', NULL),
('Q5-L1', NULL),
('Q5-L2', NULL),
('Q6-L1', NULL),
('Q6-L2', NULL),
('Q7-L1', NULL),
('Q7-L2', NULL),
('Q8-L1', NULL),
('Q8-L2', NULL),
('Q1-L1', 1),
('Q1-L2', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `cpf_funcionario` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_funcionario` (`cpf_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id`, `usuario`, `senha`, `data_cadastro`, `cpf_funcionario`) VALUES
(1, 'Shayra', '765', '2022-11-27 17:21:39', '222.222.222-22'),
(2, 'Gessika', '455', '2022-11-27 17:21:39', '333.333.333-33'),
(3, 'Igor', '157', '2022-11-27 17:21:39', '444.444.444-44'),
(4, 'Ana', '112', '2022-11-27 17:21:39', '555.555.555-55'),
(5, 'Luiz', '117', '2022-11-27 17:21:39', '666.666.666-66'),
(6, 'Hiago', '123', '2022-11-27 17:21:39', '777.777.777-77');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `crm` varchar(15) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `especialidade` varchar(15) NOT NULL,
  PRIMARY KEY (`crm`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`crm`, `cpf`, `especialidade`) VALUES
('12345-GO', '222.222.222-22', 'Oftalmologista'),
('25896-GO', '555.555.555-55', 'Psiquiatra'),
('56789-GO', '444.444.444-44', 'Cardiologista'),
('65632-GO', '232.323.232-32', 'Cardiologista');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dt_nasc` date NOT NULL,
  `situacao` varchar(20) NOT NULL,
  `plano_saude` varchar(30) NOT NULL,
  `parente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`id`, `cpf`, `nome`, `telefone`, `dt_nasc`, `situacao`, `plano_saude`, `parente`) VALUES
(1, '000.111.000.77', 'Stich Ohana', '(64) 99004-8952', '2002-04-03', 'Internação', 'IPASGO', 'Lilo Ohana - (Irmã)'),
(2, '111.111.777.77', 'João Frango', '(64) 99654-7812', '1984-09-27', 'Coma Induzido', 'Não', 'Raquel Teixeira - (Esposa)');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recepcao`
--

DROP TABLE IF EXISTS `recepcao`;
CREATE TABLE IF NOT EXISTS `recepcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) NOT NULL,
  `horaFuncionamento` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `recepcao`
--

INSERT INTO `recepcao` (`id`, `cpf`, `horaFuncionamento`) VALUES
(1, '777.777.777-77', '06:00-13:00'),
(2, '666.666.666-66', '13:00-20:00');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `administracao_recep`
--
ALTER TABLE `administracao_recep`
  ADD CONSTRAINT `administracao_recep_ibfk_1` FOREIGN KEY (`cpf_adm`) REFERENCES `funcionario` (`cpf`),
  ADD CONSTRAINT `administracao_recep_ibfk_2` FOREIGN KEY (`id_recepcao`) REFERENCES `recepcao` (`id`);

--
-- Restrições para tabelas `administricao_med`
--
ALTER TABLE `administricao_med`
  ADD CONSTRAINT `administricao_med_ibfk_1` FOREIGN KEY (`cpf_adm`) REFERENCES `funcionario` (`cpf`),
  ADD CONSTRAINT `administricao_med_ibfk_2` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`);

--
-- Restrições para tabelas `cad_paciente`
--
ALTER TABLE `cad_paciente`
  ADD CONSTRAINT `cad_paciente_ibfk_1` FOREIGN KEY (`id_recepcao`) REFERENCES `recepcao` (`id`),
  ADD CONSTRAINT `cad_paciente_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_recepcao`) REFERENCES `recepcao` (`id`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`),
  ADD CONSTRAINT `consulta_ibfk_4` FOREIGN KEY (`id_leitos`) REFERENCES `leitos` (`id_leitos`);

--
-- Restrições para tabelas `escala_med`
--
ALTER TABLE `escala_med`
  ADD CONSTRAINT `escala_med_ibfk_1` FOREIGN KEY (`id_escala`) REFERENCES `escala` (`id`),
  ADD CONSTRAINT `escala_med_ibfk_2` FOREIGN KEY (`crm_med`) REFERENCES `medico` (`crm`);

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id`);

--
-- Restrições para tabelas `leitos`
--
ALTER TABLE `leitos`
  ADD CONSTRAINT `leitos_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);

--
-- Restrições para tabelas `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`cpf_funcionario`) REFERENCES `funcionario` (`cpf`);

--
-- Restrições para tabelas `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_2` FOREIGN KEY (`cpf`) REFERENCES `funcionario` (`cpf`);

--
-- Restrições para tabelas `recepcao`
--
ALTER TABLE `recepcao`
  ADD CONSTRAINT `recepcao_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `funcionario` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
