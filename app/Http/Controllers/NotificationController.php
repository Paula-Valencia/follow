<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class NotificationController extends Controller
{

    public function index()
    {
        $notifications = Notification::included()->filter()->sort()->getOrPaginate();
        return response()->json($notifications);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_envio' => 'required|date',
            'contenido' => 'required|string|max:255',
        ]);

        $notification = Notification::create($request->all());
        return response()->json($notification, 201);
    }

    //administrador

    public function Notificaciones()
    {
        return view('administrator.notificaciones');
    }

    //aprendiz
    public function notification()
    {
        $token = session()->get('token');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'notification_by_person');

        // Verifica si la respuesta es exitosa
        if ($response->successful()) {
            $notificaciones = $response->json();
        } else {
            $notificaciones = []; // En caso de error, devuelves un array vacío
        }

        return view('apprentice.notification', compact('notificaciones'));
    }



    //superadministrador
    public function SuperAdminNotificaciones(): Factory|RedirectResponse|View
    {

        // Obtener el token de la sesión
        $token = session()->get('token');

        if (!$token) {
            return redirect()->back()->with('error', 'No se encontró el token de autenticación.');
        }

        // URL para obtener las notificaciones recibidas
        $urlReceivedNotifications = env('URL_API') . 'get_received_notifications_by_user';

        // Solicitud para obtener las notificaciones recibidas
        $receivedResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get($urlReceivedNotifications);

        // Verificar si la solicitud fue exitosa
        if (!$receivedResponse->successful()) {
            return redirect()->back()->with('error', 'Error al obtener las notificaciones recibidas.');
        }

        // URL para obtener las notificaciones enviadas
        $urlNotificationsSend = env('URL_API') . 'get_notifications_send_by_user';

        // Solicitud para obtener las notificaciones enviadas
        $sendResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get($urlNotificationsSend);

        // Verificar si la solicitud fue exitosa
        if (!$sendResponse->successful()) {
            return redirect()->back()->with('error', 'Error al obtener las notificaciones enviadas.');
        }

        // Pasar las respuestas a la vista
        $receivedNotifications = $receivedResponse->json();
        $sentNotifications = $sendResponse->json();

        return view('superadmin.SuperAdmin-Notificaciones', [
            'receivedNotifications' => $receivedNotifications,
            'sentNotifications' => $sentNotifications,
        ]);
    }

    public function notificationtrainer(): RedirectResponse|View
    {
        // Obtener el token de la sesión
        $token = session()->get('token');

        if (!$token) {
            return redirect()->back()->with('error', 'No se encontró el token de autenticación.');
        }

        // URL para obtener las notificaciones recibidas
        $urlReceivedNotifications = env('URL_API') . 'get_received_notifications_by_user';

        // Solicitud para obtener las notificaciones recibidas
        $receivedResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get($urlReceivedNotifications);

        // Verificar si la solicitud fue exitosa
        if (!$receivedResponse->successful()) {
            return redirect()->back()->with('error', 'Error al obtener las notificaciones recibidas.');
        }

        // URL para obtener las notificaciones enviadas
        $urlNotificationsSend = env('URL_API') . 'get_notifications_send_by_user';

        // Solicitud para obtener las notificaciones enviadas
        $sendResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get($urlNotificationsSend);

        // Verificar si la solicitud fue exitosa
        if (!$sendResponse->successful()) {
            return redirect()->back()->with('error', 'Error al obtener las notificaciones enviadas.');
        }

        // Pasar las respuestas a la vista
        $receivedNotifications = $receivedResponse->json();  // Notificaciones recibidas
        $sentNotifications = $sendResponse->json();         // Notificaciones enviadas

        // Retornar la vista con los datos de las notificaciones
        return view('trainer.notification', [
            'receivedNotifications' => $receivedNotifications,
            'sentNotifications' => $sentNotifications,
        ]);
    }

    public function create() {}

    public function show($id)
    {
        $notification = Notification::included()->findOrFail($id);
        return response()->json($notification);
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'fecha_envio' => 'required|date',
            'contenido' => 'required|string|max:255',
        ]);

        $notification->update($request->all());
        return response()->json($notification);
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return response()->json(null, 204);
    }
}
