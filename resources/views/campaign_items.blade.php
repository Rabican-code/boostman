<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <!DOCTYPE html>
    <html lang="en">

    <head>
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
            <div class="flex-row border w-[13rem] h-[81vh] border-black">

                <div class="w-[12rem] h-[25rem] p-5 my-2 bg-white rounde  d-md shadow-sm">
                    <div class="">
                        <ul class="">
                            @if ($items)
                                @foreach ($items as $item)
                                    <a href="/item/{{ $item->id }}">
                                        <li
                                            class=" bg-white hover:bg-sky-100 hover:text-sky-900 border border-gray-140 rounded overflow-hidden">
                                            Email Name : {{ $item->name }}. </li>
                                    </a>
                                @endforeach
                            @else
                                <li> Not working</li>
                            @endif
                        </ul>
                    </div>
                    <div id="dynamic_field"></div>
                </div>
                <div>

                    <button type="button" name="add" id="add"
                        class="w-[12rem] px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">Add
                        More</button>
                </div>

            </div>
            <div id="email_form">
                <input type="text"
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
            <div>
                <button type="submit"
                    class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">
                    Update This Campaign
                </button>
            </div>
        </div>
            <div>

                <button type="button" name="add" id="add"
                    class="w-[200px] mt-[60px] px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">Add
                    More</button>
            </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    // var i=1;
                    $('#add').click(function() {
                        //  i++;
                        $('#dynamic_field').append(`

<div>
  <form action="/additem" method="POST">
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

                    // $(document).on('click', '.btn_remove', function(){
                    //      var button_id = $(this).attr("id");
                    //      $('#row'+button_id+'').remove();
                    // });

                });
            </script>
        </body>

        </html>

</x-app-layout>
