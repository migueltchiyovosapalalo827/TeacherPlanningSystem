<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Plano de aula') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg ">
                <div class="max-w-xlitems-center ">
                    <form method="post" action="{{ route('lesson-plan.store') }}" class="mt-6 space-y-6">
                        @csrf
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <div>
                            <x-input-label for="title" :value="__('Titulo')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="old('name')" autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="curriculum_standard" :value="__('Curriclo padrão')" />
                            <x-text-input id="curriculum_standard" name="curriculum_standard" type="text"
                                class="mt-1 block w-full" :value="old('curriculum_standard')" autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('curriculum_standard')" />
                        </div>
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('descrição')" />
                            <textarea name="description" id="description" class="block mt-1 w-full" cols="30" rows="5">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>


                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
