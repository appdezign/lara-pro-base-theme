<li @if($node->isLeaf() && $node->object_count== 0) class="hidden" @endif>

    {{-- without a tag route (content and preview routes) the tag is shown without a link --}}
    @php($tagRoute = $activeroute->getTagRoute($node->route))
    <a @if($tagRoute) href="{{ route($tagRoute) }}" @endif
       class="block p-1 text-sm border-b-1 border-slate-100 @if($node->slug == $data->params->getFilterByTaxonomy()) text-primary @endif">
        {{ $node->title }}
    </a>

    @if(!$node->isLeaf())
        <ul>
            @foreach($node->children as $node)
                @include('content._partials.tag_menu_render', $node)
            @endforeach
        </ul>
    @endif

</li>




