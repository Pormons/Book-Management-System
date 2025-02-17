<div class=" w-full h-full border-2 border-white bg-white p-4 rounded-xl">
   <div class="overflow-x-auto">
      <table class="w-full table-auto bg-white border-collapse border border-gray-300 mb-5">
         <thead>
            <tr class="bg-gray-100">
               <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Title</th>
               <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Author</th>
               <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Synopsis</th>
               <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Actions</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($books as $book)
            <tr class="border-t border-gray-300">
               <td class="px-4 py-2 text-sm text-gray-800">{{ $book->title }}</td>
               <td class="px-4 py-2 text-sm text-gray-800">{{ $book->author }}</td>
               <td class="px-4 py-2 text-sm text-gray-800">{{ $book->synopsis }}</td>
               <td class="px-4 py-2 text-sm text-gray-800 flex gap-5">
                 <button wire:click="delete({{ $book->id }})"
                   wire:confirm="Are you sure you want to delete this book?">
                   <i class="fa fa-trash-o text-2xl text-red-600" aria-hidden="true"></i>
                 </button>
                 <button wire:click="edit({{ $book->id }})">
                   <i class="fa fa-pencil-square-o text-2xl text-yellow-400" aria-hidden="true"></i>
                 </button>
               </td>
            </tr>
         @endforeach
         </tbody>
      </table>
      {{ $books->links() }}
   </div>
</div>