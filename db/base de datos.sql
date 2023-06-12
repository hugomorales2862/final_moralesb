
CREATE TABLE alumnos(
  id_alumnos SERIAL PRIMARY KEY,
  alu_nombre VARCHAR(100) NOT NULL,
  alu_apellido VARCHAR (100) NOT NULL,
  alu_grado VARCHAR(50) NOT NULL,
  alu_arma VARCHAR(50) NOT NULL,
  alu_nac VARCHAR(50) NOT NULL,
  detalle_situacion CHAR(1) DEFAULT '1'
   );




CREATE TABLE materias(
  id_materias SERIAL PRIMARY KEY,
  ma_nombre VARCHAR(50) NOT NULL,
  detalle_situacion CHAR(1) DEFAULT '1'
);


CREATE TABLE calificaciones(
  id_calificaciones SERIAL PRIMARY KEY,
  calif_alumno  INT NOT NULL,
  calif_materia INT NOT NULL,
  calif_punteo FLOAT NOT NULL,
  calif_resultado VARCHAR(10) NOT NULL,
  detalle_situacion CHAR(1) DEFAULT '1',
  FOREIGN KEY (calif_alumno) REFERENCES alumnos(id_alumnos),
  FOREIGN KEY (calif_materia) REFERENCES materias(id_materias)
 );




CREATE TABLE relacion_mat_alum(
  id_mat_alum SERIAL PRIMARY KEY,
  ma_alumno INT NOT NULL,
  ma_materia INT NOT NULL,
  FOREIGN KEY (ma_alumno) REFERENCES alumnos(id_alumnos),
  FOREIGN KEY (ma_materia) REFERENCES materias(id_materias)
);


