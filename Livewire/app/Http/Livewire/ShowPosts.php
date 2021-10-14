<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search,$post,$image, $identificador,$cant=10;
    public $open_edit = false;
    public $sort = "id";
    public $direction = "desc";
    public $readyToLoad = false;


    protected $listeners = ['render'=>'render','delete'=>'delete'];
    protected $rules = [
        'post.title' => 'required',
        'post.content'=>'required',
    ];
    protected $queryString = [
        'cant',
        'search',
        'sort',
        'direction',
    ];
    public function updatingSearch(){
        $this->resetPage();
    }
    public function mount(){
        $this->identificador = rand();
        $this->post = new Post();
    }
    public function render(){
        if($this->readyToLoad){
            $posts = Post::where('title','LIKE','%'.$this->search.'%')
                ->orderBy($this->sort,$this->direction)
                ->orWhere('content','LIKE','%'.$this->search.'%')->paginate($this->cant);
        }else{
            $posts = [];
        }
        return view('livewire.show-posts',compact('posts'));
    }
    public function loadPosts(){
        $this->readyToLoad=true;
    }
    public function order($sort){
        if($this->sort==$sort){
            if($this->direction=='desc'){
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }
        }else{
            $this->sort = $sort;
            $this->direction = 'desc';
        }
    }
    public function edit(Post $post){
        $this->post = $post;
        $this->open_edit = true;
    }
    public function update(){
        $this->validate();
        if($this->image){
            Storage::delete($this->post->image);
            $this->post->image = $this->image->store('posts');
        }
        $this->post->save();
        $this->reset(['open_edit','image']);
        $this->identificador = rand();
        $this->emit('alert');
    }
    public function delete(Post $post){
        Storage::delete($post->image);
        $post->delete();
    }
}
