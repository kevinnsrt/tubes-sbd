<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="mt-56">

        <div class="flex justify-center">
            <form action="/model/{{ $model->id }}/edit" method="POST">
                @csrf
                @method('PUT')

            <label class="input input-bordered flex items-center gap-2">
                Title
                <input type="text" class="grow" name="model_title" id="model_title" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                Author
                <input type="text" class="grow" name="author" id="author" />
              </label>

              <label class="input input-bordered flex items-center gap-2">
                url
                <input type="text" class="grow" name="url" id="url" />
              </label>

              <textarea class="textarea textarea-bordered w-full" placeholder="Description" name="description" id="description">

              </textarea>

              <div class="flex justify-center mt-4">
                <button class="btn btn-info">Create</button>
              </div>
            </form>
        </div>

        </div>
    </div>


</body>
</html>
