<div class="{{ $defaults['container_class'] }}">

    <ul class="{{ $defaults['ul_class'] }}">

        @foreach($links as $link)

            <li class=" @if($link['active']) active @endif ">{{ $link['link'] }}</li>

        @endforeach

    </ul>

</div>