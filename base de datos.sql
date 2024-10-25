SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correoElectronico` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correoElectronico` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='		';
INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `correoElectronico`, `contrasena`, `direccion`, `telefono`, `fecha`) VALUES
(1, 'Gabriel', 'Ortega Martínez', 'gabrielortega097@gmail.com', '123', 'fadh', '3044836511', '2024-05-08 00:35:12'),
(2, 'Edgar', 'Ortiz celiz', 'eortiz@correo.edu.uts', '123', 'bucaramanga', '33330000', '2024-05-08 00:38:44');
CREATE TABLE `detallepedido` (
  `iddetallePedido` int(11) NOT NULL,
  `producto_idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `pedido_idpedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='	';
CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `fechaPedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`),
  ADD UNIQUE KEY `correoElectronico_UNIQUE` (`correoElectronico`);
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD UNIQUE KEY `correoElectronico_UNIQUE` (`correoElectronico`);
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`iddetallePedido`),
  ADD KEY `fk_detallePedido_producto1_idx` (`producto_idproducto`),
  ADD KEY `fk_detallePedido_pedido1_idx` (`pedido_idpedido`);
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `fk_pedido_cliente_idx` (`cliente_idcliente`);
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `detallepedido`
  MODIFY `iddetallePedido` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `fk_detallePedido_pedido1` FOREIGN KEY (`pedido_idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detallePedido_producto1` FOREIGN KEY (`producto_idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;