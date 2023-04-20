<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        {{-- <style>
            [x-cloak] {
                display: none;
            }

            .svg-icon {
                width: 1em;
                height: 1em;
            }

            .svg-icon path,
            .svg-icon polygon,
            .svg-icon rect {
                fill: #333;
            }

            .svg-icon circle {
                stroke: #4691f6;
                stroke-width: 1;
            }
        </style> --}}
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

            <div class="my-5 overflow-y-auto flex flex-col items-center ">

                <div class="overflow-hidden rounded-md bg-gray-100 w-screen">
                    <ul role="list" class="divide-y divide-gray-200 w-full flex flex-col items-center">
                        {{-- <div>
                            <h2 class="w-60">Choose Contacts:</h2>
                            <select x-cloak value="Choose contacts" name="contact[]" id="select" multiple
                                multiselect-search="true"
                                class=" w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>
                                @foreach ($items as $item)
                                    <h4> {{ $item->id }}</h4>
                                    <option value="{{ $item->id }}"
                                        class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                        {{ $item->contact }}</option>
                                @endforeach
                            </select>

                            <div x-data="dropdown()" x-init="loadOptions()"
                                class="w-full md:w-1/2 flex flex-col items-center h-64 mx-auto">
                                <input name="values" type="hidden" x-bind:value="selectedValues()">
                                <div class="inline-block relative w-64">
                                    <div class="flex flex-col items-center relative">
                                        <div x-on:click="open" class="w-full">
                                            <div class="my-2 p-1 flex border border-gray-200 bg-white rounded">
                                                <div class="flex flex-auto flex-wrap">
                                                    <template x-for="(option,index) in selected"
                                                        :key="options[option].value">
                                                        <div
                                                            class="flex justify-center items-center m-1 font-medium py-1 px-1 bg-white rounded bg-gray-100 border">
                                                            <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                                options[option] x-text="options[option].text"></div>
                                                            <div class="flex flex-auto flex-row-reverse">
                                                                <div x-on:click.stop="remove(index,option)">
                                                                    <svg class="fill-current h-4 w-4 " role="button"
                                                                        viewBox="0 0 20 20">
                                                                        <path
                                                                            d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                                 c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                                 l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                                 C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                                    </svg>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                    <div x-show="selected.length == 0" class="flex-1">
                                                        <input placeholder="Select a option"
                                                            class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800"
                                                            x-bind:value="selectedValues()">
                                                    </div>
                                                </div>
                                                <div
                                                    class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">

                                                    <button type="button" x-show="isOpen() === true" x-on:click="open"
                                                        class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                        <svg version="1.1" class="fill-current h-4 w-4"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                          c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                          L17.418,6.109z" />
                                                        </svg>

                                                    </button>
                                                    <button type="button" x-show="isOpen() === false" @click="close"
                                                        class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                            <path
                                                                d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
                                          c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
                                          " />
                                                        </svg>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full px-4">
                                            <div x-show.transition.origin.top="isOpen()"
                                                class="absolute shadow top-100 bg-white z-40 w-full left-0 rounded max-h-select"
                                                x-on:click.away="close">
                                                <div class="flex flex-col w-full overflow-y-auto h-64">
                                                    <template x-for="(option,index) in options" :key="option"
                                                        class="overflow-auto">
                                                        <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100"
                                                            @click="select(index,$event)">
                                                            <div
                                                                class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                                <div class="w-full items-center flex justify-between">
                                                                    <div class="mx-2 leading-6" x-model="option"
                                                                        x-text="option.text"></div>
                                                                    <div x-show="option.selected">
                                                                        <svg class="svg-icon" viewBox="0 0 20 20">
                                                                            <path fill="none"
                                                                                d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
                                                                  C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
                                                                  L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z">
                                                                            </path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> --}}
                        <form method="post" action="/savedcontacts/{{$cp_id}}">
                            @csrf
                            @foreach ($items as $item)
                                <li class="my-2 col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                                    <div class="flex w-[20rem] items-center justify-between space-x-6 p-4">
                                        <div class=" flex-1 truncate">
                                            <div class=" flex items-center space-x-3">
                                                {{ $item->contact }}  <input type="checkbox" value="{{ $item->id }}" name="contact[]" class=" ml-[115px] truncate font-medium text-gray-900"/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="-mt-px flex divide-x divide-gray-200">

                                        <div class="-ml-px flex w-0 flex-1">
                                            <a href="/contact/delete/{{ $item->id }}"
                                                class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-2 text-sm font-semibold text-gray-900">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Save
                              </button>
                        </form>
                    </ul>
                </div>
                <div class="my-5 flex justify-center">

                    <div class=""id="dynamic_field"></div>

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
                    // var i=1;
                    $('#add').click(function() {
                        //  i++;
                        $('#dynamic_field').append(`

    <div>
        <form class="mt-5 sm:flex sm:items-center" action="/addcontact" method="POST">
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
    `);
                    });


                });
            </script>
            {{-- <script>
                function dropdown() {
                    return {
                        options: [],
                        selected: [],
                        show: false,
                        open() {
                            this.show = true
                        },
                        close() {
                            this.show = false
                        },
                        isOpen() {
                            return this.show === true
                        },
                        select(index, event) {

                            if (!this.options[index].selected) {

                                this.options[index].selected = true;
                                this.options[index].element = event.target;
                                this.selected.push(index);

                            } else {
                                this.selected.splice(this.selected.lastIndexOf(index), 1);
                                this.options[index].selected = false
                            }
                        },
                        remove(index, option) {
                            this.options[option].selected = false;
                            this.selected.splice(index, 1);


                        },
                        loadOptions() {
                            const options = document.getElementById('select').options;
                            for (let i = 0; i < options.length; i++) {
                                this.options.push({
                                    value: options[i].value,
                                    text: options[i].innerText,
                                    selected: options[i].getAttribute('selected') != null ? options[i].getAttribute(
                                        'selected') : false
                                });
                            }


                        },
                        selectedValues() {
                            return this.selected.map((option) => {
                                return this.options[option].value;
                            })
                        }
                    }
                }
            </script> --}}

        </body>

        </html>



</x-app-layout>
