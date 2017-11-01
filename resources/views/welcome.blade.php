<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HackerNews</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
    <style>
        .mar {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">
            Welcome to Hacker News API - Group 3
        </h1>
        <p class="subtitle">
            <strong>By</strong> Ismail Cam, Mazlum D. Sert, Mert Turan, Mustafa, Kristijan Krsteski
        </p>

        <hr>

        <h4 class="title is-4">Users</h4>
        <p>Retrieve all users</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/users</pre>

        <p>Retrieve user by id</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/users/by-id/<span class="has-text-info">{id}</span> </pre>

        <p>Retrieve user by username</p>
        <pre><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/users/by-username/<span class="has-text-info">{username}</span></pre>

        <hr>

        <h4 class="title is-4">Stories</h4>
        <p>Retrieve all stories</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/stories</pre>

        <p>Retrieve story by id</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/stories/<span class="has-text-info">{id}</span></pre>

        <hr>

        <h4 class="title is-4">Comments</h4>
        <p>Retrieve all comments</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/comments</pre>

        <p>Retrieve comments by id</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/comments/<span class="has-text-info">{id}</span></pre>

        <p>Retrieve comments by story id</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/stories/<span class="has-text-info">{id}</span>/comments</pre>

    </div>
</section>
</body>
</html>