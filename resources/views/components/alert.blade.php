<div class="px-4 pt-4">
    @if ($message = session()->has('succes'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="text-white mb-0">{{ session()->get('succes') }}</p>
        </div>
    @endif
    @if ($message = session()->has('error'))
        <div class="alert alert-danger" role="alert">
            <p class="text-white mb-0">{{ session()->get('error') }}</p>
        </div>
    @endif
    @if (session()->has('error-password'))
        <div class="alert alert-danger" role="alert">
            <p class="text-white mb-0">{{ session()->get('error-password') }}</p>
        </div>
    @endif
    @if ($message = session()->has('success-profile'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="text-white mb-0">{{ session()->get('success-profile') }}</p>
        </div>
    @endif
    @if (session()->has('current-password'))
        <div class="alert alert-danger" role="alert">
            <p class="text-white mb-0">{{ session()->get('current-password') }}</p>
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <p class="text-white mb-0">{{ $error }}</p>
            </div>
        @endforeach
    @endif
    @if ($message = session()->has('success-password'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="text-white mb-0">{{ session()->get('success-password') }}</p>
        </div>
    @endif
</div>
