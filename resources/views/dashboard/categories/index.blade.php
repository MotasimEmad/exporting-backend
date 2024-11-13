@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="w-full text-white bg-emerald-500 mb-4">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                <div class="flex">
                    <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                        </path>
                    </svg>

                    <p class="mx-3">{{ session('success') }}</p>
                </div>

                <button class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="w-full text-white bg-red-500 mb-4">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                <div class="flex">
                    <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                        <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                        </path>
                    </svg>

                    <p class="mx-3">{{ $errors->first() }}</p>
                </div>

                <button class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <div class="px-8 py-4 bg-white rounded-md">
        <div x-cloak x-data="{ modelOpen: false }" class="flex justify-end">
            <button @click="modelOpen =!modelOpen"
                    class="flex items-center justify-end px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-500 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                <span class="mx-1.5">Add New Category</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1.5" viewBox="0 0 20 20"
                     fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>

            <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                 role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200 transform"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                    ></div>

                    <div x-cloak x-show="modelOpen"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                         x-transition:leave="transition ease-in duration-200 transform"
                         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                         class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl rtl:text-right 2xl:max-w-2xl"
                    >
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-bold text-gray-800">Add New Category</h1>

                            <button @click="modelOpen = false"
                                    class="text-gray-600 focus:outline-none hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>

                        <form id="my-form" class="mt-5" action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm text-gray-700 mt-4 font-bold">Category name</label>
                                <input placeholder="Category" type="text" name="name" required
                                       class="@error('name') border border-red-500 rounded-md focus:border-red-400 @enderror block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                @error('name')
                                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex justify-end mt-6">
                                <button id="btn-submit" type="submit"
                                        class=" px-4 py-2.5 mt-4 text-sm tracking-wide -mx-1 text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-500 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                                    <div class="flex items-center justify-center">
                                        <span class="mx-1">Submit</span>

                                        <svg class="w-5 h-5 mx-1" fill="none" stroke="currentColor"
                                             stroke-width="1.5"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <livewire:category-table />
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#my-form").submit(function (e) {
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").find("span").text("Submitting ...");
                return true;
            });
        });
    </script>
@endsection
