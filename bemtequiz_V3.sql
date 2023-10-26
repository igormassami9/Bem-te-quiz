-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Out-2023 às 16:36
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
  `id_categorias` int(11) NOT NULL,
  `curiosidades` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta`, `id_categorias`, `curiosidades`) VALUES
(1, 'A floresta tropical amazônica cobre boa parte do noroeste do Brasil e se estende até a Colômbia, o Peru e outros países da América do Sul. Qual país abriga a maior parte da Floresta Amazônica?', 1, 'A Floresta Amazônica é a maior floresta tropical do mundo e abriga uma incrível diversidade de vida selvagem e plantas exóticas. Ela é frequentemente chamada de \"pulmão do mundo\" devido à sua importância na absorção de dióxido de carbono e na produção de oxigênio para a Terra.'),
(2, 'Verdadeiro ou falso: A Floresta Amazônica abriga aproximadamente 10% de todas as espécies conhecidas do planeta.', 1, 'Verdadeiro! A Floresta Amazônica é um dos lugares mais diversos em termos de espécies de plantas e animais. Estima-se que ela abriga cerca de 10% de todas as espécies conhecidas no planeta.'),
(3, 'Qual dos seguintes exploradores europeus é creditado por ter sido um dos primeiros a explorar a região da Floresta Amazônica durante o século XVI?', 3, 'Francisco de Orellana, um explorador espanhol, é creditado por ter sido um dos primeiros a explorar a região da Floresta Amazônica durante o século XVI. Sua expedição ao longo do rio Amazonas foi uma jornada histórica de descoberta e aventura.'),
(4, 'Quem foi o explorador europeu que, durante sua expedição no século XVI, nomeou o rio Amazonas e explorou a região da Floresta Amazônica?', 3, 'O explorador europeu que nomeou o rio Amazonas e explorou a região da Floresta Amazônica durante o século XVI foi Francisco de Orellana. Sua expedição foi uma parte significativa da história da exploração da região.'),
(5, 'Quem liderou a primeira expedição europeia conhecida a explorar o rio Amazonas e a Floresta Amazônica?', 3, 'A primeira expedição europeia conhecida a explorar o rio Amazonas e a Floresta Amazônica foi liderada por Vicente Yáñez Pinzón, um navegador e explorador espanhol.'),
(6, 'Qual destes animais é nativo da Floresta Amazônica?', 1, 'O tamanduá-bandeira, também conhecido como papa-formigas gigante, é um mamífero nativo da Floresta Amazônica. Ele se alimenta principalmente de formigas e cupins.'),
(7, 'Qual destes animais é conhecido por sua coloração e canto exuberante na Floresta Amazônica?', 1, 'O pássaro conhecido como \"Tucano\" é famoso por sua coloração vibrante e canto exuberante na Floresta Amazônica. Os tucanos são aves impressionantes e icônicas da região.'),
(8, 'Qual destas árvores é uma espécie emblemática da Floresta Amazônica, conhecida por suas sementes que são usadas na produção de bijuterias?', 2, 'A árvore da castanha-do-pará, ou Bertholletia excelsa, é uma espécie emblemática da Floresta Amazônica. Suas sementes, conhecidas como castanhas, são usadas na produção de bijuterias e alimentos.'),
(9, 'Qual destas plantas é uma trepadeira nativa da Floresta Amazônica que produz frutos em forma de cachos de uva?', 2, 'A planta conhecida como \"cipó-uva\" é uma trepadeira nativa da Floresta Amazônica que produz frutos em forma de cachos de uva.'),
(10, 'Onde está localizado o bioma Pampa, que é caracterizado por vastas áreas de campos e coxilhas?', 4, 'O bioma Pampa está localizado no extremo sul do Brasil, abrangendo partes dos estados do Rio Grande do Sul e Santa Catarina.'),
(11, 'Qual destes animais é conhecido como o maior felino das Américas e é frequentemente associado à Floresta Amazônica?', 1, 'A onça-pintada é o maior felino das Américas e é frequentemente associada à Floresta Amazônica devido à sua distribuição na região.'),
(12, 'Qual espécie de primata, conhecida por sua coloração preta e vermelha, é endêmica da Floresta Amazônica?', 1, 'O macaco-aranha é uma espécie de primata endêmica da Floresta Amazônica, conhecida por sua coloração preta e vermelha.'),
(13, 'Qual é o nome do maior réptil da Floresta Amazônica, conhecido por sua aparência pré-histórica?', 1, 'O jacaré-açu é o maior réptil da Floresta Amazônica e é conhecido por sua aparência pré-histórica.'),
(14, 'Qual é o maior mamífero aquático da Amazônia, frequentemente encontrado em seus rios e afluentes?', 1, 'O boto-cor-de-rosa é o maior mamífero aquático da Amazônia e é frequentemente encontrado em seus rios e afluentes.'),
(15, 'Qual destes animais é uma espécie de peixe que faz parte da dieta de diversas espécies na Floresta Amazônica?', 1, 'O pirarucu é uma espécie de peixe nativa da Floresta Amazônica e faz parte da dieta de diversas espécies na região.'),
(16, 'Qual foi a primeira expedição espanhola a explorar a Floresta Amazônica durante o século XVI?', 3, 'A primeira expedição espanhola a explorar a Floresta Amazônica foi liderada por Francisco de Orellana, que também foi o primeiro a navegar o rio Amazonas.'),
(17, 'Quem é creditado por documentar extensivamente a flora e fauna da Floresta Amazônica durante uma expedição no início do século XIX ?', 3, 'O cientista e explorador alemão Alexander von Humboldt é creditado por documentar extensivamente a flora e fauna da Floresta Amazônica durante sua expedição no início do século XIX.'),
(18, 'Quem liderou a primeira expedição europeia a explorar o rio Amazonas?', 3, 'A primeira expedição europeia conhecida a explorar o rio Amazonas foi liderada por Vicente Yáñez Pinzón, um navegador e explorador espanhol.'),
(19, 'Quem é considerado o conquistador espanhol que explorou a região amazônica durante a conquista do Peru?', 3, 'Francisco de Orellana, um conquistador espanhol, é conhecido por sua exploração da região amazônica durante a conquista do Peru.'),
(20, 'Quem foi o naturalista inglês que viajou pela Floresta Amazônica no século XIX e é conhecido por seu trabalho na área de biologia?', 3, 'O naturalista inglês Henry Walter Bates viajou pela Floresta Amazônica no século XIX e é conhecido por seu trabalho pioneiro na área de biologia e entomologia.'),
(21, 'Qual é a maior árvore da Floresta Amazônica e uma das mais altas do mundo?', 2, 'A samaúma é a maior árvore da Floresta Amazônica e uma das mais altas do mundo, podendo atingir alturas excepcionais.'),
(22, 'Quais dessas plantas é uma trepadeira que produz cachos de frutos roxos amplamente encontrada na Floresta Amazônica?', 2, 'A planta conhecida como \"cipó-uva\" é uma trepadeira nativa da Floresta Amazônica que produz cachos de frutos roxos.'),
(23, 'Quais desses animais são frequentemente vistos nas águas da Floresta Amazônica e são conhecidos por seus olhos brilhantes?', 1, 'Os jacarés são frequentemente vistos nas águas da Floresta Amazônica e são conhecidos por seus olhos brilhantes que refletem a luz, tornando-os visíveis durante a noite.'),
(24, 'Qual planta da Floresta Amazônica é conhecida por suas sementes que são usadas para fazer colares e artesanato?', 2, 'A planta da Floresta Amazônica conhecida por suas sementes usadas para fazer colares e artesanato é o açaí.'),
(25, 'Onde está localizado o bioma Pampa, que é caracterizado por vastas áreas de campos e coxilhas?', 4, 'O bioma Pampa está localizado no extremo sul do Brasil, abrangendo partes dos estados do Rio Grande do Sul e Santa Catarina.'),
(26, 'Que mamífero da Floresta Amazônica é conhecido por sua língua longa e pegajosa, que é usada para capturar insetos?', 1, 'O tamanduá-bandeira, um mamífero da Floresta Amazônica, é conhecido por sua língua longa e pegajosa, que é usada para capturar insetos.'),
(27, 'Qual destas plantas da Floresta Amazônica é usada na produção de borracha?', 2, 'A seringueira é uma planta da Floresta Amazônica amplamente conhecida por sua seiva, que é usada na produção de borracha.'),
(28, 'Qual explorador foi fundamental na divulgação da lenda de El Dorado e explorou áreas próximas à Floresta Amazônica no século XVI?', 3, 'O explorador espanhol Francisco de Orellana foi fundamental na divulgação da lenda de El Dorado e explorou áreas próximas à Floresta Amazônica no século XVI.'),
(29, 'Qual é o nome do fenômeno climático que influencia fortemente a região da Floresta Amazônica e é responsável por chuvas abundantes?', 4, 'O fenômeno climático conhecido como \"El Niño\" influencia fortemente a região da Floresta Amazônica, muitas vezes resultando em chuvas abundantes e inundações.'),
(30, 'Que pássaro colorido da Floresta Amazônica é famoso por suas penas brilhantes e é frequentemente associado à captura de serpentes venenosas?', 1, 'O pássaro colorido da Floresta Amazônica famoso por suas penas brilhantes e por ser frequentemente associado à captura de serpentes venenosas é a harpia.'),
(31, 'Qual planta da Floresta Amazônica é amplamente utilizada na produção de chocolate?', 2, 'O cacaueiro é a planta da Floresta Amazônica amplamente utilizada na produção de chocolate, pois suas sementes são a principal matéria-prima do chocolate.'),
(32, 'Qual cientista e naturalista britânico é conhecido por sua expedição à Floresta Amazônica e seus estudos sobre vida selvagem?', 3, 'O cientista e naturalista britânico Henry Walter Bates é conhecido por sua expedição à Floresta Amazônica e seus estudos sobre a vida selvagem na região.'),
(33, 'Qual destes animais é um grande mamífero aquático frequentemente encontrado nos rios da Floresta Amazônica?', 4, 'O peixe-boi é um grande mamífero aquático frequentemente encontrado nos rios da Floresta Amazônica.'),
(34, 'Verdadeiro ou falso: A onça-pintada é o maior felino da Floresta Amazônica.', 1, 'A onça-pintada é o maior felino da Floresta Amazônica, conhecido por sua beleza e força.'),
(35, 'Verdadeiro ou falso: A castanheira é uma árvore nativa da Floresta Amazônica que produz castanhas-do-Pará.', 2, 'A castanheira é uma árvore nativa da Floresta Amazônica que produz as famosas castanhas-do-Pará, ricas em nutrientes.'),
(36, 'Quem é conhecido por liderar expedições em busca de El Dorado na região da Floresta Amazônica?', 3, 'Várias expedições em busca de El Dorado na região da Floresta Amazônica foram lideradas por conquistadores espanhóis, como Gonzalo Pizarro.'),
(37, 'Verdadeiro ou falso: A Floresta Amazônica é o maior bioma do Brasil e abrange nove países da América do Sul.', 4, 'A Floresta Amazônica é o maior bioma do Brasil e abrange nove países da América do Sul, tornando-a uma das áreas mais biodiversas do mundo.'),
(38, 'Verdadeiro ou falso: O boto-cor-de-rosa é uma espécie de golfinho de água doce que habita os rios da Floresta Amazônica.', 1, 'O boto-cor-de-rosa é uma espécie de golfinho de água doce que habita os rios da Floresta Amazônica e é conhecido por sua coloração rosada.'),
(39, 'Verdadeiro ou falso: O açaí é uma fruta da Floresta Amazônica conhecida por seu alto teor de antioxidantes.', 2, 'O açaí é uma fruta da Floresta Amazônica conhecida por seu alto teor de antioxidantes e é frequentemente consumido na forma de sucos e bowls.'),
(40, 'Verdadeiro ou falso: A exploração de borracha na Floresta Amazônica no século XIX desempenhou um papel importante na economia da região.', 3, 'A exploração de borracha na Floresta Amazônica no final do século XIX desempenhou um papel crucial na economia da região e atraiu migrantes em busca de riqueza.'),
(41, 'Verdadeiro ou falso: A Floresta Amazônica é frequentemente chamada de \"pulmão do mundo\" devido à sua influência na regulação do clima global.', 4, 'A Floresta Amazônica é frequentemente chamada de \"pulmão do mundo\" devido à sua influência significativa na regulação do clima global e na produção de oxigênio.'),
(42, 'Qual destas aves é um predador noturno encontrado na Floresta Amazônica e é conhecido por sua visão aguçada?', 1, 'A coruja é uma ave predadora noturna encontrada na Floresta Amazônica e é conhecida por sua visão aguçada que a ajuda a caçar durante a noite.'),
(43, 'Qual destas árvores amazônicas é conhecida por suas raízes aéreas que emergem da água?', 2, 'A vitória-régia é uma planta aquática amazônica conhecida por suas grandes folhas e raízes aéreas que emergem da água.'),
(44, 'Quem foi o explorador português que, no século XVI, liderou uma expedição na Floresta Amazônica em busca do Eldorado?', 3, 'O explorador português Francisco de Orellana liderou uma expedição na Floresta Amazônica em busca do lendário Eldorado, mas não encontrou o tesouro que procurava.'),
(45, 'Verdadeiro ou falso: A Floresta Amazônica é o lar de cerca de 10% de todas as espécies conhecidas do planeta.', 4, 'A Floresta Amazônica é tão rica em biodiversidade que abriga aproximadamente 10% de todas as espécies conhecidas no planeta.'),
(46, 'Qual destes animais amazônicos é conhecido por sua lenta movimentação e pelagem verde?', 1, 'O bicho-preguiça é um animal amazônico conhecido por sua lenta movimentação e pelagem verde, que os ajuda a se camuflar nas árvores.'),
(47, 'Verdadeiro ou falso: A seringueira é uma árvore da Floresta Amazônica usada na produção de borracha.', 2, 'A seringueira é uma árvore da Floresta Amazônica amplamente usada na produção de borracha natural.'),
(48, 'Quem foi o líder do movimento conhecido como \"A Marcha para o Oeste\" no Brasil, que visava promover a colonização da região amazônica no século XIX?', 3, 'O líder do movimento \"A Marcha para o Oeste\" no Brasil foi o Marechal Cândido Rondon, que desempenhou um papel importante na promoção da colonização e integração da região amazônica.'),
(49, 'Quantos países da América do Sul compartilham a Floresta Amazônica?', 4, 'Nove países da América do Sul compartilham a Floresta Amazônica: Brasil, Peru, Colômbia, Venezuela, Equador, Bolívia, Guiana, Suriname e Guiana Francesa.'),
(50, 'Qual desses animais é um felino amazônico conhecido por sua pelagem dourada e manchas pretas?', 1, 'A onça-pintada é um felino amazônico conhecido por sua pelagem dourada e manchas pretas que a tornam uma das espécies mais emblemáticas da Floresta Amazônica.'),
(51, 'Que planta amazônica é frequentemente usada na produção de um tipo de refrigerante natural?', 2, 'O Guaraná é uma planta amazônica que produz sementes usadas na produção de um tipo de refrigerante natural chamado \"guaraná\".'),
(52, 'Quem liderou a expedição espanhola que foi a primeira a explorar o Rio Amazonas na década de 1540?', 3, 'A expedição espanhola que foi a primeira a explorar o Rio Amazonas na década de 1540 foi liderada por Francisco de Orellana, que deu nome ao rio.'),
(53, 'Verdadeiro ou falso: O boto cor-de-rosa é um mamífero aquático que pode ser encontrado na Floresta Amazônica.', 1, 'Verdadeiro. O boto cor-de-rosa, também conhecido como boto-vermelho, é um mamífero aquático encontrado na bacia Amazônica.'),
(54, 'Que árvore amazônica é famosa por sua madeira de alta qualidade, que é frequentemente usada em móveis finos?', 2, 'O mogno é uma árvore amazônica famosa por sua madeira de alta qualidade, que é valorizada na produção de móveis finos e instrumentos musicais.'),
(55, 'Em que ano a Floresta Amazônica foi explorada pela primeira vez por uma expedição europeia?', 3, 'A Floresta Amazônica foi explorada pela primeira vez por uma expedição europeia em 1541.'),
(56, 'O que é a \"canopy\" da Floresta Amazônica?', 4, 'A \"canopy\" é a camada superior das árvores na Floresta Amazônica, onde a maioria das folhas, frutos e flores estão localizados, e é habitada por diversas espécies de animais e plantas.'),
(57, 'Quem foi o naturalista britânico que realizou uma expedição à Floresta Amazônica no século XIX e coletou uma vasta quantidade de espécimes da região?', 3, 'Henry Walter Bates é conhecido por suas contribuições para a ciência natural e pela sua expedição à Floresta Amazônica.'),
(58, 'Qual foi o papel do Marechal Cândido Rondon na colonização da região amazônica do Brasil?', 3, 'Marechal Cândido Rondon desempenhou um papel importante na promoção da colonização e integração da região amazônica.'),
(59, 'Qual é a maior ameaça à biodiversidade da Floresta Amazônica?', 4, 'Uma das maiores ameaças à biodiversidade da Floresta Amazônica é o desmatamento, causado principalmente pela expansão da agricultura, mineração e outros fatores humanos.'),
(60, 'Qual é o tratado internacional que visa a preservação da biodiversidade da Amazônia, assinado por vários países sul-americanos?', 3, 'O Tratado de Cooperação Amazônica é um acordo internacional assinado por países sul-americanos com o objetivo de preservar a biodiversidade e promover o desenvolvimento sustentável da região amazônica.'),
(61, 'Quem é conhecido como o \"guardião da floresta\" e foi um líder indígena que defendeu os direitos das tribos na Amazônia?', 3, 'Chico Mendes, líder sindical e ambientalista, é conhecido como o \"guardião da floresta\" por sua luta em defesa dos direitos das tribos indígenas e da conservação da Floresta Amazônica.'),
(62, 'Qual governante brasileiro lançou o programa de desenvolvimento da Amazônia conhecido como \"Plano de Integração Nacional\" na década de 1970?', 3, 'O presidente brasileiro Emílio Garrastazu Médici lançou o \"Plano de Integração Nacional\" na década de 1970, visando o desenvolvimento da Amazônia.'),
(63, 'Os tucanos são aves encontradas na Floresta Amazônica.', 1, 'Os tucanos são aves coloridas e exóticas que são encontradas na Floresta Amazônica e outras regiões da América do Sul.'),
(64, 'Qual é o maior bioma terrestre do Brasil, que inclui uma grande parte da Floresta Amazônica?', 4, 'O bioma Amazônia é o maior bioma terrestre do Brasil, englobando a maior parte da Floresta Amazônica.'),
(65, 'Qual foi a civilização indígena que construiu as famosas \"terras pretas\" na Amazônia, solos férteis que ainda são usados para a agricultura hoje?', 3, 'Os povos indígenas pré-colombianos, como os povos da cultura Marajoara, foram responsáveis pela criação das \"terras pretas\" na Amazônia, que são solos férteis utilizados para a agricultura.'),
(66, 'A Floresta Amazônica é o bioma mais biodiverso do mundo.', 4, 'Verdadeiro. A Floresta Amazônica é amplamente reconhecida como o bioma mais biodiverso do mundo, abrigando uma vasta variedade de espécies vegetais e animais.'),
(67, 'O desmatamento na Floresta Amazônica diminuiu nos últimos anos.', 4, 'Verdadeiro. Embora o desmatamento seja uma grande preocupação, houve períodos de declínio no desmatamento na Floresta Amazônica nas últimas décadas, embora ainda seja uma questão crítica.'),
(68, 'O açaí é uma palmeira nativa da Floresta Amazônica.', 2, 'Verdadeiro. O açaí é uma palmeira nativa da Floresta Amazônica e suas bagas são usadas para fazer o popular açaí na tigela.'),
(69, 'Qual das seguintes afirmações sobre a situação atual da Floresta Amazônica está INCORRETA?', 4, 'O desmatamento na Floresta Amazônica diminuiu significativamente nas últimas décadas.'),
(70, 'Qual dos seguintes naturalistas NÃO realizou uma expedição à Floresta Amazônica no século XIX?', 3, 'Charles Darwin, Alexander von Humboldt e Henry Walter Bates foram naturalistas que realizaram expedições à Floresta Amazônica no século XIX.');

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
(7, 'Cristóvão Colombo', 3, 0),
(8, 'Vasco da Gama', 3, 0),
(9, 'Hernán Cortés', 3, 0),
(10, 'Francisco de Orellana', 3, 1),
(11, 'Cristóvão Colombo', 4, 0),
(12, 'Vasco da Gama', 4, 0),
(13, 'Hernán Cortés', 4, 0),
(14, 'Francisco de Orellana', 4, 1),
(15, 'Cristóvão Colombo', 5, 0),
(16, 'Vicente Yáñez Pinzón', 5, 1),
(17, 'Amerigo Vespucci', 5, 0),
(18, 'Fernão de Magalhães (Magalhães)', 5, 0),
(19, 'Gorila', 6, 0),
(20, 'Tigre', 6, 0),
(21, 'Tamanduá-bandeira', 6, 1),
(22, 'Pinguim', 6, 0),
(23, 'Leão', 7, 0),
(24, 'Tucano', 7, 1),
(25, 'Urso Polar', 7, 0),
(26, 'Canguru', 7, 0),
(27, 'Carvalho', 8, 0),
(28, 'Carvalho-do-cerrado', 8, 0),
(29, 'Açaí', 8, 0),
(30, 'Castanha-do-pará', 8, 1),
(31, 'Rosa', 9, 0),
(32, 'Cipó-uva', 9, 1),
(33, 'Lírio', 9, 0),
(34, 'Orquídea', 9, 0),
(35, 'Rio Grande do Sul', 10, 1),
(36, 'Mato Grosso', 10, 0),
(37, 'Piauí', 10, 0),
(38, 'Amazonas', 10, 0),
(39, 'Gorila', 11, 0),
(40, 'Tigre', 11, 0),
(41, 'Onça-pintada', 11, 1),
(42, 'Pinguim', 11, 0),
(43, 'Gorila', 12, 0),
(44, 'Tucano', 12, 0),
(45, 'Macaco-aranha', 12, 1),
(46, 'Canguru', 12, 0),
(47, 'Jacaré-açu', 13, 1),
(48, 'Tucano', 13, 0),
(49, 'Onça-pintada', 13, 0),
(50, 'Tamanduá-bandeira', 13, 0),
(51, 'Boto-cor-de-rosa', 14, 1),
(52, 'Golfinho', 14, 0),
(53, 'Tucano', 14, 0),
(54, 'Tamanduá-bandeira', 14, 0),
(55, 'Piranha', 15, 0),
(56, 'Tucano', 15, 0),
(57, 'Pirarucu', 15, 1),
(58, 'Tamanduá-bandeira', 15, 0),
(59, 'Cristóvão Colombo', 16, 0),
(60, 'Vasco da Gama', 16, 0),
(61, 'Hernán Cortés', 16, 0),
(62, 'Francisco de Orellana', 16, 1),
(63, 'Henry Ford', 17, 0),
(64, 'Marco Polo', 17, 0),
(65, 'Alexander von Humboldt', 17, 1),
(66, 'James Cook', 17, 0),
(67, 'Cristóvão Colombo', 18, 0),
(68, 'Vicente Yáñez Pinzón', 18, 1),
(69, 'Amerigo Vespucci', 18, 0),
(70, 'Fernão de Magalhães (Magalhães)', 18, 0),
(71, 'Francisco Pizarro', 19, 0),
(72, 'Hernán Cortés', 19, 0),
(73, 'Francisco de Orellana', 19, 1),
(74, 'Fernando de Soto', 19, 0),
(75, 'Charles Darwin', 20, 0),
(76, 'Alfred Russel Wallace', 20, 0),
(77, 'Henry Walter Bates', 20, 1),
(78, 'David Attenborough', 20, 0),
(79, 'Ipê', 21, 0),
(80, 'Jatobá', 21, 0),
(81, 'Samaúma', 21, 1),
(82, 'Mangueira', 21, 0),
(83, 'Margarida', 22, 0),
(84, 'Ipê', 22, 0),
(85, 'Cipó-uva', 22, 1),
(86, 'Orquídea', 22, 0),
(87, 'Macaco-aranha', 23, 0),
(88, 'Jacaré', 23, 1),
(89, 'Onça-pintada', 23, 0),
(90, 'Tamanduá-bandeira', 23, 0),
(91, 'Açaí', 24, 1),
(92, 'Mangueira', 24, 0),
(93, 'Bananeira', 24, 0),
(94, 'Cacau', 24, 0),
(95, 'Rio Grande do Sul', 25, 1),
(96, 'Mato Grosso', 25, 0),
(97, 'Piauí', 25, 0),
(98, 'Amazonas', 25, 0),
(99, 'Macaco-aranha', 26, 0),
(100, 'Tamanduá-bandeira', 26, 1),
(101, 'Onça-pintada', 26, 0),
(102, 'Tucano', 26, 0),
(103, 'Cacau', 27, 0),
(104, 'Mangueira', 27, 0),
(105, 'Seringueira', 27, 1),
(106, 'Ipê', 27, 0),
(107, 'Cristóvão Colombo', 28, 0),
(108, 'Amerigo Vespucci', 28, 0),
(109, 'Francisco de Orellana', 28, 1),
(110, 'Fernão de Magalhães (Magalhães)', 28, 0),
(111, 'La Niña', 29, 0),
(112, 'El Niño', 29, 1),
(113, 'Fenômeno do Atlântico Sul', 29, 0),
(114, 'Fenômeno do Pacífico Oriental', 29, 0),
(115, 'Tucano', 30, 0),
(116, 'Arara', 30, 0),
(117, 'Harpia', 30, 1),
(118, 'Gavião-real', 30, 0),
(119, 'Açaí', 31, 0),
(120, 'Mangueira', 31, 0),
(121, 'Bananeira', 31, 0),
(122, 'Cacau', 31, 1),
(123, 'Charles Darwin', 32, 0),
(124, 'Alexander von Humboldt', 32, 0),
(125, 'Henry Walter Bates', 32, 1),
(126, 'Alfred Russel Wallace', 32, 0),
(127, 'Jacaré', 33, 0),
(128, 'Ariranha', 33, 0),
(129, 'Peixe-boi', 33, 1),
(130, 'Arraia', 33, 0),
(131, 'Verdadeiro', 34, 1),
(132, 'Falso', 34, 0),
(133, 'Verdadeiro', 35, 1),
(134, 'Falso', 35, 0),
(135, 'Cristóvão Colombo', 36, 0),
(136, 'Amerigo Vespucci', 36, 0),
(137, 'Gonzalo Pizarro', 36, 1),
(138, 'Fernão de Magalhães (Magalhães)', 36, 0),
(139, 'Verdadeiro', 37, 1),
(140, 'Falso', 37, 0),
(141, 'Verdadeiro', 38, 1),
(142, 'Falso', 38, 0),
(143, 'Verdadeiro', 39, 1),
(144, 'Falso', 39, 0),
(145, 'Verdadeiro', 40, 1),
(146, 'Falso', 40, 0),
(147, 'Verdadeiro', 41, 1),
(148, 'Falso', 41, 0),
(149, 'Tucano', 42, 0),
(150, 'Arara', 42, 0),
(151, 'Jaguar', 42, 0),
(152, 'Coruja', 42, 1),
(153, 'Açaí', 43, 0),
(154, 'Mangueira', 43, 0),
(155, 'Vitória-régia', 43, 1),
(156, 'Ipê', 43, 0),
(157, 'Pedro Álvares Cabral', 44, 0),
(158, 'Cristóvão Colombo', 44, 0),
(159, 'Vasco da Gama', 44, 0),
(160, 'Francisco de Orellana', 44, 1),
(161, 'Verdadeiro', 45, 1),
(162, 'Falso', 45, 0),
(163, 'Tamanduá-bandeira', 46, 0),
(164, 'Piranha', 46, 0),
(165, 'Bicho-preguiça', 46, 1),
(166, 'Gorila', 46, 0),
(167, 'Verdadeiro', 47, 1),
(168, 'Falso', 47, 0),
(169, 'Dom Pedro II', 48, 0),
(170, 'Marechal Deodoro da Fonseca', 48, 0),
(171, 'Marechal Cândido Rondon', 48, 1),
(172, 'Getúlio Vargas', 48, 0),
(173, '5', 49, 0),
(174, '7', 49, 0),
(175, '9', 49, 1),
(176, '12', 49, 0),
(177, 'Tamanduá-bandeira', 50, 0),
(178, 'Macaco-aranha', 50, 0),
(179, 'Onça-pintada', 50, 1),
(180, 'Tucano', 50, 0),
(181, 'Açaí', 51, 0),
(182, 'Mangueira', 51, 0),
(183, 'Guaraná', 51, 1),
(184, 'Ipê', 51, 0),
(185, 'Cristóvão Colombo', 52, 0),
(186, 'Vasco da Gama', 52, 0),
(187, 'Hernán Cortés', 52, 0),
(188, 'Francisco de Orellana', 52, 1),
(189, 'Verdadeiro', 53, 1),
(190, 'Falso', 53, 0),
(191, 'Açaí', 54, 0),
(192, 'Mangueira', 54, 0),
(193, 'Mogno', 54, 1),
(194, 'Ipê', 54, 0),
(195, '1492', 55, 0),
(196, '1500', 55, 0),
(197, '1541', 55, 1),
(198, '1607', 55, 0),
(199, 'O solo da floresta', 56, 0),
(200, 'A camada de folhas no chão', 56, 0),
(201, 'A camada superior das árvores', 56, 1),
(202, 'Os rios que cortam a floresta', 56, 0),
(203, 'Charles Darwin', 57, 0),
(204, 'Alexander von Humboldt', 57, 0),
(205, 'Henry Walter Bates', 57, 1),
(206, 'Alfred Russel Wallace', 57, 0),
(207, 'Liderou expedições em busca de El Dorado', 58, 0),
(208, 'Promoveu a colonização e integração da região amazônica', 58, 1),
(209, 'Descobriu o Rio Amazonas', 58, 0),
(210, 'Fundou o Instituto Nacional de Pesquisas da Amazônia (INPA)', 58, 0),
(211, 'Mudanças climáticas', 59, 0),
(212, 'Poluição da água', 59, 0),
(213, 'Desmatamento', 59, 1),
(214, 'Erosão do solo', 59, 0),
(215, 'Tratado de Versalhes', 60, 0),
(216, 'Tratado de Cooperação Amazônica', 60, 1),
(217, 'Tratado de Tordesilhas', 60, 0),
(218, 'Tratado de Kyoto', 60, 0),
(219, 'Carlos Marighella', 61, 0),
(220, 'Chico Mendes', 61, 1),
(221, 'Raoni Metuktire', 61, 0),
(222, 'Cacique Seattle', 61, 0),
(223, 'Getúlio Vargas', 62, 0),
(224, 'Juscelino Kubitschek', 62, 0),
(225, 'Emílio Garrastazu Médici', 62, 1),
(226, 'Fernando Collor de Mello', 62, 0),
(227, 'Verdadeiro', 63, 1),
(228, 'Falso', 63, 0),
(229, 'Cerrado', 64, 0),
(230, 'Pantanal', 64, 0),
(231, 'Mata Atlântica', 64, 0),
(232, 'Amazônia', 64, 1),
(233, 'Incas', 65, 0),
(234, 'Maias', 65, 0),
(235, 'Marajoara', 65, 1),
(236, 'Astecas', 65, 0),
(237, 'Verdadeiro', 66, 1),
(238, 'Falso', 66, 0),
(239, 'Verdadeiro', 67, 1),
(240, 'Falso', 67, 0),
(241, 'Verdadeiro', 68, 1),
(242, 'Falso', 68, 0),
(243, 'O desmatamento na Floresta Amazônica diminuiu significativamente nas últimas décadas.', 69, 1),
(244, 'A Amazônia é o maior bioma terrestre do Brasil.', 69, 0),
(245, 'A região amazônica é lar de muitas tribos indígenas.', 69, 0),
(246, 'O Rio Amazonas é o principal rio da Floresta Amazônica.', 69, 0),
(247, 'Isaac Newton', 70, 1),
(248, 'Charles Darwin', 70, 0),
(249, 'Alexander von Humboldt', 70, 0),
(250, 'Henry Walter Bates', 70, 0);

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
(2, 'teste123@gmail.com', 'teste09', '$2y$10$FjmLvarI54FPvKpxg.NpHOvbzSfNwal7pAeGz8SOZTAD.j2d8zLtm');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
