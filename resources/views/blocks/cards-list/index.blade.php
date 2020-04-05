<?php
/** @var \App\Models\ProductsCategory $category */

?>
<div class="container">

    @php
        $breadcrumbs = [
            [
                'title'=>$category->title
            ]
        ];
    @endphp

    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>

    <div class="text-center">
        {{ $cards->links() }}
    </div>

    <div class="row">
        @include('blocks.cards-list.blocks.item')
    </div>

    <div class="text-center">
        {{ $cards->links() }}
    </div>

</div>