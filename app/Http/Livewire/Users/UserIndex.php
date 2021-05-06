<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name','LIKE','%'.$this->search.'%')
            ->orWhere('email','LIKE','%'.$this->search.'%')
            ->paginate();//default: 15
        return view('livewire.users.user-index', compact('users'));
    }
}
