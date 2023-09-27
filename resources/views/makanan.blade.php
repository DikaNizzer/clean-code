<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <!-- posts.blade.php -->

<div id="app">
  <!-- Category Tabs -->
  <ul class="nav nav-tabs" id="categoryTabs">
      @foreach ($kategoris as $category)
          <li class="nav-item">
              <a class="nav-link" data-category="{{ $category->id }}" href="#">{{ $category->category_title }}</a>
          </li>
      @endforeach
  </ul>

  <!-- Content Area for Posts -->
  <div id="postContent"></div>
</div>


<!-- posts.blade.php -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle tab clicks
        $('#categoryTabs a').on('click', function (e) {
            e.preventDefault();

            // Get the selected category ID
            const categoryId = $(this).data('category');

            // Filter posts based on the selected category
            const filteredPosts = @json($menus->groupBy('category_id'));

            // Display posts for the selected category
            const categoryPosts = filteredPosts[categoryId];
            const postContent = $('#postContent');
            postContent.empty();

            if (categoryPosts) {
                categoryPosts.forEach(function (post) {
                    postContent.append('<p>' + post.menu_name + '</p>');
                });
            } else {
                postContent.append('<p>No posts available for this category.</p>');
            }
        });
    });
</script>


  
</body>
</html>