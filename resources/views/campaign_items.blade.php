<x-app-layout>
    {{-- <x-slot name="header">

    </x-slot> --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <script src="https://cdn.tiny.cloud/1/m3wr5i4ctl7yuevq4aveu9ablgi8jynf2mqp90aweythp7aw/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
            <div class="w-screen flex">





                <aside id="sidebar-multi-level-sidebar"
                    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
                    aria-label="Sidebar">
                    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                        <ul class="space-y-2 font-medium mb-10">

                            @foreach ($items as $item)
                                <a href="{{ $item->id }}">
                                    <li
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Email Name :{{ $item->name }}. </li>
                                </a>
                            @endforeach

                        </ul>
                    </div>
                    <div class="absolute bottom-0">
                        <button type="button" name="add" id="add"
                            class="w-[15rem] px-auto py-2 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">Add
                            More</button>
                    </div>
                </aside>


                <div class="w-[80rem]">
                    <div class="flex w-full ">
                        <div id="email_form" class="w-full">
                            <form action="/campaignupdate/{{ $selected_item->id }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="text" value=" {{ $selected_item->content }}"
                                    class="tinymce-editor  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="tinymce-editor" name="content" />
                                <label for="content"
                                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200">
                                </label>

                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input type="date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        id="time" />
                                    <label for="time"
                                        class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200">
                                    </label>
                                </div>
                                <div class="flex justify-end px-5">
                                    <button type="submit"
                                        class="w-[12rem] px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">
                                        Update
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    // var i=1;
                    $('#add').click(function() {
                        //  i++;
                        $('#dynamic_field').append(`

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
`);
                    });


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
