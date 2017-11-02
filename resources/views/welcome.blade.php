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
            Hacker News API DOC - Group K
        </h1>
        <p>
            <strong>By</strong> Ismail Cam, Mazlum D. Sert, Mert Turan, Mustafa, Kristijan Krsteski
        </p>

        <div style="margin-top: 20px">
            <div class="tags has-addons">
                <span class="tag">Questions</span>
                <span class="tag is-info">i@bigstep</span>
            </div>

            <div class="tags has-addons" style="margin-top: -15px">
                <span class="tag">Application</span>
                <span class="tag is-info">https://github.com/bigstepdenmark/hackerNewsBackup</span>
            </div>

            <div class="tags has-addons" style="margin-top: -15px">
                <span class="tag">Handover Documentation:</span>
                <span class="tag is-info">https://github.com/HakimiX/Documentation/blob/master/README.md</span>
            </div>
        </div>

        <hr>

        <h4 class="title is-4">Users</h4>
        <p>Retrieve all users</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/users<hr><span class="tag is-rounded is-dark">RESPONSE</span> Json Objects</pre>

        <p>Retrieve user by id</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/users/by-id/<span class="has-text-info">{id}</span><hr><span class="tag is-rounded is-dark">RESPONSE</span> Json Object</pre>

        <p>Retrieve user by username</p>
        <pre><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/users/by-username/<span class="has-text-info">{username}</span><hr><span class="tag is-rounded is-dark">RESPONSE</span> Json Object</pre>

        <hr>

        <h4 class="title is-4">Stories</h4>
        <p>Retrieve all stories</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/stories<hr><span class="tag is-rounded is-dark">RESPONSE</span> Json Objects</pre>

        <p>Retrieve story by id</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/stories/<span class="has-text-info">{id}</span><hr><span class="tag is-rounded is-dark">RESPONSE</span> Json Object</pre>

        <hr>

        <h4 class="title is-4">Comments</h4>
        <p>Retrieve all comments</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/comments<hr><span class="tag is-rounded is-dark">RESPONSE</span> Json Objects</pre>

        <p>Retrieve comments by id</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/comments/<span class="has-text-info">{id}</span><hr><span class="tag is-rounded is-dark">RESPONSE</span> Json Objects</pre>

        <p>Retrieve comments by story id</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/stories/<span class="has-text-info">{id}</span>/comments<hr><span class="tag is-rounded is-dark">RESPONSE</span> Json Objects</pre>

        <hr>

        <h4 class="title is-4">Simulator</h4>
        <p>Post data</p>
        <pre class="mar"><span class="tag is-rounded is-success">POST</span> http://165.227.136.184/api/post<hr><span class="tag is-rounded is-dark">RESPONSE</span> Json Object</pre>

        <p>Request body</p>
        <pre class="mar">{
    "username": "string",
    "post_type": "string",
    "pwd_hash": "string",
    "post_title": "string",
    "post_url": "string",
    "post_parent": int,
    "hanesst_id": int,
    "post_text": "string"
}</pre>

        <p>Retrieve Posts</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/posts<hr><span class="tag is-rounded is-dark">RESPONSE</span> Json Objects</pre>

        <p>Retrieve latest digested Post</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/latest<hr><span class="tag is-rounded is-dark">RESPONSE</span> int : hanesst_id</pre>

        <p>Retrieve status information</p>
        <pre class="mar"><span class="tag is-rounded is-warning">GET</span> http://165.227.136.184/api/status<hr><span class="tag is-rounded is-dark">RESPONSE</span> string : Alive | Update | Down</pre>

    </div>
</section>
</body>
</html>