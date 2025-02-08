

<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                    <div class="flex justify-between w-full mb-3">
                        <h2>{{ auth()->user()->name }}</h2>
                        @can('create',  App\Models\Post::class)
                            <a href="{{ route('post.create') }}" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Novo Post</a>
                        @endcan
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                       Titulo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Usario
                                    </th>
                                    <th scope="col" class="px-6 py-3" colspan="3">
                                        Criação
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $post->title }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $post->user->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $post->created_at }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            @can('update', $post)
                                                
                                                <a href="{{ route('post.edit', $post) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            
                                            @endcan
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            @can('delete', $post)
                                                <form action="{{ route('post.delete', $post)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Are you sure?')" type="submit" name="Delete">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
