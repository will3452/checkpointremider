<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-green-100">
    <div class="shadow mx-2 rounded p-4 w-full bg-white">
        <h1 class="text-2xl font-bold uppercase text-green-900">Register</h1>
        <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
                <label for="" class="text-sm font-bold text-gray-800">
                    Profile Image
                </label>
                <input type="file" accept="image/*" name="picture" required class="block w-full border border-green-600 rounded p-2 placeholder-green-200" >
                @error('picture')
                    <small class="text-xs font-bold text-red-500">{{$message}}</small>
                @enderror
            </div>
            <div class="mt-4">
                <label for="" class="text-sm font-bold text-gray-800">
                    Mobile No.
                </label>
                <input type="text" name="mobile_number"  required class="block w-full border border-green-600 rounded p-2 placeholder-green-200" placeholder="09XXXXXXXXX">
                @error('mobile_number')
                    <small class="text-xs font-bold text-red-500">{{$message}}</small>
                @enderror
            </div>
            <div class="mt-4">
                <label for="" class="text-sm font-bold text-gray-800">
                    Name
                </label>
                <input type="text" name="name" required class="block w-full border border-green-600 rounded p-2 placeholder-green-200" placeholder="Dennis Amurao">
            </div>
            <div class="mt-4">
                <label for="" class="text-sm font-bold text-gray-800">
                    Email
                </label>
                <input type="email" name="email" required class="block w-full border border-green-600 rounded p-2 placeholder-green-200" placeholder="denis.pogi@gmail.com">
                @error('email')
                    <small class="text-xs font-bold text-red-500">{{$message}}</small>
                @enderror
            </div>
            <div class="mt-4">
                <label for="" class="text-sm font-bold text-gray-800">
                    Password
                </label>
                <input type="password" name="password" required class="block w-full border border-green-600 rounded p-2 placeholder-green-200" placeholder="********">
                @error('password')
                    <small class="text-xs font-bold text-red-500">{{$message}}</small>
                @enderror
            </div>
            <div class="mt-4">
                <button class="text-center p-2 rounded bg-green-600 font-bold uppercase text-white">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
