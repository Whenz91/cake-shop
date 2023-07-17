@props(['categories'])

<ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
    @foreach ($categories as $category)
    <li class="nav-item" role="presentation">
    <button class="nav-link @if ($loop->iteration == 1) active @endif" data-bs-toggle="pill" data-bs-target="#category-{{ $loop->iteration }}" type="button" role="tab" aria-controls="{{ $category->name }}" aria-selected="true">{{ $category->name }}</button>
    </li>
    @endforeach
</ul>

<div class="tab-content" id="pills-tabContent">
    @foreach ($categories as $category)
    <div class="tab-pane fade @if ($loop->iteration == 1) show active @endif" id="category-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="{{ $category->name }}" tabindex="0">
        <div class="grid">
        @forelse($category->cakes as $cake)
        <div class="@if($loop->iteration / 4 != 1) small @else tall @endif">
            <div class="card">
            <img src="{{ asset('images/cakes/' . $cake->image) }}" class="card-img-top" alt="{{ $cake->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $cake->name }}</h5>
                <p class="card-text">{{ $cake->short_description }}</p>
                <a href="{{ route('shop.cakes.show', $cake->id) }}" class="card-btn btn btn-primary">Show more</a>
            </div>
            </div>
        </div>
        @empty
        <p>Looks like we don't have any cakes yet.</p>
        @endforelse
        </div>
    </div>
    @endforeach
</div>