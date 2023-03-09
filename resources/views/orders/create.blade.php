<form method="post" action="{{ route("orders.store") }}">
@csrf
    <select name="user_id">
        @foreach($users as $user)
         <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <button >Sukurti</button>
</form>
