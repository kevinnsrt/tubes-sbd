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
            <form action="/create/datasets" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="input input-bordered flex items-center gap-2">
                Datasets Name
                <input type="text" class="grow" name="dataset_name" id="dataset_name" />
              </label>


              <div class="block gap-4">

              <input type="text" name="dataset_file" id="dataset_file" class="file-input file-input-bordered w-full max-w-xs" />

              </div>
              <textarea class="textarea textarea-bordered w-full" placeholder="About" name="about_dataset" id="about_dataset">

              </textarea>

              <div class="flex justify-center mt-4">
                <button class="btn btn-info">Create</button>
              </div>

        </div>

        </div>
    </div>

</body>
</html>
