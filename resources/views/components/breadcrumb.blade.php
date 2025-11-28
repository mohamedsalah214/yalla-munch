<div class="container-lg mb-4">
    <nav aria-label="breadcrumb" class="first d-md-flex mt-4">
        <ol class="breadcrumb indigo lighten-6">

            @foreach ($items as $item)
                <li class="breadcrumb-item p-0 d-flex align-items-center">

                    @if (isset($item['url']))
                        <a class="black-text active-2" href="{{ $item['url'] }}">
                            <span>{{ strtoupper($item['name']) }}</span>
                        </a>
                    @else
                        <span class="black-text active-1 active-2 pe-2 fw-bold">
                            {{ strtoupper($item['name']) }}
                        </span>
                    @endif

                    @if (!$loop->last)
                        <img class="ml-md-3 ml-1" src="https://img.icons8.com/metro/50/000000/chevron-right.png"
                            width="15" height="15">
                    @endif

                </li>
            @endforeach

        </ol>
    </nav>
</div>
