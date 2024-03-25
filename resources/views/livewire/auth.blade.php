<div class="container m-5 pt-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-4 text-lg font-bold">Login</h2>
            <form class="form" wire:submit.prevent='login'>
                <input wire:model='email' type="email" class="py-1 px-2 border bg-slate-200 rounded-lg"
                    placeholder="Your email">
                <input wire:model='password' type="password" class="py-1 px-2 border bg-slate-200 rounded-lg"
                    placeholder="Your password">
                <button class="mt-3 py-1 px-2 bg-blue-600 rounded-lg border text-white font-semibold"
                    type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
