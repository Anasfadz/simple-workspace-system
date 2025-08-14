<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-2xl text-gray-800">
        New Task in {{ $workspace->name }}
      </h2>
      <a href="{{ route('workspaces.show', $workspace) }}" 
         class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow hover:bg-gray-300 transition">
        Back
      </a>
    </div>
  </x-slot>

  <div class="container mx-auto mt-6">
    <div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
      <form method="POST" action="{{ route('workspaces.tasks.store', $workspace) }}" class="space-y-5">
        @csrf
        
        <!-- Title -->
        <div>
          <x-input-label for="title" value="Title" class="mb-1" />
          <x-text-input id="title" name="title" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required />
        </div>

        <!-- Description -->
        <div>
          <x-input-label for="description" value="Description" class="mb-1" />
          <textarea id="description" name="description" rows="4"
                    class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        </div>

        <!-- Deadline -->
        <div>
          <x-input-label for="deadline" value="Deadline (Date & Time)" class="mb-1" />
          <input id="deadline" type="datetime-local" name="deadline"
          min="{{ now()->format('Y-m-d\TH:i') }}"
          class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required />
        </div>

        <!-- Button -->
        <div class="flex justify-end">
          <x-primary-button class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Save
          </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>