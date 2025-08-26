<!DOCTYPE html>
<html>
<head>
    <title>Google Login</title>
</head>
<body>
<script>
    @if(isset($error))
        alert("Google login failed: {{ $error }}");
        window.close();
    @else
        window.opener.postMessage({
            token: "{{ $token }}",
            user: {!! json_encode([
                'id' => $user->id,
                'ho_va_ten' => $user->ho_va_ten,
                'email' => $user->email,
                'hinh_anh' => $user->hinh_anh,
                'so_dien_thoai' => $user->so_dien_thoai
            ]) !!}
        }, "*");
        window.close();
    @endif
</script>
</body>
</html>