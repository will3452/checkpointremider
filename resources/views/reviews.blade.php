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
    <div class="shadow mx-auto rounded p-4 md:w-1/2 w-full bg-white">
        <div class="p-4 rounded shadow">
            <h2 class="text-lg font-bold text-gray-500 font-bold">Checkpoint Details</h2>
            <div>
                Description :  {{$checkpoint->description}}
            </div>
            <div>
                Coordinates:  {{$checkpoint->lat}}, {{$checkpoint->long}}
            </div>
            <div>
                <h3>List of requirements: </h3>
                <ul>
                    @foreach ($checkpoint->requirements as $requirement)
                        <li class="p-2 rounded my-1 shadow">
                            {{$requirement->description}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
