
@if (session('success'))
<div class="alert alert-success" role="alert">{{ session('success') }}</div>
@elseif (session('error'))
<div class="alert alert-danger" role="alert">{{ session('error') }}</div>
@endif