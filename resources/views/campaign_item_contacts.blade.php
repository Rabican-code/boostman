<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <!Doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <style>
            .mt-100 {
                margin-top: 100px
            }

            body {
                background: #00B4DB;
                background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
                background: linear-gradient(to right, #0083B0, #00B4DB);
                color: #514B64;
                min-height: 100vh
            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
        <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    </head>

    <body>

        <form class="" method="post" action="/savedcontacts/{{ $cp_id }}">
            @csrf
            <div class="w-screen">
            <div class="    flex justify-center mt-100">
                <div class="w-[400px]">
                    <select placeholder="Choose contacts" value="Choose contacts" name="contact[]"
                        id="choices-multiple-remove-button" multiple multiselect-search="true"
                        class=" text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required>
                        @foreach ($items as $item)
                            <h4> {{ $item->id }}</h4>
                            <option value="{{ $item->id }}"
                                class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                {{ $item->contact }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="my-2 flex justify-center">
                <button type="submit" name="Save"
                    class="w-[8rem] px-auto py-2 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">Save</button>
            </div>
        </div>
        </form>

        @foreach ($campaign->contacts as $con)
        <div class="flex justify-center">
            <div class=" my-2 col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                <div class="flex w-[20rem] items-center justify-between space-x-6 p-4">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="truncate text-center font-medium text-gray-900">{{ $con->contact }}</h3>
                        </div>
                    </div>
                </div>
                <div class="-mt-px flex divide-x divide-gray-200">
                    <div class="-ml-px flex w-0 flex-1">
                        <a href="/contact/delete/{{ $con->id }}"
                            class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-2 text-sm font-semibold text-gray-900">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="my-5 overflow-y-auto flex flex-col items-center ">
            <div class="my-5 flex justify-center">

                <div class=""id="dynamic_field"></div>
                <div style="display:none" id="create_contact">
                    <form class="mt-5 sm:flex sm:items-center" action="/addcampaigncontact/{{ $cp_id }}" method="POST">
                                        @csrf
                                        <div class="w-full sm:max-w-xs">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="email" name="contact" placeholder="you@example.com" required
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        <button type="submit"
                                            class="mt-3 inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-0 sm:ml-3 sm:w-auto">Add</button>
                                    </form>
                </div>

            </div>
            <div class="my-5 flex justify-center">
                <div>
                    <button type="button" name="add" id="add"
                        class="w-[15rem] px-auto py-2 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">Create
                        contact</button>
                </div>
            </div>


        </div>

        <script type="text/javascript">

            $(document).ready(function() {
                $("#add").click(function(){
        $("#create_contact").toggle();
    });

    // Set div display to block
    // $(".show-btn").click(function(){
    //     $("#myDiv").css("display", "block");
    // });
                // var i=1;
//                 $('#add').click(function() {
//                     $(this).data('clicked', true);
//                     if($("#add").data('clicked'))
// {
//    console.log("Form created");

//    $('#dynamic_field').append(`

//     <div id="create_contact">
//         <form class="mt-5 sm:flex sm:items-center" action="/addcampaigncontact/{{ $cp_id }}" method="POST">
//                             @csrf
//                             <div class="w-full sm:max-w-xs">
//                                 <label for="email" class="sr-only">Email</label>
//                                 <input type="email" name="contact" placeholder="you@example.com" required
//                                     class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
//                             </div>
//                             <button type="submit"
//                                 class="mt-3 inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-0 sm:ml-3 sm:w-auto">Add</button>
//                         </form>
//     </div>
//     `);

// }

//                 });


            });

        </script>
        <script>
            $(document).ready(function() {

                var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                    removeItemButton: true,
                    maxItemCount: 5,
                    searchResultLimit: 5,
                    renderChoiceLimit: 5
                });


            });
        </script>
        <script>
            document.querySelector('.select-field').addEventListener('click', () => {
                document.querySelector('.list').classList.toggle('show');
                document.querySelector('.down-arrow').classList.toggle('rotate180');

            });
        </script>

    </body>

    </html>



</x-app-layout>
