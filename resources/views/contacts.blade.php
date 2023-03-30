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
        </head>

        <body>
            <div class=" flex flex-col items-center ">

                <div class="bg-gray-100 w-[29rem]">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">Add Email</h3>
                        <form class="mt-5 sm:flex sm:items-center" action="/contacts" method="POST">
                            @csrf
                            <div class="w-full sm:max-w-xs">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" placeholder="you@example.com" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <button type="submit"
                                class="mt-3 inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-0 sm:ml-3 sm:w-auto">Create</button>
                        </form>
                    </div>
                </div>
                <div class="overflow-hidden rounded-md bg-gray-100 w-screen">
                    <ul role="list" class="divide-y divide-gray-200 w-full flex flex-col items-center">

                        @if ($items)
                            @foreach ($items as $item)
                                <li class="px-4 py-4  w-[30rem] rounded-md bg-white"> {{ $item->email }}
                                    <div class="-mt-px flex divide-x divide-gray-200">
                                        <div class="flex w-0 flex-1">
                                            <a id="show" href="/contact/edit/{{ $item->id }}"
                                                class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                                Edit
                                            </a>
                                        </div>
                                        <div class="-ml-px flex w-0 flex-1">
                                            <a href="/contact/delete/{{ $item->id }}"
                                                class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">

                                                Delete
                                            </a>
                                        </div>
                                    </div></li>


                            @endforeach
                        @else
                            <li> Not working</li>
                        @endif
                    </ul>

                </div>
            </div>

        </body>

        </html>

    </body>

    </html>

</x-app-layout>
