<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200">
        {{ $workspace->name }}
      </h2>
      <div class="flex gap-2">
        <a href="{{ route('workspaces.index') }}"
          class="px-4 py-2 bg-gray-600 dark:bg-gray-700 text-white rounded-lg shadow hover:bg-gray-700 dark:hover:bg-gray-600 transition">
          &larr; Back to Workspaces
        </a>
        <a href="{{ route('workspaces.tasks.create', $workspace) }}"
          class="px-4 py-2 bg-indigo-600 dark:bg-indigo-500 text-white rounded-lg shadow hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
          + Add Task
        </a>
      </div>
    </div>
  </x-slot>

  <div class="container mx-auto mt-6">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
      <table class="min-w-full border-collapse">
        <thead class="bg-gray-100 dark:bg-gray-700 border-b dark:border-gray-600">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Title</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Status / Deadline</th>
            <th class="px-6 py-3 text-right text-sm font-medium text-gray-600 dark:text-gray-300">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
          @forelse($tasks as $task)
            <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-750 transition">
              <!-- Title -->
              <td class="px-6 py-4 font-medium text-gray-800 dark:text-gray-100">
                {{ $task->title }}
              </td>

              <!-- Status -->
              <td class="px-6 py-4 text-sm">
                @if($task->isCompleted())
                  <span class="text-green-600 dark:text-green-400 font-medium">
                    Completed {{ $task->humanCompletedAgo() }}
                  </span>
                @else
                  @if($task->deadline->isFuture())
                    <span class="text-gray-600 dark:text-gray-400">
                      Due: {{ $task->deadline->toDayDateTimeString() }} —
                      <strong class="text-orange-500 dark:text-orange-400">{{ $task->humanRemaining() }}</strong>
                    </span>
                  @else
                    <span class="text-red-700 dark:text-red-400 font-semibold">
                      Overdue: {{ $task->deadline->toDayDateTimeString() }} —
                      <strong>Overdue by
                        {{ $task->deadline->diffForHumans(now(), ['parts' => 2, 'short' => false]) }}</strong>
                    </span>
                  @endif
                @endif
              </td>

              <!-- Actions -->
              <td class="px-6 py-4 text-right space-x-2 flex justify-end">
                <!-- Toggle Complete Button -->
                <form method="POST" action="{{ route('workspaces.tasks.toggle', [$workspace, $task]) }}">
                  @csrf
                  @method('PATCH')
                  <button type="submit"
                    class="px-3 py-1 text-sm {{ $task->isCompleted() ? 'bg-yellow-100 dark:bg-yellow-900 text-yellow-700 dark:text-yellow-300 hover:bg-yellow-200 dark:hover:bg-yellow-800' : 'bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 hover:bg-green-200 dark:hover:bg-green-800' }} rounded transition">
                    {{ $task->isCompleted() ? 'Mark Incomplete' : 'Mark Completed' }}
                  </button>
                </form>

                <!-- Edit -->
                <a href="{{ route('workspaces.tasks.edit', [$workspace, $task]) }}"
                  class="px-3 py-1 text-sm text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900 rounded hover:bg-blue-200 dark:hover:bg-blue-800 transition">
                  Edit
                </a>

                <!-- Delete -->
                <form method="POST" action="{{ route('workspaces.tasks.destroy', [$workspace, $task]) }}" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Delete this task?')"
                    class="px-3 py-1 text-sm text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-900 rounded hover:bg-red-200 dark:hover:bg-red-800 transition">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                No tasks yet.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
      {{ $tasks->links() }}
    </div>
  </div>
</x-app-layout>