<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de usuarios') }}
        </h2>
    </x-slot>
    <!-- Users Section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- User List -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-end">
                    <a href="{{ route('user.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cradastar
                        Usuarios</a>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nome</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acção</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- User Row -->
                        @forelse ($users as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a class="text-blue-500 hover:text-blue-700"
                                        href="{{ route('user.edit', $item->id) }}">Editar</a>
                                    <form method="POST" action="{{ route('user.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 hover:text-red-700">Eliminar</button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center font-semibold">não
                                    existe usuarios cadastrado no momento</td>
                            </tr>
                        @endforelse

                        <!-- More user rows -->
                    </tbody>
                </table>
                <div class="flex justify-center">
                    @if (session('success'))
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600">{{ session('success') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
