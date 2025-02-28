<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://unpkg.com/@tailwindcss/browser@4"></script> -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
        @layer utilities{
            .container{
                @apply px-10 mx-auto;
            }
        }
    </style>
    <title>Create new product</title>
</head>
<body>
     <div class="container">
        <div class="flex justify-between">
        <h2 class="text-red-500 text-xl">Edit</h2>

        <a href="/" class="bg-green-600 text-white rounded py-2 px-4">Home</a>
        </div>
        <div>
            <div>
            <img src="{{ asset('images/' . $ExProduct->Image) }}" width="150px"  margin-bottom:20pxalt="Product Image">

        </div>
             <h3 class="text-blue-700">Product Name:{{$ExProduct->name}}</h3>
             <h3 class="text-blue-500">Product Id:{{$ExProduct->id}}</h3>
             <h3 class="text-blue-500">Description:{{$ExProduct->description}}</h3>
            
        </div>
    </div>
    
</body>
</html>