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
<div class="container mx-auto">

    <div class="w-[1500rem]  p-5 mx-auto my-10 bg-white rounde  d-md shadow-sm">
        <div class="">
            <ul class="">
             @if($items)
               @foreach($items as $item)
               <a href="/item/{{$item->id}}"> <li class="  px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 my-3 border border-gray-140 rounded overflow-hidden">Email Name : {{ $item->name }}. </li></a>
               @endforeach
               @else
                <li> Not working</li>
              @endif
            </ul>
          </div>
      {{-- <div>

        <form action="/additem" method="POST">
            @csrf
          <div class="mb-6">
            <label for="name" class="block mb-2 text-sm text-gray-600"
              >Create new campaign</label
            >
            <input
              type="text"
              name="name"
              placeholder=""
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
      <div class="">
        <ul class="">
         @if($items)
           @foreach($items as $item)
           <a href="/item/{{$item->id}}"> <li class="  px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 my-3 border border-gray-140 rounded overflow-hidden">Campaign Name : {{ $item->name }}. </li></a>
           @endforeach
           @else
            <li> Not working</li>
          @endif
        </ul>
    </div> --}}
    <div id="dynamic_field"></div>
    </div>
<div>

    <button type="button" name="add" id="add" class="w-[200px] mt-[60px] px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">Add More</button>
  </div>
</div>

  <script type="text/javascript">
    $(document).ready(function(){
      // var i=1;
      $('#add').click(function(){
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
        placeholder=""
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