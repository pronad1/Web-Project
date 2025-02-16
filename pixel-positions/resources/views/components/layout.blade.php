<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Position</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div>

        <nav class="flex justify-between items-center p-4">
            <div>
                <a href="">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
                </a>
            </div>

            <div class="flex space-x-4">
                <a href="">Job</a>
                <a href="">Careers</a>
                <a href="">Salaries</a>
                <a href="">Companies</a>
            </div>

            <div>post a job</div>
        </nav>

        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>