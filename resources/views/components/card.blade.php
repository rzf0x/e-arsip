<div class="card shadow-lg">
    <div class="card-header">
        <h5 class="text-center">{{ $title }}</h5>
    </div>
    <div class="card-body text-center">
        <a href="{{ $route }}">
            <button class="btn btn-primary">
                {{ $buttonText }}
            </button>
        </a>
        <br><br>
        <small>{{ $footerText }}</small>
    </div>
</div>
