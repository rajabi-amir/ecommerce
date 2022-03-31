<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class TagControll extends Component
{
    public $tag_name;
    public $tag;
    public $is_edit=false;
    public $tags;
    
    public function render()
    {
        $this->tags= Tag::latest()->get();
        return view('livewire.admin.tags.tag-controll');
    }



    public function edit_tag(Tag $tag){

        $this->is_edit=true;
        $this->tag_name=$tag->name;
        $this->tag=$tag;
              
    }

    
    public function del_tag(Tag $tag){
        $tag->delete();
    }

    public function addTag(){

        if($this->is_edit){
          
        $this->tag->update([
        'name'=> $this->tag_name,
        ]);
        $this->is_edit=false;
        $this->tag_name="";
        }
        
        else{
            Tag::create([

                "name" => $this->tag_name,
               ]);
               $this->tag_name="";

        }
      
    }


     public function show(){

        return view('admin.page.tags.create');
     }
}