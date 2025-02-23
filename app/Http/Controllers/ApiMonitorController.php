<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiMonitor;
use Illuminate\Support\Facades\Http;

class ApiMonitorController extends Controller
{
    // Listar APIs monitoradas
    public function index()
    {
        return response()->json(ApiMonitor::all());
    }

    // Adicionar uma nova API para monitoramento
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|url|unique:api_monitors,url',
        ]);

        $api = ApiMonitor::create($request->all());
        return response()->json($api, 201);
    }

    // Deletar uma API do monitoramento
    public function destroy($id)
    {
        $api = ApiMonitor::findOrFail($id);
        $api->delete();
        return response()->json(['message' => 'API removida']);
    }

    // Função para verificar o status da API
    public function checkApis()
    {
        $apis = ApiMonitor::all();
        foreach ($apis as $api) {
            try {
                $start = microtime(true);
                Http::timeout(5)->get($api->url);
                $responseTime = round((microtime(true) - $start) * 1000);
                $api->update(['is_active' => true, 'response_time' => $responseTime, 'last_checked' => now()]);
            } catch (\Exception $e) {
                $api->update(['is_active' => false, 'response_time' => null, 'last_checked' => now()]);
            }
        }
        return response()->json(['message' => 'Monitoramento atualizado']);
    }
}
