<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Competitions') }}
            <a href="/create/competitions" class="btn btn-outline btn-accent btn-sm ml-4">Create</a>
        </h2>



    </x-slot>


        <div class="overflow-x-auto text-stone-900">
            <table class="table table-xs">
              <thead class="text-stone-900">
                <tr>
                    <th>competition_id</th>
                  <th>ref</th>
                  <th>competition_name</th>
                  <th>description</th>
                  <th>start_date</th>
                  <th>end_date</th>
                  <th>prize_amont</th>
                </tr>
              </thead>
              <tbody>
                @forelse($competitions as $data)
                  <th>{{ $data->competition_id }}</th>
                  <td>{{ $data->ref }}</td>
                  <td>{{ $data->competition_name }}</td>
                  <td>{{ $data->description }}</td>
                  <td>{{ $data->start_date}}</td>
                  <td>{{ $data->end_date }}</td>
                  <td>{{ $data->prize_amount }}</td>
                  <td><a href="/competitions/{{ $data->competition_id }}/edit" class="btn btn-outline btn-primary btn-xs">Edit</a></td>
                  <td>
                    <form action="/delete/{{ $data->competition_id }}" method="post">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-outline btn-error btn-xs">Delete</button>
                    </form>
                </td>
                </tr>
                @empty
                @endforelse
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Job</th>
                  <th>company</th>
                  <th>location</th>
                  <th>Last Login</th>
                  <th>Favorite Color</th>
                </tr>
              </tfoot>
            </table>
            <div class="m-4">
                {{ $competitions->links() }}
            </div>
          </div>
    </div>
</x-app-layout>
