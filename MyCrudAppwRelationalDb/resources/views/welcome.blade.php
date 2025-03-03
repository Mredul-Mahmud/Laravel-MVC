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
    <title>Document</title>
</head>
<body>
     <div class="container">
        <div class="flex justify-between">
        <h2 class="text-red-500 text-xl">Homepage</h2>
        <a href="{{ route('categories') }}" class="bg-blue-600 text-white rounded py-2 px-4">View all categories</a>
        </div><br>
        @if(session('success'))
        <h2 class="text-green-600">{{session('success')}}</h2>
        @endif
        <div class="">
          <p class="text-blue-600 text-xl">This is the list of all our products</p>
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
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white-500 uppercase">Description</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white-500 uppercase">Image</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white-500 uppercase">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @foreach($products as $product)
            <tr>
            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
            <a href="{{route('detail', $product->id)}}" class="bg-purple-600 text-white rounded py-2 px-4">Details</a>
    </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$product->id}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$product->name}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$product->description}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><img src="images/{{$product->image}}" width="150px"alt=""></td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
             
              
              <a href="{{ route('edit', ['id' => $product->id]) }}" class="bg-orange-600 text-white rounded py-2 px-4">Edit</a>
              <form method="POST" action="{{route('delete', $product->id)}}">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Delete</button>
              </form>
               <!-- <a href="{{ route('delete', ['id' => $product->id]) }}" class="bg-red-600 text-white rounded py-2 px-4">Delete</a> -->
              
              </td>
            </tr>
            @endforeach
          
          </tbody>
        </table>
        {{$products->links()}}
      </div>
    </div>
  </div>
</div>
        </div>
        <div>
  <a href="/create" class="btn">Add new Product</a>
  </div>
    </div>
    
</body>
</html>