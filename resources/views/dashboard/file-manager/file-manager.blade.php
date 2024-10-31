@extends('dashboard.layouts.vertical', ['title' => 'File Manager', 'sub_title' => 'Apps', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')


<div class="flex">

    <div class="w-full">
        <div class="grid 2xl:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6">

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
                                            <th scope="col" class="p-3.5 text-sm text-start font-semibold min-w-[6rem]">Owner</th>
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
                                            <td class="p-3.5 text-sm text-gray-700 dark:text-gray-400">{{$folder->user->name }}</td>
                                            <td class="p-3.5">
                                                <div>
                                                        <form action="{{ route('admin.file-manager.show' , ['folder' => $folder ]) }}" method="get">
                                                            <button type="submit" class="btn border-primary text-primary hover:bg-primary hover:text-white">Show Files</button>
                                                        </form>
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
