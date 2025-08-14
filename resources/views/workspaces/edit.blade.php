<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-2xl text-gray-800">
        Edit Workspace
      </h2>
      <a href="{{ route('workspaces.index') }}" 
         class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow hover:bg-gray-300 transition">
        Back
      </a>
    </div>
  </x-slot>

  <div class="container mx-auto mt-6">
    <div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
      <form method="POST" action="{{ route('workspaces.update', $workspace) }}" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Workspace Name -->
        <div>
          <x-input-label for="name" value="Workspace Name" class="mb-1" />
          <x-text-input id="name" name="name" type="text"
                        value="{{ old('name', $workspace->name) }}"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required />
        </div>

        <!-- Button -->
        <div class="flex justify-end">
          <x-primary-button class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Update
          </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>