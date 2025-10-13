<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('mailtitle') </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-800 bg-gray-100">
    <header class="bg-cover bg-center h-52 flex items-center justify-center" style="background-image: url('https://i.imgur.com/tDr5hdQ.jpeg');">
        <img src="https://i.imgur.com/Q1Bqa4B.png" alt="Logo" class="w-12 h-12 mr-4">
        {{-- <h1 class="text-white text-3xl font-bold">CAR EXPRESS</h1> --}}
    </header>

    @yield('contentmail')

    <footer class="bg-gray-200 text-center p-6">
        <h2 class="text-xl font-semibold mb-4">Nous Contacter</h2>
        <div class="flex flex-wrap justify-around">
            <div class="w-48 bg-white p-4 border border-gray-300 rounded mb-4">
                <h3 class="text-lg font-semibold mb-2">Site Web</h3>
                <a href="#" class="text-blue-500 hover:underline">www.example.com</a>
            </div>
            <div class="w-48 bg-white p-4 border border-gray-300 rounded mb-4">
                <h3 class="text-lg font-semibold mb-2">E-mail</h3>
                <p><a href="mailto:bm.service021@gmail.com" class="text-blue-500 hover:underline">bm.service021@gmail.com</a></p>
            </div>
            <div class="w-48 bg-white p-4 border border-gray-300 rounded mb-4">
                <h3 class="text-lg font-semibold mb-2">Location</h3>
                <p>Tunisie, Tunis, El Ghazela</p>
            </div>
            <div class="w-48 bg-white p-4 border border-gray-300 rounded mb-4">
                <h3 class="text-lg font-semibold mb-2">Contact</h3>
                <p>+216 48 18 20 52</p>
            </div>
        </div>
    </footer>
</body>
</html>
