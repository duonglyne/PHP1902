@extends ('frontend.layouts.fashion')
@section('title')
    Content post
@endsection
@section('content')
    <div class="payment">
        <div class="container">
            <h3>{{ $post->name }}</h3>
            <?php echo $post->desc ?>
        </div>
    </div>
@endsection
