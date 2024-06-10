<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Datasets') }}
            <form action="/search/datasets">
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
                  <th>id_dataset</th>
                  <th>user_id</th>
                  <th>dataset_name</th>
                  <th>about_dataset</th>
                  <th>dataset_file</th>
                  <th>usability</th>
                  <th>download_count</th>
                  <th>views</th>
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
                  <td>{{ $data->upsability }}</td>
                  <td>{{ $data->download_count }}</td>
                  <td>{{ $data->views }}</td>
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
