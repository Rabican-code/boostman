<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <!DOCTYPE html>
    <html lang="en">

    <head>

    </head>

    <body>

        <!doctype html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            @vite('resources/css/app.css')
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        </head>

        <body>
            <div class="bg-gray-100">
                <div class="flex justify-center">
                    <div class="bg-gray-100 w-[29rem]">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Create new campaign</h3>
                            <form class="mt-5 sm:flex sm:items-center" action="/addcampaign" method="POST">
                                @csrf
                                <div class="w-full sm:max-w-xs">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="text" name="name" placeholder="Enter Your Campaign Name" required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        placeholder="you@example.com">
                                </div>
                                <button type="submit"
                                    class="mt-3 inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-0 sm:ml-3 sm:w-auto">Create</button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class=" shadow-sm rounded-md flex justify-center bg-gray-100">
                    <div class="">
                        <ul class="bg-gray-100 grid grid-cols-1 gap-2">
                            @if ($items)
                                @foreach ($items as $item)
                                    <a href="/campaign_items/{{ $item->id }}">
                                    <li
                                        class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow hover:bg-neutral-200">
                                        <div class="flex w-full items-center justify-between space-x-6 p-6">
                                            <div class="flex-1 truncate">
                                                <div class="flex items-center space-x-3">
                                                    <h3 class="truncate text-lg  font-semibold text-gray-900">
                                                        Campaign Name: {{ $item->name }}</h3>
                                                </div>
                                            </div>
                                            <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300"
                                                src="https://ui-avatars.com/api/?name={{ $item->name }}/&background=random"
                                                alt="">
                                        </div>
                                        <div id="edit">
                                        </div>
                                    </a>
                                        <div>
                                            <div class="-mt-px flex divide-x divide-gray-200">
                                                <div class="flex w-0 flex-1">
                                                    <a id="show" type="submit" class=" ">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="-ml-px flex w-0 flex-1">
                                                    <a href="/campaign/delete/{{ $item->id }}" type="submit"
                                                        class="">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="edit">
                                            <form style="display:none" class="mt-5 sm:flex sm:items-center"
                                                action="/campaign/update/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <button id="hide">X</button>
                                                <div class="w-full sm:max-w-xs">
                                                    <label for="email" class="sr-only">Email</label>
                                                    <input type="text" name="name"
                                                        placeholder="Enter Your Campaign Name" required
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        placeholder="you@example.com">
                                                </div>
                                                <button type="submit"
                                                    class="mt-3 inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-0 sm:ml-3 sm:w-auto">Create</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li> Not working</li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#hide").click(function() {
                        $("#edit").css("display", "none");
                    });

                    $("#show").click(function() {
                        $("#edit").css("display", "block");
                    });
                });
            </script>
        </body>

        </html>

</x-app-layout>
