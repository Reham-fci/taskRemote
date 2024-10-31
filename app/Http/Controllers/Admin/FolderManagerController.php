<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class FolderManagerController extends Controller
{
    public function __invoke()
    {
        $folders = Folder::withCount('files')->get();
        return view('dashboard.file-manager.file-manager' , compact('folders'));
    }

    // show all files in specific folder
    public function showFile(Folder $folder)
    {
        $files = $folder->files;
        return view('dashboard.file-manager.show', compact('files'));
    }

}
