<?php

namespace App\Http\Controllers;


use App\Models\Idea;
use App\statusIdea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function indexAdmin(Request $request)
    {
        $status = $request->status;

        // Admin vê TUDO, então usamos o Model Idea diretamente
        $ideas = Idea::with('user') // Eager loading para ver quem é o autor
            ->when(in_array($status, statusIdea::value()), fn($query) => $query->where('status', $status))
            ->get();

        $statusContador = Idea::statusCount(null, Auth::user());

            return view ('admin.index', [
                'ideas'=>$ideas,
                'statusContador' => $statusContador
            ]);
    }
}
