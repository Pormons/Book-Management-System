<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateModal extends Component
{
    public $open = false, $edit = false;

    public $title, $author, $synopsis;

    public $id;

    public function render()
    {
        return view('livewire.create-modal');
    }

    public function toggleModal()
    {
        $this->open = !$this->open;

        if (!$this->open) {
            $this->reset(['title', 'author', 'synopsis', 'id', 'edit']);
        }
    }

    #[On('edit')]
    public function editBook($id)
    {
        $this->edit = true;
        $book = Book::find($id);
        $this->id = $book->id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->synopsis = $book->synopsis;
        $this->toggleModal();
    }

    public function create()
    {

        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
        ]);

        Book::create($validatedData);

        $this->dispatch('refresh-table');
        $this->toggleModal();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
        ]);
        $book = Book::findOrFail($this->id);

        if ($book) {
            $book->update($validatedData);
            $this->dispatch('refresh-table');
            $this->toggleModal();
        }
    }
}
