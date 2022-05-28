<?php
namespace App\Http\Livewire\Admin\Comments;
use App\Models\Comment;
use Livewire\Component;

class CommentsList extends Component
{
public $title;
public $comment;
protected $listeners = [
    'sweetAlertConfirmed', // only when confirm button is clicked
];

public function mount(Comment $comment)
{ 
    if($comment->approved){
      
           $this->title="عدم انتشار";
           $this->color="danger";

    }else{
       
           $this->title="انتشار";
           $this->color="success";

        }
}
      
            public function render()
            {
                return view('livewire.admin.comments.comments-list',['comments' => Comment::latest()->paginate(10)]);
            }
            
    public function delcomment(Comment $comment){

      $this->comment=$comment;
        sweetAlert()
        ->livewire()
        ->showDenyButton(true,'انصراف')->confirmButtonText("تایید")
        ->addInfo('از حذف رکورد مورد نظر اطمینان دارید؟');
       
    }

   public function ChengeActive_comment (Comment $comment){
       

    if($comment->approved){
        $comment->update([
            "approved"=> false
           ]);
           $this->title="عدم انتشار";
           $this->color="danger";

    }else{
        $comment->update([
            "approved"=> true
           ]);
           $this->title="انتشار";
           $this->color="success";

        }
        
     }
     
     public function sweetAlertConfirmed(array $data)
     { 
        
        $this->comment->delete();
             toastr()->livewire()->addSuccess('نظر با موفقیت حذف شد');
     }



}