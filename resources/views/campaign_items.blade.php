<x-app-layout>
    {{-- <x-slot name="header">

    </x-slot> --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <script src="https://cdn.tiny.cloud/1/m3wr5i4ctl7yuevq4aveu9ablgi8jynf2mqp90aweythp7aw/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src=></script>
        <script src="multiselect-dropdown.js" ></script>
        <link rel="stylesheet"w
            href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')

    </head>

    <body>


        <div class="co14l-start-1 col-end-3">

            <aside id="sidebar-multi-level-sidebar"
                class="fixed top-25 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
                aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                    <ul class="space-y-2 font-medium mb-24">


                        @foreach ($items as $item)
                            <a href="/campaign_items/{{ $item->campaign_id }}/{{ $item->id }}">
                                <li
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Email Name :{{ $item->name }}. </li>
                            </a>
                        @endforeach

                    </ul>
                    <div style="display:none" id="dynamic_field">
                        <div>
                               <form action="/additem/{{ $items[0]->campaign_id }}" method="POST">
                                  @csrf
                                 <div class="mb-6">
                                   <label for="name" class="block mb-2 text-sm text-gray-600"
                                     >Create new campaign</label
                                   >
                                   <input
                                     type="text"
                                     name="name"
                                     id="name"
                                     required
                                     class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                   />
                                 </div>

                                 <div class="mb-6">
                                   <button
                                     type="submit"
                                     class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none"
                                   >
                                     Create
                                   </button>
                                 </div>
                              </form>
                             </div>
                    </div>
                </div>
                <div class="absolute bottom-16">
                    <button type="button" name="add" id="add"
                        class="w-[15rem] px-auto py-2 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">Add
                        More</button>
                </div>
            </aside>
        </div>

        {{-- <form action="/campaignupdate/{{ $selected_item['id'] }}" method="POST"> --}}
        {{-- @for ($i = 0; $i < count($contacts); $i++)
                        $contact = $contacts[$i];
                       ($ml-[400px] flex sm:w-16 md:w-[600px] contact['id']); --}}
        <div class="flex justify-center">
            <form action="/campaignitem/update/{{ $selected_item['id'] }}" method="POST" novalidate
                class=" ml-[150px]  col-start-3 col-end-12">

                {{-- @endfor --}}
                <div class=" sm:[w-160px] md:w-[600px] lg:w-[700px] xl:w-[800px] justify-center pt-20">
                    <div id="email_form">
                        @if (\Session::has('error'))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <ul>
                                    <li>{!! \Session::get('error') !!}</li>
                                </ul>
                            </div>
                        @endif
                        @csrf
                        @method('put')
                        <label for="name">Email name:</label>
                        <input
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="name" value="{{ $selected_item['name'] }}" required />
                        <input type="text" value="{{ $selected_item['content'] }}"
                            class=" tinymce-editor  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="tinymce-editor" name="content" required />
                        <label for="content"
                            class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200">
                        </label>

                        <div class="my-5 relative mb-6 grid md:grid-cols-2 grid-cols-1" data-te-input-wrapper-init>
                            <div class="flex items-center">

                                <a href="/campaign_item/contacts/{{ $selected_item['id'] }}" class="w-[12rem] relative block w-auto px-6 py-3 overflow-hidden text-base font-semibold text-center text-gray-800 rounded-lg bg-gray-50 hover:text-black hover:bg-white">
                                    Contacts
                                </a>
                                <input type="date" name="date"
                                    class=" w-[12rem] px-2 mx-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="time" required />
                                <label for="time"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[9] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200">
                                </label>
                            </div>


                            <div class="flex justify-end">
                                <button type="submit"
                                    class="mx-3 text-center w-[100px]  px-6 h-max py-3 text-xl text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">
                                    Save
                                </button>
                                <a href="/delete/{{ $selected_item['id'] }}" type="submit"
                                    class="mx-3 w-[100px] text-end px-6 h-max text-xl py-3 text-white bg-red-500 rounded-md  focus:bg-indigo-600 focus:outline-none">
                                    Delete
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="w-[232px]">
                </div>

            </form>

        </div>

        <script src="jquery.multiple.select.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#add").click(function(){
        $("#dynamic_field").toggle();
    });
//                 $('#add').click(function() {

//                     $('#dynamic_field').append(`

// <div>
//   <form action="/additem/{{ $items[0]->campaign_id }}" method="POST">
//       @csrf
//     <div class="mb-6">
//       <label for="name" class="block mb-2 text-sm text-gray-600"
//         >Create new campaign</label
//       >
//       <input
//         type="text"
//         name="name"
//         id="name"
//         required
//         class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
//       />
//     </div>

//     <div class="mb-6">
//       <button
//         type="submit"
//         class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none"
//       >
//         Create
//       </button>
//     </div>
//   </form>
// </div>
// `);
//                 });


            });
        </script>
        <script>
            tinymce.init({
                selector: 'input.tinymce-editor',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        </script>


    </body>

    </html>

</x-app-layout>
