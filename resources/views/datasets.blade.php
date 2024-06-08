<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Datasets') }}
            <a href="/create/datasets" class="btn btn-outline btn-accent btn-sm ml-4">Create</a>
        </h2>

    </x-slot>


        <div class="overflow-x-auto text-stone-900">
            <table class="table table-xs">
              <thead class="text-stone-900">
                <tr>
                  <th>id_dataset</th>
                  <th>user_id</th>
                  <th>dataset_name</th>
                  <th>about_dataset</th>
                  <th>dataset_file</th>
                  <th>upVote</th>
                  <th>usability</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($datasets as $data)
                <tr>
                  <th>{{ $data->id_dataset }}</th>
                  <td>{{ $data->user_id }}</td>
                  <td>{{ $data->dataset_name }}</td>
                  <td>{{ $data->about_dataset }}</td>
                  <td>{{ $data->dataset_file }}</td>
                  <td>{{ $data->upVote }}</td>
                  <td>{{ $data->usability }}</td>
                  <td>
                    <a href="/edit/{{ $data->id_dataset }}/datasets" class="btn btn-outline btn-primary btn-xs">Edit</a></td>
                  <td>
                    <form action="/delete/{{ $data->id_dataset }}" method="post">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-outline btn-error btn-xs">Delete</button>
                    </form>
                </td>
                </tr>
                <tr>
                    @empty

                    @endforelse
                </tbody>
              <tfoot>
                <tr>
                    <th>id_dataset</th>
                    <th>user_id</th>
                    <th>dataset_name</th>
                    <th>about_dataset</th>
                    <th>img</th>
                    <th>dataset_file</th>
                    <th>upVote</th>
                    <th>created_at</th>
                    <th>update_at</th>
                    <th>usability</th>
                </tr>
              </tfoot>
            </table>
            <div class="m-4">
                {{ $datasets->links() }}
            </div>
          </div>
    </div>
</x-app-layout>
