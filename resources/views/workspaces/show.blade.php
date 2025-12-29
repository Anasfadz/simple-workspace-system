<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-2xl text-gray-800">
        {{ $workspace->name }}
      </h2>
      <div class="flex gap-2">
        <a href="{{ route('workspaces.index') }}" 
           class="px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 transition">
          &larr; Back to Workspaces
        </a>
        <a href="{{ route('workspaces.tasks.create', $workspace) }}" 
           class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
          + Add Task
        </a>
      </div>
    </div>
  </x-slot>

  <div class="container mx-auto mt-6">
    <div class="bg-white shadow rounded-lg overflow-hidden">
      <table class="min-w-full border-collapse">
        <thead class="bg-gray-100 border-b">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Title</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Status / Deadline</th>
            <th class="px-6 py-3 text-right text-sm font-medium text-gray-600">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($tasks as $task)
            <tr class="border-b hover:bg-gray-50 transition">
              <!-- Title -->
              <td class="px-6 py-4 font-medium text-gray-800">
                {{ $task->title }}
              </td>

              <!-- Status -->
              <td class="px-6 py-4 text-sm">
                @if($task->isCompleted())
                  <span class="text-green-600 font-medium">
                    Completed {{ $task->humanCompletedAgo() }}
                  </span>
                @else
                  @if($task->deadline->isFuture())
                    <span class="text-gray-600">
                      Due: {{ $task->deadline->toDayDateTimeString() }} —
                      <strong class="text-orange-500">{{ $task->humanRemaining() }}</strong>
                    </span>
                  @else
                    <span class="text-red-700 font-semibold">
                      Overdue: {{ $task->deadline->toDayDateTimeString() }} —
                      <strong>Overdue by {{ $task->deadline->diffForHumans(now(), ['parts' => 2, 'short' => false]) }}</strong>
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
                          class="px-3 py-1 text-sm {{ $task->isCompleted() ? 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }} rounded transition">
                          {{ $task->isCompleted() ? 'Mark Incomplete' : 'Mark Completed' }}
                      </button>
                  </form>

                  <!-- Edit -->
                  <a href="{{ route('workspaces.tasks.edit', [$workspace, $task]) }}" 
                    class="px-3 py-1 text-sm text-blue-600 bg-blue-100 rounded hover:bg-blue-200 transition">
                    Edit
                  </a>

                  <!-- Delete -->
                  <form method="POST" action="{{ route('workspaces.tasks.destroy', [$workspace, $task]) }}" class="inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" 
                              onclick="return confirm('Delete this task?')"
                              class="px-3 py-1 text-sm text-red-600 bg-red-100 rounded hover:bg-red-200 transition">
                        Delete
                      </button>
                  </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="px-6 py-4 text-center text-gray-500">
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