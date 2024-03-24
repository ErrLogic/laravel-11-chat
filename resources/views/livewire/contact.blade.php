<div class="container m-5 pt-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">Contact</h2>
            @foreach ($contacts as $contact)
                <button class="p-2 bg-yellow-500 border"
                    wire:click.prevent="chat({{ $contact }})">{{ $contact->name }}</button>
            @endforeach
        </div>
    </div>
</div>
