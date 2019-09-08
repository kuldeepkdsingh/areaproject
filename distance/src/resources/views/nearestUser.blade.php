<!DOCTYPE html>
    <html lang="en">
    <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          <title>User List</title>
    </head>
        <body>

          <div class="container border" >
            <h3>User List</h3>
            <div class="row border">
                <div class="col-sm-2">
                    <strong>User ID</strong>
                </div>
                <div class="col-sm-6">
                    <strong>Name</strong>
                </div>
                <div class="col-sm-4">
                    <strong>Distance (In {{$unit}})</strong>
                </div>
            </div>
            @if(count($userData) <= 0)
                <div class="row border">
                <div class="col-sm-12" style="text-align:center;">
                    No Record Exist&nbsp;!
                </div>
                </div>
            @endif
            @if(count($userData) > 0)
            @foreach($userData as $data)
                <div class="row border">
                    <div class="col-sm-2">
                        {{$data['user_id']}}
                    </div> 
                    <div class="col-sm-6">
                        {{$data['name']}}
                    </div>
                    <div class="col-sm-4">
                        {{$data['distance']}}
                    </div> 
                </div>   
            @endforeach
            @endif
        </div>
    </body>
    </html>