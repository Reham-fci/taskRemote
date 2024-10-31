@extends('panel.layouts.vertical', ['title' => 'File Manager', 'sub_title' => 'Apps', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')


    <div class="flex">

        <div class="w-full">
            <div class="grid 2xl:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6">

                <div class="2xl:col-span-4 sm:col-span-2">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Recent Files</h4>
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
                                                <th scope="col" class="p-3.5 text-sm text-start font-semibold min-w-[6rem]">size Files</th>
                                                <th scope="col" class="p-3.5 text-sm text-start font-semibold">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                            @foreach($files as $file)
                                                <tr>
                                                    <td class="p-3.5 text-sm text-gray-700 dark:text-gray-400">
                                                        <a href="{{ asset($file->path) }}" class="font-medium" download>{{$file->name}}</a>
                                                    </td>
                                                    <td class="p-3.5 text-sm text-gray-700 dark:text-gray-400">
                                                        <p>{{$file->created_at}}</p>
                                                    </td>
                                                    <td class="p-3.5 text-sm text-gray-700 dark:text-gray-400">{{$file->size}}</td>
                                                    <td class="p-3.5">
                                                        <div>
                                                                <form action="{{route('panel.file.delete' , ['file' => $file])}}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn border-danger text-danger hover:bg-danger hover:text-white">Delete</button>
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
