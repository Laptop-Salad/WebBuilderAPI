<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    use Response;

    public function index() {
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
            $project->user_id = auth()->user()->id;

            $project_file_name = strtolower(str_replace(" ", "_", $request->name));
            $path = $project_file_name . ".json";

            File::put($path, '{}');

            $project->addMedia($path)
                ->usingFileName($project_file_name . ".json")
                ->toMediaCollection('projects');

            $project->save();

            File::delete($path);

            return $this->createMessage('Project created successfully.', 201);
        } catch (\Exception $e) {
            return $this->createMessage('An error occurred: ' . $e->getMessage(), 500);
        }
    }

    public function updateProjectContent($id, Request $request)
    {
        $project = auth()
            ->user()
            ->projects()
            ->where('id', $id)
            ->with('file')
            ->first();

        if (!$project) {
            return response()->json(['error' => 'Project not found.'], 404);
        }

        $content = $request->input('project_contents');

        $temp = tempnam(sys_get_temp_dir(), 'temp');
        file_put_contents($temp, $content);

        dump($content);

        $project->file->delete();

        $project_file_name = strtolower(str_replace(" ", "_", $project->name));

        $project->addMedia($temp)
            ->usingFileName($project_file_name . ".json")
            ->toMediaCollection('projects');

        return response()->json(['message' => 'File updated successfully.'], 200);
    }


    public function getProject($id) {
        $project = auth()->user()->projects()->where('id', $id)->first();

        $stream = $project->file->stream();
        $content = stream_get_contents($stream);

        if ($project) {
            return response()->json([
                'payload' => [
                    'project' => $project,
                    'data' => $content,
                ],
            ]);
        }

        return response()->json('Project not found.', 404);
    }
}
