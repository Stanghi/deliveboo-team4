<nav>
    <ul>
        <li class="{{ request()->segment(2) == 'statistics' ? 'active' : '' }}">
            <a href="{{ route('admin.statistics') }}">
                <i class="fa-solid fa-chart-pie"></i>Statistiche
            </a>
        </li>

        <li class="{{ request()->segment(2) == 'restaurants' ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-utensils"></i>Ristorante
            </a>
        </li>

        <li class="{{ request()->segment(2) == 'products' ? 'active' : '' }}">
            <a href="{{ route('admin.products.index') }}">
                <i class="fa-solid fa-pizza-slice"></i>Prodotti
            </a>
        </li>

        <li class="{{ request()->segment(2) == 'orders' ? 'active' : '' }}">
            <a href="{{ route('admin.orders.index') }}">
                <i class="fa-solid fa-cart-shopping"></i>Ordini
            </a>
        </li>
    </ul>
</nav>
