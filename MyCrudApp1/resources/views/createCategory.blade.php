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
    <title>Create new category</title>
</head>
<body>
     <div class="container">
        <div class="flex justify-between">
        <h2 class="text-red-500 text-xl">Create new category</h2>
        <a href="{{ route('categories') }}" class="bg-green-600 text-white rounded py-2 px-4">View all categories</a>

        <a href="/" class="bg-green-600 text-white rounded py-2 px-4">Home</a>
        </div>
        <div>
            <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-5">
                <label for="">Category Name</label>
                <input type="text" name="categoryName" value="{{old('categoryName')}}">
                @error('categoryName')
                <p class="text-red-500">{{$message}}</p>
                @enderror

                <label for="">Type</label>
                <input type="text" name="type" value="{{old('type')}}">
                @error('type')
                <p class="text-red-500">{{$message}}</p>
                @enderror

                <label for="availability">Availability:</label>
                <input type="text" name="availability" value="{{old('availability')}}">
                @error('availability')
                <p class="text-red-500">{{$message}}</p>
                @enderror
                <div>
               <input type="submit" class="bg-green-500 text-white py-2 px-4 rounded">
               </div>
                
                </div>

            </form>
        </div>
    </div>
    
</body>
</html>