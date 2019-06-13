CREATE TABLE IF NOT EXISTS `tasks` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `priority` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;


INSERT INTO `tasks` (`id`, `titulo`, `description`, `priority`) VALUES
(1, 'Concluir Projeto', 'Concluir o projeto no tempo da sprint.','2'),
(2, 'Inserir botao na pagina inicial', 'Gadgets, inserir botas de impressao na pagina inicial do boleto.', '3'),
(3, 'Verificar sql criando index', 'melhorar consultas sql', '1')
