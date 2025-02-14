<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Create Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('form')
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</x-app-layout>