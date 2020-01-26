@foreach($pages as $page)
  @if(count($page->childs)==0)
      <li class="nav-item">
          <a class="nav-link" href="{{route('pages.show',$page->hash)}}">{{$page->caption}}</a>
      </li>
  @else
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{$page->caption}}
          </a>
          @if(count($page->childs)>0)
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              @foreach($page->childs as $child)
              <a class="dropdown-item" href="{{route('pages.show',$child->hash)}}">{{$child->caption}}</a>
              @endforeach
          </div>
              @endif
      </li>
  @endif
@endforeach



