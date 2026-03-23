<x-app-layout>

    <h1 class="mb-4">Dashboard</h1>

    <div class="card">
        <div class="card-body">
            Welcome, {{ Auth::user()->name }} 👋
        </div>
    </div>

</x-app-layout>