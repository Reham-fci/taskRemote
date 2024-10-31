@extends('panel.layouts.vertical', ['title' => 'File Manager', 'sub_title' => 'Apps', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')

    <button class="btn inline-flex justify-center items-center bg-primary text-white" data-fc-type="modal" type="button">
        <i data-feather="folder" class="me-2 w-4"></i>  Create New Folder
    </button>
    <div class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden">
        <div class="fc-modal-open:mt-7 fc-modal-open:opacity-100 fc-modal-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto  bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                    Create New Folder
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                        data-fc-dismiss type="button">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <!-- Folder Creation Form -->
            <form id="folderForm" action="{{ route('panel.file-manager.folder') }}" method="POST">
                @csrf
                <div class="px-4 py-8 overflow-y-auto">
                        <input type="text" name="folder_name" class="form-input" placeholder="Folder Name" required>
                        <input type="hidden" name="parent_id" value="">
                </div>

                <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                    <button class="py-2 px-5 inline-flex justify-center items-center gap-2 rounded dark:text-gray-200 border dark:border-slate-700 font-medium hover:bg-slate-100 hover:dark:bg-slate-700 transition-all"
                            data-fc-dismiss type="button">Close
                    </button>
                    <button class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded bg-primary hover:bg-primary-600 text-white" type="submit">Save
                </div>
            </form>
        </div>
    </div>

    <div class="flex">

        <div class="w-full">
            <div class="grid 2xl:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6">
                <div class="2xl:col-span-4 sm:col-span-2">
                    <div class="flex items-center justify-between gap-4">
                        <div class="lg:hidden block">
                            <button data-fc-target="default-offcanvas" data-fc-type="offcanvas" class="inline-flex items-center justify-center text-gray-700 border border-gray-300 rounded shadow hover:bg-slate-100 dark:text-gray-400 hover:dark:bg-gray-800 dark:border-gray-700 transition h-9 w-9 duration-100">
                                <div class="mgc_menu_line text-lg"></div>
                            </button>
                        </div>
                        <h4 class="text-xl">Folders</h4>

                        <form class="ms-auto">
                            <div class="flex items-center">
                                <input type="text" class="form-input  rounded-full" placeholder="Search files...">
                                <span class="mgc_search_line text-xl -ms-8"></span>
                            </div>
                        </form>
                    </div>
                </div>

                @foreach($folders as $folder)
                  <div class="card">
                    <div class="p-5">
                        <div class="space-y-4 text-gray-600 dark:text-gray-300">
                            <div class="flex items-start relative gap-5">
                                <div class="flex items-center gap-3">
                                    <div class="h-14 w-14">
									<span class="flex h-full w-full items-center justify-center">
										<i data-feather="folder" class="h-full w-full fill-warning text-warning"></i>
									</span>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="font-semibold text-base">{{$folder->name}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
{{--                                <p class="text-sm">3 GB</p>--}}
                                <span class="p-0.5 bg-gray-600 rounded-full"></span>
                                <p class="text-sm">{{$folder->files_count }} Files</p>
                            </div>
                        </div>
                    </div> <!-- end card body -->
                </div>
                @endforeach

                <div class="2xl:col-span-4 sm:col-span-2">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Recent Folders</h4>
                        </div>

                        <div class="flex flex-col">
                            <div class="overflow-x-auto">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                            <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr class="text-gray-800 dark:text-gray-300">
                                                <th scope="col" class="p-3.5 text-sm text-start font-semibold min-w-[10rem]">File Name</th>
                                                <th scope="col" class="p-3.5 text-sm text-start font-semibold min-w-[10rem]">Last Modified</th>
                                                <th scope="col" class="p-3.5 text-sm text-start font-semibold min-w-[6rem]">Count Files</th>
                                                <th scope="col" class="p-3.5 text-sm text-start font-semibold">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                            @foreach($folders as $folder)
                                              <tr>
                                                <td class="p-3.5 text-sm text-gray-700 dark:text-gray-400">
                                                    <a href="javascript: void(0);" class="font-medium">{{$folder->name}}</a>
                                                </td>
                                                <td class="p-3.5 text-sm text-gray-700 dark:text-gray-400">
                                                    <p>{{$folder->created_at}}</p>
                                                </td>
                                                <td class="p-3.5 text-sm text-gray-700 dark:text-gray-400">{{$folder->files_count }}</td>
                                                <td class="p-3.5">
                                                    <div>
                                                        <button class="btn bg-primary text-white" data-fc-type="modal" type="button">
                                                            Edit
                                                        </button>
                                                        {{-- model   --}}
                                                          <div class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden">
                                                            <div class="mt-5 fc-modal-open:scale-100 duration-300 scale-90 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto  bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
                                                                <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                                                                    <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                                                                        New name folder
                                                                    </h3>
                                                                    <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                                                                            data-fc-dismiss type="button">
                                                                        <span class="material-symbols-rounded">close</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Folder Update Name -->
                                                                <form action="{{ route('panel.folder.update' , ['folder' => $folder]) }}" method="POST">
                                                                    @csrf
                                                                    <div class="px-4 py-8 overflow-y-auto">
                                                                        <input type="text" name="folder_name" class="form-input" value="{{$folder->name}}"  required>
                                                                        <input type="hidden" name="parent_id" value="">
                                                                    </div>

                                                                    <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                                                                        <button class="py-2 px-5 inline-flex justify-center items-center gap-2 rounded dark:text-gray-200 border dark:border-slate-700 font-medium hover:bg-slate-100 hover:dark:bg-slate-700 transition-all"
                                                                                data-fc-dismiss type="button">Close
                                                                        </button>
                                                                        <button class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded bg-primary hover:bg-primary-600 text-white" type="submit">Save
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div style="display: inline-block!important;">
                                                            <form action="{{ route('panel.folder.delete' , ['folder' => $folder]) }}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn border-danger text-danger hover:bg-danger hover:text-white">Delete</button>
                                                            </form>
                                                        </div>

                                                        <button class="btn border-success text-success hover:bg-success hover:text-white" data-fc-type="modal" type="button">
                                                            Add Files
                                                        </button>

                                                        <div class="fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden w-full h-full min-h-full items-center fc-modal-open:flex">
                                                            <div class="fc-modal-open:opacity-100 duration-500 opacity-0 ease-out transition-[opacity] sm:max-w-lg sm:w-full sm:mx-auto  flex-col bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
                                                                <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                                                                    <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                                                                        Add Files
                                                                    </h3>
                                                                    <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                                                                            data-fc-dismiss type="button">
                                                                        <span class="material-symbols-rounded">close</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{route('panel.file-manager.file')}}" method="post" class="dropzone" enctype="multipart/form-data">
                                                                    @csrf
                                                                <div class="px-4 py-8 overflow-y-auto">
                                                                  <input name="folder_id" type="hidden" value="{{$folder->id}}">
                                                                        <div class="fallback">
                                                                            <input  type="file" name="file" multiple="multiple">
                                                                        </div>
                                                                        <div class="dz-message needsclick w-full">
                                                                            <div class="mb-3">
                                                                                <i class="mgc_upload_3_line text-4xl text-gray-300 dark:text-gray-200"></i>
                                                                            </div>

                                                                        </div>

                                                                </div>
                                                                <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                                                                    <button class="py-2 px-5 inline-flex justify-center items-center gap-2 rounded dark:text-gray-200 border dark:border-slate-700 font-medium hover:bg-slate-100 hover:dark:bg-slate-700 transition-all" data-fc-dismiss type="button">Close</button>
                                                                    <button class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded bg-primary hover:bg-primary-600 text-white" type="submit">Save
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div style="display: inline-block!important;">
                                                            <form action="{{ route('panel.file.show' , ['id' => $folder->id]) }}" method="get">
                                                                <button type="submit" class="btn border-primary text-primary hover:bg-primary hover:text-white">Show Files</button>
                                                            </form>
                                                        </div>

                                                    </div>

                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    @vite(['resources/js/pages/highlight.js'])

@endsection
