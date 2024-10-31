@extends('dashboard.layouts.vertical', ['title' => 'Dashboard', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="grid 2xl:grid-cols-4 gap-6 mb-6">

        <div class="2xl:col-span-3">

        </div>

    </div> <!-- Grid End -->

    <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6 mb-6">
        <div class="col-span-1">
            <div class="card">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="w-12 h-12 flex justify-center items-center rounded text-primary bg-primary/25">
                                <i class="mgc_document_2_line text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h5 class="mb-1">Active Projects</h5>
                            <p>85</p>
                        </div>
                        <div>
                            <button class="text-gray-600 dark:text-gray-400" data-fc-type="dropdown" data-fc-placement="left-start" type="button">
                                <i class="mgc_more_2_fill text-xl"></i>
                            </button>

                            <div class="hidden fc-dropdown fc-dropdown-open:opacity-100 opacity-0 w-36 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2">
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200" href="javascript:void(0)">
                                    Today
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200" href="javascript:void(0)">
                                    Yesterday
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                    Last Week
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                    Last Month
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-1">
            <div class="card">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="w-12 h-12 flex justify-center items-center rounded text-success bg-success/25">
                                <i class="mgc_group_line text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h5 class="mb-1">Total Employees</h5>
                            <p>32</p>
                        </div>
                        <div>
                            <button class="text-gray-600 dark:text-gray-400" data-fc-type="dropdown" data-fc-placement="left-start" type="button">
                                <i class="mgc_more_2_fill text-xl"></i>
                            </button>

                            <div class="hidden fc-dropdown fc-dropdown-open:opacity-100 opacity-0 w-36 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2">
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200" href="javascript:void(0)">
                                    Today
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200" href="javascript:void(0)">
                                    Yesterday
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                    Last Week
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                    Last Month
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-1">
            <div class="card">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="w-12 h-12 flex justify-center items-center rounded text-info bg-info/25">
                                <i class="mgc_star_line text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h5 class="mb-1">Project Reviews</h5>
                            <p>40</p>
                        </div>
                        <div>
                            <button class="text-gray-600 dark:text-gray-400" data-fc-type="dropdown" data-fc-placement="left-start" type="button">
                                <i class="mgc_more_2_fill text-xl"></i>
                            </button>

                            <div class="hidden fc-dropdown fc-dropdown-open:opacity-100 opacity-0 w-36 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2">
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200" href="javascript:void(0)">
                                    Today
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200" href="javascript:void(0)">
                                    Yesterday
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                    Last Week
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                    Last Month
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-1">
            <div class="card">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="w-12 h-12 flex justify-center items-center rounded text-warning bg-warning/25">
                                <i class="mgc_new_folder_line text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h5 class="mb-1">New Projects</h5>
                            <p>25</p>
                        </div>
                        <div>
                            <button class="text-gray-600 dark:text-gray-400" data-fc-type="dropdown" data-fc-placement="left-start" type="button">
                                <i class="mgc_more_2_fill text-xl"></i>
                            </button>

                            <div class="hidden fc-dropdown fc-dropdown-open:opacity-100 opacity-0 w-36 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2">
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200" href="javascript:void(0)">
                                    Today
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200" href="javascript:void(0)">
                                    Yesterday
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                    Last Week
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                    Last Month
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Grid End -->


@endsection

@section('script')
    @vite('resources/js/pages/dashboard.js')
@endsection
