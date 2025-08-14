<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-2xl text-gray-800">
        Edit Task
      </h2>
      <a href="{{ route('workspaces.show', $workspace) }}" 
         class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow hover:bg-gray-300 transition">
        Back
      </a>
    </div>
  </x-slot>

  <div class="container mx-auto mt-6">
    <div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
      <form method="POST" action="{{ route('workspaces.tasks.update', [$workspace, $task]) }}" class="space-y-5">
        @csrf 
        @method('PUT')
        
        <!-- Title -->
        <div>
          <x-input-label for="title" value="Title" class="mb-1" />
          <x-text-input id="title" name="title" value="{{ $task->title }}" 
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        required />
        </div>

        <!-- Description -->
        <div>
          <x-input-label for="description" value="Description" class="mb-1" />
          <textarea id="description" name="description" rows="4"
                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $task->description }}</textarea>
        </div>

        <!-- Deadline -->
        <div>
          <x-input-label for="deadline" value="Deadline" class="mb-1" />
          <input id="deadline" type="datetime-local" name="deadline"
                 value="{{ $task->deadline->format('Y-m-d\TH:i') }}"
                 min="{{ now()->format('Y-m-d\TH:i') }}"
                 class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                 required />
        </div>

        <!-- Completed Checkbox -->
        <div class="flex items-center gap-2">
          <input type="checkbox" name="completed" value="1" 
                 {{ $task->isCompleted() ? 'checked' : '' }}
                 class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
          <span class="text-gray-700">Mark as completed</span>
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