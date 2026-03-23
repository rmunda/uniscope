<x-guest-layout>
    <div class="page page-center">
        <div class="container container-tight py-4">

            {{-- Logo --}}
            <div class="text-center mb-4">
                <a href="/" class="navbar-brand">
                    <strong>SchoolERP</strong>
                </a>
            </div>

            <div class="card card-md">
                <div class="card-body">

                    <h2 class="h2 mb-4">
                        Login to your account
                    </h2>

                    {{-- Session Status --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    {{-- Form --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" 
                                   class="form-control" 
                                   placeholder="Enter email" required autofocus>
                        </div>

                        {{-- Password --}}
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                                <span class="form-label-description">
                                    <a href="{{ route('password.request') }}">
                                        I forgot password
                                    </a>
                                </span>
                            </label>

                            <input type="password" name="password" 
                                   class="form-control" 
                                   placeholder="Password" required>
                        </div>

                        {{-- Remember --}}
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input"/>
                                <span class="form-check-label">Remember me</span>
                            </label>
                        </div>

                        {{-- Submit --}}
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">
                                Sign in
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            {{-- Register --}}
            <!-- <div class="text-center text-muted mt-3">
                Don’t have account yet?
                <a href="{{ route('register') }}">Sign up</a>
            </div> -->

        </div>
    </div>
</x-guest-layout>