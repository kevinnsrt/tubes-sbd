<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
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
