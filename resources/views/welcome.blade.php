<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de APIs</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        <api-list></api-list> <!-- Aqui o Vue irá montar o componente -->
    </div>

    <script type="module" src="{{ asset('resources/js/app.js') }}"></script>
</body>
</html>
