-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: mbs
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consulta` (
  `paciente_nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha_1consulta` date NOT NULL,
  `num_consulta` int NOT NULL,
  `fecha_consulta` date NOT NULL,
  `motivo_consulta` varchar(800) DEFAULT NULL,
  `sintomas` varchar(800) DEFAULT NULL,
  `emociones` varchar(800) DEFAULT NULL,
  `agrava` varchar(800) DEFAULT NULL,
  `mejora` varchar(800) DEFAULT NULL,
  `antojos` varchar(800) DEFAULT NULL,
  `IAS_general` varchar(800) DEFAULT NULL,
  `IAS_respiratorio` varchar(800) DEFAULT NULL,
  `IAS_cardiovascular` varchar(800) DEFAULT NULL,
  `IAS_gastrointestinal` varchar(800) DEFAULT NULL,
  `IAS_genitourinario` varchar(800) DEFAULT NULL,
  `IAS_endocrino` varchar(800) DEFAULT NULL,
  `IAS_nervioso` varchar(800) DEFAULT NULL,
  `IAS_visual` varchar(800) DEFAULT NULL,
  `IAS_auditivo` varchar(800) DEFAULT NULL,
  `IAS_musesq` varchar(800) DEFAULT NULL,
  `IAS_otros` varchar(800) DEFAULT NULL,
  `paciente_observacion` varchar(500) DEFAULT NULL,
  `auscultacion` varchar(500) DEFAULT NULL,
  `iridologia_der` varchar(500) DEFAULT NULL,
  `iridologia_izq` varchar(500) DEFAULT NULL,
  `estatura` decimal(3,2) DEFAULT NULL,
  `temperatura` decimal(3,1) DEFAULT NULL,
  `oxigenacion` int DEFAULT NULL,
  `FC` int DEFAULT NULL,
  `peso` decimal(4,1) DEFAULT NULL,
  `PAS` int DEFAULT NULL,
  `PAD` int DEFAULT NULL,
  `recomendación` varchar(500) DEFAULT NULL,
  `ingreso` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`paciente_nombre`,`fecha_1consulta`,`num_consulta`),
  CONSTRAINT `fk_consulta_paciente` FOREIGN KEY (`paciente_nombre`, `fecha_1consulta`) REFERENCES `paciente` (`paciente_nombre`, `fecha_1consulta`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estudio`
--

DROP TABLE IF EXISTS `estudio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudio` (
  `paciente_nombre` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha_1consulta` date NOT NULL,
  `estudio_fecha` date NOT NULL,
  `estudio_doc` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`paciente_nombre`,`fecha_1consulta`,`estudio_fecha`),
  CONSTRAINT `fk_estudio_paciente` FOREIGN KEY (`paciente_nombre`, `fecha_1consulta`) REFERENCES `paciente` (`paciente_nombre`, `fecha_1consulta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estudio_parametro`
--

DROP TABLE IF EXISTS `estudio_parametro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudio_parametro` (
  `paciente_nombre` varchar(500) NOT NULL,
  `fecha_1consulta` date NOT NULL,
  `estudio_fecha` date NOT NULL,
  `param_nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `param_valor` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `param_rango` varchar(20) NOT NULL,
  `param_observacion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`paciente_nombre`,`fecha_1consulta`,`estudio_fecha`,`param_nombre`),
  CONSTRAINT `fk_estudio_parametro_estudio` FOREIGN KEY (`paciente_nombre`, `fecha_1consulta`, `estudio_fecha`) REFERENCES `estudio` (`paciente_nombre`, `fecha_1consulta`, `estudio_fecha`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `inmunizacion`
--

DROP TABLE IF EXISTS `inmunizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inmunizacion` (
  `paciente_nombre` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha_1consulta` date NOT NULL,
  `inm_nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `inm_lab` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `inm_sintomas` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `inm_anotacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`paciente_nombre`,`fecha_1consulta`,`inm_nombre`),
  CONSTRAINT `fk_inmunizacion_paciente` FOREIGN KEY (`paciente_nombre`, `fecha_1consulta`) REFERENCES `paciente` (`paciente_nombre`, `fecha_1consulta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `materia_medica`
--

DROP TABLE IF EXISTS `materia_medica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia_medica` (
  `medhom_nombre` varchar(100) NOT NULL,
  `medhom_desc` varchar(1500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `medhom_complementario` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`medhom_nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicamento` (
  `paciente_nombre` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha_1consulta` date NOT NULL,
  `tx_num` decimal(4,1) NOT NULL,
  `medtx_num` int NOT NULL,
  `medtx_capacidad` varchar(20) NOT NULL,
  `medtx_dosis` varchar(20) NOT NULL,
  `medtx_nombre` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `medtx_leyenda` varchar(100) NOT NULL,
  PRIMARY KEY (`paciente_nombre`,`fecha_1consulta`,`tx_num`,`medtx_num`),
  CONSTRAINT `fk_medicamento_tratamiento` FOREIGN KEY (`paciente_nombre`, `fecha_1consulta`, `tx_num`) REFERENCES `tratamiento` (`paciente_nombre`, `fecha_1consulta`, `tx_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `paciente_nombre` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha_1consulta` date NOT NULL,
  `paciente_tel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `paciente_tel_tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `paciente_email` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `paciente_direccion` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `paciente_fecha_nac` date NOT NULL,
  `paciente_edad` int NOT NULL,
  `paciente_hijos_status` tinyint NOT NULL,
  `paciente_ocupacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `paciente_nombre_comun` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `APP-TX` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `HEA` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `AHF` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `APNP` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `APP` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `AGO` varchar(800) DEFAULT NULL,
  `proxima_consulta` datetime DEFAULT NULL,
  `periodicidad` int DEFAULT NULL,
  `posibles` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`paciente_nombre`,`fecha_1consulta`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sintoma`
--

DROP TABLE IF EXISTS `sintoma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sintoma` (
  `medhom_nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `medhom_sint_num` int NOT NULL,
  `medhom_sint_categoria` varchar(40) DEFAULT NULL,
  `medhom_sintoma` varchar(4500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `medhom_sint_efectividad` int NOT NULL,
  PRIMARY KEY (`medhom_nombre`,`medhom_sint_num`),
  CONSTRAINT `fk_sintoma_materia_medica` FOREIGN KEY (`medhom_nombre`) REFERENCES `materia_medica` (`medhom_nombre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tratamiento`
--

DROP TABLE IF EXISTS `tratamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tratamiento` (
  `paciente_nombre` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha_1consulta` date NOT NULL,
  `tx_num` decimal(4,1) NOT NULL,
  `tx_fecha` date NOT NULL,
  PRIMARY KEY (`paciente_nombre`,`fecha_1consulta`,`tx_num`),
  CONSTRAINT `fk_tratamiento_paciente` FOREIGN KEY (`paciente_nombre`, `fecha_1consulta`) REFERENCES `paciente` (`paciente_nombre`, `fecha_1consulta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-23 21:45:20
