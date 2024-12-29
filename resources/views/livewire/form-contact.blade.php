<div class="card p-5">
    <form wire:submit="newContact">

        @csrf
        
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" wire:model="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" wire:model="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="phone" class="form-control" id="phone" wire:model="phone">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="text-end">
            <button class="btn btn-secondary px-5">Save</button>
        </div>
            
    </form>
</div>
