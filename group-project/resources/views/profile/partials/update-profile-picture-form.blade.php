<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Upload a profile picture of your choosing.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.upload') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div class="mt-4 card-body">
            <input type="file" name="avatar" />
            <x-primary-button>{{ __('Upload') }}</x-primary-button>
            @if (session('status') === 'avatar-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
