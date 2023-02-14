DB Scripts 
--------------------------------------
CREATE TABLE cliente (
  id_cliente serial NOT NULL,
  nombres character varying(100) NOT NULL,
  email character varying(150) NOT NULL,
  edad integer NOT NULL,
  direccion character varying(400),
  estado character varying(1) NOT NULL,
  fecha_insercion DATE NOT NULL DEFAULT CURRENT_DATE,
  fecha_actualizacion DATE,
  PRIMARY KEY (id_cliente)
);


CREATE TABLE factura (
  id_factura serial NOT NULL,
  id_cliente bigint NOT NULL,
  fecha_factura DATE NOT NULL,
  monto bigint NOT NULL,
  monto_impuesto bigint NOT NULL,
  estado character varying(1) NOT NULL,
  fecha_insercion DATE NOT NULL DEFAULT CURRENT_DATE,
  fecha_actualizacion DATE,
	CONSTRAINT factura_pkey PRIMARY KEY (id_factura),
    CONSTRAINT factura_id_cliente_fkey FOREIGN KEY (id_cliente)
        REFERENCES public.cliente (id_cliente) MATCH SIMPLE
);


CREATE TABLE factura_det (
  id_factura_det serial NOT NULL,
  id_factura bigint NOT NULL,
  id_producto bigint NOT NULL,
  cantidad int NOT NULL,
  monto_total bigint NOT NULL,  
  monto_total_impuesto bigint NOT NULL,
  estado character varying(1) NOT NULL,
  fecha_insercion DATE NOT NULL DEFAULT CURRENT_DATE,
  fecha_actualizacion DATE,
  CONSTRAINT factura_det_pkey PRIMARY KEY (id_factura_det),
    CONSTRAINT factura_det_id_producto_fkey FOREIGN KEY (id_producto)
        REFERENCES public.producto (id_producto) MATCH SIMPLE
);


CREATE TABLE producto (
  id_producto serial NOT NULL,
  nombre character varying(200) NOT NULL,
  descripcion character varying(400),
  precio_venta integer NOT NULL,
  precio_compra integer NOT NULL,  
  tasa_impuesto integer NOT NULL,  
  estado character varying(1) NOT NULL,
  fecha_insercion DATE NOT NULL DEFAULT CURRENT_DATE,
  fecha_actualizacion timestamp,
  PRIMARY KEY (id_producto)
);

