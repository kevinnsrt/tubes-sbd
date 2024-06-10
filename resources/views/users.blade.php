<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
            <form action="/search/users">
            <label class="input input-bordered flex items-center gap-2 mt-8">
                <input type="text" class="grow" placeholder="Search" name="search" id="search" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
              </label>
            </form>
        </h2>

    </x-slot>



        <div class="overflow-x-auto text-stone-900">
            <table class="table table-xs">
              <thead class="text-stone-900">
                <tr>
                  <th>user_id</th>
                  <th>display_name</th>
                  <th>tagline</th>
                  <th>pronouns</th>
                  <th>occupation</th>
                  <th>organization</th>
                  <th>location</th>
                  <th>bio</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $data)
                <tr>
                  <th>{{ $data->user_id }}</th>
                  <td>{{ $data->display_name }}</td>
                  <td>{{ $data->tagline }}</td>
                  <td>{{ $data->pronouns }}</td>
                  <td>{{ $data->occupation }}</td>
                  <td>{{ $data->organization }}</td>
                  <td>{{ $data->location }}</td>
                  <td>{{ $data->bio }} </td>
                </tr>

                    @empty

                    @endforelse

                </tbody>
              <tfoot>
                <tr>
                    <th>user_id</th>
                    <th>display_name</th>
                    <th>tagline</th>
                    <th>pronouns</th>
                    <th>occupation</th>
                    <th>organization</th>
                    <th>location</th>
                    <th>bio</th>
                </tr>
              </tfoot>
            </table>
            <div class="m-4">
                {{ $users->links() }}
            </div>
          </div>
    </div>
</x-app-layout>
