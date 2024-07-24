<?php
//modifiche dopo spostamento in cartella Admin
namespace App\Http\Controllers\Admin;
//importazione controller principale
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
//importo dal seeder per store
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all metodo per leggere tutti i campi della tabella
        $projects = Project::all();
        //passo alla rotta con view() la mia pagina blade
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request, Project $project)
    {
        //salviamo i dati dentro una variabile
        $data = $request->validated();
        $data['slug'] = Str::of($data['title'])->slug();

        $project = new Project();
        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->slug = $data['slug'];
        $project->save();
        //uso with per stampare un mess in pagina
        return view('admin.projects.show', compact('project'))->with('status', 'Progetto creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::of($data['title'])->slug();

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->slug = $data['slug'];
        $project->save();

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
