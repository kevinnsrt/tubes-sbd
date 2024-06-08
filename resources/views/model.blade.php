<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Model') }}
            <a href="/create/model" class="btn btn-outline btn-accent btn-sm ml-4">Create</a>
        </h2>

    </x-slot>


        <div class="overflow-x-auto text-stone-900">
            <table class="table table-xs text-stone-900 ">
              <thead class="text-stone-900">
                <tr>
                  <th>id</th>
                  <th>model_title</th>
                  <th>author</th>
                  <th>total_votes</th>
                  <th>last_run_date</th>
                  <th>url</th>
                  <th>description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                @forelse($model as $data)
                  <th>{{ $data->id }}</th>
                  <td>{{ $data->model_title }}</td>
                  <td>{{ $data->author }}</td>
                  <td>{{ $data->total_votes }}</td>
                  <td>{{ $data->last_run_date }}</td>
                  <td>{{ $data->url }}</td>
                  <td>{{ $data->description }}</td>
                  <td><a href="/model/{{ $data->id }}/edit" class="btn btn-outline btn-primary btn-xs">Edit</a></td>
                  <td>
                    <form action="/delete/{{ $data->id }}/model" method="post">
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
                  <th>id</th>
                  <th>model_title</th>
                  <th>author</th>
                  <th>total_votes</th>
                  <th>last_run_date</th>
                  <th>url</th>
                  <th>description</th>
                </tr>
              </tfoot>
            </table>
            <div class="m-4">
                {{ $model->links() }}
            </div>
          </div>
    </div>
</x-app-layout>
