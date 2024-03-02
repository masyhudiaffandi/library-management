@if (isset($paginator))
<div class="pagination flex flex-col mt-4 justify-content-center">
    {{ $paginator->links() }}
</div>
@endif