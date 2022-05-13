<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'نظر ها',
    ];

    public $answer = '';
    public $search = '';
    public function render()
    {
        $comments = Comment::query()
            ->whereNull('admin_id');
        if(!empty($this->search))
        {
            $comments = $comments->where('title', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $comments = $comments->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.comments.index', [
            'comments' => $comments,
        ])->with('pageInfo', $this->pageInfo);
    }

    public function decline($id)
    {
        $comment = Comment::query()
            ->findOrFail($id);

        $comment->verified_at = null;
        $comment->save();
        session()->flash('message', 'نظر با موفقیت ویرایش شد.');
        redirect()->route('admin.comments.index');
    }

    public function accept($id)
    {
        $comment = Comment::query()
            ->findOrFail($id);

        $comment->verified_at = Carbon::now();
        $comment->save();
        session()->flash('message', 'نظر با موفقیت ویرایش شد.');
        redirect()->route('admin.comments.index');
    }

    public function answer($id)
    {
        $comment = Comment::query()
            ->findOrFail($id);

        Comment::query()
            ->where('parent_id', $comment->id)
            ->delete();

        $answerComment = Comment::query()
            ->create([
                'parent_id' => $comment->id,
                'admin_id' => auth()->user()->id,
                'body' => $this->answer,
                'commentable_id' => $comment->commentable_id,
                'commentable_type' => $comment->commentable_type,
            ]);

        session()->flash('message', 'نظر با موفقیت ویرایش شد.');
        redirect()->route('admin.comments.index');
    }
}
