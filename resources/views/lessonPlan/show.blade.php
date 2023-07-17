<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do plano de aula') }}
        </h2>
    </x-slot>
    <!-- Lesson Plan Show View -->
    <div class="py-12">

        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Lesson Plan Information -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h3 class="text-lg font-bold mb-2">Título: {{ $lessonPlan->title }}</h3>
                <p class="text-gray-500 mb-4">Descrição: {{ $lessonPlan->description }}</p>
                <p class="text-gray-500">Padrão Curricular: {{ $lessonPlan->curriculum_standard }}</p>
            </div>

            <!-- Lesson Plan Items -->
            <div>


                <!-- Lesson Plan Item List -->
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-bold mb-4">Itens do plano de aula</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Objectivo</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actividade</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    RECURSOS</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    AVALIAÇÃO</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                    Ação</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Lesson Plan Item Row -->
                            @forelse ($lessonPlan->lessonPlanItems as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->objective }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->activity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->resources }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->assessment }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center justify-center">
                                        <a class="text-green-500 hover:text-green-700" href="#">add recurso</a> |
                                        <a class="text-blue-500 hover:text-blue-700"
                                            href="{{ route('lesson-plan-item.edit', $item->id) }}">Editar item</a>|
                                        <form method="POST" action="{{ route('lesson-plan-item.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500 hover:text-red-700">remover item</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center font-semibold">não
                                        existe plano não tem nenhum item adcionado no momento</td>
                                </tr>
                            @endforelse

                            <!-- More lesson plan item rows -->
                        </tbody>
                    </table>
                </div>

                <!-- Add Lesson Plan Item Form -->

                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-4">Adicionar item do plano de aula</h3>
                    <div class="max-w-xlitems-center ">
                        <form method="post" action="{{ route('lesson-plan-item.store') }}" class="mt-6 space-y-6">
                            @csrf
                            <input type="hidden" name="lesson_plan_id" value="{{ auth()->user()->id }}">
                            <div>
                                <x-input-label for="objective" :value="__('Objectivo')" />
                                <x-text-input id="objective" name="objective" type="text" class="mt-1 block w-full"
                                    :value="old('objective')" autofocus autocomplete="objective" />
                                <x-input-error class="mt-2" :messages="$errors->get('objective')" />
                            </div>

                            <div>
                                <x-input-label for="activity" :value="__('actividade')" />
                                <x-text-input id="activity" name="activity" type="text" class="mt-1 block w-full"
                                    :value="old('activity')" autocomplete="activity" />
                                <x-input-error class="mt-2" :messages="$errors->get('activity')" />
                            </div>
                            <div>
                                <x-input-label for="assessment" :value="__('avaliação')" />
                                <x-text-input id="assessment" name="assessment" type="text" class="mt-1 block w-full"
                                    :value="old('assessment')" autocomplete="assessment" />
                                <x-input-error class="mt-2" :messages="$errors->get('assessment')" />
                            </div>
                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="resources" :value="__('rescursos')" />
                                <textarea name="resources" id="resources" class="block mt-1 w-full" cols="30" rows="5">{{ old('resources') }}</textarea>
                                <x-input-error :messages="$errors->get('resources')" class="mt-2" />
                            </div>


                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Adicionar item ao plano de aula') }}</x-primary-button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>
</x-app-layout>
