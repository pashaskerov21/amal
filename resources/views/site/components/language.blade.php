<ul class="lang">
    <li><span style="text-transform: uppercase">
            {{ Session('lang') }} <img src="{{ asset('front-assets/images/down-ch.svg') }}" alt="arrow">
        </span>
        <ul>
            @if (Session('lang') === 'az')
                <li>
                    <a href="{{ $lang['en'] ?? '/en' }}">EN</a>
                </li>
                <li>
                    <a href="{{ $lang['ru'] ?? '/ru' }}">RU</a>
                </li>
            @elseif(Session('lang') === 'en')
                <li>
                    <a href="{{ $lang['az'] ?? '/' }}">AZ</a>
                </li>
                <li>
                    <a href="{{ $lang['ru'] ?? '/ru' }}">RU</a>
                </li>
            @elseif(Session('lang') === 'ru')
                <li>
                    <a href="{{ $lang['az'] ?? '/' }}">AZ</a>
                </li>
                <li>
                    <a href="{{ $lang['en'] ?? '/en' }}">EN</a>
                </li>
            @else
                <li>
                    <a href="{{ $lang['en'] ?? '/en' }}">EN</a>
                </li>
                <li>
                    <a href="{{ $lang['ru'] ?? '/ru' }}">RU</a>
                </li>
            @endif
        </ul>
    </li>
</ul>