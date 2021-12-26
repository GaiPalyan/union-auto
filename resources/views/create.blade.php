<form action="{{route('urls.store')}}" method="POST">
    @csrf
    <label for="name">Url name</label>
    <input id="name" type="text" name="name">
    <label for="custom_name">Custom name</label>
    <input id="custom_name" type="text" name="custom_name">
    <button type="submit">Send</button>
</form>
