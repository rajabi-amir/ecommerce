<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;


class TagControll extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tag_name;
    public $tag;
    public $is_edit=false;
    public $display;

    public function ref()
    {
        $this->is_edit=false;
        $this->reset("tag_name");
        $this->reset("display");
        $this->resetValidation();
    }


    public function render()
    {
        return view('livewire.admin.tags.tag-controll',['tags'=>Tag::latest()->paginate(10)]);
    }


    public function edit_tag(Tag $tag)
    {
        $this->is_edit=true;
        $this->tag_name=$tag->name;
        $this->tag=$tag;
        $this->display="disabled";
    }



    public function del_tag(Tag $tag){

        try {

            $tag->delete();

          } catch (\Exception $e) {

            redirect('admin.tags.create');
         }




    }

    public function addTag(){

        if($this->is_edit){

          $this->validate([
            'tag_name' => 'required|unique:tags,name,'.$this->tag->id
          ]);

        $this->tag->update([
        'name'=> $this->tag_name,
        ]);
        $this->is_edit=false;
        $this->reset("tag_name");
        $this->reset("display");


        }

        else{
            $this->validate([
                'tag_name' => 'required|unique:tags,name'
              ]);
            Tag::create([

                "name" => $this->tag_name,
               ]);
               $this->reset("tag_name");


        }


    }


     public function show(){

        return view('admin.page.tags.create');
     }
}
