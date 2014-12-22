<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
        Order
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation">
            <a role="menuitem" tabindex="-1" href="{{ URL::to('order/asc') }}">Ascendent</a>
        </li>
        <li role="presentation">
            <a role="menuitem" tabindex="-1" href="{{ URL::to('order/desc') }}">Descendent</a>
        </li>
    </ul>
</div>