<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;

class PostForm extends Component  implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use WithPagination;

    public $title;
    public $description;
    public $post_id;
    public $image;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
    ];
    public function storePost()
    {
        $this->validate();
        $post = Post::create([
            'title' => $this->title,
            'description' => $this->description
        ]);
        // delay
        sleep(3);
        $this->reset();
        session()->flash('message', 'Post created successfully.');
    }
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\MarkdownEditor::make('description'),
            FileUpload::make("image")->image(),

        ];
    }
    public function render()
    {
        return view('livewire.post-form');
    }
}
