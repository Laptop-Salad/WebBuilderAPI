<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    use Response;

    public function index(Request $request) {
        return auth()->user()->projects;
    }

    public function create(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $project = Project::where('name', $request->name)->first();

        if ($project) {
            return $this->createMessage('Project with that name already exists.', 409);
        }

        try {
            if ($project) {
                return $this->createMessage('Project with that name already exists.', 409);
            }

            $project = new Project(['name' => $request->name]);
            $project->user()->associate(auth()->user());
            $project_path = auth()->user()->id . "/" . $request->name . ".json";

            $project_file_name = strtolower(str_replace(" ", "_", $request->name));

            if (!File::exists("projects/" . auth()->user()->id)) {
                File::makeDirectory("projects/" . auth()->user()->id, 0755, true);
            }

            Storage::disk('projects')->put($project_path, '{"h1":{"text":"Hello world"}}');
            $project->project_path = $project_file_name . ".json";
            $project->save();

            return $this->createMessage('Project created successfully.', 201);
        } catch (\Exception $e) {
            return $this->createMessage('An error occured', 500);
        }
    }
}
