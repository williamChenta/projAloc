/*
SQLyog Ultimate v9.51 
MySQL - 5.5.16-log : Database - aloc_salas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aloc_salas` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `aloc_salas`;

/*Table structure for table `bloco` */

DROP TABLE IF EXISTS `bloco`;

CREATE TABLE `bloco` (
  `id_bloco` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_bloco` char(2) NOT NULL,
  `desc_bloco` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bloco`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `bloco` */

insert  into `bloco`(`id_bloco`,`cod_bloco`,`desc_bloco`) values (1,'A','Bloco A'),(4,'B','Bloco B'),(5,'C','Bloco C'),(6,'D','Bloco D');

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `id_departamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_departamento` varchar(50) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `departamento` */

insert  into `departamento`(`id_departamento`,`nom_departamento`) values (2,'Têxtil'),(3,'Eletrônica e Informática');

/*Table structure for table `locacao` */

DROP TABLE IF EXISTS `locacao`;

CREATE TABLE `locacao` (
  `id_locacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sala_id_sala` int(10) unsigned NOT NULL,
  `usuario_id_usuario` int(10) unsigned NOT NULL,
  `turno_id_turno` int(10) unsigned NOT NULL,
  `tipo_locacao_id_tipo_locacao` int(10) unsigned NOT NULL,
  `dat_locacao` date NOT NULL,
  `dat_inicial` date NOT NULL,
  `dat_final` date NOT NULL,
  PRIMARY KEY (`id_locacao`,`sala_id_sala`,`usuario_id_usuario`,`turno_id_turno`,`tipo_locacao_id_tipo_locacao`),
  KEY `fk_locacao_sala1` (`sala_id_sala`),
  KEY `fk_locacao_usuario1` (`usuario_id_usuario`),
  KEY `fk_locacao_turno1` (`turno_id_turno`),
  KEY `fk_locacao_tipo_locacao1` (`tipo_locacao_id_tipo_locacao`),
  CONSTRAINT `fk_locacao_turno1` FOREIGN KEY (`turno_id_turno`) REFERENCES `turno` (`id_turno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_locacao_tipo_locacao1` FOREIGN KEY (`tipo_locacao_id_tipo_locacao`) REFERENCES `tipo_locacao` (`id_tipo_locacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_locacao_sala1` FOREIGN KEY (`sala_id_sala`) REFERENCES `sala` (`id_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_locacao_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `locacao` */

/*Table structure for table `locacao_has_periodo` */

DROP TABLE IF EXISTS `locacao_has_periodo`;

CREATE TABLE `locacao_has_periodo` (
  `locacao_id_locacao` int(10) unsigned NOT NULL,
  `periodo_id_periodo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`locacao_id_locacao`,`periodo_id_periodo`),
  KEY `fk_locacao_has_periodo_periodo1_idx` (`periodo_id_periodo`),
  KEY `fk_locacao_has_periodo_locacao1_idx` (`locacao_id_locacao`),
  CONSTRAINT `fk_locacao_has_periodo_locacao1` FOREIGN KEY (`locacao_id_locacao`) REFERENCES `locacao` (`id_locacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_locacao_has_periodo_periodo1` FOREIGN KEY (`periodo_id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `locacao_has_periodo` */

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id_perfil` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_perfil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `perfil` */

/*Table structure for table `periodo` */

DROP TABLE IF EXISTS `periodo`;

CREATE TABLE `periodo` (
  `id_periodo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_periodo` int(11) NOT NULL,
  `hora_inicial` time NOT NULL,
  `hora_final` time NOT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `periodo` */

/*Table structure for table `sala` */

DROP TABLE IF EXISTS `sala`;

CREATE TABLE `sala` (
  `id_sala` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bloco_id_bloco` int(10) unsigned NOT NULL,
  `departamento_id_departamento` int(10) unsigned NOT NULL,
  `cod_sala` char(4) NOT NULL,
  `nom_sala` varchar(50) NOT NULL,
  `num_capacidade` tinyint(4) NOT NULL,
  `num_computadores` tinyint(4) NOT NULL,
  `dsc_caracteristicas` text,
  PRIMARY KEY (`id_sala`,`bloco_id_bloco`,`departamento_id_departamento`),
  KEY `fk_sala_bloco` (`bloco_id_bloco`),
  KEY `fk_sala_departamento1` (`departamento_id_departamento`),
  CONSTRAINT `fk_sala_bloco` FOREIGN KEY (`bloco_id_bloco`) REFERENCES `bloco` (`id_bloco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sala_departamento1` FOREIGN KEY (`departamento_id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `sala` */

insert  into `sala`(`id_sala`,`bloco_id_bloco`,`departamento_id_departamento`,`cod_sala`,`nom_sala`,`num_capacidade`,`num_computadores`,`dsc_caracteristicas`) values (1,1,2,'A20','A20',30,25,'Boa sala'),(2,6,3,'10','D10',35,35,'Ar condicionado poderoso!!'),(3,6,3,'11','D11',35,30,'Ar condicionado fraco!! não da conta de uma sala cheia');

/*Table structure for table `tipo_locacao` */

DROP TABLE IF EXISTS `tipo_locacao`;

CREATE TABLE `tipo_locacao` (
  `id_tipo_locacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_locacao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_locacao` */

insert  into `tipo_locacao`(`id_tipo_locacao`,`nom_tipo`) values (1,'Semestral'),(2,'Por Período');

/*Table structure for table `turno` */

DROP TABLE IF EXISTS `turno`;

CREATE TABLE `turno` (
  `id_turno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_turno` varchar(10) NOT NULL,
  PRIMARY KEY (`id_turno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `turno` */

insert  into `turno`(`id_turno`,`nom_turno`) values (1,'Manhã'),(2,'Tarde'),(3,'Noite');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil_id_perfil` int(10) unsigned NOT NULL,
  `nom_usuario` varchar(45) NOT NULL,
  `dsc_login` char(8) NOT NULL,
  `dsc_senha` char(8) NOT NULL,
  `dsc_email` varchar(60) NOT NULL,
  PRIMARY KEY (`id_usuario`,`perfil_id_perfil`),
  KEY `fk_usuario_perfil1` (`perfil_id_perfil`),
  CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`perfil_id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
