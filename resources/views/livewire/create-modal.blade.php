<div class="mb-2 flex justify-end">
    <button wire:click="toggleModal" class="p-2 px-12 bg-green-500 hover:bg-green-700 rounded-xl ml-auto text-white">
        <span class="font-semibold">Add Book</span>
    </button>
    <div
        class="fixed flex transition-all duration-200 ease-in {{ $open ? "scale-100 opacity-100" : "scale-0  opacity-0" }} justify-center p-2 md:p-64 items-center inset-0 h-screen bg-zinc-500/10 w-full">
        <div class="bg-white p-5 text-black w-full rounded-lg shadow-lg">
            <div class="flex justify-between mb-5">
                <span class="font-bold text-2xl">{{ $edit ? "Edit Book" : "Add Book" }}</span>
                <button class="hover:scale-90" wire:click="toggleModal">
                    <i class="fa fa-times text-3xl" aria-hidden="true"></i>
                </button>
            </div>

            <form class="flex flex-col" wire:submit.prevent="{{ $edit ? "update" : "create" }}" action="">
                <label for="title">Title</label>
                <input wire:model="title" class="border-2 text-sm rounded-lg p-2" type="text" name="title" id="">
                <label for="author">Author</label>
                <input wire:model="author" class="border-2 text-sm rounded-lg p-2" type="text" name="author" id="">
                <label for="synopsis">Synopsis</label>
                <textarea wire:model="synopsis" class="border-2 text-sm rounded-lg p-2" name="synopsis"
                    id=""></textarea>

                <input class="p-2 mt-12 rounded-lg text-white font-bold bg-green-600 hover:bg-green-800" type="submit"
                    value="{{ $edit ? "Save" : "Add" }}">
            </form>
        </div>
    </div>

</div>