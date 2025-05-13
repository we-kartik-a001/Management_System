<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form method="POST"class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md space-y-6">
        @csrf
       <div>
         <label>Enter the teacher name</label>
       </div>

    </form>
</body>

</html>
