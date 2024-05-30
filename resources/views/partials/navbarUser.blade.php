<nav>
    <p class="logo">May' Cakes</p>
    <div class="menu d-flex">
        <div class="hyperlink">
            <a class="link {{request()->is('homeUser') ? 'active' : '' }}" href="{{route('homeUser')}}">Home</a>
            <a class="link {{request()->is('katalogUser') ? 'active' : '' }}" href="{{route('katalogUser')}}">Catalog</a>
            <a class="link" href="">AboutUs</a>
        </div>
        <a href="{{route('cart',auth()->user()->id_user)}}"><img src="images/icon-shopping-cart.svg" alt=""></a>
        <a href=""><img src="images/profileIcon.svg" alt=""></a>
        <a href="{{route('logout')}}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" ><img src="images/log-in.svg" alt=""></a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</nav>
