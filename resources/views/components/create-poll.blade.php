<?php

use Livewire\Component;
use App\Models\Poll;

new class extends Component
{
    public $title;
    public $options=['First'];

    protected $rules =[
        'title'=>'required|min:3|max:255',
        'options'=>'required|array|min:1|max:10',
        'options.*'=>'required|min:1|max:255',
    ];

    protected $messages =[
        'options.*' => 'The option cant be empty.'
    ];

    public function render(){
        return view('create-poll');
    }
    public function addOption(){
        $this->options[]='';
    }

    public function removeOption($index){
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function createPoll(){
        $this->validate();
        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            collect($this->options)->map(fn ($option)=>['name'=>$option])
            ->all()
        );
        // foreach ($this->options as $optionName) {
        //     $poll->options()->create(['name'=>$optionName]);
        // }

        $this->reset(['title','options']);

        $this->dispatch('pollCreated');
        
    }

};
?>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-200/60">
    <div class="border-b border-slate-100 bg-slate-50/70 px-6 py-6 sm:px-8">
        <p class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-cyan-700">Poll builder</p>
        <h1 class="text-2xl font-bold tracking-tight text-slate-900">Create a new poll</h1>
        <p class="mt-1 text-sm text-slate-500">Give people a clear question and a few choices.</p>
    </div>

    <form wire:submit.prevent="createPoll" action="" class="space-y-7 px-6 py-6 sm:px-8 sm:py-8">
        <div>
            <label for="poll-title">Poll title</label>
            <input id="poll-title" type="text" wire:model="title" placeholder="What should we decide?" />

            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <div class="mb-3 flex items-end justify-between gap-4">
                <div>
                    <label class="mb-0" for="poll-option-0">Options</label>
                    <p class="mt-1 text-sm text-slate-500">Add at least two choices.</p>
                </div>
                <button type="button" class="btn btn-secondary shrink-0" wire:click.prevent="addOption">
                    <span class="mr-1 text-base leading-none">+</span> Add option
                </button>
            </div>

            <div class="space-y-3">
            @foreach ($options as $index =>$option )
                <div class="flex items-center gap-3">
                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-cyan-50 text-sm font-bold text-cyan-700">{{ $index + 1 }}</span>
                    <input id="poll-option-{{ $index }}" type="text" wire:model="options.{{ $index }}" placeholder="Option {{ $index + 1 }}" />
                   
                    <button type="button" class="btn btn-remove px-2" wire:click.prevent="removeOption({{ $index }})" aria-label="Remove option {{ $index + 1 }}" title="Remove option">x</button>
                </div>
                 @error('options.' . $index)
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            @endforeach
            </div>

            <button class="btn" type="submit">Create Poll</button>
            
        </div>

    </form>
</div>