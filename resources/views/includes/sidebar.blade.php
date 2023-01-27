<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <ul class="sidebar-nav" style="font-family: 'Kanit', sans-serif; font-size:16px;">

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('published-books.index') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="align-middle fw-bold">Published Books</span>
                </a>
            </li>
            @if(Auth::user()->type == 'Author')
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('books.index') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="align-middle fw-bold">My Books</span>
                </a>
            </li>
            @endif
            <li class="sidebar-item">
                <form action="{{ route('sign-out') }}" method="POST">
                    <button class="sidebar-link" type="submit">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="align-middle fw-bold">Sign out</span>
                    </button>
                
                    @csrf
                </form>
            </li>

        </ul>
    </div>
</nav>
