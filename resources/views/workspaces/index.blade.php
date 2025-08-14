<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-2xl text-gray-800">
        Your Workspaces
      </h2>
      <a href="{{ route('workspaces.create') }}" 
         class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
        + New Workspace
      </a>
    </div>
  </x-slot>

  <div class="container mx-auto mt-6">
    <div class="bg-white shadow rounded-lg overflow-hidden">
      <table class="min-w-full border-collapse">
        <thead class="bg-gray-100 border-b">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Name</th>
            <th class="px-6 py-3 text-right text-sm font-medium text-gray-600">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($workspaces as $ws)
            <tr class="border-b hover:bg-gray-50 transition">
              <td class="px-6 py-4 text-gray-800 font-medium">
                <a href="{{ route('workspaces.show', $ws) }}" class="hover:underline text-indigo-600">
                  {{ $ws->name }}
                </a>
              </td>
              <td class="px-6 py-4 text-right space-x-2">
                <!-- Edit -->
                <a href="{{ route('workspaces.edit', $ws) }}" 
                   class="px-3 py-1 text-sm text-blue-600 bg-blue-100 rounded hover:bg-blue-200 transition">
                  Edit
                </a>

                <!-- Delete -->
                <form method="POST" action="{{ route('workspaces.destroy', $ws) }}" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          onclick="return confirm('Delete this workspace?')"
                          class="px-3 py-1 text-sm text-red-600 bg-red-100 rounded hover:bg-red-200 transition">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="2" class="px-6 py-4 text-center text-gray-500">
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