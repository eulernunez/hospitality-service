/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : sellers

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2018-03-16 20:12:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `anuncios`
-- ----------------------------
DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `room_type_id` tinyint(4) DEFAULT NULL,
  `title_ad` varchar(255) DEFAULT NULL,
  `comments_ad` text,
  `address_ad` text,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(120) DEFAULT NULL,
  `country` int(8) DEFAULT NULL,
  `price_ad` float(10,4) DEFAULT NULL,
  `bed_type_id` tinyint(4) DEFAULT NULL,
  `surface_type_id` tinyint(4) DEFAULT NULL,
  `persons_number_id` tinyint(4) DEFAULT NULL,
  `free_service_internet` tinyint(4) DEFAULT NULL,
  `free_service_wifi` tinyint(4) DEFAULT NULL,
  `free_service_newspaper` tinyint(4) DEFAULT NULL,
  `free_service_breakfast_include` tinyint(4) DEFAULT NULL,
  `other_service_full_ac` tinyint(4) DEFAULT NULL,
  `other_service_private_balcony` tinyint(4) DEFAULT NULL,
  `other_service_flat_screen_tv` tinyint(4) DEFAULT NULL,
  `other_service_room_service` tinyint(4) DEFAULT NULL,
  `other_service_beach_view` tinyint(4) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `gasto_tramite` float(10,4) DEFAULT NULL,
  `fianza` float(10,4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of anuncios
-- ----------------------------
INSERT INTO `anuncios` VALUES ('3', '1', '3', 'Habitación grande y luminosa', 'Alquilo está habitación que estará disponible a partir del 01 de diciembre de 2017. El piso es sólo para chicos extranjeros que estudien o trabajen (CHICAS NO) de 21 a 27 años. El ambiente es tranquilo y ordenado. Hay 1 baño grande para 4 roomates. Cocina equipada, lavadora, aspiradora, plancha y calefacción (aunque la casa no es fría). Lo mejor de todo es que tiene una excelente ubicación, a una calle de la estación de autobuses nord, línea de metro L1 Arco fe triunfo', 'Av. Gran Via 500', '08013', 'Barcelona', '206', '900.0000', '2', '5', '7', '1', null, '1', null, '1', '1', null, null, null, '2017-11-04 23:05:26', '10.0000', '300.0000', '1');
INSERT INTO `anuncios` VALUES ('8', '1', '3', 'Alquiler de piso en calle de Craywinckel', 'Precioso piso de 100m2 con 3 habitaciones en Sant Gervasi! Está recién REFORMADO, completamente AMUEBLADO y listo para entrar a vivir. Tiene 2 habitaciones dobles y 1 individual. El salón comedor es amplio, muy luminoso e incluye la cocina americana totalmente equipada (horno, vitrocerámica, nevera, microondas, lavavajillas, cafetera, tostadora…) Además hay una moderna galería exterior con lavadora y tendedero. El piso tiene 2 baños completos con ducha. Dispone de suelos de parquet, CALEFACCIÓN y AIRE ACONDICIONADO. Es un 2º piso en finca regia con ascensor y servicio de portería de mañana y tarde. Está ubicado en la zona del Putxet, en una calle muy comercial y muy bien comunicado por metro, ferrocarriles y autobuses. El contrato mínimo de alquiler es de 1 año y se pide una fianza de 4 meses.', 'calle de Craywinckel, El Putxet i el Farró, Barcelona', '08013', 'Barcelona', '206', '1200.0000', '1', '3', '4', '1', '1', null, null, '1', '1', '1', null, null, '2017-11-09 00:33:08', '10.0000', '450.0000', '1');
INSERT INTO `anuncios` VALUES ('9', '1', '3', 'Alquiler de habitación en calle de Marià Cubí', 'Alquilo habitación con cama doble y armario de 2m de ancho x 2,10m de alto. La habitación se compone de 2 estancias. Habitación con balcón + un vestidor con armario. \r\n\r\nEl piso dispone de 3 habitaciones. 1 para cada persona y la 3a usada como estudio vestidor para compartir entre los 2.\r\n\r\nEl piso tiene salón comedor con balcón, cocina y un baño.\r\nTodas las estancias menos 3a hab son exteriores.\r\n\r\nAire acondicionado/bomba de calor en las 2hab y el salón.\r\n\r\nEl precio incluye la habitación + medio vestidor(3a hab compartida) y asistenta una vez por semana(zonas comunes)\r\nGastos de agua, gas, electricidad e internet a parte. Calculo que 50€/mes', 'calle de Marià Cubí, 196, Sant Gervasi - Galvany, Barcelona', '08013', 'Barcelona', '206', '500.0000', '1', '3', '3', '1', '1', null, null, '1', '1', '1', null, null, '2017-11-09 00:33:08', '10.0000', '500.0000', '1');
INSERT INTO `anuncios` VALUES ('12', '5', '1', 'Test con propietario', 'descripcion de la muestra', 'dirección de la muestra', '08013', 'Barcelona', '206', '456.0000', '2', '2', '2', '1', '1', '1', '1', null, null, null, null, null, '2017-12-14 22:13:27', '11.0000', '600.0000', '0');
INSERT INTO `anuncios` VALUES ('13', '6', '2', 'Anuncio de prueba', 'Anunicio de prueba Anunicio de prueba Anunicio de prueba Anunicio de prueba', 'Anunicio de prueba Anunicio de prueba Anunicio de prueba Anunicio de prueba', '08013', 'Barcelona', '206', '900.0000', '1', '3', '3', null, '1', '1', null, null, null, '1', '1', '1', '2017-12-15 00:03:52', '10.0000', '250.0000', '1');
INSERT INTO `anuncios` VALUES ('14', '4', '2', 'prueba adicional', 'prueba adicional prueba adicional prueba adicional', 'prueba adicional', '08013', 'Barcelona', '206', '800.0000', '2', '5', '4', null, '1', '1', null, '1', '1', null, '1', null, '2017-12-20 01:10:32', '10.0000', '1200.0000', '1');
INSERT INTO `anuncios` VALUES ('20', '3', '1', 'Habitación de Prueba', 'Texto de prueba de un anuncio', 'Texto de prueba de un anuncio', '08013', 'Barcelona', '206', '800.0000', '1', '4', '4', '1', '1', null, null, null, null, '1', '1', null, '2018-01-12 22:24:17', null, null, '0');
INSERT INTO `anuncios` VALUES ('21', '4', '1', 'Habitación de Euler', 'Habitación de Euler en Nagua Habitación de Euler en Nagua Habitación de Euler en Nagua Habitación de Euler en Nagua Habitación de Euler en Nagua Habitación de Euler en Nagua Habitación de Euler en Nagua.', 'Dirección de Nagua Dirección de Nagua Dirección de Nagua Dirección de Nagua Dirección de Nagua Dirección de Nagua Dirección de Nagua Dirección de Nagua Dirección de Nagua ', '08013', 'Barcelona', '206', '950.0000', '2', '5', '3', '1', '1', null, null, null, null, '1', '1', '1', '2018-01-12 23:16:46', null, null, '0');
INSERT INTO `anuncios` VALUES ('22', '4', '3', 'Habitación de Luxe de Euler', 'Descripción de la habitación de Euler Descripción de la habitación de Euler', 'Descripción de la habitación de EulerDescripción de la habitación de EulerDescripción de la habitación de Euler', '08013', 'Barcelona', '206', '750.0000', '2', '5', '5', '1', '1', null, null, null, null, '1', '1', '1', '2018-01-12 23:23:28', null, null, '0');
INSERT INTO `anuncios` VALUES ('23', '11', '1', 'Apartamento lujoso', 'Apartamento lujosoApartamento lujoso Apartamento lujoso Apartamento lujoso Apartamento lujoso Apartamento lujoso Apartamento lujoso Apartamento lujoso Apartamento lujosoApartamento lujoso.', 'c/ Auisias March, 121 ENT 1', '08013', 'Barcelona', '206', '850.0000', '2', '6', '5', '1', '1', null, null, '1', '1', null, null, null, '2018-01-21 23:30:06', '10.0000', '850.0000', '1');
INSERT INTO `anuncios` VALUES ('25', '12', '1', 'apartamento en alquiler temporal', 'se alquila apartamento de tres habitaciones para el mes de junio, julio y agosto. estancia mínima 6 dias', 'concilio de trento 77 1° 4°', '08018', 'barcelona', '206', '250.0000', '2', '3', '6', '1', '1', null, '1', null, null, null, null, null, '2018-01-29 02:33:12', null, null, '0');
INSERT INTO `anuncios` VALUES ('26', '6', '1', 'Alquiler de Habitación en Av. Diagonal', 'Comparto piso solo para estancias breves de una semana o dos. No hay estancia mínima. Es un piso muy grande y cómodo. Solo tiene un baño. Está a 5 minutos andando de la metro amarilla Verdaguer (cerca también de las lineas azul y lila). En 15-20 minutos andando desde el centro.', 'Avenida Diagonal, 305\r\nBarrio La Dreta de l\'Eixample\r\nDistrito Eixample\r\n', '08020', 'Barcelona', '206', '500.0000', '1', '3', '1', '1', '1', null, null, '1', '1', '1', null, null, '2018-03-03 21:51:31', '10.0000', '500.0000', '1');

-- ----------------------------
-- Table structure for `beds`
-- ----------------------------
DROP TABLE IF EXISTS `beds`;
CREATE TABLE `beds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bed` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beds
-- ----------------------------

-- ----------------------------
-- Table structure for `booking`
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_name` varchar(250) DEFAULT NULL,
  `booking_document` varchar(250) DEFAULT NULL,
  `booking_email` varchar(250) DEFAULT NULL,
  `booking_phone` varchar(250) DEFAULT NULL,
  `booking_country` int(6) DEFAULT NULL,
  `booking_checkin` datetime DEFAULT NULL,
  `booking_checkout` datetime DEFAULT NULL,
  `booking_adults` tinyint(4) DEFAULT NULL,
  `booking_children` tinyint(4) DEFAULT NULL,
  `booking_roomtype` tinyint(4) DEFAULT NULL,
  `booking_comments` text,
  `active` tinyint(4) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `anuncio_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES ('265', 'Euler Núñez', 'Y0204715Y', 'eulernunez@hotmail.cat', '678974291', '0', '2018-02-20 00:00:00', '2018-02-27 00:00:00', '1', '0', '0', '', '1', '2018-02-18 00:29:49', '23');
INSERT INTO `booking` VALUES ('266', 'Euler Núñez', 'B0204715B', 'eulernunez@hotmail.com', '999888777', '170', '2018-02-25 00:00:00', '2018-02-28 00:00:00', '1', '1', '0', 'Frutas de temporada en la habitación.', '1', '2018-02-18 00:32:28', '23');
INSERT INTO `booking` VALUES ('267', 'Euler Núñez', 'y0204715y', 'eulernunez@hotmail.es', '67895984', '0', '2018-02-18 00:00:00', '2018-02-27 00:00:00', '1', '0', '0', '', '1', '2018-02-18 01:13:34', '23');
INSERT INTO `booking` VALUES ('268', 'Euler Núñez', 'Y0204175i', 'eulernunez@hotmail.com', '7878787', '9', '2018-02-19 00:00:00', '2018-02-27 00:00:00', '1', '1', '0', 'jn nkjnj jnjnj jnjnjn klmkmlm kmlkmk', '1', '2018-02-18 01:14:36', '23');
INSERT INTO `booking` VALUES ('269', 'ramon', '37561247f', 'rtorres18@ono.com', '933080443', '5', '2018-02-21 00:00:00', '2018-02-28 00:00:00', '2', '1', '0', 'sin requerimientos', '1', '2018-02-18 08:43:33', '0');
INSERT INTO `booking` VALUES ('270', 'ramon', '37561249', 'rtorres18@ono.com', '933080443', '0', '2018-02-20 00:00:00', '2018-02-27 00:00:00', '2', '0', '0', '', '1', '2018-02-18 09:03:57', '9');
INSERT INTO `booking` VALUES ('271', 'Euler Núñez', 'Y0204715Y', 'eulernunez@hotmail.cat', '678974291', '0', '2018-02-26 00:00:00', '2018-02-28 00:00:00', '1', '0', '0', '', '1', '2018-02-18 20:54:15', '23');
INSERT INTO `booking` VALUES ('272', 'ramon', '37561249', 'rtorres18@ono.com', '685172932', '5', '2018-03-01 00:00:00', '2018-03-06 00:00:00', '2', '1', '0', 'sin requerimientos', '1', '2018-02-26 03:14:51', '3');
INSERT INTO `booking` VALUES ('273', 'ramon', '37561249h', 'rtorres18@ono.com', '933080443', '0', '2018-03-01 00:00:00', '2018-03-06 00:00:00', '2', '0', '0', '', '1', '2018-02-26 03:18:38', '3');
INSERT INTO `booking` VALUES ('274', 'Euler Núñez', 'Y0204715Y', 'eulernunez@hotmail.cat', '678974291', '0', '2018-03-11 00:00:00', '2018-03-28 00:00:00', '1', '0', '0', '', '1', '2018-03-02 21:51:33', '9');
INSERT INTO `booking` VALUES ('275', 'Euler Núñez', 'Y0204715', 'eulernunez@hotmail.com', '678974291', '170', '2018-03-04 00:00:00', '2018-03-27 00:00:00', '1', '1', '0', 'Observaciones', '1', '2018-03-02 21:53:52', '9');
INSERT INTO `booking` VALUES ('276', 'ramon', '37561249', 'rtorres18@ono.com', '933080443', '5', '2018-03-03 00:00:00', '2018-03-05 00:00:00', '2', '1', '0', '', '1', '2018-03-03 01:47:01', '9');
INSERT INTO `booking` VALUES ('277', 'ramon', '37561249H', 'rtorres18@ono.com', '933080443', '0', '2018-03-05 00:00:00', '2018-03-10 00:00:00', '2', '0', '0', '', '1', '2018-03-03 10:25:49', '13');
INSERT INTO `booking` VALUES ('278', 'ramon', '37561249h', 'rtorres18@ono.com', '933080443', '0', '2018-03-04 00:00:00', '2018-03-10 00:00:00', '2', '0', '0', '', '1', '2018-03-04 02:14:31', '26');
INSERT INTO `booking` VALUES ('279', 'Ramon Torres', '37561249H', 'rtorres18@ono.com', '685172932', '0', '2018-03-06 00:00:00', '2018-03-11 00:00:00', '2', '0', '0', '', '1', '2018-03-05 09:47:44', '26');
INSERT INTO `booking` VALUES ('280', 'Euler Núñez', '26262626', 'eulernunez@hotmail.com', '7878787', '206', '2018-03-19 00:00:00', '2018-03-21 00:00:00', '1', '1', '0', 'mis necesidades son ... ', '1', '2018-03-10 22:28:03', '26');

-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text,
  `created` datetime DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('9', 'Felix Guerrero', '963852741', 'rtorres18@ono.com', 'Interes', 'servidor de producción. ... La idea del virtualhost es que sea un ambiente casí 100% paralelo a tu hosting, por lo que solo es cuestión de que subas todo tu contenido tal cual a tu servidor, en la carpeta public', '2018-03-02 23:46:26', '1');
INSERT INTO `contacts` VALUES ('10', 'Ramon', '685172932', 'rtorres18@ono.com', 'alojamiento disponible', 'hola, dispongo de una habitación para alojamiento temporal para dos personas y quisiera mas informacion', '2018-03-05 09:03:43', '1');
INSERT INTO `contacts` VALUES ('13', 'Pablo Casado', 'NA', 'pcasado@pp.com', 'NA', 'Deseamos que tener  ...', '2018-03-10 21:22:58', '1');
INSERT INTO `contacts` VALUES ('14', 'ramon', 'NA', 'rtorres18@ono.com', 'NA', 'quisiera mas informacion sobre.....', '2018-03-11 02:33:19', '1');
INSERT INTO `contacts` VALUES ('15', 'ramon', '933080443', 'rtorres18@ono.com', 'informacion', 'mas informacion', '2018-03-11 02:51:24', '1');
INSERT INTO `contacts` VALUES ('16', 'ramon', '933080443', 'rtorres18@ono.com', 'informacion', 'mas informacion', '2018-03-11 02:53:40', '1');

-- ----------------------------
-- Table structure for `ibis`
-- ----------------------------
DROP TABLE IF EXISTS `ibis`;
CREATE TABLE `ibis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(245) DEFAULT NULL,
  `file_ext` varchar(5) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `state` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ibis
-- ----------------------------
INSERT INTO `ibis` VALUES ('2', 'ficha-curso-html-y-css.pdf', 'pdf', '22', '1');
INSERT INTO `ibis` VALUES ('3', 'ficha-curso-html-y-css.pdf', 'pdf', '3', '1');
INSERT INTO `ibis` VALUES ('4', 'ficha-curso-html-y-css.pdf', 'pdf', '7', '1');
INSERT INTO `ibis` VALUES ('5', 'ficha-curso-html-y-css.pdf', 'pdf', '8', '1');
INSERT INTO `ibis` VALUES ('6', 'ficha-curso-html-y-css.pdf', 'pdf', '9', '1');
INSERT INTO `ibis` VALUES ('7', 'ficha-curso-html-y-css.pdf', 'pdf', '12', '1');
INSERT INTO `ibis` VALUES ('8', 'ficha-curso-html-y-css.pdf', 'pdf', '13', '1');
INSERT INTO `ibis` VALUES ('9', 'ficha-curso-html-y-css.pdf', 'pdf', '14', '1');
INSERT INTO `ibis` VALUES ('10', 'ficha-curso-html-y-css.pdf', 'pdf', '15', '1');
INSERT INTO `ibis` VALUES ('11', 'ficha-curso-html-y-css.pdf', 'pdf', '16', '1');
INSERT INTO `ibis` VALUES ('12', 'ficha-curso-html-y-css.pdf', 'pdf', '17', '1');
INSERT INTO `ibis` VALUES ('13', 'ficha-curso-html-y-css.pdf', 'pdf', '18', '1');
INSERT INTO `ibis` VALUES ('14', 'ficha-curso-html-y-css.pdf', 'pdf', '19', '1');
INSERT INTO `ibis` VALUES ('15', 'ficha-curso-html-y-css.pdf', 'pdf', '20', '1');
INSERT INTO `ibis` VALUES ('16', 'ficha-curso-html-y-css.pdf', 'pdf', '21', '1');
INSERT INTO `ibis` VALUES ('17', 'solicitud_cambio.pdf', 'pdf', '23', '1');
INSERT INTO `ibis` VALUES ('18', 'solicitud_cambio.pdf', 'pdf', '26', '1');

-- ----------------------------
-- Table structure for `owners`
-- ----------------------------
DROP TABLE IF EXISTS `owners`;
CREATE TABLE `owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address` text,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(120) DEFAULT NULL,
  `country` int(8) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of owners
-- ----------------------------
INSERT INTO `owners` VALUES ('1', 'Luis Merino', '37562472J', '689357412', null, 'luismerino@msn.com', 'Ingresando a la medida de los cambios territoriales', null, null, null, '1', '2017-12-11 23:03:25');
INSERT INTO `owners` VALUES ('2', 'Carlos Torres', '37562472J', '69325154', null, 'carlos@google.com', 'hvjvj bhb bhb hbjh bhb bjbhj bjhb bhjbh hb', null, null, null, '1', '2017-12-12 00:21:55');
INSERT INTO `owners` VALUES ('3', 'Pedro Sanchez', '37562472J', '222222222', null, 'pedro@msn.com', 'mkmkkm', null, null, null, '1', '2017-12-12 00:28:06');
INSERT INTO `owners` VALUES ('4', 'Euler Núñez', null, '3333334555', null, 'euler@msn.com', 'cuarto ingreso', null, null, null, '1', '2017-12-12 00:29:52');
INSERT INTO `owners` VALUES ('5', 'Test', null, '111111111', null, 'test@msn.com', 'nueve', null, null, null, '1', '2017-12-14 21:56:39');
INSERT INTO `owners` VALUES ('6', 'Victor Urbano', null, '789456123', null, 'victorurbano@msn.com', 'diecccion ', null, null, null, '1', '2017-12-15 00:02:11');
INSERT INTO `owners` VALUES ('7', 'Felix Guerrero', 'DNI: Y0204715Y', '678974291', '936852147', 'eulernunez@hotmail.com', 'c/ Ausias March, 121 ENT 1\r\n08013\r\nBarcelona\r\nEspaña', null, null, null, '1', '2018-01-21 00:12:15');
INSERT INTO `owners` VALUES ('8', 'Felix Guerrero', 'DNI: Y0204715Y', '678974291', '936582147', 'eulernunez@hotmail.com', 'c/ Ausias March, 121 ENT 1\r\n08013\r\nBarcelona\r\nEspaña\r\n', null, null, null, '1', '2018-01-21 00:15:08');
INSERT INTO `owners` VALUES ('10', 'Luis Torres', 'Y0204715Y', '678974291', '936852147', 'fincasrmeza@gmail.com', 'c/ Ausias Marc 211\r\n08013', null, null, null, '1', '2018-01-21 01:02:30');
INSERT INTO `owners` VALUES ('11', 'Euler Núñez Neuer', 'Y0204715Y', '936582471', '678974291', 'eulernunez@hotmail.com', 'c/ Ausias March, 121', '08013', 'Barcelona', '206', '1', '2018-01-21 22:20:32');
INSERT INTO `owners` VALUES ('12', 'ramon', '37562472J', '933080443', '685172932', 'rtorres18@ono.com', 'concilio de trento 77 1°4°', '08018', 'barcelona ', '206', '1', '2018-01-29 02:24:49');

-- ----------------------------
-- Table structure for `persons`
-- ----------------------------
DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of persons
-- ----------------------------

-- ----------------------------
-- Table structure for `pics`
-- ----------------------------
DROP TABLE IF EXISTS `pics`;
CREATE TABLE `pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(245) DEFAULT NULL,
  `file_ext` varchar(5) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `state` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pics
-- ----------------------------
INSERT INTO `pics` VALUES ('1', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-canape-barcelona.jpg', 'jpg', '1', '3', '1');
INSERT INTO `pics` VALUES ('2', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-habitacion-simple-barcelona.jpg', 'jpg', '2', '3', '1');
INSERT INTO `pics` VALUES ('3', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-piscina-interior-barcelona.jpg', 'jpg', '2', '3', '1');
INSERT INTO `pics` VALUES ('4', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-comedor-2-barcelona.jpg', 'jpg', '2', '3', '1');
INSERT INTO `pics` VALUES ('5', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-para-eventos-barcelona.jpg', 'jpg', '2', '3', '1');
INSERT INTO `pics` VALUES ('6', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-paraiso-barcelona.jpg', 'jpg', '2', '3', '1');
INSERT INTO `pics` VALUES ('7', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-sanwich-de-esparragos-barcelona.jpg', 'jpg', '2', '3', '1');
INSERT INTO `pics` VALUES ('8', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-bar-salon-barcelona.jpg', 'jpg', '2', '3', '1');
INSERT INTO `pics` VALUES ('9', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-canape-barcelona.jpg', 'jpg', '2', '3', '1');
INSERT INTO `pics` VALUES ('10', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-comedor-eventos-barcelona.jpg', 'jpg', '1', '4', '1');
INSERT INTO `pics` VALUES ('11', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-pan-crujiente-barcelona.jpg', 'jpg', '2', '4', '1');
INSERT INTO `pics` VALUES ('12', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-pollo-parrilla-barcelona.jpg', 'jpg', '2', '4', '1');
INSERT INTO `pics` VALUES ('13', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-room-2-barcelona.jpg', 'jpg', '2', '4', '1');
INSERT INTO `pics` VALUES ('14', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-salon-eventos-barcelona.jpg', 'jpg', '2', '4', '1');
INSERT INTO `pics` VALUES ('15', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-suite1-barcelona.jpg', 'jpg', '2', '4', '1');
INSERT INTO `pics` VALUES ('16', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-suite-ramblas-2-barcelona.jpg', 'jpg', '2', '4', '1');
INSERT INTO `pics` VALUES ('17', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-suite-ramblas.jpg', 'jpg', '2', '4', '1');
INSERT INTO `pics` VALUES ('18', 'hotel-barato-barcelona-alojamiento-economico-hotel-españa-4-estrellas-salon-nupcial-barcelones.jpg', 'jpg', '2', '4', '1');
INSERT INTO `pics` VALUES ('19', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-suite1-barcelona.jpg', 'jpg', '1', '5', '1');
INSERT INTO `pics` VALUES ('20', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-catering-barcelona.jpg', 'jpg', '2', '5', '1');
INSERT INTO `pics` VALUES ('21', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-catering-singular-barcelona.jpg', 'jpg', '2', '5', '1');
INSERT INTO `pics` VALUES ('22', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-comedor-imperial-barcelona.jpg', 'jpg', '2', '5', '1');
INSERT INTO `pics` VALUES ('23', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-habitacion-simple-barcelona.jpg', 'jpg', '2', '5', '1');
INSERT INTO `pics` VALUES ('24', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-piscina-interior-barcelona.jpg', 'jpg', '2', '5', '1');
INSERT INTO `pics` VALUES ('25', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-comedor-2-barcelona.jpg', 'jpg', '2', '5', '1');
INSERT INTO `pics` VALUES ('26', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-para-eventos-barcelona.jpg', 'jpg', '2', '5', '1');
INSERT INTO `pics` VALUES ('27', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-paraiso-barcelona.jpg', 'jpg', '2', '5', '1');
INSERT INTO `pics` VALUES ('28', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-bocaditos-de-almendra-queso-barcelonaza.jpg', 'jpg', '1', '6', '1');
INSERT INTO `pics` VALUES ('29', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-catering-barcelona.jpg', 'jpg', '2', '6', '1');
INSERT INTO `pics` VALUES ('30', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-catering-singular-barcelona.jpg', 'jpg', '2', '6', '1');
INSERT INTO `pics` VALUES ('31', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-comedor-imperial-barcelona.jpg', 'jpg', '2', '6', '1');
INSERT INTO `pics` VALUES ('32', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-habitacion-simple-barcelona.jpg', 'jpg', '2', '6', '1');
INSERT INTO `pics` VALUES ('33', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-piscina-interior-barcelona.jpg', 'jpg', '2', '6', '1');
INSERT INTO `pics` VALUES ('34', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-comedor-2-barcelona.jpg', 'jpg', '2', '6', '1');
INSERT INTO `pics` VALUES ('35', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-para-eventos-barcelona.jpg', 'jpg', '2', '6', '1');
INSERT INTO `pics` VALUES ('36', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-paraiso-barcelona.jpg', 'jpg', '2', '6', '1');
INSERT INTO `pics` VALUES ('37', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-suitte-nupcial-barcelona.jpg', 'jpg', '1', '7', '1');
INSERT INTO `pics` VALUES ('38', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-cafeteria-barcelona.jpg', 'jpg', '2', '7', '1');
INSERT INTO `pics` VALUES ('39', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-comedor-barcelona.jpg', 'jpg', '2', '7', '1');
INSERT INTO `pics` VALUES ('40', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-eventos-barcelona.jpg', 'jpg', '2', '7', '1');
INSERT INTO `pics` VALUES ('41', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-fachada-hotel-barcelona.jpg', 'jpg', '2', '7', '1');
INSERT INTO `pics` VALUES ('42', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-habitacion-1-barcelona.jpg', 'jpg', '2', '7', '1');
INSERT INTO `pics` VALUES ('43', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-habitacion-bodal-barcelona.jpg', 'jpg', '2', '7', '1');
INSERT INTO `pics` VALUES ('44', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-habitacion-doble-barcelona.jpg', 'jpg', '2', '7', '1');
INSERT INTO `pics` VALUES ('45', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-habitacion-feliz-barcelona.jpg', 'jpg', '2', '7', '1');
INSERT INTO `pics` VALUES ('46', 'hotel-barato-barcelona-hotel-cid-sitges-habitacion-doble.jpg', 'jpg', '1', '8', '1');
INSERT INTO `pics` VALUES ('47', 'hotel-barato-barcelona-hotel-cid-sitges-1-estrella-aperitivos-buffet.jpg', 'jpg', '2', '8', '1');
INSERT INTO `pics` VALUES ('48', 'hotel-barato-barcelona-hotel-cid-sitges-1-estrella-entrada-salon-interior.jpg', 'jpg', '2', '8', '1');
INSERT INTO `pics` VALUES ('49', 'hotel-barato-barcelona-hotel-cid-sitges-1-estrella-habitacion.jpg', 'jpg', '2', '8', '1');
INSERT INTO `pics` VALUES ('50', 'hotel-barato-barcelona-hotel-cid-sitges-1-estrella-habitacion-condesa.jpg', 'jpg', '2', '8', '1');
INSERT INTO `pics` VALUES ('51', 'hotel-barato-barcelona-hotel-cid-sitges-1-estrella-habitacion-imperio.jpg', 'jpg', '2', '8', '1');
INSERT INTO `pics` VALUES ('52', 'hotel-barato-barcelona-hotel-cid-sitges-1-estrella-habitacion-individual.jpg', 'jpg', '2', '8', '1');
INSERT INTO `pics` VALUES ('53', 'hotel-barato-barcelona-hotel-cid-sitges-1-estrella-habitacion-nupcial.jpg', 'jpg', '2', '8', '1');
INSERT INTO `pics` VALUES ('54', 'hotel-barato-barcelona-hotel-cid-sitges-1-estrella-habitacion-vista-exterior.jpg', 'jpg', '2', '8', '1');
INSERT INTO `pics` VALUES ('55', 'hotel-barato-barcelona-alojamiento-economico-hotel-passeig-gracia-terraza-hotel-barcelona.jpg', 'jpg', '1', '9', '1');
INSERT INTO `pics` VALUES ('56', 'hotel-barato-barcelona-alojamiento-economico-hotel-passeig-gracia-habitacion-anastasia-barcelona.jpg', 'jpg', '2', '9', '1');
INSERT INTO `pics` VALUES ('57', 'hotel-barato-barcelona-alojamiento-economico-hotel-passeig-gracia-habitacion-doble-barcelona.jpg', 'jpg', '2', '9', '1');
INSERT INTO `pics` VALUES ('58', 'hotel-barato-barcelona-alojamiento-economico-hotel-passeig-gracia-habitacion-individual-barcelona.jpg', 'jpg', '2', '9', '1');
INSERT INTO `pics` VALUES ('59', 'hotel-barato-barcelona-alojamiento-economico-hotel-passeig-gracia-habitacion-matrimonio.jpg', 'jpg', '2', '9', '1');
INSERT INTO `pics` VALUES ('60', 'hotel-barato-barcelona-alojamiento-economico-hotel-passeig-gracia-habitacion-nupcial-barcelona.jpg', 'jpg', '2', '9', '1');
INSERT INTO `pics` VALUES ('61', 'hotel-barato-barcelona-alojamiento-economico-hotel-passeig-gracia-habitacion-turquesa-barcelona.jpg', 'jpg', '2', '9', '1');
INSERT INTO `pics` VALUES ('62', 'hotel-barato-barcelona-alojamiento-economico-hotel-passeig-gracia-pasillo-interior-barcelona.jpg', 'jpg', '2', '9', '1');
INSERT INTO `pics` VALUES ('63', 'hotel-barato-barcelona-alojamiento-economico-hotel-passeig-gracia-recepcion.jpg', 'jpg', '2', '9', '1');
INSERT INTO `pics` VALUES ('64', 'hotel-barato-barcelona-condal-2-estrellasl-la-boqueria-nueva.jpg', 'jpg', '1', '12', '1');
INSERT INTO `pics` VALUES ('65', 'hotel-barato-barcelona-condal-macba.jpg', 'jpg', '2', '12', '1');
INSERT INTO `pics` VALUES ('66', 'hotel-barato-barcelona-condal-outdoor-terrace.jpg', 'jpg', '2', '12', '1');
INSERT INTO `pics` VALUES ('67', 'hotel-barato-barcelona-condal-plaza-rea2l.jpg', 'jpg', '2', '12', '1');
INSERT INTO `pics` VALUES ('68', 'hotel-barato-barcelona-condal-plaza-real.jpg', 'jpg', '2', '12', '1');
INSERT INTO `pics` VALUES ('69', 'hotel-barato-barcelona-condal-reception.jpg', 'jpg', '2', '12', '1');
INSERT INTO `pics` VALUES ('70', 'hotel-barato-barcelona-condal-room-single.jpg', 'jpg', '2', '12', '1');
INSERT INTO `pics` VALUES ('71', 'hotel-barato-barcelona-condal-teatro-liceu-nueva2.jpg', 'jpg', '2', '12', '1');
INSERT INTO `pics` VALUES ('72', 'hotel-barato-barcelona-condal-teatro-liceu-nueva.jpg', 'jpg', '2', '12', '1');
INSERT INTO `pics` VALUES ('73', 'hotel-barato-barcelona-condal-2-estrellas-teatro-liceu.jpg', 'jpg', '1', '13', '1');
INSERT INTO `pics` VALUES ('74', 'hotel-barato-barcelona-condal-2-estrellas-fachada.jpg', 'jpg', '2', '13', '1');
INSERT INTO `pics` VALUES ('75', 'hotel-barato-barcelona-condal-2-estrellasl-la-boqueria-nueva.jpg', 'jpg', '2', '13', '1');
INSERT INTO `pics` VALUES ('76', 'hotel-barato-barcelona-condal-2-estrellas-outdoor-terrace2.jpg', 'jpg', '2', '13', '1');
INSERT INTO `pics` VALUES ('77', 'hotel-barato-barcelona-condal-2-estrellas-outdoor-terrace.jpg', 'jpg', '2', '13', '1');
INSERT INTO `pics` VALUES ('78', 'hotel-barato-barcelona-condal-2-estrellas-outdor-terrace.jpg', 'jpg', '2', '13', '1');
INSERT INTO `pics` VALUES ('79', 'hotel-barato-barcelona-condal-2-estrellas-ramblas-nueva1.jpg', 'jpg', '2', '13', '1');
INSERT INTO `pics` VALUES ('80', 'hotel-barato-barcelona-condal-2-estrellas-ramblas-nueva-2.jpg', 'jpg', '2', '13', '1');
INSERT INTO `pics` VALUES ('81', 'hotel-barato-barcelona-condal-2-estrellas-ramblas-nueva.jpg', 'jpg', '2', '13', '1');
INSERT INTO `pics` VALUES ('82', 'hotel-barato-barcelona-condal-2-estrellas-ramblas-nueva-2.jpg', 'jpg', '1', '14', '1');
INSERT INTO `pics` VALUES ('83', 'hotel-barato-barcelona-condal-2-estrellas-room-triple.jpg', 'jpg', '2', '14', '1');
INSERT INTO `pics` VALUES ('84', 'hotel-barato-barcelona-condal-2-estrellas-room-twin.jpg', 'jpg', '2', '14', '1');
INSERT INTO `pics` VALUES ('85', 'hotel-barato-barcelona-condal-2-estrellas-teatro-liceu.jpg', 'jpg', '2', '14', '1');
INSERT INTO `pics` VALUES ('86', 'hotel-barato-barcelona-condal-2-estrellas-teatro-liceu-nuevo.jpg', 'jpg', '2', '14', '1');
INSERT INTO `pics` VALUES ('87', 'hotel-barato-barcelona-condal- room-double.jpg', 'jpg', '2', '14', '1');
INSERT INTO `pics` VALUES ('88', 'hotel-barato-barcelona-condal-bcn-las-ramblas.jpg', 'jpg', '2', '14', '1');
INSERT INTO `pics` VALUES ('89', 'hotel-barato-barcelona-condal-breakfast2.jpg', 'jpg', '2', '14', '1');
INSERT INTO `pics` VALUES ('90', 'hotel-barato-barcelona-condal-breakfast.jpg', 'jpg', '2', '14', '1');
INSERT INTO `pics` VALUES ('91', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-habitacion-nupcial-barcelona.jpg', 'jpg', '1', '20', '1');
INSERT INTO `pics` VALUES ('92', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-habitacion-doble-barcelona.jpg', 'jpg', '2', '20', '1');
INSERT INTO `pics` VALUES ('93', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-habitacion-feliz-barcelona.jpg', 'jpg', '2', '20', '1');
INSERT INTO `pics` VALUES ('94', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-relax-barcelona.jpg', 'jpg', '2', '20', '1');
INSERT INTO `pics` VALUES ('95', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-restaurant-barcelona.jpg', 'jpg', '2', '20', '1');
INSERT INTO `pics` VALUES ('96', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-salon-barcelona.jpg', 'jpg', '2', '20', '1');
INSERT INTO `pics` VALUES ('97', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-suitte-nupcial-barcelona.jpg', 'jpg', '2', '20', '1');
INSERT INTO `pics` VALUES ('98', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-terraza-2-barcelona.jpg', 'jpg', '2', '20', '1');
INSERT INTO `pics` VALUES ('99', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-terraza-noche-barcelona.jpg', 'jpg', '2', '20', '1');
INSERT INTO `pics` VALUES ('100', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-relax-barcelona.jpg', 'jpg', '1', '21', '1');
INSERT INTO `pics` VALUES ('101', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-habitacion-doble-barcelona.jpg', 'jpg', '2', '21', '1');
INSERT INTO `pics` VALUES ('102', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-habitacion-feliz-barcelona.jpg', 'jpg', '2', '21', '1');
INSERT INTO `pics` VALUES ('103', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-relax-barcelona.jpg', 'jpg', '2', '21', '1');
INSERT INTO `pics` VALUES ('104', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-restaurant-barcelona.jpg', 'jpg', '2', '21', '1');
INSERT INTO `pics` VALUES ('105', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-salon-barcelona.jpg', 'jpg', '2', '21', '1');
INSERT INTO `pics` VALUES ('106', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-suitte-nupcial-barcelona.jpg', 'jpg', '2', '21', '1');
INSERT INTO `pics` VALUES ('107', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-terraza-2-barcelona.jpg', 'jpg', '2', '21', '1');
INSERT INTO `pics` VALUES ('108', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-terraza-noche-barcelona.jpg', 'jpg', '2', '21', '1');
INSERT INTO `pics` VALUES ('109', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-relax-barcelona.jpg', 'jpg', '1', '22', '1');
INSERT INTO `pics` VALUES ('110', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-salon-barcelona.jpg', 'jpg', '2', '22', '1');
INSERT INTO `pics` VALUES ('111', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-habitacion-bodal-barcelona.jpg', 'jpg', '2', '22', '1');
INSERT INTO `pics` VALUES ('112', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-habitacion-doble-barcelona.jpg', 'jpg', '2', '22', '1');
INSERT INTO `pics` VALUES ('113', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-habitacion-feliz-barcelona.jpg', 'jpg', '2', '22', '1');
INSERT INTO `pics` VALUES ('114', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-habitacion-nupcial-barcelona.jpg', 'jpg', '2', '22', '1');
INSERT INTO `pics` VALUES ('115', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-relax-barcelona.jpg', 'jpg', '2', '22', '1');
INSERT INTO `pics` VALUES ('116', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-restaurant-1-barcelona.jpg', 'jpg', '2', '22', '1');
INSERT INTO `pics` VALUES ('117', 'hotel-barato-barcelona-alojamiento-economico-hotel-condes-barcelona-4-estrellas-restaurant-barcelona.jpg', 'jpg', '2', '22', '1');
INSERT INTO `pics` VALUES ('118', 'hotel-barato-barcelona-alojamiento economico-hotel-espana-4-estrellas-aperiitivos-variados-barcelona.jpg', 'jpg', '1', '23', '1');
INSERT INTO `pics` VALUES ('119', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-habitacion-simple-barcelona.jpg', 'jpg', '2', '23', '1');
INSERT INTO `pics` VALUES ('120', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-piscina-interior-barcelona.jpg', 'jpg', '2', '23', '1');
INSERT INTO `pics` VALUES ('121', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-comedor-2-barcelona.jpg', 'jpg', '2', '23', '1');
INSERT INTO `pics` VALUES ('122', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-para-eventos-barcelona.jpg', 'jpg', '2', '23', '1');
INSERT INTO `pics` VALUES ('123', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-salon-paraiso-barcelona.jpg', 'jpg', '2', '23', '1');
INSERT INTO `pics` VALUES ('124', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-4-estrellas-sanwich-de-esparragos-barcelona.jpg', 'jpg', '2', '23', '1');
INSERT INTO `pics` VALUES ('125', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-bar-salon-barcelona.jpg', 'jpg', '2', '23', '1');
INSERT INTO `pics` VALUES ('126', 'hotel-barato-barcelona-alojamiento-economico-hotel-espana-canape-barcelona.jpg', 'jpg', '2', '23', '1');
INSERT INTO `pics` VALUES ('127', '9 -715 x450 -249973844_2.jpg', 'jpg', '1', '26', '1');
INSERT INTO `pics` VALUES ('128', '1 750 X 400--246371532_3.jpg', 'jpg', '2', '26', '1');
INSERT INTO `pics` VALUES ('129', '2-750 X 400-246371532_7.jpg', 'jpg', '2', '26', '1');
INSERT INTO `pics` VALUES ('130', '3- 750 X 400-246371532_8.jpg', 'jpg', '2', '26', '1');
INSERT INTO `pics` VALUES ('131', '4- 750 X 400-246371532_9.jpg', 'jpg', '2', '26', '1');
INSERT INTO `pics` VALUES ('132', '5- 750 X 400-249973844_2.jpg', 'jpg', '2', '26', '1');
INSERT INTO `pics` VALUES ('133', '6- 750 X 400-249973844_3.jpg', 'jpg', '2', '26', '1');
INSERT INTO `pics` VALUES ('134', '7 750 X 400-249973844_8.jpg', 'jpg', '2', '26', '1');
INSERT INTO `pics` VALUES ('135', '8 750 x 400-- FUENCARRAL - 244228085_6.jpg', 'jpg', '2', '26', '1');

-- ----------------------------
-- Table structure for `publications`
-- ----------------------------
DROP TABLE IF EXISTS `publications`;
CREATE TABLE `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title_publication` varchar(250) DEFAULT NULL,
  `contenido_publication` text,
  `contenido_publication_2` text,
  `tag_vacaciones` tinyint(4) DEFAULT NULL,
  `tag_playas` tinyint(4) DEFAULT NULL,
  `tag_resort_caribenyos` tinyint(4) DEFAULT NULL,
  `tag_hoteles` tinyint(4) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of publications
-- ----------------------------
INSERT INTO `publications` VALUES ('1', '3', 'Alquiler de habitación en calle de Viladomat, 210', 'El piso tiene parquet está totalmente equipado de dos baños, la cocina es muy agradable tiene vitrocerámica, microondas, un gran frigorífico, lavadora etc. Tiene un gran comedor con chimenea, balcón, Wi-fi, teléfono (llamadas nacionales gratis), calefacción, … Piso muy limpio.\r\nsólo una cosa, este es un piso tranquilo, así que buscamos a gente agradable y motivada, que trabaje. si estás interesado/a, mándame un mensaje y acordamos una visita para ver el piso o preguntar cualquier duda.', 'Se alquila para una chica UN STUDIO UNA ZONA PRIVADA con una habitación doble y otra individual con ventanas y SU PROPIO BAÑO con ducha.\r\nDisponible a partir del 1 de abril de 2018.\r\nEs ideal para un trabajador que busque vivir cómodamente en el centro de la ciudad. Esta muy bien comunicado cerca del metro L5 hospital clinic, de la stación Sants y de Francesc Macia', '0', '1', '0', '1', '2018-03-17 00:46:46', '1');
INSERT INTO `publications` VALUES ('2', '4', 'Alquiler de habitación en calle de Viladomat, 210', 'Se alquila para una chica UN STUDIO UNA ZONA PRIVADA con una habitación doble y otra individual con ventanas y SU PROPIO BAÑO con ducha.\r\nDisponible a partir del 1 de abril de 2018.\r\nEs ideal para un trabajador que busque vivir cómodamente en el centro de la ciudad. Esta muy bien comunicado cerca del metro L5 hospital clinic, de la stación Sants y de Francesc Macia', 'El piso tiene parquet está totalmente equipado de dos baños, la cocina es muy agradable tiene vitrocerámica, microondas, un gran frigorífico, lavadora etc. Tiene un gran comedor con chimenea, balcón, Wi-fi, teléfono (llamadas nacionales gratis), calefacción, … Piso muy limpio.\r\nsólo una cosa, este es un piso tranquilo, así que buscamos a gente agradable y motivada, que trabaje. si estás interesado/a, mándame un mensaje y acordamos una visita para ver el piso o preguntar cualquier duda.', '1', '1', '1', '1', '2018-03-17 00:47:58', '1');
INSERT INTO `publications` VALUES ('3', '1', 'Alquiler de habitación en calle de Viladomat, 210', 'El piso tiene parquet está totalmente equipado de dos baños, la cocina es muy agradable tiene vitrocerámica, microondas, un gran frigorífico, lavadora etc. Tiene un gran comedor con chimenea, balcón, Wi-fi, teléfono (llamadas nacionales gratis), calefacción, … Piso muy limpio.\r\nsólo una cosa, este es un piso tranquilo, así que buscamos a gente agradable y motivada, que trabaje. si estás interesado/a, mándame un mensaje y acordamos una visita para ver el piso o preguntar cualquier duda.', 'Se alquila para una chica UN STUDIO UNA ZONA PRIVADA con una habitación doble y otra individual con ventanas y SU PROPIO BAÑO con ducha.\r\nDisponible a partir del 1 de abril de 2018.\r\nEs ideal para un trabajador que busque vivir cómodamente en el centro de la ciudad. Esta muy bien comunicado cerca del metro L5 hospital clinic, de la stación Sants y de Francesc Macia', '1', '1', '1', '1', '2018-03-17 00:50:47', '1');
INSERT INTO `publications` VALUES ('4', '2', 'Alquiler de habitación en calle de Viladomat, 210', 'Se alquila para una chica UN STUDIO UNA ZONA PRIVADA con una habitación doble y otra individual con ventanas y SU PROPIO BAÑO con ducha.\r\nDisponible a partir del 1 de abril de 2018.\r\nEs ideal para un trabajador que busque vivir cómodamente en el centro de la ciudad. Esta muy bien comunicado cerca del metro L5 hospital clinic, de la stación Sants y de Francesc Macia', 'El piso tiene parquet está totalmente equipado de dos baños, la cocina es muy agradable tiene vitrocerámica, microondas, un gran frigorífico, lavadora etc. Tiene un gran comedor con chimenea, balcón, Wi-fi, teléfono (llamadas nacionales gratis), calefacción, … Piso muy limpio.\r\nsólo una cosa, este es un piso tranquilo, así que buscamos a gente agradable y motivada, que trabaje. si estás interesado/a, mándame un mensaje y acordamos una visita para ver el piso o preguntar cualquier duda.', '1', '0', '0', '1', '2018-03-17 00:54:10', '1');
INSERT INTO `publications` VALUES ('5', '1', 'Alquiler de habitación en calle de Viladomat, 210', 'El piso tiene parquet está totalmente equipado de dos baños, la cocina es muy agradable tiene vitrocerámica, microondas, un gran frigorífico, lavadora etc. Tiene un gran comedor con chimenea, balcón, Wi-fi, teléfono (llamadas nacionales gratis), calefacción, … Piso muy limpio.\r\nsólo una cosa, este es un piso tranquilo, así que buscamos a gente agradable y motivada, que trabaje. si estás interesado/a, mándame un mensaje y acordamos una visita para ver el piso o preguntar cualquier duda.', 'isponible a partir del 1 de abril de 2018.\r\nEs ideal para un trabajador que busque vivir cómodamente en el centro de la ciudad. Esta muy bien comun', '1', '1', '1', '1', '2018-03-17 00:57:00', '1');
INSERT INTO `publications` VALUES ('6', '1', 'Alquiler de habitación en calle de Viladomat, 210', 'isponible a partir del 1 de abril de 2018.\r\nEs ideal para un trabajador que busque vivir cómodamente en el centro de la ciudad. Esta muy bien comun', 'linic, de la stación Sants y de Francesc Macia.\r\nEl piso tiene parquet está totalmente equipado de dos baños, la cocina es muy agradable tiene vitrocerámica, microondas, un gran frigorífico, lavadora etc. Tiene un gran comedor con chimenea, balcón, Wi-fi, teléfono (llamadas nacionales gratis), calefacción, … Piso muy limpio.\r\nsólo una cosa, este es un piso tranquilo, así que buscamos a gente agradable y motivada, que trabaje. si estás interesado/a, mándame un mensaje y acorda', '1', '0', '0', '1', '2018-03-17 00:58:14', '1');
INSERT INTO `publications` VALUES ('7', '3', 'Alquiler de habitación en calle de Viladomat, 210', 'linic, de la stación Sants y de Francesc Macia.\r\nEl piso tiene parquet está totalmente equipado de dos baños, la cocina es muy agradable tiene vitrocerámica, microondas, un gran frigorífico, lavadora etc. Tiene un gran comedor con chimenea, balcón, Wi-fi, teléfono (llamadas nacionales gratis), calefacción, … Piso muy limpio.\r\nsólo una cosa, este es un piso tranquilo, así que buscamos a gente agradable y motivada, que trabaje. si estás interesado/a, mándame un mensaje y acorda', 'Se alquila para una chica UN STUDIO UNA ZONA PRIVADA con una habitación doble y otra individual con ventanas y SU PROPIO BAÑO con ducha.\r\nDisponible a partir del 1 de abril de 2018.\r\nEs ideal para un trabajador que busque vivir cómodamente en el centro de la ciudad. Esta muy bien comunicado cerca del metro L5 hospital clinic, de la stación Sants y de Francesc Macia.\r\nEl piso tiene parquet está totalmente equipado de dos baños, la cocina es muy agradable tiene vitrocerámica, microondas, un gran frigorífico, lavadora etc. Tiene un gran comedor con chimenea', '1', '1', '1', '1', '2018-03-17 00:59:54', '1');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `isAdministrador` tinyint(4) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('57', 'Ramon', 'fincasrmeza@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', '1');
INSERT INTO `usuario` VALUES ('58', 'Euler', 'eulernunez@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1');
