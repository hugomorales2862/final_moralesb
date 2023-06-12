-- Creación de la tabla "Materias"
CREATE TABLE materias (
  mat_id SERIAL PRIMARY KEY,
  mat_nombre VARCHAR(50) NOT NULL,
  mat_situacion CHAR(1) DEFAULT '1'
);

-- tabla de nacionalidades 
CREATE TABLE nacionalidades(
    nac_id SERIAL PRIMARY KEY,
    nac_pais VARCHAR (50) NOT NULL,
    nac_situacion CHAR(1) DEFAULT '1'
    )
-- tabla de grados 
CREATE TABLE grados(
    gra_id SERIAL PRIMARY KEY,
    gra_descripcion VARCHAR (50) NOT NULL,
    gra_situacion CHAR(1) DEFAULT '1'
)

-- tabla de armas
CREATE TABLE armas (
    arm_id SERIAL PRIMARY KEY,
    arm_descripcion VARCHAR (50) NOT NULL,
    arm_situacion CHAR(1) DEFAULT '1'
); 
-- Creación de la tabla "Alumnos"
CREATE TABLE alumnos (
  alu_id  SERIAL PRIMARY KEY,
  alu_nombre VARCHAR(50) NOT NULL,
  alu_apellido VARCHAR (50) NOT NULL,
  alu_grado INT NOT NULL,
  alu_arma INT NOT NULL,
  alu_nac INT NOT NULL,
  alu_situacion CHAR(1) DEFAULT '1',
  FOREIGN KEY (alu_grado) REFERENCES grados(gra_id),
  FOREIGN KEY (alu_arma) REFERENCES armas(arm_id),
   FOREIGN KEY (alu_nac) REFERENCES nacionalidades(nac_id));


-- Creación de la tabla "Calificaciones"
CREATE TABLE asig_materia (
  asig_alumno INT,
  asig_materia INT,
  asig_situacion CHAR(1) DEFAULT '1',
  PRIMARY KEY (asig_alumno,asig_materia),
  FOREIGN KEY (asig_alumno) REFERENCES alumnos(alu_id),
  FOREIGN KEY (asig_materia) REFERENCES materias(mat_id)
);

CREATE TABLE calificaciones (
  calif_id SERIAL PRIMARY KEY,
  calif_alumno INT,
  calif_materia INT,
  calif_nota FLOAT NOT NULL,
  calif_resultado VARCHAR(50) NOT NULL,
  calif_situacion CHAR(1) DEFAULT '1',
  FOREIGN KEY (calif_alumno, calif_materia) REFERENCES asig_materia(asig_alumno, asig_materia)
);

notice undefined index: gra_descripcion in /var/www/html/final_moralesb/visatas/alumnos/index.php