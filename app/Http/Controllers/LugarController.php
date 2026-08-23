<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    public function index(): View
    {
        $lugares = Lugar::all();

        return view('lugares.index', compact('lugares'));
    }

    public function show(string $id): string
    {
        $lugar = Lugar::find($id);
        if (! $lugar) {
            abort(404);
        }

        return "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>".$lugar['titulo']."</title>
        
        
        <style>
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; color: #333; margin: 0; padding: 0; }
            .navbar { background-color: #212529; padding: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
            .navbar-brand { color: #fff; font-weight: bold; text-decoration: none; font-size: 1.25rem; }
            .container { max-width: 1140px; margin: 0 auto; padding: 0 15px; }
            .my-4 { margin-top: 1.5rem; margin-bottom: 1.5rem; }
            .btn-back { display: inline-block; padding: 6px 12px; border: 1px solid #6c757d; color: #6c757d; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 0.875rem; transition: 0.2s; }
            .btn-back:hover { background-color: #6c757d; color: #fff; }
            .row { display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px; gap: 30px; }
            .col-lg-7 { flex: 0 0 58%; max-width: 58%; }
            .col-lg-5 { flex: 0 0 38%; max-width: 38%; }
            @media (max-width: 992px) { .col-lg-7, .col-lg-5 { flex: 0 0 100%; max-width: 100%; } }
            .card-info { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
            .badge { display: inline-block; padding: 6px 12px; font-size: 0.75rem; font-weight: 700; color: #fff; background-color: #0d6efd; border-radius: 4px; margin-bottom: 15px; text-transform: uppercase; }
            .fw-bold { font-weight: bold; }
            .text-dark { color: #212529; }
            .text-muted { color: #6c757d; }
            .text-success { color: #198754; }
            .table-info { width: 100%; margin: 20px 0; border-collapse: collapse; }
            .table-info th, .table-info td { padding: 12px 0; text-align: left; }
            .table-info th { color: #6c757d; width: 30%; }
            .desc-title { border-bottom: 2px solid #dee2e6; padding-bottom: 8px; margin-top: 25px; color: #495057; }
            .desc-text { font-size: 1.1rem; line-height: 1.7; color: #4a5568; }
            .card-form { background: #fff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow: hidden; }
            .card-header { background-color: #212529; color: white; padding: 15px 20px; font-size: 1.1rem; font-weight: bold; }
            .card-body { padding: 25px; }
            .mb-3 { margin-bottom: 1rem; }
            .form-label { display: block; margin-bottom: 8px; font-weight: 600; color: #495057; }
            .form-control { display: block; width: 100%; padding: 10px 12px; font-size: 1rem; color: #212529; background-color: #fff; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; }
            .form-control:focus { border-color: #86b7fe; outline: 0; box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25); }
            .btn-submit { display: block; width: 100%; padding: 12px; font-size: 1rem; font-weight: bold; color: #fff; background-color: #0d6efd; border: none; border-radius: 4px; cursor: pointer; transition: 0.2s; }
            .btn-submit:hover { background-color: #0b5ed7; }
            footer { background-color: #212529; color: #fff; text-align: center; padding: 15px 0; margin-top: auto; font-size: 0.9rem; }
        </style>
    </head>
    <body class='d-flex flex-column min-vh-100'>
        <nav class='navbar'>
            <div class='container'>
                <a class='navbar-brand' href='".route('lugares.index')."'>🇸🇻 El Salvador Explora</a>
            </div>
        </nav>
        
        <main class='container my-4' style='flex: 1;'>
            <div class='mb-3'>
                <a href='".route('lugares.index')."' class='btn-back'>&larr; Volver al catálogo</a>
            </div>
            
            <div class='row'>
                <div class='col-lg-7'>
                    <div class='card-info'>
                        <span class='badge'>".$lugar['categoria']."</span>
                        <h1 class='fw-bold text-dark' style='margin: 0 0 10px 0;'>".$lugar['titulo']."</h1>
                        
                        <table class='table-info'>
                            <tbody>
                                <tr><th>Ubicación:</th><td class='fw-bold text-dark'>".$lugar['departamento']."</td></tr>
                                <tr><th>Costo:</th><td><span class='text-success fw-bold'>".$lugar['precio']."</span></td></tr>
                            </tbody>
                        </table>
                        
                        <h5 class='fw-bold desc-title'>Descripción</h5>
                        <p class='desc-text'>".$lugar['descripcion']."</p>
                    </div>
                </div>
                
                <div class='col-lg-5'>
                    <div class='card-form'>
                        <div class='card-header'>Solicitar más información</div>
                        <div class='card-body'>
                            <form action='".route('lugares.contacto')."' method='POST'>
                                <input type='hidden' name='_token' value='".csrf_token()."'>
                                <div class='mb-3'>
                                    <label class='form-label'>Nombre completo</label>
                                    <input type='text' class='form-control' name='nombre' placeholder='Ej. Juan Pérez' required>
                                </div>
                                <div class='mb-3'>
                                    <label class='form-label'>Correo electrónico</label>
                                    <input type='email' class='form-control' name='email' placeholder='nombre@correo.com' required>
                                </div>
                                <div class='mb-3'>
                                    <label class='form-label'>Mensaje o Consulta</label>
                                    <textarea class='form-control' name='mensaje' rows='4' placeholder='¿Qué dudas tienes sobre este destino?' required></textarea>
                                </div>
                                <button type='submit' class='btn-submit'>Enviar Formulario</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <footer>
            <p style='margin:0;'>&copy; ".date('Y').' Lavarel de prueba</p>
        </footer>
    </body>
    </html>';
    }

    public function contactar(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
        ]);

        // Aquí procesas el formulario (ej. guardar en log o enviar correo)
        return back()->with('success', '¡Mensaje enviado con éxito!');
    }
}
