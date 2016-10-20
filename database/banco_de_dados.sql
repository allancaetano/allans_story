CREATE DATABASE  IF NOT EXISTS `loja` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `loja`;

-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: loja
-- ------------------------------------------------------
-- Server version	5.6.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Temperos','Tempero é o nome que se dá ao conjunto de condimentos, cuja função é realçar o gosto do prato. Foram identificadas funções terapêuticas para alguns destes condimentos. São exemplos de temperos o sal, a canela, o coentro, o aneto, o alho, o louro, a pimenta e a salsa.'),(2,'Comida enlatada','A comida enlatada é uma forma de aumentar o tempo de conservação dos alimentos através do seu acondicionamento apropriado em um recipiente geralmente produzido em metal.\r\n\r\nAtualmente os mais diveros gêneros alimentícios e bebidas são vendidos enlatados, muitos deles exclusivamente deste modo. Como exemplo podemos citar o extrato de tomate, o leite condensado, o milho cozido, refrigerantes, entre outros. Alimentos enlatados podem manter sua qualidade para consumo por até dois anos.'),(3,'Chocolates','O chocolate é um alimento feito com base na amêndoa fermentada e torrada do cacau. Sua origem remonta às civilizações pré-colombianas da América Central. A partir dos Descobrimentos, foi levado para a Europa, onde se popularizou, especialmente a partir dos séculos XVII e XVIII.'),(4,'Vinhos','O vinho é uma bebida alcoólica produzida por fermentação do sumo de uva.'),(5,'Queijos','Queijo é um alimento sólido feito a partir do leite de vacas, cabras, ovelhas, búfalas e/ou outros mamíferos. O queijo é produzido pela coagulação do leite. Isto é realizado, em uma primeira etapa, pela acidificação com uma cultura bacteriana e em seguida, empregando uma enzima, a quimosina (coalho ou substitutos) para transformar o leite em \"coalhada e soro\".1 A bactéria precisa e o processamento da coalhada desempenham um papel na definição da textura e sabor da maioria dos queijos. Alguns queijos apresentam também bolores, tanto na superfície externa como no interior.'),(6,'Pastas','As massas alimentícias, como o espaguete e o macarrão, são ingredientes culinários feitos com massa de farinha, geralmente de trigo, a que se dá várias formas que depois são cozidas em água e servidas com diferentes molhos.');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('09d13f40b857f9196383362c8e891682103c78ab','127.0.0.1',1475087336,'__ci_last_regenerate|i:1475087288;cart_contents|a:3:{s:10:\"cart_total\";d:47;s:11:\"total_items\";d:1;s:32:\"fb2a4d3559ca079b7a669a0780350764\";a:13:{s:2:\"id\";s:7:\"CBEF001\";s:3:\"qty\";d:1;s:5:\"price\";d:47;s:4:\"name\";s:14:\"Carne enlatada\";s:6:\"altura\";s:3:\"300\";s:11:\"comprimento\";s:3:\"250\";s:7:\"largura\";s:3:\"200\";s:4:\"peso\";s:3:\"400\";s:7:\"options\";N;s:3:\"url\";s:54:\"http://local.ecommerce.com.br/produto/7/carne-enlatada\";s:4:\"foto\";s:86:\"http://local.ecommerce.com.br/assets/img/produtos/8f14e45fceea167a5a36dedd4bea2543.jpg\";s:5:\"rowid\";s:32:\"fb2a4d3559ca079b7a669a0780350764\";s:8:\"subtotal\";d:47;}}'),('09df334e7ac08d75c314fdb6424e0077a1228190','127.0.0.1',1476995213,'__ci_last_regenerate|i:1476994929;login|b:1;id_usuario|s:1:\"1\";usuario|s:4:\"root\";'),('1cb415fbb275253f0c39be4972d84e20ce73d3d6','127.0.0.1',1476373678,'__ci_last_regenerate|i:1476373588;cart_contents|a:3:{s:10:\"cart_total\";d:319;s:11:\"total_items\";d:1;s:32:\"d5d852cea8cb6814b83cb6628c78e708\";a:13:{s:2:\"id\";s:7:\"KTVN001\";s:3:\"qty\";d:1;s:5:\"price\";d:319;s:4:\"name\";s:26:\"Kit de Vinho para presente\";s:6:\"altura\";s:3:\"450\";s:11:\"comprimento\";s:3:\"250\";s:7:\"largura\";s:3:\"300\";s:4:\"peso\";s:4:\"1540\";s:7:\"options\";N;s:3:\"url\";s:67:\"http://local.ecommerce.com.br/produto/16/kit-de-vinho-para-presente\";s:4:\"foto\";s:86:\"http://local.ecommerce.com.br/assets/img/produtos/c74d97b01eae257e44aa9d5bade97baf.jpg\";s:5:\"rowid\";s:32:\"d5d852cea8cb6814b83cb6628c78e708\";s:8:\"subtotal\";d:319;}}'),('6e917e8d322de204f96e6b2f2464942962e0a0f0','127.0.0.1',1476472437,'__ci_last_regenerate|i:1476472436;'),('70676059f806a60dfdde21077c9937d862608136','127.0.0.1',1475695310,'__ci_last_regenerate|i:1475695310;'),('80ae680b053bbd7cb0c392012e1fe0e104d154d5','127.0.0.1',1476996818,'__ci_last_regenerate|i:1476996720;login|b:1;id_usuario|s:1:\"1\";usuario|s:4:\"root\";'),('897bf2164abd38aadb32969f0576d5ad8f9ab405','127.0.0.1',1475695263,'__ci_last_regenerate|i:1475694995;login|b:1;id_usuario|s:1:\"1\";usuario|s:4:\"root\";'),('92a2196cfb869e3c2a1ea16a0cafc0cfb4c3ca4e','127.0.0.1',1476994493,'__ci_last_regenerate|i:1476994237;login|b:1;id_usuario|s:1:\"1\";usuario|s:4:\"root\";'),('b8a96a57225b5b7beb2206edde0bca2e1cbce05f','127.0.0.1',1476996706,'__ci_last_regenerate|i:1476996413;login|b:1;id_usuario|s:1:\"1\";usuario|s:4:\"root\";'),('c92cf73f4411b18c1bf8324ea51cee63b0fc0f9c','127.0.0.1',1476995607,'__ci_last_regenerate|i:1476995322;login|b:1;id_usuario|s:1:\"1\";usuario|s:4:\"root\";'),('dd467127fb8128cee39b7af06a432d12abe61010','127.0.0.1',1474941483,'__ci_last_regenerate|i:1474941481;'),('ed7816777e3ab5f77b62f8a00a113d4c71524be0','127.0.0.1',1474429110,'__ci_last_regenerate|i:1474428981;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes_metodos`
--

DROP TABLE IF EXISTS `classes_metodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes_metodos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classe` varchar(255) NOT NULL,
  `metodo` varchar(255) NOT NULL,
  `nome_amigavel` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes_metodos`
--

LOCK TABLES `classes_metodos` WRITE;
/*!40000 ALTER TABLE `classes_metodos` DISABLE KEYS */;
INSERT INTO `classes_metodos` VALUES (1,'usuarios','efetuar_login','efetuar_login-usuarios'),(2,'clientes','index','index-clientes'),(3,'usuarios','sem_permissao','sem_permissao-usuarios'),(4,'categorias','index','index-categorias'),(5,'produtos','index','index-produtos'),(6,'pedidos','index','index-pedidos'),(7,'transportadoras','index','index-transportadoras'),(8,'usuarios','logout','logout-usuarios'),(9,'usuarios','index','index-usuarios'),(10,'usuarios','adicionar','adicionar-usuarios'),(11,'usuarios','alterar','alterar-usuarios'),(12,'usuarios','permissoes','permissoes-usuarios'),(13,'usuarios','excluir','excluir-usuarios'),(14,'usuarios','salvar_alteracoes','salvar_alteracoes-usuarios'),(15,'usuarios','alterar_permissoes','alterar_permissoes-usuarios'),(16,'categorias','adicionar','adicionar-categorias'),(17,'categorias','excluir','excluir-categorias'),(18,'categorias','alterar','alterar-categorias'),(19,'produtos','adicionar','adicionar-produtos'),(20,'produtos','excluir','excluir-produtos'),(21,'produtos','alterar','alterar-produtos'),(22,'produtos','salvar_alteracoes','salvar_alteracoes-produtos'),(23,'produtos','nova_foto','nova_foto-produtos'),(24,'categorias','salvar_alteracoes','salvar_alteracoes-categorias'),(25,'categorias','nova_foto','nova_foto-categorias'),(26,'transportadoras','adicionar','adicionar-transportadoras'),(27,'transportadoras','excluir','excluir-transportadoras'),(28,'clientes','excluir','excluir-clientes'),(29,'clientes','alterar','alterar-clientes'),(30,'clientes','salvar_alteracoes','salvar_alteracoes-clientes'),(31,'pedidos','detalhes','detalhes-pedidos'),(32,'pedidos','excluir','excluir-pedidos'),(33,'pedidos','alterar_status','alterar_status-pedidos');
/*!40000 ALTER TABLE `classes_metodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(245) NOT NULL,
  `sobrenome` varchar(145) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `data_nascimento` datetime NOT NULL,
  `sexo` char(1) NOT NULL,
  `rua` varchar(145) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `bairro` varchar(145) NOT NULL,
  `cidade` varchar(145) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(145) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `cadastrado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CPF_Unico` (`cpf`),
  UNIQUE KEY `Email_Unico` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Allan','Caetano','99.999.999-9','999.999.999-99','1990-10-28 00:00:00','M','Rua Renato Dias Segur','113','Vila Nova Mauá','Mauá','SP','09390-650','(11) 9999-9999','(11) 99999-9999','allansantos_caetano@hotmail.com','Admin01*',0,'2016-10-20 18:26:50');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes_log`
--

DROP TABLE IF EXISTS `clientes_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes_log` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(245) NOT NULL,
  `sobrenome` varchar(145) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `data_nascimento` datetime NOT NULL,
  `sexo` char(1) NOT NULL,
  `rua` varchar(145) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `bairro` varchar(145) NOT NULL,
  `cidade` varchar(145) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(145) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `cadastrado_em` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes_log`
--

LOCK TABLES `clientes_log` WRITE;
/*!40000 ALTER TABLE `clientes_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itens_pedidos`
--

DROP TABLE IF EXISTS `itens_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itens_pedidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pedido` int(10) unsigned NOT NULL,
  `item` varchar(45) NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item` (`item`),
  CONSTRAINT `itens_pedidos_ibfk_1` FOREIGN KEY (`item`) REFERENCES `produtos` (`codigo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itens_pedidos`
--

LOCK TABLES `itens_pedidos` WRITE;
/*!40000 ALTER TABLE `itens_pedidos` DISABLE KEYS */;
INSERT INTO `itens_pedidos` VALUES (1,1,'PPRK001',1,43.00);
/*!40000 ALTER TABLE `itens_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente` int(10) unsigned NOT NULL,
  `produtos` decimal(10,2) NOT NULL,
  `frete` decimal(10,2) NOT NULL,
  `status` int(10) unsigned NOT NULL DEFAULT '1',
  `comentarios` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,'2016-10-20 20:45:00',1,43.00,12.50,0,'Sem comentários');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissoes`
--

DROP TABLE IF EXISTS `permissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissoes` (
  `usuario` int(10) unsigned NOT NULL,
  `metodo` int(10) unsigned NOT NULL,
  UNIQUE KEY `Chave_unica` (`usuario`,`metodo`),
  KEY `FK_metodo` (`metodo`),
  CONSTRAINT `FK_metodo` FOREIGN KEY (`metodo`) REFERENCES `classes_metodos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissoes`
--

LOCK TABLES `permissoes` WRITE;
/*!40000 ALTER TABLE `permissoes` DISABLE KEYS */;
INSERT INTO `permissoes` VALUES (1,2),(1,4),(1,5),(1,6),(1,7),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,26),(1,27),(1,28),(1,29),(1,30),(1,31),(1,32),(1,33);
/*!40000 ALTER TABLE `permissoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `largura_caixa_mm` int(10) unsigned NOT NULL,
  `altura_caixa_mm` int(10) unsigned NOT NULL,
  `comprimento_caixa_mm` int(10) unsigned NOT NULL,
  `peso_gramas` int(10) unsigned NOT NULL,
  `data_adicionado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_unico` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'PPRK001','Páprica','também conhecido por pimentão, pimentão-doce ou colorau, é uma especiaria obtida do pimentão-doce depois de seco e moído, muito usada na cozinha como condimento. O pimentão-doce é uma variedade de Capsicum annuum, da família das Solanaceae. A sua origem é latino-americana, mais especificamente da região central e do México. Diversas variedades desta espécie são utilizadas de acordo se se pretende um condimento mais ou menos picante.\r\n\r\nA páprica é usada como corante de carnes assadas, sopas, pães e arroz. Na indústria alimentícia é usado para carnes congeladas ou defumadas, arroz, manteiga e queijos.',43.00,55,105,55,200,'2015-04-11 20:58:37',1),(2,'OLOL001','Azeite de Oliva','Usualmente, o termo azeite refere-se ao produto alimentar, usado como tempero, produzido a partir da azeitona, fruto advindo das oliveiras (em outros contextos, pode também tratar-se de óleos produzidos a partir de outras plantas). Trata-se de um alimento antigo, clássico da culinária contemporânea, regular na dieta mediterrânea e nos dias atuais presente em grande parte das cozinhas.',62.00,120,250,120,450,'2015-04-11 21:00:20',1),(3,'TBSC001','Tabasco - Galão','Galão de 3.8L - O molho tabasco é um molho de pimenta fabricado nos Estados Unidos, conhecido e vendido em todo o mundo. De sabor picante, prepara-se com pimentos vermelhos Capsicum frutescens da variedade tabasco, vinagre, água e sal, macerados em barris de carvalho. O molho é produzido na ilha de Avery, que fica localizada na Paróquia de Iberia, no estado estadunidense da Luisiana.',314.00,300,300,300,4000,'2015-04-11 21:03:16',1),(4,'MSTA001','Mostarda Amarela','Tanto as sementes amarelas quanto as escuras são utilizadas para a fabricação da Mostarda, podendo ainda serem misturadas, para obter variedades diferentes do condimento. A Mostarda alemã utiliza em sua composição as sementes amarelas, enquanto na França, são utilizadas as Mostardas escuras. Quanto ao gosto, as duas sementes se diferênciam no sabor, mais picante, no óleo das sementes escuras.',12.00,45,200,120,300,'2015-04-11 21:09:48',1),(5,'ACAF001','Açafrão','O açafrão é extraído dos estigmas de flores de Crocus sativus, uma planta da família das Iridáceas. É utilizado desde a Antiguidade como especiaria, principalmente na culinária do Mediterrâneo — região de onde a variedade é originária — no preparo de risotos, aves, caldos, massas e doces. É um item essencial à paella espanhola. É tida como uma das mais caras ou a mais cara especiaria do mundo uma vez que, para se obter um quilo de açafrão seco, são processadas manualmente cerca de 150.000 flores, e é preciso cultivar uma área de aproximadamente 2000 m²',418.00,90,160,90,150,'2015-04-11 21:15:44',1),(6,'CPBL001','Sopa Campbel - Qualquer sabor','Em sabores variados, os nutricionistas aconselham a ingestão diária de sopa para um regime alimentar equilibrado. A maior parte das sopas é de baixo custo, de confecção simples e de digestão fácil, contendo vitaminas e hidratos de carbono. A ingestão de sopa auxilia nos regimes alimentares de controlo de peso e é uma forma fácil de assegurar que crianças pequenas e idosos ingiram produtos hortícolas e água.',16.00,120,120,120,350,'2015-04-11 21:18:32',1),(7,'CBEF001','Carne enlatada','Carne enlatada. Atualmente os alimentos enlatados passam por um processo que tem por objetivo eliminar microorganismos e outros agentes nocivos que podem comprometer a qualidade do alimento e a saúde de seus consumidores. Entre os microorganismos nocivos que precisam ser eliminados está o Clostridium botulinum causador do botulismo.\r\n\r\nPrimeiramente os alimentos são acondicionados nas latas, que são preenchidas por água, óleo ou uma solução ácida. Em seguida, as latas são fechadas hermeticamente e expostas a altas temperaturas e pressões. Todo o processo é automatizado sendo realizado por máquinas sem requerer contato manual.',47.00,200,300,250,400,'2015-04-11 21:21:10',1),(8,'UNIC001','Carne de Unicórnio em Lata','Unicórnio, também conhecido como licórnio ou licorne, é um animal mitológico que tem a forma de um cavalo, geralmente branco, com um único chifre em espiral. Sua imagem está associada à pureza e à força. As carnes são formadas principalmente de proteínas, gorduras e água, em proporção que varia minimamente dependendo do animal. A carne magra apresenta em torno de 75% de água, 21 a 22% de proteína, 1 a 2% de gordura, 1% de minerais e menos de 1% de carboidratos. A quantidade de calorias (conteúdo energético) é relativamente pequena, com média de 105 kcal/100g de carne crua.',87.00,250,250,120,350,'2015-04-11 21:24:53',1),(9,'SLMN001','Salmões em Lata','A cor vermelha do salmão é devido a um pigmento chamado astaxantina. O salmão é basicamente um peixe branco. O pigmento vermelho é feito através das algas e dos organismos unicelulares, que são ingeridos pelos camarões do mar; o pigmento é armazenado no músculo do camarão ou na casca. Quando os camarões são comidos pelo salmão, estes também acumulam o pigmento nos seus tecidos adiposos. Como a dieta do salmão é muito variada, o salmão natural toma uma enorme variedade de cores, desde branco ou um cor-de-rosa suave a um vermelho vivo.',6.00,120,45,120,120,'2015-04-11 21:28:15',1),(10,'SDNA001','Sardinhas da Louisiana','As sardinhas ou manjuas são peixes da família Clupeidae, aparentados com os arenques. Geralmente de pequenas dimensões (10–15 cm de comprimento), caracterizam-se por possuírem apenas uma barbatana dorsal sem espinhos.',5.00,140,45,80,120,'2015-04-11 21:32:29',1),(11,'CLTE001','Chocolates variados com licor','O chocolate, tal como é consumido hoje, é resultado de sucessivos aprimoramentos realizados desde o início da colonização da América. O produto era consumido pelos nativos na forma de uma bebida quente e amarga, de uso exclusivo da nobreza. Os europeus passaram a adoçar e a misturar especiarias para adequá-lo ao seu gosto. Com o desenvolvimento dos processos industriais e técnicas culinárias, surgiu o chocolate com leite e depois na forma de um sólido. Atualmente, é encontrado em diferentes formas que vão desde o sólido, como o chocolate em pó, as barras, os ovos e os bombons.',90.00,400,30,400,380,'2015-04-11 21:36:21',1),(12,'CLTE002','Remy Martin Chocolate','Chocolate vem do cacau. Desde a sua domesticação, o cacau é usado como bebida e, depois, como ingrediente para alimentos. Durante a civilização maia, era cultivado e, a partir de suas sementes, era feita uma bebida amarga chamada xocoatl, geralmente temperada com baunilha e pimenta. O xocoatl, acreditava-se, combatia o cansaço, além de ser afrodisíaco.',32.00,150,20,300,200,'2015-04-11 21:40:10',1),(13,'CLTE003','Trufas Godiva','Godiva Chocolatier é um fabricante de chocolates premium e produtos relacionados. Godiva, fundada na Bélgica em 1926, foi comprado pelo turco Yildiz Segurar, proprietário do Grupo Ülker, em 20 de novembro de 2007.',124.00,240,45,240,360,'2015-04-11 21:43:33',1),(14,'VTTO001','Vinho tinto - Fine Wine Found','Merlot é uma casta de uva tinta, fruto da Vitis vinifera. É uma das responsáveis pelas características dos vinhos tintos de Saint Émillion, na região de Bordeaux, na França. Apesar da casta geralmente ser utilizada em vinhos para serem consumidos jovens, as vinícolas de Saint Émillion garantem rótulos de longevidade.',914.00,180,350,180,980,'2015-04-11 21:49:39',1),(15,'VVSS001','Vinho branco suave','Chardonnay é uma uva da família da Vitis vinifera, a partir da qual é fabricado vinho branco de qualidade. Também é conhecida como aubaine, beaunois, melon blanc e pinot chardonnay. A chardonnay é usada na composição do vinho champagne, sendo responsável por seu aroma característico.',465.00,180,350,180,990,'2015-04-11 21:57:55',1),(16,'KTVN001','Kit de Vinho para presente','Em uma linda caixa acompnham acessórios e um delicioso vinho Merlot é uma casta de uva tinta, fruto da Vitis vinifera. É uma das responsáveis pelas características dos vinhos tintos de Saint Émillion, na região de Bordeaux, na França. Apesar da casta geralmente ser utilizada em vinhos para serem consumidos jovens, as vinícolas de Saint Émillion garantem rótulos de longevidade.',319.00,300,450,250,1540,'2015-04-11 22:00:39',1),(17,'QJSO001','Queijo Suiço - The lauguing cow','Um dos melhores queijos do mundo. Existem centenas de tipos de queijos produzidos em todo o mundo. Diferentes estilos e sabores de queijo são o resultado do uso do leite de diferentes mamíferos ou com o acréscimo de diferentes teores de gordura, empregando determinadas espécies de bactérias e bolores, e variando o tempo de envelhecimento e outros tratamentos de transformação.',278.00,320,120,320,850,'2015-04-12 10:14:16',1),(18,'QJOF001','Queijo Feta Grego','O feta é um queijo envelhecido, habitualmente produzido em blocos, com uma textura levemente granulada. É servido como queijo de mesa, assim como em saladas, empadas, tortas e outros alimentos assados, em especial aqueles com massas folhadas - como o spanakopita (\"torta de espinafre\") e tyropita (\"torta de queijo\").',199.00,320,290,320,700,'2015-04-12 10:20:20',1),(19,'QJOB001','Queijo Brie Francês','Os chamados brie são uma importante família de queijos de pasta mole e crosta florida, originados da região de Brie, na França. Fabricados com leite de vaca, o brie tradicional apresenta-se no formato de um cilindro com 35 centímetros de diâmetro por 35 milímetros de altura e com um peso que varia de 2 a 2,5 quilogramas. A sua crosta é branca e macia, formada pelo fungo Penicillium candida.',700.00,340,290,340,1450,'2015-04-12 10:25:32',1),(20,'QJOG001','Queijo Guda','Queijo de Gouda é um queijo amarelo feito de leite de vaca. Recebe o nome da cidade de Gouda, nos Países Baixos, porém seu nome não é protegido. A Comissão Europeia, no entanto, confirmou que o gouda holandês deverá ser protegido. Queijos feitos em outros países com o nome de gouda são vendidos, no entanto, ao redor do mundo.',218.00,340,290,340,1200,'2015-04-12 10:37:34',1),(21,'MSAA001','Espaguete Italiano','Há vários tipos de espaguete conforme o seu diâmetro (spaghettone, spaghettino, capellini, vermiceli, vermicelloni). Diz-se que cada italiano consome cerca de 30 quilogramas anuais de massas, enquanto que no Brasil esse consumo é da ordem de apenas 5,7 quilogramas/ano. O prato é consumido tradicionalmente com diferentes molhos (bechamel, tomate, ragu, quatro queijos etc).',8.00,120,45,400,1050,'2015-04-12 10:43:30',1),(22,'MSAT001','Tagliarini Italiano','Talharim (do italiano tagliarini) é um tipo de massa alimentícia com a forma de finas tiras. Há variações no nome, que incluem “taglierini” ou “tajarin” (no dialeto do Piemonte, que é a “pátria” desta massa e aparentemente a palavra mais próxima do nome em português), e representam o tipo mais fino das massas do grupo tagliatelle, as pastas em tiras.\r\n\r\nEsta massa é de cozedura muito rápida e, por absorver rapidamente os líquidos, normalmente é servida com um molho simples, por vezes, apenas manteiga ou mascarpone (um queijo cremoso), ou o molho de um assado.',12.00,120,45,400,1050,'2015-04-12 10:59:51',1),(23,'MSAC001','Caneloni Italiano','Cannelloni (ou canelone) são um formato de macarrão cilíndrico tipicamente italiano. O produto habitualmente é consumido com recheio salgado que pode incluir queijo ricota e vegetais como o espinafre, além da carne moída. Depois é coberto por um molho que pode ser de tomate clássico ou bechamel e gratinados ao forno.\r\n\r\nEsse tipo de macarrão é vendido tanto nas versões pré-cozida quanto na que necessita de um pré-cozimento antes de ser recheado. As dimensões são aproximadamente de 8 a 10 cm de comprimento por cerca de 2 cm de diâmetro.',18.00,120,45,400,1034,'2015-04-12 11:08:52',1),(24,'MACT001','Tagliatelli Italiano','Tagliatelle, também conhecido como Tagliatella e Taiadela, são o tipo mais comum das massas cortadas em tiras. Por vezes, são consideradas sinónimos dos fettuccine, embora outras fontes considerem que as tagliatelle devem ter, no máximo, 0,75 cm de largura e os tagliatelline ou fettuccine não podem ultrapassar os 0,5 cm.\r\n\r\nEstas pastas, tradicionalmente feitas à mão, têm como ingredientes a semolina ou farinha de trigo de grão duro e ovos, começando por uma massa estendida bem fina, chamada “sfoglia”. No entanto, existem ainda as pastas verdes, cuja massa pode ser preparada com espinafre (o mais comum), com urtiga, ou acelga.\r\n\r\nOs tagliatelle são tradicionalmente acompanhados de molho à bolonhesa.',22.00,120,45,400,1056,'2015-04-12 11:10:52',1);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos_categorias`
--

DROP TABLE IF EXISTS `produtos_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos_categorias` (
  `produto` int(10) unsigned NOT NULL,
  `categoria` int(10) unsigned NOT NULL,
  UNIQUE KEY `unique_produto_categoria` (`produto`,`categoria`),
  KEY `FK_produtos_categorias_categoria` (`categoria`),
  CONSTRAINT `FK_produtos_categorias_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_produtos_categorias_produto` FOREIGN KEY (`produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos_categorias`
--

LOCK TABLES `produtos_categorias` WRITE;
/*!40000 ALTER TABLE `produtos_categorias` DISABLE KEYS */;
INSERT INTO `produtos_categorias` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,2),(7,2),(8,2),(9,2),(10,2),(11,3),(12,3),(13,3),(14,4),(15,4),(16,4),(17,5),(18,5),(19,5),(20,5),(21,6),(22,6),(23,6),(24,6);
/*!40000 ALTER TABLE `produtos_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_transporte_preco`
--

DROP TABLE IF EXISTS `tb_transporte_preco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_transporte_preco` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `peso_de` decimal(6,2) NOT NULL,
  `peso_ate` decimal(6,2) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `adicional_kg` decimal(10,2) NOT NULL,
  `uf` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_transporte_preco`
--

LOCK TABLES `tb_transporte_preco` WRITE;
/*!40000 ALTER TABLE `tb_transporte_preco` DISABLE KEYS */;
INSERT INTO `tb_transporte_preco` VALUES (1,0.00,10.00,36.76,0.71,'MG'),(2,10.00,20.00,53.91,0.71,'MG'),(3,20.00,30.00,62.48,0.71,'MG'),(4,30.00,50.00,70.44,0.71,'MG'),(5,50.00,75.00,90.07,0.71,'MG'),(6,75.00,100.00,122.51,0.71,'MG'),(7,0.00,10.00,44.27,0.71,'DF'),(8,10.00,20.00,64.95,0.71,'DF'),(10,30.00,50.00,84.89,0.71,'DF'),(11,50.00,75.00,108.48,0.71,'DF'),(12,75.00,100.00,147.60,0.71,'DF'),(19,0.00,10.00,36.76,0.71,'SC'),(20,10.00,20.00,36.76,0.71,'SC'),(21,20.00,30.00,36.76,0.71,'SC'),(22,30.00,50.00,36.76,0.71,'SC'),(23,50.00,75.00,36.76,0.71,'SC'),(24,75.00,100.00,36.76,0.71,'SC'),(25,0.00,10.00,62.52,0.71,'GO'),(26,10.00,20.00,83.88,0.71,'GO'),(27,20.00,30.00,97.21,0.71,'GO'),(28,30.00,50.00,109.60,0.71,'GO'),(29,50.00,75.00,140.12,0.71,'GO'),(30,75.00,100.00,190.60,0.71,'GO'),(31,0.00,10.00,27.37,0.71,'RS'),(32,10.00,20.00,40.18,0.71,'RS'),(33,20.00,30.00,46.56,0.71,'RS'),(34,30.00,50.00,52.48,0.71,'RS'),(35,50.00,75.00,67.10,0.71,'RS'),(36,75.00,100.00,91.29,0.71,'RS'),(37,0.00,10.00,40.80,0.71,'RJ'),(38,10.00,20.00,59.86,0.71,'RJ'),(39,20.00,30.00,69.39,0.71,'RJ'),(40,30.00,50.00,78.22,0.71,'RJ'),(41,50.00,75.00,99.98,0.71,'RJ'),(42,75.00,100.00,136.02,0.71,'RJ'),(43,0.00,10.00,27.37,0.71,'SP'),(44,10.00,20.00,27.37,0.71,'SP'),(45,20.00,30.00,27.37,0.71,'SP'),(46,30.00,50.00,27.37,0.71,'SP'),(47,50.00,75.00,27.37,0.71,'SP'),(48,75.00,100.00,27.37,0.71,'SP'),(49,0.00,10.00,63.17,0.71,'ES'),(50,10.00,20.00,92.62,0.71,'ES'),(51,20.00,30.00,107.36,0.71,'ES'),(52,30.00,50.00,121.05,0.71,'ES'),(53,50.00,75.00,154.75,0.71,'ES'),(54,75.00,100.00,179.90,0.71,'ES'),(55,789.00,9000.00,179.90,0.71,'AC'),(56,0.00,10.00,179.90,0.71,'PE'),(57,0.00,10.00,179.90,0.71,'PB'),(58,20.00,30.00,179.90,0.71,'MS'),(59,50.00,75.00,179.90,0.71,'MS'),(60,30.00,50.00,179.90,0.71,'AL'),(61,50.00,75.00,179.90,0.71,'AL'),(62,30.00,50.00,179.90,0.71,'AM'),(63,50.00,75.00,179.90,0.71,'AM'),(64,75.00,100.00,179.90,0.71,'AC'),(65,30.00,50.00,179.90,0.71,'DF'),(66,50.00,75.00,179.90,0.71,'DF'),(67,75.00,150.00,179.90,0.71,'DF'),(68,30.00,50.00,179.90,0.71,'BA'),(69,50.00,75.00,179.90,0.71,'BA'),(70,75.00,150.00,179.90,0.71,'BA'),(71,30.00,50.00,179.90,0.71,'ES'),(72,50.00,75.00,179.90,0.71,'ES'),(73,75.00,120.00,179.90,0.71,'ES'),(74,30.00,55.00,179.90,0.71,'GO'),(75,75.00,120.00,179.90,0.71,'GO'),(76,30.00,55.00,179.90,0.71,'MA'),(77,50.00,120.00,179.90,0.71,'AC'),(78,30.00,50.00,179.90,0.71,'MS'),(79,1.00,50.00,179.90,0.71,'MS'),(80,1.00,50.00,179.90,0.71,'MT'),(81,0.00,30.00,101.00,0.71,'DF'),(82,30.00,50.00,150.00,0.71,'DF'),(83,50.00,75.00,166.00,0.71,'DF'),(84,1.00,50.00,179.90,0.71,'PE'),(87,50.00,100.00,179.90,0.71,'PE'),(90,22.00,66.00,179.90,0.71,'AC'),(91,0.00,30.00,199.00,0.71,'PB'),(92,0.00,35.00,179.90,0.71,'PR'),(93,35.00,55.00,179.90,0.71,'PR'),(94,55.00,100.00,179.90,0.71,'PR');
/*!40000 ALTER TABLE `tb_transporte_preco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'root','root');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-20 18:57:27
