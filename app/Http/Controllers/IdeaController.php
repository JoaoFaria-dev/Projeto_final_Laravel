<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use App\statusIdea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $user = Auth::user();

        $status = $request->status;

        if (! in_array($status, statusIdea::value())) {
            $status = null;
        }

        $ideas = $user
            ->ideas()
            ->when(in_array($status, statusIdea::value()), fn ($query) => $query
                ->where('status', $status))
            ->get();

        // select status, count(*) from ideas group by status

        return view('components.ideas.index', [
            'ideas' => $ideas,
            'statusContador' => Idea::statusCount($user),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('components.ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdeaRequest $request)
    {
        Auth::user()->ideas()->create([
            'title' => request('title'),
            'description' => request('description'),
            'status' => request('status'),
           /*  'link' => request('link')

 */
        ]);
        return redirect('/ideas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('components.ideas.show', [
            'idea' => $idea
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view ('components.ideas.edit',[
            'idea' => $idea
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        Gate::authorize('modify', $idea);
        $idea->description = $request->description;
        $idea->status = $request->status;
        $idea->update();
        return redirect("/ideas/{$idea->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect('/ideas');
    }
}
