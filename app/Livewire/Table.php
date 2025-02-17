<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    #[On('refresh-table')]
    public function refresh()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Book::destroy($id);
        $this->refresh();
    }

    public function edit($id)
    {
        $this->dispatch('edit', id: $id);
    }

    public function render()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.table', [
            'books' => $books
        ]);
    }
}
