<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('ideas.index')) ? 'text-white bg-primary rounded p-2' : ''}}" href="{{ route('ideas.index') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('feed')) ? 'text-white bg-primary rounded p-2' : ''}}" href="{{ route('feed') }}">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('terms')) ? 'text-white bg-primary rounded p-2' : ''}}" href="{{ route('terms') }}">
                    <span>Terms & Conditions</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="{{ (Route::is('profile')) ? 'bg-black text-white p-2 rounded' : "btn btn-link btn-sm"}}" href="{{ route('profile') }}">View Profile </a>
    </div>
</div>
