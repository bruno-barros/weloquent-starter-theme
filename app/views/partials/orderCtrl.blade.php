

<p>Sort posts:
<span class="btn-group" role="group">

    <a href="{{ url('order/asc') }}"
       class="btn btn-default {{ isset($orderDir) && $orderDir == 'asc' ? 'active' : '' }}">
        Older
    </a>

    <a href="{{ url('order/desc') }}"
       class="btn btn-default {{ !isset($orderDir) || $orderDir == 'desc' ? 'active' : '' }}">
        Newer
    </a>

</span>

</p>