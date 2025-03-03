<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>Category Details</title>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-10">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
            
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Category Details</h2>
                <a href="/" class="bg-blue-600 text-white rounded px-4 py-2 hover:bg-blue-700">Home</a>
            </div>

            <!-- Category Details -->
            <div class="mt-6 space-y-3">
                <p class="text-lg font-semibold text-gray-700">📌 Category Name: <span class="text-gray-900">{{$ExCategory->categoryName}}</span></p>
                <p class="text-lg font-semibold text-gray-700">🆔 Category ID: <span class="text-gray-900">{{$ExCategory->id}}</span></p>
                <p class="text-lg font-semibold text-gray-700">🔖 Type: <span class="text-gray-900">{{$ExCategory->type}}</span></p>
                <p class="text-lg font-semibold text-gray-700">📦 Availability: <span class="text-gray-900">{{$ExCategory->availability}}</span></p>
            </div>

            <!-- Back Button -->
            <div class="mt-6 text-center">
                <a href="/" class="bg-green-600 text-white rounded-lg px-5 py-2 hover:bg-green-700">Go Back</a>
            </div>
        </div>
    </div>

</body>
</html>
