<!doctype html>
<html lang="en">
  <head>
    <title> Post Listing </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        table td p {
            word-break: break-all;
        }
    </style>
  </head>
  <body>
      <div class="container mt-4">
        <div class="row">
            <div class="col-xl-8">
                <h3 class="text-right"> SummerNote Implementation in Laravel 8 </h3>
            </div>

            <div class="col-xl-4 text-right">
                <a href="{{url('create-post')}}" class="btn btn-primary"> Add Post </a>
            </div>
        </div>

        @if(count($posts) > 0)
          <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Id </th>
                        <th style="width:30%;"> Title </th>
                        <th> Decription </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td> {{ $post->id }} </td>
                            <td> {{ $post->title }} </td>
                            <td> {!! html_entity_decode($post->description) !!} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

          {{ $posts->links() }}
        @endif
      </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
