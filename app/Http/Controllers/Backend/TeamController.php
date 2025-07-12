<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
class TeamController extends Controller
{
    public function index($id = null)
    {
        $teams = Team::all();
        $editMember = $id ? Team::find($id) : null;
        return view('Backend.Team', compact('teams', 'editMember'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team-images', 'public');
        }

        Team::create($data);

        return redirect()->route('admin.teams.index')->with('success', 'Team member created.');
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $data = $this->validateData($request);

        if ($request->hasFile('image')) {
            if ($team->image && Storage::exists('public/' . $team->image)) {
                Storage::delete('public/' . $team->image);
            }
            $data['image'] = $request->file('image')->store('team-images', 'public');
        }

        $team->update($data);

        return redirect()->route('admin.teams.index')->with('success', 'Team member updated.');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if ($team->image && Storage::exists('public/' . $team->image)) {
            Storage::delete('public/' . $team->image);
        }
        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Team member deleted.');
    }

    private function validateData($request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'number' => 'required|string|max:20',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    }
}
