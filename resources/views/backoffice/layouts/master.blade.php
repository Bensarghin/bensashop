<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontoffice/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('backoffice/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('backoffice/css/images.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    
    <div id="app">
        <nav class="navbar bg-body-tertiary border-bottom">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <ul class="nav  ms-auto">
                <li class="nav-item mx-3">
                    <a href="" class="btn btn-primary position-relative">
                        <i class="fa-solid fa-bell"></i> 
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{$orders->count()}}
                        <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item mx-3 dropstart">
                    <a href="#" class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i></a>
                    <ul class="dropdown-menu">
                        <li><h5 class="dropdown-header">{{Auth::user()->name}}</h5></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('admin.user.edit')}}"><i class="fa-solid fa-user-lock"></i><span class="d-inline mx-2"> Authent </span></a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket"></i><span class="d-inline mx-2"> Logout </span></a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
              </ul>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start show" style="visibility: visible; border:none;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">BENSASHOP</h5>
            </div>
            <div class="offcanvas-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#"><i class="fa-solid fa-house"></i><span class="sidebar-item"> Dashboard</span>  </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.order.index')}}"><i class="fa-regular fa-arrow-pointer"></i><span class="sidebar-item"> orders <span class="badge bg-primary d-inline p-2 ms-5">{{$orders->count()}}</span></span> </a>
                    </li>
                    <li class="list-group-item dropdown">
                        <a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-tag"></i><span class="sidebar-item"> Product</span></a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="{{route('admin.product.index')}}">All Product</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.product.create')}}">New Product</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.category.index')}}">Categories</a></li>
                            <li><a class="dropdown-item" href="#">Reviews</a></li>
                        </ul>
                    </li>
                    <li class="list-group-item ">
                        <a href="{{route('admin.customer.index')}}"><i class="fa-regular fa-user"></i><span class="sidebar-item">Customers</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href=""><i class="fa-regular fa-chart-line"></i><span class="sidebar-item">Insight </span> </a>
                    </li>
                </ul>
            </div>
            
            <div class="offcanavs-footer">
                <li class="list-group-item ">
                    <a href=""><i class="fa-solid fa-sliders"></i><span class="sidebar-item">Customize</span></a>
                </li>
                <li class="list-group-item">
                    <a href=""><i class="fa-solid fa-gear"></i><span class="sidebar-item">Settings </span> </a>
                </li>
            </div>
            </div>
        <div style="margin-left:250px; margin-top:10px">

            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{asset('frontoffice/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backoffice/js/images.js')}}"></script>
    <script src="{{asset('backoffice/js/quantity.js')}}"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.ckbox.io/CKBox/1.3.2/ckbox.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>
    <script>
    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'ckbox', 'uploadImage', '|',
                    'exportPDF','exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Welcome to CKEditor 5 + CKBox!',
            ckbox: {
                tokenUrl: 'https://96776.cke-cs.com/token/dev/QheaS5AgGACtMq6Sx7pc08f45dTz7hX8DYNA?limit=10'
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you reqd the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'EasyImage',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType
                'MathType'
            ]
        });
    </script>
</body>
</html>