/*
SQLyog Ultimate v9.63 
MySQL - 5.1.41 : Database - maquinaria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`maquinaria` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `maquinaria`;

/*Table structure for table `banco` */

DROP TABLE IF EXISTS `banco`;

CREATE TABLE `banco` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `banco` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `banco` */

insert  into `banco`(`codigo`,`banco`) values (1,'Banco de Venezuela'),(2,'Banco Mercantil'),(3,'Banesco');

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `telefono` char(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

insert  into `cliente`(`codigo`,`cedula`,`nombre`,`empresa`,`telefono`,`correo`,`direccion`,`usuario`) values (1,'15725458','Pedro Perez','Perez C.A','04141478596','pedro@mail.com','Valencia Naguanagua Avenida Universidad Altura C.C La Granja','cliente');

/*Table structure for table `maquinaria` */

DROP TABLE IF EXISTS `maquinaria`;

CREATE TABLE `maquinaria` (
  `placa` varchar(15) NOT NULL,
  `cod_modelo` int(11) NOT NULL,
  `estatus` varchar(15) NOT NULL,
  PRIMARY KEY (`placa`),
  KEY `cod_modelo` (`cod_modelo`),
  CONSTRAINT `maquinaria_ibfk_1` FOREIGN KEY (`cod_modelo`) REFERENCES `modelo_maquinaria` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `maquinaria` */

insert  into `maquinaria`(`placa`,`cod_modelo`,`estatus`) values ('carg1',2,'Disponible'),('carg2',2,'Disponible'),('carg3',2,'Disponible'),('comp1',3,'Disponible'),('comp2',3,'Disponible'),('comp3',3,'Disponible'),('exc1',1,'Disponible'),('exc2',1,'Disponible'),('exc3',1,'Disponible');

/*Table structure for table `modelo_maquinaria` */

DROP TABLE IF EXISTS `modelo_maquinaria`;

CREATE TABLE `modelo_maquinaria` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(250) NOT NULL,
  `cod_tipo` int(11) NOT NULL,
  `precio_alq` decimal(10,2) NOT NULL,
  `precio_mora` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `precio_tras` decimal(10,2) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `cod_tipo` (`cod_tipo`),
  CONSTRAINT `modelo_maquinaria_ibfk_1` FOREIGN KEY (`cod_tipo`) REFERENCES `tipo_maquinaria` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `modelo_maquinaria` */

insert  into `modelo_maquinaria`(`codigo`,`modelo`,`cod_tipo`,`precio_alq`,`precio_mora`,`cantidad`,`foto`,`precio_tras`) values (1,'SK220LCIV S/N LLU2062',1,'5000.00','7000.00',3,'excavadora1.jpg','6000.00'),(2,'955K S/N 85J1942',2,'4000.00','6000.00',3,'cargadora1.jpg','5000.00'),(3,'P185JWD',3,'3000.00','5000.00',3,'compresor1.jpg','4000.00');

/*Table structure for table `nivel` */

DROP TABLE IF EXISTS `nivel`;

CREATE TABLE `nivel` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(15) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `nivel` */

insert  into `nivel`(`codigo`,`nivel`) values (1,'Administrador'),(2,'Encargado'),(3,'Cliente');

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_transaccion` varchar(30) NOT NULL,
  `cod_sol` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `cod_banco` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `cod_sol` (`cod_sol`),
  KEY `cod_banco` (`cod_banco`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`cod_sol`) REFERENCES `solicitud` (`codigo`),
  CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`cod_banco`) REFERENCES `banco` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pagos` */

/*Table structure for table `solicitud` */

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estatus` varchar(15) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `cod_cliente` (`cod_cliente`),
  CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `solicitud` */

/*Table structure for table `solicitud_maquinaria` */

DROP TABLE IF EXISTS `solicitud_maquinaria`;

CREATE TABLE `solicitud_maquinaria` (
  `cod_sol` int(11) NOT NULL,
  `placa_maq` varchar(15) NOT NULL,
  `precio_alq` decimal(10,2) NOT NULL,
  `precio_mora` decimal(10,2) NOT NULL,
  `dias` int(11) NOT NULL,
  `precio_tras` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cod_sol`,`placa_maq`),
  KEY `placa_maq` (`placa_maq`),
  CONSTRAINT `solicitud_maquinaria_ibfk_1` FOREIGN KEY (`cod_sol`) REFERENCES `solicitud` (`codigo`),
  CONSTRAINT `solicitud_maquinaria_ibfk_2` FOREIGN KEY (`placa_maq`) REFERENCES `maquinaria` (`placa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `solicitud_maquinaria` */

/*Table structure for table `solicitud_temp` */

DROP TABLE IF EXISTS `solicitud_temp`;

CREATE TABLE `solicitud_temp` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `cod_cliente` (`cod_cliente`),
  CONSTRAINT `solicitud_temp_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `solicitud_temp` */

/*Table structure for table `temporal_maquinaria` */

DROP TABLE IF EXISTS `temporal_maquinaria`;

CREATE TABLE `temporal_maquinaria` (
  `codigo_temp` int(11) NOT NULL,
  `codigo_maq` int(11) NOT NULL,
  PRIMARY KEY (`codigo_temp`,`codigo_maq`),
  KEY `codigo_maq` (`codigo_maq`),
  CONSTRAINT `temporal_maquinaria_ibfk_1` FOREIGN KEY (`codigo_temp`) REFERENCES `solicitud_temp` (`codigo`),
  CONSTRAINT `temporal_maquinaria_ibfk_2` FOREIGN KEY (`codigo_maq`) REFERENCES `modelo_maquinaria` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `temporal_maquinaria` */

/*Table structure for table `tipo_maquinaria` */

DROP TABLE IF EXISTS `tipo_maquinaria`;

CREATE TABLE `tipo_maquinaria` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_maquinaria` */

insert  into `tipo_maquinaria`(`codigo`,`tipo`) values (1,'Excavadora'),(2,'Cargador de Cadenas'),(3,'Compresor');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(15) NOT NULL,
  `cod_nivel` int(11) NOT NULL,
  PRIMARY KEY (`usuario`),
  KEY `cod_nivel` (`cod_nivel`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_nivel`) REFERENCES `nivel` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`usuario`,`clave`,`cod_nivel`) values ('administrador','123456',1),('cliente','123456',3),('encargado','123456',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
