@extends ('layouts.app')

@section('content')
<form method="POST" action="/clients">
    @csrf
    <h1 class="heading is-1">Add a new client</h1>

    <div class="field">
        <label class="label" for="name">Name</label>

        <div class="control">
            <input type="text" class="input" name="name" placeholder="Name">
        </div>
    </div>

    <div class="field">
        <label class="label" for="email">Email</label>

        <div class="control">
            <input type="text" class="input" name="email" placeholder="Email">
        </div>
    </div>

    <div class="field">
        <label class="label" for="phone">Phone</label>

        <div class="control">
            <input type="text" class="input" name="phone" placeholder="Phone">
        </div>
    </div>

    <div class="field">
        <label class="label" for="date_of_birth">DOB</label>

        <div class="control">
            <input type="date" class="input" name="date_of_birth" placeholder="DOB">
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Add client</button>
            <a href="/clients">Cancel</a>
        </div>
    </div>
</form>
@endsection
