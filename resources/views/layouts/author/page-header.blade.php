<div class="page-header flex justify-between items-center">
  <div class="left-page-header">
    <h2 class="page-title text-3xl">
      @yield('page-title')
    </h2>
    <p class="text-sm text-disabled">Overview</p>
  </div>
  <div class="right-page-header flex items-center gap-2">
    @if (isset($searchRoute))
      <div class="search-box">
        <form action="{{ $searchRoute }}" method="get">
        @csrf
            <div class="search-bar flex gap-2">
                <input type="text" name="search" class="form-control border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700" placeholder="Search">
                <button type="submit" class="btn btn-accent text-white rounded-md">Search</button>
            </div>
        </form>
      </div>
    @endif
    @if (isset($createRoute))
    <div class="btn-list">
        <a href="{{ $createRoute }}" class="btn btn-accent text-white d-none d-sm-inline-block">
        @yield('button-text')
        </a>
    </div>
    @endif
  </div>
</div>
