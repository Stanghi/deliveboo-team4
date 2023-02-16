<nav>
    <ul>
        <li class="{{ request()->segment(2) == '' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-chart-pie"></i>Statistics
            </a>
        </li>

        <li class="{{ request()->segment(2) == 'restaurants' ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-utensils"></i>Restaurant
            </a>
        </li>

        <li class="{{ request()->segment(2) == 'products' ? 'active' : '' }}">
            <a href="{{ route('admin.products.index') }}">
                <i class="fa-solid fa-pizza-slice"></i>Products
            </a>
        </li>

        <li class="{{ request()->segment(2) == 'orders' ? 'active' : '' }}">
            <a href="{{ route('admin.products.index') }}">
                <i class="fa-solid fa-cart-shopping"></i>Ordini
            </a>
        </li>
    </ul>
</nav>
