{{-- Blog Paging --}}

@if ($paginator->hasPages())
    <div class="row mt25 animated" data-animation="fadeInUp" data-animation-delay="100">
        <div class="col-md-6">
            @if ($paginator->onFirstPage())
                <a href="#" class="button button-sm button-pasific pull-left hover-skew-backward disabled"
                    style="background-color:grey !important">
                    Old Entries
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="button button-sm button-pasific pull-left hover-skew-backward">
                    Old Entries
                </a>
            @endif
        </div>

        @if ($paginator->hasMorePages())
            <div class="col-md-6">
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="button button-sm button-pasific pull-right hover-skew-forward">New Entries</a>
            </div>
        @else
            <div class="col-md-6">
                <a href="#" class="button button-sm button-pasific pull-right hover-skew-forward disabled">New
                    Entries</a>
            </div>
        @endif
    </div>
@endif
