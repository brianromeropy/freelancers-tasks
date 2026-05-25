<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-xl font-bold text-slate-900">Iniciar sesión</h1>
        <p class="mt-1.5 text-sm text-slate-500">
            Accede con tu apellido y contraseña del equipo
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="apellido" value="Apellido"
                           class="text-slate-700 font-medium" />
            <x-text-input id="apellido"
                          class="block mt-1.5 w-full rounded-lg border-slate-200 bg-slate-50/80 px-4 py-2.5 text-slate-900 shadow-inner placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-200/60 focus:bg-white transition"
                          type="text"
                          name="apellido"
                          :value="old('apellido')"
                          required
                          autofocus
                          autocomplete="family-name"
                          placeholder="Ej: Romero" />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>

        <div class="mt-5">
            <x-input-label for="password" :value="__('Password')"
                           class="text-slate-700 font-medium" />

            <x-text-input id="password"
                          class="block mt-1.5 w-full rounded-lg border-slate-200 bg-slate-50/80 px-4 py-2.5 text-slate-900 shadow-inner placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-200/60 focus:bg-white transition"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password"
                          placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-8">
            <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-lg border border-transparent bg-[#0f172a] px-4 py-3 text-sm font-semibold uppercase tracking-wider text-white shadow-md shadow-slate-900/20 transition duration-200 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 active:bg-slate-950">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
