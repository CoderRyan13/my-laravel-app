<x-layout>
    <div class="card px-4 py-2 mx-auto w-50">
        <h1 class="mb-4 font-bold fs-4">Please verify your email through the email we've sent you.</h1>
        <p class="mb-3">Didn't get the email?</p>
        <form action="{{ route('verification.send') }}" method="post">
            @csrf
            <button class="btn rounded bg-green-500">Send again</button>
        </form>
    </div>
    
</x-layout>