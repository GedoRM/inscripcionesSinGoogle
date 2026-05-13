<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('auth/login');
});
 
Route::get('/', function () {
    
    return view('auth/login');
});

Route::get('/registro', function () {
    $periodo = DB::table('periodos')->get();
    $programa = DB::table('programa_educativos')->get();
    $modalidad = DB::table('modalidad')->get();
    $municipio = DB::table('municipios')->orderBy('nombreMunicipio', 'ASC')->get();
    
    return view('registro', compact('programa', 'periodo', 'modalidad', 'municipio'));
});


Auth::routes();

Route::get('/Not-found', 'HomeController@no_permitido')->name('noPermitido');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/homeStudent', 'HomeController@students')->name('homeStudent');

Route::post('password/recuperar', 'AdminController@recuperarContrasena')->name('recuperarContrasena');

Route::put('notificaciones/leer-mensaje/{id}', 'AdminController@leerMensaje')->name('leerMensaje');

///////////////////////////////////////////////////////Alumnos/////////////////////////////////////////////////////////////////////////


Route::get('/alumnos/lista-alumnos/', 'StudentController@list_students')->name('list_students')->middleware(['auth', 'checkStatus']);

Route::get('/alumnos/lista-alumnos/acciones/ver/{idAlumno}', 'StudentController@viewInfo')->name('viewInfo')->middleware(['auth', 'checkStatus']);

Route::put('/alumnos/list-alumnos/acciones/actualizar/{idAlumno}', 'StudentController@updateInfo')->name('updateInfo')->middleware(['auth', 'checkStatus']);

Route::get('/alumnos/lista-alumnos/acciones/ver-documentos/{idAumno}', [App\Http\Controllers\StudentController::class, 'documents'])->name('documents')->middleware(['auth', 'checkStatus']);

Route::get('/alumnos/lista-alumnos/acciones/recepcion-de-documentos/{idAlumno}', [App\Http\Controllers\StudentController::class, 'receptionDocuments'])->name('reception')->middleware(['auth', 'checkStatus']);

Route::get('/postDownload', [App\Http\Controllers\StudentController::class, 'download'])->name('download')->middleware(['auth', 'checkStatus']);

Route::post('/alumnos/nuevo-alumno', 'FormularioController@newStudent')->name('newStudent');


////////////////////////////////////Aspirantes//////////////////////////////////////////////////////////////////////////////

Route::delete('/aspirantes/delete/{id}', 'StudentController@deleteAspirante')->name('deleteAspirante');


///////////////////////////////////////////////////////Maestros/////////////////////////////////////////////////////////////////////////

Route::get('docentes/lista-docentes', 'TeacherController@list_teacher')->name('list_teacher')->middleware(['auth', 'checkStatus']);

Route::post('docentes/lista-docentes/añadir-nuevo', 'TeacherController@addTeacher')->name('addDocente')->middleware(['auth', 'checkStatus']);

Route::put('docentes/lista-docentes/asignar-usuario/{id}', 'TeacherController@assignUser')->name('docente.assignUser')->middleware(['auth', 'checkStatus']);
///////////////////////////////////////////////////////Materias/////////////////////////////////////////////////////////////////////////

Route::get('materias/lista-materias', 'MateriesController@list_materies')->name('list_materies')->middleware(['auth', 'checkStatus']);

Route::post('/materias/list-materias/añadir-materia', 'MateriesController@addMateries')->name('addMateries')->middleware(['auth', 'checkStatus']);

Route::put('/materias/list-materias/actualizar/{id}', 'MateriesController@UpdateMaterie')->name('update.materie')->middleware(['auth', 'checkStatus']);

////////////////////////////////////////////////////Cursos/////////////////////////////////////////////////////////////////////////////

//Route::get('cursos/lista-cursos', 'CourseController@list_course')->name('list_course');

Route::post('cursos/detalle/', 'CourseController@detailMaterie')->name('detailMaterie');

Route::post('curso/nuevo-curso/anadir/', 'CourseController@addCourse')->name('addCourse');

Route::get('curso/{id}/inscribir-alumno', 'CourseController@enrollStudets')->name('enrollStudents');

Route::post('curso/{idCurso}/inscribir-alumno/', 'CourseController@enrolleToCourse')->name('enrolleToCourse');

Route::delete('curso/eliminar/{idCurso}', 'CourseController@eliminarCurso')->name('eliminarCurso');

Route::get('cursos/contabilidad', 'CourseController@verCursosContabilidad')->name('cursosContabilidad');

Route::get('cursos/derecho', 'CourseController@verCursosDerecho')->name('cursosDerecho');

Route::get('cursos/contabilidad/escolarizada', 'CourseController@cursosContabilidadE')->name('cursosContabilidadE');

Route::get('cursos/contabilidad/mixta', 'CourseController@cursosContabilidadM')->name('cursosContabilidadM');

Route::get('cursos/derecho/escolarizada', 'CourseController@cursosDerechoE')->name('cursosDerechoE');

Route::get('cursos/derecho/mixta', 'CourseController@cursosDerechoM')->name('cursosDerechoM');
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

/////////////////////////////////////Perfil - Alumnos ///////////////////////////////////////////////////////////////////////////

Route::get('inicio/mi-perfil/{id}', 'ViewStudentController@miPerfil')->name('miPerfil');

Route::get('inicio/mi-perfil/ver-documentos/{id}', 'ViewStudentController@viewDocuments')->name('viewDocuments');

Route::put('inicio/mi-perfil/cargar-documento/{id}', 'ViewStudentController@uploadDocuments')->name('uploadDocuments'); 

Route::get('descargar/{documento}/{id}', 'ViewStudentController@download')->name('descargarDocumento');


Route::put('inicio/mi-perfil/{idAlumno}/carta-compromiso', 'ViewStudentController@updatecCompromiso')->name('updatecCompromiso');

Route::put('/inicio/mi-perfil/{idAlumno}/t-y-c', 'ViewStudentController@updateTyC')->name('updateTyC');

Route::post('{id}/boleta-calificaciones/', 'ViewStudentController@boletaCourse')->name('boleta');

Route::get('{id}/historial-de-pagos', 'ViewStudentController@historialPagos')->name('historialPago');

Route::get('{id}/avance-reticular', 'ViewStudentController@avanceReticular')->name('avanceReticular');

Route::get('{id}/calificaciones-parciales', 'ViewStudentController@calificacionesParciales')->name('calificacionesParciales');

Route::get('{id}/buscar-boleta', 'ViewStudentController@buscarBoleta')->name('buscarBoleta');

Route::get('{id}/evaluacion-docente', 'StudentController@verEvaluacionDocente')->name('verEvaluacionDocente');
////////////////////////////////////Perfil - Docente //////////////////////////////////////////////////////////////////////

Route::get('detalle-curso/{id}', 'ViewTeacherController@detail')->name('detail');

Route::get('cursos-asignados/{id}', 'ViewTeacherController@cursosAsignados')->name('cursosAsignados');

Route::get('cursos-asignados/idD={idDocente}/ver-inscritos/{idCurso}', 'ViewTeacherController@inscritosCurso')->name('inscritosCurso');

Route::put('calificar-curso/{idUserCourse}', 'ViewTeacherController@calificar')->name('actualizarCalificacion');

Route::get('cursos-asignados/acta-curso/idD={idDocente}/idC={idCurso}', 'ViewTeacherController@actaCurso')->name('actaCurso');

Route::get('cursos-asignados/acta-curso/{idCurso}/primer-parcial', 'ViewTeacherController@actaPrimerParcial')->name('verActaPP');

Route::get('cursos-asignados/acta-curso/{idCurso}/segundo-parcial', 'ViewTeacherController@actaSegundoParcial')->name('verActaSP');

//PERFIL ADMINISTRADOR//

Route::get('usuarios/lista-usuarios/sin-asignar', 'AdminController@sinAsignar')->name('sinAsignar')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('usuarios/lista-usuarios/alumnos', 'AdminController@alumnos')->name('alumnos')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('usuarios/lista-usuarios/docentes', 'AdminController@docentes')->name('docentes')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('cursos-inscrito/{id}', 'AdminController@verCursosActivos')->name('verCursosActivos')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::post('cursos-inscrito/{id}', 'AdminController@buscarCursoPorCuatri')->name('buscarCursoPorCuatri')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('lista-alumnos', 'AdminController@verAlumnos')->name('verAlumnos')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::put('lista-aspirantes/{idAlumno}', 'AdminController@actualizarInfo')->name('actualizarInfo')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('lista-alumnos/{idAlumno}/ver-documentos/', 'AdminController@verDocumentos')->name('documentos')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('lista-alumnos/{idAlumno}/recepcion-de-documentos/', 'AdminController@recepcionDocumentos')->name('recepcionDocumentos')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::post('permiso-calificar', 'AdminController@permisoCalificar')->name('permisoCalificar')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('usuarios/lista-usuarios/docentes/{id}/cambiar-contraseña', 'AdminController@cambiarContrasena')->name('cambiarContrasena')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::post('usuarios/lista-usuarios/docentes/{id}/cambiar-contrasena/update', 'AdminController@updatePass')->name('updatePass')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::post('forzar/{id}', 'AdminController@forzar')->name('forzar')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('generar', 'AdminController@generar')->name('generar')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('estadisticas', 'AdminController@estadisticas')->name('estadisticas');

/////////////////////////////////////////////////////// Seccion / Usuarios/////////////////////////////////////////////////////////////////////////

Route::get('/usuarios/lista-usuarios', 'AdminController@listaUsuarios')->name('listaUsuarios')->middleware(['auth', 'checkStatus']);

Route::put('/usuarios/lista-usuarios/actualizar-status/{id}', 'AdminController@update_status')->name('usuarios.update_status')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::put('/usuarios/lista-usuario/actualizar-rol/{id}', 'AdminController@updateRyS')->name('usuarios.updateRyS')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::delete('/usuarios/eliminar/{id}', 'AdminController@deleteUser')->name('deleteUser')->middleware(['rolAdmin', 'auth', 'checkStatus']);

//////////////////////////////////////////////////// Seccion / Aspirantes //////////////////////////////////////////////////////////////

Route::get('/aspirantes/lista-aspirantes/', 'AdminController@listaAspirantes')->name('listaAspirantes')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('/aspirantes/perfil/{idAlumno}', 'AdminController@perfilAspirante')->name('perfilAspirante')->middleware(['rolAdmin', 'auth', 'checkStatus']);


 /////////////////////////////////////////////////// Seccion / Alumnos //////////////////////////////////////////////////////////////////
Route::get('/alumnos/lista-alumnos/acciones/ver/{idAlumno}', 'AdminController@verPerfil')->name('verPerfil')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::get('cursos-inscrito/idA={idAlumno}/idC={idCurso}', 'AdminController@calificacionesCursoInscrito')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::put('alumnos/lista-alumnos/{id}', 'AdminController@actualizarStatus')->name('actualizarStatus')->middleware(['rolAdmin', 'auth', 'checkStatus']);

/////////////////////////////////////////////////////////////////PDF'S/////////////////////////////////////////////////

Route::post('recepcion-documentos-PDF/{id}', 'PDFController@recepcionDocumentosPDF')->name('recepcionDocumentosPDF')->middleware(['rolAdmin', 'auth', 'checkStatus']);

Route::post('{id}/boleta-PDF', 'PDFController@boletaPDF')->name('boletaPDF');

/////////////////////////////////////Perfil - Administrativo/////////////////////////////////////////////////////////////

Route::get('alumnos/lista-alumnos', 'AdministrativeController@viewStudents')->name('academy.viewstudents');

Route::get('alumnos/ver/informacion/{id}','AdministrativeController@viewInfo')->name('academy.infoStudent');

Route::get('alumnos/ver/documentos/{id}', 'AdministrativeController@viewDocuments')->name('academy.viewDocuments');

Route::get('cursos/buscar', 'AdministrativeController@buscar')->name('academy.buscar');

Route::get('pagos/{nombre}/', 'AdministrativeController@pagos')->name('pagos');

Route::post('pagos/{id}/', 'AdministrativeController@addPago')->name('addPago');

Route::post('pagos/actualizar/{idPago}', 'AdministrativeController@actualizarPago')->name('actualizarPago');

//////////////////////////EVALUACION DOCENTE////////////////////////////////////////////////////////////////////////

Route::post('habilitar-evDocente', 'EvDocenteController@habilitar')->name('habilitarEvDocente');

Route::get('evaluacion-docente/{id}', 'EvDocenteController@index')->name('iniciarEvaluacion')->middleware(['auth', 'checkStatus']);

Route::get('evaluacion-docente/{id}/pregunta=1', 'EvDocenteController@pregunta1')->name('pregunta1')->middleware(['auth', 'checkStatus']);

Route::get('evaluacion-docente/{id}/pregunta=2', 'EvDocenteController@pregunta2')->name('pregunta2')->middleware(['auth', 'checkStatus']);

Route::get('evaluacion-docente/{id}/pregunta=3', 'EvDocenteController@pregunta3')->name('pregunta3')->middleware(['auth', 'checkStatus']);

Route::get('evaluacion-docente/{id}/pregunta=4', 'EvDocenteController@pregunta4')->name('pregunta4')->middleware(['auth', 'checkStatus']);

Route::get('evaluacion-docente/{id}/pregunta=5', 'EvDocenteController@pregunta5')->name('pregunta5');

Route::get('evaluacion-docente/{id}/pregunta=6', 'EvDocenteController@pregunta6')->name('pregunta6');

Route::get('evaluacion-docente/{id}/pregunta=7', 'EvDocenteController@pregunta7')->name('pregunta7');

Route::get('evaluacion-docente/{id}/pregunta=8', 'EvDocenteController@pregunta8')->name('pregunta8');

Route::get('evaluacion-docente/{id}/pregunta=9', 'EvDocenteController@pregunta9')->name('pregunta9');

Route::get('evaluacion-docente/{id}/finalizar', 'EvDocenteController@finalizar')->name('finalEvD');

Route::get('evaluacion-docente/banco-preguntas', 'AdminController@bancoPreguntas')->name('bancoPreguntas');

Route::get('evaluacion-docente/vista-previa', 'AdminController@vistaPrevia')->name('vistaPrevia');

Route::post('evaluacion-docente/responder-pregunta/{id}', 'EvDocenteController@respPregunta')->name('res_pregunta');