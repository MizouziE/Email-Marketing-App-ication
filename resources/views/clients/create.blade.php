<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a client</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
</head>

<body>

    <form method="POST" action="/clients" class="container" style="padding-top: 40px">
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
            </div>
        </div>
    </form>
</body>

</html>
