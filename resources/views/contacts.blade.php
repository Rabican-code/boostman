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
<div class="container mx-auto">

    <div class="w-[1500rem]  p-5 mx-auto my-10 bg-white rounde  d-md shadow-sm">

      <div>

        <form action="/contacts" method="POST">
            @csrf
          <div class="mb-6">
            <label for="name" class="block mb-2 text-sm text-gray-600"
              >Add Email</label
            >
            <input
              type="email"
              name="email"
              placeholder=""
              required
              class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
            />
          </div>
          <div class="flex justify-center mb-6">
            <button
              type="submit"
              class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none"
            >
              Create
            </button>
          </div>
        </form>
      </div>
      <div class="">
        <ul class="border  border-gray-200 rounded overflow-hidden shadow-md">
         @if($items)
           @foreach($items as $data)

          <li class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out"> {{ $data->email }}</li>
           @endforeach
           @else
            <li> Not working</li>
          @endif
        </ul>
    </div>
    </div>
    </div>



  </div>
</body>
</html>

</body>
</html>

</x-app-layout>
