@include('admin.layout._head')

@include('admin.layout._nav')

<div class="container">
    @include('admin.layout._notice')
    @yield('contents')
</div>
@include('admin.layout._foot')