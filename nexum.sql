-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05-Set-2024 às 14:27
-- Versão do servidor: 5.6.34
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nexum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `numero_matricula` int(11) NOT NULL,
  `email_institucional` varchar(200) NOT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `unidade_federativa` varchar(2) NOT NULL,
  `moradia` varchar(5) NOT NULL,
  `quant_reprovacao` int(11) NOT NULL,
  `acompanhamento_aee` varchar(45) DEFAULT NULL,
  `acompanhamento_cai` varchar(45) DEFAULT NULL,
  `acompanhamento_saude` varchar(45) DEFAULT NULL,
  `cota` int(11) DEFAULT NULL,
  `auxilio_permanencia` varchar(15) DEFAULT NULL,
  `apoio_psicologico` varchar(15) DEFAULT NULL,
  `projeto_extensao` varchar(50) DEFAULT NULL,
  `projeto_pesquisa` varchar(50) DEFAULT NULL,
  `projeto_ensino` varchar(50) DEFAULT NULL,
  `estagio` varchar(50) DEFAULT NULL,
  `equip_emprest` varchar(200) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome`, `numero_matricula`, `email_institucional`, `genero`, `cidade`, `data_nascimento`, `unidade_federativa`, `moradia`, `quant_reprovacao`, `acompanhamento_aee`, `acompanhamento_cai`, `acompanhamento_saude`, `cota`, `auxilio_permanencia`, `apoio_psicologico`, `projeto_extensao`, `projeto_pesquisa`, `projeto_ensino`, `estagio`, `equip_emprest`, `foto`, `id_turma`) VALUES
(11, 'isadora', 2022303410, 'isadora.2022303410@aluno.iffar.edu.br', '', 'constantina', '2007-03-02', 'RS', 'A09', 0, '', '', '', 0, '', '', '', '', '', '', '', '556cfd994eed6bb79d43a7156bcf667f.jpeg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ano`
--

CREATE TABLE `ano` (
  `id_ano` int(11) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ano`
--

INSERT INTO `ano` (`id_ano`, `ano`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Administrador'),
(2, 'Setor de Apoio Pedagogico'),
(3, 'Professor'),
(4, 'Setores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `coordenador` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `carga_horaria`, `coordenador`) VALUES
(2, 'TÃ©cnico em InformÃ¡tica', 1234, 'George'),
(3, 'TÃ©cnico em AgropecuÃ¡ria', 1234, ''),
(4, 'TÃ©cnico em AdministraÃ§Ã£o', 1234, 'Marcos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `quant_periodos` int(11) NOT NULL,
  `recuperacao_paralela1` text NOT NULL,
  `recuperacao_paralela2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `conselheiro` varchar(45) DEFAULT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `numero`, `ano`, `conselheiro`, `id_curso`) VALUES
(1, 24, 2, '0', 2),
(3, 34, 3, '0', 2),
(4, 33, 3, 'RogÃ©rio', 3),
(5, 14, 1, NULL, 2),
(6, 35, 3, 'RogÃ©rio', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_disciplina`
--

CREATE TABLE `turma_disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `categoria` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `cpf`, `categoria`) VALUES
(2, 'adm', 'tese@gmail', '12345', 9845676545, 1),
(3, 'Gustavo', 'gustavinho@gmail.com', '12345678', 34565445665, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices para tabela `ano`
--
ALTER TABLE `ano`
  ADD PRIMARY KEY (`id_ano`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `ano`
--
ALTER TABLE `ano`
  MODIFY `id_ano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
