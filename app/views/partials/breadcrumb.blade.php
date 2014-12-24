
<ol class="breadcrumb">

    @foreach(\Weloquent\Support\Breadcrumb::render() as $page)

        @if($page['url'])

            <li><a href="{{ $page['url'] }}">{{ $page['title'] }}</a></li>

        @else

            <li class="active">{{ $page['title'] }}</li>

        @endif

    @endforeach

</ol>
