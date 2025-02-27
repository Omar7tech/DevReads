<div class="min-h-screen flex items-center justify-center bg-gray-900"> <!-- Dark background -->
    <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md border border-gray-700"> <!-- Dark card -->
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Login</h2> <!-- White text -->

        @if (session('error'))
            <div class="bg-red-900 border border-red-700 text-red-300 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form wire:submit.prevent="login">
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-gray-300 text-sm font-bold mb-2">Email</label>
                <input
                    wire:model="email"
                    type="email"
                    id="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 bg-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your email"
                >
                @error('email')
                    <span class="text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="mb-6">
                <label for="password" class="block text-gray-300 text-sm font-bold mb-2">Password</label>
                <input
                    wire:model="password"
                    type="password"
                    id="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 bg-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your password"
                >
                @error('password')
                    <span class="text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300"
                >
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
