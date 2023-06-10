-- Creación de la tabla "Alumnos"
CREATE TABLE alumnos (
  ID SERIAL PRIMARY KEY,
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
  ID SERIAL PRIMARY KEY,
  mat_nombre VARCHAR(50) NOT NULL,
  mat_situacion CHAR(1) DEFAULT '1';
);

-- tabla de nacionalidades 
CREATE TABLE nacionalidades(
    ID SERIAL PRIMARY KEY,
    nac_pais VARCHAR (50) NOT NULL,
    nac_situacion CHAR(1) DEFAULT '1';
    )
-- tabla de grados 
CREATE TABLE grados(
    ID SERIAL PRIMARY KEY,
    gra_descripcion VARCHAR (50) NOT NULL,
    gra_situacion CHAR(1) DEFAULT '1';
)

-- tabla de armas
CREATE TABLE armas (
    ID SERIAL PRIMARY KEY,
    arm_descripcion VARCHAR (50) NOT NULL,
    arm_situacion CHAR(1) DEFAULT '1';
); 

-- Creación de la tabla "Calificaciones"
CREATE TABLE calificaciones (
  ID SERIAL PRIMARY KEY,
  calif_alumno  INT NOT NULL,
  calif_materia INT NOT NULL,
  calif_punteo FLOAT NOT NULL,
  calif_resultado VARCHAR(10) NOT NULL,
  calif_situacion CHAR(1) DEFAULT '1';
  FOREIGN KEY (calif_alumno) REFERENCES alumnos(ID),
  FOREIGN KEY (calif_materia) REFERENCES materias(ID)
 )