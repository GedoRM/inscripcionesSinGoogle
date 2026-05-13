INSERT INTO `cuatrimestres` (`idCuatrimestre`, `numeroCuatrimestre`, `created_at`, `updated_at`) VALUES
(1, 'Primer cuatrimestre', NULL, NULL),
(2, 'Segundo cuatrimestre', NULL, NULL),
(3, 'Tercer cuatrimestre', NULL, NULL),
(4, 'Cuarto cuatrimestre', NULL, NULL),
(5, 'Quinto cuatrimestre', NULL, NULL),
(6, 'Sexto cuatrimestre', NULL, NULL),
(7, 'Septimo cuatrimestre', NULL, NULL),
(8, 'Octavo cuatrimestre', NULL, NULL),
(9, 'Noveno cuatrimestre', NULL, NULL);

INSERT INTO `cursos` (`idCurso`, `idMateria`, `idAlumno`, `idDocente`, `created_at`, `updated_at`) VALUES
(11, 2, NULL, NULL, NULL, NULL),
(12, 1, NULL, 1, NULL, NULL);

INSERT INTO `dependencias` (`idDependencia`, `nombreDependencia`, `created_at`, `updated_at`) VALUES
(1, 'Selecciona una dependencia', NULL, NULL),
(2, 'COBACAM', NULL, NULL),
(3, 'Gobierno del estado', NULL, NULL),
(4, 'SAT', NULL, NULL),
(5, 'SNTSS', NULL, NULL),
(16, 'IMSS', NULL, NULL);

INSERT INTO `docentes` (`idDocente`, `nombreDocente`, `paternoDocente`, `maternoDocente`, `correoDocente`, `telDocente`, `idUsuario`, `created_at`, `updated_at`) VALUES
(1, 'Diana Melissa', 'Torres', 'Suárez', 'aneris.torres.suarez@gmail.com', '98111111111', NULL, NULL, NULL);

INSERT INTO `materias` (`idMateria`, `nombreMateria`, `claveMateria`, `idPrograma`, `idModalidad`, `idCuatrimestre`, `created_at`, `updated_at`) VALUES
(1, 'Matemáticas financieras', 'LICR103', 1, 1, 1, NULL, NULL),
(2, 'Macroeconomía', 'LICR102', 1, 1, 1, NULL, NULL),
(3, 'Teoria del estado', 'LDR104', 2, 2, 1, NULL, NULL),
(4, 'Derecho Romano', 'LDR102', 2, 2, 1, NULL, NULL);

INSERT INTO `modalidad` (`idModalidad`, `nombreModalidad`, `created_at`, `updated_at`) VALUES
(1, 'Escolarizada', NULL, NULL),
(2, 'Mixta', NULL, NULL);

INSERT INTO `municipios` (`idMunicipio`, `nombreMunicipio`, `created_at`, `updated_at`) VALUES
(1, 'Calakmul', NULL, NULL),
(2, 'Calkiní', NULL, NULL),
(3, 'Campeche', NULL, NULL),
(4, 'Candelaria', NULL, NULL),
(5, 'Carmen', NULL, NULL),
(6, 'Champotón', NULL, NULL),
(7, 'Dzibalché', NULL, NULL),
(8, 'Escárcega', NULL, NULL),
(9, 'Hecelchakán', NULL, NULL),
(10, 'Hopelchén', NULL, NULL),
(11, 'Palizada', NULL, NULL),
(12, 'Tenabo', NULL, NULL),
(13, 'Seybaplaya', NULL, NULL);

INSERT INTO `periodos` (`idPeriodo`, `nombrePeriodo`, `anoPeriodo`, `created_at`, `updated_at`) VALUES
(1, 'Enero - Abril', '2021', NULL, NULL),
(2, 'Mayo - Agosto', '2021', NULL, NULL),
(3, 'Septiembre - Diciembre', '2021', NULL, NULL);

INSERT INTO `porcentajes` (`idPorcentaje`, `porcentaje`, `created_at`, `updated_at`) VALUES
(1, 'Selecciona un porcentaje', NULL, NULL),
(2, '10%', NULL, NULL),
(3, '15%', NULL, NULL),
(4, '20%', NULL, NULL);

INSERT INTO `programa_educativos` (`idPrograma`, `nombrePrograma`, `created_at`, `updated_at`) VALUES
(1, 'Licenciatura en Contabilidad', NULL, NULL),
(2, 'Licenciatura en Derecho', NULL, NULL);

INSERT INTO `promedios` (`idPromedio`, `promedio`, `created_at`, `updated_at`) VALUES
(1, 'Selecciona un promedio', NULL, NULL),
(2, '8.5 - 9.0', NULL, NULL),
(3, '9.1 - 9.5', NULL, NULL),
(4, '9.6 - 10', NULL, NULL);

INSERT INTO `roles` (`id`, `name_rol`, `created_at`, `updated_at`) VALUES
(1, 'Pendiente', NULL, NULL),
(2, 'Administrador', NULL, NULL),
(3, 'Administrativo ', NULL, NULL),
(4, 'Alumno', NULL, NULL),
(5, 'Docente', NULL, NULL);

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pendiente', NULL, NULL),
(2, 'Activo', NULL, NULL),
(3, 'Finalizado', NULL, NULL);

INSERT INTO `tipo_becas` (`idTipoBeca`, `nombreTipoBeca`, `created_at`, `updated_at`) VALUES
(1, 'Selecciona un tipo de beca', NULL, NULL),
(2, 'Académica', NULL, NULL),
(3, 'Convenio', NULL, NULL),
(4, 'Foranéa', NULL, NULL),
(5, 'No aplica', NULL, NULL);