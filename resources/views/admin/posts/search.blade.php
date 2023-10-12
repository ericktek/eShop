<style>
    /* Custom CSS for inline block */
    .search-container {
                    display: flex;
                    align-items: baseline;
                    margin-right: 10rem;
                }

        .search-container input {
                    flex: 1;
                    margin-right: 10px;

                }
        .container-search {
            margin-right: 0px;

        }
        .left-object {
            display: flex;
            align-items: baseline;
            top: 0;
            bottom: 0;
        }

    @media only screen and (max-width: 600px) {
            #size-hidde {
                display: none;
            }

            #action {
                font-size: 9px;
            }
            #size-change {
                font-size: medium;
                font-weight: 500;
            }
            #small {
                margin-top: 10px;
                padding: 5px;
            }
            #sm-w {
                width: 10rem;
                padding-right: 3rem;
            }

        }

    </style>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 id="size-change" class=" font-semibold text-xl text-gray-800 leading-tight">
                    {{ 'Posts' }}
                </h2>
                <form class="container-search" action="{{ route('posts.search') }}" method="GET">
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input id="sm-w" class="border-2 border-gray-300 bg-white h-10 px-5 w-96 pr-14 rounded-lg text-sm focus:outline-none
                                placeholder-gray-500 focus:placeholder-gray-400
                                hover:border-blue-400 focus:border-blue-400
                                transition duration-300"
                           type="search"
                           name="query"
                           placeholder="Search..."
                    required>
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-2 p-2">
                        <svg class=" text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                             viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                             width="512px" height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </div>
                </form>
                <div>
                    <a style="background: rgb(10, 1, 16)" href="{{ route('posts.create') }}" class="text-white font-bold py-2 px-4 rounded-md mb-4">ADD</a>
                </div>
        </div>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @if (isset($status))
                        <div class="flex justify-center items-center">

                            <p class="ml-3 text-sm font-bold text-red-600">{{ $status }}</p>
                        </div>
                        @else
                        <table class="border-collapse table-auto w-full text-sm">
                            <thead>
                                <tr>
                                    <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Title</th>
                                    <th id="size-hidde"
                                        class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Created At
                                    </th>
                                    <th id="size-hidde"
                                        class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Updated At
                                    </th>
                                    <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                {{-- Search engine to retrieve post data --}}
                                @foreach ($results as $result)

                                <tr>
                                    <td
                                        class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        {{ $result->title }}
                                    </td>
                                    <td id="size-hidde"
                                        class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        {{ $result->created_at }}
                                    </td>
                                    <td id="size-hidde"
                                        class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        {{ $result->updated_at }}
                                    </td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        <div id="action" class="inline flex-wrap">
                                            <a href="{{ route('posts.show', $result->id) }}"
                                                style="height: 40; margin-right: 2px;"
                                                class="small border border-blue-500 hover:bg-blue-500 hover:text-white px-2 py-2 rounded-md">SHOW</a>
                                            <a  href="{{ route('posts.edit', $result->id) }}"
                                                style=""
                                                class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">EDIT</a>
                                            <form method="post" action="{{ route('posts.destroy', $result->id) }}" class="inline">
                                                @csrf
                                                @method('delete')
                                                <button id="small"
                                                    class="border border-red-500 hover:bg-red-500 hover:text-white px-2 py-2 rounded-md">DELETE</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

