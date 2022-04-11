<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Attribute;
use Livewire\Component;
use Livewire\WithPagination;

class AttributeList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $attribute_name;
    public $attribute;
    public $is_edit = false;
    public $display;

    public function ref()
    {
        $this->is_edit = false;
        $this->reset("attribute_name");
        $this->reset("display");
        $this->resetValidation();

    }

    public function edit_attribute(Attribute $attribute)
    {

        $this->is_edit = true;
        $this->attribute_name = $attribute->name;
        $this->attribute = $attribute;
        $this->display = "disabled";
    }

    public function del_attribute(Attribute $attribute)
    {
        try {
            $attribute->delete();
        } catch (\Exception $e) {
            redirect('admin.attributes.create');
        }
    }

    public function addAttribute()
    {

        if ($this->is_edit) {

            $this->validate([
                'attribute_name' => 'required|string|max:50|unique:attributes,name,'.$this->attribute->id
            ],[],['attribute_name'=>'عنوان']);

            $this->attribute->update([
                'name' => $this->attribute_name,
            ]);
            $this->is_edit = false;
            $this->reset("attribute_name");
            $this->reset("display");
        } else {
            $this->validate([
                'attribute_name' => 'required|string|max:50|unique:attributes,name'
            ],[],['attribute_name'=>'عنوان']);
            Attribute::create([

                "name" => $this->attribute_name,
            ]);
            $this->reset("attribute_name");
        }
    }

    public function render()
    {
        return view('livewire.admin.attributes.attribute-list',['attributes'=>Attribute::latest()->paginate(10)]);
    }
}
