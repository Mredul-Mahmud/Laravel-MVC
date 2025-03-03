<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>Product Details</title>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-10">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
            
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Product Details</h2>
                <a href="/" class="bg-blue-600 text-white rounded px-4 py-2 hover:bg-blue-700">Home</a>
            </div>

            <div class="flex flex-col items-center">
                @if($ExProduct->image && file_exists(public_path('images/' . $ExProduct->image)))
                    <img src="{{ asset('images/' . $ExProduct->image) }}" class="w-64 h-64 object-cover rounded-lg shadow-md" alt="Product Image">
                @else
                    <p class="text-red-500 font-semibold">No Image Available</p>
                @endif
            </div>

            <div class="mt-6 space-y-3">
                <p class="text-lg font-semibold text-gray-700">📌 Product Name: <span class="text-gray-900">{{$ExProduct->name}}</span></p>
                <p class="text-lg font-semibold text-gray-700">🆔 Product ID: <span class="text-gray-900">{{$ExProduct->id}}</span></p>
                <p class="text-lg font-semibold text-gray-700">📖 Description: <span class="text-gray-900">{{$ExProduct->description}}</span></p>
                
                <p class="text-lg font-semibold text-gray-700">📂 Category: 
                    <span class="text-gray-900">
                        {{ $ExProduct->category->categoryName ?? 'No Category' }}
                    </span>
                </p>
            </div>

            <div class="mt-6 text-center">
                <a href="/" class="bg-green-600 text-white rounded-lg px-5 py-2 hover:bg-green-700">Go Back</a>
            </div>
        </div>
    </div>

</body>
</html>
