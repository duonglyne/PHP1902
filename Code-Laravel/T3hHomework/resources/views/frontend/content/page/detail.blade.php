@extends ('frontend.layouts.fashion')
@section('title')
    Content page
@endsection
@section('content')
    <div class="payment">
        <div class="container">
            <h3>{{ $page->name }}</h3>
            <?php echo $page->desc ?>
        </div>
    </div>
@endsection
