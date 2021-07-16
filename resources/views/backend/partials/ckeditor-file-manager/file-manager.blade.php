<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
    
    @if($images)
      @foreach($images as $image)
        <img class="gallery-image-item"
          src="{{ asset('images/news/low-quality/'.$image->getFilename()) }}" data-id="{{ $image->getFilename() }}"
          alt="Gallery Image">
      @endforeach
    @endif
    
  </body>
</html>