<div class="container m-5 pt-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">Login</h2>
            <form class="form" wire:submit.prevent='login'>
                <input wire:model='email' type="email" class="form-control" placeholder="Your email">
                <input wire:model='password' type="password" class="form-control" placeholder="Your password">
                <button class="mt-3 p-2 bg-blue-600 rounded-lg border" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
