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
            <form action="/users/{{ $users->user_id }}/edit" method="POST">
            @csrf
            @method('PUT')


            <label class="input input-bordered flex items-center gap-2">
                Display Name
                <input type="text" class="grow" name="display_name" id="display_name" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                Tagline
                <input type="text" class="grow" name="tagline" id="tagline" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                Pronouns
                <input type="text" class="grow" name="pronouns" id="pronouns" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                Occupation
                <input type="text" class="grow" name="occupation" id="occupation" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                Organization
                <input type="text" class="grow" name="organization" id="organization" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                Location
                <input type="text" class="grow" name="location" id="location" />
              </label>

              <textarea class="textarea textarea-bordered w-full" placeholder="bio" name="bio" id="bio">

              </textarea>

              <div class="flex justify-center mt-4">
                <button class="btn btn-info">Edit</button>
              </div>
            </form>
        </div>

        </div>
    </div>

</body>
</html>
