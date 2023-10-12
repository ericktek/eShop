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
                    {{ 'Customers' }}
                </h2>
                <form class="container-search" action="{{ route('users.search') }}" method="GET">
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
        </div>
        </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session()->has('status'))
                    <div class="flex justify-center items-center">

                        <p class="ml-3 text-sm font-bold">{{ session()->get('status') }}</p>
                    </div>
                    @endif
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Name</th>
                                <th id="size-hidde" class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Email</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Phone</th>
                                <th id="size-hidde"
                                    class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Created At
                                </th>
                                <th id="size-hidde"
                                    class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Updated At
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            {{-- populate our customers data --}}
                            @foreach ($users as $user)
                                <tr>
                                    <td
                                        class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        {{ $user->name }}
                                    </td>
                                    <td id="size-hidde"
                                        class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        {{ $user->email }}
                                    </td>
                                    <td
                                        class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        {{ $user->phone_number }}
                                    </td>
                                    <td id="size-hidde"
                                        class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        {{ $user->created_at }}
                                    </td>
                                    <td id="size-hidde"
                                        class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        {{ $user->updated_at }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
