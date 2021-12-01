<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-green-100">
    <div class="shadow mx-auto rounded p-4 md:w-1/2 w-full bg-white h-screen">
        <div class="p-4 rounded shadow">
            <h2 class="text-lg font-bold">Checkpoint Details</h2>
            <div>
                Description :  {{$checkpoint->description}}
            </div>
            <div>
                Coordinates:  {{$checkpoint->lat}}, {{$checkpoint->long}}
            </div>
            <div>
                Ratings: {{$checkpoint->average_star}}
            </div>
            <div>
                <h3 class="font-bold">List of requirements: </h3>
                <ul>
                    @foreach ($checkpoint->requirements as $requirement)
                        <li class="p-2 rounded my-1 shadow">
                            {{$requirement->description}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <h4 class="my-2 text-center font-bold">
            Reviews
        </h4>
        <div class="h-1/3 border overflow-y">
            @forelse ($checkpoint->reviews as $item)
                <div class="p-2 shadow rounded my-2">
                    <h4>
                        {{$item->user->name}}
                    </h4>
                    <div>
                        {{$item->start}} {{$item->star > 1 ? 'stars' : 'star'}}
                    </div>
                    <div class="">
                        {{$item->comment}}
                    </div>
                </div>
            @empty
            <div class="p-2 text-center rounded bg-gray-100">
                No Reviews
            </div>
            @endforelse
        </div>
        <form action="" class="h-50 p-2 shadow rounded mt-4 ">
            <div>
                <label for="">
                    Star
                </label>
                <select name="star" id="" class="w-full block border rounded" required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Star</option>
                    <option value="3">3 Star</option>
                    <option value="4">4 Star</option>
                    <option value="5">5 Star</option>
                </select>
                <textarea name="comment" id="" maxlength="200" class=" border roundedw-full block" required></textarea>
                <button class="bg-green-300 text-white p-1 px-3 rounded">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>
</html>
