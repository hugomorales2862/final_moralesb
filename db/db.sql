-- Creación de la tabla "Alumnos"
CREATE TABLE alumnos (
  alu_id  SERIAL PRIMARY KEY,
  alu_nombre VARCHAR(50) NOT NULL,
  alu_apellido VARCHAR (50) NOT NULL,
  alu_grado INT NOT NULL,
  alu_arma INT NOT NULL,
  alu_nac INT NOT NULL,
  alu_situacion CHAR(1) DEFAULT '1',
  FOREIGN KEY (alu_grado) REFERENCES grados(ID),
  FOREIGN KEY (alu_arma) REFERENCES armas(ID),
   FOREIGN KEY (alu_nac) REFERENCES nacionalidades(ID));

-- Creación de la tabla "Materias"
CREATE TABLE materias (
  mat_id SERIAL PRIMARY KEY,
  mat_nombre VARCHAR(50) NOT NULL,
  mat_situacion CHAR(1) DEFAULT '1';
);

-- tabla de nacionalidades 
CREATE TABLE nacionalidades(
    mat_id SERIAL PRIMARY KEY,
    nac_pais VARCHAR (50) NOT NULL,
    nac_situacion CHAR(1) DEFAULT '1';
    )
-- tabla de grados 
CREATE TABLE grados(
    mat_id SERIAL PRIMARY KEY,
    gra_descripcion VARCHAR (50) NOT NULL,
    gra_situacion CHAR(1) DEFAULT '1';
)

-- tabla de armas
CREATE TABLE armas (
    arma_id SERIAL PRIMARY KEY,
    arm_descripcion VARCHAR (50) NOT NULL,
    arm_situacion CHAR(1) DEFAULT '1';
); 

-- Creación de la tabla "Calificaciones"
CREATE TABLE asig_materia (
  asig_alumno INT,
  asig_materia INT,
  PRIMARY KEY (asig_alumno,asig_materia)
  FOREIGN KEY (alumno_id) REFERENCES alumnos(id),
  FOREIGN KEY (materia_id) REFERENCES materias(id)
);

CREATE TABLE calificaciones (
  calif_id SERIAL PRIMARY KEY,
  calif_descripcion INT,
  calificacion INT,
  FOREIGN KEY (calif_descripcion) REFERENCES asig_materia(asig_alumno, asig_materia)
);
