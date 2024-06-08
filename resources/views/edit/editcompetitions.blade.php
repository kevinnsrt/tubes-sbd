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
            <form action="/competitions{{ $competitions->competition_id }}/edit" method="POST">
            @csrf
            @method('PUT')

            <label class="input input-bordered flex items-center gap-2">
                ref
                <input type="text" class="grow" name="ref" id="ref" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                competition_name
                <input type="text" class="grow" name="competition_name" id="competition_name" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                start_date
                <input type="text" class="grow" name="start_date" id="start_date" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                end_date
                <input type="text" class="grow" name="end_date" id="end_date" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                prize_amount
                <input type="text" class="grow" name="prize_amount" id="prize_amount" />
              </label>

              <textarea class="textarea textarea-bordered w-full" placeholder="Description" name="description" id="description">

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
