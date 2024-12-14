<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitaConfirmacionController;

// Rutas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas de usuario sin autenticación
Route::get('/user', [AuthController::class, 'user']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/negocios', [NegocioController::class, 'index']);
Route::get('/negocio/{id_negocio}', [NegocioController::class, 'show']);
Route::post('/agendar-cita', [CitaController::class, 'agendarCita']);
Route::get('/citas/user/{userid}', [CitaController::class, 'obtenerCitasUsuario']);
Route::get('/citas/{id_cita}', [CitaController::class, 'show']);
Route::put('/citas/{id_cita}/descripcion', [CitaController::class, 'actualizarDescripcion']);
Route::put('/citas/{id_cita}/cancelar', [CitaController::class, 'cancelarCita']);
Route::put('/usuario/actualizar/{id}/nombre', [UserController::class, 'actualizarNombre']);
Route::put('/usuario/actualizar/{id}/numero', [UserController::class, 'actualizarNumero']);

// Rutas de administrador sin autenticación
Route::get('/negocios/admin/{userid}', [NegocioController::class, 'getNegociosPorUsuario']);
Route::post('/negocios/admin/crear', [NegocioController::class, 'store']);
Route::delete('/negocios/admin/{id}', [NegocioController::class, 'borrarNegocio']);
Route::put('/negocios/admin/{id}', [NegocioController::class, 'update']);
Route::put('/servicios/admin/{id}', [ServicioController::class, 'update']);
Route::put('/horarios/admin/{id}', [HorarioController::class, 'update']);
Route::post('/servicios/admin/{negocioId}/crear', [ServicioController::class, 'store']);
Route::delete('/servicios/admin/{servicioId}/borrar', [ServicioController::class, 'destroy']);
Route::get('/negocios/admin/{id}/horarios/verificar/{dia}', [NegocioController::class, 'verificarDiaExistente']);
Route::post('/negocios/admin/{id}/horarios/crear', [NegocioController::class, 'crearHorario']);
Route::delete('/negocios/admin/{id}/horarios/borrar', [HorarioController::class, 'destroy']);
Route::get('/negocios/admin/citas/{userid}', [NegocioController::class, 'getCitasPorEstado']);
Route::get('/negocios/admin/{idNegocio}/citas', [NegocioController::class, 'getCitasPorNegocio']);
Route::put('/negocios/admin/citas/{idCita}', [CitaController::class, 'updateCita']);
Route::put('/negocios/admin/citas/{idCita}/cancelar', [CitaController::class, 'cancelCita']);
Route::put('/negocios/admin/citas/{idCita}/expirar', [CitaController::class, 'expireCita']);
Route::post('/negocios/admin/citas/{id}/confirmar', [CitaConfirmacionController::class, 'confirmar']);

// Rutas de administrador global sin autenticación
Route::get('/usuarios', [UserController::class, 'index']);
Route::put('/usuarios/{id}/rol', [UserController::class, 'actualizarRol']);
Route::delete('/usuarios/{id}', [UserController::class, 'eliminar']);



