<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Job;

class JobsList extends Component
{
    use WithPagination;

    public $search = '';
    public $type = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $jobs = Job::query()
            ->when($this->search, function($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('description', 'like', '%'.$this->search.'%');
            })
            ->when($this->type, function($query) {
                $query->where('type', $this->type);
            })
            ->paginate(10);

        return view('livewire.jobs-list', [
            'jobs' => $jobs
        ]);
    }
}

