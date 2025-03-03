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
        <h2 class="text-red-500 text-xl">Create</h2>

        <a href="/" class="bg-green-600 text-white rounded py-2 px-4">Home</a>
        </div>
        <div>
            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-5">
                <label for="">Name</label>
                <input type="text" name="name" value="{{old('name')}}">
                @error('name')
                <p class="text-red-500">{{$message}}</p>
                @enderror

                <label for="">Description</label>
                <input type="text" name="description" value="{{old('description')}}">
                @error('description')
                <p class="text-red-500">{{$message}}</p>
                @enderror

                <!-- <label for="">Category Id</label>
                <input type="text" name="catId" value="{{old('catId')}}">
                @error('catId')
                <p class="text-red-500">{{$message}}</p>
                @enderror -->

                <label for="category">Category:</label>
                <select name="catId" id="catId" required>
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                @endforeach
                </select>

                <label for="">Select Image</label>
                <input type="file" name="image" >
                @error('image')
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