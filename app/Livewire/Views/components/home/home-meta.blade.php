@section('title')
{{$title}} | {{$systemInfo->title}}
@endsection

@section('keywords')
{{ implode(', ', $systemInfo->meta_tags) }}
@endsection

@section('description')
{{ $systemInfo->meta_description }}
@endsection

@section('og_image')
{{ asset('storage/'.$systemInfo->og_thumbnail) }}
@endsection
@section('twitter_image')
{{ asset('storage/'.$systemInfo->og_thumbnail) }}
@endsection
<div></div>