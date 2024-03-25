<div class="container m-5 pt-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-4 text-lg font-bold">Send Message</h2>
            <div class="flex flex-row gap-3 items-center">
                @if ($status == 'Offline')
                    <div class="w-3 h-3 bg-red-500 rounded-full border border-red-600">
                    </div>
                @else
                    <div class="w-3 h-3 bg-green-500 rounded-full border border-green-600">
                    </div>
                @endif
                <span class="font-semibold">{{ 'You' . ' ' . $status }}</span>
            </div>
            <div class="flex flex-row gap-3 items-center mt-2">
                @if ($friendStatus == 'Online')
                    <div class="w-3 h-3 bg-green-500 rounded-full border border-green-600">
                    </div>
                    <span class="font-semibold">{{ $friendName . ' ' . $friendStatus }}</span>
                @endif
            </div>
            <form class="form" wire:submit.prevent='triggerEvent'>
                <input wire:model='message' type="text" class="py-1 px-2 border bg-slate-200 rounded-lg"
                    placeholder="Your message">
                <button class="mt-3 py-1 px-2 bg-blue-600 rounded-lg border text-white font-semibold"
                    type="submit">Submit</button>
            </form>
            <div class="flex gap-2">
                <button class="mt-3 py-1 px-2 bg-green-600 rounded-lg border text-white font-semibold"
                    wire:click.prevent="back">Back</button>
                <button class="mt-3 py-1 px-2 bg-red-600 rounded-lg border text-white font-semibold"
                    wire:click.prevent="logout">Logout</button>
            </div>
        </div>
    </div>
</div>
