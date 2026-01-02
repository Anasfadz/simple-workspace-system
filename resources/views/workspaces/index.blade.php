<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200">
        Your Workspaces
      </h2>
      <a href="{{ route('workspaces.create') }}"
        class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
        + New Workspace
      </a>
    </div>
  </x-slot>

  <div class="container mx-auto mt-6">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
      <table class="min-w-full border-collapse">
        <thead class="bg-gray-100 dark:bg-gray-700 border-b dark:border-gray-600">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Name</th>
            <th class="px-6 py-3 text-right text-sm font-medium text-gray-600 dark:text-gray-300">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
          @forelse($workspaces as $ws)
            <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-750 transition">
              <td class="px-6 py-4 text-gray-800 dark:text-gray-100 font-medium">
                {{ $ws->name }}
              </td>
              <td class="px-6 py-4 text-right space-x-2">
                <!-- View -->
                <a href="{{ route('workspaces.show', $ws) }}"
                  class="px-3 py-1 text-sm text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900 rounded hover:bg-green-200 dark:hover:bg-green-800 transition">
                  View
                </a>
                <!-- Edit -->
                <a href="{{ route('workspaces.edit', $ws) }}"
                  class="px-3 py-1 text-sm text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900 rounded hover:bg-blue-200 dark:hover:bg-blue-800 transition">
                  Edit
                </a>

                <!-- Delete -->
                <form method="POST" action="{{ route('workspaces.destroy', $ws) }}" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Delete this workspace?')"
                    class="px-3 py-1 text-sm text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-900 rounded hover:bg-red-200 dark:hover:bg-red-800 transition">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="2" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                No workspaces found.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
      {{ $workspaces->links() }}
    </div>
  </div>
</x-app-layout>