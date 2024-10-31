<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class FolderManagerController extends Controller
{
    public function __invoke()
    {
        // Get the authenticated user's ID
        $userId = auth()->id();
        $folders = Folder::where('user_id', $userId)->withCount('files')->paginate(10);
        return view('panel.file-manager.index', compact('folders'));
    }

    public function createFolder(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|string'
        ]);

        // Get the authenticated user's ID
        $userId = auth()->id();

        // Define the path for the user's folder
        $path = public_path("files/{$userId}/" . $request->folder_name);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            // Save folder information in the database
            Folder::create([
                'user_id' => $userId,
                'name' => $request->folder_name,
            ]);
            return back()->with('success' , 'Folder created successfully');
        }

        return back()->with('error' , 'Folder already exists');
    }

    public function updateFolder(Request $request, Folder $folder)
    {
        $request->validate([
            'folder_name' => 'required|string'
        ]);

        $userId = auth()->id();
        $oldPath = public_path("files/{$userId}/{$folder->name}");
        $newPath = public_path("files/{$userId}/{$request->folder_name}");

        // Check if the new folder name already exists
        if (File::exists($newPath)) {
            return back()->with('error', 'A folder with this name already exists');
        }

        // Rename the folder on the filesystem
        if (File::exists($oldPath)) {
            File::move($oldPath, $newPath);
        }

        $folder->update([
            'name' => $request->folder_name
        ]);
        return back()->with('success', 'Folder updated successfully');

    }

    public function deleteFolder(Folder $folder)
    {
        $folder->delete();
        $path = public_path("files/{$folder->user_id}/{$folder->name}");
        rmdir($path);
        return back()->with('success', 'Folder deleted successfully');

    }

}
