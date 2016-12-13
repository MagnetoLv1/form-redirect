<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
<form name="form" method="POST" action="{{$url}}">
    {!! csrf_field() !!}
    @if($input)
        @foreach ($input as $key => $value)
            <input type="hidden" name="{{$key}}" value="{{$value}}">
        @endforeach
    @endif
</form>
<!-- Scripts -->
<script>
    document.forms["form"].submit()
</script>
</body>
</html>