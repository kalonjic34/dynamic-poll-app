<?php

use Livewire\Component;
use App\Models\Option;

new class extends Component
{
    protected $listeners = [
        'pollCreated' => 'render'
    ];

    public function render()
    {
        $polls = \App\Models\Poll::with('options.votes')->latest()->get();
        return view('components.polls', ['polls' => $polls]);
        }

        public function vote(Option $option){
            $option->votes()->create();
        }
}
?>

<div>
    @forelse ($polls as $poll)
        <div class="mb-4">
            <h3 class="mb-4 text-xl">{{ $poll->title }}</h3>
                @foreach ( $poll->options as $option)
                    <div class="mb-2">
                        <button class="btn" wire:click="vote({{ $option->id }})">Vote</button>
                        {{ $option->name }} ({{ $option->votes->count() }})
                    </div>
                @endforeach
        </div>
    @empty
        <div class="text-gray-500">
            No polls available
        </div>
    @endforelse
</div>