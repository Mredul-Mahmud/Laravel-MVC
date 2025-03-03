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
            .btn{
                @apply bg-green-600 text-white rounded py-2 px-4
            }
        }
    </style>
    <title>All Categories</title>
</head>
<body>
     <div class="container">
        <div class="flex justify-between">
        <h2 class="text-red-500 text-xl">Categories</h2>
        <a href="/" class="bg-green-600 text-white rounded py-2 px-4">Home</a>
        
        </div><br>
        @if(session('success'))
        <h2 class="text-green-600">{{session('success')}}</h2>
        @endif
        <div class="">
        <div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="border overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 border border-blue-300 my-5">
          <thead class="bg-cyan-600">
            <tr>
            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white-500 uppercase"></th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white-500 uppercase">Id</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white-500 uppercase">Name</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white-500 uppercase">Type</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white-500 uppercase">Availability</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white-500 uppercase">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
          @foreach($categories as $category)
            <tr>
            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
            <a href="{{route('categories.detail', $category->id)}}" class="bg-purple-600 text-white rounded py-2 px-4">Details</a>
    </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$category->id}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$category->categoryName}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$category->type}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$category->availability}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
             
              
              <a href="{{ route('categories.edit', $category->id) }}" class="bg-orange-600 text-white rounded py-2 px-4">Edit</a>
              <form method="POST" action="{{ route('categories.delete', $category->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Delete</button>
              </form>
               <!-- <a href="{{ route('delete', ['id' => $category->id]) }}" class="bg-red-600 text-white rounded py-2 px-4">Delete</a> -->
              
              </td>
            </tr>
            @endforeach
          
          </tbody>
        </table>
        {{$categories->links()}}
      </div>
    </div>
  </div>
</div>
        </div>
        <div>
        <a href="{{ route('categories.create') }}" class="bg-green-600 text-white rounded py-2 px-4">Add new category</a>
        </div>
    </div>
    
</body>
</html>