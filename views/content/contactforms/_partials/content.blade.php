{{-- the intro text of the contact page, then the company details from the settings --}}
@if(!empty($data->page->lead))
    <div class="mb-6">{!! $data->page->lead !!}</div>
@endif

@if(!empty($data->page->body))
    <div class="mb-6">{!! $data->page->body !!}</div>
@endif

<ul class="list-unstyled pb-2 pb-lg-0 mb-4 mb-lg-5">
    @if($globalsettings->company_street || $globalsettings->company_city)
        <li class="pb-1 mb-2">
            <div class="grid grid-cols-12">
                <div class="col-span-1 px-0">
                    <x-heroicon-s-map-pin class="w-5 h-5 text-primary"/>
                </div>
                <div class="col-span-11">
                    @if($globalsettings->company_name)
                        <strong>{{ $globalsettings->company_name }}</strong><br>
                    @endif
                    {{ $globalsettings->company_street }} {{ $globalsettings->company_street_nr }}<br>
                    {{ $globalsettings->company_pcode }} {{ $globalsettings->company_city }}
                </div>
            </div>
        </li>
    @endif
    @if($globalsettings->company_telephone)
        <li class="pb-1 mb-2">
            <div class="grid grid-cols-12">
                <div class="col-span-1 px-0">
                    <x-heroicon-s-phone class="w-5 h-5 text-primary"/>
                </div>
                <div class="col-span-11">
                    <a href="tel:{{ $globalsettings->company_telephone_clean ?: $globalsettings->company_telephone }}">{{ $globalsettings->company_telephone }}</a>
                </div>
            </div>
        </li>
    @endif
    @if($globalsettings->company_email)
        <li class="pb-1 mb-2">
            <div class="grid grid-cols-12">
                <div class="col-span-1 px-0">
                    <x-heroicon-s-envelope class="w-5 h-5 text-primary"/>
                </div>
                <div class="col-span-11">
                    <a href="mailto:{{ $globalsettings->company_email }}">{{ $globalsettings->company_email }}</a>
                </div>
            </div>
        </li>
    @endif
</ul>
