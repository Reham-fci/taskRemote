<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use App\Models\File;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class FileManagerController extends Controller
{

    public function uploadFile(Request $request)
    {
        // Validate the request
        $request->validate([
            'folder_id' => 'required|exists:folders,id', // Check if the folder exists
            'file' => 'required|file|max:512000', // Validate file size
        ]);

        if($request->file('file')->getSize() > 500 * 1024 * 1024){ // 500 MB in bytes
            return back()->with('error', 'File size is too large');
        }

        $folder = Folder::find($request->folder_id);
        $userId = auth()->id();
        $path = "files/{$userId}/{$folder->name}";
        $fullPath = public_path($path);
        $size = $request->file('file')->getSize();

        // Check if the folder exists
        if (!file_exists($fullPath)) {
            return back()->with('error', 'Folder not found');
        }

        // Save the file in the folder
        $request->file->move($path, $request->file->getClientOriginalName());

        // Save the file information in the database
        $folder->files()->create([
            'name' => $request->file->getClientOriginalName(),
            'size' => $size,
            'path' => $path . '/' . $request->file->getClientOriginalName(),
            'user_id' => $userId,
        ]);

        return back()->with('success', 'File uploaded successfully');
    }

    // show all files in specific folder
    public function showFile($folderId)
    {
        $files = Folder::find($folderId)->files;
        return view('panel.file-manager.show', compact('files'));
    }

    public function deleteFile(File $file)
    {
        $file->delete();
        unlink($file->path);
        return back()->with('success', 'File deleted successfully');
    }

}
