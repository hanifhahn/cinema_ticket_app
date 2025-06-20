<nav class="bg-white shadow mb-4 p-4">
    <div class="flex justify-between">
        <div>
            <a href="{{ url('/') }}" class="font-bold text-lg">🎬 Bioskop App</a>
        </div>
        <div>
            @auth
                <span>{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="ml-2 text-red-500">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>